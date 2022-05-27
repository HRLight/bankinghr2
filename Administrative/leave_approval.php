<?php
$page_title = 'List of Leave Requests';
  require_once('includes/load.php');
 page_require_level(1);
 $all_complain = find_all_leave_requests();

?>

<?php include_once('layouts/header.php'); ?>
<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>





<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a class="breadcrumbs__item is-active">Leave Request</a>
</nav>
<!-- /Breadcrumb -->
<br>



<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Document Management by Department</span>
       </strong>
      </div>
	  <nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
   
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
</nav>
	  
<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
    Dropdown
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdown">
    <li><a href="FinanceApproval.php" class="dropdown-item">Financial Request</a></li>
    <li><a class="dropdown-item" href="Budget_Request.php">Budget Request</a></li>
        <li><a class="dropdown-item" href="ResignationApproval.php">Resignation Request</a></li>
        <li><a class="dropdown-item" href="leave_approval.php">Leave Request</a></li>
  </ul>
</div><br>


<div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Complain Table</span>
        	
	<div class="text-end">
          <button onclick="print()" id="button" class="btn btn-warning md-2"><i class="bi bi-file-post"></i> Print report</button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                <th>Employee ID</th>
                <th>Fullname</th>

                <th>Department</th>
                <th>Leave Type</th>
                <th>No. of Days</th>
                <th>Date Start</th>
                <th>Date End</th>
                <th>Status</th>    
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            <?php foreach ($all_complain as $complainant):?>
                <tr>
                    <td class="text-center"><?php echo $complainant['employee_id'];?></td>
					
					<td><?php echo remove_junk(ucfirst($complainant['first_name'].' '.$complainant['last_name'])); ?></td>
					
                    
					   
					    <td><?php echo remove_junk(ucfirst($complainant['dept_name'])); ?></td>
						 <td><?php echo remove_junk(ucfirst($complainant['leave_type'])); ?></td>
						  <td><?php echo remove_junk(ucfirst($complainant['days'])); ?></td>
						  <td><?php echo remove_junk(ucfirst($complainant['date_start'])); ?></td>
						  <td><?php echo remove_junk(ucfirst($complainant['date_end'])); ?></td>
						  <td>
						    <?php if($complainant['status']=='approved'){ ?>
						    <span class="badge rounded-pill bg-success"> <?php echo remove_junk(ucwords($complainant['status'])); ?></span>
						    
						    <?php }elseif($complainant['status']=='pending'){ ?>
					<span class="badge rounded-pill bg-warning"> <?php echo remove_junk(ucwords($complainant['status'])); ?></span> <?php }else{ ?>
					<span class="badge rounded-pill bg-danger"> <?php echo remove_junk(ucwords($complainant['status'])); ?></span> <?php } ?> 
					</td>
						    
						    
						    
						    
						   
						    
                    <td class="text-center">
                      <div class="btn-group">
                          <?php if($complainant['status']=='approved'){ ?>
                           <a href="#" class="btn btn-sm btn-secondary" style="margin-right: 5px;"><i class="bi bi-check"></i></a> 
                          
                          <?php }else{ ?>
                         <a href="approve_leave.php?id=<?php echo $complainant['leave_id'];?>" class="btn btn-sm btn-success" style="margin-right: 5px;"><i class="bi bi-check"></i></a> 
                         <?php } ?>
                      <a href="reject_leave.php?id=<?php echo $complainant['leave_id'];?>" class="btn btn-sm btn-danger" style="margin-right: 5px;"><i class="bi bi-x"></i></a>
                     
                      </div>
                    </td>

                </tr>       
            <?php endforeach; ?>

            </tbody>
            
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
	  
     

<script src="js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>
  <?php include_once('layouts/footer.php'); ?>