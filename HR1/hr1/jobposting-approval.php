<?php
  $page_title = 'HR manager';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);


 include_once('layouts/header.php'); 





$sql ="SELECT posted_jobs.*,job_vacancy.job_id,job_vacancy.pos_id,job_vacancy.dept_id,job_vacancy.no_of_vacancy,positions.*,departments.*,job_qualifications.* FROM posted_jobs JOIN job_vacancy ON posted_jobs.job_id = job_vacancy.job_id JOIN positions ON job_vacancy.pos_id = positions.pos_id JOIN departments ON job_vacancy.dept_id = departments.dept_id JOIN job_qualifications ON job_vacancy.quali_id = job_qualifications.id";
$sql .= " WHERE posted_jobs.status = 'request for approval' AND job_vacancy.status = 'approved'";
$result = $db->query($sql);
$info = $result->fetch_assoc();
$row = $result->num_rows;

include_once('layouts/header.php'); ?>



<div class="row">

  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>Job posting Approval</span>
         
      </div>
      <div class="card-body">
       <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
          <?php if($row>0){ ?>
          <tr>
            <th class="text-center" >Job Title</th>
            <th class="text-center" style="">Job Description</th>
            <th class="text-center" style="">Job Qualification</th>
            <th class="text-center" style="">No. of vacancy</th>
            <th class="text-center" style="">Status</th>
            <th class="text-center" style="">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php do{ ?>
            <tr>
              <td class="text-center"><?php echo remove_junk(ucwords(str_replace('_',' ',$info['pos_name'])))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['job_desc']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['job_quali']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['no_of_vacancy']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['status']))?></td>
           <td class="text-center">
            <a href="approve-jobpost.php?id=<?php echo $info['job_id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-check"></i></a>
            <a href="reject-jobpost.php?id=<?php echo $info['job_id']; ?>" class="btn btn-danger btn-sm"><i class="bi bi-x"></i></a>
           </td>
            </tr>
         <?php }while($info =$result->fetch_assoc());   } ?>
       </tbody>
       
     </table>
   </div>
 </div>
</div>
</div>
</div>



 <?php include_once('layouts/footer.php'); ?>