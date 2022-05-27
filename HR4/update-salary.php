<?php
session_start();
include('includes/coninsert.php');

if(isset($_POST['editsalbtn']))
{
    $id = $_POST['e_id'];
    
    
    $e_pdate = $_POST['sal_date'];
    
        $query = "UPDATE payroll SET p_date='$e_pdate' WHERE p_id='$id' ";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Salary is Updated";
            $_SESSION['status_code'] =  "success";
            header('Location: payroll.php');
        }
        else 
        {
            $_SESSION['status'] =  "Salary is Not Updated";
            $_SESSION['status_code'] =  "error";
            header('Location: payroll.php');
        }
    }

?>