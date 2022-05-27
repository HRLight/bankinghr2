<?php 
 include('includes/load.php'); 


include('layouts/user_header.php');?>





		<div class="row p-4">
			
			<div class="col-md-3 pull-left ml-2 ">
 								<div class="card shadow-lg mb-4">
                                
                                <div class="card-body bg-info rounded">
                                    <img class="rounded-circle img-fluid"  src="<?php  
                                    if(empty($user['image'])){
                                      echo 'img/undraw_profile.svg' ;
                                      }else{ echo 'uploads/users/'.$user['image']; } ?>">
                                      
                                </div>
                            </div>


              </div>

              <div class="col-md-4 ">
 								<div class="card shadow-lg mb-4">

                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-center">ABOUT YOU</h6>
                                </div>

                             <div class="card-body p-1 mt-2 rounded" >
                              
                             	<ul>
                             	<li><b>Name : <?php echo ucfirst($user['first_name']).' '.ucfirst($user['last_name'])?></b></li>
                             	<li><b>Position : <?php echo ucwords(str_replace('_',' ',$user['pos_name'])) ?></b></li>
                             	<li><b>Department : <?php echo $user['dept_name'] ?></b></li>
                             	<li><b>Date Hired : <?php echo date('m/d/Y',strtotime($user['date_hired'])) ?></b></li>
                             	<li><b>Email: <?php echo ucfirst($user['email']) ?></b></li>
                             	<li><b>Birth-Date: <?php echo date('m/d/Y',strtotime($user['birth_date'])) ?></b></li>
                             	<li><b>Contact Number: <?php echo ucfirst($user['contact_number']) ?></b></li>	
                             	</ul>
                            </div>


              </div>
          </div>
           <div class="col-md-4 ">
            <div class="row">
<div class="col-xl-12 col-md-6 mb-4 ml-3">
    <?php
    $id = $user['employee_id'];
    $sql = "SELECT * FROM appreciation_awards WHERE employee_id = '$id'";
    $result = $db->query($sql);
    $num = $result->num_rows;
     ?>
                            <div class="card border-left-info shadow-lg h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Awards</div>
                                            <div class="h5 mb-0 font-weight-bold text-info-800"><?php echo $num ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-award fa-2x text-dark-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
             
            <div class="row">
<?php $query = "SELECT training_participants.*,training_sched.* FROM training_participants JOIN training_sched ON ";
    $query .= "training_participants.t_id = training_sched.t_id WHERE training_participants.employee_id = '$id'";
    $res = $db->query($query);
    $tr = $res->num_rows;
     $que = "SELECT seminar_participants.*,seminar_sched.* FROM seminar_participants JOIN seminar_sched ON ";
    $que .= "seminar_participants.seminar_id = seminar_sched.seminar_id WHERE seminar_participants.employee_id = '$id'";
    $r = $db->query($que);
    $sem = $r->num_rows;
    $tot = $tr + $sem;


    ?>
                <div class="col-xl-12 col-md-6 mb-4 ml-3">
                            <div class="card border-left-info shadow-lg h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Trainings & Seminars</div>
                                            <div class="h5 mb-0 font-weight-bold text-info-800"><?php echo $tot ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-dark-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

            </div>
                               
          </div>
</div>
<div class="row p-4">

    <div class="col-xl-5 col-md-6 mb-4 ml-3">
                            <div class="card border-left-success shadow-lg h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Change Profile picture</div>
                                            <div class="h5 mb-0 font-weight-bold text-info-800">
                        <form  method="POST" action="process.php"  enctype="multipart/form-data">
        <input type="file" name="file_upload"  class="btn btn-secondary btn-sm "/>
        <input type="hidden" name="employee_id" value="<?php echo $user['employee_id'];?>">
                       <button type="submit" name="changedp" class="btn btn-success btn-sm">Change</button>
                                            </form></div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
	
	 <div class="col-xl-3 col-md-6 mb-4 ml-3">
        <?php
        $sql = "SELECT * FROM leave_credits WHERE employee_id = '$id'";
        $result = $db->query($sql);
        $num = $result->num_rows;

        ?>
                            <div class="card border-left-primary shadow-lg h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Active Leaves</div>
                                            <div class="h5 mb-0 font-weight-bold text-info-800"><?php echo $num ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-dark-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


    
                    </div>
</div>






<?php include('layouts/user_footer.php');