<?php
  $page_title = 'Request Procurement';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>

<?php
  $id = $_GET['id'];
  $sql = "SELECT* FROM request_procurement WHERE id = '$id'";
  $result = $db->query($sql);
  $applicant = $result->fetch_assoc();
  $row = $result->num_rows;
?>

<?php include_once('layouts/header.php'); ?>
<style type="text/css">

@media print{
	#button{
		display: none; !important;
	}
	form{
		display: none; !important;
	}
	nav.breadcrumbs{
		display: none; !important;
	}
	hr.top{
		display: none; !important;
	}
	a.sub{
		display: none; !important;
	}
	#top_title{
		display: none; !important;
	}
	.down{
		display: none; !important;
	}
	.taytol{
		background-color: #6ea4db;
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
    .topNavBar{
        display: none; !important;
    }
}
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
.taytol{
	background-color: #6ea4db;
	text-align:center;
	font-size: 30px;
	margin-bottom: 2%;
}
.sub{
	float:right;
}

</style>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="manager.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="hr1procurement.php" class="breadcrumbs__item">Request List</a>
  <a href="#checkout" class="breadcrumbs__item is-active">View Data</a>
  
</nav>
  <hr class="top">
<!-- /Breadcrumb -->

<div class="row" style="margin-bottom:10%; max-height: 600px;">
  <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
	<div class="col-md-12">
		<div class="card" style="border: black solid 2px">
		<div class="taytol"><b>Request Details</b></div>
			<div class="card-heading clearfix" style="margin-left: 1%; margin-right: 1%; padding-left: 1%, padding-right: 1%;">
				<strong>
				  <span class="glyphicon glyphicon-th"></span>
				  <span><h1><?php echo $applicant['lname'].", ".$applicant['fname']." ".$applicant['mname']." "; ?></h1></span>
				  <span><h3>Request ID: <?php echo $applicant['req_id']; ?></h3></span>
				</strong>
				
			</div>
			<hr style="border: black solid 1px">

			

			<div class="card-body">     
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
						<p> <b> Position:</b>  <u><?php echo $applicant['position']; ?> </u></p>
						</div>
						<div class="col-md-6">
						  <p> <b>Department:</b> <u><?php echo $applicant['department']; ?> </u></p>
						</div>
						<div class="col-md-6">
						  <p> <b>Status:</b> <?php if($applicant['status'] == 'Approve'){ ?>
											<span class="badge square-pill bg-success">
											<?php echo remove_junk(ucwords($applicant['status']))?></span>
											<?php }else{ ?>
											<span class="badge square-pill bg-danger"> <?php echo remove_junk(ucwords($applicant['status'])); }?></span> </p>
						</div>
						
						
						
						
						
						
						<div class="col-md-6">
						  <p> <b>Date of Request:</b> <u><?php echo $applicant['date_of_request']; ?></u> </p>
						</div>
						<hr class="down" style="border: black solid 1px">
						
						<div class="col-md-6" style="border: black solid 2px; 
													width: 95%; 
													position: relative;
													left: 50%;
													top: 50%;
													transform: translate(-50%, -0%);">
						  <p> <b>Request List:</b> <?php echo $applicant["request_list"]; ?> </p>
						</div>
						<hr class="down" style="border: black solid 1px; margin-top: 1%">
					</div>
					<button onclick="print()" id="button" class="btn btn-success md-2" style="float: left;"><i class="bi bi-file-post"></i> Print report</button>
					<a class="sub" href="hr1procurement.php"><button class="btn btn-secondary" type="submit">Back</button></a>
				</div>
			</div>
		</div>
	</div>
</div>




<?php include_once('layouts/footer.php'); ?>