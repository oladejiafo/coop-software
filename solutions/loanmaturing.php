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

$cmbReport="Loan Maturing Report";
?>
<div align="left">

<div width="100%" style="backgroundcolor:#FFFFFF">
     <h3><center><u>LOAN MATURING REPORT</u></center></h3>
</div>

<form  action="report.php" method="POST">
 <div align="center">
  <input type="hidden" name="cmbReport" size="12" value="Loan Maturing Report">
 <span>
&nbsp;
   <select name="cmbFilter" style="width:120px;height:40px">
  <?php  
   echo '<option selected>'.$cmbFilter.'</option>';
   echo '<option>Today</option>';
   echo '<option>Date</option>';
   echo '<option>Date Range</option>';
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
<div class="tab-row" style="font-weight:bold"> 
    <div class="cell"  style='height:50px;width:6.00%;background-color:#cbd9d9'>S/No</div>
    <div class="cell"  style='height:50px;width:16.66%;background-color:#cbd9d9'>Client Name</div>
    <div class="cell"  style='height:50px;width:16.66%;background-color:#cbd9d9'>Loan Product</div>
    <div class="cell"  style='height:50px;width:16.66%;background-color:#cbd9d9'>Disbursement Date</div>
    <div class="cell"  style='height:50px;width:16.66%;background-color:#cbd9d9'>Principal</div>
    <div class="cell"  style='height:50px;width:16.66%;background-color:#cbd9d9'>Amount Due</div>
    <div class="cell"  style='height:50px;width:10.66%;background-color:#cbd9d9'>Next Due Date</div>
</div>

<?php
    if ($cmbFilter=="Today")
    {
        $query_count    = "SELECT * FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and  `Loan Date`='" . date('Y-m-d') . "'";
        $result_count   = mysqli_query($conn,$query_count);     
        $totalrows  = mysqli_num_rows($result_count);
        if(empty($page))
        {
          $page = 1;
        }
        $limitvalue = $page * $limit - ($limit);  
       $result = mysqli_query($conn,"SELECT `ID`,`Account Number`, `Loan Amount`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`Loan Type`,`Payment Frequency` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and  `Loan Date`='" . date('Y-m-d') . "' LIMIT $limitvalue, $limit"); 
    }
    else if ($cmbFilter=="Date")
    {
        $query_count    = "SELECT * FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and `Loan Date` = '" . $filter . "'";
        $result_count   = mysqli_query($conn,$query_count);     
        $totalrows  = mysqli_num_rows($result_count);
        if(empty($page))
        {
          $page = 1;
        }
        $limitvalue = $page * $limit - ($limit);  
        $result = mysqli_query($conn,"SELECT `ID`,`Account Number`, `Loan Amount`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`Loan Type`,`Payment Frequency` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and `Loan Date` = '" . $filter . "' LIMIT $limitvalue, $limit"); 
    }
    else if ($cmbFilter=="Date Range")
    {
        $query_count    = "SELECT * FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and (`Loan Date` between '" . $filter . "' and '" . $filter2 . "')";
        $result_count   = mysqli_query($conn,$query_count);     
        $totalrows  = mysqli_num_rows($result_count);
        if(empty($page))
        {
          $page = 1;
        }
        $limitvalue = $page * $limit - ($limit);  
        $result = mysqli_query($conn,"SELECT `ID`,`Account Number`, `Loan Amount`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`Loan Type`,`Payment Frequency` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and (`Loan Date` between '" . $filter . "' and '" . $filter2 . "') LIMIT $limitvalue, $limit"); 
    }
    else if ($cmbFilter=="Account Number")
    {
        $query_count    = "SELECT * FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and `Account Number` = '" . $filter . "'";
        $result_count   = mysqli_query($conn,$query_count);     
        $totalrows  = mysqli_num_rows($result_count);
        if(empty($page))
        {
          $page = 1;
        }
        $limitvalue = $page * $limit - ($limit);
        $result = mysqli_query($conn,"SELECT `ID`,`Account Number`, `Loan Amount`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`Loan Type`,`Payment Frequency` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' and `Account Number` = '" . $filter . "' LIMIT $limitvalue, $limit"); 
    } else {
        $query_count    = "SELECT * FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active'";
        $result_count   = mysqli_query($conn,$query_count);
        $totalrows  = mysqli_num_rows($result_count);
        if(empty($page))
        {
          $page = 1;
        }
        $limitvalue = $page * $limit - ($limit);
        $result = mysqli_query ($conn,"SELECT `ID`,`Account Number`, `Loan Amount`, `Loan Date`, `Loan Duration`, `Payment todate`, `Balance`,`Loan Type`,`Payment Frequency` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Balance` > 0 and `Loan Status`='Active' LIMIT $limitvalue, $limit"); 
    }

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<div>Nothing to Display!</div>"); 
   } 

   $samtt=0;
   $sptdt=0;
   $sbalt=0;
   $sn=1;
   while(list($id,$acctno,$lamount,$ldate,$lduration,$ptd,$bal,$ltype,$pfreq)=mysqli_fetch_row($result)) 
   {	
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

       $sqlt="SELECT `Surname`,`First Name`  FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Membership Number`='$acctno'";
       $resultt = mysqli_query($conn,$sqlt) or die('Could not look up user data; ' . mysqli_error());
       $rowt = mysqli_fetch_array($resultt);
     
       $sname=$rowt['Surname'];
       $fname=$rowt['First Name'];
       $name= $fname . ' ' . $sname;

       $samtt=$samtt+$lamount;
       $sptdt=$sptdt+$paytd;
       $sbalt=$sbalt+$baltd;

       $duedate=date('Y-m-d', strtotime('+' . $lduration . ' month',strtotime($ldate)));
       if($pfreq == "Monthly")
       {
        $nduedate=date('Y-m-d', strtotime('+1 month',strtotime($lastpay)));
       } else if($pfreq == "Weekly")
       {
        $nduedate=date('Y-m-d', strtotime('+1 week',strtotime($lastpay)));
       }

       $amtt=number_format($lamount,2);
       $ptdt=number_format($paytd,2);
       $balt=number_format($baltd,2);

       echo '	
       <div class="tab-row"> 
         <div  class="cell" style="width:6.00%">' .$sn. '</div>
         <div  class="cell" style="width:16.66%">' .$name. '</div>
         <div  class="cell" style="width:16.66%">' .$ltype. '</div>
         <div  class="cell" style="width:16.66%">' .$ldate. '</div>
         <div  class="cell" style="width:16.66%">' .$amtt. '</div>
         <div  class="cell" style="width:16.66%">' .$balt. '</div>
         <div  class="cell" style="width:10.66%"><font color="red";>' .$nduedate. '</font></div>
       </div>';
    }
 
   $samtt=number_format($samtt,2);
   $sptdt=number_format($sptdt,2);
   $sbalt=number_format($sbalt,2);

   echo '	
   <div class="tab-row"> 
     <div  class="cell" style="width:56.00%">&nbsp;</div>
     <div  class="cell" style="width:16.66%">' .$samtt. '</div>
     <div  class="cell" style="width:16.66%">' .$sbalt. '</div>
     <div  class="cell" style="width:10.66%">&nbsp;</div>
   </div>';
?>
</div>
</fieldset>

<div align="center">
<?php
echo "<a target='blank' href='rptloanmaturing.php?cmbFilter=$cmbFilter&filter=$filter&filter2=$filter2'> Print this Report</a> &nbsp;";
echo "| <a target='blank' href='exploanmaturing.php?cmbFilter=$cmbFilter&filter=$filter&filter2=$filter2'> Export this Report</a> &nbsp; ";
?>
</div>

</div>

