<?php
  $page_title = 'Admin Home Page';
  require_once('includes/log2load.php');
  // Checkin What level user has permission to view this page
   page_require_level(4);
?>
<?php
 $c_user = count_by_id('users');

?>
<?php include_once('layouts/header.php'); ?>

<style>
    #wrapper{
        text-align:center;
		float: left;
        width: 30%;
        margin: 2% auto;
		margin-left: 3%;
		padding-bottom: 3%;
		border-radius: 15px;
		webkit-box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42); 
		box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42);
    }
    #pindot{
        border: none;
        background-color:#89aef8;
        color: black;
    }
    #pindot:hover{
        background-color:#6e9cf7;
    }
</style>



<div class="row">
   <div class="col-md-6">
     <?php echo display_msg($msg); ?>
   </div>
</div>
  <div class="row">
    
		<div class="col-md-3" id="wrapper">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-secondary1">
          <i class="glyphicon glyphicon-user"></i>
        </div>
        <div class="panel-value pull-right"><br></br>
        <h1>USER COUNT</h1>
          <h2 class="margin-top"> <?php  echo $c_user['total']; ?> </h2>
          <a href="users.php" style="color:black; float: right;"><button class="text-muted" id="pindot">View>></button></a>
        </div>
       </div>
    </div>
	


<?php include_once('layouts/footer.php'); ?>
