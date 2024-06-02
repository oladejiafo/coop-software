<?php
 require_once 'conn.php';
$PFN=$_REQUEST['PFN'];
$SNO=$_REQUEST['SNO'];

$sql="SELECT `Staff Number`,`Employer`, `From`,`To`,`Location`,	`Position` FROM `employment_history` WHERE `Employer`='$PFN' and `Staff Number`='$SNO'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);
?>
<head>

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
	};
</script>
</head>

<form action="submitPEmploy.php" method="post">
<div align="left" class="agileinfo_mail_grids" style="width:100%">
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Staff Number</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="serviceno" size="31" value="<?php echo $row['Staff Number']; ?>">
    <input type="hidden" name="id" size="31" value="<?php echo $row['ID']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Position</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="position" size="31" value="<?php echo $row['Position']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Employer</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="employer" size="31" value="<?php echo $row['Employer']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Employment Start Date</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="from" id="inputField" value="<?php echo $row['From']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Employment End Date</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="to" id="inputFieldB" value="<?php echo $row['To']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Location</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="location" value="<?php echo $row['Location']; ?>">
  </span>
    <p>
<?php
if (!$PFN){
?>
  <input type="submit" value="Save" name="submit" style="width:130px; height:35px"> &nbsp;
<?php } 
 else { ?>
  <input type="submit" value="Update" name="submit" style="width:130px; height:35px"> &nbsp; 
  <input type="submit" value="Delete" name="submit" style="width:130px; height:35px" onclick="return confirm('Are you sure you want to Delete?');"> &nbsp; 
<?php
}
 ?>

</div> 
<p align="right">
<?php 
 echo "<a href='staff.php#tabs1-employment'>Click here</a> to return to list.";
?>
</p>
</form>
