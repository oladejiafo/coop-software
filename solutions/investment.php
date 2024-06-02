<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 2) & ($_SESSION['access_lvl'] != 1) & ($_SESSION['access_lvl'] != 3) & ($_SESSION['access_lvl'] != 4) & ($_SESSION['access_lvl'] != 6) & ($_SESSION['access_lvl'] != 7))
{
 if ($_SESSION['access_lvl'] != 5){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");
}
}

 require_once 'conn.php';
 require_once 'header.php';

 @$tval=$_GET['tval'];
 @$ID=$_REQUEST['id'];

$sql="SELECT * FROM `investment` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID`='$ID' order by `Date` desc, `Title`";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);
echo $id;
 echo "<p><font color='#FF0000' style='font-size: 9pt'>" . $tval . "</font></p>";
?>

<link rel="stylesheet" type="text/css" media="all" href="../jsDatePick_ltr.min.css" />
<!-- 	
<link rel="stylesheet" type="text/css" media="all" href="../jsDatePick_ltr.css" />
   <link rel="shortcut icon" href="favicon.ico">
-->
<script type="text/javascript" src="../jsDatePick.min.1.3.js"></script>

<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"inputField",
			dateFormat:"%Y-%m-%d"
    });
    new JsDatePick({
			useMode:2,
			target:"inputFieldB",
			dateFormat:"%Y-%m-%d"
    });
    new JsDatePick({
			useMode:2,
			target:"inputFieldC",
			dateFormat:"%Y-%m-%d"
		});
	};
</script>

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
<link href="../XXjs/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<!-- load jquery library -->
<script src="../XXjs/jquery-1.9.1.js"></script>
<!-- load jquery ui js file -->
<script src="../XXjs/jquery-ui.min.js"></script>

<style type="text/css">
.div-table {
    width: 100%;
//    border: 1px dashed #ff0000;
    float: left;
    padding:10px;
}

.tab-row {
	background-color: #EEEEEE;
	float: left;
	width: 100%;
	height:70px;
}

.cell {
    padding: 1px;
    border: 1px solid #e9e9e9;
    float: left;
    padding: 5px; 
    background-color: #f5f5f5;
    width: 50%;
    height:50px;
    font-size:12px;
}
</style>

<title>Investment | Cooperative Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Investment Record</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="investment.php">
										<i class="fa fa-book"></i>
									</a>
								</li>
								<li><span>Record</span></li>
							</ol>
					
							&nbsp;
						</div>
					</header>

<?php
if(strlen($row['Title']) >3)
{
 $heading=$row['Title'];
} else {
 $heading = "New";
}
?>
<section class="panel">
	<header class="panel-heading">
		<h2 class="panel-title"><?php echo strtoupper($heading); ?> INVESTMENT DETAILS</h2>
	</header>
       <div class="panel-body">

<div align="center">
<form action="submitinv.php" method="post">
<div align="center">
<div align="leftt" style="margin-left:20px;font-size: 12px" class="agileinfo_mail_grids">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Investment Type:</span>
	</label>
	<select  class="input__field input__field--chisato" placeholder=" " name="type" width="31" value="<?php echo $row['Type']; ?>" required>  
          <?php  
           echo '<option selected>' . $row['Type'] . '</option>';
         //  echo '<option>General</option>';
          // echo '<option>Specific</option>';
           $sql = "SELECT * FROM `investment type` WHERE `Company` ='" .$_SESSION['company']. "'";
           $result_hd = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_hd)) 
           {
             echo '<option value' . $rows['Type'] . '>' . $rows['Type'] . '</option>';
           }
          ?> 
         </select>
     </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Date Initiated:</span>
	</label>
	<input type="text" id="inputField" name="date" size="31" class="input__field input__field--chisato" placeholder=" " value="<?php echo $row['Date']; ?>" required>
    	<input type="hidden" name="ID" size="31" value="<?php echo $row['ID']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Project Title:</span>
	</label>
	<input type="text" name="title" class="input__field input__field--chisato" placeholder=" " value="<?php echo $row['Title']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Project Description:</span>
	</label>
	<input type="text" name="details" class="input__field input__field--chisato" placeholder=" " value="<?php echo $row['Description']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Total Amount Required:</span>
	</label>
	<input type="text" name="amount" class="input__field input__field--chisato" placeholder=" " value="<?php echo $row['Amount']; ?>" onkeypress="return isNumber(event)" required>
	  <input type="hidden" name="amounttemp" value="<?php echo $row['Amount']; ?>">
  </span>
  <span class="input input--chisato">
	 <label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Total Units:</span>
	 </label>
	 <input type="text" name="totunit" class="input__field input__field--chisato" placeholder=" " value="<?php echo $row['Total Units']; ?>" onkeypress="return isNumber(event)">
  </span>
  <span class="input input--chisato">
	 <label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Project Start Date:</span>
	 </label>
	 <input type="text" name="startdate" id="inputFieldB" class="input__field input__field--chisato" placeholder=" " value="<?php echo $row['Start Date']; ?>">
  </span>
  <span class="input input--chisato">
	 <label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Project End Date:</span>
	 </label>
	 <input type="text" name="enddate" id="inputFieldC" class="input__field input__field--chisato" placeholder=" " value="<?php echo $row['End Date']; ?>">
  </span>
  <span class="input input--chisato">
	 <label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Value per Unit:</span>
	 </label>
	 <input type="text" name="unitvalue" class="input__field input__field--chisato" placeholder=" " value="<?php echo $row['Unit Value']; ?>" onkeypress="return isNumber(event)">
  </span>

  <span class="input input--chisato">
	 <label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Expected Profit:</span>
	 </label>
	 <input type="text" name="profit" class="input__field input__field--chisato" placeholder=" " value="<?php echo $row['Expected Profit']; ?>" onkeypress="return isNumber(event)">
  </span>

  <span class="input input--chisato">
	 <label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Total Members Participating:</span>
	 </label>
   <?php
      $sqlVv="SELECT count(`ID`) as MEM FROM `invest` WHERE `Company` ='" .$_SESSION['company']. "' AND `TID`='" .$row['ID']. "' AND `Participate`='Yes'";
      $resultVv = mysqli_query($conn,$sqlVv) or die('Could not look up user data; ' . mysqli_error());
      $rowVv = mysqli_fetch_array($resultVv);
      $mem=$rowVv['MEM'];
   ?>
	 <input type="text" name="members" class="input__field input__field--chisato" placeholder=" " value="<?php echo $mem; ?>" readonly="readonly" style="background-color:#E0E0E0">
  </span>
  <span class="input input--chisato">
<?php
if (!$ID){
?>
  <input type="submit" value="Save" name="submit" style="width:120px; height:35px"> &nbsp;
<?php } 
 else { ?>
  <input type="submit" value="Update" name="submit" style="width:120px; height:35px"> &nbsp; 
  <input type="submit" value="Delete" name="submit" onclick="return confirm('Are you sure you want to Delete?');" style="width:120px; height:35px"> &nbsp; 
<?php
} ?>
  </span>
  </div>
</form>
<div>
<?php 
 echo "<a class='btn btn-primary' href='investments.php'><i class='fa fa-arrow-left'></i> Click here</a> to return to list.";

?>
</div>
<br>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell" style='width:100%;height:70px'><h4>MEMBERS INVOLVEMENT</h4></div>
  </div>
<?php
if($_POST['id'] && $_POST['jnx']=="X1x")
{
     if($_POST['participate']=="No")
     {
        $sqlVv="SELECT count(`ID`) as MEM FROM `invest` WHERE `Company` ='" .$_SESSION['company']. "' AND `TID`='$mtid' and `Participate`='Yes' Group By `ID`";
        $resultVv = mysqli_query($conn,$sqlVv) or die('Could not look up user data; ' . mysqli_error());
        $rowVv = mysqli_fetch_array($resultVv);
        $mem=$rowVv['MEM'] -1;
     }
        $query_updateV = "UPDATE `investment` SET `Members` = '$mem' WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = '$mtid'";
        $result_updateV = mysqli_query($conn,$query_updateV);

  if ($row['Type']=="General")
  {
        if($row['Amount'] > 0)
        {
          $amt=($row['Amount']*$_POST['shp'])/100;
        } else {
          $amt=0;
        }

  } else {
       $amt=$_POST['mshares'];
  }

     $query_update = "UPDATE `invest` SET `Participate` = '" .$_POST['participate']. "',`Invest Amount` = '" .$amt. "' WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = '" .$_POST['midd']. "'";
     $result_update = mysqli_query($conn,$query_update);
}
if($_REQUEST['mx']==1)
{
  $mid=$_REQUEST['vid'];
  $mtid=$_REQUEST['tid'];
  $vvmid=$_REQUEST['vmid'];

   $queryQ = "SELECT `ID`,`TID`,`Share Value`,`Share Holding`,`Share Percent`,`Invest Amount`,`Participate`,`Source` FROM `invest` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID`='$mid' AND `TID`='$mtid'";
   $resultQ=mysqli_query($conn,$queryQ);
   $rowQ = mysqli_fetch_array($resultQ); 

   $queryQq = "SELECT `ID`,`Amount` FROM `investment` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID`=".$_REQUEST['id'];
   $resultQq=mysqli_query($conn,$queryQq);
   $rowQq = mysqli_fetch_array($resultQq);
?>

<!-- load jquery library -->
<script src="js/jquery-1.7.1.min.js"></script>

<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" />
<script src='jsx/jquery.min.js'></script>

<!-- load jquery ui css-->
<link href="js/jquery-ui.min.css" rel="stylesheet" type="text/css" />

<!-- load jquery ui js file -->
<script src="js/jquery-ui.min.js"></script>

<script type="text/javascript">
$(function() {
    var availableTags = <?php include('autocompletex.php'); ?>;
    $("#enroox").autocomplete({
        source: availableTags,
        autoFocus:true
    });
});
</script>
  <div class="tab-row" style="font-weight:bold">
    <div align="left" class="cell" style='width:100%'>
      <form action="addinv.php" method="POST">
        <span>
          <input type="hidden" name="mmtid" value="<?php echo $mtid;?>">
          <input type="hidden" name="vmid" value="<?php echo $_REQUEST['vmid'];?>">
          <input type="hidden" name="mmXtid" value="<?php echo $row['ID'];?>">
                       
          <input type="hidden" name="midd" value="<?php echo $mid;?>">
          <input type="hidden" name="id" value="<?php echo $_REQUEST[id];?>">
          <input type="hidden" name="shp" value="<?php echo $rowQ['Share Percent'];?>">
          <input type="hidden" name="jnx" value="X1x">
        </span>
        
        <?php
          if(isset($rowQ['ID']))
          {?>
            <span>Shares Holding: <input type="text" style="width:100px" name="shares" value="<?php echo $rowQ['Share Holding'];?>"></span>
          <?php } else { ?>
            <span>Member Info: <input type="text" style="width:100px;" autocomplete="on" name="member" id="enroox" placeholder=" " value="<?php echo $row['member']; ?>"></span>
            <span>Shares Unit: <input type="text" style="width:100px;" name="shares" value="<?php echo number_format($rowQ['Share Holding']);?>"></span>
          <?php 
          }
          ?> 
        </span>
        <span>
<?php
if ($row['Type']=="Specific")
{
?>
          Amount Invested: <input type="text" style="width:100px" name="mshares" value="<?php echo number_format($rowQ['Invest Amount']);?>">
<?php
} else {
?>
          Amount Invested: <input type="text" style="width:100px;background-color:#E0E0E0" readonly="readonly" name="mshares" value="<?php echo number_format($rowQ['Invest Amount']);?>">
<?php
} 
?>
        </span>
        <span>
          Participate In This?: 
	        <select  class="input__field input__field--chisato" placeholder=" " name="participate" style="width:80px" value="<?php echo $rowQ['Participate']; ?>">  
          <?php  
           echo '<option selected>' . $rowQ['Participate'] . '</option>';
           echo '<option>Yes</option>';
           echo '<option>No</option>';
          ?> 
         </select>
        </span>
        <span>
          Payment Source: 
	        <select  class="input__field input__field--chisato" placeholder=" " name="source" style="width:80px" value="<?php echo $rowQ['Source']; ?>">  
          <?php  
           echo '<option selected>' . $rowQ['Source'] . '</option>';
           echo '<option>From Savings</option>';
           echo '<option>By Cash</option>';
           echo '<option>By Transfer</option>';
          ?> 
         </select>
        <span>
          <?php
          if(isset($rowQ['ID']))
          {?>
            <button class="btn btn-success" title="Update" width="40px" name="submit" value="Update" name="submit"><i class="fa fa-check"></i></button>
            <button class="btn btn-warning" title="Cancel" width="40px" name="submit" value="Cancel" name="submit"><i class="fa fa-times"></i></button>
            <span style="font-size:9px;color:red"><i>{To Delete This, Select No in Participation and click the Update Button}</i></span>
          <?php
          } else { 
          ?>
           <button class="btn btn-info" title="Save" width="40px" name="submit" value="Save" name="submit"><i class="fa fa-check"></i></button>
          <?php
          }
          ?>
        </span>
      </form>
    </div>
  </div>
<?php
} else {
  echo 
  '
  <div class="tab-row">
  <div  class="cell" style="width:100%"><a href="investment.php?&mx=1&id=' .$ID. '"><i class="fa fa-pencil"></i> Add Member To Investment</a></div>
  </div>
  ';
  }
?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell" style='width:5.11%;height:65px'>S/No</div>
    <div  class="cell" style='width:11.11%;height:65px'>Membership No</div>
    <div  class="cell" style='width:17.11%;height:65px'>Name</div>
    <div  class="cell" style='width:11.11%;height:65px'>Unit Shares</div>
    <div  class="cell" style='width:11.11%;height:65px'>Shares Value</div>
    <div  class="cell" style='width:11.11%;height:65px'>Shares Holding %</div>
    <div  class="cell" style='width:11.11%;height:65px'>Amount Invested</div>
    <div  class="cell" style='width:11.11%;height:65px'>Invested?</div>
    <div  class="cell" style='width:11.11%;height:65px'>&nbsp;</div>
  </div>
<?php
   $queryp = "SELECT `ID`,`TID`,`MID`,`Share Holding`,`Share Value`,`Share Percent`,`Invest Amount`,`Participate` FROM `invest` WHERE `Company` ='" .$_SESSION['company']. "' AND `TID`='" . $row['ID']. "' order by `ID` desc";
   $resultp=mysqli_query($conn,$queryp);
   
$i=0;
$TOTvalu=0;
$TOTshares=0;
    while(list($vid,$vtid,$vmid,$vshare,$vvalue,$vpercent,$vamount,$vpart)=mysqli_fetch_row($resultp))
    { 
      $sqlV="SELECT `Membership Number`,`First Name`,`Surname` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID`='$vmid'";
      $resultV = mysqli_query($conn,$sqlV) or die('Could not look up user data; ' . mysqli_error());
      $rowV = mysqli_fetch_array($resultV);
      $name=$rowV['First Name'] . ' ' . $rowV['Surname'];
      $memid =$rowV['Membership Number'];
     $valuu=number_format($vvalue,2);
     $amount=number_format($vamount,2);
     $share=number_format($vshare);

     $i=$i+1;

     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:5.11%">' .$i. '</div>
        <div  class="cell" style="width:11.11%">' .$memid. '</div>
        <div  class="cell" style="width:17.11%">' .$name. '</div>
        <div  class="cell" style="width:11.11%">' .$share. '</div>
        <div  class="cell" style="width:11.11%">' .$valuu. '</div>
        <div  class="cell" style="width:11.11%">' .$vpercent.  '</div>
        <div  class="cell" style="width:11.11%">' .$amount.  '</div>
        <div  class="cell" style="width:11.11%">' .$vpart.  '</div>
        <div  class="cell" style="width:11.11%"><a href="investment.php?vid=' .$vid. '&id=' .$vtid. '&tid=' .$vtid. '&vmid=' .$vmid. '&mx=1"><i class="fa fa-edit"></i> Manage</a></div>
      </div>';
    }
?>

</div>
</fieldset>




									</div>
								</section>
							</div>
						</div>
<?php
require_once 'footerr.php';
?>
</div>