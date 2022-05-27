<?php
  $page_title = 'Evaluate Seminar';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $row=Recievables();
   $id = $db->escape($_GET['id']);
   $eid = $db->escape($_GET['eid']);
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
 
    <a href="seminar_participants.php" class="breadcrumbs__item">Back</a>
 
   <a href="#" class="breadcrumbs__item is-active">Evaluation</a>
  
  
</nav>
<!-- /Breadcrumb -->

<!-- Data table start -->
<div class="row">
  <!-- Notification div -->
 
  <!-- End Notification div -->

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-primary"><i class="bi bi-file-post"></i> Seminar Evaluation</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="hr2-codes.php" method="POST">
                <div class="container">
                  <div class="col-md-8 mx-auto">

                <div class="form-group row">
                  <label class="col-form-label col-md-4">Quantity of work</label>
                    <div class="col-md-2">
                     <div class="input-group">
                     <input type="number" min="0" max="100" name="qw" class="form-control" required><h5>%</h5>
                   </div>
                    </div>
                  </div><br>
                 
                  
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Quality of work</label>
                      <div class="col-md-2">
                        <div class="input-group">
                        <input type="hidden" name="t_id" value="<?php echo $id?>">
                        <input type="hidden" name="e_id" value="<?php echo $eid?>">
                       <input type="number" min="0" max="100" name="qual" class="form-control" required><h5>%</h5>
                     </div>
                    </div>
                  </div><br>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Job knowledge</label>
                      <div class="col-md-2">
                      <div class="input-group">
                     <input type="number" min="0" max="100" name="jk" class="form-control" required><h5>%</h5>
                       </div>
                     </div>
                   </div><br>
                 
                   <div class="form-group row">
                    <label class="col-form-label col-md-4">Initiative</label>
                      <div class="col-md-2">
                        <div class="input-group">
                        <input type="number" min="0" max="100" name="init" class="form-control" required><h5>%</h5>
                      </div>
                    </div>
                  </div><br>

                   <div class="form-group row">
                    <label class="col-form-label col-md-4">Dependability</label>
                      <div class="col-md-2">
                        <div class="input-group">
                        <input type="number" min="0" max="100" name="dep" class="form-control" required><h5>%</h5>
                      </div>
                    </div>
                  </div><br>

                   <div class="form-group row">
                    <label class="col-form-label col-md-4">Adaptability</label>
                      <div class="col-md-2">
                        <div class="input-group">
                        <input type="number" min="0" max="100" name="adap" class="form-control" required><h5>%</h5>
                      </div>
                    </div>
                  </div><br>
                  
                 
                    

                     
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="evalsr" class="btn btn-primary text-white">Submit</button>
                      <a href="seminar_participants.php" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
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

<?php include_once('layouts/footer.php'); ?>
