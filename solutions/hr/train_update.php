<?php
 require_once 'conn.php';

$LID=$_REQUEST['LID'];
$SNO=$_REQUEST['SNO'];

$sql="SELECT `Staff Number`,`Description`, `Start Date`,`End Date`,`Location`,`Organizer`,`Category`,`Performance`,`Further Needs`,`Notes`,`Course Cost`,`Travel Cost` FROM `training` WHERE `Start Date`='$LID'";
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

<form action="submittraining.php" method="post">
<div align="left" class="agileinfo_mail_grids" style="width:100%">
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Staff ID Number</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="serviceno" size="31" value="<?php echo $row['Staff Number']; ?>">
    <input type="hidden" name="id" size="31" value="<?php echo $row['ID']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato">Description</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="description" size="31" value="<?php echo $row['Description']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato">Start Date</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="start" id="inputField" value="<?php echo $row['Start Date']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato">End Date</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="end" id="inputFieldB" value="<?php echo $row['End Date']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato">Location</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="location" value="<?php echo $row['Location']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato">Organizer</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="organizer" value="<?php echo $row['Organizer']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato">Category</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="category" value="<?php echo $row['Category']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato">Performance</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="performance" value="<?php echo $row['Performance']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato">Further Needs</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="needs" value="<?php echo $row['Further Needs']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato">Notes</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="notes" value="<?php echo $row['Notes']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato">Course Cost</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="cost" value="<?php echo $row['Course Cost']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato">Travel Cost</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="travel" value="<?php echo $row['Travel Cost']; ?>">
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
 echo "<a href='staff.php#tabs1-training'>Click here</a> to return to list.";
?>
</p>
</form>
