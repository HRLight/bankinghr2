<?php
  $page_title = 'Personal Loan';
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
  $first_name = remove_junk($db->escape($_POST['f-name']));
  $middle_name = remove_junk($db->escape($_POST['m-name']));
  $last_name = remove_junk($db->escape($_POST['l-name']));
  $birthdate = remove_junk($db->escape($_POST['date']));
  $birth_place = remove_junk($db->escape($_POST['birth_place']));
  $gender = remove_junk($db->escape($_POST['gender']));
  $phone_no = remove_junk($db->escape($_POST['number']));  
  $email = remove_junk($db->escape($_POST['email']));
  $type_of_id = remove_junk($db->escape($_POST['t-id']));
  $id_no = remove_junk($db->escape($_POST['id-no']));
  $perma_address = remove_junk($db->escape($_POST['per_address']));
  $civil_status = remove_junk($db->escape($_POST['civil-status']));
  $place_of_work = remove_junk($db->escape($_POST['p-work']));
  $job_title = remove_junk($db->escape($_POST['j-title']));
  $years_of_employeed = remove_junk($db->escape($_POST['y-employ']));
  $monthly_income = remove_junk($db->escape($_POST['m-income']));
  $lamount = remove_junk($db->escape($_POST['lamount']));
  $purpose_of_loan = remove_junk($db->escape($_POST['p-loan']));
  $gender = remove_junk($db->escape($_POST['gender']));
  $loan_term = remove_junk($db->escape($_POST['l-term']));
  $guarantor_name = remove_junk($db->escape($_POST['g-name']));
  $relation = remove_junk($db->escape($_POST['relation']));
  $guarantor_place_of_work = remove_junk($db->escape($_POST['g-p-w']));
  $guarantor_income = remove_junk($db->escape($_POST['g-income']));
  $guarantor_id_type = remove_junk($db->escape($_POST['g-idtype']));
  $guarantor_id_number = remove_junk($db->escape($_POST['g-idnumber']));
  $guarantor_phone_number = remove_junk($db->escape($_POST['g-pnumber']));
  $companyname = remove_junk($db->escape($_POST['companyname']));
  $bankname = remove_junk($db->escape($_POST['bankname']));
  $accountnum = remove_junk($db->escape($_POST['accountnum']));
  $fid = remove_junk($db->escape($_POST['fid']));
  $sid = remove_junk($db->escape($_POST['sid']));
  $tid = remove_junk($db->escape($_POST['tid']));

  
   if(empty($errors)){
      $sql  = "INSERT INTO `personal_loan`(`id`, `first_name`, `middle_name`, `last_name`, `birthdate`, `birth_place`,`gender`, `phone_no`, `email`, `type_of_id`, `id_no`, `perma_address`, `civil_status`, `place_of_work`, `job_title`, `years_of_employeed`, `monthly_income`,`lamount`, `purpose_of_loan`, `loan_term`, `guarantor_name`, `relation`, `guarantor_place_of_work`, `guarantor_income`, `guarantor_id_type`, `guarantor_id_number`, `guarantor_phone_number`, `companyname`, `bankname`, `accountnum`, `fid`, `sid`, `tid`) VALUES ('$house_id','  $first_name','$middle_name','$last_name','$birthdate','$birth_place','$gender','$phone_no','$email','$type_of_id','$id_no','$perma_address','$civil_status','$place_of_work','$job_title','$years_of_employeed','$monthly_income','$lamount','$purpose_of_loan','$loan_term','$guarantor_name','$relation','$guarantor_place_of_work','$guarantor_income','$guarantor_id_type','$guarantor_id_number','$guarantor_phone_number','$companyname','$bankname','$accountnum','$fid','$sid','$tid')";
      
   
      if($db->query($sql)){
        $session->msg("s", "Thankyou! Your submission has been sent.");
        redirect('personalloan.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('personalloan.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('personalloan.php',false);
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
            <th colspan="5"> Personal Application Form</th>
          </tr>
         </thead>
          <tbody>
            <tr>
              <td colspan="2"><label>First Name:</label>  <input type="text" name="f-name" id="formControlLg" class="form-control form-control-lg" placeholder="First Name" required /></td>

              <td colspan="2"><label>Middle Name:</label><input type="text"  name="m-name" id="formControlLg" class="form-control form-control-lg" placeholder="Middle Name" required /></td>

              <td colspan="2"><label>Last Name:</label> <input type="text" name="l-name" id="formControlLg" class="form-control form-control-lg" placeholder="Last Name" required/> </td>
            </tr>

            <tr>
            <td> <label>Birth Date:</label>

                <input type="date" name="date" class="form-control form-control-lg" />
                   </td>

              <td><label>Birth Place:</label>
                <input type="text" id="formControlLg" name="birth_place" class="form-control form-control-lg" placeholder="Birth Place" required /></td>

               <td><label>Gender</label>
                <select   name="gender" class="form-control  form-control-lg">
                          <option>Select</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                        </select>
              </td>
              
            <td colspan="2"><label>Mobile no/s:
            </label><input type="number" name="number" id="formControlLg" class="form-control form-control-lg" placeholder="+63" required /></td>

            <td colspan="2"><label>Emails Address:</label><input type="email" name="email" id="formControlLg" class="form-control form-control-lg" placeholder="email@gmail.com" required /></td>
          </tr>

            <tr>
            <td colspan="2"><label>Type of ID:
            </label><input type="text" name="t-id" id="formControlLg" class="form-control form-control-lg" placeholder="Type of ID" required /></td>
        
            <td colspan="2"><label>ID Number:
            </label><input type="number" name="id-no" id="formControlLg" class="form-control form-control-lg" placeholder="ID Number" required /></td>

            <td colspan="2"><label> Permanent address :</label>
              <input type="text" id="formControlLg" name="per_address" class="form-control form-control-lg" placeholder="Full Address" required />
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

              <td colspan="2"><label> Place of Work :</label>
              <input type="text" id="formControlLg" name="p-work" class="form-control form-control-lg" placeholder="Place of Work" required />
              </td>

              <td><label>Job Title:</label> <input type="text" name="j-title" id="formControlLg" class="form-control form-control-lg" placeholder="Job Title" required /></td>

              <td colspan="2" ><label>Years of Employed:</label> <input type="text" name="y-employ" id="formControlLg" class="form-control form-control-lg" placeholder="Years of Employed" required /></td>
              </tr>
              <tr>
              <td><label>Monthy Income:</label> <input type="number" name="m-income" id="formControlLg" class="form-control form-control-lg" placeholder="Monthly Income" required /></td>

              <td><label>Loan Amount:</label> <input type="number" name="lamount" id="formControlLg" class="form-control form-control-lg" placeholder="Loan Amount" required /></td>

             <td colspan="2" ><label>Purpose of Loan:</label>
                  <select name="p-loan" class="form-control  form-control-lg">
                          <option>Select</option>
                          <option value="Medical Procedures">Medical Procedures</option>
                          <option value="Vacation or Weddings">Vacation or Weddings</option>
                          <option value="Home Improvesments">Home Improvesments</option>
                        </select>
              </td>

              <td colspan="2" ><label>Loan Term</label>
                <select   name="l-term" class="form-control  form-control-lg">
                          <option>Select</option>
                          <option value="Long Term">Long Term</option>
                          <option value="Short Term">Short Term</option>
                          <option value="Intermediate Term">Intermediate Term</option>
                        </select> 
              </td>
            </tr>

              <td><label>Guarantor Name :</label> <input type="text" name="g-name" id="formControlLg" class="form-control form-control-lg" placeholder="Guarantor Name" required /></td>

              <td colspan="2"><label>Relation to the Guarantor :</label> <input type="text" name="relation" id="formControlLg" class="form-control form-control-lg" placeholder="Relation to the Guarantor" required /></td>

              <td colspan="2"><label>Guarantor Place of Work :</label> <input type="text" name="g-p-w" id="formControlLg" class="form-control form-control-lg" placeholder="Guarantor Place of Work" required /></td>

              </tr>
              <tr>
              <td colspan="2"><label>Guarantor Monthly Income :</label> <input type="number" name="g-income" id="formControlLg" class="form-control form-control-lg" placeholder="Guarantor Monthly Income" required /></td>
              
              <td colspan="2" ><label>Guarantor ID Type :</label> <input type="text" name="g-idtype" id="formControlLg" class="form-control form-control-lg" placeholder="Guarantor ID Type" required /></td>
              </tr>
              <tr>
              <td colspan="2"><label>Guarantor ID Number :</label> <input type="number" name="g-idnumber" id="formControlLg" class="form-control form-control-lg" placeholder="Guarantor ID Number" required /></td>

              <td colspan="2"><label>Guarantor Phone Number :</label> <input type="number" name="g-pnumber" id="formControlLg" class="form-control form-control-lg" placeholder="Guarantor Phone Number" required /></td>
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
              <td colspan="2"><span>Please upload your ID picture</span> <input type="file" name="fid" id="formControlLg" class="form-control form-control-lg" required /></td>
              </tr>
              <tr>
                <td>
                 <label style="color: red ;"> *Please upload your ID here. </label> <br>
                </td>
              <td colspan="2"><span>Please upload your ID picture</span> <input type="file" name="sid" id="formControlLg" class="form-control form-control-lg" required /></td>
              </tr>
              <tr>
                <td>
                 <label style="color: red ;"> *Please upload your ID here. </label> <br>
                </td>
              <td colspan="2"><span>Please upload your ID picture</span> <input type="file" name="tid" id="formControlLg" class="form-control form-control-lg" required /></td>
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
