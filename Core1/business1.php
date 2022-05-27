<?php
  $page_title = 'Logistic 1';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   $all_request_procurement = find_all('approve_business')
?>
<link rel="icon" href="https://webstockreview.net/images/bank-clipart-transparent-background-9.png" type="image/icon type">

<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Pending Client</a>
</nav>
<hr style="margin-top: 0px; border-top: solid grey 2px;">
<!-- /Breadcrumb -->

<div class="col-md-12 mb-3 card-header" style="border: solid grey 1px">
  <div class="card">
    <div class="card-header">
      <span class="badge square-pill bg-success"><i class="bi bi-list"></i> Business Loan list of table</span>
    </div>
    
    <div class="card-body">
      <div class="table-responsive">
        <table id="example" class="table table-striped data-table" style="width: 100%">
          <thead>
            <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Profit and Loss statements and balance sheets</th>
                  <th scope="col">Up to date financial statements record</th>
                  <th scope="col">business plan</th>
                  <th scope="col">ITR</th>
                  <th scope="col">Company Name</th>
                  <th scope="col">Bank Name</th>
                  <th scope="col">Account Number</th>
                <th scope="col">Date of Loan</th>
                <th scope="col">Action</th>
            </tr>
          </thead>
      
          <tbody>
          <?php foreach ($all_request_procurement as $row):?>
            <tr>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['profitloss']?></td>
                                <td><?php echo $row['updatedrecord']?></td>
                                <td><?php echo $row['businessplan']?></td>
                                <td><?php echo $row['taxreturn']?></td>
                                <td><?php echo $row['companyname']?></td>
                                <td><?php echo $row['bankname']?></td>
                                <td><?php echo $row['accountnum']?></td>
                                <td><?php echo $row['date']?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                    <a href="business_accept.php?id=<?php echo (int)$row['id'];?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Done">Approve
                                      <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    </div>
                                </td>

            </tr>       
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include_once('layouts/footer.php'); ?>