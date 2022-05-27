<?php
  $page_title = 'HR exams';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $row=Recievables();
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->

<nav class="breadcrumbs">
    
    <a href="hr_exams.php" class="breadcrumbs__item " active>Human resource</a>
   <a href="finance_exams.php" class="breadcrumbs__item">Financials</a>
  <a href="core_exams.php" class="breadcrumbs__item">Core</a>
  <a href="admin_exams.php" class="breadcrumbs__item ">Administrative</a>
  <a href="log_exams.php" class="breadcrumbs__item">Logistics</a>
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
         <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Logistics Exam Questionaires and Answer Keys</span>
        <div class="text-end">
          <a href="log_q_report.php?page=core_exams.php" class="btn btn-primary btn-xs-block">
            <i class="bi bi-file-post"></i>
          Print Report
         </a>
          <a href="add-question.php?page=log_exams.php" class="btn btn-primary btn-xs-block">
         <i class="bi bi-plus"></i>
          Add Question
         </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                        <th>Question ID</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Position</th>
                        <th class="text-right" style="width:12%">Action</th>
             </tr>
            </thead>
           <tbody>
                    <?php
        $att_list = "SELECT questionaires.*, departments.dept_name,positions.pos_name FROM questionaires";
         $att_list .= " JOIN departments ON questionaires.dept_id = departments.dept_id JOIN positions ON";
         $att_list .= " questionaires.pos_id = positions.pos_id WHERE questionaires.dept_id = '8' OR questionaires.dept_id='9'";

                    $att_list_run = $db->query($att_list);
                    $row = $att_list_run->fetch_assoc();
                    $rows = $att_list_run->num_rows;
                    
                    if($rows > 0 )
                    {
                    do
                    {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['question']; ?></td>
                        <td><?php echo $row['answer']; ?></td>
                        <td><?php echo str_replace('_',' ',$row['pos_name']); ?></td>
                        <td>
                            <a href="edit_question.php?id=<?php echo $row['id']; ?>&page=log_exams.php" class="btn btn-sm btn-success pull-right">Edit</a>
                            <a href="delete-question.php?id=<?php echo $row['id']; ?>&page=log_exams.php" class="btn btn-sm btn-danger pull-right">Delete</a>
                        </td>
                    </tr>
                    <?php
                    }while($row = $att_list_run->fetch_assoc());
                    }
                    else {
                    echo "";
                    }
                    ?>
           </tbody>
         </table>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>

