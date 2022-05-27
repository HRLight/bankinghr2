
 <?php include('includes/load.php'); 


include('layouts/user_header.php');?>

<div class="container-fluid">

 <div class="card shadow mb-3" >
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Training Schedules</h6>
                       
     </div>
                        </div>
                        <div class="card-body ">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="20%">Title</th>
                                            <th width="20%">Date Start</th>
                                            <th width="20%">Date End</th>
                                            <th width="20%">Facilty/Location</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody> 
            <?php $eid = $user['employee_id'];
            $sql = "SELECT training_participants.*,training_sched.* FROM training_participants JOIN training_sched ON ";
            $sql .= "training_participants.t_id= training_sched.t_id WHERE training_participants.employee_id = '$eid' ";
            $res = $db->query($sql);
            $att = $res->fetch_assoc();
            $row = $res->num_rows;

            if($row>0){ do { ?>
                                  <tr>
                                    <td><?php echo $att['t_name']; ?></td>
                                    <td><?php echo $att['date_start']; ?></td>
                                    <td><?php echo $att['date_end']; ?></td>
                                    <td><?php echo $att['facility_name'] ?></td>
                                   
                                      




                                  </tr> 

                              <?php }while($att = $res->fetch_assoc()); } ?>



                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>





                    </div>


<?php include('layouts/user_footer.php'); ?>