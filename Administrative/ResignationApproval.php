<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>

<?php
  $page_title = 'Financial Approvals';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $row=Call_resignation_Request();
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
	.dropdown{
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
    <a href="document_approval.php" class="breadcrumbs__item">Back</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Resignation Request</a>
</nav>
<!-- /Breadcrumb -->



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
</div> 
<br>

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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>Resignation Request Table</span>
        <div class="text-end">
          <div class="text-end">
          <button onclick="print()" id="button" class="btn btn-warning md-2"><i class="bi bi-file-post"></i> Print report</button>
        </div>
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
            
                <th>Employee Id</th>
                <th>Name</th>
                <th>Position</th>
                <th> Department </th>
                <th>Status</th>
                <th> Action </th>
             </tr>
            </thead>
           <tbody>
            <?php foreach ($row as $row): ?>
             <tr>
            <td><?php echo $row['employee_id']; ?></td>
            <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
            <td><?php echo $row['pos_name']; ?></td>
            <td><?php echo $row['dept_name']; ?></td>
            <td>
               <?php if($row['status']=='approved'){ ?>
                         <span class="badge rounded-pill bg-success"> <?php echo remove_junk(ucwords($row['status'])); ?></span>
                          
                          <?php }else{ ?>
                        <span class="badge rounded-pill bg-danger"> <?php echo remove_junk(ucwords($row['status'])); ?></span>
                         <?php } ?>
            </td>
            <td><a href="view_resignation.php?id=<?php echo $row['employee_id'];?>" class="btn btn-sm btn-warning" style="margin-right: 5px;"><i class="bi bi-eye"></i></a> 
                      
              </td>
             </tr>
           <?php endforeach; ?>
           </tbody>
         </table>
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
