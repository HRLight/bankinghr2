<?php
	require_once('includes/config1.php');
	
	if(ISSET($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		
		$query=mysqli_query($conn, "SELECT * FROM `facility_complain` WHERE `id`='$id'") or die(mysqli_error());
		$fetch=mysqli_fetch_array($query);
		$fullname=$fetch['fullname'];
		$gmail=$fetch['gmail'];
		$type_of_facility=$fetch['type_of_facility'];
		$complain=$fetch['complain'];
		$description=$fetch['description'];
		$remarks=$fetch['remarks'];
		$status=$fetch['status'];
		$date=$fetch['date'];

	
		
		
		mysqli_query($conn, "INSERT INTO `archive_facility_complain` VALUES('', '$fullname', '$gmail', '$company', '$type_of_facility', '$complain', '$description', '$remarks', '$status', '$date')") or die(mysqli_error());
		mysqli_query($conn, "DELETE FROM `facility_complain` WHERE `id`='$id'") or die(mysqli_error());
		
		echo"<script>alert('Data successfully transfer')</script>";
		echo"<script>window.location='facility-complain.php'</script>";
	}
?>