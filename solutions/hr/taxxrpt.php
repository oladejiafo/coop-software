<?php
 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';
#session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 4))
{
 if ($_SESSION['access_lvl'] != 5 & $_SESSION['access_lvl'] != 1){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=../index.php?redirect=$redirect");
}
}

?>
   <div align="center">
	<table border="0" width="100%" id="table1" bgcolor="#FFFFFF">
		<tr>
			<td>
			<div align="center">
<fieldset style="padding: 2">
				<table border="0" width="100%" id="table2">
					<tr>
						<td>

<TABLE width='100%' border='1' cellpadding='1' cellspacing='1' align='center' id="table3">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="99%" id="AutoNumber2">
<?php

 @$cmbFilter=$_REQUEST["cmbFilter"];
 @$filter=$_REQUEST["filter"];
 @$valt=$_REQUEST["valt"];

if($filter=="All")
{
  $valt="%";
  $valtt="All";
} else {
  $valtt=$valt;
}

  echo"<h2><left>INTERNAL REVENUE SERVICE</left></h2> ";
  echo"<h3><left>Employer's Schedule Monthly Tax Report</left></h3> ";

  $sql_d = "SELECT `payr`.*,`pay`.* FROM `payr` inner join `pay` on `payr`.`staff number`=`pay`.`staff number` where `Type`='Deduction'";
  $result_d = mysqli_query($conn,$sql_d) or die('Could not list value; ' . mysqli_error());
  $row = mysqli_fetch_array($result_d);
  @$mnth=$row['Month'];

  $result = mysqli_query($conn,"SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `payr`.`description`, `pay`.`Month`,`payr`.`amount` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `payr`.`Description`='Tax' and `pay`.`Location` like '%' Order by `pay`.`Staff Number`"); 

  echo "<font style='font-size: 8pt'><b>For the Month: " . $mnth . "</b></font>&nbsp; &nbsp &nbsp; &nbsp &nbsp;******";
  echo "<font style='font-size: 8pt'><b>Location: " . $valtt . "</b></font>";
  echo "<TR align='left'>
        <TH bgcolor='#C0C0C0' width='8%' valign='top'> <font style='font-size: 9pt'>Name of Employee </font>&nbsp;</TH>
        <TH bgcolor='#C0C0C0' width='8%' valign='top'> <font style='font-size: 9pt'>Grade </font>&nbsp;</TH>
        <TH align='right' bgcolor='#C0C0C0' width='8%' valign='top'> <font style='font-size: 9pt'>Basic Salary </font>&nbsp;</TH>
        <TH align='right' bgcolor='#C0C0C0' width='8%' valign='top'> <font style='font-size: 9pt'>Cash Allowances </font>&nbsp;</TH>
        <TH align='right' bgcolor='#C0C0C0' width='8%' valign='top'> <font style='font-size: 9pt'>Vehicle Element </font>&nbsp;</TH>
        <TH align='right' bgcolor='#C0C0C0' width='8%' valign='top'> <font style='font-size: 9pt'>Accomodation <br> Element </font>&nbsp;</TH>
        <TH align='right' bgcolor='#C0C0C0' width='8%' valign='top'><font style='font-size: 9pt'>Other <br> Benefits</font>&nbsp;</TH>
        <TH align='right' bgcolor='#C0C0C0' width='8%' valign='top'> <font style='font-size: 9pt'>Total <br> Emoluments </font>&nbsp;</TH>
        <TH align='right' bgcolor='#C0C0C0' width='8%' valign='top'> <font style='font-size: 9pt'>SSL Deduction </font>&nbsp;</TH>
        <TH align='right' bgcolor='#C0C0C0' width='8%' valign='top'> <font style='font-size: 9pt'>Deductible </font>&nbsp;</TH>
        <TH align='right' bgcolor='#C0C0C0' width='8%' valign='top'> <font style='font-size: 9pt'>Net Payable </font>&nbsp;</TH>
        <TH align='right' bgcolor='#C0C0C0' width='8%' valign='top'> <font style='font-size: 9pt'>Tax Deductable </font>&nbsp;</TH>
        <TH align='right' bgcolor='#C0C0C0' width='8%' valign='top'> <font style='font-size: 9pt'>Tax Deducted </font>&nbsp;</TH>
</TR>";

#  if (trim(!empty($cmbFilter)))
#  {  
#    $restxx = mysqli_query($conn,"SELECT `pay`.`Location` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `payr`.`Description`='$cmbFilter' and `pay`.`Location` like '$valt%' group by `pay`.`Location`"); 
#    while(list($loc)=mysqli_fetch_row($restxx)) 
#    {
      $result = mysqli_query($conn,"SELECT `pay`.`Staff Number`,`pay`.`Staff Name`,`pay`.`Grade Level` , `pay`.`Basic` from `pay` where `pay`.`Basic`>0 and `pay`.`Staff Number` not like 'wt%' Order by `pay`.`Staff Name`"); 
      echo "<TR align='center'><TH colspan='13'> <font style='font-size: 10pt'><b> </b></font>&nbsp;</TH></TR>";
      while(list($sno,$name,$gl, $basic)=mysqli_fetch_row($result)) 
      {
       $sql_tx = "SELECT sum(`payr`.`Amount`) as callow FROM `payr` where `Type`='Allowance' and `Staff Number`='$sno'";
       $result_tx = mysqli_query($conn,$sql_tx) or die('Could not list value; ' . mysqli_error());
       $rowtx = mysqli_fetch_array($result_tx);
       @$callow=$rowtx['callow'];

       $sql_txv = "SELECT sum(`payr`.`Amount`) as vell FROM `payr` where `Description`='Vehicle Element' and `Staff Number`='$sno'";
       $result_txv = mysqli_query($conn,$sql_txv) or die('Could not list value; ' . mysqli_error());
       $rowtxv = mysqli_fetch_array($result_txv);
       @$vell=$rowtxv['vell'];

       $sql_txa = "SELECT sum(`payr`.`Amount`) as aell FROM `payr` where `Description`='Accomodation Element' and `Staff Number`='$sno'";
       $result_txa = mysqli_query($conn,$sql_txa) or die('Could not list value; ' . mysqli_error());
       $rowtxa = mysqli_fetch_array($result_txa);
       @$aell=$rowtxa['aell'];

       $sql_txo = "SELECT sum(`payr`.`Amount`) as oall FROM `payr` where `Type`='Allowance (Other)' and `Staff Number`='$sno'";
       $result_txo = mysqli_query($conn,$sql_txo) or die('Could not list value; ' . mysqli_error());
       $rowtxo = mysqli_fetch_array($result_txo);
       @$oall=$rowtxo['oall'];

       $sql_txs = "SELECT sum(`payr`.`Amount`) as sded FROM `payr` where `Description`='Social Security Deduction' and `Staff Number`='$sno'";
       $result_txs = mysqli_query($conn,$sql_txs) or die('Could not list value; ' . mysqli_error());
       $rowtxs = mysqli_fetch_array($result_txs);
       @$sded=$rowtxs['sded']*(-1);

       $sql_txp = "SELECT sum(`payr`.`Amount`) as pded FROM `payr` where `Description`='Provident Fund' and `Staff Number`='$sno'";
       $result_txp = mysqli_query($conn,$sql_txp) or die('Could not list value; ' . mysqli_error());
       $rowtxp = mysqli_fetch_array($result_txp);
       @$pded=$rowtxp['pded']*(-1);

       $sql_txt = "SELECT sum(`payr`.`Amount`) as tded FROM `payr` where `Description`='Tax' and `Staff Number`='$sno'";
       $result_txt = mysqli_query($conn,$sql_txt) or die('Could not list value; ' . mysqli_error());
       $rowtxt = mysqli_fetch_array($result_txt);
       @$tded=$rowtxt['tded']*(-1);

       @$totellow=$basic+$callow+$vell+$aell+$oall;
       @$ntax=$totellow-$sded-$pded;

       @$tded=number_format($tded,2);
       @$pded=number_format($pded,2);
       @$sded=number_format($sded,2);
       @$ntax=number_format($ntax,2);
       @$totellow=number_format($totellow,2);
       @$callow=number_format($callow,2);
       @$vell=number_format($vell,2);
       @$aell=number_format($aell,2);
       @$oall=number_format($oall,2);
       @$basic=number_format($basic,2);

        echo "<TR align='left'>
              <TH width='8%'> <font style='font-size: 8pt'>$name </font>&nbsp;</TH>
              <TH width='8%'> <font style='font-size: 8pt'>$gl </font>&nbsp;</TH>
              <TH align='right' width='8%'> <font style='font-size: 8pt'>$basic </font>&nbsp;</TH>
              <TH align='right' width='8%'> <font style='font-size: 8pt'>$callow </font>&nbsp;</TH>
              <TH align='right' width='8%'> <font style='font-size: 8pt'>$vell </font>&nbsp;</TH>
              <TH align='right' width='8%'> <font style='font-size: 8pt'>$aell </font>&nbsp;</TH>
              <TH align='right' width='8%'><font style='font-size: 8pt'>$oall</font>&nbsp;</TH>
              <TH align='right' width='8%'> <font style='font-size: 8pt'>$totellow </font>&nbsp;</TH>
              <TH align='right' width='8%'> <font style='font-size: 8pt'>$sded </font>&nbsp;</TH>
              <TH align='right' width='8%'> <font style='font-size: 8pt'>$pded </font>&nbsp;</TH>
              <TH align='right' width='8%'> <font style='font-size: 8pt'>$ntax </font>&nbsp;</TH>
              <TH align='right' width='8%'> <font style='font-size: 8pt'>$tded </font>&nbsp;</TH>
              <TH align='right' width='8%'> <font style='font-size: 8pt'>$tded </font>&nbsp;</TH>
</TR>";
      }

/*      $npx=number_format((-1)*$amtx,2);

      echo "<TR><TH colspan=11>&nbsp;</TH></TR>"; 
      echo "<TR><TH bgcolor='#EAEAEA' align='left' colspan=6><font style='font-size: 10pt'><b> Total</b></font></TH><TH bgcolor='#EAEAEA' align='right'><font style='font-size: 10pt'><b>$npx</b></font></TH><TH bgcolor='#EAEAEA' colspan=4></TH></TR><p>";
*/
#    }
#  }


?>
</table>
</table>

<br>
<form>
<Table>
<tr>
<td>

<?php
 echo "<a target='blank' href='rpttax.php?cmbFilter=$cmbFilter&filter=$filter&valt=$valt'> Print Deduction Report</a> &nbsp; ";
# echo "<a target='blank' href='exportcontri.php?cmbFilter=$cmbFilter&filter=$filter&valt=$valt'> Export Deduction Report</a> &nbsp; ";
?>
</td>
</tr>
</Table
></form>
