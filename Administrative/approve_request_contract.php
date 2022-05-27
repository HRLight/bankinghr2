<?php include_once('includes/load.php'); 

$id=$_GET['id'];
$sql="UPDATE request_contract SET status='Approved' WHERE id = '$id'";
if($db->query($sql)){
     $_SESSION['status'] =  "Request Approved";
            $_SESSION['status_code'] =  "success";
            redirect('RequestContract.php',false);
}



?>