<?php
  $page_title = 'Training Approval';
  require_once('includes/load.php');


 page_require_level(1);

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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>Training Approval</span>
         
      </div>
      <div class="card-body">
       <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
          <tr>
            
            <th>Training Name </th>
            <th>Date Start</th>
            <th>Date end</th>
            <th>Participants</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM training_sched WHERE status ='manager approval'";
            $res = $db->query($sql);
            $a_user = $res->fetch_assoc();
            $row = $res->num_rows;
            if($row>0){
                do{
            
            ?>
             <tr>
               
               <td><?php echo remove_junk(ucwords($a_user['t_name']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['date_start']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['date_end']))?></td>
              <?php 
              $id = $a_user['t_id'];
              $sql = "SELECT * FROM training_participants WHERE t_id = '$id'";
               $resu = $db->query($sql);
            $user = $resu->fetch_assoc();
            $rows = $resu->num_rows; ?>
               
               <td><?php echo $rows ?></td>
                 <div class="btn-group">
                  <td>
                    <a href="approve_training_sched.php?id=<?php echo (int)$a_user['t_id'];?>" class="btn btn-xs btn-success" data-toggle="tooltip" title="Approve">
                      <i class="bi bi-check"></i>
                   </a>
                   <a href="decline_training_sched.php?id=<?php echo (int)$a_user['t_id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Decline">
                      <i class="bi bi-x"></i>
                   </a>
                 
                    </td>
                    </div>
              </tr>
          
        <?php }while($a_user=$res->fetch_assoc()); } ?>
       </tbody>
      
     </table>
   </div>
 </div>
</div>
</div>
</div>
  <?php include_once('layouts/footer.php'); ?>
