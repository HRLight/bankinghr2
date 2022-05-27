<?php
include('includes/load.php');

 if(isset($_POST['pos_id'])){
    $id = $_POST['pos_id'];

    switch($id){
 
 	case 6:

 	$sql = "SELECT  exam_ranking.*,employees.*,departments.*,positions.* FROM exam_ranking JOIN employees ON exam_ranking.employee_id = employees.employee_id JOIN departments ON employees.dept_id = departments.dept_id JOIN positions ON employees.pos_id = positions.pos_id WHERE departments.dept_id = 1 ORDER BY exam_ranking.average DESC LIMIT 5";
    $res = $db->query($sql);
    $emp = $res->fetch_assoc();

 	  ?>

 						<select name="emp" class="emp form-control" required>
                        	<?php do{ ?>
                        	 <option value="<?php echo $emp['employee_id'] ?>"><?php echo $emp['employee_id'].' - '.$emp['first_name'].' '.$emp['last_name']?></option>
                        <?php }while($emp= $res->fetch_assoc()); ?>
                        </select>

 	
<?php	

	 break;

	 case 24:
	 $sql = "SELECT  exam_ranking.*,employees.*,departments.*,positions.* FROM exam_ranking JOIN employees ON exam_ranking.employee_id = employees.employee_id JOIN departments ON employees.dept_id = departments.dept_id JOIN positions ON employees.pos_id = positions.pos_id WHERE departments.dept_id = 2 ORDER BY exam_ranking.average DESC LIMIT 5";
    $res = $db->query($sql);
    $emp = $res->fetch_assoc(); ?>

<select name="emp" class="emp form-control" required>
                        	<?php do{ ?>
                        	 <option value="<?php echo $emp['employee_id'] ?>"><?php echo $emp['employee_id'].' - '.$emp['first_name'].' '.$emp['last_name']?></option>
                        <?php }while($emp= $res->fetch_assoc()); ?>
                        </select>
<?php 
	
	break;


	case 36:

	$sql = "SELECT  exam_ranking.*,employees.*,departments.*,positions.* FROM exam_ranking JOIN employees ON exam_ranking.employee_id = employees.employee_id JOIN departments ON employees.dept_id = departments.dept_id JOIN positions ON employees.pos_id = positions.pos_id WHERE departments.dept_id = 3 ORDER BY exam_ranking.average DESC LIMIT 5";
    $res = $db->query($sql);
    $emp = $res->fetch_assoc(); ?>

    <select name="emp" class="emp form-control" required>
                        	<?php do{ ?>
                        	 <option value="<?php echo $emp['employee_id'] ?>"><?php echo $emp['employee_id'].' - '.$emp['first_name'].' '.$emp['last_name']?></option>
                        <?php }while($emp= $res->fetch_assoc()); ?>
                        </select>


    <?php 
    break;

    case 9:
    $sql = "SELECT  exam_ranking.*,employees.*,departments.*,positions.* FROM exam_ranking JOIN employees ON exam_ranking.employee_id = employees.employee_id JOIN departments ON employees.dept_id = departments.dept_id JOIN positions ON employees.pos_id = positions.pos_id WHERE departments.dept_id = 4 ORDER BY exam_ranking.average DESC LIMIT 5";
    $res = $db->query($sql);
    $emp = $res->fetch_assoc(); ?>

<select name="emp" class="emp form-control" required>
                        	<?php do{ ?>
                        	 <option value="<?php echo $emp['employee_id'] ?>"><?php echo $emp['employee_id'].' - '.$emp['first_name'].' '.$emp['last_name']?></option>
                        <?php }while($emp= $res->fetch_assoc()); ?>
                        </select>


     <?php 
    break;

    case 7:
    $sql = "SELECT  exam_ranking.*,employees.*,departments.*,positions.* FROM exam_ranking JOIN employees ON exam_ranking.employee_id = employees.employee_id JOIN departments ON employees.dept_id = departments.dept_id JOIN positions ON employees.pos_id = positions.pos_id WHERE departments.dept_id = 5 ORDER BY exam_ranking.average DESC LIMIT 5";
    $res = $db->query($sql);
    $emp = $res->fetch_assoc(); ?>

    <select name="emp" class="emp form-control" required>
                        	<?php do{ ?>
                        	 <option value="<?php echo $emp['employee_id'] ?>"><?php echo $emp['employee_id'].' - '.$emp['first_name'].' '.$emp['last_name']?></option>
                        <?php }while($emp= $res->fetch_assoc()); ?>
                        </select>

 <?php 
    break;

    case 20: 
    $sql = "SELECT  exam_ranking.*,employees.*,departments.*,positions.* FROM exam_ranking JOIN employees ON exam_ranking.employee_id = employees.employee_id JOIN departments ON employees.dept_id = departments.dept_id JOIN positions ON employees.pos_id = positions.pos_id WHERE departments.dept_id = 6 ORDER BY exam_ranking.average DESC LIMIT 5";
    $res = $db->query($sql);
    $emp = $res->fetch_assoc(); ?>

<select name="emp" class="emp form-control" required>
                        	<?php do{ ?>
                        	 <option value="<?php echo $emp['employee_id'] ?>"><?php echo $emp['employee_id'].' - '.$emp['first_name'].' '.$emp['last_name']?></option>
                        <?php }while($emp= $res->fetch_assoc()); ?>
                        </select>


    <?php 
    break;

    case 22:
     $sql = "SELECT  exam_ranking.*,employees.*,departments.*,positions.* FROM exam_ranking JOIN employees ON exam_ranking.employee_id = employees.employee_id JOIN departments ON employees.dept_id = departments.dept_id JOIN positions ON employees.pos_id = positions.pos_id WHERE departments.dept_id = 7 ORDER BY exam_ranking.average DESC LIMIT 5";
    $res = $db->query($sql);
    $emp = $res->fetch_assoc(); ?>


<select name="emp" class="emp form-control" required>
                        	<?php do{ ?>
                        	 <option value="<?php echo $emp['employee_id'] ?>"><?php echo $emp['employee_id'].' - '.$emp['first_name'].' '.$emp['last_name']?></option>
                        <?php }while($emp= $res->fetch_assoc()); ?>
                        </select>


 <?php 
    break;

    case 32:
    $sql = "SELECT  exam_ranking.*,employees.*,departments.*,positions.* FROM exam_ranking JOIN employees ON exam_ranking.employee_id = employees.employee_id JOIN departments ON employees.dept_id = departments.dept_id JOIN positions ON employees.pos_id = positions.pos_id WHERE departments.dept_id = 8 ORDER BY exam_ranking.average DESC LIMIT 5";
    $res = $db->query($sql);
    $emp = $res->fetch_assoc(); ?>

<select name="emp" class="emp form-control" required>
                        	<?php do{ ?>
                        	 <option value="<?php echo $emp['employee_id'] ?>"><?php echo $emp['employee_id'].' - '.$emp['first_name'].' '.$emp['last_name']?></option>
                        <?php }while($emp= $res->fetch_assoc()); ?>
                        </select>



    <?php 
    break;

    case 27:
    $sql = "SELECT  exam_ranking.*,employees.*,departments.*,positions.* FROM exam_ranking JOIN employees ON exam_ranking.employee_id = employees.employee_id JOIN departments ON employees.dept_id = departments.dept_id JOIN positions ON employees.pos_id = positions.pos_id WHERE departments.dept_id = 9 ORDER BY exam_ranking.average DESC LIMIT 5";
    $res = $db->query($sql);
    $emp = $res->fetch_assoc(); ?>

<select name="emp" class="emp form-control" required>
                        	<?php do{ ?>
                        	 <option value="<?php echo $emp['employee_id'] ?>"><?php echo $emp['employee_id'].' - '.$emp['first_name'].' '.$emp['last_name']?></option>
                        <?php }while($emp= $res->fetch_assoc()); ?>
                        </select>


     <?php 
    break;

    case 11:
    $sql = "SELECT  exam_ranking.*,employees.*,departments.*,positions.* FROM exam_ranking JOIN employees ON exam_ranking.employee_id = employees.employee_id JOIN departments ON employees.dept_id = departments.dept_id JOIN positions ON employees.pos_id = positions.pos_id WHERE departments.dept_id = 10 AND exam_ranking.pos_id = '$id' ORDER BY exam_ranking.average DESC LIMIT 5";
    $res = $db->query($sql);
    $emp = $res->fetch_assoc(); ?>

<select name="emp" class="emp form-control" required>
                        	<?php do{ ?>
                        	 <option value="<?php echo $emp['employee_id'] ?>"><?php echo $emp['employee_id'].' - '.$emp['first_name'].' '.$emp['last_name']?></option>
                        <?php }while($emp= $res->fetch_assoc()); ?>
                        </select>


<?php 
    break;
	default:



    	

    $sql = "SELECT  exam_ranking.*,employees.*,departments.*,positions.* FROM exam_ranking JOIN employees ON exam_ranking.employee_id = employees.employee_id JOIN departments ON employees.dept_id = departments.dept_id JOIN positions ON employees.pos_id = positions.pos_id  ORDER BY exam_ranking.average DESC LIMIT 5";
    $res = $db->query($sql);
    $emp = $res->fetch_assoc();
?>
   				
                        <select name="emp" class="emp form-control" required>
                        	<?php do{ ?>
                        	 <option value="<?php echo $emp['employee_id'] ?>"><?php echo $emp['employee_id'].' - '.$emp['first_name'].' '.$emp['last_name']?></option>
                        <?php }while($emp= $res->fetch_assoc()); ?>
                        </select>
                   
<?php break; }

} ?>