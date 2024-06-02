<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 3))
{
 if ($_SESSION['access_lvl'] != 5){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don’t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn’t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();

}
}

 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';

$RNO=$_REQUEST['RNO'];

$sql="SELECT `Staff Number`,`Reference`,`Date`,`Action`,`Issued By`,`Remark` FROM `query` WHERE `Reference`='$RNO' order by Date desc";
$result = mysql_query($sql,$conn) or die('Could not look up user data; ' . mysql_error());
$row = mysql_fetch_array($result);
?>

<div align="center">
	<table border="0" width="807" cellspacing="1" bgcolor="#FFFFFF" id="table1">
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>
<fieldset style="padding: 2">
<p><legend><b><i><font size="2" face="Tahoma" color="#008000"> <?php require_once 'hrheader.php'; ?>
</p></font></i></b></legend>
<form action="submitquery.php" method="post">
<p><b><font face="Verdana" color="#008000" style="font-size: 16pt">Query Update</font></b></p>

<fieldset style="padding: 2">
<p><legend><b><i><font size="2" face="Tahoma" color="#008000"> <?php require_once 'cnheader.php'; ?>
</p></font></i></b></legend>

<div align="left">
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="99%" id="table2" height="70">
    <tr>
      <td width="17%" height="28">
        <font face="Verdana" style="font-size: 9pt">Staff Number:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <input type="text" name="serviceno" size="31" value="<?php echo $row['Staff Number']; ?>">
      	</span></font>
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        <font face="Verdana" style="font-size: 9pt">Reference Number:
      </font>        
      </td>
      <td width="34%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <input type="text" name="reference" size="31" value="<?php echo $row['Reference']; ?>">
      	</span></font>
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        <font face="Verdana" style="font-size: 9pt">Date
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <input type="text" name="date" size="31" value="<?php echo $row['Date']; ?>">
      	</span></font>
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        <font face="Verdana" style="font-size: 9pt">Action
      </font>
      </td>
      <td width="34%" height="28">
        <span style="font-size: 9pt">
        <input type="text" name="action" size="31" value="<?php echo $row['Action']; ?>">
      	</span>
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        <font face="Verdana" style="font-size: 9pt">Issued By
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <input type="text" name="issuedby" size="31" value="<?php echo $row['Issued By']; ?>">
      	</span></font>
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        <font face="Verdana" style="font-size: 9pt">Remark
      </font>
      </td>
      <td width="34%" height="28">
        <span style="font-size: 9pt">
        <input type="text" name="remark" size="31" value="<?php echo $row['Remark']; ?>">
      	</span>
      </td>
    </tr>
  </table>
<br>

 </td>
 </tr>
</table>
<br>
<?php
if (!$RNO){
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

<p>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
		</table>
		</div>


<?php 
 echo "<a href='qsecret.php?SNO=" . $row['Staff Number'] . "'>Click here</a> to return to list.";
 require_once 'footr.php';
 require_once 'footer.php';
?>