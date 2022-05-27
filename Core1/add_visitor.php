<?php
  $page_title = 'Housing Loan';
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

  $house_id =$i;
  $L_name = remove_junk($db->escape($_POST['l-name']));
  $F_name = remove_junk($db->escape($_POST['f-name']));
  $M_name = remove_junk($db->escape($_POST['m-name']));
  $L_amount = remove_junk($db->escape($_POST['l-amount']));
  $L_term = remove_junk($db->escape($_POST['l-term']));
  $sex = remove_junk($db->escape($_POST['gender']));
  $civil_status = remove_junk($db->escape($_POST['civil-status']));
  $perma_address = remove_junk($db->escape($_POST['per_address']));
  $d_birth = remove_junk($db->escape($_POST['date']));
  $p_birth = remove_junk($db->escape($_POST['birth_place']));
  $m_number = remove_junk($db->escape($_POST['number']));  
  $e_address = remove_junk($db->escape($_POST['email']));
  $tin_sss_gsis_no = remove_junk($db->escape($_POST['tin-sss-gsis-no']));
  $source_income = remove_junk($db->escape($_POST['source-income']));
  $monthly_income = remove_junk($db->escape($_POST['m-income']));
  $employeer_name = remove_junk($db->escape($_POST['e-name']));
  $position = remove_junk($db->escape($_POST['position']));
  $companyname = remove_junk($db->escape($_POST['companyname']));
  $bankname = remove_junk($db->escape($_POST['bankname']));
  $accountnum = remove_junk($db->escape($_POST['accountnum']));
  $firstid = remove_junk($db->escape($_POST['firstid']));
  $secondid = remove_junk($db->escape($_POST['secondid']));
  $thirdid = remove_junk($db->escape($_POST['thirdid']));
  
  
   if(empty($errors)){
      $sql  = "INSERT INTO `mortgages`( `ref_no`, `loan_amount`, `loan_terms`,`fname`, `mname`, `lname`, `sex`, `civil_status`,`perma_address`, `date_0f_birth`, `place_of_birth`, `mobile_no`, `email_address`, `tin_sss_gsis_no`, `source_of_income`, `monthly_income`, `employeer_name`,`position`,`companyname`,`bankname`,`accountnum`, `firstid`, `secondid`, `thirdid`) VALUES ('$house_id','$L_amount','$L_term','$F_name','$M_name','$L_name','$sex','$civil_status','$perma_address','$d_birth','$p_birth','$m_number','$e_address','$tin_sss_gsis_no','$source_income','$monthly_income','$employeer_name','$position','$companyname','$bankname','$accountnum','$firstid','$secondid','$thirdid')";
      
   
      if($db->query($sql)){
        $session->msg("s", "Thankyou! Your submission has been sent.");
        redirect('add_visitor.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('add_visitor.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('add_visitor.php',false);
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
            <th colspan="5"> Housing Application Form</th>
          </tr>
         </thead>
          <tbody>
            <tr>
              <td colspan="1"><label>Last Name:</label> <input type="text" name="l-name" id="formControlLg" class="form-control form-control-lg" placeholder="Last Name" required/> </td>
              <td colspan="2"><label>Frist Name:</label>  <input type="text" name="f-name" id="formControlLg" class="form-control form-control-lg" placeholder="First Name" required /></td>
              <td><label>Middle Name:</label><input type="text"  name="m-name" id="formControlLg" class="form-control form-control-lg" placeholder="Middle Name" required /></td>
            </tr>

              <tr>
              <td><label>Loan Amount:</label><input type="number"  name="l-amount" id="formControlLg" class="form-control form-control-lg" placeholder="Loan Amount" required /></td>

              <td><label>Loan Term</label>
                <select   name="l-term" class="form-control  form-control-lg">
                          <option>Select</option>
                          <option value="Long Term">Long Term</option>
                          <option value="Short Term">Short Term</option>
                          <option value="Intermediate Term">Intermediate Term</option>
                        </select> 
              </td>

              <td><label>Gender</label>
                <select   name="gender" class="form-control  form-control-lg">
                          <option>Select</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                        </select>
              </td>

              </tr> 
              <tr>
              <td><label>Civil Status:</label>
                  <select name="civil-status" class="form-control  form-control-lg">
                          <option>Select</option>
                          <option value="single">Single</option>
                          <option value="married">Married</option>
                          <option value="divorsed">Divorsed</option>
                          <option value="common_law">Common-Law</option>
                        </select>
              </td>


              <td colspan="2"><label> Permanent address :</label>
              <input type="text" id="formControlLg" name="per_address" class="form-control form-control-lg" placeholder="Full Address" required />
              </td>

              <td> <label>Birth Date:</label>

                <input type="date" name="date" class="form-control form-control-lg" />
                   </td>

              <td><label>Birth Place:</label>
                <input type="text" id="formControlLg" name="birth_place" class="form-control form-control-lg" placeholder="Birth Place" required /></td>
            </tr>

            <tr>
            <td colspan="2"><label>Mobile no/s:
            </label><input type="number" name="number" id="formControlLg" class="form-control form-control-lg" placeholder="+63" required /></td>

            <td colspan="2"><label>Emails Address:</label><input type="email" name="email" id="formControlLg" class="form-control form-control-lg" placeholder="email@gmail.com" required /></td>

            <td colspan="2"><label>Tin/Sss/Gsis no#:
            </label><input type="number" name="tin-sss-gsis-no" id="formControlLg" class="form-control form-control-lg" placeholder="Tin/Sss/Gsis no#" required /></td>
            </tr>

              <td><label>Source of Income:</label>
                  <select name="source-income" class="form-control  form-control-lg">
                          <option>Select</option>
                          <option value="Business">Business</option>
                          <option value="Employment">Employment</option>
                        </select>
              </td>

              <td><label>Monthly Income:</label> <input type="text" name="m-income" id="formControlLg" class="form-control form-control-lg" placeholder="Monthly Income" required /></td>

              <td><label>Employer Name:</label> <input type="text" name="e-name" id="formControlLg" class="form-control form-control-lg" placeholder="Employer Name" required /></td>

              <td><label>Position:</label> <input type="text" name="position" id="formControlLg" class="form-control form-control-lg" placeholder="Position in Work" required /></td>
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
                 <h5><label style="color: red ;"> *Please upload 2 to 3 Valid ID for verification. </label> <br></h5>
                </td>
              </tr>
              <tr>
                <td>
                 <label style="color: red ;"> *Please upload your ID here. </label> <br>
                </td>
              <td colspan="2"><span>Please upload your ID picture</span> <input type="file" name="firstid" id="formControlLg" class="form-control form-control-lg" required /></td>
              </tr>
              <tr>
                <td>
                 <label style="color: red ;"> *Please upload your ID here. </label> <br>
                </td>
              <td colspan="2"><span>Please upload your ID picture</span> <input type="file" name="secondid" id="formControlLg" class="form-control form-control-lg" required /></td>
              </tr>
              <tr>
                <td>
                 <label style="color: red ;"> *Please upload your ID here. </label> <br>
                </td>
              <td colspan="2"><span>Please upload your ID picture</span> <input type="file" name="thirdid" id="formControlLg" class="form-control form-control-lg" required /></td>
            </tr>


         </thead>
          </tbody>          
        </table>
           <button type="submit" class="submit" name="add_vis">Apply Now!</button>
          </form>
          <br><br><br><br>

</section>


      
    </div>
  
  </body>
</html>

<?php include_once('layouts/footer.php'); ?>
