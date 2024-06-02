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

     <h1><b><center></center></b></h1>
     <h2><center>Summary Sheet</center></h2>

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

<TABLE width='795' border='1' cellpadding='1' cellspacing='1' align='center' id="table3">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="75%" id="AutoNumber2">
<?php

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];

  $sql_d = "SELECT * FROM `pay`";
  $result_d = mysql_query($sql_d,$conn) or die('Could not list value; ' . mysql_error());
  $row = mysql_fetch_array($result_d);
  $mnth=$row['Month'];

  $result = mysql_query ("SELECT  sum( `payr`.`Amount`) AS amt,`payr`.`description`,`payr`.`amount`,`pay`.`GPAmount`,`pay`.`TDeduction` FROM `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `Typ`='E' group by `description`"); 

  echo "<font style='font-size: 8pt'><b>For the Month: " . $mnth . "</b></font>";
  echo "<TR><TH align='left' bgcolor='#C0C0C0' width='30%'> <font style='font-size: 9pt'>Pay Item </font>&nbsp;</TH><TH align='right' bgcolor='#C0C0C0' width='20%'><font style='font-size: 9pt'>Amount</font>&nbsp;</TH></TR>";
  while(list($amt,$descr,$amount1,$gp,$td)=mysql_fetch_row($result)) 
   {
     $amount=abs($amt);
     $amount=number_format($amount,2);
     
      echo "<TR><TH align='left' width='30%'> <font style='font-size: 8pt'>$descr </font>&nbsp;</TH><TH align='right' width='20%'><font style='font-size: 8pt'>$amount</font>&nbsp;</TH></TR>";
   }

  $sql_t1 = "SELECT  sum(`payr`.`Amount`) AS amt FROM `payr` where `Typ`='E'";
  $result_t1 = mysql_query($sql_t1,$conn) or die('Could not list value; ' . mysql_error());
  $row1 = mysql_fetch_array($result_t1);
  $gp=$row1['amt'];
  $gp=number_format($gp,2);

 echo "<TR><TH align='left' width='30%'> <font style='font-size: 9pt'><b>Gross Pay </b></font>&nbsp;</TH><TH align='right' width='20%'><font style='font-size: 9pt'>$gp</font>&nbsp;</TH></TR>";

  $result_2 = mysql_query ("SELECT  sum( `payr`.`Amount`) AS amt,`payr`.`description`,`payr`.`amount`,`pay`.`GPAmount`,`pay`.`TDeduction` FROM `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Where `Typ`='R' group by `description`"); 
  while(list($amt2,$descr2,$amount2,$gp2,$td2)=mysql_fetch_row($result_2)) 
   {
     $amount1=abs($amt2);
     $amount1=number_format($amount1,2);
     
      echo "<TR><TH align='left' width='30%'> <font style='font-size: 8pt'>$descr2 </font>&nbsp;</TH><TH align='right' width='20%'><font style='font-size: 8pt'>$amount1</font>&nbsp;</TH></TR>";
   }
  $sql_t11 = "SELECT  sum(`payr`.`Amount`) AS amt FROM `payr` where `Typ`='R'";
  $result_t11 = mysql_query($sql_t11,$conn) or die('Could not list value; ' . mysql_error());
  $row11 = mysql_fetch_array($result_t11);
  $td=$row11['amt'];
  $td=abs($td);
  $td=number_format($td,2);

 echo "<TR><TH align='left' width='30%'> <font style='font-size: 9pt'><b>Total Deduction </b></font>&nbsp;</TH><TH align='right' width='20%'><font style='font-size: 9pt'>$td</font>&nbsp;</TH></TR>";

  $sql_t = "SELECT  sum( `payr`.`Amount`) AS amt FROM `payr`";
  $result_t = mysql_query($sql_t,$conn) or die('Could not list value; ' . mysql_error());
  $row = mysql_fetch_array($result_t);
  $np=$row['amt']; 
  $np=number_format($np,2);

   echo "<TR><TH>&nbsp;</TH></TR>"; 
   echo "<TR><TH width='33%' bgcolor='#EAEAEA' align='left'><font style='font-size: 9pt'><b>NET</b></font></TH><TH width='20%' bgcolor='#EAEAEA' align='right'><font style='font-size: 9pt'><b>$np</b></font></TH></TR><p>";

?>
</table>
</table>

			</td>
					</tr>
			
				</table>
			</div>
			</td>
		</tr>
	</table>
</div>
