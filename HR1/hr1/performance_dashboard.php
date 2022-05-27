<?php 
 require_once('includes/load.php');

page_require_level(2);

$jan = "2022/01/01";
$feb = "2022/02/01";
$mar = "2022/03/01";
$apr = "2022/04/01";
$may = "2022/05/01";
$jun = "2022/06/01";
$jul = "2022/07/01";
$aug = "2022/08/01";
$sep = "2022/09/01";
$oct = "2022/10/01";
$nov = "2022/11/01";
$dec = "2022/12/01";

$january = monthlyTop($jan);
$janve = $january['average'];
$aid = $january['id'];
$jname = $january['name'];

$february = monthlyTop($feb);
$fave = $february['average'];
$fid = $february['id'];
$fname = $february['name'];

$march = monthlyTop($mar);
$mave = $march['average'];
$mid = $march['id'];
$mname = $march['name'];

$april = monthlyTop($apr);
$aave = $april['average'];
$apid = $april['id'];
$aname = $april['name'];


$may = monthlyTop($may);
$myave = $may['average'];
$myid = $may['id'];
$myname = $may['name'];

$june = monthlyTop($jun);
$jave = $june['average'];
$jid = $june['id'];
$juname = $june['name'];

$july = monthlyTop($jul);
$juave = $july['average'];
$juid = $july['id'];
$julname = $july['name'];

$august = monthlyTop($aug);
$auave = $august['average'];
$auid = $august['id'];
$auname = $august['name'];

$september = monthlyTop($aug);
$save = $september['average'];
$sid = $september['id'];
$sname = $september['name'];

$october = monthlyTop($oct);
$oave = $october['average'];
$oid = $october['id'];
$oname = $october['name'];

$november = monthlyTop($nov);
$nave = $november['average'];
$nid = $november['id'];
$nname = $november['name'];

$december = monthlyTop($dec);
$dave = $december['average'];
$did = $december['id'];
$dname = $december['name'];

$mtop = array($janve,$fave,$mave,$aave,$myave,$jave,$juave,$auave,$save,$oave,$nave,$dave); 


include_once('layouts/header.php');
 ?>
<div class="row">
   
  <div class="col-md-10 mb-3">
    <div class="card h-100">
      
      <div class="card-body">
        <canvas class="chart2" width="800" height="300"></canvas>
      </div>
    </div>
  </div>   
</div>

<div class="row" style="margin-bottom:10%; max-height: 600px;">
  <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
         <div class="text-end">
         </div>
      </div>

      <div class="card-body">
       <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
        
          
        <thead> 
         <tr>
             <th class="text-center">Current Top Performer of the Year</th>
             <?php 
             $year = date("Y");
             $sql = "SELECT MAX(average),employee_id FROM performance_review WHERE YEAR(date) = '$year'";
             $result = $db->query($sql);
             $info = $result->fetch_assoc();

             $id = $info['employee_id'];
             $sql = "SELECT employees.*,positions.*,departments.* FROM employees JOIN positions ON employees.pos_id = positions.pos_id JOIN departments ON employees.dept_id = departments.dept_id WHERE employee_id = '$id'";
             $result = $db->query($sql);
             $infos = $result->fetch_assoc();
             $today = date('M');
             ?>
             <td class="text-center"><?php echo $infos['dept_name'] ?></td>
             <td class="text-center"><?php echo str_replace('_',' ',$infos['pos_name']) ?></td>
             <td class="text-center"><?php echo $infos['first_name']." ".$infos['last_name'] ?></td>
             <?php if($today == 'May'){ ?>
              <td class="text-center"><a href="request_empyear_award.php?id=<?php echo $infos['employee_id']?>" class="btn btn-sm btn-success">Request certificate</a></td>
              <?php } ?>
          </tr>
      
         
            <tr>
              <th class="text-center">Month</th>
              <th class="text-center">Department</th>
              <th class="text-center">Position</th>
            <th class="text-center" >Employee Name</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
       
        <tbody>
     
          <tr>
            <td class="text-center">January</td>
            <td class="text-center"><?php echo ucwords($jname)?></td>
            <td class="text-center"><?php echo ucwords($january['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$january['pos']))?></td>
            <td><?php if(strlen($jname)>4){ ?><a href="request-cert.php?id=<?php echo $aid ?>" class="btn btn-success btn-sm">Request Certificate</a>  <?php } ?></td>   
            
          </tr>
          <td class="text-center">February</td>
            
            <td class="text-center"><?php echo ucwords($fname)?></td>
            <td class="text-center"><?php echo ucwords($february['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$february['pos']))?></td>   
             <td><?php if(strlen($fname)>4){ ?><a href="request-cert.php?id=<?php echo $fid ?>" class="btn btn-success btn-sm">Request Certificate</a>  <?php } ?></td>    
          </tr>
          <td class="text-center">March</td>
            <td class="text-center"><?php echo ucwords($mname)?></td>  
            <td class="text-center"><?php echo ucwords($march['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$march['pos']))?></td>
             <td><?php if(strlen($mname)>4){ ?><a href="request-cert.php?id=<?php echo $mid ?>" class="btn btn-success btn-sm">Request Certificate</a>  <?php } ?></td>     
          </tr>
          <td class="text-center">April</td>
            <td class="text-center"><?php echo ucwords($aname)?></td> 
            <td class="text-center"><?php echo ucwords($april['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$april['pos']))?></td>  
             <td><?php if(strlen($aname)>4){ ?><a href="request-cert.php?id=<?php echo $apid ?>" class="btn btn-success btn-sm">Request Certificate</a>  <?php } ?></td>    
          </tr>
          <td class="text-center">May</td>
            <td class="text-center"><?php echo ucwords($myname)?></td> 
            <td class="text-center"><?php echo ucwords($may['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$may['pos']))?></td> 
             <td><?php if(strlen($myname)>4){ ?><a href="request-cert.php?id=<?php echo $myid ?>" class="btn btn-success btn-sm">Request Certificate</a>  <?php } ?></td>     
          </tr>
          <td class="text-center">June</td>
            <td class="text-center"><?php echo ucwords($juname)?></td>
            <td class="text-center"><?php echo ucwords($june['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$june['pos']))?></td>   
             <td><?php if(strlen($juname)>4){ ?><a href="request-cert.php?id=<?php echo $jid ?>" class="btn btn-success btn-sm">Request Certificate</a>  <?php } ?></td>    
          </tr>
          <td class="text-center">July</td>
            <td class="text-center"><?php echo ucwords($julname)?></td>  
            <td class="text-center"><?php echo ucwords($july['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$july['pos']))?></td>   
             <td><?php if(strlen($julname)>4){ ?><a href="request-cert.php?id=<?php echo $juid ?>" class="btn btn-success btn-sm">Request Certificate</a>  <?php } ?></td>  
          </tr>
          <td class="text-center">August</td>
            <td class="text-center"><?php echo ucwords($auname)?></td>  
            <td class="text-center"><?php echo ucwords($august['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$august['pos']))?></td>
             <td><?php if(strlen($auname)>4){ ?><a href="request-cert.php?id=<?php echo $auid ?>" class="btn btn-success btn-sm">Request Certificate</a>  <?php } ?></td>     
          </tr>
          <td class="text-center">September</td>
            <td class="text-center"><?php echo ucwords($sname)?></td>
            <td class="text-center"><?php echo ucwords($september['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$september['pos']))?></td>
             <td><?php if(strlen($sname)>4){ ?><a href="request-cert.php?id=<?php echo $sid ?>" class="btn btn-success btn-sm">Request Certificate</a>  <?php } ?></td>       
          </tr>
          <td class="text-center">October</td>
            <td class="text-center"><?php echo ucwords($oname)?></td>
            <td class="text-center"><?php echo ucwords($october['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$october['pos']))?></td>     
             <td><?php if(strlen($oname)>4){ ?><a href="request-cert.php?id=<?php echo $oid ?>" class="btn btn-success btn-sm">Request Certificate</a>  <?php } ?></td>  
          </tr>
          <td class="text-center">November</td>
            <td class="text-center"><?php echo ucwords($nname)?></td> 
            <td class="text-center"><?php echo ucwords($november['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$november['pos']))?></td>   
             <td><?php if(strlen($nname)>4){ ?><a href="request-cert.php?id=<?php echo $nid ?>" class="btn btn-success btn-sm">Request Certificate</a>  <?php } ?></td>   
          </tr>
          <td class="text-center">December</td>
            <td class="text-center"><?php echo ucwords($dname)?></td>
            <td class="text-center"><?php echo ucwords($december['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$december['pos']))?></td>    
             <td><?php if(strlen($dname)>4){ ?><a href="request-cert.php?id=<?php echo $did ?>" class="btn btn-success btn-sm">Request Certificate</a>  <?php } ?></td>   
          </tr>
       
       </tbody>
     </table>
     </div>
    </div>
  </div>
  
</div>



</div>
</div>

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
    <script type="text/javascript">

 const charts2 = document.querySelectorAll(".chart2");
 const labels = ["January", "February", "March", "April", "May", "June","July","August","September","October","November","December"];
charts2.forEach(function (chart) {
  var ctx = chart.getContext("2d");
  var myChart = new Chart(ctx, {
    type: "bar",
    data: {
      labels:  labels,
      datasets: [
        {
          label: "Monthly Top Performers",
          data: <?php echo json_encode($mtop); ?>,
          backgroundColor: [
            "rgba(255, 99, 132, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(255, 206, 86, 0.2)",
            "rgba(75, 192, 192, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(18, 195, 195, 0.2)",
            "rgba(55, 48, 241, 0.2)",
            
              
          ],
          borderColor: [
            "rgba(255, 99, 132, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
            "rgba(153, 102, 255, 1)",
            "rgba(255, 159, 64, 1)",
             "rgba(18, 195, 195, 1)",
           "rgba(55, 48, 241, 1)",
           
              
          ],
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
});
    </script>
    
   <!-- End of Script Links -->

  </body>
</html>

<?php if(isset($db)) { $db->db_disconnect(); } ?>

