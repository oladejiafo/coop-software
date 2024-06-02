<?php 
require_once 'conn.php';
$sqr="SELECT * FROM `company info`";
$reslt = mysqli_query($conn,$sqr) or die('Could not look up user data; ' . mysqli_error());
$rw = mysqli_fetch_array($reslt);
$coy=$rw['Company Name'];
# require_once 'header.php';
# require_once 'style.php';

$cmbType=$_REQUEST['cmbType'];
$ID=$_REQUEST['ID'];
?>
<h2><b><left><?php echo $coy; ?> </left></b></h2>
<h3><b><left>Tax Breakdown</left></b></h3>
<?php
####################
 $result_all = mysqli_query($conn,"SELECT sum(`Amount`) as amt From `allowances` Where `Show`='Show' and `Grade Level`='$ID' and `Type` in ('Basic','Allowance','Allowance (Other)')"); 
 $rowa = mysqli_fetch_array($result_all);
# echo "<b> Total Taxable Allowance =" . $rowa['amt'] . "</b><br>";

 $result_pall = mysqli_query($conn,"SELECT sum((`pallowances`.`Percent` *  `allowances`.`Amount`)/100) as pamt FROM  `allowances` LEFT JOIN  `pallowances` ON  `allowances`.`Grade level` =  `pallowances`.`Grade Level` Where `pallowances`.`Show`='Show' and `allowances`.`Description`='Basic' and `pallowances`.`Grade Level`='$ID' and `pallowances`.`Type` in ('Basic','Allowance','Allowance (Other)')"); 
 $rowp = mysqli_fetch_array($result_pall);
# echo $rowp['pamt'] . "<br>";

 $result_ded = mysqli_query($conn,"SELECT sum(`Amount`) as ded From `allowances` Where `Show`='Show' and `Grade Level`='$ID' and `Type` in ('Deduction') and `Description` Not In ('Tax')"); 
 $rowd = mysqli_fetch_array($result_ded);
# echo $rowd['ded'] . "<br>";

 $result_pded = mysqli_query($conn,"SELECT sum((`pallowances`.`Percent` *  `allowances`.`Amount`)/100) as pded FROM  `allowances` LEFT JOIN  `pallowances` ON  `allowances`.`Grade level` =  `pallowances`.`Grade Level` Where `pallowances`.`Show`='Show' and `allowances`.`Type` in ('Basic','Allowance') and `pallowances`.`Description` Not In ('Tax') and `pallowances`.`Grade Level`='$ID' and `pallowances`.`Type` in ('Deduction')"); 
 $rowpd = mysqli_fetch_array($result_pded);
# echo $rowpd['pded'] . "<br>";

 $all_amt=$rowa['amt']+$rowp['pamt'];
 $ded_amt=$rowd['ded']+$rowpd['pded'];
##############
 echo "Total Taxable Allowances =" . $all_amt . "<br>";
 echo "Total Taxable Deductions =" . $ded_amt . "<br>";

$nontaxable=$all_amt-$ded_amt;

echo "<b> Total Taxable Income =" . $nontaxable . "</b><br>";

#########################
$result = mysqli_query($conn,"SELECT `ID`, `Range1`, `Range2`, `Percent` From `tax chart` order by `ID`"); 
$amt=0;
$bal=$nontaxable;
$sn=1;
while(list($idd, $r1,$r2, $percent)=mysqli_fetch_row($result)) 
{
  $r=$r2-$r1+1;
  if ($bal<0)
  {
   $rr=0;
  }else if ($bal>$r) {
   $rr=$r-($r*$percent/100);
   $xx=($r*$percent/100);
  } else if ($bal<$r) {
   $rr=$bal-($bal*$percent/100);
   $xx=($bal*$percent/100);
  }
  $bal=$bal-$r;
  $amt=$amt+$rr;

  echo "--------- --------- --------- --------- --------- --------- --------- --------- <br>" . $sn . "Range Difference =" . $r . " || Level Net Income=" . $rr . " || Level Tax=" . $xx . "<br>--------- --------- --------- --------- --------- --------- --------- --------- <br>";
  $sn=$sn+1;
}
$tx=$nontaxable-$amt;
echo "Total Net Income = " . $amt . "<br>";
echo "<b>Total Tax Payable =" . $tx . "</b>";
?>