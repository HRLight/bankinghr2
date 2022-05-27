<?php
  $page_title = 'List of deposits';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);

?>
<?php include_once('layouts/header.php'); ?>
<?php
$ExistingBudget = 0;
$PageName=$_GET['PageName'];
$id=$_GET['id'];
$Tablename=$_GET['Tablename'];
$row=find_table($Tablename, $id);
$budget=Budget();
 ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <!-- for Determining what page the user came from-->
  <?php if ($PageName=="procurment.php"): ?>
    <a href="procurement.php" class="breadcrumbs__item">List Of Procurments</a>
    <a href="#checkout" class="breadcrumbs__item is-active">Procurement Details</a>
  <?php elseif ($PageName=="Claims_reimbursment.php"): ?>
    <a href="Claims_reimbursment.php" class="breadcrumbs__item">List Of Reimbursment</a>
    <a href="#checkout" class="breadcrumbs__item is-active">Reimbursment Details</a>
  <?php elseif ($PageName=="Utilitie&Expenses.php"): ?>
    <a href="Utilitie&Expenses.php" class="breadcrumbs__item">List Of Utilities and Expenses</a>
    <a href="#checkout" class="breadcrumbs__item is-active">Expenses Details</a>
  <?php elseif ($PageName=="AccountsPayables.php"): ?>
    <a href="AccountsPayables.php" class="breadcrumbs__item">List Of Payables</a>
    <a href="#checkout" class="breadcrumbs__item is-active">Payables Details</a>
  <?php endif; ?>
</nav>
  <!-- for Determining what page the user came from-->

<!-- /Breadcrumb -->

<!-- Data table start -->
<div class="row">
  <!-- Notification div -->
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
  <!-- End Notification div -->
  <div class="row">
    <div class="col-md-12">
    <div class="col-8 mx-auto card">
     <h5 class="card-header" style="color:white; background-color: #2B547E;"><i class="bi bi-card-list"></i> Details
       <?php foreach ($budget as $key => $value): ?>
        <h6 class="card-header bg-success bg-gradient text-white text-center">Existing Budget : <?php echo number_format($value['Budget'], 2, '.', ','); ?></h6></h5>
        <?php $ExistingBudget = $value['Budget']; ?>
       <?php endforeach; ?>
     <div class="card-body">
           <div class="container">
            <div class="row">
              <!-- Procurment Details -->
            <?php if ($PageName=="procurment.php"): ?>
                <div class="col">
                      <h6 class="card-title">Request Code :</h6>
                      <p class="card-text"><?php echo (int)$row['Co_Code']; ?></p>
                      <hr>
                      <h6 class="card-title">Date :</h6>
                      <p class="card-text"><?php echo $row['PRO_Date']; ?></p>
                      <hr>
                      <h6 class="card-title">Department :</h6>
                      <p class="card-text"><?php echo $row['PRO_Department']; ?></p>
                      <hr>
                      <h6 class="card-title">Purpose :</h6>
                      <p class="card-text"><?php echo $row['PRO_Desc']; ?></p>
                </div>
                <div class="col">

                    <h6 class="card-title">Total amount :</h6>
                    <p class="card-text"><?php echo number_format($row['Co_Amount'], 2, '.', ','); ?></p>
                    <hr>
                    <h6 class="card-title">Requestor :</h6>
                    <p class="card-text"><?php echo $row['PRO_Requestor']; ?></p>
                    <hr>
                    <h6 class="card-title">Status :</h6>
                    <?php if ($row['Name']=="Pending"): ?>
                      <p class="card-text"><span class="badge rounded-pill bg-danger"><?php echo $row['Name']; ?></span></p>
                      <?php else: ?>
                      <p class="card-text"><span class="badge rounded-pill bg-primary"><?php echo $row['Name']; ?></span></p>
                    <?php endif; ?>
                    <hr>
                </div>
                <div class="col">
                  <h6 class="card-title">Supplier :</h6>
                  <p class="card-text"><?php echo $row['PRO_Supplier']; ?></p>
                  <hr>
                  <h6 class="card-title">address :</h6>
                  <p class="card-text"><?php echo $row['PRO_Address']; ?></p>
                  <hr>
                  <h6 class="card-title">City :</h6>
                  <p class="card-text"><?php echo $row['PRO_City']; ?></p>
                  <hr>
                  <h6 class="card-title">State :</h6>
                  <p class="card-text"><?php echo $row['PRO_Country']; ?></p>
                </div>
              </div>
            </div>
            <?php if ($row['Name']=="Pending"): ?>
                  <div class="card-footer">
                    <button type="button" class="creatReq btn btn-primary bg-gradient" data-Code="<?= $row['Co_Code']; ?>" data-tbl="procurment" data-bs-toggle="modal" data-bs-target="#CreateRequestModal"><i class="bi bi-pencil-square"></i> Create Request</button>
                    <a href="Purchase_order.php?id=<?php echo $row['Co_Code']. "&Tablename=". urlencode($Tablename)."&PageName=".urlencode('DisbursmentDetails.php')."&OldPageName=".urlencode($PageName); ?>" type="button" class="btn btn-success bg-gradient"><i class="bi bi-file-earmark-diff-fill"></i> Purchase Order</a>
                    <button type="button" class="btn btn-danger bg-gradient" data-Code="<?= $row['Co_Code']; ?>" data-tbl="procurment" data-bs-toggle="modal" data-bs-target="#DeclineModal"><i class="bi bi-slash-square-fill"></i> Decline</button>
                  </div>
              <?php endif; ?>
              <!-- End Of procurement Details -->
<!-- ======================================================================================================================================================================================================================== -->
            <!-- Expenses Details -->
          <?php elseif ($PageName=="Utilitie&Expenses.php"): ?>
                <div class="col">
                      <h6 class="card-title">Request Code :</h6>
                      <p class="card-text"><?php echo (int)$row['Co_Code']; ?></p>
                      <hr>
                      <h6 class="card-title">Date :</h6>
                      <p class="card-text"><?php echo $row['UE_date']; ?></p>
                      <hr>
                      <h6 class="card-title">Department :</h6>
                      <p class="card-text"><?php echo $row['UE_Department']; ?></p>
                      <hr>
                      <h6 class="card-title">Purpose :</h6>
                      <p class="card-text"><?php echo $row['UE_Desc']; ?></p>
                </div>
                <div class="col">

                    <h6 class="card-title">Total amount :</h6>
                    <p class="card-text"><?php  echo number_format($row['Co_Amount'], 2, '.', ',');  ?></p>
                    <hr>
                    <h6 class="card-title">Requestor :</h6>
                    <p class="card-text"><?php echo $row['UE_Requestor']; ?></p>
                    <hr>
                    <h6 class="card-title">Status :</h6>
                    <?php if ($row['Name']=="Pending"): ?>
                      <p class="card-text"><span class="badge rounded-pill bg-danger"><?php echo $row['Name']; ?></span></p>
                      <?php else: ?>
                      <p class="card-text"><span class="badge rounded-pill bg-primary"><?php echo $row['Name']; ?></span></p>
                    <?php endif; ?>
                    <hr>
                </div>
                <div class="col">
                  <h6 class="card-title">Supplier :</h6>
                  <p class="card-text"><?php echo $row['UE_Supplier']; ?></p>
                  <hr>
                  <h6 class="card-title">address :</h6>
                  <p class="card-text"><?php echo $row['UE_Address']; ?></p>
                  <hr>
                  <h6 class="card-title">City :</h6>
                  <p class="card-text"><?php echo $row['UE_City']; ?></p>
                  <hr>
                  <h6 class="card-title">State :</h6>
                  <p class="card-text"><?php echo $row['UE_Country']; ?></p>
                </div>
              </div>
            </div>
            <?php if ($row['Name']=="Pending"): ?>
              <div class="card-footer">
                 <button type="button" class="creatReq btn btn-primary bg-gradient" data-Code="<?= $row['Co_Code']; ?>" data-tbl="uexpenses" data-bs-toggle="modal" data-bs-target="#CreateRequestModal"><i class="bi bi-pencil-square"></i> Create Request</button>
                 <a href="Purchase_order.php?id=<?php echo $row['Co_Code']. "&Tablename=". urlencode($Tablename)."&PageName=".urlencode('DisbursmentDetails.php')."&OldPageName=".urlencode($PageName); ?>" type="button" class="btn btn-success bg-gradient"><i class="bi bi-file-earmark-diff-fill"></i> Purchase Order</a>
                 <button type="button" class="btn btn-danger bg-gradient" data-bs-toggle="modal" data-bs-target="#DeclineModal"><i class="bi bi-slash-square-fill"></i> Decline</button>
              </div>
            <?php endif; ?>
             <!-- End Expenses Details -->
<!-- ======================================================================================================================================================================================================================== -->
               <!-- Claims Details -->
          <?php elseif ($PageName=="Claims_reimbursment.php"): ?>
                <div class="col">
                      <h6 class="card-title">Request Code :</h6>
                      <p class="card-text"><?php echo (int)$row['Co_Code']; ?></p>
                      <hr>
                      <h6 class="card-title">Date :</h6>
                      <p class="card-text"><?php echo $row['Co_Date']; ?></p>
                      <hr>
                      <h6 class="card-title">Department :</h6>
                      <p class="card-text"><?php echo $row['Co_Source']; ?></p>
                      <hr>
                      <h6 class="card-title">Purpose :</h6>
                      <p class="card-text"><?php echo $row['Co_Purpose']; ?></p>
                </div>
                <div class="col">

                    <h6 class="card-title">Total amount :</h6>
                    <p class="card-text"><?php echo number_format($row['Co_Amount'], 2, '.', ','); ?></p>
                    <hr>
                    <h6 class="card-title">Requestor :</h6>
                    <p class="card-text"><?php echo $row['Co_Desc']; ?></p>
                    <hr>
                    <h6 class="card-title">Status :</h6>
                    <?php if ($row['Name']=="Pending"): ?>
                      <p class="card-text"><span class="badge rounded-pill bg-danger"><?php echo $row['Name']; ?></span></p>
                      <?php else: ?>
                      <p class="card-text"><span class="badge rounded-pill bg-primary"><?php echo $row['Name']; ?></span></p>
                    <?php endif; ?>

                    <hr>
                </div>
                <div class="col">
                  <h6 class="card-title">Supplier :</h6>
                  <p class="card-text"><?php echo $row['Co_Supplier']; ?></p>
                  <hr>
                  <h6 class="card-title">address :</h6>
                  <p class="card-text"><?php echo $row['Co_Address']; ?></p>
                  <hr>
                  <h6 class="card-title">City :</h6>
                  <p class="card-text"><?php echo $row['Co_City']; ?></p>
                  <hr>
                  <h6 class="card-title">State :</h6>
                  <p class="card-text"><?php echo $row['Co_Country']; ?></p>
                </div>
              </div>
            </div>
            <?php if ($row['Name']=="Pending"): ?>
              <div class="card-footer">
                 <button type="button" class="creatReq btn btn-primary bg-gradient" data-Code="<?= $row['Co_Code']; ?>" data-tbl="reimbursment" data-bs-toggle="modal" data-bs-target="#CreateRequestModal"><i class="bi bi-pencil-square"></i> Create Request</button>
                  <a href="Purchase_order.php?id=<?php echo $row['Co_Code']. "&Tablename=". urlencode($Tablename)."&PageName=".urlencode('DisbursmentDetails.php')."&OldPageName=".urlencode($PageName); ?>" type="button" class="btn btn-success bg-gradient"><i class="bi bi-file-earmark-diff-fill"></i> Purchase Order</a>
                  <button type="button" class="btn btn-danger bg-gradient" data-bs-toggle="modal" data-bs-target="#DeclineModal"><i class="bi bi-slash-square-fill"></i> Decline</button>
              </div>
            <?php endif; ?>
              <!-- End of Cliams Details -->
    <!-- ======================================================================================================================================================================================================================== -->

              <!-- start of Payables  Detail-->
              </details>
          <?php elseif ($PageName=="AccountsPayables.php" && $Tablename=="reimbursment"): ?>
                <div class="col">
                      <h6 class="card-title">Request Code :</h6>
                      <p class="card-text"><?php echo (int)$row['Co_Code']; ?></p>
                      <hr>
                      <h6 class="card-title">Date :</h6>
                      <p class="card-text"><?php echo $row['Co_Date']; ?></p>
                      <hr>
                      <h6 class="card-title">Department :</h6>
                      <p class="card-text"><?php echo $row['Co_Source']; ?></p>
                      <hr>
                      <h6 class="card-title">Purpose :</h6>
                      <p class="card-text"><?php echo $row['Co_Purpose']; ?></p>
                </div>
                <div class="col">

                    <h6 class="card-title">Total amount :</h6>
                    <p class="card-text"><?php echo number_format($row['Co_Amount'], 2, '.', ','); ?></p>
                    <hr>
                    <h6 class="card-title">Requestor :</h6>
                    <p class="card-text"><?php echo $row['Co_Desc']; ?></p>
                    <hr>
                    <h6 class="card-title">Status :</h6>
                    <?php if ($row['Name']=="Pending"): ?>
                      <p class="card-text"><span class="badge rounded-pill bg-danger"><?php echo $row['Name']; ?></span></p>
                      <?php else: ?>
                      <p class="card-text"><span class="badge rounded-pill bg-primary">Settled</span></p>
                    <?php endif; ?>
                    <hr>
                </div>
                <div class="col">
                  <h6 class="card-title">Supplier :</h6>
                  <p class="card-text"><?php echo $row['Co_Supplier']; ?></p>
                  <hr>
                  <h6 class="card-title">address :</h6>
                  <p class="card-text"><?php echo $row['Co_Address']; ?></p>
                  <hr>
                  <h6 class="card-title">City :</h6>
                  <p class="card-text"><?php echo $row['Co_City']; ?></p>
                  <hr>
                  <h6 class="card-title">State :</h6>
                  <p class="card-text"><?php echo $row['Co_Country']; ?></p>
                </div>
              </div>
            </div>

          <?php elseif ($PageName==="AccountsPayables.php" && $Tablename==="procurment"): ?>
                <div class="col">
                      <h6 class="card-title">Request Code :</h6>
                      <p class="card-text"><?php echo (int)$row['Co_Code']; ?></p>
                      <hr>
                      <h6 class="card-title">Date :</h6>
                      <p class="card-text"><?php echo $row['PRO_Date']; ?></p>
                      <hr>
                      <h6 class="card-title">Department :</h6>
                      <p class="card-text"><?php echo $row['PRO_Department']; ?></p>
                      <hr>
                      <h6 class="card-title">Purpose :</h6>
                      <p class="card-text"><?php echo $row['PRO_Desc']; ?></p>
                </div>
                <div class="col">

                    <h6 class="card-title">Total amount :</h6>
                    <p class="card-text"><?php echo number_format($row['Co_Amount'], 2, '.', ','); ?></p>
                    <hr>
                    <h6 class="card-title">Requestor :</h6>
                    <p class="card-text"><?php echo $row['PRO_Requestor']; ?></p>
                    <hr>
                    <h6 class="card-title">Status :</h6>
                    <?php if ($row['Name']=="Pending"): ?>
                      <p class="card-text"><span class="badge rounded-pill bg-danger"><?php echo $row['Name']; ?></span></p>
                      <?php else: ?>
                      <p class="card-text"><span class="badge rounded-pill bg-primary">Settled</span></p>
                    <?php endif; ?>
                    <hr>
                </div>
                <div class="col">
                  <h6 class="card-title">Supplier :</h6>
                  <p class="card-text"><?php echo $row['PRO_Supplier']; ?></p>
                  <hr>
                  <h6 class="card-title">address :</h6>
                  <p class="card-text"><?php echo $row['PRO_Address']; ?></p>
                  <hr>
                  <h6 class="card-title">City :</h6>
                  <p class="card-text"><?php echo $row['PRO_City']; ?></p>
                  <hr>
                  <h6 class="card-title">State :</h6>
                  <p class="card-text"><?php echo $row['PRO_Country']; ?></p>
                </div>
              </div>
            </div>
          <?php endif; ?>
       </div>
    </div>
    </div>
    </div>
      <!-- start of Rows  Detail-->
<!-- ======================================================================================================================================================================================================================== -->

    <!-- Modal -->
    <div class="modal fade" id="CreateRequestModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-success bg-gradient text-white">
            <h5 class="modal-title" id="staticBackdropLabel">Request Confirmation</h5>
            <button type="button" class="btn-close bg-secondary" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body ajaxmod">



          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger bg-gradient" data-bs-dismiss="modal">Close</button>
            <form method="post" action="Process.php?id=<?php echo $row['Co_Code']. "&Tablename=". urlencode($Tablename);?>">
            <button type="submit" name="approve" class="btn btn-success bg-gradient">Send</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- end of Modal decline -->

        <!-- Modal -->
    <div class="modal fade" id="DeclineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-danger bg-gradient">
            <h5 class="modal-title text-white" id="exampleModalLongTitle">Decline Confirmation</h5>
            <button type="button" class="btn-close bg-secondary" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="post" action="Process.php?id=<?php echo $row['Co_Code']. "&Tablename=". urlencode($Tablename);?>">
          <div class="modal-body">
            <h5>Please State Re-Evaluation reason.</h5>
            <div class="row">
                <textarea name="Re_Evaluation" rows="8" cols="80"></textarea>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger bg-gradient" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="Decline" class="btn btn-success bg-gradient">Send</button>
              </form>
            </div>
          </div>
        </div>
      </div>
        <script>
      $(document).ready(function(){
            $('.creatReq').click(function(){

                var Co_Code = $(this).data('code');
                var table_Dist = $(this).data('tbl');

                $.ajax({
                    url: 'ajax.php',
                    type: 'post',
                    data: {Co_Code: Co_Code, table_Dist: table_Dist},
                    success: function(response){
                        // Add response in Modal body
                        $('.ajaxmod').html(response);

                        // Display Modal
                        $('#CreateRequestModal').modal('show');

                        $("#CreateRequestModal").on("hidden.bs.modal", function(){
                        $(".ajaxmod").html("");
                        });
                    }
                });
            });
        });
        </script>


<?php include_once('layouts/footer.php'); ?>
