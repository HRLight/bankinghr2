<?php
include_once('includes/load.php'); 

$id = $_GET['id'];


$sql= "UPDATE resignations SET status = 'approved' WHERE employee_id = '$id'";
if($db->query($sql)){
    $q = "SELECT * FROM resignations WHERE employee_id = '$id'";
    $res = $db->query($q);
    $d  =$res->fetch_assoc();
    $date = $d['date_effective'];
    
    
    $sql = "INSERT INTO resigned_employees (employee_id,date_resigned) VALUES ('$id','$date')";
    if($db->query($sql)){
        
    
      $_SESSION['status'] =  "Resignation Approved";
            $_SESSION['status_code'] =  "success";
            redirect('ResignationApproval.php',false);
    }else{
        echo 'asdas';
    }
    
}

?>