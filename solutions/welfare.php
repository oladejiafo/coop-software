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
 @$ID=$_REQUEST['ID'];

$sql="SELECT * FROM `welfare` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID`='$ID' order by `Date` desc";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);

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
    var availableTagc = <?php include('autocompleteChk.php'); ?>;
    $("#enrooChk").autocomplete({
        source: availableTagc,
        autoFocus:true
    });
});
</script>
<script type="text/javascript">
$(function() {
    var availableTags = <?php include('autocomplete.php'); ?>;
    $("#enroo").autocomplete({
        source: availableTags,
        autoFocus:true
    });
});
</script>

<script>
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	function getCity(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>
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

<title>Welfare | Cooperative Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Welfare Record</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="welfare.php">
										<i class="fa fa-book"></i>
									</a>
								</li>
								<li><span>Record</span></li>
							</ol>
					
							&nbsp;
						</div>
					</header>

<div align="center" class="panel-body">
<?php
if (!$ID)
{
if(isset($_POST['chkMember']))
{
 $chkFound ="!1!";

 $chkMember=$_POST['chkMember'];
 list($namC,$chkNum) = explode(" - ", $chkMember);
 $sqlChk ="Select count(`ID`) as Attend from `attendance` Where `Membership No`='$chkNum' AND YEAR(`Date`)='".date('Y')."'";
 $resultChk =mysqli_query($conn, $sqlChk);
 $rowChk =mysqli_fetch_array($resultChk);
 $myattend = $rowChk['Attend'];

 $sqlChkAll ="Select count(`ID`) as AttendAll from `attendance` Where YEAR(`Date`)='".date('Y')."'";
 $resultChkAll =mysqli_query($conn, $sqlChkAll);
 $rowChkAll =mysqli_fetch_array($resultChkAll);
 $attendAll = $rowChkAll['AttendAll'];
 $attend = $myattend ."/" . $attendAll;

 $sqlChkC ="Select count(`ID`) as Contri,sum(`Amount`) as Amt from `contributions` Where `Account Number`='$chkNum' AND YEAR(`Date`)='".date('Y')."'";
 $resultChkC =mysqli_query($conn, $sqlChkC);
 $rowChkC =mysqli_fetch_array($resultChkC);
 $mycontri = $rowChkC['Contri'];
 $contriAMT = $rowChkC['Amt'];

 $sqlChkCAll ="Select count(`ID`) as ContriAll from `contributions` Where YEAR(`Date`)='".date('Y')."'";
 $resultChkCAll =mysqli_query($conn, $sqlChkCAll);
 $rowChkCAll =mysqli_fetch_array($resultChkCAll);
 $contriAll = $rowChkCAll['ContriAll'];
 $contri = $mycontri ."/" . $contriAll;
}
?>  
<div class="panel panel-body" style="background-color:#e8f4f8">
  <header class="panel-heading">
  	<h5 class="panel-title">Confirm Member Activeness</h5>
	</header>
  <div>
    <form method="POST" action="welfare.php">
      <div class="row" style="margin-top:10px">
        <div align="center" class="col-lg-12">
          <input text="text" id="enrooChk" class="fom-control" placeholder="Enter Member Name or Code" name="chkMember" style="width:180px">
          <button class="btn btn-primary btn-md">Check</button>
        </div>
      </div>
      <?php
      if($chkFound=="!1!")
      {
      ?>
      <div class="row" style="margin-top:10px">
        <div align="center" class="col-lg-12">
          <table border=1 width="100%" bordercolor="#fff" style="color:grey">
            <tr>
              <th>Total Contributions</th>
              <th>Frequency of Contribution</th>
              <th>Frequency of Attendance</th>
            </tr>
            <tr>
              <td><?php echo number_format($contriAMT,2); ?></td>
              <td><?php echo $contri; ?></td>
              <td><?php echo $attend; ?></td>
            </tr>
          </table>
        </div>
      </div>
      <?php
      }
      ?>
    </form>
  </div>
</div>
<?php
}
?>
<form action="submitwelf.php" method="post">
<div align="center">
<div align="leftt" style="margin-left:20px;font-size: 12px" class="agileinfo_mail_grids">
<span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Member's Name:</span>
	</label>
	<input type="text" autocomplete="on" name="recipient" id="enroo" class="input__field input__field--chisato" placeholder=" " value="<?php if($row['Recipient']) {echo $row['Recipient'];} else {echo $namC;} ?>">
</span>
<span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Date:</span>
	</label>
	<input type="text" id="inputField" name="date" size="31" class="input__field input__field--chisato" placeholder=" " value="<?php if($row['Date']) {echo $row['Date'];} else {echo date('Y-m-d'); } ?>" required>
    	<input type="hidden" name="ID" size="31" value="<?php echo $row['ID']; ?>">
	<input  type="hidden" name="type" width="31" value="Welfare">  
</span>
<span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Welfare Type:</span>
	</label>
	<select name="classification" width="31" class="input__field input__field--chisato" placeholder=" " value="<?php echo $row['Classification']; ?>" onChange="getCity('findcity.php?classification='+this.value)" required>
          <?php  
           echo '<option selected>' . $row['Classification'] . '</option>';
           $sql = "SELECT * FROM `welfare type` WHERE `Company` ='" .$_SESSION['company']. "'";
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
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Description:</span>
	</label>
	<input type="text" name="particulars" class="input__field input__field--chisato" placeholder=" " value="<?php echo $row['Particulars']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Pegged Amount for Welfare Type:</span>
	</label>
	<div id="citydiv"><input type="text" class="form-control" readonly="readonly" name="pamount" class="input__field input__field--chisato" placeholder=" " value="<?php echo $row['Default Amount']; ?>" onkeypress="return isNumber(event)" ></div>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Required Amount:</span>
	</label>
	<input type="text" name="amount" class="input__field input__field--chisato" placeholder=" " value="<?php echo $row['Amount']; ?>" onkeypress="return isNumber(event)" required>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Raised Amount:</span>
   	</label>
	  <input type="text" name="amountr" class="input__field input__field--chisato" placeholder=" " value="<?php echo $row['Amount Raised']; ?>" onkeypress="return isNumber(event)">
    </span>

      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Recipient's Account #:</span>
	</label>
	<input type="text" name="account" class="input__field input__field--chisato" placeholder=" " value="<?php echo $row['Account']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Recipient's Bank:</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" " name="bank" width="31" value="<?php echo $row['Bank']; ?>">
          <?php  
           echo '<option selected>' . $row['Bank'] . '</option>';
           $sql = "SELECT * FROM `bank` WHERE `Company` ='" .$_SESSION['company']. "'";
           $result_bank = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_bank)) 
           {
             echo '<option>' . @$rows['Bank'] . '</option>';
           }
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Payment Status:</span>
	</label>
	<select class="input__field input__field--chisato" placeholder=" " name="paid" width="31" value="<?php if($row['Paid']){echo $row['Paid'];} else {echo "Unpaid";} ?>">  
          <?php  
           echo '<option selected>'; 
            if($row['Paid']){echo $row['Paid'];} else {echo "Unpaid";};
            echo '</option>';
           echo '<option>Paid</option>';
           echo '<option>Unpaid</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Paid By:</span>
	</label>
	<select  name="source" class="input__field input__field--chisato" placeholder=" " value="<?php echo $row['Source']; ?>">
          <?php  
           echo '<option selected>' . $row['Source'] . '</option>';
           echo '<option>Cash</option>';
           echo '<option>Bank</option>';
           echo '<option>Bills</option>';
          ?> 
         </select>
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
<div><hr>
<?php 
 echo "<a class='btn btn-primary' href='welfares.php'><i class='fa fa-arrow-left'></i> Click here</a> to return to list.";
?>
</div>

<br>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell" style='width:100%;height:70px'><h4>MEMBERS CONTRIBUTIONS</h4></div>
  </div>
<?php
if($_REQUEST['mx']==1)
{
  $mid=$_REQUEST['vid'];
  $mtid=$_REQUEST['tid'];

   $queryQ = "SELECT `ID`,`TID`,`Share Value`,`Share Percent`,`Requested Amount`,`Amount Paid`,`Participate`,`Paid` FROM `welf` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID`='$mid' AND `TID`='$mtid'";
   $resultQ=mysqli_query($conn,$queryQ);
   $rowQ = mysqli_fetch_array($resultQ); 

   $queryQq = "SELECT `ID`,`Amount`,`Amount Raised` FROM `welfare` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID`=".$ID;
   $resultQq=mysqli_query($conn,$queryQq);
   $rowQq = mysqli_fetch_array($resultQq);

?>
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
      <form action="addwelf.php" method="POST">
        
          <?php
          if(isset($rowQ['ID']))
          {?>
            <span>Requested Amount: <input type="text" style="width:100px;background-color:#E0E0E0" readonly="readonly" value="<?php if ($rowQ['Requested Amount']) { echo number_format($rowQ['Requested Amount']); } else { echo number_format($rowQq['Amount']); }?>"></span>
          <?php } else { ?>
            <span>Member Info: <input type="text" style="width:100px;" autocomplete="on" name="member" id="enroox" placeholder=" " value="<?php echo $row['member']; ?>"></span>
          <?php 
          }
          ?>
                       <input type="hidden" name="mmtid" value="<?php echo $mtid;?>">
                       <input type="hidden" name="vmid" value="<?php echo $_REQUEST['vmid'];?>">
                       <input type="hidden" name="mmXtid" value="<?php echo $row['ID'];?>">
                       <input type="hidden" name="midd" value="<?php echo $mid;?>">
                       <input type="hidden" name="ID" value="<?php if($mtid) {echo $mtid;}else {echo $ID;} ?>">
                       <input type="hidden" name="shp" value="<?php echo $rowQ['Share Percent'];?>">
                       <input type="hidden" name="jnx" value="X1x">
      
        <span>
          Amount Paid: <input type="text" style="width:100px;" name="amtpaid" value="<?php echo $rowQ['Amount Paid'];?>" onkeypress="return isNumber(event)">
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
          Paid Yet?: 
	<select  class="input__field input__field--chisato" placeholder=" " name="paid" style="width:80px" value="<?php echo $rowQ['Paid']; ?>">  
          <?php  
           echo '<option selected>' . $rowQ['Paid'] . '</option>';
           echo '<option>Yes</option>';
           echo '<option>No</option>';
          ?> 
         </select>
        </span>
        <span>
          <?php
          if(isset($rowQ['ID']))
          {?>
            <button class="btn btn-success" title="Update" width="40px" name="submit" value="Update" name="submit"><i class="fa fa-check"></i></button>
            <button class="btn btn-warning" title="Cancel" width="40px" name="submit" value="Cancel" name="submit"><i class="fa fa-times"></i></button>
            <span style="font-size:9px"><i>{To Delete This, Select No in Participation and click the Update Button}</i></span>
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
<div  class="cell" style="width:100%"><a href="welfare.php?&mx=1&ID=' .$ID. '"><i class="fa fa-pencil"></i> Add Welfare Contribution</a></div>
</div>
';
}
?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell" style='width:5.11%;height:65px'>S/No</div>
    <div  class="cell" style='width:11.11%;height:65px'>Membership No</div>
    <div  class="cell" style='width:17.11%;height:65px'>Contributor Name</div>
    <div  class="cell" style='width:11.11%;height:65px'>Unit Shares</div>
    <div  class="cell" style='width:11.11%;height:65px'>Participating?</div>
    <div  class="cell" style='width:11.11%;height:65px'>Amount Requested</div>
    <div  class="cell" style='width:11.11%;height:65px'>Amount Paid</div>
    <div  class="cell" style='width:11.11%;height:65px'>Paid Yet?</div>
    <div  class="cell" style='width:11.11%;height:65px'>&nbsp;</div>
  </div>
<?php
   $queryp = "SELECT `ID`,`TID`,`MID`,`Share Holding`,`Share Value`,`Share Percent`,`Requested Amount`,`Amount Paid`,`Paid`,`Participate` FROM `welf` WHERE `Company` ='" .$_SESSION['company']. "' AND `TID`='" . $row['ID']. "' order by `ID` desc";
   $resultp=mysqli_query($conn,$queryp);

$i=0;
$TOTvalu=0;
$TOTshares=0;
    while(list($vid,$vtid,$vmid,$vshare,$vvalue,$vpercent,$vamount,$vpamount,$vpaid,$vpart)=mysqli_fetch_row($resultp))
    { 
      $sqlV="SELECT `Membership Number`,`First Name`,`Surname` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID`='$vmid'";
      $resultV = mysqli_query($conn,$sqlV) or die('Could not look up user data; ' . mysqli_error());
      $rowV = mysqli_fetch_array($resultV);
      $name=$rowV['First Name'] . ' ' . $rowV['Surname'];
      $memid =$rowV['Membership Number'];
     $valuu=number_format($vvalue,2);
     $amount=number_format($vamount,2);
     $pamount=number_format($vpamount,2);
     $share=number_format($vshare);

     $i=$i+1;

     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:5.11%">' .$i. '</div>
        <div  class="cell" style="width:11.11%">' .$memid. '</div>
        <div  class="cell" style="width:17.11%">' .$name. '</div>
        <div  class="cell" style="width:11.11%">' .$share. '</div>
        <div  class="cell" style="width:11.11%">' .$vpart.  '</div>
        <div  class="cell" style="width:11.11%">' .$amount.  '</div>
        <div  class="cell" style="width:11.11%">' .$pamount. '</div>
        <div  class="cell" style="width:11.11%">' .$vpaid.  '</div>

        <div  class="cell" style="width:11.11%"><a href="welfare.php?vid=' .$vid. '&ID=' .$vtid. '&tid=' .$vtid. '&vmid=' .$vmid. '&mx=1"><i class="fa fa-edit"></i> Manage</a></div>
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