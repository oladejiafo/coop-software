<?php
session_start();

 require_once 'conn.php';
$sqr="SELECT * FROM `company info` WHERE `Company Name` ='" .$_SESSION['company']. "'";
$reslt = mysqli_query($conn,$sqr) or die('Could not look up user data; ' . mysqli_error());
$rw = mysqli_fetch_array($reslt);
$coy=$rw['Company Name'];
$addy=$rw['Address'];
$phn=$rw['Phone'];

 @$idd=$_REQUEST["idd"];
 @$acctno=$_REQUEST["acctno"];
 @$trans=$_REQUEST["trans"];
 @$filter=$_REQUEST["filter"];
 @$filter2=$_REQUEST["filter2"];

 $filename = "Loan_Statement_" . date('Ymd') . $filter . ".doc";
 header("Content-Disposition: attachment; filename=\"$filename\"");
 header("Content-Type: application/vnd.ms-word"); 
?>

<table width='450'>
<tr><td width='260'><font style='font-size: 15pt'><b><?php echo $coy; ?></b></font></td></tr>
<tr><td width='260'><font style='font-size: 13pt'><b><?php echo $addy; ?></b>
</font></td></tr>
<tr><td width='260'><font style='font-size: 13pt'><b><?php echo $phn; ?></b>
</font></td></tr>
<tr><td colspan=1><h2><left>LOAN STATEMENT</left></h2></td></tr>
</table>
<div align="left">

<table border="0" width="85%" cellspacing="1" bgcolor="#FFFFFF" id="table1">
<tr align='left'>
 <td><b>
     <h4><left>FROM: <font color='red'><?php echo date('d F, Y',strtotime($filter)); ?></font> TO <font color='red'><?php echo date('d F, Y',strtotime($filter2)); ?></font> </left></h4>
 </td>
</tr>
<tr>
	<td>

<?php
$sql2="SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Membership Number`='$acctno'";
$result2 = mysqli_query($conn,$sql2) or die('Could not look up user data; ' . mysqli_error());
$row2 = mysqli_fetch_array($result2); 

$sql3="SELECT * FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno'";
$result3 = mysqli_query($conn,$sql3) or die('Could not look up user data; ' . mysqli_error());
$row3 = mysqli_fetch_array($result3);
?>
<div align="left">
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="99%" id="AutoNumber1" height="70">
   
    <tr>
      <td width="22%" height="28">
       &nbsp; <b>First Name:</b>
      </td>
      <td width="25%" height="28">
       <input type="hidden" name="fname" size="25" value="<?php echo @$row2['First Name']; ?>"><?php echo @$row2['First Name']; ?>
      </td>
      <td width="1%" height="28"></td>
      <td width="22%" height="28">
        <b>Surname:</b>
      </td>
      <td width="30%" height="28">
          <input type="hidden" size="25" name="sname" value="<?php echo @$row2['Surname']; ?>"><?php echo @$row2['Surname']; ?>
      </td>
    </tr>
    <tr>
      <td width="24%" height="28">
        &nbsp; <b>Account Number:</b>
      </td>
      <td width="25%" height="28">
        <input type="hidden" name="id" size="31" value="<?php echo @$row['ID']; ?>">
        <input type="hidden" name="trans" size="31" value="<?php echo @$trans; ?>">		
        <input type="hidden" name="acctno" size="25" value="<?php echo @$row2['Account Number']; ?>"><?php echo @$row2['Account Number']; ?>
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        <b>Loan Type:</b>
      </td>
      <td width="34%" height="28">
        <input type="hidden" name="type" size="25" value="<?php echo $row3['Loan Type']; ?>"><?php echo $row3['Loan Type']; ?>
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
       &nbsp; <b>Loan Status:</b>
      </td>
      <td width="25%" height="28">
	<?php echo $row3['Loan Status']; ?>
        <input type="hidden" name="status" size="25" value="<?php echo $row3['Loan Status']; ?>">
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        <b>Total Loan:</b>
      </td>
      <td width="34%" height="28">
	<?php echo $row3['Loan Amount']; ?>
        <input type="hidden" name="amount" size="25" value="<?php echo $row3['Loan Amount']; ?>">
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
       &nbsp; <b>Balance Left:</b>
      </td>
      <td width="25%" height="28">
        <input type="hidden" name="balance" size="25" value="<?php echo $row3['Balance']; ?>"><?php echo $row3['Balance']; ?>
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        <b>Loan Duration:</b>
      </td>
      <td width="34%" height="28">
	<?php echo $row3['Loan Duration']; ?>
        <input type="hidden" name="duration" size="25" value="<?php echo $row3['Loan Duration']; ?>">
      </td>
    </tr>
  </table>
  </div>
</body>
			</td>
		</tr>
<tr><td align="left">
<TABLE width='100%' border='1' cellpadding='1' cellspacing='1' align='center' bordercolor="#ccCCcc" id="table2">
 <?php
 
   $query_count = "SELECT * FROM `loan Payment` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='" . $acctno . "'";
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

  echo "<tr><td colspan=9 align='center'><b><font color='#000000' style='font-size: 10pt'> LOAN PAYMENTS</font></b></td></tr>";
  echo "<TR><TH><b><u>S/No </b></u>&nbsp;</TH><TH align='right'><b><u>Payment Date </b></u>&nbsp;</TH><TH align='right'><b><u>Payment Amount </b></u>&nbsp;</TH><TH align='center'><b><u>Payment-To-Date </b></u>&nbsp;</TH></TR>";

   $query = "SELECT `ID`,`Date`,`Account Number`,`Amount` FROM `loan payment` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='" . $acctno . "' and (`Date` between '" . $filter . "' and '" . $filter2 . "') order by `ID` desc";
   $resultp=mysqli_query($conn,$query);
   
$i=0;
$ptd=0;
$samt=0;
    while(list($idd,$date,$acctn,$amt)=mysqli_fetch_row($resultp))
    { 
     $ptd=$ptd+$amt;
     $samt=$samt+$amt;
     $amt=number_format($amt,2);
     $ptd=number_format($ptd,2);
     $i=$i+1;
     echo "<TR><TH>$i &nbsp;</TH><TH>$date </TH><TH align='right'>$amt &nbsp;</TH><TH align='right'> $ptd &nbsp;</TH></TR>";
    }
     $samt=number_format($samt,2);
    echo "<TR><TH> &nbsp;</TH><TH> </TH><TH align='right'>$samt &nbsp;</TH><TH align='right'>  &nbsp;</TH></TR>";

?>
</table>
</fieldset>
</td></tr>
	</table>

</div>

