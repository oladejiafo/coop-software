<p>&nbsp;</p>
<fieldset>
<legend><b><font color='#006666' style='font-size: 12pt'>Collateral</font></b></legend>
<?php
//$idxx=$_REQUEST['idx'];
$acctno=$_REQUEST['acctno'];

$sqlCX="SELECT * FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno' and `Loan Status`='Active'";
$resultCX = mysqli_query($conn,$sqlCX) or die('Could not look up user data; ' . mysql_error());
$rowCX = mysqli_fetch_array($resultCX);
?>
<section class="panel">
       <div class="panel-bodyx" align="left" style="margin-top:1px;margin-bottom:10px">
       
<div align="left" style="margin-left:1px;height:auto" class="agileinfo_mail_grids">
<form action="submitloans.php" method="post">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Collateral:</span>
	</label>
        <input type="text" size="15" name="collateral" value="<?php echo @$rowCX['Collateral']; ?>" class="input__field input__field--chisato" placeholder=" ">
        <input type="hidden" name="id" size="31" value="<?php echo @$rowCX['ID']; ?>">
        <input type="hidden" name="acctnum" size="15" value="<?php echo @$rowCX['Account Number']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Location:</span>
	</label>
        <input type="text" size="15" name="location" value="<?php echo @$rowCX['Collateral Location']; ?>" class="input__field input__field--chisato" placeholder=" ">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Value:</span>
	</label>
        <input type="text" size="15" name="value" value="<?php echo @$rowCX['Collateral Value']; ?>" class="input__field input__field--chisato" placeholder=" ">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Title:</span>
	</label>
        <input type="text" size="15" name="title" value="<?php echo @$rowCX['Collateral Title']; ?>" class="input__field input__field--chisato" placeholder=" ">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Description:</span>
	</label>
        <textarea cols="44" rows="2" name="description" class="input__field input__field--chisato" placeholder=" "><?php echo @$rowCX['Collateral Description']; ?></textarea>
      </span>
     <span class="input input--chisato">
<?php
if ($acctno){
?>
  <input type="submit" value="Add" name="submit" style="height:35; width:120;font-size: 13px;margin-top:-30px" onClick="return checkForm();"> &nbsp;  
  <input type="submit" value="Remove" name="submit" style="height:35; width:120; font-size: 13px;margin-top:-20px"  onclick="return confirm('Are you sure you want to Delete?');"> &nbsp;
<?php 
} 
 ?>
</span>
</form>
</div>

</div></section>
</fieldset>