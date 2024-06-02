<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['user_id']) & ($_SESSION['access_lvl'] != 5) & ($_SESSION['access_lvl'] != 4) & ($_SESSION['access_lvl'] != 6) & ($_SESSION['access_lvl'] != 7) & ($_SESSION['access_lvl'] != 1) & ($_SESSION['access_lvl'] != 3))
{
 if ($_SESSION['access_lvl'] != 2){
#$tval="Sorry, but you don�t have permission to view this page! Login pls";
header("location:index.php?tval=$tval&redirect=$redirect");
}
}
 require_once 'header.php';
 require_once 'conn.php';
// require_once 'style.php';

@$acctno=$_REQUEST['acctno'];
@$tval=$_REQUEST['tval'];
@$tvalg=$_REQUEST['tvalg'];
@$id=$_REQUEST['id'];

$sql="SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID`='$id'";
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


<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
<!-- 	
<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.css" />
   <link rel="shortcut icon" href="favicon.ico">
-->
<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>

<script type="text/javascript">
	window.onload = function(){

		new JsDatePick({
			useMode:2,
			target:"inputField1",
			dateFormat:"%Y-%m-%d"

		});

		new JsDatePick({
			useMode:2,
			target:"inputFieldB",
			dateFormat:"%Y-%m-%d"

		});
		new JsDatePick({
			useMode:2,
			target:"inputField3",
			dateFormat:"%Y-%m-%d"

		});
	};
</script>

<title>Membership Record | Cooperative Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Membership Record</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="members.php">
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
<p><b><font color="#FF0000" style="font-size: 9pt"><?php echo $tval ; ?></font></b></p>
</div>


					<!-- start: page -->
						<div class="row">
							<div class="col-xs-12">
								<section class="panel">
									<header class="panel-heading">
										<h2 class="panel-title">Membership Form</h2>
									</header>
									<div class="panel-body">

<form method="post" action="submitmember.php" enctype="multipart/form-data">

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
  if (file_exists("images/sign/" .$cpfolder. "/" . $id . ".jpg")==1)
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

<fieldset>
<legend><b><i><font size="2" face="Tahoma" color="green">Membership Information</font></i></b></legend>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Membership Number:</span>
	</label>

<?php
if (!$row['Membership Number'])
{

  $sqlx = "SELECT `Membership Number` as ACC, cast(`Membership Number` as signed) as xyz FROM `membership`  WHERE `Company` ='" .$_SESSION['company']. "' order by xyz desc limit 0,1";
  $resultx = mysqli_query($conn,$sqlx);
  $rowx = mysqli_fetch_array($resultx);
  $ann=$rowx['xyz'];
  $amm=$rowx['ACC'];
/*
 $pr="000";
 $ps="30";

  $mpr=substr($ann,0,3);
  $mps=substr($ann,6,4);
  $mann=substr($amm,3,5);
*/
$anns=$amm+1;   
if(strlen($anns)==1)
{
  $anns="0000" . $anns;
}
if(strlen($anns)==2)
{
  $anns="000" . $anns;
} elseif(strlen($anns)==3)
{
  $anns="00" . $anns;
} else if(strlen($anns)==4) {
  $anns="0" . $anns;
}

  $accNum=$anns;
?>
        <input type="text" name="acctno" class="input__field input__field--chisato" placeholder=" "  value="<?php echo @$accNum; ?>" required>
<?php
} else {
?>
        <input type="text" name="acctno" class="input__field input__field--chisato" placeholder=" "  value="<?php echo @$row['Membership Number']; ?>" required>
<?php  
}
?>
        <input type="hidden" name="id" size="24" value="<?php echo $row['ID']; ?>">
  </span>

 <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Membership Type:</span>
	</label>
        <select style="font-size:12px" name="type" class="input__field input__field--chisato" placeholder=" " value="<?php echo @$row['Membership Type']; ?>" required>
          <option selected><?php echo @$row['Membership Type']; ?></option>
          <?php  
            $sqls="Select `Type` From `membership type` Where `Company`='" .$_SESSION['company']. "'";
            $results= mysqli_query($conn, $sqls);
            while($rows=mysqli_fetch_array($results))
            {
             echo "<option>".$rows['Type']."</option>\n";
            }
          ?> 
        </select>
 </span>
 <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Member's Branch:</span>
	</label>
        <select style="font-size:12px" name="branch" class="input__field input__field--chisato" placeholder=" " value="<?php echo @$row['Branch']; ?>" required>
          <option selected><?php echo @$row['Branch']; ?></option>
          <?php  
            $sqlB="Select distinct `Branch` From `branch` Where `Company`='" .$_SESSION['company']. "' Order By `Branch`";
            $resultB= mysqli_query($conn, $sqlB);
            while($rowB=mysqli_fetch_array($resultB))
            {
             echo "<option>".$rowB['Branch']."</option>\n";
            }
          ?> 
        </select>
 </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Sponsor:</span>
	</label>
        <select style="font-size:12px" name="sponsor" class="input__field input__field--chisato" placeholder=" " value="<?php echo @$row['Sponsor']; ?>">
          <option selected><?php echo @$row['Sponsor']; ?></option>
          <?php  
	    echo " <option>Self</option>\n";
	    echo " <option>Parent</option>\n";
      echo " <option>Guardian</option>\n";
      echo " <option>Member</option>\n";
      echo " <option>Other</option>\n";
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
       <input id="inputField1" type="text" class="input__field input__field--chisato" placeholder=" " name="regdate" value="<?php echo date('Y-m-d'); ?>" required>
<?php
} else 
{ ?>
       <input id="inputField1" type="text" name="regdate" class="input__field input__field--chisato" placeholder=" " value="<?php echo date('Y-m-d',strtotime($row['Date Registered'])); ?>" required>
<?php } ?>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Identification Type:</span>
	</label>
        <select style="font-size:12px" class="input__field input__field--chisato" placeholder=" "  name="idtype" width="31" value="<?php echo $row['Identification Type']; ?>">  
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
        <input class="input__field input__field--chisato" placeholder=" " id="inputField3"  type="text" name="idexpire" size="24" value="<?php echo $row['ID Expiration']; ?>">
      </span>

      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Membership Position:</span>
	</label>
        <select style="font-size:12px" class="input__field input__field--chisato" placeholder=" " name="position" width="31" value="<?php echo $row['Position']; ?>">  
          <?php  
           echo '<option selected>' . $row['Position'] . '</option>';
           echo '<option>Chairman/President</option>';
           echo '<option>Vice Chairman/President</option>';
           echo '<option>General Secretary</option>';
           echo '<option>Member</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Membership Status:</span>
	</label>
        <select style="font-size:12px" class="input__field input__field--chisato" placeholder=" "  name="status" width="31" value="<?php echo $row['Status']; ?>" required>  
          <?php  
           echo '<option selected>' . $row['Status'] . '</option>';
           echo '<option>Active</option>';
           echo '<option>Inactive</option>';
           echo '<option>Pending</option>';
           echo '<option>Terminated</option>';
           echo '<option>Withdrawn</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Membership Fee:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="admfee" size="24" value="<?php echo $row['Admission Fee']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">
		  <font color='Red'><b> Enable SMS Notifications? </b></font></span>
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
		  <font color='Red'><b> Enable e-Mail Notifications? </b></font></span>
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
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Termination Date:</span>
	</label>
       <input id="inputFieldB" type="text" class="input__field input__field--chisato" placeholder=" " name="exitdate" value="<?php echo $row['Termination Date']; ?>">
     </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Termination Reason:</span>
	</label>
       <input id="inputFieldB" type="text" class="input__field input__field--chisato" placeholder=" " name="exitreason" value="<?php echo $row['Termination Reason']; ?>">
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
        <select style="font-size:12px" class="input__field input__field--chisato" placeholder=" "  name="mstatus" width="31" value="<?php echo $row['Marital Status']; ?>">  
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
		<span class="input__label-content input__label-content--chisato">Gender:</span>
	</label>
        <select style="font-size:12px" class="input__field input__field--chisato" placeholder=" "  name="gender" width="31" value="<?php echo $row['Gender']; ?>" required>  
          <?php  
           echo '<option selected>' . $row['Gender'] . '</option>';
           echo '<option>Female</option>';
           echo '<option>Male</option>';
          ?> 
         </select>
      </span>
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
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Date of Birth:</span>
	</label>        
<?php
if (!$id)
{ ?>
       <input class="input__field input__field--chisato" placeholder=" " id="dob" type="text" size="24" name="dob" value="">
<?php
} else 
{ ?>
       <input class="input__field input__field--chisato" placeholder=" " id="dob" type="text" name="dob" size="24" value="<?php echo date('Y-m-d',strtotime($row['Date of Birth'])); ?>">
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
      <input type="text" class="input__field input__field--chisato" placeholder=" " name="city" value="<?php echo $row['City']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Location">State</span>
	</label>
        <select style="font-size:12px" class="input__field input__field--chisato" placeholder=" "  name="state" width="31" value="<?php echo $row['State']; ?>">  
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
  <br><input type="submit" class="btn btn-primary" value="Save" name="submit" style="width:120px"> &nbsp;
<?php } 
 else { ?>
  <br><input type="submit" class="btn btn-info" value="Update" name="submit" style="width:120px"> &nbsp;  &nbsp; 
  <input type="submit" class="btn btn-danger" value="Delete" name="submit" style="width:120px"  onclick="return confirm('Are you sure you want to Delete?');"> &nbsp;
<?php
} ?>
</span>
<span class="input input--chisato">
   <br><a href="members.php" class="btn btn-success"><i class="fa fa-arrow-left"></i> Return To List</a>
  </span>
 </fieldset>
</form>
 <br><br>
<fieldset style="padding: 2">
<legend><b><i><font size="2" face="Tahoma" color="green">Scanned Document</font></i></b></legend>
<form method="post" action="ashpix.php" enctype="multipart/form-data">
 <span class="input input--chisato">
<div style="vertical-align:bottom">
<span>Scanned ID Card:</span><br>
<span>
<?php
  if (file_exists("images/scan/" .$cpfolder. "/id_" . $row['Membership Number'] . ".jpg")==1)
  { 
?>
<input type="submit" value="Remove_ID" name="submit" style="height:30; width:140; font-size: 10px"><br>
              <img border="1" src="images/scan/<?php echo $cpfolder;?>/id_<?php echo $row['Membership Number']; ?>.jpg" width="200" height="120">
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
									</div>
								</section>
							</div>
						</div>
<?php
if($tval=="Your record has been saved.")
{
echo "<script>alert('You Have Successfully Added A Member');</script>";
}
if($tval=="Your record has been updated.")
{
echo "<script>alert('You Have Successfully Modified A Member Record');</script>";
}
require_once 'footer.php';
?>