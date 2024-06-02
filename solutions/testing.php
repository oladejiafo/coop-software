<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 3) & ($_SESSION['access_lvl'] != 4))
{
 if ($_SESSION['access_lvl'] != 5){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don�t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn�t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
#exit();
}
}
require_once 'conn.php';
require_once 'header.php';
require_once 'style.php';

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
   <select name="cmbFilter" style="width:120px;height:30px">
  <?php  
   echo '<option selected>Today</option>';
   echo '<option>All</option>';
   echo '<option>Date Range</option>';
  ?> 
 </select>
   <input type="hidden" name="cmbReport" size="12" value="Product Account Reconciliation">
 </td>
 <td>
  <input type="text" name="filter" id="inputFieldA" style="width:120px;height:30px">
 </td>
 <td>
  <input type="text" name="filter2" id="inputFieldB" style="width:120px;height:30px">
 </td>
 <td> 
     <input type="submit" value="Generate" name="submit" style="width:120px;height:30px">
 </td>
 </tr>
     <br>
 </body>
</form>
</table>

<?php
 @$cmbFilter=$_REQUEST["cmbFilter"];
 @$filter=$_REQUEST["filter"];
 @$filter2=$_REQUEST["filter2"];
?>
<table border="0" width="97%" cellspacing="1" bgcolor="#FFFFFF" id="table1">
<tr>
 <td>
  <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#000000" width="100%" id="AutoNumber1" height="1">
   <tr align='center'>
    <td colspan="5" bgcolor="#C0C0C0"> 
     <h2><left>Product Account Reconciliation</left></h2>
     <h5>{<?php if($cmbFilter=="All" or $cmbFilter=="Today") { echo "For " .$cmbFilter; } else { echo "Between " . $filter. " AND " . $filter2;}?> }</h5>
    </td>
   </tr>
  </table>
 </td>
</tr>
<tr>
<td align="right">
 <?php
 @$tval=$_GET['tval'];
 $limit      = 50;
 @$page=$_GET['page'];


   $query_count = "SELECT * FROM `customer`  where `Account Type` in ('Current','Savings') group by `Account Type`";
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);
    echo"<TABLE width='100%' border='1' cellpadding='1' cellspacing='1' align='center'>";
    echo "<TR><TH><b><u>S/No </b></u>&nbsp;</TH><TH align='left'><b><u>Product Type</b></u>&nbsp;</TH><TH align='right'><b><u>Total Customer </b></u>&nbsp;</TH><TH align='right'><b><u>Amount IN</b></u>&nbsp;</TH><TH align='right'><b><u>Amount OUT </b></u>&nbsp;</TH></TR>";

  # $queryQ = "SELECT `customer`.`Account Number`,`customer`.`Account Type` FROM `customer` where `Account Type` in ('Current','Savings') group by `customer`.`Account Type`";
 if ($cmbFilter=="" or $cmbFilter=="Today" or empty($cmbFilter))
  {  
   $queryQ  = "SELECT `customer`.`Account Number`,`customer`.`Account Type` FROM `customer` inner join `transactions` on `customer`.`Account Number`=`transactions`.`Account Number` where `customer`.`Account Type` in ('Current','Savings') and `Date` = '" . date('Y-m-d') . "' and (`Deposit` >0 OR `Withdrawal`>0) group by `customer`.`Account Type`";
  }
  else if ($cmbFilter=="All")
  {  
   $queryQ  = "SELECT `customer`.`Account Number`,`customer`.`Account Type` FROM `customer` inner join `transactions` on `customer`.`Account Number`=`transactions`.`Account Number` where `customer`.`Account Type` in ('Current','Savings') and (`Deposit` >0 OR `Withdrawal`>0) group by `customer`.`Account Type`";
  }
  else if ($cmbFilter=="Date Range")
  {  
   $queryQ  = "SELECT `customer`.`Account Number`,`customer`.`Account Type` FROM `customer` inner join `transactions` on `customer`.`Account Number`=`transactions`.`Account Number` where `customer`.`Account Type` in ('Current','Savings') and (`Date` between '" . $filter . "' and '" . $filter2 . "') and (`Deposit` >0 OR `Withdrawal`>0) group by `customer`.`Account Type`";
  }

   $resultQ=mysqli_query($conn,$queryQ);
   $totrw  = mysqli_num_rows($resultQ);
$i=0;
$sdep =0; 
$swit=0;

   while(list($acctno,$accttype)=mysqli_fetch_row($resultQ))
   {
    $queryQq = "SELECT `Account Number` FROM `customer` WHERE `Account Type`='$accttype'";
    $resultQq=mysqli_query($conn,$queryQq);
    $totrw  = mysqli_num_rows($resultQq);

 if ($cmbFilter=="" or $cmbFilter=="Today" or empty($cmbFilter))
  {  
   $queryct = "SELECT sum(`transactions`.`Deposit`) as sumdep, sum(`transactions`.`Withdrawal`) as sumwit FROM `transactions` inner join `customer` on `transactions`.`Account Number`=`customer`.`Account Number` where `customer`.`Account Type`='$accttype' and `Date` = '" . date('Y-m-d') . "'"; 
   $cmbFilter="Today"; 
 }
  else if ($cmbFilter=="All")
  {  
   $queryct = "SELECT sum(`transactions`.`Deposit`) as sumdep, sum(`transactions`.`Withdrawal`) as sumwit FROM `transactions`  inner join `customer` on `transactions`.`Account Number`=`customer`.`Account Number` where `customer`.`Account Type`='$accttype'";
  }
  else if ($cmbFilter=="Date Range")
  {  
   $queryct = "SELECT sum(`transactions`.`Deposit`) as sumdep, sum(`transactions`.`Withdrawal`) as sumwit FROM `transactions` inner join `customer` on `transactions`.`Account Number`=`customer`.`Account Number` where `customer`.`Account Type`='$accttype' and (`Date` between '" . $filter . "' and '" . $filter2 . "')"; 
  }
   $resultct   = mysqli_query($conn,$queryct);     
   $rowct = mysqli_fetch_array($resultct);
   $sdep=$rowct['sumdep'];
   $swit=$rowct['sumwit'];

      @$totaldep += $sdep;
      @$totalwit += $swit;
      @$totalrw += $totrw;

      $totrw=number_format($totrw,0);
      $sdep=number_format($sdep,2);
      $swit=number_format($swit,2);
      $px="Product Account Reconciliation Detail";
      $i=$i+1;
      echo "<TR><TH>$i &nbsp;</TH><TH align='left'>$accttype</TH><TH align='right'><a href='report.php?accttype=$accttype&cmbReport=$px&cmbFilter=$cmbFilter&filter=$filter&filter2=$filter2' title='CLICK TO SEE DETAILED BREAKDOWN'> $totrw &nbsp; </a></TH><TH align='right'>$sdep &nbsp;</TH><TH align='right'> $swit &nbsp;</TH></TR>";
    }
    @$totalrw=number_format($totalrw,0);
    @$totaldep=number_format($totaldep,2);
    @$totalwit=number_format($totalwit,2);

    echo "<TR><TH colspan='2'></TH><TH align='right'><b>$totalrw &nbsp;</b></TH><TH align='right'><b>$totaldep &nbsp;</b></TH><TH align='right'><b>$totalwit &nbsp;</b></TH></TR>";  
?>
</table>

</td></tr>
	</table>
<Table align="center">
<tr>
<td>
<?php
echo "<a target='blank' href='rptproductacct.php?cmbFilter=$cmbFilter&filter=$filter&filter2=$filter2&acctno=$acctno'> Print this Report</a> &nbsp;";
echo "| <a target='blank' href='expproductacct.php?cmbFilter=$cmbFilter&filter=$filter&filter2=$filter2&acctno=$acctno'> Export this Report</a> &nbsp; ";
?>
</td>
</tr>
</Table
</div>

