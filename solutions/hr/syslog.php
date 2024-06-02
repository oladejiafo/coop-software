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
 require_once 'header.php';
 require_once 'style.php';
?>
   <div align="center">
	<table border="0" width="800" id="table1" bgcolor="#FFFFFF">
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>
			<div align="center">
				<table border="0" width="800" id="table2">
					<tr>
						<td>
   <form  action="syslog.php" method="post">
    <body bgcolor="#D2DD8F">
     <h2><center>System Auto-Log</center></h2>
      Select Criteria to Filter/(Act) with: <select size="1" name="cmbFilter">
      <option Selected></option>
      <option>User Category</option>
      <option>User Name</option>
      <option>Date Logged</option>
      <option>Show All (Desc)</option>
      <option>Show All (Asc)</option>
      <option>Delete All</option>
      <option>Delete by Category</option>
     </select>
     &nbsp; 
     <input type="text" name="filter">
     &nbsp; 
     <input type="submit" value="Go" name="submit">
     &nbsp;&nbsp;&nbsp;
    </body>
   </form>

<TABLE width='795' border='1' cellpadding='1' cellspacing='1' align='center' id="table3">
<?php

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];
 
 $limit      = 30;
 $page=$_GET['page'];

   echo "Filtered using: " . $cmbFilter . "=" . $filter;
   echo "<TR bgcolor='#D2DD8F'><TH><b> User Category </b>&nbsp;</TH><TH><b> User Name </b>&nbsp;</TH><TH><b> Date Logged </b>&nbsp;&nbsp;</TH><TH><b> Time Logged </b>&nbsp;</TH> <TH><b> File Used </b>&nbsp;</TH> <TH><b> Details </b>&nbsp;</TH></TR>";

  if (trim(empty($cmbFilter)))
  {
   $query_count    = "SELECT * FROM `monitor` order by `Date Logged on` desc, `Time Logged On` desc";
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
        $page = 1;
   }

   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `User Category`, `User Name` , `Date Logged On`, `Time Logged On`,`File Used`,`Details` From monitor order by `Date Logged on` desc, `Time Logged On` desc LIMIT $limitvalue, $limit"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

  while(list($cat, $name,$datel, $timel, $fileu, $det)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $cat &nbsp;</TH><TH> $name &nbsp;</TH><TH> $datel &nbsp;</TH> <TH> $timel &nbsp;</TH> <TH> $fileu &nbsp;</TH>
      <TH> $det &nbsp;</TH></TR>";
   }
   echo"</TABLE>";
    echo "<TR align='right'><TD>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREV PAGE</a>  ");
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
            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  ");  
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
            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  "); 
       } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pagenext\">NEXT PAGE</a>");  
            
    }          
    else
    { 
        echo("NEXT PAGE");  
    } 
    echo "</TD></TR>";
  } 
  else if (trim($cmbFilter)=="Show All (Asc)")
  {
   $query_count    = "SELECT * FROM `monitor` order by `Date Logged on` asc, `Time Logged On` asc";
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
        $page = 1;
   }

   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `User Category`, `User Name` , `Date Logged On`, `Time Logged On`,`File Used`,`Details` From monitor order by `Date Logged on` asc, `Time Logged On` asc LIMIT $limitvalue, $limit"); 
 
   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

  while(list($cat, $name,$datel, $timel, $fileu, $det)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $cat &nbsp;</TH><TH> $name &nbsp;</TH><TH> $datel &nbsp;</TH> <TH> $timel &nbsp;</TH> <TH> $fileu &nbsp;</TH>
      <TH> $det &nbsp;</TH></TR>";
   }
   echo"</TABLE>";
    echo "<TR align='right'><TD>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREV PAGE</a>  ");
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
            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  ");  
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
            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  "); 
       } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pagenext\">NEXT PAGE</a>");  
            
    }          
    else
    { 
        echo("NEXT PAGE");  
    } 
    echo "</TD></TR>";
  }
  else if (trim($cmbFilter)=="" or trim($cmbFilter)=="Show All (Desc)")
  {
   $query_count    = "SELECT * FROM `monitor` order by `Date Logged on` desc, `Time Logged On` desc";
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
        $page = 1;
   }

   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `User Category`, `User Name` , `Date Logged On`, `Time Logged On`,`File Used`,`Details` From monitor order by `Date Logged on` desc, `Time Logged On` desc LIMIT $limitvalue, $limit"); 
 
   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

  while(list($cat, $name,$datel, $timel, $fileu, $det)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $cat &nbsp;</TH><TH> $name &nbsp;</TH><TH> $datel &nbsp;</TH> <TH> $timel &nbsp;</TH> <TH> $fileu &nbsp;</TH>
      <TH> $det &nbsp;</TH></TR>";
   }
   echo"</TABLE>";
    echo "<TR align='right'><TD>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREV PAGE</a>  ");
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
            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  ");  
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
            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  "); 
       } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pagenext\">NEXT PAGE</a>");  
            
    }          
    else
    { 
        echo("NEXT PAGE");  
    } 
    echo "</TD></TR>";
  }
  else if (trim($cmbFilter)=="User Category")
  {  
   $query_count    = "SELECT * FROM `monitor` WHERE `User Category`='" . $filter . "' order by `Date Logged On` Desc, `Time Logged On` desc";
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
        $page = 1;
   }

   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `User Category`, `User Name` , `Date Logged On`, `Time Logged On`,`File Used`,`Details` From `monitor` WHERE `User Category`='" . $filter . "' order by `Date Logged On` Desc, `Time Logged On` desc LIMIT $limitvalue, $limit");    
  
   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

  while(list($cat, $name,$datel, $timel, $fileu, $det)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $cat &nbsp;</TH><TH> $name &nbsp;</TH><TH> $datel &nbsp;</TH> <TH> $timel &nbsp;</TH> <TH> $fileu &nbsp;</TH>
      <TH> $det &nbsp;</TH></TR>";
   }
   echo"</TABLE>";
    echo "<TR align='right'><TD>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREV PAGE</a>  ");
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
            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  ");  
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
            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  "); 
       } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pagenext\">NEXT PAGE</a>");  
            
    }          
    else
    { 
        echo("NEXT PAGE");  
    } 
    echo "</TD></TR>";
  }
  else if (trim($cmbFilter)=="User Name")
  {  
   $query_count    = "SELECT * FROM `monitor` WHERE `User Name`='" . $filter . "' order by `Date Logged On` Desc, `Time Logged On` desc";
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
        $page = 1;
   }

   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `User Category`, `User Name` , `Date Logged On`, `Time Logged On`,`File Used`,`Details` From `monitor` WHERE `User Name`='" . $filter . "' order by `Date Logged On` Desc, `Time Logged On` desc LIMIT $limitvalue, $limit");
  
   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

  while(list($cat, $name,$datel, $timel, $fileu, $det)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $cat &nbsp;</TH><TH> $name &nbsp;</TH><TH> $datel &nbsp;</TH> <TH> $timel &nbsp;</TH> <TH> $fileu &nbsp;</TH>
      <TH> $det &nbsp;</TH></TR>";
   }
   echo"</TABLE>";
    echo "<TR align='right'><TD>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREV PAGE</a>  ");
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
            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  ");  
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
            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  "); 
       } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pagenext\">NEXT PAGE</a>");  
            
    }          
    else
    { 
        echo("NEXT PAGE");  
    } 
    echo "</TD></TR>";
  }
  else if (trim($cmbFilter)=="Date Logged")
  {  
   $query_count    = "SELECT * FROM `monitor` WHERE `Date Logged On`='" . $filter . "' order by `Date Logged On` Desc, `Time Logged On` desc";
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
        $page = 1;
   }

   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `User Category`, `User Name` , `Date Logged On`, `Time Logged On`,`File Used`,`Details` From `monitor` WHERE `Date Logged On`='" . $filter . "' order by `Date Logged On` Desc, `Time Logged On` desc LIMIT $limitvalue, $limit");
  
   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

  while(list($cat, $name,$datel, $timel, $fileu, $det)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $cat &nbsp;</TH><TH> $name &nbsp;</TH><TH> $datel &nbsp;</TH> <TH> $timel &nbsp;</TH> <TH> $fileu &nbsp;</TH>
      <TH> $det &nbsp;</TH></TR>";
   }
   echo"</TABLE>";
    echo "<TR align='right'><TD>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREV PAGE</a>  ");
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
            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  ");  
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
            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  "); 
       } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pagenext\">NEXT PAGE</a>");  
            
    }          
    else
    { 
        echo("NEXT PAGE");  
    } 
    echo "</TD></TR>";
  }
  else if (trim($cmbFilter)=="Delete All")
  {  
   $query_d = "Delete From `monitor`";
   $result_d= mysql_query($query_d);

   $query_count    = "SELECT * FROM `monitor` order by `Date Logged on` desc, `Time Logged On` desc";
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
        $page = 1;
   }

   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `User Category`, `User Name` , `Date Logged On`, `Time Logged On`,`File Used`,`Details` From monitor order by `Date Logged on` desc, `Time Logged On` desc LIMIT $limitvalue, $limit"); 
 
   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

  while(list($cat, $name,$datel, $timel, $fileu, $det)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $cat &nbsp;</TH><TH> $name &nbsp;</TH><TH> $datel &nbsp;</TH> <TH> $timel &nbsp;</TH> <TH> $fileu &nbsp;</TH>
      <TH> $det &nbsp;</TH></TR>";
   }
   echo"</TABLE>";
    echo "<TR align='right'><TD>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREV PAGE</a>  ");
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
            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  ");  
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
            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  "); 
       } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pagenext\">NEXT PAGE</a>");  
            
    }          
    else
    { 
        echo("NEXT PAGE");  
    } 
    echo "</TD></TR>";
            #######
           # session_start();
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn) or die('Could not fetch data; ' . mysql_error());
            $rows = mysql_fetch_array($result);

            $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','System Log','All Logs deleted')";

            $result_insert_Log = mysql_query($query_insert_Log) or die(mysql_error());
            ###### 
  }
  else if (trim($cmbFilter)=="Delete by Category")
  {  
   $query_d = "Delete From `monitor` WHERE `User Category`='" . $filter . "'";
   $result_d= mysql_query($query_d);

   $query_count    = "SELECT * FROM `monitor` order by `Date Logged on` desc, `Time Logged On` desc";
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
        $page = 1;
   }

   $limitvalue = $page * $limit - ($limit);  

   $result = mysql_query ("SELECT `User Category`, `User Name` , `Date Logged On`, `Time Logged On`,`File Used`,`Details` From monitor order by `Date Logged on` desc, `Time Logged On` desc LIMIT $limitvalue, $limit"); 
 
   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

  while(list($cat, $name,$datel, $timel, $fileu, $det)=mysql_fetch_row($result)) 
   {	
      echo "<TR><TH> $cat &nbsp;</TH><TH> $name &nbsp;</TH><TH> $datel &nbsp;</TH> <TH> $timel &nbsp;</TH> <TH> $fileu &nbsp;</TH>
      <TH> $det &nbsp;</TH></TR>";
   }
   echo"</TABLE>";
    echo "<TR align='right'><TD>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREV PAGE</a>  ");
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
            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  ");  
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
            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  "); 
       } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pagenext\">NEXT PAGE</a>");  
            
    }          
    else
    { 
        echo("NEXT PAGE");  
    } 
    echo "</TD></TR>";
            #######
           # session_start();
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn) or die('Could not fetch data; ' . mysql_error());
            $rows = mysql_fetch_array($result);

            $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','System Log','Logs deleted for category: $filter')";

            $result_insert_Log = mysql_query($query_insert_Log) or die(mysql_error());
            ###### 
  }
?>
<br>
<form>
<Table>
<tr>
<td>

<?php
 echo "<a target='blank' href='rptsyslog.php?cmbFilter=$cmbFilter&filter=$filter'> Print this List</a> &nbsp;";
# echo " || <a href='expretirement.php'> Export this List</a> &nbsp; ";
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
