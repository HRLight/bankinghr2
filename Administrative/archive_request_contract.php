<?php
	require_once('includes/config1.php');
	
	if(ISSET($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		
		$query=mysqli_query($conn, "SELECT * FROM `request_contract` WHERE `id`='$id'") or die(mysqli_error());
		$fetch=mysqli_fetch_array($query);
				$id=$fetch['id'];
		$req_id=$fetch['req_id'];
		$req_class=$fetch['req_class'];
		$fname=$fetch['fname'];
		$mname=$fetch['mname'];
		$lname=$fetch['lname'];
		$type_of_contract=$fetch['type_of_contract'];
		$department=$fetch['department'];
		$statusr=$fetch['status'];
		$date_of_requeste=$fetch['date_of_request'];
		
		
		mysqli_query($conn, "INSERT INTO `archive_request_contract` VALUES('$id', '$req_id', '$req_class', '$fname', '$mname', '$lname', '$type_of_contract', '$department', '$statusr', '$date_of_request')") or die(mysqli_error());
		mysqli_query($conn, "DELETE FROM `request_contract` WHERE `id`='$id'") or die(mysqli_error());
		
		echo"<script>alert('Data successfully transfer')</script>";
		echo"<script>window.location='RequestContract.php'</script>";
	}
?>