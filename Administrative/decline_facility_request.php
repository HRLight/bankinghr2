<?php include_once('includes/load.php'); 

$id=$_GET['id'];
$sql="UPDATE request_facility SET status='rejected' WHERE id = '$id'";
if($db->query($sql)){
     $_SESSION['status'] =  "Request  rejected";
            $_SESSION['status_code'] =  "warning";
            redirect('facility-pending-request.php',false);
}
?>