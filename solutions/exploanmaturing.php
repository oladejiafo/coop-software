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

 $filename = "Loan_Maturing_" . date('Ymd') . $filter . ".xls";
 header("Content-Disposition: attachment; filename=\"$filename\"");
 header("Content-Type: application/vnd.ms-excel"); 
?>
<div align="left">

<table border="0" width="100%" cellspacing="1" bgcolor="#FFFFFF" id="table1">
<tr align='center'>
 <td><b>
     <h2><center><u><?php echo $coy; ?></u></center></h2>
     <h3><center><u>LOAN MATURING REPORT</u></center></h3>
 </td>
</tr>

<tr><td align="right">
<TABLE width='100%' border='1' cellpadding='1' cellspacing='1' align='center' bordercolor="#ccCCcc" id="table2">
 <?php
   echo "<TR bgcolor='#C0C0C0'><TH><b>S/No</b></TH><TH><b>Client Name</b></TH><TH><b>Loan Product</b></TH><TH><b>Disbursement Date</b></TH><TH align='right'><b>Principal</b></TH><TH align='right'><b>Amount Due</b></TH><TH><b>Next Due Date</b></TH></TR>";

   if ($cmbFilter=="Today")
   {
      $result = mysqli_query($conn,"SELECT `ID`,`Account Number`, `Loan Amount`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`Loan Type`,`Payment Frequency` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and  `Loan Date`='" . date('Y-m-d') . "'"); 
   }
   else if ($cmbFilter=="Date")
   {
       $result = mysqli_query($conn,"SELECT `ID`,`Account Number`, `Loan Amount`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`Loan Type`,`Payment Frequency` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and `Loan Date` = '" . $filter . "'"); 
   }
   else if ($cmbFilter=="Date Range")
   {
       $result = mysqli_query($conn,"SELECT `ID`,`Account Number`, `Loan Amount`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`Loan Type`,`Payment Frequency` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and (`Loan Date` between '" . $filter . "' and '" . $filter2 . "')"); 
   }
   else if ($cmbFilter=="Account Number")
   {
       $result = mysqli_query($conn,"SELECT `ID`,`Account Number`, `Loan Amount`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`Loan Type`,`Payment Frequency` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and `Account Number` = '" . $filter . "'"); 
   } else {
       $result = mysqli_query ($conn,"SELECT `ID`,`Account Number`, `Loan Amount`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`Loan Type`,`Payment Frequency` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active'"); 
   }
 
   if(mysqli_num_rows($result) == 0)
   { 
        echo("Nothing to Display!<br>"); 
   } 

   $samtt=0;
   $sptdt=0;
   $sbalt=0;
   $sn=1;
   while(list($id,$acctno,$lamount,$ldate,$lduration,$ptd,$bal,$ltype,$pfreq)=mysqli_fetch_row($result)) 
   {	
       $sqlL="SELECT sum(`Amount`) AS PAYAMT  FROM `loan payment` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno' AND `Loan ID`='$id'";
       $resultL = mysqli_query($conn,$sqlL) or die('Could not look up user data; ' . mysqli_error());
       $rowL = mysqli_fetch_array($resultL);
       $paytd=$rowL['PAYAMT'];
       $baltd=$lamount - $paytd;

       $sqlLL="SELECT `Date` FROM `loan payment` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno' AND `Loan ID`='$id' Order By `Date` Desc limit 0,1";
       $resultLL = mysqli_query($conn,$sqlLL) or die('Could not look up user data; ' . mysqli_error());
       $rowLL = mysqli_fetch_array($resultLL);
       $lastpay=$rowLL['Date'];
       if($lastpay=="" OR empty($lastpay))
       {
           $lastpay=$ldate;
       }

       $sqlt="SELECT `Surname`,`First Name`  FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Membership Number`='$acctno'";
       $resultt = mysqli_query($conn,$sqlt) or die('Could not look up user data; ' . mysqli_error());
       $rowt = mysqli_fetch_array($resultt);
     
       $sname=$rowt['Surname'];
       $fname=$rowt['First Name'];
       $name= $fname . ' ' . $sname;

       $samtt=$samtt+$lamount;
       $sptdt=$sptdt+$paytd;
       $sbalt=$sbalt+$baltd;

       $duedate=date('Y-m-d', strtotime('+' . $lduration . ' month',strtotime($ldate)));
       if($pfreq == "Monthly")
       {
        $nduedate=date('Y-m-d', strtotime('+1 month',strtotime($lastpay)));
       } else if($pfreq == "Weekly")
       {
        $nduedate=date('Y-m-d', strtotime('+1 week',strtotime($lastpay)));
       }

       $amtt=number_format($lamount,2);
       $ptdt=number_format($paytd,2);
       $balt=number_format($baltd,2);

       echo "<TR align='left'><TH>$sn </TH><TH>$name </TH><TH>$ltype </TH><TH>$ldate </TH><TH align='right'>$amtt </TH><TH align='right'>$balt </TH><TH><font color='red'; size='3'>$nduedate </font></TH></TR>";
   }
   echo "<TR><TH colspan='7'></TH></TR>";
 
   $samtt=number_format($samtt,2);
   $sptdt=number_format($sptdt,2);
   $sbalt=number_format($sbalt,2);

   echo "<TR align='left'><TH bgcolor='#C0C0C0' colspan=4> </TH><TH align='right' bgcolor='#C0C0C0'>$samtt</TH><TH align='right' bgcolor='#C0C0C0'>$sbalt</TH><TH  bgcolor='#C0C0C0' colspan=1> </TH></TR>";

?>
</table>
</fieldset>
</td></tr>
	</table>

</div>

