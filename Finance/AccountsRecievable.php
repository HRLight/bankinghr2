<?php
  $page_title = 'Accounts Payable';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="";
   $row=Recievables();
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">List Of Recievables</a>
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
        <span class="badge rounded-pill bg-success" style="font-size:14px;"><i class="bi bi-table"></i> Recievables Table</span>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr class="bg-success bg-gradient text-light">
                <th>#</th>
                <th>Purpose</th>
                <th>Amount</th>
                <th> Date </th>
                <th> type </th>
                  <th> Action </th>
             </tr>
            </thead>
           <tbody>
            <?php foreach ($row as $row): ?>
              <?php
              $Type=$row['P_Tablename']
               ?>
             <tr>
            <td><?php echo $row['P_Code']; ?></td>
            <td><?php echo $row['P_Purpose']; ?></td>
            <td>₱<?php echo number_format($row['P_Amount'], 2, '.', ','); ?></td>
            <td><?php echo $row['P_Date']; ?></td>
            <td><?php echo $row['Name']; ?></td>
            <td>
            <a href="Collection_Details.php?id=<?php echo $row['P_Code']. "&Type=". urlencode($Type)."&PageName=". urlencode('AccountsRecievable.php'); ?>" class="btn btn-info bg-gradient btn-viewReciept"><i class="bi bi-file-earmark-post-fill"></i> Details</a></td>
              </td>
             </tr>
           <?php endforeach; ?>
         </tbody>
         <tfoot>
           <tr>
             <th>#</th>
             <th>Purpose</th>
             <th>Amount</th>
             <th>Date</th>
             <th>type</th>
             <th>Action</th>
           </tr>
         </tfoot>
       </table>
     </div>
   </div>
 </div>
</div>
</div>

<?php include_once('layouts/footer.php'); ?>
