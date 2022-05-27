<?php
  $page_title = 'Leave';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
 
?>
<?php include_once('layouts/user_header.php'); ?>

 <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <div class="card-header">
        <a href="leave.php" class="btn btn-secondary"><i class="fas fa-fw fa-arrow-left"></i>Back</a>
      </div>
      </div>
      <div class="card-body">
       <div class="col-lg-6 mx-auto">
                             <form class="user" method="POST" action="process.php">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label>Leave Type</label>
                                        <input type="hidden" name="id" value="<?php echo $user['employee_id']; ?>" 
                                            required>
                                        <select type="text" name="leave_type" class="form-control "
                                            required>
                                            <option value="">Select Leave Type</option>
                                            <option value="maternity">Maternity Leave</option>
                                            <option value="paternity">Paternity Leave</option>
                                            <option value="sick">Sick Leave</option>
                                            <option value="vacation">Vacation Leave</option>
                                            <option value="bereavement">Bereavement Leave</option>
                                            <option value="emergency">Emergency Leave</option>
                                            
                                          </select>
                                          
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label>Date Start</label>
                                      
                                        <input type="date" min="<?php echo date('Y-m-d') ?>" name="date_start" class="form-control "
                                            required>
                                          
                                    </div>
                                </div>
                                
                               



                                
                               


                                <button type="submit" name="file_leave" class="btn btn-primary btn-user btn-block">
                                    Submit
                                </button>
                               
                            </form>
        </div>
      </div>
    </div>
  </div>


<?php include_once('layouts/user_footer.php'); ?>