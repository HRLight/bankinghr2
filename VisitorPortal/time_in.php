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
                    <label for="title">First Name</label>
                    <input type="text" class="form-control" name="fname" placeholder=" First Name" required>
                </div>
                <div class="form-group">
                    <label for="title">Middle Name</label>
                    <input type="text" class="form-control" name="mname" placeholder=" Middle Name" required>
                </div>
                <div class="form-group">
                    <label for="title">Last Name</label>
                    <input type="text" class="form-control" name="lname" placeholder=" Last Name" required>
                </div>
                <div class="form-group">
                    <label for="title">Department</label>
                    <input type="text" class="form-control" name="dept" placeholder=" Department" required>
                </div>
                <div class="form-group">
                    <label for="title">Email</label>
                    <input type="email" class="form-control" name="email" placeholder=" E-mail" required>
                </div>
                <div class="form-group">
                    <label for="title">Address</label>
                    <input type="text" class="form-control" name="add" placeholder=" Address" required>
                </div>
                <div class="form-group">
                    <label for="title">Contact Number</label>
                    <input type="text" class="form-control" name="cont" placeholder=" Contact Number" required>
                </div>
                <div class="form-group">
                    <label for="title">Gender</label>
                    <select class="form-control" name="gend" required>
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Fenale</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="title">Visitor Type</label>
                    <input type="text" class="form-control" name="vtype" placeholder=" Visitor Type" required>
                </div>
                <div class="form-group">
                    <label for="title">Visiting Purpose</label>
                    <input type="text" class="form-control" name="vpurp" placeholder=" Visiting Purpose" required>
                </div>
                <div class="form-group mt-3 mx-auto">
                    <button type="submit" name="comein" class="btn btn-primary mx-auto"<i class="bi bi-file-post"></i>Submit</button>
                     <a href="index.php"class="btn btn-secondary mx-auto"<i class="bi bi-file-post"></i>Back</a>
                </div>
                
          </form>
      </div>
      

    </div>
  </div>


 
</div>
<?php include_once('footer.php');?>

