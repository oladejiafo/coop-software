<?php
require_once 'conn.php';
// require_once 'style.php';

@$id=$_REQUEST['id'];
@$acctno=$_REQUEST['acctno'];
@$tval=$_REQUEST['tval'];

$idxx=$_REQUEST['idx'];
$trans=$_REQUEST['trans'];

list($cp, $fld) = explode(' ', $_SESSION['company']);
$cpfolder=$cp . $fld;
?>

<section class="panel">
       <div class="panel-body" align="center" style="margin-top:10px;margin-bottom:10px">
       <fieldset>
<legend><b><font color='#006699' style='font-size: 12pt'><i>Guarantor</i></b></font></legend>
<?php
$sqlTX="SELECT * FROM `loan guarantor` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID`='$idxx'";
$resultTX = mysqli_query($conn,$sqlTX) or die('Could not look up user data; ' . mysql_error());
$rowTX = mysqli_fetch_array($resultTX);
?>

<form action="submitguarantor.php" method="post"  enctype="multipart/form-data">
<div align="left">
   <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Guarantor:</span>
	</label>
        <input type="text" name="guarantor" size="31" value="<?php echo $rowTX['Guarantor']; ?>" class="input__field input__field--chisato" placeholder=" ">
        <input type="hidden" name="id" size="31" value="<?php echo $rowTX['ID']; ?>">
        <input type="hidden" name="lid" size="31" value="<?php echo $row['ID']; ?>">
        <input type="hidden" name="acctno" size="31" value="<?php echo $acctno; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Phone/Address:</span>
	</label>
        <input type="text" name="contact" size="31" value="<?php echo $rowTX['Contact']; ?>" class="input__field input__field--chisato" placeholder=" ">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Occupation:</span>
	</label>
        <input type="text" name="occupation" size="31" value="<?php echo $rowTX['Occupation']; ?>" class="input__field input__field--chisato" placeholder=" ">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Business Address:</span>
	</label>
        <input type="text" name="baddress" size="31" value="<?php echo $rowTX['Business Address']; ?>" class="input__field input__field--chisato" placeholder=" ">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Identification Type:</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" "  name="idtype" width="31" value="<?php echo $rowTX['Identification Type']; ?>">  
          <?php  
           echo '<option selected>' . $rowTX['Identification Type'] . '</option>';
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
        <input class="input__field input__field--chisato" placeholder=" "  type="text" name="idnumber" size="24" value="<?php echo $rowTX['Identification Number']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">ID Card Expiry Date:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " id="inputField2"  type="text" name="idexpire" size="24" value="<?php echo $rowTX['ID Expiration']; ?>">
      </span>
<span class="input input--chisato" style="vertical-align:bottom">
<div style="vertical-align:bottom">
<span>
 <?php
  if(strlen($idxx) > 1)
  {
    $idX=$idxx;
  } else {
    $idX ="X5677";
  }
  if (file_exists("images/sign/" .$cpfolder. "/gr_" . $idX . ".jpg")==1)
  {
 ?>
              <img border="1" src="images/sign/<?php echo $cpfolder;?>/gr_<?php echo $idX; ?>.jpg" width="140" height="70">
 <?php
  } else {
?>
              <img border="1" src="images/sign/sign.jpg" width="140" height="70">
<?php
  }
 ?>
</span>
<span>
 Browse & Upload Image:<br>
<input name="sign_filename" type="file" id="sign_filename" size="15">
</span>
</div>
</span>
<span class="input input--chisato">
<div style="vertical-align:bottom">
<span>Upload Guarantor ID Card:</span><br>
<span>
<?php
  if (file_exists("images/scan/grid_" . $idX . ".jpg")==1)
  { 
?>
              <img border="1" src="images/scan/grid_<?php echo $idX; ?>.jpg" width="200" height="110">
<?php
  } else { 
?>
              <img border="1" src="images/scan/card.jpg" width="200" height="110">	 
<?php
  } 
?>			 
</span>
<span>
Browse and Upload Scan<br><input name="scan_filename" type="file" id="scan_filename">
</span>
</div>
</span>
      <span class="input input--chisato">
<?php
 if (!$idxx)
 {
?>
  <input type="submit" value="Save" name="submit" style="color:#fff;background-color:gray; width:150px; height:35px;font-size: 13px;"> &nbsp;
  <input type="submit" value="Close" name="submit" style="color:#000;background-color:#; width:150px; height:35px;font-size: 13px;"> &nbsp;
<?php 
 } else { 
?>
  <input type="submit" value="Update" name="submit" style="color:#fff;background-color:blue; width:150px; height:35px;font-size: 13px;"> &nbsp;
  <input type="submit" value="Delete" name="submit" style="color:#fff;background-color:black; width:150px; height:35px;font-size: 13px;" onclick="return confirm('Are you sure you want to Delete?');"> &nbsp;
<?php
 }
?> 
</span>
</form>

</div>

  </div>
</section>
