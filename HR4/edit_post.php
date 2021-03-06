<?php
  $page_title = 'Edit Post';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $row=Recievables();
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="post-employment.php" class="breadcrumbs__item">Post Employment</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Edit Post</a>
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
  $resignid = mysqli_real_escape_string($conn, $_GET['id']);

  $query = mysqli_query($conn, "SELECT * FROM resigned rs, users u WHERE u.employee_id=rs.rs_eid AND rs_id = {$resignid}");
  $row = mysqli_fetch_array($query);
  ?>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-pencil"></i> Edit Post</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="update-post.php" method="POST">
                <input type="hidden" name="e_id" value="<?php echo $row['rs_id']; ?>" class="form-control">
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Employee Name</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['name']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Employee ID</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['rs_eid']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Reason to Resign or Fired</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['rs_reason']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Resignation Date</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['rs_date']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="upbtnapprvd" class="btn btn-success text-white">Approved</button>
                      <button type="submit" name="upbtnreject" class="btn btn-danger text-white">Reject</button>
                      <a href="post-employment.php" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include_once('layouts/footer.php'); ?>
