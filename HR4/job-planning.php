<?php
  $page_title = 'Job Planning';
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

  <a href="#checkout" class="breadcrumbs__item is-active">Job Planning</a>
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
        <div class="text-end">
          <a href="add_plan.php" class="btn btn-primary btn-xs-block" type="button">
         <i class="bi bi-plus"></i>
          Add Plan
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
            $query = "SELECT jobplan.*, departments.*, positions.* FROM jobplan JOIN departments ON jobplan.dept_id = departments.dept_id";
			$query .= " JOIN positions ON jobplan.pos_id = positions.pos_id";
            $query_run = mysqli_query($conn, $query);
            ?>
            <thead>
              <tr>
                <th style="display: none">#</th>
				<th>Department</th>
                <th>Position</th>
                <th>Job Type</th>
                <th>Job Exp</th>
                <th>Salary Rate</th>
                <th>Daily Rate</th>
                <th>Hour Rate</th>
                <th>Overtime Rate</th>
                <th>Philhealth</th>
                <th>SSS</th>
                <th>PagIbig</th>
                <th>Tax</th>
                <th class="text-end">Action</th>
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
            <td style="display: none"><?php echo $row['jp_id']; ?></td>
			<td><?php echo $row['dept_name']; ?></td>
            <td><?php echo $row['pos_name']; ?></td>
            <td><?php echo $row['jp_type']; ?></td>
            <td><?php echo $row['jp_exp']; ?></td>
            <td><?php echo $row['jp_salrate']; ?></td>
            <td><?php echo $row['jp_drate']; ?></td>
            <td><?php echo $row['jp_hrate']; ?></td>
            <td><?php echo $row['jp_otrate']; ?></td>
            <td><?php echo $row['jp_ph']; ?></td>
            <td><?php echo $row['jp_sss']; ?></td>
            <td><?php echo $row['jp_pi']; ?></td>
            <td><?php echo $row['jp_tax']; ?></td>
            <td class="text-end">
              <a href="edit_plan.php?id=<?php echo $row['jp_id']; ?>&dept=<?php echo $row['dept_id']; ?>&pos=<?php echo $row['pos_id']; ?>" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>
              <a href="delete_plan.php?id=<?php echo $row['jp_id']; ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
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

