

<?php
  $page_title = 'Consolidation';
  require_once('includes/load.php');

    require 'dbcon.php';
?>
<?php include_once('layouts/header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consolidation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

   <style>
@media print{
	#button{
		display: none; !important;
	}
	.breadcrumbs{
		display: none; !important;
	}
	.topNavBar{
	    display: none; !important;
	}
	#card1{
	    display: none; !important;
	}
	#air{
		width: 800px;
		margin-right: 20%;
	}
}
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5" id="air">
                    <div class="card-header" id="card1">
                        <h4>Consolidation</h4>
                        <a href="cashtransaction.php" class="btn btn-danger float-end">BACK</a>
                        
                    </div>
                    <div class="card-body" id="card1">                
                        <form action="" method=""> 
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Account Number</label>
                                        <input type="text" name="account_number" value="<?php if(isset($_GET['account_number'])){ echo $_GET['account_number']; } ?>" class="form-control" required>
                                    </div>
                                </div>
</div> 
<!-- //////----  DATE -------------------------------------------------------------------------------- -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>

<!-- //////----  DATE -------------------------------------------------------------------------------- -->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Click to Filter</label> <br>
                                      <button type="submit" name="filter_date" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </tbody>
                         </table>
                    </div>
                </div>
                <br><hr><br>
                <form action="code.php" method="POST"><div class="card"> 
                
                    <div class="card-body"> 
                        <br>

                        <h1 class="card-title text-center"> Statement Of Accounts</h1>
                        <h6 class="card-subtitle mb-2 text-muted text-center">From <?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?> to <?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?></h6>


                    </div>                       
                    <div class="card-body">
                        <div class="card-body">
                        <table class="table table-borderd">
                        <tbody>
                            </div>
                            </div>

                <?php if(isset($_GET['account_number'])){
                    $account_number = $_GET['account_number'];
                    $query = "SELECT * FROM core2_accounts WHERE account_number = '$account_number' ";
                    $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0){
                            foreach($query_run as $row)
                              {
                               $id =$row['id'];?>
                    <div class="col-sm-5">
                      <div class="container sm-3">
                         <div class="card">
                           <div class="card-header"> Account Summary</div>
                             <div class="card-body">
                                <div class="row">
                                  <div class="col">
                                        <label>Account number :</label><br>
                                        <label>Name :</label><br>
                                        <label>Email :</label><br>
                                        <label>Savings :</label><br>
                                   </div>
                                <div class="col order-5">
                                    <label><?php if(isset($_GET['account_number'])){ echo $_GET['account_number']; } ?></label><br>
                                    <label><?= $row['lastname']; ?>,<?= $row['firstname']; ?> <?= $row['middlename']; ?></label><br>
                                    <label><?= $row['email']; ?></label><br>
                                    <label>₱<?= $row['savings']; ?></label><br>
 
                                </div>
                               </div>
                             </div>
                         </div>
                       </div>
                    </div>  


            </div>
                
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                }

                            ?>
                   
                               <table class="table table-borderd">
                            <thead class="table-dark">
                                <tr>
                                    <th>Date</th>
                                    <th>Reference no.</th>
                                    <th>Amount</th>
                                    <th>Transaction</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php 


                                if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                {
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];


                                    if(strlen($id)<1 AND strlen($from_date)<1 AND strlen($to_date)<1){
                                     $_SESSION['message'] = "Set Recepient";
                                     header("Location: consolidation_create.php");
                                    }else{

                                    $query = "SELECT * FROM transactions WHERE date_created BETWEEN '$from_date' AND '$to_date'  AND client_id = '$id' ";

                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row['date_created']; ?></td>
                                                <td><?= $row['reference_no']; ?></td>
                                                <td><?= $row['amount']; ?></td>
                                                <td><?= $row['remarks']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                }
                            }
                            ?>


                            </tbody>

                        </table>
                               <hr>
                          <tfoot>
                                        <div class="col-md-4">
                                    <div class="text-end">
									<button onclick="print()" id="button" class="btn btn-warning md-2"><i class="bi bi-file-post"></i> Print report</button>
									</div>
                                </div>
                       </tfoot>
                       </form>
                    </div>

                </div>
	


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include_once('layouts/footer.php'); ?>