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

$sql = "SELECT seminar_sched.*,seminar_participants.*,employees.*,positions.*,departments.* FROM 
seminar_sched JOIN seminar_participants ON seminar_sched.seminar_id = seminar_participants.seminar_id JOIN employees ON seminar_participants.employee_id = employees.employee_id JOIN positions ON employees.pos_id = positions.pos_id JOIN departments ON employees.dept_id = departments.dept_id WHERE seminar_sched.status = 'finished'";
$result = $db->query($sql);
$info = $result->fetch_assoc();
$row = $result->num_rows;
 ?>



 <!DOCTYPE html>
 <html>
 <head>
 	<title>Seminar awardees report</title>
	<link rel="icon" type="image/png" href="libs/favicon.png" sizes="16x16">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="libs/css/main.css?v=<?php echo time(); ?>">



    
    <!--from startbootstrap.com this is for Datatables...
    <link href="dist/css/styles.css" rel="stylesheet" />
    -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <style type="text/css">
        	@media print{
        		#button{
        			display: none; !important;
        		}
        		#a{
        			display: none; !important;
        		}
        	}
        </style>
</head>
<body>

		
	<div class="row overflow-auto mh-10" style="margin-bottom:10%; max-height: 500px;">
  <div class="col-md-12">
    <div class="">
      <div class="panel-heading clearfix">
        <div class="col-md-6">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Pending Seminar Certificates</span>
       </strong>
     </div>
     <div class="col-md-6">
       

  </div>
        
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
             <th class="text-center" >Employee name</th>
            <th class="text-center" style="">Designation </th>
            <th class="text-center" >Department</th>
            <th class="text-center" >Training title</th>
            <th class="text-center" >Date</th>
           
          </tr>
        </thead>
        <tbody>
        <?php if($row>0){ do{ 
          ?>
          <tr>
            <td class="text-center"><?php echo remove_junk(ucwords($info['first_name'])).' '.remove_junk(ucwords($info['last_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords(str_replace('_',' ',$info['pos_name'])))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['dept_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['title']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords(date('m-d-Y',strtotime($info['date']))))?></td> 
           


          
          </tr>
        <?php }while($info = $result->fetch_assoc()); } ?>
       </tbody>
     </table>
         <button onclick="print()" id="button" class="btn btn-info">PRINT</button>
     <a href="seminar-awards.php" id="a" class="btn btn-danger">BACK</a>
  
     </div>
    </div>





     

</body>
</html>


     

</body>
</html>