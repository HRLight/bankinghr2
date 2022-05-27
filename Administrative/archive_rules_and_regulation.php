



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>



<?php
	$page_title = 'Rules and Regulation';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
    $all_archive_rules_and_regulation = find_all('archive_rules_and_regulation')
?>

<!-- add visitor function ------------------------------------------------------------------------------------------------------------------------------ -->

<style>
@media print{
	#button{
		display: none; !important;
	}
	.breadcrumbs{
		display: none; !important;
	}
	
	
	.breadcrumbs{
		display: none; !important;
	}
}
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>

<?php include_once('layouts/header.php'); ?>



<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    
    <style>
    #cr{
        margin-right: 2px;
    }
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
    





<!-- Breadcrumb ------------------------------------------------------------------------------------------------>
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="rulesandregulation.php" class="breadcrumbs__item is-active">Archive Regulation</a>
</nav>
<!-- /Breadcrumb -->

 
 <br>
<!-- /Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
   
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  
			<a href=" archive-request-contract.php"><button type="button" class="btn btn-light">Request Contract</button></a> 
		
		<a href="archive_rules_and_regulation.php"><button type="button" class="btn btn-primary">Regulation</button></a> 
		<a href="archive_legal_complain.php"><button type="button" class="btn btn-light">Complain</button></a>
		
		<a href="archive_request_complain.php"><button type="button" class="btn btn-light">Facility Complain</button></a>
		
		<a href="archive_visitor.php"><button type="button" class="btn btn-light">Visitor Information</button></a>
		
		<a href="archive_facility_request.php"><button type="button" class="btn btn-light">Facility Request</button></a>
</nav>
<hr>
	


<!-- Data table start -->
<div class="row">

  <!-- Notification div -->
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
  <!-- End Notification div -->
  



  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
         <span class="badge square-pill bg-success"><i class="bi bi-table"></i> Rules and Regulation</span>
		
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
               <th class="text-center" style="width: 50px;">Id</th>
				
                <th>R.A. No.</th>
                <th>Date</th>
                <th>Description</th>
                <th class="text-center" style="width: 100px;">Actions</th>
              </tr>
            </thead>
            <tbody>

          <?php foreach ($all_archive_rules_and_regulation as $regulation):?>
          <tr>
          <td><?php echo remove_junk(ucfirst($regulation['id'])); ?></td>
                    
          
			        <td><?php echo remove_junk(ucfirst($regulation['ra_no'])); ?></td>
				     <td><?php echo remove_junk(ucfirst($regulation['date'])); ?></td>
				    <td><?php echo remove_junk(ucfirst($regulation['Description'])); ?></td>   
                     <td class="text-center">
                      <div class="btn-group">
                     <a href="restore-regulation.php?id=<?php echo $regulation['id'];?>" class="btn btn-sm btn-info" style="margin-right: 5px;"><i class="bi bi-arrow-counterclockwise"></i></a></div>
                      </div>
                    </td>

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
