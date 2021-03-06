<?php
	$page_title = 'Time Generate Excel';
	require_once('includes/load.php');
	// Checkin What level user has permission to view this page
	page_require_level(3);
	//   $products = join_barista_table();
	
?>
<!--Body...-->
<?php
	
	$output = '';
	if(isset($_POST["generate"]))
	{
		$fromdate = $_POST['fromdate'];
		$todate = $_POST['todate'];
		$user_selected = $_POST['user_selected'];
		$output .= '
		<table id="datatablesSimple" class="table-bordered table-bordered table-hover" bordered="4" style="width:100%">
		<thead>  
		<tr>  
		<th>#</th> 
		<th>Name</th>  
		<th>Claim</th>  
		<th>Claim Date</th>  
		<th>Status</th>  
		<th>Remarks</th>  
		</tr>
		</thead>
		';
		
		
		//Query Statement for leave history
		$conn = new mysqli('localhost', 'u811015322_Systembanking6', 'Systembanking6@gmail', 'u811015322_obms_db') or die(mysqli_error());
		$user = current_user();
		$userid = (int)$user['id'];
		$username = $user['username'];
		$user_level = $user['user_level'];
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
					$result = $conn->query("SELECT name, claim, claim_date, status, remarks FROM claim WHERE claim_date >= '$fromdate' 
					AND claim_date <= '$todate' AND accepted != 0 ORDER BY claim_id DESC");
					} else {
					$result = $conn->query("SELECT name, claim, claim_date, status, remarks FROM claim WHERE claim_date >= '$fromdate' 
					AND claim_date <= '$todate' AND accepted = '$accepted' ORDER BY claim_id DESC");
				}
				} else {
				if ($status == 'All'){
					$result = $conn->query("SELECT name, claim, claim_date, status, remarks FROM claim WHERE claim_date >= '$fromdate' 
					AND claim_date <= '$todate' AND accepted != 0 AND name = '$user_selected' ORDER BY claim_id DESC");
					} else {
					$result = $conn->query("SELECT name, claim, claim_date, status, remarks FROM claim WHERE claim_date >= '$fromdate' 
					AND claim_date <= '$todate' AND accepted = '$accepted' AND name = '$user_selected' ORDER BY claim_id DESC");
				}
			}
		} 
		elseif ($user_level > 2) {
			if ($status == 'All'){
				$result = $conn->query("SELECT name, claim, claim_date, status, remarks FROM claim WHERE claim_date >= '$fromdate' 
				AND claim_date <= '$todate' AND username = '$username' AND accepted != 0 ORDER BY claim_id DESC");	
				} else {
				$result = $conn->query("SELECT name, claim, claim_date, status, remarks FROM claim WHERE claim_date >= '$fromdate' 
				AND claim_date <= '$todate' AND username = '$username' AND accepted = '$accepted' ORDER BY claim_id DESC");	
			}
		}
		#if($result = $conn->query($sql)){
			while($row = mysqli_fetch_array($result)){
				
				
				//   foreach ($products as $product){
				//   $productstock = intval($product['quantity'] + $product['damage_item']);
				$output .= '
				<tbody>
				<tr>  
				<td class="text-center"> '.count_id(). '</td>  
				<td class="text-center"> '.$row['name']. '</td>  
				<td class="text-center"> '.$row['claim']. '</td>  
				<td class="text-center"> '.$row['claim_date']. '</td>  
				<td class="text-center"> '.$row['status']. '</td> 
				<td class="text-center"> '.$row['remarks']. '</td> 
				</tr>
				
				</tbody>
				';
			}
	#	}
		$output .= '</table>';
		date_default_timezone_set('Asia/Manila');
		$date = date("F j, Y, g:i a");
		$title = $date."_Claim_". "report.xls";
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="'.$title.'" ');
		echo $output;
	}
	
?>