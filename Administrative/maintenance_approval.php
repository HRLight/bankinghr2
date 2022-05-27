
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>

<?php
	$page_title = 'Maintenance Request';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
    $all_maintenance_request = find_all('maintenance_request')
?>

<?php
 if(isset($_POST['add_vis'])){
    $req_fields = array('requestor','department','name_of_equipment','issue','status');
   
   validate_fields($req_field);
	
	$vis_requestor = remove_junk($db->escape($_POST['visitor-requestor']));
	$vis_department = remove_junk($db->escape($_POST['visitor-department']));
	$vis_name_of_equipment= remove_junk($db->escape($_POST['visitor-name_of_equipment']));
	$vis_issue = remove_junk($db->escape($_POST['visitor-issue']));
	$vis_status = remove_junk($db->escape($_POST['visitor-status']));
	
   
   
   if(empty($errors)){
      $sql  = "INSERT INTO maintenance_request ( requestor, department, name_of_equipment, issue, status)";
	 $sql .= " VALUES ('{$vis_requestor}','{$vis_department}','{$vis_name_of_equipment}','{$vis_issue}','pending')";
      
	 
      if($db->query($sql)){
       $_SESSION['status'] =  "Succesful Maintenance Request";
        $_SESSION['status_code'] =  "success";
        redirect('maintenance_approval.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('maintenance_approval.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('maintenance_approval.php.php',false);
   }
 }
?>


<?php include_once('layouts/header.php'); ?>

   
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
	body{
	    zoom: 50%;
	}
}
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
    

<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
<!-- Breadcrumb ------------------------------------------------------------------------------------------------>
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="visitorinformation.php" class="breadcrumbs__item is-active">List of Maintenance Request</a>
</nav>
<!-- /Breadcrumb ------------------------------------------------------------------------------------------------>

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
         <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Table of Maintenance Request</span>
		
		<div class="text-end">
		     <a  class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal">Maintenance Request</a>
          <button onclick="print()" id="button" class="btn btn-info md-2"><i class="bi bi-file-post"></i> Print report</button>
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
               <th class="text-center" style="width: 50px;">Request Id</th>
				
                <th>Requestor</th>
                <th>Department</th>
                <th>Facility</th>
                <th>Issue</th>
                <th>Status</th>
                <th>Date</th>
                <th class="text-center" style="width: 100px;">Actions</th>
              </tr>
            </thead>
            <tbody>

          <?php foreach ($all_maintenance_request as $visitor):?>
          <tr>
          <td><?php echo remove_junk(ucfirst($visitor['id'])); ?></td>
                    
         
					    <td><?php echo remove_junk(ucfirst($visitor['requestor'])); ?></td>
						 <td><?php echo remove_junk(ucfirst($visitor['department'])); ?></td>
						  <td><?php echo remove_junk(ucfirst($visitor['name_of_equipment'])); ?></td>
						   
						    <td><?php echo remove_junk(ucfirst($visitor['issue'])); ?></td>
							 <td><?php if($visitor['status'] == 'approved'){ ?>
            <span class="badge rounded-pill bg-success">
            <?php echo remove_junk(ucwords($visitor['status']))?></span>
            <?php }else{ ?>
            <span class="badge rounded-pill bg-danger"> <?php echo remove_junk(ucwords($visitor['status'])); }?></span></td>
							 <td><?php echo remove_junk(ucfirst($visitor['date'])); ?></td>
							  
						    
                    <td class="text-center">
                      <div class="btn-group">
                      <a href="approve_maintenance.php?id=<?php echo $visitor['id'];?>" class="btn btn-sm btn-success" style="margin-right: 5px;"><i class="bi bi-check"></i></a>
                           
                      <a href="reject_maintenance.php?id=<?php echo $visitor['id'];?>" class="btn btn-sm btn-danger"><i class="bi bi-x"></i></a>
                      </div>
                    </td>

                </tr>       
            <?php endforeach; ?>

            </tbody>
            
          </table>
        </div>
      </div>
    </div>
  
  
  
  <!-- add visitor-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	
        <h5 class="badge rounded-pill bg-success" class="modal-title" id="exampleModalLabel">Maintenance Request</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form method="post" action="maintenance_approval.php">
          <div class="form-group">
                
				<input type="text" class="form-control" name="visitor-requestor" placeholder="Requestor" required><br>
				<input type="text" class="form-control" name="visitor-department" placeholder="Department" required><br>
				<input type="text" class="form-control" name="visitor-name_of_equipment" placeholder="Name of Facility" required><br>
				<input type="text" class="form-control" name="visitor-issue" placeholder="issue" required><br>
        </div>
		    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="add_vis" class="btn btn-primary">Save changes</button>
      </div>
      </form>
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
