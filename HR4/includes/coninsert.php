<?php
define('DB_SERVER','localhost');
define('DB_USER','u811015322_Systembanking6');
define('DB_PASS' ,'Systembanking6@gmail');
define('DB_NAME','u811015322_obms_db');
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>