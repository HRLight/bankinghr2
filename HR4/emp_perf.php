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

$emp_tot = total_emp();
$leaves = total_leave();
$empi = intval($emp_tot) - intval($leaves);
$leave_tot = $pie['leave'];
$pie_json = array(intval($leaves),$empi);
$jan_res = get_hired($jan);
$feb_res = get_hired($feb);
$march_res = get_hired($mar);
$apr_res = get_hired($apr);
$may_res = get_hired($may);
$june_res = get_hired($jun);
$july_res = get_hired($jul);
$aug_res = get_hired($aug);
$sept_res = get_hired($sep);
$oct_res = get_hired($oct);
$nov_res = get_hired($nov);
$dec_res = get_hired($dec);

$hired_json = array($jan_res,$feb_res,$march_res,$apr_res,$may_res,$june_res,$july_res,$aug_res,$sept_res,$oct_res,$nov_res,$dec_res);
$jan_res = get_resigned($jan);
$feb_res = get_resigned($feb);
$march_res = get_resigned($mar);
$apr_res = get_resigned($apr);
$may_res = get_resigned($may);
$june_res = get_resigned($jun);
$july_res = get_resigned($jul);
$aug_res = get_resigned($aug);
$sept_res = get_resigned($sept);
$oct_res = get_resigned($oct);
$nov_res = get_resigned($nov);
$dec_res = get_resigned($dec);

$res_json = array($jan_res,$feb_res,$march_res,$apr_res,$may_res,$june_res,$july_res,$aug_res,$sept_res,$oct_res,$nov_res,$dec_res);

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
    <div class="row">
  <div class="col-md-3 mb-3">
    <div class="card bg-primary text-white h-60">
      <div class="card-body py-5"><center><h2>$<?php echo total_budget(); ?></h2></center><br><b><span><i class="bi bi-coin"></i> Current Budget</span></b></div>
     
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <div class="card bg-success text-white h-60">
      <div class="card-body py-5"><center><h2><?php echo total_emp(); ?></h2></center><br><b><span><i class="bi bi-people"></i> Total Employees</span></b></div>
     
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <div class="card bg-warning text-white h-60">
      <div class="card-body py-5"><center><h2><?php echo total_manager(); ?></h2></center><br><b><span><i class="bi bi-people"></i> Total Managers</span></b></div>
     
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <div class="card bg-danger text-white h-60">
      <div class="card-body py-5"><center><h2><?php echo total_applicant(); ?></h2></center><br><b><span><i class="bi bi-people"></i> Total Applicants</span></b></div>
     
    </div>
  </div>
  </div>
    <div class="row">
    <div class="col-md-6 mb-3">
    <div class="card h-100">
        <div class="card-header">
      <span ><i class="bi bi-person-fill"></i> Resigned Employees</span>
      </div>
      <div class="card-body">
        <canvas class="chart3" ></canvas>
      </div>
    </div>
  </div>   
<div class="col-md-6 mb-3">
    <div class="card h-40">
        <div class="card-header">
      <span ><i class="bi bi-person-fill"></i> Hired Employees</span>
      </div>
      <div class="card-body">
        <canvas class="chart4"></canvas>
      </div>
    </div>
  </div>  

</div>
<div class="row">
<div class="col-md-4 mb-3">
    <div class="card h-100">
        <div class="card-header">
      <span ><i class="bi bi-person-fill"></i> Employees On Leave</span>
      </div>
      <div class="card-body">
        <canvas class="chart1"></canvas>
      </div>
    </div>
  </div>   
  <div class="col-md-8 mb-3">
    <div class="card h-100">
        <div class="card-header">
      <span ><i class="bi bi-person-fill"></i> Employees Performance</span>
      </div>
      <div class="card-body">
        <canvas class="chart2"></canvas>
      </div>
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
             <td class="text-center"><?php echo $infos['first_name']." ".$infos['last_name'] ?></td>
             <td class="text-center"><?php echo $infos['dept_name'] ?></td>
             <td class="text-center"><?php echo str_replace('_',' ',$infos['pos_name']) ?></td>
             
            
          </tr>
      
         
            <tr>
              <th class="text-center">Month</th>
              <th class="text-center" >Employee Name</th>
              <th class="text-center">Department</th>
              <th class="text-center">Position</th>
            
           
          </tr>
        </thead>
       
        <tbody>
     
          <tr>
            <td class="text-center">January</td>
            <td class="text-center"><?php echo ucwords($jname)?></td>
            <td class="text-center"><?php echo ucwords($january['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$january['pos']))?></td>
             
            
          </tr>
          <td class="text-center">February</td>
            
            <td class="text-center"><?php echo ucwords($fname)?></td>
            <td class="text-center"><?php echo ucwords($february['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$february['pos']))?></td>   
              
          </tr>
          <td class="text-center">March</td>
            <td class="text-center"><?php echo ucwords($mname)?></td>  
            <td class="text-center"><?php echo ucwords($march['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$march['pos']))?></td>
                
          </tr>
          <td class="text-center">April</td>
            <td class="text-center"><?php echo ucwords($aname)?></td> 
            <td class="text-center"><?php echo ucwords($april['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$april['pos']))?></td>  
                
          </tr>
          <td class="text-center">May</td>
            <td class="text-center"><?php echo ucwords($myname)?></td> 
            <td class="text-center"><?php echo ucwords($may['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$may['pos']))?></td> 
                
          </tr>
          <td class="text-center">June</td>
            <td class="text-center"><?php echo ucwords($juname)?></td>
            <td class="text-center"><?php echo ucwords($june['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$june['pos']))?></td>   
               
          </tr>
          <td class="text-center">July</td>
            <td class="text-center"><?php echo ucwords($julname)?></td>  
            <td class="text-center"><?php echo ucwords($july['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$july['pos']))?></td>   
              
          </tr>
          <td class="text-center">August</td>
            <td class="text-center"><?php echo ucwords($auname)?></td>  
            <td class="text-center"><?php echo ucwords($august['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$august['pos']))?></td>
                
          </tr>
          <td class="text-center">September</td>
            <td class="text-center"><?php echo ucwords($sname)?></td>
            <td class="text-center"><?php echo ucwords($september['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$september['pos']))?></td>
                   
          </tr>
          <td class="text-center">October</td>
            <td class="text-center"><?php echo ucwords($oname)?></td>
            <td class="text-center"><?php echo ucwords($october['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$october['pos']))?></td>     
             
          </tr>
          <td class="text-center">November</td>
            <td class="text-center"><?php echo ucwords($nname)?></td> 
            <td class="text-center"><?php echo ucwords($november['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$november['pos']))?></td>   
             
          </tr>
          <td class="text-center">December</td>
            <td class="text-center"><?php echo ucwords($dname)?></td>
            <td class="text-center"><?php echo ucwords($december['dept'])?></td>
            <td class="text-center"><?php echo ucwords(str_replace('_',' ',$december['pos']))?></td>    
             
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

 const charts1 = document.querySelectorAll(".chart1");
 const label = ["On Leave", "Active"];
charts1.forEach(function (chart) {
  var ctx = chart.getContext("2d");
  var myChart = new Chart(ctx, {
    type: "pie",
    data: {
      labels:  label,
      datasets: [
        {
          label: "Employees",
          data: <?php echo json_encode($pie_json)?>,
          backgroundColor: [
            "rgba(255, 99, 132, 1)",
            "rgba(54, 162, 235, 1)",
           
              
          ],
          borderColor: [
            "rgba(255, 99, 132, 1)",
            "rgba(54, 162, 235, 1)",
         
           
              
          ],
          borderWidth: 1,
      hoverOffset: 4  }],
    }
   
  });
});
const charts3 = document.querySelectorAll(".chart3");
 const label3 = ["January", "February", "March", "April", "May", "June","July","August","September","October","November","December"];
charts3.forEach(function (chart) {
  var ctx = chart.getContext("2d");
  var myChart = new Chart(ctx, {
    type: "line",
    data: {
      labels:  label3,
      datasets: [
        {
          label: "Resigned Employees",
          data: <?php echo json_encode($res_json) ?>,
        fill: false,
          borderColor: "rgba(255, 99, 132, 1)",
         tension: 0.1
        }],
    }
   
  });
});
const charts4 = document.querySelectorAll(".chart4");
 const label4 = ["January", "February", "March", "April", "May", "June","July","August","September","October","November","December"];
charts4.forEach(function (chart) {
  var ctx = chart.getContext("2d");
  var myChart = new Chart(ctx, {
    type: "line",
    data: {
      labels:  label4,
      datasets: [
        {
          label: "Hired Employees",
          data: <?php echo json_encode($hired_json) ?>,
        fill: false,
          borderColor: "rgba(47, 212, 63, 1)",
         tension: 0.1
        }],
    }
   
  });
});
    </script>
    
   <!-- End of Script Links -->

  </body>
</html>

<?php if(isset($db)) { $db->db_disconnect(); } ?>

