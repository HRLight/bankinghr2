<?php
 
  require_once('includes/load.php');
$id = $_GET['id'];

$sql = "SELECT succession_plan.*,positions.* FROM succession_plan JOIN positions ON succession_plan.pos_id";
$sql .= " = positions.pos_id WHERE succession_plan.id = '$id'";
$result = $db->query($sql);
$pos = $result->fetch_assoc();
$promoted_pos = $pos['pos_name'];
$eid = $pos['employee_id'];

$query = "SELECT employees.*,positions.* FROM employees JOIN positions ON employees.pos_id = positions.pos_id WHERE employees.employee_id = '$eid'";
$res = $db->query($query);
$cpos = $res->fetch_assoc();
$posfrom = $cpos['pos_name'];

$q = "INSERT INTO promoted_list (employee_id,promotion_pos,from_pos) VALUES ('$eid','$promoted_pos','$posfrom')";
if($db->query($q)){

  $_SESSION['status'] =  "Employee Added to Promotion List";
    $_SESSION['status_code'] =  "success";
    header('Location: succession-monitoring.php');
}

?>