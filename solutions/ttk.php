<?php
$page = $_SERVER['PHP_SELF'];
$sec = "300";

require_once 'conn.php';
?>
<html>
<head>
  <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
</head>

<?php
     $sqlp="SELECT count(`ID`) as cnt FROM `membership` where `Status` ='Active' AND `Company` ='" .$_SESSION['company']. "'";
     $resultp = mysqli_query($conn,$sqlp);
     $rowp = mysqli_fetch_array($resultp);
     $pat=$rowp['cnt'];
     if(mysqli_num_rows($resultp) == 0)
     { 
      $pat=0;
     } 	 
$patt= number_format($pat,0);

$tday=date('Y-m-d');
     $sqlw="SELECT MONTH(`Date Registered`) weeknumber, COUNT(DISTINCT(`ID`)) users_count
             FROM `membership`
             WHERE MONTH(`Date Registered`) <= MONTH('" .$tday. "') 
               AND MONTH(`Date Registered`) > (MONTH('" .$tday. "') - 4)
             GROUP BY weeknumber";
     $resultw = mysqli_query($conn,$sqlw);
     $roww = mysqli_fetch_array($resultw);
     $wik=$roww['users_count'];
     if(mysqli_num_rows($resultw) == 0)
     { 
      $wik=0;
     } 	 
$wikk= number_format($wik,0);

     $sqlLB="SELECT sum(`Balance`) as bal FROM `loan` where `Balance` > 0 AND `Loan Status`='Active' AND `Company` ='" .$_SESSION['company']. "'";
     $resultLB = mysqli_query($conn,$sqlLB);
     $rowLB = mysqli_fetch_array($resultLB);
     $loanB=$rowLB['bal'];
     if(mysqli_num_rows($resultLB) == 0)
     { 
      $loanB=0;
     } 	 
$loanBb= number_format($loanB,2);

     $sqlDl="SELECT sum(`Loan Amount`) as dloan FROM `loan` where (DATE( `Loan Date` ) >= DATE_ADD( '2019-04-05 00:00:00', INTERVAL -1 MONTH)) AND `Loan Status`='Active' AND `Company` ='" .$_SESSION['company']. "'";
     $resultDl = mysqli_query($conn,$sqlDl);
     $rowDl = mysqli_fetch_array($resultDl);
     $dl=$rowDl['dloan'];
     if(mysqli_num_rows($resultDl) == 0)
     { 
      $dl=0;
     } 	 
$dll= number_format($dl,2);

     $sqlLp="SELECT count(`ID`) as lPend FROM `loan` where `Approval` not in ('Approved','Denied') AND `Loan Status` !='Active' AND `Company` ='" .$_SESSION['company']. "'";
     $resultLp = mysqli_query($conn,$sqlLp);
     $rowLp = mysqli_fetch_array($resultLp);
     $lnpend=$rowLp['lPend'];
     if(mysqli_num_rows($resultLp) == 0)
     { 
      $lnpend=0;
     } 	 
$lpend= number_format($lnpend,0);

##################################
     $sqlSh="SELECT count(`ID`) as lPend FROM `loan` where `Approval` not in ('Approved','Denied') AND `Loan Status` !='Active' AND `Company` ='" .$_SESSION['company']. "'";
     $resultLp = mysqli_query($conn,$sqlLp);
     $rowLp = mysqli_fetch_array($resultLp);
     $lnpend=$rowLp['lPend'];
     if(mysqli_num_rows($resultLp) == 0)
     { 
      $shar=0;
     } 	 
$shar= number_format($shar,0);
##################################

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
$numxb=number_format($numx,0);
if($numx==0)
{
  $ps=0;
} else {
  $ps=($loanB/$numx)*100;
}

   $resultX = mysqli_query ($conn,"SELECT distinct `Loan Date`,`ID`, `Loan Duration` FROM `loan` where `Due Date` < '" . date('Y-m-d') . "' and `Balance` > 0 and `Loan Status`='Active' AND `Company` ='" .$_SESSION['company']. "' group by `Account Number`"); 
   $ExLoan=mysqli_num_rows($resultX); 
   $xLoan=number_format($ExLoan,0);

   $_lpendx=$lpend;
   $_numxb=$numxb;
   $_xLoan=$xLoan;
?>
