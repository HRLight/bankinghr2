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

$sql = "SELECT qualified_applicants.*, applications.*, applicants.* FROM qualified_applicants JOIN applications ";
$sql .= " ON qualified_applicants.applicant_id = applications.applicant_id JOIN applicants ON qualified_applicants.applicant_id = applicants.applicant_id WHERE applications.status = 'On Hiring Process'";

$result = $db->query($sql);
$info = $result->fetch_assoc();
$row = $result->num_rows;



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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i>Qualified Applicants Table</span>
         <div class="text-end">
          <a href="qualified-applicant-report.php" class="btn btn-info pull-right"><i class="bi bi-file-post"></i> Print report</a>
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
             <th class="text-center" >Applicants name</th>
            <th class="text-center" style="">Job Title </th>
            <th class="text-center" >Date of application</th>
            <th class="text-center" style=";">Status</th>
            <th class="text-center" style="width: 10%;">Action</th>
          </tr>
        </thead>
        <tbody>
       <?php do{ ?>
            <tr>
              <td class="text-center"><?php echo remove_junk(ucwords($info['first_name'])).' '.remove_junk(ucwords($info['last_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords(str_replace('_',' ',$info['job_title'])))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords(date('m-d-Y',strtotime($info['date_of_application']))))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($info['status']))?></td>
           
           <td class="text-center">
             <div class="btn-group">
                <a href="view-qualified-applicants.php?id=<?php echo $info['applicant_id'];?>" class="btn btn-sm btn-info"  title="view">
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
</div>















 <?php include_once('layouts/footer.php'); ?>