<?php
  $page_title = 'Core exams';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $row=Recievables();
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->

<nav class="breadcrumbs">
     
    <a href="hr_emp_exams.php" class="breadcrumbs__item " active>Human resource</a>
   <a href="finance_emp_exams.php" class="breadcrumbs__item">Financials</a>
  <a href="core_emp_exams.php" class="breadcrumbs__item">Core</a>
  <a href="admin_emp_exams.php" class="breadcrumbs__item ">Administrative</a>
  <a href="log_emp_exams.php" class="breadcrumbs__item">Logistics</a>
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
         <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Core Exam Questionaires and Answer Keys</span>
        <div class="text-end">
          <a href="add-emp-question.php?page=core_emp_exams.php" class="btn btn-primary btn-xs-block">
         <i class="bi bi-plus"></i>
          Add Question
         </a>
        </div>
      </div>
      <div class="card-body">
        
          <table
          id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                        <th>Question ID</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Option 1</th>
                        <th>Option 2</th>
                         <th>Option 3</th>
                        <th class="text-right" style="width:12%">Action</th>
             </tr>
            </thead>
           <tbody>
                    <?php
        $att_list = "SELECT emp_questionaires.*, departments.dept_name FROM emp_questionaires";
         $att_list .= " JOIN departments ON emp_questionaires.dept_id = departments.dept_id";
         $att_list .= " WHERE emp_questionaires.dept_id = '6' OR emp_questionaires.dept_id = '7'";
                    $att_list_run = $db->query($att_list);
                    $row = $att_list_run->fetch_assoc();
                    $rows = $att_list_run->num_rows;
                    
                    if($rows > 0 )
                    {
                    do
                    {
                    ?>
                    <tr>
                        <td><?php echo $row['question_id']; ?></td>
                        <td><?php echo $row['question']; ?></td>
                        <td><?php echo $row['answer']; ?></td>
                        <td><?php echo $row['option1']; ?></td>
                        <td><?php echo $row['option2']; ?></td>
                        <td><?php echo $row['option3']; ?></td>
                        <td>
                            <a href="edit_emp_question.php?id=<?php echo $row['question_id']; ?>&page=core_emp_exams.php" class="btn btn-sm btn-success pull-right">Edit</a>
                            <a href="delete_emp_question.php?id=<?php echo $row['question_id']; ?>&page=core_emp_exams.php" class="btn btn-sm btn-danger pull-right">Delete</a>
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

<?php include_once('layouts/footer.php'); ?>

