<?php

define('DB_SERVER', 'localhost'); //enter server name of db
define('DB_USERNAME', 'root'); // enter username
define('DB_PASSWORD', ''); // enter pass of db
define('DB_NAME', 'u811015322_obms_db'); //enter dbname here

 
/* Attempt to connect to MySQL database */
$connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
