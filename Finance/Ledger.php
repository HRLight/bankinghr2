<?php
  $page_title = 'General Ledger';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);

?>
<?php include_once('layouts/header.php'); ?>

<?php
function format_num($number){
	$decimals = 0;
	$num_ex = explode('.',$number);
	$decimals = isset($num_ex[1]) ? strlen($num_ex[1]) : 0 ;
	return number_format($number,$decimals);
}
$from = isset($_GET['from']) ? $_GET['from'] : date("Y-m-d",strtotime(date('Y-m-d')." -1 week"));
$to = isset($_GET['to']) ? $_GET['to'] : date("Y-m-d");
?>
<style>
	th.p-0, td.p-0{
		padding: 0 !important;
	}
</style>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Reports</a>
</nav>
<!-- /Breadcrumb -->

<div class="card card-outline card-primary">
	<div class="card-header">
		<h5 class="card-title">General Ledger</h5>
		<div class="card-tools">
		</div>
	</div>
	<div class="card-body">
        <div class="callout border-primary shadow rounded-0">
            <h4 class="text-muted">Filter Date</h4>
            <form action="" id="filter">
            <div class="row align-items-end">
                <div class="col-md-4 form-group">
                    <label for="from" class="control-label">Date From</label>
                    <input type="date" id="from" name="from" value="<?= $from ?>" class="form-control form-control-sm rounded-0">
                </div>
                <div class="col-md-4 form-group">
                    <label for="to" class="control-label">Date To</label>
                    <input type="date" id="to" name="to" value="<?= $to ?>" class="form-control form-control-sm rounded-0">
                </div>
                <div class="col-md-4 form-group">
                  <button class="btn btn-default bg-primary bg-gradient text-white btn-flat btn-sm"><i class="fa fa-filter"></i> Filter</button>
                  <button class="btn btn-default bg-secondary bg-gradient text-white border btn-flat btn-sm" id="print" type="button"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
            </form>
        </div>
        <div class="container-fluid" id="outprint">
            <h3 class="text-center"><b><?= "Banking and Finance" ?></b></h3>
            <h5 class="text-center"><b>Income Statement</b></h5>
            <?php if($from == $to): ?>
            <p class="m-0 text-center"><?= date("M d, Y" , strtotime($from)) ?></p>
            <?php else: ?>
            <p class="m-0 text-center"><?= date("M d, Y" , strtotime($from)). ' - '.date("M d, Y" , strtotime($to)) ?></p>
            <?php endif; ?>
            <hr>
            <table class="table table-hover table-striped table-bordered">
              <colgroup>
    					<col width="50%">
              <col width="50%">
    				</colgroup>
    				<thead>
    					<tr>
    						<th>Revenue</th>
                <th class="p-0">
    							<div class="d-flex w-100">
    								<div class="col-6 border">2022</div>
    								<div class="col-3 border">2023</div>
    								<div class="col-3 border">2024</div>
    							</div>
    						</th>
    					</tr>
    				</thead>
      				<tbody>
                <?php
                  $Revenue = 0;
                  $Expenses = 0;
                 ?>
              <?php $IncomeStatement = $db->query("SELECT * FROM `income_statement`;");
                while($row = $IncomeStatement->fetch_assoc()): ?>
                <?php if ($row['Type'] == 1): ?>
                  <tr>
        						<td class="text-center"><?= $row['Name']; ?></td>
                    <td class="p-0">
                      <div class="d-flex w-100">
        								<div class="col-6 border"><?= $row['Amount']; ?></div>
        								<div class="col-3 border"></div>
        								<div class="col-3 border"></div>
        							</div>
        						</td>
        					</tr>
                  <?php $Revenue += $row['Amount']; ?>
                  <th>Expenses</th>
                <?php elseif($row['Type'] == 2): ?>
                  <tr>
        						<td class="text-center"><?= $row['Name']; ?></td>
                    <td class="p-0">
                      <div class="d-flex w-100">
        								<div class="col-6 border"><?= $row['Amount']; ?></div>
        								<div class="col-3 border"></div>
        								<div class="col-3 border"></div>
        							</div>
        						</td>
        					</tr>
                  <?php $Expenses += $row['Amount'];  ?>
                <?php endif; ?>
              <?php endwhile; ?>
      				</tbody>
              <tfoot>
                  <th class="text-center"></th>
                  <th class="text-right p-0">
                    <?php  $profit = $Revenue - $Expenses; ?>
                      <div class="d-flex w-50">
                          <div class="col-3 border text-center">Total Profit:</span></div>
                            <div class="col-3 border text-center"><?php echo number_format($profit, 2, '.', ','); ?></div>
                      </div>
                  </th>
              </tfoot>
      			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
          $('#filter').submit(function(e){
              e.preventDefault()
              location.href="Ledger.php?page=reports/trial_balance&"+$(this).serialize();
          })
	});
  $(document).ready(function(){
        $('#print').click(function(){
            var _h = $('head').clone();
            var _p = $('#outprint').clone();
            var el = $('<div>')
            _h.find('title').text('Trial Balance - Print View')
            _h.append('<style>html,body{ min-height: unset !important;}</style>')
            el.append(_h)
            el.append(_p)
             var nw = window.open("","_blank","width=900,height=700,top=50,left=250")
             nw.document.write(el.html())
             nw.document.close()
             setTimeout(() => {
                 nw.print()
                 setTimeout(() => {
                     nw.close()
                 }, 200);
             }, 500);
        })

    $('.table td,.table th').addClass('py-1 px-2 align-middle')
  })
</script>




<?php include_once('layouts/footer.php'); ?>
