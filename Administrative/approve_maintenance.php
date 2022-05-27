<?php
include_once('includes/load.php');

$id = $_GET['id'];
$sql = "UPDATE maintenance_request SET status = 'approved' WHERE id = '$id'";
if($db->query($sql)){
    $_SESSION['status'] =  "Maintenance Request Approved";
        $_SESSION['status_code'] =  "success";
        redirect('maintenance_approval.php',false);
}

?>