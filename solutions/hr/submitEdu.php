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
 $eduid = $_POST["eduid"];
 $school = $_POST["school"];
 $from = $_POST["from"]; 
 $to = $_POST["to"]; 
 $qualification = $_POST["qualification"]; 
 
 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($school) != "" & Trim($serviceno) != "")
      {
        $query_update = "UPDATE `education` SET `School`='$school', `From`='$from',`To`='$to',`Qualification`='$qualification' WHERE `EduID` = '$eduid';";

        $result_update = mysql_query($query_update);

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn);
            $rows = mysql_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Education History','Modified Education History for Staff: " . $serviceno . ", School: " . $school . "')";

            $result_update_Log = mysql_query($query_update_Log);
            ###### 

        $tval="Your record has been updated.";
        header("location:stafflist.php?tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Staff Number and School before updating.";
        header("location:education.php?SNO=$serviceno&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Save':
      if (Trim($school) != "" & Trim($serviceno) != "")
      { 
        $query_insert = "Insert into `education` (`Staff Number`,`School`, `From`, `To`, `Qualification`) 
               VALUES ('$serviceno','$school','$from','$to','$qualification')";

        $result_insert = mysql_query($query_insert);

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn);
            $rows = mysql_fetch_array($result);

            $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Education History','Added Education History for Staff: " . $serviceno . ", School: " . $school . "')";

            $result_insert_Log = mysql_query($query_insert_Log);
            ###### 

        $tval="Your record has been saved.";
        header("location:stafflist.php?tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Staff Number and School before saving.";
        header("location:education.php?SNO=$serviceno&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `education` WHERE `EduID` = '$eduid';";
       $result_delete = mysql_query($query_delete);

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn);
            $rows = mysql_fetch_array($result);

            $query_delete_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Education History','Deleted Education History for Staff: " . $serviceno . ", School: " . $school . "')";

            $result_delete_Log = mysql_query($query_delete_Log);
            ###### 

        $tval="Your record has been deleted.";
        header("location:stafflist.php?tval=$tval&redirect=$redirect");
       }
      break; 
   }
 }
?>