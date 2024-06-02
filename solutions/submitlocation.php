<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");

}

 $locationid = $_POST["locationid"];
 $location = $_POST["location"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Modify':
      if (Trim($locationid) != "")
      {
        $query_update = "UPDATE `location` SET `Location` = '$location' WHERE `Company` ='" .$_SESSION['company']. "' AND  `Location_id` = '$locationid'";
        $result_update = mysqli_query($conn,$query_update) or die(mysqli_error());

        $val="Location";
        $tval="Your record has been updated.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Location before updating.";
        header("location:tableupdates.php?cmbTable=$val&id=" . $locationid . "&adtx=1&redirect=$redirect");
      }
      break;
     case 'Add':
      if (Trim($location) != "")
      { 
        $query_insert = "Insert into `location` (`Location`,`Company`) 
               VALUES ('$location', '" .$_SESSION['company']. "')";
        $result_insert = mysqli_query($conn,$query_insert) or die(mysqli_error());

        $val="Location";
        $tval="Your record has been saved.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Location before updating.";
        header("location:tableupdates.php?cmbTable=$val&id=" . $locationid . "&adtx=1&redirect=$redirect");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `location` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Location_id` = '$locationid'";
       $result_delete = mysqli_query($conn,$query_delete) or die(mysqli_error());

        $val="Location";
        $tval="Your record has been deleted.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      break;   
   }
 }
?>