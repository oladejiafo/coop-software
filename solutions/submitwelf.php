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
 $classification = mysqli_real_escape_string($conn,$_POST["classification"]);
 $particulars = mysqli_real_escape_string($conn,$_POST["particulars"]);
// mysqlireal__escape_String($conn,
 $amount = $_POST["amount"];
 $pamount = $_POST["pamount"];
 $amountr = $_POST["amountr"];
 $date = $_POST["date"];
 $source = $_POST["source"];
 $recipient = mysqli_real_escape_string($conn,$_POST["recipient"]);
 $account = mysqli_real_escape_string($conn,$_POST["account"]);
 $bank = mysqli_real_escape_string($conn,$_POST["bank"]);
 $paid = $_POST["paid"];
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($ID) != "" && Trim($classification) != "")
      {
        $query_update = "UPDATE `welfare` SET `Type` = '$type',Classification='$classification', `Particulars`='$particulars',`Default Amount`='$pamount',`Amount`='$amount',`Amount Raised`='$amountr',
          `Bank`='$bank',`Paid`='$paid',`Account`='$account',`Recipient`='$recipient',`Date`='$date',`Source`='$source' WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = '$ID'";
        $result_update = mysqli_query($conn,$query_update);

            #######
            $sql = "SELECT * FROM cms_access_levels WHERE `Company` ='" .$_SESSION['company']. "' AND access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`, `Company`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Welfare','Modified Welfare record for : " . $type . ", classification: " . $classification . "', '" .$_SESSION['company']. "')";

            $result_update_Log = mysqli_query($conn,$query_update_Log);
            ###### 

        $tval="Your record has been updated.";
        header("location:welfare.php?ID=$ID&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter the Transaction Type before updating.";
        header("location:welfare.php?ID=$ID&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Save':
      if (Trim($classification) != "")
      { 
        $query_insert = "Insert into `welfare` (`Type`,`Classification`, `Particulars`,`Default Amount`,`Amount`,`Amount Raised`,`Date`,`Source`,`Account`,`Recipient`,`Bank`,`Paid`, `Company`) 
               VALUES ('$type','$classification','$particulars','$pamount','$amount','$amountr','$date','$source','$account','$recipient','$bank','$paid', '" .$_SESSION[company]. "')";
        $result_insert = mysqli_query($conn,$query_insert);
/*
        $sqlVvv="SELECT `ID` FROM `welfare` WHERE `Company` ='" .$_SESSION['company']. "' AND `Date`='$date' AND `Amount`='$amount' Order By `ID` desc limit 0,1";
        $resultVvv = mysqli_query($conn,$sqlVvv) or die('Could not look up user data; ' . mysqli_error());
        $rowVvv = mysqli_fetch_array($resultVvv);
        $vvid=$rowVvv['ID'];

        $sqlVv="SELECT count(`ID`) as MEM FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND `Status`='Active' Group By `ID`";
        $resultVv = mysqli_query($conn,$sqlVv) or die('Could not look up user data; ' . mysqli_error());
        $rowVv = mysqli_fetch_array($resultVv);
        $mem=$rowVv['MEM'];

        $sqlVvx="SELECT `ID`, `Membership Number`,`No of Shares`,`Shares Value` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND `Status`='Active' Order By `Surname`";
        $resultVvx = mysqli_query($conn,$sqlVvx);

        while(list($vid,$vmid,$vshare,$vshareV)=mysqli_fetch_row($resultVvx))
        { 
         if($amount > 0)
         {
          $amt=($amount/$mem);
         } else {
          $amt=0;
         }

          $query_insertV = "Insert into `welf` (`TID`,`MID`, `Share Holding`,`Share Value`,`Share Percent`,`Requested Amount`,`Participate`,`paid`,`Amount Paid`, `Company`) 
                                          VALUES ('$vvid','$vid', '$vshare','$vshareV','$vshareP','$amt','Yes','No',0, '" .$_SESSION['company']. "')";
          $result_insertV = mysqli_query($conn,$query_insertV);
        }
*/
            #######
            $sql = "SELECT * FROM cms_access_levels WHERE `Company` ='" .$_SESSION['company']. "' AND access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($result);

            $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`, `Company`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Welfare','Added Welfare record for: " . $type . ", classification: " . $classification . "', '" .$_SESSION['company']. "')";

            $result_insert_Log = mysqli_query($conn,$query_insert_Log);
            ###### 

        $tval="Your record has been saved.";
        header("location:welfare.php?ID=$vvid&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter the Transaction Type before saving.";
        header("location:welfare.php?ID=$vvid&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `welfare` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = '$ID'";

       $result_delete = mysqli_query($conn,$query_delete);          


            #######
            $sql = "SELECT * FROM cms_access_levels WHERE `Company` ='" .$_SESSION['company']. "' AND access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($result);

            $query_delete_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`,`company`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Welfare','Deleted Welfare record for: " . $type . ", classification: " . $classification . "', '" .$_SESSION['company']. "')";

            $result_delete_Log = mysqli_query($conn,$query_delete_Log);
            ###### 

        $tval="Your record has been deleted.";
        header("location:welfares.php?ID=$ID&tval=$tval&redirect=$redirect");
      }
      break;     
   }
 }
?>