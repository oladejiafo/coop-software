<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");

}

 $id = $_POST["id"];
 $agent = $_POST["agent"];
 $phone = $_POST["phone"];
 $email = $_POST["email"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Modify':
      if (Trim($agent) != "")
      {
        $query_update = "UPDATE `agents` SET `Agent`='$agent',`Phone`='$phone',`email`='$email' WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$id'";
        $result_update = mysqli_query($conn,$query_update);

        $val="Agents";
        $tval="Your record has been updated.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter the agent name before updating.";
        header("location:tableupdates.php?cmbTable=$val&id=" . $id . "&adtx=1&redirect=$redirect");
      }
      break;
     case 'Add':
      if (Trim($agent) != "")
      { 
        $query_insert = "Insert into `agents` (`Agent`,`Phone`,`email`,`Company`) 
               VALUES ('$agent','$phone','$email', '" .$_SESSION['company']. "')";
        $result_insert = mysqli_query($conn,$query_insert);

        $val="Agents";
        $tval="Your record has been saved.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter agent name before saving.";
        header("location:tableupdates.php?cmbTable=$val&id=" . $id . "&adtx=1&redirect=$redirect");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `agents` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$id'";
       $result_delete = mysqli_query($conn,$query_delete);
        $val="Agents";
        $tval="Your record has been deleted.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      break;   
   }
 }
?>