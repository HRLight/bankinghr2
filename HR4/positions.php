<?php
include('includes/load.php');


if(isset($_POST['dept_id'])){
	
	$id = $_POST['dept_id'];
	
	$sql = "SELECT * FROM positions WHERE dept_id = '$id'";
	$res = $db->query($sql);
	$pos = $res->fetch_assoc();	
?>

						<select name="jt" class="form-control">
							<?php do{ ?>
					 <option value="<?php echo $pos['pos_id'] ?>"><?php echo ucwords($pos['pos_name'])?></option>
					<?php }while($pos=$res->fetch_assoc()); } ?>
					  </select>
					  
					  
