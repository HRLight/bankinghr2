<?php
  $page_title = 'Learning Schedules';
  require_once('includes/load.php');



$id = $_GET['id'];
$sql = "DELETE FROM seminar_sched WHERE seminar_id = '$id'";
if($db->query($sql)){

 $_SESSION['status'] =  "Request Declined";
  $_SESSION['status_code'] =  "warning";
redirect('learning_sched_approval.php',false);
}
?>