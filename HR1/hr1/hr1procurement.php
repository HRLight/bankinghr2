<?php
  $page_title = 'Request Procurement';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   $all_request_hr1procurement = find_all_proc('request_procurement')
?>
<?php 
include "includes/config1.php";

// Insert record
if(isset($_POST['submit'])){
		
		$request_id = $_POST['req_id'];
		$position = $_POST['position'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$request_list = $_POST['request_list'];
		$department = $_POST['department'];
		$status = $_POST['status'];
		$date_of_request = $_POST['date_of_request'];

		if($req_id != ''){
			
			mysqli_query($con, "INSERT INTO request_procurement(request_id,position,fname,mname,lname,request_list,department,status,date_of_request) VALUES('".$request_id."','".$position."','".$fname.",'".$mname."','".$lname.",'".$request_list."','".$department.",'".$status.",'".$date_of_request."') ");
			header('location: hr1procurement.php');
		}
	}

?>
<!-- add code -->
<?php
 if(isset($_POST['add_vis'])){
    $req_fields = array('req_id','req_class', 'fname' , 'mname' , 'lname' , 'type_of_contract' , 'department' , 'status');
   
	validate_fields($req_field);
	
	$vis_req_id = remove_junk($db->escape($_POST['visitor-req_id']));
	$vis_class = remove_junk($db->escape($_POST['visitor-class']));
	$vis_first_name = remove_junk($db->escape($_POST['visitor-first_name']));
	$vis_middle_name = remove_junk($db->escape($_POST['visitor-middle_name']));
	$vis_last_name = remove_junk($db->escape($_POST['visitor-last_name']));
	$vis_contract = remove_junk($db->escape($_POST['visitor-contract']));
	$vis_department = remove_junk($db->escape($_POST['visitor-department']));
	
	
   
   
   if(empty($errors)){
	$sql  = "INSERT INTO request_contract ( req_id, req_class, fname, mname, lname,type_of_contract, department, status)";
	$sql .= "VALUES ('{$vis_req_id}','{$vis_class}','{$vis_first_name}','{$vis_middle_name}','{$vis_last_name}',' {$vis_contract}','{$vis_department}','Pending')";
      
	 
      if($db->query($sql)){
       $_SESSION['status'] =  "Succesful Added New Visitor";
        $_SESSION['status_code'] =  "success";
        redirect('project_request.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('project_request.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('project_request.php',false);
   }
 }
?>
<link rel="icon" href="https://webstockreview.net/images/bank-clipart-transparent-background-9.png" type="image/icon type">
<style>
#request_contract{
	margin: 10px;
}
</style>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="manager.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Request List</a>
  
</nav>
  <hr>
<!-- /Breadcrumb -->
<div class="col-md-12 mb-3 card-header" id="wrapper">
	<div class="card">
		<div class="card-header">
			<span class="badge square-pill bg-success"><i class="bi bi-list"></i> Request to Procurement</span>
		</div>
		
		<div class="text-end">
			<!-- Button trigger modal -->
			<a href="add_procurement_request.php" type="button" class="btn btn-primary" id="request_contract">
			 + Request to Procurement
			</a>
		</div>
		
		<div class="card-body">
			<div class="table-responsive">
				<table id="example" class="table table-striped data-table" style="width: 100%">
					<thead>
					  <tr>
						<th>Request Id</th>
						<th>Position</th>
						<th>Name of Requestor</th>
						<th>Department</th>
						<th>Status</th>
						
					   
					   
						<th>Date of Request</th>
						<th class="text-center" style="width: 100px;">Actions</th>
					  </tr>
					</thead>
			
					<tbody>
					<?php foreach ($all_request_hr1procurement as $procurements):?>
						<tr>
							<td><?php echo remove_junk(ucfirst($procurements['req_id'])); ?></td>
							<td><?php echo remove_junk(ucfirst($procurements['position'])); ?></td>
							<td><?php echo remove_junk(ucfirst($procurements['fname'].' '.$procurements['mname'].' '.$procurements['lname'])); ?></td>
							<td><?php echo remove_junk(ucfirst($procurements['department'])); ?></td>
							<td><?php echo remove_junk(ucfirst($procurements['status'])); ?></td>
							<td><?php echo remove_junk(ucfirst($procurements['date_of_request'])); ?></td>
							<td>
							<center>
								<div class="btn-group">
								   <a href="view_detail_request.php?id=<?php echo $procurements['id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
								</div>
							</center>
							</td>
						</tr>       
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php include_once('layouts/footer.php'); ?>