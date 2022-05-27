<?php
  $page_title = 'Edit Plan';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $row=Recievables();
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="job-planning.php" class="breadcrumbs__item">Job Planning</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Edit Plan</a>
</nav>
<!-- /Breadcrumb -->

<!-- Data table start -->
<div class="row">
  <!-- Notification div -->
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
  <!-- End Notification div -->

  <?php
  $jobplan = mysqli_real_escape_string($conn, $_GET['id']);
  $dep = mysqli_real_escape_string($conn, $_GET['dept']);
  $pos = mysqli_real_escape_string($conn, $_GET['pos']);
 
	

	$query = "SELECT * FROM jobplan WHERE jp_id = '$jobplan'" ;
  $res = $db->query($query);
  $emp = $res->fetch_assoc();
  $row = $res->num_rows;
  ?>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-pencil"></i> Edit Plan</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="update-plan.php" method="POST">
                <input type="hidden" name="e_id" value="<?php echo $row['jp_id']; ?>" class="form-control">
				<div class="form-group row">
                  <label class="col-form-label col-md-4">Department</label>
                    <div class="col-md-8">
                     <select name="dept" class="dept form-control">
					  <?php $sql = "SELECT * FROM departments";
					  $res = $db->query($sql);
					  $dept = $res->fetch_assoc();
					  $row = $res->num_rows;
					  if($row>0){ do{ $did = $dept['dept_id'];?>
					  
					  <option value="<?php echo $dept['dept_id'];?>"<?php if($did == $dep){ echo 'selected';} ?>   ><?php echo $dept['dept_name']?></option>
					  <?php }while($dept=$res->fetch_assoc()); }?>
					 
					 </select>
                    </div>
                  </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Position</label>
                    <div class="col-md-8">
                      <select name="e_position" class="jt form-control">
					  <?php $sql = "SELECT * FROM positions";
					  $res = $db->query($sql);
					  $dept = $res->fetch_assoc();
					  $row = $res->num_rows;
					  if($row>0){ do{ $did = $dept['pos_id'];?>
					  
					  <option value="<?php echo $dept['pos_id'];?>"<?php if($did == $pos){ echo 'selected';} ?>   ><?php echo $dept['pos_name']?></option>
					  <?php }while($dept=$res->fetch_assoc()); }?>
					  </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Job Type (Casual or Regular)</label>
                    <div class="col-md-8">
					<input type="hidden" name="e_id" value="<?php echo $emp['jp_id']; ?>" >
                      <input type="text" name="e_type" value="<?php echo $emp['jp_type']; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Job Experience</label>
                    <div class="col-md-8">
                      <input type="text" name="e_exp" value="<?php echo $emp['jp_exp']; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Salary Rate</label>
                      <div class="col-md-8">
                        <input type="number" name="e_salrate" value="<?php echo $emp['jp_salrate']; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Day Rate</label>
                    <div class="col-md-8">
                      <input type="number" name="e_drate" value="<?php echo $emp['jp_drate']; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Hour Rate</label>
                    <div class="col-md-8">
                      <input type="number" name="e_hrate" value="<?php echo $emp['jp_hrate']; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Overtime Rate</label>
                    <div class="col-md-8">
                      <input type="number" name="e_otrate" value="<?php echo $emp['jp_otrate']; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Philhealth (Deduction)</label>
                    <div class="col-md-8">
                      <input type="number" name="e_ph" value="<?php echo $emp['jp_ph']; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">SSS (Deduction)</label>
                    <div class="col-md-8">
                      <input type="number" name="e_sss" value="<?php echo $emp['jp_sss']; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">PagIbig (Deduction)</label>
                    <div class="col-md-8">
                      <input type="number" name="e_pi" value="<?php echo $emp['jp_pi']; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Tax (Deduction)</label>
                    <div class="col-md-8">
                      <input type="number" name="e_tax" value="<?php echo $emp['jp_tax']; ?>" class="form-control">
                    </div>
                  </div>
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="updtplanbtn" class="btn btn-primary text-white">Save</button>
                      <a href="job-planning.php" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>
</div>
</main>
    <!-- All Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script src="./libs/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./libs/js/jquery-3.5.1.js"></script>
    <script src="./libs/js/jquery.dataTables.min.js"></script>
    <script src="./libs/js/dataTables.bootstrap5.min.js"></script>
    <script src="./libs/js/script.js"></script>
    <script src="./libs/js/sweetalert2.min.js"></script>
	<script type="text/javascript">
	
	$(document).ready(function(){
		
		$(".dept").change(function(){
			var dept_id = $(this).val();
			$.ajax({
				url: "positions.php",
				method: "POST",
				data:{dept_id:dept_id},
				dataType: "text",
				success:function(data){
					$(".jt").html(data);				
				}			
			});
		});	
	});
	
	
	</script>
    <?php
    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
    ?>
    <script>
    swal.fire({
    title: "<?php echo $_SESSION['status']; ?>",
    icon: "<?php echo $_SESSION['status_code']; ?>",
    button: "OK",
    });
    </script>
    <?php
    unset($_SESSION['status']);
    }
    ?>
   <!-- End of Script Links -->

  </body>
</html>

<?php if(isset($db)) { $db->db_disconnect(); } ?>


