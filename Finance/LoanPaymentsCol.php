<?php
  $page_title = 'General Journal';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);

?>
<?php include_once('layouts/header.php'); ?>
<?php
$PageName=$_GET['PageName'];
$code=$_GET['id'];
$table=$_GET['Tablename'];
$Account=$_GET['ANumber'];
$row = Find_collection_Details($code);
$all_transaction = find_all_collection_transactions($Account);
 ?>
<!-- Notification div -->
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<!-- End Notification div -->

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <!-- for Determining what page the user came from-->
     <?php if ($PageName=='Collections_Loans.php'): ?>
       <a href="Collections_Loans.php" class="breadcrumbs__item">List Of Loans</a>
     <?php elseif ($PageName=='Collections_Deposits.php'): ?>
       <a href="Collections_Deposits.php" class="breadcrumbs__item">List Of Deposits</a>
   <?php elseif ($PageName=='AccountsRecievable.php'): ?>
     <a href="AccountsRecievable.php" class="breadcrumbs__item">List of Recievables</a>
   <?php endif; ?>
  <!-- for Determining what page the user ame from-->
  <a href="#checkout" class="breadcrumbs__item is-active">Details</a>
</nav>
<!-- /Breadcrumb -->
<?php if ($table=='Loan'): ?>
  <div class="container">
  <div class="row">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6" style="line-height: 35px;">
            <span class="badge rounded-pill bg-success" style="font-size:14px;"><i class="bi bi-table"></i> Loan Details</span>
          </div>
            <div class="col-md-6 text-end">
                <button class="btn btn-primary bg-gradient" type="submit" name="Forward" onclick="printDiv()">
                  <i class="bi bi-printer-fill"></i>
                 Print
               </button>
              <button class="btn btn-danger bg-gradient" type="submit" name="Forward" id="download">
              <i class="bi bi-file-earmark-pdf-fill"></i>
                PDF
              </button>
              <button class="btn btn-success bg-gradient" type="submit" name="Forward" id="download">
              <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                Excel
              </button>
            </div>
        </div>
      </div>
      <div class="card-body bg-secondary bg-gradient" id="CostomerTrans">
      <div class="col-lg-11">
          <div class="offset-md-2 card card-outline-info">
              <div class="card-header" style="background-color: #2B547E;">
              <span class="badge rounded-pill bg-danger bg-gradient" style="font-size:14px;"><i class="bi bi-table"></i> List of Transactions</span>
              </div>
              <div class="card-body">
                  <form class="form-horizontal" role="form">
                      <div class="form-body">
                          <h5 class="box-title m-t-13">Account Info</h5>
                          <hr class="m-t-0 m-b-40">
                          <?php foreach ($row as $details): ?>
                          <div class="row">
                              <div class="col-md-9">
                                  <div class="form-group row">
                                      <label class="control-label text-right col-md-3">Account Name :</label>
                                      <div class="col-md-7">
                                          <p class="form-control-static"> <?php echo $details['LS_Account_name']; ?> </p>
                                      </div>
                                  </div>
                              </div>
                              <!--/span-->
                              <div class="col-md-9">
                                  <div class="form-group row ">
                                      <label class="control-label text-right col-md-3">Account Number :</label>
                                      <div class="col-md-7">
                                          <p class="form-control-static"> <?php echo $details['A_Number']; ?> </p>
                                      </div>
                                  </div>
                              </div>
                              <!--/span-->
                          </div>
                          <!--/row-->
                          <div class="row">
                              <div class="col-md-9">
                                  <div class="form-group row">
                                      <label class="control-label text-right col-md-3">Loan Ammount :</label>
                                      <div class="col-md-9">
                                          <p class="form-control-static"> <?php echo number_format($details['LS_Amount'], 2, '.', ','); ?> </p>
                                      </div>
                                  </div>
                              </div>
                              <!--/span-->
                              <div class="col-md-9">
                                  <div class="form-group row">
                                      <label class="control-label text-right col-md-3">Beginning date :</label>
                                      <div class="col-md-9">
                                          <p class="form-control-static"> <?php echo $details['LS_Date']; ?> </p>
                                      </div>
                                  </div>
                              </div>
                              <!--/span-->
                          </div>
                          <!--/row-->
                          <div class="row">
                              <div class="col-md-9">
                                  <div class="form-group row">
                                      <label class="control-label text-right col-md-3">Remaining Balance :</label>
                                      <div class="col-md-9">
                                          <p class="form-control-static"> <?= $details['LS_Remaining'] != 0 ? number_format($details['LS_Remaining'], 2, '.', ',') : number_format($details['LS_Amount'], 2, '.', ',');  ?> </p>
                                      </div>
                                  </div>
                              </div>
                              <!--/span-->
                              <div class="col-md-9">
                                  <div class="form-group row">
                                      <label class="control-label text-right col-md-3">Interest :</label>
                                      <div class="col-md-9">
                                          <p class="form-control-static"> <?php echo $details['LS_Interest']; ?>% </p>
                                      </div>
                                  </div>
                              </div>
                              <!--/span-->
                          </div>
                        <?php endforeach; ?>
                          <!--/row-->
                          <h5 class="box-title m-t-13">Transactions</h5>
                          <hr class="m-t-0 m-b-40">
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group row">
                                      <label class="control-label text-right col-md-3">Note :</label>
                                      <div class="col-md-9">
                                          <p class="form-control-static"> All Recorded AR Transactions Are confirmed by collection officer. </p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row">

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="text-white" style="background-color: #2B547E;">
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Payment</th>
                                            <th>Penalty</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($all_transaction as $value): ?>
                                        <tr>
                                            <td><?php echo $value['LT_id']; ?></td>
                                            <td><?php echo $value['LT_date']; ?></td>
                                            <td><?php echo number_format($value['LT_Recieved'], 2, '.', ','); ?></td>
                                            <td><?php echo number_format($value['LT_Penalty'], 2, '.', ','); ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                          </div>
                  </form>
              </div>
          </div>
      </div>
      </div>
      </div>
      <div class="card-footer">

      </div>
    </div>
    </div>
    </div>
  <?php elseif ($table=='Deposit'): ?>
    <div class="container">
      <div class="row">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-md-6" style="line-height: 35px;">
                <span class="badge rounded-pill bg-success" style="font-size:14px;"><i class="bi bi-table"></i> Loan Details</span>
              </div>
                <div class="col-md-6 text-end">
                    <button class="btn btn-primary bg-gradient" type="submit" name="Forward" onclick="printDiv()">
                      <i class="bi bi-printer-fill"></i>
                     Print
                   </button>
                  <button class="btn btn-danger bg-gradient" type="submit" name="Forward" id="download">
                  <i class="bi bi-file-earmark-pdf-fill"></i>
                    PDF
                  </button>
                  <button class="btn btn-success bg-gradient" type="submit" name="Forward" id="download">
                  <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                    Excel
                  </button>
                </div>
            </div>
          </div>
          <div class="card-body bg-secondary bg-gradient" id="CostomerTrans">
          <div class="col-lg-11">
              <div class="offset-md-2 card card-outline-info">
                  <div class="card-header" style="background-color: #2B547E;">
                  <span class="badge rounded-pill bg-danger bg-gradient" style="font-size:14px;"><i class="bi bi-table"></i> List of Transactions</span>
                  </div>
                  <div class="card-body">
                      <form class="form-horizontal" role="form">
                          <div class="form-body">
                              <h5 class="box-title m-t-13">Account Info</h5>
                              <hr class="m-t-0 m-b-40">
                              <?php foreach ($row as $details): ?>
                              <div class="row">
                                  <div class="col-md-9">
                                      <div class="form-group row">
                                          <label class="control-label text-right col-md-3">Account Name :</label>
                                          <div class="col-md-7">
                                              <p class="form-control-static"> <?php echo $details['LS_Account_name']; ?> </p>
                                          </div>
                                      </div>
                                  </div>
                                  <!--/span-->
                                  <div class="col-md-9">
                                      <div class="form-group row ">
                                          <label class="control-label text-right col-md-3">Account Number :</label>
                                          <div class="col-md-7">
                                              <p class="form-control-static"> <?php echo $details['A_Number']; ?> </p>
                                          </div>
                                      </div>
                                  </div>
                                  <!--/span-->
                              </div>
                              <!--/row-->
                              <div class="row">
                                  <div class="col-md-9">
                                      <div class="form-group row">
                                          <label class="control-label text-right col-md-3">Savings Ammount :</label>
                                          <div class="col-md-9">
                                              <p class="form-control-static"> <?php echo number_format('120000', 2, '.', ','); ?> </p>
                                          </div>
                                      </div>
                                  </div>
                                  <!--/span-->
                                  <div class="col-md-9">
                                      <div class="form-group row">
                                          <label class="control-label text-right col-md-3">Beginning date :</label>
                                          <div class="col-md-9">
                                              <p class="form-control-static"> 11/06/1987 </p>
                                          </div>
                                      </div>
                                  </div>
                                  <!--/span-->
                              </div>
                              <!--/row-->
                            <?php endforeach; ?>
                              <!--/row-->
                              <h5 class="box-title m-t-13">Transactions</h5>
                              <hr class="m-t-0 m-b-40">
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group row">
                                          <label class="control-label text-right col-md-3">Note :</label>
                                          <div class="col-md-9">
                                              <p class="form-control-static"> All Recorded AR Transactions Are confirmed by collection officer. </p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="text-white" style="background-color: #2B547E;">
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Payment</th>
                                                <th>Charges</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($all_transaction as $value): ?>
                                            <tr>
                                                <td><?php echo $value['LT_id']; ?></td>
                                                <td><?php echo $value['LT_date']; ?></td>
                                                <td><?php echo number_format($value['LT_Recieved'], 2, '.', ','); ?></td>
                                                <td><?php echo number_format($value['LT_Penalty'], 2, '.', ','); ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                              </div>
                      </form>
                  </div>
              </div>
          </div>
          </div>
          </div>
          <div class="card-footer">

          </div>
        </div>
        </div>
        </div>
<?php endif; ?>
  <script>
  window.onload = function () {
  document.getElementById("download")
      .addEventListener("click", () => {
          const invoice = this.document.getElementById("CostomerTrans");
          console.log(invoice);
          console.log(window);
          var opt = {
              margin: 1,
              filename: 'Transaction_Details.pdf',
              image: { type: 'jpeg', quality: 0.98 },
              html2canvas: { scale: 2 },
              jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
          };
          html2pdf().from(invoice).set(opt).save();
      })
}
  function printDiv() {
      var divContents = document.getElementById("CostomerTrans").innerHTML;
      var a = window.open('', '', '');
      a.document.write('<html>');
      a.document.write('<head><link rel="stylesheet" href="libs/css/bootstrap.min.css" media="all"/></head>');
      a.document.write('<body><h1 style="font-family:sans-serif">Customer Transactions</h1><h3><br>');
      a.document.write(divContents);
      a.document.write('</body></html>');
      a.document.close();
      a.print();
  }
  </script>

<?php include_once('layouts/footer.php'); ?>
