<?php
 $page_title = 'New Hire Onboard';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
$user_id = $_SESSION['user_id'] ;

$current_user = current_user($user_id);

if($current_user['user_level'] != 1 ){
 page_require_level(2);
}else{
	page_require_level(1);
}


$id = $_GET['id'];
if(isset($_POST['submit'])){


if(empty($_POST['date'])){
	$_SESSION['status'] ="Set the date";
            $_SESSION['status_code'] = "warning";
      redirect('sched_orientation.php?id='.$id,false);
}else{
	$date = remove_junk($db->escape($_POST['date']));
}

if(empty($_POST['time'])){
	
  $_SESSION['status'] ="Set the time";
            $_SESSION['status_code'] = "warning";
      redirect('sched_orientation.php?id='.$id,false);
}else{
	$time = remove_junk($db->escape($_POST['time']));
}



$sql = "INSERT INTO orientation (employee_id,date,time,status) VALUE ('$id','$date','$time','for approval');";
if($db->query($sql)){

	$sql = "UPDATE new_hires SET status = 'ongoing orientation'";
if($db->query($sql)){

$sql = "SELECT email FROM employees WHERE employee_id = $id";
$result = $db->query($sql);
$e_mail = $result->fetch_assoc();
 	 $to_email = $e_mail['email'];
            $subject = "Orientation notice";
            $body = "<p>Good day we are glad to inform you that your orientation date is already set.<br>";
            $body .= 'Please attend at the scheduled date, failure to attend at the scheduled date will <br>';
            $body .= "be condsidered failure of your application <br>";
            $body .= "Please see the details below:</p> <br>";
            $body .= "<ul>";
            $body .= "<li> Date: ".date('m-d-Y',strtotime($date))."</li>";
            $body .= "<li> Time: ".$time."</li>";
            $body .= "Things to bring:<br>";
            $body .= "<ul><li>Basic ID </li>";
            $body .= "<li> Ballpen</li>";
            $body .= "<p>Please wear corporate attire. We will send a follow up email for the location of your orientation.</p>";
           

            $headers = "From:  BankingAndfinance@obms.online \r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
if (mail($to_email, $subject, $body, $headers)) {
$sql = "DELETE FROM contract_signing WHERE employee_id = '$id'";
if($db->query($sql)){


    
    $_SESSION['status'] ="Orientation date scheduled. An email was sent to the employee";
            $_SESSION['status_code'] = "success";
      redirect('orientation.php',false);
    }
}else{

    
     $_SESSION['status'] ="theres something wrong";
            $_SESSION['status_code'] = "error";
          redirect('orientation.php', false);
}
 
	

}
}
}
include_once('layouts/header.php'); ?>

<nav class="breadcrumbs">
  
    <a href="view_contract_signing.php" class="breadcrumbs__item">Back</a>
  <a href="#" class="breadcrumbs__item is-active">Orientation Scheduling</a>
</nav>

<div class="row" style="margin-bottom:10%; max-height: 600px;">
  <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Orientation Scheduling</span>
       </strong>
        
      </div>



      <div class="panel-body">
		<form method="post" action="sched_orientation.php?id=<?php echo $id; ?>">
			<div class="col">
			<div class="col-md-1">
			<label>Date</label>
			</div>
			
			<input  type="Date" name="date" min="<?php $today = date('Y-m-d'); echo $today ?>" style="width: 300px;">
			</div>

			<div class="col " style="margin-top: 30px;">
			<div class="col-md-1">
			<label>Time</label>
			</div>
			<input type="Time" name="time" style="width: 300px;" >
			</div>


			<div class="col" style="margin-top: 30px;">
				<button type="submit" name="submit" class="btn btn-sm btn-success"><i class="bi bi-calendar"></i>Set schedule</button>
			</div>

		</form>
      </div>
  </div>
  </div>
</div>




  <?php include_once('layouts/footer.php'); ?>