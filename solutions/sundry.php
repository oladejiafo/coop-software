<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5) & ($_SESSION['access_lvl'] != 4) & ($_SESSION['access_lvl'] != 3))
{
 if ($_SESSION['access_lvl'] != 1){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");
}
}

 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';

 @$tval=$_GET['tval'];
 @$id=$_REQUEST['id'];

$sql="SELECT * FROM `sundry` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID`='$id'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);
$totrows  = mysqli_num_rows($result);

 echo "<p><font color='#FF0000' style='font-size: 9pt'>" . $tval . "</font></p>";
?>

<script language="JavaScript">
function checkForm()
{
   var cbillamt, camount, cdeduction;
   with(window.document.form1)
   {
      cbillamt   = billamt;
      camount    = amount;
      cdeduction = deduction;
   }

   if(!isNumeric(trim(camount.value)))
   {
      alert('Invalid amount. Do not put a coma');
      camount.focus();
      return false;
   }   
   else if(!isNumeric(trim(cbillamt.value)))
   {
      alert('Invalid amount. Do not put a coma');
      cbillamt.focus();
      return false;
   }
   else if(!isNumeric(trim(cdeduction.value)))
   {
      alert('Invalid amount. Do not put a coma');
      cdeduction.focus();
      return false;
   }
   else
   {
      return true;
   }
}

function trim(str)
{
   return str.replace(/^\s+|\s+$/g,'');
}

function isEmail(str)
{
   var regex = /^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;

return regex.test(str);
}

	function isNumeric(sText, decimalAllowed) {
		if (sText.length == 0) return false;
		var validChars = "";
		if (decimalAllowed) {
			validChars = "0123456789.";
		} else {
			validChars = "0123456789";
		}
		var isNumber = true;
		var charA;
		var decimalCount = 0;
		for (i = 0; i < sText.length && isNumber == true && decimalCount < 2; i++) {
			charA = sText.charAt(i); 
			if (charA == ".") { 
				decimalCount += 1;
			}
			if (validChars.indexOf(charA) == -1) {
			isNumber = false;
			}
		}
		return isNumber;
	}

function validateNumber(evt) {
    var e = evt || window.event;
    var key = e.charCode || e.keyCode || e.which;

    if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
    // numbers   
    key >= 48 && key <= 57 ||
    // Numeric keypad
    key >= 96 && key <= 105 ||
    // Backspace and Tab and Enter
    key == 8 || key == 9 || key == 13 ||
    // Home and End
    key == 35 || key == 36 ||
    // left and right arrows
    key == 37 || key == 39 ||
    // Del and Ins
    key == 46 || key == 45 || key == 47 || key == '.') {
        // input is VALID
    }
    else {
        // input is INVALID
        e.returnValue = false;
        if (e.preventDefault) e.preventDefault();
    }
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    console.log(charCode)
    if (charCode == 45 || charCode == 46 || charCode == 37 || charCode == 39) {
        return true;
    } else if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>

<script src="../lib/jquery.js"></script>
<script src="../dist/jquery.validate.js"></script>

<script>


$().ready(function() {
	// validate the comment form when it is submitted
	$("#commentForm").validate();

});
</script>

<!-- load jquery ui css-->
<link href="js/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<!-- load jquery library -->
<script src="js/jquery-1.9.1.js"></script>
<!-- load jquery ui js file -->
<script src="js/jquery-ui.min.js"></script>

<style type="text/css">
.div-table {
    width: 100%;
    border: 1px dashed #ff0000;
    float: left;
    padding:10px;
}

.tab-row {
	background-color: #EEEEEE;
	float: left;
	width: 100%;
	height:45px;
}

.cell {
    padding: 1px;
    border: 1px solid #e9e9e9;
    float: left;
    padding: 5px; 
    background-color: #f5f5f5;
    width: 50%;
    height:45px;
    font-size:12px;
}
</style>

<title>Sundry | Cooperatives Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Sundry Account</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="sundry.php">
										<i class="fa fa-usd"></i>
									</a>
								</li>
								<li><span>Records</span></li>
							</ol>
					
							&nbsp;
						</div>
					</header>

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="assets/vendor/dropzone/css/basic.css" />
		<link rel="stylesheet" href="assets/vendor/dropzone/css/dropzone.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
		<link rel="stylesheet" href="assets/vendor/summernote/summernote.css" />
		<link rel="stylesheet" href="assets/vendor/summernote/summernote-bs3.css" />
		<link rel="stylesheet" href="assets/vendor/codemirror/lib/codemirror.css" />
		<link rel="stylesheet" href="assets/vendor/codemirror/theme/monokai.css" />
<div align="center">
					<!-- start: page -->
						<div class="row">
							<div class="col-xs-12">
								<section class="panel">
									<header class="panel-heading">
										<h2 class="panel-title"></h2>
									</header>
									<div class="panel-body">
   <form  action="sundry.php" method="post">
      Select Criteria to Search with: <select size="1" name="cmbFilter" style="width:150px;height:40px;font-size:12px">
      <option selected></option>
      <option value="Account Number">Account Number</option>
      <option value="Date">Date</option>
      <option value="Source">Source</option>
     </select>
     &nbsp; 
     <input type="text" name="filter" style="width:120px;height:35px">
     &nbsp; 
     <input type="submit" value="Go" name="submit" style="height:30;width:80; color:#008000; font-size: 13pt">
   </form>
<legend></legend>

<SCRIPT language=JavaScript>
function reload(form)
{
var val=form.type.options[form.type.options.selectedIndex].value;
self.location='sundry.php?type=' + val ;
}

</script>

<?php
@$type=$_GET['type']; // Use this line or below line if register_global is off
if(strlen($type) > 0 and is_numeric($type)){ // to check if $cat is numeric data or not. 
echo "Data Error";
exit;
}

#$quer2=mysqli_query($conn,"SELECT `Nationality` FROM `nationality` order by `Continent`, `Nationality`"); 

if(isset($type) and strlen($type) > 0){
$quer=mysqli_query($conn,"SELECT `Narration` FROM `narration` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Type`='$type' order by `Narration`"); 
}else{$quer=mysqli_query($conn,"SELECT `Narration` FROM `narration` order by `narration`"); } 

?>
<div align="center">
<div align="leftt" style="margin-left:20px;" class="agileinfo_mail_grids">
<form action="submitsundry.php" method="post">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Date:</span>
	</label>
<?php
if (!$id)
{ 
?>
       <input id="inputField" type="text" class="input__field input__field--chisato" placeholder=" " name="date" value="<?php echo date('d-m-Y'); ?>" required>
<?php
} else { 
?>
        <input id="inputField" type="text" name="date" class="input__field input__field--chisato" placeholder=" " value="<?php echo date('d-m-Y',strtotime($row['Date'])); ?>" required>
<?php
 } 
?>
        <input type="hidden" name="id" size="31" value="<?php echo $row['ID']; ?>">
    </span>

      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Type:</span>
	</label>
	<select  name="type" class="input__field input__field--chisato" placeholder=" " onchange="reload(this.form)" value="<?php echo $row['Type']; ?>" required>  
          <?php  
          if(!$row['Type'])
          {
           echo "<option selected value='$type'>$type</option>"."<BR>";
          } else {
           echo '<option selected>' . $row['Type'] . '</option>'; 
          }
           echo '<option>Income</option>';
           echo '<option>Expenditure</option>';
          ?> 
         </select>
     </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Narration:</span>
	</label>
	<select name='source' class="input__field input__field--chisato" placeholder=" ">
          <?php 
           echo "<option value=''>" . $row['Source'] . "</option>";
           while($noticia = mysqli_fetch_array($quer))
           { 
            echo  "<option value='$noticia[Narration]'>$noticia[Narration]</option>";
           }
           echo '<option>Admin Charges</option>';
           echo '<option>Entrance Fee</option>';
           echo '<option>Others</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Amount:</span>
	</label>
        <input type="text" name="amount" class="input__field input__field--chisato" placeholder=" " value="<?php echo $row['Amount']; ?>" onkeypress="return isNumber(event)" required>
     </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Customer Account No:</span>
	</label>
        <input type="text" name="acctno"  class="input__field input__field--chisato" placeholder=" " value="<?php echo $row['Account Number']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Remark:</span>
	</label>
	<textarea class="input__field input__field--chisato" placeholder=" " name="note" cols="88" rows="2"><?php echo $row['Note']; ?></textarea>  
      </span>

<?php
if (!$id){
?>
  <input type="submit" value="Save" name="submit"> &nbsp;
<?php } 
 else { ?>
  <input type="submit" value="Update" name="submit"> &nbsp; 
  <input type="submit" value="Delete" name="submit"> &nbsp; 
<?php
} ?>
  </div>
</body>
</form>

<p>&nbsp;</p>
<div class="div-table">
 <?php
 @$tval=$_GET['tval'];
 $limit      = 15;
 @$page=$_GET['page'];

 @$cmbFilter=$_REQUEST["cmbFilter"];
 @$filter=$_REQUEST["filter"];

?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:20%'>S/No</div>
    <div  class="cell" style='width:20%'>Date</div>
    <div  class="cell" style='width:20%'>Amount</div>
    <div  class="cell" style='width:20%'>Source</div>
    <div  class="cell" style='width:20%'>Account Owner</div>
  </div>
<?php
if (!$cmbFilter=="")
{  
   $query_count    = "SELECT * FROM `sundry` WHERE `Company` ='" .$_SESSION['company']. "' AND  `" . $cmbFilter . "` like '" . $filter . "%' order by `Date` desc";
} else {
   $query_count    = "SELECT * FROM `sundry` WHERE `Company` ='" .$_SESSION['company']. "' order by `Date` desc";
}
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

if (!$cmbFilter=="")
{
   $query="SELECT `ID`,`Date`,`Amount`,`Source`,`Account Number` FROM `sundry` WHERE `Company` ='" .$_SESSION['company']. "' AND  `" . $cmbFilter . "` like '" . $filter . "%' order by `Date` desc LIMIT $limitvalue, $limit";
} else {
   $query="SELECT `ID`,`Date`,`Amount`,`Source`,`Account Number` FROM `sundry` WHERE `Company` ='" .$_SESSION['company']. "' order by `Date` desc LIMIT $limitvalue, $limit";
}
   $result=mysqli_query($conn,$query);

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 

$i=0;
    while(list($id,$date,$amt,$source,$acctno)=mysqli_fetch_row($result))
    {
     $i=$i+1;
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:20%">' .$i. '</div>
        <div  class="cell" style="width:20%"><a href = "sundry.php?id=' . $id . '">' .$date. '</a></div>
        <div  class="cell" style="width:20%">' .$amt. '</div>
        <div  class="cell" style="width:20%">' .$source. '</div>
        <div  class="cell" style="width:20%">' .$acctno.  '</div>
      </div>';
    }
echo "</div><div>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  "); 
       } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pagenext\">NEXT PAGE</a>");  
            
    }          
    else
    { 
        echo("NEXT PAGE");  
    } 
?>
</div>
									</div>
								</section>
							</div>
						</div>
<?php
require_once 'footer.php';
?>
