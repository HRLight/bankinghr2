 <?php include('includes/load.php'); 


include('layouts/user_header.php');?>




<div class="container-fluid">

 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daily Time Records</h6>
                        
                        <div class="float-right">
                           <?php $stat = check_working();
                           if($stat > 0){ ?>
                            <a href="time_out.php?id=<?php echo $user['employee_id'] ?>" class="btn btn-danger pull-left ml-2 ">TIME OUT</a>

                           <?php }else{ ?>
                             <a href="time_in.php?id=<?php echo $user['employee_id'] ?>" class="btn btn-success pull-left ml-2 ">TIME IN</a>
                         <?php } ?>
                             <a href="apply_dtr.php?id=<?php echo $user['employee_id'] ?>" class="btn btn-primary btn-xs-block" type="button">
         <i class="fas fa-fw fa-plus"></i>
          Add DTR
         </a>
     </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="20%">Date</th>
                                            <th width="20%">Time-IN</th>
                                            <th width="20%">Time-OUT</th>
                                            <th width="20%">Working Hours</th>
                                            <th width="20%">Status</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody> 
            <?php $eid = $user['employee_id'];
            $sql = "SELECT * FROM time_attendance WHERE employee_id = '$eid'";
            $res = $db->query($sql);
            $att = $res->fetch_assoc();
            $row = $res->num_rows;

            if($row>0){ do { ?>
                                  <tr>
                                    <td><?php echo $att['date']; ?></td>
                                    <td><?php echo $att['login_time']; ?></td>
                                    <td><?php echo $att['logout_time']; ?></td>
                                    <td><?php echo $att['calculated_work'].' Hours'; ?></td>
                                    <td><?php echo $att['status']; ?></td>
                                      




                                  </tr> 

                              <?php }while($att = $res->fetch_assoc()); } ?>



                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


 


</div>












<?php include('layouts/user_footer.php'); ?>