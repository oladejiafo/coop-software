<?php
 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';

//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & $_SESSION['access_lvl'] != 5) 
{
 if ($_SESSION['access_lvl'] != 1) 
 {
   $redirect = $_SERVER['PHP_SELF'];
   header("Refresh: 0; URL=../index.php?redirect=$redirect");

 }
}

@$id=$_REQUEST['id'];
@$SNO=$_REQUEST['SNO'];

$sql="SELECT `ID`,`Staff Number`,`Staff Name`,`Loan Type`,`Loan Date`,`Loan Amt`,`Payment Mode`,`Monthly Refund`,`Loan Period`,`Loan Balance`,`MonthLoanStop`,`LoanStop`,`RefundToDate`,`Office` FROM loan WHERE `ID`='$id' order by `Loan Date` desc";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);
?>

<div class="services">
	<div class="container"  style="width:100%">

<div class='row' style="background-color:#394247; width:100%" align="center">
  <b><font face="Verdana" color="#FFFFFF" style="font-size: 16pt">Loans Update</font></b>
 </div>

<div align="right">
<legend><b><i><font size="2" face="Tahoma" color="#000000"> <?php require_once 'payheader.php'; ?>
</font></i></b></legend>
</div>

<form action="submitloan.php" method="post">
 <div class='container' style="width:100%">
<div align="left" class="agileinfo_mail_grids">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Staff Number">Staff Number</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="serviceno" size="31" value="<?php echo $row['Staff Number']; ?>">
        <input type="hidden" name="id" size="31" value="<?php echo $row['ID']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Staff Name">Staff Name</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="staffname" size="31" value="<?php echo $row['Staff Name']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Loan Date">Loan Date</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="loandate" size="31" value="<?php echo $row['Loan Date']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Loan Amount">Loan Amount</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="loanamount" size="31" value="<?php echo $row['Loan Amt']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Loan Period(Months)">Loan Period(Months)</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="loanperiod" size="31" value="<?php echo $row['Loan Period']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Loan Type">Loan Type</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" "  name="loantype" width="31" value="<?php echo $row['Loan Type']; ?>">  
          <?php  
           echo '<option selected>' . $row['Loan Type'] . '</option>';
           $sql = "SELECT * FROM `loan type`";
           $result_lt = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_lt)) 
           {
             echo '<option>' . $rows['Type'] . '</option>';
           }
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Monthly Refund">Monthly Refund</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="monthlyrefund" size="31" value="<?php echo $row['Monthly Refund']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Loan Balance">Loan Balance</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="loanbalance" size="31" value="<?php echo $row['Loan Balance']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Refund to Date">Refund to Date</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="refundtodate" size="31" value="<?php echo $row['RefundToDate']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Office">Office</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" "  name="office" width="31" value="<?php echo $row['Office']; ?>">  
          <?php  
           echo '<option selected>' . $row['Office'] . '</option>';
           $sql = "SELECT * FROM `location`";
           $result_office = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_office)) 
           {
             echo '<option>' . $rows['Location'] . '</option>';
           }
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Loan Stop">Loan Stop</span>
	</label>
<div class="radioGroup">
        <?php
          $sql = "SELECT `val`,`type` FROM `booln` ORDER BY `type` desc";
          $result_LS = mysqli_query($conn,$sql) or die('Could not list; ' . mysqli_error());

          $ls=$row['LoanStop'];

          while ($rows = mysqli_fetch_array($result_LS)) 
          {
           echo ' <input type="radio" align="left" id="LS_' . $rows['val'] . '" name="loanstop" value="' . $rows['val'] . '" ';
           if ($rows['val'] == $ls) 
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
		<span class="input__label-content input__label-content--chisato" data-content="Stop Loan for this Month">Stop Loan for this Month Only</span>
	</label>
<div class="radioGroup">
        <?php
          $sql = "SELECT `val`,`type` FROM `booln` ORDER BY `type` desc";
          $result_MLS = mysqli_query($conn,$sql) or die('Could not list; ' . mysqli_error());

          $mls=$row['MonthLoanStop'];

          while ($rows = mysqli_fetch_array($result_MLS)) 
          {
           echo ' <input type="radio" align="left" id="MLS_' . $rows['val'] . '" name="monthloanstop" value="' . $rows['val'] . '" ';
           if ($rows['val'] == $mls) 
           {
             echo 'checked="checked" ';
           }
           echo '/><label>' . $rows['type'] . "</label>\n";
          }
        ?>
</div>
      </span>
    <p>
<?php
if (!$SNO){
?>
  <input type="submit" value="Save" name="submit"> &nbsp;
<?php } else { 
if ($_SESSION['access_lvl'] == 2 or $_SESSION['access_lvl'] == 22 or $_SESSION['access_lvl'] == 5) 
{
?>
  <input type="submit" value="Update" name="submit"> &nbsp; 
  <input type="submit" value="Delete" name="submit" onclick="return confirm('Are you sure you want to Delete?');"> &nbsp; 
<?php
}} ?>
  </p>
  </div>
<?php 
 echo "<p><a href='loans.php'><font color='#6699CC'>Click here</font></a> to return to list.</p>";
?>
 </div>
<?php
require_once 'footer.php';
?>
</div>