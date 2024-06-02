<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 3))
{
 if ($_SESSION['access_lvl'] != 5){
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
 $period = $_POST["period"];
 $description = $_POST["description"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($reference) != "" & Trim($serviceno) != "")
      {
        $query_update = "UPDATE `appraisal` SET `Staff Number`='$serviceno',`Reference` = '$reference',`Period`='$period',
         `Description`='$description' WHERE `Reference` = '$reference';";

        $result_update = mysql_query($query_update);

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn);
            $rows = mysql_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Appraisal records','Modified Appraisal Record for Staff: " . $serviceno . ", Reference: " . $reference . "')";

            $result_update_Log = mysql_query($query_update_Log);
            ###### 

        $tval="Your record has been updated.";
        header("location:staffsecret.php?tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Staff Number and Reference before updating.";
        header("location:appraise.php?SNO=$serviceno&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Save':
      if (Trim($reference) != "" & Trim($serviceno) != "")
      { 
        $query_insert = "Insert into `appraisal` (`Staff Number`,`Reference`, `Period`,`Description`) 
               VALUES ('$serviceno','$reference','$period','$description')
               ";

        $result_insert = mysql_query($query_insert);

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn);
            $rows = mysql_fetch_array($result);

            $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Appraisal records','Added Appraisal Record for Staff: " . $serviceno . ", Reference: " . $reference . "')";

            $result_insert_Log = mysql_query($query_insert_Log);
            ###### 

        $tval="Your record has been saved.";
        header("location:staffsecret.php?tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Staff Number and Reference before saving.";
        header("location:appraise.php?SNO=$serviceno&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `appraisal` WHERE `Reference` = '$reference';";
       $result_delete = mysql_query($query_delete);          

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn);
            $rows = mysql_fetch_array($result);

            $query_delete_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Appraisal records','Deleted Appraisal Record for Staff: " . $serviceno . ", Reference: " . $reference . "')";

            $result_delete_Log = mysql_query($query_delete_Log);
            ###### 

        $tval="Your record has been deleted.";
        header("location:staffsecret.php?tval=$tval&redirect=$redirect");
      }
      break;   
   }
 }
?>