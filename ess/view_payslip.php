<?php
  $page_title = 'Payslips';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   $id = $_GET['id'];

   $sql = "SELECT payslips.*,employees.*,positions.*,departments.* FROM payslips JOIN employees ON payslips.employee_id = employees.employee_id JOIN positions ON employees.pos_id = positions.pos_id JOIN departments ON employees.dept_id = departments.dept_id WHERE payslips.employee_id = '$id'";
   $res = $db->query($sql);
   $info = $res->fetch_assoc();
?>
<?php include_once('layouts/user_header.php'); ?>

 <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <a href="payslip.php" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Back</a>
      </div>
      <div class="card-body">

        <form>
          <div class="form-group row">
                    <label class="col-form-label col-md-4">Name</label>
                    <div class="col-md-8">
                      <input type="text" name="add_pdate" class="form-control" value="<?php echo $info['first_name'].' '.$info['last_name'] ?>" disabled>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label class="col-form-label col-md-4">Position</label>
                    <div class="col-md-8">
                      <input type="text" name="add_pdate" class="form-control" value="<?php echo $info['pos_name'] ?>" disabled>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label class="col-form-label col-md-4">Department</label>
                    <div class="col-md-8">
                      <input type="text" name="add_pdate" class="form-control" value="<?php echo $info['dept_name'] ?>" disabled>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label class="col-form-label col-md-4">Salary Date</label>
                    <div class="col-md-8">
                      <input type="text" name="add_pdate" class="form-control" value="<?php echo $info['pay_date'] ?>" disabled>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label class="col-form-label col-md-4">Cut-off start</label>
                    <div class="col-md-8">
                      <input type="text" name="add_pdate" class="form-control" value="<?php echo $info['cut_start'] ?>" disabled>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label class="col-form-label col-md-4">Cut-off end</label>
                    <div class="col-md-8">
                      <input type="text" name="add_pdate" class="form-control" value="<?php echo $info['cut_end'] ?>" disabled>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label class="col-form-label col-md-4">Total Hours work</label>
                    <div class="col-md-8">
                      <input type="text" name="add_pdate" class="form-control" value="<?php echo $info['total_work'] ?>" disabled>
                    </div>
                  </div>

 <div class="form-group row">
                    <label class="col-form-label col-md-4">Gross pay</label>
                    <div class="col-md-8">
                      <input type="text" name="add_pdate" class="form-control" value="<?php echo $info['gross'] ?>" disabled>
                    </div>
                  </div>

 <div class="form-group row">
                    <label class="col-form-label col-md-4">SSS Deduction</label>
                    <div class="col-md-8">
                      <input type="text" name="add_pdate" class="form-control" value="<?php echo $info['sss'] ?>" disabled>
                    </div>
                  </div>

 <div class="form-group row">
                    <label class="col-form-label col-md-4">Philhealth Deduction</label>
                    <div class="col-md-8">
                      <input type="text" name="add_pdate" class="form-control" value="<?php echo $info['phil'] ?>" disabled>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label class="col-form-label col-md-4">Pag-ibig Deduction</label>
                    <div class="col-md-8">
                      <input type="text" name="add_pdate" class="form-control" value="<?php echo $info['pagibig'] ?>" disabled>
                    </div>
                  </div>

 <div class="form-group row">
                    <label class="col-form-label col-md-4">Tax Deduction</label>
                    <div class="col-md-8">
                      <input type="text" name="add_pdate" class="form-control" value="<?php echo $info['tax'] ?>" disabled>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label class="col-form-label col-md-4">Net Pay</label>
                    <div class="col-md-8">
                      <input type="text" name="add_pdate" class="form-control" value="<?php echo $info['net'] ?>" disabled>
                    </div>
                  </div>





        </form>
        
        
        </div>
      </div>
    </div>
  </div>


<?php include_once('layouts/user_footer.php'); ?>