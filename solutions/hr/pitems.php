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
$ID=$_REQUEST['cmbGL'];
$cmbtype=$_REQUEST['cmbType'];
?>

<div align="center">
	<table border="0" width="100%" bgcolor="#394247" id="table1">

		<tr>
			<td align="center" width="80%" valign=top>
	<table border="0" width="100%" bgcolor="#FFFFFF" id="table1">
		<tr align='center'>
 <td bgcolor="#87ceff" colspan=3><b>
<font face="Verdana" color="#FFFFFF" style="font-size: 16pt">Pay Items</font></b>
 </td>
</tr>
		<tr align="center">
		 <td bgcolor="#87ceff" valign=top colspan=2><b>

        <b><font face="Verdana" style="font-size: 9pt">Grade Level:</font></b>
        <input type="hidden" name="gl" size="31" value="<?php echo $ID; ?>">
        <b><font face="Verdana" style="font-size: 9pt"><?php echo $ID; ?></font></b>
 </td>
		</tr>

		<tr>
			<td colspan="2" valign=top>

<TABLE width='100%' border='1' cellpadding='1' cellspacing='1' align='center' bordercolor="#005B00">

<?php
$amount=$_POST['amount'];
$ID=$_REQUEST['cmbGL'];
$cmbAllow=$_GET['cmbAllow'];
$gl=$_POST['gl'];
if ($cmbtype == "Amount")
  { 
    echo "<TR><TH><b><u>Description </b></u>&nbsp;</TH><TH><b><u>Amount </b></u>&nbsp;</TH><TH><b><u>Type </b></u>&nbsp;</TH></TR>";

    $query_allow="SELECT `Description`, `Amount`,`Type`,`Grade Level` FROM `allowances` WHERE `Grade Level`='$ID' or `Grade Level`='$gl'";
    $result_allow=mysqli_query($conn,$query_allow);

    while(list($description,$amount,$type,$gls)=mysqli_fetch_row($result_allow))
    {
     $desc=$description;
     echo "<TR><TH><a href = 'pitemsupdate.php?id=" . $gls . "&descr=" . $description . "'> $description &nbsp;</a></TH><TH>$amount &nbsp;</TH><TH>$type &nbsp;</TH></TR>";
    }
 }
 else if ($cmbtype == "Percent")
 {  
    echo "<TR><TH><b><u>Description </b></u>&nbsp;</TH><TH><b><u>Percent </b></u>&nbsp;</TH><TH><b><u>Type </b></u>&nbsp;</TH></TR>";

    $query_pallow="SELECT `Description`, `Percent`,`Type`,`Grade Level` FROM `pallowances` WHERE `Grade Level`='$ID' or `Grade Level`='$gl'";
    $result_pallow=mysqli_query($conn,$query_pallow);

    while(list($description,$amount,$type,$gls)=mysqli_fetch_row($result_pallow))
    {
     $desc=$description;
     echo "<TR><TH><a href = 'pitemsupdate.php?id=" . $gls . "&descr=" . $description . "'>$description &nbsp;</a></TH><TH>$amount &nbsp;</TH><TH>$type &nbsp;</TH></TR>";
    }
 }
 ?>
        <input type="hidden" name="cmbtype" size="31" value="<?php echo $cmbtype; ?>">

</Table>

<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00" id="table6">

  <?php
     echo "<br>";
     echo "<TR>
               <TH><a href ='pitemsget.php?desc=$ID&cmbtype=$cmbtype'> Add New Pay Item </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>

</td>
					</tr>

				</table>
			</div>
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