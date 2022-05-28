 <?php include('includes/load.php'); 

$id = $_GET['id'];
include('layouts/user_header.php');?>




<div class="container-fluid">

 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add DTR</h6>
                        
                        <div class="float-right">
                             <a href="dtr.php" class="btn btn-secondary btn-xs-block" type="button">
         <i class="fas fa-fw fa-arrow-left"></i>
          BACK
         </a>
     </div>
                        </div>
                        <div class="card-body">
                            <div class="col-lg-6 mx-auto">
                             <form class="user" method="POST" action="process.php">
                                <div class="form-group row">
                                  
                                        <label class="col-form-label col-md-4">Time In</label>
                                         <div class="col-md-8">
                                        <input type="time" name="time_in" class="form-control form-control-user"
                                            placeholder="Time IN" required>
                                            <input type="hidden" name="id" value="<?php echo $id ?>">
                                
                                </div>
                                    
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4"> Time Out</label>
                                     <div class="col-md-8">
                                        <input type="time" name="time_out" class="form-control form-control-user"
                                            placeholder="Time OUT" required>
                                    </div>
                                     </div>


                                <div class="form-group row">
                                    <label class="col-form-label col-md-4"> Date</label>
                                  <div class="col-md-8">
                                        <input type="date" name="date" class="form-control form-control-user"
                                            placeholder="Date" required>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-form-label col-md-4">Purpose</label>
                                  <div class="col-md-8">
                                       
                                            <select id="purpose" name="purpose" class="form-control"> 
                                                <option class="form-control " value="">Select</option>
                                                   <option class="form-control" value="">Break time</option>
                                                    <option class="form-control" value="Over Time">Over time</option>
                                            </select>
                                    </div>
                                </div>

                                <button type="submit" style="width: 65%; float: right;" name="add_dtr" class="btn btn-primary btn-user btn-block">
                                    Submit
                                </button>
                               
                            </form>
                            <div class="col-lg-12">
                        </div>
                    </div>



</div>










<?php include('layouts/user_footer.php'); ?>