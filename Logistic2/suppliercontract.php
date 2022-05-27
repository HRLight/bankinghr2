<?php
	$page_title = 'Contracts';
  require_once('includes/log2load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
    $all_request_contract = find_all_request('request_contract');
?>
<?php
$all_logistic2files = find_all('logistic2files');
?>


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
        redirect('suppliercontract.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('suppliercontract.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('suppliercontract.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb ------------------------------------------------------------------------------------------------>
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a class="breadcrumbs__item is-active">Supplier Contract</a>
</nav>
<!-- /Breadcrumb ------------------------------------------------------------------------------------------------>

<br>
<nav class="breadcrumbs">
 
  
		<a href="suppliercontract.php"><button type="button" class="btn btn-primary">BACK</button></a> 
		<a href="logistic2contract.php"><button type="button" class="btn btn-light">Supplier Contract</button></a> 
		
</nav>



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
         <span class="badge box bg-success"><i class="bi bi-table"></i>Request Contract </span>
		 <div class="text-end">
          <a  class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal"> Request Contract</a>
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
                <th>Name of requestor</th>
				<th>Department</th>
                <th>Type of Contract</th>
                <th>Status</th>
                <th class="text-center" style="width: 100px;">Actions</th>
              </tr>
            </thead>
            <tbody>

          <?php foreach ($all_request_contract as $contract):?>
          <tr>
					
					
					<td><?php echo remove_junk(ucfirst($contract['fname'].' '.$contract['mname'].' '.$contract['lname'])); ?></td>
					<td><?php echo remove_junk(ucfirst($contract['department'])); ?></td>
					<td><?php echo remove_junk(ucfirst($contract['type_of_contract'])); ?></td>
					
					
					<td><?php if($contract['status'] == 'Approve'){ ?>
					<span class="badge rounded-pill bg-success">
					<?php echo remove_junk(ucwords($contract['status']))?></span>
					<?php }else{ ?>
					<span class="badge rounded-pill bg-danger"> <?php echo remove_junk(ucwords($contract['status'])); }?></span></td>
							
							  
						    
                    <td class="text-center">
                      <div class="btn-group">
                      <a href="#.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-success" style="margin-right: 5px;"><i class="bi bi-pencil"></i></a>
                           
                      <a href="#.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-danger" style="margin-right: 5px;"><i class="bi bi-trash"></i></a>
					  <a href="#.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-archive"></i></a>
                      </div>
                    </td>

                </tr>       
            <?php endforeach; ?>

            </tbody>
            
          </table>
        </div>
      </div>
    </div>
	
	
	
  
  
  <!-- Modal -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Project Contract Request</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
        
			
			<form method="post" action="suppliercontract.php">
			<div class="form-group">
                
				<input type="number" class="form-control" name="visitor-req_id" placeholder="Request Id" required><br>
				<input type="text" class="form-control" name="visitor-class" value="Contractor" required ><br>
				<input type="text" class="form-control" name="visitor-first_name" placeholder="First Name" required><br>
				<input type="text" class="form-control" name="visitor-middle_name" placeholder="Middle Name" required><br>
				<input type="text" class="form-control" name="visitor-last_name" placeholder="Last Name" required><br>
				
				<input type="text" class="form-control" name="visitor-department" value="LOGISTIC2" readonly><br>
				
				<input type="text" class="form-control" name="visitor-contract" value="Supplier Contract" readonly required><br>
				
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
</div>

 



<?php include_once('layouts/footer.php'); ?>
