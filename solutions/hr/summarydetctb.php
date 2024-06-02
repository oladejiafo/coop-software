<?php include "rptinc/ewcommon.php"; ?>
<?php include "rptinc/menu.php"; ?>
<?php include "rptinc/ewconfig.php"; ?>
<?php include "rptinc/phprptfn.php"; ?>
<?php include "rptinc/advsecu.php"; ?>
<?php require_once 'conn.php'; ?>

<?php
 $filter=$_REQUEST["filter"];

 $sql_st = "SELECT * FROM `bank` where `Name`='" . $filter . "'";
 $result_st = mysql_query($sql_st,$conn) or die('Could not list value; ' . mysql_error());
 $rowst = mysql_fetch_array($result_st);
 $sortcode=$rowst['BankCode'];

// PHP Report Maker 1.0 - Table level configuration (summarydet)
// Table Level Constants

define("EW_TABLE_VAR", "summarydet", TRUE);
define("EW_TABLE_GROUP_PER_PAGE", "grpperpage", TRUE);
define("EW_TABLE_SESSION_GROUP_PER_PAGE", "summarydet_grpperpage", TRUE);
define("EW_TABLE_START_GROUP", "start", TRUE);
define("EW_TABLE_SESSION_START_GROUP", "summarydet_start", TRUE);
define("EW_TABLE_SESSION_SEARCH", "summarydet_search", TRUE);
define("EW_TABLE_CHILD_USER_ID", "childuserid", TRUE);
define("EW_TABLE_SESSION_CHILD_USER_ID", "summarydet_childuserid", TRUE);

// Table Level SQL
define("EW_TABLE_REPORT_SUMMARY_TYPE", "SUM", TRUE);
define("EW_TABLE_REPORT_COLUMN_CAPTIONS", "", TRUE);
define("EW_TABLE_REPORT_COLUMN_NAMES", "", TRUE);
define("EW_TABLE_SQL_TRANSFORM", "", TRUE);
define("EW_TABLE_SQL_FROM", "pay INNER JOIN payr ON (pay.`Staff Number` = payr.`Staff Number`)", TRUE);
$EW_TABLE_SQL_SELECT = "SELECT pay.`Staff Number`, pay.`Staff Name`, pay.`Grade Level` <DistinctColumnFields> FROM " . EW_TABLE_SQL_FROM;
$EW_TABLE_SQL_WHERE = "(pay.Bank) like '$filter%' and `pay`.`Grade Level` not in ('18/05')";
define("EW_TABLE_SQL_GROUPBY", "pay.`Staff Number`, pay.`Staff Name`, pay.`Grade Level`", TRUE);
define("EW_TABLE_SQL_HAVING", "", TRUE);
define("EW_TABLE_SQL_ORDERBY", "pay.`Grade Level` DESC, pay.`Staff Name` ASC, pay.`Staff Number` ASC", TRUE);
define("EW_TABLE_SQL_PIVOT", "", TRUE);
$EW_TABLE_DISTINCT_SQL_SELECT = "SELECT DISTINCT payr.Description FROM pay INNER JOIN payr ON (pay.`Staff Number` = payr.`Staff Number`)";
$EW_TABLE_DISTINCT_SQL_WHERE = "(pay.Bank) like '%' and `pay`.`Grade Level` not in ('18/05')";
$EW_TABLE_DISTINCT_SQL_ORDERBY = "payr.Typ, payr.SortOrder,payr.Description";
define("EW_TABLE_SQL_USERID_FILTER", "", TRUE);
$af_Staff_Number = NULL; // Advanced filter for Staff Number
$af_Staff_Name = NULL; // Advanced filter for Staff Name
$af_Grade_Level = NULL; // Advanced filter for Grade Level
$af_Description = NULL; // Advanced filter for Description
$af_Amount = NULL; // Advanced filter for Amount
$af_Month = NULL; // Advanced filter for Month
$af_Bank = NULL; // Advanced filter for Bank
$af_Location = NULL; // Advanced filter for Location
$af_SortOrder = NULL; // Advanced filter for SortOrder
$af_Typ = NULL; // Advanced filter for Typ
?>
<?php
$sExport = @$PHP_GET["export"]; // Load export request
if ($sExport == "html") {

	// Printer friendly
}
if ($sExport == "excel") {
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment; filename=' . EW_TABLE_VAR .'.xls');
}
if ($sExport == "word") {
	header('Content-Type: application/vnd.ms-word');
	header('Content-Disposition: attachment; filename=' . EW_TABLE_VAR .'.doc');
}
?>
<?php

// Initialize common variables
// Paging variables

$nRecCount = 0; // Record Count
$nStartGrp = 0; // Start Group
$nStopGrp = 0; // Stop Group
$nTotalGrps = 0; // Total Groups
$nGrpCount = 0; // Group Count
$nDisplayGrps = 45; // Groups per page
$nGrpRange = 10;

// Static group variables
$x_Staff_Number = NULL;
$ox_Staff_Number = NULL;
$tx_Staff_Number = NULL;
$gx_Staff_Number = NULL;
$ftx_Staff_Number = 200;
$rf_Staff_Number = NULL;
$rt_Staff_Number = NULL;
$x_Staff_Name = NULL;
$ox_Staff_Name = NULL;
$tx_Staff_Name = NULL;
$gx_Staff_Name = NULL;
$ftx_Staff_Name = 200;
$rf_Staff_Name = NULL;
$rt_Staff_Name = NULL;
$x_Grade_Level = NULL;
$ox_Grade_Level = NULL;
$tx_Grade_Level = NULL;
$gx_Grade_Level = NULL;
$ftx_Grade_Level = 200;
$rf_Grade_Level = NULL;
$rt_Grade_Level = NULL;

// Column variables
$ftx_Description = 200;
$rf_Description = NULL;
$rt_Description = NULL;
?>
<?php

// Open connection to the database
$conn = php_connect(HOST, USER, PASS, DB, PORT);

// Filter
$sFilter = "";
$bFilterApplied = FALSE;

// Reset
ResetCmd();

// Set up groups per page dynamically
SetUpDisplayGrps();

// Popup selected values
// Setup selection

SetupSelection();

// Load columns to array
GetColumns();

// Default Filter, Sort
$defaultFilter = ""; // Default filter string
$defaultSort = ""; // default sort string
if ($defaultFilter <> "") {
	if ($sFilter <> "") $sFilter .= " AND ";
	$sFilter .= $defaultFilter;
}

// Build sql
$sSql = ew_BuildReportSql(EW_TABLE_SQL_TRANSFORM, $EW_TABLE_SQL_SELECT, $EW_TABLE_SQL_WHERE, EW_TABLE_SQL_GROUPBY, "", EW_TABLE_SQL_ORDERBY, EW_TABLE_SQL_PIVOT, $sFilter, @$sSort);

// Load recordset
$rs = ew_LoadRs($sSql);
$rscnt = count($rs);
$row = FALSE;
$rsidx = 0;

// Set up total group count and distinct values
InitReportData($rs);
if ($nDisplayGrps <= 0) { // Display All Records
	$nDisplayGrps = $nTotalGrps;
}
$nStartGrp = 1;
SetUpStartGroup(); // Set Up Start Group Position
?>
<?php include "rptinc/header.php"; ?>
<?php if (@$sExport == "") { ?>
<script language="JavaScript" src="rptjs/x/x_core.js" type="text/javascript"></script>
<script language="JavaScript" src="rptjs/x/x_event.js" type="text/javascript"></script>
<script language="JavaScript" src="rptjs/x/x_drag.js" type="text/javascript"></script>
<script language="JavaScript" src="rptjs/popup.js" type="text/javascript"></script>
<script language="JavaScript" src="rptjs/ewrptpop.js" type="text/javascript"></script>
<script language="JavaScript" src="rptjs/swfobject.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
<!--
var EW_POPUP_ALL = "(All)";
var EW_POPUP_OK = "  OK  ";
var EW_POPUP_CANCEL = "Cancel";
var EW_POPUP_FROM = "From";
var EW_POPUP_TO = "To";
var EW_POPUP_PLEASE_SELECT = "Please Select";
var EW_POPUP_NO_VALUE = "No value selected!";
var EW_POPUP_CLASSNAME = "phpreportmaker";

// popup fields
//-->

</script>
<!-- Table container (begin) -->
<table id="ewContainer" cellspacing="0" cellpadding="0" border="0">
<!-- Top container (begin) -->
<tr><td colspan="3" class="ewPadding"><div id="ewTop" class="phpreportmaker">
<!-- top slot -->
<a name="top"></a>
<?php } ?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr><td align="left">
			<p class="phpreportmaker"><h3><b><u>YOUR REPORT</u></b></h3>
<h5><b><u>Payroll Summary</u></b></h5>
</p>
		</td></tr>
	</table>
<?php if (@$sExport == "") { 

echo '<a href="summarydetctb.php?export=html&filter=' . $filter . '">Printer Friendly</a>
&nbsp;&nbsp;<a href="summarydetctb.php?export=excel&filter=' . $filter . '">Export to Excel</a>
&nbsp;&nbsp;<a href="summarydetctb.php?export=word&filter=' . $filter . '">Export to Word</a>';
?>
   <form  action="summarydetctb.php" method="post">
    <body>
      <font style='font-size: 7pt'>Select Bank Name: 
        <select  name="filter">  
          <?php  
           echo '<option selected></option>';
           $sql = "SELECT * FROM `bank`";
           $result_lt = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rows = mysql_fetch_array($result_lt)) 
           {
             echo '<option>' . $rows['Name'] . '</option>';
           }
          ?> 
         </select>
      </font>
      &nbsp;
      <input type="submit" value="Go" name="submit">
     <br>
    </body>
   </form>

<?php } ?>
<br><br>
<?php if (@$sExport == "") { ?>
</div></td></tr>
<!-- Top container (end) -->
<tr>
	<!-- Left container (begin) -->
	<td valign="top"><div id="ewLeft" class="phpreportmaker">
	<!-- left slot -->
	</div></td>
	<!-- Left container (end) -->
	<!-- Center container (report) (begin) -->
	<td valign="top" class="ewPadding"><div id="ewCenter" class="phpreportmaker">
	<!-- center slot -->
<?php } ?>

<!-- crosstab report starts -->
<div id="report_crosstab">
<?php if (@$sExport == "") { 

?>
<form action="summarydetctb.php" name="ewpagerform" id="ewpagerform">
<table border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td nowrap>
<?php
if ($nTotalGrps > 0) {
	$rsEof = ($nTotalGrps < ($nStartGrp + $nDisplayGrps));
	$PrevStart = $nStartGrp - $nDisplayGrps;
	if ($PrevStart < 1) { $PrevStart = 1; }
	$NextStart = $nStartGrp + $nDisplayGrps;
	if ($NextStart > $nTotalGrps) { $NextStart = $nStartGrp ; }
	$LastStart = intval(($nTotalGrps-1)/$nDisplayGrps)*$nDisplayGrps+1;
	?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="phpreportmaker">Page&nbsp;</span></td>
<!--first page button-->
	<?php if ($nStartGrp == 1) { ?>
	<td><img src="rptimages/firstdisab.gif" alt="First" width="16" height="16" border="0"></td>
	<?php } else { ?>
	<td><a href="summarydetctb.php?start=1"><img src="rptimages/first.gif" alt="First" width="16" height="16" border="0"></a></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($PrevStart == $nStartGrp) { ?>
	<td><img src="rptimages/prevdisab.gif" alt="Previous" width="16" height="16" border="0"></td>
	<?php } else { ?>
	<td><a href="summarydetctb.php?start=<?php echo $PrevStart; ?>"><img src="rptimages/prev.gif" alt="Previous" width="16" height="16" border="0"></a></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="pageno" value="<?php echo intval(($nStartGrp-1)/$nDisplayGrps+1); ?>" size="4"></td>
<!--next page button-->
	<?php if ($NextStart == $nStartGrp) { ?>
	<td><img src="rptimages/nextdisab.gif" alt="Next" width="16" height="16" border="0"></td>
	<?php } else { ?>
	<td><a href="summarydetctb.php?start=<?php echo $NextStart; ?>"><img src="rptimages/next.gif" alt="Next" width="16" height="16" border="0"></a></td>
	<?php  } ?>
<!--last page button-->
	<?php if ($LastStart == $nStartGrp) { ?>
	<td><img src="rptimages/lastdisab.gif" alt="Last" width="16" height="16" border="0"></td>
	<?php } else { ?>
	<td><a href="summarydetctb.php?start=<?php echo $LastStart; ?>"><img src="rptimages/last.gif" alt="Last" width="16" height="16" border="0"></a></td>
	<?php } ?>
	<td><span class="phpreportmaker">&nbsp;of <?php echo intval(($nTotalGrps-1)/$nDisplayGrps+1);?></span></td>
	</tr></table>
	<?php if ($nStartGrp > $nTotalGrps) { $nStartGrp = $nTotalGrps; }
	$nStopGrp = $nStartGrp + $nDisplayGrps - 1;
	$nGrpCount = $nTotalGrps - 1;
	if ($rsEof) { $nGrpCount = $nTotalGrps; }
	if ($nStopGrp > $nGrpCount) { $nStopGrp = $nGrpCount; } ?>
	<span class="phpreportmaker"> <?php echo $nStartGrp; ?> to <?php echo $nStopGrp; ?> of <?php echo $nTotalGrps; ?></span>
<?php } else { ?>
	<span class="phpreportmaker"></span>	
<?php } ?>
		</td>
<?php if ($nTotalGrps > 0) { ?>
		<td nowrap>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td align="right" valign="top" nowrap><span class="phpreportmaker">Records Per Page&nbsp;
<select name="<?php echo EW_TABLE_GROUP_PER_PAGE; ?>" onChange="this.form.submit();" class="phpreportmaker">
<option value="5"<?php if ($nDisplayGrps == 5) echo " selected" ?>>5</option>
<option value="8"<?php if ($nDisplayGrps == 8) echo " selected" ?>>8</option>
<option value="10"<?php if ($nDisplayGrps == 10) echo " selected" ?>>10</option>
<option value="13"<?php if ($nDisplayGrps == 13) echo " selected" ?>>13</option>
<option value="15"<?php if ($nDisplayGrps == 15) echo " selected" ?>>15</option>
<option value="18"<?php if ($nDisplayGrps == 18) echo " selected" ?>>18</option>
<option value="20"<?php if ($nDisplayGrps == 20) echo " selected" ?>>20</option>
<option value="35"<?php if ($nDisplayGrps == 35) echo " selected" ?>>35</option>
<option value="50"<?php if ($nDisplayGrps == 50) echo " selected" ?>>50</option>
<option value="ALL"<?php if (@$PHP_SESSION[EW_TABLE_SESSION_GROUP_PER_PAGE] == -1) echo " selected" ?>>All Records</option>
</select>
		</span></td>
<?php } ?>
	</tr>
</table>
</form>
<?php } 
if (empty($filter))
{ $filter="All Banks"; }

echo "Bank: <b>" . $filter . "</b> &nbsp;&nbsp; Bank Code: <b>" . $sortcode . "</b>";
?>
<!-- Report grid (begin) -->
<table id="ewReport" class="ewTable">
	<!-- Table header -->
	<tr class="ewTableRow">
		<td colspan="3" nowrap><div class="phpreportmaker"><?php echo "Month: <b>" . $month . "</b> &nbsp;"; ?></div></td>
		<td class="ewRptColHeader" colspan="<?php echo @$ncolspan-1; ?>" nowrap>
			Description
		</td>
	</tr>
	<tr>
		<td class="ewRptGrpHeader1">
			Staff Number
		</td>
		<td class="ewRptGrpHeader2">
			Staff Name
		</td>
		<td class="ewRptGrpHeader3">
			Grade Level
		</td>
<!-- Dynamic columns begin -->
	<?php
	for ($iy = 1; $iy < count($val); $iy++) {
		if ($col[$iy][2]) {
			$x_Description = $col[$iy][1];
	?>
		<td class="ewTableHeader" valign="top">
<?php 
if ($x_Description=='Basic')
{ $x_Description='Salary'; }
echo $x_Description ?>
</td>
	<?php
		}
	}
	?>
<!-- Dynamic columns end -->
		<?php $x_Description = "Net Pay"; ?>
		<td class="ewTableHeader" valign="top">
<?php #echo $x_Description ?>
</td>
	</tr>
<?php
if ($nTotalGrps > 0) {

// Start group <= total number of groups
if (intval($nStartGrp) > intval($nTotalGrps)) {
	$nStartGrp = $nTotalGrps;
}

// Set the last group to display
$nStopGrp = $nStartGrp + $nDisplayGrps - 1;

// Stop group <= total number of groups
if (intval($nStopGrp) > intval($nTotalGrps)) {
	$nStopGrp = $nTotalGrps;
}

// navigate
$grpvalue = "";
$nRecCount = 0;

// Get first row
if ($rscnt > 0) {
	GetRow(1);
	$nGrpCount = 1;
}
while ($row) {

	// Process groups
	if (intval($nGrpCount) >= intval($nStartGrp) && $nGrpCount <= $nStopGrp) {
		$nRecCount++;

		// Set row color
		$sItemRowClass = " class=\"ewTableRow\"";

		// Display alternate color for rows
		if ($nRecCount % 2 <> 1) {
			$sItemRowClass = " class=\"ewTableAltRow\"";
		}

		// Show group values
		$gx_Staff_Number = $x_Staff_Number;
		if ($x_Staff_Number <> "" && $ox_Staff_Number == $x_Staff_Number && !ChkLvlBreak(1)) {
			$gx_Staff_Number = "";
		} elseif ($x_Staff_Number == NULL) {
			$gx_Staff_Number = EW_NULL_LABEL;
		} elseif ($x_Staff_Number == "") {
			$gx_Staff_Number = EW_EMPTY_LABEL;
		}
		$gx_Staff_Name = $x_Staff_Name;
		if ($x_Staff_Name <> "" && $ox_Staff_Name == $x_Staff_Name && !ChkLvlBreak(2)) {
			$gx_Staff_Name = "";
		} elseif ($x_Staff_Name == NULL) {
			$gx_Staff_Name = EW_NULL_LABEL;
		} elseif ($x_Staff_Name == "") {
			$gx_Staff_Name = EW_EMPTY_LABEL;
		}
		$gx_Grade_Level = $x_Grade_Level;
		if ($x_Grade_Level <> "" && $ox_Grade_Level == $x_Grade_Level && !ChkLvlBreak(3)) {
			$gx_Grade_Level = "";
		} elseif ($x_Grade_Level == NULL) {
			$gx_Grade_Level = EW_NULL_LABEL;
		} elseif ($x_Grade_Level == "") {
			$gx_Grade_Level = EW_EMPTY_LABEL;
		}
?>
	<!-- Data -->
	<tr<?php echo $sItemRowClass; ?>>
		<!-- Staff Number -->
		<td class="ewRptGrpField1"><?php $tx_Staff_Number = $x_Staff_Number; $x_Staff_Number = $gx_Staff_Number; ?>
<?php echo $x_Staff_Number ?>
<?php $x_Staff_Number = $tx_Staff_Number; ?></td>
		<!-- Staff Name -->
		<td class="ewRptGrpField2"><?php $tx_Staff_Name = $x_Staff_Name; $x_Staff_Name = $gx_Staff_Name; ?>
<?php echo $x_Staff_Name ?>
<?php $x_Staff_Name = $tx_Staff_Name; ?></td>
		<!-- Grade Level -->
		<td class="ewRptGrpField3"><?php $tx_Grade_Level = $x_Grade_Level; $x_Grade_Level = $gx_Grade_Level; ?>
<?php echo $x_Grade_Level ?>
<?php $x_Grade_Level = $tx_Grade_Level; ?></td>
<!-- Dynamic columns begin -->
	<?php
	$rowsmry = 0;
	for ($iy = 1; $iy < count($val); $iy++) {
		if ($col[$iy][2]) {
			$rowval = $val[$iy];
			$rowsmry = ew_SummaryValue($rowsmry, $rowval, EW_TABLE_REPORT_SUMMARY_TYPE);
			$x_Amount = $val[$iy];

	?>
		<!-- <?php echo $col[$iy][1]; ?> -->
		<td>
<?php 
if ($x_Amount<0)
 {
  $x_Amount=$x_Amount* (-1);
 }
echo number_format($x_Amount,2) 
?>
</td>
	<?php
		}
	}
	?>
<!-- Dynamic columns end -->
	<?php $x_Amount = $rowsmry; ?>
		<td>
<?php 
if ($x_Amount<0)
 {
  $x_Amount=$x_Amount* (-1);
 }
#echo number_format($x_Amount,2) 
?>
</td>
	</tr>
<?php

		// Accumulate page summary
		AccumulateSummary();
	}

	// Accumulate grand summary
	AccumulateGrandSummary();

	// Save old group values
	$ox_Staff_Number = $x_Staff_Number;
	$ox_Staff_Name = $x_Staff_Name;
	$ox_Grade_Level = $x_Grade_Level;

	// Get next record
	GetRow(2);
	if (intval($nGrpCount) >= intval($nStartGrp) && $nGrpCount <= $nStopGrp) {
?>
<?php
	}

	// Increment group count
	if (ChkLvlBreak(1)) $nGrpCount++;
}
?>
	<!-- Page Summary -->
	<tr class="ewRptPageSummary">
	<td colspan="3">Page Total</td>
<!-- Dynamic columns begin -->
	<?php
	$rowsmry = 0;
	for ($iy = 1; $iy <= $ncol; $iy++) {
		if ($col[$iy][2]) {
			$rowval = $smry[$iy][0];
			$rowsmry = ew_SummaryValue($rowsmry, $rowval, EW_TABLE_REPORT_SUMMARY_TYPE);
			$x_Amount = $smry[$iy][0];
	?>
		<!-- <?php echo $col[$iy][1]; ?> -->
		<td>
<?php 
if ($x_Amount<0)
 {
  $x_Amount=$x_Amount* (-1);
 }
echo number_format($x_Amount,2) 
?>
</td>
	<?php
		}
	}
	?>
<!-- Dynamic columns end -->
	<?php $x_Amount = $rowsmry; ?>
		<td>
<?php 
if ($x_Amount<0)
 {
  $x_Amount=$x_Amount* (-1);
 }
#echo number_format($x_Amount,2) 
?>
</td>
	</tr>
	<!-- Grand Total -->
	<tr class="ewRptGrandSummary">
	<td colspan="3">Grand Total</td>
<!-- Dynamic columns begin -->
	<?php 
	$rowsmry = 0;
	for ($iy = 1; $iy <= $ncol; $iy++) {
		if ($col[$iy][2]) {
			$rowval = $grandsmry[$iy];
			$rowsmry = ew_SummaryValue($rowsmry, $rowval, EW_TABLE_REPORT_SUMMARY_TYPE);
			$x_Amount = $grandsmry[$iy];
	?>
		<!-- <?php echo $col[$iy][1]; ?> -->
		<td>
<?php 
if ($x_Amount<0)
 {
  $x_Amount=$x_Amount* (-1);
 }
echo number_format($x_Amount,2) 
?>
</td>
	<?php
		}
	}
	?>
<!-- Dynamic columns end -->
	<?php $x_Amount = $rowsmry; ?>
		<td>
<?php #echo number_format($x_Amount,2); ?>
</td>
	</tr>
<?php } ?>
</table>
<br>
<TABLE width='105%' border='0' cellpadding='0' cellspacing='0' align='left'">
<tr>
						<td width=25%></td>
						<td width=25%></td>
						<td width=25%>Prepared By__________________</td>
						<td width=25%> &nbsp;</td>
					</tr>
<tr>
						<td width=25%>&nbsp;</td>
						<td width=25%>&nbsp;</td>
						<td width=25%>&nbsp;</td>
						<td width=25%> &nbsp;</td>
					</tr>
<tr>
						<td width=25%>Signature: _______________________</td>
						<td width=25%>Signature: _______________________</td>
						<td width=25%>Signature: _______________________</td>
						<td width=25%> &nbsp;</td>
					</tr>
<tr>
						<td width=25%><i>Head of Computer unit</i></td>
						<td width=25%><i>Head of Salary Section</i></td>
						<td width=25%><i>Audited By</i></td>
						<td width=25%> &nbsp;</td>
					</tr>
</table>
<br>
</div>
<!-- Crosstab report ends -->
<?php if (@$sExport == "") { ?>
	</div><br></td>
	<!-- Center container (report) (end) -->
	<!-- Right container (begin) -->
	<td valign="top"><div id="ewRight" class="phpreportmaker">
	<!-- right slot -->
	</div></td>
	<!-- Right container (end) -->
</tr>
<!-- Bottom container (begin) -->
<tr><td colspan="3"><div id="ewBottom" class="phpreportmaker">
	<!-- bottom slot -->
	</div><br></td>
</tr>
<!-- Bottom container (end) -->
</table>

<!-- Table container (end) -->
<?php } ?>
<?php

// Close recordset and connection
php_free_result($rs);
php_close($conn);
?>
<?php include "rptinc/footer.php"; ?>
<?php

// Get column values
function GetColumns() {
	global $EW_TABLE_SQL_SELECT, $EW_TABLE_DISTINCT_SQL_SELECT;
	global $EW_TABLE_DISTINCT_SQL_WHERE, $EW_TABLE_DISTINCT_SQL_ORDERBY;
	global $sFilter, $sSort;
	global $sel_Description;	
	global $row, $ncol, $col, $val, $oval, $cnt, $smry, $grandsmry;
	global $ncolspan;

	// Build sql
	$sSql = ew_BuildReportSql("", $EW_TABLE_DISTINCT_SQL_SELECT, $EW_TABLE_DISTINCT_SQL_WHERE, "", "", $EW_TABLE_DISTINCT_SQL_ORDERBY, "", $sFilter, $sSort);

	// Load recordset
	$rscol = ew_LoadRs($sSql);

	// Get distinct column count
	$ncol = count($rscol);
	if ($ncol == 0) {
		php_free_result($rscol);
		echo "No distinct column values for sql: " . $sSql . "<br>";
		exit();
	}

	// 1st dimension = no of groups (level 0 used for grand total)
	// 2nd dimension = no of distinct values

	$nGrps = 3;
	$col = ew_Init2DArray($ncol+1, 2, NULL);
	$val = ew_InitArray($ncol+1, NULL);
	$oval = ew_InitArray($ncol+1, NULL);
	$cnt = ew_Init2DArray($ncol+1, $nGrps+1, NULL);
	$smry = ew_Init2DArray($ncol+1, $nGrps+1, NULL);
	$grandsmry = ew_InitArray($ncol+1, NULL);

	// Reset summary values
	ResetLevelSummary(0);
	$colcnt = 0;
	foreach ($rscol as $row) {
		if ($row[0] == NULL) {
			$wrkValue = "##null";
			$wrkCaption = EW_NULL_LABEL;
		} elseif ($row[0] == "") {
			$wrkValue = "##empty";
			$wrkCaption = EW_EMPTY_LABEL;
		} else {
			$wrkValue = $row[0];
			$wrkCaption = $row[0];
		}
		$colcnt++;
		$col[$colcnt][0] = $wrkValue; // value
		$col[$colcnt][1] = $wrkCaption; // caption
		$col[$colcnt][2] = TRUE; // column visible
	}
	php_free_result($rscol);

	// Rebuild SQL
	$sSqlFlds = "";
	for ($colcnt = 1; $colcnt <= $ncol; $colcnt++) {
		$sFld = ew_CrossTabField("SUM", "payr.Amount", "payr.Description", "", $col[$colcnt][0], "'", $colcnt);
		$sSqlFlds .= ", " . $sFld;
	}
	$EW_TABLE_SQL_SELECT = str_replace("<DistinctColumnFields>", $sSqlFlds, $EW_TABLE_SQL_SELECT);

	// Get active columns
	if (!is_array($sel_Description)) {
		$ncolspan = $ncol;
	} else {
		$ncolspan = 0;
		for ($i = 0; $i < count($col); $i++) {
			$bSelected = FALSE;
			for ($j = 0; $j < count($sel_Description); $j++) {
				if (trim($sel_Description[$j]) == trim($col[$i][0])) {
					$ncolspan++;
					$bSelected = TRUE;
					break;
				}
			}
			$col[$i][2] = $bSelected;
			if (!$bSelected) $bFilterApplied = TRUE;
		}
	}
	$ncolspan++; // Add summary column
}

// Get row values
function GetRow($opt) {
	global $rs, $rsidx, $row, $val, $ncol, $rscnt;
	if ($rscnt == 0) return;
	if ($opt == 1) { // Get first row
		$row = $rs[0];
	} else { // Get next row
		$rsidx++;
		$row = ($rsidx < $rscnt) ? $rs[$rsidx] : FALSE;
	}
	while ($row) {
		if (ValidRow($row)) {
			$GLOBALS["x_Staff_Number"] = $row["Staff Number"];
			$GLOBALS["x_Staff_Name"] = $row["Staff Name"];
			$GLOBALS["x_Grade_Level"] = $row["Grade Level"];
			for ($ix = 1; $ix <= $ncol; $ix++) {
				$val[$ix] = $row[$ix+3-1];
			}
			break;
		} else {
			$rsidx++;
			$row = ($rsidx < $rscnt) ? $rs[$rsidx] : FALSE;
		}
	}
	if (!$row) {
		$GLOBALS["x_Staff_Number"] = "";
		$GLOBALS["x_Staff_Name"] = "";
		$GLOBALS["x_Grade_Level"] = "";
	}
}

// Check level break
function ChkLvlBreak($lvl) {
	switch ($lvl) {
		case 1:
			return ($GLOBALS["x_Staff_Number"] == NULL && $GLOBALS["ox_Staff_Number"] != NULL) ||
			($GLOBALS["x_Staff_Number"] != NULL && $GLOBALS["ox_Staff_Number"] == NULL) ||
			($GLOBALS["x_Staff_Number"] <> $GLOBALS["ox_Staff_Number"]);
		case 2:
			return ($GLOBALS["x_Staff_Name"] == NULL && $GLOBALS["ox_Staff_Name"] != NULL) ||
			($GLOBALS["x_Staff_Name"] != NULL && $GLOBALS["ox_Staff_Name"] == NULL) ||
			($GLOBALS["x_Staff_Name"] <> $GLOBALS["ox_Staff_Name"]) || ChkLvlBreak(1); // Recurse upper level
		case 3:
			return ($GLOBALS["x_Grade_Level"] == NULL && $GLOBALS["ox_Grade_Level"] != NULL) ||
			($GLOBALS["x_Grade_Level"] != NULL && $GLOBALS["ox_Grade_Level"] == NULL) ||
			($GLOBALS["x_Grade_Level"] <> $GLOBALS["ox_Grade_Level"]) || ChkLvlBreak(2); // Recurse upper level
	}
}

// Accummulate summary
function AccumulateSummary() {
	global $val, $cnt, $smry;
	for ($ix = 1; $ix < count($smry); $ix++) {
		for ($iy = 0; $iy < count($smry[$ix]); $iy++) {
			$valwrk = $val[$ix];
			$cnt[$ix][$iy]++;
			$smry[$ix][$iy] = ew_SummaryValue($smry[$ix][$iy], $valwrk, EW_TABLE_REPORT_SUMMARY_TYPE);
		}
	}
}

// Reset level summary
function ResetLevelSummary($lvl) {

	// Clear summary values
	global $nRecCount, $cnt, $smry, $grandsmry;
	for ($ix = 1; $ix < count($smry); $ix++) {
		for ($iy = $lvl; $iy < count($smry[$ix]); $iy++) {
			$cnt[$ix][$iy] = 0;
			$smry[$ix][$iy] = 0;
		}
	}

	// Clear grand summary
	if ($lvl == 0) {
		for ($iy = 1; $iy < count($grandsmry); $iy++)
			$grandsmry[$iy] = 0;
	}

	// Reset record count
	$nRecCount = 0;
}

// Accummulate grand summary
function AccumulateGrandSummary() {
	global $val, $grandsmry;
	for ($iy = 1; $iy < count($grandsmry); $iy++) {
		$valwrk = $val[$iy];
		$grandsmry[$iy] = ew_SummaryValue($grandsmry[$iy], $valwrk, EW_TABLE_REPORT_SUMMARY_TYPE);
	}
}

//-------------------------------------------------------------------------------
// Function SetUpStartGroup
// - Set up Starting Record parameters based on Pager Navigation
// - Variables setup: nStartGrp

function SetUpStartGroup() {
	global $PHP_GET, $PHP_SESSION;
	global $nStartGrp, $nTotalGrps, $nDisplayGrps;

	// Check for a START parameter
	if (@$PHP_GET[EW_TABLE_START_GROUP] != "") {
		$nStartGrp = $PHP_GET[EW_TABLE_START_GROUP];
		$PHP_SESSION[EW_TABLE_SESSION_START_GROUP] = $nStartGrp;
	} elseif (@$PHP_GET["pageno"] != "") {
		$nPageNo = $PHP_GET["pageno"];
		if (is_numeric($nPageNo)) {
			$nStartGrp = ($nPageNo-1)*$nDisplayGrps+1;
			if ($nStartGrp <= 0) {
				$nStartGrp = 1;
			} elseif ($nStartGrp >= intval(($nTotalGrps-1)/$nDisplayGrps)*$nDisplayGrps+1) {
				$nStartGrp = intval(($nTotalGrps-1)/$nDisplayGrps)*$nDisplayGrps+1;
			}
			$PHP_SESSION[EW_TABLE_SESSION_START_GROUP] = $nStartGrp;
		} else {
			$nStartGrp = @$PHP_SESSION[EW_TABLE_SESSION_START_GROUP];
			if (!is_numeric($nStartGrp) || $nStartGrp == "") {
				$nStartGrp = 1; // Reset start record counter
				$PHP_SESSION[EW_TABLE_SESSION_START_GROUP] = $nStartGrp;
			}
		}
	} else {
		$nStartGrp = @$PHP_SESSION[EW_TABLE_SESSION_START_GROUP];
		if (!is_numeric($nStartGrp) || $nStartGrp == "") {
			$nStartGrp = 1; // Reset start record counter
			$PHP_SESSION[EW_TABLE_SESSION_START_GROUP] = $nStartGrp;
		}
	}
}

//-------------------------------------------------------------------------------
// Function ResetCmd
// - RESET: reset search parameters

function ResetCmd() {
	global $PHP_GET, $PHP_POST, $PHP_SESSION;

	// Skip if post back
	if (count($PHP_POST) > 0) return;

	// Get Reset Cmd
	if (@$PHP_GET["cmd"] != "") {
		$sCmd = $PHP_GET["cmd"];
		if (strtolower($sCmd) == "reset") {
			ResetPager();
		}
	}
}
function ResetPager() {
	global $PHP_SESSION, $nStartGrp;

	// Reset Start Position (Reset Command)
	$nStartGrp = 1;
	$PHP_SESSION[EW_TABLE_SESSION_START_GROUP] = $nStartGrp;
}

// Set up selection
function SetupSelection() {
	global $PHP_POST, $PHP_SESSION, $PHP_GET;

	// Process post back form
	$sName = @$PHP_POST["popup"]; // Get popup form name
	$sName = (get_magic_quotes_gpc()) ? stripslashes($sName) : $sName;
	if ($sName <> "") {
		$arValues = @$PHP_POST["sel_" . $sName];
		if (is_array($arValues)) {
			if (get_magic_quotes_gpc()) array_walk($arValues, 'ew_StripSlashes');
			if (trim($arValues[0]) == "") { // select all
				@$PHP_POST["all_" . $sName] = TRUE;
				array_shift($arValues); // remove first entry
			} else {
				$PHP_SESSION["all_" . $sName] = FALSE;
			}
			$PHP_SESSION["sel_" . $sName] = $arValues;
			$PHP_SESSION["rf_" . $sName] = (get_magic_quotes_gpc()) ? stripslashes(@$PHP_POST["from_" . $sName]) : @$PHP_POST["from_" . $sName];
			$PHP_SESSION["rt_" . $sName] = (get_magic_quotes_gpc()) ? stripslashes(@$PHP_POST["to_" . $sName]) : @$PHP_POST["to_" . $sName];
			ResetPager();
		}
	}

	// Load selection criteria to array
}

// Initialize group data - total number of groups + grouping field arrays
function InitReportData(&$rs) {
	global $conn, $nTotalGrps, $bFilterApplied, $sFilter, $EW_TABLE_SQL_WHERE;

	// Initialize group count
	$grpcnt = 0;
	$grpvalue = "";
	foreach ($rs as $row) {
		$bValidRow = ValidRow($row);
		if (!$bValidRow) $bFilterApplied = TRUE;
		if ($bValidRow) {
			$bNewGroup = ($grpcnt == 0) ||
				($grpvalue == NULL && $row[0] != NULL) ||
				($grpvalue != NULL && $row[0] == NULL) ||
				($grpvalue <> $row[0]);
			if ($bNewGroup) {
				$grpvalue = $row[0];
				$grpcnt++;
			}
		}
	}

	// Set up total number of groups
	$nTotalGrps = $grpcnt;
}

// Check if row is valid
function ValidRow($row) {
	$ValidRow = TRUE;
	if ($ValidRow) $ValidRow = HasColumnValues($row); // Rows with values
	return $ValidRow;
}

// Check if any column values is present
function HasColumnValues($row) {
	global $col;
	for ($i = 1; $i < count($col); $i++) {
		if ($col[$i][2]) {
			if ($row[3+$i-1] <> 0) return TRUE;
		}
	}
	return FALSE;
}
?>
<?php

//-------------------------------------------------------------------------------
// Function SetUpDisplayGrps
// - Set up Number of Groups displayed per page based on Form element GrpPerPage
// - Variables setup: nDisplayGrps

function SetUpDisplayGrps() {
	global $PHP_GET;
	global $PHP_SESSION;
	global $nDisplayGrps;
	global $nStartGrp;
	$sWrk = @$PHP_GET[EW_TABLE_GROUP_PER_PAGE];
	if ($sWrk <> "") {
		if (is_numeric($sWrk)) {
			$nDisplayGrps = intval($sWrk);
		} else {
			if (strtoupper($sWrk) == "ALL") { // Display All Records
				$nDisplayGrps = -1;
			} else {
				$nDisplayGrps = 45; // Non-numeric, Load Default
			}
		}
		$PHP_SESSION[EW_TABLE_SESSION_GROUP_PER_PAGE] = $nDisplayGrps; // Save to Session

		// Reset Start Position (Reset Command)
		$nStartGrp = 1;
		$PHP_SESSION[EW_TABLE_SESSION_START_GROUP] = $nStartGrp;
	} else {
		if (@$PHP_SESSION[EW_TABLE_SESSION_GROUP_PER_PAGE] <> "") {
			$nDisplayGrps = $PHP_SESSION[EW_TABLE_SESSION_GROUP_PER_PAGE]; // Restore from Session
		} else {
			$nDisplayGrps = 45; // Load Default
		}
	}
}
?>
