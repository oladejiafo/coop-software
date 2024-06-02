<title>Dashboard | Cooperative Management Software</title>

<?php
 require_once 'conn.php';
?>				<section role="main" class="content-body">
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

 <?php
     $sqlp="SELECT count(`ID`) as cnt FROM `customer` where `Status` ='Active'";
     $resultp = mysqli_query($conn,$sqlp);
     $rowp = mysqli_fetch_array($resultp);
     $pat=$rowp['cnt'];
     if(mysqli_num_rows($resultp) == 0)
     { 
      $pat=0;
     } 	 
$patt= number_format($pat,0);

$tday=date('Y-m-d');
     $sqlw="SELECT WEEK(`Registration Date`) weeknumber, COUNT(DISTINCT(`ID`)) users_count
             FROM customer
             WHERE WEEK(`Registration Date`) <= WEEK('" .$tday. "') 
               AND WEEK(`Registration Date`) > (WEEK('" .$tday. "') - 4)
             GROUP BY weeknumber";
     $resultw = mysqli_query($conn,$sqlw);
     $roww = mysqli_fetch_array($resultw);
     $wik=$roww['users_count'];
     if(mysqli_num_rows($resultw) == 0)
     { 
      $wik=0;
     } 	 
$wikk= number_format($wik,0);

     $sqlLB="SELECT sum(`Balance`) as bal FROM `loan` where `Balance` > 0 AND `Loan Status`='Active'";
     $resultLB = mysqli_query($conn,$sqlLB);
     $rowLB = mysqli_fetch_array($resultLB);
     $loanB=$rowLB['bal'];
     if(mysqli_num_rows($resultLB) == 0)
     { 
      $loanB=0;
     } 	 
$loanBb= number_format($loanB,2);

     $sqlDl="SELECT sum(`Loan Amount`) as dloan FROM `loan` where (DATE( `Loan Date` ) >= DATE_ADD( '2019-04-05 00:00:00', INTERVAL -1 WEEK)) AND `Loan Status`='Active'";
     $resultDl = mysqli_query($conn,$sqlDl);
     $rowDl = mysqli_fetch_array($resultDl);
     $dl=$rowDl['dloan'];
     if(mysqli_num_rows($resultDl) == 0)
     { 
      $dl=0;
     } 	 
$dll= number_format($dl,2);

     $sqlLp="SELECT count(`ID`) as lPend FROM `loan` where `Approval` !='Approved' AND `Loan Status` !='Active'";
     $resultLp = mysqli_query($conn,$sqlLp);
     $rowLp = mysqli_fetch_array($resultLp);
     $lnpend=$rowLp['lPend'];
     if(mysqli_num_rows($resultLp) == 0)
     { 
      $lnpend=0;
     } 	 
$lpend= number_format($lnpend,0);


$numx=0;
   $queryxp = "SELECT `ID`,`Loan Date`,`Loan Amount`,`Loan Duration`,`Monthly Interest`,`Monthly Principal` FROM `loan` WHERE `Loan Status`='Active'";

   $resultxp=mysqli_query($conn,$queryxp);




    while(list($xid,$xdate,$xamount,$xnpay,$xmintr,$xmprinc)=mysqli_fetch_row($resultxp))

    {
      for($xx=1; $xx <= $xnpay; $xx++)
      {
        $xdate=date('Y-m-d', strtotime('+1 month',strtotime($xdate)));
        $xtot=$xmintr + $xmprinc;

        $query = "SELECT `Account Number`,`Loan ID` FROM `loan payment` WHERE `Date`='" . $xdate . "' AND `Loan ID`='" .$xid. "'";

        $resultp=mysqli_query($conn,$query);



  
      if(mysqli_num_rows($resultLp) == 0)
        { 
          $numx=$numx+1;
        }
      }
    }
$numxb=number_format($numx,0);
if($numx==0)
{
  $ps=0;
} else {
  $ps=($loanB/$numx)*100;
}
?>
					<!-- start: page -->
					<div class="row">

						<div class="col-md-6 col-lg-12 col-xl-6">
							<div class="row">
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body" style="height:210px">
											<div class="widget-summary">
												
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total Customers &nbsp; <strong><?php echo $patt; ?></strong></h4>
														<div class="info">

								                                                        <?php require_once 'totcustgraph.php'; ?>
	
														</div>
													</div>
													<div class="summary-footer">
														<a href="#" class="text-muted text-uppercase">(view all)</a>
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
														<h4 class="title">Weekly Registered Customers</h4>
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

								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-quartenary">
										<div class="panel-body" style="height:190px">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-quartenary">
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
										<div class="panel-body" style="height:190px">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-tertiary">
														<i class="fa fa-usd"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Daily Loans &nbsp; <strong><?php echo $dll; ?></strong></h4>
														<div class="info">
															<?php require_once 'dloangraph.php'; ?>
														</div>
													</div>
													<div class="summary-footer">
														<a href="#" class="text-muted text-uppercase">(report)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
                           		
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body" style="height:350px">
								<header class="panel-heading">
									<div class="panel-actions">
										
									</div>

									<h2 class="panel-title">Daily Savings/Deposits</h2>
								</header>
											<div class="widget-summary">
												
												<div class="widget-summary-col">
													<div class="summary">
														
														<div class="info">

								                                                        <?php require_once 'totcustgraph.php'; ?>
	
														</div>
													</div>
													<div class="summary-footer">
														<a href="#" class="text-muted text-uppercase">(view all)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
  
								</div>
                                                                <div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body" style="height:350px">

								<header class="panel-heading">
									<div class="panel-actions">
										
									</div>

									<h2 class="panel-title">Awaiting Actions</h2>
								</header>
								<div class="panel-body">
									<section class="panel">
										<div class="panel-body">
											<div class="small-chart pull-right" id="sparklineBarDash"></div>
											
											<div class="h4 text-bold mb-none"><?php echo $lpend; ?></div>
											<p class="text-muted mb-none">Loans Pending Approval</p>
                                                                                                       <div class="summary-footer">
														<a class="text-muted text-uppercase">(View)</a>
													</div>
										</div>
									</section>
									<section class="panel">
										<div class="panel-body">
											<div class="circular-bar circular-bar-xs m-none mt-xs mr-md pull-right">
												<div class="circular-bar-chart" data-percent="<?php echo $ps; ?>" data-plugin-options='{ "barColor": "#2baab1", "delay": 300, "size": 50, "lineWidth": 4 }'>
													<strong>Average</strong>
													<label><?php echo $ps; ?>%</label>
												</div>
											</div>
											<div class="h4 text-bold mb-none"><?php echo $numxb; ?></div>
											<p class="text-xs text-muted mb-none">Loans Due for Repayment</p>
                                                                                                       <div class="summary-footer">
														<a class="text-muted text-uppercase">(View)</a>
													</div>
										</div>
									</section>
                                                                                </div>
                                                                        </section> 
                                                                </div>
							</div>
						</div>
					</div>

					<!-- end: page -->
				</section>
			</div>
