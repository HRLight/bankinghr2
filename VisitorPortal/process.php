<?php
include_once('includes/load.php'); 




if(isset($_POST['comein'])){
    
    
    $fname = $db->escape($_POST['fname']);
    $mname = $db->escape($_POST['mname']);
    $lname = $db->escape($_POST['lname']);
    $dept = $db->escape($_POST['dept']);
    $add = $db->escape($_POST['add']);
    $email = $db->escape($_POST['email']);
    $gend = $db->escape($_POST['gend']);
    $cont = $db->escape($_POST['cont']);
    $vtype = $db->escape($_POST['vtype']);
    $vpurp = $db->escape($_POST['vpurp']);
    
    $time = date('h:i:s');
    $date =  date('Y-m-d');
    $ref_no = uniqid('obms_');
    $sql = "INSERT INTO visitor_registration (ref_no,last_name,first_name,middle_name,department,address,email,contact,gender,";
    $sql .= "visitor_type,visitor_purpose,time_in) VALUES ('$ref_no','$lname','$fname','$mname','$dept','$add','$email',";
    $sql .= "'$cont','$gend','$vtype','$vpurp','$time')";
    if($db->query($sql)){
      $_SESSION['status'] =  "Information Saved";
            $_SESSION['status_code'] =  "success";
            redirect('ticket.php?ref='.$ref_no,false);
    }
    
}

if(isset($_POST['out'])){
    
    
$ref = $db->escape($_POST['refi']);
$time = date('h:i:s');

$query =  "SELECT * FROM visitor_registration WHERE ref_no = '$ref'";
$res = $db->query($query);
$num = $res->num_rows;


if($num>0){
    $sql = "UPDATE visitor_registration SET time_out = '$time' WHERE ref_no = '$ref'";
if($db->query($sql)){
    
    $_SESSION['status'] =  "Time Out Successful";
            $_SESSION['status_code'] =  "success";
            redirect('index.php',false);
}
}else{
    
    $_SESSION['status'] =  "Wrong Reference number";
            $_SESSION['status_code'] =  "error";
            redirect('time_out.php'.$ref_no,false);
}
}














?>