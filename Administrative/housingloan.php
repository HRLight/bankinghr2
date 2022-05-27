<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="https://webstockreview.net/images/bank-clipart-transparent-background-9.png" type="image/icon type">
<?php
  $page_title = 'Housing Loan';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
 $all_projects = find_all('approve_client')
?>
<?php include_once('layouts/header.php'); 
?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a class="breadcrumbs__item is-active"> Housing Loan</a>
</nav>
<!-- /Breadcrumb -->

<hr>
<br>
<nav class="breadcrumbs">

<a href="housingloan.php"><button type="button" class="btn">Housing Loan</button></a> 
<a href="carloan.php"><button type="button" class="btn">Car Loan</button></a>
<a href="business.php"><button type="button" class="btn">Business Loan</button></a>
</nav>

<style>

.page-wrapper1{
	margin-top: 110px;
}
#btns{
	background-color: #969696;
	border: none;
	color: white;
	padding: 8px 10px;
	font-size: 15px;
	cursor: pointer;
}
#btnss{
	text-decoration: none;
	color: white;
}
#btns:hover {
  background-color:#c2c2c2;
}

.btn {
  background-color: #2B547E;
  border: none;
  color: white;
  margin: 10px;
  padding: 8px 10px;
  font-size: 15px;
  cursor: pointer;
}

.btn:hover {
  background-color:skyblue;
}


div.scrollmenu {
 
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}
.bareta{
	width: 350px;
}
#wrapper{
	background-color: white;
	width: 95%;
	margin: 2% auto;
	margin-left: 2%;
	padding-left: 2%;
	padding-right: 2%;
	padding-bottom: 2%;
	webkit-box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42); 
	box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42);
}
hr{
	border: solid 1px black;
}
.TAYTOL{
	color: black;
}
.breadcrumbs{
    margin: 0;
}
</style>

</head>
<body>

<div id="wrapper">
        <div id="page-wrapper">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <h1 class="TAYTOL">
                           Housing Loan
                        </h1>
						<a href="pm.php" class="pull-right"><span class="glyphicon glyphicon-refresh" style="height:20px;"></span></a>
						   
                        <form action="" method="POST">
                        
                        <div class="row" style="padding-left:14px;">
                                <div class="col-md-12">
                                    <div class="input-group mb-3 bareta">
										<span class="input-group-text"  id="basic-addon1">Reference No.:</span>
										<input type="text" class="form-control" style="width: 120px;" placeholder="Reference Number" name="ref_no" required />
									</div>   
										
									<div class="input-group mb-3 bareta">
										<span class="input-group-text" id="basic-addon1">Date of Loan:</span>
										<input type="text" class="form-control" placeholder="Date of Loan" name="date_of_loan" required />
									</div>
                                       <button type="submit" name="search" style="margin-top:10px;" class="btn btn-secondary">Search</button>
									   <button class="btn btn-secondary" id="btns"><a href="housingloan.php" id="btnss">Refresh</a></button>
                                </div>
                            </div>
						</form>
						<hr>
                            <?php 
                                $conn  = mysqli_connect("localhost", "u811015322_Systembanking6", "Systembanking6@gmail" , "u811015322_obms_db");
                                if(isset($_POST['ref_no']) && isset($_POST['date_of_loan'])){
                                
                                    $ref_no = $_POST['ref_no'];
                                    $date_of_loan = $_POST['date_of_loan'];
                                    $query = "SELECT * FROM approve_client WHERE ref_no= '$ref_no' AND date_of_loan= '$date_of_loan' ";
                                    $query_num = mysqli_query($conn, $query);
                                
                                ?>
                          <br>
					  <div style="padding-left:14px;" class='table-responsive'> 
						  <div style="overflow-x:auto;">
                          <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
									<th scope="col">ID</th>
                  <th scope="col">Housing Loan Id</th>
                                <th scope="col">Loan Amount</th>
                                <th scope="col">Loan Term</th>
                <th scope="col">First Name</th>
                <th scope="col">Middle Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Sex</th>
                <th scope="col">Civil Status</th>
                <th scope="col">Home Address</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Place of Birth</th>
                <th scope="col">Mobile Number</th>
                <th scope="col">Email Address</th>
                <th scope="col">Tin/Sss/Gsis no#</th>
                <th scope="col">Source of Income</th>
                <th scope="col">Monthly Income</th>
                <th scope="col">Employeer Name</th>
                <th scope="col">Position</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Bank Name</th>
                                <th scope="col">Account Number</th>
                                <th scope="col">firstid</th>
                                <th scope="col">secondid</th>
                                <th scope="col">thirdid</th>
                <th scope="col">Date of Loan</th>
								
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  if(mysqli_num_rows($query_num) > 0){
                                    while($row = mysqli_fetch_array($query_num)){
                                   
                                ?>
                                <tr class="table-active">
                               
                                <td><?php echo $row['id']?></td>
																<td><?php echo $row['ref_no']?></td>
																<td><?php echo $row['loan_amount']?></td>
																<td><?php echo $row['loan_terms']?></td>
																<td><?php echo $row['fname']?></td>
																<td><?php echo $row['mname']?></td>
                                <td><?php echo $row['lname']?></td>
                                <td><?php echo $row['sex']?></td>
                                <td><?php echo $row['civil_status']?></td>
                                <td><?php echo $row['perma_address']?></td>
                                <td><?php echo $row['date_0f_birth']?></td>
                                <td><?php echo $row['place_of_birth']?></td>
                                <td><?php echo $row['mobile_no']?></td>
                                <td><?php echo $row['email_address']?></td>
                                <td><?php echo $row['tin_sss_gsis_no']?></td>
                                <td><?php echo $row['source_of_income']?></td>
                                <td><?php echo $row['monthly_income']?></td>
                                <td><?php echo $row['employeer_name']?></td>
                                <td><?php echo $row['position']?></td>
                                <td><?php echo $row['companyname']?></td>
                                <td><?php echo $row['bankname']?></td>
                                <td><?php echo $row['accountnum']?></td>
                                <td><?php echo $row['firstid']?></td>
                                <td><?php echo $row['secondid']?></td>
                                <td><?php echo $row['secondid']?></td>
                                <td><?php echo $row['date_of_loan']?></td>







                                <?php
										}
                                    }else{
                                   ?>
                                   <tr>
                                  <td class="text-center" colspan="23">No record has found..</td>
                                   </tr>
                                   <?php
                                }
                                ?>
                                </tbody>
                            </table>
                   </div>
                   <?php 
                }
			?>
</div>
<nav>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span> Table for Housing Loan </span>
       </strong>
 </div>
		 
    
	   <div class="panel-body">
			<div class="scrollmenu">
				<table class="table table-bordered table-striped table-hover">
					<table id="datatablesSimple" class="table-striped table-bordered table-hover" style="width:100%">
					
						<thead>
							<tr>
								<th class="text-center" style="width: 5%;">ID</th>
								<th class="text-center">Reference Number</th>
								<th class="text-center">Fullname</th>
								<th class="text-center">Mobile #</th>
								<th class="text-center">Email</th>
								<th class="text-center">Date of Loan</th>
							</tr>
						</thead>
						
						<tbody>			
								
							
						<?php foreach ($all_projects as $project):?>
						<tr>
							<td class="text-center"><?php echo remove_junk(ucfirst($project['id'])); ?></td>
							<td class="text-center" style="width: 10%;"><?php echo remove_junk(ucfirst($project['ref_no'])); ?></td>
							<td class="text-center" style="width: 20%;"><?php echo remove_junk(ucfirst($project['fname'])." ".($project['mname'])." ".($project['lname'])); ?></td>
							<td class="text-center"><?php echo remove_junk(ucfirst($project['mobile_no'])); ?></td>
							<td class="text-center"><?php echo remove_junk(ucfirst($project['email_address'])); ?></td>
							<td class="text-center"><?php echo remove_junk(ucfirst($project['date_of_loan'])); ?></td>
						</tr>
								<?php endforeach; ?>
									</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>


						
              

																		



 
 
 
 
 
 


<?php include_once('layouts/footer.php'); ?>
</body>
</html>																		
	
