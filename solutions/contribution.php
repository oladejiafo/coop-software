<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 1) & ($_SESSION['access_lvl'] != 4) & ($_SESSION['access_lvl'] != 7))
{
 if ($_SESSION['access_lvl'] != 5){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=indexx.php?redirect=$redirect");
}
}

 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';

@$Tit=$_SESSION['Tit'];
@$acctno=$_REQUEST['acctno'];
 @$id=$_REQUEST['idd'];
@$tval=$_REQUEST['tval'];
?>

<script language="JavaScript">
function checkForm()
{
   var cbillamt, camount, cdeduction;
   with(window.document.form1)
   {
      cbillamt   = billamt;
      camount    = amount;
      cdeduction = deduction;
   }

   if(!isNumeric(trim(camount.value)))
   {
      alert('Invalid amount. Do not put a coma');
      camount.focus();
      return false;
   }   
   else if(!isNumeric(trim(cbillamt.value)))
   {
      alert('Invalid amount. Do not put a coma');
      cbillamt.focus();
      return false;
   }
   else if(!isNumeric(trim(cdeduction.value)))
   {
      alert('Invalid amount. Do not put a coma');
      cdeduction.focus();
      return false;
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

	function isNumeric(sText, decimalAllowed) {
		if (sText.length == 0) return false;
		var validChars = "";
		if (decimalAllowed) {
			validChars = "0123456789.";
		} else {
			validChars = "0123456789";
		}
		var isNumber = true;
		var charA;
		var decimalCount = 0;
		for (i = 0; i < sText.length && isNumber == true && decimalCount < 2; i++) {
			charA = sText.charAt(i); 
			if (charA == ".") { 
				decimalCount += 1;
			}
			if (validChars.indexOf(charA) == -1) {
			isNumber = false;
			}
		}
		return isNumber;
	}

function validateNumber(evt) {
    var e = evt || window.event;
    var key = e.charCode || e.keyCode || e.which;

    if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
    // numbers   
    key >= 48 && key <= 57 ||
    // Numeric keypad
    key >= 96 && key <= 105 ||
    // Backspace and Tab and Enter
    key == 8 || key == 9 || key == 13 ||
    // Home and End
    key == 35 || key == 36 ||
    // left and right arrows
    key == 37 || key == 39 ||
    // Del and Ins
    key == 46 || key == 45 || key == 47 || key == '.') {
        // input is VALID
    }
    else {
        // input is INVALID
        e.returnValue = false;
        if (e.preventDefault) e.preventDefault();
    }
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

<title>Contributions | Cooperatives Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Periodic Contributions</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="contribution.php">
										<i class="fa fa-usd"></i>
									</a>
								</li>
								<li><span>COOPERATIVE</span></li>
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

<form action="contribution.php" method="post">
        <input type="text" name="acctno" placeholder="Enter Membership Number" style="width:250px;height:45px;font-size:16px" value="<?php echo @$row['Account Number']; ?>">  
        <input type="submit" name="go"  style="width:150px;height:45px;font-size:16px" value="Search" />
</form>	
<legend></legend>

<div align="center">
<div align="leftt" style="margin-left:20px;" class="agileinfo_mail_grids">
<form action="submitcontri.php" method="post">
<?php
 @$id=$_REQUEST["idd"];
 @$acctno=$_REQUEST["acctno"];
$sql="SELECT * FROM `contributions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID`='$id'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);

$sql2="SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Membership Number`='$acctno'";
$result2 = mysqli_query($conn,$sql2) or die('Could not look up user data; ' . mysqli_error());
$row2 = mysqli_fetch_array($result2); 
?>
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
		<span class="input__label-content input__label-content--chisato">Membership Number:</span>
	</label>
        <input type="hidden" name="id" size="31" value="<?php echo @$row['ID']; ?>">
        <input type="hidden" name="trans" size="31" value="<?php echo @$trans; ?>">		
        <input type="text" name="acctno" size="25" value="<?php echo @$row2['Membership Number']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Membership Type:</span>
	</label>
	<input type="text" name="type" size="15" value="<?php echo @$row2['Membership Type']; ?>"  class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Entered By:</span>
	</label>
	<input type="text" name="enteredby" size="25" value="<?php echo strtoupper($_SESSION['name']); ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Agent/Collector:</span>
   </label>
   <?php 
   if ($_SESSION['access_lvl'] == 7) 
   {?>
      <input type="text" readonly="readonly" name="agent" size="25" value="<?php echo strtoupper($_SESSION['name']); ?>" class="input__field input__field--chisato" placeholder=" " style="background-color:#eeeeee">
   <?php
   } else {
   ?>
         <select name="agent"  class="input__field input__field--chisato" placeholder=" " value="<?php echo @$row['Agent']; ?>" required>
          <option selected><?php echo @$row['Agent']; ?></option>
          <?php  
         	$sqlt = "SELECT `Agent` FROM `agents` WHERE `Company` ='" .$_SESSION['company']. "' ORDER BY Agent;";
        	$resultt = mysqli_query($conn,$sqlt) or die('Invalid query: ' . mysqli_error());
        	while ($rows = mysqli_fetch_array($resultt))
			{
			  echo " <option>" . $rows['Agent'] . "</option>\n";
			}
          ?> 
         </select>
   <?php
    }
   ?>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Amount Collected:</span>
	</label>
	<input id="numbersOnly" pattern="[0-9.]+" type="text" name="amount" size="25" value="<?php echo @$row['Amount']; ?>" onkeypress="return isNumber(event)" class="input__field input__field--chisato" placeholder=" " required> 
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Contribution Date:</span>
	</label>
        <input id="inputField" type="text"  class="input__field input__field--chisato" placeholder=" " name="date" value="<?php echo date('d-m-Y'); ?>">
        <?php 
          $sqlb="SELECT * FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno' order by `ID` desc";
          $resultb = mysqli_query($conn,$sqlb) or die('Could not look up user data; ' . mysqli_error());
          $rowb = mysqli_fetch_array($resultb); 
        ?>
         <input type="hidden" name="balance" size="25" value="<?php echo $rowb['Balance']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Payment Mode:</span>
	</label>        
         <select name="paymode"  class="input__field input__field--chisato" placeholder=" " value="<?php echo @$row['Pay Mode']; ?>">
          <?php  
           echo '<option selected>' .$row['Pay Mode']. '</option>';
           echo '<option>Cash</option>';
           echo '<option>Cheque</option>';
           echo '<option>Bank Transfer</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
<?php
if (!$id){
?>
  <input type="submit" value="Save" name="submit" style="height:40;width:120"> &nbsp;
<?php } 
 else { ?>
  <input type="submit" value="Update" name="submit" style="height:40;width:120"> &nbsp;  
  <input type="submit" value="Delete" name="submit" onclick="return confirm('Are you sure you want to Delete?');" style="height:40;width:120"> &nbsp;
<?php
} ?>
      </span>
  </div>
</body>
</form>

<p>&nbsp;</p>
<div class="div-table">
<form action="contribution.php" method="post">
 <select name="cmbFilter" style="height:40;width:160;font-size:12px">
  <?php  
   echo '<option selected>All Transactions</option>';
   echo '<option value="Date">Date</option>';
   echo '<option value="Account Number">Membership Account</option>';
   echo '<option value="Agent">By Agent</option>';
  ?> 
 </select> &nbsp;
       <input type="text" name="filter" id="inputField2" style="height:40;width:120"> &nbsp;
       <input type="submit" value="Filter" name="submit" style="height:40;width:80">&nbsp;&nbsp;&nbsp;
</form>

 <?php
 @$cmbFilter=$_POST['cmbFilter'];
@$filter=$_POST['filter'];
 @$tval=$_GET['tval'];
 $limit      = 3;
 @$page=$_GET['page'];
 
 if($cmbFilter=="All Transactions" OR $cmbFilter=="" OR empty($cmbFilter))
 {
    $cmbFilter="Account Number";
 }
 if($filter=="" OR empty($cmbFilter))
 {
    $filter="%"  ;
 }
 //  $query_count = "SELECT * FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='" . $acctno . "' AND `Agent`strtoupper($_SESSION['name'])";

 if($cmbFilter=="Date")
 {
    list($dd, $mm, $yy) = explode("-", $filter);
    $filterr=$yy . "-" .$mm. "-" .$dd;

   $query_count = "SELECT * FROM `contributions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Date` = '" .$filterr. "' AND `Agent` = '" .strtoupper($_SESSION['name']). "'";
 } else {
   $query_count = "SELECT * FROM `contributions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `" .$cmbFilter. "` like '" .$filter. "%' AND `Agent` = '" .strtoupper($_SESSION['name']). "'";
 } 
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);
?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:100%'><b><font color='#FF0000' style='font-size: 10pt'> RECENT TRANSACTIONS</font></b></div>
  </div>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:14.2%'>S/No</div>
    <div  class="cell" style='width:14.2%'>Transaction Date</div>
    <div  class="cell" style='width:14.2%'>Membership Number</div>
    <div  class="cell" style='width:14.2%'>Member Name</div>
    <div  class="cell" style='width:14.2%'>Amount </div>
    <div  class="cell" style='width:14.2%'>Agent</div>
    <div  class="cell" style='width:14.2%'>&nbsp;</div>
  </div>
<?php
 if($cmbFilter=="Date")
 {
   list($dd, $mm, $yy) = explode("-", $filter);
   $filterr=$yy . "-" .$mm. "-" .$dd;
   $query = "SELECT `ID`,`Date`,`Account Number`,`Amount`,`First Name`,`Surname`,`Agent` FROM `contributions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Date` = '" .$filterr. "' AND `Agent` = '" .strtoupper($_SESSION['name']). "' order by `Surname`,`ID` desc LIMIT 0, $limit";
 } else {
   $query = "SELECT `ID`,`Date`,`Account Number`,`Amount`,`First Name`,`Surname`,`Agent` FROM `contributions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `" .$cmbFilter. "` like '" .$filter. "%' AND `Agent` = '" .strtoupper($_SESSION['name']). "' order by `Surname`,`ID` desc LIMIT 0, $limit";
 }  
//   $query = "SELECT `ID`,`Date`,`Account Number`,`Deposit`,`Withdrawal`,`Transaction Type` FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='" . $acctno . "' order by `ID` desc LIMIT 0, $limit";
   $resultp=mysqli_query($conn,$query);
   
$i=0;
    while(list($idd,$datex,$acctnum,$amtt,$fname,$sname,$agnt)=mysqli_fetch_row($resultp))
    { 
      $name=$fname . ' ' . $sname;

     $deppamt=number_format($amtt,2);
     $i=$i+1;

     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:14.2%">' .$i. '</div>
        <div  class="cell" style="width:14.2%">' .$datex. '</div>
        <div  class="cell" style="width:14.2%"><a href = "contribution.php?idd=' . $idd . '&acctno=' .$acctnum. '">' .$acctnum. '</a></div>
        <div  class="cell" style="width:14.2%">' .$name. '</div>
        <div  class="cell" style="width:14.2%">' .$deppamt. '</div>
        <div  class="cell" style="width:14.2%">' .$agnt.  '</div>
        <div  class="cell" style="width:14.2%">&nbsp;</div>
      </div>';
    }
?>
</div>



									</div>
								</section>
							</div>
						</div>

<?php
require_once 'footer.php';
?>
