 <?php include('includes/load.php'); 


include('layouts/user_header.php');?>




<div class="container-fluid">

 <div class="card shadow mb-3" >
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Claims</h6>
                       <div class="float-right">
                          
                             <a href="file_reimbursment.php?id=<?php echo $user['employee_id'] ?>" class="btn btn-primary btn-xs-block" type="button">
         <i class="fas fa-fw fa-plus"></i>
        File Reimbursement
         </a>
     </div>
     </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="20%">Filing Date</th>
                                            <th width="20%">Purpose</th>
                                            <th width="20%">Supplier</th>
                                            <th width="20%">Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody> 
            <?php $name = $user['first_name'].' '.$user['last_name'];
            $sql = "SELECT * FROM reimbursment WHERE Co_Desc = '$name'; ";
            $res = $db->query($sql);
            $att = $res->fetch_assoc();
            $row = $res->num_rows;

            if($row>0){ do { ?>
                                  <tr>
                                    <td><?php echo $att['Co_Date']; ?></td>
                                    <td><?php echo $att['Co_Purpose']; ?></td>
                                    <td><?php echo $att['Co_Supplier']; ?></td>
                                    <td>
                                        <?php 
                                        switch($att['Co_Status']){

                                            case 101:
                                            echo 'Approved';
                                            break;

                                            case 102:
                                            echo 'Pending';
                                            break;

                                            case 103:
                                            echo 'Settled';
                                            break;

                                            case 104:
                                            echo 'Credit';
                                            break;

                                            case 105:
                                            echo 'Debit';
                                            break;

                                            case 106:
                                            echo 'Ongoing';
                                            break;

                                            case 107:
                                            echo 'Awaiting';
                                            break;


                                        } ?></td>
                                   
                                      




                                  </tr> 

                              <?php }while($att = $res->fetch_assoc()); } ?>



                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

</div>


<?php include('layouts/user_footer.php'); ?>










