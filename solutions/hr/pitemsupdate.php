<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5 & $_SESSION['access_lvl'] != 2 & $_SESSION['access_lvl'] != 4))
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

$id=$_REQUEST['id'];
$descr=$_REQUEST['descr'];

$sql="SELECT `AllowanceID`,`Description`, `Amount`,`Type`,`Grade Level` FROM `allowances` WHERE `Grade Level`='$id' and `Description`='$descr'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);
?>

<div align="center">
	<table border="0" width="100%" bgcolor="#394247" id="table1">

		<tr>
			<td align="center" width="80%" valign=top>
	<table border="0" width="100%" cellspacing="1" bgcolor="#FFFFFF" id="table1">
		<tr>
			<td>

<form action="submitpitemsu.php" method="post">
<b><font face="Verdana" color="#87ceff" style="font-size: 16pt">Pay Items Update</font></b>

<div align="left">
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="99%" id="table2" height="70">
    <tr>
      <td width="17%" height="28">
        <font face="Verdana" style="font-size: 9pt">Grade Level:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <input type="text" name="gl" size="31" value="<?php echo $row['Grade Level']; ?>">
        <input type="hidden" name="allowid" size="31" value="<?php echo $row['AllowanceID']; ?>">
      	</span></font>
      </td>
      <td width="1%" height="28"></td>
    </tr>
    <tr>
      <td width="17%" height="28">
        <font face="Verdana" style="font-size: 9pt">Description:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <input type="text" name="description" size="31" value="<?php echo $row['Description']; ?>">
      	</span></font>
      </td>
      <td width="1%" height="28"></td>
    </tr>
    <tr>
      <td width="17%" height="28">
        <font face="Verdana" style="font-size: 9pt">Amount:
      </font>
      </td>
      <td width="34%" height="28">
        <span style="font-size: 9pt">
        <input type="text" name="amount" size="31" value="<?php echo $row['Amount']; ?>">
      	</span>
      </td>
      <td width="1%" height="28"></td>
     </tr>
    <tr>
      <td width="17%" height="28">
        <font face="Verdana" style="font-size: 9pt">Type:
      </font>
      </td>
      <td width="34%" height="28">
        <span style="font-size: 9pt">
        <input type="text" name="type" size="2" value="<?php echo $row['Type']; ?>">
      	</span>
      </td>
      <td width="1%" height="28"></td>
     </tr>
  </table>
<br>
  <input type="submit" value="Update" name="submit"> &nbsp; 
  <input type="submit" value="Delete" name="submit" onclick="return confirm('Are you sure you want to Delete?');"> &nbsp; 
<br>
<br>
<?php
 echo "<a href='payitems.php'>Click here</a> to return.";
?> </td>
 </tr>
</table>
<br>


  </div>
</body>
 
</form>
</td>
<?php
if (!isset($_SESSION['user_id']))
{

} else {
?>
<td background=""  align="center" width="20%" valign="top" bgcolor="#394247">

 <table border="0" width="100%" height="100%" id="table2" align="center" cellspacing="0" cellpadding="0" bgcolor="#394247">
  <tr><td width="100%">
<?php 
 require_once 'headerside.php';
?>
</td></tr>
</table>

 <span class="style2"><font face="Arial" color="#ffffff">
 <img src="images/proudly.jpg" /> � 2008-<?php echo date('Y'); ?> <a target="_blank" href="http://www.waltergates.com">
    <font color="green">Waltergates</font></a></font></span></td>
<?php
} 
?>
			</tr>
		</table>
		</div>