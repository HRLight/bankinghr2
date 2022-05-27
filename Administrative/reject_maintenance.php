<?php
include_once('includes/load.php');

$id = $_GET['id'];
$sql = "UPDATE maintenance_request SET status = 'rejected' WHERE id = '$id'";
if($db->query($sql)){
    $_SESSION['status'] =  "Maintenance Request Rejected";
        $_SESSION['status_code'] =  "warning";
        redirect('maintenance_approval.php',false);
}

?>