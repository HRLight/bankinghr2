<?php
include('includes/load.php');

 if(isset($_POST['dept_id'])){
    $id = $_POST['dept_id'];
    $sql = "SELECT * FROM positions WHERE dept_id = '$id'";
    $res = $db->query($sql);
    $jt = $res->fetch_assoc();
?>
   				
                        <select name="jt" class="form-control" required>
                           <option value="">Select position</option>
                        	<?php do{ ?>
                        	<option value="<?php echo $jt['pos_id']?>"><?php echo str_replace('_',' ',$jt['pos_name'])?></option>
                        <?php }while($jt= $res->fetch_assoc()); ?>
                        </select>
                   
<?php } ?>
  