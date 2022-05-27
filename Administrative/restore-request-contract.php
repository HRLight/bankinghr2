<?php
	require_once('includes/config1.php');
	
	if(ISSET($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		
		$query=mysqli_query($conn, "SELECT * FROM `archive_request_contract` WHERE `id`='$id'") or die(mysqli_error());
		$fetch=mysqli_fetch_array($query);
		$req_id=$fetch['req_id'];
		$req_class=$fetch['req_class'];
		$fname=$fetch['fname'];
		$mname=$fetch['mname'];
		$lname=$fetch['lname'];
		$type_of_contract=$fetch['type_of_contract'];
		$department=$fetch['department'];
		$statusr=$fetch['status'];
		$date_of_requeste=$fetch['date_of_request'];
		
		
		mysqli_query($conn, "INSERT INTO `request_contract` VALUES('', '$req_id', '$req_class', '$fname', '$mname', '$lname', '$type_of_contract', '$department', '$statusr', '$date_of_request')") or die(mysqli_error());
		mysqli_query($conn, "DELETE FROM `archive_request_contract` WHERE `id`='$id'") or die(mysqli_error());
		
		echo"<script>alert('Data successfully transfer')</script>";
		echo"<script>window.location='archive-request-contract.php'</script>";
	}
?>