<?php
	$page_title = 'Reimbursement Accept Prompt';
	require_once('includes/load.php');
	// Checkin What level user has permission to view this page
	page_require_level(3);
	
	require_once("includes/load.php");
	if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
	
	$user = current_user();
	$user_level = $user['user_level'];
	$conn = new mysqli('localhost', 'u811015322_Systembanking6', 'Systembanking6@gmail', 'u811015322_obms_db') or die(mysqli_error());       
	$reimbursement_id = $_GET['reimbursement_id'];
	$name = $user['name'];
	$username = $user['username'];
	$id = $user['id'];
	
?><?php include_once('layouts/header.php'); ?>
<html>
	<head>
		<meta name="generator"
		content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
		<title></title>
	</head>
	<body>
		<div class="row">
			<div class="col-md-12"><?php echo display_msg($msg); ?>
				<?php if ($user_level <= '2'): ?>
				<nav class="breadcrumbs">
					<a href="reimbursement_budget.php" class="breadcrumbs__item">Budget</a>
					<a href="reimbursement_index.php" class="breadcrumbs__item">Reimburse</a>
					<a href="reimbursement_history.php" class="breadcrumbs__item is-active">Reimbursement History</a>
				</nav>
				
				<?php else: ?>
				<nav class="breadcrumbs">
					<a href="reimbursement_index.php" class="breadcrumbs__item">Reimburse</a>
					<a href="reimbursement_history.php" class="breadcrumbs__item is-active">Reimbursement History</a>
				</nav>		
				<?php endif;?>
				
				<div class="col-md-12">
					<div class="panel">
						<div class="jumbotron text-center">
							<?php
								$read = 1;
								if(isset($_POST['yes'])) {
									$query1 = $conn->query("SELECT * FROM reimbursements WHERE reimbursement_id='$reimbursement_id'");
									while($user_data = mysqli_fetch_array($query1)){
										$amount = $user_data['amount'];
										$user_id = $user_data['user_id'];
										
										if ($user_id == $id){
											$session->msg('d',"You can't accept your own reimburse");
											echo "<script>window.location.href='reimbursement_history.php';</script>"; 
										} 
										
									    else {
											$query2 = $conn->query("SELECT * FROM `users` WHERE `id` = '$user_id'") or die(mysqli_error());
											while($user_data1 = mysqli_fetch_array($query2)){
												$budget_restriction = $user_data1['reimbursement_budget'];
											}
											
											if ($amount > $budget_restriction) {
												$session->msg('d',"User has insufficient budget amount than the reimbursement selected");
												echo "<script>window.location.href='reimbursement_history.php';</script>"; 
												} else {
												$query = $conn->query("UPDATE reimbursements SET status='Accepted by $name' WHERE reimbursement_id='$reimbursement_id'") or die(mysqli_error());
												$query = $conn->query("UPDATE reimbursements SET accepted='1' WHERE reimbursement_id='$reimbursement_id'") or die(mysqli_error());
												$query2 = $conn->query("UPDATE users SET reimbursement_budget=reimbursement_budget-$amount WHERE id=$user_id");
												$query2 = $conn->query("UPDATE users SET reimbursement_notif=reimbursement_notif+$read WHERE id=$user_id");
												$session->msg('s',"Reimbursement Successfully Accepted");
												echo "<script>window.location.href='reimbursement_history.php';</script>"; 
											}
										}
									}
									
								}
							?>
							<h2>Are you sure you want to accept?</h2>	
							<form method="post" action="">
								</br>
							<button type="submit" name="yes" class="btn btn-primary" value="yes">Yes</button>
							</form></br>
							<button name="cancel" class="btn" onclick="location.href='reimbursement_history.php'">Cancel</button>
						</div>
					</div>
				</div>
			</div><?php include_once('layouts/footer.php'); ?>
		</body>
	</html>
	
