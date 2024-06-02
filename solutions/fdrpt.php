<?php
#session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 2) & ($_SESSION['access_lvl'] != 6) & ($_SESSION['access_lvl'] != 4) & ($_SESSION['access_lvl'] != 3))
{
 if ($_SESSION['access_lvl'] != 5)
 {
   $redirect = $_SERVER['PHP_SELF'];
   header("Refresh: 0; URL=index.php?redirect=$redirect");
 }
}

 require_once 'conn.php';
$sqr="SELECT * FROM `company info` WHERE `Company Name` ='" .$_SESSION['company']. "'";
$reslt = mysqli_query($conn,$sqr) or die('Could not look up user data; ' . mysqli_error());
$rw = mysqli_fetch_array($reslt);
$coy=$rw['Company Name'];

 @$idd=$_REQUEST["idd"];
 @$acctno=$_REQUEST["acctno"];
 @$cmbFilter=$_REQUEST["cmbFilter"];
 @$filter=$_REQUEST["filter"];
 @$filter2=$_REQUEST["filter2"];

$cmbReport="Fixed Deposit Report";
?>
<div align="left">

<div width="100%" style="backgroundcolor:#FFFFFF">
     <h3><center><u>FIXED DEPOSIT REPORT</u></center></h3>
</div>

<form  action="report.php" method="POST">
 <div align="center">
  <input type="hidden" name="cmbReport" size="12" value="Fixed Deposit Report">
 <span>
&nbsp;
   <select name="cmbFilter" style="width:120px;height:40px">
  <?php  
   echo '<option selected>'.$cmbFilter.'</option>';
   echo '<option>Maturing Today</option>';
   echo '<option>Maturing Date</option>';
   echo '<option>Maturing Date Range</option>';
   echo '<option>Account Number</option>';
  ?> 
 </select>
&nbsp;
  <input type="text" name="filter" id="inputFieldA"  style="width:120px;height:40px">
&nbsp;
  <input type="text" name="filter2" id="inputFieldB" style="width:120px;height:40px">
&nbsp;
     <input type="submit" value="Generate" name="submit" style="width:100px;height:40px">
</form>
</div>

<div class="div-table">

 <?php
   $limit      = 50; 
   @$page=$_GET['page'];
?>
<div class="tab-row" style="font-weight:bold;height:75px"> 
    <div class="cell"  style='height:65px;width:8.66%;background-color:#cbd9d9'>Client Name</div>
    <div class="cell"  style='height:65px;width:7.66%;background-color:#cbd9d9'>Interest Rate</div>
    <div class="cell"  style='height:65px;width:7.66%;background-color:#cbd9d9'>Total Investment</div>
    <div class="cell"  style='height:65px;width:7.66%;background-color:#cbd9d9'>Total Interest</div>
    <div class="cell"  style='height:65px;width:7.66%;background-color:#cbd9d9'>Principal Liquidation</div>
    <div class="cell"  style='height:65px;width:7.66%;background-color:#cbd9d9'>Interest Payout</div>
    <div class="cell"  style='height:65px;width:6.66%;background-color:#cbd9d9'>Total WHT</div>
    <div class="cell"  style='height:65px;width:7.66%;background-color:#cbd9d9'>Total Charges</div>
    <div class="cell"  style='height:65px;width:7.66%;background-color:#cbd9d9'>Liquidation Charges</div>
    <div class="cell"  style='height:65px;width:7.66%;background-color:#cbd9d9'>Balance</div>
    <div class="cell"  style='height:65px;width:7.66%;background-color:#cbd9d9'>Date of First Placement</div>
    <div class="cell"  style='height:65px;width:7.66%;background-color:#cbd9d9'>Maturity Date</div>
    <div class="cell"  style='height:65px;width:7.66%;background-color:#cbd9d9'>Tenure</div>
</div>

<?php
    if ($cmbFilter=="Maturing Today")
    {
        $query_count    = "SELECT * FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Status`='Active' and  `Maturity Date`='" . date('Y-m-d') . "'";
        $result_count   = mysqli_query($conn,$query_count);
        $totalrows  = mysqli_num_rows($result_count);
        if(empty($page))
        {
          $page = 1;
        }
        $limitvalue = $page * $limit - ($limit);  
       $result = mysqli_query($conn,"SELECT `ID`,`Account Number`, `Amount`, `Date`, `Maturity Date`, `Interest Rate`,`Interest Amount`, `Balance`,`Tenor`,`Principal Liquidation`,`Interest Payout`,`WHT`,`Other Charges`,`Liquidation Charges`,`Name` FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Status`='Active' and  `Maturity Date`='" . date('Y-m-d') . "' LIMIT $limitvalue, $limit"); 
    }
    else if ($cmbFilter=="Maturing Date")
    {
        $query_count    = "SELECT * FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Status`='Active' and `Maturity Date` = '" . $filter . "'";
        $result_count   = mysqli_query($conn,$query_count);     
        $totalrows  = mysqli_num_rows($result_count);
        if(empty($page))
        {
          $page = 1;
        }
        $limitvalue = $page * $limit - ($limit);  
        $result = mysqli_query($conn,"SELECT `ID`,`Account Number`, `Amount`, `Date`, `Maturity Date`, `Interest Rate`,`Interest Amount`, `Balance`,`Tenor`,`Principal Liquidation`,`Interest Payout`,`WHT`,`Other Charges`,`Liquidation Charges`,`Name` FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Status`='Active' and `Maturity Date` = '" . $filter . "' LIMIT $limitvalue, $limit"); 
    }
    else if ($cmbFilter=="Maturing Date Range")
    {
        $query_count    = "SELECT * FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Status`='Active' and (`Maturity Date` between '" . $filter . "' and '" . $filter2 . "')";
        $result_count   = mysqli_query($conn,$query_count);     
        $totalrows  = mysqli_num_rows($result_count);
        if(empty($page))
        {
          $page = 1;
        }
        $limitvalue = $page * $limit - ($limit);  
        $result = mysqli_query($conn,"SELECT `ID`,`Account Number`, `Amount`, `Date`, `Maturity Date`, `Interest Rate`,`Interest Amount`, `Balance`,`Tenor`,`Principal Liquidation`,`Interest Payout`,`WHT`,`Other Charges`,`Liquidation Charges`,`Name` FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Status`='Active' and (`Maturity Date` between '" . $filter . "' and '" . $filter2 . "') LIMIT $limitvalue, $limit"); 
    }
    else if ($cmbFilter=="Account Number")
    {
        $query_count    = "SELECT * FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Status`='Active' and `Account Number` = '" . $filter . "'";
        $result_count   = mysqli_query($conn,$query_count);     
        $totalrows  = mysqli_num_rows($result_count);
        if(empty($page))
        {
          $page = 1;
        }
        $limitvalue = $page * $limit - ($limit);
        $result = mysqli_query($conn,"SELECT `ID`,`Account Number`, `Amount`, `Date`, `Maturity Date`, `Interest Rate`,`Interest Amount`, `Balance`,`Tenor`,`Principal Liquidation`,`Interest Payout`,`WHT`,`Other Charges`,`Liquidation Charges`,`Name` FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Status`='Active' and `Account Number` = '" . $filter . "' LIMIT $limitvalue, $limit"); 
    } else {
        $query_count    = "SELECT * FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Status`='Active'";
        $result_count   = mysqli_query($conn,$query_count);
        $totalrows  = mysqli_num_rows($result_count);
        if(empty($page))
        {
          $page = 1;
        }
        $limitvalue = $page * $limit - ($limit);
        $result = mysqli_query ($conn,"SELECT `ID`,`Account Number`, `Amount`, `Date`, `Maturity Date`, `Interest Rate`,`Interest Amount`, `Balance`,`Tenor`,`Principal Liquidation`,`Interest Payout`,`WHT`,`Other Charges`,`Liquidation Charges`,`Name` FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Status`='Active' LIMIT $limitvalue, $limit"); 
    }

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<div>Nothing to Display!</div>"); 
   } 

   $samtt=0;
   $siamt=0;
   $sbal=0;
   $swht=0;
   $spliq=0;
   $sintpay=0;
   $socharge=0;
   $sliqcharge=0;
   $sn=1;

   while(list($id,$acctno,$damount,$ddate,$mdate,$irate,$iamt,$bal,$tenor,$pliq,$intpay,$wht,$ocharge, $liqcharge,$name)=mysqli_fetch_row($result)) 
   {	/*
       $sqlL="SELECT sum(`Amount`) AS PAYAMT  FROM `loan payment` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno' AND `Loan ID`='$id'";
       $resultL = mysqli_query($conn,$sqlL) or die('Could not look up user data; ' . mysqli_error());
       $rowL = mysqli_fetch_array($resultL);
       $paytd=$rowL['PAYAMT'];
       $baltd=$lamount - $paytd;

       $sqlLL="SELECT `Date` FROM `loan payment` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno' AND `Loan ID`='$id' Order By `Date` Desc limit 0,1";
       $resultLL = mysqli_query($conn,$sqlLL) or die('Could not look up user data; ' . mysqli_error());
       $rowLL = mysqli_fetch_array($resultLL);
       $lastpay=$rowLL['Date'];
       if($lastpay=="" OR empty($lastpay))
       {
           $lastpay=$ldate;
       }
       */

       $samtt=$samtt+$damount;
       $siamt=$siamt+$iamt;
       $sbal=$sbal+$bal;
       $swht=$swht+$wht;
       $spliq=$spliq+$pliq;
       $sintpay=$sintpay+$intpay;
       $socharge=$socharge+$ocharge;
       $sliqcharge=$sliqcharge+$liqcharge;

       $amtt=number_format($damount,2);
       $iamtt=number_format($iamt,2);
       $balt=number_format($bal,2);
       $whtt=number_format($wht,2);
       $pliqt=number_format($pliq,2);
       $intpayt=number_format($intpay,2);
       $ocharget=number_format($ocharge,2);
       $liqcharget=number_format($liqcharge,2);

       echo '	
       <div class="tab-row"> 
         <div  class="cell" style="width:8.66%"><font style="font-size:10px">' .$name. '</font></div>
         <div  class="cell" style="width:7.66%"><font style="font-size:10px">' .$irate. '%</font></div>
         <div  class="cell" style="width:7.66%"><font style="font-size:10px">' .$amtt. '</font></div>
         <div  class="cell" style="width:7.66%"><font style="font-size:10px">' .$iamtt. '</font></div>
         <div  class="cell" style="width:7.66%"><font style="font-size:10px">' .$pliqt. '</font></div>
         <div  class="cell" style="width:7.66%"><font style="font-size:10px">' .$intpayt. '</font></div>
         <div  class="cell" style="width:6.66%"><font style="font-size:10px">' .$whtt. '</font></div>
         <div  class="cell" style="width:7.66%"><font style="font-size:10px">' .$ocharget. '</font></div>
         <div  class="cell" style="width:7.66%"><font style="font-size:10px">' .$liqcharget. '</font></div>
         <div  class="cell" style="width:7.66%"><font style="font-size:10px">' .$balt. '</font></div>
         <div  class="cell" style="width:7.66%"><font style="font-size:10px">' .$ddate. '</font></div>
         <div  class="cell" style="width:7.66%"><font color="red" style="font-size:10px">' .$mdate. '</font></div>
         <div  class="cell" style="width:7.66%"><font color="red" style="font-size:10px">' .$tenor. '</font></div>
       </div>';
    }
 
   $samtt=number_format($samtt,2);
   $siamt=number_format($siamt,2);
   $sbal=number_format($sbal,2);
   $swht=number_format($swht,2);
   $spliq=number_format($spliq,2);
   $sintpay=number_format($sintpay,2);
   $socharge=number_format($socharge,2);
   $sliqcharge=number_format($sliqcharge,2);

   echo '	
   <div class="tab-row"> 
   <div  class="cell" style="width:16.32%">&nbsp;</div>
   <div  class="cell" style="width:7.66%"><font style="font-size:10px">' .$samtt. '</font></div>
   <div  class="cell" style="width:7.66%"><font style="font-size:10px">' .$siamt. '</font></div>
   <div  class="cell" style="width:7.66%"><font style="font-size:10px">' .$spliq. '</font></div>
   <div  class="cell" style="width:7.66%"><font style="font-size:10px">' .$sintpay. '</font></div>
   <div  class="cell" style="width:6.66%"><font style="font-size:10px">' .$swht. '</font></div>
   <div  class="cell" style="width:7.66%"><font style="font-size:10px">' .$socharge. '</font></div>
   <div  class="cell" style="width:7.66%"><font style="font-size:10px">' .$sliqcharge. '</font></div>
   <div  class="cell" style="width:7.66%"><font style="font-size:10px">' .$sbal. '</font></div>
   <div  class="cell" style="width:22.98%">&nbsp;</div>
   </div>';
?>
</div>
</fieldset>

<div align="center">
<?php
echo "<a target='blank' href='rptfd.php?cmbFilter=$cmbFilter&filter=$filter&filter2=$filter2'> Print this Report</a> &nbsp;";
echo "| <a target='blank' href='expfd.php?cmbFilter=$cmbFilter&filter=$filter&filter2=$filter2'> Export this Report</a> &nbsp; ";
?>
</div>

</div>

