<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['user_id']) & ($_SESSION['access_lvl'] != 5) & ($_SESSION['access_lvl'] != 4) & ($_SESSION['access_lvl'] != 6)  & ($_SESSION['access_lvl'] != 1) & ($_SESSION['access_lvl'] != 3))
{
 if ($_SESSION['access_lvl'] != 2){
#$tval="Sorry, but you don�t have permission to view this page! Login pls";
header("location:indexx.php?tval=$tval&redirect=$redirect");
}
}
 require_once 'header.php';
 require_once 'conn.php';
 require_once 'style.php';

@$Tit=$_SESSION['Tit'];
@$acctno=$_REQUEST['acctno'];
@$tval=$_REQUEST['tval'];
@$tvalg=$_REQUEST['tvalg'];
@$grp=$_REQUEST['grp'];
@$brch=$_REQUEST['brch'];

$sql="SELECT * FROM `customer` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno'";
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

</script>
<!-- load jquery ui css-->
<link href="js/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<!-- load jquery library -->
<script src="js/jquery-1.4.3.min.js"></script>
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

<script language="JavaScript">
function keyPress(e) {
    e = (e) ? e : window.event;
    var key = (e.which) ? e.which : e.keyCode;
    console.log(key)
    if (key == 32 || key ==20) {
        return false;
    }
    return true;
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
<!-- 	
<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.css" />
-->
<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>

<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"inputField",
			dateFormat:"%Y-%m-%d"

		});
		new JsDatePick({
			useMode:2,
			target:"inputFieldB",
			dateFormat:"%Y-%m-%d"

		});
    new JsDatePick({
			useMode:2,
			target:"inputFieldC",
			dateFormat:"%Y-%m-%d"

		});
	};
</script>

<!-- load jquery ui css-->
<link href="js/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<!-- load jquery library -->
<script src="js/jquery-1.4.3.min.js"></script>
<!-- load jquery ui js file -->
<script src="js/jquery-ui.min.js"></script>

<style type="text/css">
.ui-datepicker {
    padding: 0.2em 0.2em 0.2em 0.2em;
    width: 290px;
	font-size:15px;
	
}
.ui-datepicker select.ui-datepicker-month,
.ui-datepicker select.ui-datepicker-year {
    width: 49%;
    height:35px;
    color:black;
}

</style>

<script type="text/javascript" language="javascript">

        $(function() {
            $('#dob').datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: '1920:2030',
                dateFormat: 'yy-mm-dd',
                showButtonPanel: false,

                //firstDay: 1,
                onSelect: function(dateText, inst) {
                    var d = new Date((inst.input.val())); //d = new Date(Date.parse(inst.lastVal)); 
                    var diff = (new Date()).getFullYear() - d.getFullYear();
                    var m = (new Date()).getMonth() - d.getMonth();
                    if (m<0 || (m===1 && (new Date()).getDate() < d.getDate())) {
                      diff--;
                    }
                    document.getElementById('age').value = diff;

                }
            });
        });

</script>

<title>Customer Records | Thrift & Loans Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Customer Records</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="register.php">
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
<form action="register.php" method="post">	
        <i>To access existing account..</i> <br>Enter Account Number:

        <input type="text" autocomplete="off"  name="acctno" onBlur="filtery(this.value,this.form.code)" style="width:120px; height:35; background-color:#E9FCFE; font-size: 15pt">
&nbsp;
       <input name="go" type="submit" value="Search" align="top" style="height:35; color:#008000; font-size: 15pt">
</form>
<p><b><font color="#FF0000" style="font-size: 9pt"><?php echo $tval ; ?></font></b></p>

<?php
if(!$acctno and !$grp)
{
?>
<p>

<form method="post" action="submitreg.php">
<div align="center" style="font-size:12px">
<div align="leftt" style="margin-left:20px;" class="agileinfo_mail_grids">

<fieldset style="padding: 2; width:80%; align:center">
<legend><b><i><font size="3" face="Tahoma" color="green">Want to create new account?</font></i></b></legend>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="margin-left:40px" class="input__label-content input__label-content--chisato">Account Type/Category:</span>
	</label>       
        <select name="group" class="input__field input__field--chisato" placeholder=" " style="height:45;width:250px; background-color:#E9FCFE; font-size: 12px">
          <option selected>Individual</option>
	  <option>Group</option>
        </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="margin-left:40px" class="input__label-content input__label-content--chisato">Branch:</span>
	</label>   
        <select class="input__field input__field--chisato" placeholder=" " title="Select your branch here if trying to create a new account. To add a new location, go to control panel." name="brch" size="1" style="height:44;width:250px; background-color:#E9FCFE; font-size: 12px">
          <option selected></option>
          <?php  
         	$sqlt = "SELECT `Branch` FROM `branch` WHERE `Company` ='" .$_SESSION['company']. "' ORDER BY branch;";
        	$resultt = mysqli_query($conn,$sqlt) or die('Invalid query: ' . mysqli_error());
        	while ($rows = mysqli_fetch_array($resultt))
		{
		  echo " <option>" . $rows['Branch'] . "</option>\n";
		}
          ?> 
        </select>
      </span>
      <span style="margin-top:-40px;" class="input input--chisato">
        <input name="submit" type="submit" value="Continue" align="top" style="padding-bottom:20px;height:35;width:150px; font-size: 13pt">
    </span>

 </fieldset>
</div>
</form>
<p>&nbsp;</p>

<?php
} else {
?>

<?php
if($row['Group'] or $grp)
{
 if($row['Group'])
 {
   $grpp=$row['Group'];
 } else {
   $grpp=$grp;
 }
?>

  <div align="center">
    <b><font size="3" face="Tahoma"><?php echo strtoupper($grpp); ?> ACCOUNT</font></b>
  </div>

<?php
}
?>

<?php
if($row['Group']=="Group" or $grp=="Group")
{
?>
<form method="post" action="submitreg.php" enctype="multipart/form-data">
<p>&nbsp;</p>
<fieldset>
<legend><b><i><font size="2" face="Tahoma" color="green">Account Information</font></i></b></legend>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Account Number:</span>
	</label>
<?php
if (!$row['Account Number'])
{
  $sqlz = "SELECT `Branch Code` FROM `branch` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Branch`='$brch'";
  $resultz = mysqli_query($conn,$sqlz);
  $rowz = mysqli_fetch_array($resultz);
  $bcd=$rowz['Branch Code'];

  $sqlx = "SELECT `Account Number` as ACC, cast(`Account Number` as signed) as xyz FROM `customer` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number` like '%30' order by xyz desc limit 0,1";
  $resultx = mysqli_query($conn,$sqlx);
  $rowx = mysqli_fetch_array($resultx);
  $ann=$rowx['xyz'];
  $amm=$rowx['ACC'];

 $pr="000";
 $ps="30";

#$amm="0000012330";
  $mpr=substr($ann,0,3);
  $mps=substr($ann,6,4);
  $mann=substr($amm,3,5);

$anns=$mann+1;   
if(strlen($anns)==3)
{
  $anns="00" . $anns;
} else if(strlen($anns)==4) {
  $anns="0" . $anns;
}

  $accNum=$pr . $anns . $ps;
?>
        <input type="text" name="acctno"  class="input__field input__field--chisato" placeholder=" "  value="<?php echo @$accNum; ?>" required>
<?php
} else {
?>
        <input type="text" name="acctno"  class="input__field input__field--chisato" placeholder=" " value="<?php echo @$row['Account Number']; ?>" required>
<?php  
}
?>
        <input type="hidden" name="id" size="24" value="<?php echo $row['ID']; ?>">
        <input type="hidden" name="group" size="24" value="<?php echo $grp; ?>">
  </span>

      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Account Type:</span>
	</label>
        <select name="type" class="input__field input__field--chisato" placeholder=" " value="<?php echo @$row['Account Type']; ?>" required>
          <option selected><?php echo @$row['Account Type']; ?></option>
          <?php  
         	$sqlt = "SELECT `Type` FROM `account type` WHERE `Company` ='" .$_SESSION['company']. "' ORDER BY Type;";
        	$resultt = mysqli_query($conn,$sqlt) or die('Invalid query: ' . mysqli_error());
        	while ($rows = mysqli_fetch_array($resultt))
		{
		  echo " <option>" . $rows['Type'] . "</option>\n";
		}
          ?> 
        </select>
      </span>

      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Registration Date:</span>
	</label>
<?php
if (!$id)
{ ?>
       <input id="inputField" type="text" class="input__field input__field--chisato" placeholder=" " name="regdate" value="<?php echo date('d-m-Y'); ?>" required>
<?php
} else 
{ ?>
       <input id="inputField" type="text" name="regdate" class="input__field input__field--chisato" placeholder=" " value="<?php echo date('d-m-Y',strtotime($row['Date Registered'])); ?>" required>
<?php } ?>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Account Officer:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="acctofficer" size="24" value="<?php echo $row['Account Officer']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Identification Type:</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" "  name="idtype" width="31" value="<?php echo $row['Identification Type']; ?>">  
          <?php  
           echo '<option selected>' . $row['Identification Type'] . '</option>';
           echo '<option>Drivers Licence</option>';
           echo '<option>International Passport</option>';
           echo '<option>National ID Card</option>';
           echo '<option>Staff ID Card</option>';
           echo '<option>Voters Card</option>';
           echo '<option>Others</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Identification Number:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" "  type="text" name="idnumber" size="24" value="<?php echo $row['Identification Number']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Branch:</span>
	</label>
<?php
if ($_REQUEST['brch'])
{
?>
        <select class="input__field input__field--chisato" placeholder=" " name="branch" size="1" value="<?php echo $_REQUEST['brch']; ?>">
          <option selected><?php echo $_REQUEST['brch']; ?></option>
<?php
} else {
?>
        <select class="input__field input__field--chisato" placeholder=" " name="branch" size="1" value="<?php echo @$row['Branch']; ?>">
          <option selected><?php echo @$row['Branch']; ?></option>
          <?php  
}
         	$sqlt = "SELECT `Branch` FROM `branch` WHERE `Company` ='" .$_SESSION['company']. "' ORDER BY `Branch`;";
        	$resultt = mysqli_query($conn,$sqlt) or die('Invalid query: ' . mysqli_error());
        	while ($rows = mysqli_fetch_array($resultt))
		{
		  echo " <option>" . $rows['Branch'] . "</option>\n";
		}
          ?> 
        </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Customer Category:</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" " name="customercategory" width="31" value="<?php echo $row['Customer Category']; ?>">  
          <?php  
           echo '<option selected>' . $row['Customer Category'] . '</option>';
           echo '<option>Executive Class</option>';
           echo '<option>Middle Class</option>';
           echo '<option>General Class</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Contact Address:</span>
	</label>        
          <textarea class="input__field input__field--chisato" placeholder=" " name="homeaddress" rows="2" cols="25" ><?php echo $row['Home Address']; ?></textarea>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">City/State:</span>
	</label>        
      <textarea class="input__field input__field--chisato" placeholder=" " name="postaladdress" rows="2" cols="25" ><?php echo $row['Postal Address']; ?></textarea>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Account Status:</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" "  name="status" width="31" value="<?php echo $row['Status']; ?>" required>  
          <?php  
           echo '<option selected>' . $row['Status'] . '</option>';
           echo '<option>Active</option>';
           echo '<option>Dormant</option>';
           echo '<option>Closed</option>';
           echo '<option>Pending</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">
		  <font color='Red'><b> Enable SMS Alert? </b></font></span>
	</label>
<div class="radioGroup">
        <font color='Red'><b>
        <?php
          $sqln = "SELECT `val`,`type` FROM `booln` ORDER BY `type` desc";
          $result_cn = mysqli_query($conn,$sqln) or die('Could not list; ' . mysqli_error());

          $cn=$row['SMS'];

          while ($rows = mysqli_fetch_array($result_cn)) 
          {
           echo ' <input type="radio" align="left" id="cn_' . $rows['val'] . '" name="sms" value="' . $rows['val'] . '" ';
           if ($rows['val'] == $cn) 
           {
             echo 'checked="checked" ';
           }
           echo '/><label>' . $rows['type'] . "</label>\n";
          }
        ?>
      </b></font>
      </div>
      </span>

      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">
		  <font color='Red'><b> Enable e-Mail Alert? </b></font></span>
	</label>
<div class="radioGroup">
        <font color='Red'><b>
        <?php
          $sqlm = "SELECT `val`,`type` FROM `booln` ORDER BY `type` desc";
          $result_cm = mysqli_query($conn,$sqlm) or die('Could not list; ' . mysqli_error());

          $cm=$row['email alert'];

          while ($rows = mysqli_fetch_array($result_cm)) 
          {
           echo ' <input type="radio" align="left" id="cm_' . $rows['val'] . '" name="emailalert" value="' . $rows['val'] . '" ';
           if ($rows['val'] == $cm) 
           {
             echo 'checked="checked" ';
           }
           echo '/><label>' . $rows['type'] . "</label>\n";
          }
        ?>
      </b></font>
      </div>
    </span>

 </fieldset>
 <br>

<?php
 if (!$id){
?>
  <input type="submit" value="Save" name="submit" style="height:40;width:100; color:#008000; font-size: 14pt"> &nbsp;
<?php } 
 else { ?>
  <input type="submit" value="Update" name="submit" style="height:40;width:100; color:#008000; font-size: 14pt"> &nbsp;  
  <input type="submit" value="Delete" name="submit" style="height:40;width:100; color:#008000; font-size: 14pt" onclick="return confirm('Are you sure you want to Delete?');"> &nbsp;
<?php
} ?>

 <br>
</form>

<b><font color="#FF0000" style="font-size: 9pt"><?php echo $tvalg ; ?></font></b>	
 <fieldset style="padding: 2">

<?php
$idg=$_REQUEST['idg'];
$idgx=$_REQUEST['idgx'];
if ($idgx==1)
{
 $queryG = "SELECT * FROM `group` WHERE `Company` ='" .$_SESSION['company']. "' AND  (`Account Number`='" . $row['Account Number'] . "' or `Account Number`='" . $accNum . "') and `ID` ='$idg'";
 $restG=mysqli_query($conn,$queryG);
 $rowg = mysqli_fetch_array($restG);
?>
<br>
<form method="post" action="submitreg.php" enctype="multipart/form-data">
<fieldset style="padding: 2">
<legend><b><i><font size="2" face="Tahoma" color="green">Group Signatories Information</font></i></b></legend>
<div align="left">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Group Name:</span>
	</label>        
        <input type="text" name="gname" class="input__field input__field--chisato" placeholder=" " value="<?php echo $rowg['Group Name']; ?>">
      </span>
      <span class="input input--chisato" style="vertical-align:bottom">
<div style="vertical-align:bottom">
<span>Upload Photo:</span><br>
<span>
<?php
  if (file_exists("images/pics/" .$cpfolder. "/" . $id . "_" . $idg . ".jpg")==1)
  {
?>
              <img border="1" src="images/pics/<?php echo $cpfolder;?>/<?php echo $id . "_" . $idg; ?>.jpg" width="100" height="120">
<?php
  } else { 
?>
              <img border="1" src="images/pics/pix.jpg" width="100" height="120">	 
<?php
  } 
?>
</span>
<span>
   <input name="image_filename1" type="file" id="image_filename1" size="15">
   <input type="hidden" name="id" value="<?php echo @$_REQUEST['id'];?>">
</span>
</div>
</span>
      <span class="input input--chisato" style="vertical-align:bottom">
<div style="vertical-align:bottom">
<span>Upload Signature:</span><br>
<span>
<?php
  if(file_exists("images/sign/" .$cpfolder. "/" . $id . "_" . $idg . ".jpg")==1)
  { 
?>
              <img border="1" src="images/sign/<?php echo $cpfolder;?>/<?php echo $id . "_" . $idg; ?>.jpg" width="140" height="90">
<?php
  } else { 
?>
              <img border="1" src="images/sign/sign.jpg" width="140" height="90">	 
<?php
  } 
?>
</span>
<span>
   <input name="sign_filename1" type="file" id="sign_filename1" size="15">
   <input type="hidden" name="id" value="<?php echo @$_REQUEST['id'];?>">
</span>
</div>
</span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Name:</span>
	</label>
        <input type="text" name="name1" class="input__field input__field--chisato" placeholder=" " value="<?php echo $rowg['Name']; ?>">
        <input type="hidden" name="acctno" size="24"  value="<?php echo @$row['Account Number']; ?>">
        <input type="hidden" name="idg" size="24"  value="<?php echo @$rowg['ID']; ?>">
        <input type="hidden" name="id" size="24" value="<?php echo $row['ID']; ?>">
        <input type="hidden" name="group" size="24" value="<?php echo $grp; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Position:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="position1" size="25" value="<?php echo $rowg['Position']; ?>">        
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Contact Number:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="contactno1" size="25" value="<?php echo $rowg['Contact Number']; ?>">  
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Mobile Number:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="mobileno1" size="25" value="<?php echo $rowg['Mobile Number']; ?>">  
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Office Address:</span>
	</label> 
        <textarea class="input__field input__field--chisato" placeholder=" " name="officeaddress1" rows="2" cols="18" ><?php echo $rowg['Office Address']; ?></textarea>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Home Address:</span>
	</label> 
      <textarea class="input__field input__field--chisato" placeholder=" " name="homeaddress1" rows="2" cols="18" ><?php echo $rowg['Home Address']; ?></textarea>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Marital Status:</span>
	</label> 
        <select class="input__field input__field--chisato" placeholder=" "  name="mstatus1" width="31" value="<?php echo $rowg['Marital Status']; ?>">  
          <?php  
           echo '<option selected>' . $rowg['Marital Status'] . '</option>';
           echo '<option>Married</option>';
           echo '<option>Single</option>';
           echo '<option>Divorced</option>';
           echo '<option>Widowed</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Gender:</span>
	</label> 
        <select class="input__field input__field--chisato" placeholder=" " name="gender1" width="31" value="<?php echo $rowg['Gender']; ?>">  
          <?php  
           echo '<option selected>' . $rowg['Gender'] . '</option>';
           echo '<option>Female</option>';
           echo '<option>Male</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Age:</span>
	</label> 
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="age1" size="25" value="<?php echo $rowg['Age']; ?>">  
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">e-Mail:</span>
	</label> 
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="email1" size="25" value="<?php echo $rowg['email']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Occupation:</span>
	</label> 
      <input class="input__field input__field--chisato" placeholder=" " type="text" name="occupation1" size="25" value="<?php echo $rowg['Occupation']; ?>" />
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Employer:</span>
	</label> 
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="employer1" size="25" value="<?php echo $rowg['Employer']; ?>" />
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Next of Kin:</span>
	</label> 
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="nkin1" size="25" value="<?php echo $rowg['Next of Kin']; ?>">  
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Relationship:</span>
	</label> 
        <select class="input__field input__field--chisato" placeholder=" " name="relationship1" width="31" value="<?php echo $rowg['Relationship']; ?>">  
          <?php  
           echo '<option selected>' . $rowg['Relationship'] . '</option>';
           echo '<option>Family</option>';
           echo '<option>Friend</option>';
           echo '<option>Associate</option>';
		   echo '<option>Employer</option>';
		   echo '<option>Others</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Next of Kin Contact/Phone:</span>
	</label> 
      <textarea class="input__field input__field--chisato" placeholder=" " name="nkcontact1" rows="2" cols="18" ><?php echo $rowg['NKin Contact']; ?></textarea>
      </span>
 <br>

<?php
if (!$idg)
{
?>
  <input type="submit" value="Add" name="submit" style="height:40;width:100; color:#008000; font-size: 14pt"> &nbsp;
<?php } 
 else { ?>
  <input type="submit" value="Modify" name="submit" style="height:40;width:100; color:#008000; font-size: 14pt"> &nbsp;  
  <input type="submit" value="Remove" name="submit" style="height:40;width:100; color:#008000; font-size: 14pt" onclick="return confirm('Are you sure you want to Delete?');"> &nbsp;
<?php
} 
 echo '<input type="submit" value="Cancel" name="submit" style="height:40;width:100; color:#008000; font-size: 14pt">';
}
?>

<p>&nbsp;</p>
<div class="div-table">
 <?php
 @$tvalg=$_GET['tvalg'];
 @$acctnum=$_REQUEST['acctno'];
echo "<a href='register.php?acctno=$acctnum&grp=Group&idgx=1'>Add New Principal</a>"; 
?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:11%'>SNO</div>
    <div  class="cell" style='width:11%'>Name</div>
    <div  class="cell" style='width:11%'>Position</div>
    <div  class="cell" style='width:11%'>Gender</div>
    <div  class="cell" style='width:11%'>Age</div>
    <div  class="cell" style='width:11%'>Contact Number</div>
    <div  class="cell" style='width:11%'>Mobile Number</div>
    <div  class="cell" style='width:11%'>Email</div>
    <div  class="cell" style='width:11%'>Marital Status</div>
  </div>
<?php
   $qryG = "SELECT `ID`,`Group Name`,`Account Number`,`Name`,`Position`,`Contact Number`,`Mobile Number`,`Marital Status`,`Gender`,`Age`,`email` FROM `group` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='" . $row['Account Number'] . "' or `Account Number`='" . $accNum . "' order by `Name`";
   $resultG=mysqli_query($conn,$qryG);
   
$i=0;
    while(list($idg,$grp,$acctnog,$nameg,$posg,$cnumg,$mnumg,$mstatusg,$genderg,$ageg,$emailg)=mysqli_fetch_row($resultG))
    { 
     $i=$i+1;
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:11%">' .$i. '</div>
        <div  class="cell" style="width:11%"><a href = "register.php?acctno=' . $acctno . '&grp=Group&idg=' .$idg. '&acctnog=' .$acctnog. '&idgx=1">' .$nameg. '</a></div>
        <div  class="cell" style="width:11%">' .$posg. '</div>
        <div  class="cell" style="width:11%">' .$genderg. '</div>
        <div  class="cell" style="width:11%">' .$ageg. '</div>
        <div  class="cell" style="width:11%">' .$cnumg.  '</div>
        <div  class="cell" style="width:11%">' .$mnumg.  '</div>
        <div  class="cell" style="width:11%">' .$emailg.  '</div>
        <div  class="cell" style="width:11%">' .$mstatusg.  '</div>
      </div>';
    }
?>
</div>

 </fieldset>

  </p>
  </div>
</body>

<?php
} else {
?>
<form method="post" action="submitreg.php" enctype="multipart/form-data">
<div align="left" style="margin-left:30px;" class="agileinfo_mail_grids">
<div width="90%" align="left">
      <span class="input input--chisato" style="vertical-align:bottom">
<div style="vertical-align:bottom">
<span>Upload Photo:</span><br>
<span>
<?php
  if (file_exists("images/pics/" .$cpfolder. "/" . $id . ".jpg")==1)
 { 
?>
              <input type="submit" value="Remove Pix" name="submit" style="height:30; width:100;  font-size: 10px"><br>
              <img border="1" src="images/pics/<?php echo $cpfolder;?>/<?php echo $id; ?>.jpg" width="100" height="120">
<?php
  } else { 
?>
   <input name="image_filename" type="file" id="image_filename"><br>
              <img border="1" src="images/pics/pix.jpg" width="100" height="120">	 
<?php
  } 
?>
</span>

<input type="hidden" name="id" value="<?php echo @$_REQUEST['id'];?>">
</div>
</span>

<span class="input input--chisato">
<div style="vertical-align:bottom">
<span>Upload Signature:</span><br>
<span>
<?php
  if(file_exists("images/sign/" .$cpfolder. "/" . $id . ".jpg")==1)
  { 
?>
              <input type="submit" value="Remove Signature" name="submit" style="height:30; width:140; font-size: 10px"><br>
              <img border="1" src="images/sign/<?php echo $cpfolder;?>/<?php echo $id; ?>.jpg" width="140" height="90">
<?php
  } else { 
?>
<input name="sign_filename" type="file" id="sign_filename"><br>
              <img border="1" src="images/sign/sign.jpg" width="140" height="90">	 
<?php
  } 
?>			 
<input type="hidden" name="id" value="<?php echo @$_REQUEST['id'];?>">

</span>
</div>
</span>
<span class="input input--chisato">

</span>
</div>
<p>&nbsp;</p>
<fieldset>
<legend><b><i><font size="2" face="Tahoma" color="green">Account Information</font></i></b></legend>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Account Number:</span>
	</label>

<?php
if (!$row['Account Number'])
{
  $sqlz = "SELECT `Branch Code` FROM `branch` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Branch`='$brch'";
  $resultz = mysqli_query($conn,$sqlz);
  $rowz = mysqli_fetch_array($resultz);
  $bcd=$rowz['Branch Code'];

  $sqlx = "SELECT `Account Number` as ACC, cast(`Account Number` as signed) as xyz FROM `customer` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number` like '%30' order by xyz desc limit 0,1";
  $resultx = mysqli_query($conn,$sqlx);
  $rowx = mysqli_fetch_array($resultx);
  $ann=$rowx['xyz'];
  $amm=$rowx['ACC'];

 $pr="000";
 $ps="30";

#$amm="0000012330";
  $mpr=substr($ann,0,3);
  $mps=substr($ann,6,4);
  $mann=substr($amm,3,5);

$anns=$mann+1;   
if(strlen($anns)==3)
{
  $anns="00" . $anns;
} else if(strlen($anns)==4) {
  $anns="0" . $anns;
}

  $accNum=$pr . $anns . $ps;
?>
        <input type="text" name="acctno" class="input__field input__field--chisato" placeholder=" "  value="<?php echo @$accNum; ?>" required>
<?php
} else {
?>
        <input type="text" name="acctno" class="input__field input__field--chisato" placeholder=" "  value="<?php echo @$row['Account Number']; ?>" required>
<?php  
}
?>
        <input type="hidden" name="id" size="24" value="<?php echo $row['ID']; ?>">
        <input type="hidden" name="group" size="24" value="<?php echo $grp; ?>">
  </span>

      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Account Type:</span>
	</label>
        <select name="type" class="input__field input__field--chisato" placeholder=" " value="<?php echo @$row['Account Type']; ?>" required>
          <option selected><?php echo @$row['Account Type']; ?></option>
          <?php  
         	$sqlt = "SELECT `Type` FROM `account type` WHERE `Company` ='" .$_SESSION['company']. "' ORDER BY Type;";
        	$resultt = mysqli_query($conn,$sqlt) or die('Invalid query: ' . mysqli_error());
        	while ($rows = mysqli_fetch_array($resultt))
		{
		  echo " <option>" . $rows['Type'] . "</option>\n";
		}
          ?> 
        </select>
      </span>

      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Registration Date:</span>
	</label>
<?php
if (!$id)
{ ?>
       <input id="inputField" type="text" class="input__field input__field--chisato" placeholder=" " name="regdate" value="<?php echo date('d-m-Y'); ?>" required>
<?php
} else 
{ ?>
       <input id="inputField" type="text" name="regdate" class="input__field input__field--chisato" placeholder=" " value="<?php echo date('d-m-Y',strtotime($row['Date Registered'])); ?>" required>
<?php } ?>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Account Officer:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="acctofficer" size="24" value="<?php echo $row['Account Officer']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Identification Type:</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" "  name="idtype" width="31" value="<?php echo $row['Identification Type']; ?>">  
          <?php  
           echo '<option selected>' . $row['Identification Type'] . '</option>';
           echo '<option>Drivers Licence</option>';
           echo '<option>International Passport</option>';
           echo '<option>National ID Card</option>';
           echo '<option>Staff ID Card</option>';
           echo '<option>Voters Card</option>';
           echo '<option>Others</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">ID Card Number:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" "  type="text" name="idnumber" size="24" value="<?php echo $row['Identification Number']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">ID Card Expiry Date:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " id="inputFieldB"  type="text" name="idexpire" size="24" value="<?php echo $row['ID Expiration']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Branch:</span>
	</label>
<?php
if ($_REQUEST['brch'])
{
?>
        <select class="input__field input__field--chisato" placeholder=" " name="branch" size="1" value="<?php echo $_REQUEST['brch']; ?>">
          <option selected><?php echo $_REQUEST['brch']; ?></option>
<?php
} else {
?>
        <select class="input__field input__field--chisato" placeholder=" " name="branch" size="1" value="<?php echo @$row['Branch']; ?>">
          <option selected><?php echo @$row['Branch']; ?></option>
          <?php  
}
         	$sqlt = "SELECT `Branch` FROM `branch` WHERE `Company` ='" .$_SESSION['company']. "' ORDER BY `Branch`;";
        	$resultt = mysqli_query($conn,$sqlt) or die('Invalid query: ' . mysqli_error());
        	while ($rows = mysqli_fetch_array($resultt))
		{
		  echo " <option>" . $rows['Branch'] . "</option>\n";
		}
          ?> 
        </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Customer Category:</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" " name="customercategory" width="31" value="<?php echo $row['Customer Category']; ?>">  
          <?php  
           echo '<option selected>' . $row['Customer Category'] . '</option>';
           echo '<option>Executive Class</option>';
           echo '<option>Middle Class</option>';
           echo '<option>General Class</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Account Status:</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" "  name="status" width="31" value="<?php echo $row['Status']; ?>" required>  
          <?php  
           echo '<option selected>' . $row['Status'] . '</option>';
           echo '<option>Active</option>';
           echo '<option>Dormant</option>';
           echo '<option>Closed</option>';
           echo '<option>Pending</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Contribution Charge:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="contrib" size="24" value="<?php echo $row['Contribution Charge']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Passbook Charge:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="passbk" size="24" value="<?php echo $row['Passbook Charge']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">How Did you Hear About Us?:</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" "  name="how" width="31" value="<?php echo $row['How']; ?>">  
          <?php  
           echo '<option selected>' . $row['How'] . '</option>';
           echo '<option>Advert</option>';
           echo '<option>Email</option>';
           echo '<option>Referred</option>';
           echo '<option>Social Media</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">
		  <font color='Red'><b> Enable SMS Alert? </b></font></span>
	</label>
<div class="radioGroup">
        <font color='Red'><b>
        <?php
          $sqln = "SELECT `val`,`type` FROM `booln` ORDER BY `type` desc";
          $result_cn = mysqli_query($conn,$sqln) or die('Could not list; ' . mysqli_error());

          $cn=$row['SMS'];

          while ($rows = mysqli_fetch_array($result_cn)) 
          {
           echo ' <input type="radio" align="left" id="cn_' . $rows['val'] . '" name="sms" value="' . $rows['val'] . '" ';
           if ($rows['val'] == $cn) 
           {
             echo 'checked="checked" ';
           }
           echo '/><label>' . $rows['type'] . "</label>\n";
          }
        ?>
      </b></font>
      </div>
      </span>

      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">
		  <font color='Red'><b> Enable e-Mail Alert? </b></font></span>
	</label>
<div class="radioGroup">
        <font color='Red'><b>
        <?php
          $sqlm = "SELECT `val`,`type` FROM `booln` ORDER BY `type` desc";
          $result_cm = mysqli_query($conn,$sqlm) or die('Could not list; ' . mysqli_error());

          $cm=$row['email alert'];

          while ($rows = mysqli_fetch_array($result_cm)) 
          {
           echo ' <input type="radio" align="left" id="cm_' . $rows['val'] . '" name="emailalert" value="' . $rows['val'] . '" ';
           if ($rows['val'] == $cm) 
           {
             echo 'checked="checked" ';
           }
           echo '/><label>' . $rows['type'] . "</label>\n";
          }
        ?>
      </b></font>
      </div>
    </span>

 </fieldset>
 <br>
<fieldset style="padding: 2">
<legend><b><i><font size="2" face="Tahoma" color="green">Personal Information</font></i></b></legend>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">First Name:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="fname" size="24" value="<?php echo $row['First Name']; ?>" required>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Surname:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="sname" size="24" value="<?php echo $row['Surname']; ?>" required>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Marital Status:</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" "  name="mstatus" width="31" value="<?php echo $row['Marital Status']; ?>">  
          <?php  
           echo '<option selected>' . $row['Marital Status'] . '</option>';
           echo '<option>Married</option>';
           echo '<option>Single</option>';
           echo '<option>Divorced</option>';
           echo '<option>Widowed</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">No. of Dependants:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="dependant" size="24" value="<?php echo $row['Dependant']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Gender:</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" "  name="gender" width="31" value="<?php echo $row['Gender']; ?>" required>  
          <?php  
           echo '<option selected>' . $row['Gender'] . '</option>';
           echo '<option>Female</option>';
           echo '<option>Male</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Date of Birth:</span>
	</label>        
<?php
if (!$id)
{ ?>
       <input class="input__field input__field--chisato" placeholder=" " id="inputFieldC" type="text" size="24" name="dob" value="">
<?php
} else 
{ ?>
       <input class="input__field input__field--chisato" placeholder=" " id="inputFieldC" type="text" name="dob" size="24" value="<?php echo date('Y-m-d',strtotime($row['Date of Birth'])); ?>">
<?php } ?>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Age:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" id="age" name="age" size="24" value="<?php echo $row['Age']; ?>">  
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">e-Mail:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="email" size="24" value="<?php echo $row['email']; ?>" onkeypress="return keyPress(event)">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Occupation:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " name="occupation" size="24" value="<?php echo $row['Occupation']; ?>" />
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Employer:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="employer" size="24" value="<?php echo $row['Employer']; ?>" />
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Position:</span>
	</label>
 	    <input class="input__field input__field--chisato" placeholder=" " type="text" name="position" size="24" value="<?php echo $row['Position']; ?>" />
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Office Address:</span>
	</label>
        <textarea class="input__field input__field--chisato" placeholder=" " name="officeaddress" rows="2" cols="25" ><?php echo $row['Office Address']; ?></textarea>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Contact Number:</span>
	</label>        
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="contactno" size="24" value="<?php echo $row['Contact Number']; ?>">  
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Mobile Number:</span>
	</label>        
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="mobileno" size="24" value="<?php echo $row['Mobile Number']; ?>">  
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Contact Address:</span>
	</label>        
          <textarea class="input__field input__field--chisato" placeholder=" " name="homeaddress" rows="2" cols="25" ><?php echo $row['Home Address']; ?></textarea>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">City:</span>
	</label>        
      <input type="text" class="input__field input__field--chisato" placeholder=" " name="postaladdress" value="<?php echo $row['Postal Address']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Location">State</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" "  name="state" width="31" value="<?php echo $row['State']; ?>">  
          <?php  
           echo '<option selected>' . $row['State'] . '</option>';
           $sql = "SELECT * FROM `state`";
           $result_status = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_status)) 
           {
             echo '<option>' . $rows['State'] . '</option>';
           }
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">BVN Number:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="bvn" size="24" value="<?php echo $row['BVN']; ?>">  
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Other Bank Name:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="obank" size="24" value="<?php echo $row['Bank Name']; ?>">  
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Other Bank Account Name:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="obankname" size="24" value="<?php echo $row['Bank Account Name']; ?>">  
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Other Bank Account Number:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="obankno" size="24" value="<?php echo $row['Bank Account Number']; ?>">  
      </span>
 </fieldset>
 <br>
<fieldset style="padding: 2">
<legend><b><i><font size="2" face="Tahoma" color="green">Next of Kin Information</font></i></b></legend>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Next of Kin:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="nkin" size="24" value="<?php echo $row['Next of Kin']; ?>">  
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Relationship:</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" " name="relationship" width="31" value="<?php echo $row['Relationship']; ?>">  
          <?php  
           echo '<option selected>' . $row['Relationship'] . '</option>';
           echo '<option>Family</option>';
           echo '<option>Friend</option>';
           echo '<option>Associate</option>';
           echo '<option>Employer</option>';
           echo '<option>Others</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Next of Kin Contact:</span>
	</label>
      <textarea class="input__field input__field--chisato" placeholder=" " name="nkcontact" rows="2" cols="25" ><?php echo $row['NKin Contact']; ?></textarea>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Next of Kin Phone:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " type="text" name="nkphone" size="24" value="<?php echo $row['NK Phone']; ?>"> 
      </span>

      <span class="input input--chisato">
<?php
 if (!$id){
?>
  <input type="submit" value="Save" name="submit" style="width:120px"> &nbsp;
<?php } 
 else { ?>
  <input type="submit" value="Update" name="submit" style="width:120px"> &nbsp;  &nbsp; 
  <input type="submit" value="Delete" name="submit" style="width:120px"  onclick="return confirm('Are you sure you want to Delete?');"> &nbsp;
<?php
} ?>
  </span>
 </fieldset>
</form>
 <br><br>
<fieldset style="padding: 2">
<legend><b><i><font size="2" face="Tahoma" color="green">Scanned Document</font></i></b></legend>
<form method="post" action="ashpix.php" enctype="multipart/form-data">
 <span class="input input--chisato">
<div style="vertical-align:bottom">
<span>Scanned Document:</span><br>
 <span>
     <?php  if (file_exists("images/scan/" .$cpfolder. "/" . $row['Account Number'] . ".jpg")==1)
            { ?>
<input type="submit" value="Remove_Doc" name="submit" style="height:30; width:140; font-size: 10px"><br>

              <img border="1" src="images/scan/<?php echo $cpfolder;?>/<?php echo $row['Account Number']; ?>.jpg" width="500" height="300">
     <?php  } else { ?>

<input size="40" name="iname" type="file" id="image_filename">
<input type="submit" name="submit" style="width:180px" value="Upload"><br>
              <img border="1" src="images/scan/scan.jpg" width="500" height="300">
     <?php  }?>
<input type="hidden" name="code" value="<?php echo $row['Account Number'];?>">
 </span>
</div>
</span>
 <span class="input input--chisato">
</span>
 <span class="input input--chisato">
<div style="vertical-align:bottom">
<span>Scanned ID Card:</span><br>
<span>
<?php
  if (file_exists("images/scan/" .$cpfolder. "/id_" . $row['Account Number'] . ".jpg")==1)
  { 
?>
<input type="submit" value="Remove_ID" name="submit" style="height:30; width:140; font-size: 10px"><br>
              <img border="1" src="images/scan/<?php echo $cpfolder;?>/id_<?php echo $row['Account Number']; ?>.jpg" width="200" height="120">
<?php
  } else { 
?>
<input name="scan_filename" type="file" value="Upload ID" id="scan_filename">
<input type="submit" name="submit" style="width:150px" value="UploadID"><br>
              <img border="1" src="images/scan/card.jpg" width="200" height="120">	 
<?php
  } 
?>			 
<input type="hidden" name="id" value="<?php echo @$_REQUEST['id'];?>">
</span>
</div>
</span>
</form>
</div>

  </div>
</body>
<?php
 }
}
?>



									</div>
								</section>
							</div>
						</div>

<?php
if($tval=="Your record has been saved.")
{
echo "<script>alert('You Have Successfully Created The Account');</script>";
}
if($tval=="Your record has been updated.")
{
echo "<script>alert('You Have Successfully Modified The Account');</script>";
}
require_once 'footer.php';
?>