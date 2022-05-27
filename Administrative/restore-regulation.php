<?php
	require_once('includes/config1.php');
	
	if(ISSET($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		
		$query=mysqli_query($conn, "SELECT * FROM `archive_rules_and_regulation` WHERE `id`='$id'") or die(mysqli_error());
		$fetch=mysqli_fetch_array($query);
		$ra_no=$fetch['ra_no'];
		$date=$fetch['date'];
		$Description=$fetch['Description'];
	
		
		
		mysqli_query($conn, "INSERT INTO `rules_and_regulation` VALUES('', '$ra_no', '$date', '$Description')") or die(mysqli_error());
		mysqli_query($conn, "DELETE FROM `archive_rules_and_regulation` WHERE `id`='$id'") or die(mysqli_error());
		
		echo"<script>alert('Data successfully transfer')</script>";
		echo"<script>window.location='archive_rules_and_regulation.php'</script>";
	}
?>