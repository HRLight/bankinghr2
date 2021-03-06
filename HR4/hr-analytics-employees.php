<?php
  $page_title = 'HR Analytics';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>

<?php
$Table="collection";
$row = join_procurment_table();
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">HR Analytics</a>
</nav>
<!-- /Breadcrumb -->

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <div class="card-body">

          <div class="row">
            <div class="col-md-12">
              <div class="card-box mb-0">
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                  google.charts.load("current", {packages:["corechart"]});
                  google.charts.setOnLoadCallback(drawChart);
                  function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                      ['Language', 'Speakers (in millions)'],
                    <?php
                    $query = "SELECT * FROM job";
                    $query_run = mysqli_query($conn, $query);

                    if(mysqli_num_rows($query_run) > 0 )
                    {
                    while($row = mysqli_fetch_assoc($query_run))
                    {
                    $position = $row['job_name'];
                    ?>
                      ['<?php echo $position;?>',
                      <?php
                      $querys = "SELECT * FROM users u, job j WHERE u.position=j.job_name AND  u.position='".$row['job_name']."'";
                      $query_runs = mysqli_query($conn, $querys);
                      $total = mysqli_num_rows($query_runs);
                      ?>
                      <?php echo $total;?>],
                    <?php
                    }
                    }
                    else {
                    echo "";
                    }
                    ?>
                    ]);

                    var options = {
                      title: 'Employees',
                      legend: 'none',
                      pieSliceText: 'label',
                      slices: {  4: {offset: 0.2},
                                12: {offset: 0.3},
                                14: {offset: 0.4},
                                15: {offset: 0.5},
                      },
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                    chart.draw(data, options);
                  }
                </script>
                <div id="piechart" style="center width: 900px; height: 500px;"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>
