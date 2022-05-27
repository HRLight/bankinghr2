
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>

<?php
	$page_title = 'Savings Report';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   $all_transactions = find_all('transactions')

?>




<?php include_once('layouts/header.php'); ?>

<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    <!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Deposits Reports</a>
</nav>
<!-- /Breadcrumb -->

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
		
		<a href="docu_tracking_report.php"><button type="button" class="btn btn-light">Document Tracking Report</button></a>
		
		<a href="savingstracking.php"><button type="button" class="btn btn-primary">Deposit Receipt</button></a>
</nav>
  

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
         <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Deposit Report</span>
		
	
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
				<th>Account Number</th>
                <th>type</th>
                <th>amount	</th>
                <th>remarks</th>
                 <th>date_created</th>
                  <th>reference_no	</th>

                <th class="text-center" style="width: 100px;">Actions</th>
              </tr>
            </thead>
            <tbody>

          <?php foreach ($all_transactions as $visitor):?>
          <tr>
          <td><?php echo remove_junk(ucfirst($visitor['id'])); ?></td>
                    
        
	        <td><?php echo remove_junk(ucfirst($visitor['client_id'])); ?></td>
	        <td><?php echo remove_junk(ucfirst($visitor['type'])); ?></td>
		    <td><?php echo remove_junk(ucfirst($visitor['amount'])); ?></td> 
	  	    <td><?php echo remove_junk(ucfirst($visitor['remarks'])); ?></td>   
  	  	    <td><?php echo remove_junk(ucfirst($visitor['date_created'])); ?></td>  
	        <td><?php echo remove_junk(ucfirst($visitor['reference_no'])); ?></td>  
            <td class="text-center">
                      <div class="btn-group">
                      <a href="delete_announcement.php?id=<?php echo $visitor['id'];?>" class="btn btn-sm btn-primary"><i class="bi bi-archive"></i></a>
                      
                      <a href="view_savings_tracking.php?id=<?php echo $visitor['id'];?>" class="btn btn-sm btn-warning" style="margin-right: 5px;"><i class="bi bi-eye"></i></a>
                      </div>
                    </td>
                </tr>       
            <?php endforeach; ?>

            </tbody>
            
          </table>
        </div>
      </div>
    </div>
  
  
  
  <!-- add visitor-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	
        <h5 class="badge rounded-pill bg-success" class="modal-title" id="exampleModalLabel">Create Announcement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form method="post" action="create-anouncement.php">
          <div class="form-group">
                
				<input type="text" class="form-control" name="visitor-title" placeholder="Name of Announcement" required><br>
				<input type="text" class="form-control" name="visitor-description" placeholder="Description" required><br>
				
				
        </div>
		    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="add_vis" class="btn btn-primary">Save changes</button>
      </div>
      </form>
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
