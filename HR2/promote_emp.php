<?php

  require_once('includes/load.php');

$id = $_GET['id'];
$date = date('Y-m-d');

$sql = "SELECT promoted_list.*,positions.*,departments.* FROM promoted_list JOIN positions ON promoted_list.promotion_pos = ";
$sql .= "positions.pos_name JOIN departments ON positions.dept_id = departments.dept_id WHERE promoted_list.promotion_id = '$id'";
$result = $db->query($sql);
$info = $result->fetch_assoc();
$eid = $info['employee_id'];
$pos_to = $info['pos_id'];
$pos_name = $info['pos_name'];
$dept = $info['dept_id'];
$dept_name = str_replace(' ','',$info['dept_name']);




$query = "UPDATE employees SET pos_id = '$pos_to', dept_id = '$dept' WHERE employee_id = '$eid'";
if($db->query($query)){

 $sql = "UPDATE users SET Department = '$dept_name', Position = '$pos_name' WHERE employee_id = '$eid'";
if($db->query($sql)){

$sql = "UPDATE promoted_list SET status = 'promoted' WHERE promotion_id = '$id'";
if($db->query($sql)){

   $_SESSION['status'] =  "Employee Promoted";
    $_SESSION['status_code'] =  "success";
    redirect('succession-promotion.php');

  }
}

  }


?>