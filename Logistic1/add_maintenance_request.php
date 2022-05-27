<?php
  $page_title = 'Maintenance Request';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php 
include "Database/config.php";

// Insert record
if(isset($_POST['submit'])){
		
		$req_id = $_POST['req_id'];
		$position = $_POST['position'];
		$lname = $_POST['lname'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		
		$department = $_POST['department'];
		$long_desc = $_POST['long_desc'];

		if($req_id != ''){
			
			mysqli_query($link, "INSERT INTO maintenance_request(req_id,position,lname,fname,mname,department,status,request_list) VALUES('".$req_id."','".$position."','".$lname."','".$fname."','".$mname."','Logistic1','Pending','".$long_desc."') ");
			
		if($db->query($sql)){
		$_SESSION['status'] =  "Succesful Added New Visitor";
        $_SESSION['status_code'] =  "success";
        redirect('mainte_request.php',false);
		} else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('mainte_request.php',false);
		}
	   } else {
		 $session->msg("d", $errors);
		 redirect('mainte_request.php',false);
	   }
		}

?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="mainte_request.php" class="breadcrumbs__item">Maintenance Request List</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Add Purchase Request</a>
</nav>
<hr style="margin-top: 0px; border-top: solid grey 2px;">
<!-- /Breadcrumb -->
<!DOCTYPE html>
<html>
<head>

	<!-- CSS -->
	<style type="text/css">
	.cke_textarea_inline{
		border: 1px solid black;
	}

@media print{
	#button{
		display: none; !important;
	}
	form{
		display: none; !important;
	}
	.myDivToPrint {
        background-color: white;
        height: 100%;
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        margin: 0;
        line-height: 18px;
    }
}
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
.row{
	margin-left: 10%;
}
input.field{
	width: 300px;
}
input.btn{
	float: left;
	padding-top: 0px;
	margin-top: 0px;
}
.taytol{
	background-color: #6ea4db;
	text-align:center;
	font-size: 30px;
	margin-bottom: 2%;
}
a:link {
  text-decoration: none;
  color: black;
}
a:hover {
  color: white;
}
	</style>

	<!-- CKEditor -->	
	<script src="ckeditor/ckeditor.js"></script>
</head>
<body>
<div style="border: black 2px solid; margin: 2%;">
<form method='post' action=''>
<div class="taytol"><b>Send Maintenance Request</b><p style="float: right; margin-right: 15px;"><a href="mainte_request.php">X</a></p></div>
	<div class="card-body">     
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6">
						<input class="field" type='number' name='req_id' placeholder='Request ID' required><br><br>
					</div>

					<div class="col-md-6">
						<input class="field" type='text' name='mname' placeholder='Middlename' required><br><br>
					</div>
					
					<div class="col-md-6">
						<input class="field" style="border:solid grey 1px" type='text' name='department' placeholder='Logistic1' disabled><br><br>
					</div>

					<div class="col-md-6">
						<input class="field" type='text' name='fname' placeholder='Firstname' required><br><br>
					</div>

					
					<div class="col-md-6">
						<input class="field" type='text' name='position' placeholder='Position' required><br><br>
					</div>

					
					<div class="col-md-6">
						<input class="field" type='text' name='lname' placeholder='Lastname' required><br><br>
					</div>
					</div>
					<hr>
					
						<center style="font-size: 20px; margin-top: 0;margin-bottom: 1%;"><b>Equiments to maintenance list: </b></center>
						<textarea id='long_desc' name='long_desc' required></textarea><br><br>

		
				<hr>
			<input class="btn btn-success md-2" type="submit" name="submit" value="Submit"><br>
			</div>
		</div>
	</div>
</form>

	
	
	<!-- Script -->
	<script type="text/javascript">
	
		// Initialize CKEditor

		CKEDITOR.replace('long_desc',{
			
			width: "100%",
        	height: "200px"
   
		}); 
	
    	
	</script>
</body>
</html>
<?php include_once('layouts/footer.php'); ?>