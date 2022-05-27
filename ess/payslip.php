<?php
  $page_title = 'Payslips';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
 
?>
<?php include_once('layouts/user_header.php'); ?>

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
            $id = $user['employee_id'];
            $query = "SELECT payslips.*,employees.* FROM payslips JOIN employees ON payslips.employee_id = employees.employee_id WHERE payslips.employee_id = '$id'";
            $res = $db->query($query);
            $row = $res->fetch_assoc();
            $num = $res->num_rows;
            ?>
            <thead>
              <tr>
               
               
                 <th >Employee name</th>
                
                <th >Salary Date</th>
                <th >cut-off Range</th>
                
                <th >Action</th>
             </tr>
            </thead>
           <tbody>
            <?php
            if($num > 0 )
            {
            
            do{
           
            ?>
             <tr>
           
            <td><?php echo $row['first_name'].' ',$row['last_name']; ?></td>
            <td><?php echo $row['pay_date'] ;?></td>
          
           <td><?php echo $row['cut_start'].' to '.$row['cut_end']; ?></td>
            <td >
             
              <a href="view_payslip.php?id=<?php echo $row['employee_id'];?>" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i>View</a>
            </td>
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