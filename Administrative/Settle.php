<?php include_once('includes/load.php'); ?>
<?php


if(isset($_POST['Settle'])){
  $id=$_GET['id'];
  $Tablename=$_GET['Tablename'];
  if(empty($errors)){

  $sql  = "UPDATE budgetreleasing INNER JOIN $Tablename  ON $Tablename.Co_Code = budgetreleasing.P_Code SET budgetreleasing.P_Status = 101,$Tablename.Co_Status = 101 WHERE budgetreleasing.P_Code = $id;";
        if($db->query($sql)){

          $session->msg("s","Approved!");
          redirect('FinanceApproval.php',false);
        }else {
          $session->msg("d", $errors);
          redirect('FinanceApproval.php',false);
        }
      }
      }
  if (isset($_POST['Approve'])) {
    $id=$_GET['id'];
    $Tablename=$_GET['Tablename'];
      if(empty($errors)){
        $sql = "UPDATE loans A INNER JOIN collection B ON A.A_Number = B.A_Number SET A.Co_Status = '101', B.Co_Status = '102' WHERE A.A_Number = '{$id}';";
        if($db->query($sql)){
         $row = Find_loan($id);
         $Amount = $row['Amount'];
         $Penalty = $row['Penalty'];
         $date = $row['date'];
         $Status = '102';
         $sql2 = "INSERT INTO loan_payment(P_Amount, P_Penalty, P_Date, A_Number, P_Type, Co_Status) VALUES ('$Amount', '$Penalty', '$date', '$id','Loan Payment', '$Status');";
         $db->query($sql2);

          $session->msg("s","Approved!");
          redirect('Core1Invoice.php',false);
        }
      }else {
            $session->msg("d", $errors);
            redirect('FinanceApproval.php',false);
          }
  }
  if (isset($_POST['Approve_request'])) {
    $id=$_GET['id'];
    $Amount=$_GET['Amount'];
    if (empty($errors)) {
      $sql1 ="SELECT * FROM obudget";
      $result = $db->query($sql1);
      if ($result->num_rows > 0) {
      while( $row = mysqli_fetch_array($result) ){
       $Existing = $row['Budget'];
      }
      }
      $total = $Existing + $Amount;
      $sql = "UPDATE budget_request SET Co_Status = '101' WHERE Co_Code = '{$id}';";
      if($db->query($sql)){
        $sql2 = "UPDATE obudget SET Budget = '{$total}' WHERE id = '1';";
        $db->query($sql2);

        $session->msg("s","Approved!");
        redirect('Budget_Request.php',false);
      }
    }else {
          $session->msg("d", $errors);
          redirect('FinanceApproval.php',false);
        }
  }
?>
