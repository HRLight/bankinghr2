

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>
<?php
  $page_title = 'Payroll Report';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
    $all_payslips = find_all('payslips')
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
}
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">Payroll Receipt</a>
</nav>
<!-- /Breadcrumb -->

<!-- Data table start -->
<div class="row">
<nav class="breadcrumbs">
 
		<a href="#"><button type="button" class="btn btn-light">Asset Report</button></a> 
		
		<a href="#"><button type="button" class="btn btn-light">Client Information</button></a> 
		
		<a href="employeedocuments.php"><button type="button" class="btn btn-light">Employee Documents</button></a>
		
		<a href="Ledger.php"><button type="button" class="btn btn-light">General Ledger</button></a>
		
		<a href="payroll_report.php"><button type="button" class="btn btn-primary">Payroll Receipt</button></a>
		
		<a href="docu_tracking_report.php"><button type="button" class="btn btn-light">Document Tracking Report</button></a>
		
		<a href="savingstracking.php"><button type="button" class="btn btn-light">Deposit Receipt</button></a>
</nav>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>Payroll Table</span>
        	
	<div class="text-end">
          <button onclick="print()" id="button" class="btn btn-warning md-2"><i class="bi bi-file-post"></i> Print report</button>
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
                <th>Payslip Id</th>
                <th>Employee Id</th>
                <th>Total Work</th>
                <th>Gross</th>
                <th>Net</th>
                <th>Sss</th>
                <th>Pagibig</th>
                <th>Phil</th>
                <th>Tax</th>
                <th>Pay Date</th>
                <th>Cut Start</th>
                <th>Cut End</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            <?php foreach ($all_payslips as $payslips):?>
                <tr>
                   
					   <td><?php echo remove_junk(ucfirst($payslips['payslip_id'])); ?></td>
					   <td><?php echo remove_junk(ucfirst($payslips['employee_id'])); ?></td>
						 <td><?php echo remove_junk(ucfirst($payslips['total_work'])); ?></td>
						  <td><?php echo remove_junk(ucfirst($payslips['gross'])); ?></td>
						    <td><?php echo remove_junk(ucfirst($payslips['net'])); ?></td>
						   <td><?php echo remove_junk(ucfirst($payslips['sss'])); ?></td>
						   <td><?php echo remove_junk(ucfirst($payslips['pagibig'])); ?></td>
						   <td><?php echo remove_junk(ucfirst($payslips['phil'])); ?></td>
						   <td><?php echo remove_junk(ucfirst($payslips['tax'])); ?></td>
						   <td><?php echo remove_junk(ucfirst($payslips['pay_date'])); ?></td>
						   <td><?php echo remove_junk(ucfirst($payslips['cut_start'])); ?></td>
						    <td><?php echo remove_junk(ucfirst($payslips['cut_end'])); ?></td>
						    
						    
                    <td class="text-center">
                      <div class="btn-group">
                        <a href="#.php?id=<?php echo $payslips['id'];?>" class="btn btn-sm btn-primary" style="margin-right: 5px;"><i class="bi bi-archive"></i></a>
                        <a href="view_payroll_report.php?id=<?php echo $payslips['payslip_id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
                      </div>
                    </td>

                </tr>       
            <?php endforeach; ?>

            </tbody>
            
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
<!-- End of Data table  -->
<script src="js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>


<?php include_once('layouts/footer.php'); ?>
