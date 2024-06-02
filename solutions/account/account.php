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

?>



<title>Accounts | Thrift & Loans Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>General Ledger</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="account.php">
										<i class="fa fa-list"></i>
									</a>
								</li>
								<li><span>Accounts</span></li>
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


<!-- load jquery ui css-->
<link href="../js/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<!-- load jquery library -->
<script src="../js/jquery-1.9.1.js"></script>
<!-- load jquery ui js file -->
<script src="../js/jquery-ui.min.js"></script>

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
<div align="center">

<?php
 $yrs=date('Y');
 $yrx=$yrs-5;
?>
<div>
   <form  action="account.php" method="post">
	<select name="cmbType" style="height:45px;width:120px; background-color:#E9FCFE; font-size: 11px"  onChange="getCity('findcityy.php?cat='+this.value)">  
          <?php  
           echo '<option disabled selected>Select Type</option>';
           echo '<option value="Revenue">Revenue</option>';
           echo '<option value="Expenditure">Expenditure</option>';
           echo '<option value="Asset">Asset</option>';
           echo '<option value="Liability">Liability</option>';
          ?> 
         </select>
     &nbsp; 
<span id="citydiv">
	<select name="cmbClass" style="height:45px;width:200px; background-color:#E9FCFE; font-size: 11px">  
          <?php  
           echo '<option disabled selected>Select Classification</option>';
           $sql = "SELECT distinct `Classification` FROM `cash` WHERE `Company` ='" .$_SESSION['company']. "'";
           $result_hd = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_hd)) 
           {
             echo '<option>' .$rows['Classification'] . '</option>';
           }
          ?> 
         </select>
</span>
     &nbsp; 
      <select placeholder=" " style="height:45px;width:120px; background-color:#E9FCFE; font-size: 11px" name="cmbYear">
       <option selected><?php echo date('Y'); ?></option>
<?php

 for($yr=$yrs; $yr>=$yrx; $yr--)
 {
    echo "<option>" .$yr. "</option>";
 }
?>
      </select>
     &nbsp; 
      <select placeholder=" " style="height:45px;width:120px; background-color:#E9FCFE; font-size: 11px" name="cmbMonth">
      <option selected><?php echo date('F'); ?></option>
      <option>January</option>
      <option>February</option>
      <option>March</option>
      <option>April</option>
      <option>May</option>
      <option>June</option>
      <option>July</option>
      <option>August</option>
      <option>September</option>
      <option>October</option>
      <option>November</option>
      <option>December</option>
      </select>
     &nbsp; 
     <input type="submit" value="Spool" name="submit" style="height:35;width:120px;">
     <br>
   </form>
</div>

<div class="div-table">
 <?php
 @$tval=$_GET['tval'];
 $limit      = 25;
 @$page=$_GET['page'];

 @$cmbFilter=$_REQUEST["cmbFilter"];
 @$filter=$_REQUEST["filter"];

 @$cmbType=$_REQUEST["cmbType"];
 @$cmbClass=$_REQUEST["cmbClass"];
 @$cmbYear=$_REQUEST["cmbYear"];
 @$cmbMonth=$_REQUEST["cmbMonth"];
if($cmbType=="" OR empty($cmbType))
{
  $cmbType="%";
}
if($cmbClass=="" OR empty($cmbClass))
{
  $cmbClass="%";
}
if($cmbYear=="" OR empty($cmbYear))
{
  $cmbYear=date('Y');
}
if($cmbMonth=="" OR empty($cmbMonth))
{
  $cmbMonth=date('F');
}
 echo "<div><font color='#FF0000' style='font-size: 9pt'>" . $tval . "</font></div>";
?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:14.2%;background-color:#c0c0c0'>Voucher NO</div>
    <div  class="cell" style='width:14.2%;background-color:#c0c0c0'>Date</div>
    <div  class="cell" style='width:14.2%;background-color:#c0c0c0'>Payee</div>
    <div  class="cell" style='width:14.2%;background-color:#c0c0c0'>Classification</div>
    <div  class="cell" style='width:14.2%;background-color:#c0c0c0'>Amount</div>
    <div  class="cell" style='width:14.2%;background-color:#c0c0c0'>Narration</div>
    <div  class="cell" style='width:14.2%;background-color:#c0c0c0'>Type</div>
  </div>
<?php

if($cmbMonth=='January') { $month='01';}
 else if($cmbMonth=='February') { $month='02';}
 else if($cmbMonth=='March') { $month='03';}
 else if($cmbMonth=='April') { $month='04';}
 else if($cmbMonth=='May') { $month='05';}
 else if($cmbMonth=='June') { $month='06';}
 else if($cmbMonth=='July') { $month='07';}
 else if($cmbMonth=='August') { $month='08';}
 else if($cmbMonth=='September') { $month='09';}
 else if($cmbMonth=='October') { $month='10';}
 else if($cmbMonth=='November') { $month='11';}
 else if($cmbMonth=='December') { $month='12';}
#$month=12;
  if ($cmbType !="" OR $cmbClass !="" OR $cmbYear !="")
  {  

   $query_count    = "SELECT * FROM `cash` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Type` like '" . $cmbType . "%' AND `Classification` like '" . $cmbClass . "%' AND year(`Date`) = " . $cmbYear . " AND month(`Date`) = " . $month;
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $query="SELECT `ID`,`Date`,Type,Classification,Amount,`Particulars`,`Recipient` FROM cash WHERE `Company` ='" .$_SESSION['company']. "' AND  `Type` like '" . $cmbType . "%' AND `Classification` like '" . $cmbClass . "%' AND year(`Date`) = " . $cmbYear . " AND month(`Date`) = '" . $month . "' order by `Date` desc,`Type`,`ID` LIMIT $limitvalue, $limit";
   $result=mysqli_query($conn,$query);

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 

$i=0;
    while(list($id,$date,$type,$classification,$amount,$particulars, $recipient)=mysqli_fetch_row($result))
    {
     $i=$i+1;
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:14.2%">' .$i. '</div>
        <div  class="cell" style="width:14.2%"><a href = "accounts.php?ID=' .$id. '">' .$date. '</a></div>
        <div  class="cell" style="width:14.2%">' .$recipient. '</div>
        <div  class="cell" style="width:14.2%">' .$classification. '</div>
        <div  class="cell" style="width:14.2%">' .$amount. '</div>
        <div  class="cell" style="width:14.2%">' .$particulars .  '</div>
        <div  class="cell" style="width:14.2%">' .$type .  '</div>
      </div>';
    }
echo "<div>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREV PAGE</a>  ");
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
            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
#            echo($i."  "); 
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
#        echo("NEXT PAGE");  
    } 
echo "</div>";
  }
  else
  {
   $query_count    = "SELECT * FROM `cash` WHERE `Company` ='" .$_SESSION['company']. "'";
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $query="SELECT `ID`,`Date`,Type,Classification,Amount,`Particulars`,`Recipient` FROM cash WHERE `Company` ='" .$_SESSION['company']. "' order by `Date` desc,`Type`,`ID` LIMIT $limitvalue, $limit";
   $result=mysqli_query($conn,$query);

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 

$i=0;
    while(list($id,$date,$type,$classification,$amount,$particulars,$recipient)=mysqli_fetch_row($result))
    {
     $i=$i+1;
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:14.2%">' .$i. '</div>
        <div  class="cell" style="width:14.2%"><a href = "accounts.php?ID=' .$id. '">' .$date. '</a></div>
        <div  class="cell" style="width:14.2%">' .$recipient. '</div>
        <div  class="cell" style="width:14.2%">' .$classification. '</div>
        <div  class="cell" style="width:14.2%">' .$amount. '</div>
        <div  class="cell" style="width:14.2%">' .$particulars .  '</div>
        <div  class="cell" style="width:14.2%">' .$type .  '</div>
      </div>';
    }
echo "<div>";

    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
#       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
#            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
  #          echo($i."  "); 
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
#        echo("NEXT PAGE");  
    } 
echo "</div>";
  }

 ?>
</div>

<div align="center">
  <?php
     echo "<a href ='accounts.php'> Add New Record </a>&nbsp;||
              <a target='_blank' href ='rptaccount.php?cmbFilter=$cmbFilter&filter=$filter'> Print This </a>"; 
  ?>
</div>
<?php
require_once '../footer.php';
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