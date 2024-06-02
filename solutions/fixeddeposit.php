<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 2) & ($_SESSION['access_lvl'] != 1) & ($_SESSION['access_lvl'] != 3) & ($_SESSION['access_lvl'] != 4) & ($_SESSION['access_lvl'] != 6) & ($_SESSION['access_lvl'] != 7))
{
 if ($_SESSION['access_lvl'] != 5){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");
}
}

 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';

@$Tit=$_SESSION['Tit'];
@$tval=$_REQUEST['tval'];
 @$acctno=$_REQUEST["acctno"];

 list($cp, $fld) = explode(' ', $_SESSION['company']);
 $cpfolder=$cp . $fld;
?>
<script src="../lib/jquery.js"></script>
<script src="../dist/jquery.validate.js"></script>

<script>

$().ready(function() {
	// validate the comment form when it is submitted
	$("#commentForm").validate();

	// validate signup form on keyup and submit
	$("#signupForm").validate({
		rules: {
			firstname: "required",
			lastname: "required",
			username: {
				required: true,
				minlength: 2
			},
			password: {
				required: true,
				minlength: 5
			},
			confirm_password: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
			email: {
				required: true,
				email: true
			},
			topic: {
				required: "#newsletter:checked",
				minlength: 2
			},
			agree: "required"
		},
		messages: {
			firstname: "Please enter your firstname",
			lastname: "Please enter your lastname",
			username: {
				required: "Please enter a username",
				minlength: "Your username must consist of at least 2 characters"
			},
			password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			},
			confirm_password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long",
				equalTo: "Please enter the same password as above"
			},
			email: "Please enter a valid email address",
			agree: "Please accept our policy"
		}
	});

	// propose username by combining first- and lastname
	$("#username").focus(function() {
		var firstname = $("#firstname").val();
		var lastname = $("#lastname").val();
		if(firstname && lastname && !this.value) {
			this.value = firstname + "." + lastname;
		}
	});

	//code to hide topic selection, disable for demo
	var newsletter = $("#newsletter");
	// newsletter topics are optional, hide at first
	var inital = newsletter.is(":checked");
	var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
	var topicInputs = topics.find("input").attr("disabled", !inital);
	// show when newsletter is checked
	newsletter.click(function() {
		topics[this.checked ? "removeClass" : "addClass"]("gray");
		topicInputs.attr("disabled", !this.checked);
	});
});
</script>
<script language="JavaScript">
function checkForm()
{
   var camount, cbalance, cloang;
   with(window.document.form1)
   {
      camount    = amount;
      cbalance 	 = balance;
      cloang 	 = balance*2;
   }

   if(!isNumeric(trim(camount.value)))
   {
      alert('Invalid amount. Do not put a coma');
      camount.focus();
      return false;
   }   
   else if(trim(camount.value)>trim(cloang.value))
   {
     // alert('You cannot give more than 200% of the customer balance as loan');
     // camount.focus();
     // return false;
   }
   else
   {
      return true;
   }
}

function trim(str)
{
   return str.replace(/^\s+|\s+$/g,'');
}

function isEmail(str)
{
   var regex = /^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;

return regex.test(str);
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    console.log(charCode)
    if (charCode == 45 || charCode == 46 || charCode == 37 || charCode == 39) {
        return true;
    } else if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>


<!-- load jquery ui css-->
<link href="js/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<!-- load jquery library -->
<script src="js/jquery-1.9.1.js"></script>
<!-- load jquery ui js file -->
<script src="js/jquery-ui.min.js"></script>

<style type="text/css">
.div-table {
    width: 100%;
    border: 1px dashed #ff0000;
    float: left;
    padding:10px;
}

.tab-row {
	background-color: #EEEEEE;
	float: left;
	width: 100%;
	height:45px;
}

.cell {
    padding: 1px;
    border: 1px solid #e9e9e9;
    float: left;
    padding: 5px; 
    background-color: #f5f5f5;
    width: 50%;
    height:45px;
    font-size:12px;
}
</style>

<title>Fixed Deposits | Cooperatives Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Fixed Deposits Management</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="fixeddeposit.php">
										<i class="fa fa-money"></i>
									</a>
								</li>
								<li><span>F.Deposits</span></li>
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
<?php echo $_REQUEST['tval']; ?>
<form action="fixeddeposit.php" method="post">	
        Enter Account Number:
&nbsp;
        <input type="text" name="acctno" style="width:120px;height:35px" autocomplete="off">  
       &nbsp;<input type="submit" name="go" value="Fetch Account" style="width:150px;height:35px" />
</form>
<legend></legend>

<?php
   $query_count = "SELECT * FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='" . $acctno . "' AND `Status`='Active'";
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

if($totalrows>0)
{
?>
<p>&nbsp;</p>
<div class="div-table">
 <?php
 @$tval=$_GET['tval'];
 $limit      = 10;
 @$page=$_GET['page'];
if(empty($acctno) OR $acctno=="") 
{
  $acctno="XYZ0099";
}
?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:100%'><b><font color='#FF0000' style='font-size: 10pt'> AVAILABLE FIXED DEPOSIT(S) FOR <?php echo $acctno; ?></font></b></div>
  </div>
  <div class="tab-row" style="font-weight:bold;;height:60px">
    <div  class="cell" style='width:14.2%;height:55px'>Investment Date</div>
    <div  class="cell" style='width:14.2%;height:55px'>Total Investment</div>
    <div  class="cell" style='width:14.2%;height:55px'>Total Interest</div>
    <div  class="cell" style='width:14.2%;height:55px'>Liquidated Amount</div>
    <div  class="cell" style='width:14.2%;height:55px'>Balance</div>
    <div  class="cell" style='width:14.2%;height:55px'>Tenor</div>
    <div  class="cell" style='width:14.2%;height:55px'>Maturity Date</div>
  </div>
<?php
   $query = "SELECT `ID`,`Date`,`Account Number`,`Amount`,`Interest Amount`,`Interest Rate`,`Principal Liquidation`,`Balance`,`Tenor`,`Maturity Date` FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='" . $acctno . "' AND `Status`='Active' order by `ID` desc LIMIT 0, $limit";
   $resultp=mysqli_query($conn,$query);
   
    while(list($idd,$dated,$acctnod,$amtd,$iamtd,$irated,$pliqd,$bald,$tenord,$mdated)=mysqli_fetch_row($resultp))
    { 
     $amtdd=number_format($amtd,2);
     $iamtdd=number_format($iamtd,2);
     $pliqdd=number_format($pliqd,2);
     $baldd=number_format($bald,2);

     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:14.2%"><a href = "fixeddeposit.php?idd=' . $idd . '&acctno=' .$acctnod. '">' .$dated. '</a></div>
        <div  class="cell" style="width:14.2%">' .$amtdd. '</div>
        <div  class="cell" style="width:14.2%">' .$iamtdd. '('. $irated. ')</div>
        <div  class="cell" style="width:14.2%">' .$pliqdd. '</div>
        <div  class="cell" style="width:14.2%">' .$baldd.  '</div>
        <div  class="cell" style="width:14.2%">' .$tenord. '</div>
        <div  class="cell" style="width:14.2%">' .$mdated. '</div>
      </div>';
    }
?>
</div>
<?php
}
?>
<div align="leftt" style="margin-left:20px;" class="agileinfo_mail_grids">
 
<form action="submitfd.php" method="post" id="myform" name="form1">
<?php
 @$idd=$_REQUEST["idd"];
 @$acctno=$_REQUEST["acctno"];
 @$trans=$_REQUEST["trans"];

$sql="SELECT * FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID`='$idd'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);

$sql2="SELECT * FROM `customer` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno' and `Status`='Active'";
$result2 = mysqli_query($conn,$sql2) or die('Could not look up user data; ' . mysqli_error());
$row2 = mysqli_fetch_array($result2); 
$clt=$row2['Status'];  
if($clt=="Closed")
{ echo "ACCOUNT HAS BEEN CLOSED"; }

?>
<span class="input input--chisato" style="vertical-align:bottom">
<div style="vertical-align:bottom">
<span>
 <?php
  if (file_exists("images/pics/" .$cpfolder. "/" . $row2['ID'] . ".jpg")==1)
  { 
?>
              <img border="1" src="images/pics/<?php echo $cpfolder;?>/<?php echo $row2['ID']; ?>.jpg" width="100" height="120">&nbsp;&nbsp;
<?php
  } else { 
?>
              <img border="1" src="images/pics/pix.jpg" width="100" height="120">&nbsp;&nbsp;
<?php
  } 
?>
</span>
</div>
</span>
      <span class="input input--chisato" style="vertical-align:bottom">
<div style="vertical-align:bottom">
<span>
 <?php
  if(file_exists("images/sign/" .$cpfolder. "/" . $row2['ID'] . ".jpg")==1)
  { 
?>
              <img border="1" src="images/sign/<?php echo $cpfolder;?>/<?php echo $row2['ID']; ?>.jpg" width="130" height="90">
<?php
  } else { 
?>
              <img border="1" src="images/sign/sign.jpg" width="130" height="90">	 
<?php
  } 
?>			 
</span>
</div>
</span>



      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">First Name:</span>
	</label>
       <input type="text" name="fname" size="25" value="<?php echo @$row2['First Name']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Surname:</span>
	</label>
          <input type="text" size="25" name="sname" value="<?php echo @$row2['Surname']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Account Number:</span>
	</label>
        <input type="hidden" name="id" size="31" value="<?php echo @$row['ID']; ?>">
        <input type="hidden" name="trans" size="31" value="<?php echo @$trans; ?>">		
        <input type="text" name="acctnum" size="25" value="<?php echo $acctno; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Account Type:</span>
	</label>
        <input type="text" name="type" size="25" value="<?php echo $row2['Account Type']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
        <?php 
          $sqlb="SELECT * FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno' order by `ID` desc";
          $resultb = mysqli_query($conn,$sqlb) or die('Could not look up user data; ' . mysqli_error());
          $rowb = mysqli_fetch_array($resultb); 
        ?>
         <input type="hidden" name="balanced" size="25" value="<?php echo $rowb['Balance']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Gender:</span>
	</label>
        <input type="text" name="gender" size="25" value="<?php echo $row2['Gender']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Account Status:</span>
	</label>
        <input type="text" name="status" size="25" value="<?php echo $row2['Status']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Account Officer:</span>
	</label>
        <input type="text" name="acctofficer" size="25" value="<?php echo $row2['Account Officer']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Operating Staff:</span>
	</label>
        <input type="text" name="officer" size="25" value="<?php echo strtoupper($_SESSION['name']); ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato"><font style="color:#990000"><b>Book Balance:</b></font></span>
	</label>
        <?php 
          $sqlb="SELECT * FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno' order by `ID` desc";
          $resultb = mysqli_query($conn,$sqlb) or die('Could not look up user data; ' . mysqli_error());
          $rowb = mysqli_fetch_array($resultb); 

         #echo "<b>" . $rowb['Balance'] . "</b>"; 
        ?>
        <input type="text" name="bookbal" size="20" value="<?php echo number_format($rowb['Book Balance'],2); ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee;color:#990000;font-size:13px;font-weight:bold">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato"><font style="color:#990000"><b>Available Balance:</b></font></span>
	</label>
        <?php 
          $sqlb="SELECT * FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno' order by `ID` desc";
          $resultb = mysqli_query($conn,$sqlb) or die('Could not look up user data; ' . mysqli_error());
          $rowb = mysqli_fetch_array($resultb); 

         #echo "<b>" . $rowb['Balance'] . "</b>"; 
        ?>
        <input type="text" name="bal" size="20" value="<?php echo number_format($rowb['Balance'],2); ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee;color:#990000;font-size:13px;font-weight:bold">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Investment Date:</span>
	</label>
        <input id="inputField" type="text" size="20" name="date" value="<?php if($row['Date']) { echo $row['Date']; } else { echo date('d-m-Y'); } ?>" class="input__field input__field--chisato" placeholder=" "  required>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Fixed Deposit Tenor:</span>
	</label>
         <select name="tenor" size="1" value="<?php echo @$row['Tenor']; ?>" class="input__field input__field--chisato" placeholder=" " required>
           <option selected><?php echo @$row['Tenor']; ?></option>
           <option>1 Month</option>
           <option>3 Months</option>
           <option>6 Months</option>
           <option>12 Months</option>
         </select>
      </span>
  <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Amount:</span>
	</label>
    <input type="hidden" name="initamt" size="25" value="<?php echo @$row['Amount']; ?>"> 
    <input type="text" name="amount" size="20" value="<?php echo @$row['Amount']; ?>" onkeypress="return isNumber(event)" class="input__field input__field--chisato" placeholder=" " required> 
  </span>
<?php
if($row['ID'])
{
?>
  <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Interest Rate:</span>
	</label>
    <input type="text" name="intrate" size="20" value="<?php echo @$row['Interest Rate']; ?>" onkeypress="return isNumber(event)" class="input__field input__field--chisato" placeholder=" " required> 
  </span>
  <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Interest Amount:</span>
	</label>
    <input type="text" name="intamount" size="20" value="<?php echo @$row['Interest Amount']; ?>" onkeypress="return isNumber(event)" class="input__field input__field--chisato" placeholder=" " required> 
  </span>
  <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Maturity Date:</span>
	</label>
    <input type="text" name="mdate" size="20" value="<?php echo @$row['Maturity Date']; ?>" id="inputFieldC" class="input__field input__field--chisato" placeholder=" " required> 
  </span>
  <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">WHT:</span>
	</label>
    <input type="text" name="wht" size="20" value="<?php echo @$row['WHT']; ?>" onkeypress="return isNumber(event)" class="input__field input__field--chisato" placeholder=" " required> 
  </span>
  <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Balance:</span>
	</label>
    <input type="text" name="balance" size="20" value="<?php echo @$row['Balance']; ?>" onkeypress="return isNumber(event)" class="input__field input__field--chisato" placeholder=" " required> 
  </span>
  <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Other Charges:</span>
	</label>
    <input type="text" name="ocharges" size="20" value="<?php echo @$row['Other Charges']; ?>" onkeypress="return isNumber(event)" class="input__field input__field--chisato" placeholder=" " required> 
  </span>

  <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Principal Liquidation:</span>
	</label>
    <input type="text" name="pliq" size="20" value="<?php echo @$row['Principal Liquidation']; ?>" onkeypress="return isNumber(event)" class="input__field input__field--chisato" placeholder=" " required> 
  </span>
  <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Liquidation Date:</span>
	</label>
    <input type="text" name="liqdate" size="20" value="<?php echo @$row['Liquidation Date']; ?>" id="inputFieldB" class="input__field input__field--chisato" placeholder=" " required> 
  </span>
  <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Liquidation Charges:</span>
	</label>
    <input type="text" name="liqcharges" size="20" value="<?php echo @$row['Liquidation Charges']; ?>" onkeypress="return isNumber(event)" class="input__field input__field--chisato" placeholder=" " required> 
  </span>
  <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Interest Payout:</span>
	</label>
    <input type="text" name="intpayout" size="20" value="<?php echo @$row['Interest Payout']; ?>" onkeypress="return isNumber(event)" class="input__field input__field--chisato" placeholder=" " required> 
  </span>
<?php
}
?>
  <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Fixed Deposit Code:</span>
	</label>
    <input type="text" name="fid" size="20" value="<?php echo $row['FID']; ?>" class="input__field input__field--chisato" placeholder=" ">
  </span>
      <span class="input input--chisato">
<?php
if($row2['Status']=="Active")
{
if (!$idd){
?>
  <input type="submit" value="Submit" name="submit" style="height:40;width:120;  font-size: 13pt"> &nbsp;
<?php } 
 else { ?>
  <input type="submit" value="Modify" name="submit" style="height:40;width:80; font-size: 13pt"> &nbsp;  
  <input type="submit" value="Delete" name="submit" style="height:40;width:80;  font-size: 13pt" onclick="return confirm('Are you sure you want to Delete?');"> &nbsp;
  <input type="submit" value="Close" name="submit" style="height:40;width:80; font-size: 13pt"> &nbsp;
<?php
}} ?>                
      </span>
  </div>
</body>
</form>

</fieldset>



									</div>
								</section>
							</div>
						</div>

<?php
if($_REQUEST['tval']=="Your record has been saved.")
{
  echo "<script>alert('Transaction Successful!');</script>";
}
if($_REQUEST['tval']=="Your record has been updated.")
{
  echo "<script>alert('You Have Successfully Modified The Transaction');</script>";
}
require_once 'footer.php';
?>