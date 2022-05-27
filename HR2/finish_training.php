<?php
  require_once('includes/load.php');


  $id = $db->escape($_GET['id']);

  $sql = "UPDATE training_sched SET status = 'finished' WHERE t_id = '$id'";
  if($db->query($sql)){

    $_SESSION['status'] =  "Training complete";
    $_SESSION['status_code'] =  "success";
   redirect('training-sched.php',false);
  }


?>