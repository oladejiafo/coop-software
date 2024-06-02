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
   <form  action="rptsummary.php" method="post">
    <body bgcolor="#D2DD8F">
      <font style='font-size: 7pt'>Select Printing Option: <select size="1" name="cmbFilter">
      <option Selected></option>
      <option >By Office</option>
     </select></font>
     &nbsp; 
      <font style='font-size: 7pt'>Select Office Name: 
        <select  name="filter">  
          <?php  
           echo '<option selected></option>';
           $sql = "SELECT * FROM `office`";
           $result_lt = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rows = mysql_fetch_array($result_lt)) 
           {
             echo '<option>' . $rows['Office'] . '</option>';
           }
          ?> 
         </select>
      </font>
      &nbsp;
      <input type="submit" value="Go" name="submit">
     <br>
    </body>
   </form>

<TABLE width='795' border='1' cellpadding='1' cellspacing='1' align='center' id="table3">
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2">
<?php

 $cmbFilter=$_POST["cmbFilter"];
 $filter=$_POST["filter"];

  echo"<h2><center></center></h2> ";
  echo"<h3><center>Payroll Summary Report</center></h3> ";

  $sql_d = "SELECT * FROM `pay`";
  $result_d = mysql_query($sql_d,$conn) or die('Could not list value; ' . mysql_error());
  $row = mysql_fetch_array($result_d);
  $mnth=$row['Month'];
 
  $result = mysql_query ("SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Month`,`pay`.`Grade Level`,`pay`.`Rank`,`pay`.`Position`,`pay`.`Basic`,`pay`.`HAmount`,`pay`.`TotPay`,`pay`.`Arrears`,`pay`.`OthAllow_Tot`,`pay`.`TDeduction`,`pay`.`GPAmount`, (`pay`.`GPAmount`-`pay`.`TDeduction`) as NP From `pay` Group By `pay`.`Office`,`pay`.`Staff Number` Order by `pay`.`Office`,`pay`.`LocSortOrder`,`pay`.`RankSortOrder`,`pay`.`PosSortOrder`,`pay`.`Grade Level` Desc"); 

  echo "<font style='font-size: 8pt'><b>Office: " . $filter . "</b></font>&nbsp; &nbsp &nbsp; &nbsp &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp";
  echo "<font style='font-size: 8pt'><b>For the Month: " . $mnth . "</b></font>";
  echo "<p><TR><TH bgcolor='#C0C0C0'> <font style='font-size: 8pt'>Staff Name </font>&nbsp;</TH><TH bgcolor='#C0C0C0'> <font style='font-size: 8pt'>Rank </font>&nbsp;</TH><TH bgcolor='#C0C0C0'> <font style='font-size: 8pt'>Position </font>&nbsp;</TH><TH bgcolor='#C0C0C0'> <font style='font-size: 8pt'>Ann. Basic </font>&nbsp;</TH><TH bgcolor='#C0C0C0'> <font style='font-size: 8pt'>Ann. Rent </font>&nbsp;</TH><TH bgcolor='#C0C0C0'> <font style='font-size: 8pt'>Ann. Trans. </font>&nbsp;</TH><TH bgcolor='#C0C0C0'> <font style='font-size: 8pt'>Arrears </font>&nbsp;</TH><TH bgcolor='#C0C0C0'> <font style='font-size: 8pt'>Oth. Allow. </font>&nbsp;</TH><TH bgcolor='#C0C0C0'> <font style='font-size: 8pt'>Tot. Deductn </font>&nbsp;</TH><TH bgcolor='#C0C0C0'> <font style='font-size: 8pt'>Take Home </font>&nbsp;</TH></TR>";
  echo "<TR><TH style='border: 1px padding: 1px' bgcolor='#C0C0C0'> <font style='font-size: 8pt'>Staff No. </font>&nbsp;</TH><TH bgcolor='#C0C0C0'> <font style='font-size: 8pt'>G/Level </font>&nbsp;</TH><TH bgcolor='#C0C0C0'> <font style='font-size: 8pt'>&nbsp; </font>&nbsp;</TH><TH bgcolor='#C0C0C0'> <font style='font-size: 8pt'>Mnth Basic </font>&nbsp;</TH><TH bgcolor='#C0C0C0'> <font style='font-size: 8pt'>Mnth Rent </font>&nbsp;</TH><TH bgcolor='#C0C0C0'> <font style='font-size: 8pt'>Mnth Trans. </font>&nbsp;</TH><TH bgcolor='#C0C0C0'> <font style='font-size: 8pt'>&nbsp; </font>&nbsp;</TH><TH bgcolor='#C0C0C0'> <font style='font-size: 8pt'>Tot. Pay </font>&nbsp;</TH><TH bgcolor='#C0C0C0'> <font style='font-size: 8pt'>&nbsp; </font>&nbsp;</TH><TH bgcolor='#C0C0C0'> <font style='font-size: 8pt'>&nbsp; </font>&nbsp;</TH></TR></p>";
  echo "<TR><TH> &nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH></TR>";
  if (trim($cmbFilter)=="By Office")
  {  
  $result = mysql_query ("SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Month`,`pay`.`Grade Level`,`pay`.`Rank`,`pay`.`Position`,`pay`.`Basic`,`pay`.`HAmount`,`pay`.`TotPay`,`pay`.`Arrears`,`pay`.`OthAllow_Tot`,`pay`.`TDeduction`,`pay`.`GPAmount`, (`pay`.`GPAmount`-`pay`.`TDeduction`) as NP From `pay` Where `pay`.`Office`='$filter' Group By `pay`.`Office`,`pay`.`Staff Number` Order by `pay`.`Office`,`pay`.`LocSortOrder`,`pay`.`RankSortOrder`,`pay`.`PosSortOrder`,`pay`.`Grade Level` Desc"); 
  }

  while(list($staffno, $name,$office, $month, $grade, $rank, $position, $basic, $hamount,$totpay,$arrears,$othallow,$td,$gp,$np)=mysql_fetch_row($result)) 
   {
      $bsc=$basic*12;
      $bsc=number_format($bsc,2); 
      $rnt=$rent*12;
      $rnt=number_format($rent,2); 
      $tp=$totpay*12;
      $tp=number_format($tp,2); 
      echo "<TR><TH> <font style='font-size: 7pt'>$name </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>$rank </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>$position </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>$bsc </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>$rnt </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>$tp </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>$arrears </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>$othallow </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>$td </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>$np </font>&nbsp;</TH></TR>";
      echo "<TR><TH> <font style='font-size: 7pt'>$staffno </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>$grade </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>&nbsp;</font>&nbsp;</TH><TH> <font style='font-size: 7pt'>$basic </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>$rent </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>$totpay </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>&nbsp; </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>$gp </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>&nbsp; </font>&nbsp;</TH><TH> <font style='font-size: 7pt'>&nbsp; </font>&nbsp;</TH></TR>";
      echo "<TR><TH> &nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH></TR>";
   }
  $sql_t = "SELECT `Office`, `Month`,`Basic`,`HAmount`,`TotPay`,`Arrears`,`OthAllow_Tot`,`TDeduction`,`GPAmount`, (sum(`pay`.`GPAmount`)-sum(`pay`.`TDeduction`)) as NP From `pay` Group by office";
  $result_t = mysql_query($sql_t,$conn) or die('Could not list value; ' . mysql_error());
  $row = mysql_fetch_array($result_t);
  $nt=$row['NP'];
  $nt=number_format($nt,2);
   echo "<TR><TH>&nbsp;</TH></TR>"; 
   echo "<TR><TH bgcolor='#EAEAEA'><font style='font-size: 8pt'>&nbsp;</font></TH><TH bgcolor='#EAEAEA'><font style='font-size: 8pt'>&nbsp;</font></TH><TH bgcolor='#EAEAEA'><font style='font-size: 8pt'>&nbsp;</font></TH><TH bgcolor='#EAEAEA'><font style='font-size: 8pt'>&nbsp;</font></TH><TH bgcolor='#EAEAEA'><font style='font-size: 8pt'>&nbsp;</font></TH><TH bgcolor='#EAEAEA'><font style='font-size: 8pt'>&nbsp;</font></TH><TH bgcolor='#EAEAEA'><font style='font-size: 8pt'>&nbsp;</font></TH><TH bgcolor='#EAEAEA'><font style='font-size: 8pt'>&nbsp;</font></TH><TH bgcolor='#EAEAEA'><font style='font-size: 8pt'><b>Total</b></font></TH><TH bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$nt</b></font></TH></TR><p>";
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