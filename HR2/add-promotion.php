<?php
  $page_title = 'Add Promotion';
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

  <a href="succession-promotion.php" class="breadcrumbs__item">Promotion</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Add Promotion</a>
</nav>
<!-- /Breadcrumb -->

<!-- Data table start -->
<div class="row">
  <!-- Notification div -->
  
  <!-- End Notification div -->

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-primary"><i class="bi bi-plus"></i> Add Promotion</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="hr2-codes.php" method="POST">
                <div class="form-group row">
                    <label class="col-form-label col-md-4">Department</label>
                      <div class="col-md-8">
                        <select class="dept form-control" name="dept" required>
                          <option value="">Select Department</option>
                        <?php 
                        $sql = "SELECT * FROM departments";
                        $res = $db->query($sql);
                        $dept = $res->fetch_assoc();

                        do{
                         ?>

                          <option value=<?php echo $dept['dept_id']?>><?php echo ucwords($dept['dept_name'])?></option>
                          <?php }while($dept=$res->fetch_assoc()); ?>
                        </select>
                    </div>
                  </div> <br>
                   <div class="form-group row">
                    <label class="col-form-label col-md-4">Position</label>
                      <div class="col-md-8">
                        <select  name="pos" class="jt form-control"  required>
                        </select>
                    </div>
                  </div>
                  <br>

                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Employee</label>
                    <div class="col-md-8">
                     <select name="emp" class="emp form-control" >
                       
                     </select>
                     
                    </div>
                  </div><br>
                  

                
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="add_promoted" class="btn btn-primary text-white">Submit</button>
                      <a href="succession-promotion.php" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
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

            $(".dept").change(function(){
              var dept_id = $(this).val();
              $.ajax({
                url:"positions.php",
                method: "POST",
                data:{dept_id:dept_id},
                dataType:"text",
                success:function(data){
                  $(".jt").html(data);
                }
              });
            });
    });

         $(document).ready(function()
        {

            $(".jt").change(function(){
              var pos_id = $(this).val();
              $.ajax({
                url:"prom_list.php",
                method: "POST",
                data:{pos_id:pos_id},
                dataType:"text",
                success:function(data){
                  $(".emp").html(data);
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

