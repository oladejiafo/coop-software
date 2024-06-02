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
 $revreason = $_POST["revreason"];
 $revamount = $_POST["revamount"];
echo $budget = $_POST["budget"];
 $init=$_POST["budget"];
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Submit':
      if (Trim($revreason) != "")
      { 
        $query_update = "UPDATE `budget` SET `Review Amount` = '$revamount',`Budget`='$revamount',`Initial Amount`='$init',
          `Review Reason`='$revreason' WHERE `ID` = '$ID'";
        $result_update = mysqli_query($conn,$query_update);

          require_once 'time.php';
            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`ip`,`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . gethostbyaddr($_SERVER['REMOTE_ADDR']) . "/" . gethostbyname($_SERVER['REMOTE_ADDR']) . "','" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . $gmdatex . "','Budget Review','Saved Budget Review record for : " .$mda . " - " . $type . ", Amount: from " . $budget . " to " . $revamount . "')";

            $result_update_Log = mysqli_query($conn,$query_update_Log);
            ###### 

        $tval="Your record has been Saved.";
        header("location:breview.php?ID=$ID&xtt=budget&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter the Transaction Type before saving.";
        header("location:breview.php?ID=$ID&xtt=budget&xxx=1&tval=$tval&redirect=$redirect");
      }
      break;

   }
 }
?>