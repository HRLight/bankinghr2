<?php
session_start();
include('includes/config1.php');

if(isset($_POST['updtplanbtn']))
{
    $id = $_POST['id'];
    $fname = $_POST['fname'];
        $mname = $_POST['mname'];
            $lname = $_POST['lname'];
                $department = $_POST['department'];
                    $type_of_complain = $_POST['type_of_complain'];
                         $description = $_POST['description'];
                            $remarks = $_POST['remarks'];
                                $status = $_POST['status'];
  
    
        $query = "UPDATE complain SET fname='$fname', mname='$mname', lname='$lname', department='$department', type_of_complain='$type_of_complain', description='$description', remarks='$remarks', status='$status' WHERE id='$id' ";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Legal Complain Info is Updated";
            $_SESSION['status_code'] =  "success";
            header('Location: complains.php');
        }
        else 
        {
            $_SESSION['status'] =  "Legal Complain Info is Not Updated";
            $_SESSION['status_code'] =  "error";
            header('Location: complains.php');
        }
    }

?>