<?php
  $page_title = 'All User';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $all_users = find_new_trainee();
?>
<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->

<!-- /Breadcrumb -->


<div class="row">

  

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>User management Table</span>
         
      </div>
      <div class="card-body">
       <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
          <tr>
            <th>Employee ID</th>
            <th>Name </th>
            <th>Department</th>
            <th>Date Start</th>
            <th>Date End</th>
            <th>Location</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_users as $a_user): ?>
        
              <tr>
               <td class="text-center"><?php echo $a_user['employee_id'];?></td>
               <td><?php echo remove_junk(ucwords($a_user['first_name'])).' '.remove_junk(ucwords($a_user['last_name']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['department']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['date_start']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['date_end']))?></td>
              <td> <?php if(empty($a_user['location'])){ ?>
                <?php echo 'To be set'; ?>
              <?php }else{ echo $a_user['location']; } ?>
                
              </td>
                <td>
                <?php if(empty($a_user['location'])){ ?>
                <a href="set_newhire_training_location.php?id=<?php echo $a_user['employee_id']?>" class="btn btn-sm btn-success" >
                  <i class="bi bi-calendar" ></i>Set location</a>
                <?php }else{ echo $a_user['status']; }?>
                </td>
                    </div>
              </tr>
          
        <?php endforeach;?>
       </tbody>
      
     </table>
   </div>
 </div>
</div>
</div>
</div>
  <?php include_once('layouts/footer.php'); ?>
