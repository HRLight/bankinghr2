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
    

    <title>client View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>View Details 
                            <a href="savingstracking.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php 
                    $i = 1;
                    $id = $_GET['id'];
                     $date = $_GET['date'];

                        $qry = $con->query("SELECT t.*,concat(a.lastname,', ',a.firstname, a.middlename) as `name`,a.* from `transactions` t inner join `core2_accounts` a on a.id = t.client_id WHERE a.id = '$id' AND t.date_created = '$date' order by unix_timestamp(t.date_created) desc ");
                        foreach($qry as $row)
                    ?>
                                 <div class="mb-3">
                                        <label>Reference no.</label>
                                        <p class="form-control">
                                            <?php echo $row['reference_no'] ?>
                                        </p>
                                    </div> 
                                     <div class="mb-3">
                                        <label>Account Number</label>
                                        <p class="form-control">
                                            <?php echo $row['account_number'] ?>
                                        </p>
                                    </div>                               
                                    <div class="mb-3">
                                        <label>client Name</label>
                                        <p class="form-control">
                                            <?php echo $row['name'] ?>
                                        </p>
                                    </div>
                                     <div class="mb-3">
                                        <label>Transaction</label>
                                        <p class="form-control">
                                            <?php echo $row['remarks'] ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Amount</label>
                                        <p class="form-control">
                                            <?php echo $row['amount'] ?>
                                        </p>
                                    </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    

</body>
</html>
<?php include_once('layouts/footer.php'); ?>
