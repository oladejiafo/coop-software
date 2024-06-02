<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
 if ($_SESSION['access_lvl'] != 3){
 if ($_SESSION['access_lvl'] != 4){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don’t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn’t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
}
}
}
 require_once 'conn.php';
?>

     <h1><b><center></center></b></h1>
     <h2><center>Staff Nominal Roll</center></h2>

<TABLE width='100%' border='1' cellpadding='0' cellspacing='0' align='center' id="table3">
<?php

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];
 
  if ($cmbFilter =="State of Origin")
  {
    $cmbFilter =="State";
  }

  echo " <tr><b>NOMINAL ROLL FOR: " . ucfirst($filter) . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; AS AT: " . date('d-M-Y') . "</b><br></tr>";
      echo "<TR bgcolor='#D2DD8F'><TH><b> Staff Number </b>&nbsp;</TH><TH><b> Surname </b>&nbsp;</TH><TH><b> First Name </b>&nbsp;</TH><TH><b> Other Names </b>&nbsp;</TH><TH><b> Gender </b>&nbsp;</TH><TH><b> Grade Level </b>&nbsp;</TH><TH><b> Date of Birth </b>&nbsp;</TH> <TH><b> Substansive Post </b>&nbsp;</TH><TH><b> Pres. Appt Date </b>&nbsp;</TH>
      <TH><b> 1st Appt Date </b>&nbsp;</TH><TH><b> Qualification </b>&nbsp;</TH><TH><b> State of Origin </b>&nbsp;</TH><TH><b> LGA </b>&nbsp;</TH><TH><b> Marital Status </b>&nbsp;</TH><TH><b> Cadre </b>&nbsp;</TH><TH><b> Location </b>&nbsp;</TH><TH><b> Dept </b>&nbsp;</TH></TR>";

  if (trim(empty($cmbFilter)) OR trim($cmbFilter)=="None" OR trim($cmbFilter)=="")
  {
   $result = mysql_query ("SELECT `Staff Number`, `Firstname` , `Surname`,`Othername`, `Sex`,`Level`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept`,`Cadre`,`Marital Status`  From `staff` order by `Level` desc,`Present Appt`"); 
  }
  else
  {     
   $result = mysql_query ("SELECT `Staff Number`, `Firstname` , `Surname`,`Othername`, `Sex`,`Level`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept`,`Cadre`,`Marital Status`  From `staff` WHERE `" . $cmbFilter . "`='" . $filter . "' order by `Level` desc,`Present Appt`"); 
  }

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!<br>"); 
   } 

   while(list($serviceno, $fname,$sname, $oname, $sex, $level,$rank,$dob, $firstappt, $presentappt, $state, $lga, $qualification, $location, $dept,$cadre,$mstatus)=mysql_fetch_row($result)) 
   {
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $sname </a> &nbsp;</TH><TH> $fname </a> &nbsp;</TH><TH> $oname </a> &nbsp;</TH><TH> $sex &nbsp;</TH><TH> $level </a> &nbsp;</TH><TH> $dob </a> &nbsp;</TH><TH> $rank &nbsp;</TH><TH> $presentappt </a> &nbsp;</TH><TH> $firstappt &nbsp;</TH>
      <TH> $qualification &nbsp;</TH><TH> $state &nbsp;</TH><TH> $lga &nbsp;</TH><TH> $mstatus &nbsp;</TH><TH> $cadre &nbsp;</TH><TH> $location &nbsp;</TH><TH> $dept </a> &nbsp;</TH></TR>";
   }

?>
</TABLE>
<br>
