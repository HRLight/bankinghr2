<?php
  $page_title = 'Learning Ranking';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $row=Recievables();
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
  <!-- Notification div -->
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
  <!-- End Notification div -->
  <?php
  $att_list = "SELECT exam_ranking.*,employees.*,positions.* FROM exam_ranking JOIN employees ON exam_ranking.employee_id";
  $att_list .= " = employees.employee_id JOIN positions ON exam_ranking.pos_id = positions.pos_id WHERE exam_ranking.employee_id ORDER BY average DESC";
  $att_list_run = $db->query($att_list);
  $rows = $att_list_run->fetch_assoc();
  $num = $att_list_run->num_rows;
  $i = 1;
  
 
  ?>
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
            <thead>
              <tr>
                <th>Rank</th>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Position Exammed For</th>
                <th>Average</th>
              </tr>
            </thead>
           <tbody>
              <?php  
  if($num>0){
       do{ ?>
             
              <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $rows['employee_id']; ?></td>
                <td><?php echo $rows['first_name'].' '.$rows['last_name']; ?></td>
                <td><?php echo str_replace('_',' ',$rows['pos_name']); ?></td>
                <td><?php echo $rows['average']; ?>%</td>
              </tr>
              <?php
              }while($rows =$att_list_run->fetch_assoc()); }
              
              ?>
           </tbody>
         </table>
        </div>


        
      </div>
    </div>
  </div>
 
<?php include_once('layouts/footer.php'); ?>

