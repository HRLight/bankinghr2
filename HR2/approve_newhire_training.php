<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   
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
  $etype = 'new hire training';

  $sql = "SELECT * FROM newhire_training WHERE employee_id = '$id'";
  $res = $db->query($sql);
  $ext = $res->fetch_assoc();
 
  
  if($ext['external'] == 'no'){
  
   $sql = "SELECT * FROM newhire_training WHERE employee_id = '$id'";
   $res = $db->query($sql);
   $sched = $res->fetch_assoc();
   $r_name = $sched['location'];
   $start = $sched['date_start'];
   $to = $sched['date_end'];
   $purp = 'new hire training';
   
   
   $q = "INSERT INTO request_facility (fname,mname,lname,contact,email,department,position,event_type,facility_type,";
   $q .= "date_start,until,purpose,status) VALUES ('$fname','$mname','$lname','$contact','$email','$dept','$position','$etype',";
   $q .= "'$r_name','$start','$to','$purp','pending')";
   if($db->query($q)){
       
       $sql = "UPDATE newhire_training SET status ='pending' WHERE employee_id = '$id'";
        if($db->query($sql)){
       $_SESSION['status'] =  "Traing Schedule Approved";
    $_SESSION['status_code'] =  "success";
    redirect('training_approval.php',false);
        }
   
   }
}else{

    $sql = "UPDATE newhire_training SET status ='approved' WHERE t_id = '$id'";
        if($db->query($sql)){
       $_SESSION['status'] =  "Traing Schedule Approved";
    $_SESSION['status_code'] =  "success";
    redirect('training_approval.php',false);
}
}