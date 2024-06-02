<?php
require_once 'conn.php';
require_once 'header.php'; 
require_once 'style.php';

//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & $_SESSION['access_lvl'] != 5) 
{
 if ($_SESSION['access_lvl'] != 1) 
 {
   $redirect = $_SERVER['PHP_SELF'];
   header("Refresh: 0; URL=../index.php?redirect=$redirect");
 }
}
?>

<title>Payroll | Cooperative Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Payroll Reports</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="payroll.php">
										<i class="fa fa-list"></i>
									</a>
								</li>
								<li><span>Payroll</span></li>
							</ol>
					
							&nbsp;
						</div>
					</header>
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="../assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="../assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />


<section class="panel">
	<header class="panel-heading">
		<h2 class="panel-title">Payroll Reports</h2>
	</header>
       <div class="panel-body">

<div class="services">
	<div class="container"  style="width:100%">

<div class="fieldset" style="padding: 2" align="right">
<legend><b><i><font size="2" face="Tahoma" color="#000000"> <?php require_once 'payheader.php'; ?>
</font></i></b></legend>

<div align="center">
<form  action="payreports.php" method="GET">
&nbsp;Select a Report:&nbsp;
 <select size="1" name="cmbReport" style="width:200px;height:35px">
  <option selected>- Select Report-</option>
  <option>Payslip</option>
  <option hidden>Payroll Details</option>
  <option>Payroll Summary</option>
  <option>Monthly Summary</option>
  <option hidden>Pension Contribution Report</option>
  <option>Tax Report</option>
  <option>Deductions Report</option>
  <option>Deductions Summary</option>
  <option>Bank Reports</option>
  <option>Bank Summary</option>
 </select>
   &nbsp;
   <input type="submit" value="Open" name="submit" style="width:200px;height:35px">
</form>
</div>
 <br>
<div align='center'>
<?php
 @$cmbReport = $_REQUEST["cmbReport"];
 @$cmbTable=$_REQUEST['cmbTable']; 
 @$filter=$_REQUEST['filter']; 
 @$cmbFilter=$_REQUEST['cmbFilter']; 

if (trim($cmbReport) == "- Select Report-" or trim($cmbTable) == "- Select Criteria -")
{
  echo "<b>Please Select a Report and a Criteria from the drop-down box and click 'Open'.<b>";        
}
else if (trim($cmbReport)=="Payslip")
{  
 require_once 'payslip.php';
}
else if ($cmbReport == "Payroll Summary")
{
 require_once 'summary.php';
}
else if ($cmbReport == "Payroll Details")
{
?>
   <div align="center">
	<table border="0" width="100%" id="table1" bgcolor="#FFFFFF">
		<tr>
			<td>
			<div align="center">
				<table border="0" width="100%" id="table2">
					<tr>
						<td>
<?php
require_once 'summarydetctb.php';
 #echo "<a target='blank' href='summarydetctb.php'>Click here to View Payroll Summary report</a>";
?>

<?php
}
else if (trim($cmbReport)=="Monthly Summary")
{  
require_once 'monthlysummary.php';
}
else if (trim($cmbReport)=="Pension Contribution Report")
{  
require_once 'contrirpt.php';
}
else if (trim($cmbReport)=="Tax Report")
{  
require_once 'taxrpt.php';
}
else if (trim($cmbReport)=="Deductions Report")
{  
require_once 'deductionrpt.php';
}
else if (trim($cmbReport)=="Deductions Summary")
{  
require_once 'deductionsumm.php';
}
else if (trim($cmbReport)=="Bank Reports")
{  
require_once 'bankreport.php';
}
else if (trim($cmbReport)=="Bank Summary")
{  
require_once 'banksummary.php';
}
?>
</td></tr>
</table>
</td></tr>
</table>
</td>
<?php
if (!isset($_SESSION['user_id']))
{

} else {

} 
?>
		</div>
	</div>
</div>
<?php
require_once 'footerr.php';
?>
</div>

		<!-- Specific Page Vendor -->
		<script src="../assets/vendor/select2/select2.js"></script>
		<script src="../assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="../assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="../assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
   
		<!-- Examples -->
		<script src="../assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.tabletools.js"></script>