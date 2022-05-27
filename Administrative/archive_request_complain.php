

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>

<?php
  $page_title = 'List of complainin of facility';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $all_archive_facility_complain = find_all('archive_facility_complain')
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
  <a href="#checkout" class="breadcrumbs__item is-active">Archive Facility Complain</a>
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
		
		<a href="archive_rules_and_regulation.php"><button type="button" class="btn btn-light">Regulation</button></a> 
		<a href="archive_legal_complain.php"><button type="button" class="btn btn-light">Complain</button></a>
		
		<a href="archive_request_complain.php"><button type="button" class="btn btn-primary">Facility Complain</button></a>
		
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Facility Archive Complain</span>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">Complainant Id</th>
                    <th>Fullname</th>
                    <th>Gmail</th>
                    <th>Company</th>
                    <th>Facility Use</th>
                    <th>Complain</th>
                    <th>Description</th>
                     <th>Remarks</th>
                      <th>Status</th>
                    <th>date</th>
					
					<th class="text-center" style="width: 100px;">Actions</th>
					
              </tr>
            </thead>
			
            <tbody>

            <?php foreach ($all_archive_facility_complain as $facilitycomplain):?>
                <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['fullname']));?></td>
                <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['gmail']));?></td>
				<td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['company']));?></td>
				<td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['type_of_facility']));?></td>
				<td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['complain']));?></td>
				<td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['description']));?></td>
				<td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['remarks']));?></td>
				
			<td><?php if($facilitycomplain['status'] == 'approved'){ ?>
					<span class="badge square-pill bg-success">
					    
					<?php echo remove_junk(ucwords($facilitycomplain['status']))?></span>
					<?php }elseif($facilitycomplain['status'] == 'pending'){ ?>
					
					<span class="badge square-pill bg-warning"> <?php echo remove_junk(ucwords($facilitycomplain['status'])); ?></span>
					<?php }else{ ?>
					<span class="badge square-pill bg-danger"> <?php echo remove_junk(ucwords($facilitycomplain['status'])); }?></span></td>
					
				<td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['date']));?></td>
                    <td class="text-center">
                      <a href="restore-facility-complain.php?id=<?php echo $facilitycomplain['id'];?>" class="btn btn-sm btn-info" style="margin-right: 5px;"><i class="bi bi-arrow-counterclockwise"></i></a></div>
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
