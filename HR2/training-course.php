<?php
  $page_title = 'Training';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $row=Recievables();
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<style>
@media print{
  #button{
    display: none; !important;
  }
  .breadcrumbs{
    display: none; !important;
  }
  .topNavBar{
      display: none; !important;
  }
  .buti1{
      display: none; !important;
  }
}
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>

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
          <button onclick="print()" id="button" class="btn btn-primary btn-xs-block">
            <i class="bi bi-file-post"></i>
          Print Report
         </button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
           id="example"
         class="table table-striped data-table"
         style="width: 100%">
            <thead>
              <tr>
                        <th>Name of Trainee</th>
                        <th>Training Name</th>
                        <th>Position</th>
                        <th>Date End</th>
                        <th>Date End</th>
                        <th class="text-right">Action</th>
             </tr>
            </thead>
           <tbody>
                    <?php
               $att_list = "SELECT training_participants.*,employees.*,training_sched.*,positions.* FROM training_participants JOIN";
               $att_list .= " employees ON training_participants.employee_id = employees.employee_id JOIN positions ON employees.pos_id = positions.pos_id JOIN training_sched";
               $att_list .= " ON training_participants.t_id =  training_sched.t_id ";
                    $att_list_run = $db->query($att_list);
                    $row = $att_list_run->fetch_assoc();
                    $rows = $att_list_run->num_rows;
                    
                    if($rows > 0 )
                    {
                   do
                    {
                    ?>
                    <tr>
                        <td><?php echo ucwords($row['first_name']).' '.ucwords($row['last_name']) ?></td>
                        <td><?php echo $row['t_name']; ?></td>
                        <td><?php echo str_replace('_',' ',$row['pos_name']); ?></td>
                        <td><?php echo $row['date_start']; ?></td>
                        <td><?php echo $row['date_end']; ?></td>

                        <td>
                    <?php
                    $id = $row['t_id'];
                     $sql = "SELECT date_end FROM training_sched WHERE t_id = '$id'";
                     $res = $db->query($sql);
                     $de = $res->fetch_assoc();
                     if($de['date_end'] < date('Y-m-d')){
                      $emp_id = $row['employee_id'];
                     $q = "SELECT * FROM training_eval_grades WHERE employee_id = '$emp_id'";
                     $r = $db->query($q);
                     $te = $r->num_rows;
                     if($te < 1){ ?>
                            <a href="eval_training.php?id=<?php echo $row['t_id']; ?>&eid=<?php echo $row['employee_id']; ?>" class="buti1 btn btn-sm btn-success pull-right">Evaluate</a>
                            <?php }else{ echo 'Evaluated'; } }else{ ?>
                             <a href="#" class="buti1 btn btn-sm btn-secondary pull-right" >Evaluate</a>
                        </td>
                    </tr>
                    <?php
                   } }while($row=$att_list_run->fetch_assoc());
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

