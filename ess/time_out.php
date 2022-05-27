<?php
include('includes/load.php'); 

$id = $db->escape($_GET['id']);
$date = date('Y-m-d');
$logout = date('h:i:s');


$sql = "SELECT * FROM time_attendance WHERE employee_id = '$id' AND date = '$date'";
$res = $db->query($sql);
$lg = $res->fetch_assoc();
$login = $lg['login_time'];




$work = round(abs(strtotime($logout) - strtotime($login)) / 3600,2);
$row = $res->num_rows;
if($row>0){



$sql = "UPDATE time_attendance SET working ='0', logout_time = '$logout' , calculated_work = '$work' WHERE employee_id = '$id' AND date = '$date'";
if($db->query($sql)){
$_SESSION['status'] =  "Shift ended";
    $_SESSION['status_code'] =  "success";
    redirect('dtr.php',false);
}

}

?>