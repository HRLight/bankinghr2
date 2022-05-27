


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>

<?php
	$page_title = 'Visitor Monitoring';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
    $all_visitor_registration = find_all('visitor_registration')
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
  <a href="visitorinformation.php" class="breadcrumbs__item is-active">List of visitor Log</a>
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Table of visitor monitoring</span>
        
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
               <th class="text-center" style="width: 50px;">Visitor Id</th>
				
				<th>Full Name</th>				
				<th>Department</th>
				
				<th>Contact</th>
				<th>Visitor Type</th>
				<th>Visitor Purpose</th>
			
				<th>Time In</th>
				<th>Time Out</th>
				<th>Date Visit</th>

			<!--	<th>Action</th> -->
				
				
			
              </tr>
            </thead>
            <tbody>

                         <?php foreach ($all_visitor_registration as $Monitoring):?>
                <tr>
                      <td><?php echo remove_junk(ucfirst($Monitoring['id'])); ?></td>
					 <td><?php echo remove_junk(ucfirst($Monitoring['last_name'].' '.$Monitoring['first_name'].' '.$Monitoring['middle_name'])); ?></td>
					    <td><?php echo remove_junk(ucfirst($Monitoring['department'])); ?></td>	
						    <td><?php echo remove_junk(ucfirst($Monitoring['contact'])); ?></td>
							 <td><?php echo remove_junk(ucfirst($Monitoring['visitor_type'])); ?></td>
							  <td><?php echo remove_junk(ucfirst($Monitoring['visitor_purpose'])); ?></td>
							  <td><?php echo remove_junk(ucfirst($Monitoring['time_in'])); ?></td>
							  <td><?php echo remove_junk(ucfirst($Monitoring['time_out'])); ?></td>
							  <td><?php echo remove_junk(ucfirst($Monitoring['date_visit'])); ?></td>
							  
							  
							  <td class="text-center">
                      <div class="btn-group">
                         
                    <!--  <a href="delete_contractrequest.php?id=<?php echo $Monitoring['visitor_id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>-->
                      </div>
                    </td>
							 
						    
                    
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
