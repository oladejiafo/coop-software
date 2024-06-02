<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don’t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn’t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
}
 require_once 'conn.php';
?>

     <h1><b><center></center></b></h1>
     <h2><center>SYSTEM AUTO-LOG PRINTOUT</center></h2>

<TABLE width='100%' border='1' cellpadding='0' cellspacing='0' align='center' id="table3">
<?php

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];

   echo "Filtered using: " . $cmbFilter . "=" . $filter;
   echo "<TR bgcolor='#D2DD8F'><TH><b> User Category </b>&nbsp;</TH><TH><b> User Name </b>&nbsp;</TH><TH><b> Date Logged </b>&nbsp;&nbsp;</TH><TH><b> Time Logged </b>&nbsp;</TH> <TH><b> File Used </b>&nbsp;</TH> <TH><b> Details </b>&nbsp;</TH></TR>";

  if (trim(empty($cmbFilter)))
  {
   $result = mysql_query ("SELECT `User Category`, `User Name` , `Date Logged On`, `Time Logged On`,`File Used`,`Details` From monitor order by `Date Logged on` desc, `Time Logged On` desc"); 
  } 
  else if (trim($cmbFilter)=="Show All (Asc)")
  {
   $result = mysql_query ("SELECT `User Category`, `User Name` , `Date Logged On`, `Time Logged On`,`File Used`,`Details` From monitor order by `Date Logged on` asc, `Time Logged On` asc"); 
  }
  else if (trim($cmbFilter)=="" or trim($cmbFilter)=="Show All (Desc)")
  {
   $result = mysql_query ("SELECT `User Category`, `User Name` , `Date Logged On`, `Time Logged On`,`File Used`,`Details` From monitor order by `Date Logged on` desc, `Time Logged On` desc"); 
  }
  else if (trim($cmbFilter)=="User Category")
  {  
   $result = mysql_query ("SELECT `User Category`, `User Name` , `Date Logged On`, `Time Logged On`,`File Used`,`Details` From `monitor` WHERE `User Category`='" . $filter . "' order by `Date Logged On` Desc, `Time Logged On` desc");    
  }
  else if (trim($cmbFilter)=="User Name")
  {  
   $result = mysql_query ("SELECT `User Category`, `User Name` , `Date Logged On`, `Time Logged On`,`File Used`,`Details` From `monitor` WHERE `User Name`='" . $filter . "' order by `Date Logged On` Desc, `Time Logged On` desc");
  }
  else if (trim($cmbFilter)=="Date Logged")
  {  
   $result = mysql_query ("SELECT `User Category`, `User Name` , `Date Logged On`, `Time Logged On`,`File Used`,`Details` From `monitor` WHERE `Date Logged On`='" . $filter . "' order by `Date Logged On` Desc, `Time Logged On` desc");
  }

  while(list($cat, $name,$datel, $timel, $fileu, $det)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $cat &nbsp;</TH><TH> $name &nbsp;</TH><TH> $datel &nbsp;</TH> <TH> $timel &nbsp;</TH> <TH> $fileu &nbsp;</TH>
      <TH> $det &nbsp;</TH></TR>";
   }

?>
</TABLE>
<br>
