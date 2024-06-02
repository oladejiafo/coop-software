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

$SNO=$_REQUEST['SNO'];
$CNO=$_REQUEST['CNO'];

$sql="SELECT `children`.`Staff Number`,`children`.`Name`,`children`.`Sex`,`children`.`DoB`,`children`.`Child_ID` FROM `children` WHERE `Child_ID`='$CNO'";
$result = mysql_query($sql,$conn) or die('Could not look up user data; ' . mysql_error());
$row = mysql_fetch_array($result);
?>

 <div align="center">
	<table border="0" width="800" id="table1" bgcolor="#FFFFFF">
		<tr>
			<td>
			<div align="center">
				<table border="0" width="800" id="table2">
					<tr>
						<td>
<fieldset style="padding: 2">
<p><legend><b><i><font size="2" face="Tahoma" color="#008000"> <?php require_once 'hrheader.php'; ?>
</p></font></i></b></legend>
<form action="submitchild.php" method="post">
<fieldset style="padding: 2">
<p><legend><b><i><font size="2" face="Tahoma" color="#008000"> <?php require_once 'gnheader.php'; ?>
</p></font></i></b></legend>
<legend><b><font face="Verdana" color="#008000" style="font-size: 13pt">Child Update</font></b></legend>
<p><legend>&nbsp;</legend></p>
<div align="left">

  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="750" id="AutoNumber1" height="70">
    <tr>
      <td width="17%" height="28">
        Child ID
      </td>
      <td width="31%" height="28">
        <input type="hidden" name="child_id" size="31" value="<?php echo $row['Child_ID']; ?>">
        <?php echo $row['Child_ID']; ?>
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Name
      </td>
      <td width="31%" height="28">
        <input type="text" name="name" size="31" value="<?php echo $row['Name']; ?>">
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        Sex
      </td>
      <td width="31%" height="28">
        <input type="text" name="sex" size="31" value="<?php echo $row['Sex']; ?>">
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Date of Birth
      </td>
      <td width="34%" height="28">
        <input type="text" name="dob" size="31" value="<?php echo $row['DoB']; ?>">
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        Parent Staff Number
      </td>
      <td width="31%" height="28">
        <input type="text" name="serviceno" size="31" value="<?php echo $SNO; ?>">
      </td>
      <td width="1%" height="28"></td>
     
    </tr>  
    <tr>
      <td width="17%" height="28">
        &nbsp;</td>
      <td width="31%" height="28">
        &nbsp;</td>
      <td width="1%" height="28">&nbsp;</td>
     
    </tr>  

</table>
</fieldset>

  </div>

<?php
if (!$CNO){
?>
  <input type="submit" value="Save" name="submit"> &nbsp;
<?php } 
 else { ?>
  <input type="submit" value="Update" name="submit"> &nbsp; 
  <input type="submit" value="Delete" name="submit"> &nbsp; 
<?php
}
 ?>
</body>
</form>						<p>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
				</table>
			</div>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
	</table>
</div>



<?php 
 echo "<a href='family_details.php?SNO=" . $row['Staff Number'] . "'>Click here</a> to return to list.";
 require_once 'footer.php';
?>