<?php
require_once('includes/load.php');

$id = $_GET['id'];
$sql = "SELECT department FROM deployment WHERE employee_id = '$id' ";
$result = $db->query($sql);
$dept = $result->fetch_assoc();


$sql = "SELECT * FROM employees WHERE employee_id = '$id';";
$result = $db->query($sql);
$emp = $result->fetch_assoc();
$name = $emp['first_name'];
$eid = $emp['pos_id'];
$emp_id = $emp['employee_id'];
$email = $emp['email'];

$sq = "SELECT positions.*,departments.* FROM positions JOIN departments ON positions.dept_id = departments.dept_id WHERE positions.pos_id ='$eid'";
$resu = $db->query($sq);
$posii = $resu->fetch_assoc();
$pos = $posii['pos_name'];
$dept = $posii['dept_name'];
$depart = str_replace(' ','',$dept);
$user_level = 2;

switch ($pos){

  //HR 1
  case 'hr1_manager ':
   $user_level = 1;
    break;

    //h2
     case 'hr2_manager ':
   $user_level = 1;
    break;

    //hr3
     case 'hr3_manager ':
   $user_level = 1;
    break;

    //hr4
     case 'hr4_manager ':
   $user_level = 1;
    break;

    //admin
     case 'financials_manager ':
   $user_level = 1;
    break;
     case 'administrative_manager ':
   $user_level = 1;
    break;

    //core 1
     case 'core1_manager ':
   $user_level = 1;
    break;
    //core 2
     case 'core2_manager ':
   $user_level = 1;
    break;
    //log 1
     case 'logistics1_manager ':
   $user_level = 1;
    break;
    // log 2
     case 'logistics2_manager ':
   $user_level = 1;
    break;


    default:
    $user_level = 2;
  

    
}


$username = $name."_".$pos;
$pass = sha1($name.'1234');



$sql = "INSERT INTO users (employee_id, name, username, password, user_level, position, department, status) VALUES ('$emp_id','$name','$username','$pass',' $user_level','$pos','$depart','1')";

if($db->query($sql)){

   $subject = "Deployment Notification";
            $body = "<p>Good day we are glad to inform you that you have been deployed. <br>";
            $body .= "Please see the details below:</p> <br>";
            $body .= "<ul>";
            $body .= "<li> Department: ".$dept." </li>";
            $body .= "<li> Position: ".str_replace('_',' ',$pos)." </li><br>";
            $body .= "<li> Employee ID: ".$emp_id." </li></ul><br>";
            $body .= "<p>You may use this account to login to our system</p><br>";
            $body .= "<ul><li>Username: ".$username."</li><br>";
            $body .= "<li>Password: ".$name.'1234'."</li></ul>";


            $headers = "From:  BankingAndFinance@obms.online \r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

if (mail($email, $subject, $body, $headers)){


$sql = "DELETE FROM new_hires WHERE employee_id = '$id'";
if($db->query($sql)){


  $_SESSION['status'] = "Deployment success";
            $_SESSION['status_code'] = "success";
      redirect('deployment.php',false);

}

}

}








?>