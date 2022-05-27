<?php
  
  require_once('includes/load.php');


$id = $db->escape($_GET['id']);
$date = $db->escape($_GET['date']);
$title = $db->escape($_GET['title']);
$sql = "SELECT * FROM social_recognition WHERE employee_id = '$id' AND date = '$date' AND award = '$title'";
$result = $db->query($sql);
$row = $result->fetch_assoc();

if($row>0){

 $_SESSION['status'] ="Request to print certificate is already existing";
            $_SESSION['status_code'] = "warning";
      redirect('seminar-awards.php');

}else{
$sql = "SELECT seminar_sched.*,seminar_participants.* FROM seminar_sched JOIN seminar_participants ON ";
$sql .="seminar_sched.seminar_id = seminar_participants.seminar_id WHERE seminar_participants.employee_id = '$id'";
$result = $db->query($sql);
$info = $result->fetch_assoc();
$date = $info['date'];
$title = $info['title'];
$sql = "INSERT INTO social_recognition (employee_id,date,award,status) values ('$id','$date','$title','for approval')";
if($db->query($sql)){
	$_SESSION['status'] ="Printing of certificate request was sent to the manager";
            $_SESSION['status_code'] = "success";
      redirect('seminar-awards.php');
}

}


?>