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

 $lgaid = $_POST["lgaid"];
 $lga = $_POST["lga"];
 $state = $_POST["state"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($lgaid) != "" and Trim($lga) != "" and Trim($state) != "")
      {
        $query_update = "UPDATE `lga` SET `LGAID`='$lgaid', `LGA`='$lga', `State`='$state' WHERE `LGAID` = '$lgaid';";

        $result_update = mysql_query($query_update);
        $val="LGA";
        $tval="Your record has been updated.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter all the fields before updating.";
        header("location:allowtupdate.php?tval=$tval&redirect=$redirect&ID=$lgaid");
      }
      break;
     case 'Save':
      if (Trim($lgaid) != "" and Trim($lga) != "" and Trim($state) != "")
      { 
        $query_insert = "Insert into `lga` (`LGAID`, `LGA`, `State`) 
               VALUES ('$lgaid', '$lga', '$state')
               ";

        $result_insert = mysql_query($query_insert);
        $val="LGA";
        $tval="Your record has been saved.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter all the fields before saving.";
        header("location:allowtupdate.php?tval=$tval&redirect=$redirect&ID=$lgaid");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `lga` WHERE `LGAID` = '$lgaid';";
       $result_delete = mysql_query($query_delete);
        $val="LGA";
        $tval="Your record has been deleted.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      break;   
   }
 }
?>