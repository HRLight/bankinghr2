<?php
  $page_title = 'Request Vendor';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
 $all_contract = find_all('maintenance_request')
?>
<html>
<body>
<link rel="icon" href="https://webstockreview.net/images/bank-clipart-transparent-background-9.png" type="image/icon type">
<style>
.cke_textarea_inline{
		border: 1px solid black;
	}
#request_contract{
	margin: 10px;
}
#wrapper{
	background-color: white;
	width: 95%;
	margin: 2% auto;
	margin-left: 2%;
	padding: 2%;
	webkit-box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42); 
	box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42);
}
#box{
	border: solid black 1px;
}
input.field{
	width: 400px;
}
</style>
<!-- CKEditor -->	
	<script src="ckeditor/ckeditor.js" ></script>
<?php include_once('layouts/header.php'); ?>


<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Maintenance Request</a>
</nav>
<hr style="margin-top: 0px; border-top: solid grey 2px;">
<!-- /Breadcrumb -->


<div class="col-md-12 mb-3" id="wrapper">
    <div class="card">
      <div class="card-header">
        <span class="badge square-pill bg-success"><i class="bi bi-list"></i> Maintenance Request</span>
      </div>
	<div class="text-end">
		<!-- Button trigger modal -->
		<a href="add_maintenance_request.php" id="add_mainte"><button type="button" class="btn btn-primary" id="request_contract">
		 + Add Maintenance Request
		</button>
	</div></a>
    

      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-striped data-table" style="width: 100%" >
            <thead>
              <tr>
			    <th>ID</th>
                <th>Name of Requestor</th>
                <th>Department</th>
                <th>Name of Equipments</th>
                <th>Status</th>
                <th>Date of Request</th>
              </tr>
            </thead>
					<tbody>
						<?php foreach ($all_contract as $visitor):?>
							<tr>
								<td><?php echo remove_junk(ucfirst($visitor['id'])); ?></td>
								<td><?php echo remove_junk(ucfirst($visitor['fname'])." ".($visitor['mname'])." ".($visitor['lname'])); ?></td>
								<td><?php echo remove_junk(ucfirst($visitor['department'])); ?></td>
								<td><?php echo remove_junk(ucfirst($visitor['request_list'])); ?></td>
								
								<td><?php if($visitor['status'] == 'Received'){ ?>
								<span class="badge rounded-pill bg-success">
								<?php echo remove_junk(ucwords($visitor['status']))?></span>
								<?php }else{ ?>
								<span class="badge rounded-pill bg-danger"> <?php echo remove_junk(ucwords($visitor['status'])); }?></span></td>
								
								<td><?php echo remove_junk(ucfirst($visitor['date_of_request'])); ?></td>
										
							</tr>       
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
    </div>
</div>







<!-- Script -->
	<script type="text/javascript">
	
		// Initialize CKEditor

		CKEDITOR.replace('long_desc',{
			
			width: "100%",
        	height: "200px"
   
		}); 
	
    	
	</script>
</body>
</html>
<?php include_once('layouts/footer.php'); ?>