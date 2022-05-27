<?php
include('includes/load.php');


if(isset($_POST['pos_id'])){
    $id = $_POST['pos_id'];

$query = "SELECT * FROM positions WHERE pos_id = '$id'";
$result = $db->query($query);
$pos = $result->fetch_assoc();
$pname = $pos['pos_name'];


$sql = "SELECT promoted_list.*,employees.* FROM promoted_list JOIN employees ON promoted_list.employee_id = employees.employee_id WHERE promoted_list.promotion_pos = '$pname' AND promoted_list.status = ''";
 $res = $db->query($sql);
    $emp = $res->fetch_assoc(); ?>

     <select name="emp" class="emp form-control" required>
                            <?php do{ ?>
                             <option value="<?php echo $emp['promotion_id'] ?>"><?php echo $emp['employee_id'].' - '.$emp['first_name'].' '.$emp['last_name']?></option>
                        <?php }while($emp= $res->fetch_assoc()); ?>
                        </select>




 <?php  } ?>