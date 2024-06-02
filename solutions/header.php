<?php
session_start();
require_once 'conn.php';
 require_once 'http.php';

if (isset($_SESSION['user_id'])) 
{
// set timeout period in seconds
$inactive = 1800;

// check to see if $_SESSION['timeout'] is set
 if(isset($_SESSION['timeout']) ) 
 {
	$session_life = time() - $_SESSION['timeout'];
	if($session_life > $inactive)
    { 
		$pg="transact-user.php?action=Timedout";
        echo '<meta http-equiv="refresh" content="3; url=' .$pg. '" />';
	}
 }
 function curPageName() 
 {
	return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
 }
 $_SESSION['lpage']= curPageName()."?".$_SERVER['QUERY_STRING'];
 $_SESSION['timeout'] = time();
}

?>

<html class="fixed">
<head>
			<!-- Basic -->
			<meta charset="UTF-8">


 <!-- Mobile Metas -->
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/fav.png" />
  <!-- Meta Description -->
  <meta name="description" content="VCP is a subscription based Cooperatives Management Portal in the cloud. It is easy to use, secured, affordable, and ever improving to to give you the best." />
  <!-- Meta Keyword -->
  <meta name="keywords" content="cooperative, waltergates, g8brooks, mfb, thrift, loans, microfinance software, mfb software, loans management, thrift management, thrift and loans management software, cloud solution, software as a service, cloud based thrift solution, thrift and loans management system,loans management system,thrift management system." />
  <!-- meta character set -->
  <meta charset="UTF-8" />
  <!-- Site Title -->
  <title>VCP: Cloud-Based Cooperatives Management Solution</title>

	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome-icons -->

<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
<!-- 	
<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.css" />
   <link rel="shortcut icon" href="favicon.ico">
-->
<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>

<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"inputField",
			dateFormat:"%d-%m-%Y"

		});
		new JsDatePick({
			useMode:2,
			target:"inputField2",
			dateFormat:"%d-%m-%Y"

		});
		new JsDatePick({
			useMode:2,
			target:"inputField3",
			dateFormat:"%d-%m-%Y"

		});
		new JsDatePick({
			useMode:2,
			target:"inputField4",
			dateFormat:"%Y-%m-%d"

		});
		new JsDatePick({
			useMode:2,
			target:"inputField5",
			dateFormat:"%Y-%m-%d"

		});
		new JsDatePick({
			useMode:2,
			target:"inputFieldB",
			dateFormat:"%Y-%m-%d"

		});
	};
</script>

		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/meanmenu.min.css">

		<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
<?php
 $sql="SELECT * FROM `company info` where `Company name` = '" .$_SESSION['company']. "'";
 $result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
 $row = mysqli_fetch_array($result);
 $tot  = mysqli_num_rows($result);

//require_once 'ttkk.php';

 $TOTnoti=$lpendi+$numxbi+$xLoani;

 if($lpendi =="" OR empty($lpendi)) 
 {
	$lpendi=0;
 }
 
 if($numxbi =="" OR empty($numxbi)) 
 {
	$numxbi=0;
 }
 
 if($xLoani =="" OR empty($xLoani)) 
 {
	$xLoani=0;
 }

 if($TOTnoti =="" OR empty($TOTnoti)) 
 {
	$TOTnoti=0;
 } 
?>
		<section class="body">
			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="../" class="logo">
						<img src="img/cclogo.png" style="margin-left:-17px;margin-top:-10px" height="55" width="200" alt="Virtual Cooperatives Portal" />
					</a>
					<div class="visible-xs toggle-sidebar-left" style="background-color:#3c6cc7" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" style="font-size:16px;margin-top:5px;" aria-label="Toggle sidebar"></i>
					</div>
				</div>

				<div align="center" style="width:60%;display:inline-block; vertical-align:middle">
				 <span align="center"><font style="font-size:28px">VCP</font></span> &nbsp;
          <br><span align="center" class="role"> <i>(A COOPERATIVE MANAGEMENT PORTAL)</i> </span>	
         </span>
				</div>			
				<span class="separator"></span>
				<!-- start: search & user box -->
		
				<div class="header-right">
<?php
      if (isset($_SESSION['uname'])) 
      {
    		list($cp, $fld) = explode(' ', $_SESSION['company']);
        $cpfolder=$cp . $fld;
?>
					<div id="userbox" class="userbox">

						<a href="#" data-toggle="dropdown" title="You Can Logout Here">
							<figure class="profile-picture">
							   <!--assets/images/logg.jpg-->
							   <?php
							   if (file_exists("images/pics/" .$cpfolder. "/logo.jpg")==1)
							   { ?>
								<img src="images/pics/<?php echo $cpfolder;?>/logo.jpg" alt="Finasol Thrift Software User" class="img-circle" data-lock-picture="assets/images/!happy-face.png" />
							   <?php } else { ?>
								<img src="images/pics/1.jpg" alt="Finasol Thrift Software User" class="img-circle" data-lock-picture="assets/images/!happy-face.png" />
							   <?php } ?>
							</figure>
							<div class="profile-info" data-lock-name="" data-lock-email="">
								<span class="name"><?php echo strtoupper($_SESSION['uname']); ?></span>
								<span class="role">
									<?php 
									if(strlen($_SESSION['company']) > 24)
									{
										echo $coyyx =substr($_SESSION['company'],0,21) . "...";
									} else {
										echo $coyyx =$_SESSION['company'];
									}
									?>
								</span>
							</div>

							<i class="fa custom-caret"></i>
						</a>

						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="transact-user.php?action=Logout"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
<?php
}
?>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
<?php
    if (isset($_SESSION['user_id'])) 
    {
?>
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">

					<div class="sidebar-header">
						<div class="sidebar-title">

						</div>
						<div class="sidebar-toggle hidden-xs"  data-toggle="collapse" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>

					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li class="nav-active">
										<a href="index.php">
											<i class="fa fa-dashboard" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>
<?php
             if ($_SESSION['access_lvl'] == 1  or $_SESSION['access_lvl'] == 2  or $_SESSION['access_lvl'] == 3  or $_SESSION['access_lvl'] == 4 or $_SESSION['access_lvl'] == 5 or $_SESSION['access_lvl'] == 6) 
             { 
?>
									<li class="nav-parent">
										<a>
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<span>Membership</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="members.php">
												   Members Records
												</a>
											</li>
											<li>
												<a href="attendance.php">
												  Attendance Register
												</a>
											</li>
										</ul>
									</li>
<?php
/*
									<li class="nav-parent">
										<a>
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<span>Customer Service</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="customer.php">
													 Customer Details
												</a>
											</li>
											<li>
												<a href="register.php">
													 Customer Account (New/Modify)
												</a>
											</li>
											<li>
												<a href="closure.php">
													 Account Closure
												</a>
											</li>
										</ul>
									</li>
<?php
*/
}
if ($_SESSION['access_lvl'] == 7) 
{ 
?>
									<li class="nav-parent">
										<a>
											<i class="fa fa-list-alt" aria-hidden="true"></i>
											<span>Transactions</span>
										</a>
										<ul class="nav nav-children">
											
											<li>
												<a href="cregister.php">
													 New Account
												</a>
											</li>
											<li>
												<a href="contribution.php">
													 Contributions
												</a>
											</li>
						        
										</ul>
									</li>
<?php
}
if ($_SESSION['access_lvl'] == 1 or $_SESSION['access_lvl'] == 2 or $_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] == 4 or $_SESSION['access_lvl'] == 5 or $_SESSION['access_lvl'] == 6) 
{ 
?>
									<li class="nav-parent">
										<a>
											<i class="fa fa-list-alt" aria-hidden="true"></i>
											<span>Transactions</span>
										</a>
										<ul class="nav nav-children">
										<li>
												<a href="investments.php">
													 Investments Management
												</a>
											</li>
											<li>
												<a href="shares.php">
													 Shares Management
												</a>
											</li>
											<li>
												<a href="welfares.php">
													 Welfare Management
												</a>
											</li>
											<li>
												<a href="contribution.php">
													 Membership Contributions
												</a>
											</li>
											<li>
												<a href="transactions.php">
													 Individual Savings
												</a>
											</li>
										</ul>
									</li>
<?php
}

if ($_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] == 4 or $_SESSION['access_lvl'] == 6 or $_SESSION['access_lvl'] == 5) 
{ 
?>
									<li>
										<a href="loans.php">
											<i class="fa fa-table" aria-hidden="true"></i>
											<span>Loans</span>
										</a>
									</li>
<?php
}

             if ($_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] == 4 or $_SESSION['access_lvl'] == 5) 
             { 
?>
									<li class="nav-parent">
										<a >
											<i class="fa fa-dollar" aria-hidden="true"></i>
											<span>Accounts</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="account/account.php">
													 General Ledger
												</a>
											</li>
											<li>
												<a href="account/accounts.php">
													 Entry Journal
												</a>
											</li>
											<li>
												<a href="account/revenue.php">
													 Revenue
												</a>
											</li>
											<li>
												<a href="account/budget.php">
													 Budget
												</a>
											</li>
											<li>
												<a href="account/advances.php">
													 Advances
												</a>
											</li>
											<li>
												<a href="account/index0.php">
													 Accounts Summary
												</a>
											</li>															
											<li>
												<a href="account/suspense.php">
													 Suspense Account
												</a>
											</li>
											<li>
												<a href="account/provisions.php">
													 Loans Provisions
												</a>
											</li>
											<li>
												<a href="account/fassets.php">
													 Fixed Assets
												</a>
											</li>
										</ul>
									</li>
<?php
            }
             if ($_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] == 4 or $_SESSION['access_lvl'] == 5 or $_SESSION['access_lvl'] == 6) 
             { 
?>
									<li>
										<a href="report.php">
											<i class="fa fa-columns" aria-hidden="true"></i>
											<span>Reports</span>
										</a>
									</li>
<?php
            }
             if ($_SESSION['access_lvl'] == 5) 
             { 
?>
									<li class="nav-parent">
										<a>
											<i class="fa fa-gear" aria-hidden="true"></i>
											<span>Control Panel</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="syslog.php">System Log</a>
											</li>
											<li class="nav-parent">
												<a>Settings</a>
												<ul class="nav nav-children">
													<li>
														<a href="useraccount.php">Create User Logins</a>
													</li>
													<li>
														<a href="listing.php">Manage User Logins</a>
													</li>
													<li>
														<a href="tableupdates.php">Settings</a>
													</li>
												</ul>	
											</li>
											<li>
												<a href="resetpwd.php">Change Password</a>
											</li>
										</ul>
									</li>
<?php
            }
             if ($_SESSION['access_lvl'] != 5) 
             { 
?>
									<li>
										<a href="resetpwd.php">
											<i class="fa fa-columns" aria-hidden="true"></i>
											<span>Change Password</span>
										</a>
									</li>
<?php
            }

?>
								</ul>
							</nav>
				
							<hr class="separator" />
							<?php
							  if (file_exists("images/pics/" .$cpfolder. "/logo.jpg")==1)
							  { ?>
								<img src="images/pics/<?php echo $cpfolder; ?>/logo.jpg" width="180px" style="padding:5px">
							  <?php } ?>	

							
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->
<?php
}
?>
    <script src="js/bootstrap.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
