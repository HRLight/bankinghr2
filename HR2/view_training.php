<?php
  $page_title = ' Training Schedule';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $row=Recievables();
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  
<a href="training-sched.php" class="breadcrumbs__item">Back</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Schedule info</a>
</nav>
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
          
        </div>
      </div>
      <div class="card-body">

<?php 
  
  $id = $db->escape($_GET['id']);

  $sql = "SELECT * FROM training_sched";
  $res = $db->query($sql);
  $info = $res->fetch_assoc();

?>
        <div class="container">
          <div class="row">
            
            <div class="col-md-10 mx-auto">
            <div class="form-group col-md-5 mx-auto mb-1">
              <div class="col-md-4 mx-auto">
                    <label class="col-form-label col-md-">Training Title</label>
                      </div> 
                        <input type="text" name="page" value="<?php echo $info['t_name']?>" class=" text-center form-control" disabled style=" margin: auto;">                  
                  </div> 
                </div>

                  <div class="form-group col-md-6 mx-auto mb-1">
              <div class="col-md-3 mx-auto">
                    <label class="col-form-label col-md-">Date Start</label>
                      </div> 
                        <input type="text" name="page" value="<?php echo $info['date_start']?>" class="text-center form-control" disabled style="width:20vw; margin: auto;">                  
                  </div> 

                   <div class="form-group col-md-6 mx-auto mb-1">
              <div class="col-md-3 mx-auto">
                    <label class="col-form-label col-md-">Budget</label>
                      </div> 
                        <input type="text" name="page" value="<?php echo $info['budget']?>" class="text-center form-control" disabled style="width:20vw; margin: auto;">                  
                  </div> 

                      <div class="form-group col-md-6 mx-auto mb-1">
              <div class="col-md-3 mx-auto">
                    <label class="col-form-label col-md-">Time</label>
                      </div> 
                        <input type="text" name="page" value="<?php echo $info['time']?>" class="text-center form-control" disabled style="width:20vw; margin: auto;">                  
                  </div> 


                   <div class="form-group col-md-6 mx-auto mb-1">
              <div class="col-md-3 mx-auto">
                    <label class="col-form-label col-md-">Facility</label>
                      </div> 
                        <input type="text" name="page" value="<?php echo $info['facility_name']?>" class="text-center form-control" disabled style="width:20vw; margin: auto;">                  
                  </div> 

                   <div class="form-group col-md-6 mx-auto mb-1">
              <div class="col-md-3 mx-auto">
                    <label class="col-form-label col-md-">Date End</label>
                      </div> 
                        <input type="text" name="page" class="form-control text-center" value="<?php echo $info['date_end']?>"  disabled style="width:20vw; margin: auto;">                  
                  </div> 

                  
                  <?php 
                  $id = $info['t_id'];
                  $sql = "SELECT training_participants.*, employees.*,positions.*,departments.* FROM training_participants JOIN employees ON";
                  $sql .= " training_participants.employee_id = employees.employee_id JOIN positions ON employees.pos_id =";
                  $sql .=" positions.pos_id JOIN departments ON employees.dept_id = departments.dept_id WHERE training_participants.t_id ='$id'";
                  $res = $db->query($sql);
                  $emp = $res->fetch_assoc(); ?>
                   <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
          <tr>
            <th class="text-center">Employee ID</th>
            <th class="text-center">Name </th>
            <th class="text-center">Position</th>
            <th class="text-center">Department</th>
          </tr>
        </thead>
        <tbody>
        <?php do{ ?>
          
              <tr>
               <td class="text-center"><?php echo remove_junk(ucwords($emp['employee_id']))?></td>
               <td class="text-center"><?php echo remove_junk(ucwords($emp['first_name'])).' '.remove_junk(ucwords($emp['last_name']))?></td>
               
               <td class="text-center"><?php echo remove_junk(ucwords(str_replace('_',' ',$emp['pos_name'])))?></td>
               <td class="text-center"><?php echo remove_junk(ucwords($emp['dept_name']))?></td>
              </tr>
         
        <?php }while($emp=$res->fetch_assoc());?>
       </tbody>
       <tfoot>
         <tr>
          <th class="text-center">Employee ID</th>
            <th class="text-center">Name </th>
            <th class="text-center">Position</th>
            <th class="text-center">Department</th>
         </tr>
       </tfoot>
     </table>
            
         
        </div>






    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>

