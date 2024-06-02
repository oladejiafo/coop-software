<?php
session_start();
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
list($cp, $fld) = explode(' ', $_SESSION['company']);
$cpfolder=$cp . $fld;

$sqr="SELECT * FROM `company info` WHERE `Company Name` ='" .$_SESSION['company']. "'";
$reslt = mysqli_query($conn,$sqr) or die('Could not look up user data; ' . mysqli_error());
$rw = mysqli_fetch_array($reslt);
$coy=$rw['Company Name'];

 @$idd=$_REQUEST["idd"];
 @$acctno=$_REQUEST["acctno"];
 @$cmbFilter=$_REQUEST["cmbFilter"];
 @$filter=$_REQUEST["filter"];
 @$filter2=$_REQUEST["filter2"];
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
	height:60px;
    font-size:16px;
}

.cell {
    padding: 5px;
    border: 1px solid #e9e9e9;
    float: left;
    background-color: #f5f5f5;
    width: 10%;
    height:45px;
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
<div align="left">

<div width="100%" style="backgroundcolor:#FFFFFF">
    <h2><center><u><?php echo $coy; ?></u></center></h2>
    <h3><center><u>FIXED DEPOSIT REPORT</u></center></h3>
</div>

<div class="div-table">
<div class="tab-row" style="font-weight:bold;height:75px"> 
    <div class="cell"  style='height:65px;width:8%;background-color:#cbd9d9'>Client Name</div>
    <div class="cell"  style='height:65px;width:6%;background-color:#cbd9d9'>Interest Rate</div>
    <div class="cell"  style='height:65px;width:7%;background-color:#cbd9d9'>Total Investment</div>
    <div class="cell"  style='height:65px;width:7%;background-color:#cbd9d9'>Total Interest</div>
    <div class="cell"  style='height:65px;width:7%;background-color:#cbd9d9'>Principal Liquidation</div>
    <div class="cell"  style='height:65px;width:7%;background-color:#cbd9d9'>Interest Payout</div>
    <div class="cell"  style='height:65px;width:6%;background-color:#cbd9d9'>Total WHT</div>
    <div class="cell"  style='height:65px;width:6%;background-color:#cbd9d9'>Total Charges</div>
    <div class="cell"  style='height:65px;width:6%;background-color:#cbd9d9'>Liquidation Charges</div>
    <div class="cell"  style='height:65px;width:7%;background-color:#cbd9d9'>Balance</div>
    <div class="cell"  style='height:65px;width:6%;background-color:#cbd9d9'>Date of First Placement</div>
    <div class="cell"  style='height:65px;width:6%;background-color:#cbd9d9'>Maturity Date</div>
    <div class="cell"  style='height:65px;width:6%;background-color:#cbd9d9'>Tenure</div>
</div>

<?php
    if ($cmbFilter=="Maturing Today")
    {
       $result = mysqli_query($conn,"SELECT `ID`,`Account Number`, `Amount`, `Date`, `Maturity Date`, `Interest Rate`,`Interest Amount`, `Balance`,`Tenor`,`Principal Liquidation`,`Interest Payout`,`WHT`,`Other Charges`,`Liquidation Charges`,`Name` FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Status`='Active' and  `Maturity Date`='" . date('Y-m-d') . "'"); 
    }
    else if ($cmbFilter=="Maturing Date")
    {
        $result = mysqli_query($conn,"SELECT `ID`,`Account Number`, `Amount`, `Date`, `Maturity Date`, `Interest Rate`,`Interest Amount`, `Balance`,`Tenor`,`Principal Liquidation`,`Interest Payout`,`WHT`,`Other Charges`,`Liquidation Charges`,`Name` FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Status`='Active' and `Maturity Date` = '" . $filter . "'"); 
    }
    else if ($cmbFilter=="Maturing Date Range")
    {
        $result = mysqli_query($conn,"SELECT `ID`,`Account Number`, `Amount`, `Date`, `Maturity Date`, `Interest Rate`,`Interest Amount`, `Balance`,`Tenor`,`Principal Liquidation`,`Interest Payout`,`WHT`,`Other Charges`,`Liquidation Charges`,`Name` FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Status`='Active' and (`Maturity Date` between '" . $filter . "' and '" . $filter2 . "')"); 
    }
    else if ($cmbFilter=="Account Number")
    {
        $result = mysqli_query($conn,"SELECT `ID`,`Account Number`, `Amount`, `Date`, `Maturity Date`, `Interest Rate`,`Interest Amount`, `Balance`,`Tenor`,`Principal Liquidation`,`Interest Payout`,`WHT`,`Other Charges`,`Liquidation Charges`,`Name` FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Status`='Active' and `Account Number` = '" . $filter . "'"); 
    } else {
        $result = mysqli_query ($conn,"SELECT `ID`,`Account Number`, `Amount`, `Date`, `Maturity Date`, `Interest Rate`,`Interest Amount`, `Balance`,`Tenor`,`Principal Liquidation`,`Interest Payout`,`WHT`,`Other Charges`,`Liquidation Charges`,`Name` FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Status`='Active'"); 
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
   {	
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
         <div  class="cell" style="width:8%"><font style="font-size:12px">' .$name. '</font></div>
         <div  class="cell" style="width:6%"><font style="font-size:12px">' .$irate. '%</font></div>
         <div  class="cell" style="width:7%"><font style="font-size:12px">' .$amtt. '</font></div>
         <div  class="cell" style="width:7%"><font style="font-size:12px">' .$iamtt. '</font></div>
         <div  class="cell" style="width:7%"><font style="font-size:12px">' .$pliqt. '</font></div>
         <div  class="cell" style="width:7%"><font style="font-size:12px">' .$intpayt. '</font></div>
         <div  class="cell" style="width:6%"><font style="font-size:12px">' .$whtt. '</font></div>
         <div  class="cell" style="width:6%"><font style="font-size:12px">' .$ocharget. '</font></div>
         <div  class="cell" style="width:6%"><font style="font-size:12px">' .$liqcharget. '</font></div>
         <div  class="cell" style="width:7%"><font style="font-size:12px">' .$balt. '</font></div>
         <div  class="cell" style="width:6%"><font style="font-size:12px">' .$ddate. '</font></div>
         <div  class="cell" style="width:6%"><font color="red" style="font-size:12px">' .$mdate. '</font></div>
         <div  class="cell" style="width:6%"><font color="red" style="font-size:12px">' .$tenor. '</font></div>
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
   <div  class="cell" style="width:15%">&nbsp;</div>
   <div  class="cell" style="width:7%"><font style="font-size:12px">' .$samtt. '</font></div>
   <div  class="cell" style="width:7%"><font style="font-size:12px">' .$siamt. '</font></div>
   <div  class="cell" style="width:7%"><font style="font-size:12px">' .$spliq. '</font></div>
   <div  class="cell" style="width:7%"><font style="font-size:12px">' .$sintpay. '</font></div>
   <div  class="cell" style="width:6%"><font style="font-size:12px">' .$swht. '</font></div>
   <div  class="cell" style="width:6%"><font style="font-size:12px">' .$socharge. '</font></div>
   <div  class="cell" style="width:6%"><font style="font-size:12px">' .$sliqcharge. '</font></div>
   <div  class="cell" style="width:7%"><font style="font-size:12px">' .$sbal. '</font></div>
   <div  class="cell" style="width:19.8%">&nbsp;</div>
   </div>';
?>
</div>
</fieldset>
</div>

