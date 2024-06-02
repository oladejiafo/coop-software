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
 $date = $_POST["date"];
 $descr = $_POST["particulars"];
 $recipient = $_POST["recipient"]; 
 $account = $_POST["account"]; 

 $ramount= mysqli_real_escape_string($conn,$_POST["ramount"]);
 $bank = $_POST["bank"];
 $paid = $_POST["paid"];
 $balance = $_POST["balance"];
 $spent = $_POST["spent"];
 $remark = $_POST["remark"];

 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Modify':
      if (Trim($ID) != "" && Trim($amount) != "")
      {
        $query_update = "UPDATE `advances` SET `Classification`='$class', `Particulars`='$descr',`Amount`='$amount',`Account`='$account', `Bank`='$bank',`Paid`='$paid',`Date`='$date',`Recipient`='$recipient' WHERE `ID` = '$ID'";
        $result_update = mysqli_query($conn,$query_update);

          require_once 'time.php';
            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`ip`,`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . gethostbyaddr($_SERVER['REMOTE_ADDR']) . "/" . gethostbyname($_SERVER['REMOTE_ADDR']) . "','" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . $gmdatex . "','Advances','Modified Advances record for : " .$mda . " - " . $month . ", Class: " . $class . "')";

            $result_update_Log = mysqli_query($conn,$query_update_Log);
            ###### 

        $tval="Your record has been Modified.";
        header("location:advances.php?ID=$ID&xtt=advance&xxx=1&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter the Type before updating.";
        header("location:advances.php?ID=$ID&xtt=advance&xxx=1&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Save':
      if (Trim($amount) != "")
      { 
list($codd, $class) = explode(' - ', $class);
        $query_insert = "Insert into `advances` (`Type`,`Account`,`Classification`, `Particulars`,`Amount`, `Bank`,`Paid`,`Date`,`Recipient`) 
               VALUES ('Advance','$account','$class', '$descr', '$amount', '$bank','$paid','$date', '$recipient')";
        $result_insert = mysqli_query($conn,$query_insert);

          require_once 'time.php';
            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`ip`,`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . gethostbyaddr($_SERVER['REMOTE_ADDR']) . "/" . gethostbyname($_SERVER['REMOTE_ADDR']) . "','" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . $gmdatex . "','Advances','Saved Advance record for : " .$mda . " - " . $amount . ", Class: " . $class . "')";

            $result_update_Log = mysqli_query($conn,$query_update_Log);
            ###### 

        $tval="Your record has been Saved.";
        header("location:advances.php?xtt=advance&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter the Transaction Type before saving.";
        header("location:advances.php?ID=$ID&xtt=advance&xxx=1&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `advances` WHERE `ID` = '$ID'";
       $result_delete = mysqli_query($conn,$query_delete);          

          require_once 'time.php';
            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`ip`,`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . gethostbyaddr($_SERVER['REMOTE_ADDR']) . "/" . gethostbyname($_SERVER['REMOTE_ADDR']) . "','" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . $gmdatex . "','Advances','Deleted Advance record for : " .$mda . " - " . $amount . ", Class: " . $class . "')";

            $result_update_Log = mysqli_query($conn,$query_update_Log);
            ###### 

        $tval="Your record has been Deleted.";
        header("location:advances.php?ID=$ID&xtt=advance&tval=$tval&redirect=$redirect");
      }
      break;     
     case 'Submit':
      if (Trim($ID) != "")
      {
        $query_update = "UPDATE `advances` SET `Balance`='$balance', `Spent`='$spent',`Remark`='$remark' WHERE `ID` = '$ID'";
        $result_update = mysqli_query($conn,$query_update);

        $tval="Your record has been Submited.";
        header("location:advretire.php?ID=$ID&xtt=advance&xxx=1&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter the Type before updating.";
        header("location:advretire.php?ID=$ID&xtt=advance&xxx=1&tval=$tval&redirect=$redirect");
      }
      break;
   }
 }
?>