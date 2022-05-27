<?php
  $page_title = 'Loan Restructuring';
// Include config file
require_once('includes/load.php');
function generatekey(){
  $keyLenght=8;
  $str="1234567890";
  $randStr=substr(str_shuffle($str),0,$keyLenght);
  return $randStr;
}
$i=generatekey();
?>

<?php
 if(isset($_POST['add_vis'])){

  $id =$i;
  $tin = remove_junk($db->escape($_POST['tin']));
  $firstname = remove_junk($db->escape($_POST['firstname']));
  $middlename = remove_junk($db->escape($_POST['middlename']));
  $lastname = remove_junk($db->escape($_POST['lastname']));
  $birthdate = remove_junk($db->escape($_POST['birthdate']));
  $gender = remove_junk($db->escape($_POST['gender']));
  $permaadd = remove_junk($db->escape($_POST['permaadd']));
  $cnumber = remove_junk($db->escape($_POST['cnumber']));
  $emailadd = remove_junk($db->escape($_POST['emailadd']));
  $employeername = remove_junk($db->escape($_POST['employeername']));
  $employeeradd = remove_junk($db->escape($_POST['employeeradd']));
  $companyname = remove_junk($db->escape($_POST['companyname']));
  $bankname = remove_junk($db->escape($_POST['bankname']));
  $accountnum = remove_junk($db->escape($_POST['accountnum']));
  $validid = remove_junk($db->escape($_POST['validid']));
  $soa = remove_junk($db->escape($_POST['soa']));
  $loa = remove_junk($db->escape($_POST['loa']));
 
  
   if(empty($errors)){
      $sql  = "INSERT INTO `loan_restructuring`(`id`,`tin`, `firstname`, `middlename`, `lastname`, `birthdate`,`gender`, `permaadd`, `cnumber`, `emailadd`, `employeername`, `employeeradd`,`companyname`, `bankname`, `accountnum`, `validid`, `soa`, `loa`) VALUES ('$id','$tin','$firstname','$middlename','$lastname','$birthdate','$gender','$permaadd','$cnumber','$emailadd','$employeername','$employeeradd','$companyname','$bankname','$accountnum','$validid','$soa','$loa')";
      
   
      if($db->query($sql)){
        $session->msg("s", "Thankyou! Your submission has been sent.");
        redirect('restructform.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('restructform.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('restructform.php',false);
   }
 }
?>

<?php include_once('layouts/header.php'); ?>
  <?php echo display_msg($msg); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>

<section class="content">

  <!--Appplication Form -->
    <div class="applcation_form">

         <form method="POST">

         <table class="table table-bordeless">
         </table>

        <table class="table table-bordeless">
          <thead class="thead-dark">
            <!-- Start OF Application Form-->
          <tr>
            <th colspan="5"> Restructuring Application Form</th>
          </tr>
         </thead>
          <tbody>
            <tr>
              
              <td><label>Tax Identification Number:</label><input type="number"  name="tin" id="formControlLg" class="form-control form-control-lg" placeholder="Enter TIN" required /></td>
            </tr>

              <tr>
              <td colspan="1"><label>First Name:</label> <input type="text" name="firstname" id="formControlLg" class="form-control form-control-lg" placeholder="First Name" required/> </td>

              <td colspan="1"><label>Middle Name:</label> <input type="text" name="middlename" id="formControlLg" class="form-control form-control-lg" placeholder="Middle Name" required/> </td>


              <td colspan="1"><label>Last Name:</label> <input type="text" name="lastname" id="formControlLg" class="form-control form-control-lg" placeholder="Last Name" required/> </td>
              </tr>

              <tr>
              <td> <label>Birth Date:</label>
              <input type="date" name="birthdate" class="form-control form-control-lg" />
              </td>

              <td><label>Gender:</label>
                <select   name="gender" class="form-control  form-control-lg">
                          <option>Select</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                        </select>
                </td>
                </tr>

              <tr>
              <td colspan="2"><label> Permanent address :</label>
              <input type="text" id="formControlLg" name="permaadd" class="form-control form-control-lg" placeholder="Full Address" required />
              </td>
            
            <td colspan="2"><label>Mobile no/s:
            </label><input type="number" name="cnumber" id="formControlLg" class="form-control form-control-lg" placeholder="+63" required /></td>
            </tr>

            <td colspan="1"><label>Emails Address:</label><input type="email" name="emailadd" id="formControlLg" class="form-control form-control-lg" placeholder="email@gmail.com" required /></td>

            <td colspan="1"><label>Employeer Name:</label>  <input type="text" name="employeername" id="formControlLg" class="form-control form-control-lg" placeholder="Employeer Name" required /></td>

            <td colspan="2"><label>Employeer Address:</label>  <input type="text" name="employeeradd" id="formControlLg" class="form-control form-control-lg" placeholder="Employeer Address" required /></td>
            </tr>

             <tr>
                <td>
                 <label style="color: red ;"> *For Verification please provide your bank details. </label> <br>
                </td>
                </tr>
              <td colspan="2"><label>Company Name:</label>  <input type="text" name="companyname" id="formControlLg" class="form-control form-control-lg" placeholder="Company Name" required /></td>

              <td colspan="2"><label>Bank Name:</label>  <input type="text" name="bankname" id="formControlLg" class="form-control form-control-lg" placeholder="Bank Name" required /></td>

              <td><label>Account Number:</label><input type="number"  name="accountnum" id="formControlLg" class="form-control form-control-lg" placeholder="Account Number" required /></td>
            </tr>
            <tr>
                <td>
                 <h5><label style="color: red ;"> *Please upload Document Requirements. </label> <br></h5>
                </td>
              </tr>
              <tr>
                <td>
                 <label style="color: red ;"> *Please upload your Valid ID here. </label> <br>
                </td>
              <td colspan="2"><span>Please upload your Valid ID picture</span> <input type="file" name="validid" id="formControlLg" class="form-control form-control-lg" required /></td>
              </tr>
              <tr>
                <td>
                 <label style="color: red ;"> *Please upload your Statement of account here. </label> <br>
                </td>
              <td colspan="2"><span>Please upload your SOA</span> <input type="file" name="soa" id="formControlLg" class="form-control form-control-lg" required /></td>
              </tr>
              <tr>
                <td>
                 <label style="color: red ;"> *Please upload your Letter of Authority here. </label> <br>
                </td>
              <td colspan="2"><span>Please upload your Letter of Autorithy</span> <input type="file" name="loa" id="formControlLg" class="form-control form-control-lg" required /></td>
            </tr>
              
         </thead>
          </tbody>          
        </table>
           <button type="submit" class="submit" name="add_vis"> &nbsp; Apply Now! &nbsp; </button>
          </form>
          <br><br><br><br>

</section>


      
    </div>
  
  </body>
</html>

<?php include_once('layouts/footer.php'); ?>
