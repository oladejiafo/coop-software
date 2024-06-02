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

 $id = $_POST["id"];
 $supplier = $_POST["supplier"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($id) != "")
      {
        $query_update = "UPDATE `supplier` SET `ID`='$id',`Supplier` = '$supplier' WHERE `ID` = '$id'";

        $result_update = mysql_query($query_update) or die(mysql_error());

        $val="Supplier";
        $tval="Your record has been updated.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter ID and Supplier before updating.";
        header("location:supplierupdate.php?tval=$tval&redirect=$redirect&ID=$id");
      }
      break;
     case 'Save':
      if (Trim($id) != "")
      { 
        $query_insert = "Insert into `supplier` (`ID`,`Supplier`) 
               VALUES ('$id','$supplier')";

        $result_insert = mysql_query($query_insert) or die(mysql_error());

        $val="Supplier";
        $tval="Your record has been saved.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter ID and Supplier before updating.";
        header("location:supplierupdate.php?tval=$tval&redirect=$redirect&ID=$id");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `supplier` WHERE `ID` = '$id'";
       $result_delete = mysql_query($query_delete) or die(mysql_error());          

        $val="Supplier";
        $tval="Your record has been deleted.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      break;
   }
 }
?>