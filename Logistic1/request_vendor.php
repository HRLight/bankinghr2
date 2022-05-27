<?php
  $page_title = 'Request Vendor';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
 $all_contract = find_all('vendor_request_tbl')
?>
<!-- add visitor function ------------------------------------------------------------------------------------------------------------------------------ -->
<?php
 if(isset($_POST['add_vis'])){
    $req_fields = array('id','fname', 'mname' , 'lname' , 'position' , 'department' , 'req_type' ,'status');
   
	validate_fields($req_field);
	
	$vis_id = remove_junk($db->escape($_POST['visitor-id']));
	$vis_fname = remove_junk($db->escape($_POST['visitor-fname']));
	$vis_mname = remove_junk($db->escape($_POST['visitor-mname']));
	$vis_lname = remove_junk($db->escape($_POST['visitor-lname']));
	$vis_position = remove_junk($db->escape($_POST['visitor-position']));
	$vis_department = remove_junk($db->escape($_POST['visitor-department']));
	$vis_req_type = remove_junk($db->escape($_POST['visitor-req_type']));
	
	
   
   
   if(empty($errors)){
	$sql  = "INSERT INTO vendor_request_tbl ( id, fname, mname, lname, position,department,req_type, status)";
	$sql .= "VALUES ('{$vis_id}','{$vis_fname}','{$vis_mname}','{$vis_lname}','{$vis_position}','{$vis_department}','{$vis_req_type}','Pending')";
      
	 
      if($db->query($sql)){
       $_SESSION['status'] =  "Succesful Added New Visitor";
        $_SESSION['status_code'] =  "success";
        redirect('request_vendor.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('request_vendor.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('request_vendor.php',false);
   }
 }
?>
<!-- add visitor function -------->
<link rel="icon" href="https://webstockreview.net/images/bank-clipart-transparent-background-9.png" type="image/icon type">
<style>
#request_contract{
	margin: 10px;
}
#wrapper{
	background-color: white;
	width: 95%;
	margin: 2% auto;
	margin-left: 2%;
	padding: 2%;
	webkit-box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42); 
	box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42);
}
#box{
	border: solid black 1px;
}
</style>
<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Vendor Request</a>
</nav>
<hr style="margin-top: 0px; border-top: solid grey 2px;">
<!-- /Breadcrumb -->


<div class="col-md-12 mb-3" id="wrapper">
    <div class="card">
      <div class="card-header">
        <span class="badge square-pill bg-success"><i class="bi bi-list"></i> Vendor Request</span>
      </div>
	<div class="text-end">
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" id="request_contract" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
		 + Add Vendor Request
		</button>
	</div>
    

      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
			    <th>ID</th>
                <th>Name of Requestor</th>
                <th>Position</th>
                <th>Department</th>
                <th>Request Type</th>
                <th>Status</th>
                <th>Date of Request</th>
              </tr>
            </thead>
					<tbody>

						<?php foreach ($all_contract as $visitor):?>
							<tr>
								<td><?php echo remove_junk(ucfirst($visitor['id'])); ?></td>
								
								
								<td><?php echo remove_junk(ucfirst($visitor['fname'].' '.$visitor['mname'].' '.$visitor['lname'])); ?></td>
								<td><?php echo remove_junk(ucfirst($visitor['position'])); ?></td>
								<td><?php echo remove_junk(ucfirst($visitor['department'])); ?></td>
								<td><?php echo remove_junk(ucfirst($visitor['req_type'])); ?></td>
								
								<td><?php if($visitor['status'] == 'Received'){ ?>
								<span class="badge rounded-pill bg-success">
								<?php echo remove_junk(ucwords($visitor['status']))?></span>
								<?php }else{ ?>
								<span class="badge rounded-pill bg-danger"> <?php echo remove_junk(ucwords($visitor['status'])); }?></span></td>
								
								<td><?php echo remove_junk(ucfirst($visitor['date_of_request'])); ?></td>
										
							</tr>       
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
    </div>
</div>





<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h5 class="modal-title" id="staticBackdropLabel">Insert Request Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
        
			
			<form method="post" action="request_vendor.php">
			<div class="card-body">     
				<div class="col-md-12">
					<div class="row">
						<div class="form-group">
							<div class="col-md-5 float-end">
							<input id="box" type="text" class="form-control" name="visitor-department" value="LOGISTIC1" disabled><br>
							<input type="text" class="form-control" name="visitor-department" value="LOGISTIC1" hidden>
							</div>
							
							<div class="col-md-5">
							<input id="box" type="number" class="form-control" name="visitor-id" placeholder="ID" required><br>
							</div>
							
							<div class="col-md-5 float-end">
							<input id="box" type="text" class="form-control" name="visitor-position" placeholder="Position" required><br>
							</div>
							
							<div class="col-md-5 float-start">
							<input id="box" type="text" class="form-control" name="visitor-fname" placeholder="First Name" required><br>
							</div>
							
							<div class="col-md-5 float-end">
							<input id="box" type="text" class="form-control" name="visitor-req_type" value="Vendor Request" disabled><br>
							<input type="text" class="form-control" name="visitor-req_type" value="Vendor Request" hidden>
							</div>
							
							<div class="col-md-5">
							<input id="box" type="text" class="form-control" name="visitor-mname" placeholder="Middle Name" required><br>
							</div>
							
							
							<div class="col-md-5 float-start">
							<input id="box" type="text" class="form-control" name="visitor-lname" placeholder="Last Name" required><br>
							</div>
							
							
							
							
							
							
							
							
						</div>
		    <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" name="add_vis" class="btn btn-primary">Save changes</button>
			</div>
					</div>
				</div>
			</div>
			</form>
		</div>
	  </div>
    </div>
  </div>
</div>





<?php include_once('layouts/footer.php'); ?>