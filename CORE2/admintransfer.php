<?php
  $page_title = 'Cash Transaction / TRANSFER';
  require_once('includes/load.php');
    require 'dbcon.php';
?>
<?php include_once('layouts/header.php'); ?>



   <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>TRANSFER MONEY
                            <a href="cashtransaction.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $client_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM core2_accounts WHERE id='$client_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $client = mysqli_fetch_array($query_run);
                                ?>
                <input type="hidden" name="id" value='<?php echo isset($client_id)? $client_id : '' ?>'>
                <div class="row">
                    <div class="col-md-6 border-right">
                        <div class="form-group">
                            <label class="control-label">Account Number </label>
                            <input type="text" class="form-control col-sm-6" name="account_number" value="<?= $client['account_number']; ?>"readonly>
                        </div>
                        <hr>
                        <div class="form-group">
                            <input type="hidden" name="client_id" value="">
                            <label class="control-label">Name</label>
                            <input type="text" class="form-control" id="name"  name="name" value="<?=$client['firstname'];?> <?=$client['middlename'];?> <?=$client['firstname'];?>" class="form-control" readonly> 
                        </div>
                        <div class="form-group">
                            <label class="control-label">Savings</label>
                            <input type="text" class="form-control" id="balance" name="savings" value="₱ <?=$client['savings'];?>" readonly>
                        </div>
                    </div>
                        <div class="col-md-6">
                             <form class="form-group" method="POST" action="code.php">
                                <label>Input Recipients Account Number</label><br>
                              <input type="number" placeholder="Input Account no..." name="get_account" required>

                              <input type="hidden" name="cid" value="<?php echo $client_id ?>">
                              <button type="submit" name="search_transfer" class="btn btn-outline-primary">search</button>
                            </form>

                        <hr>
                        <div class="form-group">
                            <?php
                            $cid = $_GET['cid'];
                            $sql = "SELECT id,savings,account_number,concat(lastname,', ',firstname,' ',middlename) as name FROM `core2_accounts` WHERE account_number = '{$cid}' ";
                            $res = $db->query($sql);
                            $tran  = $res->fetch_assoc();
                            $row = $res->num_rows;

                             ?>
                            <input type="hidden" name="transfer_id" value="">
                            <label class="control-label">Name</label>
                            <input type="text" class="form-control" id="transfer_name"  name="transfer_name" value="<?php if($row>0){ echo $tran['name']; } ?>" readonly>
                        </div>
                    </div>
                </div>
                
                <hr>
                <div class="form-group">
                    <form action="code.php" method="POST">
                    <label class="control-label">Transfer Amount</label>
                    <input type="number" step='any' min = "100" class="form-control col-sm-6 text-right" name="balance" value="0" required>
                    <input type="hidden" name="from" value="<?php echo $client['account_number']; ?>">
                    <input type="hidden" name="to" value="<?php if($row>0){ echo $tran['account_number'];} ?>">
                    <input type="hidden" name="peranifrom"  value="<?php echo $client['savings']; ?>">
                    <input type="hidden" name="peranito" value="<?php if($row>0){ echo $tran['savings'];} ?>">
                    <input type="hidden" name="id" value="<?php echo $client_id; ?>">
                    <input type="hidden" name="c_id" value="<?php if($row>0){ echo $tran['id'];} ?>">
                </div><hr>
            
<!-- -----------------MODAL---------------------- -->
<!-- Button trigger modal -->
<div class="mb-3">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Continue
</button>
                                    </div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CONFIRMATION</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

          <p>The recipient's registered name is shown for validation. Please make sure that information is correct. </p>  <br>  

          <strong>We cannot reverse the transaction once submitted </strong>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="transfer_money" class="btn btn-primary">
                                            Transfer    
                                        </button>
      </div>
    </div>
  </div>
</div>

<!-- -----------------MODAL---------------------- -->
                                </form>
                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
        </div>
    </div>
<!-- -----------------MODAL---------------------- -->




                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End of Data table  -->

<?php include_once('layouts/footer.php'); ?>
