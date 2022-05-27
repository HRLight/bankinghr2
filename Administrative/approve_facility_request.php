<?php include_once('includes/load.php'); 

$id=$_GET['id'];
$sql="UPDATE request_facility SET status='approved' WHERE id = '$id'";
if($db->query($sql)){
     $_SESSION['status'] =  "Request Approved";
            $_SESSION['status_code'] =  "success";
            redirect('facility-pending-request.php',false);
}



?>