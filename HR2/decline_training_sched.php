<?php
  $page_title = 'Learning Schedules';
  require_once('includes/load.php');



$id = $_GET['id'];
$sql = "DELETE FROM training_sched WHERE t_id = '$id'";
if($db->query($sql)){

 $_SESSION['status'] =  "Request Declined";
  $_SESSION['status_code'] =  "warning";
redirect('training_approval.php',false);
}
?>