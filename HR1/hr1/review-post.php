<?php
  $page_title = 'Recruitment|Job posting';
  require_once('includes/load.php');
  
  $user_id = $_SESSION['user_id'] ;

$current_user = current_user($user_id);

if($current_user['user_level'] != 1 ){
 page_require_level(2);
}else{
  page_require_level(1);
}

$id=$db->escape($_GET['id']);
$query = "SELECT job_vacancy.*,positions.*,departments.*,job_qualifications.* FROM job_vacancy JOIN positions ON job_vacancy.pos_id = positions.pos_id JOIN departments ON job_vacancy.dept_id = departments.dept_id JOIN job_qualifications ON job_vacancy.quali_id = job_qualifications.id WHERE job_vacancy.job_id = '$id' AND job_vacancy.status = 'approved'";
  $result = $db->query($query);
  $job  = $result->fetch_assoc();
  $row = $result->num_rows;



?>

<?php include_once('layouts/header.php'); ?>

<nav class="breadcrumbs">
  
    <a href="job-posting.php" class="breadcrumbs__item">Back</a>
 
   

  <a href="#" class="breadcrumbs__item is-active">Review post</a>
</nav>


 <div class="row">
   <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-12">
     <div class="panel panel-default">
       <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          Job to be Posted
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="request-jobpost.php?id=<?php echo $job['job_id']?>" class="clearfix">
            <div class="form-group">
                  <label for="name" class="control-label">Job Title</label>
                  <input type="text" disabled class="form-control"  value="<?php echo remove_junk(ucwords(str_replace('_',' ',$job['pos_name']))); ?>" style="width:50%;">
                  <input type="hidden" value="<?php echo $job['pos_name'] ; ?>" name="job_title">
            </div>
            <div class="form-group">
                  <label for="username" class="control-label">No. of Vacancy</label>
                  <input type="text" disabled class="form-control"  value="<?php echo remove_junk(ucwords($job['no_of_vacancy'])); ?>" style="width:10%;">
                  <input type="hidden" value="<?php echo $job['no_of_vacancy'] ; ?>" name="no_of_vacancy">
            </div>
            <div class="form-group">
                  <h5>Job Description</h5>
                  <input type="hidden" value="<?php echo $job['job_desc'] ; ?>" name="job_description">
                  <textarea style="width :70vw; height: 30vh;"><?php echo remove_junk(ucwords($job['job_desc'])); ?></textarea>
            </div>
            <div class="form-group">
                  <h3>Qualification</h3>
                  <textarea style="width :70vw; height: 30vh;"><?php echo remove_junk(ucwords($job['job_quali'])); ?></textarea>
                   <input type="hidden" value="<?php echo $job['job_id'] ; ?>" name="job_id">
                    <input type="hidden" value="<?php echo $job['job_quali'] ; ?>" name="job_qualification">
                  <input type="hidden" value="<?php echo $id ; ?>" name="id">
            </div>
           
           
            <div class="form-group clearfix">
                    <button type="submit" name="submit" class="btn btn-success"><i class="bi bi-file-post"></i>Request Approval</button>
            </div>
        </form>
       </div>
     </div>
  </div>
  
  

 </div>
<?php include_once('layouts/footer.php'); ?>
