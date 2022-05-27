<?php include_once('includes/load.php'); ?>
<?php



$req_fields = array('username','password' );
validate_fields($req_fields);
$username = remove_junk($_POST['username']);
$password = remove_junk($_POST['password']);

if(empty($errors)){
  $user_id = authenticate_v2($username, $password);
  if($user_id){
    //create session with id
     $session->login($user_id);
    //Update Sign in time
     updateLastLogIn($user_id);
       $_SESSION['status'] = "Welcome to Employee Self Service"; 
       $_SESSION['status_code'] = 'success';
     redirect('profile.php',false);
  


      
     

  } else {
     $_SESSION['status'] = "Incorrect Username/Password"; 
       $_SESSION['status_code'] = 'warning';
    redirect('index.php',false);
  }

} else {
   $_SESSION['status'] = $errors; 
       $_SESSION['status_code'] = 'warning';
   redirect('index.php',false);
}

?>
