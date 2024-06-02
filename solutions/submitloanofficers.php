<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");

}

 $id = $_POST["id"];
 $name = $_POST["name"];
 $phone = $_POST["phone"];
 $email = $_POST["email"];
 $branch = $_POST["branch"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Modify':
      if (Trim($name) != "")
      {
        $query_update = "UPDATE `loan officers` SET `Name`='$name',`Phone`='$phone',`email`='$email',`Branch`='$branch' WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$id'";
        $result_update = mysqli_query($conn,$query_update);

        $val="Loan Officers";
        $tval="Your record has been updated.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter the Loan Officer name before updating.";
        header("location:tableupdates.php?cmbTable=$val&id=" . $id . "&adtx=1&redirect=$redirect");
      }
      break;
     case 'Add':
      if (Trim($name) != "")
      { 
        $query_insert = "Insert into `loan officers` (`Name`,`Phone`,`email`,`Branch`,`Company`) 
               VALUES ('$name','$phone','$email','$branch', '" .$_SESSION['company']. "')";
        $result_insert = mysqli_query($conn,$query_insert);

        $val="Loan Officers";
        $tval="Your record has been saved.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Loan Officer name before saving.";
        header("location:tableupdates.php?cmbTable=$val&id=" . $id . "&adtx=1&redirect=$redirect");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `loan officers` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$id'";
       $result_delete = mysqli_query($conn,$query_delete);
        $val="Loan Officers";
        $tval="Your record has been deleted.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      break;   
   }
 }
?>