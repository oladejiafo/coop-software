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

 $gl = $_POST["gl"];
 $ID = $_POST["ID"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($gl) != "")
      {
        $query_update = "UPDATE `grade level` SET `GL`='$gl' WHERE `ID` = '$ID';";

        $result_update = mysql_query($query_update);
        $val="Grade Level";
        $tval="Your record has been updated.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Grade Level before updating.";
        header("location:glupdate.php?tval=$tval&redirect=$redirect&ID=$gl");
      }
      break;
     case 'Save':
      if (Trim($gl) != "")
      { 
        $query_insert = "Insert into `grade level` (`GL`) 
               VALUES ('$gl')
               ";

        $result_insert = mysql_query($query_insert);
        $val="Grade Level";
        $tval="Your record has been saved.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Grade Level before saving.";
        header("location:glupdate.php?tval=$tval&redirect=$redirect&ID=$gl");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `grade level` WHERE `ID` = '$ID';";
       $result_delete = mysql_query($query_delete); 
        $val="Grade Level";
        $tval="Your record has been deleted.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
       }
      break;   
   }
 }
?>