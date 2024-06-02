<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");

}

 $id = $_POST["id"];
 $type = $_POST["type"];
 $rate = $_POST["rate"];
 $laterate = $_POST["laterate"];
 $guarantors = $_POST["guarantors"];
 $gReq = $_POST["gReq"];
 $cReq = $_POST["cReq"];
 $qReq = $_POST["qReq"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Modify':
      if (Trim($type) != "")
      {
        $query_update = "UPDATE `loan type` SET `Type`='$type',`Rate`='$rate',`Late Rate`='$laterate',`How Many Guarantor` = '$guarantors',`Guarantor Requirement`='$gReq',`Collateral Requirement`='$cReq',`Qualifying Requirement`='$qReq' WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$id'";
        $result_update = mysqli_query($conn,$query_update);

        $val="Loan Type Setup";
        $tval="Your record has been updated.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter the loan type and others before updating.";
        header("location:tableupdates.php?cmbTable=$val&id=" . $id . "&adtx=1&redirect=$redirect");
      }
      break;
     case 'Add':
      if (Trim($type) != "")
      { 
        $query_insert = "Insert into `loan type` (`Type`,`Rate`,`Late Rate`,`How Many Guarantor`,`Guarantor Requirement`,`Collateral Requirement`,`Qualifying Requirement`,`Company`) 
               VALUES ('$type','$rate','$laterate','$guarantors','$gReq','$cReq','$qReq', '" .$_SESSION['company']. "')";
        $result_insert = mysqli_query($conn,$query_insert);

        $val="Loan Type Setup";
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
       $query_delete = "DELETE FROM `loan type` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$id'";
       $result_delete = mysqli_query($conn,$query_delete);
        $val="Loan Type Setup";
        $tval="Your record has been deleted.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      break;   
   }
 }
?>