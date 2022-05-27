<?php

$host = "localhost"; /* Host name */
$user = "u811015322_Systembanking6"; /* User */
$password = "Systembanking6@gmail"; /* Password */
$dbname = "u811015322_obms_db"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}
?>