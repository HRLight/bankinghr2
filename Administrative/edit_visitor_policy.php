
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>
<?php
  $page_title = 'Edit Visitor Information';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $row=Recievables();
?>
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

 
  <a href="#checkout" class="breadcrumbs__item is-active">Edit Information</a>
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

  <?php
  require_once('includes/config1.php');
  $resignid = mysqli_real_escape_string($conn, $_GET['id']);

  $query = mysqli_query($conn, "SELECT * FROM visitorpolicy WHERE id = {$resignid}");
  $row = mysqli_fetch_array($query);
  ?>



<?php include_once('layouts/footer.php'); ?>

<section class="vh-100 bg-image"
  
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Edit Visitor Policy</h2>

             <form action="edit-visitor-policy.php" method="POST">
			
                <div class="form-outline mb-4">
                  <input type="text" name="" value="<?php echo $row['id']; ?>" class="form-control" disabled>
				<input type="hidden" name="id" value="<?php echo $row['id']; ?>" class="form-control">
                  <label class="form-label" for="form3Example1cg">Id</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="policy" value="<?php echo $row['policy']; ?>" class="form-control ">
                  <label class="form-label" for="form3Example3cg">Policy</label>
                </div>
                
                <div class="form-outline mb-4">
                  <input type="text" name="description" value="<?php echo $row['description']; ?>" class="form-control ">
                  <label class="form-label" for="form3Example3cg">Description</label>
                </div>

                <div class="form-outline mb-4">
               <input type="text" name="datecreated" value="<?php echo $row['datecreated']; ?>" class="form-control" disabled>
                  <label class="form-label" for="form3Example4cg">Date Created</label>
                </div>
                <div class="d-flex justify-content-center">
                  <button type="submit" name="updtplanbtn" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Save</button>
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