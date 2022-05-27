<?php include_once('includes/load.php'); ?>
<?php
$user=current_user();
$PersonName= remove_junk(ucfirst($user['name']));
//Submit to budgetReleasing the data..
if(isset($_POST['save'])){
  $id = $_GET['id'];
  $Tablename = $_GET['Tablename'];
  if(empty($errors)){
    $sql  = "UPDATE $Tablename set Co_Status = '101' where Co_Code ='$id'";
     if($db->query($sql)){

     $row = find_Proposal($Tablename, $id);

            $Cod1 =$row['Co_Code'];
            $Cod2 =$row['PR_Department'];
            $Cod3 =$row['PR_Requestor'];
            $Cod4 =$row['PR_Amount'];
            $Cod5 =$row['PR_Date'];
            $Cod6 =$row['Co_Status'];
            $Cod7 ="Budget Proposals";

        $cod1 = remove_junk($db->escape($Cod1));
        $cod2 = remove_junk($db->escape($Cod2));
        $cod3 = remove_junk($db->escape($Cod3));
        $cod4 = remove_junk($db->escape($Cod4));
        $cod5 = remove_junk($db->escape($Cod5));
        $cod6 = remove_junk($db->escape($Cod6));
        $cod7 = remove_junk($db->escape($Cod7));
        $cod8 = remove_junk($db->escape($Tablename));
         $sql  = "INSERT INTO budgetreleasing(P_Code, P_Department, P_Requestor, P_Purpose, P_Amount, P_Date, P_Status, P_Tablename)";
         $sql .= " VALUES ('$cod1','$cod2','$cod3','$cod7','$cod4','$cod5','$cod6','$cod8')";
         if($db->query($sql)){

       //insertion in account_list by data...
        $date = date('Y-m-d H:i:s');
        $Accountssql  = "INSERT INTO account_list (name, description, status, delete_flag, date_created ,definedStat, Amount, Co_Code)";
        $Accountssql  .= " VALUES ('Budget Allocation','Budget Expense','1','0','$date','$cod6','$Cod4','$Cod1')";
        if ($db->query($Accountssql )) {

          $sql4  = "UPDATE `obudget` SET $Cod2 = '$Cod4' WHERE id = 1;";
          $db->query($sql4);

           $Log=$PersonName.', Has sent a procurment request to Admin.';// para sa logs...
           activitylog($Log);

           $_SESSION['status']="Sent!";// sweet aleart session nasa footer and header
           $_SESSION['status_code']="success";

         $session->msg("s","Data approved for budget releasing!");
          redirect('Budgetreleasing.php',false);

          }else {
            $session->msg("d", $errors);
            redirect('Budgetreleasing.php',false);
          }
      //insertion in account_list by data...
          }else {
            $session->msg("d", "Sorry Failed to insert.");
           redirect('Budgetreleasing.php',false);
          }

     }else{
       $session->msg("d", $errors);
       redirect('Budgetreleasing.php',false);
     }
    }
  }
  if (isset($_POST['Decline'])) {
    if(empty($errors)){
      $id = $_GET['id'];
      $Reason = $_POST['Re_Evaluation'];
      //-------------------------------------------------------------------------
        $sql  = "UPDATE proposals set Co_Status = '107', Co_Declined = '{$Reason}' where Co_Code ='$id'";
        if($db->query($sql)){

            $session->msg("s","Request Declined!".$id);
            $_SESSION['status']="Request Sent for Revaluation!";
            $_SESSION['status_code']="info";
            redirect('Budgetreleasing.php',false);
         }else {
             $session->msg("d", $errors);
             redirect('Budgetreleasing.php',false);
         }

    }
  }
