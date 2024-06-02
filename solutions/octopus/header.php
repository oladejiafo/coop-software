<?php
session_start();
require_once 'conn.php';
 # require_once 'http.php';

if (isset($_SESSION['user_id'])) 
{
// set timeout period in seconds
$inactive = 1200;

// check to see if $_SESSION['timeout'] is set
if(isset($_SESSION['timeout']) ) {
	$session_life = time() - $_SESSION['timeout'];
	if($session_life > $inactive)
        { $pg="transact-user.php?action=Logout";
		// go to login page when idle
		#header("refresh: transact-user.php?action=Logout"); 
               echo '<meta http-equiv="refresh" content="10; url=' .$pg. '" />';
	}
}
$_SESSION['timeout'] = time();
}
?>
<html class="fixed">
	<head>


<link rel="stylesheet" type="text/css" media="all" href="../jsDatePick_ltr.min.css" />
<!-- 	
<link rel="stylesheet" type="text/css" media="all" href="../jsDatePick_ltr.css" />
   <link rel="shortcut icon" href="favicon.ico">
-->
<script type="text/javascript" src="../jsDatePick.min.1.3.js"></script>

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
	};
</script>

		<!-- Basic -->
		<meta charset="UTF-8">

		<!-- title -->
		<meta name="keywords" content="HTML5 Admin Template" />

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="assets/vendor/morris/morris.css" />

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
$sql="SELECT * FROM `company info`";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);
$tot  = mysqli_num_rows($result);

    ?>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="../" class="logo">
						<img src="../images/logo.jpg" height="35" alt="COOPERATIVES MANAGEMENT" />
					</a>
				</div>
					<span class="separator"></span>
				<span align="center"><font style="font-size:20px">COOPERATIVES MANAGEMENT SOFTWARE </font></span>
				<!-- start: search & user box -->

				<div class="header-right">
			
					<span class="separator"></span>
<?php
      if (isset($_SESSION['uname'])) 
      {
?>			
					<div id="userbox" class="userbox">

						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="" data-lock-email="">
								<span class="name"><?php echo strtoupper($_SESSION['uname']); ?></span>
								<span class="role"><?php echo $row['Company Name']; ?></span>
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
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li class="nav-active">
										<a href="index.html">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>
<?php
             if ($_SESSION['access_lvl'] == 1  or $_SESSION['access_lvl'] == 2  or $_SESSION['access_lvl'] == 3  or $_SESSION['access_lvl'] == 4 or $_SESSION['access_lvl'] == 5 or $_SESSION['access_lvl'] == 6) 
             { 
?>
									<li class="nav-parent">
										<a href="members.php">
											<i class="fa fa-user" aria-hidden="true"></i>
											<span>Membership</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="pages-signup.html">
													 Records
												</a>
											</li>
											<li>
												<a href="attendace.php">
													 Attendance
												</a>
											</li>
										</ul>
									</li>

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
}
if ($_SESSION['access_lvl'] == 1 or $_SESSION['access_lvl'] == 2 or $_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] == 4 or $_SESSION['access_lvl'] == 7 or $_SESSION['access_lvl'] == 5 or $_SESSION['access_lvl'] == 6) 
{ 
?>
									<li class="nav-parent">
										<a>
											<i class="fa fa-list-alt" aria-hidden="true"></i>
											<span>Transactions</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="#">
													 Investments
												</a>
											</li>
											<li>
												<a href="#">
													 Shares Mgt
												</a>
											</li>
											<li>
												<a href="#">
													 Welfare
												</a>
											</li>
                                                          <?php
						             if ($_SESSION['access_lvl'] == 1 or $_SESSION['access_lvl'] == 4 or $_SESSION['access_lvl'] == 5 or $_SESSION['access_lvl'] == 6) 
						             { 
						          ?>
											<li>
												<a href="transactions.php">
													 Deposit/Withdrawal
												</a>
											</li>
											<li>
												<a href="sundry.php">
													 Sundry
												</a>
											</li>
                                                          <?php
                                                            }
						             if ($_SESSION['access_lvl'] == 4 or $_SESSION['access_lvl'] == 7 or $_SESSION['access_lvl'] == 5) 
						             { 
						          ?>
											<li>
												<a href="contribution.php>
													 Contributions
												</a>
											</li>
						           <?php
						             }
  						           ?>
										</ul>
									</li>
<?php
}
if ($_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] == 4 or $_SESSION['access_lvl'] == 6 or $_SESSION['access_lvl'] == 5) 
{ 
?>
									<li class="nav-parent">
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
													 Entry Journal
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
											<li>
												<a href="account/contract.php">
													 Contractors
												</a>
											</li><li>
												<a href="account/paysumm.php">
													 Payment Summary
												</a>
											</li>
										</ul>
									</li>
<?php
            }
             if ($_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] == 4 or $_SESSION['access_lvl'] == 5 or $_SESSION['access_lvl'] == 6) 
             { 
?>
									<li class="nav-parent">
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
											<i class="fa fa-align-left" aria-hidden="true"></i>
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
														<a href="admin.php">Settings</a>
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
?>
								</ul>
							</nav>
				
							<hr class="separator" />

							
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->
<?php
}
?>
