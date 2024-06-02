<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 1)& ($_SESSION['access_lvl'] != 3)& ($_SESSION['access_lvl'] != 5))
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
		<tr align="center">
		 <td bgcolor="#008000"><b>
<font face="Verdana" color="#FFFFFF" style="font-size: 16pt">Table Updates</font></b>
 </td>
		</tr>
		<tr>
			<td>
			<div align="center">
				<table border="0" width="800" id="table2">
					<tr>
						<td>

   <form  action="tableupdates.php" method="GET">
    <body bgcolor="#D2DD8F">
      Select Table and click open: <select size="1" name="cmbTable">
      <option selected>- Select Table Here-</option>
      <option>Allowance Type</option>
      <option>Asset Category</option>
      <option>Asset Status</option>
      <option>Bank</option>
      <option>Location</option>
      <option>Department</option>
      <option>Grade Level</option>
      <option>LGA</option>
      <option>Loan Types</option>
      <option>Nationality</option>
      <option>Offices</option>
      <option>Pension Bank Charges</option>
      <option>Pension Managers</option>
      <option>Position</option>
      <option>Profession</option>
      <option>Qualification</option>
      <option>Rank</option>
      <option>Staff Category</option>
      <option>Staff Status</option>
      <option>State</option>
      <option>Variation Types</option>
     </select>
     &nbsp; 
     <input type="submit" value="Open" name="submit">
     <br>
    </body>
   </form>

<TABLE width='795' border='1' cellpadding='1' cellspacing='1' align='center' id="table3">
<?php

# $cmbTable=$_POST["cmbTable"];
  $cmbTable=$_GET['cmbTable']; 
  if (trim($cmbTable)=="- Select Table Here-")
  {
        echo "<b>Please Select a table from the drop-down box and click 'Open'.<b>";        
  }
  elseif (trim($cmbTable)=="Allowance Type")
  {
 $limit      = 15; 
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `allowance types`";     
 $result_count   = mysql_query($query_count);     
 $totalrows  = mysql_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  

    echo " <tr><b>[Allowance Types Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH><b> Allowance ID </b>&nbsp;</TH><TH><b> Description </b>&nbsp;</TH><TH><b> Type </b>&nbsp;</TH> <TH><b> SortOrder </b>&nbsp;</TH> <TH><b> Group </b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `AllowanceID`, `Description` , `Type`, `SortOrder`,`Group` From `allowance types` order by `Type`,`AllowanceID` LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 
    $val='Allowance Type';

    while(list($allowanceid, $description,$type, $sortorder, $group)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH><a href='allowtupdate.php?ID=" . $allowanceid . "'> $allowanceid </a>&nbsp;</TH><TH> $description  &nbsp;</TH><TH> $type &nbsp;</TH> <TH> $sortorder &nbsp;</TH> <TH> $group &nbsp;</TH></TR>";
    } 

    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysql_free_result($result);
 ?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='allowtupdate.php'> Add New Allowance Type </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }
  elseif (trim($cmbTable)=="Bank")
  {  
 $limit      = 10; 
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `bank`";     
 $result_count   = mysql_query($query_count);     
 $totalrows  = mysql_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  

    echo " <tr><b>[Banks Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH><b> Bank ID </b>&nbsp;</TH><TH><b> Bank Name </b>&nbsp;</TH><TH><b> Branch </b>&nbsp;</TH> <TH><b> Online </b>&nbsp;</TH> <TH><b> Location </b>&nbsp;</TH><TH><b> SortCode </b>&nbsp;</TH><TH><b> Paypoint </b>&nbsp;</TH><TH><b> Bank Acct </b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `BankCode`, `Name` , `Branch`, `Online`,`Location`,SortCode,Banker,`Bank Account` From `bank` order by `BankCode` LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 
    $val='Bank';

    while(list($bankid, $name,$branch, $online, $location,$sortcode,$paypoint,$bacct)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH><a href='bankupdate.php?ID=" . $bankid . "'> $bankid </a>&nbsp;</TH><TH><a href='bankupdate.php?ID=" . $bankid . "'> $name </a>&nbsp;</TH><TH> $branch &nbsp;</TH> <TH> $online &nbsp;</TH> <TH> $location &nbsp;</TH><TH> $sortcode &nbsp;</TH><TH> $paypoint &nbsp;</TH><TH> $bacct &nbsp;</TH></TR>";
    } 

    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysql_free_result($result);
 ?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='bankupdate.php'> Add New Bank </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }
  else if (trim($cmbTable)=="Staff Category")
  {  
 $limit      = 5; 
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `category`";     
 $result_count   = mysql_query($query_count);     
 $totalrows  = mysql_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  

    echo " <tr><b>[Staff Category Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH><b> Category ID </b>&nbsp;</TH><TH><b> Category </b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `CatID`, `Category` From `category` order by `CatID` LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 
    $val='Staff Category';

    while(list($catid, $category)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH><a href='scatupdate.php?ID=" . $catid . "'> $catid </a>&nbsp;</TH><TH> $category &nbsp;</TH></TR>";
    }

    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysql_free_result($result);
 ?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='scatupdate.php'> Add New Staff Category </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }
  else if (trim($cmbTable)=="Asset Category")
  {  
 $limit      = 15; 
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `asset category`";     
 $result_count   = mysql_query($query_count);     
 $totalrows  = mysql_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  

    echo " <tr><b>[Asset Category Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH><b>ID </b>&nbsp;</TH><TH><b> Category </b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `ID`, `Category` From `asset category` order by `ID` LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 
    $val='Asset Category';

    while(list($catid, $category)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH><a href='ascatupdate.php?ID=" . $catid . "'> $catid </a>&nbsp;</TH><TH> $category &nbsp;</TH></TR>";
    }

    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysql_free_result($result);
 ?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='ascatupdate.php'> Add New Asset Category </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }
  else if (trim($cmbTable)=="Location")
  {  
 $limit      = 5; 
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `location`";     
 $result_count   = mysql_query($query_count);     
 $totalrows  = mysql_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  

    echo " <tr><b>[Locations Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH><b> Location ID </b>&nbsp;</TH><TH><b> Location </b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `Location_ID`, `Location` From `location` order by `Location_ID` LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 
    $val='Location';

    while(list($locationid, $location)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH><a href='locationupdate.php?ID=" . $locationid . "'> $locationid </a>&nbsp;</TH><TH> $location &nbsp;</TH></TR>";
    } 

    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysql_free_result($result);
 ?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='locationupdate.php'> Add New Location </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }
  else if (trim($cmbTable)=="Courses")
  {  
 $limit      = 5; 
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `courses`";     
 $result_count   = mysql_query($query_count);     
 $totalrows  = mysql_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  

    echo " <tr><b>[Courses Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH><b> Course Title </b>&nbsp;</TH><TH><b> Description </b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `Course Title`, `Description` From `courses` LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 
    $val='Courses';

    while(list($title, $description)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH><a href='courseupdate.php?ID=" . $title . "'> $title </a>&nbsp;</TH><TH> $description &nbsp;</TH></TR>";
    } 

    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysql_free_result($result);
 ?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='courseupdate.php'> Add New Course </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }
  else if (trim($cmbTable)=="Department")
  {  
 $limit      = 5; 
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `department`";     
 $result_count   = mysql_query($query_count);     
 $totalrows  = mysql_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  
 
   echo " <tr><b>[Departments Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH><b> Department ID </b>&nbsp;</TH><TH><b> Department </b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `Dept ID`, `Dept` From `department` order by `Dept ID` LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 
    $val='Department';

    while(list($deptid, $dept)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH><a href='deptupdate.php?ID=" . $deptid . "'> $deptid </a>&nbsp;</TH><TH> $dept &nbsp;</TH></TR>";
    } 

    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysql_free_result($result);
 ?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='deptupdate.php'> Add New Department </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }
  else if (trim($cmbTable)=="Grade Level")
  {  
 $limit      = 30; 
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `grade level`";     
 $result_count   = mysql_query($query_count);     
 $totalrows  = mysql_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  

    echo " <tr><b>[Grade Level Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH><b> Grade Level</b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `ID`,`GL` From `grade level` order by `GL` desc LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 
    $val='Grade Level';

    while(list($id,$gl)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH><a href='glupdate.php?ID=" . $id . "'> $gl </a>&nbsp;</TH></TR>";
    } 

    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysql_free_result($result);
 ?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='glupdate.php'> Add New Grade Level </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }

  else if (trim($cmbTable)=="LGA")
  {  
 $limit      = 30; 
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `lga`";     
 $result_count   = mysql_query($query_count);     
 $totalrows  = mysql_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  

    echo " <tr><b>[LGAs Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH><b> LGA Code</b>&nbsp;</TH><TH><b> LGA </b>&nbsp;</TH><TH><b> State </b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `LGAID`, `LGA` , `State` From `lga` order by `State`,`LGA` LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 
    $val='LGA';

    while(list($lgaid, $lga,$state)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH><a href='lgaupdate.php?ID=" . $lgaid . "'> $lgaid </a>&nbsp;</TH><TH> $lga &nbsp;</TH><TH> $state &nbsp;</TH></TR>";
    } 
    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysql_free_result($result);
 ?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='lgaupdate.php'> Add New LGA </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php

  }
  else if (trim($cmbTable)=="Loan Types")
  {  
 $limit      = 5; 
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `loan type`";     
 $result_count   = mysql_query($query_count);     
 $totalrows  = mysql_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  
 
   echo " <tr><b>[Loan Types Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH width='40%'><b> Type ID</b>&nbsp;</TH><TH><b> Type </b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `Type ID`, `Type` From `loan type` order by `Type ID` LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 
    $val='Loan Types';

    while(list($typeid, $type)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH> $typeid &nbsp;</TH><TH><a href='loantupdate.php?ID=" . $typeid . "'> $type </a> &nbsp;</TH></TR>";
    } 

    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysql_free_result($result);
 ?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='loantupdate.php'> Add New Loan Type </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }
  else if (trim($cmbTable)=="Nationality")
  {  
 $limit      = 20; 
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `nationality`";     
 $result_count   = mysql_query($query_count);     
 $totalrows  = mysql_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  

    echo " <tr><b>[Nationality Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH><b> Nation Code</b>&nbsp;</TH><TH><b> Nation </b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `Nat_ID`, `Nationality` From `nationality` order by `Nat_ID` LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 
    $val='Nationality';

    while(list($natid, $nation)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH> $natid &nbsp;</TH><TH><a href='nationupdate.php?ID=" . $natid . "'> $nation </a> &nbsp;</TH></TR>";
    } 

    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysql_free_result($result);
 ?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='nationupdate.php'> Add New Nation </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }
  else if (trim($cmbTable)=="Offices")
  {  
 $limit      = 5; 
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `office`";     
 $result_count   = mysql_query($query_count);     
 $totalrows  = mysql_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  
 
   echo " <tr><b>[Judges' Offices Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH width='40%'><b> Office ID</b>&nbsp;</TH><TH><b> Office </b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `ID`, `Office` From `office` order by `ID` LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 
    $val='Offices';

    while(list($id, $office)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH> $id &nbsp;</TH><TH><a href='officeupdate.php?ID=" . $id . "'> $office </a> &nbsp;</TH></TR>";
    } 

    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysql_free_result($result);
 ?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='officeupdate.php'> Add New Office </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }
  else if (trim($cmbTable)=="Pension Bank Charges")
  {  
    echo " <tr><b>[Pension Bank Charges Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH width='50%'><b> Charge Percent</b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `Charges Percent` From `pension bank charges`"); 

    while(list($charges)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH><a href='chargesupdate.php?ID=" . $charges . "'> $charges </a>&nbsp;</TH></TR>";
    } 
      
?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='chargesupdate.php'> Add Charges </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }
  else if (trim($cmbTable)=="Pension Managers")
  {  
 $limit      = 5; 
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `pension managers`";     
 $result_count   = mysql_query($query_count);     
 $totalrows  = mysql_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  

    echo " <tr><b>[Pension Managers Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH width='40%'><b> Code</b>&nbsp;</TH><TH><b> Managers </b>&nbsp;</TH><TH><b> Address </b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `Code`, `Pension Managers`, `Address` From `pension managers` order by `Code` LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 
    $val='Pension Managers';

    while(list($code, $managers,$address)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH> $code &nbsp;</TH><TH><a href='pensionmupdate.php?ID=" . $code . "'> $managers </a> &nbsp;</TH><TH> $address &nbsp;</TH></TR>";
    } 

    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysql_free_result($result);
?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='pensionmupdate.php'> Add New Pension Managers </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }
  else if (trim($cmbTable)=="Position")
  {  
 $limit      = 10; 
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `position`";     
 $result_count   = mysql_query($query_count);     
 $totalrows  = mysql_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  
 
   echo " <tr><b>[Position Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH><b> Position </b>&nbsp;</TH><TH><b> SortOrder </b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `Position`, `Position SortOrder` From `position` order by `Position SortOrder` LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 
    $val='Position';

    while(list($position,$sortorder)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH><a href='positionupdate.php?ID=" . $position . "'> $position </a> &nbsp;</TH><TH> $sortorder &nbsp;</TH></TR>";
    } 

    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysql_free_result($result);     
?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='positionupdate.php'> Add New Position </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }
  else if (trim($cmbTable)=="Profession")
  {  
 $limit      = 10;
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `profession`"; 
 $result_count   = mysql_query($query_count);     
 $totalrows  = mysql_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  

    echo " <tr><b>[Professions Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH width='40%'><b> Profession</b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `Profession` From `profession` LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 
    $val='Profession';

    while(list($profession)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH><a href='professionupdate.php?ID=" . $profession . "'> $profession </a>&nbsp;</TH></TR>";
    } 

    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysql_free_result($result);    
?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='professionupdate.php'> Add New Profession </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }
  else if (trim($cmbTable)=="Qualification")
  {  
 $limit      = 10; 
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `qualification`";
 $result_count   = mysql_query($query_count);     
 $totalrows  = mysql_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  

    echo " <tr><b>[Qualifications Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH width='40%'><b> Qualification</b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `Qualification` From `qualification` LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 
    $val='Qualification';

    while(list($qualification)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH><a href='qualificationupdate.php?ID=" . $qualification . "'> $qualification </a>&nbsp;</TH></TR>";
    } 

    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysql_free_result($result); 
?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
              <TH><a href ='qualificationupdate.php'> Add New Qualification </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }
  else if (trim($cmbTable)=="Rank")
  {  
 $limit      = 10;
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `rank`";     
 $result_count   = mysql_query($query_count);     
 $totalrows  = mysql_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  

    echo " <tr><b>[Ranks Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH width='20%'><b> ID</b>&nbsp;</TH><TH><b> Rank</b>&nbsp;</TH><TH><b> SortOrder</b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `RankID`,`Rank`,`Rank Sort Order`,`Cadre` From `rank` LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 
    $val='Rank';

    while(list($id,$rank,$sortorder,$cadre)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH> $id &nbsp;</TH><TH><a href='rankupdate.php?ID=" . $id . "'> $rank </a>&nbsp;</TH><TH> $sortorder &nbsp;</TH></TR>";
    } 
    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysql_free_result($result);      
?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='rankupdate.php'> Add New Rank </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }
  else if (trim($cmbTable)=="State")
  {  
 $limit      = 15; 
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `state`";     
 $result_count   = mysql_query($query_count);     
 $totalrows  = mysql_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  

    echo " <tr><b>[States Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH width='40%'><b> State</b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `State` From `state` LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 
    $val='State';

    while(list($state)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH><a href='stateupdate.php?ID=" . $state . "'> $state </a>&nbsp;</TH></TR>";
    } 
    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysql_free_result($result);      
?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='stateupdate.php'> Add New State </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }
  else if (trim($cmbTable)=="Staff Status")
  {  
    echo " <tr><b>[Status Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH width='40%'><b> Status</b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `Status` From `status`"); 

    while(list($status)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH><a href='statusupdate.php?ID=" . $status . "'> $status </a>&nbsp;</TH></TR>";
    } 
    
?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='statusupdate.php'> Add New Status </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }
  else if (trim($cmbTable)=="Asset Status")
  {  
    echo " <tr><b>[Asset Status Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH width='40%'><b> Status</b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `ID`,`Status` From `asset status`"); 

    while(list($id,$status)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH><a href='astatusupdate.php?ID=" . $id . "'> $status </a>&nbsp;</TH></TR>";
    } 
    
?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='astatusupdate.php'> Add New Status </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }
  else if (trim($cmbTable)=="Title")
  {  
    echo " <tr><b>[Title Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH width='40%'><b> Title</b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `Title` From `title`"); 

    while(list($title)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH><a href='titleupdate.php?ID=" . $title . "'> $title </a>&nbsp;</TH></TR>";
    } 
 
?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='titleupdate.php'> Add New Title </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }
  else if (trim($cmbTable)=="Union")
  {  
    echo " <tr><b>[Union Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH><b> Union ID</b>&nbsp;</TH><TH><b> Union Name</b>&nbsp;</TH><TH><b> Union Description</b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `Union ID`,`Union Name`,`Descr` From `union`"); 

    while(list($unionid,$name,$descr)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH> $unionid &nbsp;</TH><TH><a href='unionupdate.php?ID=" . $unionid . "'> $name </a>&nbsp;</TH><TH> $descr &nbsp;</TH></TR>";
    }  
?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='unionupdate.php'> Add New Union </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }

  else if (trim($cmbTable)=="Variation Types")
  {  
    echo " <tr><b>[Variation Types Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH width='10%'><b> Variation ID</b>&nbsp;</TH><TH width='40%'><b> Variation Name</b>&nbsp;</TH><TH><b> Type</b>&nbsp;</TH><TH><b> Group</b>&nbsp;</TH></TR>";
 
    $result = mysql_query ("SELECT `VarID`,`Variation type`,`VarGroup`,`VarClass` From `variation type`"); 

    while(list($id,$type,$group,$class)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH> $id &nbsp;</TH><TH><a href='vartypeupdate.php?ID=" . $id . "'> $type </a>&nbsp;</TH><TH> $group &nbsp;</TH><TH> $class &nbsp;</TH></TR>";
    } 
?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='vartypeupdate.php'> Add New Variation Type </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }
?>
</TABLE>
<br>
<form>
<Table>
<tr>
<td>

<?php
 echo "<a href='admin.php'> Go back to admin area</a> &nbsp; ";
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
