<?php
session_start();
 require_once 'header.php';
 require_once 'conn.php';

$onibara = $_REQUEST['xXrR!c'];
$himail = $_REQUEST['himail'];
if(strlen($himail)>4)
{
 $sqlH="SELECT * FROM `company info` where `Email`='" .trim($himail). "'";
 $resultH = mysqli_query($conn,$sqlH) or die('Could not look up user data; ' . mysqli_error());
 $rowH = mysqli_fetch_array($resultH);
 $coynam=$rowH['Company Name'];

 if(strlen($coynam)>0)
 {
  if($onibara == "bas")
  {
	$regdate = date('Y-m-d');
    $date = date('Ymd');
    $newDate = strtotime($date.' + 30 days');
    $duedate= date('Ymd', $newDate);

	$sqlt = "update `company info` set `Paid`=1, `regdate`='" .$regdate. "', `duedate`='" .$duedate. "', `Type`='Basic Plan' where `Company Name`='" . $coynam . "' AND `Email`='" . $himail . "'";
	mysqli_query($conn, $sqlt);

	$sqltt = "update `login` set `Account`='Basic Plan' where `Company Name`='" . $coynam . "' AND `Email`='" . $himail . "'";
	mysqli_query($conn, $sqltt);
  } else if($onibara == "ent") {
	$regdate = date('Y-m-d');
    $date = date('Ymd');
    $newDate = strtotime($date.' + 30 days');
    $duedate= date('Ymd', $newDate);

	$sqlt = "update `company info` set `Paid`=1, `regdate`='" .$regdate. "', `duedate`='" .$duedate. "', `Type`='Enterprise Plan' where `Company Name`='" . $coynam . "' AND `Email`='" . $himail . "'";
	mysqli_query($conn, $sqlt);

	$sqltt = "update `login` set `Account`='Enterprise Plan' where `Company Name`='" . $coynam . "' AND `Email`='" . $himail . "'";
	mysqli_query($conn, $sqltt);
  }
 }
} 

$sql="SELECT * FROM `company info`"; // WHERE `Company Name`='" . $_SESSION['company'] . "'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);

$tot  = mysqli_num_rows($result);

if($tot==0)
{
//  require_once 'registerr.php';
  header("location:href='#' id='download-button' onclick='openRForm()'");
} else {

?>
	
<?php
if (isset($_SESSION['user_id']))
{
  require_once 'dashboard.php';
} else {
?>

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
<div align="center"><?php echo '<font style="font-size: 10pt; font-weight: 700" face="Verdana" color="#FF0000">' . $_REQUEST['tval'] . '</font>'; ?></div>
<body>
	<div align="center" class="limiter">
		<div align="center" class="container-login100X" style="padding: 2; height:450px; background:url(images/logo2.png) center;">
			<div align="center" class="wrap-login100">
			<?php 
             if ($_REQUEST['forgotpass'] and $_REQUEST['forgotpass'] ==1)
             {
			?>
				<div align="center" class="login100-form-title" style="background-image: url(images/bgg.png);">
					<span align="center" class="login100-form-title-1">
						Forgot Password
					</span>
				</div>
              <form method="POST" action="transact-user.php">

                <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
					<span class="label-input100">Enter Email</span>
					<input class="input100" type="text" name="femail" placeholder="Enter username" autocomplete="off" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$">
					<span class="focus-input100"></span>
                </div>
                <div align="center" class="container-login100-form-btnX">
					<input type="submit" class="login100-form-btn" name="action" value="Get Password"/>
                </div>
              </form>
              <p>
            <?php
               echo "<a title='Click here to go back to LOGIN!' class='btn' href='index.php'>Ignore this? Click To Login</a>";
             } else {
            ?>
				<div align="center" class="login100-form-title" style="background-image: url(images/bgg.png);">
					<span align="center" class="login100-form-title-1">
						User Login
					</span>
				</div>

				<form class="validate-form" method="post" action="transact-user.php">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Coop name is required">
						<span class="label-input100">Cooperative Name</span>
						<input class="input100" type="text" name="uname" placeholder="Enter Your Cooperative Name" autocomplete="off">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="imail" placeholder="Enter Your Email" autocomplete="off">
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

					<div align="center" class="container-login100-form-btnX">
					  <input type="submit" class="login100-form-btn" name="action" value="Login"/>
					  <a href="index.php?forgotpass=1" class="btn">Forgot Login Detail?</a> OR <a href="#" id="download-button" onclick="openRForm()" class="btn">Not Signed Up Yet?</a>
					</div>
				</form>
				<?php
                 }
                ?>
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
