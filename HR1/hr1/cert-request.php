<?php
  
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
$user_id = $_SESSION['user_id'] ;

$current_user = current_user($user_id);

 page_require_level(1);

if(isset($_POST['approve'])){

  $id = $_GET['id'];
  $award = $_POST['title'];

$sql = "UPDATE social_recognition set status = 'approved' WHERE employee_id = '$id' AND award = '$award'";
if($db->query($sql)){
  
           $_SESSION['status'] = "Printing of certificate Approved";
            $_SESSION['status_code'] = "success";
      redirect('cert-request.php');
}

}


if(isset($_POST['reject'])){
  $id = $_GET['id'];
  $award = $_POST['title'];

$sql = "UPDATE social_recognition set status = 'rejected' WHERE employee_id = '$id' AND award = '$award'";
if($db->query($sql)){
 
            $_SESSION['status'] = "Printing of certificate Rejected";
            $_SESSION['status_code'] = "error";
      redirect('cert-request.php');
}
}

$sql = "SELECT social_recognition.*,employees.*,positions.*,departments.* FROM social_recognition JOIN employees ON ";
$sql .= "social_recognition.employee_id = employees.employee_id JOIN positions ON employees.pos_id = positions.pos_id JOIN departments ON employees.dept_id = departments.dept_id WHERE status = 'for approval'";
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>Approval of Printing Certificate </span>
        
      </div>
      <div class="card-body">
       <table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
          <?php if($row>0){ ?>
          <tr>
            <th class="text-center" >Employee name</th>
            <th class="text-center" style="">Designation </th>
            <th class="text-center" >Department</th>
            <th class="text-center" >Seminar/Training title</th>
            <th class="text-center" >Date</th>
            <th class="text-center" style="width:15%;">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php do{ ?>
          <tr>
           <td class="text-center"><?php echo remove_junk(ucwords($info['first_name'])).' '.remove_junk(ucwords($info['last_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords(str_replace('_',' ',$info['pos_name'])))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['dept_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['award']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords(date('m-d-Y',strtotime($info['date']))))?></td>  

           
           
           <td class="text-center">
             
          <form method="post" action="cert-request.php?id=<?php echo $info['employee_id']; ?>">
            <input type="hidden" name="title" value="<?php echo $info['award']; ?>">
                  <button type="submit" name="approve" class="btn btn-success btn-sm"><i class="bi bi-check"></i></button>
                  <button type="submit" name="reject" class="btn btn-danger btn-sm"><i class="bi bi-x"></i></button>
         </form>
             
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
</div>




 <?php include_once('layouts/footer.php'); ?>