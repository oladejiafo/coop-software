<?php
 require_once 'conn.php';

 function cleanData(&$str) 
 {
  $str = preg_replace("/\t/", "\\t", $str);
  $str = preg_replace("/\n/", "\\n", $str);
 } 

 $filename = "Nominal_" . date('Ymd') . ".xls";
 header("Content-Disposition: attachment; filename=\"$filename\"");
 header("Content-Type: application/vnd.ms-excel"); 
 $flag = false; 

   $result = mysqli_query($conn,"SELECT `Staff Number`, `Firstname` , `Surname`,`Othername`,`Sex`,`Position`, `Level`,`Step`, `Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept`,`Marital Status`,`File Number`  From `staff` order by `Level` desc, `Present Appt`");

 while(false !== ($row = mysqli_fetch_assoc($result))) 
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