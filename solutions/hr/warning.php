<?php
 require_once 'conn.php';

@$SNO=$_REQUEST['SNO'];
@$id=$_REQUEST['id'];
@$add=$_REQUEST['add'];

$sql="SELECT `staff`.`Staff Number`,`staff`.Surname,`staff`.Firstname,`staff`.Dept,`staff`.`Present Rank`,`staff`.Level,`staff`.Step FROM `staff` WHERE `staff`.`Staff Number`='$SNO'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);

$sqlw="SELECT `ID`,`Staff Number`,`Reference`,`Date`,`Action`,`Issued By`,`Remark` FROM `warning` WHERE `ID`='$id' order by Date desc";
$resultw = mysqli_query($conn,$sqlw) or die('Could not look up user data; ' . mysqli_error());
$roww = mysqli_fetch_array($resultw);
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

	};
</script>
</head>


<fieldset style="padding: 2">
<form action="submitwarning.php" method="post">
<div align="left" class="agileinfo_mail_grids" style="width:100%">
<span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Reference Number</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="reference" size="31" value="<?php echo $row['Reference']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Staff ID Number</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="serviceno" size="31" value="<?php echo $row['Staff Number']; ?>">
    <input type="hidden" name="id" size="31" value="<?php echo $row['ID']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Surname</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="surname" size="31" value="<?php echo $row['Surname']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">First Name</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="firstname" size="31" value="<?php echo $row['Firstname']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Department</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="dept" size="31" value="<?php echo $row['Dept']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Date</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="date" id="inputField" value="<?php echo $roww['Date']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Action</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="warning" value="<?php echo $roww['Action']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Issued By</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="issuedby" value="<?php echo $roww['Issued By']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Remark</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="remark" value="<?php echo $roww['Remark']; ?>">
  </span>

<br>
<?php
if (!$id){
?>
  <input type="submit" value="Save" name="submit" style="width:130px; height:35px"> &nbsp;
<?php } else { 
if ($_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] == 33 or $_SESSION['access_lvl'] == 5) 
{
?>
  <input type="submit" value="Update" name="submit" style="width:130px; height:35px"> &nbsp;  
  <input type="submit" value="Delete" name="submit" style="width:130px; height:35px" onclick="return confirm('Are you sure you want to Delete?');"> &nbsp;
<?php
}} ?>
 
  </div> 
<p align="right">
<?php 
 echo "<a href='staff.php#tabs1-confidential'>Click here</a> to return to list.";
?>
</p>
</form>
