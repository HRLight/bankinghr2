<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   require 'dbcon.php';
?>


<?php include_once('layouts/header.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    

    <title>View Consolidation</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Consolidation 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
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
                                <div class="text-center">
                                <h2><strong class="text-center">Statement of Accounts</strong></h2><hr>
                                <p><?=$client['date_created'];?> to <?=$client['date_updated'];?></p>
                                <hr>
                            </div>
<div class="row">
  <div class="col-sm-4">
    <div class="card">
        <div class="card-header"><strong>Account Summary</strong> </div>
            <div class="card-body">
                 <label>Account Number : <?=$client['account_number'];?></label><br>
                 <label>Name : <?=$client['firstname'];?> <?=$client['middlename'];?>  <?=$client['lastname'];?></label><br>
                 <label>Email : <?=$client['email'];?></label> <br>
                 <label>Savings : <?=$client['savings'];?></label>
            </div>                                        
    </div>
</div>


                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>

<br>
   <div class="card">
                        <table  class="table table-striped data-table thead-primar" style="width: 100%">
                             <thead class="thead-dark">
                                <tr>
                                    <th>Date</th>
                                    <th>Transaction</th>
                                    <th>Amount</th>
                                    <th>Payments</th>
                                    <th>Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                       <?php

                        if(isset($_GET['id']))
                        {
                            $client_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM transactions WHERE id='$client_id' ";
                            $query_run = mysqli_query($con, $query);
                            
                                if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row['date_created']; ?></td>
                                                <td><?= $row['remarks']; ?></td>
                                                <td><?php echo number_format($row['amount'],2) ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                }
                            ?>

                            </tbody>
            </table>
                </div>
            </div>
        </div>
    </div>

    
    

</body>
</html>
<?php include_once('layouts/footer.php'); ?>
