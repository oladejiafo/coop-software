<?php
session_start();
if (!isset($_SESSION['user_id']))
{
  $redirect = $_SERVER['PHP_SELF'];
  header("Refresh: 0; URL=../indexx.php?redirect=$redirect");
}
require_once 'header.php';
?>

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>FINANCIAL SUMMARY</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="#">
										<i class="fa fa-list"></i>
									</a>
								</li>
								<li><span>Accounts</span></li>
							</ol>
					
							&nbsp;
						</div>
					</header>

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="../assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="../assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />


<section class="panel">
	<header class="panel-heading">
		<h2 class="panel-title"></h2>
	</header>
       <div class="panel-body">
		<!-- Begin Slider -->
		<div id="slider">
			<div class="slider-outer">
				<div class="slider-inner shell">
					
					<!-- Begin Slider Items -->
					<ul class="slider-items">
					  <li>
                                                 <link rel="stylesheet" href="css/refreshform.css" />
<table border="0" bordercolor='#003300' width="100%" cellspacing="1" bgcolor="#EFEFEF" id="table1">
		<tr>
			<td>
<fieldset style="padding: 0; height:330px;width:100%; border:none">
<?php
 $cmbFilter = @$_REQUEST["cmbFilter"];
 $filter = @$_REQUEST["filter"];
 $vocas = @$_REQUEST["vocas"];
 $id = @$_REQUEST["id"];
 $tval = @$_REQUEST["tval"];
 $cmbTable = @$_REQUEST["cmbTable"];
 $gender = $_REQUEST["gender"];
 $pall = $_REQUEST["pall"];

 $employer = $_REQUEST["employer"];
 $oaddress = $_REQUEST["oaddress"];
 $specialization = $_REQUEST["specialization"];
 $city = $_REQUEST["city"];
 $lga = $_REQUEST["lga"];
 $state = $_REQUEST["state"];
 $country = $_REQUEST["country"];
 $ostate = $_REQUEST["ostate"];

 $profession = $_REQUEST["profession"];
 $schooltype = $_REQUEST["schooltype"];
 $amount = $_REQUEST["amount"];
 $teller = $_REQUEST["teller"];
 $bank = $_REQUEST["bank"];

 $institute = $_REQUEST["institute"];
 $qualification = $_REQUEST["qualification"];
 $gyear = $_REQUEST["gyear"];
 $datepaid = $_REQUEST["datepaid"];

list($dayp, $monthp, $yearp) = explode('-', $datepaid);

 if($monthp=='01') { $monthp='Jan';}
 else if($monthp=='02') { $monthp='Feb';}
 else if($monthp=='03') { $monthp='Mar';}
 else if($monthp=='04') { $monthp='April';}
 else if($monthp=='05') { $monthp='May';}
 else if($monthp=='06') { $monthp='June';}
 else if($monthp=='07') { $monthp='July';}
 else if($monthp=='08') { $monthp='Aug';}
 else if($monthp=='09') { $monthp='Sept';}
 else if($monthp=='10') { $monthp='Oct';}
 else if($monthp=='11') { $monthp='Nov';}
 else if($monthp=='12') { $monthp='Dec';}
?>
<iframe src="graph.php?id=<?php echo $id; ?>&tval=<?php echo $tval; ?>&cmbTable=<?php echo $cmbTable; ?>&formno=<?php echo $formno; ?>&employer=<?php echo $employer; ?>&oaddress=<?php echo $oaddress; ?>&specialization=<?php echo $specialization; ?>&city=<?php echo $city; ?>&lga=<?php echo $lga; ?>&state=<?php echo $state; ?>&ostate=<?php echo $ostate; ?>&country=<?php echo $country; ?>&amount=<?php echo $amount; ?>&teller=<?php echo $teller; ?>&bank=<?php echo $bank; ?>&datepaid=<?php echo $datepaid; ?>&profession=<?php echo $profession; ?>&schooltype=<?php echo $schooltype; ?>&qualification=<?php echo $qualification; ?>&gyear=<?php echo $gyear; ?>&institute=<?php echo $institute; ?>&pall=<?php echo $pall; ?>&filter=<?php echo $filter; ?>&cmbFilter=<?php echo $cmbFilter; ?>&vocas=<?php echo $vocas; ?>" scrolling="Auto" height="330px" width="100%" align="left">

</iframe>
</fieldset>

	</td>
		</tr>
</table>
					  </li>
					</ul>
					<!-- End Slider Items -->
					<div class="cl">&nbsp;</div>
					<div class="slider-controls">
						
					</div>
				</div>
			</div>
			<div class="cl">&nbsp;</div>
		</div>
		<!-- End Slider -->
<?php
require_once 'footer.php';
?>

		<!-- Specific Page Vendor -->
		<script src="../assets/vendor/select2/select2.js"></script>
		<script src="../assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="../assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="../assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		

		<!-- Examples -->
		<script src="../assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.tabletools.js"></script>