<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don�t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn�t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
}

 $id = $_POST["id"];
 $office = $_POST["office"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($id) != "")
      {
        $query_update = "UPDATE `office` SET `ID`='$id', `Office`='$office' WHERE `ID` = '$id';";

        $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
        $result = mysql_query($sql,$conn) or die('Could not fetch data; ' . mysql_error());
        $rows = mysql_fetch_array($result);

        $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
               VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Office Update','Modified Record: " . $office . "')";

        $result_insert_Log = mysql_query($query_insert_Log) or die(mysql_error());
        $result_update = mysql_query($query_update) or die(mysql_error());
        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 1; URL=tableupdates.php?redirect=$redirect");
      }
      echo "Your record has been updated. You are now being re-directed to the List";
      break;
     case 'Save':
      if (Trim($id) != "")
      { 
        $query_insert = "Insert into `office` (`ID`, `Office`) 
               VALUES ('$id', '$office')
               ";

        $result_insert = mysql_query($query_insert) or die(mysql_error());

        $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
        $result = mysql_query($sql,$conn) or die('Could not fetch data; ' . mysql_error());
        $rows = mysql_fetch_array($result);

        $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
               VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Office Update','Added Record: " . $office . "')";

        $result_insert_Log = mysql_query($query_insert_Log) or die(mysql_error());

        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 5; URL=tableupdates.php?redirect=$redirect");
      }
      echo "Your record has been saved. You are now being re-directed to the List";
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `office` WHERE `ID` = '$id';";
       $result_delete = mysql_query($query_delete) or die(mysql_error());          

        $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
        $result = mysql_query($sql,$conn) or die('Could not fetch data; ' . mysql_error());
        $rows = mysql_fetch_array($result);

        $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
               VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Office Update','Deleted Record: " . $office . "')";

        $result_insert_Log = mysql_query($query_insert_Log) or die(mysql_error());

        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 5; URL=tableupdates.php?redirect=$redirect");
      }
      echo "Your record has been deleted. You are now being re-directed to the List";
      break;   
   }
   echo " or <a href='tableupdates.php'>Click here</a> to return to list.";
 }
?>