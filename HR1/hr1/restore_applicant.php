<?php
  $page_title = 'All User';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database


 $id = $db->escape($_GET['id']);


 $sql = "SELECT applicant_archive.*,account_verification_archive.* FROM applicant_archive JOIN account_verification_archive ON applicant_archive.applicant_id = account_verification_archive.applicant_id WHERE applicant_archive.applicant_id = '$id'";
 $result = $db->query($sql);
 $app = $result->fetch_assoc();
 $app_id = $app['applicant_id'];
 $fname = $app['first_name'];
 $mname = $app['middle_name'];
 $lname = $app['last_name'];
 $email = $app['email'];
 $cont = $app['contact_number'];
 $email = $app['email'];
 $pass = $app['password'];
 $bday = $app['birth_date'];
 $age = $app['age'];
 $gend = $app['gender'];
 $cs = $app['civil_status'];
 $rel = $app['religion'];
 $add = $app['address'];
 $ll = $app['last_login'];
 $dp = $app['profile_pic'];
 $vkey = $app['vkey'];
 $ver = $app['verified'];


 $query = "INSERT INTO `applicants`(`applicant_id`, `first_name`, `middle_name`, `last_name`, `email`, `password`, `contact_number`, `birth_date`, `age`, `gender`, `civil_status`, `religion`, `address`, `last_login`, `profile_pic`) VALUES ('$app_id','$fname','$mname','$lname','$email','$pass','$cont','$bday','$age','$gend','$cs','$rel','$add','$ll','$dp')";

  if($db->query($query)){

    $sq = "INSERT INTO account_verification (applicant_id,vkey,verified) VALUES ('$app_id','$vkey','$ver')";
    if($db->query($sq)){

  
      $q = "DELETE FROM applicant_archive WHERE applicant_id = '$id'";
       if($db->query($q)){
      $_SESSION['status'] =  "Data Restored";
    $_SESSION['status_code'] =  "success";
    header('Location: archive.php');
  }

  }
}

?>













