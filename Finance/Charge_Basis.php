<?php
  $page_title = 'List of Charges';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);

?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">Charges</a>
</nav>
<!-- /Breadcrumb -->

<div class="container">
  <div class="card bg-secondary">
    <div class="card-body">
      <div id="BudgetProposal" class="col-md-12">
          <div class="card text-center">
            <div class="card-header">
              <p></p>
            </div>
            <div class="card-body">
              <h5 class="card-title">AABankTransAsia®</h5>
              <p class="card-text">Quirino Highway, Novaliches, Quezon City, 7799-6617.</p><br>
              <h3>(List of Charges)</h3>
            </div>
            <hr>
          </div>
          <div class="card">
            <div class="card-body">
              <table class="table table-bordered">
                <tr>
                  <th class="text-center" scope="col">Particulars</th>
                  <th class="text-center" scope="col" colspan="2">Service Charge</th>
                </tr>
                <tr>
                  <td colspan="3">Cash Deposits (over the counter throught the branch)*</td>
                </tr>
                <tr>
                  <td>Branch of Account</td>
                  <td colspan="2">Free</td>
                </tr>
                <tr>
                  <td>Intra-region</td>
                  <td colspan="2">Free</td>
                </tr>
                <tr>
                  <td rowspan="4">Inter-Region</td>
                  <td>Below PHP 50k</td>
                  <td>50 PHP</td>
                </tr>
                  <tr>
                    <td>php 50k to 499k</td>
                    <td>100 PHP</td>
                  </tr>
                  <tr>
                    <td>php 500k to 999k</td>
                    <td>500 PHP</td>
                  </tr>
                  <tr>
                    <td>php 1M and above</td>
                    <td>1,000 PHP</td>
                  </tr>
                  <tr>
                    <td rowspan="4">Savings Account</td>
                    <td>Below PHP 50k</td>
                    <td>50 PHP</td>
                  </tr>
                    <tr>
                      <td>php 50k to 499k</td>
                      <td>100 PHP</td>
                    </tr>
                    <tr>
                      <td>php 500k to 999k</td>
                      <td>500 PHP</td>
                    </tr>
                    <tr>
                      <td>php 1M and above</td>
                      <td>1,000 PHP</td>
                    </tr>
                    <tr>
                      <td>Cash Deposit via cash acceptance machine.</td>
                      <td colspan="2">Free</td>
                    </tr>
                    <tr>
                      <td>Over the counter cash deposit.</td>
                      <td colspan="2">Free</td>
                    </tr>
              </table>
            </div>
          </div>
      </div>
    </div>
    <div class="card-footer bg-light">
      <button class="btn btn-success" type="button" name="button"><i class="bi bi-box-arrow-in-down"></i> Update Charges</button>
    </div>
  </div>
  </div>


<?php include_once('layouts/footer.php'); ?>
