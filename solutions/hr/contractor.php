<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
 if ($_SESSION['access_lvl'] != 1 & $_SESSION['access_lvl'] != 2){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don’t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn’t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
#exit();
}
}

 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';
 $tval=$_GET['tval'];
$ID=$_REQUEST['ID'];

$sql="SELECT * FROM `contract` WHERE `ID`='$ID'";
$result = mysql_query($sql,$conn) or die('Could not look up user data; ' . mysql_error());
$row = mysql_fetch_array($result);

 echo "<font color='#FF0000' style='font-size: 9pt'>" . $tval . "</font>";
 echo "<p>";
?>

<div align="center">
	<table border="0" width="940" bgcolor="#FFFFFF" id="table1">
		<tr align='center'>
 <td bgcolor="#008000"><b>
  <font face="Verdana" color="#FFFFFF" style="font-size: 16pt">Contractors' Schedule</font></b>
 </td>
</tr>
		<tr>
			<td>

<form action="submitcontract.php" method="post">
<fieldset style="padding: 2">
<p><legend><b><i><font size="2" face="Tahoma" color="#008000"> <?php require_once 'acctheader.php'; ?>
</p></font></i></b></legend>
<div align="left">

  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="800px" id="table3" height="70">
    <tr>
      <td width="19%" height="28">
      <font face="Verdana" style="font-size: 9pt">Contract Category:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
	  <select  name="category" width="31" value="<?php echo $row['Contract Category']; ?>">  
          <?php  
           echo '<option selected>' . $row['Contract Category'] . '</option>';
           echo '<option>ICT</option>';
           echo '<option>Supplies</option>';
          ?> 
         </select>
      	</span></font>   
      </td>
      <td width="5%" height="28"></td>
      <td width="17%" height="28">
       <font face="Verdana" style="font-size: 9pt">Contract Date:
      </font>   
      </td> 
      <td width="35%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <input type="text" name="date" size="31" value="<?php echo $row['Contract Date']; ?>">
        <input type="hidden" name="ID" size="31" value="<?php echo $row['ID']; ?>">
      	</span></font>
      </td>
    </tr>
    <tr><td colspan="6">
    <font face="Verdana" style="font-size: 9pt" color="#008000">
     ____________________________________________________________________________________________________________________
    </font>
    </td></tr>
    <tr>  
      <td width="17%" height="28">
      <font face="Verdana" style="font-size: 9pt">Contract Title:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <input type="text" name="ctitle" size="31" value="<?php echo $row['Contract Title']; ?>">
      	</span></font>   
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        <font face="Verdana" style="font-size: 9pt">Contractor Name:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <input type="text" name="cname" size="31" value="<?php echo $row['Contractor']; ?>">
      	</span></font>
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        <font face="Verdana" style="font-size: 9pt">Contract Amount:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <input type="text" name="amount" size="31" value="<?php echo $row['Amount']; ?>">
      	</span></font>
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        <font face="Verdana" style="font-size: 9pt">Amount Paid:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <input type="text" name="amountpaid" size="31" value="<?php echo $row['Amount Paid']; ?>">
      	</span></font>
      </td>
    </tr>
    <tr>
      <td width="19%" height="28">
      <font face="Verdana" style="font-size: 9pt">Contract Status:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
	  <select  name="status" width="31" value="<?php echo $row['Contract Status']; ?>">  
          <?php  
           echo '<option selected>' . $row['Contract Status'] . '</option>';
           echo '<option>Completed</option>';
           echo '<option>In Progress</option>';
           echo '<option>Abandoned</option>';
           echo '<option>Canceled</option>';
          ?> 
         </select>
      	</span></font>   
      </td>
      <td width="5%" height="28"></td>
      <td width="17%" height="28">
       <font face="Verdana" style="font-size: 9pt">Contact Person:
      </font>   
      </td> 
      <td width="35%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <input type="text" name="contact" size="31" value="<?php echo $row['Contact']; ?>">
      	</span></font>
      </td>
    </tr>
    <tr>
      <td width="19%" height="28">
      <font face="Verdana" style="font-size: 9pt">Contractor's Bank:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <select  name="bank" width="31" value="<?php echo $row['Bank']; ?>">  
          <?php  
           echo '<option selected>' . $row['Bank'] . '</option>';
           $sql = "SELECT * FROM `bank`";
           $result_bank = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rows = mysql_fetch_array($result_bank)) 
           {
             echo '<option>' . $rows['Name'] . '</option>';
           }
          ?> 
         </select>
      	</span></font>   
      </td>
      <td width="5%" height="28"></td>
      <td width="17%" height="28">
       <font face="Verdana" style="font-size: 9pt">Contactor's Account #:
      </font>   
      </td> 
      <td width="35%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <input type="text" name="account" size="31" value="<?php echo $row['Account']; ?>">
      	</span></font>
      </td>
    </tr>
    <tr>
      <td width="19%" height="28">
      <font face="Verdana" style="font-size: 9pt">Payment Status:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
	  <select  name="paid" width="31" value="<?php echo $row['Paid']; ?>">  
          <?php  
           echo '<option selected>' . $row['Paid'] . '</option>';
           echo '<option>Paid</option>';
           echo '<option>Unpaid</option>';
          ?> 
         </select>
      	</span></font>   
      </td>
      <td width="5%" height="28"></td>
      <td width="17%" height="28">
      </font>   
      </td> 
      <td width="35%" height="28">
      </td>
    </tr>
  </table>
    <p>
<?php
if (!$ID){
?>
  <input type="submit" value="Save" name="submit"> &nbsp;
<?php } 
 else { ?>
  <input type="submit" value="Update" name="submit"> &nbsp; 
  <input type="submit" value="Delete" name="submit"> &nbsp; 
<?php
} ?>
  </p>
  </div>
</body>
</form>
		<p></td>
	</tr><tr><td align="right">
<?php 
 echo "<a href='contract.php'>Click here</a> to return to list.";

 require_once 'footr.php';
 require_once 'footer.php';
?>
</td></tr>
	</table>
</div>