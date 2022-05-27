<?php
  $page_title = 'Succession Monitoring';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $row=Recievables();
?>
<?php include_once('layouts/header.php'); ?>


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
        <span class="badge rounded-pill bg-success"><i class="bi bi-plus"></i> Succession Planning</span>
        <div class="text-end">
          <a href="add_successor_plan.php" class="btn btn-primary btn-xs-block"><i class="bi bi-plus"></i> Add Successor Plan</a>
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
                        <th class="text-center">Department</th>
                        <th class="text-center">Position</th>
                        <th class="text-center">Successor</th>
                        <th class="text-center">Actions</th>
              </tr>
            </thead>
           <tbody>
              <?php 
              $sql = "SELECT succession_plan.*,employees.*,positions.*,departments.* FROM succession_plan JOIN employees ON ";
              $sql .= "succession_plan.employee_id = employees.employee_id JOIN positions ON succession_plan.pos_id = positions";
              $sql .= ".pos_id JOIN departments ON succession_plan.dept_id = departments.dept_id";

              $res = $db->query($sql);
              $emp = $res->fetch_assoc();
              $row = $res->num_rows;

              if($row>0){ do{
              ?>
                    <tr>
                        <td class="text-center"><?php echo $emp['dept_name'] ?></td>
                        <td class="text-center"> <?php echo $emp['pos_name'] ?></td>
                        <td class="text-center"><?php echo $emp['first_name'].' '.$emp['last_name'] ?></td>
                        <td class="text-center">

              <?php 
              $id = $emp['employee_id'];
              $pos = $emp['pos_name'];
              $q = "SELECT * FROM promoted_list WHERE employee_id = '$id' AND promotion_pos = '$pos'";
              $r = $db->query($q);
              $num = $r->num_rows;
              if($num>0){ ?>


                 <a href="#" class="btn btn-sm btn-secondary">Add to Promotion List</a>
              <?php }else{ ?>
                   <a href="add_to_promotion.php?id=<?php echo $emp['id']?>" class="btn btn-sm btn-success">Add to Promotion List</a>
              <?php } ?>
                        </td>

                  <?php  }while($emp = $res->fetch_assoc()); } ?>
                  
           </tbody>
         </table>
        </div>
      </div>
    </div>

   
  </div>


 <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-plus"></i> Resigned Employees</span>
       
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
                        <th>Department</th>
                        <th>Position</th>
                        <th>Actions</th>
              </tr>
            </thead>
           <tbody>
              <?php 
              $sql = "SELECT resigned_employees.*,employees.*,positions.*,departments.* FROM resigned_employees JOIN employees ON ";
              $sql .= "resigned_employees.employee_id = employees.employee_id JOIN positions ON employees.pos_id = positions";
              $sql .= ".pos_id JOIN departments ON employees.dept_id = departments.dept_id";

              $res = $db->query($sql);
              $emp = $res->fetch_assoc();
              $row = $res->num_rows;

              if($row>0){ do{
              ?>
                    <tr>
                        <td><?php echo $emp['first_name'].' '.$emp['last_name'] ?></td>
                        <td><?php echo $emp['dept_name'] ?></td>
                        <td><?php echo $emp['pos_name'] ?></td>
                        
                        <td>


                  <?php if($emp['open_exam'] < 1){ ?>

                          <a href="activate_exam.php?id=<?php echo $emp['pos_id'].'&exam='.$emp['r_id']; ?>" class="btn btn-sm btn-primary">Activate Exam</a></td>

                  <?php }else{ ?>

                    <a href="#" class="btn btn-sm btn-secondary">Activate Exam</a></td>


                  <?php } }while($emp = $res->fetch_assoc()); } ?>
                  
           </tbody>
         </table>
        </div>
      </div>
    </div>

   
  </div>

                   
  
       
<?php include_once('layouts/footer.php');
