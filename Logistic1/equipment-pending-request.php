
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>

<?php
  $page_title = 'Pending Request ';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
    $all_request_equipment = find_all('request_equipment')
?>

<?php
 if(isset($_POST['add_vis'])){
    $req_fields = array('lname','fname','mname','department','position','list_equipment_request','position','status');
   
   validate_fields($req_field);
	
	$vis_lname = remove_junk($db->escape($_POST['visitor-lname']));
	$vis_fname = remove_junk($db->escape($_POST['visitor-fname']));
		$vis_mname= remove_junk($db->escape($_POST['visitor-mname']));
			$vis_department = remove_junk($db->escape($_POST['visitor-department']));
				$vis_list_equipment_request = remove_junk($db->escape($_POST['visitor-list_equipment_request']));
					$vis_position = remove_junk($db->escape($_POST['visitor-position']));
						$vis_status = remove_junk($db->escape($_POST['visitor-status']));
				        	

   
   
   if(empty($errors)){
      $sql  = "INSERT INTO request_equipment ( lname, fname, mname, department, list_equipment_request, position, status)";
	 $sql .= " VALUES ('{$vis_lname}','{$vis_fname}','{$vis_mname}','{$vis_department}','{$vis_list_equipment_request}','{$vis_position}','pending')";
      
	 
      if($db->query($sql)){
       $_SESSION['status'] =  "Succesful Maintenance Request";
        $_SESSION['status_code'] =  "success";
        redirect('equipment-pending-request.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('equipment-pending-request.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('equipment-pending-request.php',false);
   }
 }
?>






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

<?php include_once('layouts/header.php'); ?>

<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>


<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">Equipment Request</a>
</nav>


  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Equipment Request</span>
        <div class="text-end">
           
          <a  class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal">Equipment Request</a>
    
             
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
								<th>Last Name</th>
								<th>First Name</th>
								<th>Middle Name</th>
								<th>Department</th>
								<th>Position</th>
								<th>Date Request</th>
								<th>List Equipment</th>
								<th>Status</th>
								<th>Action</th>
								
							
                    
              </tr>
            </thead>
            <tbody>

           <?php foreach ($all_request_equipment as $loan):?>
                <tr>
						<td><?php echo remove_junk(ucfirst($loan['id'])); ?></td>
					    <td><?php echo remove_junk(ucfirst($loan['lname'])); ?></td>
						 <td><?php echo remove_junk(ucfirst($loan['fname'])); ?></td>
						  <td><?php echo remove_junk(ucfirst($loan['mname'])); ?></td>
						  <td><?php echo remove_junk(ucfirst($loan['department'])); ?></td>
						  <td><?php echo remove_junk(ucfirst($loan['position'])); ?></td>
						  <td><?php echo remove_junk(ucfirst($loan['time_date_request'])); ?></td>
						  <td><?php echo remove_junk(ucfirst($loan['list_equipment_request'])); ?></td>
            			<td><?php if($loan['status'] == 'approved'){ ?>
                        <span class="badge rounded-pill bg-success">
                        <?php echo remove_junk(ucwords($loan['status']))?></span>
                        <?php }else{ ?>
                        <span class="badge rounded-pill bg-danger"> <?php echo remove_junk(ucwords($loan['status'])); }?></span></td>
							 
							  
                    <td class="text-center">
                      <div class="btn-group">
                       
                      <a href="#.php?id=<?php echo $loan['id'];?>" class="btn btn-sm btn-danger"><i class="bi bi-eye"></i></a>
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


 <!-- add visitor-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	
        <h5 class="badge rounded-pill bg-success" class="modal-title" id="exampleModalLabel">Create Equipment Request</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form method="post" action="equipment-pending-request.php">
          <div class="form-group">
                
				<input type="text" class="form-control" name="visitor-lname" placeholder="Last Name" required><br>
				<input type="text" class="form-control" name="visitor-fname" placeholder="First Name" required><br>
					<input type="text" class="form-control" name="visitor-mname" placeholder="Middle Name" required><br>
						<input type="text" class="form-control" name="visitor-department" placeholder="Department" required><br>
							<input type="text" class="form-control" name="visitor-position" placeholder="Position" required><br>
							<input type="text" class="form-control" name="visitor-list_equipment_request" placeholder="List of Equipment" required><br>
				
				
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
