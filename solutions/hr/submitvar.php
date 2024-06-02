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
}
}
 $serviceno = $_POST["serviceno"];
 $staffname = $_POST["staffname"];
 $description = $_POST["description"];
 $variationamount = $_POST["variationamount"];
 $variationtype = $_POST["variationtype"];
 $month = $_POST["month"];
 $cmbMonth = $_POST["cmbMonth"];
 $id = $_POST["id"];
 $office = $_POST["office"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($serviceno) != "")
      {
        $qry = "SELECT * FROM `variation type` Where `variation Type`='" . $variationtype ."'";
        $reslt = mysqli_query($conn,$qry) or die('Could not fetch data; ' . mysqli_error());
        $rowl = mysqli_fetch_array($reslt);
        $ty=$rowl['VarGroup'];
        $vid=$rowl['VarID'];
        $tp=$rowl['VarClass'];

        if ($cmbMonth == "- Select Month-")
        { } else {
         $month=$cmbMonth . ", " . $month;
        }

        $query_update = "UPDATE `variation` SET `Staff Number` = '$serviceno',`Name`='$staffname', `Description`='$description',`Variation`='$variationamount',
         `Type`='$variationtype',`Typ2`='$ty', `For Month`='$month', `Office`='$office',`SortOrder`='$vid',`AllowID`='$vid',`Typ`='$tp' WHERE `ID` = '$id';";

        $result_update = mysqli_query($conn,$query_update) or die(mysqli_error());

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql) or die('Could not fetch data; ' . mysqli_error());
            $rows = mysqli_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Variation Update','Modified Variation record for Staff: " . $serviceno . ", Variation Description: " . $description . "')";

            $result_update_Log = mysqli_query($conn,$query_update_Log) or die(mysqli_error());
            ###### 

        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 5; URL=variations.php?redirect=$redirect");
      }
      echo "Your record has been updated. You are now being re-directed to the List";
      break;
     case 'Save':
      if (Trim($serviceno) != "")
      { 
        $qry = "SELECT * FROM `variation type` Where `variation Type`='" . $variationtype ."'";
        $reslt = mysqli_query($conn,$qry) or die('Could not fetch data; ' . mysqli_error());
        $rowl = mysqli_fetch_array($reslt);
        $ty=$rowl['VarGroup'];
        $vid=$rowl['VarID'];
        $tp=$rowl['VarClass'];

        if ($cmbMonth == "- Select Month-")
        { } else {
         $month=$cmbMonth . ", " . $month;
        }

        $query_insert = "Insert into `variation` (`Staff Number`,`Name`, `Description`,`Variation`,`Type`,`For Month`,`Office`,`SortOrder`,`AllowID`,`Typ`,`Typ2`) 
               VALUES ('$serviceno','$staffname','$description','$variationamount','$variationtype','$month','$office','$vid','$vid','$tp','$ty')
               ";

        $result_insert = mysqli_query($conn,$query_insert) or die(mysqli_error());

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql) or die('Could not fetch data; ' . mysqli_error());
            $rows = mysqli_fetch_array($result);

            $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Variation Update','Added Variation record for Staff: " . $serviceno . ", Variation Description: " . $description . "')";

            $result_insert_Log = mysqli_query($conn,$query_insert_Log) or die(mysqli_error());
            ###### 

        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 5; URL=variations.php?redirect=$redirect");
      }
      echo "Your record has been saved. You are now being re-directed to the List";
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `variation` WHERE `ID` = '$id';";
       $result_delete = mysqli_query($conn,$query_delete) or die(mysqli_error());          

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql) or die('Could not fetch data; ' . mysqli_error());
            $rows = mysqli_fetch_array($result);

            $query_delete_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Variation Update','Deleted Variation record for Staff: " . $serviceno . ", Variation Description: " . $description . "')";

            $result_delete_Log = mysqli_query($conn,$query_delete_Log) or die(mysqli_error());
            ###### 

        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 5; URL=variations.php?redirect=$redirect");
      }
      echo "Your record has been deleted. You are now being re-directed to the List";
      break;
     
   }
   echo " or <a href='variations.php'>Click here</a> to return to list.";
 }
?>