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

 $deptid = $_POST["deptid"];
 $department = $_POST["department"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($deptid) != "" and Trim($department) != "")
      {
        $query_update = "UPDATE `department` SET `Dept ID`='$deptid', `Dept`='$department' WHERE `Dept ID` = '$deptid';";

        $result_update = mysql_query($query_update);

        $val="Department";
        $tval="Your record has been updated.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Dept ID and Dept before updating.";
        header("location:deptupdate.php?tval=$tval&redirect=$redirect&ID=$deptid");
      }
      break;
     case 'Save':
      if (Trim($deptid) != "" and Trim($department) != "")
      { 
        $query_insert = "Insert into `department` (`Dept ID`, `Dept`) 
               VALUES ('$deptid', '$department')
               ";

        $result_insert = mysql_query($query_insert);
        $val="Department";
        $tval="Your record has been saved.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Dept ID and Dept before saving.";
        header("location:deptupdate.php?tval=$tval&redirect=$redirect&ID=$deptid");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `department` WHERE `Dept ID` = '$deptid';";
       $result_delete = mysql_query($query_delete);
        $val="Department";
        $tval="Your record has been deleted.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      break;   
   }
 }
?>