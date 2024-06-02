<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
 if ($_SESSION['access_lvl'] != 4){
  if ($_SESSION['access_lvl'] !=3){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don’t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn’t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
}
}
}
 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';

$PID=$_REQUEST['PID'];
$SNO=$_REQUEST['SNO'];

$sql="SELECT `Staff Number`,`CertID`, `Certificate`,`Date` FROM `certification` WHERE `CertID`='$PID'";
$result = mysql_query($sql,$conn) or die('Could not look up user data; ' . mysql_error());
$row = mysql_fetch_array($result);
?>
 <div align="center">
	<table border="0" width="940" id="table1" bgcolor="#FFFFFF">
		<tr align='center'>
 <td bgcolor="#008000"><b>
  <font face="Verdana" color="#FFFFFF" style="font-size: 16pt">PROFESSIONAL QUALIFICATIONS</font></b>
 </td>
</tr>
		<tr>
			<td>
			<div align="center">
				<table border="0" width="940" id="table2">
					<tr>
						<td>
<fieldset style="padding: 2">
<p><legend><b><i><font size="2" face="Tahoma" color="#008000"> <?php require_once 'hrheader.php'; ?>
</p></font></i></b></legend>
<form action="submitPEdu.php" method="post">
<fieldset style="padding: 2">
<p><legend><b><i><font size="2" face="Tahoma" color="#008000"> <?php require_once 'gnheader.php'; ?>
</p></font></i></b></legend>
<div align="left">
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="750" id="AutoNumber1" height="70">
    <tr>
      <td width="17%" height="28">
         Staff Number
      </td>
      <td width="31%" height="28">
        <input type="text" name="serviceno" size="31" value="<?php echo $SNO; ?>">
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Qualification ID
      </td>
      <td width="34%" height="28">
        <input type="hidden" name="profid" size="31" value="<?php echo $row['CertID']; ?>">
        <?php echo $row['CertID']; ?>
      </td>
    </tr>

    <tr>
      <td width="17%" height="28">
        Qualification
      </td>
      <td width="31%" height="28">
        <input type="text" name="degree" size="31" value="<?php echo $row['Certificate']; ?>">
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Date
      </td>
      <td width="34%" height="28">
        <input type="text" name="date" size="31" value="<?php echo $row['Date']; ?>">
      </td>
    </tr>
  </table>
    <p>
<?php
if (!$PID){
?>
  <input type="submit" value="Save" name="submit"> &nbsp;
<?php } 
 else { ?>
  <input type="submit" value="Update" name="submit"> &nbsp; 
  <input type="submit" value="Delete" name="submit"> &nbsp; 
<?php
}
 ?>
  </p>
  </div>
</body>
</form>

						<p>&nbsp;</td>
					</tr>
				</table>
			</div>
			</td>
		</tr>
	</table>
</div>



<?php 
 echo "<a href='edu_history.php?SNO=" . $row['Staff Number'] . "'>Click here</a> to return to list.";
 require_once 'footr.php';
 require_once 'footer.php';
?>
