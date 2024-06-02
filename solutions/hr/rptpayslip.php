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

<TABLE width='780' border='1' cellpadding='1' cellspacing='1' align='center' id="table3">
<?php

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];

  $result = mysql_query ("SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`,`payr`.`Allowid`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Group By `pay`.`Staff Number` Order by `payr`.`Typ`,`payr`.`SortOrder`"); 
  if (trim($cmbFilter)=="All Staff")
  {
   $result = mysql_query ("SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`,`payr`.`AllowID`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Order by `pay`.`Staff Number`,`payr`.`Typ`,`payr`.`SortOrder`"); 
  }
  else if (trim($cmbFilter)=="Individual")
  {  
   $result = mysql_query ("SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`,`payr`.`AllowID`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Where `pay`.`Staff Number`='$filter' Order by `pay`.`Staff Number`,`payr`.`Typ`,`payr`.`SortOrder`"); 
  }
$row = mysql_fetch_array($result);
?>
 
<?php
  if (trim($cmbFilter)=="All Staff")
{
   $restx = mysql_query ("SELECT `pay`.`Staff Number` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Where `payr`.`class`='Gross Pay' Group By `pay`.`Staff Number` Order by `pay`.`Staff Number`,`payr`.`Typ`,`payr`.`SortOrder`"); 
   while(list($staffnx)=mysql_fetch_row($restx)) 
   {
    $result = mysql_query ("SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Pension Managers`,`payr`.`AllowID`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Where `pay`.`Staff Number`='$staffnx' Group By `pay`.`Staff Number` Order by `pay`.`Staff Number`,`payr`.`Typ`,`payr`.`SortOrder`"); 
   $row = mysql_fetch_array($result);
?>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="81%" id="AutoNumber1" height="139">
     
   <TR><Td colspan='4'> <font style='font-size: 12pt'><h2><b><u></u></b></h2></font></Td></TR>
   <TR><Td colspan='4'> <font style='font-size: 12pt'><h3><u>Pay Slip</u></h3></font></Td></TR><br>
*****************************************************************************************
  <tr>
    <td width="17%" height="19"><font style='font-size: 8pt'><b>Staff Number:</b></font></td>
    <td width="26%" height="19"><font style='font-size: 8pt'><?php echo $row['Staff Number']; ?></font></td>
    <td width="22%" height="19"><font style='font-size: 8pt'><b>Month:</b></font></td>
    <td width="35%" height="19"><font style='font-size: 8pt'><?php echo $row['Month']; ?></font></td>
  </tr>
  <tr>
    <td width="17%" height="19"><font style='font-size: 8pt'><b>Name:</b></font></td>
    <td width="26%" height="19"><font style='font-size: 8pt'><?php echo $row['Staff Name']; ?></font></td>
    <td width="22%" height="19"><font style='font-size: 8pt'><b>Grade Level:</b></font></td>
    <td width="35%" height="19"><font style='font-size: 8pt'><?php echo $row['Grade Level']; ?></font></td>
  </tr>
  <tr>
    <td width="17%" height="19"><font style='font-size: 8pt'><b>Department:</b></font></td>
    <td width="26%" height="19"><font style='font-size: 8pt'><?php echo $row['Department']; ?></font></td>
    <td width="17%" height="19"><font style='font-size: 8pt'><b>Rank:</b></font></td>
    <td width="26%" height="19"><font style='font-size: 8pt'><?php echo $row['Rank']; ?></font></td>
  </tr>
  <tr>
    <td width="22%" height="19"><font style='font-size: 8pt'><b>Bank:</b></font></td>
    <td width="35%" height="19"><font style='font-size: 8pt'><?php echo $row['Bank']; ?></font></td>
    <td width="22%" height="19"><font style='font-size: 8pt'></font></td>
    <td width="35%" height="19"><font style='font-size: 8pt'></font></td>
  </tr>
</table>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="78%" id="AutoNumber2">

<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="78%" id="AutoNumber2">
  <tr border="1">
    <td width="20%" align="right" bgcolor="#C0C0C0"><font style='font-size: 9pt'><b>Description</b></font></td>
    <td width="20%" align="right" bgcolor="#C0C0C0"><font style='font-size: 9pt'><b>Amount</b></font></td>
  </tr>
<?php

   $result = mysql_query ("SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`,`payr`.`AllowID`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder`,`pay`.`GPAmount`,`pay`.`TDeduction`,`pay`.`TotPay`,`pay`.`NetPay` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Where `pay`.`Staff Number`='$staffnx' and `payr`.`class`='Gross Pay'"); 
   $result2 = mysql_query ("SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`,`payr`.`AllowID`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder`,`pay`.`GPAmount`,`pay`.`TDeduction`,`pay`.`TotPay`,`pay`.`NetPay` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Where `pay`.`Staff Number`='$staffnx' and `payr`.`class`='Total Deduction'"); 

   while(list($staffno, $name,$office, $dept, $month, $grade, $bank, $acctno, $branch, $code, $description, $amount, $class,$sortorder,$gp,$td,$tp,$np)=mysql_fetch_row($result)) 
   {
      $cls=$class;
      $grosspay=$gp;
    $net=$grosspay-$totdeduct;
      $amount=number_format($amount,2);
      $grosspay=number_format($grosspay,2);
      echo "<TR><TH width='23%' align='right'> <font style='font-size: 8pt'> $description </font>&nbsp;</TH><TH width='23%' align='right'><font style='font-size: 8pt'>$amount</font>&nbsp;</TH></TR>";
   }
   echo "<TR><TH>&nbsp;</TH></TR>"; 
   echo "<TR><TH width='23%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$cls</b></font></TH><TH width='23%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$grosspay</b></font></TH></TR><p>";
   echo "<TR><TH>&nbsp;</TH></TR>"; 
 
   while(list($staffno1, $name1,$office1, $dept1, $month1, $grade1, $bank1, $acctno1, $branch1, $code1, $description1, $amount1, $class1,$sortorder1,$gp1,$td1,$tp1,$np1)=mysql_fetch_row($result2)) 
   {
     
      $cls1=$class1;
      $totdeduct=$td1;
      $amount1=(-1)*$amount1;
      $amount1=number_format($amount1,2);
      $totdeduct=number_format($totdeduct,2);
      echo "<TR><TH width='23%' align='right'> <font style='font-size: 8pt'>$description1 </font>&nbsp;</TH><TH width='23%' align='right'><font style='font-size: 8pt'>$amount1 </font></TH></TR>";
   }
   echo "<TR><TH>&nbsp;</TH></TR>";   
   echo "<TR><TH width='23%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$cls1</b></font></TH><TH width='23%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$totdeduct</b></font></TH></TR>";
   echo "<TR><TH>&nbsp;</TH></TR>"; 
     # $net=$grosspay-$totdeduct;
      $net=number_format($net,2);
   echo "<TR><TH width='23%' bgcolor='#C0C0C0' align='right'><font style='font-size: 9pt'><b>Net Pay </b></font></TH><TH width='23%' bgcolor='#C0C0C0' align='right'><font style='font-size: 9pt'><b> $net</b></font></TH></TR>";
  }
  }
  else if (trim($cmbFilter)=="Individual")
{  
 $result = mysql_query ("SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Rank`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Pension Managers`,`payr`.`AllowID`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Where `pay`.`Staff Number`='$filter' Order by `pay`.`Staff Number`,`payr`.`Typ`,`payr`.`SortOrder`"); 
 $row = mysql_fetch_array($result);

?>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="81%" id="AutoNumber1" height="139">
  <tr>
    <td width="17%" height="19"><font style='font-size: 8pt'><b>Staff Number:</b></font></td>
    <td width="26%" height="19"><font style='font-size: 8pt'><?php echo $row['Staff Number']; ?></font></td>
    <td width="22%" height="19"><font style='font-size: 8pt'><b>Month:</b></font></td>
    <td width="35%" height="19"><font style='font-size: 8pt'><?php echo $row['Month']; ?></font></td>
  </tr>
  <tr>
    <td width="17%" height="19"><font style='font-size: 8pt'><b>Name:</b></font></td>
    <td width="26%" height="19"><font style='font-size: 8pt'><?php echo $row['Staff Name']; ?></font></td>
    <td width="22%" height="19"><font style='font-size: 8pt'><b>Grade Level:</b></font></td>
    <td width="35%" height="19"><font style='font-size: 8pt'><?php echo $row['Grade Level']; ?></font></td>
  </tr>
  <tr>
    <td width="17%" height="19"><font style='font-size: 8pt'><b>Department:</b></font></td>
    <td width="26%" height="19"><font style='font-size: 8pt'><?php echo $row['Department']; ?></font></td>
    <td width="17%" height="19"><font style='font-size: 8pt'><b>Rank:</b></font></td>
    <td width="26%" height="19"><font style='font-size: 8pt'><?php echo $row['Rank']; ?></font></td>
  </tr>
  <tr>
    <td width="22%" height="19"><font style='font-size: 8pt'><b>Bank:</b></font></td>
    <td width="35%" height="19"><font style='font-size: 8pt'><?php echo $row['Bank']; ?></font></td>
    <td width="22%" height="19"><font style='font-size: 8pt'></font></td>
    <td width="35%" height="19"><font style='font-size: 8pt'></font></td>
  </tr>
</table>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="78%" id="AutoNumber2">

<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="78%" id="AutoNumber2">
  <tr border="1">
    <td width="20%" align="right" bgcolor="#C0C0C0"><font style='font-size: 9pt'><b>Description</b></font></td>
    <td width="20%" align="right" bgcolor="#C0C0C0"><font style='font-size: 9pt'><b>Amount</b></font></td>
  </tr>

<?php  
$result1 = mysql_query ("SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`,`payr`.`AllowID`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder`,`pay`.`GPAmount`,`pay`.`TDeduction`,`pay`.`TotPay`,`pay`.`NetPay` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Where `pay`.`Staff Number`='$filter' and `payr`.`class`='Gross Pay'"); 
$result2 = mysql_query ("SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`,`payr`.`AllowID`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder`,`pay`.`GPAmount`,`pay`.`TDeduction`,`pay`.`TotPay`,`pay`.`NetPay` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Where `pay`.`Staff Number`='$filter' and `payr`.`class`='Total Deduction'"); 

while(list($staffno, $name,$office, $dept, $month, $grade, $bank, $acctno, $branch, $code, $description, $amount, $class,$sortorder,$gp,$td,$tp,$np)=mysql_fetch_row($result1)) 
{
   $cls=$class;
   $grosspay=$gp;
   $amount=number_format($amount,2);
   echo "<TR><TH width='23%' align='right'> <font style='font-size: 8pt'> $description </font>&nbsp;</TH><TH width='23%' align='right'><font style='font-size: 8pt'>$amount</font>&nbsp;</TH></TR>";
}
echo "<TR><TH>&nbsp;</TH></TR>"; 
   $grosspay1=number_format($grosspay,2);
echo "<TR><TH width='23%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$cls</b></font></TH><TH width='23%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$grosspay1</b></font></TH></TR><p>";
echo "<TR><TH>&nbsp;</TH></TR>"; 
 
while(list($staffno1, $name1,$office1, $dept1, $month1, $grade1, $bank1, $acctno1, $branch1, $code1, $description1, $amount1, $class1,$sortorder1,$gp1,$td1,$tp1,$np1)=mysql_fetch_row($result2)) 
{
   $cls1=$class1;
   $totdeduct=$td1;
   $amount1=$amount1*(-1);
   $amount1=number_format($amount1,2);
   echo "<TR><TH width='23%' align='right'> <font style='font-size: 8pt'>$description1 </font>&nbsp;</TH><TH width='23%' align='right'><font style='font-size: 8pt'>$amount1 </font></TH></TR>";
}
echo "<TR><TH>&nbsp;</TH></TR>";   
   $totdeduct1=number_format($totdeduct,2);
echo "<TR><TH width='23%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$cls1</b></font></TH><TH width='23%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$totdeduct1</b></font></TH></TR>";
echo "<TR><TH>&nbsp;</TH></TR>"; 
$net=$grosspay-$totdeduct;
$net=number_format($net,2);
echo "<TR><TH width='23%' bgcolor='#C0C0C0' align='right'><font style='font-size: 9pt'><b>Net Pay </b></font></TH><TH width='23%' bgcolor='#C0C0C0' align='right'><font style='font-size: 9pt'><b> $net</b></font></TH></TR>";
}
?>
</table>
</TABLE>
						</td>
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