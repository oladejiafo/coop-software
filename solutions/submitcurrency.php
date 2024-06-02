<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 2) & ($_SESSION['access_lvl'] != 1) & ($_SESSION['access_lvl'] != 3))
{
 if ($_SESSION['access_lvl'] != 5){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");
}
}

 $idr = $_POST["idr"];
 $acctno = $_POST["acctno"];
 $curnote = $_POST["curnote"];
 $curamt = $_POST["curamt"];
 $transid = $_POST["transid"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Edit':
      if (Trim($curnote) != "" and Trim($curamt) != "")
      {
        $query_update = "UPDATE `currency detail` SET `TransID`='$transid',`Amount`='$curamt',`Note`='$curnote' WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$idr'";
        $result_update = mysql_query($query_update);

        header("location:transactions.php?idd=$transid&acctno=$acctno&cval=$cval&redirect=$redirect");
      }
      else
      {
        $cval="ERROR: Please enter Note and Amount!.";
        header("location:transactions.php?idd=$transid&idr=$idr&acctno=$acctno&cval=$cval&redirect=$redirect");
      }
      break;
     case 'Add':
      if (Trim($curnote) != "" and Trim($curamt) != "")
      { 
        $query_insert = "Insert into `currency detail` (`TransID`,`Date`,`Amount`,`Note`,`Officer`,`Account No`,`Company`) 
                                                VALUES ('$transid','" . date('Y-m-d') . "','$curamt','$curnote','" . ucfirst($_SESSION['name']) . "','$acctno','" .$_SESSION['company']. "')";
        $result_insert = mysql_query($query_insert);

        header("location:transactions.php?idd=$transid&acctno=$acctno&cval=$cval&redirect=$redirect");
      }
      else
      {
        $tval="ERROR: Please enter Note and Amount!";
        header("location:transactions.php?idd=$transid&acctno=$acctno&cval=$cval&redirect=$redirect");
      }
      break;
     case 'X':
      {
       $query_delete = "DELETE FROM `currency detail` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$idr'";
       $result_delete = mysql_query($query_delete);

        header("location:transactions.php?idd=$transid&acctno=$acctno&cval=$cval&redirect=$redirect");
      }
      break;   
   }
 }
?>