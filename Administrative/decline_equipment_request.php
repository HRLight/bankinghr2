<?php include_once('includes/load.php'); 

$id=$_GET['id'];
$sql="UPDATE request_equipment SET status='rejected' WHERE id = '$id'";
if($db->query($sql)){
     $_SESSION['status'] =  "Request Rejected";
            $_SESSION['status_code'] =  "warning";
            redirect('equipment-pending-request.php',false);
}
?>