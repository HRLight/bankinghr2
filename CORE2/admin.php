<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>

<?php include_once('layouts/header.php'); ?>
<!-- Taking Array of Datas From Budget and putting to com Variable...-->



<!-- End of Loop-->

<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Dashboard</h3>
        <!-- <div class="card-tools">
            <a href="?page=accounts/manage_account" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
        </div> -->
    </div>
    <div class="card-body">
<div class="container-fluid">
<div class="row">

                    <?php 
                    $i = 1;
                        $qry = $db->query("SELECT t.*,concat(a.lastname,', ',a.firstname, a.middlename) as `name`,a.account_number from `transactions` t inner join `core2_accounts` a on a.id = t.client_id order by unix_timestamp(t.date_created) desc ");   
                    ?>
 <!-- //////////////////////////////////////////////////// -->
              <div class="col-md-3 mb-3">
                <div class="card bg-success text-white h-100">
                 <div class="card-body py-5 text-center"><h2>₱ <?php echo number_format($db->query("SELECT sum(savings) as total FROM core2_accounts")->fetch_assoc()['total']); ?></h2>
                    <h4><span><i class="bi bi-piggy-bank-fill"></i>  Total Savings</span></h4></div>
                  <div class="card-footer d-flex">                   
                  <a href="savingstracking.php"><span class="ms-auto text-white h-100">View Details 
                      <i class="bi bi-chevron-right"></i>
                    </span></a> 
                  </div>
                </div>
               </div>

               <div class="col-md-3 mb-3">
                <div class="card bg-primary text-white h-100">
                 <div class="card-body py-5 text-center"><h3> <?php echo number_format($db->query("SELECT * FROM core2_accounts")->num_rows); ?></h3><h4><span><i class="bi bi-piggy-bank-fill"></i>  Total Accounts</span></h4></div>
                  <div class="card-footer d-flex">                    
                  <a href="accounts.php"><span class="ms-auto text-white h-100">View Details 
                      <i class="bi bi-chevron-right"></i>
                    </span></a> 
                  </div>
                </div>
               </div>
      
        <?php  ?>
</div>
</div>
<!-- //////////////////////---DASH BOARD---////////////////////////////// -->
<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');

    require 'dbcon.php';
?>
<?php include_once('layouts/header.php'); ?>



    <title>List of Clients</title>

<!-- Data table start -->
<div class="row">
  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>List Of Clients</span>

      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
          <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Account Number</th>
                                    <th>client Name</th>
                                    <th>Savings</th>
                                    <th>Email</th>
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
                                                <td><?php echo $i++; ?></td>
                                                <td><?= $client['account_number']; ?></td>
                                                <td><?= $client['firstname']; ?> <?= $client['middlename']; ?> <?= $client['lastname']; ?></td>
                                                <td>₱<?= $client['savings']; ?></td>
                                                <td><?= $client['email']; ?></td>

                                                <td>
                                                    <a href="client-view.php?id=<?= $client['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <!--<a href="client-edit.php?id=<?= $client['id']; ?>" class="btn btn-success btn-sm">Edit</a>-->
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
                                    <th>#</th>
                                    <th>Account Number</th>
                                    <th>client Name</th>
                                    <th>Savings</th>
                                    <th>Email</th>
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

