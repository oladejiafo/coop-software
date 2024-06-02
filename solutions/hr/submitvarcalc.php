<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 1) & ($_SESSION['access_lvl'] != 2))
{
 if ($_SESSION['access_lvl'] != 5){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don�t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn�t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
$cmbFilter="None";
$filter="";
}
}

 $gl = $_POST["gl"];
 $payitem = $_POST["payitem"];
 $oldrate = $_POST["oldrate"];
 $newrate = $_POST["newrate"];
 $page = $_POST["page"];
 $duration = $_POST["duration"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Calculate':
      if (Trim($gl) != "")
      {
        $arrears=($newrate-$oldrate)*$duration;

        $query_insert = "insert into `varcalc` (`Grade Level`,`Pay Item`,`Old Rate`,`New Rate`,`Duration`,`Arrears`)
                         VALUES ('$gl','$payitem','$oldrate','$newrate','$duration','$arrears')";
        $result_insert = mysqli_query($conn,$query_insert);

        header("location:variationcalc.php?page=$page&cmbFilter=$cmbFilter&redirect=$redirect");
      }
      break;
     case 'Clear':
      {
        $query_clear = "delete from `varcalc`";
        $result_clear = mysqli_query($conn,$query_clear);
        header("location:variationcalc.php?page=$page&cmbFilter=$cmbFilter&redirect=$redirect");
      }
      break;
   }
 }
?>