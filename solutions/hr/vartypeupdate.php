<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5) & $_SESSION['access_lvl'] != 2 & $_SESSION['access_lvl'] != 4)
{
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don�t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn�t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
}

 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';

$ID=$_REQUEST['ID'];

$sql="SELECT `Variation Type`,`VarGroup`,`VarClass`,`VarID` FROM `variation Type` WHERE `VarID`='$ID'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);
?>

<div align="center">
	<table border="0" width="807" cellspacing="1" bgcolor="#FFFFFF" id="table1">
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>

<form action="submitvartype.php" method="post">
<p><b><font face="Verdana" color="#87ceff" style="font-size: 16pt">Variation Types Update</font></b></p>

<div align="left">
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="99%" id="table2" height="70">
    <tr>
      <td width="17%" height="28">
        <font face="Verdana" style="font-size: 9pt">Variation Code:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <input type="text" name="varid" size="31" value="<?php echo $row['VarID']; ?>">
      	</span></font>
      </td>
      <td width="1%" height="28"></td>
    </tr>
    <tr>
      <td width="17%" height="28">
        <font face="Verdana" style="font-size: 9pt">Variation Name:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <input type="text" name="variationtype" size="31" value="<?php echo $row['Variation Type']; ?>">
      	</span></font>
      </td>
      <td width="1%" height="28"></td>
    </tr>
    <tr>
      <td width="17%" height="28">
        <font face="Verdana" style="font-size: 9pt">Variation Type:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <input type="text" name="vargroup" size="31" value="<?php echo $row['VarGroup']; ?>">
      	</span></font>
      </td>
      <td width="1%" height="28"></td>
    </tr>
    <tr>
      <td width="17%" height="28">
        <font face="Verdana" style="font-size: 9pt">Variation Group:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <input type="text" name="varclass" size="31" value="<?php echo $row['VarClass']; ?>">
      	</span></font>
      </td>
      <td width="1%" height="28"></td>
    </tr>
  </table>
<br>
<?php
if (!$ID){
?>
  <input type="submit" value="Save" name="submit"> &nbsp;
<?php } 
 else { ?>
  <input type="submit" value="Update" name="submit"> &nbsp; 
  <input type="submit" value="Delete" name="submit"> &nbsp; 
<br>
<br>
<?php
} 
 echo "<a href='tableupdates.php'>Click here</a> to return.";
?>
 </td>
 </tr>
</table>
<br>

<?php 

 require_once 'footr.php';
 require_once 'footer.php';
?>
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