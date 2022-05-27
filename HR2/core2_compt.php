<?php
  $page_title = 'List Of Competent';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   $Table="collection";
   $row=Recievables();
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->

<nav class="breadcrumbs">
     
    <a href="hr1_compt.php" class="breadcrumbs__item " active>HR 1</a>
   <a href="hr2_compt.php" class="breadcrumbs__item">HR 2</a>
  <a href="hr3_compt.php" class="breadcrumbs__item">HR 3</a>
  <a href="hr4_compt.php" class="breadcrumbs__item ">HR 4</a>
  <a href="admin_compt.php" class="breadcrumbs__item">Administrative</a>
  <a href="finance_compt.php" class="breadcrumbs__item">Financials</a>
  <a href="core1_compt.php" class="breadcrumbs__item">Core 1</a>
  <a href="core2_compt.php" class="breadcrumbs__item">Core 2</a>
  <a href="log1_compt.php" class="breadcrumbs__item">Logistics 1</a>
  <a href="log2_compt.php" class="breadcrumbs__item">Logistics 2</a>

</nav>
<!-- /Breadcrumb -->

<!-- Data table start -->
<div class="row">
  <!-- Notification div -->
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
  <!-- End Notification div -->

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
         <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>Core 2 List of Competent</span>
        
      </div>
      <div class="card-body">
        
          <table
          id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                        <th class="text-center">Name</th>
                        <th class="text-center">Position</th>
                        <th class="text-center">PR Average</th>
                       
                        
             </tr>
            </thead>
           <tbody>
                    <?php
        $att_list = "SELECT  performance_review.*,employees.*,departments.*,positions.* FROM performance_review JOIN employees ON performance_review.employee_id = employees.employee_id JOIN departments ON employees.dept_id = departments.dept_id JOIN positions ON employees.pos_id = positions.pos_id WHERE departments.dept_id = 7 ORDER BY performance_review.average DESC LIMIT 5";
                    $att_list_run = $db->query($att_list);
                    $row = $att_list_run->fetch_assoc();
                    $rows = $att_list_run->num_rows;
                    
                   
                    do
                    {
                    ?>
                    <tr>
                        <td class="text-center"><?php echo ucfirst($row['first_name']).' '.ucfirst($row['last_name']) ?></td>
                        <td class="text-center"><?php echo ucwords(str_replace('_',' ',$row['pos_name'])) ?></td>
                        <td class="text-center"><?php echo $row['average']; ?></td>
                       
                    <?php
                    }while($row = $att_list_run->fetch_assoc());
                    
                    ?>
           </tbody>
         </table>
        
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>

