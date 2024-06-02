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
 $serviceno=$_POST["serviceno"]; 
 $spousename = $_POST["spousename"];
 $marriagedate = $_POST["marriagedate"];
 $spouseDoB = $_POST["spouseDoB"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($serviceno) != "")
      {
        $query_update = "UPDATE staff SET `Wife Name`='$spousename',`Marriage Date` = '$marriagedate', `Wife DoB`='$spouseDoB' WHERE `Staff Number` = '$serviceno';";
        $result_update = mysql_query($query_update) or die(mysql_error());

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn) or die('Could not fetch data; ' . mysql_error());
            $rows = mysql_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Spouse Update','Modified Spouse record for Staff: " . $serviceno . ", Spouse Name: " . $spousename . "')";

            $result_update_Log = mysql_query($query_update_Log) or die(mysql_error());
            ###### 

        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 5; URL=stafflist.php?redirect=$redirect");
      }
      echo "Your record has been updated. You are now being re-directed to the List";
      break;
   
     case 'Delete':
      {
   
      }
   }
   echo " or <a href='stafflist.php'>Click here</a> to return to list.";
 }
?>