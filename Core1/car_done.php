<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php include_once('layouts/header.php'); ?>
<style>
#wrapper{
	background-color: white;
	text-align: center;
	width: 95%;
	margin: 2% auto;
	margin-left: 2%;
	padding-left: 2%;
	padding-right: 2%;
	padding-bottom: 2%;
	webkit-box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42); 
	box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42);
}
#btns{
	background-color: #969696;
	border: none;
	color: white;
	padding: 8px 10px;
	font-size: 15px;
	cursor: pointer;
}
#btnss{
	text-decoration: none;
	color: white;
}
.tops{
	padding-top: 50px;
}
p{
	font-size: 50px;
}
</style>
<div id="wrapper">
<?php
    include('includes/config2.php');
    $id = $_GET['id'];
    $query = "select * from `car_loans` where `id` = '$id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $id = $row['id'];
            $car_type = $row['car_type'];
            $unit = $row['unit'];
            $vehicle_price = $row['vehicle_price'];
            $loan_amount = $row['loan_amount'];
            $downpayment = $row['downpayment'];
            $loan_term = $row['loan_term'];
            $fname = $row['fname'];
            $mname = $row['mname'];
            $lname = $row['lname'];
            $sex = $row['sex'];
            $civil_status = $row['civil_status'];
            $home_address = $row['home_address'];
            $perma_address = $row['perma_address'];
            $date_of_birth = $row['date_of_birth'];
            $place_of_birth = $row['place_of_birth'];
            $mobile_no = $row['mobile_no'];
            $email_address = $row['email_address'];
            $tin_sss_gsis_no = $row['tin_sss_gsis_no'];
            $source_of_income = $row['source_of_income'];
            $monthly_income = $row['monthly_income'];
            $employeer_name = $row['employeer_name'];
            $position = $row['position'];
            $companyname = $row['companyname'];
            $bankname = $row['bankname'];
            $accountnum = $row['accountnum'];
            $fid = $row['fid'];
            $sid = $row['sid'];
            $tid = $row['tid'];
            $date_of_loan = $row['date_of_loan'];




            $query = "INSERT INTO `approve_car` (`id`, `car_type`, `unit`, `vehicle_price`, `loan_amount`, `downpayment`, `loan_term`, `fname`, `mname`, `lname`, `sex`, `civil_status`, `home_address`, `perma_address`, `date_of_birth`, `place_of_birth`, `mobile_no`, `email_address`, `tin_sss_gsis_no`, `source_of_income`, `monthly_income`, `employeer_name`, `position`, `companyname`, `bankname`, `accountnum`, `fid`, `sid`, `tid`, `date_of_loan`) VALUES ('$id','$car_type', '$unit', '$vehicle_price', '$loan_amount', '$downpayment', '$loan_term', '$fname','$mname', '$lname', '$sex', '$civil_status', '$home_address', '$perma_address', '$date_of_birth','$place_of_birth', '$mobile_no', '$email_address', '$tin_sss_gsis_no', '$source_of_income', '$monthly_income', '$employeer_name', '$position', '$companyname', '$bankname', '$accountnum', '$fid', '$sid', '$tid', '$date_of_loan');";
        }
        $query .= "DELETE FROM `car_loans` WHERE `car_loans`.`id` = '$id';";
        if(performQuery($query)){
			echo "<div class='tops'>";
            echo "<p> Client has been Approved.</p>";
			echo "</div>";
        }else{
			echo "<div class='tops'>";
            echo "<p>Unknown error occured. Please try again.</p>";
			echo "</div>";
        }
    }else{
		echo "<div class='tops'>";
        echo "<p>Error occured.</p>";
        echo "</div>";
    }
    
?>
<br/><br/>
<hr>
<button class="btn btn-secondary" id="btns"><a href="carloan.php" id="btnss">Back</a></button>
</div>
<?php include_once('layouts/footer.php'); ?>