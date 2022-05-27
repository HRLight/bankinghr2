<?php
  $page_title = 'Resignation';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
 
?>
<?php include_once('layouts/user_header.php'); ?>


<div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <div class="card-header">
        <a href="resignation.php" class="btn btn-secondary"><i class="fas fa-fw fa-arrow-left"></i>Back</a>
      </div>
      </div>
      <div class="card-body">
       <div class="col-lg-6 mx-auto">
                             <form class="user" method="POST" action="process.php">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label>Reason</label>
                                        <input type="hidden" name="id" value="<?php echo $user['employee_id']; ?>" 
                                            required>
                                        <input type="text" name="reason" class="form-control "
                                            required>
                                           
                                          
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label>Date Effective</label>
                                      
                                        <input type="date" min="<?php echo date('Y-m-d') ?>" name="date_eff" class="form-control "
                                            required>
                                          
                                    </div>
                                </div>
                                
                               



                                
                               


                                <button type="submit" name="file_resignation" class="btn btn-primary btn-user btn-block">
                                    Submit
                                </button>
                               
                            </form>
        </div>
      </div>
    </div>
  </div>












<?php include_once('layouts/user_footer.php'); ?>