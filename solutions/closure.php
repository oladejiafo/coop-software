<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
 if ($_SESSION['access_lvl'] != 4 & $_SESSION['access_lvl'] != 2){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 1; URL=index.php?redirect=$redirect");
}
}

 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';

@$Tit=$_SESSION['Tit'];
@$acctno=$_REQUEST['acctno'];
@$tval=$_REQUEST['tval'];

$sql="SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND `Membership Number`='$acctno'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);
@$id=$row['ID'];

list($cp, $fld) = explode(' ', $_SESSION['company']);
$cpfolder=$cp . $fld;
?>

<script src="../lib/jquery.js"></script>
<script src="../dist/jquery.validate.js"></script>

<script>


$().ready(function() {
	// validate the comment form when it is submitted
	$("#commentForm").validate();

});
</script>
<!-- load jquery ui css-->
<link href="js/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<!-- load jquery library -->
<script src="js/jquery-1.9.1.js"></script>
<!-- load jquery ui js file -->
<script src="js/jquery-ui.min.js"></script>

<title>Account Closure | Cooperatives Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Account Closure</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="closure.php">
										<i class="fa fa-user"></i>
									</a>
								</li>
								<li><span>Records</span></li>
							</ol>
					
							&nbsp;
						</div>
					</header>


		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="assets/vendor/dropzone/css/basic.css" />
		<link rel="stylesheet" href="assets/vendor/dropzone/css/dropzone.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
		<link rel="stylesheet" href="assets/vendor/summernote/summernote.css" />
		<link rel="stylesheet" href="assets/vendor/summernote/summernote-bs3.css" />
		<link rel="stylesheet" href="assets/vendor/codemirror/lib/codemirror.css" />
		<link rel="stylesheet" href="assets/vendor/codemirror/theme/monokai.css" />


<div align="center">

					<!-- start: page -->
						<div class="row">
							<div class="col-xs-12">
								<section class="panel">
									<header class="panel-heading">
										<h2 class="panel-title"></h2>
									</header>
									<div class="panel-body">

<form action="closure.php" method="post">	
        Enter Account Number:
        <input type="text" name="acctno"  style="width:120px; height:35; background-color:#E9FCFE; font-size: 15pt">  
&nbsp;
       <input name="go" type="submit" value="Search" align="top" style="height:35; color:#008000; font-size: 15pt">
</form>

<p><b><font color="#FF0000" style="font-size: 9pt"><?php echo $tval ; ?></font></b> </p>

<form method="post" action="submitreg.php" enctype="multipart/form-data">
<div align="center">
<div align="leftt" style="margin-left:20px;" class="agileinfo_mail_grids">

<div width="70%" align="left">
      <span class="input input--chisato" style="vertical-align:bottom">
<div style="vertical-align:bottom">
<span>
<?php
  if (file_exists("images/pics/" .$cpfolder. "/" . $id . ".jpg")==1)
  { 
?>
              <img border="1" src="images/pics/<?php echo $cpfolder;?>/<?php echo $id; ?>.jpg" width="100" height="120">
<?php
  } else { 
?>
              <img border="1" src="images/pics/pix.jpg" width="100" height="120">	 
<?php
  } 
?>
</span>
</div>
</span>


      <span class="input input--chisato">
<div style="vertical-align:bottom">
<span>
<?php
  if (file_exists("images/sign/cl_" . $id . ".jpg")==1)
  { 
?>
              <img border="1" src="images/sign/cl_<?php echo $id; ?>.jpg" width="140" height="90">
<?php
  } else { 
?>
              <img border="1" src="images/sign/sign.jpg" width="140" height="90">	 
<?php
  } 
?>			 
</span>
<input type="hidden" name="id" value="<?php echo @$_REQUEST['id'];?>">
</div>
</span>

<fieldset style="padding: 2">
<legend><b><i><font size="2" face="Tahoma" color="green">Account Information</font></i></b></legend>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Account Number:</span>
	</label>
        <input type="text" name="acctno" size="31"  value="<?php echo @$row['Account Number']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
        <input type="hidden" name="id" size="31" value="<?php echo $row['ID']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Account Type:</span>
	</label>
        <input type="text" name="type" size="31"  value="<?php echo @$row['Account Type']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">First Name:</span>
	</label>
        <input type="text" name="fname" size="31" value="<?php echo $row['First Name']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Surname:</span>
	</label>
        <input type="text" name="sname" size="31" value="<?php echo $row['Surname']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Account Opening Date:</span>
	</label>
       <input type="text" size="31" name="regdate" value="<?php echo $row['Date Registered']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Account Status:</span>
	</label>
       <input type="text" size="31" name="status" value="<?php echo $row['Status']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
 </fieldset>
 <br>
<fieldset style="padding: 2">
<legend><b><i><font size="2" face="Tahoma" color="green">Account Closure</font></i></b></legend>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Account Closure Date:</span>
	</label>
       <input id="inputField" type="text" name="closedate"  class="input__field input__field--chisato" placeholder=" " value="<?php if($row['Closure Date']) { echo date('d-m-Y',strtotime($row['Closure Date'])); } else { echo date('d-m-Y'); } ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Current Account Balance:</span>
	</label>
        <?php 
          $sqlb="SELECT * FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND `Account Number`='$acctno' order by `ID` desc";
          $resultb = mysqli_query($conn,$sqlb) or die('Could not look up user data; ' . mysqli_error());
          $rowb = mysqli_fetch_array($resultb); 
        ?>
       <input type="text" size="31" name="status" value="<?php echo $rowb['Balance']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Closure Reason:</span>
	</label>
        <textarea  class="input__field input__field--chisato" placeholder=" " name="reason" rows="2" cols="65" ><?php echo $row['Closure Reason']; ?></textarea>
      </span>
 </fieldset>

<?php
 if (!$id){
?>
<?php } 
 else { ?>
  <input type="submit" value="Close Account" name="submit"> &nbsp;
<?php
} ?>
  </div>
</body>
</form>



									</div>
								</section>
							</div>
						</div>
<?php
require_once 'footer.php';
?>

