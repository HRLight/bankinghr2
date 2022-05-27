 <?php include('includes/load.php'); 


include('layouts/user_header.php');?>

<div class="container-fluid">

 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">File Reimbursment</h6>
                        
                        <div class="float-right">
                             <a href="reimbursements.php" class="btn btn-secondary btn-xs-block" type="button">
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
                                        <label>Purpose</label>
                                        <input type="hidden" name="name" value="<?php echo $name = $user['first_name'].' '.$user['last_name']; ?>" 
                                            required>
                                        <input type="text" name="purpose" class="form-control "
                                            required>
                                          
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label>Supplier</label>
                                      
                                        <input type="text" name="supp" class="form-control "
                                            required>
                                          
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label>Address</label>
                                        
                                        <input type="text" name="add" class="form-control "
                                            required>
                                          
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label>City</label>
                                        
                                        <input type="text" name="city" class="form-control "
                                            required>
                                          
                                    </div>
                                    
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label>Amount</label>
                                       
                                        <input type="text" name="amount" class="form-control "
                                            required>
                                          
                                    </div>
                                    
                                </div>



                                
                               


                                <button type="submit" name="file_reimburs" class="btn btn-primary btn-user btn-block">
                                    Submit
                                </button>
                               
                            </form>
                           
                        </div>
                    </div>



</div>

<?php include('layouts/user_footer.php'); ?>