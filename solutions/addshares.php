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
 $stNum = $_POST['stNum'];
 $midd = $_POST['midd'];
 $mshares=$_POST['mshares'];
 $mvalue=$_POST['mvalue'];
 $names=$_POST['names'];
 $id=$_POST['id'];
 list($name,$xid) = explode(' - ', $names);

  if (isset($_POST['submit']))
  {
    switch ($_POST['submit'])
    {
      case 'Cancel':
      $jnx="";
      header("location:shares.php?redirect=$redirect");
      break;

      case 'Update':
      if($mshares)
      {
        $sqlVm="SELECT `ID`,`No of Shares` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID`='$midd'";
        $resultVm = mysqli_query($conn,$sqlVm) or die('Could not look up user data; ' . mysqli_error());
        $rowVm = mysqli_fetch_array($resultVm);
        $mprev=$rowVm['No of Shares'];

        $sqlVvv="SELECT `ID`,`Total Left`,`Total Available` FROM `shares` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID`='$id' Order By `ID` desc limit 0,1";
        $resultVvv = mysqli_query($conn,$sqlVvv) or die('Could not look up user data; ' . mysqli_error());
        $rowVvv = mysqli_fetch_array($resultVvv);
        $left=$rowVvv['Total Left'];
        $avail=$rowVvv['Total Available'];

        $mprec = ($mprev/$avail)*100;
        $mperc = ($mshares/$avail)*100;
        $query_updatec = "UPDATE `shares` SET `Total Left` = (`Total Left` + $mprec) WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = '" .$id. "'";
        $result_updatec = mysqli_query($conn,$query_updatec);

        $query_update = "UPDATE `shares` SET `Total Left` = (`Total Left` - $mperc) WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = '" .$id. "'";
        $result_update = mysqli_query($conn,$query_update);

        $query_update1 = "UPDATE `membership` SET `No of Shares` = '$mshares',`Shares Value` = '$mvalue' WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = '" .$midd. "'";
        $result_update1 = mysqli_query($conn,$query_update1);
      }
      $tval ="Updated Successfully";
      header("location:shares.php?tval=$tval&redirect=$redirect");
      break;

     case 'Save':
     if($mshares)
     {     
        $sqlVvv="SELECT `ID`,`Total Left`,`Total Available` FROM `shares` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID`='$id' Order By `ID` desc limit 0,1";
        $resultVvv = mysqli_query($conn,$sqlVvv) or die('Could not look up user data; ' . mysqli_error());
        $rowVvv = mysqli_fetch_array($resultVvv);
        $left=$rowVvv['Total Left'];
        $avail=$rowVvv['Total Available'];
        
        $mperc = ($mshares/$avail)*100;
        $query_update = "UPDATE `shares` SET `Total Left` = (`Total Left` - $mperc) WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = '" .$id. "'";
        $result_update = mysqli_query($conn,$query_update);

        $query_update1 = "UPDATE `membership` SET `No of Shares` = '$mshares',`Shares Value` = '$mvalue' WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = '" .$xid. "'";
        $result_update1 = mysqli_query($conn,$query_update1);
     }
     $tval ="Added Successfully";
     header("location:shares.php?tval=$tval&redirect=$redirect");
     break;

     case 'Delete':
     if($midd)
     {
      $sqlVvv="SELECT `ID`,`Total Left`,`Total Available` FROM `shares` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID`='$id' Order By `ID` desc limit 0,1";
      $resultVvv = mysqli_query($conn,$sqlVvv) or die('Could not look up user data; ' . mysqli_error());
      $rowVvv = mysqli_fetch_array($resultVvv);
      $left=$rowVvv['Total Left'];
      $avail=$rowVvv['Total Available'];
     
      $mperc = ($mshares/$avail)*100;
      $query_update = "UPDATE `shares` SET `Total Left` = (`Total Left` + $mperc) WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = '" .$id. "'";
      $result_update = mysqli_query($conn,$query_update);

      $query_del = "UPDATE `membership` SET `No of Shares` = 0,`Shares Value` = 0 WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = '" .$midd. "'";
      $result_del = mysqli_query($conn,$query_del);
     }
     $tval ="Removed Successfully";
     header("location:shares.php?tval=$tval&redirect=$redirect");
     break;

    }
  }

?>