<?php
	require_once('includes/load.php');
	//include connection file
	Class dbObj{
		/* Database connection start */
		var $dbhost = "localhost";
		var $username = "u811015322_Systembanking6";
		var $password = "Systembanking6@gmail";
		var $dbname = "u811015322_obms_db";
		var $conn;
		function getConnstring() {
			$con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());
			
			/* check connection */
			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
				} else {
				$this->conn = $con;
			}
			return $this->conn;
		}
	}
	include_once('libs/fpdf/fpdf.php');
	class PDF extends FPDF
	{
		// Page header
		function Header()
		{
			// Logo
			#$this->Image('logo.png',10,-1,70);
			$this->SetFont('Arial','B',13);
			// Move to the right
			$this->Cell(50);
			// Title
			$this->Cell(80,10,'Accepted Claims List',1,0,'C');
			// Line break
			$this->Ln(20);
		}
		
		// Page footer
		function Footer()
		{
			$user = current_user();
			$username = $user['username'];
			// Position at 1.5 cm from bottom
			$this->SetY(-15);
			// Arial italic 8
			$this->SetFont('Arial','I',8);
			// Page number
			$this->Cell(0,10,'Page '.$this->PageNo().'/{nb} Generated by '.$username,0,0,'C');
		}
	}
	$user = current_user();
	$username = $user['username'];
	$name = $user['name'];
	$user_level = $user['user_level']; 
	
	$db = new dbObj();
	$connString =  $db->getConnstring();
	
	$header = mysqli_query($connString, "SHOW columns FROM time_attendance");
	$conn = new mysqli('localhost', 'u811015322_Systembanking6', 'Systembanking6@gmail', 'u811015322_obms_db') or die(mysqli_error());   
	
	if(isset($_POST['generate'])) {
		$fromdate = $_POST['fromdate'];
		$todate = $_POST['todate'];
		$user_selected = $_POST['user_selected'];
		$status = $_POST['status'];
		
		switch ($status) {
			case 'Rejected Only':
			$accepted = '2';
			break;
			case 'Accepted Only':
			$accepted = '1';
			break;
		}
		
		if ($user_level <= 2){
			if ($user_selected == 'All users'){
				if ($status == 'All') {
					$result = $conn->query("SELECT name, claim, claim_date, status FROM claim WHERE claim_date >= '$fromdate' 
					AND claim_date <= '$todate' AND accepted != 0 ORDER BY claim_id DESC");
					} else {
					$result = $conn->query("SELECT name, claim, claim_date, status FROM claim WHERE claim_date >= '$fromdate' 
					AND claim_date <= '$todate' AND accepted = '$accepted' ORDER BY claim_id DESC");
				}
				} else {
				if ($status == 'All'){
					$result = $conn->query("SELECT name, claim, claim_date, status FROM claim WHERE claim_date >= '$fromdate' 
					AND claim_date <= '$todate' AND accepted != 0 AND name = '$user_selected' ORDER BY claim_id DESC");
					} else {
					$result = $conn->query("SELECT name, claim, claim_date, status FROM claim WHERE claim_date >= '$fromdate' 
					AND claim_date <= '$todate' AND accepted = '$accepted' AND name = '$user_selected' ORDER BY claim_id DESC");
				}
			}
		} 
		elseif ($user_level > 2) {
			if ($status == 'All'){
				$result = $conn->query("SELECT name, claim, claim_date, status FROM claim WHERE claim_date >= '$fromdate' 
				AND claim_date <= '$todate' AND username = '$username' AND accepted != 0 ORDER BY claim_id DESC");	
				} else {
				$result = $conn->query("SELECT name, claim, claim_date, status FROM claim WHERE claim_date >= '$fromdate' 
				AND claim_date <= '$todate' AND username = '$username' AND accepted = '$accepted' ORDER BY claim_id DESC");	
			}
		}
		
		$pdf = new PDF();
		$pdf->SetLeftMargin(14.5);
		//header
		$pdf->AddPage();
		//foter page
		$pdf->AliasNbPages();
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(45,10,'Name',1,);
		$pdf->Cell(45,10,'Claim Type',1,);
		$pdf->Cell(45,10,'Claim Date',1,);
		$pdf->Cell(45,10,'Status',1,);
		$bruh = array(45, 45, 35, 55);
		
		foreach($header as $heading) {
			}
			foreach($result as $row) {
			$pdf->Ln();
			$plus = "0";
			foreach($row as $column) {
				$pdf->Cell($bruh[$plus],10,$column,1,);
				$plus+=1;
			}
		}
		$pdf->Output();
	}
?>
