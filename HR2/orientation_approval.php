<?php
  $page_title = 'Orientation Approval';
  require_once('includes/load.php');

// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
$all_users = find_all_orientation_approval();
?>

<?php include_once('layouts/header.php'); ?>





<div class="row">

  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>Orientation Approval</span>
       
      </div>
      <div class="card-body">
       <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
          <tr>
            <th>Employee ID</th>
            <th>Employee</th>
            <th>Date</th>
            <th>Room/Location</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_users as $a_user): ?>
         
              <tr>
               <td><?php echo remove_junk(ucwords($a_user['employee_id']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['first_name'])).' '.remove_junk(ucwords($a_user['last_name']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['date']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['location']))?></td>

  
               
                 <div class="btn-group">
                  <td>
                    <a href="approve_orientation.php?id=<?php echo $a_user['employee_id'];?>" class="btn btn-sm btn-success" data-toggle="tooltip" title="Approve">
                      <i class="bi bi-check"></i>Approve
                   </a>
                   
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