<?php
include('includes/load.php');
ob_start();

$id = $db->escape($_GET['id']);
$vkey = $db->escape($_GET['vkey']);




$sql = "SELECT * FROM initial_examinee WHERE vkey = '$vkey'";
$res = $db->query($sql);
$info = $res->fetch_assoc();
$num = $res->num_rows;

if($num>0){ 

$id = $_GET['id'];
$sql = "SELECT applicants.*,applications.*,job_vacancy.* FROM applicants JOIN applications ON applicants.applicant_id = applications.applicant_id JOIN job_vacancy ON applications.job_id = job_vacancy.job_id WHERE applicants.applicant_id = '$id'";
$ress = $db->query($sql);
$app = $ress->fetch_assoc();
$pos = $app['pos_id']; 





	?>

	<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="icon" type="image/png" href="libs/favicon.png" sizes="16x16">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
  <!-- All Bootstrap Links -->
      <link rel="stylesheet" href="libs/css/bootstrap.min.css" />
      <link rel="stylesheet" href="libs/css/dataTables.bootstrap5.min.css" />
      <link rel="stylesheet" href="libs/css/style.css" />
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
      <script src="./libs/sweetalert/sweetalert2.min.js"></script>
  <!-- End of Links -->


    <title>Initial Exam</title>
  </head>
  <body>


<?php

   


    $sql = "SELECT * FROM questionaires WHERE pos_id = '$pos' ORDER BY RAND() LIMIT 10";
    $res = $db->query($sql);
    $ques = $res->fetch_assoc();
    
    $row = $res->num_rows;
    $count = 0;
    

?>

 <div class="row">
     <div class="col-md-12">

       <form method="POST" action="eval_initial_exam.php" > 
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="hidden" name="vkey" value="<?php echo $vkey ?>">
        <?php do{ $count++;?>
            
            <div class="col-md-8 mx-auto mt-5 rounded"  style="border: 1px solid #dbd7d7;border-left: 5px solid #0076Be; padding: 10px; ">
                <div class="col-md-7">
                    <p><?php echo '<b>'.$count.'.</b>'.' '.ucwords($ques['question'])?></p>
                   <label>Answer</label> 
                   <input type="hidden" name="question<?php echo $count ?>" value="<?php echo $ques['id']?>">
                   
            <fieldset>
   <?php
   $qid = $ques['id'];
   $sql = "SELECT * FROM questionaires WHERE id = '$qid'";
   $re = $db->query($sql);
   $a = $re->fetch_assoc();
   ?>
    <input type="radio" name="answer<?php echo $count ?>"  value="<?php echo $a['id']?>" >
    <span><?php echo $a['answer']?></span><br>
   <? $sql = "SELECT * FROM questionaires LIMIT 2 ";
   $r = $db->query($sql);
   $b = $r->fetch_assoc();
   do{ ?>
   
    <input type="radio" name="answer<?php echo $count ?>"  value="<?php echo $b['id']?>" >
    <span><?php echo $b['answer']?></span><br>
   
   <?php }while($b = $r->fetch_assoc()); ?>
                    

                  </fieldset>
                    
                </div>
                
            </div>

        <?php  }while ($ques = $res->fetch_assoc()); ?>
        <div class="col-md-1 mx-auto mt-4 mb-5">
            <button type="submit" name="submit" class="btn btn-sm btn-success" style="width:10vw;"><i class="bi bi-file-post"></i>Submit</button>
        </div>
</form>







</div>
</div>
</main>
    <!-- All Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script src="./libs/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./libs/js/jquery-3.5.1.js"></script>
    <script src="./libs/js/jquery.dataTables.min.js"></script>
    <script src="./libs/js/dataTables.bootstrap5.min.js"></script>
    <script src="./libs/js/script.js"></script>
    
    <?php
    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
    ?>
    <script>
    swal.fire({
    title: "<?php echo $_SESSION['status']; ?>",
    icon: "<?php echo $_SESSION['status_code']; ?>",
    button: "OK",
    });
    </script>
    <?php
    unset($_SESSION['status']);
    }
    ?>
   <!-- End of Script Links -->

  </body>
</html>


<?php }else{
	
$_SESSION['status'] = "Examination key expired";
     $_SESSION['status_code'] ="error";
      redirect('../portal/job-portal/index.php');
}
?>

