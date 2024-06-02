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
#$ID=$_REQUEST['cmbGL'];
$desc=$_REQUEST['desc'];
$cmbtype=$_REQUEST['cmbtype'];
?>
<div align="center">
	<table border="0" width="100%" bgcolor="#394247" id="table1">

		<tr>
			<td align="center" width="80%" valign=top>
	<table border="0" width="100%" bgcolor="#FFFFFF" id="table1">
		<tr align='center'>
 <td bgcolor="#87ceff" colspan=3><b>
<font face="Verdana" color="#FFFFFF" style="font-size: 16pt">Pay Items Update</font></b>
 </td>
</tr>
		<tr>
			<td colspan="2" valign=top>

<form  action="submitpitems.php" method="GET">
<body bgcolor="#D2DD8F"> 

<?php
$cmbGL=$_POST['cmbGL'];
#$cmbtype=$_POST['cmbtype'];
$sql="SELECT `Description`, `Amount`,`Type`,`Grade Level` FROM `allowances` WHERE `Grade Level`='$desc'";
$result = mysqli_query($conn,$sql);
$rows = mysqli_fetch_array($result);

?>

    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="750" id="AutoNumber1" height="70">
    <tr>
      <td width="160">
        <b><font face="Verdana" style="font-size: 9pt">Grade Level:</font></b>
      </td>
      <td>
        <input type="hidden" name="gl" size="31" value="<?php echo $desc; ?>">
        <input type="hidden" name="cmbtype" size="31" value="<?php echo $cmbtype; ?>">
        <b><font face="Verdana" style="font-size: 9pt"><?php echo $desc; ?></font></b>
      </td>       
     </tr> 
     <tr>
      <td width="160"><b><font face="Verdana" style="font-size: 9pt">Allowance Type: </font></b>&nbsp;</td>
      <td> <select size="1" name="cmbAllow">
           <option selected></option>
           <?php  
            $sql = "SELECT * FROM `allowance types`";
            $result_allow = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
            while ($row = mysqli_fetch_array($result_allow)) 
            {
             echo '<option>' . $row['Description'] . '</option>';
            }
           if ($cmbtype=="Percent")
           {
             $tye="Percent: ";
           }
           else
           {
             $tye="Amount: ";
           }
        ?>           
         </select>
      </td>
           <td width="90">
        <b><font face="Verdana" style="font-size: 9pt"><?php echo $tye ?></font></b>
      </td>
      <td>
        <b><font face="Verdana" style="font-size: 9pt">
        <input type="text" name="amount" size="20">
        </font></b>
        &nbsp;  &nbsp; 
     <input type="submit" value="Add Item" name="submit">

     </td>
    </tr>
     <br>
     </body>
    </table>
   </form>
</TABLE>
</td>

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

		</tr>
	</table>
</div>