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


								<section class="panel">
									<header class="panel-heading">
										<h2 class="panel-title">Staff Details</h2>
									</header>
									<div class="panel-body">

<form action="submitstaff.php" method="post" enctype="multipart/form-data">
<?php
@$sno = $row['Staff Number'];
 @$serviceno = $_REQUEST["serviceno"];
?>
<p><b><font color="#FF0000" style="font-size: 9pt"><?php echo $tval ; ?></font></b> </p>

<div>
<b><i>
<?php echo $row['Firstname'] . " " .$row['Surname']; ?>
</i></b>
</div>
<div>
<span>
<?php
  if (file_exists("../images/pics/" . $row['Staff Number'] . ".jpg")==1)
  {
?>
    <img border="1" src="../images/pics/<?php echo $row['Staff Number']; ?>.jpg" width="120" height="140">
<?php
  } else { 
?>
    <img border="1" src="../images/pics/pix.jpg" width="120" height="140">	 
<?php
  } 
?>	
</span>
<span>Upload Image:</span>
<span><input name="image_filename" type="file" id="image_filename">
<input type="hidden" name="SNO" value="<?php echo $row['Staff Number'];?>"></span>
</div>

<div class='container' style="width:100%">
<div align="left" class="agileinfo_mail_grids">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Staff ID Number</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="serviceno" size="31" value="<?php echo $row['Staff Number']; ?>">
        <input type="hidden" name="ID" size="31" value="<?php echo $row['ID']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Present Status">Present Status</span>
	</label>
          <select class="input__field input__field--chisato" placeholder=" " style="height:40px" name="cmbstatus" value="<?php echo $row['Employment Status']; ?>">          
          <?php  
           echo '<option selected>' . $row['Employment Status'] . '</option>';
           echo '<option>Active</option>';
           echo '<option>Suspended</option>';          
           echo '<option>Terminated</option>';
           echo '<option>Resigned</option>';
 ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Surname">Surname</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="surname" size="31" value="<?php echo $row['Surname']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="First Name">First Name</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="firstname" size="31" value="<?php echo $row['Firstname']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Other Names">Other Names</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="othername" size="31" value="<?php echo $row['Othername']; ?>">
      </span> 
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Personnel Status">Staff Status</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" " name="pstatus" value="<?php echo $row['Personnel Status']; ?>">          
          <?php  
           echo '<option selected>' . $row['Personnel Status'] . '</option>';
           echo '<option>Serving</option>';
           echo '<option>Retired</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Department">Department</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" " name="dept" width="31" value="<?php echo $row['Dept']; ?>">  
          <?php  
           echo '<option selected>' . $row['Dept'] . '</option>';
           $sql = "SELECT * FROM `department`";
           $result_dept = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_dept)) 
           {
             echo '<option>' . $rows['Dept'] . '</option>';
           }
          ?> 
         </select> 
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Designation/Rank">Designation/Rank</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" " name="presentrank" width="31" value="<?php echo $row['Present Rank']; ?>">  
          <?php  
           echo '<option selected>' . $row['Present Rank'] . '</option>';
           $sql = "SELECT * FROM `rank`";
           $result_prank = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_prank)) 
           {
             echo '<option>' . $rows['Rank'] . '</option>';
           }
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Sex">Sex</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" " name="sex" width="31" value="<?php echo $row['Sex']; ?>">  
          <?php  
           echo '<option selected>' . $row['Sex'] . '</option>';
           echo '<option>Male</option>';
           echo '<option>Female</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Date of Birth">Date of Birth</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="dob" size="31" value="<?php echo $row['DoB']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Grade Level">Grade Level</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" " name="level" width="31" value="<?php echo $row['Level']; ?>">  
          <?php  
           echo '<option selected>' . $row['Level'] . '</option>';
           $sql = "SELECT * FROM `grade level`";
           $result_gl = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_gl)) 
           {
             echo '<option>' . $rows['GL'] . '</option>';
           }
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Qualification">Qualification</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" " name="qualification" width="31" value="<?php echo $row['Qualification']; ?>">  
          <?php  
           echo '<option selected>' . $row['Qualification'] . '</option>';
           $sql = "SELECT * FROM `qualification`";
           $result_qualf = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_qualf)) 
           {
             echo '<option>' . $rows['Qualification'] . '</option>';
           }
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Present Location">Present Location</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" " name="presentlocation" width="31" value="<?php echo $row['Present Location']; ?>">  
          <?php  
           echo '<option selected>' . $row['Present Location'] . '</option>';
           $sql = "SELECT * FROM `location`";
           $result_loc = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_loc)) 
           {
             echo '<option>' . $rows['Location'] . '</option>';
           }
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Previous Location">Previous Location</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" " name="previouslocation" width="31" value="<?php echo $row['Prev Location']; ?>">  
          <?php  
           echo '<option selected>' . $row['Prev Location'] . '</option>';
           $sql = "SELECT * FROM `location`";
           $result_pvloc = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_pvloc)) 
           {
             echo '<option>' . $rows['Location'] . '</option>';
           }
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="1st Appt Date">1st Appt Date</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="firstappt" size="31" value="<?php echo $row['First Appt']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Present Appt Date">Present Appt Date</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="presentappt" size="31" value="<?php echo $row['Present Appt']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Profession">Profession</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" " name="profession" width="31" value="<?php echo $row['Profession']; ?>">  
          <?php  
           echo '<option selected>' . $row['Profession'] . '</option>';
           $sql = "SELECT * FROM `profession`";
           $result_prof = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_prof)) 
           {
             echo '<option>' . $rows['Profession'] . '</option>';
           }
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Position">Position</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" " name="position" width="31" value="<?php echo $row['Position']; ?>">  
          <?php  
           echo '<option selected>' . $row['Position'] . '</option>';
           $sql = "SELECT * FROM `position`";
           $result_pos = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_pos)) 
           {
             echo '<option>' . $rows['Position'] . '</option>';
           }
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Confirmed?">Confirmed?</span>
	</label>
<div class="radioGroup">
        <?php
          $sql = "SELECT `val`,`type` FROM `booln` ORDER BY `type` desc";
          $result_cn = mysqli_query($conn,$sql) or die('Could not list; ' . mysqli_error());

          $cn=$row['Confirmed'];

          while ($rows = mysqli_fetch_array($result_cn)) 
          {
           echo ' <input type="radio" align="left" id="cn_' . $rows['val'] . '" name="confirmed" value="' . $rows['val'] . '" ';
           if ($rows['val'] == $cn) 
           {
             echo 'checked="checked" ';
           }
           echo '/><level>' . $rows['type'] . "</level>\n";
          }
        ?>
      </div>
     </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Date of Confirmation">Date of Confirmation</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="dateconfirmed" size="31" value="<?php echo $row['Date Confirmed']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Employment Type">Employment Type</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="employtype" size="31" value="<?php echo $row['Employment Type']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="e-Mail">e-Mail</span>
	</label>
       <input class="input__field input__field--chisato" placeholder=" " type="text" name="email" size="31" value="<?php echo $row['email']; ?>">
      </span>
</div>
<br>
<div align="left">
  <legend><b><i><font size="2" face="Tahoma" color="#87ceff">Financial Info</font></i></b></legend>
</div>
<div align="left" class="agileinfo_mail_grids">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Pensionable?">Pensionable?</span>
	</label>
<div class="radioGroup">
  <?php
          $sql = "SELECT `val`,`type` FROM `booln` ORDER BY `type` desc";
          $result_cn = mysqli_query($conn,$sql) or die('Could not list; ' . mysqli_error());

          $cn=$row['Pensionable'];

          while ($rows = mysqli_fetch_array($result_cn)) 
          {
           echo ' <input type="radio" align="left" id="cn_' . $rows['val'] . '" name="pensionable" value="' . $rows['val'] . '" ';
           if ($rows['val'] == $cn) 
           {
             echo 'checked="checked" ';
           }
           echo '/><label>' . $rows['type'] . "</label>\n";
          }
  ?>
</div>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Pension Managers">Pension Managers</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" " name="pensionmanagers" width="31" value="<?php echo $row['Pension Managers']; ?>">  
          <?php  
           echo '<option selected>' . $row['Pension Managers'] . '</option>';
           $sql = "SELECT * FROM `pension managers`";
           $result_pman = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_pman)) 
           {
             echo '<option>' . $rows['Pension Managers'] . '</option>';
           }
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Address of PFA">Address of PFA</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="pfa" size="31" value="<?php echo $row['PFA Address']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Bank">Bank</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" " name="bank" width="31" value="<?php echo $row['Bank']; ?>">  
          <?php  
           echo '<option selected>' . $row['Bank'] . '</option>';
           $sql = "SELECT * FROM `bank`";
           $result_bank = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_bank)) 
           {
             echo '<option>' . $rows['Name'] . '</option>';
           }
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Account Number">Account Number</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="acctno" size="31" value="<?php echo $row['Acct No']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Tax IDN">Tax IDN</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="tax" size="31" value="<?php echo $row['Tax ID']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Pension Pin">Pension Pin</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="pensionpin" size="31" value="<?php echo $row['Pension Pin']; ?>">
      </span>
  </div>
    <br>

<div align="left">
<legend><b><i><font size="2" face="Tahoma" color="#87ceff">Personal Info</font></i></b></legend>
</div>
<div align="left" class="agileinfo_mail_grids">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Nationality">Nationality</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" " name="nationality" width="31" value="<?php echo $row['Nationality']; ?>">  
          <?php  
           echo '<option selected>' . $row['Nationality'] . '</option>';
           $sql = "SELECT * FROM `nationality`";
           $result_nat = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_nat)) 
           {
             echo '<option>' . $rows['Nationality'] . '</option>';
           }
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="State">State</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" " name="state" width="31" value="<?php echo $row['State']; ?>">  
          <?php  
           echo '<option selected>' . $row['State'] . '</option>';
           $sql = "SELECT * FROM `state`";
           $result_state = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_state)) 
           {
             echo '<option>' . $rows['State'] . '</option>';
           }
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="LGA">LGA</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" " name="lga" width="31" value="<?php echo $row['LGA']; ?>">  
          <?php  
           echo '<option selected>' . $row['LGA'] . '</option>';
           $sql = "SELECT * FROM `lga`";
           $result_lga = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_lga)) 
           {
             echo '<option>' . $rows['LGA'] . '</option>';
           }
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Place of Birth">Place of Birth</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="birthplace" size="31" value="<?php echo $row['Birth Place']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Marital Status">Marital Status</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" " name="maritalstatus" width="31" value="<?php echo $row['Marital Status']; ?>">  
          <?php  
           echo '<option selected>' . $row['Marital Status'] . '</option>';
           echo '<option>Single</option>';
           echo '<option>Married</option>';
           echo '<option>Divorced</option>';
           echo '<option>Separated</option>';
           echo '<option>Widowed</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Phone Number">Phone Number</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="phone" size="31" value="<?php echo $row['Phone']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Home Address">Home Address</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="homeaddress" size="31" value="<?php echo $row['Home Address']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Contact Address">Contact Address</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="contactaddress" size="31" value="<?php echo $row['Contact Address']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Height">Height</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="height" size="31" value="<?php echo $row['Height']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Weight">Weight</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="weight" size="31" value="<?php echo $row['Weight']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Genotype">Genotype</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="genotype" size="31" value="<?php echo $row['Genotype']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Blood Group">Blood Group</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="bloodgroup" size="31" value="<?php echo $row['Blood Group']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="State Any Deformity">State Any Deformity</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="deformity" size="31" value="<?php echo $row['Deformity']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Living In Quarters?">Living In Quarters?</span>
	</label>
<div class="radioGroup">
        <?php
          $sql = "SELECT `val`,`type` FROM `booln` ORDER BY `type` desc";
          $result_govt = mysqli_query($conn,$sql) or die('Could not list; ' . mysqli_error());

          $govt=$row['In Govt Qtrs'];

          while ($rows = mysqli_fetch_array($result_govt)) 
          {
           echo ' <input type="radio" align="left" id="govt_' . $rows['val'] . '" name="ingovtqrt" value="' . $rows['val'] . '" ';
           if ($rows['val'] == $govt) 
           {
             echo 'checked="checked" ';
           }
           echo '/>' . $rows['type'] . "\n";
          }
        ?>
      </div>
    </span>
  </div>
    <br>

<div align="left">
<legend><b><i><font size="2" face="Tahoma" color="#87ceff">Next of Kin Info</font></i></b></legend>
</div>
<div align="left" class="agileinfo_mail_grids">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Name">Name</span>
	</label>    
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="NKName" size="31" value="<?php echo $rownk['Name']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Phone">Phone</span>
	</label>    
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="NKPhone" size="31" value="<?php echo $rownk['Phone']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Address">Address</span>
	</label>    
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="NKAddress" size="31" value="<?php echo $rownk['Address']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Relationship">Relationship</span>
	</label>    
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="NKRelate" size="31" value="<?php echo $rownk['Relationship']; ?>">
      </span>
  </div>

<p>
<?php
if (!$SNO){
?>
  <input type="submit" value="Save" name="submit" style="width:130px; height:35px"> &nbsp;
<?php } else { 
if ($_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] == 33 or $_SESSION['access_lvl'] == 5) 
{
?>
  <input type="submit" value="Update" name="submit" style="width:130px; height:35px"> &nbsp;  
  <input type="submit" value="Delete" name="submit" style="width:130px; height:35px" onclick="return confirm('Are you sure you want to Delete?');"> &nbsp;
<?php
}} 
?>
</p>

<p align="right">
<?php 
 echo "<a target='blank' href='rptstaff.php?SNO=" . $SNO . "'>Click here</a> to print this page &nbsp ||&nbsp &nbsp";
 echo "<a href='hr.php'>Click here</a> to return to list.";
?>
</p>
</div>
									</div>
								</section>
