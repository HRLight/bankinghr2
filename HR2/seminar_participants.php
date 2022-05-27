<?php
  $page_title = 'Seminar';
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
                        <th>Seminar Title</th>
                        <th>Position</th>
                        <th>Date </th>
                        
             </tr>
            </thead>
           <tbody>
                    <?php
               $att_list = "SELECT seminar_participants.*,seminar_sched.*,employees.*,positions.* FROM seminar_participants JOIN seminar_sched ON seminar_participants.seminar_id = seminar_sched.seminar_id JOIN employees ON seminar_participants.employee_id = employees.employee_id JOIN positions ON employees.pos_id = positions.pos_id";
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
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo str_replace('_',' ',$row['pos_name']); ?></td>
                        <td><?php echo $row['date']; ?></td>
                        

                      
                    </tr>
                    <?php
                    }while($row=$att_list_run->fetch_assoc());
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

