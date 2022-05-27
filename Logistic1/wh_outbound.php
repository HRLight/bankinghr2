<?php
  $page_title = 'WAREHOUSE';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
  $all_outbound = find_all('outbound')
?>

<!-- add visitor function ------------------------------------------------------------------------------------------------------------------------------ -->
<?php
 if(isset($_POST['add_vis'])){
   /* $req_fields = array('item_name','item_description','quantity');
   
   validate_fields($req_fields);
	*/
	$vis_item_name = $_POST['visitor-category'];
	$vis_item_description = $_POST['visitor-description'];
	$vis_quantity = $_POST['visitor-quantity'];
	
	$sql = "INSERT INTO `outbound`( `item_name`, `item_description`, `quantity`)
	VALUES('$vis_item_name','$vis_item_description','$vis_quantity')";
	
	$db->query($sql);
   /**
   if(empty($errors)){
      $sql  = "INSERT INTO outbound (item_name, item_description, quantit)";
	 $sql .= " VALUES ('{$vis_item_name}','{$vis_item_description}'.'($vis_quantity)')";
      
	 
      if($db->query($sql)){
       $_SESSION['status'] =  "Succesful Added New Announcement";
        $_SESSION['status_code'] =  "success";
        redirect('wh_outbound.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('wh_outbound..php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('wh_outbound..php',false);
   }**/
 }
?>
<!--/ add visitor function ----------------------------------------------------------------------------->


<?php include_once('layouts/header.php'); ?>

<style>
    .line{
        border: black solid 1px;
    }
    .breadcrumbs{
        margin-bottom:0;
    }
</style>

<!-- Breadcrumb ------------------------------------------------------------------------------------------------>
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#breadcrumbs" class="breadcrumbs__item is-active">INBOUND</a>
</nav>
<hr class="line">
<!-- /Breadcrumb ------------------------------------------------------------------------------------------------>



  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
         <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> List of OUTBOUND Items</span>
		<div class="text-end">
          <a  class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal">+Add Item</a>
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
               <th class="text-center" style="width: 50px;">#</th>
				
               <th class="text-center">ITEM NAME</th>
				<th class="text-center">DESCRIPTION</th>
				<th class="text-center">QUANTITY</th>
                <th class="text-center" style="width: 100px;">Actions</th>
              </tr>
            </thead>
            <tbody>

          <?php foreach ($all_outbound as $category):?>
          <tr>
          <td><?php echo remove_junk(ucfirst($category['ID'])); ?></td>
                    
					    <td><?php echo remove_junk(ucfirst($category['item_name'])); ?></td>
						 <td><?php echo remove_junk(ucfirst($category['item_description'])); ?></td>
						<td><?php echo remove_junk(ucfirst($category['quantity'])); ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                      <a  class="btn btn-sm btn-success" style="margin-right: 5px;"><i class="bi bi-pencil"></i></a>
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
  
  
  
  <!-- add visitor-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	
        <h5 class="badge square-pill bg-success" class="modal-title" id="exampleModalLabel">Put Outbound Items</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form method="post" action="wh_outbound.php">
           
          <div class="form-group">
                
				<input type="text" class="form-control" name="visitor-category" placeholder="Item Name" required><br>
				<input type="text" class="form-control" name="visitor-description" placeholder="Description" required><br>
				<input type="text" class="form-control" name="visitor-quantity" placeholder="Quantity" required><br>
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





<?php include_once('layouts/footer.php'); ?>