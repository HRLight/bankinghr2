<?php
session_start();
include('includes/select.php');

if(isset($_POST['add_promoted'])){

$emp = $_POST['pos'];


$sql = "UPDATE promoted_list SET status = 'pending' WHERE promotion_id = '$emp'";
$query = mysqli_query($connect, $sql);
     if($query){
  
   $_SESSION['status'] =  "Promotion Created";
    $_SESSION['status_code'] =  "success";
    header('Location: succession-promotion.php');

   
   }


}

if(isset($_POST['editempques'])){

$question = mysqli_real_escape_string($connect,$_POST['question']);
$ans = mysqli_real_escape_string($connect,$_POST['answer']);
$opt1 = mysqli_real_escape_string($connect,$_POST['opt1']);
$opt2 = mysqli_real_escape_string($connect,$_POST['opt2']);
$opt3 = mysqli_real_escape_string($connect,$_POST['opt3']);
$id = mysqli_real_escape_string($connect,$_POST['id']);

$sql = "UPDATE emp_questionaires SET question = '$question', answer = '$ans', option1 = '$opt1', option2 = '$opt2', option3 = '$opt3' WHERE question_id = '$id'";
$query = mysqli_query($connect, $sql);
     if($query){
  
   $_SESSION['status'] =  "Question Updated";
    $_SESSION['status_code'] =  "success";
    header('Location: hr_emp_exams.php');

   
   }

}

if(isset($_POST['delempques'])){

$id = $_POST['delId'];


$sql = "DELETE FROM emp_questionaires WHERE question_id = '$id'";



$query = mysqli_query($connect, $sql);
     if($query){
  
   $_SESSION['status'] =  "Question Deleted";
    $_SESSION['status_code'] =  "Warning";
    header('Location: hr_emp_exams.php');

   
   }

}

if(isset($_POST['addempques'])){


$question = mysqli_real_escape_string($connect,$_POST['que']);
$ans = mysqli_real_escape_string($connect,$_POST['ans']);
$opt1 = mysqli_real_escape_string($connect,$_POST['opt1']);
$opt2 = mysqli_real_escape_string($connect,$_POST['opt2']);
$opt3 = mysqli_real_escape_string($connect,$_POST['opt3']);
$dept = mysqli_real_escape_string($connect,$_POST['dept']);

$sql = "INSERT emp_questionaires (dept_id,question,answer,option1,option2,option3) VALUES ";
$sql .= "('$dept','$question','$ans','$opt1','$opt2','$opt3')";


$query = mysqli_query($connect, $sql);
     if($query){
  
   $_SESSION['status'] =  "Question Added";
    $_SESSION['status_code'] =  "success";
    header('Location: hr_emp_exams.php');

   
   }



}

if(isset($_POST['addsuccessionplan'])){

$dept = $_POST['dept'];
$pos = $_POST['pos'];
$emp = $_POST['emp'];


    $sql = "SELECT * FROM positions WHERE pos_id = '$pos'";
    $query = mysqli_query($connect, $sql);
    $p = mysqli_fetch_assoc($query);
    $pname = $p['pos_name'];

$que = "SELECT * FROM promoted_list WHERE employee_id = '$emp' AND promotion_pos = '$pname'";
$quer = mysqli_query($connect, $que);
$num = mysqli_num_rows($quer);
if($num >0){

$_SESSION['status'] =  "Already a successor";
    $_SESSION['status_code'] =  "error";
    header('Location: succession-monitoring.php');

}else{
 $sql = "INSERT INTO `succession_plan`(`dept_id`, `pos_id`, `employee_id`) VALUES ('$dept','$pos','$emp')";

 $query = mysqli_query($connect, $sql);
     if($query){
   $_SESSION['status'] =  "Succesor Plan Created";
    $_SESSION['status_code'] =  "success";
    header('Location: succession-monitoring.php');
    }
}

   
   



}

if(isset($_POST['evalsr'])){

    $qw = $_POST['qw'];
    $qual = $_POST['qual'];
    $jk = $_POST['jk'];
    $init = $_POST['init'];
    $dep = $_POST['dep'];
    $adap = $_POST['adap'];
    $t_id = $_POST['t_id'];
    $eid = $_POST['e_id'];
    $sum = $qw + $qual + $init + $dep + $adap + $jk ;
    $ave = $sum/6;

    $sql = "INSERT INTO seminar_eval_grades (seminar_id,employee_id,seminar_average) VALUES";
    $sql .= " ('$t_id','$eid','$ave')";
    $query = mysqli_query($connect, $sql);
     if($query){
  
   $_SESSION['status'] =  "Evaluation Complete";
    $_SESSION['status_code'] =  "success";
    header('Location: seminar_participants.php');

   
   }

}


if(isset($_POST['evaltraining'])){

    $qw = $_POST['qw'];
    $qual = $_POST['qual'];
    $jk = $_POST['jk'];
    $init = $_POST['init'];
    $dep = $_POST['dep'];
    $adap = $_POST['adap'];
    $t_id = $_POST['t_id'];
    $eid = $_POST['e_id'];
    $sum = $qw + $qual + $init + $dep + $adap + $jk;
    $ave = $sum/6;

    $sql = "INSERT INTO training_eval_grades (t_id,employee_id,training_average) VALUES";
    $sql .= " ('$t_id','$eid','$ave')";
    $query = mysqli_query($connect, $sql);
     if($query){
  
   $_SESSION['status'] =  "Evaluation Complete";
    $_SESSION['status_code'] =  "success";
    header('Location: training-course.php');

   
   }

}




if(isset($_POST['setnewt'])){

$loc = $_POST['facility'];
$ext = 'no';
$id =$_POST['id'];

if($loc == 'others'){
    $loc = mysqli_real_escape_string($connect,$_POST['loca']);
    $ext = 'yes';
    
    
  }


   $sql = "UPDATE newhire_training SET location = '$loc',external = '$ext', status = 'manager approval' WHERE employee_id ='$id'";
 $query = mysqli_query($connect, $sql);
 if($query){
  
   $_SESSION['status'] =  "Location Set";
    $_SESSION['status_code'] =  "success";
    header('Location: newhire_training.php');

   
   }

}


if(isset($_POST['setorient'])){
$loc = $_POST['facility'];
$id = $_POST['eid'];
if($loc == 'others'){
    $loc = mysqli_real_escape_string($connect,$_POST['loca']);
    $ext = 'yes';
    
    
  }else{
    $loc = $_POST['facility'];
$ext = 'no';

  }

$sql = "UPDATE orientation SET location = '$loc',external = '$ext', status = 'manager approval' WHERE employee_id ='$id'";
 $query = mysqli_query($connect, $sql);
  if($query){
    $_SESSION['status'] =  "Location Set";
    $_SESSION['status_code'] =  "success";
    header('Location: orientation_sched.php');
  }

}



if(isset($_POST['addtraining'])){

    $tname = mysqli_real_escape_string($connect,$_POST['tname']);
 
    $dfrom = mysqli_real_escape_string($connect,$_POST['ts_from']);
    $dto = mysqli_real_escape_string($connect,$_POST['ts_to']);
    $time = mysqli_real_escape_string($connect,$_POST['time2']);
    
    $tloc = mysqli_real_escape_string($connect,$_POST['facility']);
    $tbudget =$_POST['budget'];
    $ext = 'no';
     if($tloc == 'others'){
    $tloc = mysqli_real_escape_string($connect,$_POST['loca']);
    $ext = 'yes';
  }

$sql = "INSERT INTO training_sched (t_name,date_start,date_end,facility_name,budget,status,external,time) VALUES ";
$sql .= "('$tname','$dfrom','$dto','$tloc','$tbudget','manager approval','$ext','$time')";
$query = mysqli_query($connect, $sql);
  if($query){

    $sql = "SELECT * FROM training_sched WHERE t_name = '$tname' ";
    $query = mysqli_query($connect, $sql);
    $t_name = mysqli_fetch_assoc($query);
    if($query){
    foreach ($_POST['part'] as $emp) {
        $id = $t_name['t_id'];
        $sql = "INSERT INTO training_participants (t_id,employee_id) VALUES ('$id','$emp')";
        $res = mysqli_query($connect, $sql);
    }
     $_SESSION['status'] =  "Schedule Added";
    $_SESSION['status_code'] =  "success";
    header('Location: training-sched.php');
}else{
    echo 'male2';
}

}else{
    
}



}




if(isset($_POST['add_sched'])){

  $title = mysqli_real_escape_string($connect,$_POST['title']);
  $date = mysqli_real_escape_string($connect,$_POST['date']);
  $date = date('Y-m-d');
  $time = $_POST['time'];
  $location = $_POST['loc'];
  

  $sql = "INSERT INTO seminar_sched (title,date,time,location) VALUES ('$title','$date','$time','$location')";
  $query = mysqli_query($connect, $sql);
  if($query){
    $_SESSION['status'] =  "Schedule Added";
    $_SESSION['status_code'] =  "success";
    header('Location: learning_schedules.php');
  }

}

if(isset($_POST['delquali'])){

$id = mysqli_real_escape_string($connect,$_POST['delId']);
$page =mysqli_real_escape_string($connect,$_POST['page']);

$sql = "DELETE FROM job_qualifications WHERE id = '$id'";
$query = mysqli_query($connect, $sql);

    if($query){

        $_SESSION['status'] =  "Job qualification Deleted";
        $_SESSION['status_code'] =  "success";
        header('Location: '.$page);

    }

}



if(isset($_POST['editquali'])){

    $id = mysqli_real_escape_string($connect,$_POST['id']);
   
    $jd = mysqli_real_escape_string($connect,$_POST['jd']);
    $jq = mysqli_real_escape_string($connect,$_POST['jq']);
   
    $page = mysqli_real_escape_string($connect,$_POST['page']);

    $sql = "UPDATE job_qualifications SET  job_desc = '$jd', job_quali = '$jq'";
    $sql .= " WHERE id = '$id'";
    $query = mysqli_query($connect, $sql);

    if($query){

        $_SESSION['status'] =  "Job qualification Updated";
        $_SESSION['status_code'] =  "success";
        header('Location: '.$page);

    }

}

if(isset($_POST['addquali'])){

    
    $jt = mysqli_real_escape_string($connect,$_POST['jt']);
    $jd = mysqli_real_escape_string($connect,$_POST['jd']);
    $jq = mysqli_real_escape_string($connect,$_POST['jq']);
    
    $dept = mysqli_real_escape_string($connect,$_POST['dept']);
    $page = mysqli_real_escape_string($connect,$_POST['page']);

    $sql = "INSERT INTO job_qualifications (pos_id,job_desc,job_quali,dept_id) ";
    $sql .= "VALUES ('$jt','$jd','$jq','$dept')";
    $query = mysqli_query($connect, $sql);

    if($query){

        $_SESSION['status'] =  "Job qualification Added";
        $_SESSION['status_code'] =  "success";
        header('Location: '.$page);

    }else{
      echo  $_POST['jt'];
   echo $_POST['dept'];
   
    }


}


if(isset($_POST['addEvalCombtn']))
{
    $eceid = mysqli_real_escape_string($connect,$_POST['ec_eid']);
    $ecgt = mysqli_real_escape_string($connect,$_POST['ec_gt']);
    $ecge = mysqli_real_escape_string($connect,$_POST['ec_ge']);
    $ectotal = mysqli_real_escape_string($connect,$_POST['ec_total']);
    
        $query = "INSERT INTO evalcom (`ec_eid`,`ec_gt`,`ec_ge`,`ec_total`) VALUES ('$eceid','$ecgt','$ecge','$ectotal')";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Evaluation Is Added";
            $_SESSION['status_code'] =  "success";
            header('Location: eval-com.php');
        }
        else 
        {
            // echo "not done";
            $_SESSION['status'] =  "Evaluation Is Not Added";
            $_SESSION['status_code'] =  "error";
            header('Location: eval-com.php');
        }
}

if(isset($_POST['editbtnEvalnewsCom']))
{
    $id = $_POST['evalComId'];
    
    $ecgt = $_POST['ec_gt'];
    $ecge = $_POST['ec_ge'];
    $ectotal = $_POST['ec_total'];
    
        $query = "UPDATE evalcom SET ec_gt='$ecgt', ec_ge='$ecge', ec_total='$ectotal' WHERE ec_id='$id' ";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Evaluation is Updated";
            $_SESSION['status_code'] =  "success";
            header('Location: eval-com.php');
        }
        else 
        {
            $_SESSION['status'] =  "Evaluation is Not Updated";
            $_SESSION['status_code'] =  "error";
            header('Location: eval-com.php');
        }
    }

    if(isset($_POST['delEvalbtnshCom']))
{
    $id = $_POST['delEvalidCom'];
    
    
        $query = "DELETE FROM evalcom WHERE ec_id='$id' ";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Evaluation is Deleted";
            $_SESSION['status_code'] =  "success";
            header('Location: eval-com.php');
        }
        else 
        {
            $_SESSION['status'] =  "Evaluation is Not Deleted";
            $_SESSION['status_code'] =  "error";
            header('Location: eval-com.php');
        }
    }

if(isset($_POST['addListCombtn']))
{
    $lceid = $_POST['lc_eid'];
    $lcen = $_POST['lc_en'];
    $lcmot = $_POST['lc_mot'];
    $lcad = $_POST['lc_ad'];
    
        $query = "INSERT INTO listcom (`lc_eid`,`lc_en`,`lc_mot`,`lc_ad`) VALUES ('$lceid','$lcen','$lcmot','$lcad')";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Competent Is Added";
            $_SESSION['status_code'] =  "success";
            header('Location: list-com.php');
        }
        else 
        {
            // echo "not done";
            $_SESSION['status'] =  "Competent Is Not Added";
            $_SESSION['status_code'] =  "error";
            header('Location: list-com.php');
        }
}
if(isset($_POST['editbtnListcomnews']))
{
    $id = $_POST['listComId'];
    
    $lcen = $_POST['lc_en'];
    $lcmot = $_POST['lc_mot'];
    $lcad = $_POST['lc_ad'];
    
        $query = "UPDATE listcom SET lc_en='$lcen', lc_mot='$lcmot', lc_ad='$lcad' WHERE lc_id='$id' ";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Competent is Updated";
            $_SESSION['status_code'] =  "success";
            header('Location: list-com.php');
        }
        else 
        {
            $_SESSION['status'] =  "Competent is Not Updated";
            $_SESSION['status_code'] =  "error";
            header('Location: list-com.php');
        }
    }
if(isset($_POST['delListbtnshCom']))
{
    $id = $_POST['delListidCom'];
    
    
        $query = "DELETE FROM listcom WHERE lc_id='$id' ";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Competent is Deleted";
            $_SESSION['status_code'] =  "success";
            header('Location: list-com.php');
        }
        else 
        {
            $_SESSION['status'] =  "Competent is Not Deleted";
            $_SESSION['status_code'] =  "error";
            header('Location: list-com.php');
        }
    }
    if(isset($_POST['addPrombtns']))
{
    $peid = $_POST['p_eid'];
    $ptype = $_POST['p_type'];
    $pdate = $_POST['p_date'];
    
        $query = "INSERT INTO prom (`p_eid`,`p_type`,`p_date`) VALUES ('$peid','$ptype','$pdate')";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Promotion Is Added";
            $_SESSION['status_code'] =  "success";
            header('Location: succession-promotion.php');
        }
        else 
        {
            // echo "not done";
            $_SESSION['status'] =  "Promotion Is Not Added";
            $_SESSION['status_code'] =  "error";
            header('Location: succession-promotion.php');
        }
}
if(isset($_POST['editBtnProm']))
{
    $id = $_POST['promId'];
    
    $pt = $_POST['p_type'];
    $pd = $_POST['p_date'];
    
        $query = "UPDATE prom SET p_type='$pt', p_date='$pd' WHERE p_id='$id' ";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Promotion is Updated";
            $_SESSION['status_code'] =  "success";
            header('Location: succession-promotion.php');
        }
        else 
        {
            $_SESSION['status'] =  "Promotion is Not Updated";
            $_SESSION['status_code'] =  "error";
            header('Location: succession-promotion.php');
        }
    }
if(isset($_POST['delNewOne']))
{
    $id = $_POST['delPromId'];
    
    
        $query = "DELETE FROM prom WHERE p_id='$id' ";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Promotion is Deleted";
            $_SESSION['status_code'] =  "success";
            header('Location: succession-promotion.php');
        }
        else 
        {
            $_SESSION['status'] =  "Promotion is Not Deleted";
            $_SESSION['status_code'] =  "error";
            header('Location: succession-promotion.php');
        }
    }
if(isset($_POST['addcrsbtnsw']))
{
    $tcname = $_POST['tc_name'];
    $tcdesc = $_POST['tc_desc'];
    
        $query = "INSERT INTO tcourse (`tc_name`,`tc_desc`) VALUES ('$tcname','$tcdesc')";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Training Is Added";
            $_SESSION['status_code'] =  "success";
            header('Location: training-course.php');
        }
        else 
        {
            // echo "not done";
            $_SESSION['status'] =  "Training Is Not Added";
            $_SESSION['status_code'] =  "error";
            header('Location: training-course.php');
        }
}

if(isset($_POST['delcrsntniai']))
{
    $id = $_POST['delcrsId'];
    
    
        $query = "DELETE FROM tcourse WHERE tc_id='$id' ";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Training is Deleted";
            $_SESSION['status_code'] =  "success";
            header('Location: training-course.php');
        }
        else 
        {
            $_SESSION['status'] =  "Training is Not Deleted";
            $_SESSION['status_code'] =  "error";
            header('Location: training-course.php');
        }
    }

if(isset($_POST['editCrsbtns']))
{
    $id = $_POST['crsId'];
    
    $crsName = $_POST['crsName'];
    $crsDesc = $_POST['crsDesc'];
    
        $query = "UPDATE tcourse SET tc_name='$crsName', tc_desc='$crsDesc'  WHERE tc_id='$id' ";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Training is Updated";
            $_SESSION['status_code'] =  "success";
            header('Location: training-course.php');
        }
        else 
        {
            $_SESSION['status'] =  "Training is Not Updated";
            $_SESSION['status_code'] =  "error";
            header('Location: training-course.php');
        }
    }
if(isset($_POST['addSchedPartbtn']))
{
    $tssid = $_POST['ts_sid'];
    $tsname = $_POST['ts_name'];
    $tspart = $_POST['ts_part'];
    $tsmax = $_POST['ts_maxtrain'];
    $tsfrom = $_POST['ts_from'];
    $tsto = $_POST['ts_to'];
    $tsstatus = $_POST['ts_status'];
    
        $query = "INSERT INTO tsched (`ts_sid`,`ts_name`,`ts_part`,`ts_maxtrain`,`ts_from`,`ts_to`,`ts_status`) VALUES ('$tssid','$tsname','$tspart','$tsmax','$tsfrom','$tsto','$tsstatus')";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Schedule Is Added";
            $_SESSION['status_code'] =  "success";
            header('Location: training-sched.php');
        }
        else 
        {
            // echo "not done";
            $_SESSION['status'] =  "Schedule Is Not Added";
            $_SESSION['status_code'] =  "error";
            header('Location: training-sched.php');
        }
}
if(isset($_POST['addnewsched']))
{
    $tssid = $_POST['ts_sid'];
    $tsname = $_POST['ts_name'];
    $tspart = $_POST['ts_part'];
    $tsmax = $_POST['ts_maxtrain'];
    $tsfrom = $_POST['ts_from'];
    $tsto = $_POST['ts_to'];
    $tsstatus = $_POST['ts_status'];
    
        $query = "INSERT INTO tsched (`ts_sid`,`ts_name`,`ts_part`,`ts_maxtrain`,`ts_from`,`ts_to`,`ts_status`) VALUES ('$tssid','$tsname','$tspart','$tsmax','$tsfrom','$tsto','$tsstatus')";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Participant Is Added";
            $_SESSION['status_code'] =  "success";
            header('Location: training-sched.php');
        }
        else 
        {
            // echo "not done";
            $_SESSION['status'] =  "Participant Is Not Added";
            $_SESSION['status_code'] =  "error";
            header('Location: training-sched.php');
        }
}

if(isset($_POST['delschedbtnnw']))
{
    $id = $_POST['delschedSid'];
    
    
        $query = "DELETE FROM tsched WHERE ts_sid='$id' ";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Schedule is Deleted";
            $_SESSION['status_code'] =  "success";
            header('Location: training-sched.php');
        }
        else 
        {
            $_SESSION['status'] =  "Schedule is Not Deleted";
            $_SESSION['status_code'] =  "error";
            header('Location: training-sched.php');
        }
    }
if(isset($_POST['addEvalbtn']))
{
    $tetname = $_POST['te_tname'];
    $teeid = $_POST['te_eid'];
    $tetest1 = $_POST['te_test1'];
    $tetest2 = $_POST['te_test2'];
    $tetest3 = $_POST['te_test3'];
    $tetest4 = $_POST['te_test4'];
    $tetest5 = $_POST['te_test5'];
    $tetotal = $_POST['te_total'];
    
        $query = "INSERT INTO teval (`te_tname`,`te_eid`,`te_test1`,`te_test2`,`te_test3`,`te_test4`,`te_test5`,`te_total`) VALUES ('$tetname','$teeid','$tetest1','$tetest2','$tetest3','$tetest4','$tetest5','$tetotal')";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Evaluation Is Added";
            $_SESSION['status_code'] =  "success";
            header('Location: training-eval.php');
        }
        else 
        {
            // echo "not done";
            $_SESSION['status'] =  "Evaluation Is Not Added";
            $_SESSION['status_code'] =  "error";
            header('Location: training-eval.php');
        }
}
if(isset($_POST['delEvalbtnsh']))
{
    $id = $_POST['delEvalid'];
    
    
        $query = "DELETE FROM teval WHERE te_id='$id' ";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Evaluation is Deleted";
            $_SESSION['status_code'] =  "success";
            header('Location: training-eval.php');
        }
        else 
        {
            $_SESSION['status'] =  "Evaluation is Not Deleted";
            $_SESSION['status_code'] =  "error";
            header('Location: training-eval.php');
        }
    }
if(isset($_POST['editbtnEvalnews']))
{
    $id = $_POST['teEdtid'];
    
    $tetest1 = $_POST['te_test1'];
    $tetest2 = $_POST['te_test2'];
    $tetest3 = $_POST['te_test3'];
    $tetest4 = $_POST['te_test4'];
    $tetest5 = $_POST['te_test5'];
    $tetotal = $_POST['te_total'];
    
        $query = "UPDATE teval SET te_test1='$tetest1', te_test2='$tetest2', te_test3='$tetest3', te_test4='$tetest4', te_test5='$tetest5', te_total='$tetotal'  WHERE te_id='$id' ";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Evaluation is Updated";
            $_SESSION['status_code'] =  "success";
            header('Location: training-eval.php');
        }
        else 
        {
            $_SESSION['status'] =  "Evaluation is Not Updated";
            $_SESSION['status_code'] =  "error";
            header('Location: training-eval.php');
        }
    }
if(isset($_POST['addsubjbtnsw']))
{
     $que = $_POST['que'];
     $ans = $_POST['ans'];
      $dept = $_POST['dept'];
      $page = $_POST['page'];
      $pos = $_POST['pos'];
        $op1=$_POST['ops'];
      $op2=$_POST['opr'];
      $op3=$_POST['opd'];
    
        $query = "INSERT INTO questionaires (question,answer,dept_id ,pos_id,Option1,Option2,Option3) VALUES ('$que','$ans','$dept','$pos','$op1','$op2','$op3')";
          $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
          $_SESSION['status'] =  "Question added";
            $_SESSION['status_code'] =  "success";
            header('Location: '.$page);
        }
       
}
if(isset($_POST['delsubjntniai']))
{
    $id = mysqli_real_escape_string($connect, $_POST['delId']);
    $page = mysqli_real_escape_string($connect, $_POST['page']);
    
        $query = "DELETE FROM questionaires WHERE id='$id' ";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Subject is Deleted";
            $_SESSION['status_code'] =  "success";
            header('Location: '.$page);
        }
        else 
        {
            $_SESSION['status'] =  "Subject is Not Deleted";
            $_SESSION['status_code'] =  "error";
            header('Location: '.$page);
        }
    }
if(isset($_POST['editquestionhr']))
{
   $id = mysqli_real_escape_string($connect, $_POST['id']);
    $question= mysqli_real_escape_string($connect, $_POST['question']);
    $answer= mysqli_real_escape_string($connect, $_POST['answer']);
    $page = mysqli_real_escape_string($connect, $_POST['page']);
    $op1= mysqli_real_escape_string($connect, $_POST['op1']);
    $op2= mysqli_real_escape_string($connect, $_POST['op2']);
    $op3= mysqli_real_escape_string($connect, $_POST['op3']);
    
    
        $query = "UPDATE questionaires SET question='$question', answer='$answer', Option1='$op1',Option2='$op2',Option3='$op3' WHERE id='$id' ";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Question is Updated";
            $_SESSION['status_code'] =  "success";
            header('Location: '.$page);
        }
        else 
        {
            $_SESSION['status'] =  "Answer is Not Updated";
            $_SESSION['status_code'] =  "error";
            header('Location: '.$page);
        }
    }
if(isset($_POST['addtstbtnsw']))
{
    $sub_id = $_POST['sub_id'];
    $test_name = $_POST['test_name'];
    $total_que = $_POST['total_que'];
    
        $query = "INSERT INTO mst_test (`sub_id`,`test_name`,`total_que`) VALUES ('$sub_id','$test_name','$total_que')";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Test Is Added";
            $_SESSION['status_code'] =  "success";
            header('Location: exam-test.php');
        }
        else 
        {
            // echo "not done";
            $_SESSION['status'] =  "Test Is Not Added";
            $_SESSION['status_code'] =  "error";
            header('Location: exam-test.php');
        }
}
if(isset($_POST['addtstbtnsw1']))
{
    $test_id = $_POST['test_id'];
    $que_desc = $_POST['que_desc'];
    $ans1 = $_POST['ans1'];
    $ans2 = $_POST['ans2'];
    $ans3 = $_POST['ans3'];
    $ans4 = $_POST['ans4'];
    $true_ans = $_POST['true_ans'];
    
        $query = "INSERT INTO mst_question (`test_id`,`que_desc`,`ans1`,`ans2`,`ans3`,`ans4`,`true_ans`) VALUES ('$test_id','$que_desc','$ans1','$ans2','$ans3','$ans4','$true_ans')";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Question Is Added";
            $_SESSION['status_code'] =  "success";
            header('Location: exam-question.php');
        }
        else 
        {
            // echo "not done";
            $_SESSION['status'] =  "Question Is Not Added";
            $_SESSION['status_code'] =  "error";
            header('Location: exam-question.php');
        }
}

if(isset($_POST['updateinfonow']))
{
    $id = $_POST['id'];
    
    $name = $_POST['name'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $bdate = $_POST['bdate'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    
        $query = "UPDATE users SET name='$name', mname='$mname', lname='$lname', bdate='$bdate', gender='$gender', address='$address', contact='$contact', email='$email'  WHERE id='$id' ";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Personal Information is Updated";
            $_SESSION['status_code'] =  "success";
            header('Location: personal-infou.php?id='.$_SESSION['user_id'].'');
        }
        else 
        {
            $_SESSION['status'] =  "Personal Information is Not Updated";
            $_SESSION['status_code'] =  "error";
            header('Location: personal-infou.php?id='.$_SESSION['user_id'].'');
        }
    }

if(isset($_POST['addLeaveBtn']))
{
    $lvide = $_POST['lv_ide'];
    $lvtp = $_POST['lv_tp'];
    $lvf = $_POST['lv_f'];
    $lvt = $_POST['lv_t'];
    $lvr = $_POST['lv_r'];
    $lvs = "Pending";
    
        $query = "INSERT INTO lv (`lv_ide`,`lv_tp`,`lv_f`,`lv_t`,`lv_r`,`lv_s`) VALUES ('$lvide','$lvtp','$lvf','$lvt','$lvr','$lvs')";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Leave Is Requested";
            $_SESSION['status_code'] =  "success";
            header('Location: leave.php');
        }
        else 
        {
            // echo "not done";
            $_SESSION['status'] =  "Leave Is Not Requested";
            $_SESSION['status_code'] =  "error";
            header('Location: leave.php');
        }
}



?>