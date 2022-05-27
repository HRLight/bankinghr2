<?php
  $page_title = 'Edit Subject';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);

   

?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->

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
  $conid = mysqli_real_escape_string($conn, $_GET['id']);

  $query = mysqli_query($conn, "SELECT * FROM emp_questionaires WHERE question_id = {$conid}");
  $row = mysqli_fetch_array($query);
  ?>
  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-primary"><i class="bi bi-plus"></i> Edit Question</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="hr2-codes.php" method="POST">
               
                <div class="form-group row">
                  <label class="col-form-label col-md-2">Question</label>
                    <div class="col-md-10">
                      <input type="text" name="question" class="form-control" value="<?php echo $row['question'];?>">
                    </div>
                  </div> <br>
                   <div class="form-group row">
                  <label class="col-form-label col-md-2">Answer</label>
                    <div class="col-md-10">
                      <input type="hidden" name="page" value="<?php echo $_GET['page']?>">
                      <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
                      <input type="text" name="answer" class="form-control" value="<?php echo $row['answer'];?>">
                    </div>
                  </div> <br>
                  <div class="form-group row">
                  <label class="col-form-label col-md-2">Option 1</label>
                    <div class="col-md-10">
                  
                      <input type="text" name="opt1" class="form-control" value="<?php echo $row['option1'];?>">
                    </div>
                  </div> <br>
                  <div class="form-group row">
                  <label class="col-form-label col-md-2">Option 2</label>
                    <div class="col-md-10">
                  
                      <input type="text" name="opt2" class="form-control" value="<?php echo $row['option2'];?>">
                    </div>
                  </div> <br>
                   <div class="form-group row">
                  <label class="col-form-label col-md-2">Option 3</label>
                    <div class="col-md-10">
                  
                      <input type="text" name="opt3" class="form-control" value="<?php echo $row['option3'];?>">
                    </div>
                  </div> <br>
                    
                 
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="editempques" class="btn btn-primary text-white">Submit</button>
                      <a href="<?php echo $_GET['page']?>"  class="btn btn-secondary text-white">Back</a>
                     
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include_once('layouts/footer.php'); ?>
