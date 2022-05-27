<?php
session_start();
include('includes/config.php');
error_reporting(0);

    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <!-- App title -->
        <title>Human Resource 1 </title>
        <link rel="stylesheet" href="../plugins/morris/morris.css">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>

    </head>
    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                 
                    <!-- Image logo -->
                    <!--<a href="index.html" class="logo">-->
                        <!--<span>-->
                            <!--<img src="assets/images/logo.png" alt="" height="30">-->
                        <!--</span>-->
                        <!--<i>-->
                            <!--<img src="assets/images/logo_sm.png" alt="" height="28">-->
                        <!--</i>-->
                    <!--</a>-->
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
            
            </div>
            <!-- Top Bar End -->

        


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">

                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">ADMIN</a>
                                        </li>
                                        <li>
                                            <a href="#">SOCIAL RECOGNITION</a>
                                        </li>
                                        <li class="active">
                                           EMPLOYEE AWARD
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                        
                        <!-- end row -->
                        <style>


input[type=text],
input[type=text],
input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}


button {
    background-color: #48d1cc;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}


.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #4682b4;
}


.okbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #48d1cc;
}


.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}


.container {
    padding: 16px;
}

span.awd {
    float: right;
    padding-top: 16px;
}


.modal {
   display: none;
   position: fixed;
   z-index: 1;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
   overflow: auto;
   background-color: rgb(0,0,0);
   background-color: rgba(0,0,0,0.4);
   padding-top: 60px;
}


.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto;
    border: 1px solid #888;
    width: 30%;
}


.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}


.animate {
 -webkit-animation: animatezoom 0.6s;
 animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
 from {-webkit-transform: scale(0)}
 to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
}


@media screen and(max-width: 300px){
    span.awd {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
    .okbtn {
       width: 100%;
    }
}
</style>


       <h1 style="text-align:center">Employee's Award</h1>
       <center><canvas id="canvas" height="500px" width="800px"></canvas> </center>
       <br> 
       


<button onclick="document.
getElementById('id01')

.style.display='block'"
style="width:auto;">ADD
</button>

<div id="id01" class="modal">

<form class="modal-content animate"
action="#">
<div class="imgcontainer">
<span onclick="document
.getElementById('id01')

.style.display='none'"
class="close" title="Close Modal">
    &times;</span>

    </div>


 <div class="container">
  <label><b>Name</b></label>
  <input id="name" type="text" placeholder=
  "Enter Name"
  name="name"  required>


<label><b>Award Title:</b></label>
<input id="award" type="text" placeholder=
"Enter Award" name="awd" required>


<label><b>Date :</b></label>
<input id="date" type="text" placeholder=
"Enter Date" name="date" required>
</div>


 <div class="container"
 style="background-color:#f1f1f1">
 <button type="button"
 onclick="document.getElementById
 ('id01').style.

 display='none'" class="cancelbtn">
 Cancel</button>
 
  <button type="button"
 onclick="document.getElementById
 ('id01').style.

 display='none'" class="okbtn">
 OK</button>
  </div>
  </form>
</div>

       <a href="index3.php" id="download-btn">Download</a> </br>

<script>

var modal = document.getElementById
('id01');


window.onclick = function(event) {
    if (event.target == modal) {
     modal.style.display = "none";
    }
}
</script>

<script>
const canvas = document.getElementById('canvas')
const ctx = canvas.getContext('2d')
const nameInput = document.getElementById('name')
const awardInput = document.getElementById('award')
const dateInput = document.getElementById('date')
const downloadBtn = document.getElementById('download-btn')


const image = new Image()
image.src = 'cert.png'
image.onload = function () {
    drawImage()
}

function drawImage() {
    ctx.drawImage(image, 0, 0, canvas.width, canvas.height)
    ctx.font = '30px Times New Roman'
    ctx.fillStyle = '#0e0e0e'
    ctx.fillText(nameInput.value, 255, 240)
    ctx.fillText(awardInput.value, 230, 160)
    ctx.font = '20px Times New Roman'
    ctx.fillStyle = '#0e0e0e'
    ctx.fillText(dateInput.value, 570, 375)
}

nameInput.addEventListener('input', function () {
    drawImage()
})

awardInput.addEventListener('input', function () {
    drawImage()
})

dateInput.addEventListener('input', function () {
    drawImage()
})
downloadBtn.addEventListener('click', function () {
    downloadBtn.href=canvas.toDataURL('image/jpg')
    downloadBtn.download="Certificate - "+nameInput.value
})

</script>



        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- Counter js  -->
        <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../plugins/counterup/jquery.counterup.min.js"></script>

        <!--Morris Chart-->
        <script src="../plugins/morris/morris.min.js"></script>
        <script src="../plugins/raphael/raphael-min.js"></script>

        <!-- Dashboard init -->
        <script src="assets/pages/jquery.dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

</body>
</html>
