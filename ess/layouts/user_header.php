<?php $user = find_user(); ?>
<?php  if ($session->isUserLoggedIn(true)): ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="libs/favicon.png" sizes="16x16">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ESS</title>

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

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            
                <div class="sidebar-brand-text mx-3">Employee Self Service</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="profile.php">
                  <i class="fas fa-fw fa-user"></i>
                    <span>Profile</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
             <li class="nav-item">
                <a class="nav-link" href="payslip.php">
                  <i class="fas fa-fw fa-list"></i>
                    <span>Pay Slip</span></a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="leave.php">
                  <i class="fas fa-fw fa-calendar"></i>
                    <span>File Leave</span></a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="claims.php">
                  <i class="fas fa-fw fa-receipt"></i>
                    <span>Claims</span></a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="reimbursements.php">
                  <i class="fas fa-fw fa-coins"></i>
                    <span>Reimbursments</span></a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="sem_n_train.php">
                  <i class="fas fa-fw fa-calendar"></i>
                    <span>Seminars Schedules</span></a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="train.php">
                  <i class="fas fa-fw fa-calendar"></i>
                    <span>Training Schedules</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dtr.php">
                  <i class="fas fa-fw fa-calendar"></i>
                    <span>Daily Time Records</span></a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="resignation.php">
                  <i class="fas fa-fw fa-file"></i>
                    <span>File Resignation</span></a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="available-exams.php">
                  <i class="fas fa-fw fa-file"></i>
                    <span>Available Exams</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="complains.php">
                  <i class="fas fa-fw fa-file"></i>
                    <span>Complains</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu 
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>-->

            <!-- Nav Item - Utilities Collapse Menu
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Current Time
            </div>

           

            <li>
                 <a href="" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-clock-fill"></i></span>
      <span>: <span class="badge rounded text-white"><?php echo date("m-d-Y h:i:s");?></span></span>
    </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    
                   
                    <ul class="navbar-nav ml-auto">


                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user['first_name'].' '.$user['last_name']?></span>
                           <?php if(empty($user['image'])){ ?>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            <?php }else{ ?>
                                 <img class="img-profile rounded-circle"
                                    src="<?php echo 'uploads/users/'.$user['image'];?>">
                                <?php } ?>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="edit-profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-dark-400"></i>
                                    Edit Profile
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-dark-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <?php endif;?>