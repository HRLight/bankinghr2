 <?php include('includes/load.php'); 


include('layouts/user_header.php');?>


 <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <div class="card-header">
       <h4>Available Exam For Open Positions</h4>
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
            $query = "SELECT emp_examinee.*,positions.*,departments.* FROM positions JOIN emp_examinee ON emp_examinee.pos_id";
            $query .= " = positions.pos_id JOIN departments ON positions.dept_id = departments.dept_id WHERE emp_examinee.employee_id = '$id'";
            $res = $db->query($query);
            $row = $res->fetch_assoc();
            $num = $res->num_rows;
            ?>
            <thead>
              <tr>
               
               
                 <th>Position</th>
                <th>Department</th>
                <th>Score</th>
                <th>Action</th>
                
                
             </tr>
            </thead>
           <tbody>
            <?php
            if($num > 0 )
            {
            
            do{
           
            ?>
             <tr>
           
            <td><?php echo str_replace('_',' ',$row['pos_name'])?></td>
           <td><?php echo $row['dept_name']?></td>
           <?php $q = "SELECT * FROM exam_ranking WHERE employee_id = '$id'";
           $r = $db->query($q);
           $s = $r->fetch_assoc();
           $ave = $s['average']; ?>


           <td><?php echo $ave;?></td>
            <td>
                <?php if($row['exam_taken'] > 0){ ?>
                      <a href="#" class="btn btn-sm btn-secondary">Take exam</a>

                <?php }else{ ?>

                <a href="take_exam.php?id=<?php echo $user['employee_id'].'&pos='.$row['pos_id']; ?>" class="btn btn-sm btn-primary">Take exam</a>
            <?php } ?>
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


<?php include('layouts/user_footer.php'); ?>