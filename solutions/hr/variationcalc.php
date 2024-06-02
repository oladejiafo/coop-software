<?php
 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & $_SESSION['access_lvl'] != 5) 
{
 if ($_SESSION['access_lvl'] != 1) 
 {
   $redirect = $_SERVER['PHP_SELF'];
   header("Refresh: 0; URL=../index.php?redirect=$redirect");
 }
}

@$SNO=$_REQUEST['SNO'];
@$id=$_REQUEST['id'];

$sql="SELECT `Staff Number`,`Name`,`Type`,`For Month`,`Variation`,`Description`,`SortOrder`,
      `AllowID`,`Typ`,`Office`,`Year` FROM `variation` WHERE `Staff Number`='$SNO'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);
?>

<title>Payroll | Cooperative Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Variation</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="variations.php">
										<i class="fa fa-list"></i>
									</a>
								</li>
								<li><span>Variations</span></li>
							</ol>
					
							&nbsp;
						</div>
					</header>
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="../assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="../assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />


<section class="panel">
	<header class="panel-heading">
		<h2 class="panel-title">Variation Calculator</h2>
	</header>
       <div class="panel-body">

<div class="services">
	<div class="container"  style="width:100%">

<?php 
echo "<form action='submitvarcalc.php' method='post'> ";

@$page = $_REQUEST["page"];

$sqlg = "SELECT `Level` FROM `staff` where `Staff Number`='$SNO'";
$resultg = mysqli_query($conn,$sqlg);
$rowg = mysqli_fetch_array($resultg);
?>
 <div class='container' style="width:100%; background-color:#cbd9d9">
<div align="left" class="agileinfo_mail_grids">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Staff Salary Level">Staff Salary Level</span>
	</label>
 	<select class="input__field input__field--chisato" placeholder=" " style='width:250px' name='gl'>
          <option selected><?php echo $rowg['Level']; ?></option>
           <?php
            $sql = 'SELECT * FROM `grade level`';
            $result_gl = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
            while ($row = mysqli_fetch_array($result_gl)) 
            {
             echo '<option>' . $row["GL"] . '</option>';
            }
           ?>           
         </select>
        </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Salary Pay Item">Salary Pay Item</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" " style='width:250px' name='payitem'>
          <option selected></option>
           <?php
            $sql = 'SELECT * FROM `allowance types`';
            $result_allow = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
            while ($row = mysqli_fetch_array($result_allow)) 
            {
             echo '<option>' . $row['Description'] . '</option>';
            }
           ?>           
         </select>
       </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Duration (in Months)">Duration (in Months)</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " style='width:250px' type='text' name='duration'><input type='hidden' size='20' name='SNO' value='<?php echo $SNO; ?>'>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Old Rate">Old Rate</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " style='width:250px' type='text' name='oldrate'><input type='hidden' name='id' value='<?php echo $id; ?>'>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="New Rate">New Rate</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " style='width:250px' type='text' name='newrate'>
      </span>
      <p> <input type='submit' value='Calculate' name='submit'> &nbsp;  <input type='submit' value='Clear' name='submit'></p>
      <input type='hidden' size='30' name='page' value='$page'>
      <input type='hidden' size='30' name='cmbFilter' value='$cmbFilter'>
</form>

</div>
</div>
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

<div class="div-table">
  <div class="tab-row" style="font-weight:bold;background-color:#cbd9d9'">
    <div  class="cell"  style='width:12.5%;background-color:#cbd9d9'>S/No</div>
    <div  class="cell" style='width:12.5%;background-color:#cbd9d9'>Staff Salary Level</div>
    <div  class="cell" style='width:12.5%;background-color:#cbd9d9'>Salary Pay Item</div>
    <div  class="cell" style='width:12.5%;background-color:#cbd9d9'>Duration (Months)</div>
    <div  class="cell" style='width:12.5%;background-color:#cbd9d9'>Old Rate</div>
    <div  class="cell" style='width:12.5%;background-color:#cbd9d9'>New Rate</div>
    <div  class="cell" style='width:12.5%;background-color:#cbd9d9'>Arrears</div>
    <div  class="cell" style='width:12.5%;background-color:#cbd9d9'>&nbsp;</div>
  </div>
<?php
   $query="SELECT `ID`,`Grade Level`,`Pay Item`,`Duration`,`Old Rate`,`New Rate`, `Arrears` FROM `varcalc`";
   $result=mysqli_query($conn,$query);

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 
    $i=0;
    while(list($idd,$gl,$pitem,$duration,$old,$new,$arrear)=mysqli_fetch_row($result))
    {
     @$old=number_format($old,2);
     @$new=number_format($new,2);
     @$arrear=number_format($arrear,2);
     $i=$i+1;

     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:12.5%">' .$i. '</div>
        <div  class="cell" style="width:12.5%">' .$gl. '</div>
        <div  class="cell" style="width:12.5%">' .$pitem. '</div>
        <div  class="cell" style="width:12.5%">' .$duration. '</div>
        <div  class="cell" style="width:12.5%">' .$old. '</div>
        <div  class="cell" style="width:12.5%">' .$new. '</div>
        <div  class="cell" style="width:12.5%">' .$arrear.  '</div>
        <div  class="cell" style="width:12.5%">&nbsp;</div>
      </div>';
    }

   $query11="SELECT sum(`Arrears`) as arrear FROM `varcalc`";
   $result11=mysqli_query($conn,$query11);
   $row11 = mysqli_fetch_array($result11);
   @$sumamt=$row11['arrear'];
   @$sumamt=number_format($sumamt,2);

     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:75%" align="right"><b>Total Arrears &nbsp;</b></div>
        <div  class="cell" style="width:12.5%"><b>' .$sumamt.  '</b></div>
        <div  class="cell" style="width:12.5%">&nbsp;</div>
      </div>';
 ?>
</div>

<?php 
 echo "<p><a href='variationsupdate.php?SNO=$SNO&id=$id'><font color='#6699CC'>Click here</font></a> to return to Variation.</p>"; ?>
<?php
require_once 'footerr.php';
?>
</div>