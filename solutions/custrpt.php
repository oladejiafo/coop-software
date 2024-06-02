<?php
#session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 2)  & ($_SESSION['access_lvl'] != 6) & ($_SESSION['access_lvl'] != 4) & ($_SESSION['access_lvl'] != 3))
{
 if ($_SESSION['access_lvl'] != 5){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");
}
}

 require_once 'conn.php';
require_once 'tester.php';

$sqr="SELECT * FROM `company info` WHERE `Company Name` ='" .$_SESSION['company']. "'";
$reslt = mysqli_query($conn,$sqr) or die('Could not look up user data; ' . mysql_error());
$rw = mysqli_fetch_array($reslt);
$coy=$rw['Company Name'];
$addy=$rw['Address'];
$phn=$rw['Phone'];

 @$idd=$_REQUEST["idd"];
 @$acctno=$_REQUEST["acctno"];
 @$trans=$_REQUEST["trans"];
 @$filter=$_REQUEST["filter"];
 @$filter2=$_REQUEST["filter2"];

$cmbReport="Loans Report";
?>
<div align="center">

<div style="background-color:#C0C0C0"> 
     <h3><center><u>CUSTOMERS REPORT</u></center></h3>
</div>

<div align="left">
<form  action="report.php" method="POST">
 <body>
 <div align="center">
   <select name="cmbFilt" style="width:150px;height:30px">
  <?php  
   echo '<option selected>All Active Customers</option>';
   echo '<option>All Customers</option>';
   echo '<option>By Branch</option>';
   echo '<option>By Account Officer</option>';
  ?> 
 </select>
   <input type="hidden" name="cmbReport" size="12" value="Customer Report">
  <input type="text" name="filt" style="width:120px;height:30px">
&nbsp;
   <select name="cmbFilter" style="width:120px;height:30px">
  <?php  
   echo '<option selected>All</option>';
   echo '<option>Date</option>';
   echo '<option>Date Range</option>';
  ?> 
 </select>
&nbsp;
  <input type="text" name="filter" id="inputFieldA"  style="width:120px;height:30px">
&nbsp;
  <input type="text" name="filter2" id="inputFieldB" style="width:120px;height:30px">
&nbsp;
     <input type="submit" value="Generate" name="submit" style="width:120px;height:30px">
</form>
</div>

 <?php
 @$cmbFilt=$_REQUEST["cmbFilt"];
 @$filt=$_REQUEST["filt"];

 @$cmbFilter=$_REQUEST["cmbFilter"];
 @$filter=$_REQUEST["filter"];
 @$filter2=$_REQUEST["filter2"];

 if ($cmbFilt=="" or $cmbFilt=="All Active Customers" or empty($cmbFilt))
  {  
     if ($cmbFilter=="" or $cmbFilter=="All" or empty($cmbFilter))
    { 
       #$cmbFilter="All Customers Today";
       $query = "SELECT `ID`,`Membership Number`, `Surname`,`First Name`,`Contact Number`, `Home Address`, `Date Registered`, `Account Type`, `Contribution Charge`,`Next of Kin`,`NK Phone`,`NKin Contact`,`Account Officer`,`Branch` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active' order by `ID` desc";
       $query_count = "SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active'";
    }
    else if ($cmbFilter=="Date")
    {
      $query = "SELECT `ID`,`Membership Number`, `Surname`,`First Name`,`Contact Number`, `Home Address`, `Date Registered`, `Account Type`, `Contribution Charge`,`Next of Kin`,`NK Phone`,`NKin Contact`,`Account Officer`,`Branch` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active' and  `Date Registered` = '" . $filter . "' order by `ID` desc";
      $query_count = "SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active' and  `Date Registered` = '" . $filter . "'";
    }
    else if ($cmbFilter=="Date Range")
    {  
      $query = "SELECT `ID`,`Membership Number`, `Surname`,`First Name`,`Contact Number`, `Home Address`, `Date Registered`, `Account Type`, `Contribution Charge`,`Next of Kin`,`NK Phone`,`NKin Contact`,`Account Officer`,`Branch` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active' and  `Date Registered` between '" . $filter . "' and '" . $filter2 . "' order by `ID` desc";
      $query_count = "SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active' and  `Date Registered` between '" . $filter . "' and '" . $filter2 . "'";
    }
  }
  else if ($cmbFilt=="All Customers")
  {  
     if ($cmbFilter=="" or $cmbFilter=="All" or empty($cmbFilter))
    { 
       #$cmbFilter="All Customers Today";
       $query = "SELECT `ID`,`Membership Number`, `Surname`,`First Name`,`Contact Number`, `Home Address`, `Date Registered`, `Membership Type`, `Contribution Charge`,`Next of Kin`,`NK Phone`,`NKin Contact`,`Account Officer`,`Branch` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' Order By `ID` desc";
       $query_count = "SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "'";
    }
    else if ($cmbFilter=="Date")
    {
      $query = "SELECT `ID`,`Membership Number`, `Surname`,`First Name`,`Contact Number`, `Home Address`, `Date Registered`, `Membership Type`, `Contribution Charge`,`Next of Kin`,`NK Phone`,`NKin Contact`,`Account Officer`,`Branch` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Date Registered` = '" . $filter . "' order by `ID` desc";
      $query_count = "SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Date Registered` = '" . $filter . "'";
    }
    else if ($cmbFilter=="Date Range")
    {  
      $query = "SELECT `ID`,`Membership Number`, `Surname`,`First Name`,`Contact Number`, `Home Address`, `Date Registered`, `Membership Type`, `Contribution Charge`,`Next of Kin`,`NK Phone`,`NKin Contact`,`Account Officer`,`Branch` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Date Registered` between '" . $filter . "' and '" . $filter2 . "' order by `ID` desc";
      $query_count = "SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Date Registered` between '" . $filter . "' and '" . $filter2 . "'";
    }
  }
  else if ($cmbFilt=="By Branch")
  {  
     if ($cmbFilter=="" or $cmbFilter=="All" or empty($cmbFilter))
    {
       $query = "SELECT `ID`,`Membership Number`, `Surname`,`First Name`,`Contact Number`, `Home Address`, `Date Registered`, `Membership Type`, `Contribution Charge`,`Next of Kin`,`NK Phone`,`NKin Contact`,`Account Officer`,`Branch` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active' and `Branch` like '" .$filt. "%' order by `ID` desc";
       $query_count = "SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active' and `Branch` like '" .$filt. "%'";
    }
    else if ($cmbFilter=="Date")
    {
      $query = "SELECT `ID`,`Membership Number`, `Surname`,`First Name`,`Contact Number`, `Home Address`, `Date Registered`, `Membership Type`, `Contribution Charge`,`Next of Kin`,`NK Phone`,`NKin Contact`,`Account Officer`,`Branch` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active' and `Status`='Active' and `Date Registered` = '" . $filter . "' and `Branch` like '" .$filt. "%' order by `ID` desc";
      $query_count = "SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active' and `Date Registered` = '" . $filter . "' and `Branch` like '" .$filt. "%'";
    }
    else if ($cmbFilter=="Date Range")
    {  
      $query = "SELECT `ID`,`Membership Number`, `Surname`,`First Name`,`Contact Number`, `Home Address`, `Date Registered`, `Membership Type`, `Contribution Charge`,`Next of Kin`,`NK Phone`,`NKin Contact`,`Account Officer`,`Branch` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active' and  (`Date Registered` between '" . $filter . "' and '" . $filter2 . "')  and `Branch` like '" .$filt. "%' order by `ID` desc";
      $query_count = "SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active' and  (`Date Registered` between '" . $filter . "' and '" . $filter2 . "')  and `Branch` like '" .$filt. "%'";
    }
  }
  else if ($cmbFilt=="By Account Officer")
  {
     if ($cmbFilter=="" or $cmbFilter=="All" or empty($cmbFilter))
    { 
       $query = "SELECT `ID`,`Membership Number`, `Surname`,`First Name`,`Contact Number`, `Home Address`, `Date Registered`, `Membership Type`, `Contribution Charge`,`Next of Kin`,`NK Phone`,`NKin Contact`,`Account Officer`,`Branch` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active' and  `Date Registered`='" . date('Y-m-d') . "' and `Account Officer` like '" .$filt. "%' order by `ID` desc";
       $query_count = "SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active' and  `Date Registered`='" . date('Y-m-d') . "' and `Account Officer` like '" .$filt. "%'";
    }
    else if ($cmbFilter=="Date")
    {
      $query = "SELECT `ID`,`Membership Number`, `Surname`,`First Name`,`Contact Number`, `Home Address`, `Date Registered`, `Membership Type`, `Contribution Charge`,`Next of Kin`,`NK Phone`,`NKin Contact`,`Account Officer`,`Branch` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active' and `Date Registered` = '" . $filter . "' and `Account Officer` like '" .$filt. "%' order by `ID` desc";
      $query_count = "SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active' and  `Date Registered` = '" . $filter . "' and `Account Officer` like '" .$filt. "%'";
    }
    else if ($cmbFilter=="Date Range")
    {  
      $query = "SELECT `ID`,`Membership Number`, `Surname`,`First Name`,`Contact Number`, `Home Address`, `Date Registered`, `Membership Type`, `Contribution Charge`,`Next of Kin`,`NK Phone`,`NKin Contact`,`Account Officer`,`Branch` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active' and (`Date Registered` between '" . $filter . "' and '" . $filter2 . "')  and `Account Officer` like '" .$filt. "%' order by `ID` desc";
      $query_count = "SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Status`='Active' and  (`Date Registered` between '" . $filter . "' and '" . $filter2 . "')  and `Account Officer` like '" .$filt. "%'";
    }
  }
   $result=mysqli_query($conn,$query);
   $result_count = mysqli_query($conn,$query_count);     
   $totalrows = mysqli_num_rows($result_count);

   $limit      = 50; 
   @$page=$_GET['page'];

   if(empty($page))
   {
     $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  
?>
  <div class="tab-row" style="font-weight:bold">
    <div class="cell"  style='width:8.3%;background-color:#cbd9d9'>Name</div>
    <div class="cell"  style='width:8.3%;background-color:#cbd9d9'>Account Number</div>
    <div class="cell"  style='width:8.18%;background-color:#cbd9d9'>Phone #</div>
    <div class="cell"  style='width:8.18%;background-color:#cbd9d9'>Address</div>
    <div class="cell"  style='width:8.0%;background-color:#cbd9d9'>Opening Date</div>
    <div  class="cell" style='width:8.1%;background-color:#cbd9d9'>Account Type</div>
    <div  class="cell" style='width:8.5%;background-color:#cbd9d9'>Contribution Charge</div>
    <div  class="cell" style='width:8.3%;background-color:#cbd9d9'>Next of Kin</div>
    <div  class="cell" style='width:8.3%;background-color:#cbd9d9'>NextofKin Phone</div>
    <div  class="cell" style='width:8.3%;background-color:#cbd9d9'>NextofKin Address</div>
    <div  class="cell" style='width:8.3%;background-color:#cbd9d9'>Branch</div>
    <div  class="cell" style='width:8.3%;background-color:#cbd9d9'>Agent</div>
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
        <div  class="cell" style="width:8.3%">' .$name. '</div>
        <div  class="cell" style="width:8.3%">' .$acctno. '</div>
        <div  class="cell" style="width:8.18%">' . $phone. '</div>
        <div  class="cell" style="width:8.18%">' .$addr. '</div>
        <div  class="cell" style="width:8.0%">' .$date. '</div>
        <div  class="cell" style="width:8.3%">' .$actype. '</div>
        <div  class="cell" style="width:8.3%" align="right">' .$contri. '</div>
        <div  class="cell" style="width:8.3%">' .$nk. '</div>
        <div  class="cell" style="width:8.3%">' .$nkphone. '</div>
        <div  class="cell" style="width:8.3%">' .$nkaddy. '</div>
        <div  class="cell" style="width:8.3%">' .$branch. '</div>
        <div  class="cell" style="width:8.3%">' .$agent. '</div>
      </div>';
   } 
?>

<div align="center">
<?php
echo "<a target='blank' href='rptcust.php?cmbFilter=$cmbFilter&filter=$filter&filter2=$filter2&cmbFilt=$cmbFilt&filt=$filt'> Print this Report</a> &nbsp;";
echo "| <a target='blank' href='expcust.php?cmbFilter=$cmbFilter&filter=$filter&filter2=$filter2&cmbFilt=$cmbFilt&filt=$filt'> Export this Report</a> &nbsp; ";
?>
</div>

</div>

