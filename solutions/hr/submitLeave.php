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
 $leaveid = $_POST["leaveid"];
 $leavetype = $_POST["leavetype"];
 $from = $_POST["from"];
 $to = $_POST["to"];
 $days=$_POST["days"];
 $dateresumed=$_POST["dateresumed"]; 
 
 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($serviceno) != "")
      {
        $query_update = "UPDATE `leave` SET `Type`='$leavetype', `Days`='$days',`Date Resumed`='$dateresumed',`From`='$from',`To`='$to' WHERE `LeaveID` = '$leaveid';";

        $result_update = mysql_query($query_update);

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn);
            $rows = mysql_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Leave Record','Modified Leave record for Staff: " . $serviceno . ", Leave Date: " . $from . "')";

            $result_update_Log = mysql_query($query_update_Log);
            ###### 

        $tval="Your record has been updated.";
        header("location:stafflist.php?tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Staff Number before updating.";
        header("location:leave.php?SNO=$serviceno&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Save':
      if (Trim($serviceno) != "")
      { 
        $query_insert = "Insert into `leave` (`Staff Number`,`Type`, `From`,`To`,`Days`,`Date Resumed`) 
               VALUES ('$serviceno','$leavetype','$from','$to','$days','$dateresumed')";

        $result_insert = mysql_query($query_insert);

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn);
            $rows = mysql_fetch_array($result);

            $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Leave Record','Added Leave record for Staff: " . $serviceno . ", Leave Date: " . $from . "')";

            $result_insert_Log = mysql_query($query_insert_Log);
            ###### 

        $tval="Your record has been saved.";
        header("location:stafflist.php?tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Staff Number before saving.";
        header("location:leave.php?SNO=$serviceno&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `leave` WHERE `LeaveID` = '$leaveid';";
       $result_delete = mysql_query($query_delete); 

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn);
            $rows = mysql_fetch_array($result);

            $query_delete_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Leave Record','Deleted Leave record for Staff: " . $serviceno . ", Leave Date: " . $from . "')";

            $result_delete_Log = mysql_query($query_delete_Log);
            ###### 

        $tval="Your record has been deleted.";
        header("location:stafflist.php?tval=$tval&redirect=$redirect");
      }
      break; 
   }
 }
?>