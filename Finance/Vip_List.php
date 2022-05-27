<?php
  $page_title = 'List of VIP';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>

<?php
 $Type="Loan";
 $row = Collection_VIP();
?>

<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">List of Loans</a>
</nav>
<!-- /Breadcrumb -->

<!-- Data table start -->
<div class="row">

  <!-- Notification div -->
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
  <!-- End Notification div -->

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success" style="font-size:14px;"><i class="bi bi-table"></i> <?php echo  $position ?> Loans Table</span>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr class="bg-success bg-gradient text-light">
                <th>Invoice #</th>
                <th>Account Name</th>
                <th>Account Number</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

             <?php foreach ($row as $row): ?>
                <?php if (remove_junk($row['status']) === 'Pending'):?>
                <tr>
                <td><?php echo $row['Co_Code']; ?></td>
                <td><?php echo $row['LS_Account_name']; ?></td>
                <td><?php echo $row['A_Number']; ?></td>
                <td><?php echo $row['LS_Date']; ?></td>
                <td><span class="badge rounded-pill bg-danger bg-gradient"><?php echo remove_junk($row['status']); ?></span></td>
                <td>
                  <a href="Collection_Details.php?id=<?php echo $row['Co_Code']. "&Type=". urlencode($Type)."&PageName=". urlencode('ListofLoans.php'); ?>" class="btn btn-success bg-gradient btn-viewReciept text-light"><i class="bi bi-file-earmark-post-fill"></i> Details</a></td>
                 </tr>
              <?php endif; ?>
            <?php endforeach; ?>

            </tbody>
            <tfoot>
              <tr>
                <th>Collection Code</th>
                <th>Account Name</th>
                <th>Account Number</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
<!-- End of Data table  -->


<?php include_once('layouts/footer.php'); ?>
