<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don’t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn’t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
}

 $bankid = $_POST["bankid"];
 $name = $_POST["name"];
 $branch = $_POST["branch"];
 $online = $_POST["online"];
 $location = $_POST["location"];
 $sortcode = $_POST["sortcode"];
 $paypoint = $_POST["paypoint"];
 $bankaccount = $_POST["bankaccount"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($bankid) != "" and Trim($name) != "")
      {
        $query_update = "UPDATE `bank` SET `BankCode`='$bankid',`Name` = '$name',
         `Branch`='$branch',`Online` = '$online',`Location` = '$location',`SortCode` = '$sortcode',`Paypoint` = '$paypoint',`Bank Account` = '$bankaccount' WHERE `BankId` = '$bankid';";

        $result_update = mysql_query($query_update);
        $val="Bank";
        $tval="Your record has been updated.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Bank Id and Bank Name before updating.";
        header("location:bankupdate.php?tval=$tval&redirect=$redirect&ID=$bankid");
      }
      break;
     case 'Save':
      if (Trim($bankid) != "" and Trim($name) != "")
      { 
        $query_insert = "insert into `bank` (`BankCode`,`Name`, `Branch`,`Online`,`Location`,`SortCode`,`Paypoint`,`Bank Account`) 
               VALUES ('$bankid','$name','$branch','$online','$location','$sortcode','$paypoint','$bankaccount')";

        $result_insert = mysql_query($query_insert);
        $val="Bank";
        $tval="Your record has been saved.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Bank Id and Bank Name before saving.";
        header("location:bankupdate.php?tval=$tval&redirect=$redirect&ID=$bankid");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `bank` WHERE `BankCode` = '$bankid';";
       $result_delete = mysql_query($query_delete);          
        $val="Bank";
        $tval="Your record has been deleted.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      break;   
   }
 }
?>