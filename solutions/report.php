<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5) & ($_SESSION['access_lvl'] != 3) & ($_SESSION['access_lvl'] != 1) & ($_SESSION['access_lvl'] != 4) & ($_SESSION['access_lvl'] != 6))
{
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");
}
 require_once 'conn.php';
 require_once 'header.php'; 
 require_once 'style.php';
 @$cmbReport = $_POST["cmbReport"];
###Product Account Reconciliation
?>
<style type="text/css">
.div-table {
    float: left;
    width: 100%;
   	padding:10px;
}

.tab-row {
	background-color: #EEEEEE;
	float: left;
	width: 100%;
	height:3.8em;
                 font-size:16px;
}

.cell {
    padding: 5px;
    border: 1px solid #e9e9e9;
   // text-align:center;
    float: left;
//    padding: 5px; 
    background-color: #f5f5f5;
    width: 10%;
    height:3.7em;
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
//    font-size:9px;
    word-wrap: break-word;
}
}
</style>

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
			target:"inputFieldA",
			dateFormat:"%Y-%m-%d"

		});
		new JsDatePick({
			useMode:2,
			target:"inputFieldB",
			dateFormat:"%Y-%m-%d"

		});
	};
</script>

<title>Reports | Cooperatives Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Reports</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="report.php">
										<i class="fa fa-file"></i>
									</a>
								</li>
								<li><span>Reports</span></li>
							</ol>
					
							&nbsp;
						</div>
					</header>

<div class="services">
	<div class="containerx" align="center">
<p style="height:15px"></p>

<form  action="report.php" method="GET">
 <body>
 <tr><td width="12%">
  <select size="1" name="cmbReport" style="height:40px;font-size:12px">
   <option selected>- Select Report -</option>
   <option>Analysis Report</option>
   <option hidden>Contributions</option>
   <option>Customer Report</option>
   <option>Daily Balancing Summary</option>   
   <option>Daily Mobilization Report</option>   
   <option>Deposit/Withdrawal Analysis</option>
   <option>Expenditure Report</option>
   <option>Fixed Deposit Report</option>
   <option>Income Report</option>
   <option>Product Account Reconciliation</option>
   <option>Statement of Account</option>
   <option>Transactions Report</option>

   <option disabled>------------------------------------------------------------</option>
   <option>Expired Loans</option>
   <option>Loans Report</option>
   <option>Loans Aging Analysis</option>
   <option>Loan Maturing Report</option>
   <option>Loan Provisions Report</option>
   <option>Loan Statement</option>
   <option>Portfolio At Risk</option>

   <option disabled>------------------------------------------------------------</option>
   <option>Balance Sheet</option>
   <option>Classifications Reports</option>
   <option>Statement of Comprehensive Income</option>
   <option>Statement of Financial Position</option>
   <option>Statement of Cash Flows</option>
   <option>Statement of Changes in Equity</option>
   <option>Property, Plant and Equipment</option>
   <option>Trial Balance</option>
   <option hidden>Statement of Income & Expenditure</option>
  </select>
 </td>
<td> 
     <input type="submit" value="Click to Open" name="submit" style="height:30px; width: 100px">
     </td></tr>
     <br>
 </body>
</form>
 
 <p  style="height:15px"></p>
<div class="div-table">
<?php
 @$cmbReport = $_REQUEST["cmbReport"];
 @$cmbTable=$_REQUEST['cmbTable']; 
 @$filter=$_REQUEST['filter']; 
 @$filter2=$_REQUEST['filter2']; 

  if ($filter=="")
  {
   $filter=date('m');
  }
  else if (empty($filter))
  {
   $filter=date('m');
  }

if (trim($cmbReport) == "- Select Report-")
{
  echo "<b>Please Select a Report and a Criteria from the drop-down box and click 'Open'.<b>";        
}
else if (trim($cmbReport)=="Classifications Reports")
{
 require_once 'classifications.php';
?>
<br>
<?php
 }
else if (trim($cmbReport)=="Risky Portfolio")
{
 require_once 'riskyportfolio.php';
?>
<br>
<?php
 }
else if (trim($cmbReport)=="Portfolio At Risk")
{
 require_once 'riskportfolio.php';
?>
<br>
<?php
 }
 else if (trim($cmbReport)=="Loan Maturing Report")
 {
  require_once 'loanmaturing.php';
 ?>
 <br>
 <?php
  }
  else if (trim($cmbReport)=="Fixed Deposit Report")
  {
   require_once 'fdrpt.php';
  ?>
  <br>
  <?php
   }
else if (trim($cmbReport)=="Trial Balance")
{
 require_once 'tbal.php';

?>
<br>
<?php
 }
else if (trim($cmbReport)=="Statement of Cash Flows")
{
 require_once 'scf.php';

?>
<br>
<?php
 }
else if (trim($cmbReport)=="Statement of Changes in Equity")
{
 require_once 'soce.php';

?>
<br>
<?php
 }
else if (trim($cmbReport)=="Statement of Financial Position")
{
 require_once 'sofip.php';

?>
<br>
<?php
 }
else if (trim($cmbReport)=="Statement of Comprehensive Income")
{
 require_once 'soci.php';

?>
<br>
<?php
 }
else if (trim($cmbReport)=="Income Report")
{
 require_once 'incomerpt.php';

?>
<br>
<?php
 }
else if (trim($cmbReport)=="Expenditure Report")
{
 require_once 'expenserpt.php';

?>
<br>
<?php
 }
else if (trim($cmbReport)=="Loans Report")
{
 require_once 'loanrpt.php';

?>
<br>
<?php
 }
else if (trim($cmbReport)=="Customer Report")
{
 require_once 'custrpt.php';
?>
<br>
<?php
 }
else if (trim($cmbReport)=="Loans Aging Analysis")
{
 require_once 'loanaging.php';

?>
<br>
<?php
 }
else if (trim($cmbReport)=="Product Account Reconciliation")
{
 require_once 'testing.php';
?>
<br>
<?php
 }
else if (trim($cmbReport)=="Product Account Reconciliation Detail")
{
 require_once 'proddetail.php';
?>
<br>
<?php
 }
else if (trim($cmbReport)=="Expired Loans")
{
 require_once 'expiredloans.php';

?>
<br>
<?php
 }
else if (trim($cmbReport)=="Loan Statement")
{
 require_once 'loanstm.php';
?>
<br>
<?php
 }
else if (trim($cmbReport)=="Contributions")
{
 require_once 'contrirpt.php';

?>
<br>
<?php
 }
else if (trim($cmbReport)=="Transactions Report")
{
 require_once 'transrpt.php';

?>
<br>
<?php
 }
else if (trim($cmbReport)=="Daily Balancing Summary")
{
 require_once 'dbsrpt.php';

?>
<br>
<?php
 }
else if (trim($cmbReport)=="Daily Mobilization Report")
{
 require_once 'dailymobi.php';
?>
<br>
<?php
 }

else if (trim($cmbReport)=="Statement of Account")
{
 require_once 'acctstm.php';

?>
<br>
<?php
 }
else if (trim($cmbReport)=="Trail Balance")
{
 require_once 'trialbal.php';

?>
<br>
<?php
 }
else if (trim($cmbReport)=="Bank Reconciliation Statement")
{
 require_once 'bankrecon.php';

?>
<br>
<?php
 }
else if (trim($cmbReport)=="Loan Provisions Report")
{
 require_once 'proloan.php';
?>
<br>
<?php
 }
else if (trim($cmbReport)=="Property, Plant and Equipment")
{
 require_once 'ppe.php';
?>
<br>
<?php
 }
else if (trim($cmbReport)=="Balance Sheet")
{
 $cmbReport = @$_REQUEST["cmbReport"];
 $cmbTable=@$_REQUEST['cmbTable']; 
 $filter=@$_REQUEST['filter']; 
 $filter2=@$_REQUEST['filter2']; 
 require_once 'balsht.php';

?>
<br>
<?php
 }
 else if ($cmbReport == "Analysis Report")
 {
?>
<br>
<div>
<form  action="report.php" method="POST">
 <body>
  Enter Date (Starting): 
   <input type="text" name="filter" id="inputFieldA" style="width:120px;height:30px">
   <input type="hidden" name="cmbReport" size="12" value="Analysis Report">
&nbsp;
  Enter Date (Ending): 
   <input type="text" name="filter2" id="inputFieldB" style="width:120px;height:30px">
&nbsp;
     <input type="submit" value="Generate" name="submit">
     <br>
 </body>
</form>
</div>
<?php
 @$filter = $_REQUEST["filter"];
 @$filter2 = $_REQUEST["filter2"];

   $limit      = 25; 
   @$page=$_GET['page'];
   $query_count    = "SELECT * FROM `analysis` WHERE `Company` ='" .$_SESSION['company']. "'";
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);
   if(empty($page))
   {
     $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  
#############
   $query_delete ="delete from `analysis` WHERE `Company` ='" .$_SESSION['company']. "'";
   $result_delete = mysqli_query($conn,$query_delete) or die(mysqli_error());
##
   $query_insert_i ="insert into `analysis` (`iclass`,`idetails`, `idate`, `iamount`,`eclass`,`edetails`, `edate`, `eamount`, `Company`) 
                     select `Source`,`Note`, `Date`,`Amount`,'-','-','-','-' from `sundry` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Type`='Income'";
   $result_insert_i = mysqli_query($conn,$query_insert_i) or die(mysqli_error());

   $query_insert_e ="insert into `analysis` (`iclass`,`idetails`, `idate`, `iamount`,`eclass`,`edetails`, `edate`, `eamount`, `Company`) 
                     select '-','-','-','-',`Source`,`Note`, `Date`,`Amount` from `sundry` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Type`='Expenditure'";
   $result_insert_e = mysqli_query($conn,$query_insert_e) or die(mysqli_error());
###############
   echo " <div><font face='Verdana' color='#000000' style='font-size: 11pt'><b> [Analysis Report]</b></font></div>";
 ?>
  <div class="tab-row" style="font-weight:bold; font-size:16px">
    <div  class="cell" style='width:50%; background-color:#c0c0c0'><b> INCOME </b></div>
    <div  class="cell" style='width:50%; background-color:#c0c0c0'><b> EXPENDITURE</b></div>
  </div>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:12.5%; background-color:#cbd9d9'>Category</div>
    <div  class="cell" style='width:12.5%; background-color:#cbd9d9'>Details</div>
    <div  class="cell" style='width:12.5%; background-color:#cbd9d9'>Date</div>
    <div  class="cell" style='width:12.5%; background-color:#cbd9d9'>Amount</div>
    <div  class="cell"  style='width:12.5%; background-color:#cbd9d9'>Category</div>
    <div  class="cell" style='width:12.5%; background-color:#cbd9d9'>Details</div>
    <div  class="cell" style='width:12.5%; background-color:#cbd9d9'>Date</div>
    <div  class="cell" style='width:12.5%; background-color:#cbd9d9'>Amount</div>
  </div>
<?php
   $result = mysqli_query ($conn,"SELECT `iclass`,`idetails`, `idate`, `iamount`,`eclass`,`edetails`, `edate`, `eamount` FROM `analysis` LIMIT $limitvalue, $limit"); 
  # $result2= mysql_query ("SELECT cash.`Classification` , cash.`Particulars` , cash.`Date` , cash.`Amount` FROM `cash` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Type`='Expenditure' LIMIT $limitvalue, $limit"); 

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<br>Nothing to Display!<br>"); 
   } 

    while(list($iclass,$idetails,$idate,$iamount,$eclass,$edetails,$edate,$eamount)=mysqli_fetch_row($result)) 
    {
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:12.5%">' .$iclass . '</div>
        <div  class="cell" style="width:12.5%">' .$idetails. '</div>
        <div  class="cell" style="width:12.5%">' .$idate. '</div>
        <div  class="cell" style="width:12.5%">' .$iamount. '</div>
        <div  class="cell" style="width:12.5%">' .$eclass . '</div>
        <div  class="cell" style="width:12.5%">' .$edetails. '</div>
        <div  class="cell" style="width:12.5%">' .$edate. '</div>
        <div  class="cell" style="width:12.5%">' .$eamount. '</div>
      </div>';
    }

   $res = mysqli_query ($conn,"SELECT sum(`iamount`) as iamt,sum(`eamount`) as eamt From `analysis` WHERE `Company` ='" .$_SESSION['company']. "'"); 
   $rowsum = mysqli_fetch_array($res);
   $iamt=$rowsum['iamt'];
   $iamt=number_format($iamt,2);
   $eamt=$rowsum['eamt'];
   $eamt=number_format($eamt,2);

     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:37.5%">TOTAL</div>
        <div  class="cell" style="width:12.5%">' .$iamt. '</div>
        <div  class="cell" style="width:37.5%"></div>
        <div  class="cell" style="width:12.5%">' .$eamt. '</div>
      </div>';
    $val='Analysis Report';
 echo "<div>";
    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbReport=$val&page=$pageprev\">PREV PAGE</a>  ");
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
            echo("<a href=\"$PHP_SELF?cmbReport=$val&page=$i\">$i</a>  ");  
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
            echo("<a href=\"$PHP_SELF?cmbReport=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbReport=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysqli_free_result($result);
?>
</div></div>
<br>
<div align="center">
<?php
$year="";
 echo "<a target='blank' href='rptreport.php?cmbReport=$cmbReport&cmbTable=$cmbTable&filter=$filter&filter2=$filter2&year=@$year'> Print this Report</a> &nbsp;";
 echo "| <a target='blank' href='expanalysis.php?cmbReport=$cmbReport&cmbTable=$cmbTable&filter=$filter&filter2=$filter2&year=@$year'> Export this Report</a> &nbsp; ";
?>
</div>
<?php
 }
 else if ($cmbReport == "Deposit/Withdrawal Analysis")
 {
?>
<div>
<form  action="report.php" method="POST">
 <body>
  Enter Date (Starting): 
  <input type="text" name="filter" id="inputFieldA" style="width:120px;height:30px">
   <input type="hidden" name="cmbReport" size="12" value="Deposit/Withdrawal Analysis">
&nbsp;
  Enter Date (Ending): 
   <input type="text" name="filter2" id="inputFieldB" style="width:120px;height:30px">
&nbsp;
     <input type="submit" value="Generate" name="submit" style="width:120px;height:30px">
     <br>
 </body>
</form>
</div>
<?php
 @$filter = $_REQUEST["filter"];
 @$filter2 = $_REQUEST["filter2"];

   echo "<div><font face='Verdana' color='#000000' style='font-size: 11pt'><b> [Deposit/Withdrawal Analysis Report]</b></font></div>";
 ?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:20%; background-color:#cbd9d9'><b> Account Number </b></div>
    <div  class="cell" style='width:20%; background-color:#cbd9d9'><b> Agent/Transactor </b></div>
    <div  class="cell" style='width:20%; background-color:#cbd9d9'><b> Date </b></div>
    <div  class="cell" style='width:20%; background-color:#cbd9d9'><b> Deposit Amount </b></div>
    <div  class="cell"  style='width:20%; background-color:#cbd9d9'><b> Withdrawal Amount </b></div>
  </div>
<?php 
if (empty($filter) or $filter =="" or empty($filter2) or $filter2 =="")
{
   $result = mysqli_query ($conn,"SELECT `Account Number`,`Transactor`, `Date`, `Deposit`, `Withdrawal` FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' order by `Date`"); 
   $result2 = mysqli_query ($conn,"SELECT `Account Number`,`Transactor`, `Date`, `Withdrawal` FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Transaction Type`='Withdrawal' order by `Date`"); 
} else {
   $result = mysqli_query ($conn,"SELECT `Account Number`,`Transactor`, `Date`, `Deposit`, `Withdrawal` FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  (`Date` between '" . $filter . "' and '" . $filter2 . "') order by `Date`"); 
   $result2 = mysqli_query ($conn,"SELECT `Account Number`,`Transactor`, `Date`, `Withdrawal` FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Transaction Type`='Withdrawal' and (`Date` between '" . $filter . "' and '" . $filter2 . "') order by `Date`"); 
}

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<br>No Deposit to Display!<br>"); 
   } 
   if(mysqli_num_rows($result2) == 0)
   { 
        echo("<br>No Withdrawal to Display!<br>"); 
   } 

    $iamt=0;
    $eamt=0;
    while(list($iclass,$idetails,$idate,$iamount,$eamount)=mysqli_fetch_row($result)) 
    {
    $eamt=$eamt+$eamount;		
    $iamt=$iamt+$iamount;

if($idetails=="Self" or $idetails=="self")
{
$sqlH="SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Membership Number`='$iclass'";
$resultH = mysqli_query($conn,$sqlH) or die('Could not look up user data; ' . mysqli_error());
$rowH = mysqli_fetch_array($resultH);
@$sHname=$rowH['Surname'];
@$fHname=$rowH['First Name'];
$acctholder=$fHname . " " . $sHname;
  $idetails=$acctholder;
}

     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:20%">' .$iclass . '</div>
        <div  class="cell" style="width:20%">' .$idetails. '</div>
        <div  class="cell" style="width:20%">' .$idate. '</div>
        <div  class="cell" style="width:20%">' .$iamount. '</div>
        <div  class="cell" style="width:20%">' .$eamount. '</div>
      </div>';
    }

   $iamt=number_format($iamt,2);
   $eamt=number_format($eamt,2);
     echo '	
        <div class="tab-row" style="font-size:14px"> 
        <div  class="cell" style="width:60%"><b>TOTAL</b></div>
        <div  class="cell" style="width:20%"><b>' .$iamt. '</b></div>
        <div  class="cell" style="width:20%"><b>' .$eamt. '</b></div>
      </div>';
    $val='Deposit/Withdrawal Analysis';
  
    mysqli_free_result($result);
?>
</div>
<br>

<div>
<?php
$year="";
 echo "<a target='blank' href='rptreport.php?cmbReport=$cmbReport&cmbTable=$cmbTable&filter=$filter&filter2=$filter2&year=@$year'> Print this Report</a> &nbsp;";
 echo "<a target='blank' href='expdepwit.php?cmbReport=$cmbReport&cmbTable=$cmbTable&filter=$filter&filter2=$filter2&year=@$year'> Export this Report</a> &nbsp;";
?>
</div>
<?php
 }
require_once 'footer.php';
?>