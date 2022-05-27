<?php
  require_once('includes/load.php');
?>

<?php
 
// Checkin What level user has permission to view this page
$user_id = $_SESSION['user_id'] ;

$current_user = current_user($user_id);

  page_require_level(1);

 $id = $_GET['id'];

 $sql = "SELECT * FROM employee_documents WHERE applicant_id = $id";
 $result = $db->query($sql);
 $applicant = $result->fetch_assoc();
 $row = $result->num_rows;
 

include_once('layouts/header.php');

?>

<nav class="breadcrumbs">
  
   <a href="applicants-for-hiring.php" class="breadcrumbs__item">Back</a>
  
  <a href="#checkout" class="breadcrumbs__item is-active">Download Documents</a>
</nav>




<br></br>
<a href="<?php echo $applicant['resume']; ?>" class="btn btn-success" target="_blank" >Download Resume</a>
<br></br>
<a href="<?php echo $applicant['sss']; ?>" class="btn btn-success" target="_blank">Download SSS</a>
<br></br>
<a href="<?php echo $applicant['philhealth']; ?>" class="btn btn-success" target="_blank">Download Philhealth</a>
<br></br>
<a href="<?php echo $applicant['pag_ibig']; ?>"class="btn btn-success"  target="_blank">Download Pag_ibig</a>
<br></br>
<a href="<?php echo $applicant['nbi']; ?>" class="btn btn-success" target="_blank">Download NBI</a>
<br></br>
<a href="uploads/<?php echo $applicant['other_id']; ?>" class="btn btn-success" target="_blank">Download Other_Id</a>

<br></br>
<a href="hiring-request.php?id=<?php echo $id ?>" class="btn btn-sm btn-success">Hiring Request</a>
	<a href="delete_docu.php?id=<?php echo $id ?>" class="btn btn-sm btn-danger">Invalid Document</a>
<?php include_once('layouts/footer.php'); ?>





