<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 3))
{
 if ($_SESSION['access_lvl'] != 5){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don’t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn’t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
}
}
 require_once 'conn.php';
?>

     <h1><b><center></center></b></h1>
     <h2><center>Pension Report</center></h2>

<TABLE width='105%' border='1' cellpadding='0' cellspacing='0' align='center' id="table3">
<?php

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];
 
      echo "<TR bgcolor='#D2DD8F'><TH><b><font size='2pt'> Pension Number </font></b>&nbsp;</TH><TH><b><font size='2pt'> First Name </font></b>&nbsp;</TH><TH><b><font size='2pt'> Surname </font></b>&nbsp;</TH> <TH><b><font size='2pt'> Sex </font></b>&nbsp;</TH> <TH><b><font size='2pt'> Rank </font></b>&nbsp;</TH>
      <TH><b><font size='2pt'> Date of Birth </font></b>&nbsp;</TH> <TH><b><font size='2pt'> Date of 1st Appt </font></b>&nbsp;</TH> <TH><b><font size='2pt'> State of Origin </font></b>&nbsp;&nbsp;</TH> 
      <TH><b><font size='2pt'> LGA </font></b>&nbsp;&nbsp;</TH><TH><b><font size='2pt'> Present Station </font></b>&nbsp;&nbsp;</TH></TR>";
  $result = mysql_query ("SELECT `Staff Number`, `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept`  From `Staff` order by `Present Appt`,`Level`,`Step` desc"); 
  if (trim($cmbFilter)=="None")
  {
   $result = mysql_query ("SELECT `Staff Number`, `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept`  From `Pension` order by `Present Appt`,`Level`,`Step` desc"); 
  }
  else if (trim($cmbFilter)=="Dept")
  {  
   $result = mysql_query ("SELECT `Staff Number`,  `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept` From `Pension` WHERE Dept='" . $filter . "' order by `Present Appt`,`Level`,`Step` desc");    
  }
  else if (trim($cmbFilter)=="Present Location")
  {  
   $result = mysql_query ("SELECT `Staff Number`,  `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept` From `Pension`  WHERE `Present Location`='" . $filter . "' order by `Present Appt`,`Level`,`Step` desc"); 
  }
  else if (trim($cmbFilter)=="Present Rank")
  {  
   $result = mysql_query ("SELECT `Staff Number`,  `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept` From `Pension`  WHERE `Present Rank`='" . $filter . "' order by `Present Appt`,`Level`,`Step` desc"); 
  }
  else if (trim($cmbFilter)=="Level")
  {  
   $result = mysql_query ("SELECT `Staff Number`,  `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept` From `Pension`  WHERE `Level`='" . $filter . "' order by `Present Appt`,`Level`,`Step` desc"); 
  }
  else if (trim($cmbFilter)=="Home State")
  {  
   $result = mysql_query ("SELECT `Staff Number`,  `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept` From `Pension`  WHERE `State`='" . $filter . "' order by `Present Appt`,`Level`,`Step` desc"); 
  }
  else if (trim($cmbFilter)=="LGA")
  {  
   $result = mysql_query ("SELECT `Staff Number`,  `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept` From `Pension`  WHERE `LGA`='" . $filter . "' order by `Present Appt`,`Level`,`Step` desc"); 
  }
  else if (trim($cmbFilter)=="Pension Number")
  {  
   $result = mysql_query ("SELECT `Staff Number`,  `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept` From `Pension`  WHERE `Staff Number`='" . $filter . "' order by `Present Appt`,`Level`,`Step` desc"); 
  }
  else if (trim($cmbFilter)=="Control Number")
  {  
   $result = mysql_query ("SELECT `Staff Number`,  `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept` From `Pension`  WHERE `File Number`='" . $filter . "' order by `Present Appt`,`Level`,`Step` desc"); 
  }

  while(list($serviceno, $fname,$sname, $sex, $rank, $dob, $firstappt, $presentappt, $state, $lga, $qualification, $location, $dept)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH><font size='2pt'> $serviceno &nbsp;</font></TH><TH><font size='2pt'> $fname </a> &nbsp;</font></TH><TH><font size='2pt'> $sname </a> &nbsp;</font></TH> <TH><font size='2pt'> $sex &nbsp;</font></TH> <TH><font size='2pt'> $rank &nbsp;</font></TH>
      <TH><font size='2pt'> $dob &nbsp;</font></TH> <TH><font size='2pt'> $firstappt &nbsp;</font></TH><TH><font size='2pt'> $state &nbsp;</font></TH> <TH><font size='2pt'> $lga &nbsp;</font></TH><TH><font size='2pt'> $location &nbsp;</font></TH></TR>";
   }

?>
</TABLE>
<br>
