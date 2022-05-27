<?php include_once('includes/load.php'); 

$id=$_GET['id'];
$sql="UPDATE resignations SET status='rejected' WHERE employee_id = '$id'";
if($db->query($sql)){
     $_SESSION['status'] =  "Complain rejected";
            $_SESSION['status_code'] =  "warning";
            redirect('ResignationApproval.php',false);
}