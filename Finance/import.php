<?php

//import.php

include 'vendor/autoload.php';

$connect = new PDO("mysql:host=localhost;dbname=u811015322_obms_db", "u811015322_Systembanking6", "Systembanking6@gmail");

if($_FILES["import_excel"]["name"] != '')
{
	$allowed_extension = array('xls', 'csv', 'xlsx');
	$file_array = explode(".", $_FILES["import_excel"]["name"]);
	$file_extension = end($file_array);

	if(in_array($file_extension, $allowed_extension))
	{
		$file_name = time() . '.' . $file_extension;
		move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
		$file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
		$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

		$spreadsheet = $reader->load($file_name);

		unlink($file_name);

		$data = $spreadsheet->getActiveSheet()->toArray();

		foreach($data as $row)
		{
			$insert_data = array(
				':Account_Name'		=>	$row[0],
				':Account_Number'		=>	$row[1],
				':Account_Status'		=>	$row[2],
				':Account_Date'		=>	$row[3],
				':Account_Address'		=>	$row[5],
				':Account_City'		=>	$row[6],
				':Account_Country'		=>	$row[7],
				':Account_Desc'		=>	$row[8],
				':Account_Dept'		=>	$row[9],
				':Account_Type'		=>	$row[10],
				':Account_Amount'		=>	$row[11],
				':Account_Rem'		=>	$row[12],
				':Account_Interest'		=>	$row[13],
				':Account_Prio'		=>	$row[14]
			);

			$query = "
			INSERT INTO collection
			(LS_Account_name, A_Number, Co_Status, LS_Date, LS_Address, LS_City, LS_Country, LS_Desc, LS_Department, LS_Type, LS_Amount, LS_Remaining, LS_Interest, PRIO_Level)
			VALUES (:Account_Name, :Account_Number, :Account_Status, :Account_Date, :Account_Address, :Account_City, :Account_Country, :Account_Desc, :Account_Dept, :Account_Type, :Account_Amount, :Account_Rem, :Account_Interest, :Account_Prio)
			";

			$statement = $connect->prepare($query);
			$statement->execute($insert_data);

		}
		$message = '<div class="alert alert-success">Data Imported Successfully</div>';

	}
	else
	{
		$message = '<div class="alert alert-danger">Only .xls .csv or .xlsx file allowed</div>';
	}
}
else
{
	$message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;

?>
