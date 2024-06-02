<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");

}

 $ID = $_POST["id"];
 $total = $_POST["total"];
 $max = $_POST["max"];
 $min = $_POST["min"];
 $cost = $_POST["cost"];
 $premium = $_POST["premium"];
// $totleft = $_POST["totleft"]; 

 require_once 'conn.php';
 $val="Shares Setup";

 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Modify':
      if (Trim($total) != "")
      {
          //, `Total Left`='$totleft'
        $query_update = "UPDATE `shares` SET `Total Available`='$total',`Max Share`='$max',`Min Share`='$min', `Unit Cost`='$cost',`Shares Premium`='$premium' WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$ID'";
        $result_update = mysqli_query($conn,$query_update);

        $tval="Your record has been updated.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter type and others before updating.";
        header("location:tableupdates.php?cmbTable=$val&id=" . $id . "&adtx=1&redirect=$redirect");
      }
      break;
     case 'Add':
      if (Trim($total) != "")
      { 
        $query_insert = "Insert into `shares` (`Total Available`,`Max Share`,`Min Share`, `Unit Cost`,`Shares Premium`, `Total Left`,`Company`) 
               VALUES ('$total','$max','$min', '$cost','$premium', '100', '" .$_SESSION['company']. "')";
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
       $query_delete = "DELETE FROM `shares` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$ID'";
       $result_delete = mysqli_query($conn,$query_delete);

        $tval="Your record has been deleted.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      break;   
   }
 }
?>