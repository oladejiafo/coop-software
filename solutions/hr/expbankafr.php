<?php
 require_once 'conn.php';

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];
 
 function cleanData(&$str) 
 {
  $str = preg_replace("/\t/", "\\t", $str);
  $str = preg_replace("/\n/", "\\n", $str);
 } 

 $filename = "afribank_" . date('FY') . ".xls";
 header("Content-Disposition: attachment; filename=\"$filename\"");
 header("Content-Type: application/vnd.ms-excel"); 
 $flag = false; 

 $result = mysql_query ("SELECT `bank`.`Bank Account`,`bank`.`SortCode`,(`pay`.`GPAmount`-`pay`.`TDeduction`) as Amount,`pay`.`Staff Name`,`pay`.`Month`,`bank`.`Paypoint`,`pay`.`Bank`,`pay`.`Acct No` From `pay` left join `bank` on `pay`.`Bank`=`bank`.`Name` where `pay`.`Bank` like '$filter%' Group By `pay`.`Bank`,`pay`.`Staff Number` Order by `pay`.`Bank`,`pay`.`Staff Number`"); 
# $result = mysql_query ("SELECT `pay`.`Acct No`,`pay`.`BankID`, (`pay`.`GPAmount`-`pay`.`TDeduction`) as Amount,`pay`.`Staff Name`, `pay`.`Month` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `pay`.`Bank` like '$filter%' Group By `pay`.`Bank`,`pay`.`Staff Number` Order by `pay`.`Bank`,`pay`.`Staff Number`"); 

$sn=0;
   echo "SNo\t";
   echo "Bank Account\t";
   echo "Sort Code\t";
   echo "Amount\t";
   echo "Name\t";
   echo "Purpose\t";
   echo "Pay Point\t";
   echo "Bank\t";
   echo "Staff Account\n";

 while(false !== ($row = mysql_fetch_assoc($result))) 
 { 
  $sn=$sn+1;
   array_walk($row, 'cleanData');
   echo $sn . "\t";
   echo implode("\t", array_values($row)) . "\n"; 
 }

  $sql_tt = "SELECT (sum(`pay`.`GPAmount`)-sum(`pay`.`TDeduction`)) as amt From `pay` where `pay`.`Bank` like '$filter%'"; 
  $result_tt = mysql_query($sql_tt,$conn) or die('Could not list value; ' . mysql_error());
  $row = mysql_fetch_array($result_tt);
  $nt=$row['amt'];

#   array_walk($nt, 'cleanData'); 
   echo " \t";
   echo " \t";
   echo " \t";
   echo $nt; 
?>