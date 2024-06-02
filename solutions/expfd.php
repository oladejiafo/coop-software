<?php
session_start();

 require_once 'conn.php';
$sqr="SELECT * FROM `company info` WHERE `Company Name` ='" .$_SESSION['company']. "'";
$reslt = mysqli_query($conn,$sqr) or die('Could not look up user data; ' . mysqli_error());
$rw = mysqli_fetch_array($reslt);
$coy=$rw['Company Name'];

 @$idd=$_REQUEST["idd"];
 @$acctno=$_REQUEST["acctno"];
 @$cmbFilter=$_REQUEST["cmbFilter"];
 @$filter=$_REQUEST["filter"];
 @$filter2=$_REQUEST["filter2"];

 $filename = "Fixed_Deposit_" . date('Ymd') . $filter . ".xls";
 header("Content-Disposition: attachment; filename=\"$filename\"");
 header("Content-Type: application/vnd.ms-excel"); 
?>
<div align="left">

<table border="0" width="100%" cellspacing="1" bgcolor="#FFFFFF" id="table1">
<tr align='center'>
 <td><b>
     <h2><center><u><?php echo $coy; ?></u></center></h2>
     <h3><center><u>FIXED DEPOSIT REPORT</u></center></h3>
 </td>
</tr>

<tr><td align="right">
<TABLE width='100%' border='1' cellpadding='1' cellspacing='1' align='center' bordercolor="#ccCCcc" id="table2">
 <?php
   echo "<TR bgcolor='#C0C0C0'><TH><b>S/No</b></TH><TH><b>Client Name</b></TH><TH><b>Interest Rate</b></TH><TH><b>Total Investment</b></TH><TH><b>Total Interest</b></TH><TH><b>Principal Liquidation</b></TH>
   <TH><b>Interest Payout</b></TH><TH><b>Total WHT</b></TH><TH><b>Total Charges</b></TH><TH><b>Liquidation Charges</b></TH><TH><b>Balance</b></TH><TH><b>Date of First Placement</b></TH><TH><b>Maturity Date</b></TH><TH><b>Tenor</b></TH></TR>";
   if ($cmbFilter=="Maturing Today")
   {
      $result = mysqli_query($conn,"SELECT `ID`,`Account Number`, `Amount`, `Date`, `Maturity Date`, `Interest Rate`,`Interest Amount`, `Balance`,`Tenor`,`Principal Liquidation`,`Interest Payout`,`WHT`,`Other Charges`,`Liquidation Charges`,`Name` FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Status`='Active' and  `Maturity Date`='" . date('Y-m-d') . "'"); 
   }
   else if ($cmbFilter=="Maturing Date")
   {
       $result = mysqli_query($conn,"SELECT `ID`,`Account Number`, `Amount`, `Date`, `Maturity Date`, `Interest Rate`,`Interest Amount`, `Balance`,`Tenor`,`Principal Liquidation`,`Interest Payout`,`WHT`,`Other Charges`,`Liquidation Charges`,`Name` FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Status`='Active' and `Maturity Date` = '" . $filter . "'"); 
   }
   else if ($cmbFilter=="Maturing Date Range")
   {
       $result = mysqli_query($conn,"SELECT `ID`,`Account Number`, `Amount`, `Date`, `Maturity Date`, `Interest Rate`,`Interest Amount`, `Balance`,`Tenor`,`Principal Liquidation`,`Interest Payout`,`WHT`,`Other Charges`,`Liquidation Charges`,`Name` FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Status`='Active' and (`Maturity Date` between '" . $filter . "' and '" . $filter2 . "')"); 
   }
   else if ($cmbFilter=="Account Number")
   {
       $result = mysqli_query($conn,"SELECT `ID`,`Account Number`, `Amount`, `Date`, `Maturity Date`, `Interest Rate`,`Interest Amount`, `Balance`,`Tenor`,`Principal Liquidation`,`Interest Payout`,`WHT`,`Other Charges`,`Liquidation Charges`,`Name` FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Status`='Active' and `Account Number` = '" . $filter . "'"); 
   } else {
       $result = mysqli_query ($conn,"SELECT `ID`,`Account Number`, `Amount`, `Date`, `Maturity Date`, `Interest Rate`,`Interest Amount`, `Balance`,`Tenor`,`Principal Liquidation`,`Interest Payout`,`WHT`,`Other Charges`,`Liquidation Charges`,`Name` FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Status`='Active'"); 
   }

  if(mysqli_num_rows($result) == 0)
  { 
       echo("<div>Nothing to Display!</div>"); 
  } 

  $samtt=0;
  $siamt=0;
  $sbal=0;
  $swht=0;
  $spliq=0;
  $sintpay=0;
  $socharge=0;
  $sliqcharge=0;
  $sn=1;

  while(list($id,$acctno,$damount,$ddate,$mdate,$irate,$iamt,$bal,$tenor,$pliq,$intpay,$wht,$ocharge, $liqcharge,$name)=mysqli_fetch_row($result)) 
  {	
      $samtt=$samtt+$damount;
      $siamt=$siamt+$iamt;
      $sbal=$sbal+$bal;
      $swht=$swht+$wht;
      $spliq=$spliq+$pliq;
      $sintpay=$sintpay+$intpay;
      $socharge=$socharge+$ocharge;
      $sliqcharge=$sliqcharge+$liqcharge;

      $amtt=number_format($damount,2);
      $iamtt=number_format($iamt,2);
      $balt=number_format($bal,2);
      $whtt=number_format($wht,2);
      $pliqt=number_format($pliq,2);
      $intpayt=number_format($intpay,2);
      $ocharget=number_format($ocharge,2);
      $liqcharget=number_format($liqcharge,2);

       echo "<TR align='left'><TH>$sn </TH><TH>$name </TH><TH>$irate </TH><TH>$amtt </TH><TH>$iamtt </TH><TH>$pliqt</TH><TH>$intpayt</font></TH><TH>$whtt</font></TH><TH>$ocharget</font></TH>
       <TH>$liqcharges</font></TH><TH>$balt</font></TH><TH>$ddate</font></TH><TH>$mdate</font></TH><TH>$tenor</font></TH></TR>";
   }
   echo "<TR><TH colspan='7'></TH></TR>";
 
   $samtt=number_format($samtt,2);
   $siamt=number_format($siamt,2);
   $sbal=number_format($sbal,2);
   $swht=number_format($swht,2);
   $spliq=number_format($spliq,2);
   $sintpay=number_format($sintpay,2);
   $socharge=number_format($socharge,2);
   $sliqcharge=number_format($sliqcharge,2);

   echo "<TR align='left'><TH bgcolor='#C0C0C0' colspan=3> </TH><TH align='right' bgcolor='#C0C0C0'>$samtt</TH><TH align='right' bgcolor='#C0C0C0'>$siamt</TH><TH bgcolor='#C0C0C0' colspan=1>$spliq </TH>
   <TH bgcolor='#C0C0C0' colspan=1>$sintpay </TH><TH bgcolor='#C0C0C0' colspan=1>$swht </TH><TH bgcolor='#C0C0C0' colspan=1>$socharge </TH><TH bgcolor='#C0C0C0' colspan=1>$sliqcharge </TH><TH bgcolor='#C0C0C0' colspan=1>$sbal </TH><TH bgcolor='#C0C0C0' colspan=3> </TH></TR>";

?>
</table>
</fieldset>
</td></tr>
	</table>

</div>

