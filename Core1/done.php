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
    $query = "select * from `mortgages` where `id` = '$id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
    	 	$id = $row['id'];
            $ref_no = $row['ref_no'];
            $loan_amount = $row['loan_amount'];
            $loan_terms = $row['loan_terms'];
            $fname = $row['fname'];
            $mname = $row['mname'];
            $lname = $row['lname'];
            $sex = $row['sex'];
            $civil_status = $row['civil_status'];
            $perma_address = $row['perma_address'];
            $date_0f_birth = $row['date_0f_birth'];
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
            $firstid = $row['firstid'];
            $secondid = $row['secondid'];
            $thirdid = $row['thirdid'];
            $query = "INSERT INTO `approve_housing` (`id`,`ref_no`, `loan_amount`, `loan_terms`, `fname`, `mname`, `lname`, `sex`, `civil_status`, `perma_address`, `date_0f_birth`, `place_of_birth`, `mobile_no`, `email_address`, `tin_sss_gsis_no`, `source_of_income`, `monthly_income`, `employeer_name`, `position`, `companyname`, `bankname`, `accountnum`, `firstid`, `secondid`, `thirdid`) VALUES ('$id', '$ref_no', '$loan_amount', '$loan_terms', '$fname', '$mname', '$lname', '$sex','$civil_status', '$perma_address', '$date_0f_birth', '$place_of_birth', '$mobile_no', '$email_address', '$tin_sss_gsis_no','$source_of_income', '$monthly_income', '$employeer_name', '$position', '$companyname', '$bankname', '$accountnum', '$firstid', '$secondid', '$thirdid');";
        }
        $query .= "DELETE FROM `mortgages` WHERE `mortgages`.`id` = '$id';";
        if(performQuery($query)){
			echo "<div class='tops'>";
            echo "<p> Client Approved.</p>";
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
<button class="btn btn-secondary" id="btns"><a href="housingloan1.php" id="btnss">Back</a></button>
</div>
<?php include_once('layouts/footer.php'); ?>