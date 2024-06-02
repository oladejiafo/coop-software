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

 $allowanceid = $_POST["allowanceid"];
 $type = $_POST["type"];
 $description = $_POST["description"];
 $sortorder = $_POST["sortorder"];
 $group = $_POST["group"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($allowanceid) != "" and Trim($type) != "")
      {
        $query_update = "UPDATE `allowance types` SET `AllowanceID`='$allowanceid',`Type` = '$type',
         `Description`='$description',`SortOrder` = '$sortorder',`Group` = '$group' WHERE `AllowanceId` = '$allowanceid';";

        $result_update = mysql_query($query_update);
     
        $val="Allowance Type";
        $tval="Your record has been updated.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Allowance Type before updating.";
        header("location:allowtupdate.php?tval=$tval&redirect=$redirect&ID=$allowanceid");
      }
      break;
     case 'Save':
      if (Trim($allowanceid) != "" and Trim($type) != "")
      { 
        $query_insert = "Insert into `allowance types` (`AllowanceID`,`Type`, `Description`,`SortOrder`,`Group`) 
               VALUES ('$allowanceid','$type','$description','$sortorder','$group')";

        $result_insert = mysql_query($query_insert) or die(mysql_error());
        $val="Allowance Type";
        $tval="Your record has been saved.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Allowance Type before saving.";
        header("location:allowtupdate.php?tval=$tval&redirect=$redirect&ID=$allowanceid");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `allowance types` WHERE `AllowanceID` = '$allowanceid';";
       $result_delete = mysql_query($query_delete) or die(mysql_error());          

        $val="Allowance Type";
        $tval="Your record has been saved.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      break;   
   }
 }
?>