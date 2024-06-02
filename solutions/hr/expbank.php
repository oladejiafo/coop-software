<?php
 require_once 'conn.php';

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];
 
 function cleanData(&$str) 
 {
  $str = preg_replace("/\t/", "\\t", $str);
  $str = preg_replace("/\n/", "\\n", $str);
 } 

 $filename = "bank_" . date('Ymd') . $filter . ".xls";
 header("Content-Disposition: attachment; filename=\"$filename\"");
 header("Content-Type: application/vnd.ms-excel"); 
 $flag = false; 

 $result = mysql_query ("SELECT `pay`.`Staff Name` ,`pay`.`Acct No`, (`pay`.`GPAmount`-`pay`.`TDeduction`) as Amount,`pay`.`Bank`,`pay`.`Month`,`bank`.`SortCode` From `pay` left join `bank` on `pay`.`Bank`=`bank`.`Name` where `pay`.`Bank` like '$filter%' Group By `pay`.`Bank`,`pay`.`Staff Number` Order by `pay`.`Bank`,`pay`.`Staff Number`"); 

 while(false !== ($row = mysql_fetch_assoc($result))) 
  { 

   if(!$flag) 
   { 
    # display field/column names as first row 
    echo implode("\t", array_keys($row)) . "\n"; 
    $flag = true; 
   } 
   array_walk($row, 'cleanData'); 
   echo implode("\t", array_values($row)) . "\n"; 
  }

  $sql_tt = "SELECT `pay`.`Office`, `pay`.`Month`,`pay`.`Bank`,`pay`.`Acct No`, `TDeduction`,`GPAmount`, (sum(`pay`.`GPAmount`)-sum(`pay`.`TDeduction`)) as NP From `pay` Group By `pay`.`Bank`,`pay`.`Staff Number`";
  $result_tt = mysql_query($sql_tt,$conn) or die('Could not list value; ' . mysql_error());
  $row = mysql_fetch_array($result_tt);
  $nt=$row['NP'];

#   array_walk($nt, 'cleanData'); 
   echo $nt; 

?>