<?php
	$page_title = 'Contracts';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
    $all_request_contract = find_all('request_contract')
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>


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

<!-- Breadcrumb ------------------------------------------------------------------------------------------------>
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a class="breadcrumbs__item is-active">List of Request</a>
</nav>
<!-- /Breadcrumb ------------------------------------------------------------------------------------------------>



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
         <span class="badge square-pill bg-success"><i class="bi bi-table"></i>Department Contract Request </span>
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
                <th>Name of requestor</th>
				<th>Department</th>
                <th>Type of Contract</th>
                <th>Status</th>
                <th class="text-center" style="width: 100px;">Actions</th>
              </tr>
            </thead>
            <tbody>

          <?php foreach ($all_request_contract as $contract):?>
          <tr>
					
					
					<td><?php echo remove_junk(ucfirst($contract['fname'].' '.$contract['mname'].' '.$contract['lname'])); ?></td>
					<td><?php echo remove_junk(ucfirst($contract['department'])); ?></td>
					<td><?php echo remove_junk(ucfirst($contract['type_of_contract'])); ?></td>
					<td><?php if($contract['status'] == 'Approved'){ ?>
					<span class="badge square-pill bg-success">
					    
					<?php echo remove_junk(ucwords($contract['status']))?></span>
					<?php }elseif($contract['status'] == 'pending'){ ?>
					
					<span class="badge square-pill bg-warning"> <?php echo remove_junk(ucwords($contract['status'])); ?></span>
					<?php }else{ ?>
					<span class="badge square-pill bg-danger"> <?php echo remove_junk(ucwords($contract['status'])); }?></span></td>
							
							  
						    
                    <td class="text-center">
					
					
					<?php	if
					($contract['req_class']=='employee' 
					|| $contract['req_class']=='Employee' 
					|| $contract['req_class']=='EMPLOYEE' 
					
					|| $contract['req_class']=='Project Manager'
					|| $contract['req_class']=='PROJECT MANAGER'
					|| $contract['req_class']=='project manager'

					|| $contract['req_class']=='Client'
					|| $contract['req_class']=='CLIENT'
					|| $contract['req_class']=='client'
					
					|| $contract['req_class']=='CONTRACTOR'
					|| $contract['req_class']=='Contractor'
					|| $contract['req_class']=='contractor'
					
					
					
					){

 					switch($contract['department']){
						
					case 'HR1' : ?>
                      <div class="btn-group">
                         
                     <a href="approve_contract.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-success" style="margin-right: 5px;"><i class="bi bi-check" data-bs-placement="top" title="Accept Contract Request"></i></a> 
         
                      <a href="reject_contract.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-danger" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Reject Contract Request"><i class="bi bi-x"></i></a>
                      
                   
                    <?php if($contract['status'] == 'Approved'){ ?> 
                      <a href="hr 1 contract.php?id=<?php echo $contract['req_id'];?>&dept=<?php echo $contract['department']?>" class="btn btn-sm btn-success" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Send Contract"><i class="bi bi-send-plus"></i>
                      </a> 
                      
                    <?php }else{ ?>
                      <a href="#" class="btn btn-sm btn-secondary" style="margin-right: 5px;"><i class="bi bi-send-plus" data-bs-toggle="tooltip" data-bs-placement="top" title="Send Contract"></i></a> 
                    <?php } ?>
                      
                      
                      <a href="archive_request_contract.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-primary" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive Data"><i class="bi bi-archive"></i></a>
                     
                      <a href="view_request_contract.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="View Details"><i class="bi bi-eye"></i></a>
					  </div>
					<?php
					break;
					
					
					
					
					
					case 'LOGISTIC1': ?>
                      <div class="btn-group">
                         
                     <a href="approve_contract.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-success" style="margin-right: 5px;"><i class="bi bi-check" data-bs-placement="top" title="Accept Contract Request"></i></a> 
         
                      <a href="reject_contract.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-danger" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Reject Contract Request"><i class="bi bi-x"></i></a>
                      
                   
                    <?php if($contract['status'] == 'Approved'){ ?> 
                      <a href="logistic1contract.php?id=<?php echo $contract['req_id'];?>&dept=<?php echo $contract['department']?>" class="btn btn-sm btn-success" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Send Contract"><i class="bi bi-send-plus"></i>
                      </a> 
                      
                    <?php }else{ ?>
                      <a href="#" class="btn btn-sm btn-secondary" style="margin-right: 5px;"><i class="bi bi-send-plus" data-bs-toggle="tooltip" data-bs-placement="top" title="Send Contract"></i></a> 
                    <?php } ?>
                      
                      
                      <a href="archive_request_contract.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-primary" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive Data"><i class="bi bi-archive"></i></a>
                     
                      <a href="view_request_contract.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="View Details"><i class="bi bi-eye"></i></a>
					  </div>
					<?php
					break;
					
					
					
					case 'LOGISTIC2': ?>
                      <div class="btn-group">
                         
                     <a href="approve_contract.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-success" style="margin-right: 5px;"><i class="bi bi-check" data-bs-placement="top" title="Accept Contract Request"></i></a> 
         
                      <a href="reject_contract.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-danger" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Reject Contract Request"><i class="bi bi-x"></i></a>
                      
                   
                    <?php if($contract['status'] == 'Approved'){ ?> 
                      <a href="logistic2contract.php?id=<?php echo $contract['req_id'];?>&dept=<?php echo $contract['department']?>" class="btn btn-sm btn-success" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Send Contract"><i class="bi bi-send-plus"></i>
                      </a> 
                      
                    <?php }else{ ?>
                      <a href="#" class="btn btn-sm btn-secondary" style="margin-right: 5px;"><i class="bi bi-send-plus" data-bs-toggle="tooltip" data-bs-placement="top" title="Send Contract"></i></a> 
                    <?php } ?>
                      
                      
                      <a href="archive_request_contract.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-primary" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive Data"><i class="bi bi-archive"></i></a>
                     
                      <a href="view_request_contract.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="View Details"><i class="bi bi-eye"></i></a>
					  </div>
					<?php
					break;
					
					
					
					case 'CORE1': ?>
					 <div class="btn-group">
                         
                     <a href="approve_contract.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-success" style="margin-right: 5px;"><i class="bi bi-check" data-bs-placement="top" title="Accept Contract Request"></i></a> 
         
                      <a href="reject_contract.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-danger" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Reject Contract Request"><i class="bi bi-x"></i></a>
                      
                   
                    <?php if($contract['status'] == 'Approved'){ ?> 
                      <a href="core 1 contract.php?id=<?php echo $contract['req_id'];?>&dept=<?php echo $contract['department']?>" class="btn btn-sm btn-success" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Send Contract"><i class="bi bi-send-plus"></i>
                      </a> 
                      
                    <?php }else{ ?>
                      <a href="#" class="btn btn-sm btn-secondary" style="margin-right: 5px;"><i class="bi bi-send-plus" data-bs-toggle="tooltip" data-bs-placement="top" title="Send Contract"></i></a> 
                    <?php } ?>
                      
                      
                      <a href="archive_request_contract.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-primary" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive Data"><i class="bi bi-archive"></i></a>
                     
                      <a href="view_request_contract.php?id=<?php echo $contract['id'];?>" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="View Details"><i class="bi bi-eye"></i></a>
					  </div>
					
					<?php
					break;
					}
					}else{?>  

					

					<?php } ?>					
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
