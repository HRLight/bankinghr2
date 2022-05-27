<?php
  $page_title = 'Client Information';
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
    

    <title>client View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>View Client Information 
                            <a href="admin.php" class="btn btn-danger float-end">BACK</a>
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
                                     <div class="mb-3">
                                        <label>Account Number</label>
                                        <p class="form-control">
                                            <?=$client['account_number'];?>
                                        </p>
                                    </div>                               
                                    <div class="mb-3">
                                        <label>Name</label>
                                        <p class="form-control">
                                            <?=$client['firstname'];?> <?=$client['middlename'];?>  <?=$client['lastname'];?>
                                        </p>
                                    </div>
                                     <div class="mb-3">
                                        <label>Savings</label>
                                        <p class="form-control">
                                            <?=$client['savings'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <p class="form-control">
                                            <?=$client['email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Phone</label>
                                        <p class="form-control">
                                            <?=$client['phone'];?>
                                        </p>
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
                </div>
            </div>
        </div>
    </div>
    

</body>
</html>
<?php include_once('layouts/footer.php'); ?>
