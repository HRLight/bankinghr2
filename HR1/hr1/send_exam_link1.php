<?php
include('includes/load.php');


$id = $db->escape($_GET['id']);
$vkey = sha1($id.date('Y-m-d h:i:s'));
$sql = "INSERT INTO initial_examinee (applicant_id,vkey) VALUES ('$id','$vkey')";
if($db->query($sql)){
$sql = "SELECT * FROM applicants WHERE applicant_id = '$id'";
$result = $db->query($sql);
$e_mail = $result->fetch_assoc();
 	 $to_email = $e_mail['email'];
            $subject = "Exam Notification";
            $body = "<p>Good day today is the day of your scheduled interview along with your examamition click the link below to take you exam. You must finish the exam until 11:59 today Goodluck!</p> <br>";
            $body .= "<a href='https://www.obms.online//HR1/hr1/initial_exam.php?id=".$id."&vkey=".$vkey."''>'>Click Here</a>";
           

            $headers = "From:  BankingAndFinance@obms.online \r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
if (mail($to_email, $subject, $body, $headers)) {
	 $_SESSION['status'] ="Link of examination sent";
      $_SESSION['status_code'] ="success";
    redirect('initial-interviews.php');
}
}