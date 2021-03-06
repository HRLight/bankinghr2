<?php
  $page_title = 'Add Salary';
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
  <a href="#checkout" class="breadcrumbs__item is-active">Add Salary</a>
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

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-primary"><i class="bi bi-plus"></i> Add Salary</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="add-salary.php" method="POST">
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Position</label>
                    <div class="col-md-8">
                    <?php
                    $resultSet = $conn->query("SELECT * FROM positions  ORDER BY pos_name ASC");
                    ?>
                    <select name="add_peid" class="form-control" required>
					<option value="">Select Position</option>
                    <?php 
                    while ($rows =$resultSet->fetch_assoc()) {
                    
                    echo "<option value='".$rows['pos_id']."'>".$rows['pos_name']." </option>";
                    }
                    ?>
                    </select>
                    </div>
                  </div>
                 
                 
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Salary Date</label>
                    <div class="col-md-8">
                      <input type="date" name="add_pdate" class="form-control">
                    </div>
                  </div>
                  <br>
                  
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="addsalarybtn" class="btn btn-primary text-white">Submit</button>
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
