 <?php include('includes/load.php'); 


include('layouts/user_header.php');?>

<div class="container-fluid">

<div class="card shadow mb-4" style="margin-top: 5vh;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Seminar Schedules</h6>
                       
     </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="20%">Title</th>
                                            <th width="20%">Date</th>
                                            <th width="20%">Facilty/Location</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody> 
            <?php $eid = $user['employee_id'];
            $sql = "SELECT seminar_participants.*,seminar_sched.* FROM seminar_participants JOIN seminar_sched ON ";
            $sql .= "seminar_participants.seminar_id = seminar_sched.seminar_id WHERE seminar_participants.employee_id = '$eid' ";
            $res = $db->query($sql);
            $att = $res->fetch_assoc();
            $row = $res->num_rows;

            if($row>0){ do { ?>
                                  <tr>
                                    <td><?php echo $att['title']; ?></td>
                                    <td><?php echo $att['date']; ?></td>
                                    <td><?php echo $att['location'] ?></td>
                                   
                                      




                                  </tr> 

                              <?php }while($att = $res->fetch_assoc()); } ?>



                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>

</div>















                   















<?php include('layouts/user_footer.php'); ?>