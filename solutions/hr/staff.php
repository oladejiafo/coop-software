<?php
 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';
 $reff= $_REQUEST[mYxt];
 
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & $_SESSION['access_lvl'] != 5) 
{
 if ($_SESSION['access_lvl'] != 3 & $_SESSION['access_lvl'] != 33 & $_SESSION['access_lvl'] != 333 & $_SESSION['access_lvl'] != 4) 
 {
   $redirect = $_SERVER['PHP_SELF'];
   header("Refresh: 0; URL=../index.php?redirect=$redirect");
 }
}

$SNO=$_REQUEST['SNO'];
$ID=$_REQUEST['ID'];
$tval=$_REQUEST['tval'];
//$SNO=1;
$sql="SELECT `staff`.`ID`,`staff`.`Staff Number`,`staff`.* FROM staff WHERE `staff`.`Staff Number`='$SNO'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);

$sql2="SELECT `next_kin`.`Name`,`next_kin`.`Address`,`next_kin`.`Phone`,`next_kin`.`Relationship` FROM `next_kin` WHERE `Staff Number`='$SNO'";
$result2 = mysqli_query($conn,$sql2) or die('Could not look up user data; ' . mysqli_error());
$rownk = mysqli_fetch_array($result2);

 ?>
<head>


    <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script> 
  <script src="js/jquery.hashchange.min.js" type="text/javascript"></script>
  <script src="js/jquery.easytabs.min.js" type="text/javascript"></script>
<link href="css/jTab.css" rel="stylesheet" type="text/css">

<script type="text/javascript">
    $(document).ready( function() {
      $('#tab-container').easytabs();
    });
</script>
</head>



<title>HR | Cooperative Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Staff Record</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="../../hmo/eng/hr.php">
										<i class="fa fa-book"></i>
									</a>
								</li>
								<li><span>HR</span></li>
							</ol>
					
							&nbsp;
						</div>
					</header>
					
 <div id="tab-container" class='tab-container'>
  <ul class='etabs'>
   <li class='tab'><a href="#tabs1-staff">Details</a></li>
   <li class='tab'><a href="#tabs1-confidential">Confidential</a></li>
   <li class='tab'><a href="#tabs1-employment">Employments</a></li>
   <li class='tab'><a href="#tabs1-family">Family</a></li>
   <li class='tab'><a href="#tabs1-education">Educations</a></li>
   <li class='tab'><a href="#tabs1-leave">Leaves</a></li>
   <li class='tab'><a href="#tabs1-training">Training</a></li>
  </ul>

  <div class='panel-container'>

   <div id="tabs1-staff">
    <fieldset id="fieldset-mcard">
     <?php require_once 'staffd.php'; ?>
    </fieldset>
   </div>

   <div id="tabs1-confidential">
    <fieldset id="fieldset-mcard">
      <?php require_once 'staffsecret.php'; ?>
    </fieldset>
   </div>

   <div id="tabs1-employment">
    <fieldset id="fieldset-mcard">
      <?php require_once 'employ_history.php'; ?>
    </fieldset>
   </div>   

   <div id="tabs1-family">
    <fieldset id="fieldset-mcard">hhhhh
      <?php require_once 'family_details.php'; ?>
    </fieldset>
   </div>

   <div id="tabs1-education">
    <fieldset id="fieldset-mcard">
      <?php require_once 'edu_history.php'; ?>
    </fieldset>
   </div>

   <div id="tabs1-leave">
    <fieldset id="fieldset-mcard">
      <?php require_once 'leave_record.php'; ?>
    </fieldset>
   </div>

   <div id="tabs1-training">
    <fieldset id="fieldset-mcard">
      <?php require_once 'training.php'; ?>
    </fieldset>
   </div>

  </div>   
 </div> 


<?php
require_once 'footer.php';
?>
</html>