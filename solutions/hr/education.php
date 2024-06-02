<?php
 require_once 'conn.php';

$EID=$_REQUEST['EID'];
$SNO=$_REQUEST['SNO'];

$sql="SELECT `Staff Number`,`EduID`,`School`, `From`,`To`,`Qualification` FROM `education` WHERE `EduID`='$EID'";
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

<form action="submitEdu.php" method="post">
<div align="left" class="agileinfo_mail_grids" style="width:100%">
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Staff ID Number</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="serviceno" size="31" value="<?php echo $row['Staff Number']; ?>">
    <input type="hidden" name="id" size="31" value="<?php echo $row['ID']; ?>">
    <input type="hidden" name="eduid" size="31" value="<?php echo $row['EduID']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato">School</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="school" size="31" value="<?php echo $row['School']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato">Qualification</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="qualification" size="31" value="<?php echo $row['Qualification']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato">Start Date</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="from" id="inputField" value="<?php echo $row['From']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato">End Date</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="to" id="inputFieldB" value="<?php echo $row['To']; ?>">
  </span>
    <p>
<?php
if (!$EID){
?>
  <input type="submit" value="Save" name="submit" style="width:130px; height:35px"> &nbsp;
<?php } 
 else { ?>
  <input type="submit" value="Update" name="submit" style="width:130px; height:35px"> &nbsp; 
  <input type="submit" value="Delete" name="submit" style="width:130px; height:35px" onclick="return confirm('Are you sure you want to Delete?');"> &nbsp; 
<?php
}
 ?>
  </p>
  <p align="right">
<?php 
 echo "<a href='staff.php#tabs1-education'>Click here</a> to return to list.";
?>
</p>
  </div>
</form>
