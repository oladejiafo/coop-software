<?php
#session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 2) & ($_SESSION['access_lvl'] != 6) & ($_SESSION['access_lvl'] != 4) & ($_SESSION['access_lvl'] != 3))
{
 if ($_SESSION['access_lvl'] != 5){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");
die();
}
}

 require_once 'conn.php';
$sqr="SELECT * FROM `company info` WHERE `Company Name` ='" .$_SESSION['company']. "'";
$reslt = mysqli_query($conn,$sqr) or die('Could not look up user data; ' . mysqli_error());
$rw = mysqli_fetch_array($reslt);
$coy=$rw['Company Name'];

 @$idd=$_REQUEST["idd"];
 @$acctno=$_REQUEST["acctno"];
 @$datex=$_REQUEST["datex"];
 @$trans=$_REQUEST["trans"];
 $Filter=$_REQUEST["Filter"];
 @$Filter2=$_REQUEST["Filter2"];
if($Filter=="" OR empty($Filter))
{
  $Filter="2017-01-01";
}
if($Filter2=="" OR empty($Filter2))
{
  $Filter2=date('Y-m-d');
}
?>
<div align="left">
<form  action="report.php" method="POST">
 <body>
 <div align="center">
 <span>
   <input type="text" name="acctno" placeholder="Type Account Number" style="width:120px;height:30px">
 </span><span>
  <input type="text" name="Filter" id="inputFieldA" placeholder="Enter Date Range1" style="width:120px;height:30px">
 </span>
 <span>
   <input type="text" name="Filter2" id="inputFieldB" placeholder="Enter Date Range2" style="width:120px;height:30px">
 </span>
<span> 
     <input type="submit" value="Generate" name="submit" style="width:120px;height:30px">
   <input type="hidden" name="cmbReport" size="12" value="Loan Statement">
     </span></div>
     <br>
 </body>
</form>
</div>
<?php

 $Filter=$_REQUEST["Filter"];
 @$Filter2=$_REQUEST["Filter2"];
if($Filter=="" OR empty($Filter))
{
  $Filter="2017-01-01";
}
if($Filter2=="" OR empty($Filter2))
{
  $Filter2=date('Y-m-d');
}
?>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#000000" width="100%" id="AutoNumber1" height="1">
<tr align='center'>
 <td colspan="5"> </td>
</tr>
  </table>

<table border="0" width="85%" cellspacing="1" bgcolor="#FFFFFF" id="table1">
<tr align='center'>
 <td><b>
     <h3><center><u>LOAN STATEMENT</u></center></h3>
<?php
if($Filter)
{ ?>
     <h4><center>FROM: <font color='red'><?php echo date('d F, Y',strtotime($Filter)); ?></font> TO <font color='red'><?php echo date('d F, Y',strtotime($Filter2)); ?></font> </center></h4>
<?php
}
?>
 </td>
</tr>
<tr>
	<td>
<br>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#000000" width="100%" id="AutoNumber1" height="1">
<tr align='center'>
 <td colspan="5"> </td>
</tr>
  </table>

<?php
$sql="SELECT * FROM `loan payment` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID`='$idd'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);

$sql2="SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND `Membership Number`='$acctno'";
$result2 = mysqli_query($conn,$sql2) or die('Could not look up user data; ' . mysqli_error());
$row2 = mysqli_fetch_array($result2); 

$sql3="SELECT * FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND `Account Number`='$acctno'";
$result3 = mysqli_query($conn,$sql3) or die('Could not look up user data; ' . mysqli_error());
$row3 = mysqli_fetch_array($result3);
?>
<div align="left">
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="99%" id="AutoNumber1" height="70">
   
    <tr>
      <td width="12%" rowspan="6" valign="top"> 
	 <?php  if (file_exists("images/pics/" . $row2['ID'] . ".jpg")==1)
            { ?>
              <img border="1" src="images/pics/<?php echo $row2['ID']; ?>.jpg" width="90" height="120">&nbsp;
	 <?php  } else { ?>
              <img border="1" src="images/pics/pix.jpg" width="90" height="120">&nbsp;	 
	 <?php  } ?>			 
	  </td>
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
        <b>Loan Duration:</b>
      </td>
      <td width="34%" height="28">
     	<?php echo number_format($row3['Loan Duration']); ?>
        <input type="hidden" name="duration" size="25" value="<?php echo $row['Loan Duration']; ?>">
      </td>
    </tr>
    <tr>
    <td width="17%" height="28">
        <b>Total Loan Amount:</b>
      </td>
      <td width="25%" height="28">
     	<?php echo number_format($row3['Loan Amount'],2); ?>
        <input type="hidden" name="amount" size="25" value="<?php echo $row3['Loan Amount']; ?>">
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
       &nbsp; <b>Total Interest:</b>
      </td>
      <td width="34%" height="28">
       <?php
          $intamt=($row3['Loan Amount']*$row3['Interest Rate'])/100;
         echo number_format($intamt,2); 
       ?>
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
       &nbsp; <b>Total Balance Left:</b>
      </td>
      <td width="25%" height="28">
        <input type="hidden" name="tbalance" size="25" value="<?php echo $row3['Balance']; ?>"><?php echo number_format(($row3['Loan Amount']+$intamt-$row3['Payment todate']),2); ?>
      </td>

      <td width="1%" height="28"></td>
      <td width="17%" height="28">
       &nbsp; 
      </td>
      <td width="34%" height="28">
        &nbsp;
      </td>
    </tr>
  </table>
  </div>
</body>
  <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#000000" width="100%" id="AutoNumber1" height="1">
<tr align='center'>
 <td colspan="5"> </td>
</tr>
  </table>
			</td>
		</tr>
<tr><td align="right">
<TABLE width='100%' border='1' cellpadding='1' cellspacing='1' align='center' bordercolor="#ccCCcc" id="table2">
 <?php
 
   $query_count = "SELECT * FROM `loan Payment` WHERE `Company` ='" .$_SESSION['company']. "' AND `Account Number`='" . $acctno . "'";
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

  echo "<tr><td colspan=9 align='center'><b><font color='#000000' style='font-size: 10pt'> LOAN PAYMENTS</font></b></td></tr>";
  echo "<TR><TH><b><u>S/No </b></u>&nbsp;</TH><TH align='right'><b><u>Payment Date </b></u>&nbsp;</TH><TH align='right'><b><u>Payment Amount </b></u>&nbsp;</TH><TH align='center'><b><u>Payment-To-Date </b></u>&nbsp;</TH></TR>";

   $query = "SELECT `ID`,`Date`,`Account Number`,`Amount` FROM `loan payment` WHERE `Company` ='" .$_SESSION['company']. "' AND `Account Number`='" . $acctno . "' and (`Date` between '" . $Filter . "' and '" . $Filter2 . "') order by `ID` desc";
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

<Table align="center">
<tr>
<td>
<?php
echo "<a target='blank' href='rptloanstm.php?filter=$Filter&filter2=$Filter2&acctno=$acctno'> Print this Report</a> &nbsp;";
echo "| <a target='blank' href='loanstmpdf.php?filter=$Filter&filter2=$Filter2&acctno=$acctno'> Export As PDF</a> &nbsp; ";
echo "| <a target='blank' href='exploanstm.php?filter=$Filter&filter2=$Filter2&acctno=$acctno'> Export Excel</a> &nbsp; ";
?>
</td>
</tr>
</Table

</div>

