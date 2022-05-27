<?php
  $page_title = 'Accounts Payable';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $Code = $_GET['Code'];
   $row=Proposals_Department($Code);
   $row2=Proposals_find($Code);
   $Subtotal = 0;
?>
<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="Budgetreleasing.php" class="breadcrumbs__item">Budget Releasing</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Proposal Details</a>
</nav>
<!-- /Breadcrumb -->

<div class="container">
  <div class="card">
    <div class="card-body">
      <div id="BudgetProposal" class="col-md-12" style="border: 2px solid #000000">
          <div class="card text-center">
            <div class="card-header" style="background-color: #2180A0;">
              <p></p>
            </div>
            <div class="card-body">
              <h5 class="card-title">AABankTransAsia®</h5>
              <p class="card-text">Quirino Highway, Novaliches, Quezon City, 7799-6617.</p>
            </div>
            <div class="card-footer text-muted" style="background-color: #2180A0;">
            <p></p>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <table class="table table-borderless">
                  <tbody>
                    <?php foreach ($row2 as $key => $value): ?>
                    <tr>
                      <td style="width: 50%;"><span> <strong>Department : </strong></span> &nbsp;<?php echo $value['PR_Department']; ?></td>
                      <td style="width: 50%;"><span> <strong>Date:</strong></span> &nbsp;<?php echo $value['PR_Date']; ?></td>
                    </tr>
                    <tr>
                      <td style="width: 50%;"><span> <strong>Requestor :</strong></span> &nbsp;<?php echo $value['PR_Requestor']; ?></td>
                      <td style="width: 50%;"><span> <strong>Status : </strong></span> &nbsp; <span class="badge rounded-pill bg-danger bg-gradient"><?php echo $value['stat']; ?></span></td>
                    </tr>
                    <tr>
                      <td style="width: 50%;"></td>
                      <td style="width: 50%;"><span> <strong>Total :  </strong></span> <?php echo number_format($value['PR_Amount'], 2, '.', ','); ?></td>
                    </tr>
                  </tbody>
                <?php endforeach; ?>
              </table>
              <hr style="border: 1px solid #0E0F0F;">
              <h5 class="card-title">Budget Proposal</h5>
              <p class="card-text">Below are the list of Expenses of the Department and its total.</p>
              <table class="table table-bordered" style="border: 1px solid #0E0F0F;">
                <th>Expaneses</th>
                <th>Total</th>
                <th>Comments</th>
              <tbody>
                <?php foreach ($row as $key => $value):?>
                <tr>
                  <td><?php echo $value['Expenses']; ?></td>
                  <td><?php echo number_format($value['Total'], 2, '.', ','); ?></td>
                  <td style="width: 45%;"><?php echo $value['Comments']; ?></td>
                </tr>
                <?php $Subtotal += $value['Total'];?>
              <?php endforeach; ?>
                <tr>
                  <th colspan="2" style="text-align:right">Sub-Total :</th>
                  <th><?php echo number_format($Subtotal, 2, '.', ','); ?></th>
                </tr>
              </tbody>
            </table>
            </div>
          </div>
      </div>
    </div>
    <div class="card-footer">
      <button onclick="printDiv()" class="btn btn-primary" type="button" name="button"><i class="bi bi-printer-fill"></i> Print</button>
      <button class="btn btn-success bg-gradient" type="button" name="button"><i class="bi bi-arrow-down-square-fill"></i> Download</button>
    </div>
  </div>
  </div>
  <script type="text/javascript">
  function printDiv() {
      var divContents = document.getElementById("BudgetProposal").innerHTML;
      var a = window.open('', '', '');
      a.document.write('<html>');
      a.document.write('<head><link rel="stylesheet" href="libs/css/bootstrap.min.css" media="all"/></head>');
      a.document.write('<body>');
      a.document.write(divContents);
      a.document.write('</body></html>');
      a.document.close();
      a.print();
  }
  </script>

<?php include_once('layouts/footer.php'); ?>
