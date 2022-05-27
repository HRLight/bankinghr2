<?php
  require_once('includes/load.php');
  $use = current_user();
  if(!$session->logout()) {

    redirect("index.php");}
?>
