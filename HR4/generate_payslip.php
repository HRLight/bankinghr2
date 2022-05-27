<?php
  require_once('includes/load.php');

$p_id = $_GET['pid'];
$pos_id = $_GET['pos'];
$jp_id = $_GET['plan'];

$query = "SELECT * FROM payroll WHERE p_id = '$p_id'";
$result = $db->query($query);
$payroll = $result->fetch_assoc();
$paydate = $payroll['p_date'];

$sql = "SELECT * FROM employees WHERE pos_id = '$pos_id'";
$res = $db->query($sql);
$emp = $res->fetch_assoc();
$row = $res->num_rows;

if($row>0){
do{
  $id = $emp['employee_id'];

  $sql = "SELECT SUM(calculated_work) as work ,jobplan.*,positions.*,payroll.*,employees.*,time_attendance.* FROM jobplan JOIN positions ON jobplan.pos_id = positions.pos_id JOIN payroll ON positions.pos_id = payroll.pos_id JOIN employees ON jobplan.pos_id = employees.pos_id JOIN time_attendance ON employees.employee_id = time_attendance.employee_id WHERE payroll.p_date = '$paydate'";
  $res = $db->query($sql);
  $info = $res->fetch_assoc();
  $total_work = $info['work'];
$id = $info['employee_id'];
$cut_start = $info['cutoff_start'];
$cut_end = $info['cutoff_end'];
$gross_pay = intval($info['work']) * intval($info['jp_hrate']);
$s_day = $paydate;
$sss = $gross_pay * 0.0135;
$pag_ibig = $gross_pay * 0.02;
$phil = $gross_pay * 0.0275;
$tax = $gross_pay * 0.06;

$net_pay = $gross_pay - $phil - $sss - $pag_ibig - $tax;

$que  = "INSERT INTO payslips (employee_id,total_work,gross,net,sss,pagibig,phil,tax,pay_date,cut_start,cut_end) VALUES ('$id','$total_work','$gross_pay','$net_pay','$sss','$pag_ibig','$phil','$tax','$paydate','$cut_start','$cut_end')";
if($db->query($que)){


    $_SESSION['status'] =  "Payslips Generated";
            $_SESSION['status_code'] =  "success";
            header('Location: payroll.php');
}









}while($emp = $res->fetch_assoc());


}








 
?>