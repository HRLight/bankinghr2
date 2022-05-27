<?php
  $page_title = 'Seminar Approval';
  require_once('includes/load.php');

// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
$all_users = find_new_training_approval();
?>

<?php include_once('layouts/header.php'); ?>





<div class="row">

  

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>Seminar Approval</span>
       
      </div>
      <div class="card-body">
       <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
          <tr>
            
            <th>Employee Name</th>
            <th>Date Start</th>
            <th>Date End</th>
            <th>Location</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_users as $a_user): ?>
         
              <tr>
               
               <td><?php echo remove_junk(ucwords($a_user['first_name'])).' '.remove_junk(ucwords($a_user['last_name']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['date_start']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['date_end']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['location']))?></td>
               
                 <div class="btn-group">
                  <td>
                    <a href="approve_newhire_training.php?id=<?php echo $a_user['employee_id'];?>" class="btn btn-xs btn-success" data-toggle="tooltip" title="Approve">
                      <i class="bi bi-check"></i>
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