<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
      $all_v_info = find_all('itm');
	  $items_info = find_all('items') ;
?>

<?php $all_ended_projects = find_all('ended_project_list') ?>
<?php include_once('layouts/header.php'); ?>
<link rel="stylesheet" href="datatables.css">

<?php
  if(isset($_POST['applicationform'])){
    header('Content-Type: text/plain; charset=utf-8');

   $req_fields = array('asset','stated_amount','actual_amount');
   validate_fields($req_fields);
   $target_dir = "uploads/";
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   $uploadOk = 1;
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


   if(empty($errors)){
       $asset   = remove_junk($db->escape($_POST['asset']));
       $stated_amount   = remove_junk($db->escape($_POST['stated_amount']));
       $actual_amount   = remove_junk($db->escape($_POST['actual_amount']));
       $datecreated   =  date('Y-m-d');
       // remove_junk($db->escape(date('Y-m-d', strtotime($_POST['date_created']))));
       $preparedby   = remove_junk($db->escape($_POST['auditor']));
        $query = "INSERT INTO audit (";
        $query .="asset,stated_amount,actual_amount,date_created,preparedby,urlpath";
        $query .=") VALUES (";
        $query .="'{$asset}', '{$stated_amount}','{$actual_amount}', '{$datecreated}', '{$preparedby}','{$target_file}'";
        $query .=")";


    
        if($db->query($query)){
          move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
          $session->msg('s',"Data has been save! ");
          redirect('audit_form.php', false);
        } else {
         
          $session->msg('d',' Sorry Data not saved!');
          redirect('audit_form.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('audit_form.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span><h5><b>Monitoring Asset</b></h5></span>
       </strong>
         
      </div>
     <div class="panel-body">
      <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <style>
                body {font-family: Arial;}

                /* Style the tab */
                .tab {
                    overflow: hidden;
                    border: 1px solid #ccc;
                    background-color: #f1f1f1;
                }

                /* Style the buttons inside the tab */
                .tab button {
                    background-color: inherit;
                    float: left;
                    border: none;
                    outline: none;
                    cursor: pointer;
                    padding: 14px 16px;
                    transition: 0.3s;
                    font-size: 17px;
                }

                /* Change background color of buttons on hover */
                .tab button:hover {
                    background-color: #ddd;
                }

                /* Create an active/current tablink class */
                .tab button.active {
                    background-color: #ccc;
                }

                /* Style the tab content */
                .tabcontent {
                    display: none;
                    padding: 6px 12px;
                    border: 1px solid #ccc;
                    border-top: none;
                }
                /* Table Scroll */
                #ViewData{
                    overflow-x: auto;
                }
				
				@media print{
					#button{
						display: none; !important;
					}
					.breadcrumbs{
						display: none; !important;
					}
					body{
						zoom: 65%;
					}
				}
				@page {
					size: auto;   /* auto is the initial value */
					margin: 0;  /* this affects the margin in the printer settings */
				}


            </style>
        </head>
        <body>
        <div class="tab">
            <button class="tablinks" onclick="Tab(event, 'ApplicationForm')">Fleet Management</button>
            <button class="tablinks" onclick="Tab(event, 'ViewData')">Project Management</button>
            <button class="tablinks" onclick="Tab(event, 'InventoryReport')">Inventory</button>
			<button onclick="print()" id="button" class="btn btn-info md-2 float-end"><i class="bi bi-file-post"></i> Print report</button>
        </div>

        <div id="ApplicationForm" class="tabcontent">
            <form method="post" action="audit_form.php" autocomplete="off" enctype="multipart/form-data"> 
                <div class="col-md-12 mb-3 card-header" style="border: solid grey 1px">
					<div class="card">
						<div class="card-header">
							<span class="badge square-pill bg-success"><i class="bi bi-list"></i> Monitoring</span>
						</div>
						
						<div class="card-body">
							<div class="table-responsive">
								<table id="example" class="table table-striped data-table" style="width: 100%">
									<thead>
									  <tr>
										<th>Fleet ID</th>
										<th>Category</th>
										<th>Model</th>
										<th>Year</th>
										<th>Color</th>
										<th>Registration Number</th>
										<th>Serial Number</th>
										<th>Capcity</th>
										<th>Date of Purchase</th>
										<th>Manufacturer</th>
										<th>Engine type</th>
										<th>Location</th>
										<th>Fuel type</th>
										<th>Fuel Cap</th>
										<th>License</th>
										<th>Condition</th>
										<th>Availability</th>
										<th>Fleet image</th>
							
										
										<th class="text-center" style="width: 100px;">Actions</th>
									  </tr>
									</thead>
							
									<tbody>
									<?php foreach ($all_v_info as $info):?>
										<tr>
										<td><?php echo remove_junk(ucfirst($info['fleetid'])); ?></td>
										<td><?php echo remove_junk(ucfirst($info['v_category'])); ?></td>
										<td><?php echo remove_junk(ucfirst($info['v_model'])); ?></td>
										<td><?php echo remove_junk(ucfirst($info['v_year'])); ?></td>
										<td><?php echo remove_junk(ucfirst($info['v_color'])); ?></td>
										<td><?php echo remove_junk(ucfirst($info['v_regnum'])); ?></td>
										<td><?php echo remove_junk(ucfirst($info['v_serialnum'])); ?></td>
										<td><?php echo remove_junk(ucfirst($info['v_capacity'])); ?></td>
										<td><?php echo remove_junk(ucfirst($info['v_datepur'])); ?></td>
										<td><?php echo remove_junk(ucfirst($info['v_manu'])); ?></td>
										<td><?php echo remove_junk(ucfirst($info['v_enginetype'])); ?></td>
										<td><?php echo remove_junk(ucfirst($info['v_loc'])); ?></td>
										<td><?php echo remove_junk(ucfirst($info['v_fueltype'])); ?></td>
										<td><?php echo remove_junk(ucfirst($info['v_fuelcap'])); ?></td>
										<td><?php echo remove_junk(ucfirst($info['v_license'])); ?></td>
										<td><?php echo remove_junk(ucfirst($info['v_condition'])); ?></td>
										<td><?php echo remove_junk(ucfirst($info['v_avail'])); ?></td>
										<td><?php echo remove_junk(ucfirst($info['fleetimg'])); ?></td>
											
										
										</tr>       
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
            </form>
        </div>
		
		<div id="InventoryReport" class="tabcontent">
            <form method="post" action="audit_form.php" autocomplete="off" enctype="multipart/form-data"> 
                <div class="col-md-12 mb-3 card-header" style="border: solid grey 1px">
					<div class="card">
						<div class="card-header">
							<span class="badge square-pill bg-success"><i class="bi bi-list"></i> Monitoring</span>
						</div>
						
						<div class="card-body">
							<div class="table-responsive">
								<table id="example" class="table table-striped data-table" style="width: 100%">
									<thead>
									  <tr>
										<th>ID</th>
										<th>Item Name</th>
										<th>Item Description</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>Item Code</th>
										
							
										
										<th class="text-center" style="width: 100px;">Actions</th>
									  </tr>
									</thead>
							
									<tbody>
									<?php foreach ($items_info as $info):?>
										<tr>
										<td><?php echo remove_junk(ucfirst($info['item_name'])); ?></td>
										<td><?php echo remove_junk(ucfirst($info['item_description'])); ?></td>
										<td><?php echo remove_junk(ucfirst($info['price'])); ?></td>
										<td><?php echo remove_junk(ucfirst($info['quantity'])); ?></td>
										<td><?php echo remove_junk(ucfirst($info['total'])); ?></td>
										<td><?php echo remove_junk(ucfirst($info['item_code'])); ?></td>
											
										
										</tr>       
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
            </form>
        </div>
		
		
	</div>

        <div id="ViewData" class="tabcontent">
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
										<th>ID</th>
										<th>PROPOSED PROJECT</th>
										<th>PROJECT NAME</th>
										<th>LOCATION</th>
										<th>COST</th>
										<th>START DATE</th>
										<th>END DATE</th>
										<th>PROJECT MANAGER</th>
										
										
										<th class="text-center" style="width: 100px;">Actions</th>
									  </tr>
									</thead>
							
									<tbody>
									<?php foreach ($all_ended_projects as $project):?>
										<tr>
										<td class="text-center"><?php echo remove_junk(ucfirst($project['id'])); ?></td>
										<td class="text-center"><?php echo remove_junk(ucfirst($project['prop_proj'])); ?></td>
										<td class="text-center"><?php echo remove_junk(ucfirst($project['proj_name'])); ?></td>
										<td class="text-center"><?php echo remove_junk(ucfirst($project['loc'])); ?></td>
										<td class="text-center"><?php echo remove_junk(ucfirst($project['cost'])); ?></td>
										<td class="text-center"><?php echo remove_junk(ucfirst($project['start_date'])); ?></td>
										<td class="text-center"><?php echo remove_junk(ucfirst($project['end_date'])); ?></td>
										<td class="text-center"><?php echo remove_junk(ucfirst($project['proj_man'])); ?></td>					
										</tr>       
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			
			
			
			
        </div>


        <script>
        function Tab(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }
        </script>
        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
              modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
              modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }
        </script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="datatables.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
<script>
  $("#myTable").DataTable(
    {
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
    }
  );
</script>
        </body>
     </div>
    </div>
  </div>
</div>
  <?php include_once('layouts/footer.php'); ?>
