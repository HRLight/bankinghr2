<?php
	require_once('includes/config1.php');
	
	if(ISSET($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		
		$query=mysqli_query($conn, "SELECT * FROM `complain` WHERE `id`='$id'") or die(mysqli_error());
		$fetch=mysqli_fetch_array($query);
		$employee_id=$fetch['employee_id '];
		$fname=$fetch['fname'];
		$mname=$fetch['mname'];
		$lname=$fetch['lname'];
		$department=$fetch['department'];
		$type_of_complain=$fetch['type_of_complain'];
		$description=$fetch['description'];
		$status=$fetch['status'];
		$date=$fetch['date'];


	
		
		
		mysqli_query($conn, "INSERT INTO `archive_complaints` VALUES('', '$employee_id', '$fname', '$mname', '$lname', '$department', '$type_of_complain', '$description', '$status', '$date')") or die(mysqli_error());
		mysqli_query($conn, "DELETE FROM `complain` WHERE `id`='$id'") or die(mysqli_error());
		
		echo"<script>alert('Data successfully transfer')</script>";
		echo"<script>window.location='complains.php'</script>";
	}
?>