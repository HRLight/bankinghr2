<?php
session_start();
include('includes/config1.php');

if(isset($_POST['updtplanbtn']))
{
    $id = $_POST['id'];
    
    $fullname = $_POST['fullname'];
    $company = $_POST['company'];
     $type_of_facility = $_POST['type_of_facility'];
      $complain = $_POST['complain'];
       $description = $_POST['description'];
        $remarks = $_POST['remarks'];
         $status = $_POST['status'];
  
    
        $query = "UPDATE facility_complain SET fullname='$fullname', company='$company', type_of_facility='$type_of_facility', complain='$complain', description='$description', remarks='$remarks', status='$status' WHERE id='$id' ";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Facility Complain Info is Updated";
            $_SESSION['status_code'] =  "success";
            header('Location: facility-complain.php');
        }
        else 
        {
            $_SESSION['status'] =  "Facility Complain Info is Not Updated";
            $_SESSION['status_code'] =  "error";
            header('Location: facility-complain.php');
        }
    }

?>