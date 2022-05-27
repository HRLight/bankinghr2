<?php
  $page_title = 'Asset';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
 $all_fixed = find_all('fixed')
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

  <a href="#checkout" class="breadcrumbs__item is-active">Monitoring Request</a>
</nav>
<hr style="margin-top: 0px; border-top: solid grey 2px;">
<!-- /Breadcrumb -->


<div class="col-md-12 mb-3" id="wrapper">
    <div class="card">
      <div class="card-header">
        <span class="badge square-pill bg-success"><i class="bi bi-list"></i>Monitoring FIXED Asset</span>
      </div>
	</a>
    

      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-striped data-table" style="width: 100%" >
            <thead>
              <tr>
			    <th>ID</th>
                <th>Particulars</th>
                
                <th>Current Value</th>
				<th>Location</th>
				
              </tr>
            </thead>
					<tbody>
						<?php foreach ($all_fixed as $visitor):?>
							<tr>
								<td><?php echo remove_junk(ucfirst($visitor['ID'])); ?></td>
								<td><?php echo remove_junk(ucfirst($visitor['particulars'])); ?></td>
								<td><?php echo remove_junk(ucfirst($visitor['current_value'])); ?></td>
								<td><?php echo remove_junk(ucfirst($visitor['location'])); ?></td>
								
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