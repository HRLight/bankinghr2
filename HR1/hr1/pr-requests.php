<?php
  
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
$user_id = $_SESSION['user_id'] ;

$current_user = current_user($user_id);

 page_require_level(1);


$sql = "SELECT performance_review.*,employees.*,positions.*,departments.* FROM performance_review JOIN employees ON";
$sql .= " performance_review.employee_id = employees.employee_id JOIN positions ON employees.pos_id = positions.pos_id JOIN departments ON employees.dept_id = departments.dept_id WHERE performance_review.status = 'for approval'";
$result = $db->query($sql);
$info = $result->fetch_assoc();
$row = $result->num_rows;
 include_once('layouts/header.php'); 
 ?>

<div class="row">

  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-file-post"></i>Performance Review Approval</span>
         
      </div>
      <div class="card-body">
       <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
          <?php if($row>0){ ?>
          <tr>
            <th class="text-center" >Applicant name</th>
            <th class="text-center" style="">Designation</th>
            <th class="text-center" style="">Department</th>
            <th class="text-center" style="">Date</th>
            <th class="text-center" style="">Action</th>
           
          </tr>
        </thead>
        <tbody>
        <?php do{ ?>
          <tr>
           <td class="text-center"><?php echo remove_junk(ucwords($info['first_name'])).' '.remove_junk(ucwords($info['last_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords(str_replace('_',' ',$info['pos_name'])))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['dept_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords(date('m-d-Y',strtotime($info['date']))))?></td>
           <td class="text-center">
            <a href="approve-pr.php?id=<?php echo $info['employee_id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-check"></i></a>
            <a href="reject-pr.php?id=<?php echo $info['employee_id']; ?>" class="btn btn-danger btn-sm"><i class="bi bi-x"></i></a>
           </td>
          
           
         
                </div>
           </td>
          </tr>
        <?php }while($info =$result->fetch_assoc());   } ?>
       </tbody>
       
     </table>
   </div>
 </div>
</div>
</div>
</div>





 <?php include_once('layouts/footer.php'); ?>