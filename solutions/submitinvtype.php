<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");

}

 $ID = $_POST["id"];
 $type = $_POST["type"];
// $amount = $_POST["amount"];
// $remark = $_POST["remark"];

 require_once 'conn.php';
 $val="Investment Types";

 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Modify':
      if (Trim($type) != "")
      {
        $query_update = "UPDATE `investment type` SET `Type`='$type' WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$ID'";
        $result_update = mysqli_query($conn,$query_update);

        $tval="Your record has been updated.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter thetype and others before updating.";
        header("location:tableupdates.php?cmbTable=$val&id=" . $id . "&adtx=1&redirect=$redirect");
      }
      break;
     case 'Add':
      if (Trim($type) != "")
      { 
        $query_insert = "Insert into `investment type` (`Type`,`Company`) 
               VALUES ('$type', '" .$_SESSION['company']. "')";
        $result_insert = mysqli_query($conn,$query_insert);

        $tval="Your record has been saved.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter type and others before saving.";
        header("location:tableupdates.php?cmbTable=$val&id=" . $id . "&adtx=1&redirect=$redirect");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `investment type` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$ID'";
       $result_delete = mysqli_query($conn,$query_delete);

        $tval="Your record has been deleted.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      break;   
   }
 }
?>