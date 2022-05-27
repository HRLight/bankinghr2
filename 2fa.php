<?php
  ob_start();
  require_once('includes/load.php');
 
 if(isset($_POST['verify'])){

  $code = $db->escape($_POST['code']); 
  $id = $db->escape($_POST['id']);

  $sql = "SELECT * FROM 2fa WHERE employee_id = '$id'";
  $res = $db->query($sql);
  $emp = $res->fetch_assoc();

  if($code == $emp['code']){

    $sql = "SELECT * FROM users WHERE employee_id = '$id'";
    $res = $db->query($sql);
    $user = $res->fetch_assoc();

    $userlevel=$user['user_level'];
    $userDept=$user['Department'];
    $userPos=$user['Position'];
    $eid = $user['employee_id'];


     //create session with id
           $session->login($user['id']);
           //Update Sign in time
           updateLastLogIn($user['id']);
           // redirect user to group Finance page by user level-----------------

                     //SUPER ADMIN

                  switch ([$userlevel, $userDept, $userPos]) {
                       case ['1', 'SuperAdmin','Administrator']:

                        // Logging user entries................
                       $Log=$PersonName.',a '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('admin.php',false);
                       break;

    //FINANCE ------------------------------------------------------------------------
                       case ['1', 'Financials','financials_manager'];
                        // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $_SESSION['status']="Welcome!";
                       $_SESSION['status_code']="success";
                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('Finance/admin.php',false);
                       break;

                       case ['2', 'Financials','collection_officer'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................
                        $_SESSION['status']="Welcome!";
                       $_SESSION['status_code']="success";
                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('Finance/user_dashboard.php',false);
                       break;

                       case ['2', 'Financials','disbursement_officer'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................
                        $_SESSION['status']="Welcome!";
                       $_SESSION['status_code']="success";
                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('Finance/user_dashboard.php',false);
                       break;

                       case ['2', 'Finance','bookeeper'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................
                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('Finance/',false);
                       break;

                       case ['2', 'Finance','budget_officer'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................
                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('Finance/',false);
                       break;



      //HR1 ----------------------------------------------------------------------------------------------
                       case ['1', 'HR1','hr1_manager'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('HR1/hr1/manager.php',false);
                       break;

                        case ['2', 'HR1','recruitment_staff'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('HR1/hr1/job-posting.php',false);
                       break;

                        case ['2', 'HR1','applicant_managing_staff'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('HR1/hr1/qualified-applicants.php',false);
                       break;

                        case ['2', 'HR1','onboarding_staff'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('HR1/hr1/newhire-onboard.php',false);
                       break;

                        case ['2', 'HR1','performance_monitoring_staff'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('HR1/hr1/performance_dashboard.php',false);
                       break;


                         case ['2', 'HR1','social_recognition_staff'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('HR1/hr1/social-recognition.php',false);
                       break;



      //HR2
                         case ['1', 'HR2','hr2_manager'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('HR2/admin.php',false);
                       break;

                       case ['2', 'HR2','hr_officer'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('HR2/admin.php',false);
                       break;


                       case ['2', 'HR2','training_officer'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('HR2/',false);
                       break;


       //HR3		   
					   case ['1', 'HR3','hr3_manager'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('HR3/index.php',false);
                       break;

                       case ['2', 'HR3','hr3_manager'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('HR3/index.php',false);
                       break;
					   
					   case ['3', 'HR3','hr3_staff'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('HR3/index.php',false);
                       break;


      // HR4
                       case ['1', 'HR4','hr4_manager'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('HR4/admin.php',false);
                       break;

                       case ['2', 'HR4','hr4_staff'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('HR4/',false);
                       break;

     //ADMINISTRATIVE
                       case ['1', 'Administrative','administrative_manager'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello ".$user['username'].", Welcome to Administrative System");
                       redirect('Administrative/admin.php',false);
                       break;
                       
                       
                       case ['2','Administrative','administrative_staff'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello ".$user['username'].", Welcome to Administrative System");
                       redirect('Administrative/user_dashboard.php',false);
                       break;
                       

   //CORE1
                
                       case ['1', 'Core1','core1_manager'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello ".$user['username'].", Welcome to Core1 System");
                       redirect('Core1/admin.php',false);
                       break;
                       
                       
                       case ['2','Core1','core1_staff'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello ".$user['username'].", Welcome to Administrative System");
                       redirect('Core1/user_dashboard.php',false);
                       break;
      //CORE2
                       
                        case ['1', 'Core2','core2_manager'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Logistic 1 Module..");
                       redirect('CORE2/admin.php',false);
                       break;
                       
                       case ['2', 'Core2','teller'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('CORE2/cashtransaction.php',false);
                       break;
                       
//LOG1
                       case ['1','Logistics1','logistics1_manager'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect(' Logistic1/admin.php',false);
                       break;

                       case ['2', 'Logistics1','logistics_staff'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('LOG1/',false);
                       break;
//LOG 2

                       case ['1', 'Logistics2','logistics2_manager'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('Logistic2/admin.php',false);
                       break;

                       case ['2', 'Logistics1','driver'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('LOG2/',false);
                       break;


                       case ['2', 'Logistics1','vendor_manager'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('LOG2/',false);
                       break;

                       case ['2', 'Logistics1','driver'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('LOG2/',false);
                       break;

                       case ['2', 'Logistics1','fleet_manager'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('LOG2/',false);
                       break;


                       case ['2', 'Logistics1','logistics_staff'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('LOG2/',false);
                       break;

                      }

                      
                      
                      

       
     

  }else{
     $_SESSION['status'] =  "Wrong code";
    $_SESSION['status_code'] =  "Warning";
    redirect('Location: 2fa.php?id='.$id,false);
  }

 }
  
?>
<?php include_once('layouts/header.php'); ?>

<div class="container containerLog">
      <?php echo display_msg($msg); ?>
      <div class="wrapper wrapperLog">
        <div class="title"><span><h3>Two Factor Authentication</h3></span> </div>
        <form class="clearfix" method="post" action="2fa.php">
          <div class="row">
           <div class=" justify-content-center align-items-center container">
        <div class="card py-5 px-3">
            <span class="mobile-text">Enter the code we just send on your Email </span>
            <div class="row mt-5">
              <input type="text" maxlength="4" name="code"  placeholder="           INPUT OTP" required>
           
              <input type="hidden" name="id" value="<?php echo $db->escape($_GET['id'])?>"  >
            
        </div>
    </div>
         
         
          <div class="row button">
            <button type="submit" name="verify" style="border-radius:0%">Verify</button>
          </div>
          <div class="signup-link">All rights reserved. <a href="#">AABank</a></div>
        </form>
      </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
