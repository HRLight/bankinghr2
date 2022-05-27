



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
    $all_rules_and_regulation = find_all('rules_and_regulation')
?>

<!-- add visitor function ------------------------------------------------------------------------------------------------------------------------------ -->
<?php
 if(isset($_POST['add_vis'])){
    $req_fields = array('ra_no','date', 'Description');
   
   validate_fields($req_field);
	
	$vis_ra_no = remove_junk($db->escape($_POST['visitor-ra_no']));
	$vis_date = remove_junk($db->escape($_POST['visitor-date']));
	$vis_Description = remove_junk($db->escape($_POST['visitor-Description']));
	
   if(empty($errors)){
      $sql  = "INSERT INTO rules_and_regulation ( ra_no, date, Description)";
	 $sql .= " VALUES ('{$vis_ra_no}','{$vis_date}','{$vis_Description}')";
      
	 
      if($db->query($sql)){
     
		   $_SESSION['status'] =  "Successfully Added New Regulation";
            $_SESSION['status_code'] =  "success";
        redirect('rulesandregulation.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('rulesandregulation.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('rulesandregulation.php',false);
   }
 }
?>
<!-- add visitor function ---------------------------------------------------------------------------------------------------------------------------------------- -->
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
  <a href="rulesandregulation.php" class="breadcrumbs__item is-active">Rules and Regulations</a>
</nav>
<!-- /Breadcrumb -->

 
 <br>   
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
   
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  
		<a href="rulesandregulation.php"><button type="button" class="btn btn-primary">Rules and Regulation</button></a> 
		<a href="visitorpolicy.php"><button type="button" class="btn btn-light">Visitor Policy</button></a> 
</nav>



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
          <a href="register_visitor.php" id="cr" class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal">Create regulations</a>
         
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

          <?php foreach ($all_rules_and_regulation as $regulation):?>
          <tr>
          <td><?php echo remove_junk(ucfirst($regulation['id'])); ?></td>
                    
          
			        <td><?php echo remove_junk(ucfirst($regulation['ra_no'])); ?></td>
				     <td><?php echo remove_junk(ucfirst($regulation['date'])); ?></td>
				    <td><?php echo remove_junk(ucfirst($regulation['Description'])); ?></td>   
                     <td class="text-center">
                      <div class="btn-group">
                      <a href="edit_facility_complain.php?id=<?php echo $regulation['id'];?>" class="btn btn-sm btn-success" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="bi bi-pencil"></i></a>  
                      
                      
                     <a href="archive-regulation.php?id=<?php echo $regulation['id'];?>" class="btn btn-sm btn-primary" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive Data"><i class="bi bi-archive"></i></a>

                      <a href="view_rules_and_regulation.php?id=<?php echo $regulation['id'];?>" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="View Data"><i class="bi bi-eye"></i></a>
                      </div>
                    </td>

                </tr>       
            <?php endforeach; ?>

            </tbody>
            
          </table>
        </div>
      </div>
    </div>
  

  
  <!-- add regulation-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
	
         <h5 class="modal-title" id="exampleModalLabel">Add Regulations</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form method="post" action="rulesandregulation.php">
          <div class="form-group">
                
				<div class="form-group">
                    <label for="ra_no">R.a no</label>
				<input type="number" class="form-control" name="visitor-ra_no" placeholder="Ra no." required>
				</div>
				
				
				<div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" name ="visitor-date"  placeholder="Date" required>
                </div>
				
				<div class="form-group">
                    <label for="Description">Description</label>
				<input type="text" class="form-control" name="visitor-Description" placeholder="Description" required>
				</div>
				

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
