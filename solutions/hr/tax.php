<?php
 require_once 'conn.php';
$cmbType=$_REQUEST['cmbType'];
$ID=$_REQUEST['ID'];

####################
 $result_all = mysqli_query($conn,"SELECT sum(`Amount`) as amt From `allowances` Where `Show`='Show' and `Grade Level`='$ID' and `Type` in ('Basic','Allowance','Allowance (Other)')"); 
 $rowa = mysqli_fetch_array($result_all);
 #echo $rowa['amt'] . "<br>";

 $result_pall = mysqli_query($conn,"SELECT sum((`pallowances`.`Percent` *  `allowances`.`Amount`)/100) as pamt FROM  `allowances` LEFT JOIN  `pallowances` ON  `allowances`.`Grade level` =  `pallowances`.`Grade Level` Where `pallowances`.`Show`='Show' and `allowances`.`Description` =  'Basic' and `pallowances`.`Grade Level`='$ID' and `pallowances`.`Type` in ('Basic','Allowance','Allowance (Other)')"); 

 $rowp = mysqli_fetch_array($result_pall);
# echo $rowp['pamt'] . "<br>";

 $result_ded = mysqli_query($conn,"SELECT sum(`Amount`) as ded From `allowances` Where `Show`='Show' and `Grade Level`='$ID' and `Type` in ('Deduction') and `Description` Not In ('Tax')"); 
 $rowd = mysqli_fetch_array($result_ded);
# echo $rowd['ded'] . "<br>";

 $result_pded = mysqli_query($conn,"SELECT sum((`pallowances`.`Percent` *  `allowances`.`Amount`)/100) as pded FROM  `allowances` LEFT JOIN  `pallowances` ON  `allowances`.`Grade level` =  `pallowances`.`Grade Level` Where pallowances.`Show`='Show' and `allowances`.`Type` in ('Basic', 'Allowance') and `pallowances`.`Description` Not In ('Tax') and `pallowances`.`Grade Level`='$ID' and `pallowances`.`Type` in ('Deduction')"); 
 $rowpd = mysqli_fetch_array($result_pded);
# echo $rowpd['pded'] . "<br>";

 $all_amt=$rowa['amt']+$rowp['pamt'];
 $ded_amt=$rowd['ded']+$rowpd['pded'];
##############

$nontaxable=$all_amt-$ded_amt;
#echo $nontaxable . "<br>";

#########################
$result = mysqli_query($conn,"SELECT `ID`, `Range1`, `Range2`, `Percent` From `tax chart` order by `ID`"); 
$amt=0;
$bal=$nontaxable;
while(list($idd, $r1,$r2, $percent)=mysqli_fetch_row($result)) 
{
  $r=$r2-$r1+1;
  if ($bal<0)
  {
   $rr=0;
  }else if ($bal>$r) {
   $rr=$r-($r*$percent/100);
  } else if ($bal<$r) {
   $rr=$bal-($bal*$percent/100);
  }
  $bal=$bal-$r;
  $amt=$amt+$rr;
#echo "--------- <br>range=" . $r . " and net=" . $rr . " and bal=" . $bal . "<br>---------<br>";
}
$tx=$nontaxable-$amt;
#echo $amt . "<br>";
#echo $tx;

$query = "SELECT `AllowanceID`,`Description`,`Type`,`SortOrder`,`Group` FROM `allowance types` where `Description`='Tax'";
$result_a = mysqli_query($conn,$query);
$rows = mysqli_fetch_array($result_a);
$query_i="Insert into `allowances` (`AllowanceID`,`Description`,`Amount`,`Type`,`Grade Level`,`SortOrder`,`Typ`)
          Values ('" . $rows['AllowanceID'] . "','Tax','$tx','" . $rows['Type'] . "','$ID','" . $rows['SortOrder'] . "','" . $rows['Group'] . "')";
$result_i = mysqli_query($conn,$query_i);

header("location:payitems.php?ID=$ID&add=0&cmbType=$cmbType&descr=$description&redirect=$redirect");
?>