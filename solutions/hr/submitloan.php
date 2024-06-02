<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5) & ($_SESSION['access_lvl'] != 2))
{
 if ($_SESSION['access_lvl'] != 1){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don’t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn’t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
}
}
 $id =$_POST['id'];
 $serviceno = $_POST["serviceno"];
 $staffname = $_POST["staffname"];
 $loandate = $_POST["loandate"];
 $loanamount = $_POST["loanamount"];
 $monthlyrefund = $_POST["monthlyrefund"];
 $loantype = $_POST["loantype"];
 $loanperiod = $_POST["loanperiod"];
 $loanbalance = $_POST["loanbalance"];
 $monthloanstop = $_POST["monthloanstop"];
 $loanstop = $_POST["loanstop"];
 $refundtodate = $_POST["refundtodate"];
 $office = $_POST["office"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($serviceno) != "")
      {
        $query_update = "UPDATE `loan` SET `Staff Number` = '$serviceno',`Staff Name`='$staffname', `Loan Date`='$loandate',`Loan Amt`='$loanamount',
         `Monthly Refund`='$monthlyrefund',`Loan Type`='$loantype', `Loan Period`='$loanperiod',`Loan Balance`='$loanbalance', `LoanStop`='$loanstop',
         `MonthLoanStop`='$monthloanstop', `RefundtoDate`='$refundtodate', `Office`='$office' WHERE `ID` = '$id'";

        $result_update = mysql_query($query_update) or die(mysql_error());

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn) or die('Could not fetch data; ' . mysql_error());
            $rows = mysql_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Loans Record','Modified Loans record for Staff: " . $serviceno . ", Loan Type: " . $loantype . "')";

            $result_update_Log = mysql_query($query_update_Log) or die(mysql_error());
            ###### 

        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 5; URL=loans.php?redirect=$redirect");
      }
      echo "Your record has been updated. You are now being re-directed to the List";
      break;
     case 'Save':
      if (Trim($serviceno) != "")
      { 
        $query_insert = "Insert into `loan` (`Staff Number`,`Staff Name`, `Loan Date`,`Loan Amt`,`Monthly Refund`,`Loan Type`,`Loan Period`,`Loan Balance`,`LoanStop`,`MonthLoanStop`, `RefundToDate`,`Office`) 
               VALUES ('$serviceno','$staffname','$loandate','$loanamount','$monthlyrefund','$loantype','$loanperiod','$loanbalance','$loanstop','$monthloanstop','$refundtodate','$office')
               ";

        $result_insert = mysql_query($query_insert) or die(mysql_error());

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn) or die('Could not fetch data; ' . mysql_error());
            $rows = mysql_fetch_array($result);

            $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Loans Record','Added Loans record for Staff: " . $serviceno . ", Loan Type: " . $loantype . "')";

            $result_insert_Log = mysql_query($query_insert_Log) or die(mysql_error());
            ###### 

        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 5; URL=loans.php?redirect=$redirect");
      }
      echo "Your record has been saved. You are now being re-directed to the List";
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `loan` WHERE `ID` = '$id'";
       $result_delete = mysql_query($query_delete) or die(mysql_error());          

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn) or die('Could not fetch data; ' . mysql_error());
            $rows = mysql_fetch_array($result);

            $query_delete_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Loans Record','Deleted Loans record for Staff: " . $serviceno . ", Loan Type: " . $loantype . "')";

            $result_delete_Log = mysql_query($query_delete_Log) or die(mysql_error());
            ###### 

        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 5; URL=loans.php?redirect=$redirect");
      }
      echo "Your record has been deleted. You are now being re-directed to the List";
      break;
     
   }
   echo " or <a href='loans.php'>Click here</a> to return to list.";
 }
?>