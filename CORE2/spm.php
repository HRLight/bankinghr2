<?php
  $page_title = 'Social Performance Monitoring';
  require_once('includes/load.php');

    require 'dbcon.php';
    page_require_level(1);
?>
<?php include_once('layouts/header.php'); ?>



    <title>List of Clients</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Social Performance Monitoring
                            <a href="client-create.php" class="btn btn-primary float-end">Add clients</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Account Number</th>
                                    <th>client Name</th>
                                    <th>Savings</th
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Date Created</th>
                                    
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
                                                <td><?= $client['savings']; ?></td>
                                                <td><?= $client['email']; ?></td>
                                                <td><?= $client['phone']; ?></td>
                                                <td><?= $client['date_created']; ?></td>
                                                
                                                

                                                <td>
                                                    <a href="client-view.php?id=<?= $client['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <!--<a href="client-edit.php?id=<?= $client['id']; ?>" class="btn btn-success btn-sm">Edit</a>-->
                                                    <!-- <a href="deposit.php?id=<?= $client['id']; ?>" class="btn btn-success btn-sm">deposit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_client" value="<?=$client['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form> -->
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
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include_once('layouts/footer.php'); ?>
