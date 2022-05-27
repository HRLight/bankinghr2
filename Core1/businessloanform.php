<?php
  $page_title = 'Business Loan';
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
  $profitloss = remove_junk($db->escape($_POST['profitloss']));
  $updatedrecord = remove_junk($db->escape($_POST['updatedrecord']));
  $businessplan = remove_junk($db->escape($_POST['businessplan']));
  $taxreturn = remove_junk($db->escape($_POST['taxreturn']));
  $companyname = remove_junk($db->escape($_POST['companyname']));
  $bankname = remove_junk($db->escape($_POST['bankname']));
  $accountnum = remove_junk($db->escape($_POST['accountnum']));
 
  
   if(empty($errors)){
      $sql  = "INSERT INTO `business_loan`(`id`, `profitloss`, `updatedrecord`, `businessplan`, `taxreturn`,`companyname` ,`bankname`, `accountnum`) VALUES ('$id','$profitloss','$updatedrecord','$businessplan','$taxreturn','$companyname','$bankname','$accountnum')";
      
   
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
    <div class="Business_form">

         <form method="POST">

         <table class="table table-bordeless">
         </table>

        <table class="table table-bordeless">
          <thead class="thead-dark">
            <!-- Start OF Application Form-->
          <tr>
            <th colspan="5"> Business Loan Application Form</th>
          </tr>
         </thead>
          <tbody>


                <td>
                 <label style="color: red ;"> *Please send your Profit and Loss statements and balance sheets for the past two years. </label> <br>
                </td>
              <td colspan="2"><span>Profit and Loss Statements and Balance sheets</span> <input type="file" name="profitloss" id="formControlLg" class="form-control form-control-lg" required /></td>
              </tr>


                <td>
                 <label style="color: red ;"> *Please send your Up to date financial statements record. </label> <br>
                </td>
              <td colspan="2"><span>Up to date financial statements record</span> <input type="file" name="updatedrecord" id="formControlLg" class="form-control form-control-lg" required /></td>
              </tr>


              <tr>
                <td>
                 <label style="color: red ;"> *Please send your business plan / project plan. </label> <br>
                </td>
              <td colspan="2"><span>Business plan / Project plan</span> <input type="file" name="businessplan" id="formControlLg" class="form-control form-control-lg" required /></td>
              </tr>


              <tr>
                <td>
                 <label style="color: red ;"> *Please send your Tax Return to verify income statements. </label> <br>
                </td>
              <td colspan="2"><span>ITR or Income Tax Return</span> <input type="file" name="taxreturn" id="formControlLg" class="form-control form-control-lg" required /></td>
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
