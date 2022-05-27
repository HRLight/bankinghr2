<?php
  $page_title = 'Payroll';
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

  <a href="#checkout" class="breadcrumbs__item is-active">Payroll</a>
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
          <h6>Current Budget: $<?php echo total_budget(); ?></h6>
        <div class="text-end">
          <a href="add_salary.php" class="btn btn-primary btn-xs-block" type="button">
         <i class="bi bi-plus"></i>
          Add Salary
         </a>
          <a href="request_budget.php" class="btn btn-primary btn-xs-block" type="button">
         <i class="bi bi-plus"></i>
          Request Budget
         </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <?php
            $query = "SELECT payroll.*,positions.*, jobplan.* FROM payroll JOIN positions ON payroll.pos_id = positions.pos_id";
			$query .= " JOIN jobplan ON positions.pos_id = jobplan.pos_id";
            $query_run = mysqli_query($conn, $query);
            ?>
            <thead>
              <tr>
               
               
                 <th >Position</th>
                <th >Total Salary Allocation</th>
                <th >Salary Date</th>
                <th>Cut-Off Range</th>
                
                <th >Action</th>
             </tr>
            </thead>
           <tbody>
            <?php
            if(mysqli_num_rows($query_run) > 0 )
            {
            while($row = mysqli_fetch_assoc($query_run))
            {
           
            ?>
             <tr>
            <td style="display: none"><?php echo $row['p_id']; ?></td>
            <td><?php echo $row['pos_name']; ?></td>
            <td>₱<?php echo $row['total_allocation'] ;?></td>
            <td><?php echo $row['p_date']; ?></td>
           <td><?php echo $row['cutoff_start'].' to '.$row['cutoff_end']; ?></td>
            <td >
              <a href="generate_payslip.php?pid=<?php echo $row['p_id'].'&pos='.$row['pos_id'].'&plan='.$row['jp_id'];?>" class="btn btn-sm btn-primary">Generate Payslip</a>
              <a href="edit_salary.php?id=<?php echo $row['p_id'];?>" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>
              <a href="delete_salary.php?id=<?php echo $row['p_id'];?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
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

