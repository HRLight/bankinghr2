<?php
  require_once('includes/load.php');

/*--------------------------------------------------------------*/
/* Function for find all database table rows by table name
/*--------------------------------------------------------------*/
function find_all($table) {
   global $db;
   if(tableExists($table))
   {
     return find_by_sql("SELECT * FROM ".$db->escape($table));
   }
}
/*--------------------------------------------------------------*/
/* Function for Perform queries
/*--------------------------------------------------------------*/
function find_by_sql($sql)
{
  global $db;
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
 return $result_set;
}
/*--------------------------------------------------------------*/
/*  Function for Find data from table by id
/*--------------------------------------------------------------*/
function find_by_id($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}
/*--------------------------------------------------------------*/
/* Function for Delete data from table by id
/*--------------------------------------------------------------*/
function delete_by_id($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql = "DELETE FROM ".$db->escape($table);
    $sql .= " WHERE id=". $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}
/*--------------------------------------------------------------*/
/* Function for Count id  By table name
/*--------------------------------------------------------------*/

function count_by_id($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(id) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}
/*--------------------------------------------------------------*/
/* Determine if database table exists
/*--------------------------------------------------------------*/
function tableExists($table){
  global $db;
  $table_exit = $db->query('SHOW TABLES FROM '.DB_NAME.' LIKE "'.$db->escape($table).'"');
      if($table_exit) {
        if($db->num_rows($table_exit) > 0)
              return true;
         else
              return false;
      }
  }
 /*--------------------------------------------------------------*/
 /* Login with the data provided in $_POST,
 /* coming from the login form.
/*--------------------------------------------------------------*/
  function authenticate($username='', $password='') {
    global $db;
    $username = $db->escape($username);
    $password = $db->escape($password);
    $sql  = sprintf("SELECT id,username,password,user_level,status FROM users WHERE username ='%s' LIMIT 1",$username);
    $result = $db->query($sql);
    if($db->num_rows($result)){
      $user = $db->fetch_assoc($result);
      $password_request = sha1($password);
      if($password_request === $user['password'] ){
        return $user['id'];
      }
    }
   return false;
  }
  /*--------------------------------------------------------------*/
  /* Login with the data provided in $_POST,
  /* coming from the login_v2.php form.
  /* If you used this method then remove authenticate function.
 /*--------------------------------------------------------------*/
   function authenticate_v2($username='', $password='') {
     global $db;
     $username = $db->escape($username);
     $password = $db->escape($password);
     $sql  = sprintf("SELECT id,username,password,user_level,status FROM users WHERE username ='%s' LIMIT 1", $username);
     $result = $db->query($sql);
     if($db->num_rows($result)){
       $user = $db->fetch_assoc($result);
       $password_request = sha1($password);
       if($password_request === $user['password'] ){
         return $user;
       }
     }
    return false;
   }


  /*--------------------------------------------------------------*/
  /* Find current log in user by session id
  /*--------------------------------------------------------------*/
  function current_user(){
      static $current_user;
      global $db;
      if(!$current_user){
         if(isset($_SESSION['user_id'])):
             $user_id = intval($_SESSION['user_id']);
             $current_user = find_by_id('users',$user_id);
        endif;
      }
    return $current_user;
  }
  /*--------------------------------------------------------------*/
  /* Find all user by
  /* Joining users table and user gropus table
  /*--------------------------------------------------------------*/
  function find_all_user(){
      global $db;
      $results = array();
      $sql = "SELECT u.id,u.name,u.username,u.user_level,u.status,u.last_login,u.Position,";
      $sql .="g.group_name ";
      $sql .="FROM users u ";
      $sql .="LEFT JOIN user_groups g ";
      $sql .="ON g.group_level=u.user_level WHERE u.Department='Financials' ORDER BY u.name ASC";
      $result = find_by_sql($sql);
      return $result;
  }
  /*--------------------------------------------------------------*/
  /* Function to update the last log in of a user
  /*--------------------------------------------------------------*/

 function updateLastLogIn($user_id)
	{
		global $db;
    $date = make_date();
    $sql = "UPDATE users SET last_login='{$date}' WHERE id ='{$user_id}' LIMIT 1";
    $result = $db->query($sql);
    return ($result && $db->affected_rows() === 1 ? true : false);
	}

  /*--------------------------------------------------------------*/
  /* Find all Group name
  /*--------------------------------------------------------------*/
  function find_by_groupName($val)
  {
    global $db;
    $sql = "SELECT group_name FROM user_groups WHERE group_name = '{$db->escape($val)}' LIMIT 1";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Find group level
  /*--------------------------------------------------------------*/
  function find_by_groupLevel($level)
  {
    global $db;
    $sql = "SELECT group_level FROM user_groups WHERE group_level = '{$db->escape($level)}' LIMIT 1";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Function for cheaking which user level has access to page
  /*--------------------------------------------------------------*/
   function page_require_level($require_level){
     global $session;
     $current_user = current_user();
     $login_level = find_by_groupLevel($current_user['user_level']);
     //if user not login
     if (!$session->isUserLoggedIn(true)):
            $session->msg('d','Please login...');
            redirect('../index.php', false);
      //if Group status Deactive
     elseif($login_level['group_status'] = "0"):
           $session->msg('d','This level user has been band!');
           redirect('home.php', false);
      //cheackin log in User level and Require level is Less than or equal to
     elseif($current_user['user_level'] <= (int)$require_level):
              return true;
      else:
            $session->msg("d", "Sorry! you dont have permission to view the page.");
            redirect('home.php', false);
        endif;

     }


    /*==================================Ian James Codes===========================================================*/

    /*display all users*/
     function allusers_Find(){
         global $db;
           $sql = "SELECT u.*, g.* FROM users u LEFT JOIN user_groups g ON g.group_level=u.user_level ORDER BY u.name ASC;" or die($mysqli->error);
         return find_by_sql($sql);
       }

       /*--------------------------------------------------------------*/
       /* select Collection
       /*--------------------------------------------------------------*/
       function  underReleasing(){
         global $db;
         $sql = "SELECT p.*, s.Name AS status FROM budgetreleasing p LEFT JOIN STATUS s ON s.Status_Code = p.P_Status WHERE p.P_Tablename='proposals';" or die($mysqli->error);
         return find_by_sql($sql);
       }


        /*--------------------------------------------------------------*/
        /* select notification for Collection
        /*--------------------------------------------------------------*/
        function  notification_Collection(){
          global $db;
          $sql = "SELECT count(*) as notifCollection FROM collection WHERE Co_Status='102';" or die($mysqli->error);
          return find_by_sql($sql);
        }

  /*Sub notifications  Collections-----------------------------------------------------------*/
        /*--------------------------------------------------------------*/
        /* notification for Loans
        /*--------------------------------------------------------------*/
      function  notification_Loans(){
          global $db;
          $sql = "SELECT count(*) as LoansNotif FROM collection WHERE LS_Type='Loans' AND Co_Status='102';" or die($mysqli->error);
          return find_by_sql($sql);
        }
        /*--------------------------------------------------------------*/
        /* notification for Loans
        /*--------------------------------------------------------------*/
        function  notification_deposits(){
          global $db;
          $sql = "SELECT count(*) as DepositsNotif FROM collection WHERE LS_Type='Deposits' AND Co_Status='102';" or die($mysqli->error);

          return find_by_sql($sql);
        }
        /*--------------------------------------------------------------*/
        /* notification for Loans
        /*--------------------------------------------------------------*/
        function  notification_VIP(){
          global $db;
          $sql = "SELECT COUNT(*) AS DepositsNotif FROM collection WHERE Co_Status='102' AND PRIO_Level = '1';;" or die($mysqli->error);

          return find_by_sql($sql);
        }
        /*End of Sub notifications Collections-----------------------------------------------------------*/

          /*--------------------------------------------------------------*/
          /* select notification for Disbursment
          /*--------------------------------------------------------------*/
        function  notification_Disbursment(){
            global $db;
            $sql = "SELECT (select COUNT(*) from reimbursment WHERE Co_Status='102') as roCount, (select COUNT(*) from procurment WHERE Co_Status='102') as poCount, (select COUNT(*) from uexpenses WHERE Co_Status='102') as uCount;" or die($mysqli->error);
            return find_by_sql($sql);
          }

          /*Sub notifications Disbursments-----------------------------------------------------------*/
                /*--------------------------------------------------------------*/
                /* notification for Loans
                /*--------------------------------------------------------------*/
              function  notification_Claims(){
                  global $db;
                  $sql = "SELECT count(*) as Claims_reimbursmentNotif FROM reimbursment WHERE Co_Status='102';" or die($mysqli->error);
                  return find_by_sql($sql);
                }
                /*--------------------------------------------------------------*/
                /* notification for Loans
                /*--------------------------------------------------------------*/
                function  notification_Procurement(){
                  global $db;
                  $sql = "SELECT count(*) as procurementNotif FROM procurment WHERE Co_Status='102';" or die($mysqli->error);

                  return find_by_sql($sql);
                }
                /*End of Sub notifications Disbursments-----------------------------------------------------------*/

            /*--------------------------------------------------------------*/
            /* select notification for Budget
            /*--------------------------------------------------------------*/
          function  notification_Budget(){
              global $db;
              $sql = "SELECT count(*) as NewNotif FROM budgetreleasing WHERE P_Status='101';" or die($mysqli->error);
              return find_by_sql($sql);
            }


             /*--------------------------------------------------------------*/
             /* select Collection
             /*--------------------------------------------------------------*/
             function  Settled(){
               global $db;
               $sql = "SELECT p.*, s.Name AS status FROM budgetreleasing p LEFT JOIN STATUS s ON s.Status_Code = p.P_Status;" or die($mysqli->error);
               return find_by_sql($sql);
             }

             /*--------------------------------------------------------------*/
             /* select calling all savings
             /*--------------------------------------------------------------*/
             function  Collection_Savings(){
               global $db;
               $sql = "SELECT p.*, s.Name as status FROM collection p LEFT JOIN status s ON s.Status_Code = p.Co_Status WHERE p.LS_Type='Loans' AND p.Co_Status='102' order by PRIO_Level;" or die($mysqli->error);

               return find_by_sql($sql);
             }
             /*--------------------------------------------------------------*/
             /* select calling all savings
             /*--------------------------------------------------------------*/
             function  Collection_VIP(){
               global $db;
               $sql = "SELECT p.*, s.Name as status FROM collection p LEFT JOIN status s ON s.Status_Code = p.Co_Status WHERE p.LS_Type='Loans' AND p.Co_Status='102' AND PRIO_Level = '1';" or die($mysqli->error);

               return find_by_sql($sql);
             }
             /*--------------------------------------------------------------*/
             /* select calling all deposits
             /*--------------------------------------------------------------*/
             function  Collection_deposits(){
               global $db;
               $sql = "SELECT p.*, s.Name as status FROM collection p LEFT JOIN status s ON s.Status_Code = p.Co_Status WHERE p.LS_Type='deposits' AND p.Co_Status='102' order by PRIO_Level;" or die($mysqli->error);

               return find_by_sql($sql);
             }
             /*--------------------------------------------------------------*/
             /* select calling all Budget
             /*--------------------------------------------------------------*/
             function Budget(){
               global $db;
               $sql = "SELECT * FROM obudget" or die($mysqli->error);

               return find_by_sql($sql);
             }
             /*--------------------------------------------------------------*/
             /* select sum of Expenses
             /*--------------------------------------------------------------*/
             function Expenses(){
               global $db;
               $sql = "SELECT Date, SUM(Expenses) as Expenses, SUM(Collection) as Collection, SUM(Liabilities) as Liabilities FROM expenses;" or die($mysqli->error);

               return find_by_sql($sql);
             }
             /*--------------------------------------------------------------*/
             /* select sum of Expenses
             /*--------------------------------------------------------------*/
             function All_Assets(){
               global $db;
               $sql = "SELECT SUM(As_Amount) Assets FROM assets;" or die($mysqli->error);

               return find_by_sql($sql);
             }



             /*--------------------------------------------------------------*/
             /* select calling all Loans
             /*--------------------------------------------------------------*/
             function  Collection_Loans_all(){
               global $db;
               $sql = "SELECT p.*, s.Name as status FROM collection p LEFT JOIN status s ON s.Status_Code = p.Co_Status WHERE p.LS_Type='Loans';" or die($mysqli->error);

               return find_by_sql($sql);
             }

             /*--------------------------------------------------------------*/
             /* select calling all Loans
             /*--------------------------------------------------------------*/
             function  Collection_deposits_all(){
               global $db;
               $sql = "SELECT p.*, s.Name as status FROM collection p LEFT JOIN status s ON s.Status_Code = p.Co_Status WHERE p.LS_Type='deposits';" or die($mysqli->error);

               return find_by_sql($sql);
             }


             function Find_collection_Details($code){
               global $db;
               $sql = "SELECT * FROM collection WHERE Co_Code={$code};" or die($mysqli->error);

               return find_by_sql($sql);
             }

             function max_id(){
                 global $db;
                 $sql = "SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'general_journal';" or die($mysqli->error);
                 return find_by_sql($sql);
               }

             /*--------------------------------------------------------------*/
             /* select all processed payables
             /*--------------------------------------------------------------*/
             function  Payables(){
               $Status='Name';
                global $db;
               $sql  ="SELECT b.*,r.$Status";
              $sql  .=" AS $Status";
               $sql  .=" FROM budgetreleasing b";
               $sql  .=" LEFT JOIN status r ON r.Status_Code = b.P_Status WHERE P_Status='104'";
              return find_by_sql($sql);
             }
             /*--------------------------------------------------------------*/
             /* select all processed payables
             /*--------------------------------------------------------------*/
             function  Recievables(){
               $Status='Name';
                global $db;
               $sql  ="SELECT b.P_Code,b.P_Department,b.P_Requestor,b.P_Purpose,b.P_Amount,b.P_Date,b.P_Tablename,r.$Status";
              $sql  .=" AS $Status";
               $sql  .=" FROM budgetreleasing b";
               $sql  .=" LEFT JOIN status r ON r.Status_Code = b.P_Status WHERE P_Status='105'";
              return find_by_sql($sql);
             }
             /*--------------------------------------------*/
              /* Function for Finding all Procurment
              /* JOIN with Status database table
              /*--------------------------------------------------------------*/
             function join_procurment_table(){
                global $db;
                $sql  =" SELECT p.Co_Code,p.PRO_Requestor,p.PRO_Department,p.PRO_Desc,p.Co_Amount,p.PRO_Date,s.Name";
                $sql  .=" AS Status";
               $sql  .=" FROM procurment p";
               $sql  .=" LEFT JOIN status s ON s.Status_Code = p.Co_Status";
               return find_by_sql($sql);
              }
                /*--------------------------------------------------------------*/
                /* Function for Finding all Joint name
                /* JOIN with Status database table
                /*--------------------------------------------------------------*/
                function join_reimbursment_table(){
                   global $db;
                   $sql  =" SELECT p.Co_Code,p.Co_Desc,p.Co_Source,p.Co_Date,p.Co_Purpose,s.Name";
                   $sql  .=" AS Status";
                  $sql  .=" FROM reimbursment p";
                  $sql  .=" LEFT JOIN status s ON s.Status_Code = p.Co_Status";
                  return find_by_sql($sql);
                 }

                 /*--------------------------------------------------------------*/
                 /* Function for Finding all Joint status
                 /* JOIN with reimbursment database table
                 /*--------------------------------------------------------------*/
                 function join_tables_table(){
                   $Status='Name';
                    global $db;
                   $sql  =" SELECT b.P_Code,b.P_Department,b.P_Requestor,b.P_Purpose,b.P_Amount,b.P_Date,b.P_Tablename,r.$Status";
                    $sql  .=" AS `$Status`";
                   $sql  .=" FROM budgetreleasing b";
                   $sql  .=" LEFT JOIN status r ON r.Status_Code = b.P_Status";
                   return find_by_sql($sql);
                  }

                  /*--------------------------------------------------------------*/
                  /* Function for Finding all Joint status
                  /* JOIN with Utilities database table
                  /*--------------------------------------------------------------*/
                  function join_utilities_table(){
                    $Status='Name';
                     global $db;
                     $sql  =" SELECT u.Co_Code,u.UE_Department,u.UE_Requestor,u.UE_Date,u.UE_date,u.UE_Desc,u.Co_Status, r.$Status";
                     $sql  .=" AS Status";
                    $sql  .=" FROM uexpenses u";
                    $sql  .=" LEFT JOIN status r ON r.Status_Code = u.Co_Status";
                    return find_by_sql($sql);
                   }


                   /*--------------------------------------------------------------*/
                   /* Function for Finding Proposals
                   /* JOIN with status database table
                   /*--------------------------------------------------------------*/
                   function Proposals_table(){
                      global $db;
                      $sql  =" SELECT p.*, r.Name";
                      $sql  .=" AS Status";
                     $sql  .=" FROM proposals p";
                     $sql  .=" LEFT JOIN status r ON r.Status_Code = p.Co_Status WHERE Co_Status='102'";
                     return find_by_sql($sql);
                    }

             /*--------------------------------------------------------------*/
             /* Finding all tables for Details in disbursment
             /*--------------------------------------------------------------*/
             function find_table($table,$name)
             {
               global $db;
               $name = $name;
                 if(tableExists($table)){
                       $sql = $db->query("SELECT p.*, s.Name FROM $table p LEFT JOIN status s ON s.Status_Code = p.Co_Status LEFT JOIN purchases d ON d.Co_Code = p.Co_Code Where  p.Co_Code='$name'");
                       if($result = $db->fetch_assoc($sql))
                         return $result;
                         else
                        return null;
                  }
             }

             /*--------------------------------------------------------------*/
             /* Finding all tables for Details in disbursment
             /*--------------------------------------------------------------*/
             function find_Proposal($table,$name)
             {
               global $db;
               $name = $name;
                 if(tableExists($table)){
                       $sql = $db->query("SELECT * FROM $table WHERE Co_Code='$name';");
                       if($result = $db->fetch_assoc($sql))
                         return $result;
                         else
                        return null;
                  }
             }
             /*--------------------------------------------------------------*/
             /* Finding all tables for Details in disbursment
             /*--------------------------------------------------------------*/
             function find_Proposal_details($name)
             {
               global $db;
               $name = $name;
                 if(tableExists($table)){
                       $sql = $db->query("SELECT * FROM budgetreleasing WHERE Co_Code='$name';");
                       if($result = $db->fetch_assoc($sql))
                         return $result;
                         else
                        return null;
                  }
             }
             /*--------------------------------------------------------------*/
             /* Finding all tables all Details in Collection
             /*--------------------------------------------------------------*/
             function  collection($name){
               global $db;
              $sql = $db->query("SELECT p.*, s.Name FROM collection p LEFT JOIN status s ON s.Status_Code = p.Co_Status WHERE p.Co_Code='$name';");
                if($result = $db->fetch_assoc($sql))
                       return $result;
                         else
                        return null;
                  }

                  /*--------------------------------------------------------------*/
                  /* Finding all purchase orders
                  /*--------------------------------------------------------------*/
                  function find_purchase_orders($table, $name)
                  {
                    global $db;
                   $sql  ="SELECT p.Co_Code, s.* FROM $table p LEFT JOIN purchases s ON s.Co_Code = p.Co_Code  Where p.Co_Code='$name';";
                   return find_by_sql($sql);
                  }
                  /*--------------------------------------------------------------*/
                  /* Finding all Collection Transactions
                  /*--------------------------------------------------------------*/
                  function  find_collection_transactions($name){
                    global $db;
                    $sql = "SELECT p.*, d.*  FROM collection p LEFT JOIN loan_payment d ON d.A_Number = p.A_Number Where  p.A_Number = '$name' AND p.Co_Status = '102';" or die($mysqli->error);

                    return find_by_sql($sql);
                  }

                  /*--------------------------------------------------------------*/
                  /* Finding all Collection Transactions
                  /*--------------------------------------------------------------*/
                  function  find_all_collection_transactions($name){
                    global $db;
                    $sql = "SELECT * FROM collection_transactions WHERE A_Number = '$name';" or die($mysqli->error);

                    return find_by_sql($sql);
                  }


                  function account_list(){
                    global $db;
                   $sql  ="SELECT * from `account_list` where delete_flag = 0 order by `name` asc;";

                   return find_by_sql($sql);
                  }

                  function GroupsAccounts_list(){
                    global $db;
                   $sql  ="SELECT * from `group_list` where delete_flag = 0 order by `name` asc;";

                   return find_by_sql($sql);
                  }

                  function Sales_Chart(){
                    global $db;
                   $sql  ="SELECT DATE_FORMAT(Date,'%M') AS months,SUM(Collection) AS Sale_amounts FROM expenses GROUP BY YEAR(Date),MONTH(Date) ORDER BY YEAR(Date),MONTH(Date);";
                   return find_by_sql($sql);
                  }

                  function Budget_Chart(){
                    global $db;
                   $sql  ="SELECT DATE_FORMAT(DATE,'%Y') AS years,SUM(Amount) AS yearly_budget FROM budget_request GROUP BY YEAR(DATE),MONTH(DATE) ORDER BY YEAR(DATE),MONTH(DATE);;";
                   return find_by_sql($sql);
                  }

                  function total_Loans(){
                    global $db;
                   $sql  ="SELECT SUM(LS_Amount) AS total_Loans FROM collection LIMIT 1;";
                   return find_by_sql($sql);
                  }
                  function total_Earnings(){
                    global $db;
                   $sql  ="SELECT SUM(LT_Recieved) AS total_Earnings FROM collection_transactions LIMIT 1;";
                   return find_by_sql($sql);
                  }

                  function total_Disbursments(){
                    global $db;
                   $sql  ="SELECT SUM( A.Co_Amount + B.Co_Amount + C.Co_Amount) AS Disbursment_total FROM reimbursment A LEFT JOIN procurment B ON B.Co_Status = A.Co_Status LEFT JOIN uexpenses C ON C.Co_Status = B.Co_Status;";
                   return find_by_sql($sql);
                  }

                  function Proposals_Department($Code){
                    global $db;
                   $sql  ="SELECT Expenses, Total, Comments FROM department_expenses where Co_Code = '{$Code}';";
                   return find_by_sql($sql);
                  }

                  function Proposals_find($Code){
                    global $db;
                   $sql  ="SELECT A.*, B.Name as stat FROM proposals A LeFT Join status B on B.Status_Code = A.Co_Status where Co_Code = '{$Code}';";
                   return find_by_sql($sql);
                  }

                  function all_Payables(){
                    global $db;
                   $sql  ="SELECT * FROM payables;";
                   return find_by_sql($sql);
                  }



  //===========================================End of Ian James Codes=======================================================================
?>
