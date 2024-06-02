<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & $_SESSION['access_lvl'] != 5) 
{
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don’t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn’t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
#exit();
}

require_once 'conn.php';
require_once 'header.php';
require_once 'style.php';

$UID=$_REQUEST['UID'];
$tval=$_REQUEST['tval'];

$user_id = '';
$name = '';
$email = '';
$password = '';
$accesslvl = '';
if (isset($_GET['UID'])) {
$sql = "SELECT user_id,username,password,email,access_lvl FROM login WHERE user_id=" . $_GET['UID'];
$result = mysql_query($sql,$conn)
or die('Could not look up user data; ' . mysql_error());
$row = mysql_fetch_array($result);
$user_id = $_GET['UID'];
$name = $row['username'];
$email = $row['email'];
$accesslvl = $row['access_lvl'];
}
?>
<div align="center">
	<table border="0" width="807" cellspacing="1" bgcolor="#FFFFFF" id="table1">
		<tr align='center'>

</tr>
		<tr align="center">
			<td>
<?php
echo "<form method=\"post\" action=\"transact-user.php\">\n";
if ($UID) {
echo "<h2>Modify Account</h2>\n";

} else {

echo "<h2>Create Account</h2>\n";
}
echo "<font color='#FF0000' style='font-size: 8pt'>" . $tval . "</font>";
echo "<p>";
?>

User Name:<br />
<input type="text" name="name" maxlength="50"
value="<?php echo $row['username']; ?>" >

<p>
E-mail Address:<br />
<input type="text" class="txtinput" name="e-mail" maxlength="255"
value="<?php echo htmlspecialchars($email); ?>" />
</p>

<?php
#if (!$UID) 
{
?>

<p>
Password:<br />
<input type="password" id="passwd" name="passwd" maxlength="50" value="<?php echo $row['password']; ?>"/>
</p>
Password (again):<br />
<input type="password" id="passwd2" name="passwd2" maxlength="50" value="<?php echo $row['password']; ?>" />
<p>
<?php 
}

echo "<fieldset>\n";
?>
<div align="left">
  <table align="center" width="200" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber1">    
<?php
echo " <b><u><legend>Access Level</legend></u></b>\n";
$sql = "SELECT * FROM cms_access_levels ORDER BY access_name";
$result = mysql_query($sql,$conn)
or die('Could not list access levels; ' . mysql_error());
while ($row = mysql_fetch_array($result)) {
echo ' <input type="radio" class="radio" align="left" id="acl_' .
$row['access_lvl'] . '" name="accesslvl" value="' .
$row['access_lvl'] . '" ';
if ($row['access_lvl'] == $accesslvl) {
echo 'checked="checked" ';
}
echo '/>' . $row['access_name'] . "<br />\n";
}
 
?>
</table>
</div>
</fieldset>

<?php 

if ($UID) 
{ 
?>

<input type="hidden" name="user_id" value="<?php echo $UID; ?>" />
<input type="submit" class="submit" name="action"
value="Modify Account" />

<?php
 }
 else 
 {
 ?>

<input type="submit" class="submit" name="action"
value="Create Account" />
</td>
			</tr>
<?php } ?>
<tr><td>
<?php 
require_once 'footr.php'; 
require_once 'footer.php'; 
?></td></tr>
		</table>
		</div>
</form>
