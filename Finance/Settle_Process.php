<?php include_once('includes/load.php'); ?>
<?php
$iteratorForCode=0; // varaible for journalCode
$Co_id=$_POST['DataID'];
$Co_tbl=$_POST['TableName'];
$MOFP=$_POST['MOFP'];
$Description=$_POST['descriptionReleasing'];
$user_name=$_POST['user_name'];
$Amount=$_POST['Amount'];
$Partial = $_POST['Amount_Partial'];
$budget=0;
$total=0;
$max_id= $_POST['max_id'];
$user=current_user();
$PersonName= remove_junk(ucfirst($user['name']));
//For Journal Code Genaration------------
$prefix = date("Ym-");
$code = sprintf("%'.05d",$max_id);
$journalCode = "".$prefix."".$code;
//-----------------------------------------

$accode="SELECT p.Co_Code FROM account_list p INNER JOIN budgetreleasing g ON g.P_Code = p.Co_Code WHERE g.P_Code ='{$Co_id}'";
$result = $db->query($accode);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
 $AccID=$row['Co_Code'];
 }
}


if(isset($_POST['Settle'])){
  if(empty($errors)){
//Getting the Budget-----------------------------------------
  $sql="SELECT Budget FROM obudget WHERE Id=1;";
  $result = $db->query($sql);
  if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  $budget=$row['Budget'];
  }
 }
//----------------------------------------------------------


if($budget<=$Amount) {
  $total=0;

  $Log=$PersonName.', Has failed to settle a request.';// para sa logs...
  activitylog($Log);

  $_SESSION['status']="Budget not enough!";// sweet aleart session nasa footer and header
  $_SESSION['status_code']="info";

  $session->msg("d","Budget to low!");
  redirect('Budgetreleasing.php',false);
 }else{
    $sql  = "UPDATE budgetreleasing A INNER JOIN {$Co_tbl} B ON A.P_Code = B.Co_Code INNER JOIN account_list C ON B.Co_Code  = C.Co_Code SET A.P_Status = '104', A.P_Description = '{$Description}', A.P_PaymentMode = '{$MOFP}', B.Co_Status = '104', C.definedStat = '104', C.description = '{$Description}' WHERE A.P_Code  = '{$Co_id}';";
    if($db->query($sql)){
      //-----------------------------------------------------------
      //insert into database expenses-----------------------------
      $iteratorForCode++;

      $date = date('Y-m-d H:i:s');
      $sql3  = "INSERT INTO `general_journal` (`code`,`journal_date`,`description`,`user_name`) VALUES ('$journalCode','$date','$Description','$user_name');";
      $db->query($sql3);

      switch ($Co_tbl) {
        case 'procurment':
          $sql4  = "INSERT INTO `journal_items` (`journal_id`,`account_id`,`group_id`,`amount`) VALUES ('$max_id','$AccID','1','$Amount');";
          $db->query($sql4);
          break;

          case 'reimbursment':
            $sql4  = "INSERT INTO `journal_items` (`journal_id`,`account_id`,`group_id`,`amount`) VALUES ('$max_id','$AccID','3','$Amount');";
            $db->query($sql4);
            break;

          case 'uexpenses':
            $sql4  = "INSERT INTO `journal_items` (`journal_id`,`account_id`,`group_id`,`amount`) VALUES ('$max_id','$AccID','3','$Amount');";
            $db->query($sql4);
            break;

            case 'Proposals':
              $sql4  = "INSERT INTO `journal_items` (`journal_id`,`account_id`,`group_id`,`amount`) VALUES ('$max_id','$AccID','3','$Amount');";
              $db->query($sql4);
              break;

      }

      $date = date('Y-m-d H:i:s');
      $sql2  = "INSERT INTO `expenses` (`Date`,`Expenses`) VALUES ('$date','$Amount');";
      $db->query($sql2);

          //---------------------------------------------------------
                $total=$budget-$Amount;
              //Updating budget----------------------------------------------
              $sql1="UPDATE obudget SET Budget='$total' WHERE Id=1;";
              if($db->query($sql1)){
                $Transaction = $_POST['TransactionName'];
                switch ($MOFP) {
                  case 'Cash':

                    $sql5  = "INSERT INTO `journal_items` (`journal_id`,`account_id`,`group_id`,`amount`) VALUES ('$max_id','10201','8','$Amount');";
                    $db->query($sql5);

                    $Log=$PersonName.', Has sent a settled request using cash.';// para sa logs...
                    activitylog($Log);

                    $_SESSION['status']="Settled!";// sweet aleart session nasa footer and header
                    $_SESSION['status_code']="success";

                    $session->msg("s","Budget Released! ");
                    redirect('Budgetreleasing.php',false);
                    break;

                    case 'Partial':
                    $Payable = $Amount - $Partial;

                    $sql5  = "INSERT INTO `journal_items` (`journal_id`,`account_id`,`group_id`,`amount`) VALUES ('$max_id','10201','8','$Partial');";
                    $db->query($sql5);

                    $sql6  = "INSERT INTO `journal_items` (`journal_id`,`account_id`,`group_id`,`amount`) VALUES ('$max_id','10202','4','$Payable');";
                    $db->query($sql6);

                    $date = date('Y-m-d H:i:s');
                    $sql2  = "INSERT INTO `expenses` (`Date`,`Liabilities`) VALUES ('$date','$Payable');";
                    $db->query($sql2);

                    $sql3  = "INSERT INTO `payables` (`Co_Status`,`P_Name`,`P_Desc`, `P_Ledger_Code`,`P_date`,`P_Amount`) VALUES ('102','$Transaction','A debt from supplier paid throuh partial payment.','$journalCode','$date','$Payable');";
                    $db->query($sql3);

                    $Log=$PersonName.', Has sent a settled request using partial Mode.';// para sa logs...
                    activitylog($Log);

                    $_SESSION['status']="Settled!";// sweet aleart session nasa footer and header
                    $_SESSION['status_code']="success";

                    $session->msg("s","Budget Released!");
                    redirect('Budgetreleasing.php',false);
                      break;

                  default:

                    break;

                }
                    }else{
                        $session->msg("d", $errors);
                        redirect('Budgetreleasing.php',false);
                      }
                }
            }

          }
            else {
                    $session->msg("d", $errors);
                    redirect('Budgetreleasing.php',false);

                }
      }
?>
