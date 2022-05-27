<?php
  $page_title = 'Collection Approvals';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="Pending";
   $row=Call_Pending_Invoices();
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Approvals</a>
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Request Table</span>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                <th>Amount</th>
                <th>Penalty</th>
                <th> Date </th>
                <th> Account Number </th>
                <th> Action </th>
             </tr>
            </thead>
           <tbody>
            <?php foreach ($row as $row): ?>
             <tr>
            <td><?php echo $row['Amount']; ?></td>
            <td><?php echo $row['Penalty']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['A_Number']; ?></td>
            <td>
              <form action="Settle.php?id=<?php echo $row['id']."&AccountNumber=".urlencode($row['A_Number']);?>" method="post">
              <button class="btn btn-success" type="submit" name="Approve"><i class="fas fa-file-alt"></i> Send</button>
              </form>
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
