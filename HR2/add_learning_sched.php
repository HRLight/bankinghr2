<?php
require_once('includes/load.php');

page_require_level(2);



if(isset($_POST['add_sched'])){

  $title = $db->escape($_POST['title']);
  $date = date('Y-m-d',strtotime($_POST['startdate']));
   $enddate = date('Y-m-d',strtotime($_POST['enddate']));
  
  $time = $_POST['time'];
  $budget= $_POST['budget'];
  $location = $_POST['loc'];
  $ext = 'no';
  if($location == 'others'){
    $location = $db->escape($_POST['loca']);
    $ext = 'yes';
  }
  

 $sql = "INSERT INTO seminar_sched (title,date,enddate,time,location,status,external,budget) VALUES ('$title','$date','$enddate','$time','$location','manager approval','$ext','$budget')";
  if($db->query($sql)){

      $sql = "SELECT seminar_id FROM seminar_sched WHERE title = '$title'";
      $res = $db->query($sql);
      $id = $res->fetch_assoc();
      $id = $id['seminar_id'];
      if($db->query($sql)){

    foreach($_POST['emp'] as $em){
     
      $sql = "INSERT INTO seminar_participants (employee_id,seminar_id) VALUES";
      $sql .= " ('$em','$id')";
      $res = $db->query($sql);
    }

    $sql = "INSERT INTO learning_schedule_approval (seminar_id,status) VALUES ('$id','pending')";
    if($db->query($sql)){

  $_SESSION['status'] =  "Schedule Added";
  $_SESSION['status_code'] =  "success";
   redirect('learning_schedules.php',false);
 }
 }
   
    }
    
  }
  


 include_once('layouts/header.php'); 

 ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  
  <a href="learning_schedules.php" class="breadcrumbs__item">Back</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Add new Schedule</a>
</nav>
<!-- /Breadcrumb -->

  <div class="row">
    <?php echo display_msg($msg); ?>
  

<div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-primary"><i class="bi bi-plus"></i> Add Schedule</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="add_learning_sched.php" method="POST">
                <div class="container">
                  <div class="col-md-8 mx-auto">

                <div class="form-group row">
                  <label class="col-form-label col-md-4">Title</label>
                    <div class="col-md-8">
                     
                      <input type="text" name="title" class="form-control" required>
                    </div>
                  </div><br>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Participants</label>
                    <div class="col-md-8">
                     <select name="emp[]" class="form-control" multiple>
                       <?php 
              $sql = "SELECT * FROM employees WHERE employee_id != '1'";
              $res = $db->query($sql);
              $emp = $res->fetch_assoc();
              do{ ?>
  <option value="<?php echo $emp['employee_id'] ?>"><?php echo $emp['employee_id'].' - '.$emp['first_name'].' '.$emp['last_name']?></option>

             <?php }
              while($emp = $res->fetch_assoc());

              ?>
                       
                     </select>
                     
                    </div>
                  </div><br>
                  
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Start Date:</label>
                      <div class="col-md-8">
                        <input type="date" name="startdate" min="<?php echo date('Y-m-d')?>" class="form-control">
                    </div>
                  </div><br>

                    <div class="form-group row">
                    <label class="col-form-label col-md-4">End Date:</label>
                      <div class="col-md-8">
                        <input type="date" name="enddate" min="<?php echo date('Y-m-d')?>" class="form-control">
                    </div>
                  </div><br>


                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Time:</label>
                      <div class="col-md-8">
                        <input type="time" name="time" class="form-control">
                    </div>
                  </div><br>
                  
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Facility:</label>
                      <div class="col-md-8">
                        <select class="fal form-control" name="loc" >
                            <option value="">Select Facility</option>
                          <?php 
            $sql = "SELECT * FROM facility WHERE status = 'Available'";
            $res = $db->query($sql);
            $row = $res->num_rows;
            $fac = $res->fetch_assoc();
            if($row>0){
                        do{  ?>
                        
<option value="<?php echo $fac['name_of_room'] ?>"><?php echo $fac['name_of_room']?></option>
                            <?php }while($fac=$res->fetch_assoc()); } ?>
                            <option value="others">Others</option>
                        </select>
                    </div>
                    </div><br>
                    
                    
                    
                    <div class="form-group row">
                    <label class="col-form-label col-md-4">Facility Image</label>
                      <div class="pic col-md-8">
                       
                    </div>
                  </div><br>

                       <div class="form-group row">
                    <label class="col-form-label col-md-4">Budget </label>
                      <div class="col-md-8">
                        <input type="number" name="budget"  class="form-control" placeholder="Add budget ">
                    </div>
                  </div><br>
                  
                     
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                       <button type="submit" name="add_sched" class="btn btn-primary">Add Schedule</button>
                      <a href="learning_schedules.php" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
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