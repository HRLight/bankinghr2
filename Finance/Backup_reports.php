<?php
	header("Content-Type: application/xls");
	header("Content-Disposition: attachment; filename=Database-Backup-file.xls");
	header("Pragma: no-cache");
	header("Expires: 0");

	require_once('includes/load.php');

	$output = "";

	$output .="
		<table>
			<thead>
				<tr>
					<th>Account Name</th>
					<th>Account Number</th>
					<th>Status</th>
					<th>Date</th>
					<th>Address</th>
					<th>City</th>
					<th>Country</th>
					<th>Description</th>
					<th>Department</th>
					<th>Type</th>
					<th>Amount</th>
					<th>Remaining</th>
					<th>Interest</th>
					<th>Level</th>
				</tr>
			<tbody>
	";

	$query = $db->query("SELECT * FROM collection") or die(mysqli_errno());
	while($fetch = $query->fetch_array()){

	$output .= "
				<tr>
					<td>".$fetch['LS_Account_name']."</td>
					<td>".$fetch['A_Number']."</td>
					<td>".$fetch['Co_Status']."</td>
					<td>".$fetch['LS_Date']."</td>
					<td>".$fetch['LS_Address']."</td>
					<td>".$fetch['LS_City']."</td>
					<td>".$fetch['LS_Country']."</td>
					<td>".$fetch['LS_Desc']."</td>
					<td>".$fetch['LS_Department']."</td>
					<td>".$fetch['LS_Type']."</td>
					<td>".$fetch['LS_Amount']."</td>
					<td>".$fetch['LS_Remaining']."</td>
					<td>".$fetch['LS_Interest']."</td>
					<td>".$fetch['PRIO_Level']."</td>
				</tr>
	";
	}

	$output .="
			</tbody>

		</table>
	";

	echo $output;


?>
