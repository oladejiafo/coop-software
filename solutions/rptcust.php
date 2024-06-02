<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 2) & ($_SESSION['access_lvl'] != 4) & ($_SESSION['access_lvl'] != 3) & ($_SESSION['access_lvl'] != 6))
{
 if ($_SESSION['access_lvl'] != 5){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");
}
}

 require_once 'conn.php';
list($cp, $fld) = explode(' ', $_SESSION['company']);
$cpfolder=$cp . $fld;

$sqr="SELECT * FROM `company info` WHERE `Company Name` ='" .$_SESSION['company']. "'";
$reslt = mysqli_query($conn,$sqr) or die('Could not look up user data; ' . mysqli_error());
$rw = mysqli_fetch_array($reslt);
$coy=$rw['Company Name'];
$addy=$rw['Address'];
$phn=$rw['Phone'];

 @$idd=$_REQUEST["idd"];
 @$acctno=$_REQUEST["acctno"];
 @$trans=$_REQUEST["trans"];
 @$filter=$_REQUEST["filter"];
 @$filter2=$_REQUEST["filter2"];
 @$cmbFilt=$_REQUEST["cmbFilt"];
 @$filt=$_REQUEST["filt"];
 @$cmbFilter=$_REQUEST["cmbFilter"];
$cmbReport="Loans Report";
?>
<style type="text/css">
.div-table {
    width: 100%;
//    border: 1px solid;
    float: left;
    padding:20px;
}

.tab-row {
	background-color: #EEEEEE;
	float: left;
	width: 100%;
        font-size:16px;
}

.cell {
    padding: 5px;
    border: 1px solid #e9e9e9;
    float: left;
    padding: 5px; 
    background-color: #f5f5f5;
   // width: 10%;
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

<div align="center" width:100%>
<img src='images/<?php echo $cpfolder;?>/logo.jpg' width='190' height='140'><br>
<font style='font-size: 13pt'><b><?php echo $addy; ?></b></font><br>
<font style='font-size: 13pt'><b><?php echo $phn; ?></b></font>
</div>
<div class="div-table">
<div align="center" width="100%"><h3><left>CUSTOMERS REPORT</left></h3></div>

 <?php
 if ($cmbFilt=="" or $cmbFilt=="All Active Customers" or empty($cmbFilt))
  {  
     if ($cmbFilter=="" or $cmbFilter=="All" or empty($cmbFilter))
    { 
       #$cmbFilter="All Customers Today";
       $query = "SELECT `ID`,`Membership Number`, `Surname`,`First Name`,`Contact Number`, `Home Address`, `Date Registered`, `Membership Type`, `Contribution Charge`,`Next of Kin`,`NK Phone`,`NKin Contact`,`Account Officer`,`Branch` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active' order by `ID` desc";
       $query_count = "SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active'";
    }
    else if ($cmbFilter=="Date")
    {
      $query = "SELECT `ID`,`Membership Number`, `Surname`,`First Name`,`Contact Number`, `Home Address`, `Date Registered`, `Membership Type`, `Contribution Charge`,`Next of Kin`,`NK Phone`,`NKin Contact`,`Account Officer`,`Branch` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active' and  `Date Registered` = '" . $filter . "' order by `ID` desc";
      $query_count = "SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active' and  `Date Registered` = '" . $filter . "'";
    }
    else if ($cmbFilter=="Date Range")
    {  
      $query = "SELECT `ID`,`Membership Number`, `Surname`,`First Name`,`Contact Number`, `Home Address`, `Date Registered`, `Membership Type`, `Contribution Charge`,`Next of Kin`,`NK Phone`,`NKin Contact`,`Account Officer`,`Branch` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active' and  `Date Registered` between '" . $filter . "' and '" . $filter2 . "' order by `ID` desc";
      $query_count = "SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active' and  `Date Registered` between '" . $filter . "' and '" . $filter2 . "'";
    }
  }

   $result=mysqli_query($conn,$query);
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

?>
  <div class="tab-row" style="font-weight:bold">
    <div class="cell"  style='height:45px;width:7%;background-color:#cbd9d9'>Name</div>
    <div class="cell"  style='height:45px;width:7%;background-color:#cbd9d9'>Account Number</div>
    <div class="cell"  style='height:45px;width:7%;background-color:#cbd9d9'>Phone #</div>
    <div class="cell"  style='height:45px;width:7%;background-color:#cbd9d9'>Address</div>
    <div class="cell"  style='height:45px;width:7%;background-color:#cbd9d9'>Opening Date</div>
    <div  class="cell" style='height:45px;width:7%;background-color:#cbd9d9'>Account Type</div>
    <div  class="cell" style='height:45px;width:7%;background-color:#cbd9d9'>Contribution Charge</div>
    <div  class="cell" style='height:45px;width:7%;background-color:#cbd9d9'>Next of Kin</div>
    <div  class="cell" style='height:45px;width:7%;background-color:#cbd9d9'>NextofKin Phone</div>
    <div  class="cell" style='height:45px;width:7%;background-color:#cbd9d9'>NextofKin Address</div>
    <div  class="cell" style='height:45px;width:7%;background-color:#cbd9d9'>Branch</div>
    <div  class="cell" style='height:45px;width:7%;background-color:#cbd9d9'>Agent</div>
  </div>
<?php 
   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 

   $samtt=0;
   $sptdt=0;
   $sbalt=0;
   while(list($id,$acctno,$sname,$fname,$phone,$addr,$date,$actype,$contri,$nk,$nkphone,$nkaddy,$agent,$branch)=mysqli_fetch_row($result)) 
   {
       $name= $fname . ' ' . $sname;

     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="height:30px;width:7%">' .$name. '</div>
        <div  class="cell" style="height:30px;width:7%">' .$acctno. '</div>
        <div  class="cell" style="height:30px;width:7%">' . $phone. '</div>
        <div  class="cell" style="height:30px;width:7%">' .$addr. '</div>
        <div  class="cell" style="height:30px;width:7%">' .$date. '</div>
        <div  class="cell" style="height:30px;width:7%">' .$actype. '</div>
        <div  class="cell" style="height:30px;width:7%" align="right">' .$contri. '</div>
        <div  class="cell" style="height:30px;width:7%">' .$nk. '</div>
        <div  class="cell" style="height:30px;width:7%">' .$nkphone. '</div>
        <div  class="cell" style="height:30px;width:7%">' .$nkaddy. '</div>
        <div  class="cell" style="height:30px;width:7%">' .$branch. '</div>
        <div  class="cell" style="height:30px;width:7%">' .$agent. '</div>
      </div>';
   } 
?>

</div>
</div>
</div>

