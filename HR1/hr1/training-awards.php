<?php
  $page_title = 'Social Recognition';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
$user_id = $_SESSION['user_id'] ;

$current_user = current_user($user_id);

if($current_user['user_level'] != 1 ){
 page_require_level(2);
}else{
  page_require_level(1);
}

$sql = "SELECT training_sched.*,training_participants.*,employees.*,positions.*,departments.* FROM 
training_sched JOIN training_participants ON training_sched.t_id = training_participants.t_id JOIN employees ON training_participants.employee_id = employees.employee_id JOIN positions ON employees.pos_id = positions.pos_id JOIN departments ON employees.dept_id = departments.dept_id WHERE training_sched.status = 'finished'";
$result = $db->query($sql);
$info = $result->fetch_assoc();
$row = $result->num_rows;
?>
<?php include_once('layouts/header.php'); ?>



<div class="row" style="margin-bottom:10%; max-height: 600px;">
  <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
         <div class="text-end">
          <a href="trainings-report.php" class="btn btn-info btn-sm pull-right"><i class="bi bi-printer-fill"></i> Print Report</a>
         </div>
      </div>
      <div class="card-body">
       <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
         <?php if($row>0){ ?>
          <tr>
            <th class="text-center" >Employee Name</th>
            <th class="text-center" style="">Designation </th>
            <th class="text-center" >Department</th>
            <th class="text-center" >Training title</th>
            <th class="text-center" >Date</th>
            <th class="text-center" style="">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php do{ ?>
          <tr>
           <td class="text-center"><?php echo remove_junk(ucwords($info['first_name'])).' '.remove_junk(ucwords($info['last_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords(str_replace('_',' ',($info['pos_name']))))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['dept_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['t_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords(date('m-d-Y',strtotime($info['date_end']))))?></td>           
           
           <td class="text-center">
             <div class="btn-group">

              
           <?php 
           $emp = $info['employee_id'];
           $title =$info['t_name'];
           $sq = "SELECT * FROM social_recognition WHERE employee_id = '$emp' AND award = '$title'";
           $r = $db->query($sq);
           $ro = $r->num_rows;
           $stat = $r->fetch_assoc();

           if($ro>0){
            
            if($stat['status'] == 'approved'){ ?>
              
             <a href="print-training.php?id=<?php echo $stat['employee_id'] ?>&award=<?php echo $stat['award'] ?>&date=<?php echo $stat['date'] ?>" class="btn btn-sm btn-success"  title="">Print Certificate</a>
                  
               
         <?php   } elseif($stat['status'] == 'rejected'){ ?>

    <a href="delete-training-award.php?id=<?php echo $info['employee_id']; ?>" 
    class="btn btn-danger btn-xs" ><span>Rejected   </span><i class="glyphicon glyphicon-remove"></i></a>
            

             <?php }elseif($stat['status'] == 'printed'){ echo '<span>printed</span>'; 
           }else{
            echo $stat['status'];
           }


            }else { ?>
                <a href="request-training-certificate.php?id=<?php echo $info['employee_id'];?>&date=<?php echo $info['date_end'];?>&title=<?php echo $info['t_name'];?>" class="btn btn-sm btn-success"  title="request approval">
                  <span>Request Certificate</span>
               </a> 
               
             <?php }  ?>
                </div>
           </td>
          </tr>
        <?php }while($info =$result->fetch_assoc());

          }
         ?>
       </tbody>
       
     </table>
   </div>
 </div>
</div>
</div>
</div>

 <?php include_once('layouts/footer.php'); ?>