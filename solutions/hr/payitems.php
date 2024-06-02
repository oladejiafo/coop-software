<?php
 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';
#session_start();
//check to see if user has logged in with a valid password
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & $_SESSION['access_lvl'] != 5) 
{
 if ($_SESSION['access_lvl'] != 1 & $_SESSION['access_lvl'] != 4) 
 {
   $redirect = $_SERVER['PHP_SELF'];
   header("Refresh: 0; URL=../index.php?redirect=$redirect");
 }
}

@$ID="";
#$ID=$_REQUEST['cmbGL'];
@$ID=$_REQUEST['ID'];
@$cmbType=$_REQUEST['cmbType'];
@$descr=$_REQUEST['descr'];
@$amount=$_REQUEST['amount'];
@$cmbAllow=$_REQUEST['cmbAllow'];
@$gl=$_REQUEST['gl'];
@$add=$_REQUEST['add'];

@$IDD="";
@$name="";
@list($IDD, $name) = explode(' - ', $ID);

?>
<style type="text/css">
.div-table {
    width: 100%;
    border: 1px solid;
    float: left;
    width: 100%;
	padding:30px;
}

.tab-row {
	background-color: #EEEEEE;
	float: left;
	width: 100%;
	height:5em;
}

.cell {
    padding: 5px;
    border: 1px solid #e9e9e9;
   // text-align:center;
    float: left;
    padding: 5px; 
    background-color: #f5f5f5;
    width: 10%;
    height:4.7em;
    max-height: auto;
    font-size:12px;
    word-wrap: break-word;
}

@media (max-width: 480px){
.tab-row {
	background-color: #EEEEEE;
	float: left;
	width: 100%;
	height:5.5em;
}

.cell {
    padding: 1px;
    border: 1px solid #e9e9e9;
    float: left;
    padding: 5px; 
    background-color: #f5f5f5;
    width: 10%;
    height:5.3em;
    font-size:9px;
   // word-wrap: break-word;
}
}
</style>
<div class="services">
	<div class="container"  style="width:100%">

 <h4 style="background-color:#87B8D6;text-align:center"><b>
<font face="Verdana" color="#FFFFFF" style="font-size: 16pt">Pay Items</font></b>
 </h4>

<form action="payitems.php" method="post">
<div align="left" class="agileinfo_mail_grids">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato" for="input-13">
		<span class="input__label-content input__label-content--chisato">Select Salary Grade:</span>
	</label>
	<select class="input__field input__field--chisato" placeholder=" " style="width:200px" name="ID">
           <?php  
            echo "<option selected>" . $IDD . "</option>";

             $sql = "SELECT `Staff Number`,`Firstname`,`Surname` FROM `staff` order by `Staff Number`";
             $result_c = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
             while ($rows = mysqli_fetch_array($result_c)) 
             {
               echo '<option>' . $rows['Staff Number'] . ' - ' . $rows['Firstname'] . ' ' . $rows['Surname'] . '</option>';
             }
        ?>           
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato" for="input-13">
		<span class="input__label-content input__label-content--chisato">Select Pay Entry Type:</span>
	</label>
          <select class="input__field input__field--chisato" placeholder=" " style="width:200px" name="cmbType">
          <?php if (empty($cmbType))
          { ?>
           <option selected>Amount</option>
          <?php } else {
           echo "<option selected>" . $cmbType . "</option>";
           } ?>
           <option>Amount</option>
           <option>Percent</option>
           <option>Office Based</option>
          </select>
        </font></b>
       </span>
      <span class="input input--chisato">
       <input type="submit" value="Select" name="submitgl" style="width:120px">
      </span>       

</form>
<?php
$sqla="SELECT `AllowanceID`,`Description`, `Amount`,`Type`,`Grade Level` FROM `allowances` WHERE `Grade Level`='$IDD' and `Description`='$descr'";
$resulta = mysqli_query($conn,$sqla) or die('Could not look up user data; ' . mysqli_error());
$rowa = mysqli_fetch_array($resulta);
?>
<fieldset>
<?php
if($add==1)
{
?>
<form action="submitpitems.php" method="post">
<p><b><font face="Verdana" color="#cccccc" style="font-size: 12pt"><u>Pay Items Update</u></font></b></p>

      <span class="input input--chisato">
	<label class="input__label input__label--chisato" for="input-13">
		<span class="input__label-content input__label-content--chisato">Salary Grade</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " style="width:200px;background-color:#efefef" type="text" readonly="readonly" name="ID" size="31" value="<?php echo $IDD; ?>">
        <input type="hidden" name="allowid" size="31" value="<?php echo $rowa['AllowanceID']; ?>">
        <input type="hidden" name="cmbType" size="31" value="<?php echo $_REQUEST['cmbType']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Allowance Type/Descr</span>
	</label>
         <select class="input__field input__field--chisato" placeholder=" " style="width:200px;" name="description">
           <option selected><?php echo $rowa['Description']; ?></option>
           <?php  
            $sql = "SELECT * FROM `allowance types`";
            $result_allow = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
            while ($rows = mysqli_fetch_array($result_allow)) 
            {
             echo '<option>' . $rows['Description'] . '</option>';
            }
           if ($cmbType=="Percent")
           {
             $tye="Percent: ";
           }
           else
           {
             $tye="Amount: ";
           }
        ?>           
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">
          <?php if ($cmbType=="Percent")
           { ?>
	      Percent:
          <?php } else { ?>
	      Amount [/month]:
          <?php } ?>
		</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " style="width:200px;"  type="text" name="amount" size="20" value="<?php echo $rowa['Amount']; ?>">
      </span>

      <span class="input input--chisato">
<?php
if (!$descr){
?>
  <input type="submit" value="Add Item" name="submit" style="width:120px;"> &nbsp; 
<?php } 
 else { ?>
  <input type="submit" value="Update" name="submit" style="width:120px;"> &nbsp; 
  <input type="submit" value="Delete" name="submit" onclick="return confirm('Are you sure you want to Delete?');" style="width:120px;"> &nbsp; 
<?php
}
 ?>
  <input type="submit" value="Cancel" name="submit" style="width:120px;"> &nbsp; 
      </span>
</form>
</div>
<?php
}
?>
 <h5 style="background-color:#cbd9d9;text-align:center"><b>
        <b><font face="Verdana" style="font-size: 9pt">Pay Items for Salary Level:</font></b>
        <input type="hidden" name="gl" size="31" value="<?php echo $IDD; ?>">
        <b><font face="Verdana" style="font-size: 9pt"><?php echo $IDD . ' - ' . $name; ?></font></b>
 </h5>
<div class="div-table">
<?php
if ($cmbType == "Amount")
  {  
 ?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell" style='width:20%;background-color:#D2DD8F'>Description</div>
    <div  class="cell" style='width:20%;background-color:#D2DD8F'>Amount</div>
    <div  class="cell" style='width:20%;background-color:#D2DD8F'>Type</div>
    <div  class="cell" style='width:20%;background-color:#D2DD8F'>Show</div>
    <div  class="cell" style='width:20%;background-color:#D2DD8F'>&nbsp;</div>
  </div>
<?php
    $query_allow="SELECT `Description`, `Amount`,`Type`,`Grade Level`,`Show` FROM `allowances` WHERE `Grade Level`='$IDD'";
    $result_allow=mysqli_query($conn,$query_allow);
$show="";
    while(list($description,$amount,$type,$gls,$show)=mysqli_fetch_row($result_allow))
    { if ($type=="A") {$typi="Earning";} else {$typi="Deduction";}
     $desc=$description;
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:20%"><a href = "payitems.php?adde=1&ID=' . $gls . '&descr=' . $description . '&cmbType=' .$cmbType. '">' .$description. '</a></div>
        <div  class="cell" style="width:20%">' .$amount. '</div>
        <div  class="cell" style="width:20%">' .$typi. '</div>
        <div  class="cell" style="width:20%"><a href = "itemshow.php?ID=' . $gls . '&show=' . $show . '&descr=' . $description . '&cmbType=' . $cmbType . '">' .$show. '</a></div>
        <div  class="cell" style="width:20%">&nbsp;</div>
      </div>';
    }
 }
 else if ($cmbType == "Percent")
 {  ?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell" style='width:20%;background-color:#D2DD8F'>Description</div>
    <div  class="cell" style='width:20%;background-color:#D2DD8F'>Percent</div>
    <div  class="cell" style='width:20%;background-color:#D2DD8F'>Type</div>
    <div  class="cell" style='width:20%;background-color:#D2DD8F'>Show</div>
    <div  class="cell" style='width:20%;background-color:#D2DD8F'>&nbsp;</div>
  </div>
<?php
    $query_pallow="SELECT `Description`, `Percent`,`Type`,`Grade Level`,`Show` FROM `pallowances` WHERE `Grade Level`='$IDD'";
    $result_pallow=mysqli_query($conn,$query_pallow);

    while(list($description,$amount,$type,$gls,$show)=mysqli_fetch_row($result_pallow))
    { if ($type=="A") {$typi="Earning";} else {$typi="Deduction";}
     $desc=$description;
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:20%"><a href = "payitems.php?add=1&ID=' . $gls . '&descr=' . $description . '&cmbType=' .$cmbType. '">' .$description. '</a></div>
        <div  class="cell" style="width:20%">' .$amount. '</div>
        <div  class="cell" style="width:20%">' .$typi. '</div>
        <div  class="cell" style="width:20%"><a href = "itemshow.php?ID=' . $gls . '&show=' . $show . '&descr=' . $description . '&cmbType=' . $cmbType . '">' .$show. '</a></div>
        <div  class="cell" style="width:20%">&nbsp;</div>
      </div>';
    }
 }
 ?>
        <input type="hidden" name="cmbType" size="31" value="<?php echo $cmbType; ?>">

</div>

<p align="center">
  <?php
     echo "<a href ='payitems.php?ID=$IDD&cmbType=$cmbType&add=1'> Add New Pay Item </a>|&nbsp;
               |<a href ='tax.php?ID=$IDD&cmbType=$cmbType'> Compute Tax </a>|&nbsp;
               |<a target='_blank' href ='taxshow.php?ID=$IDD&cmbType=$cmbType'> Show Tax Details</a>&nbsp;"; 
  ?>
</p>
<?php
 echo "<p><a href='admini.php'> Go back to Control Panel</a> &nbsp; </p>";
?>


</div>
<div height="40px">&nbsp;</div>

<?php
require_once 'footer.php';
?>
</div>