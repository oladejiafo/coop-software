<?php
 require_once 'conn.php';

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];
 
  if ($cmbFilter =="State of Origin")
  {
    $cmbFilter =="State";
  }

 function cleanData(&$str) 
 {
  $str = preg_replace("/\t/", "\\t", $str);
  $str = preg_replace("/\n/", "\\n", $str);
 } 

 $filename = "NominalRoll_" . date('Ymd') . $filter . ".xls";
 header("Content-Disposition: attachment; filename=\"$filename\"");
 header("Content-Type: application/vnd.ms-excel"); 
 $flag = false; 

  if (trim(empty($cmbFilter)) OR trim($cmbFilter)=="None" OR trim($cmbFilter)=="")
  {
   $result = mysql_query ("SELECT `Staff Number`, `Firstname` , `Surname`,`Othername`, `Sex`,`Level`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept`  From `staff` order by `Level` desc, `Present Appt`"); 
  }
  else
  {     
   $result = mysql_query ("SELECT `Staff Number`, `Firstname` , `Surname`,`Othername`, `Sex`,`Level`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept`  From `staff` WHERE `" . $cmbFilter . "`='" . $filter . "' order by `Level` desc"); 
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