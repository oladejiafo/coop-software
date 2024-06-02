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

 $typeid = $_POST["typeid"];
 $type = $_POST["type"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($typeid) != "")
      {
        $query_update = "UPDATE `loan type` SET `Type ID`='$typeid', `Type`='$type' WHERE `Type ID` = '$typeid';";

        $result_update = mysql_query($query_update) or die(mysql_error());
        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 1; URL=tableupdates.php?redirect=$redirect");
      }
      echo "Your record has been updated. You are now being re-directed to the List";
      break;
     case 'Save':
      if (Trim($typeid) != "")
      { 
        $query_insert = "Insert into `loan type` (`Type ID`, `Type`) 
               VALUES ('$typeid', '$type')
               ";

        $result_insert = mysql_query($query_insert) or die(mysql_error());
        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 5; URL=tableupdates.php?redirect=$redirect");
      }
      echo "Your record has been saved. You are now being re-directed to the List";
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `loan type` WHERE `Type ID` = '$typeid';";
       $result_delete = mysql_query($query_delete) or die(mysql_error());          
        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 5; URL=tableupdates.php?redirect=$redirect");
      }
      echo "Your record has been deleted. You are now being re-directed to the List";
      break;   
   }
   echo " or <a href='tableupdates.php'>Click here</a> to return to list.";
 }
?>