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
 $share=$_POST['shares'];
 $source=$_POST['source'];
 $vvmid=$_POST['vmid'];
 $id=$_POST['id'];

  if (isset($_POST['submit']))
  {
    switch ($_POST['submit'])
    {
      case 'Cancel':
      $jnx="";
      header("location:investment.php?id=$mXtid&tval=$tval&redirect=$redirect");
      break;

      case 'Update':
     if($_POST['participate']=="No")
     {
//       $vvmid=$_REQUEST['vmid'];
        $sqlVv="SELECT count(`ID`) as MEM, `MID` FROM `invest` WHERE `Company` ='" .$_SESSION['company']. "' AND `TID`='$mtid' and `Participate`='Yes' Group By `ID`";
        $resultVv = mysqli_query($conn,$sqlVv) or die('Could not look up user data; ' . mysqli_error());
        $rowVv = mysqli_fetch_array($resultVv);
        $mem=$rowVv['MEM'] -1;
//        $pamt = $rowVv['Amount Paid'];
        $xxid = $rowVv['MID'];
        $amt=0;

        $sqlVvx="SELECT `ID`, `Membership Number` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND `Status`='Active' AND `ID`='$vvmid' Order By `Surname`";
        $resultVvx = mysqli_query($conn,$sqlVvx);
        $rowVvx = mysqli_fetch_array($resultVvx);
        $memNum = $rowVvx['Membership Number'];
  
        if($row['Amount'] > 0)
        {
          $amount=($row['Amount']/$mem);
        } else {
          $amount=0;
        }
        $sqlVvxX="SELECT `ID`, `TID`,`MID`,`Company` FROM `invest` WHERE `Company` ='" .$_SESSION['company']. "' AND `TID`='$mXtid' AND `MID`='$xxid'";
        $checki = mysqli_query($conn,$sqlVvxX);
        if(mysqli_num_rows($checki) == 1)
        {
         $query_updateV = "UPDATE `investment` SET `Members` = (`Members` - 1) WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = ".$mXtid;
         $result_updateV = mysqli_query($conn,$query_updateV);
        
         $query_del = "DELETE FROM `invest` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = '" .$_POST['midd']. "'";
         $result_del = mysqli_query($conn,$query_del);
         if($source =="From Savings")
         {
            $sqlVvw="SELECT `ID`,`Amount`,`Total Units`,`Unit Value` FROM `investment` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID`='$id' Order By `ID` desc limit 0,1";
            $resultVvw = mysqli_query($conn,$sqlVvw) or die('Could not look up user data; ' . mysqli_error());
            $rowVvw = mysqli_fetch_array($resultVvw);
            $unitvalue=$rowVvv['Unit Value'];
            $vamount =$share * $unitvalue;

            $query111 = "SELECT `Balance` FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND `Account Number` = '".$memNum."' order by `ID` desc limit 0,1";
            $result111 = mysqli_query($conn,$query111);
            $row111 = mysqli_fetch_array($result111);
            $balance = $row111['Balance'];
            $bal = $balance + $vamount;

            $query_updateVx1 = "Insert INTO `transactions` (`Date`,`Deposit`,`Transactor`,`Remark`, `Company`, `Account Number`,`Transaction Type`,`Officer`)
            VALUE ('".date('Y-m-d'). "','$vamount','Auto Transaction','Reversal on Investment Deduction', '" .$_SESSION['company']. "','".$memNum."','Deposit','Auto')";
            $result_updateVx1 = mysqli_query($conn,$query_updateVx1);

            $query_updateVx11 = "UPDATE `transactions` SET `Balance`=".$bal.",`Book Balance`=".$bal." WHERE `Company` ='" .$_SESSION['company']. "' AND `Account Number` = '".$memNum."' AND `Date` = '".date('Y-m-d'). "' AND `Deposit`='$vamount'";
            $result_updateVx11 = mysqli_query($conn,$query_updateVx11);
         }
        }
     } else {
        $sqlVvv="SELECT `ID`,`Amount`,`Total Units`,`Unit Value` FROM `investment` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID`='$id' Order By `ID` desc limit 0,1";
        $resultVvv = mysqli_query($conn,$sqlVvv) or die('Could not look up user data; ' . mysqli_error());
        $rowVvv = mysqli_fetch_array($resultVvv);
        $vvid=$rowVvv['ID'];
        //$vamount=$rowVvv['Amount'];
        $totalunit=$rowVvv['Total Units'];
        $unitvalue=$rowVvv['Unit Value'];
        
        $vshareV =$share * $unitvalue;
        $vamount =$share * $unitvalue;
        if($totalunit>0 && $share>0)
        {
         $vshareP =$share /$totalunit;
        }

        $sqlVvxX1="SELECT `ID`, `TID`,`MID`,`Amount Paid` FROM `invest` WHERE `Company` ='" .$_SESSION['company']. "' AND `TID`='$mXtid' AND `MID`='$vvmid'";
        $checki1 = mysqli_query($conn,$sqlVvxX1);
        $rowCH = mysqli_fetch_array($checki1);
        $xxid = $rowCH['MID'];

        $sqlVvx="SELECT `ID`, `Membership Number` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND `Status`='Active' AND `ID`='$vvmid' Order By `Surname`";
        $resultVvx = mysqli_query($conn,$sqlVvx);
        $rowVvx = mysqli_fetch_array($resultVvx);
        $memNum = $rowVvx['Membership Number'];

         $query_update = "UPDATE `invest` SET `Participate` = '" .$_POST['participate']. "',`Share Holding` = '" .$_POST['shares']. "',`Share Value`='$vshareV', `Share Percent`='$vshareP', `Invest Amount`='$vamount',`Source`='$source' WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = '" .$_POST['midd']. "'";
         $result_update = mysqli_query($conn,$query_update);
         
         if($source =="From Savings")
         {
            $query111 = "SELECT `Balance` FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND `Account Number` = '".$memNum."' order by `ID` desc limit 0,1";
            $result111 = mysqli_query($conn,$query111);
            $row111 = mysqli_fetch_array($result111);
            $balance = $row111['Balance'];
            $bal = $balance - $vamount;

          $query_updateVx1 = "Insert INTO `transactions` (`Date`,`Withdrawal`,`Transactor`,`Remark`, `Company`, `Account Number`,`Transaction Type`,`Officer`)
                                                  VALUE ('".date('Y-m-d'). "','$vamount','Auto Transaction','Investment Deduction', '" .$_SESSION['company']. "','".$memNum."','Withdrawal','Auto')";
          $result_updateVx1 = mysqli_query($conn,$query_updateVx1);

          $query_updateVx11 = "UPDATE `transactions` SET `Balance`=".$bal.",`Book Balance`=". $bal." WHERE `Company` ='" .$_SESSION['company']. "' AND `Account Number` = '".$memNum."' AND `Date` = '".date('Y-m-d'). "' AND `Withdrawal`='$vamount'";
          $result_updateVx11 = mysqli_query($conn,$query_updateVx11);
         }
     }
     header("location:investment.php?id=$mXtid&tval=$tval&redirect=$redirect");
     break;

     case 'Save':
     $memberX=$_POST['member'];
//     $pamt = $amtpaid;

     list($n,$xid) = explode(' - ', $memberX);
     
     $sqlVvv="SELECT `ID`,`Amount`,`Total Units`,`Unit Value` FROM `investment` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID`='$id' Order By `ID` desc limit 0,1";
     $resultVvv = mysqli_query($conn,$sqlVvv) or die('Could not look up user data; ' . mysqli_error());
     $rowVvv = mysqli_fetch_array($resultVvv);
     $vvid=$rowVvv['ID'];
     $amount=$rowVvv['Amount'];
     $totalunit=$rowVvv['Total Units'];
     $unitvalue=$rowVvv['Unit Value'];
     
     $vshareV =$share * $unitvalue;
     $amount =$share * $unitvalue;
     if($totalunit>0 && $share>0)
     {
      $vshareP =$share /$totalunit;
     } 

     $sqlVv="SELECT count(`ID`) as MEM FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND `Status`='Active' Group By `ID`";
     $resultVv = mysqli_query($conn,$sqlVv) or die('Could not look up user data; ' . mysqli_error());
     $rowVv = mysqli_fetch_array($resultVv);
     $mem=$rowVv['MEM']+1;

     $sqlVvx="SELECT `ID`, `Membership Number`,`No of Shares`,`Shares Value` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND `Status`='Active' AND `ID`='$xid' Order By `Surname`";
     $resultVvx = mysqli_query($conn,$sqlVvx);
     $rowVvx = mysqli_fetch_array($resultVvx);
     $memNum = $rowVvx['Membership Number'];
//     $amtpaid=$_POST['amtpaid'];

    $sqlVvxX="SELECT `ID`, `TID`,`MID`,`Company` FROM `invest` WHERE `Company` ='" .$_SESSION['company']. "' AND `TID`='$id' AND `MID`='$xid'";
    $checki = mysqli_query($conn,$sqlVvxX);
    if(mysqli_num_rows($checki) == 0)
    {
     //while(list($vid,$vmid,$vshare,$vshareV)=mysqli_fetch_row($resultVvx))
     { 
      $query_insertV = "Insert into `invest` (`TID`,`MID`, `Share Holding`,`Share Value`,`Share Percent`,`Invest Amount`,`Participate`,`Source`, `Company`) 
                                       VALUES ('$mXtid','$xid', '$share','$vshareV','$vshareP','$amount','Yes','$source', '" .$_SESSION['company']. "')";
      $result_insertV = mysqli_query($conn,$query_insertV);
     }
     $query_updateVx = "UPDATE `investment` SET `Members` = ".$mem. " WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = ".$id;
     $result_updateVx = mysqli_query($conn,$query_updateVx);
     if($source =="From Savings")
     {
        $query111 = "SELECT `Balance` FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND `Account Number` = '".$memNum."' order by `ID` desc limit 0,1";
        $result111 = mysqli_query($conn,$query111);
        $row111 = mysqli_fetch_array($result111);
        $balance = $row111['Balance'];
        $bal = $balance - $amount;

        $query_updateVx1 = "Insert INTO `transactions` (`Date`,`Withdrawal`,`Transactor`,`Remark`, `Company`, `Account Number`,`Transaction Type`,`Officer`)
        VALUE ('".date('Y-m-d'). "','$amount','Auto Transaction','Investment Deduction', '" .$_SESSION['company']. "','".$memNum."','Withdrawal','Auto')";
        $result_updateVx1 = mysqli_query($conn,$query_updateVx1);

        $query_updateVx11 = "UPDATE `transactions` SET `Balance`=".$bal.",`Book Balance`=".$bal." WHERE `Company` ='" .$_SESSION['company']. "' AND `Account Number` = '".$memNum."' AND `Date` = '".date('Y-m-d'). "' AND `Withdrawal`='$amount'";
        $result_updateVx11 = mysqli_query($conn,$query_updateVx11);
     }
    }
    header("location:investment.php?id=$mXtid&tval=$tval&redirect=$redirect");
     break;
    }
  }

?>