<?php
include_once('includes/load.php');
$amount = $_POST['budget'];
$date = date('Y-m-d');
$sql = "INSERT INTO proposals (PR_department,PR_Requestor,PR_amount,PR_Date,Co_Status)";
$sql .= " VALUES ('HR2,','HR2','$amount','$date','102')";

if($db->query($sql)){
     $_SESSION['status'] =  "Budget Request Created";
            $_SESSION['status_code'] =  "success";
            redirect('payroll.php',false);
}

?>