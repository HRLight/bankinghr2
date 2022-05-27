<?php
  
  require_once('includes/load.php');


$id = $db->escape($_GET['id']);
$date= $db->escape($_GET['date']);
$title = $db->escape($_GET['title']);

$sql = "SELECT * FROM social_recognition WHERE employee_id = '$id' AND date = '$date' AND award = '$title'";
$result = $db->query($sql);
$row = $result->fetch_assoc();

if($row>0){
 $_SESSION['status'] ="Request to print certificate is already existing";
            $_SESSION['status_code'] = "warning";
      redirect('training-awards.php');


}else{
$sql = "SELECT training_sched.*,training_participants.* FROM training_sched JOIN training_participants ";
$sql .= "ON training_sched.t_id = training_participants.t_id WHERE employee_id = '$id'";
$result = $db->query($sql);
$info = $result->fetch_assoc();
$date = $info['date_end'];
$title = $info['t_name'];
$sql = "INSERT INTO social_recognition (employee_id,date,award,status) values ('$id','$date','$title','for approval')";
if($db->query($sql)){
$_SESSION['status'] ="Printing of certificate request was sent to the manager";
            $_SESSION['status_code'] = "success";
      redirect('training-awards.php');
}


}



?>