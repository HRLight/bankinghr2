<?php
  $page_title = 'Applicant Management';
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


$sql = "SELECT employees.*,positions.*,departments.* FROM employees JOIN positions ON employees.pos_id = ";
$sql .="positions.pos_id JOIN departments ON employees.dept_id = departments.dept_id";
$result = $db->query($sql);
$info = $result->fetch_assoc();
$row = $result->num_rows;
?>
<?php include_once('layouts/header.php'); ?>




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
        	<?php if($row>0){ ?>
            <tr>
            <th class="text-center" >Employee Name</th>
            <th class="text-center" style="">Designation </th>
            <th class="text-center" >Department</th>
            <th class="text-center" style="">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php do{ ?>
          <tr>
           <td class="text-center"><?php echo remove_junk(ucwords($info['first_name'])).' '.remove_junk(ucwords($info['last_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords(str_replace('_',' ',$info['pos_name'])))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['dept_name']))?></td>
           
           
           <td class="text-center" >
             <div class="btn-group">
                <a href="view-past-evaluation.php?id=<?php echo $info['employee_id'];?>" class="btn btn-sm btn-info"  title="view">
                  <span>View</span>
               </a>
             </div>
              
           </td>
          </tr>
        <?php }while($info =$result->fetch_assoc());

        	}
         ?>
       </tbody>
     </table>
     </div>
    </div>
  </div>
  
</div>

 <?php include_once('layouts/footer.php'); ?>