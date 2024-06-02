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
 require_once 'header.php';
 require_once 'style.php';
?>
   <div align="center">
	<table border="0" width="800" id="table1" bgcolor="#FFFFFF">

		<tr>
			<td>
			<div align="center">
				<table border="0" width="800" id="table2">
					<tr>
						<td>
   <form  action="pensionrpt.php" method="post">
    <body bgcolor="#D2DD8F">
     <h2><center>Pension Report</center></h2>
      Select Criteria to Filter with: <select size="1" name="cmbFilter">
      <option value="None">None</option>
      <option value="Court Name/Office">Court Name/Office</option>
      <option value="Dept">Dept</option>
      <option value="Level">Level</option>
      <option value="LGA">LGA</option>
      <option value="Designation/Rank">Designation/Rank</option>
      <option value="Serving State">Serving State</option>
      <option value="State of Origin">State of Origin</option>
      <option value="Pension Number">Staff Number</option>
      <option value="Control Number">Control Number</option>
     </select>
     &nbsp; 
     <input type="text" name="filter">
     &nbsp; 
     <input type="submit" value="Go" name="submit">
     <br>
    </body>
   </form>

<TABLE width='795' border='1' cellpadding='1' cellspacing='1' align='center' id="table3">
<?php
 $limit      = 15;
 $page=$_GET['page'];

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];
 
  echo " <tr><b>[PENSION REPORT]</b><br></tr>";
      echo "<TR bgcolor='#D2DD8F'><TH><b> Pension Number </b>&nbsp;</TH><TH><b> First Name </b>&nbsp;</TH><TH><b> Surname </b>&nbsp;</TH> <TH><b> Sex </b>&nbsp;</TH> <TH><b> Rank </b>&nbsp;</TH>
      <TH><b> Present Station </b>&nbsp;&nbsp;</TH><TH><b> Dept </b>&nbsp;&nbsp;</TH></TR>";

  if (trim(empty($cmbFilter)))
  {
   $query_count    = "SELECT * FROM `Pension`"; 
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `Staff Number`, `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept`  From `Pension` order by `Present Appt`,`Level`,`Step` desc LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

  while(list($serviceno, $fname,$sname, $sex, $rank, $dob, $firstappt, $presentappt, $state, $lga, $qualification, $location, $dept)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $fname </a> &nbsp;</TH><TH> $sname </a> &nbsp;</TH> <TH> $sex &nbsp;</TH> <TH> $rank &nbsp;</TH>
      <TH> $location &nbsp;</TH><TH> $dept &nbsp;</TH></TR>";
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
  else if (trim($cmbFilter)=="None")
  {
   $query_count    = "SELECT * FROM `Pension`"; 
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `Staff Number`, `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept`  From `Pension` order by `Present Appt`,`Level`,`Step` desc LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

  while(list($serviceno, $fname,$sname, $sex, $rank, $dob, $firstappt, $presentappt, $state, $lga, $qualification, $location, $dept)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $fname </a> &nbsp;</TH><TH> $sname </a> &nbsp;</TH> <TH> $sex &nbsp;</TH> <TH> $rank &nbsp;</TH>
      <TH> $location &nbsp;</TH><TH> $dept &nbsp;</TH></TR>";
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
  else if (trim($cmbFilter)=="Dept")
  {  
   $query_count    = "SELECT * FROM `Pension` WHERE Dept='" . $filter . "'"; 
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `Staff Number`,  `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept` From `pension` WHERE Dept='" . $filter . "' order by `Present Appt`,`Level`,`Step` desc LIMIT $limitvalue, $limit");    

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

  while(list($serviceno, $fname,$sname, $sex, $rank, $dob, $firstappt, $presentappt, $state, $lga, $qualification, $location, $dept)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $fname </a> &nbsp;</TH><TH> $sname </a> &nbsp;</TH> <TH> $sex &nbsp;</TH> <TH> $rank &nbsp;</TH>
      <TH> $location &nbsp;</TH><TH> $dept &nbsp;</TH></TR>";
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
  else if (trim($cmbFilter)=="Serving State")
  {     
   $query_count    = "SELECT * FROM `Pension` WHERE `Present Location`='" . $filter . "'"; 
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }

   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `Staff Number`,  `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept` From `pension`  WHERE `Present Location`='" . $filter . "' order by `Present Appt`,`Level`,`Step` desc LIMIT $limitvalue, $limit"); 

  if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

  while(list($serviceno, $fname,$sname, $sex, $rank, $dob, $firstappt, $presentappt, $state, $lga, $qualification, $location, $dept)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $fname </a> &nbsp;</TH><TH> $sname </a> &nbsp;</TH> <TH> $sex &nbsp;</TH> <TH> $rank &nbsp;</TH>
      <TH> $location &nbsp;</TH><TH> $dept &nbsp;</TH></TR>";
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
  else if (trim($cmbFilter)=="Designation/Rank")
  {  
   $query_count    = "SELECT * FROM `Pension` WHERE `Present Rank`='" . $filter . "'"; 
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `Staff Number`,  `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept` From `pension`  WHERE `Present Rank`='" . $filter . "' order by `Present Appt`,`Level`,`Step` desc LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

  while(list($serviceno, $fname,$sname, $sex, $rank, $dob, $firstappt, $presentappt, $state, $lga, $qualification, $location, $dept)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $fname </a> &nbsp;</TH><TH> $sname </a> &nbsp;</TH> <TH> $sex &nbsp;</TH> <TH> $rank &nbsp;</TH>
      <TH> $location &nbsp;</TH><TH> $dept &nbsp;</TH></TR>";
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
  else if (trim($cmbFilter)=="Level")
  {  
   $query_count    = "SELECT * FROM `Pension` WHERE `Level`='" . $filter . "'"; 
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `Staff Number`,  `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept` From `pension`  WHERE `Level`='" . $filter . "' order by `Present Appt`,`Level`,`Step` desc LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

  while(list($serviceno, $fname,$sname, $sex, $rank, $dob, $firstappt, $presentappt, $state, $lga, $qualification, $location, $dept)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $fname </a> &nbsp;</TH><TH> $sname </a> &nbsp;</TH> <TH> $sex &nbsp;</TH> <TH> $rank &nbsp;</TH>
      <TH> $location &nbsp;</TH><TH> $dept &nbsp;</TH></TR>";
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
  else if (trim($cmbFilter)=="State of Origin")
  {  
   $query_count    = "SELECT * FROM `Pension` WHERE `State`='" . $filter . "'"; 
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `Staff Number`,  `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept` From `pension`  WHERE `State`='" . $filter . "' order by `Present Appt`,`Level`,`Step` desc LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

  while(list($serviceno, $fname,$sname, $sex, $rank, $dob, $firstappt, $presentappt, $state, $lga, $qualification, $location, $dept)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $fname </a> &nbsp;</TH><TH> $sname </a> &nbsp;</TH> <TH> $sex &nbsp;</TH> <TH> $rank &nbsp;</TH>
      <TH> $location &nbsp;</TH><TH> $dept &nbsp;</TH></TR>";
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
  else if (trim($cmbFilter)=="LGA")
  {  
   $query_count    = "SELECT * FROM `Pension` WHERE `LGA`='" . $filter . "'"; 
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `Staff Number`,  `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept` From `pension`  WHERE `LGA`='" . $filter . "' order by `Present Appt`,`Level`,`Step` desc LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

  while(list($serviceno, $fname,$sname, $sex, $rank, $dob, $firstappt, $presentappt, $state, $lga, $qualification, $location, $dept)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $fname </a> &nbsp;</TH><TH> $sname </a> &nbsp;</TH> <TH> $sex &nbsp;</TH> <TH> $rank &nbsp;</TH>
      <TH> $location &nbsp;</TH><TH> $dept &nbsp;</TH></TR>";
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
  else if (trim($cmbFilter)=="Court Name/Office")
  {  
   $query_count    = "SELECT * FROM `Pension` WHERE `Office` like '" . $filter . "%'"; 
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `Staff Number`,  `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept` From `Pension`  WHERE `Office` like '" . $filter . "%' order by `staff number`,`Present Appt`,`Level`,`Step` desc LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

  while(list($serviceno, $fname,$sname, $sex, $rank, $dob, $firstappt, $presentappt, $state, $lga, $qualification, $location, $dept)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $fname </a> &nbsp;</TH><TH> $sname </a> &nbsp;</TH> <TH> $sex &nbsp;</TH> <TH> $rank &nbsp;</TH>
      <TH> $location &nbsp;</TH><TH> $dept &nbsp;</TH></TR>";
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
  else if (trim($cmbFilter)=="Pension Number")
  {  
   $query_count    = "SELECT * FROM `Pension` WHERE `Staff Number` like '" . $filter . "%'"; 
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `Staff Number`,  `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept` From `pension`  WHERE `Staff Number`='" . $filter . "' order by `Present Appt`,`Level`,`Step` desc LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

  while(list($serviceno, $fname,$sname, $sex, $rank, $dob, $firstappt, $presentappt, $state, $lga, $qualification, $location, $dept)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $fname </a> &nbsp;</TH><TH> $sname </a> &nbsp;</TH> <TH> $sex &nbsp;</TH> <TH> $rank &nbsp;</TH>
      <TH> $location &nbsp;</TH><TH> $dept &nbsp;</TH></TR>";
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
  else if (trim($cmbFilter)=="Control Number")
  {  
   $query_count    = "SELECT * FROM `Pension` WHERE `File Number` like '" . $filter . "%'"; 
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `Staff Number`,  `Firstname` , `Surname`, `Sex`,`Present Rank`,`DoB`,`First Appt`,`Present Appt`,`State`,`LGA`,`Qualification`, `Present Location`, `Dept` From `pension`  WHERE `File Number`='" . $filter . "' order by `Present Appt`,`Level`,`Step` desc LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

  while(list($serviceno, $fname,$sname, $sex, $rank, $dob, $firstappt, $presentappt, $state, $lga, $qualification, $location, $dept)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $fname </a> &nbsp;</TH><TH> $sname </a> &nbsp;</TH> <TH> $sex &nbsp;</TH> <TH> $rank &nbsp;</TH>
      <TH> $location &nbsp;</TH><TH> $dept &nbsp;</TH></TR>";
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



  while(list($serviceno, $fname,$sname, $sex, $rank, $dob, $firstappt, $presentappt, $state, $lga, $qualification, $location, $dept)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $fname </a> &nbsp;</TH><TH> $sname </a> &nbsp;</TH> <TH> $sex &nbsp;</TH> <TH> $rank &nbsp;</TH>
      <TH> $location &nbsp;</TH><TH> $dept &nbsp;</TH></TR>";
   }

?>
<br>
<form>
<Table>
<tr>
<td>

<?php
 echo "<a target='blank' href='rptpensionrpt.php?cmbFilter=$cmbFilter&filter=$filter'> Print this Pension Report</a> &nbsp; ";
# echo "| <a target='blank' href='expnominal.php'> Export this Nominal Roll</a> &nbsp; ";
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
