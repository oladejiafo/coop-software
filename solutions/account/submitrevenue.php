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
 $class = $_POST["class"];
 $amount = mysqli_real_escape_string($conn,$_POST["amount"]);
 $month = $_POST["month"];
 $descr = $_POST["descr"];
 $mda = $_POST["mda"]; 
 $account = $_POST["account"]; 

 $ramount= mysqli_real_escape_string($conn,$_POST["ramount"]);
 $bank = $_POST["bank"];
 $paid = $_POST["paid"];
 $date=date('Y-m-d');

list($codd, $class) = explode(' - ', $class);

 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Modify':
      if (Trim($ID) != "" && Trim($amount) != "")
      {
        $query_update = "UPDATE `cash` SET `Classification`='$class', `Particulars`='$descr',`Amount`='$amount',`Account`='$account', `Bank`='$bank',`Paid`='$paid',`Date`='$date',`MDA`='$mda' WHERE `ID` = '$ID'";
        $result_update = mysqli_query($conn,$query_update);

          require_once 'time.php';
            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`ip`,`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . gethostbyaddr($_SERVER['REMOTE_ADDR']) . "/" . gethostbyname($_SERVER['REMOTE_ADDR']) . "','" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . $gmdatex . "','Revenue','Modified Revenue record for : " .$mda . " - " . $month . ", Class: " . $class . "')";

            $result_update_Log = mysqli_query($conn,$query_update_Log);
            ###### 

        $tval="Your record has been Modified.";
        header("location:revenue.php?ID=$ID&xtt=revenue&xxx=1&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter the Revenue Type before updating.";
        header("location:revenue.php?ID=$ID&xtt=revenue&xxx=1&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Save':
      if (Trim($amount) != "")
      { 
        $query_insert = "Insert into `cash` (`Type`,`Account`,`Classification`, `Particulars`,`Amount`, `Bank`,`Paid`,`Date`,`MDA`) 
               VALUES ('Revenue','$account','$class', '$descr', '$amount', '$bank','$paid','$date', '$mda')";
        $result_insert = mysqli_query($conn,$query_insert);

          require_once 'time.php';
            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`ip`,`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . gethostbyaddr($_SERVER['REMOTE_ADDR']) . "/" . gethostbyname($_SERVER['REMOTE_ADDR']) . "','" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . $gmdatex . "','Revenue','Saved Revenue record for : " .$mda . " - " . $amount . ", Class: " . $class . "')";

            $result_update_Log = mysqli_query($conn,$query_update_Log);
            ###### 

        $tval="Your record has been Saved.";
        header("location:revenue.php?xtt=revenue&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter the Transaction Type before saving.";
        header("location:revenue.php?ID=$ID&xtt=revenue&xxx=1&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `cash` WHERE `ID` = '$ID'";
       $result_delete = mysqli_query($conn,$query_delete);          

          require_once 'time.php';
            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`ip`,`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . gethostbyaddr($_SERVER['REMOTE_ADDR']) . "/" . gethostbyname($_SERVER['REMOTE_ADDR']) . "','" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . $gmdatex . "','Revenue','Deleted Revenue record for : " .$mda . " - " . $amount . ", Class: " . $class . "')";

            $result_update_Log = mysqli_query($conn,$query_update_Log);
            ###### 

        $tval="Your record has been Deleted.";
        header("location:revenue.php?ID=$ID&xtt=revenue&tval=$tval&redirect=$redirect");
      }
      break;     
   }
 }
?>