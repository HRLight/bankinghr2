<?php include('includes/load.php');

if(isset($_POST['add_complain'])){
    
    $ctype = $db->escape($_POST['c_type']);
    $desc = $db->escape($_POST['desc']);
    $fname = $db->escape($_POST['fname']);
    $mname = $db->escape($_POST['mname']);
    $lname = $db->escape($_POST['lname']);
    $dept = $db->escape($_POST['dept']);
    $id = $_POST['id'];
    
    $sql = "INSERT INTO complain (employee_id,fname,mname,lname,type_of_complain,description,";
    $sql .= "department,status) VALUES ('$id','$fname','$mname','$lname','$ctype','$desc','$dept',";
    $sql .= "'pending')";
    
    if($db->query($sql)){

      $_SESSION['status'] = "Complain Filed";
      $_SESSION['status_code'] ="success";
      redirect('complains.php',false);


    }
    
    
    
}

if(isset($_POST['eval_exam'])){

$score = 0;
$id = $_POST['eid'];
$pos = $_POST['pos'];

$ans1 = $db->escape($_POST['ans1']);
$r_ans1 = $db->escape($_POST['r_ans1']);
if($ans1 == $r_ans1){$score = $score + 1 ;}

$ans2 = $db->escape($_POST['ans2']);
$r_ans2 = $db->escape($_POST['r_ans2']);
if($ans2 == $r_ans2){$score = $score + 1 ;}

$ans3 = $db->escape($_POST['ans3']);
$r_ans3 = $db->escape($_POST['r_ans3']);
if($ans3 == $r_ans3){$score = $score + 1;}

$ans4 = $db->escape($_POST['ans4']);
$r_ans4 = $db->escape($_POST['r_ans4']);
if($ans4 == $r_ans4){$score = $score + 1 ;}

$ans5 = $db->escape($_POST['ans5']);
$r_ans5 = $db->escape($_POST['r_ans5']);
if($ans5 == $r_ans5){$score = $score + 1 ;}

$ans6 = $db->escape($_POST['ans6']);
$r_ans6 = $db->escape($_POST['r_ans6']);
if($ans6 == $r_ans6){$score = $score + 1 ;}

$ans7 = $db->escape($_POST['ans7']);
$r_ans7 = $db->escape($_POST['r_ans7']);
if($ans7 == $r_ans7){$score = $score + 1 ;}

$ans8 = $db->escape($_POST['ans8']);
$r_ans8 = $db->escape($_POST['r_ans8']);
if($ans8 == $r_ans8){$score = $score + 1 ;}

$ans9 = $db->escape($_POST['ans9']);
$r_ans9 = $db->escape($_POST['r_ans9']);
if($ans9 == $r_ans9){$score = $score + 1 ;}

$ans10 = $db->escape($_POST['ans10']);
$r_ans10 = $db->escape($_POST['r_ans10']);
if($ans10 == $r_ans10){$score = $score + 1 ;}



$ave = $score / 10 * 100;
$sql = "INSERT INTO exam_ranking (employee_id,pos_id,average) VALUES ('$id','$pos','$ave')";
if($db->query($sql)){
  $sql = "UPDATE emp_examinee SET exam_taken = 1 WHERE employee_id = '$id'";
  if($db->query($sql)){
$_SESSION['status'] = "Your Score is: ".$score;
      $_SESSION['status_code'] ="success";
      redirect('available-exams.php',false);

}
}

}



if(isset($_POST['file_resignation'])){

$id = $_POST['id'];
$reason = $db->escape($_POST['reason']);
$date_eff = $_POST['date_eff'];


$sql = "INSERT INTO resignations (employee_id,reason,date_effective,status) VALUES ";
$sql .= "('$id','$reason','$date_eff','pending')";


 if($db->query($sql)){

      $_SESSION['status'] = "Resignation Filed";
      $_SESSION['status_code'] ="success";
      redirect('resignation.php',false);


    }

}



if(isset($_POST['file_leave'])){

$l_type = $_POST['leave_type'];
$d_start = $_POST['date_start'];
$d_end;
$days;
$leave;
$id = $_POST['id'];

switch ($l_type) {
  case 'maternity':
    $days = 105;
    $leave = 'maternity leave';
    $d_end = date('Y-m-d', strtotime($d_start. ' + 105 days'));
    break;

     case 'paternity':
    $days = 7;
    $leave = 'paternity leave';
    $d_end = date('Y-m-d', strtotime($d_start. ' + 7 days'));
    break;

     case 'sick':
    $days = 15;
    $leave = 'sick leave';
    $d_end = date('Y-m-d', strtotime($d_start. ' + 15 days'));
    break;

     case 'vacation':
    $days = 5;
    $leave = 'vacation leave';
    $d_end = date('Y-m-d', strtotime($d_start. ' + 5 days'));
    break;

     case 'bereavement':
    $days = 3;
    $leave = 'bereavement leave';
    $d_end = date('Y-m-d', strtotime($d_start. ' + 3 days'));
    break;

     case 'emergency':
    $days = 5;
    $leave = 'emergency leave';
    $d_end = date('Y-m-d', strtotime($d_start. ' + 5 days'));
    break;
  }

    $sql = "INSERT INTO leave_request (employee_id,leave_type,days,date_start,date_end,status) ";
    $sql .= "VALUES ('$id','$leave','$days','$d_start','$d_end','pending')";

    if($db->query($sql)){

      $_SESSION['status'] = "Leave Filed";
      $_SESSION['status_code'] ="success";
      redirect('leave.php',false);


    }
  
 






}

if(isset($_POST['file_reimburs'])){

$purpose = $db->escape($_POST['purpose']);
$supp = $db->escape($_POST['supp']);
$address = $db->escape($_POST['add']);
$city = $db->escape($_POST['city']);
$amount = $db->escape($_POST['amount']);
$name = $db->escape($_POST['name']);
$date = date('Y-m-d');


$sql  = "INSERT INTO reimbursment( Co_Source, Co_Desc, Co_Date, Co_Status, Co_Purpose, Co_Supplier, Co_Address, Co_City, Co_Country, Co_Amount) VALUES ('ESS','$name','$date','102','$purpose','$supp','$address','$city','Philippines','$amount')";

 if($db->query($sql)){

    $_SESSION['status'] = "Reimbursment Filed";
      $_SESSION['status_code'] ="success";
      redirect('reimbursements.php',false);


  }



}

if(isset($_POST['add_claim'])){

  $c_type = $_POST['c_type'];
  $c_date  = $_POST['date'];
  $id = $_POST['id'];
  $f_date = date('Y-m-d');

  $sql = "INSERT INTO claims (employee_id,claim_type,filing_date,claiming_date,status) ";
  $sql .="VALUES ('$id','$c_type','$f_date','$c_date','pending')";
   if($db->query($sql)){

    $_SESSION['status'] = "Claim Filed";
      $_SESSION['status_code'] ="success";
      redirect('claims.php',false);


  }


}

if(isset($_POST['add_dtr'])){

$tin = $_POST['time_in'];
$tout = $_POST['time_out'];
$date = $_POST['date'];
$id = $_POST['id'];

$work = round(abs(strtotime($tin) - strtotime($tout)) / 3600,2);


if(strtotime($tin)>strtotime($tout)){

$_SESSION['status'] = "Time IN must be lower than Time OUT";
      $_SESSION['status_code'] ="error";
      redirect('apply_dtr.php?id='.$id,false);

}else{


  $sql = "INSERT INTO time_attendance (employee_id,login_time,logout_time,calculated_work,date,status) ";
  $sql .= "VALUES ('$id','$tin','$tout','$work','$date','pending')";
  if($db->query($sql)){

    $_SESSION['status'] = "DTR added";
      $_SESSION['status_code'] ="success";
      redirect('dtr.php',false);


  }
}



}





if(isset($_POST['changedp'])) {
  $photo = new Media();
  $user_id = (int)$_POST['employee_id'];
  $photo->upload($_FILES['file_upload']);
  if($photo->process_user($user_id)){
     $_SESSION['status'] ="Display picture changed";
      $_SESSION['status_code'] ="success";
    redirect('profile.php');
    } else{
      $_SESSION['status'] = $photo->errors;
      $_SESSION['status_code'] ="error";
      redirect('profile.php');
    }
  }

if(isset($_POST['register'])){


$emp_id = $db->escape($_POST['emp_id']);
$pass1 = $db->escape($_POST['pass1']);
$pass2 = $db->escape($_POST['pass2']);

if(empty($emp_id) OR empty($pass1) OR empty($pass2)){

	 $_SESSION['status'] = "Fill up all input fields";
            $_SESSION['status_code'] = "warning";
      redirect('register.php',false);
}else{

	if($pass1 == $pass2){





	$sql = "SELECT * FROM employees WHERE employee_id = '$emp_id'";
	$res = $db->query($sql);
	$row = $res->num_rows;

	if($row>0){

		$sql = "SELECT * FROM ess_users WHERE employee_id = '$emp_id'";
		$res = $db->query($sql);
		$row = $res->num_rows;
		if($row>0){

			$_SESSION['status'] = "You are already registered";
            $_SESSION['status_code'] = "warning";
      		redirect('register.php',false);

		}else{
			$enc_pass = sha1($pass1);
			$sql = "INSERT INTO ess_users (employee_id,password) VALUES ('$emp_id','$enc_pass')";
			if($db->query($sql)){

				$_SESSION['status'] = "Account Created";
            $_SESSION['status_code'] = "warning";
      		redirect('index.php',false);

			}

		}

	}else{

			$_SESSION['status'] = "You are not our employee";
            $_SESSION['status_code'] = "warning";
      		redirect('register.php',false);

	}

}else{

			$_SESSION['status'] = "Passwords did not matched";
            $_SESSION['status_code'] = "warning";
      		redirect('register.php',false);

}
}



}






if(isset($_POST['forgotp'])){

 $email = $db->escape($_POST['email']);

 $sql = "SELECT employees.*,ess_users.* FROM employees JOIN ess_users ON employees.employee_id";
 $sql .= " = ess_users.employee_id WHERE employees.email = '$email'";
 $res = $db->query($sql);
 $emp = $res->fetch_assoc();
 $row = $res->num_rows;


 if($row>0){

 	$_SESSION['status'] = "ESS Reset password link sent";
            $_SESSION['status_code'] = "success";
      		redirect('index.php',false);


 }else{

			$_SESSION['status'] = "Email not found in employee database";
            $_SESSION['status_code'] = "warning";
      		redirect('forgot-password.php',false);


 }



}


















?>