<?php
  $page_title = 'Leave';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
 
?>
<?php include_once('layouts/user_header.php'); ?>

 <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <div class="card-header">
        <a href="file_leave.php" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i>File Leave</a>
      </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <?php
            $id = $user['employee_id'];
            $query = "SELECT * FROM leave_request WHERE employee_id = '$id'";
            $res = $db->query($query);
            $row = $res->fetch_assoc();
            $num = $res->num_rows;
            ?>
            <thead>
              <tr>
               
               
                 <th >Leave Type</th>
                 <th>Leave days</th>
                <th >Date Filed</th>
                <th >Date Start</th>
                <th >Date End</th>
                <th>Status</th>
                
                
             </tr>
            </thead>
           <tbody>
            <?php
            if($num > 0 )
            {
            
            do{
           
            ?>
             <tr>
           
            <td><?php echo $row['leave_type']?></td>
            <td><?php echo $row['days'] ;?></td>
            <td><?php echo $row['date_filed']; ?></td>
            <td><?php echo $row['date_start']; ?></td>
            <td><?php echo $row['date_end']; ?></td>
            <td><?php echo $row['status']; ?></td>
           
             </tr>
              <?php
              }while( $row = $res->fetch_assoc());
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


<?php include_once('layouts/user_footer.php'); ?>