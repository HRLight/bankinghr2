<?php
  $page_title = 'Add Plan';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $row=Recievables();
   
   if(isset($_POST['add'])){
	   
	   $dept = $_POST['dept'];
	   $pos = $_POST['jt'];
	   $emp = $_POST['emp'];
	   
	   
	   
	   $que = "SELECT * FROM job_qualifications WHERE pos_id = '$pos'";
	   $re = $db->query($que);
	   $quali =$re->fetch_assoc();
	   $qual = $quali['id'];
	   
	   $sql = "INSERT INTO job_vacancy (dept_id,pos_id,no_of_vacancy,quali_id,status)";
	   $sql .= " VALUES ('$dept','$pos','$emp','$qual','pending')";
	   if($db->query($sql)){
		   
		    $_SESSION['status'] =  "Manpower Request Created";
       $_SESSION['status_code'] =  "success";
	   redirect('manpower_request.php',false);
		   
	   }
	   
	   
	   
   }
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="manpower_request.php" class="breadcrumbs__item">Manpower Request</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Add Manpower Request</a>
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

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-primary"><i class="bi bi-plus"></i> Add Job Request</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="add_job_request.php" method="POST">
			  <div class="form-group row">
                  <label class="col-form-label col-md-4">Department</label>
                    <div class="col-md-8">
                      <select name="dept" class="dept form-control">
					  <option value="">Select Department</option>
					  <?php $sql = "SELECT * FROM departments";
					  $res = $db->query($sql);
					  $dept = $res->fetch_assoc();
					  $row = $res->num_rows;
					  if($row>0){ do{ ?>
					  
					  <option value="<?php echo $dept['dept_id']?>"><?php echo $dept['dept_name']?></option>
					  <?php }while($dept=$res->fetch_assoc()); }?>
					  </select>
                    </div>
                  </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Position</label>
                    <div class="col-md-8">
                      <select name="jt" class="jt form-control">
					 
					  </select>
                    </div>
                  </div>
                
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Number of Employees</label>
                    <div class="col-md-8">
                      <input type="number" name="emp" class="form-control">
                    </div>
                  </div>
                
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="add" class="btn btn-primary text-white">Submit</button>
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

