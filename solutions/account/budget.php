<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 3))
{
 if ($_SESSION['access_lvl'] != 5){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=../indexx.php?redirect=$redirect");
}
}

 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';
@$tval=$_REQUEST['tval'];
@$xxx=mysqli_real_escape_string($conn,$_REQUEST['xxx']);
#if (!is_numeric($xxx)) {exit;}

/*
list($yearp, $monthp, $dayp) = explode('-', $datepaid);

 if($monthp=='01') { $monthp='Jan';}
 else if($monthp=='02') { $monthp='Feb';}
 else if($monthp=='03') { $monthp='Mar';}
 else if($monthp=='04') { $monthp='April';}
 else if($monthp=='05') { $monthp='May';}
 else if($monthp=='06') { $monthp='June';}
 else if($monthp=='07') { $monthp='July';}
 else if($monthp=='08') { $monthp='Aug';}
 else if($monthp=='09') { $monthp='Sept';}
 else if($monthp=='10') { $monthp='Oct';}
 else if($monthp=='11') { $monthp='Nov';}
 else if($monthp=='12') { $monthp='Dec';}
*/
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
<!-- 	
<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.css" />
   <link rel="shortcut icon" href="favicon.ico">
-->
<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>

<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"inputField",
			dateFormat:"%d-%m-%Y"

		});
		new JsDatePick({
			useMode:2,
			target:"inputField2",
			dateFormat:"%d-%m-%Y"

		});
		new JsDatePick({
			useMode:2,
			target:"inputField3",
			dateFormat:"%d-%m-%Y"

		});
		new JsDatePick({
			useMode:2,
			target:"inputField4",
			dateFormat:"%d-%m-%Y"

		});
	};
</script>

<script src="lib/jquery.js"></script>
<script src="dist/jquery.validate.js"></script>

<script>

$().ready(function() {
	// validate the comment form when it is submitted
	$("#commentForm").validate();

	// validate signup form on keyup and submit
	$("#signupForm").validate({
		rules: {
			firstname: "required",
			lastname: "required",
			username: {
				required: true,
				minlength: 2
			},
			password: {
				required: true,
				minlength: 5
			},
			confirm_password: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
			email: {
				required: true,
				email: true
			},
			topic: {
				required: "#newsletter:checked",
				minlength: 2
			},
			agree: "required"
		},
		messages: {
			firstname: "Please enter your firstname",
			lastname: "Please enter your lastname",
			username: {
				required: "Please enter a username",
				minlength: "Your username must consist of at least 2 characters"
			},
			password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			},
			confirm_password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long",
				equalTo: "Please enter the same password as above"
			},
			email: "Please enter a valid email address",
			agree: "Please accept our policy"
		}
	});

	// propose username by combining first- and lastname
	$("#username").focus(function() {
		var firstname = $("#firstname").val();
		var lastname = $("#lastname").val();
		if(firstname && lastname && !this.value) {
			this.value = firstname + "." + lastname;
		}
	});

	//code to hide topic selection, disable for demo
	var newsletter = $("#newsletter");
	// newsletter topics are optional, hide at first
	var inital = newsletter.is(":checked");
	var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
	var topicInputs = topics.find("input").attr("disabled", !inital);
	// show when newsletter is checked
	newsletter.click(function() {
		topics[this.checked ? "removeClass" : "addClass"]("gray");
		topicInputs.attr("disabled", !this.checked);
	});
});

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

function isReg(evtt) 
{
    evtt = (evtt) ? evtt : window.event;
    var charCodee = (evtt.which) ? evtt.which : evtt.keyCode;
    console.log(charCodee)
    if (charCodee < 32 || charCodee == 47 || (charCodee > 47 && charCodee < 58) || (charCodee > 64 && charCodee < 91) || (charCodee > 96 && charCodee < 123)) 
    {
        return true;
    } else {
        return false;
    }

}
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


<title>Budget | Thrift & Loans Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Budget</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="budget.php">
										<i class="fa fa-list"></i>
									</a>
								</li>
								<li><span>Budget</span></li>
							</ol>
					
							&nbsp;
						</div>
					</header>

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="../assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="../assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />


<section class="panel">
	<header class="panel-heading">
		<h2 class="panel-title"></h2>
	</header>
       <div class="panel-body">

<div align="center">

<fieldset style="padding: 2; height:auto;width:auto">
<legend><b><i><font size="2" face="Tahoma"> <?php require_once 'bheader.php'; ?>
</font></i></b></legend>


<div align="center"><b><font color="#FF0000" style="font-size: 9pt"><?php echo $tval ; ?></font></b></div>	

<?php
if ($xxx==1)
{
@$ID=$_REQUEST['ID'];
#if (!is_numeric($ID)) {exit;}

$sql="SELECT * FROM `budget` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID`='$ID'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);
?>

<form action="submitbudget.php" method="post">
<div align="leftt" style="margin-left:20px;" class="agileinfo_mail_grids">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Budget Type:</span>
	</label>
	<select  name="type" class="input__field input__field--chisato" placeholder=" " value="<?php echo $row['Type']; ?>" onChange="getCity('findcity.php?cat='+this.value)" required>  
          <?php  
           echo '<option selected>' . $row['Type'] . '</option>';
           echo '<option value="Revenue">Revenue</option>';
           echo '<option value="Expenditure">Expenditure</option>';
           echo '<option value="Asset">Asset</option>';
           echo '<option value="Liability">Liability</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Budget Year:</span>
	</label>
        <input type="text" name="month"  class="input__field input__field--chisato" value="<?php if ($row['Year']) { echo $row['Year']; }else{ echo date('Y');} ?>"  onkeypress="return isNumber(event)" required>
        <input type="hidden" name="ID" size="31" value="<?php echo $row['ID']; ?>">
      </span>
      <span class="input input--chisato">
<div id="citydiv">
	<label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Clasification:</span>
	</label>
	<select  name="classification"  class="input__field input__field--chisato" value="<?php echo $row['Classification']; ?>">  
          <?php  
           echo '<option selected>' . $row['Classification'] . '</option>';
           $sql = "SELECT * FROM `heads` WHERE `Company` ='" .$_SESSION['company']. "'";
           $result_hd = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_hd)) 
           {
             echo '<option value=' .$rows['Description']. '>' . $rows['Code']. ' - ' .$rows['Description'] . '</option>';
           }
          ?> 
         </select>
</div>
      	</span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="margin-left:10px" style="width:350px" class="input__label-content input__label-content--chisato">Budget Amount:</span>
	</label>
        <input type="text" name="budget" class="input__field input__field--chisato" value="<?php echo $row['Budget']; ?>"  onkeypress="return isNumber(event)" required>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span style="margin-left:10px" class="input__label-content input__label-content--chisato">Budget Description:</span>
	</label>
        <input type="text" name="descr" class="input__field input__field--chisato" value="<?php echo $row['Description']; ?>" style="height:50px">
      </span>
      <span class="input input--chisato">
<?php
if (!$ID){
?>
  <input type="submit" class="finish" value="Save" name="submit" style="width:140px"> &nbsp;
<?php } 
 else { ?>
  <input type="submit" value="Modify" name="submit" style="width:140px"> &nbsp; 
  <input type="submit" value="Delete" name="submit" onclick="return confirm('Are you sure you want to Delete?');" style="width:140px"> &nbsp; 
<?php
} ?>
  </span>
  </div>
</body>
</form>
<?php 
 echo "<div align='center'><a href='budget.php?xtt=budget'>Click here</a> to return to list.</div>";
} else {
?>
<fieldset style="padding: 2">
<div>
   <form  action="budget.php?xxx=0&xtt=budget" method="post">
      <select size="1" name="cmbTable"  style="height:40px;font-size:11px">
      <option disabled selected>- Select Type Here -</option>
          <?php 
         	$sqlt = "SELECT distinct `Type` FROM `budget` WHERE `Company` ='" .$_SESSION['company']. "' ORDER BY `Type`;";
        	$resultt = mysqli_query($conn,$sqlt) or die('Invalid query: ' . mysqli_error());
        	while ($rows = mysqli_fetch_array($resultt))
	        {
         	     echo "<option>" . $rows['Type'] . "</option>\n";
    	        } 
          ?> 
     </select>
     &nbsp; 
     <input type="text" name="filter" placeholder="Enter Year"  style="height:35px" onkeypress="return isNumber(event)">
     &nbsp; 
     <input type="submit" value="Filter" name="submit" style="height:34px;background-color:#cccccc; width: 100px">
   </form>
</div>

<div class="div-table">
 <?php
 @$tval=$_GET['tval'];
 @$limit      = 35;
 @$page=$_GET['page'];

 @$cmbTable=$_REQUEST["cmbTable"];
 @$cmbFilter=$_REQUEST["cmbFilter"];
 @$filter=$_REQUEST["filter"];

if($filter=="" or empty($filter))
{
  $cmbFilter="ID";
  $filter=date('Y');
}
if($cmbTable=="" or empty($cmbTable))
{
  $cmbTable="%";
}

 echo "<div><font color='#FF0000' style='font-size: 9pt'>" . $tval . "</font></div>";

?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell" style='width:16.66%;background-color:#c0c0c0'>Year</div>
    <div  class="cell" style='width:16.66%;background-color:#c0c0c0'>Type</div>
    <div  class="cell" style='width:16.66%;background-color:#c0c0c0'>Classification</div>
    <div  class="cell" style='width:16.66%;background-color:#c0c0c0'>Description</div>
    <div  class="cell" style='width:16.66%;background-color:#c0c0c0'>Amount</div>
    <div  class="cell" style='width:16.66%;background-color:#c0c0c0'>&nbsp;</div>
  </div>
<?php
$limit=50;
  if ($cmbFilter)
  {  
   $query_count    = "SELECT * FROM `budget` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Type` like '" . $cmbTable . "%' and `Year` like '" . $filter . "%'";
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $query="SELECT `ID`,`Year`,`Description`,`Classification`,`Type`, `Budget`,`MDA` FROM `budget` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Type` like '" . $cmbTable . "%' and `Year` = " . $filter . " order by `Year`,`Type` LIMIT $limitvalue, $limit";
   $result=mysqli_query($conn,$query);

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 

$i=0;
    while(list($id,$month,$descr,$class,$type,$budget,$mda)=mysqli_fetch_row($result))
    {
     $i=$i+1; $amt=number_format($budget,2);
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:16.66%">' .$month. '</div>
        <div  class="cell" style="width:16.66%"><a href ="budget.php?ID=' .$id. '&xxx=1&xtt=budget">' .$type. '</a></div>
        <div  class="cell" style="width:16.66%">' .$class. '</div>
        <div  class="cell" style="width:16.66%">' .$descr. '</div>
        <div  class="cell" style="width:16.66%">' .$amt. '</div>
        <div  class="cell" style="width:16.66%">&nbsp;</div>
      </div>';
    }
echo "<div align='right'>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"budget.php?cmbFilter=$cmbFilter&filter=$filter&xt=budget&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
#       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  

    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"budget.php?cmbFilter=$cmbFilter&filter=$filter&xt=budget&page=$i\">$i</a>  ");  
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
            echo("<a href=\"budget.php?cmbFilter=$cmbFilter&filter=$filter&xt=budget&page=$i\">$i</a>  "); 
       } 
    }

    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"budget.php?cmbFilter=$cmbFilter&filter=$filter&xt=budget&page=$pagenext\">NEXT PAGE</a>");  
            
    }          
    else
    { 
#        echo("NEXT PAGE");  
    } 
echo "</div>";
  }
  else
  {
   $query_count    = "SELECT * FROM `budget` WHERE `Company` ='" .$_SESSION['company']. "' AND   `Type` like '" . $cmbTable . "%' and `Year` = " . $filter;
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $query="SELECT `ID`,`Year`,`Description`,`Classification`,`Type`, `Budget`,`MDA` FROM `budget` WHERE `Company` ='" .$_SESSION['company']. "' AND   `Type` like '" . $cmbTable . "%' and `Year` = " . $filter . " order by `Year`,`Type` LIMIT $limitvalue, $limit";
   $result=mysqli_query($conn,$query);

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 

    while(list($id,$month,$descr,$class,$type,$budget,$mda)=mysqli_fetch_row($result))
    {
     $i=$i+1; $amt=number_format($budget,2);
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:16.66%">' .$month. '</div>
        <div  class="cell" style="width:16.66%"><a href ="budget.php?ID=' .$id. '&xxx=1&xtt=budget">' .$type. '</a></div>
        <div  class="cell" style="width:16.66%">' .$class. '</div>
        <div  class="cell" style="width:16.66%">' .$descr. '</div>
        <div  class="cell" style="width:16.66%">' .$amt. '</div>
        <div  class="cell" style="width:16.66%">&nbsp;</div>
      </div>';
    }
echo "<div>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"budget.php?cmbFilter=$cmbFilter&filter=$filter&xt=budget&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
#       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  

    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"budget.php?cmbFilter=$cmbFilter&filter=$filter&xt=budget&page=$i\">$i</a>  ");  
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
            echo("<a href=\"budget.php?cmbFilter=$cmbFilter&filter=$filter&xt=budget&page=$i\">$i</a>  "); 
       } 
    }

    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"budget.php?cmbFilter=$cmbFilter&filter=$filter&xt=budget&page=$pagenext\">NEXT PAGE</a>");  
            
    }          
    else
    { 
#        echo("NEXT PAGE");  
    } 
echo "</div>";
  }

 ?>
</div>
</fieldset>
<div align='center'>
  <?php
     echo "<a href ='budget.php?xt=budget&xxx=1'> Add New Budget </a>"; 
  ?>
</div>
<br>

</div>

<?php
}
?>

</div>


<?php
require_once 'footer.php';
?>

		<!-- Specific Page Vendor -->
		<script src="../assets/vendor/select2/select2.js"></script>
		<script src="../assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="../assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="../assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		

		<!-- Examples -->
		<script src="../assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.tabletools.js"></script>