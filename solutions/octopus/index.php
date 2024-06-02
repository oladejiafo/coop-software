<?php
session_start();
 require_once 'header.php';
 require_once 'conn.php';


$sql="SELECT * FROM `company info`";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);

$tot  = mysqli_num_rows($result);

if($tot==0)
{
  require_once 'registerr.php';
 // header("location:registerr.php?tval=$tval&redirect=$redirect");
} else {

?>
	
<?php
if (isset($_SESSION['user_id']))
{
  require_once 'dashboard.php';
} else {
?>
<title>Cooperative Management Software</title>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
<?php echo '<font style="font-size: 10pt; font-weight: 700" face="Verdana" color="#FF0000">' . $_REQUEST['tval'] . '</font>'; ?>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="padding: 2; height:450px; background:url(images/logo2.png) center;">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/loanns.png);">
					<span class="login100-form-title-1">
						Staff Login
					</span>
				</div>

				<form class="login100-form validate-form" method="post" action="transact-user.php">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="uname" placeholder="Enter username" autocomplete="off">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="passwd" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
						</div>

						<div>
							
						</div>
					</div>

					<div class="container-login100-form-btn">
					  <input type="submit" class="login100-form-btn" name="action" value="Login"/>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<?php
}
}

require_once 'footer.php';
?>
