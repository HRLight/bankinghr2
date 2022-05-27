<?php
  $page_title = 'Edit Subject';
  require_once('includes/load.php');


$id = $_GET['id'];
$r_id = $_GET['exam'];


switch($id){


  case '6':

  $sql = "SELECT * FROM employees";
  $res = $db->query($sql);
  $emp = $res->fetch_assoc();
  $row = $res->num_rows;


  if($row>0){

  do{

    $eid = $emp['employee_id'];

    $sql = "INSERT INTO emp_examinee (employee_id,pos_id) VALUES ('$eid','$id')";
    $re = $db->query($sql); 


  }while($emp = $res->fetch_assoc()); }


  $query = "UPDATE resigned_employees SET open_exam = 1 WHERE r_id = '$r_id'";
if($db->query($query)){

  $_SESSION['status'] =  "Exam Activated";
    $_SESSION['status_code'] =  "success";
    redirect('succession-monitoring.php',false);
    }

  break;

  case '7':

  $sql = "SELECT * FROM employees";
  $res = $db->query($sql);
  $emp = $res->fetch_assoc();
  $row = $res->num_rows;


  if($row>0){

  do{

    $eid = $emp['employee_id'];

    $sql = "INSERT INTO emp_examinee (employee_id,pos_id) VALUES ('$eid','$id')";
    $re = $db->query($sql);


  }while($emp = $res->fetch_assoc()); }


 $query = "UPDATE resigned_employees SET open_exam = 1 WHERE r_id = '$r_id'";
if($db->query($query)){

  $_SESSION['status'] =  "Exam Activated";
    $_SESSION['status_code'] =  "success";
    redirect('succession-monitoring.php',false);
    }

  break;

  case '9':

  $sql = "SELECT * FROM employees";
  $res = $db->query($sql);
  $emp = $res->fetch_assoc();
  $row = $res->num_rows;


  if($row>0){

  do{

    $eid = $emp['employee_id'];

    $sql = "INSERT INTO emp_examinee (employee_id,pos_id) VALUES ('$eid','$id')";
    $re = $db->query($sql);


  }while($emp = $res->fetch_assoc()); }


 $query = "UPDATE resigned_employees SET open_exam = 1 WHERE r_id = '$r_id'";
if($db->query($query)){

  $_SESSION['status'] =  "Exam Activated";
    $_SESSION['status_code'] =  "success";
    redirect('succession-monitoring.php',false);
    }

  break;
  case '11':

  $sql = "SELECT * FROM employees";
  $res = $db->query($sql);
  $emp = $res->fetch_assoc();
  $row = $res->num_rows;


  if($row>0){

  do{

    $eid = $emp['employee_id'];

    $sql = "INSERT INTO emp_examinee (employee_id,pos_id) VALUES ('$eid','$id')";
    $re = $db->query($sql);


  }while($emp = $res->fetch_assoc()); }


  $query = "UPDATE resigned_employees SET open_exam = 1 WHERE r_id = '$r_id'";
if($db->query($query)){

  $_SESSION['status'] =  "Exam Activated";
    $_SESSION['status_code'] =  "success";
    redirect('succession-monitoring.php',false);
    }




  break;

  case '20':

  $sql = "SELECT * FROM employees";
  $res = $db->query($sql);
  $emp = $res->fetch_assoc();
  $row = $res->num_rows;


  if($row>0){

  do{

    $eid = $emp['employee_id'];

    $sql = "INSERT INTO emp_examinee (employee_id,pos_id) VALUES ('$eid','$id')";
    $re = $db->query($sql);


  }while($emp = $res->fetch_assoc()); }


 $query = "UPDATE resigned_employees SET open_exam = 1 WHERE r_id = '$r_id'";
if($db->query($query)){

  $_SESSION['status'] =  "Exam Activated";
    $_SESSION['status_code'] =  "success";
    redirect('succession-monitoring.php',false);
    }

  break;


  case '22':

  $sql = "SELECT * FROM employees";
  $res = $db->query($sql);
  $emp = $res->fetch_assoc();
  $row = $res->num_rows;


  if($row>0){

  do{

    $eid = $emp['employee_id'];

    $sql = "INSERT INTO emp_examinee (employee_id,pos_id) VALUES ('$eid','$id')";
    $re = $db->query($sql);


  }while($emp = $res->fetch_assoc()); }


 $query = "UPDATE resigned_employees SET open_exam = 1 WHERE r_id = '$r_id'";
if($db->query($query)){

  $_SESSION['status'] =  "Exam Activated";
    $_SESSION['status_code'] =  "success";
    redirect('succession-monitoring.php',false);
    }

  break;



  case '24':

  $sql = "SELECT * FROM employees";
  $res = $db->query($sql);
  $emp = $res->fetch_assoc();
  $row = $res->num_rows;


  if($row>0){

  do{

    $eid = $emp['employee_id'];

    $sql = "INSERT INTO emp_examinee (employee_id,pos_id) VALUES ('$eid','$id')";
    $re = $db->query($sql);


  }while($emp = $res->fetch_assoc()); }

$query = "UPDATE resigned_employees SET open_exam = 1 WHERE r_id = '$r_id'";
if($db->query($query)){

  $_SESSION['status'] =  "Exam Activated";
    $_SESSION['status_code'] =  "success";
    redirect('succession-monitoring.php',false);
    }

  break;


  case '27':

  $sql = "SELECT * FROM employees";
  $res = $db->query($sql);
  $emp = $res->fetch_assoc();
 $row = $res->num_rows;


  if($row>0){

  do{

    $eid = $emp['employee_id'];

    $sql = "INSERT INTO emp_examinee (employee_id,pos_id) VALUES ('$eid','$id')";
    $re = $db->query($sql);


  }while($emp = $res->fetch_assoc()); }


  $query = "UPDATE resigned_employees SET open_exam = 1 WHERE r_id = '$r_id'";
if($db->query($query)){

  $_SESSION['status'] =  "Exam Activated";
    $_SESSION['status_code'] =  "success";
    redirect('succession-monitoring.php',false);
    }

  break;


 

  case '32':

  $sql = "SELECT * FROM employees";
  $res = $db->query($sql);
  $emp = $res->fetch_assoc();
  $row = $res->num_rows;


  if($row>0){

  do{

    $eid = $emp['employee_id'];

    $sql = "INSERT INTO emp_examinee (employee_id,pos_id) VALUES ('$eid','$id')";
    $re = $db->query($sql);


  }while($emp = $res->fetch_assoc()); }


 $query = "UPDATE resigned_employees SET open_exam = 1 WHERE r_id = '$r_id'";
if($db->query($query)){

  $_SESSION['status'] =  "Exam Activated";
    $_SESSION['status_code'] =  "success";
    redirect('succession-monitoring.php',false);
    }

  break;

  


  case '36':

  $sql = "SELECT * FROM employees";
  $res = $db->query($sql);
  $emp = $res->fetch_assoc();
  $row = $res->num_rows;


  if($row>0){

  do{

    $eid = $emp['employee_id'];

    $sql = "INSERT INTO emp_examinee (employee_id,pos_id) VALUES ('$eid','$id')";
    $re = $db->query($sql);


  }while($emp = $res->fetch_assoc()); }


 $query = "UPDATE resigned_employees SET open_exam = 1 WHERE r_id = '$r_id'";
if($db->query($query)){

  $_SESSION['status'] =  "Exam Activated";
    $_SESSION['status_code'] =  "success";
    redirect('succession-monitoring.php',false);
    }

  break;


  















  default:

$sql = "SELECT * FROM employees WHERE pos_id NOT IN (6,7,9,11,20,22,24,27,32,36)";
  $res = $db->query($sql);
  $emp = $res->fetch_assoc();
  $row = $res->num_rows;


  if($row>0){


  do{

    $eid = $emp['employee_id'];

    $sql = "INSERT INTO emp_examinee (employee_id,pos_id) VALUES ('$eid','$id')";
    $re = $db->query($sql);


  }while($emp = $res->fetch_assoc()); }
$query = "UPDATE resigned_employees SET open_exam = 1 WHERE r_id = '$r_id'";
if($db->query($query)){

  $_SESSION['status'] =  "Exam Activated";
    $_SESSION['status_code'] =  "success";
    redirect('succession-monitoring.php',false);
    }

  break;



}








   

?>