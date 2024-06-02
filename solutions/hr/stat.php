<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
 if ($_SESSION['access_lvl'] != 3){
  if ($_SESSION['access_lvl'] != 4){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don’t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn’t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
$cmbFilter="None";
$filter="";
}
}
}

 require_once 'header.php';
 require_once 'style.php';
global $Tit;
$Tit=$_REQUEST['Tit'];
?>
<div align="center">
	<table border="0" width="920" bgcolor="#FFFFFF" id="table1">
		<tr align='center'>
 <td bgcolor="#008000"><b>
<font face="Verdana" color="#FFFFFF" style="font-size: 16pt">Statistical Analysis</font></b>
 </td>
</tr>
		<tr>
			<td colspan="2">

   <form  action="stat.php" method="post">
    <body bgcolor="#D2DD8F">
   <fieldset>
    <Table>
     <TR><TH align='right'>
      Select Analysis: <select size="1" name="cmbFilter1">
      <option selected></option>
      <option>Applicants Listing</option>
      <option>Nominal Roll Analysis</option>
      <option>Applications by Qualification</option>
      <option>Applications by Field of Study</option>
      <option>Applications by Single Field of Study</option>
      <option>Appointments by State/LGA</option>
      <option>Permanent Appointments</option>
      <option>Promotions</option>
      <option>Transfers Within</option>
      <option>Transfers Outside</option>
     </select>
     &nbsp; </TH><TH></TH><TH></TH></TR>
     <br>
     <TR><TH align='right'>
      Select Criteria to Search with: <select size="1" name="cmbFilter">
      <option selected></option>
      <option>Field</option>
      <option>Grade Level</option>
      <option>Ministry</option>
      <option>State</option>
     </select>
     &nbsp; </TH><TH align='right'> Enter Value: 
     <input type="text" name="filter">
     &nbsp; </TH></TR>
     <TR><TH align='right'>
     Enter Date (From): &nbsp; <input type="text" name="datefro" value="<?php echo date('Y-01-01') ?>">
     &nbsp; </TH>
     <TH align='right'>
     Enter Date (To): &nbsp; <input type="text" name="dateto" value="<?php echo date('Y-m-d') ?>">
     &nbsp; </TH>
     <TH align='right'>
     <input type="submit" value="Open" name="submit">
     </TH><TH></TH></TR>
     </Table>
     <br>
    </fieldset>
    </body>
   </form>

<fieldset style="padding: 2">
<form>
<TABLE width='99%' border='1' cellpadding='1' cellspacing='1' align='center' bordercolor="#005B00" id="table2">
 <?php
 $tval=$_GET['tval'];
 $limit      = 60;
 $page=$_GET['page'];

 $cmbFilter1=$_REQUEST["cmbFilter1"];
 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];
 $datefro=$_REQUEST["datefro"];
 $dateto=$_REQUEST["dateto"];

 echo "<font color='#FF0000' style='font-size: 9pt'>" . $tval . "</font>";
 echo "<p>";
if ($cmbFilter1=="")
{
  echo "<TR><TH colspan='2'> &nbsp;</TH><TH colspan='12'><b>LEVEL OF EDUCATION </b>&nbsp;</TH><TH colspan='3'>&nbsp;</TH></TR>";
  echo "<TR><TH><b>S/No </b> &nbsp;</TH><TH><b>State of Origin </b>&nbsp;</TH><TH colspan='2'><b>Ph.D </b>&nbsp;</TH>
      <TH colspan='2'><b>M.Sc/Equivalent </b>&nbsp;</TH><TH colspan='2'><b>PGD </b>&nbsp;</TH><TH colspan='2'><b>1st Degree </b>&nbsp;</TH><TH colspan='2'><b>HND </b>&nbsp;</TH><TH colspan='2'><b>NCE & Others </b>&nbsp;</TH><TH colspan='2'><b>TOTAL </b>&nbsp;</TH><TH><b>Grand Total </b>&nbsp;</TH></TR>";
  echo "<TR><TH colspan='2'> &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH>&nbsp;</TH></TR>";
}
else if ($cmbFilter1=="Applicants Listing")
{
 #require_once 'conn2.php';
 echo "<tr><th colspan='10'><font color='#006600' style='font-size: 13pt'>";
 echo "Applicants Listing <br> (" . date('d F, Y',strtotime($datefro)) . " to " . date('d F, Y',strtotime($dateto)) . ")";
 echo "</font></th></tr>";
 require_once 'applicantlist.php';
}
else if ($cmbFilter1=="Nominal Roll Analysis")
{
 require_once 'conn.php';
 echo "<tr><th colspan='25'><font color='#006600' style='font-size: 13pt'>";
 echo "Nominal Roll Analysis by State of Origin and MDAs <br> (" . date('d F, Y',strtotime($datefro)) . " to " . date('d F, Y',strtotime($dateto)) . ")";
 echo "</font></th></tr>";
 require_once 'nominalanalysis.php';
}
else if ($cmbFilter1=="Applications by Qualification")
{
 require_once 'conn2.php';
 echo "<tr><th colspan='17'><font color='#006600' style='font-size: 13pt'>";
 echo "Applications for Direct Appointments by State of Origin and Education Level <br> (" . date('d F, Y',strtotime($datefro)) . " to " . date('d F, Y',strtotime($dateto)) . ")";
 echo "</font></th></tr>";
 require_once 'applicationqualification.php';
}
else if ($cmbFilter1=="Applications by Single Field of Study")
{
# require_once 'conn2.php';
 echo "<tr><th colspan='23'><font color='#006600' style='font-size: 13pt'>";
 echo "Applications for Direct Appointments by State of Origin and Field of Study <br> (" . date('d F, Y',strtotime($datefro)) . " to " . date('d F, Y',strtotime($dateto)) . ")";
 echo "</font></th></tr>";
 require_once 'applicationonefield.php';
}
else if ($cmbFilter1=="Applications by Field of Study")
{
 require_once 'conn2.php';
 echo "<tr><th colspan='23'><font color='#006600' style='font-size: 13pt'>";
 echo "Applications for Direct Appointments by State of Origin and Field of Study <br> (" . date('d F, Y',strtotime($datefro)) . " to " . date('d F, Y',strtotime($dateto)) . ")";
 echo "</font></th></tr>";
 require_once 'applicationfield.php';
}
else if ($cmbFilter1=="Appointments by State/LGA")
{
 require_once 'conn.php';
 echo "<tr><th colspan='28'><font color='#006600' style='font-size: 13pt'>";
 echo "Appointments by State of Origin, Local Government Area and Salary Grade Level <br> (" . date('d F, Y',strtotime($datefro)) . " to " . date('d F, Y',strtotime($dateto)) . ")";
 echo "</font></th></tr>";
 require_once 'appointstatelga.php';
}
else if ($cmbFilter1=="Permanent Appointments")
{
 require_once 'conn.php';
 echo "<tr><th colspan='13'><font color='#006600' style='font-size: 13pt'>";
 echo "Permanent and Pensionable Appointments <br> (" . date('d F, Y',strtotime($datefro)) . " to " . date('d F, Y',strtotime($dateto)) . ")";
 echo "</font></th></tr>";
 require_once 'appointpermanent.php';
}
else if ($cmbFilter1=="Promotions")
{
 require_once 'conn.php';
 echo "<tr><th colspan='19'><font color='#006600' style='font-size: 13pt'>";
 echo "Promotions in the Federal Civil Service by Salary Grade Level (GL 07-14) <br> (" . date('d F, Y',strtotime($datefro)) . " to " . date('d F, Y',strtotime($dateto)) . ")";
 echo "</font></th></tr>";
 require_once 'promostat.php';
}
else if ($cmbFilter1=="Transfers Within")
{
 require_once 'conn.php';
 echo "<tr><th colspan='10'><font color='#006600' style='font-size: 13pt'>";
 echo "Transfers Within the Federal Civil Service by Ministry and State of Origin <br> (" . date('d F, Y',strtotime($datefro)) . " to " . date('d F, Y',strtotime($dateto)) . ")";
 echo "</font></th></tr>";
 require_once 'transferwt.php';
}
else if ($cmbFilter1=="Transfers Outside")
{
 require_once 'conn.php';
 echo "<tr><th colspan='10'><font color='#006600' style='font-size: 13pt'>";
 echo "Transfers Outside the Federal Civil Service <br> (" . date('d F, Y',strtotime($datefro)) . " to " . date('d F, Y',strtotime($dateto)) . ")";
 echo "</font></th></tr>";
 require_once 'transferot.php';
}
 ?>
</TABLE>

<?php
 require_once 'footr.php';
 require_once 'footer.php';
?>
</TABLE>
</form>

			</td>
		</tr>
	</table>
</div>


