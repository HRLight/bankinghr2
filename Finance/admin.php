<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>

<?php
$Chart1 = Sales_Chart();
$Chart2 = Budget_Chart();

foreach ($Chart1 as $key => $value) {
  $months[]=$value["months"];
  $Sales[]=$value["Sale_amounts"];
}
foreach ($Chart2 as $key => $value) {
  $years[]=$value["years"];
  $yearly_budget[]=$value["yearly_budget"];
}
$Collection_Transactions=Expenses();
 $all_users = find_all_user();
 $Total_Assets=All_Assets();

//=============================================================================
$total_Releasing;
$total_Collection;
$total_Liabilities;
$Assets;
//=============================================================================
foreach ($Collection_Transactions as $value) {
   $total_Releasing = $value['Expenses'];
   $total_Collection = $value['Collection'];
   $total_Liabilities = $value['Liabilities'];
 }
 foreach ($Total_Assets as $key => $value) {
   $Assets=$value['Assets'];
 }
?>

<?php include_once('layouts/header.php'); ?>
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
    <div class="card bg-primary bg-gradient text-white h-100">
      <div class="card-body py-5"><p class="content_data h6">₱ <?php $total_Asset=$Assets+$total_Collection; echo number_format($total_Asset, 2, '.', ','); ?><br></p><span><i class="bi bi-building"></i> Total Assets</span></div>
      <div class="card-footer d-flex">
        View Details
        <span class="ms-auto">
          <button class="btn bg-gradient text-light viewDetails" type="button" data-ent="<?php echo "Assets"; ?>" name="button"><i class="bi bi-chevron-right"></i></button>
        </span>
      </div>
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <div class="card bg-warning bg-gradient text-dark h-100">
      <div class="card-body py-5"><p class="content_data h6">₱ <?php echo number_format($total_Liabilities, 2, '.', ',');  ?><br></p><span><i class="bi bi-list-columns"></i> Total Liabilities</span></div>
      <div class="card-footer d-flex">
        View Details
        <span class="ms-auto">
          <button class="btn bg-gradient text-light viewDetails" data-ent="<?php echo "Liabilities"; ?>" type="button" name="button"><i class="bi bi-chevron-right"></i></button>
        </span>
      </div>
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <div class="card bg-success bg-gradient text-white h-100">
      <div class="card-body py-5"><p class="content_data h6">₱ <?php echo number_format($total_Collection, 2, '.', ','); ?><br></p><span><i class="bi bi-piggy-bank-fill"></i>  Total Revenue</span></div>
      <div class="card-footer d-flex">
        View Details
        <span class="ms-auto">
          <button class="btn bg-gradient text-light viewDetails" data-ent="<?php echo "Revenue"; ?>" type="button" name="button"><i class="bi bi-chevron-right"></i></button>
        </span>
      </div>
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <div class="card bg-danger bg-gradient text-white h-100">
      <div class="card-body py-5"><p class="content_data h6">₱ <?php echo number_format($total_Releasing, 2, '.', ','); ?><br></p><span><i class="bi bi-journal-x"></i> Total expenses</span></div>
      <div class="card-footer d-flex">
        View Details
        <span class="ms-auto">
          <button class="btn bg-gradient text-light viewDetails" data-ent="<?php echo "Expenses"; ?>" type="button" name="button"><i class="bi bi-chevron-right"></i></button>
        </span>
      </div>
    </div>
  </div>
</div>

<!-- Start of Charts -->

<div class="row">
  <div class="col-md-6 mb-3">
    <div class="card h-100">
      <div class="card-header">
        <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
        Sales
      </div>
      <div class="card-body">
        <canvas class="chart1" width="500" height="200"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-6 mb-3">
    <div class="card h-100">
      <div class="card-header">
        <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
        Yearly Budget
      </div>
      <div class="card-body">
        <canvas class="chart2" width="500" height="200"></canvas>
      </div>
    </div>
  </div>
</div>

<!-- End of Charts -->

<!-- Data table start -->
<div class="row">
  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span><i class="bi bi-person-lines-fill me-2"></i></span> Users Table
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>

                <th>Name</th>
                <th>Username</th>
                <th>Position</th>
                <th>Status</th>
                <th>Last Log-in</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach($all_users as $a_user): ?>
                   <?php if($a_user['user_level']===$user['user_level'] && $a_user['username']===$user['username']): ?>
                     <tr>
                      <td><?php echo remove_junk(ucwords($a_user['name']))?></td>
                      <td><?php echo remove_junk(ucwords($a_user['username']))?></td>
                      <td><?php echo remove_junk(ucwords($a_user['group_name']))?></td>
                      <td>
                       <span class="badge rounded-pill bg-warning"> <?php echo "You"; ?></span>
                      </td>
                      <td><?php echo read_date($a_user['last_login'])?></td>
                     </tr>
                     <?php else: ?>
                       <tr>
                        <td><?php echo remove_junk(ucwords($a_user['name']))?></td>
                        <td><?php echo remove_junk(ucwords($a_user['username']))?></td>
                        <td><?php echo remove_junk(ucwords($a_user['group_name']))?></td>
                        <td>
                        <?php if($a_user['status'] === '1'): ?>
                         <span class="badge rounded-pill bg-success"> <?php echo "Active"; ?></span>
                       <?php else: ?>
                         <span class="badge rounded-pill bg-danger"><?php echo "Deactive"; ?></span>
                       <?php endif;?>
                        </td>
                        <td><?php echo read_date($a_user['last_login'])?></td>
                       </tr>
                   <?php endif; ?>
                      <?php endforeach;?>

            </tbody>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Position</th>
                <th>Status</th>
                <th>Last Log-in</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
<!-- End of Data table  -->

<!-- Modal -->
<div class="modal fade" id="DetailsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-dark bg-gradient text-white">
        <h5 class="modal-title" id="staticBackdropLabel">Details</h5>
        <button type="button" class="btn-close bg-secondary" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
          <ul type='none'>
            <div style="display: flex;">
            <li style='flex-basis: 30.5%;' id="label1onModal">Total Assets :</li>
            <li style='flex-basis: 40.5%;' id="DetailOnModal"></li>
          </div>
            <div style='display: flex;'>
            <li style='flex-basis: 30.5%;'>Current Date :</li>
            <li style='flex-basis: 40.5%;' id="DetailDateOnModal"></li>
            </div>
            <div style='display: flex;'>
            <li style='flex-basis: 30.5%;'> CurrentTime :</li>
            <li style='flex-basis: 40.5%;' id="DetailtimeOnModal"></li>
            </div>
          </ul>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<script>
  $('.viewDetails').click(function(){
      var EntryDetails = $(this).data('ent'); //Get value from data-ent element
      var today = new Date();
      var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
      var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
      switch (EntryDetails) {
        case 'Assets':
          $('#DetailsModal').modal("show"); // show modal..
          document.getElementById('label1onModal').innerHTML='Total Assets :';
          document.getElementById('DetailDateOnModal').innerHTML = date;
          document.getElementById('DetailtimeOnModal').innerHTML = time;

          $(".modal").on("hidden.bs.modal", function(){
          $(".modal-body1").html("");
          });
          break;
          case 'Liabilities':
          $('#DetailsModal').modal("show");
          document.getElementById('label1onModal').innerHTML='Total Liabilities :';
          document.getElementById('DetailDateOnModal').innerHTML = date;
          document.getElementById('DetailtimeOnModal').innerHTML = time;

          $(".modal").on("hidden.bs.modal", function(){
          $(".modal-body1").html("");
          });
          break

          case 'Revenue':
          $('#DetailsModal').modal("show");
          document.getElementById('label1onModal').innerHTML='Total Revenue :';
          document.getElementById('DetailDateOnModal').innerHTML = date;
          document.getElementById('DetailtimeOnModal').innerHTML = time;

          $(".modal").on("hidden.bs.modal", function(){
          $(".modal-body1").html("");
          });
          break;

          case 'Expenses':
          $('#DetailsModal').modal("show");
          document.getElementById('label1onModal').innerHTML='Total Expenses :';
          document.getElementById('DetailDateOnModal').innerHTML = date;
          document.getElementById('DetailtimeOnModal').innerHTML = time;

          $(".modal").on("hidden.bs.modal", function(){
          $(".modal-body1").html("");
          });
          break;
      }
    });
    const labels1 = <?php echo json_encode($months) ?>;
    const datass1 = <?php echo json_encode($Sales) ?>;
    const labels2 = <?php echo json_encode($years) ?>;
    const datass2 = <?php echo json_encode($yearly_budget) ?>;
</script>
<!-- End of Modal -->
<?php include_once('layouts/footer.php'); ?>
