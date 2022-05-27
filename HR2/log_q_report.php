<?php
require_once('includes/load.php');

$sql = "SELECT questionaires.*, departments.dept_name,positions.pos_name FROM questionaires JOIN departments ON questionaires.dept_id = departments.dept_id JOIN positions ON questionaires.pos_id = positions.pos_id WHERE questionaires.dept_id = '8' OR questionaires.dept_id='9'";
$result = $db->query($sql);
$a_jobs = $result->fetch_assoc();
$row = $result->num_rows;


?>
<!DOCTYPE html>
<html>
<head>Logistics Questionaires</title>
	 <link rel="icon" type="image/png" href="libs/favicon.png" sizes="16x16">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="libs/css/main.css?v=<?php echo time(); ?>">



    
    <!--from startbootstrap.com this is for Datatables...
    <link href="dist/css/styles.css" rel="stylesheet" />
    -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
       
</head>
<style type="text/css">
	@media print{
		body{
			background-color: !important;
        -webkit-print-color-adjust: exact; 
	}
	#a{
		display: none; !important;
	}
	#button{
		display: none; !important;
	}
</style>
<body onload="print()" style="padding-top: 5vh;">
	
	
	
	<div class="row overflow-auto mh-10" style="margin-bottom:10%; ">
  <div class="col-md-12">
    <div class="">
      <div class="panel-heading clearfix">
        <div class="col-md-6">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Logistics Applicants Questionaires And Answer Keys</span>
       </strong>
     </div>
     <div class="col-md-6">
       

  </div>
        
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
          				<th class="text-center">Question ID</th>
                        <th class="text-center">Question</th>
                        <th class="text-center">Answer</th>
                        <th class="text-center">Position</th>
            
            
          </tr>
        </thead>
        <tbody>
        <?php if($row>0){ do{ 
          ?>
          <tr>
           <td class="text-center"><?php echo $a_jobs['id']?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_jobs['question']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_jobs['answer']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords(str_replace('_',' ',$a_jobs['pos_name'])))?></td>
          
          </tr>
        <?php }while($a_jobs = $result->fetch_assoc()); } ?>
       </tbody>
     </table>
      <button onclick="print()" id="button" class="btn btn-info">PRINT</button>
     <a href="log_exams.php" id="a" class="btn btn-danger">BACK</a>
     </div>
    
    </div>
  </div>
</div>

</body>
<script type="text/javascript">
	document.style.background = " #53b3db";
</script>
</html>