<?php
session_start();
 require_once 'header.php';
 require_once 'conn.php';
// require_once 'style.php';

@$epz=$_REQUEST['epz'];
@$id=md5($_REQUEST['id']);
@$usr=$_REQUEST['usr'];
@$tval=$_REQUEST['tval'];

$sql="SELECT * FROM `login` WHERE `email`='" . $epz . "' AND (`username`='".$usr. "' OR `username`='" .$_SESSION['yyuser']. "')";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);
?>
<script src="../lib/jquery.js"></script>
<script src="../dist/jquery.validate.js"></script>

<script>


$().ready(function() {
	// validate the comment form when it is submitted
	$("#commentForm").validate();

});
</script>

					<header class="page-headerf" style="width:100%;height:50px;background-color:#000;padding:10px">
						<h2><font style="color:#fff;margin-top:10px">My Password Reset</font></h2>
					
					</header>
<br>
<link rel="stylesheet" href="css/refreshform.css" />

<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<?php 
 echo '<font style="font-size: 10pt; font-weight: 700" face="Verdana" color="#FF0000">' . $_REQUEST['tval'] . '</font>'; 
?>
<body>
	<div align="center" class="limiter">
		<div align="center" class="container-login100X" style="padding: 2; height:450px; background:url(images/logo2.png) center;">
			<div align="center" class="wrap-login100">
                <form method="post" action="submitresett.php" enctype="multipart/form-data">
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Your Username</span>
						 <input class="input100" type="text" readonly="readonly" name="usernamex" placeholder="Enter username" autocomplete="off" value="<?php echo $_SESSION['yyuser']; ?>">
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">New Password</span>
                         <input class="input100" type="password" name="passwd" placeholder="Enter password" required>
                         <input type="hidden" size="30" name="username" maxlength="50" value="<?php echo $_SESSION['yyuser']; ?>">
                         <input type="hidden" size="30" name="uemail" maxlength="50" value="<?php echo $row['email']; ?>">
						<span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Re-Type Password</span>
                         <input class="input100" type="password" name="passwd2" placeholder="Re-Enter password" required>
						<span class="focus-input100"></span>
                    </div>
                    
                    <div align="center" class="container-login100-form-btnX">
					  <input type="submit" class="login100-form-btn" name="submit" value="Submit"/>
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
require_once 'footer.php';
?>
