<?php
  $page_title = 'Add Question';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   ?>

<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
 
   <a href="hr_emp_exams.php" class="breadcrumbs__item">Back</a>
 
  <a href="#checkout" class="breadcrumbs__item is-active">Add Question</a>
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
        <span class="badge rounded-pill bg-primary"><i class="bi bi-plus"></i> Add Question</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="hr2-codes.php" method="POST">
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Question</label>
                      <div class="col-md-8">
                        <input type="hidden" name="page" value="<?php echo $_GET['page'] ?>">
                        <input type="text" name="que" class="form-control" placeholder="Input Question" required>
                    </div>
                  </div> <br>
                  
                   <div class="form-group row">
                    <label class="col-form-label col-md-4">Option 1</label>
                      <div class="col-md-8">
                        <input type="text" name="opt1" class="form-control" placeholder="Input Choice 1"  required>
                    </div>
                  </div> <br>
                   <div class="form-group row">
                    <label class="col-form-label col-md-4">Option 2</label>
                      <div class="col-md-8">
                        <input type="text" name="opt2" class="form-control" placeholder="Input Choice 2"  required>
                    </div>
                  </div> <br>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Option 3</label>
                      <div class="col-md-8">
                        <input type="text" name="opt3" class="form-control" placeholder="Input Choice 3"  required>
                    </div>
                  </div> <br>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Answer</label>
                      <div class="col-md-8">
                        <input type="text" name="ans" class="form-control" placeholder=" Answer Key Must Be One Of the 3 Choices"  required>
                    </div>
                  </div> <br>
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
                  
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="addempques" class="btn btn-primary text-white">Submit</button>
                      <a href="<?php echo $_GET['page']?>" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
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

