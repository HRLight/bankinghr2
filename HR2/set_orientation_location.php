<?php
  $page_title = 'Add Schedule';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $id = $db->escape($_GET['id']);
  $sql = "SELECT orientation.*,employees.*,positions.*,departments.* FROM orientation JOIN employees ON ";
  $sql .= "orientation.employee_id = employees.employee_id JOIN positions ON employees.pos_id = positions";
  $sql .= ".pos_id JOIN departments ON employees.dept_id = departments.dept_id WHERE orientation.employee_id = '$id'";
  $res = $db->query($sql);
  $info = $res->fetch_assoc();
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
 

  <a href="orientation_sched.php" class="breadcrumbs__item">Schedules</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Setting Location</a>
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
      
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="hr2-codes.php" method="POST">
                <div class="container">
                  <div class="col-md-8 mx-auto">

                <div class="form-group row">
                  <label class="col-form-label col-md-4">Employee Name</label>
                    <div class="col-md-8">
                     
                      <input type="text" name="tname" class="form-control" value="<?php echo $info['first_name'].' '.
                      $info['last_name']?>" disabled>
                      <input type="hidden" name="eid" value="<?php echo $id?>">
                    </div>
                  </div><br>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Position</label>
                    <div class="col-md-8">
                     <input type="text" name="tname" class="form-control" value="<?php echo $info['pos_name']?>" disabled>
                    </div>
                  </div><br>
                  
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Department</label>
                      <div class="col-md-8">
                        <input type="text" name="tname" class="form-control" value="<?php echo $info['dept_name']?>" disabled>
                    </div>
                  </div><br>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Date </label>
                      <div class="col-md-8">
                        <input type="text" name="tname" class="form-control" value="<?php echo $info['date']?>" disabled>
                    </div>
                  </div><br>
                  
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Facility:</label>
                      <div class="col-md-8">
                        <select class="fal form-control" name="facility" >
                            <option value="">Select Facility</option>
                          <?php 
            $sql = "SELECT * FROM facility WHERE status = 'Available'";
            $res = $db->query($sql);
            $fac = $res->fetch_assoc();
            $row = $res->num_rows;
            if($row>0){
                        do{  ?>
                        
<option value="<?php echo $fac['name_of_room'] ?>"><?php echo $fac['name_of_room']?></option>
                            <?php }while($fac = $res->fetch_assoc()); } ?>
                             <option value="others">Others</option>
                        </select>
                    </div>
                    </div><br>
                    
                    <div class="form-group row">
                    <label class="col-form-label col-md-4">Facility Image</label>
                      <div class="pic col-md-8">
                       
                    </div>
                  </div><br>
                  
                     
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="setorient" class="btn btn-primary text-white">Submit</button>
                      <a href="orientation_sched.php" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
                    </div>
                  </div><br>
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
        $(document).ready(function()
        {

            $(".fal").change(function(){
              var room_name = $(this).val();
              $.ajax({
                url:"facility.php",
                method: "POST",
                data:{room_name:room_name},
                dataType:"text",
                success:function(data){
                  $(".pic").html(data);
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
