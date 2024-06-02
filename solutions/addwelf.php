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

 $jnx=$_POST['jnx'];
 $mXtid = $_POST['mmXtid'];
 $mtid = $_POST['mmtid'];
 $amtpaid=$_POST['amtpaid'];
 $vvmid=$_POST['vmid'];

  if (isset($_POST['submit']))
  {
    switch ($_POST['submit'])
    {
      case 'Cancel':
      $jnx="";
      header("location:welfare.php?ID=$mXtid&tval=$tval&redirect=$redirect");
      break;

      case 'Update':
     if($_POST['participate']=="No")
     {
//       $vvmid=$_REQUEST['vmid'];
        $sqlVv="SELECT count(`ID`) as MEM, `Amount Paid`,`MID` FROM `welf` WHERE `Company` ='" .$_SESSION['company']. "' AND `TID`='$mtid' and `Participate`='Yes' Group By `ID`";
        $resultVv = mysqli_query($conn,$sqlVv) or die('Could not look up user data; ' . mysqli_error());
        $rowVv = mysqli_fetch_array($resultVv);
        $mem=$rowVv['MEM'] -1;
        $pamt = $rowVv['Amount Paid'];
        $xxid = $rowVv['MID'];
        $amt=0;

        if($row['Amount'] > 0)
        {
          $amount=($row['Amount']/$mem);
        } else {
          $amount=0;
        }
        $sqlVvxX="SELECT `ID`, `TID`,`MID`,`Company` FROM `welf` WHERE `Company` ='" .$_SESSION['company']. "' AND `TID`='$mXtid' AND `MID`='$xxid'";
        $checki = mysqli_query($conn,$sqlVvxX);
        if(mysqli_num_rows($checki) == 1)
        {
         $query_updateV = "UPDATE `welfare` SET `Amount Raised` = `Amount Raised` - ".$_POST['amtpaid']. " WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = ".$mXtid;
         $result_updateV = mysqli_query($conn,$query_updateV);
        
         $query_del = "DELETE FROM `welf` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = '" .$_POST['midd']. "'";
         $result_del = mysqli_query($conn,$query_del);
        }
     } else {
//        $amt=$row['Amount'];

        $sqlVvxX1="SELECT `ID`, `TID`,`MID`,`Amount Paid` FROM `welf` WHERE `Company` ='" .$_SESSION['company']. "' AND `TID`='$mXtid' AND `MID`='$vvmid'";
        $checki1 = mysqli_query($conn,$sqlVvxX1);
        $rowCH = mysqli_fetch_array($checki1);
        
        if($rowCH['Amount Paid'] != $_POST['amtpaid'])
        {
         $query_updateV = "UPDATE `welfare` SET `Amount Raised` = `Amount Raised` + ".$_POST['amtpaid']. " WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = ".$mXtid;
         $result_updateV = mysqli_query($conn,$query_updateV);
        }
         $query_update = "UPDATE `welf` SET `Paid` = '" .$_POST['paid']. "',`Participate` = '" .$_POST['participate']. "',`Amount Paid` = '" .$_POST['amtpaid']. "' WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = '" .$_POST['midd']. "'";
         $result_update = mysqli_query($conn,$query_update);
         unset($_POST['amtpaid']);
     }
     header("location:welfare.php?ID=$mXtid&tval=$tval&redirect=$redirect");
     break;

     case 'Save':
     $memberX=$_POST['member'];
     $pamt = $amtpaid;

     list($n,$xid) = explode(' - ', $memberX);
     
     $sqlVvv="SELECT `ID`,`Amount` FROM `welfare` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID`='$mXtid' Order By `ID` desc limit 0,1";
     $resultVvv = mysqli_query($conn,$sqlVvv) or die('Could not look up user data; ' . mysqli_error());
     $rowVvv = mysqli_fetch_array($resultVvv);
     $vvid=$rowVvv['ID'];
     $amount=$rowVvv['Amount'];


     $sqlVv="SELECT count(`ID`) as MEM FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND `Status`='Active' Group By `ID`";
     $resultVv = mysqli_query($conn,$sqlVv) or die('Could not look up user data; ' . mysqli_error());
     $rowVv = mysqli_fetch_array($resultVv);
     $mem=$rowVv['MEM'];

     $sqlVvx="SELECT `ID`, `Membership Number`,`No of Shares`,`Shares Value` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND `Status`='Active' AND `ID`='$xid' Order By `Surname`";
     $resultVvx = mysqli_query($conn,$sqlVvx);
     $amt=$row['Amount']/$mem;
     $amtpaid=$_POST['amtpaid'];

    $sqlVvxX="SELECT `ID`, `TID`,`MID`,`Company` FROM `welf` WHERE `Company` ='" .$_SESSION['company']. "' AND `TID`='$mXtid' AND `MID`='$xid'";
    $checki = mysqli_query($conn,$sqlVvxX);
    if(mysqli_num_rows($checki) == 0)
    {
     while(list($vid,$vmid,$vshare,$vshareV)=mysqli_fetch_row($resultVvx))
     { 
      $query_insertV = "Insert into `welf` (`TID`,`MID`, `Share Holding`,`Share Value`,`Share Percent`,`Requested Amount`,`Participate`,`paid`,`Amount Paid`, `Company`) 
                                       VALUES ('$mXtid','$xid', '$vshare','$vshareV','$vshareP','$amount','Yes','No','$amtpaid', '" .$_SESSION['company']. "')";
      $result_insertV = mysqli_query($conn,$query_insertV);
     }
     $query_updateVx = "UPDATE `welfare` SET `Amount Raised` = `Amount Raised` + ".$_POST['amtpaid']. " WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = ".$mXtid;
     $result_updateVx = mysqli_query($conn,$query_updateVx);
    }
    header("location:welfare.php?ID=$mXtid&tval=$tval&redirect=$redirect");
     break;
    }
  }

?>