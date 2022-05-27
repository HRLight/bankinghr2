<?php
  $page_title = 'Recruitment | Job posting';
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
 $query = "SELECT job_vacancy.*,posted_jobs.*,positions.*,job_qualifications.* FROM job_vacancy JOIN posted_jobs ON job_vacancy.job_id = posted_jobs.job_id JOIN positions ON job_vacancy.pos_id = positions.pos_id JOIN job_qualifications ON job_vacancy.quali_id = job_qualifications.id";
 $query .= " WHERE posted_jobs.status = 'posted'";
  $result = $db->query($query);
  $a_jobs  = $result->fetch_assoc();
  $row = $result->num_rows;


?>
<?php include_once('layouts/header.php'); ?>



<div class="row">
  <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>

<div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>Currently posted jobs</span>
      </div>
   <div class="text-end">
          <a href="postedjob-report.php" class="btn btn-info pull-right"><i class="bi bi-file-post"></i> Print report</a>
         </div>
      
      <div class="card-body">
       <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%;" >
         <thead   >
          <tr >
            <th >Job ID</th>
            <th>Job Title </th>
            <th>No. of vacancy</th>
            <th>Job Description</th>
            <th> Qualification</th>
            <th style="width:12%">Action</th>
            
          </tr>
        </thead>
        <tbody>
       <?php if($row>0){ do{ ?>
            
              <tr>
           <td class="text-center" style="width:8%"><?php echo $a_jobs['job_id']?></td>
           <td class="text-center"><?php echo remove_junk(ucwords(str_replace('_',' ',$a_jobs['pos_name'])))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_jobs['no_of_vacancy']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_jobs['job_desc']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_jobs['job_quali']))?></td>
             <td class="text-center"><form method="post" action="remove-job.php">
              <input type="hidden" name="id" value="<?php echo $a_jobs['job_id']; ?>">
              <div class="form-group">
            <button type="submit" name="remove-job" class="btn btn-sm btn-danger" title="remove posted job"><i class="bi bi-eraser"></i></button></form>
            <a href="https://web.facebook.com/Banking-And-Finance-Jobs-107184828592744"  target="blank" title="post on facebook"> <img src="facebook.svg" width="30" height="30" style="margin-top: 8px;"></a>
</div>
          </td>
                 
              </tr>
          <?php }while($a_jobs = $result->fetch_assoc()); } ?>
       
       </tbody>
      
     </table>
   </div>
 </div>
</div>


</div>






  











 
 <?php include_once('layouts/footer.php'); ?>