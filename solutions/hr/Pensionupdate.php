<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 3))
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
$tval=$_REQUEST['tval'];

$sql="SELECT `Pension`.`Staff Number`,`Pension`.*,`Next_Kin`.`Name`,`Next_Kin`.`Address`,`Next_Kin`.`Phone`,`Next_Kin`.`Relationship` FROM Pension left join `Next_Kin` on `Pension`.`Staff Number`=`Next_Kin`.`Staff Number` WHERE `Pension`.`Staff Number`='$SNO'";
$result = mysql_query($sql,$conn) or die('Could not look up user data; ' . mysql_error());
$row = mysql_fetch_array($result);

?>
<div align="center">
	<table border="0" width="807" cellspacing="1" bgcolor="#FFFFFF" id="table1">
		<tr align='center'>
 <td bgcolor="#008000"><b>
  <font face="Verdana" color="#FFFFFF" style="font-size: 16pt">Pension Record</font></b>
 </td>
</tr>
		<tr>
			<td>

<form name="form1" method="post" action="check_image.php"
enctype="multipart/form-data">

<table border="0" cellpadding="5" id="table2">
<tr><td>&nbsp;</td><td>&nbsp;</td><td><b><font color="#FF0000" style="font-size: 9pt"><?php echo $tval ; ?></font></b> </td></tr>
<tr>
<td> <img border="1" src="Images/Pics/<?php echo $row['Staff Number']; ?>.jpg" width="110" height="140"> </td>
<td>Upload Image:</td>
<td><input name="image_filename" type="file" id="image_filename">
<input type="hidden" name="SNO" value="<?php echo $row['Staff Number'];?>"></td>

<td><input type="submit" name="Submit" value="Submit"> </td>

</tr>
</table>

</form>


<form action="submitPension.php" method="post">
<fieldset style="padding: 2">


<div align="left">

  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="99%" id="AutoNumber1" height="70">
    <tr>
      <td width="17%" height="28">
        Control Number
      </td>
      <td width="31%" height="28">
        <input type="text" name="fileno" size="31" value="<?php echo $row['File Number']; ?>">
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        Pension Number
      </td>
      <td width="31%" height="28">
        <input type="text" name="serviceno" size="31" value="<?php echo $row['Staff Number']; ?>">
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
       Status        
      </td>
      <td width="34%" height="28">
          <select size="1" name="cmbstatus" value="<?php echo $row['Employment Status']; ?>">
          
          <?php  
           echo '<option selected>' . $row['Employment Status'] . '</option>';
           $sql = "SELECT * FROM `Status`";
           $result_status = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rows = mysql_fetch_array($result_status)) 
           {
             echo '<option>' . $rows['Status'] . '</option>';
           }
          ?> 
         </select>
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        Surname
      </td>
      <td width="31%" height="28">
        <input type="text" name="surname" size="31" value="<?php echo $row['Surname']; ?>">
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        First Name
      </td>
      <td width="34%" height="28">
        <input type="text" name="firstname" size="31" value="<?php echo $row['Firstname']; ?>">
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        Other Names
      </td>
      <td width="31%" height="28">
        <input type="text" name="othername" size="31" value="<?php echo $row['Othername']; ?>">
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Department
      </td>
      <td width="34%" height="28">
        <select  name="dept" width="31" value="<?php echo $row['Dept']; ?>">  
          <?php  
           echo '<option selected>' . $row['Dept'] . '</option>';
           $sql = "SELECT * FROM `Department`";
           $result_dept = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rows = mysql_fetch_array($result_dept)) 
           {
             echo '<option>' . $rows['Dept'] . '</option>';
           }
          ?> 
         </select>
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        Sex
      </td>
      <td width="31%" height="28">
        <select  name="sex" width="31" value="<?php echo $row['Sex']; ?>">  
          <?php  
           echo '<option selected>' . $row['Sex'] . '</option>';
           echo '<option>Male</option>';
           echo '<option>Female</option>';
          ?> 
         </select>
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
        Position
      </td>
      <td width="31%" height="28">
        <select  name="initialrank" width="31" value="<?php echo $row['Position']; ?>">  
          <?php  
           echo '<option selected>' . $row['Position'] . '</option>';
           $sql = "SELECT * FROM `Position`";
           $result_irank = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rows = mysql_fetch_array($result_irank)) 
           {
             echo '<option>' . $rows['Position'] . '</option>';
           }
          ?> 
         </select>
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Rank
      </td>
      <td width="34%" height="28">
        <select  name="presentrank" width="31" value="<?php echo $row['Present Rank']; ?>">  
          <?php  
           echo '<option selected>' . $row['Present Rank'] . '</option>';
           $sql = "SELECT * FROM `Rank`";
           $result_prank = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rows = mysql_fetch_array($result_prank)) 
           {
             echo '<option>' . $rows['Rank'] . '</option>';
           }
          ?> 
         </select>
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        Grade Level
      </td>
      <td width="31%" height="28">
        <select  name="level" width="31" value="<?php echo $row['Level']; ?>">  
          <?php  
           echo '<option selected>' . $row['Level'] . '</option>';
           $sql = "SELECT * FROM `Grade Level`";
           $result_gl = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rows = mysql_fetch_array($result_gl)) 
           {
             echo '<option>' . $rows['GL'] . '</option>';
           }
          ?> 
         </select>
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Qualification
      </td>
      <td width="34%" height="28">
        <select  name="qualification" width="31" value="<?php echo $row['Qualification']; ?>">  
          <?php  
           echo '<option selected>' . $row['Qualification'] . '</option>';
           $sql = "SELECT * FROM `Qualification`";
           $result_qualf = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rows = mysql_fetch_array($result_qualf)) 
           {
             echo '<option>' . $rows['Qualification'] . '</option>';
           }
          ?> 
         </select>
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        Profession
      </td>
      <td width="31%" height="28">
        <select  name="profession" width="31" value="<?php echo $row['Profession']; ?>">  
          <?php  
           echo '<option selected>' . $row['Profession'] . '</option>';
           $sql = "SELECT * FROM `Profession`";
           $result_prof = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rows = mysql_fetch_array($result_prof)) 
           {
             echo '<option>' . $rows['Profession'] . '</option>';
           }
          ?> 
         </select>
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Pension Amount
      </td>
      <td width="34%" height="28">
        <input type="text" name="pensionamount" size="31" value="<?php echo $row['Pension Amount']; ?>">
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        Arrears
      </td>
      <td width="31%" height="28">
        <input type="text" name="arrears" size="31" value="<?php echo $row['Arrears']; ?>">
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Deductions
      </td>
      <td width="34%" height="28">
        <input type="text" name="deduction" size="31" value="<?php echo $row['Deduction']; ?>">
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        Pension Managers
      </td>
      <td width="31%" height="28">
        <select  name="pensionmanagers" width="31" value="<?php echo $row['Pension Managers']; ?>">  
          <?php  
           echo '<option selected>' . $row['Pension Managers'] . '</option>';
           $sql = "SELECT * FROM `Pension Managers`";
           $result_pman = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rows = mysql_fetch_array($result_pman)) 
           {
             echo '<option>' . $rows['Pension Managers'] . '</option>';
           }
          ?> 
         </select>
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Office
      </td>
      <td width="34%" height="28">
        <select  name="office" width="31" value="<?php echo $row['Office']; ?>">  
          <?php  
           echo '<option selected>' . $row['Office'] . '</option>';
           $sql = "SELECT * FROM `Office`";
           $result_off = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rows = mysql_fetch_array($result_off)) 
           {
             echo '<option>' . $rows['Office'] . '</option>';
           }
          ?> 
         </select>
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        1st Appt Date
      </td>
      <td width="31%" height="28">
        <input type="text" name="firstappt" size="31" value="<?php echo $row['First Appt']; ?>">
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Present Appt Date
      </td>
      <td width="34%" height="28">
        <input type="text" name="presentappt" size="31" value="<?php echo $row['Present Appt']; ?>">
      </td>
    
     </tr>
    <tr>
      <td width="17%" height="28">
        Employment Type
      </td>
      <td width="31%" height="28">
        <input type="text" name="employtype" size="31" value="<?php echo $row['Employment Type']; ?>">
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Bank
      </td>
      <td width="34%" height="28">
        <select  name="bank" width="31" value="<?php echo $row['Bank']; ?>">  
          <?php  
           echo '<option selected>' . $row['Bank'] . '</option>';
           $sql = "SELECT * FROM `Bank`";
           $result_bank = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rows = mysql_fetch_array($result_bank)) 
           {
             echo '<option>' . $rows['Name'] . '</option>';
           }
          ?> 
         </select>
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        Present Location
      </td>
      <td width="31%" height="28">
        <select  name="presentlocation" width="31" value="<?php echo $row['Present Location']; ?>">  
          <?php  
           echo '<option selected>' . $row['Present Location'] . '</option>';
           $sql = "SELECT * FROM `Location`";
           $result_loc = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rows = mysql_fetch_array($result_loc)) 
           {
             echo '<option>' . $rows['Location'] . '</option>';
           }
          ?> 
         </select>
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Previous Location
      </td>
      <td width="34%" height="28">
        <select  name="previouslocation" width="31" value="<?php echo $row['Prev Location']; ?>">  
          <?php  
           echo '<option selected>' . $row['Prev Location'] . '</option>';
           $sql = "SELECT * FROM `Location`";
           $result_pvloc = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rows = mysql_fetch_array($result_pvloc)) 
           {
             echo '<option>' . $rows['Location'] . '</option>';
           }
          ?> 
         </select>
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        Account Number
      </td>
      <td width="31%" height="28">
        <input type="text" name="acctno" size="31" value="<?php echo $row['Acct No']; ?>">
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Bank Branch
      </td>
      <td width="34%" height="28">
        <select  name="branch" width="31" value="<?php echo $row['Bank Branch']; ?>">  
          <?php  
           echo '<option selected>' . $row['Bank Branch'] . '</option>';
           $sql = "SELECT * FROM `Bank` Where `Name`='$bank'";
           $result_bbr = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rows = mysql_fetch_array($result_bbr)) 
           {
             echo '<option>' . $rows['Branch'] . '</option>';
           }
          ?> 
         </select>
      </td>
    </tr>
  </table>
    <p>

<fieldset style="padding: 2">
<p><legend><b><i><font size="2" face="Tahoma" color="#008000">Personal Info</font></i></b></legend></p>

<div align="left">

  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="99%" id="AutoNumber1" height="70">
    
    <tr>
      <td width="17%" height="28">
        Nationality
      </td>
      <td width="31%" height="28">
        <select  name="nationality" width="31" value="<?php echo $row['Nationality']; ?>">  
          <?php  
           echo '<option selected>' . $row['Nationality'] . '</option>';
           $sql = "SELECT * FROM `Nationality`";
           $result_nat = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rows = mysql_fetch_array($result_nat)) 
           {
             echo '<option>' . $rows['Nationality'] . '</option>';
           }
          ?> 
         </select>
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        State
      </td>
      <td width="34%" height="28">
        <select  name="state" width="31" value="<?php echo $row['State']; ?>">  
          <?php  
           echo '<option selected>' . $row['State'] . '</option>';
           $sql = "SELECT * FROM `State`";
           $result_state = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rows = mysql_fetch_array($result_state)) 
           {
             echo '<option>' . $rows['State'] . '</option>';
           }
          ?> 
         </select>
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        LGA
      </td>
      <td width="31%" height="28">
        <select  name="lga" width="31" value="<?php echo $row['LGA']; ?>">  
          <?php  
           echo '<option selected>' . $row['LGA'] . '</option>';
           $sql = "SELECT * FROM `LGA`";
           $result_lga = mysql_query($sql,$conn) or die('Could not list value; ' . mysql_error());
           while ($rows = mysql_fetch_array($result_lga)) 
           {
             echo '<option>' . $rows['LGA'] . '</option>';
           }
          ?> 
         </select>
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Place of Birth
      </td>
      <td width="34%" height="28">
        <input type="text" name="birthplace" size="31" value="<?php echo $row['Birth Place']; ?>">
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        Marital Status
      </td>
      <td width="31%" height="28">
        <select  name="maritalstatus" width="31" value="<?php echo $row['Marital Status']; ?>">  
          <?php  
           echo '<option selected>' . $row['Marital Status'] . '</option>';
           echo '<option>Single</option>';
           echo '<option>Married</option>';
           echo '<option>Divorced</option>';
           echo '<option>Separated</option>';
           echo '<option>Widowed</option>';
          ?> 
         </select>
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Phone Number
      </td>
      <td width="34%" height="28">
        <input type="text" name="phone" size="31" value="<?php echo $row['Phone']; ?>">
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        Home Address
      </td>
      <td width="31%" height="28">
        <input type="text" name="homeaddress" size="31" value="<?php echo $row['Home Address']; ?>">
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Contact Address
      </td>
      <td width="34%" height="28">
        <input type="text" name="contactaddress" size="31" value="<?php echo $row['Contact Address']; ?>">
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        Height
      </td>
      <td width="31%" height="28">
        <input type="text" name="height" size="31" value="<?php echo $row['Height']; ?>">
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Weight
      </td>
      <td width="34%" height="28">
        <input type="text" name="weight" size="31" value="<?php echo $row['Weight']; ?>">
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        Genotype
      </td>
      <td width="31%" height="28">
        <input type="text" name="genotype" size="31" value="<?php echo $row['Genotype']; ?>">
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Blood Group
      </td>
      <td width="34%" height="28">
        <input type="text" name="bloodgroup" size="31" value="<?php echo $row['Blood Group']; ?>">
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        State Any Deformity
      </td>
      <td width="31%" height="28">
        <input type="text" name="deformity" size="31" value="<?php echo $row['Deformity']; ?>">
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        In Govt Qrtr?
      </td>
      <td width="34%" height="28">
        <?php
          $sql = "SELECT `val`,`type` FROM `Booln` ORDER BY `type` desc";
          $result_govt = mysql_query($sql,$conn) or die('Could not list; ' . mysql_error());

          $govt=$row['In Govt Qtrs'];

          while ($rows = mysql_fetch_array($result_govt)) 
          {
           echo ' <input type="radio" class="radio" align="left" id="govt_' . $rows['val'] . '" name="ingovtqrt" value="' . $rows['val'] . '" ';
           if ($rows['val'] == $govt) 
           {
             echo 'checked="checked" ';
           }
           echo '/>' . $rows['type'] . "\n";
          }
        ?>
      </td>
    </tr>
  </table>
    <p>
 </fieldset>
 <br>

<fieldset style="padding: 2">
<p><legend><b><i><font size="2" face="Tahoma" color="#008000">Next of Kin Info</font></i></b></legend></p>

<div align="left">

  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="99%" id="AutoNumber1" height="70">
    
    <tr>
      <td width="17%" height="28">
        Name
      </td>
      <td width="31%" height="28">
        <input type="text" name="NKName" size="31" value="<?php echo $row['Name']; ?>">
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Phone
      </td>
      <td width="34%" height="28">
        <input type="text" name="NKPhone" size="31" value="<?php echo $row['Phone']; ?>">
      </td>
    </tr>
    <tr>
      <td width="17%" height="28">
        Address
      </td>
      <td width="31%" height="28">
        <input type="text" name="NKAddress" size="31" value="<?php echo $row['Address']; ?>">
      </td>
      <td width="1%" height="28"></td>
      <td width="17%" height="28">
        Relationship
      </td>
      <td width="34%" height="28">
        <input type="text" name="NKRelate" size="31" value="<?php echo $row['Relationship']; ?>">
      </td>
    </tr>
  </table>
    <p>
 </fieldset>
 <br>

<?php
if (!$SNO){
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
		</tr><tr><td align="right"><?php 
 echo "<a href='pensions.php'>Click here</a> to return to list.";
 require_once 'footr.php';
 require_once 'footer.php';
?></td></tr>
	</table>
</div>

