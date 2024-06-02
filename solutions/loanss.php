<?php
require_once 'conn.php';

//check to see if user has logged in with a valid password

@$Tit=$_SESSION['Tit'];
@$acctno=$_REQUEST['acctno'];
@$id=$_REQUEST['id'];
@$tval=$_REQUEST['tval'];
?>

<!-- load jquery ui css-->
<link href="js/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<!-- load jquery library -->
<script src="js/jquery-1.9.1.js"></script>
<!-- load jquery ui js file -->
<script src="js/jquery-ui.min.js"></script>

<style type="text/css">
.oval{
  -moz-border-radius: 90px 90px 90px 90px;
    -webkit-border-radius: 90px 90px 90px 90px;
    border-radius: 45px;
    height: 120px;
}

</style>

<style type="text/css">
.divv-table {
    width: 100%;
    float: left;
    background-color: #fff;
    padding:0;
}

.tab-roww {
	float: left;
  width: 100%;
  background-color: #fff;
}

.celll {
    float: left;

    max-height: auto;
    font-size:12px;
    background-color: #fff;
}

@media (max-width: 480px){
.tab-roww {
	float: left;
	width: 100%;
}

.celll {
    float: left;
    font-size:9px;
}
}
</style>

<script language="JavaScript">

function checkForm()
{
   var camount, cbalance, cloang;
   with(window.document.form1)
   {
      camount    = amount;
      cbalance 	 = balance;
      cloang 	 = balance*2;
   }

   if(!isNumeric(trim(camount.value)))
   {
      alert('Invalid amount. Do not put a coma');
      camount.focus();
      return false;
   }   
    else
   {
      return true;
   }
}

function trim(str)
{
   return str.replace(/^\s+|\s+$/g,'');
}

function isEmail(str)
{
   var regex = /^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;

return regex.test(str);
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    console.log(charCode)
    if (charCode == 45 || charCode == 46 || charCode == 37 || charCode == 39) {
        return true;
    } else if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

</script>

<?php
 @$id=$_REQUEST["id"];

?>
<section class="panel">
       <div class="panel-body" align="center" style="margin-top:10px;margin-bottom:10px">

<div class="tab-roww" style="font-weight:bold;width:100%;height:3px;background-color:#ff0000">
    <div  class="celll" style='width:100%;;background-color:#FFF000'></div>
</div>    
<div align="left" style="margin-left:10px;height:auto" class="agileinfo_mail_grids">
<form  name='form1' id='myform' action="submitloans.php" method="post">
 <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Loan Officer:</span>
	</label>
  <input type="hidden" name="id" size="31" value="<?php echo @$row['ID']; ?>">
  <input type="hidden" name="acctnum" size="15" value="<?php if($row2['Account Number']){echo $row2['Account Number'];} else { echo $acctno;} ?>">

	<?php if(!$row['Officer']) { ?>
        <input type="text" name="officer" size="15" value="<?php echo strtoupper($_SESSION['name']); ?>" class="input__field input__field--chisato" placeholder=" ">
	<?php } else { ?>
        <input type="text" name="officer" size="15" value="<?php echo $row['Officer']; ?>" class="input__field input__field--chisato" placeholder=" ">
	<?php }?>
 </span>
 <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Requested Loan Amount:</span>
	</label>
        <input type="text" name="ramount" id="ramount" size="15" value="<?php echo @$row['Loan Requested']; ?>"  class="input__field input__field--chisato" placeholder=" " onkeypress="return isNumber(event)">
 </span>
 <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Given Loan Amount:</span>
	</label>
        <?php
          $sqlb="SELECT * FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno' order by `ID` desc";
          $resultb = mysqli_query($conn,$sqlb) or die('Could not look up user data; ' . mysql_error());
          $rowb = mysqli_fetch_array($resultb);
        ?>
        <input type="hidden" name="balance" id="balance" size="15" value="<?php echo $rowb['Balance']; ?>"> 
        <input type="text" name="amount" id="amount" size="15" value="<?php echo @$row['Loan Amount']; ?>"  class="input__field input__field--chisato" placeholder=" " onkeypress="return isNumber(event)" >
 </span>
 <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Loan Type:</span>
	</label>
         <select name="loantype" size="1" value="<?php echo @$row['Loan Type']; ?>" class="input__field input__field--chisato" placeholder=" " required>
          <option selected><?php echo @$row['Loan Type']; ?></option>
          <?php
         	$sqlt = "SELECT `Type` FROM `loan type` WHERE `Company` ='" .$_SESSION['company']. "' ORDER BY Type;";
        	$resultt = mysqli_query($conn,$sqlt) or die('Invalid query: ' . mysql_error());
        	while ($rows = mysqli_fetch_array($resultt))
	        {
        	  echo " <option>" . $rows['Type'] . "</option>\n";
	        }
          ?>
         </select>
 </span>
 <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Loan Date:</span>
	</label>
	  <?php if (!$row['Loan Date'])
	  { ?>
        <input id="inputField" type="text" size="15" name="date" value="<?php echo date('d-m-Y'); ?>" class="input__field input__field--chisato" placeholder=" " required>
	  <?php } else { ?>
        <input id="inputField" type="text" size="15" name="date" value="<?php echo date('d-m-Y',strtotime($row['Loan Date'])); ?>" class="input__field input__field--chisato" placeholder=" " required>
	  <?php } ?>
 </span>
 <span class="input input--chisato">
 <?php
          $sqlbc="SELECT `Loan No` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Loan No` !='' order by `ID` desc limit 0,1";
          $resultbc = mysqli_query($conn,$sqlbc) or die('Could not look up user data; ' . mysql_error());
          $rowbc = mysqli_fetch_array($resultbc);
          $loanum=$rowbc['Loan No']+1;
?>
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Loan No:</span>
	</label>
        <input type="text" size="15" name="loanno" value="<?php if($row['Loan No']) { echo @$row['Loan No'];} else { echo $loanum; } ?>" class="input__field input__field--chisato" placeholder=" ">
 </span>
 <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Loan Duration(Months):</span>
	</label>
       <input type="number" min="1" max="120" name="loanduration" value="<?php echo @$row['Loan Duration']; ?>" class="input__field input__field--chisato" placeholder=" " required>
 </span>

      <span class="input input--chisato">

	<label class="input__label input__label--chisato">

		<span class="input__label-content input__label-content--chisato">Payment Frequency:</span>

	</label>

        <select name="paymentfreq" size="1" value="<?php echo @$row['Payment Frequency']; ?>" class="input__field input__field--chisato" placeholder=" " required>

          <?php
if($row['Payment Frequency'])
{
           echo '<option selected>' .$row['Payment Frequency']. '</option>';
} else {
           echo '<option selected>Monthly</option>';
}
           echo '<option>Daily</option>';
           echo '<option>Weekly</option>';

           echo '<option>Monthly</option>';

           echo '<option>Quarterly</option>';

           echo '<option>Yearly</option>';

          ?>
 
         </select>

      </span>

      <span class="input input--chisato">

	<label class="input__label input__label--chisato">

		<span class="input__label-content input__label-content--chisato">Payment Type:</span>
	</label>
         <select name="paymenttype" size="1" value="<?php echo @$row['Payment Type']; ?>" class="input__field input__field--chisato" placeholder=" " required>
          <?php  
           echo '<option selected>' . $row['Payment Type'] . '</option>';
           echo '<option>Flat Rate</option>';
           echo '<option>Compound Interest</option>';
           echo '<option>Reducing Balance</option>';
           echo '<option>Simple Interest</option>';
           echo '<option>Daily Simple Interest</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Loan Grade:</span>
	</label>
         <select name="loangrade" size="1" value="<?php echo @$row['Loan Grade']; ?>" class="input__field input__field--chisato" placeholder=" ">
          <?php  
           echo '<option selected>High</option>';
           echo '<option>Low</option>';

          ?>
 
         </select>

      </span>


      <span class="input input--chisato">

	<label class="input__label input__label--chisato">

		<span class="input__label-content input__label-content--chisato">Loan Purpose:</span>
	</label>
        <textarea style="width:350px" cols="25" rows="2" name="purpose" class="input__field input__field--chisato" placeholder=" "><?php echo @$row['Purpose']; ?></textarea>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Loan Application Fee:</span>
	</label>
        <input type="text" name="applicationfee" id="applicationfee" size="15" value="<?php echo @$row['Application Fee']; ?>"  class="input__field input__field--chisato" placeholder=" " onkeypress="return isNumber(event)"> 
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Loan Processing Fee:</span>
	</label>
        <input type="text" name="processingfee" id="processingfee" size="15" value="<?php echo @$row['Processing Fee']; ?>"  class="input__field input__field--chisato" placeholder=" " onkeypress="return isNumber(event)" > 
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">

		<span class="input__label-content input__label-content--chisato">Loan Insurance Fee:</span>

	</label>
        <input type="text" name="insurancefee" id="insurancefee" size="15" value="<?php echo @$row['Insurance Fee']; ?>"  class="input__field input__field--chisato" placeholder=" " onkeypress="return isNumber(event)">
 
      </span>

      <span class="input input--chisato">

	<label class="input__label input__label--chisato">

		<span class="input__label-content input__label-content--chisato">Int. Rate:</span>

	</label>

<?php
 //$edit= $_REQUEST[edit];
 $edit= 1;
if (!empty($acctn) and $edit==1 and $row['Payment Type'] !="Flat Rate")
{ 
?>
    <input type="text" size="8" name="intrate" value="<?php echo @$row['Interest Rate']; ?>" class="input__field input__field--chisato" placeholder=" ">
<?php
  } else {
?>
    <input type="text" size="8" name="frate" value="<?php echo @$row['Interest Rate']; ?>" class="input__field input__field--chisato" placeholder="If Flat Rate, Amount">
<?php
 }
?>

   </span>

      <span class="input input--chisato">

	<label class="input__label input__label--chisato">

		<span class="input__label-content input__label-content--chisato">Loan Status:</span>

	</label>

         <select name="loanstatus" size="1" value="<?php echo @$row['Loan Status']; ?>" class="input__field input__field--chisato" placeholder=" ">
          
<?php
if($row['Loan Status'])
{
  echo '<option selected>' .$row['Loan Status']. '</option>';
} else {
  echo '<option>Active</option>';
}
           echo '<option>Active</option>';
           echo '<option>Suspended</option>';
           echo '<option>Completed</option>';
           echo '<option>Due</option>';
           echo '<option>Defaulting</option>';

          ?>
 
         </select>
      </span>
      <span class="input input--chisato">
      <?php
if (!empty($acctn) and $edit==1)
{
 ?>
	<label class="input__label input__label--chisato">

		<span class="input__label-content input__label-content--chisato"># of Payment:</span>

	</label>
        <input type="text" size="8" name="payments" value="<?php echo @$row['No of Payment']; ?>" class="input__field input__field--chisato" placeholder=" ">
<?php
 }
?> 
   </span>
   <span class="input input--chisato">
      <?php
if (!empty($acctn) and $edit==1)
{
 ?>
	<label class="input__label input__label--chisato">

		<span class="input__label-content input__label-content--chisato">Late Rate:</span>

	</label>
        <input type="text" size="8" name="latecharges" value="<?php echo @$row['Late Charge']; ?>" class="input__field input__field--chisato" placeholder=" ">
<?php
 } 
?>
      </span>

<?php 

if (!empty($acctn) and $view==1)
{ 
?>

<?php
if($row['Payment Frequency']=="Daily")
{
?>
 <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Daily Interest:</span>
	</label>
  <input type="text" size="8" name="dailyinterest" value="<?php echo @$row['Daily Interest']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
 </span>
 <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Daily Principal:</span>
	</label>
  <input type="text" size="15" name="dailyprincipal" value="<?php echo @$row['Daily Principal']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
 </span>
 <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Daily Total Repay:</span>
	</label>
  <input type="text" size="10" name="dailyrepay" value="<?php echo @$row['Daily Repay']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
 </span>
<?php
}
if($row['Payment Frequency']=="Monthly")
{
?>
 <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Monthly Intr:</span>
	</label>
  <input type="text" size="8" name="monthlyinterest" value="<?php echo @$row['Monthly Interest']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
 </span>
 <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Monthly Principal:</span>
	</label>
  <input type="text" size="8" name="monthlyprincipal" value="<?php echo @$row['Monthly Principal']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
 </span>
 <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Monthly Repay:</span>
	</label>
  <input type="text" size="8" name="repayment" value="<?php echo @$row['Periodic Repayment']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
 </span>
<?php
}
if($row['Payment Frequency']=="Weekly")
{
?> 
 <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Weekly Intr:</span>
	</label>
  <input type="text" size="8" name="monthlyinterest" value="<?php echo number_format(@$row['Monthly Interest']/4,2); ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
 </span>
 <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Weekly Principal:</span>
	</label>
  <input type="text" size="8" name="monthlyprincipal" value="<?php echo @$row['Monthly Principal']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
 </span>
 <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Weekly Repay:</span>
	</label>
  <input type="text" size="8" name="repayment" value="<?php echo number_format((@$row['Monthly Principal']+(@$row['Monthly Interest'])/4),2); ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
 </span>

<?php
}
if($row['Payment Frequency']=="Quarterly")
{
?> 
 <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Quarterly Intr:</span>
	</label>
  <input type="text" size="8" name="monthlyinterest" value="<?php echo number_format(@$row['Monthly Interest']*3,2); ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
 </span>
 <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Quarterly Principal:</span>
	</label>
  <input type="text" size="8" name="monthlyprincipal" value="<?php echo @$row['Monthly Principal']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
 </span>
 <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Quarterly Repay:</span>
	</label>
  <input type="text" size="8" name="repayment" value="<?php echo number_format((@$row['Monthly Principal']+(@$row['Monthly Interest'])*3),2); ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
 </span>

<?php
}
?> 
 <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Total Interest:</span>
	</label>
  <input type="text" size="15" name="totalinterest" value="<?php echo @$row['Total Interest']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
 </span>
 <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Interest toDate:</span>
	</label>
  <input type="text" size="10" name="interesttodate" value="<?php echo @$row['Interest toDate']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
 </span>

      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Principal toDate:</span>
	</label>
        <input type="text" size="15" name="ptodate" value="<?php echo @$row['PPayment todate']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Principal Balance Left:</span>
	</label>
        <input type="text" size="10" name="pbalance" value="<?php echo @$row['PBalance']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>

      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Total toDate:</span>
	</label>
        <input type="text" size="8" name="todate" value="<?php echo @$row['Payment todate']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Total Balance Left:</span>
	</label>
        <input type="text" size="15" name="balance" value="<?php echo @$row['Balance']; ?>" class="input__field input__field--chisato" placeholder=" " readonly="readonly" style="background-color:#eeeeee">
      </span>
      <span class="input input--chisato">

 </span>      
<?php
 } 
?>
</fieldset>
<div class="row">
<div class="col-md-10 pull-left">
<?php
if($row2['Status']=="Active")
{
if (!$row['Account Number'] && $new==1){
?>
  <input type="submit" value="Submit" name="submit" class="btn btn-success" style="color:#fff;background-color:green; width:170px; height:35px;padding:7px; font-size: 13px;margin-top:-20px" onClick="return checkForm();"> &nbsp;
  <input type="submit" value="Close" name="submit" class="btn btn-warning" style="color:#fff;background-color:orange; width:100px; height:35px;padding:7px; font-size: 13px;margin-top:-20px"> &nbsp;
<?php
 } else {
  if (!empty($acctno) and $edit==1)
  { ?>
   <input type="submit" value="Update" name="submit" class="btn btn-primary" style="color:#fff;background-color:blue; width:150px; height:35px;font-size: 13px;margin-top:-20px" onClick="return checkForm();"> &nbsp;  
   <input type="submit" value="Delete" name="submit" class="btn btn-danger" style="color:#fff;background-color:red; width:150px; height:35px; font-size: 13px;margin-top:-20px"  onclick="return confirm('Are you sure you want to Delete?');"> &nbsp;
   <input type="submit" value="Close" name="submit" class="btn btn-warning" style="color:#fff;background-color:orange; width:100px; height:35px;padding:7px; font-size: 13px;margin-top:-20px"> &nbsp;
<?php 
  }
 } 
}?>
</div></div>

</form>
</div>

  </div>
</section>


<?php
if($_REQUEST['tval']=="Your record has been saved.")
{
  echo "<script>alert('You Have Successfully Created The Account');</script>";
}
if($_REQUEST['tval']=="Your record has been updated.")
{
  echo "<script>alert('You Have Successfully Modified The Account');</script>";
}
?>