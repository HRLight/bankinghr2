<?php
  $page_title = 'Add User';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $groups = find_all('departments');
?>
<?php
  if(isset($_POST['add_user'])){

   $req_fields = array('full-name','username','password','level' );
   validate_fields($req_fields);

   if(empty($errors)){
           $name   = remove_junk($db->escape($_POST['full-name']));
       $username   = remove_junk($db->escape($_POST['username']));
       $password   = remove_junk($db->escape($_POST['password']));
       $user_level = $db->escape($_POST['level']);
       $password = sha1($password);
       $pos ="";
       switch($user_level){
           case 'HR1':
               $pos = 'hr1_manager';
               break;
            case 'HR2':
                $pos = 'hr2_manager';
                break;
            case 'HR3':
                $pos = 'hr3_manager';
            case 'HR4':
                $pos = 'hr4_manager';
            case 'Administrative':
                $pos = 'administrative_manager';
                break;
            case 'Core1':
                $pos = 'core1_manager';
                break;
            case 'Core2':
                $pos = 'core2_manaer';
                break;
            case 'Logistics1':
                $pos = 'logistics1_manager';
                break;
            case 'Logistics2':
                $pos ='logistics2_manager';
                break;
            case 'Financials':
                $pos = 'financials_manager';
                break;
           
           
       }
       
       
       
       
       
       
       
       
        $query = "INSERT INTO users (";
        $query .="employee_id,name,username,password,user_level,status,Department,Position";
        $query .=") VALUES (";
        $query .=" '1','{$name}', '{$username}', '{$password}', '1','1','{$user_level}','{$pos}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"User account has been creted! ");
          redirect('add_user.php', false);
        } else {
          //failed
          $session->msg('d',' Sorry failed to create account!');
          redirect('add_user.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_user.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="users.php" class="breadcrumbs__item">List of Users</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Add user</a>
</nav>
<!-- /Breadcrumb -->

  <div class="row">
    <?php echo display_msg($msg); ?>
  <div class="col-sm-6 mx-auto">
    <div class="card-header bg-dark">
    <span style="color:White"><i class="bi bi-person-plus-fill"></i> Add new admin</span>
  </div>
    <div class="card">
      <div class="card-body">
        <form method="post" action="add_user.php">
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="full-name" placeholder="Full Name">
          </div>
          <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="username" placeholder="Username">
          </div>
          <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name ="password"  placeholder="Password">
          </div>
          <div class="form-group">
            <label for="level">User Role</label>
              <select class="form-control" name="level">
                <?php foreach ($groups as $group ):?>
                 <option value="<?php echo str_replace(' ','',$group['dept_name']);?>"><?php echo ucwords($group['dept_name']);?></option>
              <?php endforeach;?>
              </select>
          </div> <br>
          <div class="form-group clearfix">
            <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
          </div>
      </form>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
