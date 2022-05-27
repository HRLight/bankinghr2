<?php
include('includes/load.php');


$id = $db->escape($_POST['id']);
$vkey = $db->escape($_POST['vkey']);

if(isset($_POST['submit'])){

    $ans1 = $_POST['answer1'];
    $ans2 = $_POST['answer2'];
    $ans3 = $_POST['answer3'];
    $ans4 = $_POST['answer4'];
    $ans5 = $_POST['answer5'];
    $ans6 = $_POST['answer6'];
    $ans7 = $_POST['answer7'];
    $ans8 = $_POST['answer8'];
    $ans9 = $_POST['answer9'];
    $ans10 = $_POST['answer10'];
    $q1 = $_POST['question1'];
    $q2 = $_POST['question2'];
    $q3 = $_POST['question3'];
    $q4 = $_POST['question4'];
    $q5 = $_POST['question5'];
    $q6 = $_POST['question6'];
    $q7 = $_POST['question7'];
    $q8 = $_POST['question8'];
    $q9 = $_POST['question9'];
    $q10 = $_POST['question10'];


    if(empty($ans1)){
         $_SESSION['status'] ="Answer all question";
            $_SESSION['status_code'] ="warning";
            redirect('exam.php?id='.$id.'&vkey='.$vkey, false);
     }
     if(empty($ans2)){
         $_SESSION['status'] ="Answer all question";
            $_SESSION['status_code'] ="warning";
            redirect('exam.php?id='.$id.'&vkey='.$vkey, false);
     }
    if(empty($ans3)){
         $_SESSION['status'] ="Answer all question";
            $_SESSION['status_code'] ="warning";
            redirect('exam.php?id='.$id.'&vkey='.$vkey, false);
     }
     if(empty($ans4)){
         $_SESSION['status'] ="Answer all question";
            $_SESSION['status_code'] ="warning";
            redirect('exam.php?id='.$id.'&vkey='.$vkey, false);
     }
     if(empty($ans5)){
         $_SESSION['status'] ="Answer all question";
            $_SESSION['status_code'] ="warning";
            redirect('exam.php?id='.$id.'&vkey='.$vkey, false);
     }
     if(empty($ans6)){
         $_SESSION['status'] ="Answer all question";
            $_SESSION['status_code'] ="warning";
            redirect('exam.php?id='.$id.'&vkey='.$vkey, false);
     }
     if(empty($ans7)){
         $_SESSION['status'] ="Answer all question";
            $_SESSION['status_code'] ="warning";
            redirect('exam.php?id='.$id.'&vkey='.$vkey, false);
     }
     if(empty($ans8)){
         $_SESSION['status'] ="Answer all question";
            $_SESSION['status_code'] ="warning";
            redirect('exam.php?id='.$id.'&vkey='.$vkey, false);
     }
     if(empty($ans9)){
         $_SESSION['status'] ="Answer all question";
            $_SESSION['status_code'] ="warning";
            redirect('exam.php?id='.$id.'&vkey='.$vkey, false);
     }
     if(empty($ans10)){
     
         $_SESSION['status'] ="Answer all question";
            $_SESSION['status_code'] ="warning";
            redirect('exam.php?id='.$id.'&vkey='.$vkey, false);
     }


    $score = 0 ;

    if($q1 == $ans1){$score = $score+10;}
    if($q2 == $ans2){$score = $score+10;}
    if($q3 == $ans3){$score = $score+10;}
    if($q4 == $ans4){$score = $score+10;}
    if($q5 == $ans5){$score = $score+10;}
    if($q6 == $ans6){$score = $score+10;}
    if($q7 == $ans7){$score = $score+10;}
    if($q8 == $ans8){$score = $score+10;}
    if($q9 == $ans9){$score = $score+10;}
    if($q10 == $ans10){$score = $score+10;}
        
       $sql = "INSERT INTO final_exam (applicant_id,score) VALUES ('$id','$score')";
       if($db->query($sql)){
        $sql = "DELETE FROM final_examinee WHERE vkey = '$vkey'";
        if($db->query($sql)){
    $_SESSION['status'] ="Answer submitted your score is".' '.$score;
            $_SESSION['status_code'] ="success";
           redirect('../portal/job-portal/index.php');
       }
   }
}
?>