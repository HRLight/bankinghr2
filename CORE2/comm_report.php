

<?php
  $page_title = 'Communication Management Report';
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
}</style>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5"id="card1">
                    <div class="card-header"id="card1">
                        <h4>Create Report</h4>
                        <a href="comm_management.php"  id="button" class="btn btn-danger float-end">BACK</a>
                    </div>
                    <div class="card-body">
                  
                        <form action="" method=""> 
                            <div class="row">
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label>Search Account Number</label>
                                        <input type="text" placeholder="Input Account no..."name="account_number" value="<?php if(isset($_GET['account_number'])){ echo $_GET['account_number']; } ?>" class="form-control" required></input>
                                    </div>
                                </div>
</div> 
<!-- //////----  DATE -------------------------------------------------------------------------------- -->


<!-- //////----  DATE -------------------------------------------------------------------------------- -->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <br>
                                      <button type="submit" name="filter_date" id="button" class="btn btn-primary">Search</button>
                                    </div>
                                </div>




                            </tbody>
                         </table>
                    </div>
                </div>
                <br><hr><br>
                <form action="code.php" method="POST"><div class="card"> 
                
                      
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

  <div class="mb-3">
    <h4>Communication Management Report</h4>
    
    <label for="exampleInputEmail1" class="form-label">Account Number :</label>
    <input type="text" class="form-control" id="account_number" value="<?php if(isset($_GET['account_number'])){ echo $_GET['account_number']; } ?>"  readonly>

        <label for="exampleInputEmail1" class="form-label">Name :</label>
    <input type="name" class="form-control" id="name"  value="<?= $row['lastname']; ?>,<?= $row['firstname']; ?> <?= $row['middlename']; ?>" readonly>

        <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" value="<?= $row['email']; ?>" readonly>
        <label for="exampleInputEmail1" class="form-label">Phone</label>
    <input type="text" class="form-control" id="savings" value="<?= $row['phone']; ?>"  readonly>

            <label for="exampleInputEmail1" class="form-label">Description :</label>
    <input type="text" class="form-control" id="description" value="">
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
                   
                             </tbody>

                        </table>
                               <hr>
                          <tfoot>
                                        <div class="col-md-4">
                                        <div class="col-md-4">
                                    <div class="text-end">
                                    <button onclick="print()" id="button" class="btn btn-warning md-2"><i class="bi bi-file-post"></i> Print report</button>
                                    </div>
                                </div>
                       </tfoot>
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