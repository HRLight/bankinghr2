<?php
	require_once('includes/config1.php');
	
	if(ISSET($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		
		$query=mysqli_query($conn, "SELECT * FROM `visitor_registration` WHERE `id`='$id'") or die(mysqli_error());
		$fetch=mysqli_fetch_array($query);
		$ref_no=$fetch['ref_no'];
		$last_name=$fetch['last_name'];
		$first_name=$fetch['first_name'];
		$middle_name=$fetch['middle_name'];
		$department=$fetch['department'];
		$address=$fetch['address'];
		$email=$fetch['email'];
		$contact=$fetch['contact'];
		$gender=$fetch['gender'];
		$visitor_type=$fetch['visitor_type'];
		$visitor_purpose=$fetch['visitor_purpose'];
		$time_in=$fetch['time_in'];
		$time_out=$fetch['time_out'];
		$date_visit=$fetch['date_visit'];
	

	
		
		
		mysqli_query($conn, "INSERT INTO `archive_visitor_registration` VALUES('', '$ref_no', '$last_name', '$first_name', '$middle_name', '$department', '$address', '$email', '$contact', '$gender', '$visitor_type', '$visitor_purpose', '$time_in', '$time_out', '$date_visit')") or die(mysqli_error());
		mysqli_query($conn, "DELETE FROM `visitor_registration` WHERE `id`='$id'") or die(mysqli_error());
		
		echo"<script>alert('Data successfully transfer')</script>";
		echo"<script>window.location='visitorinformation.php'</script>";
	}
?>