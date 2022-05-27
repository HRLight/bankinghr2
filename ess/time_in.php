<?php
include('includes/load.php'); 

$id = $db->escape($_GET['id']);
$date = date('Y-m-d');
$time = date('h:i:s');

$q = "SELECT * FROM time_attendance WHERE employee_id = '$id' AND date = '$date'";
$result = $db->query($q);
$num = $result->num_rows;

if($num>0){



$_SESSION['status'] =  "Your Shift is over";
    $_SESSION['status_code'] =  "warning";
    redirect('dtr.php',false);



}else{


$sql = "INSERT INTO time_attendance (employee_id,login_time,working,status,date)";
$sql .= " VALUES ('$id','$time','1','pending','$date')";
if($db->query($sql)){

$_SESSION['status'] =  "Shift Started";
    $_SESSION['status_code'] =  "success";
    redirect('dtr.php',false);
}


}
?>