<?php
session_start();
include('includes/config1.php');

if(isset($_POST['updtplanbtn']))
{
    $id = $_POST['id'];
    $policy = $_POST['policy'];
    $description = $_POST['description'];
    $datecreated = $_POST['datecreated'];
    
        $query = "UPDATE visitorpolicy SET policy='$policy', description='$description', 
		datecreated='$datecreated' WHERE id='$id' ";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Visitor Policy Info is Updated";
            $_SESSION['status_code'] =  "success";
            header('Location: visitorpolicy.php');
        }
        else 
        {
            $_SESSION['status'] =  "Visitor Policy Info is Not Updated";
            $_SESSION['status_code'] =  "error";
            header('Location: visitorpolicy.php');
        }
    }

?>