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

 $locationid = $_POST["locationid"];
 $location = $_POST["location"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($locationid) != "")
      {
        $query_update = "UPDATE `location` SET `Location_ID`='$locationid',`Location` = '$location' WHERE `LocationId` = '$locationid';";

        $result_update = mysql_query($query_update) or die(mysql_error());
        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 1; URL=tableupdates.php?redirect=$redirect");
      }
      echo "Your record has been updated. You are now being re-directed to the List";
      break;
     case 'Save':
      if (Trim($locationid) != "")
      { 
        $query_insert = "Insert into `location` (`Location_ID`,`Location`) 
               VALUES ('$locationid','$location')
               ";

        $result_insert = mysql_query($query_insert) or die(mysql_error());
        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 5; URL=tableupdates.php?redirect=$redirect");
      }
      echo "Your record has been saved. You are now being re-directed to the List";
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `location` WHERE `Location_ID` = '$locationid';";
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