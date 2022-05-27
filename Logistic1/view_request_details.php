<?php
  $page_title = 'View Details';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
$id = $_GET['id'];
  $sql = "SELECT* FROM request_procurement WHERE id = '$id'";
  $result = $db->query($sql);
  $applicant = $result->fetch_assoc();
  $row = $result->num_rows;
?>
<link rel="icon" href="https://webstockreview.net/images/bank-clipart-transparent-background-9.png" type="image/icon type">
<?php include_once('layouts/header.php'); ?>
<style type="text/css">

@media print{
	#button{
		display: none; !important;
	}
	form{
		display: none; !important;
	}
	nav.breadcrumbs{
		display: none; !important;
	}
	hr.top{
		display: none; !important;
	}
	a.sub{
		display: none; !important;
	}
	#top_title{
		display: none; !important;
	}
	.down{
		display: none; !important;
	}
	.taytol{
		background-color: #6ea4db;
	}
	#topNavBar{
		display: none; !important;
	}
	.myDivToPrint {
        background-color: white;
        height: 100%;
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        margin: 0;
        line-height: 18px;
    }
}
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
.taytol{
	background-color: #6ea4db;
	text-align:center;
	font-size: 30px;
	margin-bottom: 2%;
}
.sub{
	float:right;
}

</style>
<!-- Breadcrumb -->
<?php	
$codeitem = $applicant['item_code']; 
$listofitems = Find_items_list($codeitem);
?>
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="manager.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="request_per_dept.php" class="breadcrumbs__item">Request List</a>
  <a href="#checkout" class="breadcrumbs__item is-active">View Data</a>
  
</nav>
  <hr class="top">
<!-- /Breadcrumb -->

<div class="row" style="margin-bottom:10%; max-height: 600px;">
  <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
	<div class="col-md-12">
		<div class="card" style="border: black solid 2px">
		<div class="taytol"><b>Request Details</b></div>
			<div class="card-heading clearfix" style="margin-left: 1%; margin-right: 1%; padding-left: 1%, padding-right: 1%;">
				<strong>
				  <span class="glyphicon glyphicon-th"></span>
				  <span><h1><?php echo $applicant['lname'].", ".$applicant['fname']." ".$applicant['mname']." "; ?></h1></span>
				  <span><h3>Request ID: <?php echo $applicant['req_id']; ?></h3></span>
				   <span><h3>Request Code: <?php echo $applicant['item_code']; ?></h3></span>
				</strong>
				
			</div>
			<hr style="border: black solid 1px">

			

			<div class="card-body">     
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
						<p> <b> Position:</b>  <u><?php echo $applicant['position']; ?> </u></p>
						</div>
						<div class="col-md-6">
						  <p> <b>Department:</b> <u><?php echo $applicant['department']; ?> </u></p>
						</div>
						<div class="col-md-6">
						  <p> <b>Status:</b> <?php if($applicant['status'] == 'Approve'){ ?>
											<span class="badge square-pill bg-success">
											<?php echo remove_junk(ucwords($applicant['status']))?></span>
											<?php }else{ ?>
											<span class="badge square-pill bg-danger"> <?php echo remove_junk(ucwords($applicant['status'])); }?></span> </p>
						</div>
						
						
						
						
						
						
						<div class="col-md-6">
						  <p> <b>Date of Request:</b> <u><?php echo $applicant['date_of_request']; ?></u> </p>
						</div>
						<hr class="down" style="border: black solid 1px">
						
						<div class="col-md-6" style="border: black solid 2px; 
													width: 95%; 
													position: relative;
													left: 50%;
													top: 50%;
													transform: translate(-50%, -0%);">
						  <p> <b>Request List:</b> <?php echo $applicant["request_list"]; ?> </p>
						</div>
						<hr class="down" style="border: black solid 1px; margin-top: 1%">
					</div>
					<div class="row">
					<table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
          <thead>
            <thead>
              <tr class="bg-primary bg-gradient text-light">
				<th>Item Name</th>
                <th>Item Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
              </tr>
            </thead>
          </thead>
         <tbody>
		 <?php foreach($listofitems as $value): ?>
          <tr>
		  <td><?php echo $value['item_name']; ?></td>
          <td><?php echo $value['item_description']; ?></td>
          <td><?php echo $value['price']; ?></td>
          <td><?php echo $value['quantity']; ?></td>
          <td><?php echo $value['total']; ?></td>
           </tr>
		   <?php endforeach; ?>
         </tbody>
         <tfoot>
           <tr>
				<th>Item Name</th>
             <th>Item Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
           </tr>
         </tfoot>
       </table>
					</div>
					<button onclick="print()" id="button" class="btn btn-success md-2" style="float: left;"><i class="bi bi-file-post"></i> Print report</button>
					<a class="sub" href="request_per_dept.php"><button class="btn btn-secondary" type="submit">Back</button></a>
					
					<a class="sub" href="submit.php"><button class="btn btn-secondary" type="submit">Submit to Financial</button></a>

				</div>
			</div>
		</div>
	</div>
</div>




<?php include_once('layouts/footer.php'); ?>