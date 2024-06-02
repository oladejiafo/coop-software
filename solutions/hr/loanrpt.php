<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 4))
{
 if ($_SESSION['access_lvl'] != 5 & $_SESSION['access_lvl'] != 1){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=../index.php?redirect=$redirect");
}
}
 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';
?>
   <div align="center">
	<table border="0" width="803" id="table1" bgcolor="#FFFFFF">
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>
			<div align="center">
				<table border="0" width="797" id="table2">
					<tr>
						<td>

 <fieldset style="padding: 2">
<p><legend><b><i><font size="2" face="Tahoma" color="#87ceff"> <?php require_once 'payheader.php'; ?>
</p></font></i></b></legend>

   <form  action="loanrpt.php" method="post">
    <body bgcolor="#D2DD8F">
      <font style='font-size: 8pt'>Select Loan Type: <select size="1" name="cmbFilter">
       <?php  
           echo '<option selected></option>';
           $sql = "SELECT distinct `loan type`.* FROM `loan type`";
           $result_lt = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_lt)) 
           {
             echo '<option>' . $rows['Type'] . '</option>';
           }
          ?>
     </select></font>
      &nbsp;
      <input type="submit" value="Go" name="submit">
     <br>
    </body>
   </form>

<TABLE width='795' border='1' cellpadding='1' cellspacing='1' align='center' id="table3">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="75%" id="AutoNumber2">
<?php

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];

  echo"<h2><center>Loan Report</center></h2> ";

  $sql_d = "SELECT `payr`.*,`pay`.* FROM `payr` inner join `pay` on `payr`.`staff number`=`pay`.`staff number` where `AllowID`='Loan'";
  $result_d = mysqli_query($conn,$sql_d) or die('Could not list value; ' . mysqli_error());
  $row = mysqli_fetch_array($result_d);
  $mnth=$row['Month'];

  $result = mysqli_query($conn,"SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `payr`.`Description`, `pay`.`Month`,`payr`.`amount` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `payr`.`Description`='$cmbFilter' Order by `pay`.`Staff Number`"); 

  echo "<font style='font-size: 9pt'><b>Loan Type: " . $cmbFilter . "</b></font>&nbsp; &nbsp &nbsp; &nbsp &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp";
  echo "<font style='font-size: 8pt'><b>For the Month: " . $mnth . "</b></font>";
  echo "<TR align='left'><TH bgcolor='#C0C0C0' width='33%'> <font style='font-size: 9pt'>Staff Name </font>&nbsp;</TH><TH align='right' bgcolor='#C0C0C0' width='33%'><font style='font-size: 9pt'>Amount</font>&nbsp;</TH></TR>";

  if (trim(!empty($cmbFilter)))
  {  
  $result = mysqli_query($conn,"SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `payr`.`Description`, `pay`.`Month`,`payr`.`amount` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `payr`.`Description`='$cmbFilter' Order by `pay`.`Staff Number`"); 
  }

  while(list($staffno, $name,$descr, $month, $amount)=mysqli_fetch_row($result)) 
   {
       $amount=number_format((-1)*$amount,2);
      echo "<TR align='left'><TH width='33%'> <font style='font-size: 8pt'>$name </font>&nbsp;</TH><TH align='right' width='33%'><font style='font-size: 8pt'>$amount</font>&nbsp;</TH></TR>";
   }

  $sql_t = "SELECT `pay`.`Staff Number`,sum(`payr`.`amount`) as amt From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `payr`.`Description`='$cmbFilter' group by `payr`.`Description`";
  $result_t = mysqli_query($conn,$sql_t) or die('Could not list value; ' . mysqli_error());
  $row = mysqli_fetch_array($result_t);
  $amt=$row['amt'];
  $np=number_format((-1)*$amt,2);

   echo "<TR><TH>&nbsp;</TH></TR>"; 
   echo "<TR><TH width='20%' bgcolor='#EAEAEA' align='left'><font style='font-size: 10pt'><b>Total</b></font></TH><TH width='20%' bgcolor='#EAEAEA' align='right'><font style='font-size: 10pt'><b>$np</b></font></TH></TR><p>";
?>
</table>
</table>

<br>
<form>
<Table>
<tr>
<td>

<?php
 echo "<a target='blank' href='rptloan.php?cmbFilter=$cmbFilter'> Print Loan Report</a> &nbsp; ";
?>
</td>
</tr>
</Table
</form>
<?php
 require_once 'footr.php';
 require_once 'footer.php';
?>
</td>
					</tr>
		
				</table>
			</div>
			</td>
		</tr>
	</table>
</div>