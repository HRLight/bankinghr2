<?php
session_start();
include('includes/coninsert.php');

if(isset($_POST['addjbplnbtn']))
{	$dept  = $_POST['dept'];
    $add_position = $_POST['jt'];
    $add_type = $_POST['add_type'];
    $add_exp = $_POST['add_exp'];
    $add_salrate = $_POST['add_salrate'];

    $add_drate = intval($add_salrate) / 30;
    $add_hrate = intval($add_drate) / 8;
    $add_otrate = intval($add_hrate) * 1.25;
    $add_ph = intval($add_salrate) * .0275;
    $add_sss = intval($add_salrate) * .0135;
    $add_pi =intval($add_salrate) * .02;
    $add_tax = intval($add_salrate) * .06;
	$jp = $_POST['dept'];
    
        $query = "INSERT INTO jobplan (`dept_id`,`pos_id`,`jp_type`,`jp_exp`,`jp_salrate`,`jp_drate`,`jp_hrate`,`jp_otrate`,`jp_ph`,`jp_sss`,`jp_pi`,`jp_tax`) VALUES ('$dept','$add_position','$add_type','$add_exp','$add_salrate','$add_drate','$add_hrate','$add_otrate','$add_ph','$add_sss','$add_pi','$add_tax')";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Job Plan is Added";
            $_SESSION['status_code'] =  "success";
            header('Location: job-planning.php');
        }
       
    }
?>