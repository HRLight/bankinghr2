<?php include_once('includes/load.php'); 

$id=$_GET['id'];
$sql="UPDATE complain SET status='approved' WHERE id = '$id'";
if($db->query($sql)){
     $_SESSION['status'] =  "Complain Approved";
            $_SESSION['status_code'] =  "success";
            redirect('complains.php',false);
}



?>