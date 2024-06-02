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
 @$cmbFilt=$_REQUEST["cmbFilt"];
 @$filt=$_REQUEST["filt"];
 @$cmbFilter=$_REQUEST["cmbFilter"];

 $filename = "Loan_" . date('Ymd') . $filter . ".xls";
 header("Content-Disposition: attachment; filename=\"$filename\"");
 header("Content-Type: application/vnd.ms-excel"); 
$cmbReport="Loans Report";
?>

<table align="center" width:100%>
<tr>
<td colspan=3>
<font style='font-size: 14pt'><b><?php echo $coy; ?></b></font><br>
<font style='font-size: 13pt'><b><?php echo $addy; ?></b></font><br>
<font style='font-size: 13pt'><b><?php echo $phn; ?></b></font>
</td></tr>
<tr>
<td colspan=3 align="center" width="100%"><h3><left>CUSTOMER REPORT</left></h3></td>
</tr>

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
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

?>
<tr><td colspan=3>
  <table style="font-weight:bold" width="100%">
   <tr>
    <td class="cell" style='width:10%;background-color:#cbd9d9'>Name</td>
    <td class="cell" style='width:10%;background-color:#cbd9d9'>Account Number</td>
    <td class="cell" style='width:10%;background-color:#cbd9d9'>Phone</td>
    <td class="cell" style='width:10%;background-color:#cbd9d9'>Address</td>
    <td class="cell" style='width:8%;background-color:#cbd9d9'>Opening Date</td>
    <td  class="cell" style='width:10%;background-color:#cbd9d9'>Account Type</td>
    <td  class="cell" style='width:10%;background-color:#cbd9d9'>Contribution Charge</td>
    <td  class="cell" style='width:10%;background-color:#cbd9d9'>Next of Kin</td>
    <td  class="cell" style='width:10%;background-color:#cbd9d9'>NextofKin Phone</td>
    <td  class="cell" style='width:10%;background-color:#cbd9d9'>NextofKin Address</td>
    <td  class="cell" style='width:10%;background-color:#cbd9d9'>Branch</td>
    <td  class="cell" style='width:10%;background-color:#cbd9d9'>Agent</td>
  </tr>

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
        <tr> 
        <td  class="cell" style="width:10%">' .$name. '</td>
        <td  class="cell" style="width:10%">' .$acctno. '</td>
        <td  class="cell" style="width:10%">' .$phone. '</td>
        <td  class="cell" style="width:10%">' .$addr. '</td>
        <td  class="cell" style="width:8%">' .$date. '</td>
        <td  class="cell" style="width:10%">' .$actype. '</td>
        <td  class="cell" style="width:10%" align="right">' .$contri. '</td>
        <td  class="cell" style="width:10%">' .$nk. '</td>
        <td  class="cell" style="width:10%">' .$nkphone. '</td>
        <td  class="cell" style="width:10%">' .$nkaddy. '</td>
        <td  class="cell" style="width:10%">' .$branch. '</td>
        <td  class="cell" style="width:10%">' .$agent. '</td>
      </tr>';
   }
 ?>
</table>
</td></tr>
</table>

