<?php
session_start();

 require_once 'conn.php';
$sqr="SELECT * FROM `company info` WHERE `Company Name` ='" .$_SESSION['company']. "'";
$reslt = mysqli_query($conn,$sqr) or die('Could not look up user data; ' . mysqli_error());
$rw = mysqli_fetch_array($reslt);
$coy=$rw['Company Name'];

 @$idd=$_REQUEST["idd"];
 @$acctno=$_REQUEST["acctno"];
 @$trans=$_REQUEST["trans"];
 @$filter=$_REQUEST["filter"];
 @$filter2=$_REQUEST["filter2"];

$cmbReport="Expired Loans";


 $filename = "expired_loans_" . date('Ymd') . $filter . ".xls";
 header("Content-Disposition: attachment; filename=\"$filename\"");
 header("Content-Type: application/vnd.ms-excel"); 
?>
<div align="left">

<table border="0" width="100%" cellspacing="1" bgcolor="#FFFFFF" id="table1">
<tr align='center'>
 <td><b>
     <h3><center><u><?php echo $coy; ?></u></center></h3>
     <h3><center><u>EXPIRED LOANS</u></center></h3>
 </td>
</tr>
<tr><td align="right">
<TABLE width='100%' border='1' cellpadding='1' cellspacing='1' align='center' bordercolor="#ccCCcc" id="table2">
 <?php

   $limit      = 50; 
   @$page=$_GET['page'];
   $query_count    = "SELECT * FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active'";
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);
   if(empty($page))
   {
     $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   echo "<TR bgcolor='#C0C0C0'><TH><b> Loan ID</b></TH><TH><b> Borrower Name</b></TH><TH><b> Loan Amount</b></TH><TH><b> Loan Type</b></TH><TH><b> Disbursement Date</b></TH><TH><b> Due Date</b></TH><TH><b> Payback To-Date</b></TH><TH><b> Balance Left</b></TH></TR>";
   $resultX = mysqli_query($conn,"SELECT `ID`,`Loan Date`, `Loan Duration` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active'"); 
   while(list($idX,$dateX,$durX)=mysqli_fetch_row($resultX)) 
   {	
   $valt="date(`Loan Date`) <'" . date('Y-m-d', strtotime('-' . $durX . 'month')) . "'";
   $result = mysqli_query($conn,"SELECT `ID`,`Account Number`, `Loan Amount`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`Loan Type` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  ($valt) and `Balance` > 0 and `Loan Status`='Active'"); 
 
   $samtt=0;
   $sptdt=0;
   $sbalt=0;

   while(list($id,$acctno,$lamount,$ldate,$lduration,$ptd,$bal,$ltype)=mysqli_fetch_row($result)) 
   {	
       $sqlt="SELECT `Surname`,`First Name`  FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Membership Number`='$acctno'";
       $resultt = mysqli_query($conn,$sqlt) or die('Could not look up user data; ' . mysqli_error());
       $rowt = mysqli_fetch_array($resultt);
     
       $sname=$rowt['Surname'];
       $fname=$rowt['First Name'];
       $name= $fname . ' ' . $sname;

       $samtt=$samtt+$lamount;
       $sptdt=$sptdt+$ptd;
       $sbalt=$sbalt+$bal;

       $duedate=date('Y-m-d', strtotime('+' . $lduration . ' month',strtotime($ldate)));

       $amtt=number_format($lamount,2);
       $ptdt=number_format($ptd,2);
       $balt=number_format($bal,2);

       echo "<TR align='left'><TH>$id </TH><TH>$name </TH><TH>$amtt </TH><TH>$ltype </TH><TH>$ldate </TH><TH>$duedate </TH><TH align='right'>$ptdt</TH><TH align='right'>$balt</TH></TR>";
   }
}
   echo "<TR><TH colspan='12'></TH></TR>";
 
   $samtt=number_format($samtt,2);
   $sptdt=number_format($sptdt,2);
   $sbalt=number_format($sbalt,2);

   echo "<TR align='left'><TH bgcolor='#C0C0C0' colspan=2> </TH><TH bgcolor='#C0C0C0'><font color='red'; size='3'>$samtt </font></TH><TH  bgcolor='#C0C0C0' colspan=3> </TH><TH align='right' bgcolor='#C0C0C0'>$sptdt</TH><TH align='right' bgcolor='#C0C0C0'>$sbalt</TH></TR>";
#}
?>
</table>
</fieldset>
</td></tr>
	</table>

</div>

