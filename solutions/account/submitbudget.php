<?php
 session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 3))
{
 if ($_SESSION['access_lvl'] != 5){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");
}
}

 require_once 'conn.php';

 $ID = $_POST["ID"];
 $type = $_POST["type"];
 $classi = $_POST["classification"];
 $budget = $_POST["budget"];
 $month = $_POST["month"];
 $descr = $_POST["descr"];
 $mda = $_POST["mda"];
 list($codd, $classi) = explode(' - ', $classi);
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Modify':
      if (Trim($ID) != "" && Trim($type) != "")
      {
        $query_update = "UPDATE budget SET `Type` = '$type',`Classification`='$classi',Budget='$budget',
          `Year`='$month',`MDA`='$mda',`Description`='$descr' WHERE `ID` = '$ID'";

        $result_update = mysqli_query($conn,$query_update);

          require_once 'time.php';
            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`ip`,`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . gethostbyaddr($_SERVER['REMOTE_ADDR']) . "/" . gethostbyname($_SERVER['REMOTE_ADDR']) . "','" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . $gmdatex . "','Budget','Modified Budget record for : " .$mda . " - " . $type . ", Class: " . $class . "')";

            $result_update_Log = mysqli_query($conn,$query_update_Log);
            ###### 

        $tval="Your record has been Modified.";
        header("location:budget.php?ID=$ID&xtt=budget&xxx=1&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter the Budget Type before updating.";
        header("location:budget.php?ID=$ID&xtt=budget&xxx=1&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Save':
      if (Trim($type) != "")
      { 
        $query_insert = "Insert into budget (`Type`,`Classification`,`Budget`,`Year`,`MDA`,`Description`) 
               VALUES ('$type','$classi','$budget','$month','$mda','$descr')";

        $result_insert = mysqli_query($conn,$query_insert);

          require_once 'time.php';
            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`ip`,`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . gethostbyaddr($_SERVER['REMOTE_ADDR']) . "/" . gethostbyname($_SERVER['REMOTE_ADDR']) . "','" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . $gmdatex . "','Budget','Saved Budget record for : " .$mda . " - " . $type . ", Class: " . $class . "')";

            $result_update_Log = mysqli_query($conn,$query_update_Log);
            ###### 

        $tval="Your record has been Saved.";
        header("location:budget.php?xtt=budget&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter the Transaction Type before saving.";
        header("location:budget.php?ID=$ID&xtt=budget&xxx=1&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM budget WHERE `ID` = '$ID'";
       $result_delete = mysqli_query($conn,$query_delete);          

          require_once 'time.php';
            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`ip`,`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . gethostbyaddr($_SERVER['REMOTE_ADDR']) . "/" . gethostbyname($_SERVER['REMOTE_ADDR']) . "','" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . $gmdatex . "','Budget','Deleted Budget record for : " .$mda . " - " . $type . ", Class: " . $class . "')";

            $result_update_Log = mysqli_query($conn,$query_update_Log);
            ###### 

        $tval="Your record has been Deleted.";
        header("location:budget.php?ID=$ID&xtt=budget&tval=$tval&redirect=$redirect");
      }
      break;     
   }
 }
?>