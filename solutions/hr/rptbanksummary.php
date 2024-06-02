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
			<td>
			<div align="center">
				<table border="0" width="800" id="table2">
					<tr>
						<td>

<TABLE width='795' border='1' cellpadding='1' cellspacing='1' align='center' id="table3">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="75%" id="AutoNumber2">
<?php

  echo"<h2><b><center></center></b></h2>
  echo"<h2><center>Banks Summary Report</center></h2> ";

  $sql_d = "SELECT * FROM `pay`";
  $result_d = mysql_query($sql_d,$conn) or die('Could not list value; ' . mysql_error());
  $row = mysql_fetch_array($result_d);
  $mnth=$row['Month'];

  $result = mysql_query ("SELECT `pay`.`Month` , `pay`.`Bank` , `pay`.`Branch` , sum( `pay`.`GPAmount` - `pay`.`TDeduction` ) AS amt FROM `pay` GROUP BY `pay`.`Bank` "); 

  echo "<font style='font-size: 8pt'><b>For the Month: " . $mnth . "</b></font>";
  echo "<TR><TH bgcolor='#C0C0C0' width='60%'> <font style='font-size: 9pt'>Bank Name </font>&nbsp;</TH><TH bgcolor='#C0C0C0' width='40%'><font style='font-size: 9pt'>Amount</font>&nbsp;</TH></TR>";
  while(list($month, $bank, $branch, $amount)=mysql_fetch_row($result)) 
   {
     $amount=number_format($amount);
      echo "<TR><TH width='60%'> <font style='font-size: 8pt'>$bank </font>&nbsp;</TH><TH width='40%'><font style='font-size: 8pt'>$amount</font>&nbsp;</TH></TR>";
   }
#   echo "<TR><TH>&nbsp;</TH></TR>"; 
#   echo "<TR><TH width='33%' align='right' bgcolor='#EAEAEA'><font style='font-size: 9pt'>&nbsp;</font></TH><TH width='33%' bgcolor='#EAEAEA' align='right'><font style='font-size: 9pt'><b>Total</b></font></TH><TH width='33%' bgcolor='#EAEAEA' align='right'><font style='font-size: 9pt'><b>$net</b></font></TH></TR><p>";
#   echo "<TR><TH>&nbsp;</TH></TR>"; 

?>
</table>
</table>

<br>
						<p>&nbsp;</td>
					</tr>
				</table>
			</div>
			</td>
		</tr>
	</table>
</div>


<?php
 require_once 'footer.php';
?>