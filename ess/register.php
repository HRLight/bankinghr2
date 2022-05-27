<?php include('includes/load.php');
ob_start(); 
if($session->isUserLoggedIn(true)) { redirect('profile.php', false);}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
<div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="process.php">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" name="emp_id" class="form-control form-control-user"
                                            placeholder="Employee ID">
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="password" name="pass1" class="form-control form-control-user"
                                             placeholder="Password">
                                    </div>
                                     </div>
                                     <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="password" name="pass2" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" name="register" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                               
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="index.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</body>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
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