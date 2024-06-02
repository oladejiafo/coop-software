<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5 & $_SESSION['access_lvl'] != 4))
{
 if ($_SESSION['access_lvl'] != 1 & $_SESSION['access_lvl'] !=11 & $_SESSION['access_lvl'] !=111 & $_SESSION['access_lvl'] 
!= 2 & $_SESSION['access_lvl'] != 22 & $_SESSION['access_lvl'] != 44){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don�t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn�t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
$cmbFilter="None";
$filter="";
}
}

 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';

?>
<div align="center">
	<table border="0" width="100%" bgcolor="#394247" id="table1">

		<tr>
			<td bgcolor="#FFFFFF" align="center" width="80%" valign=top>
	<table border="0" width="100%" bgcolor="#FFFFFF" id="table1">
		<tr align='center'>
 <td bgcolor="" colspan="10"><b>
<font face="Verdana" color="" style="font-size: 16pt">Staff Nominal Roll</font></b>
 </td>
</tr>
		<tr>
			<td colspan="10">

   <form  action="reports.php" method="post">
    <body bgcolor="#D2DD8F">
      Select Criteria to Filter with: <select size="1" name="cmbFilter">
      <option value="None">None</option>
      <option value="Cadre">Cadre</option>
      <option value="Dept">Dept</option>
      <option value="Level">Level</option>
      <option value="LGA">LGA</option>
      <option value="Location">Location</option>
      <option value="Office">Office</option>
      <option value="Position">Position</option>
      <option value="Rank">Rank</option>
      <option value="State of Origin">State of Origin</option>
      <option value="Staff Number">Staff Number</option>
     </select>
     &nbsp; 
     <input type="text" name="filter">
     <input type="hidden" name="cmbReport" value="Nominal Roll">    
     &nbsp; 
     <input type="submit" value="Go" name="submit">
     <br>
    </body>
   </form>

<?php

  echo " <br><tr><b>NOMINAL ROLL FOR: " . ucfirst($filter) . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; AS AT: " . date('d-M-Y') . "</b><br></tr>";
      echo "<TR bgcolor='#c0c0c0'><TH valign='top'><b> Staff <br>ID No </b></TH><TH valign='top'><b> Surname </b></TH><TH valign='top'><b>First <br>Name </b></TH><TH valign='top'><b> Sex </b></TH>
<TH valign='top'><b> Postition </b></TH><TH valign='top'><b> State of <br>Origin </b></TH> 
<TH valign='top'><b> LGA </b></TH> <TH valign='top'><b> DoB </b></TH><TH valign='top'><b> Location </b></TH> <TH valign='top'><b> Grade <br>Level </b></TH><TH valign='top'><b> Qualification</b></TH> <TH valign='top'><b> Marital <br>Status </b></TH><TH valign='top'><b> 1st Appt <br>Date </b></TH> 
<TH valign='top'><b> Pres. Appt <br>Date </b></TH><TH valign='top'><b> File <br>Number</b></TH></TR>";

  if (trim(empty($cmbFilter)) OR trim($cmbFilter)=="None" OR trim($cmbFilter)=="")
  {
   $result = mysqli_query($conn,"SELECT `Staff Number`, `Firstname` , `Surname`,`Othername`,`Sex`,`Position`, `Level`,`Step`, `Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept`,`Marital Status`,`File Number`  From `staff` order by `Level` desc, `Present Appt`"); 
  }
  else
  {     
   $result = mysqli_query($conn,"SELECT `Staff Number`, `Firstname` , `Surname`,`Othername`,`Sex`,`Position`, `Level`,`Step`, `Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept`,`Marital Status`,`File Number` From `staff` WHERE `" . $cmbFilter . "`='" . $filter . "' order by `Level` desc"); 
  }

   if(mysqli_num_rows($result) == 0)
   { 
        echo("Nothing to Display!<br>"); 
   } 

   while(list($serviceno, $fname,$sname, $oname, $sex,$pos, $level, $step, $rank,$dob, $firstappt, $presentappt, $state, $lga, $qualification, $location, $dept, $mstatus,$fno)=mysqli_fetch_row($result)) 
   {
      echo "<TR><TH valign='top'> $serviceno &nbsp;</TH><TH valign='top'> $sname &nbsp;</TH><TH valign='top'> $fname &nbsp;</TH><TH valign='top'>$sex &nbsp;</TH> <TH valign='top'>$pos &nbsp;</TH><TH valign='top'> $state &nbsp;</TH>
<TH valign='top'> $lga &nbsp;</TH><TH valign='top'> $dob </a> &nbsp;</TH><TH valign='top'> $location &nbsp;</TH>
<TH valign='top'> $level/$step &nbsp;</TH><TH valign='top'> $qualification &nbsp;</TH><TH valign='top'> $mstatus &nbsp;</TH> <TH valign='top'> $firstappt &nbsp;</TH><TH valign='top'> $presentappt &nbsp;</TH><TH valign='top'> $fno </a> &nbsp;</TH></TR>";
   }

?>
</TABLE>
<br>
<form>
<Table>
<tr>
<td>

<?php
 echo "<a target='blank' href='rptnominalroll.php?cmbFilter=$cmbFilter&filter=$filter'><font color='#6699CC'> Print this Nominal Roll</font></a> &nbsp; |";
 echo "| <a target='blank' href='expnominal.php?cmbFilter=$cmbFilter&filter=$filter'><font color='#6699CC'> Export this Nominal Roll</font></a> &nbsp; ";
?>
</td>
</tr>
</Table></form>