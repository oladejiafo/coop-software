<title>Dashboard | Cooperatives Management</title>

<?php
 require_once 'conn.php';
?>
<link rel="stylesheet" href="css/refreshform.css" />
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
							</ol>
					
							&nbsp;
						</div>
					</header>

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="assets/vendor/morris/morris.css" />


<style type="text/css">
<!--
 .rounded-corners {
    -moz-border-radius: 30px 30px 30px 30px;
    -webkit-border-radius: 30px 30px 30px 30px;
    border-radius: 15px;
}
.redge {
    -moz-border-radius: 30px 30px 30px 30px;
    -webkit-border-radius: 30px 30px 30px 30px;
    border-radius: 15px;
}
.ovals {
    -moz-border-radius: 90px 90px 90px 90px;
    -webkit-border-radius: 90px 90px 90px 90px;
    border-radius: 45px;
    height: 60px;
}	
.contt {width: 31%}
/* small mobile :320px. */
@media (max-width: 767px) {
.contt {width:300px}
}
</style>

<div id="ReloadThis">
<?php
require_once 'ttk.php';
?>
</div>

<!-- start: page -->

<?php
if(!isset($_SESSION['_lpend']))
{
	$_SESSION['_lpend'] = $lpend;
}

if(!isset($_SESSION['_numxb']))
{
	$_SESSION['_numxb'] = $numxb;
}

if(!isset($_SESSION['_xLoan']))
{
	$_SESSION['_xLoan'] = $xLoan;
}

if ($_lpendx > $_SESSION['_lpend'] OR $_numxb > $_SESSION['_numxb'] OR $_xLoan > $_SESSION['_xLoan'])
{ 
 if ($_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] == 4 or $_SESSION['access_lvl'] == 6 or $_SESSION['access_lvl'] == 5) 
 { 	
?>
   <script>
	let src = 'alert2.mp3';
	let audio = new Audio(src);
	audio.play();
   </script>
<?php
 }
}

$_SESSION['_lpend']=$_lpendx;
$_SESSION['_numxb']=$_numxb;
$_SESSION['_xLoan']=$_xLoan;
?>

<div class="row">
	<div class="col-md-12 col-lg-12 col-xl-12">
		<div class="row">
			<div class="col-md-12 col-lg-4 col-xl-4">
        <section class="panel panel-featured-right panel-featured-left panel-featured-grey">
				 <div class="panel-body" style="background-color:#ffff00;">
	        <div style="padding-top:10px">
	         <div class="h4 text-bold mb-none"><font color="#000"><?php echo $lpend; ?></font></div>
		       <p class="text-muted mb-none"><font color="#000">Loans Pending Approval</font></p>
		       <div align="right" class="summary-footer">
            <?php
            if ($_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] == 4 or $_SESSION['access_lvl'] == 6 or $_SESSION['access_lvl'] == 5) 
		        { ?>
				     <a href="loans.php#approve" class="text-muted text-uppercase">(View)</a>
            <?php
            } ?>
    		   </div>
					</div>
				 </div>
      	</section> 
			</div>
			<div class="col-md-12 col-lg-4 col-xl-4">
       <section class="panel panel-featured-left panel-featured-right panel-featured-warning">
				<div class="panel-body" style="background-color:ccff99;">
					<div style="padding-top:10px">
	           <div class="h4 text-bold mb-none"><font color="#000"><?php echo $numxb; ?></font></div>
		         <p class="text-muted mb-none"><font color="#000">Loans Due for Repayment</font></p>
		         <div align="right" class="summary-footer">
              <?php
              if ($_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] == 4 or $_SESSION['access_lvl'] == 6 or $_SESSION['access_lvl'] == 5) 
              { ?>
				        <a href="loans.php" class="text-muted text-uppercase">(View)</a>
              <?php
              } ?>
        		 </div>
					</div>
				 </div>					
       </section> 
			</div>
			<div class="col-md-12 col-lg-4 col-xl-4">
       <section class="panel panel-featured-left panel-featured-right panel-featured-danger">
				<div class="panel-body" style="background-color:#3c6cc7;">
					<div style="padding-top:10px">
	  				<div class="h4 text-bold mb-none"><font color="#fff"><?php echo $xLoan; ?></font></div>
		        <p class="text-muted mb-none"><font color="#fff">Expired Loans (Past Due Loans)</font></p>
		        <div align="right" class="summary-footer">
             <?php
             if ($_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] == 4 or $_SESSION['access_lvl'] == 6 or $_SESSION['access_lvl'] == 5) 
             { ?>
				      <a href="report.php?cmbReport=Expired+Loans" class="text-muted text-uppercase">(View)</a>
             <?php
             } ?>
		        </div>
					</div>
				 </div>					
       </section> 
			</div>
		</div>
	</div>	
</div>
		
					<div class="row">

						<div class="col-md-6 col-lg-12 col-xl-6">
							<div class="row">
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body" style="height:210px">

										<div class="widget-summary">
												
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total Members &nbsp; <strong><?php echo $patt; ?></strong></h4>
														<div class="info">

								              <?php require_once 'totcustgraph.php'; ?>
	
														</div>
													</div>
													<div class="summary-footer">
<?php
if ($_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] == 4 or $_SESSION['access_lvl'] == 5 or $_SESSION['access_lvl'] == 6) 
{ 
?>
														<a href="report.php?cmbReport=Customer+Report" class="text-muted text-uppercase">(view all)</a>
<?php
}
?>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-secondary">
										<div class="panel-body" style="height:210px">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
														<i class="fa fa-user"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Monthly Registered Members</h4>
</h4>
														<div class="info"><br>
															<strong class="amount"><?php echo $wikk; ?></strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase"></a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
<?php
             if ($_SESSION['access_lvl'] == 3  or $_SESSION['access_lvl'] == 4 or $_SESSION['access_lvl'] == 5) 
             { 
?>
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-quartenary">
										<div class="panel-body" style="height:190px">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-dark">
														<i class="fa fa-usd"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total Outstanding Loans Balance</h4>
														<div class="info">
															<strong class="amount"><?php echo $loanBb; ?></strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase"></a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-tertiary">
										<div class="panel-body" style="height:195px">
											<div class="widget-summary">
											
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Monthly Contributions &nbsp; <strong><?php echo $dll; ?></strong></h4>
														<div class="info">
															<?php require_once 'dloangraph.php'; ?>
														</div>
													</div>
													<div class="summary-footer">
<?php
             if ($_SESSION['access_lvl'] == 3  or $_SESSION['access_lvl'] == 4 or $_SESSION['access_lvl'] == 5) 
             { 
?>
														<a href="report.php?cmbReport=Loans+Report" class="text-muted text-uppercase">(report)</a>
<?php
}
?>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
<?php
#############################SHARES###########################
if ($_SESSION['access_lvl'] == 3  or $_SESSION['access_lvl'] == 4 or $_SESSION['access_lvl'] == 5) 
{ 
     $sqlSh="SELECT `Total Available`,`Max Share`,`Min Share`,`Unit Cost`,`Total Left` FROM `shares`  WHERE `Company` ='" .$_SESSION['company']. "'";
     $resultSh = mysqli_query($conn,$sqlSh);
     $rowSh = mysqli_fetch_array($resultSh);
     $totSH=$rowSh['Total Available'];
     $maxSH=$rowSh['Max Share'];
     $minSHp=$rowSh['Min Share'];
     $minSH=($rowSh['Min Share'] * $rowSh['Total Available'])/100;
     $costSH=$rowSh['Unit Cost'];
     $remSH=$rowSh['Total Left'];
     $givSH=$totSH-$remSH;
     $totcostSH=$costSH * $totSH;
?>
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body" style="height:300px">
								<header class="panel-heading">
									<div class="panel-actions">
										
									</div>

									<h2 class="panel-title">Shares Portfolio</h2>
								</header>
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-secondary">
														<i class="fa fa-certificate"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														
														<div class="info">
                                                                                                                        <strong class="amountt"><?php echo "Total Shares: " .number_format($totSH); ?></strong><br>
                                                                                                                        <strong class="amountt"><?php echo "Alloted Shares: " .number_format($givSH); ?></strong><br>
                                                                                                                        <strong class="amountt"><?php echo "Min. Shares: " .number_format($minSH) . " (<i>" .$minSHp. "%</i>)"; ?></strong><br>
                                                                                                                        <strong class="amountt"><?php echo "Max. Shares: " .number_format($maxSH); ?></strong><br>
                                                                                                                        <strong class="amountt"><?php echo "Value/Shares: N" .number_format($costSH); ?></strong><br>
                                                                                                                        <strong class="amountt"><?php echo "Shares Value: N" .number_format($totcostSH); ?></strong><br>
								                                                        <?php #require_once 'shgraph.php'; ?>
	
														</div>
													</div>
													<div class="summary-footer">

													</div>
												</div>
											</div>
										</div>
									</section>
  
								</div>

<?php
}
###################################
?>                           		
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-quartenary">
										<div class="panel-body" style="">
								<header class="panel-heading">
									<div class="panel-actions">
										
									</div>

									<h2 class="panel-title">Daily Loans</h2>
								</header>
											<div class="widget-summary">
												
												<div class="widget-summary-col">
													<div class="summary">
														
														<div class="info"><br>

								                                                        <?php require_once 'depgraph.php'; ?>
	
														</div>
													</div>
													<div class="summary-footer">
<?php
             if ($_SESSION['access_lvl'] == 3  or $_SESSION['access_lvl'] == 4 or $_SESSION['access_lvl'] == 5) 
             { 
?>
														<a href="report.php?cmbReport=Daily+Balancing+Summary" class="text-muted text-uppercase">(view all)</a>
<?php
}
?>
													</div>
												</div>
											</div>
										</div>
									</section>
  
								</div>


<?php
}
?>
							</div>
						</div>
					</div>

					<!-- end: page -->
				</section>
			</div>

		<!-- Specific Page Vendor -->
		<script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="assets/vendor/jquery-appear/jquery.appear.js"></script>
		<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
		<script src="assets/vendor/flot/jquery.flot.js"></script>
		<script src="assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
		<script src="assets/vendor/flot/jquery.flot.pie.js"></script>
		<script src="assets/vendor/flot/jquery.flot.categories.js"></script>
		<script src="assets/vendor/flot/jquery.flot.resize.js"></script>
		<script src="assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
		<script src="assets/vendor/raphael/raphael.js"></script>
		<script src="assets/vendor/morris/morris.js"></script>
		<script src="assets/vendor/gauge/gauge.js"></script>
		<script src="assets/vendor/snap-svg/snap.svg.js"></script>
		<script src="assets/vendor/liquid-meter/liquid.meter.js"></script>
		<script src="assets/vendor/jqvmap/jquery.vmap.js"></script>
		<script src="assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
		<script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>


		<!-- Examples -->
		<script src="assets/javascripts/dashboard/examples.dashboard.js"></script>
		<script src="assets/javascripts/ui-elements/examples.charts.js"></script>