<?php
  $page_title = 'Orientation Schedules';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(2);
//pull out all user form database
 $all_users = find_all_orientation_sched();
?>
<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->

<!-- /Breadcrumb -->


<div class="row">

  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>Orientation Schedules</span>
         
      </div>
      <div class="card-body">
       <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
          <tr>
            
            <th>Employee ID</th>
            <th>Position</th>
            <th>Department</th>
            <th>Date</th>
            <th>Time</th>
            <th>Location/Room</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_users as $a_user): ?>
              <tr>
             
               <td><?php echo remove_junk(ucwords($a_user['employee_id']))?></td>
               <td><?php echo remove_junk(ucwords(str_replace('_',' ',$a_user['pos_name'])))?></td>
               <td><?php echo remove_junk(ucwords($a_user['dept_name']))?></td>
               <td><?php echo $a_user['date']?></td>
               <td><?php echo $a_user['time'] ?></td>
               <td>
               <?php if(empty($a_user['location'])){ ?>
                <?php echo 'To be set'; ?>
              <?php }else{ echo $a_user['location']; } ?>
                
              </td>
                <td>
                <?php if(empty($a_user['location'])){ ?>
                <a href="set_orientation_location.php?id=<?php echo $a_user['employee_id']?>" class="btn btn-sm btn-success" >
                  <i class="bi bi-calendar" ></i>Set location</a>
                <?php }else{ echo $a_user['status']; }?>
                </td>
                    
          
                  
              </tr>
       
        <?php 
      endforeach;?>
       </tbody>
       
     </table>
   </div>
 </div>
</div>
</div>
</div>
  <?php include_once('layouts/footer.php'); ?>
