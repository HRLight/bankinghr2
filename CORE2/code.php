<?php

require_once('includes/load.php');
require 'dbcon.php';

if(isset($_POST['delete_client']))
{
    $client_id = mysqli_real_escape_string($conn, $_POST['delete_client']);

    $query = "DELETE FROM core2_accounts WHERE id='$client_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "client Deleted Successfully";
        header("Location: index.php");
        exit(0);    
    }
    else
    {
        $_SESSION['message'] = "client Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_client']))
{
    $client_id = mysqli_real_escape_string($con, $_POST['client_id']);
    $account_number = mysqli_real_escape_string($con, $_POST['account_number']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $savings = mysqli_real_escape_string($con, $_POST['savings']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);


    $query = "UPDATE students SET account_number='$account_number', name='$name', email='$email', savings='$savings', phone='$phone' WHERE id='$client_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "client Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "client Not Updated";
        header("Location: index.php");
        exit(0);
    }

}
// -----------------------------------------------------------///////////------CLIENT CREATE

if(isset($_POST['save_client']))
{
    $account_number = mysqli_real_escape_string($con, $_POST['account_number']);
    $pin = mysqli_real_escape_string($con, $_POST['pin']);
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $savings = mysqli_real_escape_string($con, $_POST['savings']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $date_created = mysqli_real_escape_string($con, $_POST['date_created']);
    $date_updated= mysqli_real_escape_string($con, $_POST['date_updated']);


    $query = "INSERT INTO core2_accounts (account_number,pin,firstname,middlename,lastname,email,password,savings,phone) VALUES ('$account_number','$pin','$firstname','$middlename','$lastname','$email','$password','$savings','$phone')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "client Created Successfully";
        header("Location: add_client.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "client Not Created";
        header("Location: add_client.php");
        exit(0);
    }
}

// -----------------------------------------------------------///////////------CLIENT

if(isset($_POST['deposit_savings']))
{
    extract($_POST);

    $current_savings = floatval(str_replace(',','',$current_savings));
    $new_savings = floatval($current_savings) + floatval($savings);
    $reference_no = rand(100000,9999999999);
    $update = $con->query("UPDATE `core2_accounts` set `savings` = '{$new_savings}' where id = {$client_id} ");


    if($update)
    { 
        $con->query("INSERT INTO `transactions` set client_id ={$client_id},remarks='Deposits',`type` = 1, `amount` ='{$savings}', reference_no='{$reference_no}' ");

             $_SESSION['message'] = "Deposit Successfully";
        header("Location: savingstracking.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Transaction Failed";
        header("Location: admindeposit.php");
        exit(0);
    }
}



// -----------------------------------------------------------///////////------WITHDRAW
if(isset($_POST['withdraw']))
{
    extract($_POST);
// 
    $current_savings = floatval(str_replace(',','',$current_savings));

// ---------------------------------------------------------------AMOUNT---GREATER THAN-------------------------
    if(floatval($current_savings) < floatval($savings))
    {
        $_SESSION['message'] = "Transaction Failed, Amount is greater than client's balance";
        header("Location: adminwithdraw.php");
        exit(0);
    }
// ---------------------------------------------------------------AMOUNT---GREATER THAN---------------
    $new_savings = floatval($current_savings) - floatval($savings);
    $reference_no = rand(100000,9999999999);
    $update = $con->query("UPDATE `core2_accounts` set `savings` = '{$new_savings}' where id = {$client_id} ");


    if($update)
    { 
        $con->query("INSERT INTO `transactions` set client_id ={$client_id},remarks='Withdraw',`type` = 2, `amount` ='{$savings}',reference_no='{$reference_no}' ");

             $_SESSION['message'] = "Withdraw Successfully";
        header("Location: savingstracking.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Transaction Failed";
        header("Location: adminwithdraw.php");
        exit(0);
    }
}

// -----------------------------------------------------------///////////------TRANSFER
if(isset($_POST['transfer_money']))      
{
    $bal= $_POST['balance'];
  $from = $_POST['from'];
  $to  = $_POST['to'];
  $pnifrom  = $_POST['peranifrom'];
  $pnito  = $_POST['peranito'];
  $id = $_POST['id'];
  $cid = $_POST['c_id'];

  // ---------------------------------------------------------------AMOUNT---GREATER THAN-------------------------
   if(floatval($pnifrom) < floatval($bal))
    {
        $_SESSION['message'] = "Transaction Failed, Amount is greater than client's balance";
        header("Location: admintransfer.php");
        exit(0);
    }
// ---------------------------------------------------------------AMOUNT---GREATER THAN---------------

if(strlen($to)<1 AND strlen($pnito)<1 AND strlen($cid)<1){
  $_SESSION['message'] = "Set Recepient";
        header("Location: admintransfer.php");
}else{

  $tiranifrom = intval($pnifrom) - intval($bal);
  $tiranito = intval($pnito) + intval($bal);
   $reference_no = rand(100000,9999999999);

$sql = "UPDATE core2_accounts SET savings = '$tiranifrom' WHERE account_number = '$from'";
if($db->query($sql)){

$sql = "UPDATE core2_accounts SET savings = '$tiranito' WHERE account_number = '$to'";
if($db->query($sql)){

  $sql = "INSERT INTO `transactions` set client_id ={$id},remarks='Transfer Money',`type` = 3, `amount` ='{$bal}',reference_no='{$reference_no}' ";
  if($db->query($sql)){


  $sql="INSERT INTO `transactions` set client_id ={$cid},remarks='Received',`type` = 3, `amount` ='{$bal}',reference_no='{$reference_no}' ";
if($db->query($sql)){

             $_SESSION['message'] = "Tranfer Successfully";
        header("Location: savingstracking.php");
        
    }else
    {
        $_SESSION['message'] = "Transaction Failed";
        header("Location: admintransfer.php");
        exit(0);
    }

}

}

}
}



}





///////////////-------GET AACOUNT
if(isset($_POST['search_transfer']))      
{
    
   $id=$_POST['get_account'];
   $cid=$_POST['cid'];
        $qry = "SELECT id,savings,account_number,concat(lastname,', ',firstname,' ',middlename) as name FROM `core2_accounts` WHERE account_number = '{$id}' ";
        
        $result = $db->query($qry);
        $row = $result->num_rows;
        $clid = $result->fetch_assoc();
    $clids = $clid['account_number'];

    if($row > 0)
    {
        
        
        
        header("Location: admintransfer.php?id=".$cid."&cid=".$clids);

    }
    else
    {
        $_SESSION['message'] = "not_exist";
        header("Location: admintransfer.php");
        exit(0);
    }

}

   


?>