<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 3))
{
 if ($_SESSION['access_lvl'] != 4){
 if ($_SESSION['access_lvl'] != 5){
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
 require_once 'header.php';
 require_once 'style.php';
?>
   <div align="center">
	<table border="0" width="850" id="table1" bgcolor="#FFFFFF">

		<tr>
			<td>
			<div align="center">
				<table border="0" width="780" id="table2">
					<tr>
						<td>
   <form  action="retirement.php" method="POST">
    <body bgcolor="#D2DD8F">
     <h2><center>Staff Due for Retirement</center></h2>
      Select Criteria to Filter with: <select size="1" name="cmbFilter">
      <option value="All">All</option>
      <option value="By MDA">By MDA</option>
      <option value="In 6 Months Time">In 6 Months Time</option>
      <option value="In 1 Year Time">In 1 Year Time</option>
      <option value="In 2 Years Time">In 2 Years Time</option>
     </select>
     &nbsp; 
     <input type="text" name="filter">
     &nbsp; 
     <input type="submit" value="Go" name="submit">
     <br>
    </body>
   </form>

<fieldset style="padding: 2">
<p><legend><b><i><font size="2" face="Tahoma" color="#008000"> <?php require_once 'hrheader.php'; ?>
</p></font></i></b></legend>
<TABLE width='848' border='1' cellpadding='1' cellspacing='1' align='center' id="table3">
<?php
 $limit      = 35;
 $page=$_GET['page'];

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];
  
 echo "<b><i>Filtered for: ";
 echo $cmbFilter;
 echo "</i></b>";
  echo " <tr><b>[STAFF DUE FOR RETIREMENT]</b><br></tr>";
      echo "<TR bgcolor='#D2DD8F'><TH><b> Staff Number </b>&nbsp;</TH><TH><b> First Name </b>&nbsp;</TH><TH><b> Surname </b>&nbsp;</TH> <TH><b> Sex </b>&nbsp;</TH> <TH><b> Rank </b>&nbsp;</TH>
      <TH><b> Office </b>&nbsp;&nbsp;</TH><TH><b> Grade Level </b>&nbsp;</TH><TH><b> State </b>&nbsp;</TH><TH><b> LGA </b>&nbsp;</TH><TH><b> 1st Appt Date </b>&nbsp;&nbsp;</TH><TH><b> DoB </b>&nbsp;&nbsp;</TH></TR>";

  if (trim(empty($cmbFilter)))
  {
   $query_count    = "SELECT * From `staff` where (((" . date('Y') . "-year(`First Appt`)) >= 35) or ((" . date('Y') . "-year(`Dob`)) >= 60)) and date(`DoB`)<>date('0000-00-00')";
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
        $page = 1;
   }

   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `Staff Number`, `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept`, `Level`, `State`, `LGA`  From `staff` where (((" . date('Y') . "-year(`First Appt`)) >= 35) or ((" . date('Y') . "-year(`Dob`)) >= 60)) and date(`DoB`)<>date('0000-00-00') order by `Level` desc,`Present Appt` desc LIMIT $limitvalue, $limit");

   if(mysql_num_rows($result) == 0)
   {
        echo("Nothing to Display!<br>");
   }

   while(list($serviceno, $fname,$sname, $sex, $rank, $dob, $firstappt, $presentappt, $state, $lga, $qualification, $location, $dept, $level, $state, $lga)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $fname </a> &nbsp;</TH><TH> $sname </a> &nbsp;</TH> <TH> $sex &nbsp;</TH> <TH> $rank &nbsp;</TH>
      <TH> $location &nbsp;</TH><TH> $level &nbsp;</TH><TH> $state &nbsp;</TH><TH> $lga &nbsp;</TH><TH> $firstappt &nbsp;</TH><TH> $dob &nbsp;</TH></TR>";
   }

    echo"</TABLE>";
    echo "<TR align='right'><TD>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREV PAGE</a> &nbsp;|| ");
    }
    else 
       echo("PREV PAGE  &nbsp;||");  


    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pagenext\">&nbsp; NEXT PAGE</a>");  
            
    }          
    else
    { 
        echo("&nbsp; NEXT PAGE");  
    } 
    echo "</TD></TR>";
  }
  elseif (trim($cmbFilter)=="All")
  {
   $query_count    = "SELECT * From `staff` where (((" . date('Y') . "-year(`First Appt`)) >= 35) or ((" . date('Y') . "-year(`Dob`)) >= 60)) and date(`DoB`)<>date('0000-00-00')";
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
        $page = 1;
   }

   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `Staff Number`, `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Level` From `staff` where (((" . date('Y') . "-year(`First Appt`)) >= 35) or ((" . date('Y') . "-year(`Dob`)) >= 60)) and date(`DoB`)<>date('0000-00-00') order by `Level` desc,`Present Appt` desc LIMIT $limitvalue, $limit"); 
   if(mysql_num_rows($result) == 0)
   {
        echo("Nothing to Display!<br>");
   }
   while(list($serviceno, $fname,$sname, $sex, $rank, $dob, $firstappt, $presentappt, $state, $lga, $qualification, $location, $dept,$level)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $fname </a> &nbsp;</TH><TH> $sname </a> &nbsp;</TH> <TH> $sex &nbsp;</TH> <TH> $rank &nbsp;</TH>
      <TH> $location &nbsp;</TH><TH> $level &nbsp;</TH><TH> $state &nbsp;</TH><TH> $lga &nbsp;</TH><TH> $firstappt &nbsp;</TH><TH> $dob &nbsp;</TH></TR>";
   }

    echo"</TABLE>";
    echo "<TR align='right'><TD>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREV PAGE</a> &nbsp;|| ");
    }
    else 
       echo("PREV PAGE  &nbsp;||");  


    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pagenext\">&nbsp; NEXT PAGE</a>");  
            
    }          
    else
    { 
        echo("&nbsp; NEXT PAGE");  
    } 
    echo "</TD></TR>";
  }
  else if (trim($cmbFilter)=="By MDA")
  {
   $query_count    = "SELECT * From `staff` where `Present Location` like '$filter%' and (((" . date('Y') . "-year(`First Appt`)) >= 35) or ((" . date('Y') . "-year(`Dob`)) >= 60)) and date(`DoB`)<>date('0000-00-00')";
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
        $page = 1;
   }

   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `Staff Number`,  `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept`,`Level` From `staff` WHERE `Present Location` like '$filter%' and (((" . date('Y') . "-year(`First Appt`)) >= 35) or ((" . date('Y') . "-year(`Dob`)) >= 60)) and date(`DoB`)<>date('0000-00-00') order by `Level` desc,`Present Appt` desc LIMIT $limitvalue, $limit");    

   if(mysql_num_rows($result) == 0)
   {
        echo("Nothing to Display!");
   }

   while(list($serviceno, $fname,$sname, $sex, $rank, $dob, $firstappt, $presentappt, $state, $lga, $qualification, $location, $dept,$level)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $fname </a> &nbsp;</TH><TH> $sname </a> &nbsp;</TH> <TH> $sex &nbsp;</TH> <TH> $rank &nbsp;</TH>
      <TH> $location &nbsp;</TH><TH> $firstappt &nbsp;</TH><TH> $dob &nbsp;</TH><TH> $level &nbsp;</TH><TH> $state &nbsp;</TH><TH> $lga &nbsp;</TH></TR>";
   }

    echo"</TABLE>";
    echo "<TR align='right'><TD>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREV PAGE</a> &nbsp;|| ");
    }
    else 
       echo("PREV PAGE  &nbsp;||");  

    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pagenext\">&nbsp; NEXT PAGE</a>");              
    }          
    else
    { 
        echo("&nbsp; NEXT PAGE");  
    } 
    echo "</TD></TR>";

  }
  else if (trim($cmbFilter)=="In 1 Year Time")
  {
   $query_count    = "SELECT * From `staff` where `Present Location` like '$filter%' and (((" . date('Y') . "+1-year(`First Appt`)) >= 35) or ((" . date('Y') . "+1-year(`Dob`)) >= 60)) and date(`DoB`)<>date('0000-00-00')";
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
        $page = 1;
   }

   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `Staff Number`,  `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept`,`Level` From `staff` WHERE `Present Location` like '$filter%' and (((" . date('Y') . "+1-year(`First Appt`)) >= 35) or ((" . date('Y') . "+1-year(`Dob`)) >= 60)) and date(`DoB`)<>date('0000-00-00') order by `Level` desc,`Present Appt` desc LIMIT $limitvalue, $limit");    

   if(mysql_num_rows($result) == 0)
   {
        echo("Nothing to Display!");
   }

   while(list($serviceno, $fname,$sname, $sex, $rank, $dob, $firstappt, $presentappt, $state, $lga, $qualification, $location, $dept,$level)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $fname </a> &nbsp;</TH><TH> $sname </a> &nbsp;</TH> <TH> $sex &nbsp;</TH> <TH> $rank &nbsp;</TH>
      <TH> $location &nbsp;</TH><TH> $firstappt &nbsp;</TH><TH> $dob &nbsp;</TH><TH> $level &nbsp;</TH><TH> $state &nbsp;</TH><TH> $lga &nbsp;</TH></TR>";
   }

    echo"</TABLE>";
    echo "<TR align='right'><TD>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREV PAGE</a> &nbsp;|| ");
    }
    else 
       echo("PREV PAGE  &nbsp;||");  

    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pagenext\">&nbsp; NEXT PAGE</a>");              
    }          
    else
    { 
        echo("&nbsp; NEXT PAGE");  
    } 
    echo "</TD></TR>";

  }
  else if (trim($cmbFilter)=="In 2 Years Time")
  {
   $query_count    = "SELECT * From `staff` where `Present Location` like '$filter%' and (((" . date('Y') . "+2-year(`First Appt`)) >= 35) or ((" . date('Y') . "+2-year(`Dob`)) >= 60)) and date(`DoB`)<>date('0000-00-00')";
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
        $page = 1;
   }

   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `Staff Number`,  `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept`,`Level` From `staff` WHERE `Present Location` like '$filter%' and (((" . date('Y') . "+2-year(`First Appt`)) >= 35) or ((" . date('Y') . "+2-year(`Dob`)) >= 60)) and date(`DoB`)<>date('0000-00-00') order by `Level` desc,`Present Appt` desc LIMIT $limitvalue, $limit");    

   if(mysql_num_rows($result) == 0)
   {
        echo("Nothing to Display!");
   }

   while(list($serviceno, $fname,$sname, $sex, $rank, $dob, $firstappt, $presentappt, $state, $lga, $qualification, $location, $dept,$level)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $fname </a> &nbsp;</TH><TH> $sname </a> &nbsp;</TH> <TH> $sex &nbsp;</TH> <TH> $rank &nbsp;</TH>
      <TH> $location &nbsp;</TH><TH> $firstappt &nbsp;</TH><TH> $dob &nbsp;</TH><TH> $level &nbsp;</TH><TH> $state &nbsp;</TH><TH> $lga &nbsp;</TH></TR>";
   }

    echo"</TABLE>";
    echo "<TR align='right'><TD>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREV PAGE</a> &nbsp;|| ");
    }
    else 
       echo("PREV PAGE  &nbsp;||");  

    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pagenext\">&nbsp; NEXT PAGE</a>");              
    }          
    else
    { 
        echo("&nbsp; NEXT PAGE");  
    } 
    echo "</TD></TR>";

  }
  else if (trim($cmbFilter)=="Staff Number")
  {
   $query_count    = "SELECT * From `staff` where `Staff Number`='" . $filter . "' and (((" . date('Y') . "-date(`Dob`)) >= 70)) and date(`DoB`)<>date('0000-00-00') ";
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
        $page = 1;
   }

   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `Staff Number`,  `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept` From `staff`  WHERE `Staff Number`='" . $filter . "' and (((" . date('Y') . "-date(`Dob`)) >= 60)) and date(`DoB`)<>date('0000-00-00')  order by `Level` desc,`Present Appt` desc LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   {
        echo("Nothing to Display!");
   }

   while(list($serviceno, $fname,$sname, $sex, $rank, $dob, $firstappt, $presentappt, $state, $lga, $qualification, $location, $dept)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $fname </a> &nbsp;</TH><TH> $sname </a> &nbsp;</TH> <TH> $sex &nbsp;</TH> <TH> $rank &nbsp;</TH>
      <TH> $location &nbsp;</TH><TH> $firstappt &nbsp;</TH><TH> $dob &nbsp;</TH></TR>";
   }

    echo"</TABLE>";
    echo "<TR align='right'><TD>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREV PAGE</a> &nbsp;|| ");
    }
    else 
       echo("PREV PAGE  &nbsp;||");  


    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pagenext\">&nbsp; NEXT PAGE</a>");  
            
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
 echo "<a target='blank' href='rptretirement.php?cmbFilter=$cmbFilter&filter=$filter'> Print this List</a> &nbsp; |";
 echo "| <a href='expretirement.php?cmbFilter=$cmbFilter&filter=$filter'> Export this List</a> &nbsp; ";
?>
</td>
</tr>
</Table
</form>

<?php
 require_once 'footr.php';
 require_once 'footer.php';
?>
</td>
					</tr>

				</table>
			</div>
			</td>
		</tr>

	</table>
</div>
