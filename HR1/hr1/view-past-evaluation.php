<?php
 
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
$user_id = $_SESSION['user_id'] ;

$current_user = current_user($user_id);

if($current_user['user_level'] != 1 ){
 page_require_level(2);
}else{
  page_require_level(1);
}
  $id = $_GET['id'];
  $sql = "SELECT employees.*, positions.*, departments.* FROM employees JOIN positions ON employees.pos_id = ";
  $sql .= "positions.pos_id JOIN departments ON employees.dept_id = departments.dept_id WHERE employees.employee_id = '$id'";
  $result = $db->query($sql);
  $applicant = $result->fetch_assoc();
  $row = $result->num_rows;

 



include_once('layouts/header.php');
?>

<nav class="breadcrumbs">
  
   <a href="performance-management.php" class="breadcrumbs__item">Back</a>
  
  <a href="#checkout" class="breadcrumbs__item is-active">Employee Evaluation</a>
</nav>


<div class="row" style="margin-bottom:10%; max-height: 600px;">
  <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-12">

    <div class="card">
      <div class="card-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span><?php echo $applicant['last_name']." ".$applicant['first_name']." ".$applicant['middle_name'].","; ?></span>
       </strong>
      </div>

    <div class="card-body">     
     <div class="col-md-12">
      <div class="row">
        

        <div class="col-md-6">
        <p> <b> E-mail:</b>  <?php echo $applicant['email']; ?> </p>
        </div>
        <div class="col-md-6">
          <p> <b>Cellphone no.:</b> <?php echo $applicant['contact_number']; ?> </p>
        </div>
         <div class="col-md-6">
          <p> <b>Birth date:</b> <?php echo date('m-d-Y',strtotime($applicant['birth_date'])); ?> </p>
        </div>
         <div class="col-md-6">
          <p> <b>Gender:</b> <?php echo $applicant['gender']; ?> </p>
        </div>
         <div class="col-md-6">
          <p> <b>Age:</b> <?php echo $applicant['age']; ?> </p>
        </div>
        <div class="col-md-6">
          <p> <b>Civil status:</b> <?php echo $applicant['civil_status']; ?> </p>
        </div>
         <div class="col-md-6">
          <p> <b>Religion:</b> <?php echo $applicant['religion']; ?> </p>
        </div>
        <div class="col-md-6">
          <p> <b>Address:</b> <?php echo $applicant['address']; ?> </p>
        </div>
         <div class="col-md-6">
          <p> <b>Designation:</b> <?php echo str_replace('_',' ',$applicant['pos_name']); ?> </p>
        </div>
         <div class="col-md-6">
          <p> <b>Department:</b> <?php echo $applicant['dept_name']; ?> </p>
        </div>
         <?php
          $date_hired = new Datetime($applicant['date_hired']);
          $date_now = new Datetime(date('Y-m-d'));
          $diff = $date_now->diff($date_hired);
          $service = $diff->y
         


           ?>
         <div class="col-md-6">
          <p> <b>Years of service:</b> <?php echo $service; ?> </p>
        </div>




<?php 
$sql = "SELECT employees.*,performance_review.* FROM employees JOIN performance_review ON";
$sql .= " employees.employee_id = performance_review.employee_id WHERE performance_review.employee_id ='$id'";
$result = $db->query($sql);
$info = $result->fetch_assoc();
$row = $result->num_rows;

if($row>0){
  ?>

     <div class="col-md-10 text-center">
          <h3>Past Evaluations</h3>
        </div>
   <?php do{ ?>
         <div class="col-md-12">
          <p> <b>Date: <?php echo date('m-d-Y',strtotime($info['date'])); ?></b> </p>
        </div>
        <div class="col-md-12" style="margin-bottom: 5vh;">
          <p> <b>Rating: <?php echo $info['average'];
         
           ?> </b> </p>
        </div>
        
        
      


 <?php  }while($info = $result->fetch_assoc()); ?>
 </div>

 <?php  } ?>


<div class="col-md-12">
        
          <a href="create-evaluation.php?id=<?php echo $applicant['employee_id'] ?>"  class="btn btn-success btn-sm">
            <i class="bi bi-file-post"></i>Create Evaluation</a>
           <a href="view-achievement.php?id=<?php echo $applicant['employee_id'] ?>"  class="btn btn-info btn-sm">
            <i class="bi bi-award-fill"></i>View Achievements</a>
            <?php if($service>=10){ ?>
              <a href="request-service-award.php?id=<?php echo $applicant['employee_id'] ?>"  class="btn btn-info btn-sm">
            <i class="bi bi-award-fill"></i>Request Loyalty award</a>
          <?php } ?>
       
        </div>


        <?php 
        $eid = $applicant['employee_id'];
  $sql = "SELECT employees.*,time_attendance.* FROM employees JOIN time_attendance ON employees";
  $sql .= ".employee_id = time_attendance.employee_id WHERE time_attendance.employee_id = '$eid'";
  $res = $db->query($sql);
  $a_user = $res->fetch_assoc(); ?>
  <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
          <tr><th class="text-center">Time Sheet And Attendance</th></tr>
          <tr>
            <th>Date</th>
            <th>Time IN</th>
            <th>Time OUT</th>
            <th>Hours Worked</th>
          </tr>
        </thead>
        <tbody>
        <?php do{ ?>
          
              <tr>
               <td class="text-center"><?php echo $a_user['date'];?></td>
               <td><?php echo remove_junk(ucwords($a_user['login_time']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['logout_time']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['calculated_work']))?></td>
              
              </tr>
         
        <?php }while($att = $res->fetch_assoc());  ?>
       </tbody>
       
         
     </table>

      </div>


      </div>
    </div>
    
     </div>
    </div>
  </div>


 
</div>




<?php include_once('layouts/footer.php'); ?>