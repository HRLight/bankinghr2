<?php

include_once('includes/load.php');

$id = $_GET['ref'];
$sql = "SELECT * FROM visitor_registration WHERE ref_no = '$id'";
$res = $db->query($sql);
$info = $res->fetch_assoc();
include_once('header.php');?>

<style>
    
@media print{
	#button{
		display: none; !important;
	}
	.breadcrumbs{
		display: none; !important;
	}
	.topNavBar{
	    display: none; !important;
	}
	#wala{
	    display: none; !important;
	}
	
}
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>

<div class="container">
  
    <div class="card col-md-5 h-100 mt-5 mx-auto" >
        <div class="card-header bg-secondary text-white text-center">
        <h4>Visitor Portal</h4>
        </div>
      <div class="card-body py-10">
          <form method="POST" action="process.php">
              <div class="form-group">
                    <label for="title">Reference NO.</label>
                    <input type="text" class="form-control" name="fname"  value="<?php echo $info['ref_no']; ?>" disabled>
                </div>
              <div class="form-group">
                    <label for="title">First Name</label>
                    <input type="text" class="form-control" name="fname"  value="<?php echo $info['first_name']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="title">Middle Name</label>
                    <input type="text" class="form-control" name="mname" value="<?php echo $info['middle_name']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="title">Last Name</label>
                    <input type="text" class="form-control" name="lname" value="<?php echo $info['last_name']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="title">Department</label>
                    <input type="text" class="form-control" name="dept" value="<?php echo $info['department']; ?>" disabled>
                </div>
                <div class="form-group" id="wala">
                    <label for="title">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $info['email']; ?>" disabled>
                </div>
                <div class="form-group" id="wala">
                    <label for="title">Address</label>
                    <input type="text" class="form-control" name="add" value="<?php echo $info['address']; ?>" disabled>
                </div>
                <div class="form-group" id="wala">
                    <label for="title">Contact Number</label>
                    <input type="text" class="form-control" name="cont" value="<?php echo $info['contact']; ?>" disabled>
                </div>
                <div class="form-group" id="wala">
                    <label for="title">Gender</label>
                    <input type="text" class="form-control" name="gend" value="<?php echo $info['gender']; ?>" disabled>
                        
                </div>
                <div class="form-group" id="wala">
                    <label for="title">Visitor Type</label>
                    <input type="text" class="form-control" name="vtype" value="<?php echo $info['visitor_type']; ?>" disabled>
                </div>
                <div class="form-group" id="wala">
                    <label for="title">Visiting Purpose</label>
                    <input type="text" class="form-control" name="vpurp" value="<?php echo $info['visitor_purpose']; ?>" disabled>
                </div>
                <div class="form-group mt-3 mx-auto">
                   <a href="index.php" id="wala" class="btn btn-secondary mx-auto"<i class="bi bi-file-post"></i>Back</a>
                
                   <button onclick="print()" id="wala" class="btn btn-primary mx-auto"><i class="bi bi-file-post"></i>Print</button>
                </div>
                
          </form>
      </div>
      

    </div>
  </div>


 
</div>
<?php include_once('footer.php');?>

