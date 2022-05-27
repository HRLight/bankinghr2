<?php
  $page_title = 'Payslips';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $row=Recievables();
?>
<?php include_once('layouts/header.php'); ?>

 <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
       
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <?php
            $query = "SELECT payslips.*,employees.*,positions.* FROM payslips JOIN employees ON payslips.employee_id = employees.employee_id JOIN positions ON employees.pos_id = positions.pos_id";
            $query_run = mysqli_query($conn, $query);
            ?>
            <thead>
              <tr>
               
               
                 <th >Employee name</th>
                 <th>position</th>
                <th >Salary Date</th>
                <th >cut-off Range</th>
                
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
           
            <td><?php echo $row['first_name'].' ',$row['last_name']; ?></td>
            <td><?php echo $row['pos_name'] ;?></td>
            <td><?php echo $row['cut_start']; ?></td>
           <td><?php echo $row['cut_start'].' to '.$row['cut_end']; ?></td>
            <td >
             
              <a href="view_payslip.php?id=<?php echo $row['employee_id'];?>" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
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