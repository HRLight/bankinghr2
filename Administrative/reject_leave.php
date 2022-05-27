<?php 
include_once('includes/load.php'); 

$id=$_GET['id'];

$sql="UPDATE leave_request SET status='rejected' WHERE leave_id = '$id'";
if($db->query($sql)){
    $query = "SELECT * FROM leave_request WHERE leave_id = '$id'";
    $res = $db->query($query);
    $in = $res->fetch_assoc();
    $eid = $in['employee_id'];
    $dstart = $in['date_start'];
    $dend = $in['date_end'];
    
   
     $_SESSION['status'] =  "Leave Rejected";
            $_SESSION['status_code'] =  "success";
            redirect('leave_approval.php',false);
    
}