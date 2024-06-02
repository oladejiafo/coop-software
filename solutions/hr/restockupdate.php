<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5) & ($_SESSION['access_lvl'] != 6))
{
 if ($_SESSION['access_lvl'] != 7){
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

@$Tit=$_SESSION['Tit'];
@$code=$_REQUEST['code'];
@$id=$_REQUEST['id'];
@$tval=$_REQUEST['tval'];
?>
<div align="center">
	<table border="0" width="927" cellspacing="1" bgcolor="#FFFFFF" id="table1">
		<tr align='center'>
 <td bgcolor="#008000"><b>
  <font face="Verdana" color="#FFFFFF" style="font-size: 16pt">Stock Record</font></b>
 </td>
</tr>
		<tr>
			<td>

<form action="restockupdate.php" method="post">
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="99%" id="AutoNumber1" height="70">
    <tr>
      <td width="17%" height="28">
        Enter Stock Code
      </td>
      <td width="17%" height="28">
        <select  name="code" width="31">  
          <?php  
           echo '<option selected></option>';
           $sql = "SELECT * FROM `stock`";
           $result_c = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rows = mysql_fetch_array($result_c)) 
           {
             echo '<option>' . $rows['Stock Code'] . '</option>';
           }
          ?> 
         </select> &nbsp;
       <input type="submit" value="Go" name="submit">
      </td>
      <td width="77%" height="28">

      </td>
    </tr>
    </table>
</form>

<?php
 @$code=$_REQUEST["code"];
$sql="SELECT * FROM restock WHERE `restock`.`ID`='$id'";
$result = mysql_query($sql,$conn) or die('Could not look up user data; ' . mysql_error());
$row = mysql_fetch_array($result);

$sql2="SELECT * FROM stock WHERE `Stock Code`='$code'";
$result2 = mysql_query($sql2,$conn) or die('Could not look up user data; ' . mysql_error());
$row2 = mysql_fetch_array($result2);
?>

<form action="submitrestock.php" method="post">
<fieldset style="padding: 2">
<p><legend><b><i><font size="2" face="Tahoma" color="#008000"> <?php require_once 'stkheader.php'; ?>
</p></font></i></b></legend>

<div align="left">
<b><i><u><font size="2" face="Tahoma" color="#008000">RE-STOCK</font></u></i></b>
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="99%" id="AutoNumber1" height="70">
    <tr>
      <td width="17%" height="28">
        Stock Code
      </td>
      <td width="31%" height="28">
        <input type="text" name="code" size="31" value="<?php echo $code; ?>">
        <input type="hidden" name="id" size="31" value="<?php echo $row['ID']; ?>">
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
       Re-Stock Date
      </td>
      <td width="34%" height="28">
       <?php
         if (!$id){
       ?>
          <input type="text" size="31" name="restdate" value="<?php echo date('Y-m-d'); ?>">
       <?php
         }else{
       ?>
          <input type="text" size="31" name="restdate" value="<?php echo $row['Stock Date']; ?>">
       <?php
         }
       ?>
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        Stock Name
      </td>
      <td width="31%" height="28">
        <input type="text" name="stockname" size="31" value="<?php echo $row2['Stock Name']; ?>">
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Colour
      </td>
      <td width="34%" height="28">
        <select name="category" size="1" value="<?php echo $row2['Category']; ?>">
          <?php  
           echo '<option selected>' . $row2['Category'] . '</option>';
           $sql = "SELECT * FROM `stock category`";
           $result_gl = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rowt = mysql_fetch_array($result_gl)) 
           {
             echo '<option>' . $rowt['Category'] . '</option>';
           }
          ?> 
         </select> &nbsp;
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        Units in Stock
      </td>
      <td width="31%" height="28">
        <input type="text" name="units" size="31" value="<?php echo $row2['Units in Stock']; ?>">
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Quantity Added
      </td>
      <td width="31%" height="28">
        <input type="text" name="qntyadded" width="31" value="<?php echo $row['Qnty Added']; ?>">  
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        Stock Balance
      </td>
      <td width="31%" height="28">
        <input type="text" name="balance" size="31" value="<?php echo $row2['Units in Stock']+$row['Qnty Added']; ?>">
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Received By
      </td>
      <td width="31%" height="28">
        <input type="text" name="receivedby" size="31" value="<?php echo $row['Received By']; ?>">
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        Location
      </td>
      <td width="31%" height="28">
        <select name="location" size="1" value="<?php echo $row2['Location']; ?>">
          <?php  
           echo '<option selected>' . $row2['Location'] . '</option>';
           $sql = "SELECT * FROM `location`";
           $result_gl = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rowt = mysql_fetch_array($result_gl)) 
           {
             echo '<option>' . $rowt['Location'] . '</option>';
           }
          ?> 
         </select> &nbsp;
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Supplied By
      </td>
      <td width="34%" height="28">
        <select name="suppliedby" size="1" value="<?php echo $row['Supplied By']; ?>">
          <?php  
           echo '<option selected>' . $row['Supplied By'] . '</option>';
           $sql = "SELECT * FROM `supplier`";
           $result_gl = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rowt = mysql_fetch_array($result_gl)) 
           {
             echo '<option>' . $rowt['Supplier'] . '</option>';
           }
          ?> 
         </select> &nbsp;
      </td>
    </tr>
  </table>
    <p>

 </fieldset>
 <br>

<?php
if (!$id){
?>
  <input type="submit" value="Save and Reconcile" name="submit"> &nbsp;
  <input type="submit" value="Save Only" name="submit"> &nbsp;
<?php } 
 else { ?>
  <input type="submit" value="Update and Reconcile" name="submit"> &nbsp;
  <input type="submit" value="Update Only" name="submit"> &nbsp;  
  <input type="submit" value="Delete" name="submit"> &nbsp;

<?php
} ?>
  </p>
  </div>
</body>
</form>

			<p></td>
		</tr><tr><td align="right"><font size="2"><?php 
 echo "<a href='restock.php?code=" . $code . "'>Click here</a> to return to list.</font>";
 require_once 'footr.php';
 require_once 'footer.php';
?></td></tr>
	</table>
</div>

