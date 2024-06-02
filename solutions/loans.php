<?php
session_start();

require_once 'conn.php'; 
$emini=1;
require_once 'header.php'; 
#require_once 'style.php';

//check to see if user has logged in with a valid password

if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 3) & ($_SESSION['access_lvl'] != 4) & ($_SESSION['access_lvl'] != 6))
{
 if ($_SESSION['access_lvl'] != 5)
 {  
   $redirect = $_SERVER['PHP_SELF'];
   header("Refresh: 0; URL=index.php?redirect=$redirect");
 }
}

@$Tit=$_SESSION['Tit'];
@$acctno=$_REQUEST['acctno'];
@$_SESSION['acctno']=$_REQUEST['acctno'];
@$id=$_REQUEST['id'];
@$tval=$_REQUEST['tval'];

list($cp, $fld) = explode(' ', $_SESSION['company']);
$cpfolder=$cp . $fld;
?>

<title>Loans | Cooperatives Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Loans Management</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="loans.php">
										<i class="fa fa-usd"></i>
									</a>
								</li>
								<li><span>Records</span></li>
							</ol>
					
							&nbsp;
						</div>
					</header>

<script src="lib/jquery.js"></script>
<script src="dist/jquery.validate.js"></script>
<script>
$().ready(function() 
{

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


<!-- load jquery ui css-->

<link href="js/jquery-ui.min.css" rel="stylesheet" type="text/css" />

<!-- load jquery library -->

<script src="js/jquery-1.9.1.js"></script>

<!-- load jquery ui js file -->

<script src="js/jquery-ui.min.js"></script>


<style type="text/css">

.div-table 
{

    width: 100%;
 
//   border: 1px dashed #ff0000;

    float: left;

    padding:10px;

}


.tab-row 
{

	background-color: #EEEEEE;

	float: left;

	width: 100%;

	height:45px;

}


.cell 
{

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
	
        <link rel="stylesheet" href="css/tabs.css">
        <link rel="stylesheet" href="css/normalize.css">

<div align="center" style="margin-top:10px;margin-bottom:10px">
					<!-- start: page -->
						<div class="row">
							<div class="col-xs-12">
								<section class="panel">

<div class="panel-bodyx">
<form action="loans.php" method="post">
        Enter Membership Number:
&nbsp;
        <input type="text" autocomplete="off" size="15" name="acctno" onBlur="filtery(this.value,this.form.code)" style="height:35; background-color:#E9FCFE; font-size: 15pt">
        <input type="hidden" name="view" size="15" value="1">	
&nbsp;
       <input name="go" type="submit" value="Search" align="top" style="height:35; color:#008000; font-size: 15pt">
</form>
<legend></legend>
<?php
 echo "<h5><font color='#ff0000'>" .$tval. "</font></h5>"
?>
<div class="admintab-area" style="background-color:#eee;">
                <div class="container-fluid">
                    <div class="row">

                            <div class="admintab-wrap mg-b-40s">
                                <ul class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1">
                                    <li class="active"><a data-toggle="tab" href="#view"><span class="adminpro-icon adminpro-analytics tab-custon-ic"></span><font color="orange" style="font-size:16px"><i class="fa fa-table"></i></font> Loans Details</a>
									</li>
                                    <li><a data-toggle="tab" href="#approve"><span class="adminpro-icon adminpro-analytics-bridge tab-custon-ic"></span><font color="green" style="font-size:16px"><i class="fa fa-check-square-o"></i></font> Loan Approvals</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="view" class="tab-pane in active animated flipInX custon-tab-style1">
                                      <div class="row">
                                          <?php require_once 'loanx.php'; ?>
                                      </div>
                                    </div>
                                    <div id="approve" class="tab-pane animated flipInX custon-tab-style1">
                                        <?php require_once 'loansappr.php'; ?>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>
</div>
<?php
 require_once 'footer.php';
?>
