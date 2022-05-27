<?php 


$date = date('Y-m-d');

echo date("m", strtotime ( '-1 month' , strtotime ( $date ) )) ; ?>