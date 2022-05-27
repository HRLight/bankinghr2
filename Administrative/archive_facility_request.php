


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>

<?php
  $page_title = 'facility pending req';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
    $all_archive_request_facility = find_all('archive_request_facility')
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
  <a href="#checkout" class="breadcrumbs__item is-active">Archive Facility Request</a>
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
		<a href="archive_complain.php"><button type="button" class="btn btn-light">Complain</button></a>
		
		<a href="archive_request_complain.php"><button type="button" class="btn btn-light">Facility Complain</button></a>
		
		<a href="archive_visitor.php"><button type="button" class="btn btn-light">Visitor Information</button></a>
		
		<a href="archive_facility_request.php"><button type="button" class="btn btn-primary">Facility Request</button></a>
</nav>
<hr>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Facility Available Table</span>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                 <th>Id</th>
						
							<th>Lastname</th>
							<th>Firstname</th>
							<th>Middlename</th>
							<th>Department</th>
							<th>Position</th>
							<th>Event type</th>
							<th>Facility type</th>
							<th>Status</th>

							<th class="text-center" style="width: 100px;">Actions</th>
					
              </tr>
            </thead>
            <tbody>

            <?php foreach ($all_archive_request_facility as $facilitycomplain):?>
                <tr>
                     <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['id']));?>
					 
					 <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['lname']));?></td>
					 <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['fname']));?></td>
					 <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['mname']));?></td>
					 
					 <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['department']));?></td>
					 <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['position']));?></td>
					 <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['event_type']));?></td>
					 <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['facility_type']));?></td>
					  <td><?php if($facilitycomplain['status'] == 'approved'){ ?>
            <span class="badge rounded-pill bg-success">
            <?php echo remove_junk(ucwords($facilitycomplain['status']))?></span>
            <?php }else{ ?>
            <span class="badge rounded-pill bg-danger"> <?php echo remove_junk(ucwords($facilitycomplain['status'])); }?></span></td>
					 
                    <td class="text-center">
                      <div class="btn-group">
                      <a href="restore-facility-request.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-info" style="margin-right: 5px;"><i class="bi bi-arrow-counterclockwise"></i></a></div>

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
