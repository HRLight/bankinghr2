<?php
  $page_title = 'Training Schedule';
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

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <div class="text-end">
          <a href="add-sched.php" class="btn btn-primary btn-xs-block">
         <i class="bi bi-plus"></i>
          Add Schedule
         </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
          id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                        
                        <th>Sched ID</th>
                        <th>Training Name</th>
                        <th>No. of Participants</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Time</th>
                        <th>Budget</th>

                       <th class="text-right">Action</th>
             </tr>
            </thead>
           <tbody>
                    <?php
          $sql = "SELECT * FROM training_sched";
                    $att_list_run = mysqli_query($conn, $sql);
                    
                    if(mysqli_num_rows($att_list_run) > 0 )
                    {
                    while($row = mysqli_fetch_assoc($att_list_run))
                    {
                    ?>
                    <tr>
                        <td><?php echo $row['t_id']; ?></td>
                        <td><?php echo $row['t_name']; ?></td>
                        <?php 
                        $id = $row['t_id'];
                        $sql = "SELECT * FROM training_participants WHERE t_id = '$id'";
                        $res = $db->query($sql); ?>
                        <td><?php echo $res->num_rows; ?></td>
                        <td><?php echo $row['date_start'];?></td>
                        <td><?php echo $row['date_end']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                        <td><?php echo $row['budget']; ?></td>

                       
                        
                        <td>
                          <?php if($row['status'] == 'approved'){ 
                            $today = date('Y-m-d'); 
                            if($today > $row['date_end']){ ?>
                               <a href="finish_training.php?id=<?php echo $row['t_id']; ?>" class="btn btn-sm btn-success pull-right"><i class="bi bi-file-post"></i>Finish</a>
                             <?php }else{ ?>
                            <a href="view_training.php?id=<?php echo $row['t_id']; ?>" class="btn btn-sm btn-info pull-right"><i class="bi bi-eye"></i> View</a>
                         <?php } }elseif($row['status'] == 'finished'){ ?>
                          <a href="view_training.php?id=<?php echo $row['t_id']; ?>" class="btn btn-sm btn-info pull-right"><i class="bi bi-eye"></i> View</a>
                        <?php  }else{ echo 'Approved'; } ?>
                        </td>
                         
                    </tr>
                    <?php
                    }
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

