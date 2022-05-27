<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>
<?php
	$page_title = 'Tracking Report';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
    $all_docu_tracking = find_all('docu_tracking')
?>
<?php include_once('layouts/header.php'); ?>
<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    
    
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
	body{
	    zoom: 50%;
	}
}
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
    


<!-- Breadcrumb ------------------------------------------------------------------------------------------------>
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="file.php" class="breadcrumbs__item">Back</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="visitorinformation.php" class="breadcrumbs__item is-active">Document Tracking Report</a>
</nav>
<!-- /Breadcrumb ------------------------------------------------------------------------------------------------>

<br>
<!-- /Breadcrumb -->

<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
   
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  
		<a href="#"><button type="button" class="btn btn-light">Asset Report</button></a> 
		
		<a href="#"><button type="button" class="btn btn-light">Client Information</button></a> 
		
		<a href="employeedocuments.php"><button type="button" class="btn btn-light">Employee Documents</button></a>
		
		<a href="Ledger.php"><button type="button" class="btn btn-light">General Ledger</button></a>
		
		<a href="payroll_report.php"><button type="button" class="btn btn-light">Payroll Receipt</button></a>
		
		<a href="docu_tracking_report.php"><button type="button" class="btn btn-primary">Document Tracking Report</button></a>
		
		<a href="savingstracking.php"><button type="button" class="btn btn-light">Deposit Receipt</button></a>
</nav>
  

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
         <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Table of Employee Documents</span>
	
	<div class="text-end">
          <button onclick="print()" id="button" class="btn btn-info md-2"><i class="bi bi-file-post"></i> Print report</button>
        </div>
		 
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
               <th class="text-center" style="width: 50px;">Id</th>
				<th>Document Sender</th>
                <th>Document Subject</th>
                <th>Location</th>
                
                <th>Date Created</th>
                <th class="text-center" style="width: 100px;">Activity</th>
              </tr>
            </thead>
            <tbody>

          <?php foreach ($all_docu_tracking as $visitor):?>
          <tr>
          <td><?php echo remove_junk(ucfirst($visitor['id'])); ?></td>
          <td><?php echo remove_junk(ucfirst($visitor['Document_Sender'])); ?></td>
					    <td><?php echo remove_junk(ucfirst($visitor['Document_Subject'])); ?></td>
					    
					    <td><?php echo remove_junk(ucfirst($visitor['Location'])); ?></td>
					    
						
						  
						    <td><?php echo remove_junk(ucfirst($visitor['Date_Created'])); ?></td>
						    
							 <td><?php echo remove_junk(ucfirst($visitor['Action'])); ?></td>

                </tr>       
            <?php endforeach; ?>

            </tbody>
            
          </table>
        </div>
      </div>
    </div>


<script src="js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>

<?php include_once('layouts/footer.php'); ?>
