<?php
  $page_title = 'Warehouse Category';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
  $all_cat = find_all('add_category_detail')
?>

<!-- add visitor function ------------------------------------------------------------------------------------------------------------------------------ -->
<?php
 if(isset($_POST['add_vis'])){
    $req_fields = array('serial_num', 'product_name', 'price', 'quantity', 'date_of_purchase', 'vendor', 'category');
   
   validate_fields($req_field);
	
	$vis_serial_num = remove_junk($db->escape($_POST['visitor-serial_num']));
	$vis_product_name = remove_junk($db->escape($_POST['visitor-product_name']));
	$vis_price = remove_junk($db->escape($_POST['visitor-price']));
	$vis_quantity = remove_junk($db->escape($_POST['visitor-quantit']));
	$vis_date_of_purchase = remove_junk($db->escape($_POST['visitor-date_of_purchase']));
	$vis_vendor = remove_junk($db->escape($_POST['visitor-vendor']));
	$vis_category = remove_junk($db->escape($_POST['visitor-category']));
   
   
   if(empty($errors)){
      $sql  = "INSERT INTO add_category_detail (serial_num, product_name, price, quantity, date_of_purchase, vendor, category)";
	 $sql .= " VALUES ('{$vis_serial_num}','{$vis_product_name}','{$vis_price}','{$vis_quantity}','{$vis_date_of_purchase}','{$vis_vendor}','{$vis_category}')";
      
	 
      if($db->query($sql)){
       $_SESSION['status'] =  "Succesful Added New Announcement";
        $_SESSION['status_code'] =  "success";
        redirect('add_categ_info.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('add_categ_info.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('add_categ_info.php',false);
   }
 }
?>
<!--/ add visitor function ------------->


<?php include_once('layouts/header.php'); ?>

<style>
    .line{
        border: black solid 1px;
    }
    .breadcrumbs{
        margin-bottom:0;
    }
</style>

<!-- Breadcrumb ------------------------->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="warehouse_category.php" class="breadcrumbs__item">Category</a>
  <a href="#breadcrumbs" class="breadcrumbs__item is-active">Add Category List</a>
</nav>
<hr class="line">
<!-- /Breadcrumb ------------------------------------------------------------------------------------------------>



  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
         <span class="badge square-pill bg-success"><i class="bi bi-table"></i> Add Category List</span>
		<div class="text-end">
          <a  class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal">+Add Category</a>
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
				
                <th>ID</th>
                <th>Serial Number</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Date of purchase</th>
                <th>Vendor</th>
                <th>Category</th>

                <th class="text-center" style="width: 100px;">Actions</th>
              </tr>
            </thead>
            <tbody>

          <?php foreach ($all_cat as $category):?>
          <tr>
          <td><?php echo remove_junk(ucfirst($category['cat_id'])); ?></td>
                    
        
					     <td><?php echo remove_junk(ucfirst($category['id'])); ?></td>
						 <td><?php echo remove_junk(ucfirst($category['serial_num'])); ?></td>
						 <td><?php echo remove_junk(ucfirst($category['product_name'])); ?></td>
						 <td><?php echo remove_junk(ucfirst($category['price'])); ?></td>
						 <td><?php echo remove_junk(ucfirst($category['quantity'])); ?></td>
						 <td><?php echo remove_junk(ucfirst($category['date_of_purchase'])); ?></td>
						 <td><?php echo remove_junk(ucfirst($category['vendor'])); ?></td>
						 <td><?php echo remove_junk(ucfirst($category['category'])); ?></td>
						 
						 
                    <td class="text-center">
                      <div class="btn-group">
                      <a href="add_categ_info.php?id=<?php echo $category['cat_id'];?>" class="btn btn-sm btn-success" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"><i class="bi bi-plus-square"></i></a>
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
        <h5 class="badge square-pill bg-success" class="modal-title" id="exampleModalLabel">Create Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
       <form method="post" action="warehouse_category.php">
           
        <div class="form-group">
				<input type="text" class="form-control" name="visitor-category" placeholder="Category" required><br>
				<input type="text" class="form-control" name="visitor-description" placeholder="Description" required><br>
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



<!-- add function-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	
        <h5 class="badge square-pill bg-success" class="modal-title" id="exampleModalLabel">Create Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
       <form method="post" action="warehouse_category.php">
           
          <div class="form-group">
                
				<input type="text" class="form-control" name="visitor-category" placeholder="Category" required><br>
				<input type="text" class="form-control" name="visitor-description" placeholder="Description" required><br>
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
<!-- End of add function  -->







<?php include_once('layouts/footer.php'); ?>