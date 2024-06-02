<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 7))
{
 if ($_SESSION['access_lvl'] != 3 & $_SESSION['access_lvl'] != 5){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=../index.php?redirect=$redirect");
}
}

 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';
 @$tval=$_GET['tval'];
@$ID=$_REQUEST['ID'];

$sql="SELECT * FROM `budget` WHERE `ID`='$ID'";
$result = mysql_query($sql,$conn) or die('Could not look up user data; ' . mysql_error());
$row = mysql_fetch_array($result);

 echo "<font color='#FF0000' style='font-size: 9pt'>" . $tval . "</font>";
 echo "<p>";
?>

<div align="center">
	<table border="0" width="100%" bgcolor="#FFFFFF" id="table1">
		<tr align='center'>
 <td bgcolor="#008000"><b>
  <font face="Verdana" color="#FFFFFF" style="font-size: 16pt">Monthly Expenditure Budget</font></b>
 </td>
</tr>
		<tr>
			<td>

<form action="submitbudget.php" method="post">
<fieldset style="padding: 2">
<legend><b><i><font size="2" face="Tahoma" color="#008000"> <?php require_once 'acctheader.php'; ?>
</font></i></b></legend>
<div align="left">

  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="800px" id="table3" height="70">
    <tr>
      <td width="19%" height="28">
      <font face="Verdana" style="font-size: 9pt">Budget Type:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
	  <select  name="type" width="31" value="<?php echo $row['Type']; ?>">  
          <?php  
           echo '<option selected>' . $row['Type'] . '</option>';
           echo '<option>Expenditure</option>';
           echo '<option>Income</option>';
          ?> 
         </select>
      	</span></font>   
      </td>
      <td width="5%" height="28"></td>
      <td width="17%" height="28">
       <font face="Verdana" style="font-size: 9pt">Budget Month:
      </font>   
      </td> 
      <td width="35%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <input type="text" name="month" size="31" value="<?php echo $row['Month']; ?>">
        <input type="hidden" name="ID" size="31" value="<?php echo $row['ID']; ?>">
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
      <font face="Verdana" style="font-size: 9pt">Item/Class:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
	  <select  name="class" width="31" value="<?php echo $row['Class']; ?>">  
          <?php  
           echo '<option selected>' . $row['Class'] . '</option>';
           $sql = "SELECT * FROM `heads`";
           $result_hd = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rows = mysql_fetch_array($result_hd)) 
           {
             echo '<option>' . $rows['Description'] . '</option>';
           }
          ?> 
         </select>
      	</span></font>   
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        <font face="Verdana" style="font-size: 9pt">Budget Amount:
      </font>
      </td>
      <td width="31%" height="28">
        <font face="Verdana"><span style="font-size: 9pt">
        <input type="text" name="budget" size="31" value="<?php echo $row['Budget']; ?>">
      	</span></font>
      </td>
    </tr>
  </table>
    <p>
<?php
if (!$ID){
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
		<p></td>
	</tr><tr><td align="right">
<?php 
 echo "<a href='budget.php'>Click here</a> to return to list.";

 require_once 'footr.php';
 require_once 'footer.php';
?>
</td></tr>
	</table>
</div>