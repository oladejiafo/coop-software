<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don�t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn�t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
}

 $varid = $_POST["varid"];
 $variationtype = $_POST["variationtype"];
 $vargroup = $_POST["vargroup"];
 $varclass = $_POST["varclass"];
 
 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($varid) != "")
      {
        $query_update = "UPDATE `variation type` SET `VarID`='$varid',`Variation Type`='$variationtype',`VarGroup`='$vargroup',`VarClass`='$varclass' WHERE `VarID` = '$varid';";

        $result_update = mysqli_query($conn,$query_update) or die(mysqli_error());

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql) or die('Could not fetch data; ' . mysqli_error());
            $rows = mysqli_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Variation Type Update','Modified Variation type: " . $variationtype . "')";

            $result_update_Log = mysqli_query($conn,$query_update_Log) or die(mysqli_error());
            ###### 

        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 1; URL=tableupdates.php?redirect=$redirect");
      }
      echo "Your record has been updated. You are now being re-directed to the List";
      break;
     case 'Save':
      if (Trim($varid) != "")
      { 
        $query_insert = "Insert into `variation type` (`VarID`,`Variation Type`,`VarGroup`,`VarClass`) 
               VALUES ('$varid','$variationtype','$vargroup','$varclass')
               ";

        $result_insert = mysqli_query($conn,$query_insert) or die(mysqli_error());

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql) or die('Could not fetch data; ' . mysqli_error());
            $rows = mysqli_fetch_array($result);

            $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Variation Type Update','Added Variation type: " . $variationtype . "')";

            $result_insert_Log = mysqli_query($conn,$query_insert_Log) or die(mysqli_error());
            ###### 

        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 5; URL=tableupdates.php?redirect=$redirect");
      }
      echo "Your record has been saved. You are now being re-directed to the List";
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `variation type` WHERE `VarID` = '$varid';";
       $result_delete = mysqli_query($conn,$query_delete) or die(mysqli_error());          

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql) or die('Could not fetch data; ' . mysqli_error());
            $rows = mysqli_fetch_array($result);

            $query_delete_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Variation Type Update','Deleted Variation type: " . $variationtype . "')";

            $result_delete_Log = mysqli_query($conn,$query_delete_Log) or die(mysqli_error());
            ###### 

        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 5; URL=tableupdates.php?redirect=$redirect");
      }
      echo "Your record has been deleted. You are now being re-directed to the List";
      break;   
   }
   echo " or <a href='tableupdates.php'>Click here</a> to return to list.";
 }
?>