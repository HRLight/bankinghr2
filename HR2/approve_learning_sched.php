<?php
  $page_title = 'Learning Schedules';
  require_once('includes/load.php');

 $id = $_GET['id'];
   $user = current_user();
  $user_id = $user['employee_id'];
  
  
  $sqls = "SELECT employees.*, positions.*, departments.* FROM employees JOIN positions ON employees.pos_id = positions.pos_id ";
  $sqls .= "JOIN departments ON employees.dept_id = departments.dept_id WHERE employees.employee_id = '$user_id'";
  $result = $db->query($sqls);
  $emp = $result->fetch_assoc();
  $fname = $emp['first_name'];
  $mname = $emp['middle_name'];
  $lname = $emp['last_name'];
  $contact = $emp['contact_number'];
  $email = $emp['email'];
  $position = $emp['pos_name'];
  $dept = $emp['dept_name'];
  $etype = 'seminar';

  $sql = "SELECT * FROM seminar_sched WHERE seminar_id = '$id'";
  $res = $db->query($sql);
  $ext = $res->fetch_assoc();
 
  
  if($ext['external'] == 'no'){
  
   $sql = "SELECT * FROM seminar_sched WHERE seminar_id = '$id'";
   $res = $db->query($sql);
   $sched = $res->fetch_assoc();
   $r_name = $sched['location'];
   $start = $sched['date'];
   $to = $sched['date'];
   $purp = 'seminar';
   
   
   $q = "INSERT INTO request_facility (fname,mname,lname,contact,email,department,position,event_type,facility_type,";
   $q .= "date_start,until,purpose,status) VALUES ('$fname','$mname','$lname','$contact','$email','$dept','$position','$etype',";
   $q .= "'$r_name','$start','$to','$purp','pending')";
   if($db->query($q)){

$sql = "UPDATE seminar_sched SET status = 'pending' WHERE seminar_id = '$id'";
if($db->query($sql)){

 $_SESSION['status'] =  "Request Approved";
  $_SESSION['status_code'] =  "success";
redirect('learning_sched_approval.php',false);
}
}
}else{
  $sql = "UPDATE seminar_sched SET status = 'approved' WHERE seminar_id = '$id'";
if($db->query($sql)){

 $_SESSION['status'] =  "Request Approved";
  $_SESSION['status_code'] =  "success";
redirect('learning_sched_approval.php',false);
}
}
?>