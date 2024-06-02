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

 $ID = $_POST["ID"];
 $type = $_POST["type"];
 $title = $_POST["title"];
 $details = $_POST["details"]; //Description
 $amount = $_POST["amount"];
 $date = $_POST["date"];
 $members = $_POST["members"];
 $amounttemp = $_POST["amounttemp"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($ID) != "" && Trim($type) != "")
      {
        if($amounttemp ==$amount)
        {
          $query_update = "UPDATE `investment` SET `Type` = '$type',`Title`='$title', `Description`='$details',Amount='$amount',
            `Date`='$date',`Members`='$members' WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = '$ID'";
          $result_update = mysqli_query($conn,$query_update);
        } else {

          $query_update = "UPDATE `investment` SET `Type` = '$type',`Title`='$title', `Description`='$details',Amount='$amount',
               `Date`='$date',`Members`='$members' WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = '$ID'";
          $result_update = mysqli_query($conn,$query_update);

          $sqlVvx="SELECT `ID`, `TID`,`MID`,`Share Value`,`Share Holding`,`Share Percent` FROM `invest` WHERE `Company` ='" .$_SESSION['company']. "' AND `Participate`='Yes' AND `TID`='$ID' Order By `ID`";
          $resultVvx = mysqli_query($conn,$sqlVvx);

          while(list($vid,$vtid,$vmid,$vshareV,$vshareH,$vshareP)=mysqli_fetch_row($resultVvx))
          { 
            if($amount > 0)
            {
              $amt=($amount*$vshareP)/100;
            } else {
              $amt=$amount;
            }

            $query_update = "UPDATE `invest` SET `Invest Amount`='$amt' WHERE `Company` ='" .$_SESSION['company']. "' AND `TID` = '$vtid' AND `ID` = '$vid'";
            $result_update = mysqli_query($conn,$query_update);
          }
        }

            #######
            $sql = "SELECT * FROM cms_access_levels WHERE `Company` ='" .$_SESSION['company']. "' AND access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`, `Company`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Investment','Modified Investment record for : " . $type . ", Title: " . $tile . "', '" .$_SESSION['company']. "')";

            $result_update_Log = mysqli_query($conn,$query_update_Log);
            ###### 

        $tval="Your record has been updated.";
        header("location:investment.php?id=$ID&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter the Inestment Type before updating.";
        header("location:investment.php?id=$ID&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Save':
      if (Trim($type) != "")
      { 
        $query_insert = "Insert into `investment` (`Type`,`Title`, `Description`,`Amount`,`Date`,`Members`, `Company`) 
               VALUES ('$type','$title', '$details','$amount','$date','$members', '" .$_SESSION['company']. "')";
        $result_insert = mysqli_query($conn,$query_insert);

        $sqlVvv="SELECT `ID` FROM `investment` WHERE `Company` ='" .$_SESSION['company']. "' AND `Date`='$date' AND `Title`='$title' Order By `ID` desc limit 0,1";
        $resultVvv = mysqli_query($conn,$sqlVvv) or die('Could not look up user data; ' . mysqli_error());
        $rowVvv = mysqli_fetch_array($resultVvv);
        $vvid=$rowVvv['ID'];

        $sqlVv="SELECT count(`ID`) as MEM FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND `Status`='Active' Group By `ID`";
        $resultVv = mysqli_query($conn,$sqlVv) or die('Could not look up user data; ' . mysqli_error());
        $rowVv = mysqli_fetch_array($resultVv);
        $mem=$rowVv['MEM'];

        $query_updateV = "UPDATE `investment` SET `Members` = '$mem' WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = '$vvid'";
        $result_updateV = mysqli_query($conn,$query_updateV);

        $sqlZ="SELECT `Total Available` FROM `shares` WHERE `Company` ='" .$_SESSION['company']. "'";
        $resultZ = mysqli_query($conn,$sqlZ) or die('Could not look up user data; ' . mysqli_error());
        $rowZ = mysqli_fetch_array($resultZ);
        $totZ=$rowZ['Total Available'];

        $sqlVvx="SELECT `ID`, `Membership Number`,`No of Shares`,`Shares Value` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND `Status`='Active' Order By `Surname`";
        $resultVvx = mysqli_query($conn,$sqlVvx);

        while(list($vid,$vmid,$vshare,$vshareV)=mysqli_fetch_row($resultVvx))
        { 
          $vshareP=($vshare / $totZ)*100;

        if($amount > 0)
        {
          $amt=($amount*$vshareP)/100;
        } else {
          $amt=0;
        }

          $query_insertV = "Insert into `invest` (`TID`,`MID`, `Share Holding`,`Share Value`,`Share Percent`,`Invest Amount`,`Participate`, `Company`) 
                                          VALUES ('$vvid','$vid', '$vshare','$vshareV','$vshareP','$amt','Yes', '" .$_SESSION['company']. "')";
          $result_insertV = mysqli_query($conn,$query_insertV);
        }

            #######
            $sql = "SELECT * FROM cms_access_levels WHERE `Company` ='" .$_SESSION['company']. "' AND access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($result);

            $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`, `Company`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Investment','Added New Investment record for: " . $type . ", Title: " . $title . "', '" .$_SESSION['company']. "')";

            $result_insert_Log = mysqli_query($conn,$query_insert_Log);
            ###### 

        $tval="Your record has been saved.";
        header("location:investment.php?id=$vvid&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter the Investment Type before saving.";
        header("location:investment.php?id=$vvid&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `investment` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = '$ID'";
       $result_delete = mysqli_query($conn,$query_delete);          

       $query_deletex = "DELETE FROM `invest` WHERE `Company` ='" .$_SESSION['company']. "' AND `TID` = '$ID'";
       $result_deletex = mysqli_query($conn,$query_deletex);

            #######
            $sql = "SELECT * FROM cms_access_levels WHERE `Company` ='" .$_SESSION['company']. "' AND access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($result);

            $query_delete_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`,`company`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Investment','Deleted Investment record for: " . $type . ", Title: " . $title . "', '" .$_SESSION['company']. "')";

            $result_delete_Log = mysqli_query($conn,$query_delete_Log);
            ###### 

        $tval="Your record has been deleted.";
        header("location:investment.php?id=$ID&tval=$tval&redirect=$redirect");
      }
      break;     
   }
 }
?>