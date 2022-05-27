<?php
require_once('includes/load.php');


 $sql = "SELECT employees.*,positions.*,departments.*,seminar_participants.*,seminar_sched.* FROM employees JOIN positions";
$sql .= " ON employees.pos_id = positions.pos_id JOIN departments ON employees.dept_id = departments.dept_id JOIN ";
$sql .= "seminar_participants ON employees.employee_id = seminar_participants.employee_id JOIN seminar_sched ON seminar_participants.seminar_id = seminar_sched.seminar_id WHERE seminar_sched.status = 'finished'";
$result = $db->query($sql);
$info = $result->fetch_assoc();
foreach ($info as  $value) {
  echo $value;
}




?>