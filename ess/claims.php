 <?php include('includes/load.php'); 


include('layouts/user_header.php');?>




<div class="container-fluid">

 <div class="card shadow mb-3" >
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Claims</h6>
                       <div class="float-right">
                          
                             <a href="apply_claim.php?id=<?php echo $user['employee_id'] ?>" class="btn btn-primary btn-xs-block" type="button">
         <i class="fas fa-fw fa-plus"></i>
        File Claim
         </a>
     </div>
     </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="20%">Type of Claim</th>
                                            <th width="20%">Filing Date</th>
                                            <th width="20%">Claiming Date</th>
                                            <th width="20%">Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody> 
            <?php $eid = $user['employee_id'];
            $sql = "SELECT * FROM claims WHERE employee_id = '$eid'; ";
            $res = $db->query($sql);
            $att = $res->fetch_assoc();
            $row = $res->num_rows;

            if($row>0){ do { ?>
                                  <tr>
                                    <td><?php echo $att['claim_type']; ?></td>
                                    <td><?php echo $att['filing_date']; ?></td>
                                    <td><?php echo $att['claiming_date']; ?></td>
                                    <td><?php echo $att['status'] ?></td>
                                   
                                      




                                  </tr> 

                              <?php }while($att = $res->fetch_assoc()); } ?>



                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

</div>














<?php include('layouts/user_footer.php'); ?>