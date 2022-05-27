<?php
include('includes/load.php');


$sql = "SELECT * FROM employees";
    $res = $db->query($sql);
    $emp = $res->fetch_assoc();
?>
                
                        <select name="emp" class="emp form-control" required>
                            <?php do{ ?>
                            <option value="<?php echo $emp['employee_id'] ?>"><?php echo $emp['employee_id'].' - '.$emp['first_name'].' '.$emp['last_name']?></option>
                        <?php }while($emp= $res->fetch_assoc()); ?>
                        </select>
                   
<?php 

 ?>