<?php
  $page_title = 'Resignation';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
 
?>
<?php include_once('layouts/user_header.php'); ?>

 <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <div class="card-header">
        <a href="file_resignation.php" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i>File Resignation</a>
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
            $query = "SELECT * FROM resignations WHERE employee_id = '$id'";
            $res = $db->query($query);
            $row = $res->fetch_assoc();
            $num = $res->num_rows;
            ?>
            <thead>
              <tr>
               
               
                 <th >Date Filed</th>
                 <th>Reason</th>
                <th >Date Effective</th>
                <th >Status</th>
               
                
                
             </tr>
            </thead>
           <tbody>
            <?php
            if($num > 0 )
            {
            
            do{
           
            ?>
             <tr>
           
            <td><?php echo $row['date_filed']?></td>
            <td><?php echo $row['reason'] ;?></td>
            <td><?php echo $row['date_effective']; ?></td>
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