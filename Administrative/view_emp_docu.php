<?php
  $page_title = 'Recruitment | Applicants';
  require_once('includes/load.php');
  require_once('includes/activitylog.inc.php');
?>
<?php
// Checkin What level user has permission to view this page
$user_id = $_SESSION['user_id'] ;

$current_user = current_user($user_id);
$id = $_GET['id'];
$sql = "SELECT * FROM employee_documents WHERE id = '$id'";
$res = $db->query($sql);
$info = $res->fetch_assoc();


include_once('layouts/header.php');

?>

<nav class="breadcrumbs">
  
    <a href="employeedocuments.php" class="breadcrumbs__item">Back</a>
  
   <a href="#"  class="breadcrumbs__item is-active">View Documents</a>
 
</nav>

<hr class="linya">

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 90%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.linya{
    border: solid 1px black;
    margin: 0;
}
.box{
    border: solid black 2px;
    margin: 2%;
}
</style>
<div class="row" style="margin-bottom:10%; max-height: 600px;">
  
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
       
        
      </div>
     <div class="panel-body">
       
     <div class="col-md-12">
      <div class="row" id="box">
          
        <span><h3>Employee ID: <?php echo $info['employee_id']; ?></h3></span>
        <table class="table">
    
          <tr>
            <th>Resume</th>
            <th>NBI</th>
            <th>SSS</th>
          </tr>
          <tr>
            <td>
                <a href="<?php echo $info['resume']; ?>" class="btn btn-sm btn-success"><i class="bi bi-file-post"></i>Download Resume</a>
            </td>
            
            <td>
                <a href="<?php echo $info['nbi']; ?>" class="btn btn-sm btn-success"><i class="bi bi-file-post"></i>Download NBI</a>    
            </td>
            
            <td>
                <a href="<?php echo $info['sss']; ?>" class="btn btn-sm btn-success"><i class="bi bi-file-post"></i>Download SSS</a>
            </td>
          </tr>
          <tr>
            <th>PHLHEALTH</th>
            <th>Pag-ibig</th>
            <th>Other Valid ID</th>
          </tr>
          <tr>
            <td><a href="<?php echo $info['philhealth']; ?>" class="btn btn-sm btn-success"><i class="bi bi-file-post"></i>Download Philhealth</a></td>
            <td><a href="<?php echo $info['pag_ibig']; ?>" class="btn btn-sm btn-success"><i class="bi bi-file-post"></i>Download Pag-ibig</a></td>
            <td><a href="<?php echo $info['other_id']; ?>" class="btn btn-sm btn-success"><i class="bi bi-file-post"></i>Download ID</a></td>
          </tr>
          
        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








<?php include_once('layouts/footer.php'); ?>