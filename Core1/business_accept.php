<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php include_once('layouts/header.php'); ?>
<style>
#wrapper{
	background-color: white;
	text-align: center;
	width: 95%;
	margin: 2% auto;
	margin-left: 2%;
	padding-left: 2%;
	padding-right: 2%;
	padding-bottom: 2%;
	webkit-box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42); 
	box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42);
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
.tops{
	padding-top: 50px;
}
p{
	font-size: 50px;
}
</style>
<div id="wrapper">
<?php
    include('includes/config2.php');
    $id = $_GET['id'];
    $query = "select * from `approve_business` where `id` = '$id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
    	 	$id = $row['id'];
            $profitloss = $row['profitloss'];
            $updatedrecord = $row['updatedrecord'];
            $businessplan = $row['businessplan'];
            $taxreturn = $row['taxreturn'];
            $companyname = $row['companyname'];
            $bankname = $row['bankname'];
            $accountnum = $row['accountnum'];
            $date = $row['date'];

            $query = "INSERT INTO `approve_business_client` (`id`, `profitloss`, `updatedrecord`, `businessplan`, `taxreturn`, `companyname`, `bankname`, `accountnum`, `date`) VALUES ('$id','$profitloss', '$updatedrecord', '$businessplan', '$taxreturn', '$companyname', '$bankname','$accountnum','$date');";
        }
        $query .= "DELETE FROM `approve_business` WHERE `approve_business`.`id` = '$id';";
        if(performQuery($query)){
			echo "<div class='tops'>";
            echo "<p> Client Approved.</p>";
			echo "</div>";
        }else{
			echo "<div class='tops'>";
            echo "<p>Unknown error occured. Please try again.</p>";
			echo "</div>";
        }
    }else{
		echo "<div class='tops'>";
        echo "<p>Error occured.</p>";
        echo "</div>";
    }
    
?>
<br/><br/>
<hr>
<button class="btn btn-secondary" id="btns"><a href="business1.php" id="btnss">Back</a></button>
</div>
<?php include_once('layouts/footer.php'); ?>