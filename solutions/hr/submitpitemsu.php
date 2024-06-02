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
 $description = $_POST["description"];
 $amount = $_POST["amount"];
 $type = $_POST["type"];
 $allowid = $_POST["allowid"];
 $cmbtype = $_POST["cmbtype"];
 
 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($gl) != "")
      {
        $query_update = "UPDATE `allowances` SET `Grade Level`='$gl',`Description`='$description', `Amount`='$amount',`Type`='$type' WHERE `Grade Level` = '$gl' and `AllowanceID`='$allowid'";

        $result_update = mysql_query($query_update) or die(mysql_error());

       header("location:pitems.php?cmbGL=$gl&cmbType=$cmbtype&descr=$description&redirect=$redirect");
      }
      else
      {
       header("location:pitemsupdate.php?tval=$tval&redirect=$redirect&id=$id");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `allowances` WHERE `Grade Level` = '$gl' and `AllowanceID`='$allowid'";
       $result_delete = mysql_query($query_delete) or die(mysql_error());          

       header("location:pitems.php?redirect=$redirect");
      }
      break;   
   }
 }
?>