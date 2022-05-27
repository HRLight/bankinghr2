MK<?php
  $page_title = 'Stock Item';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   $all_items = find_all('items')
?>
<?php include_once('layouts/header.php'); ?>
<style>
#wrapper{
	background-color: white;
	width: 95%;
	margin: 2% auto;
	margin-left: 2%;
	padding-left: 2%;
	padding-right: 2%;
	padding-bottom: 2%;
	webkit-box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42); 
	box-shadow: 0px 5px 35px 5px rgba(0,0,0,0.42);
}
#ulo{
	font-size: 20px;
	background-color: #d6d6d6;
}
td{
	height: 50px;
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
	hr{
		display: none; !important;
	}
	body{
		zoom: 80%;
	}
}

@page {
    size: 100%;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
#button{
	margin-right: 1%;
	margin-top: 1%;
}
</style>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">STOCCK ITEM</a>
</nav>
<hr style="margin-top: 0px; border-top: solid grey 2px;">
<!-- /Breadcrumb -->





<div class="col-md-12 mb-3" id="wrapper">
    <div class="card">
      <div class="card-header">
        <span class="badge square-pill bg-success"><i class="bi bi-list"></i> Project Report</span>
      </div>
	<div class="text-end">
		<!-- Button trigger modal -->
		<button onclick="print()" id="button" class="btn btn-info md-2"><i class="bi bi-file-post"></i> Print report</button>
	</div>
    

      <div class="card-body">
        <div class="table-responsive">

          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
			    <th class="text-center" style="">ID</th>
								<th class="text-center">ITEM NAME</th>
								<th class="text-center">DESCRIPTION</th>
								<th class="text-center">PRICE</th>
								<th class="text-center">QUANTITY</th>
								<th class="text-center">TOTAL</th>
								<th class="text-center">ITEM CODE</th>
								
              </tr>
            </thead>
			<tbody>
				<?php foreach ($all_items as $project):?>
					<tr>
						    <td class="text-center"><?php echo remove_junk(ucfirst($project['ID'])); ?></td>
							<td class="text-center"><?php echo remove_junk(ucfirst($project['item_name'])); ?></td>
							<td class="text-center"><?php echo remove_junk(ucfirst($project['item_description'])); ?></td>
							<td class="text-center"><?php echo remove_junk(ucfirst($project['price'])); ?></td>
							<td class="text-center"><?php echo remove_junk(ucfirst($project['quantity'])); ?></td>
							<td class="text-center"><?php echo remove_junk(ucfirst($project['total'])); ?></td>
							<td class="text-center"><?php echo remove_junk(ucfirst($project['item_code'])); ?></td>
								
					</tr>       
				<?php endforeach; ?>
			</tbody>
				</table>
			</div>
		</div>
    </div>
</div>


<?php include_once('layouts/footer.php'); ?>