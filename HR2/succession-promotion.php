<?php
  $page_title = 'Succession Promotion';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);

include_once('layouts/header.php'); ?>


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
        <h4>Succession Promotion</h4>
        <div class="text-end">
          <a href="add-promotion.php" class="btn btn-primary btn-xs-block">
         <i class="bi bi-plus"></i>
          Add Promotion
         </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                        
                        <th>Employee Name</th>
                        <th>Will Be Promoted To</th>
                        <th>From</th>
                        <th class="text-right">Action</th>
             </tr>
            </thead>
           <tbody>
                    <?php
                    $att_list = "SELECT promoted_list.*,employees.* FROM promoted_list JOIN employees ON promoted_list.employee_id";
                    $att_list .= " = employees.employee_id WHERE promoted_list.status = 'pending'";
                    $att_list_run = mysqli_query($conn, $att_list);
                    
                    if(mysqli_num_rows($att_list_run) > 0 )
                    {
                    while($row = mysqli_fetch_assoc($att_list_run))
                    {
                    ?>
                    <tr>
                        
                        <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
                        <td><?php echo $row['promotion_pos']; ?></td>
                        <td><?php echo $row['from_pos']; ?></td>
                        <td>
                            <a href="promote_emp.php?id=<?php echo $row['promotion_id']?>" class="btn btn-sm btn-success">Promote</a>
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

