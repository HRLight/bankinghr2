<?php
  $page_title = 'Cash Transaction / DEPOSIT';
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
                        <h4>DEPOSIT
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
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="client_id" value="<?= $client['id']; ?>">
                                    <div class="mb-3">
                                        <label>Account Number</label>
                                        <input type="text" name="name" value="<?=$client['account_number'];?>" class="form-control" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label>Name</label>
                                        <input type="text" name="name" value="<?=$client['firstname'];?> <?=$client['middlename'];?> <?=$client['lastname'];?>" class="form-control" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label>Savings</label>
                                        <input type="text" class="form-control" id="savings" name="current_savings" value="<?=$client['savings'];?>" readonly>

                                    </div>
                                    <div class="mb-3">
                                        <label>Deposit Amount</label>
                                        <input type="number" step='any' max = "400000" min = "100" class="form-control col-sm-6 text-right" name="savings" value="0" required>
                                    </div>
                                    
<hr>
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
        <button type="submit" name="deposit_savings" class="btn btn-primary">
                                            Deposit
                                        </button>
      </div>
    </div>
  </div>
</div>

<!-- -----------------MODAL---------------------- -->
<!--       <div class="modal-footer">
        <button type="submit" name="deposit_savings" class="btn btn-primary">
                                            Update client
                                        </button>
      </div> -->
    </div>
  </div>
</div>




                                    
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
            </div>
        </div>
    </div>
<!-- End of Data table  -->

<?php include_once('layouts/footer.php'); ?>
