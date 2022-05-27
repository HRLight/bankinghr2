

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>
<?php
  $page_title = 'List of Complains';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
    $all_complain = find_all('complain')
?>



<?php include_once('layouts/header.php'); ?>
<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    
    <style>
@media print{
	#button{
		display: none; !important;
	}
	.breadcrumbs{
		display: none; !important;
	}
	.topNavBar{
	    display: none; !important;
	}
}
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">List of Complains</a>
</nav>
<!-- /Breadcrumb -->

<!-- Data table start -->
<div class="row">

  <!-- Notification div -->
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
  <!-- End Notification div -->

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
                <th>Id</th>
                <th>Fullname</th>

                <th>Department</th>
                <th>Type of Complain</th>
                <th>Description</th>
                    <th>Remarks</th>
                
                <th>Status</th>
                <th>Date of Complain</th>
                     
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            <?php foreach ($all_complain as $complainant):?>
                <tr>
                    <td class="text-center"><?php echo count_id();?></td>
					
					<td><?php echo remove_junk(ucfirst($complainant['fname'].' '.$complainant['mname'].' '.$complainant['lname'])); ?></td>
					
                    
					   
					    <td><?php echo remove_junk(ucfirst($complainant['department'])); ?></td>
						 <td><?php echo remove_junk(ucfirst($complainant['type_of_complain'])); ?></td>
						  <td><?php echo remove_junk(ucfirst($complainant['description'])); ?></td>
						  <td><?php echo remove_junk(ucfirst($complainant['remarks'])); ?></td>
						  <td>
						    <?php if($complainant['status']=='approved'){ ?>
						    <span class="badge square-pill bg-success"> <?php echo remove_junk(ucwords($complainant['status'])); ?></span>
						    
						    <?php }elseif($complainant['status']=='pending'){ ?>
					<span class="badge square-pill bg-warning"> <?php echo remove_junk(ucwords($complainant['status'])); ?></span> <?php }else{ ?>
					<span class="badge square-pill bg-danger"> <?php echo remove_junk(ucwords($complainant['status'])); ?></span> <?php } ?> 
					</td>
						    
						    
						    
						    
						   <td><?php echo remove_junk(ucfirst($complainant['date'])); ?></td>
						    
                    <td class="text-center">
                      <div class="btn-group">
                          <?php if($complainant['status']=='approved'){ ?>
                           <a href="#" class="btn btn-sm btn-secondary" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Approve Complain"><i class="bi bi-check"></i></a> 
                          <?php }else{ ?>
                            <a href="edit_legal_complain.php?id=<?php echo $complainant['id'];?>" class="btn btn-sm btn-success" style="margin-right: 5px;"><i class="bi bi-pencil"></i></a>  
                         <a href="approve_complain.php?id=<?php echo $complainant['id'];?>" class="btn btn-sm btn-success" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Approve Complain"><i class="bi bi-check"></i></a> 
                         <?php } ?>
                      <a href="reject_complain.php?id=<?php echo $complainant['id'];?>" class="btn btn-sm btn-danger" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Reject Complain"><i class="bi bi-x"></i></a>
                      
                      <a href="#.php?id=<?php echo $complainant['id'];?>" class="btn btn-sm btn-warning" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="View Data"><i class="bi bi-eye"></i></a>
                      
                      <a href="archive-complain.php?id=<?php echo $complainant['id'];?>" class="btn btn-sm btn-primary" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive Data"><i class="bi bi-archive"></i></a>

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
<!-- End of Data table  -->
<script src="js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>


<?php include_once('layouts/footer.php'); ?>
