 <?php include('includes/load.php'); 
$user = find_user(); 
 if ($session->isUserLoggedIn(true)): 
    $id = $_GET['id']; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="libs/favicon.png" sizes="16x16">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Exam</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
<link rel="stylesheet" href="libs/css/dataTables.bootstrap5.min.css" />


    <!-- Custom styles for this page -->
    
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
 <?php endif;?>

<body id="page-top">

    <?php 
    $id = $_GET['id'];
    $sql = "SELECT emp_examinee.*,positions.*,departments.* FROM emp_examinee JOIN positions ON emp_examinee.";
    $sql .= "pos_id = positions.pos_id JOIN departments ON positions.dept_id = departments.dept_id WHERE emp_examinee.employee_id = '$id'";
    $res = $db->query($sql);
    $info = $res->fetch_assoc();
    $exam = $info['dept_id'];


    $query = "SELECT * FROM emp_questionaires WHERE dept_id ='$exam' ORDER BY RAND() LIMIT 10";
    $result = $db->query($query);
    $ques = $result->fetch_assoc();
    $count = 0 ;
   ?>

   <div class="row">
     <div class="col-md-12">

       <form method="POST" action="process.php" > 
       <input type="hidden" name="eid" value="<?php echo $_GET['id'];?>">
       <input type="hidden" name="pos" value="<?php echo $_GET['pos'];?>">
        <?php do{ $count++;?>
            
            <div class="col-md-8 mx-auto mt-5 rounded"  style="border: 1px solid #dbd7d7;border-left: 5px solid #0076Be; padding: 10px; ">
                <div class="col-md-7">
                    <p><?php echo '<b>'.$count.'.</b>'.' '.ucwords($ques['question'])?></p>
                   
                 <fieldset>

                    <input type="hidden" name="r_ans<?php echo $count ?>" value="<?php echo $ques['answer'] ?>">
                     <input type="radio" name="ans<?php echo $count ?>" value="<?php echo $ques['option1'] ?>"><?php echo '   '.$ques['option1'] ?><br>
                    <input type="radio" name="ans<?php echo $count ?>" value="<?php echo $ques['option2'] ?>"><?php echo '   '.$ques['option2'] ?><br>
                    <input type="radio" name="ans<?php echo $count ?>" value="<?php echo $ques['option3'] ?>"><?php echo '   '.$ques['option3'] ?><br>




                 </fieldset>


        

                 
                    
                </div>
                
            </div>

        <?php  }while ($ques = $result->fetch_assoc()); ?>
        <div class="col-md-1 mx-auto mt-4 mb-5">
            <button type="submit" name="eval_exam" class="btn btn-sm btn-success" style="width:10vw;"><i class="bi bi-file-post"></i>Submit</button>
        </div>
</form>


 
                  




</div>
</div>

 














 <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
     <script src="./libs/js/jquery.dataTables.min.js"></script>
    <script src="./libs/js/dataTables.bootstrap5.min.js"></script>
    <script src="./libs/js/script.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
     <script src="./js/sweetalert2.min.js"></script>
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

 

<?php if(isset($db)) { $db->db_disconnect(); } ?>

</body>

</html>




























 