<?php
$page = $_SERVER['PHP_SELF'];
$sec = "300";

require_once 'conn.php';
?>
<?php
/*
<html>
<head>
  <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
</head>
*/
?>
<?php
     $sqlLp="SELECT count(`ID`) as lPend FROM `loan` where `Approval` not in ('Approved','Denied') AND `Loan Status` !='Active' AND `Company` ='" .$_SESSION['company']. "'";
     $resultLp = mysqli_query($conn,$sqlLp);
     $rowLp = mysqli_fetch_array($resultLp);
     $lnpend=$rowLp['lPend'];
     if(mysqli_num_rows($resultLp) == 0)
     { 
      $lnpend=0;
     } 	 
     $lpendi= number_format($lnpend,0);

   $numx=0;
   $loanTot=0;
   $queryxp = "SELECT `ID`,`Loan Date`,`Loan Amount`,`Loan Duration`,`Monthly Interest`,`Monthly Principal`,`Balance` FROM `loan` WHERE `Loan Status`='Active' AND `Company` ='" .$_SESSION['company']. "'";
   $resultxp=mysqli_query($conn,$queryxp);

    while(list($xid,$xdate,$xamount,$xnpay,$xmintr,$xmprinc,$xbal)=mysqli_fetch_row($resultxp))
    {
      for($xx=1; $xx <= $xnpay; $xx++)
      {
        $xdate=date('Y-m-d', strtotime('+1 month',strtotime($xdate)));
        $xtot=$xmintr + $xmprinc;

        $query = "SELECT `Account Number`,`Loan ID` FROM `loan payment` WHERE `Date`='" . $xdate . "' AND `Loan ID`='" .$xid. "' AND `Company` ='" .$_SESSION['company']. "'";
        $resultp=mysqli_query($conn,$query);
  
        if(mysqli_num_rows($resultLp) == 0)
        { 
          $numx=$numx+1;
          $loanTot=$loanTot + $xbal;
        }
      }
    }
    $numxbi=number_format($numx,0);

   $resultX = mysqli_query ($conn,"SELECT distinct `Loan Date`,`ID`, `Loan Duration` FROM `loan` where `Due Date` < '" . date('Y-m-d') . "' and `Balance` > 0 and `Loan Status`='Active' AND `Company` ='" .$_SESSION['company']. "' group by `Account Number`"); 
   $ExLoan=mysqli_num_rows($resultX); 
   $xLoani=number_format($ExLoan,0);
/*
   $_lpendx=$lpend;
   $_numxb=$numxb;
   $_xLoan=$xLoan;
*/   
?>
