<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   $all_com_announcement= find_all('com_announcement')
?>

<?php
// All Variables ----------------------------------------------------------------------
$Expenses=0;
$Collections=0;
$rev=0;
$total=0;
$c_user = count_by_id('users');
$Expense=Expenses();
$Budget= Budget();
$com=0;
$Liabilities=0;
// End of Variable Declarations---------------------------------------------------------

//Sql for Summing the deposits in Collections ------------------------------------------
$sql="SELECT SUM(LT_Recieved) AS allsum FROM collection_transactions  WHERE LT_Type='deposit';";
$result = $db->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
 $Liabilities=$row['allsum'];
 }
 }
 // End-----------------------------------------------------------------------------

 $all_users = find_all_user();
?>

<?php include_once('layouts/header.php'); ?>
<!-- Taking Array of Datas From Budget and putting to com Variable...-->
<?php foreach ($Budget as $Budget): ?>
  <?php $com=$Budget['Budget'];?>
<?php endforeach; ?>
<!-- End of Loop-->


<!-- Taking Array of Datas From Expense and putting to Expense Variable...-->
<?php foreach ($Expense as $Expense): ?>
<?php
$Expenses=$Expense['Expenses'];
$Collections=$Expense['Collection'];
 ?>
<?php endforeach; ?>
<!-- End of Loop-->

<!-- Notification div -->
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<!-- End Notification div -->
<div class="row">
  <div class="col-md-12">
    <h4>Dashboard</h4>
  </div>
</div>
<div class="row">
  <div class="col-md-3 mb-3">
    <div class="card bg-primary text-white h-100">
      <div class="card-body py-5"><p>₱ <?php echo $Expense['Collection']; ?><br><span><i class="bi bi-building"></i> Total Assets </span></p></div>
      <div class="card-footer d-flex">
        View Details
        <span class="ms-auto">
          <i class="bi bi-chevron-right"></i>
        </span>
      </div>
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <div class="card bg-warning text-dark h-100">
      <div class="card-body py-5"><p>₱ <?php echo $Liabilities; ?><br> <span><i class="bi bi-list-columns"></i> Total Liabilities</span></p></div>
      <div class="card-footer d-flex">
        View Details
        <span class="ms-auto">
          <i class="bi bi-chevron-right"></i>
        </span>
      </div>
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <div class="card bg-success text-white h-100">
      <div class="card-body py-5"><p>₱ <?php $rev=$Expense['Collection']+$com;
                         echo $total=$rev-$Expense['Expenses']; ?><br><span><i class="bi bi-piggy-bank-fill"></i>  Total Revenue</span></p></div>
      <div class="card-footer d-flex">
        View Details
        <span class="ms-auto">
          <i class="bi bi-chevron-right"></i>
        </span>
      </div>
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <div class="card bg-danger text-white h-100">
      <div class="card-body py-5"><p>₱ <?php echo $Expense['Expenses']; ?><br><span><i class="bi bi-journal-x"></i> Total expenses</span></p></div>
      <div class="card-footer d-flex">
        View Details
        <span class="ms-auto">
          <i class="bi bi-chevron-right"></i>
        </span>
      </div>
    </div>
  </div>
  
  
  <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Company Announcement</h6>

                    </div>
                     <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>

            </thead>
            <tbody>

          <?php foreach ($all_com_announcement as $anounce):?>
          <tr>
					<td><?php echo remove_junk(ucfirst($anounce['title'])); ?></td>
					<td><?php echo remove_junk(ucfirst($anounce['description'])); ?></td>

                    <td class="text-center">
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>

          </table>
        </div>
      </div>
                </div>
            </div>

			
        </div>
  
  
  
</div>
<?php include_once('layouts/footer.php'); ?>
