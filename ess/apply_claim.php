 <?php include('includes/load.php'); 

$id = $_GET['id'];
include('layouts/user_header.php');?>




<div class="container-fluid">

 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">File Claim</h6>
                        
                        <div class="float-right">
                             <a href="claims.php" class="btn btn-secondary btn-xs-block" type="button">
         <i class="fas fa-fw fa-arrow-left"></i>
          BACK
         </a>
     </div>
                        </div>
                        <div class="card-body">
                            <div class="col-lg-6 mx-auto">
                             <form class="user" method="POST" action="process.php">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label>Claim Type</label>
                                        <input type="hidden" name="id" value="<?php echo $id ?>">
                                        <select name="c_type" class="form-control "
                                            required>
                                            <option value="">Select Claim Type</option>
                                            <option value="Health Insurance Claim">Health Insurance Claim</option>
                                            <option value="Life Insurance Claim">Life Insurance Claim</option>
                                            <option value="Property Claim">Property Claim</option>
                                            <option value="Casualty Claim">Casualty Claim</option>

                                        </select>
                                    </div>
                                    
                                </div>
                                
                               


                                <div class="form-group row">
                                   <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label>Claiming Date</label>
                                        <input type="date" name="date" class="form-control r"
                                            placeholder="Date" required>
                                    </div>
                                </div>
                                <button type="submit" name="add_claim" class="btn btn-primary btn-user btn-block">
                                    Submit
                                </button>
                               
                            </form>
                            <div class="col-lg-12">
                        </div>
                    </div>



</div>










<?php include('layouts/user_footer.php'); ?>