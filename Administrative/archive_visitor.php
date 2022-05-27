<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>

<?php
	$page_title = 'Archive Visitor Information';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
    $all_visitor_registration = find_all('visitor_registration')
    
	
?>

<?php
    $all_archive_visitor_registration = find_all('archive_visitor_registration')
?>





<!-- add visitor function ------------------------------------------------------------------------------------------------------------------------------ -->
<?php
 if(isset($_POST['add_vis'])){
    $req_fields = array('last_name','first_name', 'middle_name' , 'department' , 'address' , 'email' , 'contact' , 'gender' , 'visitor_type' , 'visitor_purpose');
   
   validate_fields($req_field);
	
	$vis_last_name = remove_junk($db->escape($_POST['visitor-last_name']));
	$vis_first_name = remove_junk($db->escape($_POST['visitor-first_name']));
	$vis_middle_name = remove_junk($db->escape($_POST['visitor-middle_name']));
	$vis_department = remove_junk($db->escape($_POST['visitor-department']));
	$vis_address = remove_junk($db->escape($_POST['visitor-address']));
	$vis_email = remove_junk($db->escape($_POST['visitor-email']));
	$vis_contact = remove_junk($db->escape($_POST['visitor-contact']));
	$vis_gender = remove_junk($db->escape($_POST['visitor-gender']));
	$vis_visitor_type = remove_junk($db->escape($_POST['visitor-visitor_type']));
	$vis_visitor_purpose = remove_junk($db->escape($_POST['visitor-visitor_purpose']));
	
   
   
   if(empty($errors)){
      $sql  = "INSERT INTO visitor_registration ( last_name, first_name, middle_name, department, address, email, contact, gender, visitor_type, visitor_purpose)";
	 $sql .= " VALUES ('{$vis_last_name}','{$vis_first_name}','{$vis_middle_name}','{$vis_department}','{$vis_address}',' {$vis_email}','{$vis_contact}','{$vis_gender}','{$vis_visitor_type}','{$vis_visitor_purpose}')";
      
	 
      if($db->query($sql)){
       $_SESSION['status'] =  "Succesful Added New Visitor";
        $_SESSION['status_code'] =  "success";
        redirect('visitorinformation.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('visitorinformation.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('visitorinformation.php',false);
   }
 }
?>
<!-- add visitor function ---------------------------------------------------------------------------------------------------------------------------------------- -->


<?php include_once('layouts/header.php'); ?>

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
  <a href="visitorinformation.php" class="breadcrumbs__item is-active">Archive visitor information</a>
</nav>
<br>
<!-- /Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
   
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  
			<a href=" archive-request-contract.php"><button type="button" class="btn btn-light">Request Contract</button></a> 
		
		<a href="archive_rules_and_regulation.php"><button type="button" class="btn btn-light">Regulation</button></a> 
		<a href="archive_complain.php"><button type="button" class="btn btn-light">Complain</button></a>
		
		<a href="archive_request_complain.php"><button type="button" class="btn btn-light">Facility Complain</button></a>
		
		<a href="archive_visitor.php"><button type="button" class="btn btn-primary">Visitor Information</button></a>
		
		<a href="archive_facility_request.php"><button type="button" class="btn btn-light">Facility Request</button></a>
</nav>
<hr>


    <div class="card">
      <div class="card-header">
         <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Table of Visitor Information</span>
		
		<div class="text-end">
         
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
				
                <th>Fullname</th>
                <th>Department</th>
                <th>Address</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Gender</th>
                <th>Visitor Type</th>
				
				
                <th class="text-center" style="width: 100px;">Actions</th>
              </tr>
            </thead>
            <tbody>

          <?php foreach ($all_archive_visitor_registration as $visitors):?>
          <tr>
          <td><?php echo remove_junk(ucfirst($visitors['id'])); ?></td>
                    
          <td><?php echo remove_junk(ucfirst($visitors['first_name'].' '.$visitors['middle_name'].' '.$visitors['last_name'])); ?></td>
					    <td><?php echo remove_junk(ucfirst($visitors['department'])); ?></td>
						 <td><?php echo remove_junk(ucfirst($visitors['address'])); ?></td>
						  <td><?php echo remove_junk(ucfirst($visitors['email'])); ?></td>
						   
						    <td><?php echo remove_junk(ucfirst($visitors['contact'])); ?></td>
						    <td><?php echo remove_junk(ucfirst($visitors['gender'])); ?></td>
							 <td><?php echo remove_junk(ucfirst($visitors['visitor_type'])); ?></td>
							  
						    
                    <td class="text-center">
                      <div class="btn-group">
     
					  <a a href="restore-visitor.php?id=<?php echo $visitors['id'];?>" class="btn btn-sm btn-info" style="margin-right: 5px;"><i class="bi bi-arrow-counterclockwise"></i></a></div>
                      </div>
                    </td>

                </tr>       
            <?php endforeach; ?>

            </tbody>
            
          </table>
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
