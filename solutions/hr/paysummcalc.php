<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
 if ($_SESSION['access_lvl'] != 7 & $_SESSION['access_lvl'] !=8 & $_SESSION['access_lvl'] !=1 & $_SESSION['access_lvl'] !=6){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don�t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn�t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
}
}

 $id = $_REQUEST["id"];
 $type = $_REQUEST["type"];
 $page = $_REQUEST["page"];
 $cmbFilter = $_REQUEST["cmbFilter"];
 $filter = $_REQUEST["filter"];

 require_once 'conn.php';

if ($type == 'Contract')
{
  $query_insert = "update `contract` set `Remark`='Approved' where `ID`='$id'";
  $result_insert = mysqli_query($conn,$query_insert);
     #######
     $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
     $result = mysqli_query($conn,$sql);
     $rows = mysqli_fetch_array($result);

     $query_insert_Log = "Insert into `Monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Hospital Register','Updated Lives: " . $hccode . ", " . $liv . "')";
     $result_insert_Log = mysqli_query($conn,$query_insert_Log);
     ###### 
    $tval=$type . " has been approved.";

    header("location:paysumm.php?id=$id&page=$page&cmbFilter=$cmbFilter&filter=$filter&redirect=$redirect");
}
else if ($type == 'Expense')
{
  $query_insert = "update `cash` set `Remark`='Approved' where `ID`='$id'";
  $result_insert = mysqli_query($conn,$query_insert);
     #######
     $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
     $result = mysqli_query($conn,$sql);
     $rows = mysqli_fetch_array($result);

     $query_insert_Log = "Insert into `Monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Hospital Register','Updated Lives: " . $hccode . ", " . $liv . "')";
     $result_insert_Log = mysqli_query($conn,$query_insert_Log);
     ###### 
    $tval=$type . " has been approved.";

    header("location:paysumm.php?id=$id&page=$page&cmbFilter=$cmbFilter&filter=$filter&redirect=$redirect");
}

?>