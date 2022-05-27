<?php
include('includes/load.php');

if(isset($_POST['addsalarybtn']))
{
    $kwery = "SELECT * FROM obudget WHERE id = '1'";
    $resulta = $db->query($kwery);
    $bud = $resulta->fetch_assoc();
    $budget = intval($bud['HR4']);

 $add_pdate = $_POST['add_pdate'];
 $month = date("m", strtotime ( '-1 month' , strtotime ( $add_pdate ) )) ;
 $year = date('Y',strtotime($add_pdate));
 $add_peid = $_POST['add_peid'];
 $month_start = $year.'-'.$month.'-00';
$month_end = $year.'-'.$month.'-31';

$sql = "SELECT SUM(calculated_work) as work FROM time_attendance JOIN employees ON time_attendance.employee_id";
$sql .= " = employees.employee_id  WHERE time_attendance.date BETWEEN '$month_start' AND '$month_end' AND employees.pos_id = '$add_peid' ";
$res = $db->query($sql);
$total = $res->fetch_assoc();
$t_work = $total['work'];


$q = "SELECT * FROM jobplan WHERE pos_id = '$add_peid'";
$r = $db->query($q);
$d = $r->fetch_assoc();
$h_rate = $d['jp_hrate'];

$t_alloc = intval($t_work) * intval($h_rate);
$r_budget = $budget - $t_alloc;

if($r_budget>=0){


        $query = "INSERT INTO payroll (p_date,pos_id, total_allocation,cutoff_start,cutoff_end) VALUES ('$add_pdate','$add_peid','$t_alloc','$month_start','$month_end')";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $sql = "UPDATE obudget SET HR4 = '$r_budget' WHERE id = '1' ";
            if($db->query($sql)){
            $_SESSION['status'] =  "Salary is Added";
            $_SESSION['status_code'] =  "success";
            header('Location: payroll.php');
            }
        }else{
             $_SESSION['status'] =  "No Coressponding Jobplan";
            $_SESSION['status_code'] =  "error";
            header('Location: payroll.php');
        }
        
    }
}else{
      $_SESSION['status'] =  "Insufficient Budget";
            $_SESSION['status_code'] =  "error";
            header('Location: payroll.php');
}
?>