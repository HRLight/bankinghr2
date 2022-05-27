<?php
  $page_title = 'Promoted List';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $row=Recievables();
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->

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
         
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <?php
            $query = "SELECT promoted_list.*,employees.* FROM promoted_list JOIN employees ON promoted_list.employee_id = employees.employee_id WHERE promoted_list.status = 'promoted'";
            $query_run = mysqli_query($conn, $query);
            ?>
            <thead>
              <tr>
               
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>From</th>
                <th>To</th>
                <th>Promotion Date</th>
              
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
            <td style="display: none"><?php echo $row['pr_id']; ?></td>
            <td><?php echo $row['employee_id']; ?></td>
            <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
            <td><?php echo $row['from_pos']; ?></td>
            <td><?php echo $row['promotion_pos']; ?></td>
            <td><?php echo $row['promotion_date']; ?></td>
            
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

