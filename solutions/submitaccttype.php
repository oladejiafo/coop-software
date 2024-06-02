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
 $intrate = $_POST["intrate"];
 $rmode = $_POST["rmode"];
 $effect = $_POST["effect"];
 $margintype = $_POST["margintype"];
 $margin = $_POST["margin"];
 $mindep = $_POST["mindep"];
 $remark = $_POST["remark"];

if(empty($intrate) OR $intrate=="")
{
  $intrate=0;
}
if(empty($rmode) OR $rmode=="")
{
  $rmode=0;
}
if(empty($margin) OR $margin=="")
{
  $margin=0;
}
if(empty($mindep) OR $mindep=="")
{
  $mindep=0;
}

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Modify':
      if (Trim($type) != "")
      {
        $query_update = "UPDATE `account type` SET `Type`='$type',`Interest Rate`='$intrate',`Effect`='$effect',`Rate Mode`='$rmode',`Margin Type`='$margintype',`Margin`='$margin',`Minimum Deposit`='$mindep',`Remark`='$remark' WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$ID'";
        $result_update = mysqli_query($conn,$query_update);

        $val="Savings Account Type";
        $tval="Your record has been updated.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $val="Savings Account Type";
        $tval="Please enter the account type and others before updating.";
        header("location:tableupdates.php?cmbTable=$val&id=" . $id . "&adtx=1&redirect=$redirect");
      }
      break;
     case 'Add':
      if (Trim($type) != "")
      { 
        $query_insert = "Insert into `account type` (`Type`,`Interest Rate`,`Rate Mode`,`Effect`,`Margin Type`,`Margin`,`Minimum Deposit`,`Remark`,`Company`) 
               VALUES ('$type'," .$intrate. "," .$rmode. ",'$effect','$margintype'," .$margin. "," .$mindep. ",'$remark', '" .$_SESSION['company']. "')";
        $result_insert = mysqli_query($conn,$query_insert);

        $val="Savings Account Type";
        $tval="Your record has been saved.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      else
      {
        $val="Savings Account Type";
        $tval="Please enter type and others before saving.";
        header("location:tableupdates.php?cmbTable=$val&id=" . $id . "&adtx=1&redirect=$redirect");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `account type` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$ID'";
       $result_delete = mysqli_query($conn,$query_delete);
        $val="Savings Account Type";
        $tval="Your record has been deleted.";
        header("location:tableupdates.php?cmbTable=$val&tval=$tval&redirect=$redirect");
      }
      break;   
   }
 }
?>