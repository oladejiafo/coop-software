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
	<table border="0" width="100%" id="table1" bgcolor="#FFFFFF">

		<tr>
			<td>
			<div align="left">

     <h2><left><b><u></u></b></left></h2>
				<table border="0" width="100%" id="table2">
					<tr>
						<td>

<TABLE width='50%' border='1' cellpadding='1' cellspacing='1' align='center' id="table3">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="75%" id="AutoNumber2">
<?php

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];

  echo"<h2><center>Loan Report</center></h2> ";

  $sql_d = "SELECT `payr`.*,`pay`.* FROM `payr` inner join `pay` on `payr`.`staff number`=`pay`.`staff number` where `AllowID`='Loan'";
  $result_d = mysql_query($sql_d,$conn) or die('Could not list value; ' . mysql_error());
  $row = mysql_fetch_array($result_d);
  $mnth=$row['Month'];

  $result = mysql_query ("SELECT `pay`.`Staff Number`, `pay`.`Staff Name`, `payr`.`description`, `pay`.`Month`,`payr`.`amount` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `payr`.`Description`='$cmbFilter' Order by `pay`.`Staff Number`"); 

  echo "<font style='font-size: 9pt'><b>Loan Type: " . $cmbFilter . "</b></font>&nbsp; &nbsp &nbsp; &nbsp &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp";
  echo "<font style='font-size: 8pt'><b>For the Month: " . $mnth . "</b></font>";
  echo "<TR align='left'><TH bgcolor='#C0C0C0' width='20%'> <font style='font-size: 9pt'>Staff Name </font>&nbsp;</TH><TH align='right' bgcolor='#C0C0C0' width='20%'><font style='font-size: 9pt'>Amount</font>&nbsp;</TH></TR>";

  if (trim(!empty($cmbFilter)))
  {  
  $result = mysql_query ("SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `payr`.`description`, `pay`.`Month`,`payr`.`amount` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `payr`.`Description`='$cmbFilter' Order by `pay`.`Staff Number`"); 
  }

  while(list($staffno, $name,$descr, $month, $amount)=mysql_fetch_row($result)) 
   {
       $amount=number_format((-1)*$amount,2);
      echo "<TR align='left'><TH width='20%'> <font style='font-size: 8pt'>$name </font>&nbsp;</TH><TH align='right' width='20%'><font style='font-size: 8pt'>$amount</font>&nbsp;</TH></TR>";
   }

  $sql_t = "SELECT `pay`.`Staff Number`,sum(`payr`.`amount`) as amt From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `payr`.`Description`='$cmbFilter' group by `payr`.`Description`";
  $result_t = mysql_query($sql_t,$conn) or die('Could not list value; ' . mysql_error());
  $row = mysql_fetch_array($result_t);
  $amt=$row['amt'];
  $np=number_format((-1)*$amt,2);

   echo "<TR><TH>&nbsp;</TH></TR>"; 
   echo "<TR><TH width='20%' bgcolor='#EAEAEA' align='left'><font style='font-size: 10pt'><b>Total</b></font></TH><TH width='20%' bgcolor='#EAEAEA' align='right'><font style='font-size: 10pt'><b>$np</b></font></TH></TR><p>";
?>
</table>
</table>

<br>

</td>
					</tr>
		
				</table>
			</div>
			</td>
		</tr>
	</table>
</div>