<?php
/*
session_start();
//check to see if user has logged in with a valid password
 if ($_SESSION['access_lvl'] != 5 && $_SESSION['access_lvl'] != 6){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");
}
*/
 require_once 'conn.php';
 //require_once 'header.php';
 //require_once 'style.php';

@$Tit=$_SESSION['Tit'];
@$tval=$_REQUEST['tval'];
 @$acctno=$_REQUEST["acctno"];
?>

<!-- load jquery ui css-->
<link href="js/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<!-- load jquery library -->
<script src="js/jquery-1.9.1.js"></script>
<!-- load jquery ui js file -->
<script src="js/jquery-ui.min.js"></script>

<style type="text/css">
.div-table {
    width: 100%;
    float: left;
    padding:1px;
}

.tab-row {
	background-color: #EEEEEE;
	float: left;
	width: 100%;
	height:70px;
}

.cell {
    padding: 1px;
    border: 1px solid #e9e9e9;
    float: left;
    background-color: #f5f5f5;
    height:60px;
    font-size:12px;
}
</style>

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

<section class="panel">
       <div class="panel-body" align="center" style="margin-top:10px;margin-bottom:10px">

<div class="div-table row">
 <?php
 @$tval=$_GET['tval'];
 $limit      = 3;
 @$page=$_GET['page'];
 if(empty($acctno) OR $acctno=="") 
 {
  $acctno="XYZ0099";
 }
   $query_count = "SELECT * FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Approval`='Pending'";
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);
?>
  <div class="tab-row" style="font-weight:bold;width:100%">
    <div  class="cell"  style='width:100%'><b><font color='#FF0000' style='font-size: 10pt'> PENDING LOANS for APPROVAL</font></b></div>
  </div>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:6.3%;height:65px;background-color:#cbd9d9'>S/No</div>

    <div  class="cell" style='width:8.3%;height:65px;background-color:#cbd9d9'>Request Date</div>

    <div  class="cell" style='width:8.3%;height:65px;background-color:#cbd9d9'>Account No</div>

    <div  class="cell" style='width:8.3%;height:65px;background-color:#cbd9d9'>Name</div>

    <div  class="cell" style='width:8.3%;height:65px;background-color:#cbd9d9'>Amount </div>

    <div  class="cell" style='width:8.3%;height:65px;background-color:#cbd9d9'>Loan Type</div>
   
    <div  class="cell" style='width:8.3%;height:65px;background-color:#cbd9d9'>Duration</div>

    <div  class="cell" style='width:8.3%;height:65px;background-color:#cbd9d9'>Int Rate</div>

    <div  class="cell" style='width:8.3%;height:65px;background-color:#cbd9d9'>Payment Type</div>

    <div  class="cell" style='width:8.3%;height:65px;background-color:#cbd9d9'>Loan Officer</div>

    <div  class="cell" style='width:9.3%;height:65px;background-color:#cbd9d9'>Note</div>

    <div  class="cell" style='width:9.3%;height:65px;background-color:#cbd9d9'>Approval</div>


  </div>
<?php
   $query = "SELECT `ID`,`Loan Date`,`Account Number`,`Loan Amount`,`Loan Type`,`Loan Duration`,`Interest Rate`,`Payment Type`,`Officer`,`Approval`,`Approval Note`,`Collateral`,`Collateral Location`,`Collateral Value`,`Collateral Title`,`Collateral Description` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Approval` in ('Pending','Denied') order by `Approval` desc,`Loan Date` desc LIMIT 0, $limit";
   $resultp=mysqli_query($conn,$query);

$i=0;
    while(list($idd,$date,$acctno,$amt,$type,$duration,$intrate,$ptype,$officer,$appr,$appnote,$coll,$colloc,$colval,$colt,$cold)=mysqli_fetch_row($resultp))
    {
      $sqlb="SELECT * FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno' order by `ID` desc";
      $resultb = mysqli_query($conn,$sqlb) or die('Could not look up user data; ' . mysqli_error());
      $rowb = mysqli_fetch_array($resultb); 
      $ball=$rowb['Balance'];

      $sqlw="SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Membership Number`='$acctno' and `Status`='Active'";
      $resultw = mysqli_query($conn,$sqlw) or die('Could not look up user data; ' . mysqli_error());
      $roww = mysqli_fetch_array($resultw);
 
      $fn=$roww['First Name'];
      $sn=$roww['Surname'];
      $name=$fn . ' ' . $sn;
      $cll=$roww['Status'];
   
   if($cll=="Closed")
   { echo "ACCOUNT HAS BEEN CLOSED"; }

     $amount=number_format($amt,2);

     $i=$i+1;

     echo '
        <div class="tab-row" style="height:95px">
         <div  class="cell" style="height:85px;width:6.3%">' .$i. '</div>
         <div  class="cell" style="height:85px;width:8.3%">' .$date. '</div>
         <div  class="cell" style="height:85px;width:8.3%"><a href = "loans.php?acctno=' .$acctno. '&edit=1" title="Click to open this loan record">' .$acctno. '</a></div>
         <div  class="cell" style="height:85px;width:8.3%">' .$name. '</div>
         <div  class="cell" style="height:85px;width:8.3%">' .$amount. '</div>
         <div  class="cell" style="height:85px;width:8.3%">' .$type.  '</div>
         <div  class="cell" style="height:85px;width:8.3%">' .$duration. '</div>
         <div  class="cell" style="height:85px;width:8.3%">' .$intrate.  '</div>
         <div  class="cell" style="height:85px;width:8.3%">' .$ptype.  '</div>
         <div  class="cell" style="height:85px;width:8.3%">' .$officer.  '</div>
         <div  class="cell" style="height:85px;width:9.3%">';

if ($ball>0 && $ball <= $amt)
{
  $appnote=$appnote . " NOTE: Account Balance (" .$ball. ") is less than Loan Requested"; 
}
if($_SESSION['access_lvl'] == 5 OR $_SESSION['access_lvl'] == 6)
{
  echo $appnote;
} else if($_SESSION['access_lvl'] == 4 OR $_SESSION['access_lvl'] == 3) {
 if ($appr=="Pending")
 {
 ?>
 <form method="post" action="apploans.php">
  <input type="text" name="appnote" style="width:100px;height:25px;font-size:11px" value="<?php echo $appnote; ?>">
  <input type="hidden" name="aph" value="X1X">
  <input type="submit" value="Save" name="submit" style="height:25; width:45;">
 </form>
 <?php
 } else {
  echo $appnote;
 }
}
       echo '</div>
        <div  class="cell" style="height:85px;width:9.3%">';
if ($appr=="Pending")
{
 if($_SESSION['access_lvl'] == 5 OR $_SESSION['access_lvl'] == 6)
 {
    echo '<a href = "apploans.php?loanid=' . $idd . '&acctnum=' .$acctno. '&aph=1" title="Click here to APPROVE this loan"><i class="fa fa-check btn btn-success btn-sm"></i></a> &nbsp; ';
    echo '&nbsp; <a href = "apploans.php?loanid=' . $idd . '&acctnum=' .$acctno. '&aph=9" title="Click here to DENY this loan"><i class="fa fa-times btn btn-warning btn-sm"></i></a>';
 }
 else if($_SESSION['access_lvl'] == 4 OR $_SESSION['access_lvl'] == 3)
 {
  echo "&nbsp;";
 }
} else {
  echo $appr;
}
    echo  '</div>
  </div>';

  $sqlCr="SELECT * FROM `loan type` WHERE `Company` ='" .$_SESSION['company']. "' AND `Type`='$type'";
  $resultCr = mysqli_query($conn,$sqlCr) or die('Could not look up user data; ' . mysqli_error());
  $rowCr = mysqli_fetch_array($resultCr); 
  $gNum=$rowCr['How Many Guarantor'];
  $greqs=$rowCr['Guarantor Requirement'];
  $creqq=$rowCr['Collateral Requirement'];
  $qreqq=$rowCr['Qualifying Requirement'];
  $greqq = $gNum . " Guarantor(s) Needed. " . $greqs;

  $saves=number_format($ball,2);
  $sPerc = ($amt/$ball)*100;
  $savess = $saves . " The Loan Amount is " . number_format($sPerc,2) ."% of the Savings Balance";

  $tdate=strtotime(date('Y-m-d'));
  $ttdate =date('Y-m-d');
  $ldate = date("Y-m-d", strtotime("-12 month", $tdate));
  $sqlCn="SELECT sum(`Amount`) as cnSum, count(`ID`) as cnNum FROM `contributions` WHERE `Company` ='" .$_SESSION['company']. "' AND `Account Number`='$acctno' AND `Date` between '". $ldate . "' AND '". $ldate . "'";
  $resultCn = mysqli_query($conn,$sqlCn) or die('Could not look up user data; ' . mysqli_error());
  $rowCn = mysqli_fetch_array($resultCn); 
  $cnNum=$rowCn['cnNum'];
  $cnSum=$rowCn['cnSum'];

  $sqlGt="SELECT `Guarantor`, `Contact`,`Business Address`, `Occupation` FROM `loan guarantor` WHERE `Company` ='" .$_SESSION['company']. "' AND `Loan_ID`='$idd'";
  $resultGt = mysqli_query($conn,$sqlGt) or die('Could not look up user data; ' . mysqli_error());
//  $rowGt = mysqli_fetch_array($resultGt); 
//  $cnNum=$rowGt['cnNum'];
$gSupp="";
while(list($gName,$gCont,$gAddr,$gJob)=mysqli_fetch_row($resultGt))
{
  if(mysqli_num_rows($resultGt) == 0)
  { 
    $gSupp = "No Guarantor";
  } else if(mysqli_num_rows($resultGt) == 1) {
    $gSupp = "<b>" .$gName ."</b> is a guarantor, a <b>" . $gJob . "</b> with contact <b>" .$gCont . "</b> and <b>" . $gAddr ."</b>";
  } else  if(mysqli_num_rows($resultGt) > 1){
    $gSuppp = "<b>" .$gName ."</b> is a guarantor, a <b>" . $gJob . "</b> with contact <b>" .$gCont . "</b> and <b>" . $gAddr ."</b>";
    $gSupp = $gSuppp . ",\n also ". $gSuppp;
  }

}
  if(empty($cnSum)) 
  {
    $Contri="No Contributions in in the last 12 months";
  } else {
    $Contri = "A total of <b>" .$cnSum. "</b> has been contributed in <b>" .$cnNum ."</b> number of payments in the last 12 months";
  }
  if(strlen($coll)==0 or empty($coll))
  {
    $cSupp ="No Collateral";
  } else {
   $cSupp = "A collateral of <b>" .$coll. "</b> at <b>" .$colloc. "</b> worth <b>" .$colval. "</b> with title <b>" .$colt. "</b> - " .$cold;
  }

  echo '
  <div class="tab-row" style="height:100px">
     <div  class="cell" style="background-color:#ecffdc;height:95px;width:33.3%"><b>CONTRIBUTIONS: </b> <br>' .$Contri. '</div>
     <div  class="cell" style="background-color:#ecffdc;height:95px;width:33.3%"><b>GUARANTORS: </b> <br>' .$gSupp. '</div>
     <div  class="cell" style="background-color:#ecffdc;height:95px;width:33.3%"><b>COLLATERALS: </b> <br>' .$cSupp. '</div>
  </div>';
//FFEBE5
  echo '
  <div class="tab-row" style="height:100px">
     <div  class="cell" style="background-color:#9fe2bf;height:95px;width:25%"><b><i class="fa fa-arrow-up"></i> SAVINGS BALANCE: <i class="fa fa-arrow-up"></i></b> <br>' .$savess. '</div>
     <div  class="cell" style="background-color:#aaff00;height:95px;width:25%"><b><i class="fa fa-arrow-up"></i> GUARANTOR CRITERIA: <i class="fa fa-arrow-up"></i></b> <br>' .$greqq. '</div>
     <div  class="cell" style="background-color:#40b5ad;height:95px;width:25%"><b><i class="fa fa-arrow-up"></i> COLLATERAL CRITERIA: <i class="fa fa-arrow-up"></i></b> <br>' .$creqq. '</div>
     <div  class="cell" style="background-color:#000;color:fff;height:95px;width:25%"><b><i class="fa fa-arrow-up"></i> OTHER CRITERIA: <i class="fa fa-arrow-up"></i></b> <br>' .$qreqq. '</div>
  </div>';
  }


?>
</div>
</fieldset>
</div>
</section>
<?php
require_once 'footer.php';
?>
<?php
if($_REQUEST['tval']=="Your record has been saved.")
{
  echo "<script>alert('Transaction Successful!');</script>";
}
if($_REQUEST['tval']=="Your record has been updated.")
{
  echo "<script>alert('You Have Successfully Modified The Transaction');</script>";
}
?>