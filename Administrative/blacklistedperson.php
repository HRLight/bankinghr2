<?php
	$page_title = 'Blacklisted Person';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
    $all_blacklist_person = find_all('blacklist_person')
?>





<!-- add visitor function ------------------------------------------------------------------------------------------------------------------------------ -->
<?php
 if(isset($_POST['add_vis'])){
    $req_fields = array('fname','mname', 'lname' , 'contact_no' , 'contact_no' , 'reason');
   
   validate_fields($req_field);
	
	$vis_fname = remove_junk($db->escape($_POST['visitor-fname']));
	$vis_mname = remove_junk($db->escape($_POST['visitor-mname']));
	$vis_lname = remove_junk($db->escape($_POST['visitor-lname']));
	$vis_contact_no = remove_junk($db->escape($_POST['visitor-contact_no']));
	$vis_company_department = remove_junk($db->escape($_POST['visitor-company_department']));
	$vis_reason = remove_junk($db->escape($_POST['visitor-reason']));
	
	
   
   
   if(empty($errors)){
      $sql  = "INSERT INTO blacklist_person ( fname, mname, lname, contact_no, company_department, reason)";
	 $sql .= " VALUES ('{$vis_fname}','{$vis_mname}','{$vis_lname}','{$vis_contact_no}','{$vis_company_department}',' {$vis_reason}')";
      
	 
      if($db->query($sql)){
        $_SESSION['status'] =  "Succesful Added New Blacklisted Person";
        $_SESSION['status_code'] =  "success";
        redirect('blacklistedperson.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('blacklistedperson.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('blacklistedperson.php',false);
   }
 }
?>
<!-- add visitor function ---------------------------------------------------------------------------------------------------------------------------------------- -->


<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb ------------------------------------------------------------------------------------------------>
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="/blacklistedperson.php" class="breadcrumbs__item is-active">List of blacklist person</a>
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
         <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Table of Blacklisted Person</span>
		
		<div class="text-end">
          <a href="register_visitor.php" class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal">+ ADD PERSON</a>
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
               <th class="text-center" style="width: 50px;">Id</th>
				
                <th>Fullname</th>
               
				
                <th>Contact Number</th>
                <th>Company/Department</th>
                <th>Reason</th>
                <th>Date</th>
                <th class="text-center" style="width: 100px;">Actions</th>
              </tr>
            </thead>
            <tbody>

          <?php foreach ($all_blacklist_person as $visitor):?>
          <tr>
          <td><?php echo remove_junk(ucfirst($visitor['id'])); ?></td>
                    
          <td><?php echo remove_junk(ucfirst($visitor['fname'].' '.$visitor['mname'].' '.$visitor['lname'])); ?></td>
		  
					    <td><?php echo remove_junk(ucfirst($visitor['contact_no'])); ?></td>
						 <td><?php echo remove_junk(ucfirst($visitor['company_department'])); ?></td>
						  <td><?php echo remove_junk(ucfirst($visitor['reason'])); ?></td>
						    <td><?php echo remove_junk(ucfirst($visitor['date'])); ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                      <a href="edit_blacklisted.php?id=<?php echo $visitor['id'];?>" class="btn btn-sm btn-success" style="margin-right: 5px;"><i class="bi bi-pencil"></i></a>
                           
                      <a href="delete_blacklisted.php?id=<?php echo $visitor['id'];?>" class="btn btn-sm btn-danger" style="margin-right: 5px;"><i class="bi bi-trash"></i></a>
					      <a href="view_blacklistedperson.php?id=<?php echo $complainant['id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
                      </div>
                      </div>
                    </td>

                </tr>       
            <?php endforeach; ?>

            </tbody>
            
          </table>
        </div>
      </div>
    </div>
  
  
  
  <!-- add blacklisted-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	
        <h5 class="badge rounded-pill bg-success" class="modal-title" id="exampleModalLabel">Adding Blacklisted Person</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form method="post" action="blacklistedperson.php">
          <div class="form-group">
                
				<input type="text" class="form-control" name="visitor-fname" placeholder="first Name" required><br>
				<input type="text" class="form-control" name="visitor-mname" placeholder="Middle Name" required><br>
				<input type="text" class="form-control" name="visitor-lname" placeholder="Last Name" required><br>
				<input type="number" class="form-control" name="visitor-contact_no" placeholder="Contact no#" required><br>
				<input type="text" class="form-control" name="visitor-company_department" placeholder="Company Department" required><br>
				<input type="text" class="form-control" name="visitor-reason" placeholder="Reason" required><br>
				
				
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




<?php include_once('layouts/footer.php'); ?>
