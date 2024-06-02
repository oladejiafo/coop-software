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
    padding:10px;
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
    width: 10%;
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
<div align="center" width="100%"><h3><left>OUTSTANDING LOANS REPORT</left></h3></div>

 <?php
 if ($cmbFilt=="" or $cmbFilt=="All Loans" or empty($cmbFilt))

  {
  
  if ($cmbFilter=="" or $cmbFilter=="Today" or empty($cmbFilter))

    {
 
       #$cmbFilter="All Loans Today";

       $query = "SELECT `ID`,`Account Number`, `Loan Amount`,`Loan Type`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`Officer`, `Due Date`,`Periodic Repayment`,`Daily Repay`,`No of Payment`,`Payment Frequency`,`Late Charge`,`Loan Status` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and `Loan Date`='" . date('Y-m-d') . "' order by `ID` desc";

       $query_count = "SELECT * FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and  `Loan Date`='" . date('Y-m-d') . "'";

    }

    else if ($cmbFilter=="Date")

    {

      $query = "SELECT `ID`,`Account Number`, `Loan Amount`,`Loan Type`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`Officer`, `Due Date`,`Periodic Repayment`,`Daily Repay`,`No of Payment`,`Payment Frequency`,`Late Charge`,`Loan Status` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and  `Loan Date` = '" . $filter . "' order by `ID` desc";

      $query_count = "SELECT * FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and  `Loan Date` = '" . $filter . "'";

    }

    else if ($cmbFilter=="Date Range")

    {

      $query = "SELECT `ID`,`Account Number`, `Loan Amount`,`Loan Type`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`Officer`, `Due Date`,`Periodic Repayment`,`Daily Repay`,`No of Payment`,`Payment Frequency`,`Late Charge`,`Loan Status` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and  `Loan Date` between '" . $filter . "' and '" . $filter2 . "' order by `ID` desc";

      $query_count = "SELECT * FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and  `Loan Date` between '" . $filter . "' and '" . $filter2 . "'";

    }

    else if ($cmbFilter=="Account Number")

    {

      $query = "SELECT `ID`,`Account Number`, `Loan Amount`,`Loan Type`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`Officer`, `Due Date`,`Periodic Repayment`,`Daily Repay`,`No of Payment`,`Payment Frequency`,`Late Charge`,`Loan Status` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and  `Account Number` = '" . $filter . "' order by `ID` desc";

      $query_count = "SELECT * FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and  `Account Number` = '" . $filter . "'";

    }

  }

  else if ($cmbFilt=="By Branch")

  {
  
  if ($cmbFilter=="" or $cmbFilter=="Today" or empty($cmbFilter))

    {

       $query = "SELECT `loan`.`ID`,`loan`.`Account Number`, `Loan Amount`,`Loan Type`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`loan`.`Officer`, `Due Date`,`Periodic Repayment`,`Daily Repay`,`No of Payment`,`Payment Frequency`,`Late Charge`,`Loan Status` FROM `loan`  inner join `membership` on `loan`.`Account Number`=`membership`.`Membership Number` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and `Loan Date`='" . date('Y-m-d') . "' and `Branch` like '" .$filt. "%' order by `ID` desc";

       $query_count = "SELECT `loan`.`Account Number` FROM `loan`  inner join `membership` on `loan`.`Account Number`=`membership`.`Membership Number` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and `Loan Date`='" . date('Y-m-d') . "' and `Branch` like '" .$filt. "%'";

    }

    else if ($cmbFilter=="Date")

    {

      $query = "SELECT  `loan`.`ID`,`loan`.`Account Number`, `Loan Amount`,`Loan Type`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`loan`.`Officer`, `Due Date`,`Periodic Repayment`,`Daily Repay`,`No of Payment`,`Payment Frequency`,`Late Charge`,`Loan Status` FROM `loan`  inner join `membership` on `loan`.`Account Number`=`membership`.`Membership Number` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and `Loan Date` = '" . $filter . "' and `Branch` like '" .$filt. "%' order by `ID` desc";

      $query_count = "SELECT `loan`.`Account Number` FROM `loan`  inner join `membership` on `loan`.`Account Number`=`membership`.`Membership Number` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and `Loan Date` = '" . $filter . "' and `Branch` like '" .$filt. "%'";

    }

    else if ($cmbFilter=="Date Range")

    {
      $query = "SELECT `loan`.`ID`,`loan`.`Account Number`, `Loan Amount`,`Loan Type`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`loan`.`Officer`, `Due Date`,`Periodic Repayment`,`Daily Repay`,`No of Payment`,`Payment Frequency`,`Late Charge`,`Loan Status` FROM `loan`  inner join `membership` on `loan`.`Account Number`=`membership`.`Membership Number` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and  (`Loan Date` between '" . $filter . "' and '" . $filter2 . "')  and `Branch` like '" .$filt. "%' order by `ID` desc";

      $query_count = "SELECT `loan`.`Account Number` FROM `loan`  inner join `membership` on `loan`.`Account Number`=`membership`.`Membership Number` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and  (`Loan Date` between '" . $filter . "' and '" . $filter2 . "')  and `Branch` like '" .$filt. "%'";

    }

    else if ($cmbFilter=="Account Number")

    {

      $query = "SELECT `ID`,`Account Number`, `Loan Amount`,`Loan Type`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`Officer`, `Due Date`,`Periodic Repayment`,`Daily Repay`,`No of Payment`,`Payment Frequency`,`Late Charge`,`Loan Status` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and  `Account Number` = '" . $filter . "' and `Branch` like '" .$filt. "%' order by `ID` desc";

      $query_count = "SELECT * FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and  `Account Number` = '" . $filter . "' and `Account Number` like '" .$filt. "%' and `Branch` like '" .$filt. "%'";

    }

  }

  else if ($cmbFilt=="By Loan Officer")

  {

    if ($cmbFilter=="" or $cmbFilter=="Today" or empty($cmbFilter))

    {

       $query = "SELECT `ID`,`Account Number`, `Loan Amount`,`Loan Type`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`Officer`, `Due Date`,`Periodic Repayment`,`Daily Repay`,`No of Payment`,`Payment Frequency`,`Late Charge`,`Loan Status` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and  `Loan Date`='" . date('Y-m-d') . "' and `Officer` like '" .$filt. "%' order by `ID` desc";

       $query_count = "SELECT `Account Number` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and  `Loan Date`='" . date('Y-m-d') . "' and `Officer` like '" .$filt. "%'";

    }

    else if ($cmbFilter=="Date")

    {

      $query = "SELECT  `ID`,`Account Number`, `Loan Amount`,`Loan Type`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`Officer`, `Due Date`,`Periodic Repayment`,`Daily Repay`,`No of Payment`,`Payment Frequency`,`Late Charge`,`Loan Status` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and  `Loan Date` = '" . $filter . "' and `Officer` like '" .$filt. "%' order by `ID` desc";

      $query_count = "SELECT `Account Number` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and  `Loan Date` = '" . $filter . "' and `Officer` like '" .$filt. "%'";

    }

    else if ($cmbFilter=="Date Range")

    {
      $query = "SELECT  `ID`,`Account Number`, `Loan Amount`,`Loan Type`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`Officer`, `Due Date`,`Periodic Repayment`,`Daily Repay`,`No of Payment`,`Payment Frequency`,`Late Charge`,`Loan Status` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and  (`Loan Date` between '" . $filter . "' and '" . $filter2 . "')  and `Officer` like '" .$filt. "%' order by `ID` desc";

      $query_count = "SELECT `Account Number` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and  (`Loan Date` between '" . $filter . "' and '" . $filter2 . "')  and `Officer` like '" .$filt. "%'";

    }

    else if ($cmbFilter=="Account Number")

    {

      $query = "SELECT `ID`,`Account Number`, `Loan Amount`,`Loan Type`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`Officer`, `Due Date`,`Periodic Repayment`,`Daily Repay`,`No of Payment`,`Payment Frequency`,`Late Charge`,`Loan Status` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and  `Account Number` = '" . $filter . "' and `Officer` like '" .$filt. "%' order by `ID` desc";

      $query_count = "SELECT * FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and  `Account Number` = '" . $filter . "' and `Officer` like '" .$filt. "%'";

    }

  }
#   $result = mysqli_query ("SELECT `ID`,`Account Number`, `Loan Amount`,`Loan Type`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`Officer` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' LIMIT $limitvalue, $limit"); 

   $result=mysqli_query($conn,$query);
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

?>
  <div class="tab-row" style="font-weight:bold"> 
    <div class="cell"  style='height:50px;width:5.3%;background-color:#cbd9d9'>Account Number</div>
    <div class="cell"  style='height:50px;width:5.3%;background-color:#cbd9d9'>Name</div>
    <div class="cell"  style='height:50px;width:5.3%;background-color:#cbd9d9'>Phone #</div>
    <div class="cell"  style='height:50px;width:5.3%;background-color:#cbd9d9'>Address</div>
    <div class="cell"  style='height:50px;width:5.3%;background-color:#cbd9d9'>Loan Date</div>
    <div class="cell"  style='height:50px;width:5.3%;background-color:#cbd9d9'>Due Date</div>
    <div  class="cell" style='height:50px;width:5.3%;background-color:#cbd9d9'>Loan Type</div>

    <div  class="cell" style='height:50px;width:5.3%;background-color:#cbd9d9'>Loan Amount</div>
    <div  class="cell" style='height:50px;width:5.3%;background-color:#cbd9d9'>Repay Amount</div>
    <div  class="cell" style='height:50px;width:5.3%;background-color:#cbd9d9'>Repayment Days</div>
    <div  class="cell" style='height:50px;width:5.3%;background-color:#cbd9d9'>Payback To-Date</div>
    <div  class="cell" style='height:50px;width:5.3%;background-color:#cbd9d9'>Balance</div>
    <div  class="cell" style='height:50px;width:5.3%;background-color:#cbd9d9'>Default Amount</div>
    <div  class="cell" style='height:50px;width:5.3%;background-color:#cbd9d9'>Loan Status</div>
    <div  class="cell" style='height:50px;width:5.3%;background-color:#cbd9d9'>Branch</div>
    <div  class="cell" style='height:50px;width:5.3%;background-color:#cbd9d9'>Loan Officer</div>
  </div>

<?php 
   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 

   $samtt=0;
   $sptdt=0;
   $sbalt=0;
   while(list($id,$acctno,$lamount,$ltype,$ldate,$lduration,$ptd,$bal,$agent,$due,$repay,$drepay,$pays,$payfreq,$lcharge,$status)=mysqli_fetch_row($result)) 
   {	
       $sqlt="SELECT `Surname`,`First Name`,`Branch`,`Home Address`,`Contact Number`  FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Membership Number`='$acctno'";
       $resultt = mysqli_query($conn,$sqlt) or die('Could not look up user data; ' . mysql_error());
       $rowt = mysqli_fetch_array($resultt);
       $addy=$rowt['Home Address'];
       $phone=$rowt['Contact Number'];
       $branch=$rowt['Branch'];
       $sname=$rowt['Surname'];
       $fname=$rowt['First Name'];
       $name= $fname . ' ' . $sname;

       $samtt=$samtt+$lamount;
       $sptdt=$sptdt+$ptd;
       $sbalt=$sbalt+$bal;

       $lduration=$lduration . ' Months';
       $amtt=number_format($lamount,2);
       $ptdt=number_format($ptd,2);
       $balt=number_format($bal,2);

if($payfreq=='Daily')
{
  $py=$pays . " Days";
  $repy=$drepay;
} else  {
  $py=$pays . " Months";
  $repy=$repay;
}
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:5.3%;height:35px">' .$acctno. '</div>
        <div  class="cell" style="width:5.3%;height:35px">' .$name. '</div>
        <div  class="cell" style="width:5.3%;height:35px">' .$phone. '</div>
        <div  class="cell" style="width:5.3%;height:35px">' .$addy. '</div>
        <div  class="cell" style="width:5.3%;height:35px">' .$ldate. '</div>
        <div  class="cell" style="width:5.3%;height:35px">' .$due. '</div>
        <div  class="cell" style="width:5.3%;height:35px">' .$ltype. '</div>
        <div  class="cell" style="width:5.3%;height:35px" align="right">' .$amtt. '</div>
        <div  class="cell" style="width:5.3%;height:35px" align="right">' .$repy. '</div>
        <div  class="cell" style="width:5.3%;height:35px" align="right">' .$py. '</div>
        <div  class="cell" style="width:5.3%;height:35px" align="right">' .$ptdt. '</div>
        <div  class="cell" style="width:5.3%;height:35px" align="right">' .$balt. '</div>
        <div  class="cell" style="width:5.3%;height:35px" align="right">' .$lcharge. '%</div>
        <div  class="cell" style="width:5.3%;height:35px">' .$status. '</div>
        <div  class="cell" style="width:5.3%;height:35px">' .$branch. '</div>
        <div  class="cell" style="width:5.3%;height:35px">' .$agent. '</div>
      </div>';
   } 
   $samtt=number_format($samtt,2);
   $sptdt=number_format($sptdt,2);
   $sbalt=number_format($sbalt,2);

     echo '	
        <div class="tab-row" style="font-weight:bold"> 
        <div  class="cell" style="width:36.65%">TOTAL</div>
        <div  class="cell" style="width:5.3%" align="right">' .$samtt. '</div>
        <div  class="cell" style="width:11.5%">&nbsp;</div>
        <div  class="cell" style="width:5.3%" align="right">' .$sptdt. '</div>
        <div  class="cell" style="width:5.3%" align="right">' .$sbalt. '</div>
        <div  class="cell" style="width:30%">&nbsp;</div>
      </div>';
?>

</div>
</div>
</div>

