<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
 if ($_SESSION['access_lvl'] != 5 & $_SESSION['access_lvl'] != 6){
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

@$ID=$_REQUEST['ID'];

$sql="SELECT * FROM `assets` WHERE `ID`='$ID'";
$result = mysql_query($sql,$conn) or die('Could not look up user data; ' . mysql_error());
$row = mysql_fetch_array($result);
?>

<div align="center">
	<table border="0" width="97%" bgcolor="#FFFFFF" id="table1">
		<tr align='center'>
 <td bgcolor="#008000"><b>
  <font face="Verdana" color="#FFFFFF" style="font-size: 16pt">Assets Depreciation</font></b>
 </td>
</tr>
		<tr>
			<td>

<form action="submitdepreciation.php" method="post">
<fieldset style="padding: 2">
<p><legend><b><i><font size="2" face="Tahoma" color="#008000"> <?php require_once 'fxheader.php'; ?>
</p></font></i></b></legend>

<div align="left">

  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="800px" id="table3" height="70">
    <tr>  
      <td width="17%" height="28">
        <font face="Verdana" style="font-size: 9pt">Asset Name:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <input type="text" name="name" size="31" value="<?php echo $row['Name']; ?>">
        <input type="hidden" name="code" size="31" value="<?php echo $row['Code']; ?>">
      	</span></font>
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
      <font face="Verdana" style="font-size: 9pt">Depreciation Method:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
	  <select  name="category" width="31" value="<?php echo $row['Method']; ?>">  
          <?php
           echo '<option selected>' . $row['Method'] . '</option>';
           echo '<option>Straight Line</option>';
           echo '<option>Double Declining</option>';
           echo '<option>Reducing Balance</option>';
          ?> 
         </select>
      	</span></font>   
      </td>
    </tr>
    <tr><td colspan="6">
    <font face="Verdana" style="font-size: 9pt" color="#008000">
     ____________________________________________________________________________________________________________________
    </font>
    </td></tr>
    <tr>
      <td width="17%" height="28">
        <font face="Verdana" style="font-size: 9pt">Depreciation Life:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <input type="text" name="life" size="31" value="<?php echo $row['Life']; ?>">
      	</span></font>
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        <font face="Verdana" style="font-size: 9pt">Salvage Value:
       </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
	  <input type="text" name="salvage" size="31" value="<?php echo $row['Salvage']; ?>">  
      	</span></font>
      </td>
    </tr>
    <tr>  
      <td width="17%" height="28">
      <font face="Verdana" style="font-size: 9pt">Purchase Price:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
	  <input type="text" name="pprice" size="31" value="<?php echo $row['Purchase Price']; ?>">  
      	</span></font>   
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        <font face="Verdana" style="font-size: 9pt">Depreciation Basis:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <input type="text" name="basis" size="31" value="<?php echo $row['Basis']; ?>">
      	</span></font>
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        <font face="Verdana" style="font-size: 9pt">Depreciation Amount:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <input type="text" name="amount" size="31" value="<?php echo $row['Amount']; ?>">
      	</span></font>
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">

      </td>
      <td width="31%" height="28">

      </td>
    </tr>
  </table><br>
  </fieldset>
    
  <input type="submit" value="Calculate" name="submit"> &nbsp; 
  <input type="submit" value="Save" name="submit"> &nbsp; 

  
  </div>
</body>
</form>
		</td>
	</tr><tr><td align="right">
<?php 
 echo "<a href='fassets.php'>Click here</a> to return to list.";

 require_once 'footr.php';
 require_once 'footer.php';
?>
</td></tr>
	</table>
</div>