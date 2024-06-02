<?php
 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & $_SESSION['access_lvl'] != 5) 
{
 if ($_SESSION['access_lvl'] != 3 & $_SESSION['access_lvl'] != 33 & $_SESSION['access_lvl'] != 333 & $_SESSION['access_lvl'] != 44 & $_SESSION['access_lvl'] != 4) 
 {
   $redirect = $_SERVER['PHP_SELF'];
   header("Refresh: 0; URL=index.php?redirect=$redirect");

 }
}

?>
   <div align="center">
	<table border="0" width="100%" id="table1" bgcolor="#c0c0c0">

		<tr>
			<td width="80%" valign="top">
			     <h2><center>Nominal Roll</center></h2>
			<div align="center">
				<table border="0" width="100%" id="table2">
					<tr>
						<td>
   <form  action="nominalroll.php" method="post">
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
     &nbsp; 
     <input type="submit" value="Go" name="submit">
     <br>
    </body>
   </form>

<TABLE width='100%' border='1' cellpadding='1' cellspacing='1' align='center' id="table3">
<?php
   @$limit      = 35;
   @$page=$_GET['page'];   

 @$cmbFilter=$_REQUEST["cmbFilter"];
 @$filter=$_REQUEST["filter"];
 
  if ($cmbFilter =="State of Origin")
  {
    $cmbFilter =="State";
  }

  echo " <br><tr><b>NOMINAL ROLL FOR: " . ucfirst($filter) . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; AS AT: " . date('d-M-Y') . "</b><br></tr>";
      echo "<TR bgcolor='#D2DD8F'><TH valign='top'><b> Staff <br>ID No </b></TH><TH valign='top'><b> Surname </b></TH><TH valign='top'><b>First <br>Name </b></TH><TH valign='top'><b> Sex </b></TH>
<TH valign='top'><b> Postition </b></TH><TH valign='top'><b> State of <br>Origin </b></TH> 
<TH valign='top'><b> LGA </b></TH> <TH valign='top'><b> DoB </b></TH><TH valign='top'><b> Location </b></TH> <TH valign='top'><b> Grade <br>Level </b></TH><TH valign='top'><b> Qualification</b></TH> <TH valign='top'><b> Marital <br>Status </b></TH><TH valign='top'><b> 1st Appt <br>Date </b></TH> 
<TH valign='top'><b> Pres. Appt <br>Date </b></TH><TH valign='top'><b> File <br>Number</b></TH></TR>";

  if (trim(empty($cmbFilter)) OR trim($cmbFilter)=="None" OR trim($cmbFilter)=="")
  {
   $query_count    = "SELECT * FROM `staff`"; 
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `Staff Number`, `Firstname` , `Surname`,`Othername`,`Sex`,`Position`, `Level`,`Step`, `Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept`,`Marital Status`,`File Number`  From `staff` order by `Level` desc, `Present Appt` LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!<br>"); 
   } 

   while(list($serviceno, $fname,$sname, $oname, $sex,$pos, $level, $step, $rank,$dob, $firstappt, $presentappt, $state, $lga, $qualification, $location, $dept, $mstatus,$fno)=mysql_fetch_row($result)) 
   {
      echo "<TR><TH valign='top'> $serviceno &nbsp;</TH><TH valign='top'> $sname &nbsp;</TH><TH valign='top'> $fname &nbsp;</TH><TH valign='top'>$sex &nbsp;</TH> <TH valign='top'>$pos &nbsp;</TH><TH valign='top'> $state &nbsp;</TH>
<TH valign='top'> $lga &nbsp;</TH><TH valign='top'> $dob </a> &nbsp;</TH><TH valign='top'> $location &nbsp;</TH>
<TH valign='top'> $level/$step &nbsp;</TH><TH valign='top'> $qualification &nbsp;</TH><TH valign='top'> $mstatus &nbsp;</TH> <TH valign='top'> $firstappt &nbsp;</TH><TH valign='top'> $presentappt &nbsp;</TH><TH valign='top'> $fno </a> &nbsp;</TH></TR>";
   }

    echo"</TABLE>";
    echo "<TR align='right'><TD>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"nominalroll.php?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREV PAGE</a> &nbsp;|| ");
    }
    else 
       echo("PREV PAGE  &nbsp;||");  


    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"nominalroll.php?cmbFilter=$cmbFilter&filter=$filter&page=$pagenext\">&nbsp; NEXT PAGE</a>");  
            
    }          
    else
    { 
        echo("&nbsp; NEXT PAGE");  
    } 
    echo "</TD></TR>";
  }
  else
  {     
   $query_count    = "SELECT * FROM `staff` WHERE `" . $cmbFilter . "`='" . $filter . "'"; 
   $result_count   = mysql_query($query_count); 
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }

   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `Staff Number`, `Firstname` , `Surname`,`Othername`,`Sex`,`Position`, `Level`,`Step`, `Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept`,`Marital Status`,`File Number` From `staff` WHERE `" . $cmbFilter . "`='" . $filter . "' order by `Level` desc LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!<br>"); 
   } 

   while(list($serviceno, $fname,$sname, $oname, $sex,$pos, $level, $step, $rank,$dob, $firstappt, $presentappt, $state, $lga, $qualification, $location, $dept, $mstatus,$fno)=mysql_fetch_row($result)) 
   {
      echo "<TR><TH valign='top'> $serviceno &nbsp;</TH><TH valign='top'> $sname &nbsp;</TH><TH valign='top'> $fname &nbsp;</TH><TH valign='top'>$sex &nbsp;</TH> <TH valign='top'>$pos &nbsp;</TH><TH valign='top'> $state &nbsp;</TH>
<TH valign='top'> $lga &nbsp;</TH><TH valign='top'> $dob </a> &nbsp;</TH><TH valign='top'> $location &nbsp;</TH>
<TH valign='top'> $level/$step &nbsp;</TH><TH valign='top'> $qualification &nbsp;</TH><TH valign='top'> $mstatus &nbsp;</TH> <TH valign='top'> $firstappt &nbsp;</TH><TH valign='top'> $presentappt &nbsp;</TH><TH valign='top'> $fno </a> &nbsp;</TH></TR>";
   }

    echo"</TABLE>";
    echo "<TR align='right'><TD>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"nominalroll.php?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREV PAGE</a> &nbsp;|| ");
    }
    else 
       echo("PREV PAGE  &nbsp;||");  


    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"nominalroll.php?cmbFilter=$cmbFilter&filter=$filter&page=$pagenext\">&nbsp; NEXT PAGE</a>");  
            
    }          
    else
    { 
        echo("&nbsp; NEXT PAGE");  
    } 
    echo "</TD></TR>";
  }
 
?>
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

<p align="right" style="margin-right:20px; margin-top:30px">
 <span class="style2"><font face="Arial" color="#666666">
 <img src="images/proudly.jpg" /> © 2014 <a target="_blank" href="http://www.waltergates.com">
    <font color="#666666">Waltergates</font></a></font></span></p>
</div>