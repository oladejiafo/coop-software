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
	height:65px;
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

<title>Shares Management | Cooperative Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Shares Management</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="shares.php">
										<i class="fa fa-exchange"></i>
									</a>
								</li>
								<li><span>Members</span></li>
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
<div align="leftt" style="margin-left:20px;font-size:12px" class="agileinfo_mail_grids">
 
<?php
$sql="SELECT * FROM `shares` WHERE `Company` ='" .$_SESSION['company']. "'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result); 
#     $minSHp=$rowSh['Min Share'];
#     $minSH=($rowSh['Min Share'] * $rowSh['Total Available'])/100;
$maxshares=number_format(($row['Max Share'] * $row['Total Available'])/100) . " (" .$row['Max Share'] . "%)"; 
$shares=number_format(($row['Min Share'] * $row['Total Available'])/100) . " (" .$row['Min Share'] . "%)"; 
$unshared=number_format(($row['Total Left'] * $row['Total Available'])/100) . " (" .$row['Total Left'] . "%)"; 
$sharesX=($row['Min Share']/100)*$row['Total Available']; 
$sharesV=($sharesX * $row['Unit Cost']); 
?>

      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Total Available Shares:</span>
	</label>
       <input type="text" name="fname" size="25" value="<?php echo number_format($row['Total Available']); ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Unit Share Value:</span>
	</label>
          <input type="text" size="25" name="sname" value="<?php echo number_format($row['Unit Cost'],2); ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Maximum Shares Per Member (%):</span>
	</label>
        <input type="hidden" name="id" size="31" value="<?php echo @$row['ID']; ?>">	
        <input type="text" name="acctnum" size="25" value="<?php echo $maxshares; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Minimum Shares Per Member (%):</span>
	</label>	
        <input type="text" name="acctnum" size="25" value="<?php echo $shares; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Total Shares Alloted:</span>
	</label>
<?php
$sqlT="SELECT sum(`No of Shares`) as TOTS FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "'";
$resultT = mysqli_query($conn,$sqlT) or die('Could not look up user data; ' . mysqli_error());
$rowT = mysqli_fetch_array($resultT); 
$allot=$rowT['TOTS'];
?>
        <input type="text" name="type" size="25" value="<?php echo number_format($allot); ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Total Un-Alloted (%):</span>
	</label>
        <input type="text" name="type" size="25" value="<?php echo $unshared; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
  </div>
</body>

<p>&nbsp;</p>
<div class="div-table">
 <?php
 @$tval=$_GET['tval'];
 $limit      = 50;
 @$page=$_GET['page'];
 if(empty($acctno) OR $acctno=="") 
{
  $acctno="XYZ0099";
}
   $query_count = "SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND `Status`='Active'";
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);
?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:100%'><b><font color='#FF0000' style='font-size: 10pt'>MEMBERS SHARES ALLOTMENT</font></b></div>
  </div>
<?php
if($_POST['midd'] && $_POST['jnx']=="X1x")
{
     $totMval=$_POST['mshares'] * $row['Unit Cost'];
     $query_update = "UPDATE `membership` SET `No of Shares` = '" .$_POST['mshares']. "',`Shares Value` = '" .$totMval. "' WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = '" .$_POST['midd']. "'";
     $result_update = mysqli_query($conn,$query_update);
}
if($_REQUEST['mid'] OR $_REQUEST['midd'])
{
  $mid=$_REQUEST['mid'];

   $queryQ = "SELECT `ID`,`Membership Number`,`Surname`,`First Name`,`No of Shares`,`Shares Value`,`Date Registered` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID`='$mid'";
   $resultQ=mysqli_query($conn,$queryQ);
   $rowQ = mysqli_fetch_array($resultQ); 
?>

<!-- load jquery library -->
<script src="js/jquery-1.7.1.min.js"></script>

<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" />
<script src='jsx/jquery.min.js'></script>

<!-- load jquery ui css-->
<link href="js/jquery-ui.min.css" rel="stylesheet" type="text/css" />

<!-- load jquery ui js file -->
<script src="js/jquery-ui.min.js"></script>

<script type="text/javascript">
$(function() {
    var availableTags = <?php include('autocompletex.php'); ?>;
    $("#enroox").autocomplete({
        source: availableTags,
        autoFocus:true
    });
});
</script>
  <div class="tab-row" style="font-weight:bold">
    <div class="cell" style='width:100%'>
      <form action="addshares.php" method="POST">
        <span>
          Member Name: <input type="text" width="130px" readonlyX="readonly" autocomplete="on" id="enroox" name="names" value="<?php echo $rowQ['First Name'] . ' ' .$rowQ['Surname'];?>">
											 <input type="hidden" name="midd" value="<?php echo $mid;?>">
											 <input type="hidden" name="stNum" value="<?php echo $rowQ['Membership Number'];?>">
											 <input type="hidden" name="id" value="<?php echo $row['ID'];?>">
                       <input type="hidden" name="jnx" value="X1x">
				</span>
				<?php
				if($rowQ['No of Shares']) 
				{
				?>
        <span>
          Total Shares: <input type="text" width="80px" name="mshares" value="<?php if($rowQ['No of Shares']) {echo $rowQ['No of Shares'];} else { echo $sharesX;}?>">
        </span>
        <span>
				Shares Value: <input type="text" width="80px" name="mvalue" value="<?php echo ($rowQ['No of Shares'] * $row['Unit Cost']);?>">
				</span>
				<?php
				} else {
					echo '
					<span>
           Unit Shares: <input type="text" width="80px" name="mshares" value="'.$sharesX.'">
					</span>
					<span>
           Shares Value: <input type="text" width="80px" name="mvalue" value="'.$sharesV.'">
				  </span>
					';
				}
				?>
        <span>
          <?php
          if(isset($rowQ['ID']))
          {?>
            <button class="btn btn-success" title="Update" width="40px" name="submit" value="Update" name="submit"><i class="fa fa-check"></i></button>
            <button class="btn btn-danger" title="Delete" width="40px" name="submit" value="Delete" name="submit"><i class="fa fa-trash"></i></button>
          <?php
          } else { 
          ?>
           <button class="btn btn-info" title="Save" width="40px" name="submit" value="Save" name="submit"><i class="fa fa-check"></i></button>
          <?php
          }
					?>
					<button class="btn btn-warning" title="Cancel" width="40px" name="submit" value="Cancel" name="submit"><i class="fa fa-times"></i></button>

        </span>
      </form>
    </div>
  </div>
<?php
}
?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell" style='width:14.2%;height:60px'>S/No</div>
    <div  class="cell" style='width:14.2%;height:60px'>Membership Number</div>
    <div  class="cell" style='width:14.2%;height:60px'>Name</div>
    <div  class="cell" style='width:14.2%;height:60px'>Unit Shares Allotted</div>
    <div  class="cell" style='width:14.2%;height:60px'>Total Shares Value</div>
    <div  class="cell" style='width:14.2%;height:60px'>Date Registered</div>
    <div  class="cell" style='width:14.2%;height:60px'>&nbsp;</div>
  </div>
<?php
   $query = "SELECT `ID`,`Membership Number`,`Surname`,`First Name`,`No of Shares`,`Shares Value`,`Date Registered` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND `Status`='Active' order by `ID` desc LIMIT 0, $limit";
   $resultp=mysqli_query($conn,$query);
   
$i=0;
$TOTvalu=0;
$TOTshares=0;
    while(list($idd,$mnum,$sname,$fname,$share,$valu,$date)=mysqli_fetch_row($resultp))
    { 
      $name=$fname . ' ' . $sname;

     $valuu=number_format($valu,2);
     $shares=number_format($share);
     $i=$i+1;

     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:14.2%">' .$i. '</div>
        <div  class="cell" style="width:14.2%">' .$mnum. '</div>
        <div  class="cell" style="width:14.2%">' .$name. '</div>
        <div  class="cell" style="width:14.2%">' .$shares. '</div>
        <div  class="cell" style="width:14.2%">' .$valuu. '</div>
        <div  class="cell" style="width:14.2%">' .$date.  '</div>
        <div  class="cell" style="width:14.2%"><a href="shares.php?mid=' .$idd. '"><i class="fa fa-edit"></i> Manage</a></div>
      </div>';
		}
//		echo '<div class="tab-row"><div  class="cell" style="width:100%"><a href="shares.php?midd=1"><i class="fa fa-pencil"></i> Add New Shares</a></div></div>';
?>
</div>
</fieldset>



									</div>
								</section>
							</div>
						</div>

<?php
require_once 'footer.php';
?>