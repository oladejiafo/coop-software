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
$cmbFilter="None";
$filter="";
}
}
}
 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';
global $Tit;
$Tit=$_REQUEST['Tit'];
?>
<div align="center">
	<table border="0" width="807" bgcolor="#FFFFFF" id="table1">
		<tr align='center'>
 <td bgcolor="#008000"><b>
<font face="Verdana" color="#FFFFFF" style="font-size: 16pt">Staff Records</font></b>
 </td>
</tr>
		<tr>
			<td colspan="2">

   <form  action="stafflist.php" method="post">
    <body bgcolor="#D2DD8F">
      Select Criteria to Search with: <select size="1" name="cmbFilter">
      <option selected></option>
      <option value="Dept">Dept</option>
      <option value="Serving State">Serving State</option>
      <option value="Present Appt">Present Appt</option>
      <option value="Designation/Rank">Designation/Rank</option>
      <option value="Position">Position</option>
      <option value="Level">Level</option>
      <option value="State of Origin">State of Origin</option>
      <option value="LGA">LGA</option>
      <option value="Qualification">Qualification</option>
      <option value="Sex">Sex</option>
      <option value="Surname">Surname</option>
      <option value="Firstname">Firstname</option>
      <option value="Staff Number">Staff Number</option>
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
<form action="staff.php" method="post">
<TABLE width='90%' border='1' cellpadding='1' cellspacing='1' align='center' bordercolor="#005B00" id="table2">
 <?php
 $tval=$_GET['tval'];
 $limit      = 30;
 $page=$_GET['page'];

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];

if ($cmbFilter=="Serving State")
{
  $cmbFilter="Present Location";
}
else if ($cmbFilter=="Designation/Rank")
{
  $cmbFilter="Present Rank";
}
else if ($cmbFilter=="State of Origin")
{
  $cmbFilter="State";
}
else if ($cmbFilter=="Court Name/Office")
{
  $cmbFilter="Office";
}

 echo "<font color='#FF0000' style='font-size: 9pt'>" . $tval . "</font>";
 echo "<p>";

    echo "<b>[STAFF LIST]</b><br>";

    echo "<TR><TH><b><u>Staff No </b></u>&nbsp;</TH><TH><b><u>Surname </b></u>&nbsp;</TH><TH><b><u>First Name </b></u>&nbsp;</TH>
      <TH><b><u>Grade Level </b></u>&nbsp;</TH><TH><b><u>Designation </b></u>&nbsp;</TH></TR>";

  if (!$cmbFilter=="")
  {  
   $query_count    = "SELECT * FROM `staff` WHERE `" . $cmbFilter . "` like '" . $filter . "%'"; 
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $query="SELECT `Staff Number`,Surname,Firstname,Level,`Present Rank` FROM staff WHERE `" . $cmbFilter . "` like '" . $filter . "%' LIMIT $limitvalue, $limit";
   $result=mysql_query($query);

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!<br>"); 
   } 

    while(list($ServiceNo,$Surname,$Firstname,$gl,$Rank)=mysql_fetch_row($result))
    {
     echo "<TR><TH><a href = 'staff.php?SNO=" . $ServiceNo . "'>$ServiceNo </a> &nbsp;</TH><TH><a href = 'staff.php?SNO=" . $ServiceNo . "'> $Surname </a> &nbsp;</TH><TH>$Firstname &nbsp;</TH>
      <TH>$gl &nbsp;</TH><TH>$Rank &nbsp;</TH></TR>";
    }

    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREVIOUS PAGE</a> ... ");
    }
    else 
       echo("PREVIOUS PAGE  ");  

    $numofpages = $totalrows / $limit;  
#    for($i = 1; $i <= $numofpages; $i++)
#    { 
#        if($i == $page)
#        { 
#            echo($i."  "); 
#        }else{ 
#            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  ");  
#        }
#    } 
#    if(($totalrows % $limit) != 0)
#    { 
#        if($i == $page)
#        { 
#            echo($i."  "); 
#        }
#        else
#        { 
#            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  "); 
#       } 
#    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pagenext\">NEXT PAGE</a>");  
            
    }          
    else
    { 
        echo("NEXT PAGE");  
    } 
  }
  else
  {
   $query_count    = "SELECT * FROM `staff`"; 
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

    $query="SELECT `Staff Number`,Surname,Firstname,Level,`Present Rank` FROM staff order by Level desc LIMIT $limitvalue, $limit";
    $result=mysql_query($query);

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!<br>"); 
   } 

    while(list($ServiceNo,$Surname,$Firstname,$gl,$Rank)=mysql_fetch_row($result))
    {
     echo "<TR><TH><a href = 'staff.php?SNO=" . $ServiceNo . "'>$ServiceNo </a> &nbsp;</TH><TH><a href = 'staff.php?SNO=" . $ServiceNo . "'> $Surname </a> &nbsp;</TH><TH>$Firstname &nbsp;</TH>
      <TH>$gl &nbsp;</TH><TH>$Rank &nbsp;</TH></TR>";
    }

    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREVIOUS PAGE</a> ...  ");
    }
    else 
       echo("PREVIOUS PAGE ...  ");  

#    $numofpages = $totalrows / $limit;  
#    for($i = 1; $i <=$numofpages ; $i++)
#    { 
#        if($i == $page)
#        { 
#            echo($i."  "); 
#        }else{ 
#            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  ");  
#        }
#    } 
#    if(($totalrows % $limit) != 0)
#    { 
#        if($i == $page)
#        { 
#            echo($i."  "); 
#        }
#        else
#        { 
#            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  "); 
#       } 
#    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pagenext\">NEXT PAGE</a>");  
            
    }          
    else
    { 
        echo("NEXT PAGE");  
    } 

  }

 ?>
</TABLE>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00" id="table6">

  <?php
     echo "<TR>
               <TH><a href ='staff.php'> Add New Record </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
 require_once 'footr.php';
 require_once 'footer.php';
?>
</TABLE>
</form>

			<p>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
	</table>
</div>


