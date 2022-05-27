<?php
  $page_title = 'Budget Request';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Budget Request</a>
</nav>
<!-- /Breadcrumb -->

<div class="container">
  <div class="card">
    <div class="card-body">
            <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                          <div class="row">
                            <div class="col-md-6" style="line-height: 35px;">
                              <span class="card-title" style="font-size:16px;"><i class="bi bi-table"></i> All Past Request</span>
                            </div>
                              <div class="col-md-6 text-end">
                                  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#JournalsModal">
                                   <i class="bi bi-plus-circle-fill"></i>
                                     Create Request
                                   </button>
                              </div>
                          </div>
                      </div>
                        <div class="card-body">
                            <div class="table-responsive m-t-40">
                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Requestor</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>Requestor</th>
                                          <th>Date</th>
                                          <th>Amount</th>
                                          <th>Description</th>
                                          <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                      <?php $sql = $db->query("SELECT * FROM budget_request WHERE Co_Status = '101';");
                                        while($row = $sql->fetch_assoc()): ?>
                                        <tr>
                                            <td><?= $row['Requestor']; ?></td>
                                            <td><?= $row['Date']; ?></td>
                                            <td><?=  number_format($row['Amount'], 2, '.', ',');  ?></td>
                                            <td><?= $row['Date']; ?></td>
                                            <td>Action Area</td>
                                        </tr>
                                      <?php endwhile; ?>
                                    </tbody>
                                </table>
                              </div>
                          </div>
                      </div>
                    </div>
                </div>
              </div>
          </div>
    </div>

            <!-- Modal -->
            <div class="modal fade bd-example-modal-xl" id="JournalsModal">
              <div class="modal-dialog-centered modal-dialog modal-l" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-dark bg-gradient text-white">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add new Entry</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                       <div class="col">
                         <!-- Start of Form -->
                         <div class="card card-outline-info">
                             <div class="card-header bg-success bg-gradient">
                                 <h4 class="m-b-0 text-white">Request Information</h4>
                             </div>
                             <div class="card-body">
                                     <div class="form-body">
                                         <h5 class="box-title m-t-15">Account Info</h5>
                                         <hr class="m-t-0 m-b-40">
                                         <form method="POST" action="Process.php">
                                         <label class="control-label text-right col-md-5" style="font-weight:bold;">Amount:</label>
                                         <div class="col-md-12">
                                           <div class="form-group">
                                               <div class="input-group">
                                                   <input type="number" name="B_Amount" class="form-control" id="exampleInputEmail2" placeholder="Enter Amount">
                                                   <div class="input-group-addon"><i class="ti-email"></i></div>
                                               </div>
                                           </div>
                                        </div>
                                        <br>
                                         <div class="row">
                                           <div class="col-md-12">
                                               <div class="form-group row">
                                                   <label class="control-label text-right col-md-5" style="font-weight:bold;">Request Description:</label>
                                                   <div class="form-group">
                                                       <div class="input-group">
                                                        <textarea name="B_Description" rows="8" cols="80"></textarea>
                                                         <div class="input-group-addon"><i class="ti-email"></i></div>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                         </div>
                                         <!--/row-->
                                         <br>
                                         <h5 class="box-title">Entry Info</h5>
                                         <hr class="m-t-0 m-b-40">
                                         <div class="row">
                                           <div class="col-md-12">
                                               <div class="form-group row">
                                                   <label class="control-label text-right col-md-5" style="font-weight:bold;">Entry Date:</label>
                                                   <div class="form-group">
                                                       <div class="input-group">
                                                         <?php   $date = date('Y-m-d H:i:s'); ?>
                                                           <input type="text" name="date" value="<?= $date;  ?>" class="form-control" id="exampleInputpwd2" placeholder="Enter pwd" disabled>
                                                           <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="form-group row">
                                                   <label class="control-label text-right col-md-5" style="font-weight:bold;">Requestor:</label>
                                                   <div class="form-group">
                                                       <div class="input-group">
                                                         <?php   $cur_user=current_user();
                                                          $PersonName= remove_junk(ucfirst($user['name']));?>
                                                           <input type="text" name="B_name" value="<?= $PersonName;  ?>" class="form-control" id="exampleInputpwd2" placeholder="Enter pwd" disabled>
                                                           <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                         </div>
                                         <br>
                                         <!--/row-->
                                     <div class="form-actions">
                                         <div class="row">
                                             <div class="col-md-6">
                                                 <div class="row">
                                                   <div class="col-md-offset-3 col-md-9">
                                                       <button type="submit" name="Save_Request" id="add_to_list" class="btn btn-primary bg-gradient"> <i class="bi bi-download"></i> Save</button>
                                                   </div>
                                                 </div>
                                             </div>

                                         </div>
                                     </div>
                                 </form>
                             </div>
                         </div>
                         <!-- End of Form -->
                       </div>
                      </div>

                  </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        <!-- End of Modal -->

<?php include_once('layouts/footer.php'); ?>
