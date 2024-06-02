<?php
require_once 'conn.php';
// require_once 'style.php';

@$id=$_REQUEST['id'];
@$acctno=$_REQUEST['acctno'];
@$loanidd=$_REQUEST['loanidd'];
@$tval=$_REQUEST['tval'];
?>

<section class="panel">
 <div class="panel-body" align="center" style="margin-top:10px;margin-bottom:10px">
<?php
$sql1="SELECT * FROM `loan payment` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno' and `ID`='$id'";
$result1 = mysqli_query($conn,$sql1) or die('Could not look up user data; ' . mysqli_error());
$row1 = mysqli_fetch_array($result1);
?>
<div class="tab-roww" style="font-weight:bold;width:100%;height:3px;background-color:#ff0000">
    <div  class="celll" style='width:100%;;background-color:#FFF000'></div>
</div>
<form action="submitloans.php" method="post">
<div align="left" style="margin-left:30px;padding-left:50px;" class="agileinfo_mail_grids">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="font-size:14px" class="input__label-content input__label-content--chisato"><b>Loan Amount</b>:<pre><?php echo number_format($row['Loan Amount'],2); ?></pre></span>
          <input type="hidden" name="amount" size="15" value="<?php echo @$row['Loan Amount']; ?>"> 
	</label>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="font-size:14px" class="input__label-content input__label-content--chisato"><b>Balance Left</b>:<pre><?php echo number_format($row['Balance'],2); ?></pre></span>
          <input type="hidden" name="balance" size="15" value="<?php echo @$row['Balance']; ?>">  
          <input type="hidden" name="id" size="31" value="<?php echo @$row1['ID']; ?>">
          <input type="hidden" name="loanid" size="31" value="<?php if($loanidd){echo $loanidd;} else {echo @$row['ID'];} ?>">
          <input type="hidden" name="acctnum" size="15" value="<?php if($acctno){echo $acctno;} else {echo @$row2['Account Number'];} ?>"> 
	        <input type="hidden" name="type" size="15" value="<?php echo @$row2['Account Type']; ?>"> 
	</label>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="font-size:14px" class="input__label-content input__label-content--chisato"><b>Re-Payment Date</b>:</span>
	</label>
	  <?php if (!$row1['Date'])
	  { ?>
        <input id="inputField" type="text" class="input__field input__field--chisato" name="date" value="<?php echo date('d-m-Y'); ?>">
	  <?php } else { ?>
        <input id="inputField" type="text" class="input__field input__field--chisato" name="date" value="<?php echo date('d-m-Y',strtotime($row1['Date'])); ?>">		
	  <?php } ?> 
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="font-size:14px" class="input__label-content input__label-content--chisato"><b>Re-Payment Amount</b>:</span>
	</label>
          <?php
if (!$id){
  if ($row['Payment Type']=="Daily Simple Interest")
  {
?>
        <input type="text" class="input__field input__field--chisato" name="repay" value="<?php echo @$row['Daily Repay']; ?>">
<?php
  } else {
?>
        <input type="text" class="input__field input__field--chisato" name="repay" value="<?php echo @$row['Periodic Repayment']; ?>">
<?php
  }
} else {
?>
        <input type="text" class="input__field input__field--chisato" name="repay" value="<?php echo @$row1['Amount']; ?>">
<?php
}
?>  
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="font-size:14px" class="input__label-content input__label-content--chisato"><b>Late Payment:</b></span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" "  name="latepay" width="31" value="<?php echo $row['Late Payment']; ?>">  
          <?php  
           echo '<option selected>' . $row['Late Payment'] . '</option>';
           echo '<option>Apply Late Payment Charges</option>';
           echo '<option>Do No Apply</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
<?php
if (!$id){
?>
  <input type="submit" value="Save Payment" name="submit" style="height:40px; width:150px; font-size: 13px;margin-top:15px"> &nbsp;
  <input type="submit" value="Close" name="submit" style="height:40px; width:150px; font-size: 13px;margin-top:15px"> &nbsp;
<?php
} else {
?>  
  <input type="submit" value="Update Payment" name="submit" style="height:40px; width:150; font-size: 13px;margin-top:15px"> &nbsp;  
  <input type="submit" value="Delete Payment" name="submit" style="height:40px; width:150; font-size: 13px;margin-top:15px"> &nbsp;
<?php } ?>
      </span>
</div>
</form>


  </div>
</section>
