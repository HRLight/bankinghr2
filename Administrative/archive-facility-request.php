<?php
	require_once('includes/config1.php');
	
	if(ISSET($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		
		$query=mysqli_query($conn, "SELECT * FROM `request_facility` WHERE `id`='$id'") or die(mysqli_error());
		$fetch=mysqli_fetch_array($query);
		$lname=$fetch['lname'];
		$fname=$fetch['fname'];
		$mname=$fetch['mname'];
		$contact=$fetch['contact'];
		$email=$fetch['email'];
		$department=$fetch['department'];
		$position=$fetch['position'];
		$event_type=$fetch['event_type'];
		$facility_type=$fetch['facility_type'];
		$reservation_date=$fetch['reservation_date'];
		$date_start=$fetch['date_start'];
		$until=$fetch['until'];
		$purpose=$fetch['purpose'];
		$status=$fetch['status'];
	

	
		
		
		mysqli_query($conn, "INSERT INTO `archive_request_facility` VALUES('', '$ref_no', '$last_name', '$first_name', '$middle_name', '$department', '$address', '$email', '$contact', '$gender', '$visitor_type', '$visitor_purpose', '$time_in', '$time_out', '$date_visit')") or die(mysqli_error());
		mysqli_query($conn, "DELETE FROM `request_facility` WHERE `id`='$id'") or die(mysqli_error());
		
		echo"<script>alert('Data successfully transfer')</script>";
		echo"<script>window.location='facility-pending-request.php'</script>";
	}
?>




