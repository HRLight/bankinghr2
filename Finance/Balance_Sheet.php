<?php
  $page_title = 'Accounts Payable';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);

   $DebitCash = 0;
   $Recievable = 0;
   $FixedAsset = 0;
   $Payable = 0;
?>
<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">Balance Sheet</a>
</nav>
<!-- /Breadcrumb -->
  <link rel="stylesheet" href="libs/css/Blancesheet.css">
<div class="container">
  <div class="row bg-white">
    <section>
        <h1>
          <span class="flex-center">
            <span>AABankTransAsia®</span><br>
            <h3>Balance Sheet</h3>
          </span>
        </h1>
        <div id="years" aria-hidden="true">
          <span class="year">2022</span>
            <span class="year"></span>
        </div>
        <div class="table-wrap">
          <table>
            <caption>Assets</caption>
            <thead>
              <tr>
                <td></td>
                <th><span class="sr-only year">2021</span></th>
                <th class="current"><span class="sr-only year">2022</span></th>
              </tr>
              <?php
              $cash = $db->query("SELECT a.name, b.amount, c.type FROM account_list a LEFT JOIN journal_items b ON b.account_id = a.Co_Code LEFT JOIN group_list c ON b.group_id = c.id WHERE a.name = 'Cash';");
    					while($row = $cash->fetch_assoc()){
                $DebitCash += $row['amount'];
              }
              $Recievables = $db->query("SELECT SUM(LT_Recieved + LT_Penalty) AS Cash_loan FROM collection_transactions WHERE LT_Type = 'Loan';;");
    					while($row = $Recievables->fetch_assoc()){
                $Recievable = $row['Cash_loan'];
              }
              $Fixed = $db->query("SELECT SUM(As_Amount) AS FixedAssets FROM assets;");
    					while($row = $Fixed->fetch_assoc()){
                $FixedAsset = $row['FixedAssets'];
              }
              $Payables = $db->query("SELECT SUM(P_Amount) AS Cash_Payable FROM payables;");
    					while($row = $Payables->fetch_assoc()){
                $Payable = $row['Cash_Payable'];
              }
              $bills = $db->query("SELECT SUM(Co_Amount) AS bills_Payable FROM uexpenses;;");
              while($row = $bills->fetch_assoc()){
                $bills_Payable = $row['bills_Payable'];
              }
               ?>
            </thead>
            <tbody>
              <tr class="data">
                <th>Cash <span class="description"></span></th>
                <td></td>
                <td>₱<?= number_format($DebitCash, 2, '.', ','); ?></td>
                <td class="current"></td>
              </tr>
              <tr class="data">
                <th>Accounts Receivable <span class="description"></span></th>
                <td></td>
                <td>₱<?= number_format($Recievable, 2, '.', ','); ?></td>
                <td class="current"></td>
              </tr>
              <tr class="data">
                <th>Fixed Assets <span class="description"></span></th>
                <td></td>
                <td>₱<?= number_format($FixedAsset, 2, '.', ','); ?></td>
                <td class="current"></td>
              </tr>
              <tr class="total">
                <th>Total <span class="sr-only">Assets</span></th>
                <td></td>
                <?php $totalAssets = $DebitCash + $Recievable + $FixedAsset; ?>
                <td>₱<?= number_format($totalAssets, 2, '.', ','); ?></td>
                <td class="current"></td>
              </tr>
            </tbody>
          </table>
          <table>
            <caption>Liabilities</caption>
            <thead>
              <tr>
              <td></td>
              <th><span class="sr-only">2019</span></th>
              <th><span class="sr-only">2020</span></th>
              <th><span class="sr-only">2021</span></th>
              </tr>
            </thead>
            <tbody>
              <?php $totalLiabilities = $Payable +  $bills_Payable + 61; ?>
              <tr class="data">
                <th>Accounts Payables <span class="description"></span></th>
                <td></td>
                <td>₱<?= number_format($Payable, 2, '.', ','); ?></td>
                <td class="current"></td>
              </tr>
              <tr class="data">
                <th>Bills payable <span class="description"></span></th>
                <td></td>
                <td>₱<?= number_format($bills_Payable, 2, '.', ','); ?></td>
                <td class="current"></td>
              </tr>
              <tr class="total">
                <th>Total <span class="sr-only">Liabilities</span></th>
                <td></td>
                <td>₱<?= number_format($totalLiabilities, 2, '.', ','); ?></td>
                <td class="current"></td>
              </tr>
            </tbody>
          </table>
          <table>
            <caption>Equity</caption>
            <thead>
              <tr>
              <td></td>
              <th><span class="sr-only">2019</span></th>
              <th><span class="sr-only">2020</span></th>
              <th><span class="sr-only">2021</span></th>
              </tr>
            </thead>
            <tbody>
              <?php $Networth = $totalAssets - $totalLiabilities?>
              <tr class="total">
                <th>Retained earnings<span class="sr-only">Equity</span></th>
                <td></td>
                <td>₱<?= number_format($Networth, 2, '.', ','); ?></td>
                <td class="current"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
  </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
