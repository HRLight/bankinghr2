<?php include_once('includes/load.php'); ?>
<?php
$req_fields = array('username','password' );
validate_fields($req_fields);
$username = remove_junk($_POST['username']);
$password = remove_junk($_POST['password']);

  if(empty($errors)){
    $user = authenticate_v2($username, $password);

    $userlevel=$user['user_level'];
    $userDept=$user['Department'];
    $userPos=$user['Position'];
    $eid = $user['employee_id'];

    $PersonName= remove_junk(ucfirst($user['name']));

        if($user){
          if ($user['status'] === '1'){

            $q = "DELETE FROM 2fa WHERE employee_id ='$eid'";
            if($db->query($q)){

            $code = rand(1000,9999);
            $query = "SELECT email FROM employees WHERE employee_id = '$eid'";
            $result = $db->query($query);
            $mail = $result->fetch_assoc();
            $email = $mail['email'];

             $to_email = $email;
            $subject = "2FA OTP";
            $body = "<p>Here's your OTP <b>".$code."</br> </p> <br>";

            $headers = "From:  BankingAndfinance@obms.online \r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        if (mail($to_email, $subject, $body, $headers)) {
            
            $sql = "INSERT INTO 2fa (employee_id,code) VALUES ('$eid','$code')";
            if($db->query($sql)){
            redirect('2fa.php?id='.$eid,false);

          }

          }
        }


             }else{
        $session->msg("w", "Sorry Account Temporarily deactivated.");
        redirect('index.php',false);
        }
        }else{
        $session->msg("d", "Sorry Username/Password incorrect.");
        redirect('index.php',false);
        }
           } else {
      $session->msg("d", $errors);
     redirect('login_v2.php',false);
     }



?>
