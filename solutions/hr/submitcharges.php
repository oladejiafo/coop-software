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

 $charges = $_POST["charges"];
 
 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($charges) != "")
      {
        $query_update = "UPDATE `pension bank charges` SET `Charges Percent`='$charges' WHERE `Charges Percent` = '$charges';";

        $result_update = mysql_query($query_update);

        $val="Pension Bank Charges";
        $tval="Your record has been updated.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Bank Charges before updating.";
        header("location:chargesupdate.php?tval=$tval&redirect=$redirect&ID=$charges");
      }
      break;
     case 'Save':
      if (Trim($charges) != "")
      { 
        $query_insert = "Insert into `pension bank charges` (`Charges Percent`) 
               VALUES ('$charges')
               ";

        $result_insert = mysql_query($query_insert);

        $val="Pension Bank Charges";
        $tval="Your record has been saved.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Bank Charges before saving.";
        header("location:chargesupdate.php?tval=$tval&redirect=$redirect&ID=$charges");
      }
      break;

     case 'Delete':
      {
       $query_delete = "DELETE FROM `pension bank charges` WHERE `Charges Percent` = '$charges';";
       $result_delete = mysql_query($query_delete);          
        $val="Pension Bank Charges";
        $tval="Your record has been deleted.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      break;   
   }
 }
?>