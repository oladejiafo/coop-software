<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 1) & ($_SESSION['access_lvl'] != 2))
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
 require_once 'header.php';
 require_once 'style.php';
?>
   <div align="center">
	<table border="0" width="803" id="table1" bgcolor="#FFFFFF">
		<tr>
			<td>
			<div align="center">
				<table border="0" width="797" id="table2">
					<tr>
						<td>

 <fieldset style="padding: 2">
<p><legend><b><i><font size="2" face="Tahoma" color="#D2DD8F"> <?php require_once 'payheader.php'; ?>
</p></font></i></b></legend>

<TABLE width='795' border='1' cellpadding='1' cellspacing='1' align='center' id="table3">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="75%" id="AutoNumber2">
<?php

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];
 $cmbLocation=$_REQUEST["cmbLocation"];

  echo"<h2><center>Deductions Summary Report</center></h2> ";

  $sql_d = "SELECT `payr`.*,`pay`.* FROM `payr` inner join `pay` on `payr`.`staff number`=`pay`.`staff number` where `type`='D'";
  $result_d = mysql_query($sql_d,$conn) or die('Could not list value; ' . mysql_error());
  $row = mysql_fetch_array($result_d);
  $mnth=$row['Month'];

  echo "<font style='font-size: 8pt'><b>For the Month: " . $mnth . "</b></font> &nbsp &nbsp;";
  echo "<font style='font-size: 8pt'><b>For the Location: " . $cmbLocation . "</b></font> &nbsp &nbsp;";
  echo "<TR align='left'><TH bgcolor='#C0C0C0' width='33%'> <font style='font-size: 9pt'>Deduction Type </font>&nbsp;</TH><TH align='right' bgcolor='#C0C0C0' width='33%'><font style='font-size: 9pt'>Amount</font>&nbsp;</TH></TR>";

  $result = mysql_query ("SELECT distinct `payr`.`Description`,sum(`payr`.`Amount`) as amt From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `type`='D' GROUP BY `payr`.`Description`"); 

  while(list($descr, $amount)=mysql_fetch_row($result)) 
   {
       $amount=number_format((-1)*$amount,2);
      echo "<TR align='left'><TH width='33%'> <font style='font-size: 8pt'>$descr </font>&nbsp;</TH><TH align='right' width='33%'><font style='font-size: 8pt'>$amount</font>&nbsp;</TH></TR>";
   }

  $sql_t = "SELECT sum(`payr`.`Amount`) as amt1 From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `type`='D' group by `payr`.`Description`";
  $result_t = mysql_query($sql_t,$conn) or die('Could not list value; ' . mysql_error());
  $row = mysql_fetch_array($result_t);
  $amt1=$row['amt1'];
  $np=number_format((-1)*$amt1,2);

   echo "<TR><TH>&nbsp;</TH></TR>"; 
   echo "<TR><TH width='20%' bgcolor='#EAEAEA' align='left'><font style='font-size: 10pt'><b>Total</b></font></TH><TH width='20%' bgcolor='#EAEAEA' align='right'><font style='font-size: 10pt'><b>$np</b></font></TH></TR><p>";
?>
</table>
</table>

<br>
<form>
<Table>
<tr>
<td>

<?php
 echo "<a target='blank' href='rptdeduction.php?cmbFilter=$cmbFilter&cmbLocation=$cmbLocation'> Print Deduction Report</a> &nbsp; ";
?>
</td>
</tr>
</Table
</form>
<?php
 require_once 'footr.php';
 require_once 'footer.php';
?>
</td>
					</tr>
		
				</table>
			</div>
			</td>
		</tr>
	</table>
</div>