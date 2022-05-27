<?php
  $page_title = 'Cash Transaction';
  require_once('includes/load.php');
require 'dbcon.php';
?>
<?php include_once('layouts/header.php'); ?>
<?php  $query = "SELECT * FROM core2_accounts"; ?>


<!-- Data table start -->
<div class="row">
  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>Cash Transaction</span>
     <div class="text-end">
                            <a href="client-create.php" class="btn btn-primary float-end">Add clients</a>
     </div>
      </div>
      <div class="card-body">
                        <colgroup>
                    <col width="5%">
                    <col width="15%">
                    <col width="20%">
                    <col width="10%">
                    <col width="25%">

                    
                </colgroup>
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >

          <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Account Number</th>
                                    <th>Client Name</th>
                                    <th>Savings</th>
                                    <th>Action</th>
                                </tr>
          </thead>
         <tbody>
                                <?php 
                                    $query = "SELECT * FROM core2_accounts";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $client)
                                        {
                                            ?>
                                            
                                            <tr>
                                                <td><?= $client['id']; ?></td>
                                                <td><?= $client['account_number']; ?></td>
                                                <td><?= $client['firstname']; ?> <?= $client['middlename']; ?> <?= $client['lastname']; ?></td>
                                                <td>₱<?= $client['savings']; ?></td>

                                                <td>
                                                    <a href="admindeposit.php?id=<?= $client['id']; ?>" class="btn btn-info btn-sm">Deposit</a>
                                                    <a href="adminwithdraw.php?id=<?= $client['id']; ?>" class="btn btn-success btn-sm">Withdraw</a>
                                                    <a href="admintransfer.php?id=<?= $client['id'].'&cid='; ?>" class="btn btn-warning btn-sm">Transfer</a>
                                                    <a href="deposit.php?id=<?= $client['id']; ?>" class="btn btn-secondary btn-sm">Bank Transfer</a>
                                                    <a href="deposit.php?id=<?= $client['id']; ?>" class="btn btn-danger btn-sm">Pay Bills</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <!-- <button type="submit" name="delete_client" value="<?=$client['id'];?>" class="btn btn-danger btn-sm">Delete</button> -->
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
         </tbody>
         <tfoot>
           <tr>
                <th>ID</th>
                <th>Account Number</th>
                <th>Client Name</th>
                <th>Savings</th>
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
