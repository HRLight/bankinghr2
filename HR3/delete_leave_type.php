<?php
  $page_title = 'Delete Leave Type';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   $leavetype = find_all('tblleavetype');
    $user = current_user();
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>

<?php
if(isset($_POST['btn_delete_leave_type'])){
  $l_types = remove_junk($db->escape($_POST['leavetypes']));
  $l_description  = remove_junk($db->escape($_POST['description']));
  $delete_l_id = $_POST['leavetypes_id'];
     $query  = "DELETE FROM tblleavetype WHERE id = '{$delete_l_id}'";
     if($db->query($query)){
       $session->msg('d',"Leave Type Deleted! ");
      
       //================================================
                 //Activity Log
                 //attribute for activity log support
                //  $i_purchase_date = $_POST['purchase_date'];
                //  $ip = $_SERVER['REMOTE_ADDR']; //client IP
                //  date_default_timezone_set('Asia/Manila');
                //  $time = date("F j, Y, h:iA", time());
                //  $itemserialno = $item['serialno'];
                //  //user attributes
                //  $currentUserID = (int)$user['id'];
                //  $currentUser = $user['name'];
                //  $userlevel = (int)$user['user_level'];
                //  //condition for userlevel defining user role
                //  if($userlevel == '1'){
                //   $userRole = "Admin";
                //  }
                //  else{
                //   $userRole = "User";
                //  }
                //  $logactivity = "New item #$i_serialno-$i_name was added by $userRole on $time";
                //   activitylog($logactivity);
                // //Query Statement for activity log
                // $query  = "INSERT INTO activitylog (";
                // $query .=" name,action,quantity_added,ip,purchase_date";
                // $query .=") VALUES (";
                // $query .=" '{$currentUser}', '{$logactivity}', '{$i_qty}', '{$ip}', '{$i_purchase_date}' ";
                // $query .=")";
                // $query .=" ON DUPLICATE KEY UPDATE name='{$currentUser}'";
                // $db->query($query);             

                
                $query  = "INSERT INTO tblleavetype_archive (";
                $query .=" LeaveType,Description";
                $query .=") VALUES (";
                $query .=" '{$l_types}', '{$l_description}'";
                $query .=")";
                $db->query($query);            


       redirect('leave_type.php', false);
     } else {
       $session->msg('d',' Sorry failed to delete!');
       redirect('delete_leave_type.php', false);
     }
 }

?>

<?php include_once('layouts/header.php'); ?>
<!-- This will be the body -->
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
  <div class="col-md-12">
    <div class="card h-100">
      <div class="card-header">
         <h2>Delete Leave Type</h2>
        <form action="delete_leave_type.php" method="POST">
            <div class="card-body">
              <p>Are you sure you want to delete this Leave Type ?</p>
                <input type="hidden" name="leavetypes_id" value="<?php echo $_GET['id'] ?>">
                <?php 
                //==================================================
                //Query Statement for leave history
              $conn = new mysqli('localhost', 'u811015322_Systembanking6', 'Systembanking6@gmail', 'u811015322_obms_db') or die(mysqli_error());
              $user = current_user();
              $userid = (int)$user['id'];
              $delete_l_id = $_GET['id'];
                $query ="SELECT * FROM tblleavetype WHERE id = '{$delete_l_id}'";
                $result = $conn->query($query);
                while ($row = $result -> fetch_row()) {
                  ?>
                <input type="hidden" name="a_leave_type" value="<?php echo remove_junk($row[1]);?>">
                <input type="hidden" name="a_description" value="<?php echo remove_junk($row[2]);?>">
              <?php } ?>
                </div>
                <input type="submit" name="btn_delete_leave_type" value="Yes" class="btn btn-primary">
                <a href="leave_type.php" class="btn btn-danger">Cancel</a>      
         </form>
      </div>
    </div>
</div>



<?php include_once('layouts/footer.php'); ?>