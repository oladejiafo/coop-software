<?php
 require_once 'conn.php';

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];

 function cleanData(&$str) 
 {
  $str = preg_replace("/\t/", "\\t", $str);
  $str = preg_replace("/\n/", "\\n", $str);
 } 

 $filename = "Retirement_" . date('Ymd') . ".xls";
 header("Content-Disposition: attachment; filename=\"$filename\"");
 header("Content-Type: application/vnd.ms-excel"); 
 $flag = false; 

  $result = mysql_query ("SELECT `Staff Number`, `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept`  From `staff` where (((" . date('Y') . "-year(`First Appt`)) >= 35) or ((" . date('Y') . "-year(`Dob`)) >= 60)) and date(`DoB`)<>date('0000-00-00') order by `Level` desc,`Present Appt` desc"); 

  if (trim($cmbFilter)=="All")
  {
   $result = mysql_query ("SELECT `Staff Number`, `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept`  From `staff` where (((" . date('Y') . "-year(`First Appt`)) >= 35) or ((" . date('Y') . "-year(`Dob`)) >= 60)) and date(`DoB`)<>date('0000-00-00') order by `Level` desc,`Present Appt` desc"); 
  }
  else if (trim($cmbFilter)=="By MDA")
  {
   $result = mysql_query ("SELECT `Staff Number`,  `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept` From `staff` WHERE `Present Location` like '$filter%' and (((" . date('Y') . "-year(`First Appt`)) >= 35) or ((" . date('Y') . "-year(`Dob`)) >= 60)) and date(`DoB`)<>date('0000-00-00') order by `Level` desc,`Present Appt` desc");
  }
  else if (trim($cmbFilter)=="Staff Number")
  {
   $result = mysql_query ("SELECT `Staff Number`,  `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept` From `staff`  WHERE `Staff Number`='" . $filter . "' and (((" . date('Y') . "-year(`Dob`)) >= 60)) and year(`DoB`)<>date('0000-00-00')  order by `Level` desc,`Present Appt` desc"); 
  }

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