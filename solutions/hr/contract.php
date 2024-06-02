<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
 if ($_SESSION['access_lvl'] != 1){
  if ($_SESSION['access_lvl'] != 2){
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
	<table border="0" width="100%" bgcolor="#FFFFFF" id="table1">

		<tr align='center'>
 <td bgcolor="#008000"><b>
<font face="Verdana" color="#FFFFFF" style="font-size: 16pt">Contractors' Schedule</font></b>
 </td>
</tr>
		<tr>
			<td colspan="2">

<fieldset style="padding: 2">
<p><legend><b><i><font size="2" face="Tahoma" color="#008000"> <?php require_once 'acctheader.php'; ?>
</p></font></i></b></legend>
   <form  action="contract.php" method="post">
    <body bgcolor="#D2DD8F">
      Select Criteria to Search with: <select size="1" name="cmbFilter">
      <option selected></option>
      <option value="Contractor">Contractor</option>
      <option value="Contract Category">Contract Category</option>
      <option value="Contract Date">Contract Date</option>
      <option value="Contract Status">Contract Status</option>
      <option value="Contract Title">Contract Title</option>
      <option value="Unpaid Contractors">Unpaid Contractors</option>
     </select>
     &nbsp; 
     <input type="text" name="filter">
     &nbsp; 
     <input type="submit" value="Go" name="submit">
     <br>
    </body>
   </form>

<form>
<TABLE width='98%' border='1' cellpadding='1' cellspacing='1' align='center' bordercolor="#008000" id="table2">
 <?php
 $tval=$_GET['tval'];
 $limit      = 35;
 $page=$_GET['page'];

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];

 echo "<font color='#FF0000' style='font-size: 9pt'>" . $tval . "</font>";
 echo "<p>";

    echo "<TR><TH><b><u>S/No </b></u>&nbsp;</TH><TH><b><u>Contract Date </b></u>&nbsp;</TH><TH><b><u>Contractor Name </b></u>&nbsp;</TH><TH><b><u>Contract Title</b></u>&nbsp;</TH>
      <TH><b><u>Contract Category </b></u>&nbsp;</TH><TH><b><u>Paid? </b></u>&nbsp;</TH></TR>";

  if ($cmbFilter=="Unpaid Contractors")
  {  
   $query_count    = "SELECT * FROM `contract` WHERE `Paid`='Unpaid'";
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $query="SELECT `ID`,`Contract Date`,`Contractor`,`Contract Title`,`Contract Category`,`Paid` FROM `contract` WHERE `Paid`='Unpaid' order by `Contract Date` desc LIMIT $limitvalue, $limit";
   $result=mysql_query($query);

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!<br>"); 
   } 

$i=0;
    while(list($id,$cdate,$cname,$ctitle,$ccategory,$paid)=mysql_fetch_row($result))
    {
     $i=$i+1;
     echo "<TR><TH>$i &nbsp;</TH><TH><a href = 'contractor.php?ID=$id'>$cdate </a> &nbsp;</TH><TH> $cname &nbsp;</TH><TH>$ctitle &nbsp;</TH>
      <TH>$ccategory &nbsp;</TH><TH>$paid &nbsp;</TH></TR>";
    }

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
  }
  else if (empty($cmbFilter) or $cmbFilter=="")
  {
   $query_count    = "SELECT * FROM `contract`";
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $query="SELECT `ID`,`Contract Date`,`Contractor`,`Contract Title`,`Contract Category`,`Paid` FROM `contract` order by `Contract Date` desc LIMIT $limitvalue, $limit";
   $result=mysql_query($query);

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!<br>"); 
   } 

$i=0;
    while(list($id,$cdate,$cname,$ctitle,$ccategory,$paid)=mysql_fetch_row($result))
    {
     $i=$i+1;
     echo "<TR><TH>$i &nbsp;</TH><TH><a href = 'contractor.php?ID=$id'>$cdate </a> &nbsp;</TH><TH> $cname &nbsp;</TH><TH>$ctitle &nbsp;</TH>
      <TH>$ccategory &nbsp;</TH><TH>$paid &nbsp;</TH></TR>";
    }

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

  }
  else
  {  
   $query_count    = "SELECT * FROM `contract` WHERE `" . $cmbFilter . "` like '" . $filter . "%'";
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $query="SELECT `ID`,`Contract Date`,`Contractor`,`Contract Title`,`Contract Category`,`Paid` FROM `contract` WHERE `" . $cmbFilter . "` like '" . $filter . "%' order by `Contract Date` desc LIMIT $limitvalue, $limit";
   $result=mysql_query($query);

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!<br>"); 
   } 

$i=0;
    while(list($id,$cdate,$cname,$ctitle,$ccategory,$paid)=mysql_fetch_row($result))
    {
     $i=$i+1;
     echo "<TR><TH>$i &nbsp;</TH><TH><a href = 'contractor.php?ID=$id'>$cdate </a> &nbsp;</TH><TH> $cname &nbsp;</TH><TH>$ctitle &nbsp;</TH>
      <TH>$ccategory &nbsp;</TH><TH>$paid &nbsp;</TH></TR>";
    }

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
  }

 ?>
</TABLE>
</fieldset>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#008000" id="table6">

  <?php
     echo "<TR>
               <TH><a href ='contractor.php'> Add New Record </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<br>

</TABLE>
<?php
 require_once 'footr.php';
 require_once 'footer.php';
?>
</form>

			</td>
		</tr>
		
	</table>
</div>
