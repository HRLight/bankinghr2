<?php include_once('includes/load.php'); 

$id=$_GET['id'];
$sql="UPDATE complain SET status='rejected' WHERE id = '$id'";
if($db->query($sql)){
     $_SESSION['status'] =  "Complain rejected";
            $_SESSION['status_code'] =  "warning";
            redirect('complains.php',false);
}
?>