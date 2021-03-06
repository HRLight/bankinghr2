<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>

<?php

 $all_users = find_all_user();
 $trainees = find_trainees();
 $t_sched = find_t_sched();
 $l_sched = find_l_sched();
?>

<?php include_once('layouts/header.php'); ?>

<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<!-- End Notification div -->
<div class="row">
  <div class="col-md-12">
    <h4>Dashboard</h4>
  </div>
</div>
<div class="row">
  <div class="col-md-4 mb-3">
    <div class="card bg-primary text-white h-30 mx-auto" >
      <div class="card-body py-5 mx-auto"> <br><h3><i class="bi bi-people"></i>  Trainees </h3><br>
        <center><h1><?php echo $trainees ?></h1></center>
      </div>
      
    </div>
  </div>
  <div class="col-md-4 mb-3">
    <div class="card bg-warning text-dark h-30 mx-auto">
      <div class="card-body py-5 mx-auto"><br><h3><i class="bi bi-calendar"></i>  Training Schedules </h3><br>
        <center><h1><?php echo $t_sched ?></h1></center>
      </div>
     
    </div>
  </div>


  <div class="col-md-4 mb-3">
    <div class="card bg-success text-white h-30 ">
      <div class="card-body py-5 mx-auto"><br><h3><i class="bi bi-calendar"></i>  Seminar Schedules </h3><br>
        <center><h1><?php echo $l_sched ?></h1></center>
                       </div>
      
  </div>
</div>
<div class="row">
  <div class="col-md-6 mb-3">
    <div class="card bg-danger text-white h-30">
      <div class="card-body py-5 mx-auto"><p><br><h3><i class="bi bi-people"></i>  Employee Training </h3><br>
        <center><h1><?php echo $l_sched ?></h1></center>
                       </div>
      
    </div>
  </div>
  <div class="col-md-6 mb-3">
    <div class="card bg-info text-dark h-30">
      <div class="card-body py-5 mx-auto"><p><br><h3><i class="bi bi-calendar"></i>  Orientation Schedules </h3><br>
        <center><h1><?php echo $l_sched ?></h1></center>
                       </div>
      
    </div>
  </div>
</div>

<!-- Start of Charts -->



<!-- End of Charts -->

<!-- Data table start -->
<div class="row">
  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span><i class="bi bi-person-lines-fill me-2"></i></span> Users Table
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>

                <th>Name</th>
                <th>Username</th>
                <th>Position</th>
                <th>Status</th>
                <th>Last Log-in</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach($all_users as $a_user): ?>
                   <?php if($a_user['user_level']===$user['user_level'] && $a_user['username']===$user['username']): ?>
                     <tr>
                      <td><?php echo remove_junk(ucwords($a_user['name']))?></td>
                      <td><?php echo remove_junk(ucwords($a_user['username']))?></td>
                      <td><?php echo remove_junk(ucwords($a_user['group_name']))?></td>
                      <td>
                       <span class="badge rounded-pill bg-warning"> <?php echo "You"; ?></span>
                      </td>
                      <td><?php echo read_date($a_user['last_login'])?></td>
                     </tr>
                     <?php else: ?>
                       <tr>
                        <td><?php echo remove_junk(ucwords($a_user['name']))?></td>
                        <td><?php echo remove_junk(ucwords($a_user['username']))?></td>
                        <td><?php echo remove_junk(ucwords($a_user['group_name']))?></td>
                        <td>
                        <?php if($a_user['status'] === '1'): ?>
                         <span class="badge rounded-pill bg-success"> <?php echo "Active"; ?></span>
                       <?php else: ?>
                         <span class="badge rounded-pill bg-danger"><?php echo "Deactive"; ?></span>
                       <?php endif;?>
                        </td>
                        <td><?php echo read_date($a_user['last_login'])?></td>
                       </tr>
                   <?php endif; ?>
                      <?php endforeach;?>

            </tbody>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Position</th>
                <th>Status</th>
                <th>Last Log-in</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
<!-- End of Data table  -->
<?php include_once('layouts/footer.php'); ?>
