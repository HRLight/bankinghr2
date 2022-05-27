<?php
	$page_title = 'Contracts';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>

<?php
  $id = $_GET['id'];
  $sql = "SELECT* FROM visitorpolicy WHERE id = '$id'";
  $result = $db->query($sql);
  $applicant = $result->fetch_assoc();
  $row = $result->num_rows;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    
    <style>
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
    .float-start{
        float: start;
    }
    .float-end{
        float: end;
    }
}
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
.linya{
    border: black solid 1px;
    margin: 0;
}
.breadcrumbs{
    margin-bottom: 0px;
}
.taytol{
    background-color: #6ea4db;
    text-align:center;
    font-size: 45px;
    margin-bottom: 2%;
}
.sub{
	float:right;
}
.descc{
    border: solid 1px black;
    padding: 5%;
    text-align: center;
    background-color: #d6d6d6;
}
    </style>
</head>

<?php include_once('layouts/header.php'); ?>
<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    
    
    
<!-- Breadcrumb ------------------------------------------------------------------------------------------------>
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="payroll_report.php" class="breadcrumbs__item">Visitor Policy</a>
  <a href="#checkout" class="breadcrumbs__item is-active">View Policy Data</a>
</nav>
<hr class="linya">
<!-- /Breadcrumb ------------------------------------------------------------------------------------------------>


<div class="row" style="margin-bottom:10%; margin-top: 2%; max-height: 600px;">
  <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
	<div class="col-md-12">
		<div class="card" style="border: black solid 2px; background-color: #d4e9ff">
		<div class="taytol"><b>  Visitor Policy Details   </b></div>
			<div class="card-heading clearfix" style="margin-left: 1%; margin-right: 1%; padding-left: 1%, padding-right: 1%;">
				<strong class="float-start">
				  <span class="glyphicon glyphicon-th"></span>
				  <span><h3>Policy Name: <u><?php echo $applicant['policy']; ?></u></h3></span>
				  <span><h3>ID: <u><?php echo $applicant['id']; ?></u></h3></span>
				</strong>
			</div>
			<hr style="border: black solid 1px">

			

			<div class="card-body">     
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12 float-start">
						    <b> Policy Description: </b>
						<p class="descc"><?php echo $applicant['description']; ?> </p>
						</div>
						
					
						
						<hr class="down" style="border: black solid 1px">
						
					</div>
					<button onclick="print()" id="button" class="btn btn-success md-2" style="float: left;"><i class="bi bi-file-post"></i> Print report</button>
					<a class="sub" href="visitorpolicy.php"><button class="btn btn-secondary" type="submit">Back</button></a>
				</div>
			</div>
		</div>
	</div>
</div>








    
    
    
    
    
    
    
    
    
    
<script src="js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>
<?php include_once('layouts/footer.php'); ?>
