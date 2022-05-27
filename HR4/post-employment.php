<?php
  $page_title = 'Post Employment';
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

  <a href="#checkout" class="breadcrumbs__item is-active">Post Employment</a>
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-list"></i> Post Employment</span>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <?php
            $query = "SELECT resigned_employees.*,resignations.*,employees.*,positions.*,departments.* FROM resigned_employees";
            $query .= " JOIN resignations ON resigned_employees.employee_id = resignations.employee_id";
            $query .= " JOIN employees ON resigned_employees.employee_id = employees.employee_id JOIN positions ON";
            $query .= " employees.pos_id = positions.pos_id JOIN departments ON positions.dept_id = departments.dept_id";
            $query_run = mysqli_query($conn, $query);
            ?>
            <thead>
              <tr>
                
                <th>Employee ID</th>
                <th>Name</th>
                <th>Reason to Resign</th>
                <th>Resignation Date</th>
                <th>Status</th>
               
             </tr>
            </thead>
           <tbody>
            <?php
            if(mysqli_num_rows($query_run) > 0 )
            {
            while($row = mysqli_fetch_assoc($query_run))
            {
            $totalsal = "100";
            ?>
             <tr>
            
            <td><?php echo $row['employee_id']; ?></td>
            <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
            <td><?php echo $row['reason']; ?></td>
            <td><?php echo $row['date_resigned']; ?></td>
            <td>
            <?php
              if ($row['status'] === 'pending') {
                echo '<span class="badge rounded-pill bg-warning">'.$row['status'].'</span>';
              } else if ($row['status'] === 'approved') {
                echo '<span class="badge rounded-pill bg-success">'.$row['status'].'</span>';
              } else if ($row['status'] === 'rejected') {
                echo '<span class="badge rounded-pill bg-danger">'.$row['status'].'</span>';
              } else {
                echo '';
              }
            ?>
            </td>
           
             </tr>
              <?php
              }
              }
              else {
              echo "";
              }
              ?>
           </tbody>
         </table>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>

