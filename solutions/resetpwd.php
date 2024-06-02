<?php
 require_once 'header.php';
 require_once 'conn.php';
 require_once 'style.php';

@$epz=$_REQUEST['epz'];

@$id=md5($_REQUEST['id']);

@$tval=$_REQUEST['tval'];



$sql="SELECT * FROM `login` WHERE `email`='" . $epz . "' AND `Company` ='" .$_SESSION['company']. "'";

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

<title>Reset | Cooperatives Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>My Password Reset</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="resetpwd.php">
										<i class="fa fa-lock"></i>
									</a>
								</li>
								<li><span></span></li>
							</ol>
					
							&nbsp;
						</div>
					</header>

<link rel="stylesheet" href="css/refreshform.css" />

<fieldset style="padding: 2; height:330px;background:url(css/images/logo2.png) center;">
<legend align='right'>
<?php 
if($_SESSION['access_lvl'] == 1 or $_SESSION['access_lvl'] == 2 or $_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] == 4 or $_SESSION['access_lvl'] == 5 or $_SESSION['access_lvl'] == 44)
{
# require_once 'uheader.php'; 
} else {
# echo "<a href='index.php'>Go To Home Page</a>";
}
?>
</legend>


<div align="center">

<div align="center" style="width:80%;margin-top:20px">
<form method="post" action="submitreset.php" enctype="multipart/form-data">

<div align="center">

  <font color=black><b>Your Username</b></font>:

<br>
  <input type="text" readonly="readonly" size="30" name="usernamex" maxlength="50" style="font-size:18px; background-color:silver; font-weight:bold" value="<?php echo $_SESSION['name']; ?>">

</div>
<div align="center">

  <font color=red>New Password</font>:

<br>

  <input type="password" id="passwd" style="width:200px; height:35px" name="passwd" maxlength="50" value="" required>

  <input type="hidden" size="30" name="username" maxlength="50" value="<?php echo $_SESSION['name']; ?>">

</div>

<div align="center">

  <font color=red>Re-type Password</font>:

 <br>

  <input type="password" id="passwd2" style="width:200px; height:35px" name="passwd2" maxlength="50" value="" required>

</div>

<div align="center">

  <input type="submit" value="Submit" name="submit" style="margin-top:20px;width:200px; height:35px;margin-left:50px;background-color:silver; font-size:24px"> &nbsp;

</div>

</form>
</div>

<?php
require_once 'footer.php';
?>
