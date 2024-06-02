<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
 if ($_SESSION['access_lvl'] != 4){
   if ($_SESSION['access_lvl'] != 3){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don’t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn’t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
}
}
}
 $serviceno = $_POST["serviceno"];
 $employer = $_POST["employer"];
 $position = $_POST["position"];
 $location = $_POST["location"];
 $from = $_POST["from"];
 $to = $_POST["to"];
 
 
 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':     
      {
        $query_update = "UPDATE `employment_history` SET `POsition`='$position', `Employer`='$employer',`From`='$from',`To`='$to',`Location`='$location' WHERE `Employer` = '$employer';";

        $result_update = mysql_query($query_update) or die(mysql_error());

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn) or die('Could not fetch data; ' . mysql_error());
            $rows = mysql_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Employment Records','Modified Employment record for Staff: " . $serviceno . ", Employer: " . $employer . "')";

            $result_update_Log = mysql_query($query_update_Log) or die(mysql_error());
            ###### 

        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 5; URL=stafflist.php?redirect=$redirect");
      }
      echo "Your record has been updated. You are now being re-directed to the List";
      break;
     case 'Save':
      { 
        $query_insert = "Insert into `employment_history` (`Staff Number`,`Position`, `Employer`,`From`,`To`,`Location`) 
               VALUES ('$serviceno','$position','$employer','$from','$to','$location')";

        $result_insert = mysql_query($query_insert) or die(mysql_error());

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn) or die('Could not fetch data; ' . mysql_error());
            $rows = mysql_fetch_array($result);

            $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Employment Records','Added Employment record for Staff: " . $serviceno . ", Employer: " . $employer . "')";

            $result_insert_Log = mysql_query($query_insert_Log) or die(mysql_error());
            ###### 

        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 5; URL=stafflist.php?redirect=$redirect");
      }
      echo "Your record has been saved. You are now being re-directed to the List";
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `employment_history` WHERE `Employer` = '$employer';";
       $result_delete = mysql_query($query_delete) or die(mysql_error());          

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn) or die('Could not fetch data; ' . mysql_error());
            $rows = mysql_fetch_array($result);

            $query_delete_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Employment Records','Deleted Employment record for Staff: " . $serviceno . ", Employer: " . $employer . "')";

            $result_delete_Log = mysql_query($query_delete_Log) or die(mysql_error());
            ###### 

        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 5; URL=stafflist.php?redirect=$redirect");
      }
      echo "Your record has been deleted. You are now being re-directed to the List";
      break; 
   }
   echo " or <a href='stafflist.php'>Click here</a> to return to list.";
 }
?>