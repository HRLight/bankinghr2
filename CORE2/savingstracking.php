<?php
  $page_title = 'Savings Tracking';
  require_once('includes/load.php');
      require 'dbcon.php';
  // Checkin What level user has permission to view this page

?>

<?php include_once('layouts/header.php'); ?>


<!-- Data table start -->
<div class="row">
  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Savings Tracking</span>
<?php include('message.php'); ?>
      </div>
      <div class="card-body">
                        <colgroup>
                    <col width="5%">
                    <col width="15%">
                    <col width="20%">
                    <col width="10%">
                    <col width="25%">
                    <col width="15%">
                    
                </colgroup>
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
          <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Reference no.</th>
                        <th>Account #</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Transaction</th>
                        <th>Date Created</th>
                        <th>Action</th>
                    </tr>
          </thead>
                <tbody>
                    <?php 
                    $i = 1;
                        $qry = $con->query("SELECT t.*,concat(a.lastname,', ',a.firstname, a.middlename) as `name`,a.account_number from `transactions` t inner join `core2_accounts` a on a.id = t.client_id order by unix_timestamp(t.date_created) desc ");
                        while($row = $qry->fetch_assoc()):
                    ?>
                    
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td><?php echo $row['reference_no'] ?></td>
                            <td><?php echo $row['account_number'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td class='text-right'>₱<?php echo number_format($row['amount'],2) ?></td>
                            <td><?php echo $row['remarks'] ?></td>
                            <td><?php echo $row['date_created'] ?></td>
                            <td>
                            <div class="form-group">                                                    
                              <a href="savingstracking_view.php?id=<?php echo $row['client_id'].'&date='.$row['date_created'] ?>" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a></td> </div>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
         <tfoot>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Reference no.</th>
                        <th>Account #</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Transaction</th>
                        <th>Date Created</th>
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
