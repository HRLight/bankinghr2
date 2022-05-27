<?php
  require_once('includes/load.php');


  $id = $db->escape($_GET['id']);

  $sql = "UPDATE seminar_sched SET status = 'finished' WHERE seminar_id = '$id'";
  if($db->query($sql)){

    $_SESSION['status'] =  "Seminar complete";
    $_SESSION['status_code'] =  "success";
   redirect('learning_schedules.php',false);
  }


?>