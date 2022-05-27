<?php
  $page_title = 'Training Ranking';
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
  <?php
  $att_list = "SELECT training_participants.*,training_eval_grades.*,training_sched.*,employees.* FROM training_participants JOIN ";
  $att_list .= "training_eval_grades ON training_participants.employee_id = training_eval_grades.employee_id JOIN training_sched ON training_participants.t_id = training_sched.t_id JOIN employees ON training_participants.employee_id = employees.employee_id ORDER BY training";
  $att_list .= "_eval_grades.training_average DESC";
  $att_list_run = mysqli_query($conn, $att_list);
  $rows = mysqli_fetch_assoc($att_list_run);
  $i = 1;
  
  
  ?>
  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-list"></i> Training Name: <?php echo $rows['t_name']; ?></span>
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
                <th>Training Title</th>
                <th>Average</th>
              </tr>
            </thead>
           <tbody>
              <?php 
              if(mysqli_num_rows($att_list_run) > 0 ){
  
do{
              ?>
              <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $rows['employee_id']; ?></td>
                <td><?php echo $rows['first_name'].' '.$rows['last_name']; ?></td>
                <td><?php echo $rows['t_name']; ?></td>
                <td><?php echo $rows['training_average']; ?></td>
              </tr>
              <?php
              }while($rows = mysqli_fetch_assoc($att_list_run));
              }else {
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

