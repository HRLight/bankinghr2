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
   
   $id = $_GET['id'];
     $sql ="SELECT resignations.*,employees.*,positions.*,departments.* FROM resignations ";
         $sql .="JOIN employees ON resignations.employee_id = employees.employee_id JOIN positions ";
         $sql .="ON employees.pos_id = positions.pos_id JOIN departments ON positions.dept_id = ";
         $sql .="departments.dept_id WHERE resignations.employee_id = '$id'";
         $res = $db->query($sql);
         $row = $res->fetch_assoc();
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
    <a href="ResignationApproval.php" class="breadcrumbs__item">Back</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">View</a>
</nav>
<!-- /Breadcrumb -->



<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
    Dropdown
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdown">
    <li><a href="FinanceApproval.php" class="dropdown-item">Financial Request</a></li>
    <li><a class="dropdown-item" href="Budget_Request.php">Budget Request</a></li>
    <li><a class="dropdown-item" href="Budget_Request.php">Consolodation Request</a></li>
        <li><a class="dropdown-item" href="ResignationApproval.php">Resignation Request</a></li>

  
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

 <section class="vh-100 bg-image"
  
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">View Resignation Information</h2>

             <form action="edit-visitor.php" method="POST">
			
                <div class="form-outline mb-4">
				
				
                  <input type="text" name="" value="<?php echo $row['employee_id']; ?>" class="form-control" disabled>
				
                  <label class="form-label" for="form3Example1cg">Employee Id</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" class="form-control " disabled>
                  <label class="form-label" for="form3Example3cg">LASTNAME</label>
                </div>

                <div class="form-outline mb-4">
               <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" class="form-control" disabled>
                  <label class="form-label" for="form3Example4cg">FIRSTNAME</label>
                </div>

                <div class="form-outline mb-4">
                 <input type="text" name="middle_name" value="<?php echo $row['middle_name']; ?>" class="form-control"disabled>
                  <label class="form-label" for="form3Example4cdg">MIDDLE NAME</label>
                </div>
				
				<div class="form-outline mb-4">
                 <input type="text" name="department" value="<?php echo $row['department']; ?>" class="form-control" disabled>
                  <label class="form-label" for="form3Example4cdg">DEPARTMENT</label>
                </div>
				
				<div class="form-outline mb-4">
                 <input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control" disabled>
                  <label class="form-label" for="form3Example4cdg">ADDRESS</label>
                </div>
				
				<div class="form-outline mb-4">
                 <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" disabled>
                  <label class="form-label" for="form3Example4cdg">EMAIL</label>
                </div>
				
				<div class="form-outline mb-4">
                 <input type="number" name="contact" value="<?php echo $row['contact_number']; ?>" class="form-control" disabled>
                  <label class="form-label" for="form3Example4cdg">CONTACT</label>
                </div>
				
				<div class="form-outline mb-4">
                 <input type="text" name="gender" value="<?php echo $row['gender']; ?>" class="form-control" disabled>
                  <label class="form-label" for="form3Example4cdg">GENDER</label>
                </div>
				
				<div class="form-outline mb-4">
                 <input type="text" name="visitor_type" value="<?php echo $row['pos_name']; ?>" class="form-control" disabled>
                  <label class="form-label" for="form3Example4cdg">POSITION</label>
                </div>
				
				<div class="form-outline mb-4">
                 <input type="text" name="visitor_type" value="<?php echo $row['dept_name']; ?>" class="form-control" disabled>
                  <label class="form-label" for="form3Example4cdg">DEPARTMENT</label>
                </div>
                	
				<div class="form-outline mb-4">
                 <input type="text" name="visitor_type" value="<?php echo $row['reason']; ?>" class="form-control" disabled>
                  <label class="form-label" for="form3Example4cdg">REASON FOR RESIGNATION</label>
                </div>
                	
				<div class="form-outline mb-4">
                 <input type="text" name="visitor_type" value="<?php echo $row['date_effective']; ?>" class="form-control" disabled>
                  <label class="form-label" for="form3Example4cdg">DATE EFFECTIVE</label>
                </div>
                

                <div class="d-flex justify-content-center mb-2">
                  <a href="approve_resignation.php?id=<?php echo $row['employee_id']; ?>"class="btn btn-success btn-sm  gradient-custom-4 text-body">Approve</a>
                  </div>
                <div class="d-flex justify-content-center">
                <a href="reject_resignation.php?id=<?php echo $row['employee_id']; ?>"class="btn btn-danger btn-sm gradient-custom-4 text-body">Reject</a>
                </div>
				</center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <script src="js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>

<?php include_once('layouts/footer.php'); ?>
