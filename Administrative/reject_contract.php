<?php
include_once('includes/load.php');


$id = $_GET['id'];
$sql = "UPDATE request_contract SET status = 'rejected' WHERE id = '$id'";
if($db->query($sql)){
    
    $_SESSION['status'] =  "Contract Request Rejected";
        $_SESSION['status_code'] =  "warning";
        redirect('RequestContract.php',false);
}


?>