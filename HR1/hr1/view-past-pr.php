<?php
  $page_title = 'Applicant Management';
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
$id = $_GET['id'];
  
 

  $sql = "SELECT employees.*,performance_review.* FROM performance_review JOIN employees ON ";
$sql .= "performance_review.employee_id = employees.employee_id WHERE performance_review.employee_id = '$id'";
$result = $db->query($sql);
$info = $result->fetch_assoc();
$row = $result->num_rows;
?>

<?php include_once('layouts/header.php'); ?>

<nav class="breadcrumbs">
    <a href="evaluation-history.php" class="breadcrumbs__item">Back</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Performance Review Form</a>
</nav>

<div class="row" style="margin-bottom:10%; max-height: 600px;">
  <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-12">
  <div class="card">
          <div class="card-header">
          <div class="col">
          <p><p>Rate from 0-100 || Each criteria is equevalent 8.33% of the total average of the performance review </p> </p>
        </div>
          </div>
        </div>
      </div>  

    <div class="card-body">
     <div class="col-md-12">
      <div class="row">
        
        <div class="container">
          <div class="row">

      

          <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Problem solving</label>
          </div>
          <input disabled type="number" min="1" max="5" name="ps" value="<?php echo $info['problem_solving'] ?>"> %
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Decision making</label>
          </div>
          <input disabled type="number" min="1" max="5" name="dm" value="<?php echo $info['decision_making'] ?>"> %
        </div>
          <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Punctuality</label>
          </div>
          <input disabled type="number" min="1" max="5" name="punc" value="<?php echo $info['punctuality'] ?>"> %
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Attitude</label>
          </div>
          <input disabled type="number" min="1" max="5" name="att" value="<?php echo $info['attitude'] ?>"> %
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Leadership</label>
          </div>
          <input disabled type="number" min="1" max="5" name="rel" value="<?php echo $info['leadership'] ?>"> %
        </div> 
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Communication</label>
          </div>
          <input disabled type="number" min="1" max="5" name="rel" value="<?php echo $info['communication'] ?>"> %
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Accuracy</label>
          </div>
          <input disabled type="number" min="1" max="5" name="rel" value="<?php echo $info['accuracy'] ?>"> %
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Collaboration and teamwork</label>
          </div>
          <input disabled type="number" min="1" max="5" name="rel" value="<?php echo $info['collaboration_and_teamwork'] ?>"> %
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Time management</label>
          </div>
          <input disabled type="number" min="1" max="5" name="rel" value="<?php echo $info['time_management'] ?>"> %
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Work Ethics</label>
          </div>
          <input disabled type="number" min="1" max="5" name="rel" value="<?php echo $info['work_ethics'] ?>"> %
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Productivity</label>
          </div>
          <input disabled type="number" min="1" max="5" name="rel" value="<?php echo $info['productivity'] ?>"> %
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Relationship with co-workers</label>
          </div>
          <input disabled type="number" min="1" max="5" name="rel" value="<?php echo $info['rel_with_colleagues'] ?>"> %
        </div>
       <div class="col-md-8" style="margin-bottom: 30px;">
          <div class="col-md-5">
            <label>Remarks</label>
          </div>
  
          <input disabled type="text" name="rel" value="<?php echo $info['remark'] ?>" style="width: 40vw;"> 
        </div>



</div>
</div>






      </div>


      </div>
    </div>
    
     </div>
    </div>
  </div>


 
</div>







 <?php include_once('layouts/footer.php'); ?>