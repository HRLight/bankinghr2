<?php
  $page_title = 'Budget Releasing';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$total = 0;
$Btotal=0;
$row = join_tables_table();
$formodal = Collection_deposits();
$budget=Budget();
$Expenses=Expenses();
$Code = join_tables_table();
$Current_User = current_user();
$Status="";
$Tablename="";
$id=0;
$getlastid=max_id();
$Proposals_row = Proposals_table();
$Payables_row =all_Payables();
 ?>

<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">Budget Releasing</a>
</nav>
<!-- /Breadcrumb -->

<!-- Notification div -->
<div class="row">
  <div class="nav-wrapper position-relative mb-2">
    <ul class="nav nav-pills nav-fill flex-column flex-md-row bg-light" id="tabs-text" role="tablist">
        <li class="nav-item fw-bold" style="background-color: #2B547E;">
            <a class="nav-link mb-sm-3 mb-md-0 active border bg-gradient text-light" id="tabs-text-1-tab" data-bs-toggle="tab" href="#tabs-text-1" role="tab" aria-controls="tabs-text-1" aria-selected="true">Budget Releasing</a>
        </li>
        <li class="nav-item fw-bold" style="background-color: #2B547E;">
            <a class="nav-link mb-sm-3 mb-md-0 border bg-gradient text-light" id="tabs-text-2-tab" data-bs-toggle="tab" href="#tabs-text-2" role="tab" aria-controls="tabs-text-2" aria-selected="false">Budget Proposals</a>
        </li>
        <li class="nav-item fw-bold" style="background-color: #2B547E;">
            <a class="nav-link mb-sm-3 mb-md-0 border bg-gradient text-light" id="tabs-text-3-tab" data-bs-toggle="tab" href="#tabs-text-3" role="tab" aria-controls="tabs-text-3" aria-selected="false">Payables</a>
        </li>
    </ul>
</div>

   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<!-- End Notification div -->

<!-- start of card 1 -->
<div class="card border-0">
    <div class="card-body p-0">
        <div class="tab-content" id="tabcontent1">
            <div class="tab-pane fade show active" id="tabs-text-1" role="tabpanel" aria-labelledby="tabs-text-1-tab">
              <div class="col-md-12 mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12 mb-3">
                        <div class="card">
                          <div class="card-header bg-gradient" style="background-color: #2B547E;">
                            <span class="badge rounded-pill bg-success" style="font-size:14px;"><i class="bi bi-table"></i> Budget Releasing </span>
                            <ul class="nav navbar-nav" style="float:right">
                              <?php foreach ($Code as $Code):  ?>
                                <?php
                                $id=$Code['P_Code'];
                                $Status= $Code['Name'];
                                $Tablename=$Code['P_Tablename']; ?>
                              <?php endforeach; ?>
                            </ul>
                         <div class="text-center text-white">
                           <strong>
                             <?php foreach ($Expenses as $Expenses): ?>
                             <i class="bi bi-list-columns-reverse"></i>
                             <span class="fs-5">Expenses: <span class="rounded bg-danger text-white"> &nbsp; <?php echo number_format($Expenses['Expenses'], 2, '.', ','); ?> &nbsp;</span></span>
                             <?php endforeach; ?>
                             &nbsp;&nbsp;&nbsp;
                              <?php foreach ($budget as $budget): ?>
                                <i class="bi bi-cash-coin"></i>
                               <span class="fs-5">Total Budget: <span class="rounded bg-dark text-white"> &nbsp;<?php echo number_format($budget['Budget'], 2, '.', ',');?> &nbsp;</span></span>
                           <?php endforeach; ?>
                           </strong>
                         </div>
                          </div>
                          <div class="card-body">
                            <div class="table-responsive">
                              <table
                                id="example"
                                class="table table-striped data-table"
                                style="width: 100%" >
                              <thead>
                                <tr class="bg-success bg-gradient text-light">
                                  <th>Department</th>
                                  <th>Requestor</th>
                                  <th>Purpose</th>
                                  <th>Amount</th>
                                  <th>Code</th>
                                  <th> Date </th>
                                  <th>Status</th>
                                  <th>Action</th>
                               </tr>
                              </thead>
                             <tbody>
                              <?php foreach ($row as $row):  ?>

                                <?php if ($row['Name'] === 'Approved' ):?>
                                  <tr>
                                  <td><?php echo $row['P_Department']; ?></td>
                                  <td><?php echo $row['P_Requestor']; ?></td>
                                  <td><?php echo $row['P_Purpose']; ?></td>
                                  <td>₱<?php echo number_format($row['P_Amount'], 2, '.', ','); ?></td>
                                  <td><?php echo $row['P_Code']; ?></td>
                                  <td><?php echo $row['P_Date']; ?></td>
                                  <td>
                                    <span class="badge rounded-pill bg-primary bg-gradient"><?php echo $row['Name']; ?></span>
                                  </td>
                                  <td>
                                  <button type="submit" style="background-color:#008080; color: #ffffff;" class="btn Releasing" data-trans="<?php echo $row['P_Purpose']; ?>" data-id="<?php echo $row['P_Code']; ?>" data-tbl="<?php echo $row['P_Tablename']; ?>" data-amount="<?php echo $row['P_Amount']; ?>">
                                    <i class="bi bi-wallet-fill"></i> Release</button>
                                   </td>
                                   </tr>
                                <?php endif; ?>
                               <?php endforeach; ?>
                           </tbody>
                           <tfoot>
                             <tr>
                               <th>Department</th>
                               <th>Requestor</th>
                               <th>Purpose</th>
                               <th>Amount</th>
                               <th>Code</th>
                               <th> Date </th>
                               <th>Status</th>
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

                       <!-- Modal Start -->
                       <!-- Modal first start -->
                      <div class="modal fade" id="ReleaseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog modal-dialog-centered">
                               <div class="modal-content">
                                 <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLabel">Release Confirmation</h5>
                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                 </div>
                                <div class="modal-body">
                                 <div class='ModalTOpContent container-fluid'>
                                <!-- AJAX Content output here-->
                                </div>
                                <hr>
                                <form action="Settle_Process.php" method="post">
                                <div class='form-group'>
                                  <label for='description' class='control-label'>Description</label>
                                  <input type="text" name="user_name" value="<?= $Current_User['name']; ?>" hidden>
                                <textarea name='descriptionReleasing' class='form-control form-control-sm rounded-0' placeholder="Enter a Description for journal.." required></textarea>
                                </div>
                                <div  class='form-group'>
                                <label for='status' class='control-label'>Mode of Payment</label>
                                  <select name='MOFP' id='status' class='form-control form-control-border' required>
                                  <option value='Cheque' >Cheque</option>
                                  <option value='Cash' >Cash</option>
                                  <option value='Partial' >Partial Payment</option>
                                  </select>
                                  <br>

                                </div>
                                <div class="form-group">
                                  <label for='partial' class='control-label'>Partial Payment Amount : </label>
                                  <input class='partial' type="hidden" name="Amount_Partial" id="PartialAmount" value=""/>
                                </div>
                               </div>
                                <div class='modal-footer'>
                                <input type="hidden" name="DataID" id="RespID" value="" />
                                <input type="hidden" name="TableName" id="Table" value="" />
                                <input type="hidden" name="Amount" id="AmountIP" value="" />
                                <input type="hidden" name="TransactionName" id="TransactionID" value="" />
                                <?php foreach ($getlastid as $value): ?>
                                    <input type="hidden" name="max_id" value="<?php echo $value['auto_increment']; ?>"/>
                                <?php endforeach; ?>
                                <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Close</button>
                                <button type='submit' name='Settle' class='btn btn-success bg-gradient'>Confirm</button>
                                </div>
                                </form>
                              </div>
                              </div>
                              </div>
                       <!-- Modal first End -->

                       <!-- Modal second End -->
                     <div class="modal fade" id="PartialModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                       <div class="modal-dialog modal-dialog-centered">
                         <div class="modal-content">
                           <div class="modal-header bg-info bg-gradient">
                             <h5 class="modal-title" id="exampleModalToggleLabel2"><i class="bi bi-bank2 text-dark"></i> Partial Payment</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                             Please Enter amount.
                             <hr>
                             <label for='amount' class='control-label'>Amount : ₱</label>
                             <input id="amountPartial" class="amount" type="text" name="amount" value=" ">
                           </div>
                           <div class="modal-footer">
                             <button id="doneAmount" class="btn btn-success" data-bs-target="#ReleaseModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="bi bi-check-square-fill"></i> done</button>
                           </div>
                         </div>
                       </div>
                     </div>
                     <!-- Modal second End -->
                </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="tabs-text-2" role="tabpanel" aria-labelledby="tabs-text-2-tab">
          <div class="card-body p-0">
              <div class="tab-content" id="tabcontent1">
                  <div class="tab-pane fade show active" id="tabs-text-1" role="tabpanel" aria-labelledby="tabs-text-1-tab">
                    <div class="col-md-12 mb-3">
                      <div class="card">
                        <div class="card-header">
                          <span class="badge rounded-pill bg-success bg-gradient" style="font-size:14px;"><i class="bi bi-table"></i> Proposals List</span>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table
                              id="example"
                              class="table table-striped data-table"
                              style="width: 100%" >
                              <thead>
                                <tr class="bg-success bg-gradient text-light">
                                  <th>#</th>
                                  <th>Department</th>
                                  <th>Date</th>
                                  <th>Status</th>
                                  <th class="text-center">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($Proposals_row as $Proposals_row): ?>
                               <tr>
                               <td><?php echo $Proposals_row['Co_Code']; ?></td>
                               <td><?php echo $Proposals_row['PR_Department']; ?></td>
                               <td><?php echo $Proposals_row['PR_Date']; ?></td>
                               <td><span class="badge rounded-pill bg-danger bg-gradient"><?php echo remove_junk($Proposals_row['Status']); ?></span></td>
                               <td class="text-center">
                                   <a href="ProposalDetails.php?Code=<?php echo $Proposals_row['Co_Code']; ?>" class="btn btn-success bg-gradient btn-viewReciept"><i class="bi bi-file-earmark-post-fill"></i> Details</a>
                                   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ApproveModal">
                                    <i class="bi bi-check2-circle"></i>
                                   Approve
                                   </button>
                                <button type="button" class="btn btn-danger bg-gradient" data-bs-toggle="modal" data-bs-target="#DeclineModal"><i class="bi bi-slash-square-fill"></i> Decline</button>
                               </td>
                                </tr>
                               <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                              <tr>
                                <th>#</th>
                                <th>Department</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                        </div>
                        </div>
                        </div>
                  </div>
                  </div>
                  </div>
        </div>
        <div class="tab-pane fade" id="tabs-text-3" role="tabpanel" aria-labelledby="tabs-text-3-tab">
          <div class="card-body p-0">
              <div class="tab-content" id="tabcontent1">
                  <div class="tab-pane fade show active" id="tabs-text-1" role="tabpanel" aria-labelledby="tabs-text-1-tab">
                    <div class="col-md-12 mb-3">
                      <div class="card">
                        <div class="card-header">
                          <span class="badge rounded-pill bg-success bg-gradient" style="font-size:14px;"><i class="bi bi-table"></i>List of Payables</span>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table
                              id="example"
                              class="table table-striped data-table"
                              style="width: 100%" >
                              <thead>
                                <tr class="bg-success bg-gradient text-light">
                                  <th>Ref. Code</th>
                                  <th>Name</th>
                                  <th>Description</th>
                                  <th>Status</th>
                                  <th>Date</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php foreach ($Payables_row as $value): ?>
                               <tr>
                               <td><?= $value['P_Ledger_Code']; ?></td>
                               <td><?= $value['P_Name']; ?></td>
                               <td><?= $value['P_Desc']; ?></td>
                               <td><span class="badge rounded-pill bg-danger bg-gradient"></span></td>
                                <td><?php $value['P_date']; ?></td>
                                <td> <a href="" class="btn btn-success bg-gradient btn-viewReciept"><i class="bi bi-file-earmark-post-fill"></i> Release</a></td>
                              </tr>
                              <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                              <tr>
                                <th>Collection Code</th>
                                <th>Account Name</th>
                                <th>Account Number</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                        </div>
                        </div>
                        </div>
                  </div>
                  </div>
                  </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="ApproveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Please check thoroughly action irreversible!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
          Confirm Proposal? Do you want to Approve proposal?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <form action="BudgetProposalProcess.php?id=<?php echo $Proposals_row['Co_Code']. "&Tablename=". urlencode('Proposals');?>" method="post">
           <button type="submit" name="save" class="btn btn-warning bg-gradient btn-viewReciept"><i class="bi bi-check-circle-fill"></i> Approve</button>
           </form>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="DeclineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header bg-danger bg-gradient">
      <h5 class="modal-title text-white" id="exampleModalLongTitle">Decline Confirmation</h5>
      <button type="button" class="btn-close bg-secondary" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form method="post" action="BudgetProposalProcess.php?id=<?php echo $Proposals_row['Co_Code']. "&Tablename=". urlencode('proposals');?>">
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
       $('.Releasing').click(function(){
           var Release_id = $(this).data('id'); //Get value from data id
           var Release_tbl = $(this).data('tbl'); //Get value from data table
           var Release_amount = $(this).data('amount');
           var Trans = $(this).data('trans');
           $.ajax({
               url: 'ajax.php',
               type: 'post',
               data: {Release_id: Release_id, Release_tbl: Release_tbl},
               success: function(response){
                   // Add response in Modal body
                   $('.ModalTOpContent').html(response);
                   // Display Modal
                   $('#ReleaseModal').modal('show');

                   document.getElementById('RespID').value = Release_id;
                   document.getElementById('Table').value = Release_tbl;
                   document.getElementById('AmountIP').value = Release_amount;
                   document.getElementById('TransactionID').value = Trans;

               }
           });
       });
   });
   $('#status').change(function() { //jQuery Change Function
           var opval = $(this).val(); //Get value from select element
            if(opval=="Partial"){ //Compare it and if true
                $('#PartialModal').modal("show"); //Open Modal
                $('#ReleaseModal').modal("hide");

                 $('#doneAmount').click(function(){
                  let inputVal = $("#amountPartial").val(); // get value of the input field

                   $("#PartialAmount").val(inputVal).prop('type','text'); // put the value to another input field

                });

              }
       });

   </script>




<?php include_once('layouts/footer.php'); ?>
