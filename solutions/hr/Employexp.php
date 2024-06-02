<?php
 require_once 'conn.php';

 function cleanData(&$str) 
 {
  $str = preg_replace("/\t/", "\\t", $str);
  $str = preg_replace("/\n/", "\\n", $str);
 } 

 $filename = "Employ_" . date('Ymd') . ".xls";
 header("Content-Disposition: attachment; filename=\"$filename\"");
 header("Content-Type: application/vnd.ms-excel"); 
 $flag = false; 
 $result = mysql_query("SELECT `Staff Number`,`Employer`, `From`,`To`,`Location`,`Position` FROM `employment_history`") or die('Query failed!'); 
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

?>