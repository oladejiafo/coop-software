<?php
#session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 2) & ($_SESSION['access_lvl'] != 1) & ($_SESSION['access_lvl'] != 4) & ($_SESSION['access_lvl'] != 3) & ($_SESSION['access_lvl'] != 7))
{
 if ($_SESSION['access_lvl'] != 5){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");

#exit();
}
}

 require_once 'conn.php';
require_once 'tester.php';
@$Tit=$_SESSION['Tit'];
@$acctno=$_REQUEST['acctno'];
@$id=$_REQUEST['id'];
@$tval=$_REQUEST['tval'];
?>


<div align="left">
<table width="85%">
<form  action="report.php" method="POST">
 <body>
 <tr><td>
   <select name="cmbFilter">
  <?php  
   echo '<option selected>All Transactions</option>';
   echo '<option>Cash</option>';
   echo '<option>Cheque</option>';
   echo '<option>Entered By</option>';
   echo '<option>By Agent</option>';
   echo '<option>Date Range</option>';
  ?> 
 </select>
   <input type="hidden" name="cmbReport" size="12" value="Contributions">
 </td>
 <td>
  <input type="text" name="filter" onclick="setSens('todate','max')" id="fromdate">
 </td>
 <td>
  <input type="text" name="filter2" onclick="setSens('fromdate','min')" id="todate">
 </td>
 <td> 
     <input type="submit" value="Generate" name="submit">
 </td>
 </tr>
     <br>
 </body>
</form>
</table>
	<table border="0" width="90%" cellspacing="1" bgcolor="#FFFFFF" id="table1">

   <tr>
	<td>
  <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#000000" width="100%" id="AutoNumber1" height="1">
<tr align='center'>
 <td colspan="5" bgcolor="#00CC99"> </td>
</tr>
  </table>

  <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#000000" width="100%" id="AutoNumber1" height="1">
<tr align='center'>
 <td colspan="5" bgcolor="#C0C0C0"> 
<h2><left>Daily Contributions Report</left></h2>
</td>
</tr>
  </table>
			</td>
		</tr>
<tr><td align="right">

<TABLE width='100%' border='1' cellpadding='1' cellspacing='1' align='center' bordercolor="#000000" id="table2">
 <?php
 @$tval=$_GET['tval'];
 $limit      = 50;
 @$page=$_GET['page'];

 @$cmbFilter=$_REQUEST["cmbFilter"];
 @$filter=$_REQUEST["filter"];
 @$filter2=$_REQUEST["filter2"];
 
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
   $query_count = "SELECT * FROM `contributions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Date` between '" . $filter . "' and " . $filter2 . "'";
  }


   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

    echo "<tr><td colspan=10 align='center'><b><font color='#FF0000' style='font-size: 10pt'>" . $cmbFilter . ": " . $filter . " (" . $totalrows . ")</font></b></td></tr>";
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
   $query = "SELECT `ID`,`Date`,`Agent`,`Account Number`,`First Name`,`Surname`,`Amount` FROM `contributions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Date` between '" . $filter . "' and " . $filter2 . "'";
  }
   $resultp=mysqli_query($conn,$query);

$totalamt =0; 
$amt=0;
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
     echo "<TR><TH>$i &nbsp;</TH><TH align='left'><a href = 'contribution.php?id=$id&acctno=$acct'>$acct</a></TH><TH align='left'> $name &nbsp;</TH><TH align='right'>$amount &nbsp;</TH><TH align='right'> $bal &nbsp;</TH></TR>";
	 $totalamt += $amt;
    }
    $totalamt=number_format($totalamt,2);

    echo "<TR><TH colspan='3'>MY TOTAL</TH><TH align='right'>$totalamt &nbsp;</TH><TH></TH></TR>";  
?>
</table>
</td></tr>
	</table>

<Table align="center">
<tr>
<td>
<?php
echo "<a target='blank' href='rptcontri.php?cmbFilter=$cmbFilter&filter=$filter&filter2=$filter2&acctno=$acctno'> Print this Report</a> &nbsp;";
echo "| <a target='blank' href='expcontri.php?cmbFilter=$cmbFilter&filter=$filter&filter2=$filter2&acctno=$acctno'> Export this Report</a> &nbsp; ";
?>
</td>
</tr>
</Table
</div>

