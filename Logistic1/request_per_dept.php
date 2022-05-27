<?php
  $page_title = 'Logistic 1';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   $all_request_procurement = find_all('request_procurement')
?>
<link rel="icon" href="https://webstockreview.net/images/bank-clipart-transparent-background-9.png" type="image/icon type">

<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Departments Request</a>
</nav>
<hr style="margin-top: 0px; border-top: solid grey 2px;">
<!-- /Breadcrumb -->

<div class="col-md-12 mb-3 card-header" style="border: solid grey 1px">
	<div class="card">
		<div class="card-header">
			<span class="badge square-pill bg-success"><i class="bi bi-list"></i> Departments Request</span>
		</div>
		
		<div class="card-body">
			<div class="table-responsive">
				<table id="example" class="table table-striped data-table" style="width: 100%">
					<thead>
					  <tr>
						<th>Request Id</th>
						<th>Position</th>
						<th>Name of Requestor</th>
						<th>Request List</th>
						<th>Department</th>
						<th>Status</th>
						
					   
					   
						<th>Date of Request</th>
						<th class="text-center" style="width: 100px;">Actions</th>
					  </tr>
					</thead>
			
					<tbody>
					<?php foreach ($all_request_procurement as $procurements):?>
						<tr>
						<td><?php echo remove_junk(ucfirst($procurements['req_id'])); ?></td>
						<td><?php echo remove_junk(ucfirst($procurements['position'])); ?></td>
						<td><?php echo remove_junk(ucfirst($procurements['fname'].' '.$procurements['mname'].' '.$procurements['lname'])); ?></td>
						<td><?php echo remove_junk(ucfirst($procurements['request_list'])); ?></td>
						<td><?php echo remove_junk(ucfirst($procurements['department'])); ?></td>
						<td><?php echo remove_junk(ucfirst($procurements['status'])); ?></td>
						<td><?php echo remove_junk(ucfirst($procurements['date_of_request'])); ?></td>
								
								  
								
						<td class="text-center">
						
						
						<?php	if
						($procurements['position']=='employee' 
						|| $procurements['position']=='Employee' 
						|| $procurements['position']=='EMPLOYEE' 
						|| $procurements['position']=='Project Manager'
						|| $procurements['position']=='PROJECT MANAGER'
						|| $procurements['position']=='project manager'
						|| $procurements['position']=='HR1 MANAGER'
						|| $procurements['position']=='HR1 STAFF'
						|| $procurements['position']=='MANAGER'
						|| $procurements['position']=='Manager'


						){

						switch($procurements['department']){
							
							case 'HR1' : ?>

						  <a href="view_request_details.php?id=<?php echo $procurements['id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
						  </div>
						<?php
						break;
						
						
						case 'HR2': ?>

						  <a href="view_request_details.php?id=<?php echo $procurements['id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
						  </div>
						  
						  
						
						<?php
						break;
						
						
						case 'HR3': ?>

						  <a href="view_request_details.php?id=<?php echo $procurements['id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
						  </div>
						  
						  
						
						<?php
						break;
						
						case 'CORE1': ?>

						  <a href="view_request_details.php?id=<?php echo $procurements['id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
						  </div>
						  
						  
						
						<?php
						break;
						
						case 'CORE2': ?>

						  <a href="view_request_details.php?id=<?php echo $procurements['id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
						  </div>
						  
						  
						
						<?php
						break;
						case 'LOGISTIC2': ?>

						  <a href="view_request_details.php?id=<?php echo $procurements['id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
						  </div>
						  
						  
						
						<?php
						break;
						
						case 'ADMINISTRATIVE' : ?>

						  <a href="view_request_details.php?id=<?php echo $procurements['id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
						  </div>
						<?php
						break;
						
						
						case 'FINANCIAL' : ?>

						  <a href="view_request_details.php?id=<?php echo $procurements['id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
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
</div>
<?php include_once('layouts/footer.php'); ?>