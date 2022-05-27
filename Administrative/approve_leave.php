<?php 
include_once('includes/load.php'); 

$id=$_GET['id'];

$sql="UPDATE leave_request SET status='approved' WHERE leave_id = '$id'";
if($db->query($sql)){
    $query = "SELECT * FROM leave_request WHERE leave_id = '$id'";
    $res = $db->query($query);
    $in = $res->fetch_assoc();
    $eid = $in['employee_id'];
    $dstart = $in['date_start'];
    $dend = $in['date_end'];
    
    $sql= "INSERT INTO leave_credits (employee_id,leave_type,date_start,date_end) VALUES ('$eid','$ltype','$dstart','$dend')";
    if($db->query($sql)){
     $_SESSION['status'] =  "Leave Approved";
            $_SESSION['status_code'] =  "success";
            redirect('leave_approval.php',false);
    }
}



?>