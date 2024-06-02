<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 7) & ($_SESSION['access_lvl'] != 6))
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

global $Tit;
@$Tit=$_REQUEST['Tit'];
@$code=$_REQUEST['code'];

$sql="SELECT * FROM `stock` WHERE `Stock Code`='$code'";
$result = mysql_query($sql,$conn) or die('Could not look up user data; ' . mysql_error());
$row = mysql_fetch_array($result);
?>
<div align="center">
	<table border="0" width="927" bgcolor="#FFFFFF" id="table1">
		<tr align='center'>
 <td bgcolor="#008000"><b>
<font face="Verdana" color="#FFFFFF" style="font-size: 16pt">Stock Record</font></b>
 </td>
</tr>
		<tr>
			<td colspan="2">

<form action="requisitionupdate.php" method="post">
<fieldset style="padding: 2">
<p><legend><b><i><font size="2" face="Tahoma" color="#008000"> <?php require_once 'stkheader.php'; ?>
</p></font></i></b></legend>
<font size="2px" face="Arial">
<TABLE width='90%' border='1' cellpadding='1' cellspacing='1' align='center' bordercolor="#005B00" id="table2">

 <?php
 @$sn=$code;
 @$tval=$_GET['tval'];
 @$limit      = 15;
 @$page=$_GET['page'];

 echo "<font color='#FF0000' style='font-size: 8pt'>" . $tval . "</font>";
 echo "<p><font style='font-size: 9pt'>";

    echo "<b>[REQUISITION LIST for product - <i>" . $row['Stock Name'] . ", " . $row['Category'] . "</i>]</b><br>";

    echo "<TR><TH><b><u>Requisition Date </b></u>&nbsp;</TH><TH><b><u>Quantity Given </b></u>&nbsp;</TH><TH><b><u>Requested By </b></u>&nbsp;</TH>
          <TH><b><u>Given By </b></u>&nbsp;</TH><TH><b><u>Location </b></u>&nbsp;</TH></TR>";

   $query_count    = "SELECT * FROM `requisition` WHERE `Stock Code`='$code'"; 
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   @$limitvalue = $page * $limit - ($limit);  

   $query="SELECT `ID`,`Stock Code`,`Stock Date`,`Qnty Given`,`Request By`,`Given By`,Location FROM requisition WHERE `Stock Code`='$code' order by `Stock Date` Desc,Location LIMIT $limitvalue, $limit";
   $result=mysql_query($query);

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

    while(list($id,$code,$dates,$given,$reqby,$givenby,$loc)=mysql_fetch_row($result))
    {
     echo "<TR><TH><a href = 'requisitionupdate.php?code=" . $code . "&id=" . $id . "'>$dates </a> &nbsp;</TH><TH> $given  &nbsp;</TH><TH>$reqby &nbsp;</TH>
           <TH>$givenby &nbsp;</TH><TH>$loc &nbsp;</TH></TR>";
    }

    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?code=$code&page=$pageprev\">PREV PAGE</a>  ");
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
            echo("<a href=\"$PHP_SELF?code=$code&page=$i\">$i</a>  ");  
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
            echo("<a href=\"$PHP_SELF?code=$code&page=$i\">$i</a>  "); 
       } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"$PHP_SELF?code=$code&page=$pagenext\">NEXT PAGE</a>");  
            
    }          
    else
    { 
        echo("NEXT PAGE");  
    } 
 ?>
</TABLE>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00" id="table6">

  <?php
     echo "<br><TR>
               <TH><a href ='requisitionupdate.php?code=" . $sn . "&id=" . $id . "'> Add New Record </a>&nbsp;</TH><br>
           </TR>"; 
  ?>

</TABLE>
</font>
</TABLE>
</font>
</form>
			</td>
		</tr>
		<tr>
			<td colspan="2"><?php
 require_once 'footr.php';
 require_once 'footer.php';
?></td>
		</tr>
	</table>
</div>