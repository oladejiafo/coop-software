<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");

}

 $ID = $_POST["id"];
 $category = $_POST["category"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($ID) != "")
      {
        $query_update = "UPDATE `heads category` SET `Category`='$category' WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$ID'";
        $result_update = mysqli_query($conn,$query_update);

        $val="Account Heads Category";
        $tval="Your record has been updated.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $val="Account Heads Category";
        $tval="Please enter the Category before updating.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Save':
      if (Trim($category) != "")
      { 
        $query_insert = "Insert into `heads category` (`Category`,`Company`) 
               VALUES ('$category', '" .$_SESSION['company']. "')";
        $result_insert = mysqli_query($conn,$query_insert);

        $val="Account Heads Category";
        $tval="Your record has been saved.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $val="Account Heads Category";
        $tval="Please enter category before saving.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `heads category` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$ID'";
       $result_delete = mysqli_query($conn,$query_delete);
        $val="Account Heads Category";
        $tval="Your record has been deleted.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      break;   
   }
 }
?>