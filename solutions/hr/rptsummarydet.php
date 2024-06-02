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

<h2><center></center></h2>
<h3><center>Payroll Summary Detail</center></h3> 
<TABLE width='795' border='1' cellpadding='1' cellspacing='1' align='center' id="table3">
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2">
<?php

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];

  $sql_d = "SELECT * FROM `pay`";
  $result_d = mysql_query($sql_d,$conn) or die('Could not list value; ' . mysql_error());
  $row = mysql_fetch_array($result_d);
  $mnth=$row['Month'];
 
  $result = mysql_query ("SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Month`,`pay`.`Grade Level`,`pay`.`Basic`,`pay`.`HAmount`,`pay`.`TotPay`,`pay`.`Arrears`,`pay`.`TDeduction`,`pay`.`GPAmount`, (`pay`.`GPAmount`-`pay`.`TDeduction`) as NP From `pay` Group By `pay`.`Office`,`pay`.`Staff Number` Order by `pay`.`Office`,`pay`.`LocSortOrder`,`pay`.`RankSortOrder`,`pay`.`PosSortOrder`,`pay`.`Grade Level` Desc"); 

  echo "<font style='font-size: 7pt'><b>Office: " . $filter . "</b></font>&nbsp; &nbsp &nbsp; &nbsp &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp";
  echo "<font style='font-size: 7pt'><b>For the Month: " . $mnth . "</b></font>";

  echo "<p><TR><TH style='border: 1px padding: 1px' bgcolor='#C0C0C0'> <font style='font-size: 7pt'>Staff No. </font></TH><TH bgcolor='#C0C0C0'> <font style='font-size: 7pt'>Staff Name </font></TH>
    <TH style='border: 1px padding: 1px' bgcolor='#C0C0C0'> <font style='font-size: 7pt'>Grade Level </font>&nbsp;</TH><TH style='border: 1px padding: 1px' bgcolor='#C0C0C0'> <font style='font-size: 7pt'>Basic Salary </font>&nbsp;</TH><TH style='border: 1px padding: 1px' bgcolor='#C0C0C0'> <font style='font-size: 7pt'>Acting Allow. </font>&nbsp;</TH>
    <TH style='border: 1px padding: 1px' bgcolor='#C0C0C0'> <font style='font-size: 7pt'>Gross Pay </font>&nbsp;</TH><TH style='border: 1px padding: 1px' bgcolor='#C0C0C0'> <font style='font-size: 7pt'>Rent Subs. </font>&nbsp;</TH><TH style='border: 1px padding: 1px' bgcolor='#C0C0C0'> <font style='font-size: 7pt'>Transport </font>&nbsp;</TH>
    <TH style='border: 1px padding: 1px' bgcolor='#C0C0C0'> <font style='font-size: 7pt'>Meal Subs. </font>&nbsp;</TH><TH style='border: 1px padding: 1px' bgcolor='#C0C0C0'> <font style='font-size: 7pt'>DSA </font>&nbsp;</TH><TH style='border: 1px padding: 1px' bgcolor='#C0C0C0'> <font style='font-size: 7pt'>Utility </font>&nbsp;</TH>
    <TH style='border: 1px padding: 1px' bgcolor='#C0C0C0'> <font style='font-size: 7pt'>Total Earning </font>&nbsp;</TH><TH style='border: 1px padding: 1px' bgcolor='#C0C0C0'> <font style='font-size: 7pt'>Tax </font>&nbsp;</TH><TH style='border: 1px padding: 1px' bgcolor='#C0C0C0'> <font style='font-size: 7pt'>NHF </font>&nbsp;</TH>
    <TH style='border: 1px padding: 1px' bgcolor='#C0C0C0'> <font style='font-size: 7pt'>Pension Contri </font>&nbsp;</TH><TH style='border: 1px padding: 1px' bgcolor='#C0C0C0'> <font style='font-size: 7pt'>Loan </font>&nbsp;</TH><TH style='border: 1px padding: 1px' bgcolor='#C0C0C0'> <font style='font-size: 7pt'>Tot. Deductn </font>&nbsp;</TH><TH style='border: 1px padding: 1px' bgcolor='#C0C0C0'> <font style='font-size: 7pt'>Net Emol </font>&nbsp;</TH></TR>";

  while(list($staffno, $name,$office, $month, $grade,$basic,$hamt,$totpay,$arrears,$totded,$totgp,$np)=mysql_fetch_row($result)) 
   {
#      #$rtot=sum($amt);

#      $amt=number_format($amt,2); 

      echo "<TR><TH> <font style='font-size: 7pt'>$staffno </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>$name </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>$grade </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>$basic </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>0 </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>$totgp </font>&nbsp;</TH>
            <TH> <font style='font-size: 7pt'>$hamt </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>0 </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>0 </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>0 </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>0 </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>$totgp </font>&nbsp;</TH>
            <TH> <font style='font-size: 7pt'>0 </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>0 </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>0 </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>0 </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>$totded </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>$np </font>&nbsp;</TH></TR>";
   }

  $sql_t = "SELECT `Office`, `Month`,`Basic`,`HAmount`,`TotPay`,`Arrears`,`OthAllow_Tot`,`TDeduction`,`GPAmount`, (sum(`pay`.`GPAmount`)-sum(`pay`.`TDeduction`)) as NP From `pay` Group by office";
  $result_t = mysql_query($sql_t,$conn) or die('Could not list value; ' . mysql_error());
  $row = mysql_fetch_array($result_t);
  $nt=$row['NP'];
  $nt=number_format($nt,2);
   echo "<TR><TH>&nbsp;</TH></TR>"; 
   echo "<TR><TH bgcolor='#EAEAEA'><font style='font-size: 7pt'>&nbsp;</font></TH><TH bgcolor='#EAEAEA'><font style='font-size: 7pt'>&nbsp;</font></TH><TH bgcolor='#EAEAEA'><font style='font-size: 7pt'>&nbsp;</font></TH><TH bgcolor='#EAEAEA'><font style='font-size: 7pt'>&nbsp;</font></TH><TH bgcolor='#EAEAEA'><font style='font-size: 7pt'>&nbsp;</font></TH><TH bgcolor='#EAEAEA'><font style='font-size: 7pt'>&nbsp;</font></TH><TH bgcolor='#EAEAEA'><font style='font-size: 7pt'>&nbsp;</font></TH><TH bgcolor='#EAEAEA'><font style='font-size: 7pt'>&nbsp;</font></TH><TH bgcolor='#EAEAEA'><font style='font-size: 7pt'><b>Total</b></font></TH><TH bgcolor='#EAEAEA' align='right'><font style='font-size: 7pt'><b>$nt</b></font></TH></TR><p>";
   echo "<TR><TH>&nbsp;</TH></TR>"; 
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