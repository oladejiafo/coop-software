<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 3))
{
 if ($_SESSION['access_lvl'] != 4){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");
}
}

 $id = $_REQUEST["id"];
 $bank = $_REQUEST["bank"];
 $confirm = $_REQUEST["confirm"];
 $conf = $_REQUEST["conf"];
 $amount = $_REQUEST["amount"];
 $dat = $_REQUEST["dat"];
 $page = $_REQUEST["page"];
 $filter = $_REQUEST["filter"];
 require_once 'conn.php';

 
  $query_insert = "update `remitance` set `CBN Remitance`='$amount',`CBN Confirm`=1,`CBN Date`='$dat' WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID`=$id";
  $result_insert = mysql_query($query_insert);

  $tval="Record has been Confirm.";

 header("location:cbn.php?id=$id&page=$page&bank=$bank&redirect=$redirect");
?>