<?php

include_once('includes/load.php');


include_once('header.php');?>

<div class="container">
  
    <div class="card col-md-5 h-100 mt-5 mx-auto" >
        <div class="card-header bg-secondary text-white text-center">
        <h4>Visitor Portal</h4>
        </div>
      <div class="card-body py-10">
          <form method="POST" action="process.php">
             <div class="form-group">
                    <h6>Input Reference number to time out</h6>
                </div>
                <div class="form-group">
                    <label for="title">Reference No.</label>
                    <input type="text" class="form-control" name="refi" placeholder=" Reference No." required>
                </div>
                <div class="form-group mt-3 mx-auto">
                    <button type="submit" name="out" class="btn btn-primary mx-auto"<i class="bi bi-file-post"></i>Submit</button>
                     <a href="index.php"class="btn btn-secondary mx-auto"<i class="bi bi-file-post"></i>Back</a>
                </div>
                
          </form>
      </div>
      

    </div>
  </div>


 
</div>
<?php include_once('footer.php');?>

