<?php
include_once('includes/load.php');
$id = $_GET['id'];

$sql = "DELETE FROM employee_documents WHERE applicant_id = '$id'";
if($db->query($sql)){
    
    $sq = "SELECT email FROM applicants WHERE applicant_id = $id";
$result = $db->query($sq);
$e_mail = $result->fetch_assoc();
 	 $to_email = $e_mail['email'];
            $subject = "Invalid Document Notice";
            $body = "<p>Good day! We are sorry to inform you that the documents that have you uploaded as part of our hiring process was invalid please upload new documents and make sure that the documents are on document format</p> <br>";
           
           

            $headers = "From:  bankingandfinance@obms.online \r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
if (mail($to_email, $subject, $body, $headers)) {
 
     $_SESSION['status'] ="Documents rejected";
            $_SESSION['status_code'] = "warning";
      redirect('applicants-for-hiring.php',false);
}
}


?>