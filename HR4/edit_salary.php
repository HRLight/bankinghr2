<?php
  $page_title = 'Edit Salary';
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

  <a href="payroll.php" class="breadcrumbs__item">Payroll</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Edit Salary</a>
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
  include('function.php');
  $payid = mysqli_real_escape_string($conn, $_GET['id']);

  $query = mysqli_query($conn, "SELECT payroll.*,positions.* FROM payroll JOIN positions ON payroll.pos_id = positions.pos_id WHERE payroll.p_id = {$payid}");
  $row = mysqli_fetch_array($query);
  ?>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-pencil"></i> Edit Salary</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="update-salary.php" method="POST">
                <input type="hidden" name="e_id" class="form-control" value="<?php echo $row['p_id'];?>">
                <div class="form-group row">
                    <label class="col-form-label col-md-4">Position</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['pos_name']?>" class="form-control" disabled> 
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Salary Date</label>
                    <div class="col-md-8">
                      <input type="date" name="sal_date" class="form-control" value="<?php echo $row['p_date'];?>">
                    </div>
                  </div>
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="editsalbtn" class="btn btn-primary text-white">Save</button>
                      <a href="payroll.php" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
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
