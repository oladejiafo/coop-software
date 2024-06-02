<?php

 require_once 'conn.php';

$LID=$_REQUEST['LID'];
$SNO=$_REQUEST['SNO'];

$sql="SELECT `Staff Number`,`LeaveID`, `Type`,`From`,`To`,`Days`,`Date Resumed` FROM `leave` WHERE `LeaveID`='$LID'";
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
		new JsDatePick({
			useMode:2,
			target:"inputFieldC",
			dateFormat:"%Y-%m-%d"

		});

	};
</script>
</head>

<div align="left" class="agileinfo_mail_grids" style="width:100%">
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Staff ID Number</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="serviceno" size="31" value="<?php echo $row['Staff Number']; ?>">
    <input type="hidden" name="id" size="31" value="<?php echo $row['ID']; ?>">
    <input type="hidden" name="leaveid" size="31" value="<?php echo $row['LeaveID']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato">Leave Type</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="leavetype" size="31" value="<?php echo $row['Type']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato">Leave Start Date</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="from" id="inputField" value="<?php echo $row['From']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato">Leave End Date</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="to" id="inputFieldB" value="<?php echo $row['To']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato">No of. Days</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="days" value="<?php echo $row['Days']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato">Date Resumed</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="dateresumed" id="inputFieldC" value="<?php echo $row['Date Resumed']; ?>">
  </span>
    <p>
<?php
if (!$LID){
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
  
  </div> 
<p align="right">
<?php 
 echo "<a href='staff.php#tabs1-leave'>Click here</a> to return to list.";
?>
</p>
</form>
