<?php include('includes/load.php');


if(isset($_POST['table_name'])){


$table = $_POST['table_name'];


switch($table){


	case 'applicants':

	$sql = "SELECT * FROM applicants";
	$result = $db->query($sql);
	$a_user = $result->fetch_assoc();
?>

	<table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
          <tr>
            <th>Applicant ID</th>
            <th>Name </th>
            <th>Email</th>
            <th>Age</th>
            <th>Last Login</th>
            <th width="10%">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php do{ ?>
          
              <tr>
               <td class="text-center"><?php echo $a_user['applicant_id'];?></td>
               <td><?php echo remove_junk(ucwords($a_user['first_name'])).' '.remove_junk(ucwords($a_user['last_name']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['email']))?></td>
               <td><?php echo $a_user['age']?></td>
               <td><?php echo read_date($a_user['last_login'])?></td>
                 <div class="btn-group">
                  <td>
                    <a href="archive_applicant.php?id=<?php echo $a_user['applicant_id']?>" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Archive">
                      <i class="bi bi-trash"></i>Archive
                   </a>
                   
                    </div>
              </tr>
          
        <?php }while ($a_user = $result->fetch_assoc()); {
        	// code...
        }?>
       </tbody>
       
     </table>



<?php	 break;




























}


}

?>