<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 1))
{
 if ($_SESSION['access_lvl'] != 5){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don’t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn’t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
}
}
 require_once 'conn.php';
?>
   <div align="center">
	<table border="0" width="800" id="table1" bgcolor="#FFFFFF">
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>
			<div align="center">
				<table border="0" width="800" id="table2">
					<tr>
						<td>

<TABLE width='80%' border='1' cellpadding='1' cellspacing='1' align='center' id="table3">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2">
<?php

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];

 $sql_st = "SELECT * FROM `bank` where `Name`='" . $filter . "'";
 $result_st = mysql_query($sql_st,$conn) or die('Could not list value; ' . mysql_error());
 $rowst = mysql_fetch_array($result_st);
 $sortcode=$rowst['BankCode'];

  echo "<h1><b><center></b></h1>";
  echo"<h2>Bank Schedule</center></h2> ";
  $sql_d = "SELECT * FROM `pay`";
  $result_d = mysql_query($sql_d,$conn) or die('Could not list value; ' . mysql_error());
  $row = mysql_fetch_array($result_d);
  $mnth=$row['Month'];

if (empty($filter))
{
  $result = mysql_query ("SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Month`,`pay`.`Grade Level`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`, (`pay`.`GPAmount`-`pay`.`TDeduction`) as amt,`pay`.`NetPay` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Group By `pay`.`Bank`,`pay`.`Staff Number` Order by `pay`.`Bank`,`pay`.`Staff Number`"); 
} else {
  $result = mysql_query ("SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Month`,`pay`.`Grade Level`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`, (`pay`.`GPAmount`-`pay`.`TDeduction`) as amt,`pay`.`NetPay` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `pay`.`Bank`='$filter' Group By `pay`.`Bank`,`pay`.`Staff Number` Order by `pay`.`Bank`,`pay`.`Staff Number`"); 
}

  echo "<font style='font-size: 9pt'><b>Bank: " . $filter . "</b></font>&nbsp; &nbsp &nbsp; &nbsp &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp";
  echo "<font style='font-size: 9pt'><b>Bank Code: " . $sortcode . "</b></font>&nbsp; &nbsp &nbsp; &nbsp &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp";
  echo "&nbsp; &nbsp; &nbsp; &nbsp<font style='font-size: 8pt'><b>For the Month: " . $mnth . "</b></font>";

  echo "<TR><TH bgcolor='#C0C0C0' width='25%'> <font style='font-size: 9pt'>Staff Name </font>&nbsp;</TH><TH bgcolor='#C0C0C0' width='25%'> <font style='font-size: 9pt'>Account Number </font>&nbsp;</TH><TH bgcolor='#C0C0C0' width='25%'><font style='font-size: 9pt'>Amount</font>&nbsp;</TH><TH bgcolor='#C0C0C0' width='25%'><font style='font-size: 9pt'>Bank Sort Code</font>&nbsp;</TH></TR>";

  while(list($staffno, $name,$office, $month, $grade, $bank, $acctno, $branch, $amount,$np)=mysql_fetch_row($result)) 
   {
     $sql_st = "SELECT * FROM `bank` where `Name`='$filter'";
     $result_st = mysql_query($sql_st,$conn) or die('Could not list value; ' . mysql_error());
     $rowst = mysql_fetch_array($result_st);
     $sortcode=$rowst['SortCode'];
     $net=$np;
      echo "<TR><TH width='25%'> <font style='font-size: 8pt'>$name </font>&nbsp;</TH><TH width='25%'> <font style='font-size: 8pt'>$acctno </font>&nbsp;</TH><TH width='25%'><font style='font-size: 8pt'>$amount</font>&nbsp;</TH><TH width='25%'><font style='font-size: 8pt'>$sortcode</font>&nbsp;</TH></TR>";
   }

  $sql_tt = "SELECT (sum(`pay`.`GPAmount`)-sum(`pay`.`TDeduction`)) as amt From `pay` where `pay`.`Bank` like '$filter%'"; 
 #$sql_tt = "SELECT `pay`.`Office`, `pay`.`Month`,`pay`.`Bank`,`pay`.`Acct No`, `TDeduction`,`GPAmount`, (sum(`pay`.`GPAmount`)-sum(`pay`.`TDeduction`)) as NP From `pay` Group By `pay`.`Bank`,`pay`.`Staff Number`";
  $result_tt = mysql_query($sql_tt,$conn) or die('Could not list value; ' . mysql_error());
  $row = mysql_fetch_array($result_tt);
  $nt=$row['amt'];
  $nt=number_format($nt,2);
   echo "<TR><TH>&nbsp;</TH></TR>";
   echo "<TR><TH bgcolor='#EAEAEA'><font style='font-size: 8pt'>&nbsp;</font></TH><TH bgcolor='#EAEAEA'><font style='font-size: 8pt'><b>Total</b></font></TH><TH bgcolor='#EAEAEA' align='center'><font style='font-size: 8pt'><b>$nt</b></font></TH><TH bgcolor='#EAEAEA'><font style='font-size: 8pt'>&nbsp;</font></TH></TR><p>";
#   echo "<TR><TH>&nbsp;</TH></TR>"; 
#   echo "<TR><TH width='33%' align='right' bgcolor='#EAEAEA'><font style='font-size: 9pt'>&nbsp;</font></TH><TH width='33%' bgcolor='#EAEAEA' align='right'><font style='font-size: 9pt'><b>Total</b></font></TH><TH width='33%' bgcolor='#EAEAEA' align='right'><font style='font-size: 9pt'><b>$net</b></font></TH></TR><p>";
#   echo "<TR><TH>&nbsp;</TH></TR>"; 

?>
</table>
</table>


<br>

						<p>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
				</table>
			</div>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
	</table>
</div>


<?php
 require_once 'footer.php';
?>