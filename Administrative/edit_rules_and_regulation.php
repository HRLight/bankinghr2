
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>
<?php
  $page_title = 'Edit Rules and Regulation';
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

  $query = mysqli_query($conn, "SELECT * FROM rules_and_regulation WHERE id = {$resignid}");
  $row = mysqli_fetch_array($query);
  ?>

<div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge square-pill bg-success"><i class="bi bi-pencil"></i> Edit Rules and Regulation</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-7">
            <div class="card-box">
              <form action="edit-regulation.php" method="POST">
			  
			  <div class="form-group row">
                  <label class="col-form-label col-md-4">Id</label>
                    <div class="col-md-8">
                <input type="text" name="" value="<?php echo $row['id']; ?>" class="form-control" disabled>
				<input type="hidden" name="id" value="<?php echo $row['id']; ?>" class="form-control">
				 </div>
                  </div>
			
				
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Ra-No</label>
                    <div class="col-md-8">
                      <input type="text" name="ra_no" value="<?php echo $row['ra_no']; ?>" class="form-control ">
                    </div>
                  </div>
		
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Date Created</label>
                    <div class="col-md-8">
                      <input type="text" name="date" value="<?php echo $row['date']; ?>" class="form-control">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Description</label>
                    <div class="col-md-8">
                      <input type="text" name="Description" value="<?php echo $row['Description']; ?>" class="form-control">
                    </div>
                  </div>
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="updtplanbtn" class="btn btn-primary text-white">Save</button>
                      <a href="rulesandregulation.php" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
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
