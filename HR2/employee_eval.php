<?php
  $page_title = 'Employee Evaluations';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $all_users = find_emp_eval();
?>
<?php include_once('layouts/header.php'); ?>


<div class="row">

  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>Employee Evaluations Table</span>
         
      </div>
      <div class="card-body">
       <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
          <th>Name </th>
            <th>Position</th>
            <th>Department</th>
            <th>Rating</th>
            <th>Date of Evaluations</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_users as $a_user): ?>
          
              <tr>
               
               <td><?php echo remove_junk(ucwords($a_user['first_name'])).' '.remove_junk(ucwords($a_user['last_name']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['pos_name']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['dept_name']))?></td>
               <td><?php echo $a_user['average'] ?></span>
               <td><?php echo $a_user['date'] ?></span>
              
               </td>
               
                 <div class="btn-group">
                  <td>
                    <a href="view_eval.php?id=<?php echo (int)$a_user['employee_id'];?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="view">
                      <i class="bi bi-eye"></i>view
                   </a>
                 
                    </td>
                    </div>
          
        <?php endforeach;?>
       </tbody>
       <tfoot>
         
       </tfoot>
     </table>
   </div>
 </div>
</div>
</div>
</div>
  <?php include_once('layouts/footer.php'); ?>
