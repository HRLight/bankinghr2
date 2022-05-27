<?php include_once('includes/load.php'); ?>
<?php
$id=$_GET['id'];
$AccountNumber=$_GET['AccountNumber'];
if(isset($_POST['Settle'])){
  if(empty($errors)){
$Tablename=$_GET['Tablename'];
  $sql  = "UPDATE budgetreleasing INNER JOIN $Tablename  ON $Tablename.Co_Code = budgetreleasing.P_Code SET budgetreleasing.P_Status = 101,$Tablename.Co_Status = 101 WHERE budgetreleasing.P_Code = $id;";
        if($db->query($sql)){

          $session->msg("s","Approved!");
          redirect('FinanceApproval.php',false);
        }

      }else {
          $session->msg("d", $errors);
          redirect('FinanceApproval.php',false);
        }
      }
  if (isset($_POST['Approve'])) {
      if(empty($errors)){
        $sql = "UPDATE loans A INNER JOIN collection B ON A.A_Number = B.A_Number SET A.Co_Status = '101', B.Co_Status = '102' WHERE id = '{$id}';";
        if($db->query($sql)){
          $table = 'loans';
         $row = Find_loan($table,$AccountNumber);
         $Amount = $row['Amount'];
         $Penalty = $row['Penalty'];
         $date = $row['date'];
         $Status = '102';

         $sql2 = "INSERT INTO loan_payment(P_Amount, P_Penalty, P_Date, A_Number, P_Type, Co_Status) VALUES ('$Amount', '$Penalty', '$date', '$AccountNumber','Loan Payment', '$Status');";
         if($db->query($sql2)){

          $session->msg("s","Approved!");
          redirect('Core1Invoice.php',false);
          }else {
            $session->msg("d", $errors);
            redirect('Core1Invoice.php',false);
          }
        }
      }else {
            $session->msg("d", $errors);
            redirect('Core1Invoice.php',false);
          }
  }
  if (isset($_POST['Send'])) {
      if(empty($errors)){
        $sql = "UPDATE deposit A INNER JOIN collection B ON A.A_Number = B.A_Number SET A.Co_Status = '101', B.Co_Status = '102' WHERE id = '{$id}';";
        if($db->query($sql)){
          $table = 'deposit';
         $row = Find_loan($table,$AccountNumber);
         $Amount = $row['Amount'];
         $Penalty = $row['Penalty'];
         $date = $row['date'];
         $Status = '102';

         $sql2 = "INSERT INTO loan_payment(P_Amount, P_Penalty, P_Date, A_Number, P_Type, Co_Status) VALUES ('$Amount', '$Penalty', '$date', '$AccountNumber','Loan Payment', '$Status');";
         if($db->query($sql2)){

          $session->msg("s","Approved!");
          redirect('Core2Invoice.php',false);
          }else {
            $session->msg("d", $errors);
            redirect('Core2Invoice.php',false);
          }
        }
      }else {
            $session->msg("d", $errors);
            redirect('Core2Invoice.php',false);
          }
  }
?>
