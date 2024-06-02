<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
 if ($_SESSION['access_lvl'] != 3){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don’t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn’t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
}
}

 $serviceno = $_POST["serviceno"];
 $reference = $_POST["reference"];
 $date = $_POST["date"];
 $warning = $_POST["warning"];
 $issuedby = $_POST["issuedby"];
 $remark = $_POST["remark"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($reference) != "" & Trim($serviceno) != "")
      {
        $query_update = "UPDATE `warning` SET `Staff Number`='$serviceno',`Reference` = '$reference',`Date`='$date', `Action`='$warning',
         `Issued By`='$issuedby',`Remark`='$remark' WHERE `Reference` = '$reference';";
        $result_update = mysql_query($query_update) or die(mysql_error());

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn) or die('Could not fetch data; ' . mysql_error());
            $rows = mysql_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Warning Update','Modified Warning record for Staff: " . $serviceno . ", Warning Reference: " . $reference . "')";

            $result_update_Log = mysql_query($query_update_Log) or die(mysql_error());
            ###### 

        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 5; URL=staffsecret.php?redirect=$redirect");
      }
      echo "Your record has been updated. You are now being re-directed to the List";
      break;
     case 'Save':
      if (Trim($reference) != "" & Trim($serviceno) != "")
      { 
        $query_insert = "Insert into `warning` (`Staff Number`,`Reference`, `Date`,`Actoin`,`Issued By`,`Remark`) 
               VALUES ('$serviceno','$reference','$date','$warning','$issuedby','$remark')
               ";

        $result_insert = mysql_query($query_insert) or die(mysql_error());

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn) or die('Could not fetch data; ' . mysql_error());
            $rows = mysql_fetch_array($result);

            $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Warning Update','Added Warning record for Staff: " . $serviceno . ", Warning Reference: " . $reference . "')";

            $result_insert_Log = mysql_query($query_insert_Log) or die(mysql_error());
            ###### 

        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 5; URL=staffsecret.php?redirect=$redirect");
      }
      echo "Your record has been saved. You are now being re-directed to the List";
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `warning` WHERE `Reference` = '$reference';";
       $result_delete = mysql_query($query_delete) or die(mysql_error());          

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn) or die('Could not fetch data; ' . mysql_error());
            $rows = mysql_fetch_array($result);

            $query_delete_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Warning Update','Deleted Warning record for Staff: " . $serviceno . ", Warning Reference: " . $reference . "')";

            $result_delete_Log = mysql_query($query_delete_Log) or die(mysql_error());
            ###### 

        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 5; URL=staffsecret.php?redirect=$redirect");
      }
      echo "Your record has been deleted. You are now being re-directed to the List";
      break;   
   }
   echo " or <a href='staffsecret.php'>Click here</a> to return to list.";
 }
?>