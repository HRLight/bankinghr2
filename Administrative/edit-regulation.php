<?php
session_start();
include('includes/config1.php');

if(isset($_POST['updtplanbtn']))
{
    $id = $_POST['id'];
    
    $ra_no = $_POST['ra_no'];
    $date = $_POST['date'];
       $Description = $_POST['Description'];
  
    
        $query = "UPDATE rules_and_regulation SET ra_no='$ra_no', date='$date', Description='$Description' WHERE id='$id' ";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Rules and Regulation Info is Updated";
            $_SESSION['status_code'] =  "success";
            header('Location: rulesandregulation.php');
        }
        else 
        {
            $_SESSION['status'] =  "Rules and Regulation Info is Not Updated";
            $_SESSION['status_code'] =  "error";
            header('Location: rulesandregulation.php');
        }
    }

?>