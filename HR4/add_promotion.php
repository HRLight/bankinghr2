<?php
  $page_title = 'Add Promotion';
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

  <a href="job-planning.php" class="breadcrumbs__item">Promoted List</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Add Promotion</a>
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
        <span class="badge rounded-pill bg-primary"><i class="bi bi-plus"></i> Add Promotion</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="add-promotion.php" method="POST">
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Employee ID</label>
                    <div class="col-md-8">
                    <?php
                    $resultSet = $conn->query("SELECT * FROM users WHERE NOT employee_id='' ORDER BY employee_id ASC");
                    ?>
                    <select name="add_peid" class="form-control" required>
                    <?php 
                    while ($rows =$resultSet->fetch_assoc()) {
                    $empid = $rows['employee_id'];
                    echo "<option value='$empid'> $empid </option>";
                    }
                    ?>
                    </select>
                    </div>
                  </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-4">From</label>
                    <div class="col-md-8">
                    <?php
                    $resultSet = $conn->query("SELECT * FROM type ORDER BY tp_id ASC");
                    ?>
                    <select name="add_from" class="form-control" required>
                    <?php 
                    while ($rows =$resultSet->fetch_assoc()) {
                    $tp = $rows['tp_name'];
                    echo "<option value='$tp'> $tp </option>";
                    }
                    ?>
                    </select>
                    </div>
                  </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-4">To</label>
                    <div class="col-md-8">
                    <?php
                    $resultSet = $conn->query("SELECT * FROM type ORDER BY tp_id ASC");
                    ?>
                    <select name="add_to" class="form-control" required>
                    <?php 
                    while ($rows =$resultSet->fetch_assoc()) {
                    $tp = $rows['tp_name'];
                    echo "<option value='$tp'> $tp </option>";
                    }
                    ?>
                    </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Promotion Date</label>
                    <div class="col-md-8">
                      <input type="date" name="add_date" class="form-control">
                    </div>
                  </div>
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="addpromtbtn" class="btn btn-primary text-white">Submit</button>
                      <a href="promoted-list.php" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
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
