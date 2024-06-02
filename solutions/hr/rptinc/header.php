<html>
<head>
	<title>Payroll Details</title>
<?php if (@$sExport == "" || @$sExport == "html") { ?>
<link href="rptcss/project1.css" rel="stylesheet" type="text/css">
<?php } ?>
<meta name="generator" content="PHP Report Maker v1.0.0.0" />
</head>
<body>
<?php if (@$sExport == "") { ?>
<table align="center" width="990" border="0" cellspacing="0" cellpadding="0">
<!-- content -->
<tr>
	<td width="100%" valign="top">
	<!-- navigation -->
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr><td class="ewPadding">
<?php include "menu.php"; ?>
		</td></tr>
	</table>


<?php } 
$ql="SELECT * FROM `pay`";
$resultq = mysql_query($ql,$conn) or die('Could not look up user data; ' . mysql_error());
$rowq = mysql_fetch_array($resultq);
$month=$rowq['Month'];
?>
