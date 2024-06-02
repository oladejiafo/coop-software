<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 3) & ($_SESSION['access_lvl'] != 4))
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

$SNO=$_REQUEST['SNO'];

$sql="SELECT `staff`.`Staff Number`,`staff`.Surname,`staff`.Firstname,`staff`.Dept,`staff`.`Present Rank`,`staff`.Level,`staff`.Step, 
       `appraisal`.`Period`,`appraisal`.`Reference`,`appraisal`.`Description` FROM staff left join `appraisal` on `staff`.`Staff Number`=`appraisal`.`Staff Number` WHERE `staff`.`Staff Number`='$SNO'";
$result = mysql_query($sql,$conn) or die('Could not look up user data; ' . mysql_error());
$row = mysql_fetch_array($result);
?>

<div align="center">
	<table border="0" width="800" id="table1" bgcolor="#FFFFFF">
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>
			<div align="center">
				<table border="0" width="800" id="table2" style="border: 1px solid #008000; padding-left: 2px; padding-right: 2px; padding-top: 1px; padding-bottom: 1px">
					
					<tr>
						<td>
<fieldset style="padding: 2">
<p><legend><b><i><font size="2" face="Tahoma" color="#008000"> <?php require_once 'hrheader.php'; ?>
</p></font></i></b></legend>
<form action="submitappraisal.php" method="post">
<p><b><i><font face="Verdana" color="#008000" style="font-size: 16pt">STAFF CONFIDENTIAL</font></i></b></p>
<fieldset style="padding: 2">
<p><legend><b><i><font size="2" face="Tahoma" color="#008000"> <?php require_once 'cnheader.php'; ?>
</p></font></i></b></legend>
<div align="left">
<b><i><font size="3" face="Verdana" color="#008000">[APPRAISALS]</font></i></b>
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="777" id="AutoNumber1" height="70">
    <tr>
      <td width="17%" height="28">
        Staff Number:
      </td>
      <td width="31%" height="28">
        <?php echo $row['Staff Number']; ?>
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Surname:
      </td>
      <td width="34%" height="28">
        <?php echo $row['Surname']; ?>
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        First Name:
      </td>
      <td width="31%" height="28">
        <?php echo $row['Firstname']; ?>
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Department:
      </td>
      <td width="34%" height="28">
        <?php echo $row['Dept']; ?>
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        Grade Level:
      </td>
      <td width="31%" height="28">
        <?php echo $row['Level']; ?>
      </td>
      <td width="1%" height="28"></td>

    </tr>
  </table>
    <p> 
</form>

<fieldset style="padding: 2">
<TABLE width='777' border='1' cellpadding='1' cellspacing='1' align='center' bordercolor="#005B00">
<?php
    echo "<TR><TH><b><u>Period </b></u>&nbsp;</TH><TH><b><u>Reference </b></u>&nbsp;</TH><TH><b><u>Description </b></u>&nbsp;</TH></TR>";

    $query="SELECT `Period`,`Reference`,`Description`,`Staff Number` FROM `appraisal` WHERE `Staff Number`='$SNO'";
    $result=mysql_query($query);

    while(list($period,$reference,$description,$serviceNo)=mysql_fetch_row($result))
    {
     echo "<TR><TH><a href = 'Appraise.php?RNO=" .$reference . "'> $period </a> &nbsp;</TH>
      <TH>$reference &nbsp;</TH><TH>$description &nbsp;</TH></TR>";
    }
 ?>
</Table>
<p>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">

  <?php
     echo "<TR>
               <TH><a href ='appraise.php'> Add New Apprisal</a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE> 
 </fieldset>
 <br>
</fieldset>
<br>
  <input type="button" value="Print" onClick="window.print()"> &nbsp;
  </p>
  </div>
	</td>
		</tr>
	</table>
</div>

<?php 
# echo "<a href='staffsecret.php?SNO=" . $row['Staff Number'] . "'>Click here</a> to return to list.";
 echo "<a href='staffsecret.php'>Click here</a> to return to list.";
 require_once 'footer.php';
?>
