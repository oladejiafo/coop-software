<?php
session_start();

 require_once 'conn.php';

$sqr="SELECT * FROM `company info` WHERE `Company Name` ='" .$_SESSION['company']. "'";
$reslt = mysqli_query($conn,$sqr) or die('Could not look up user data; ' . mysqli_error());
$rw = mysqli_fetch_array($reslt);
$coy=$rw['Company Name'];
$addy=$rw['Address'];
$phn=$rw['Phone'];

@$Tit=$_SESSION['Tit'];
@$acctno=$_REQUEST['acctno'];
@$id=$_REQUEST['id'];
@$tval=$_REQUEST['tval'];


 $filename = "daily_contrib_" . date('Ymd') . $filter . ".xls";
 header("Content-Disposition: attachment; filename=\"$filename\"");
 header("Content-Type: application/vnd.ms-excel"); 
?>

<table width='450'>
<tr><td width='260'><font style='font-size: 14pt; color:red'><b><?php echo $coy; ?></b></font></td></tr>
<tr><td width='260'><font style='font-size: 13pt'><b><?php echo $addy; ?></b>
</font></td></tr>
<tr><td width='260'><font style='font-size: 13pt'><b><?php echo $phn; ?></b>
</font></td></tr>
<tr><td colspan=2><h2><left>Daily Contributions Report</left></h2></td></tr>
</table>

<div align="left">

	<table border="0" width="90%" cellspacing="1" bgcolor="#FFFFFF" id="table1">

<tr><td align="right">

<TABLE width='100%' border='1' cellpadding='1' cellspacing='1' align='center' bordercolor="#000000" id="table2">
 <?php
 $tval=$_GET['tval'];
 $limit      = 50;
 $page=$_GET['page'];

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];
 $filter2=$_REQUEST["filter2"];
 
  if ($cmbFilter=="" or $cmbFilter=="All Transactions" or empty($cmbFilter))
  {  
   $query_count = "SELECT * FROM `contributions` WHERE `Company` ='" .$_SESSION['company']. "' AND  (`Entered By` like '" . strtoupper($_SESSION['name']) . "%' or `Agent` like '" . strtoupper($_SESSION['name']) . "%')";
  }
  else if ($cmbFilter=="Entered By")
  {  
   $query_count = "SELECT * FROM `contributions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Entered By` like '%" . $filter . "%'";
  }
  else if ($cmbFilter=="By Agent")
  {  
   $query_count = "SELECT * FROM `contributions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Agent` like '%" . $filter . "%'";
  }
  else if ($cmbFilter=="Cash")
  {  
   $query_count = "SELECT * FROM `contributions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Pay Mode` ='Cash'";
  }
  else if ($cmbFilter=="Cheque")
  {  
   $query_count = "SELECT * FROM `contributions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Pay Mode` ='Cheque'";
  }
  else if ($cmbFilter=="Date Range")
  {  
   $query_count = "SELECT * FROM `contributions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Date` between '" . $filter . "' and '" . $filter2 . "'";
  }


   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

    echo "<tr><td colspan=5 align='center'><b><font color='#FF0000' style='font-size: 10pt'>" . $cmbFilter . ": " . $filter . " (" . $totalrows . ")</font></b></td></tr>";
    echo "<TR><TH><b><u>S/No </b></u>&nbsp;</TH><TH align='left'><b><u>Account Number</b></u>&nbsp;</TH><TH align='left'><b><u>Customer Name </b></u>&nbsp;</TH><TH align='right'><b><u>Amount </b></u>&nbsp;</TH><TH align='right'><b><u>Account Balance </b></u>&nbsp;</TH></TR>";

  if ($cmbFilter=="" or $cmbFilter=="All Transactions" or empty($cmbFilter))
  {  
   $query = "SELECT `ID`,`Date`,`Agent`,`Account Number`,`First Name`,`Surname`,`Amount` FROM `contributions` WHERE `Company` ='" .$_SESSION['company']. "' AND  (`Entered By` like '" . strtoupper($_SESSION['name']) . "%' or `Agent` like '" . strtoupper($_SESSION['name']) . "%') order by `ID` desc";
  }
  else if ($cmbFilter=="Entered By")
  {  
   $query = "SELECT `ID`,`Date`,`Agent`,`Account Number`,`First Name`,`Surname`,`Amount` FROM `contributions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Entered By` like '%" . $filter . "%' order by `ID` desc";
  }
  else if ($cmbFilter=="By Agent")
  {  
   $query = "SELECT `ID`,`Date`,`Agent`,`Account Number`,`First Name`,`Surname`,`Amount` FROM `contributions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Agent` like '%" . $filter . "%' order by `ID` desc";
  }
  else if ($cmbFilter=="Cash")
  {  
   $query = "SELECT `ID`,`Date`,`Agent`,`Account Number`,`First Name`,`Surname`,`Amount` FROM `contributions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Pay Mode` ='Cash' order by `ID` desc";
  }
  else if ($cmbFilter=="Cheque")
  {  
   $query = "SELECT `ID`,`Date`,`Agent`,`Account Number`,`First Name`,`Surname`,`Amount` FROM `contributions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Pay Mode` ='Cheque' order by `ID` desc";
  }
  else if ($cmbFilter=="Date Range")
  {  
   $query = "SELECT `ID`,`Date`,`Agent`,`Account Number`,`First Name`,`Surname`,`Amount` FROM `contributions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Date` between '" . $filter . "' and '" . $filter2 . "'";
  }
   $resultp=mysqli_query($conn,$query);



$i=0;
    while(list($id,$date,$agent,$acct,$fname,$sname,$amt)=mysqli_fetch_row($resultp))
    {
      $sqlw="SELECT * FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acct' order by `ID` desc";
      $resultw = mysqli_query($conn,$sqlw) or die('Could not look up user data; ' . mysqli_error());
      $roww = mysqli_fetch_array($resultw); 
     $bal=number_format($roww['Balance'],2);
     $amount=number_format($amt,2);
     $i=$i+1;
	 $name=$fname . ' ' . $sname;
     echo "<TR><TH>$i &nbsp;</TH><TH align='left'>$acct</TH><TH align='left'> $name &nbsp;</TH><TH align='right'>$amount &nbsp;</TH><TH align='right'> $bal &nbsp;</TH></TR>";
	 $totalamt += $amt;
    }
    $totalamt=number_format($totalamt,2);

    echo "<TR><TH colspan='3'>TOTAL</TH><TH align='right'>$totalamt &nbsp;</TH><TH></TH></TR>";  
?>
</table>
</td></tr>
	</table>

</div>

