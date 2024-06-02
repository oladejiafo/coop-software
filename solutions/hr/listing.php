<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & $_SESSION['access_lvl'] != 5) 
{
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don’t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn’t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
#exit();

}

 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';
?>
   <div align="center">
	<table border="0" width="802" id="table1" bgcolor="#FFFFFF">
		<tr>
			<td>
			<div align="center">
				<table border="0" width="800" id="table2">
					<tr>
						<td>
<br>
<TABLE width='780' border='1' cellpadding='1' cellspacing='1' align='center' bordercolor="#005B00">
 <?php
 $limit      = 5;
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `login`";     
 $result_count   = mysql_query($query_count);     
 $totalrows  = mysql_num_rows($result_count);

 if(empty($page))
 {
        $page = 1;
 }

 $limitvalue = $page * $limit - ($limit);  

    echo "<b>[USERS' LIST]</b><br>";

    echo "<TR bgcolor='#D2DD8F'><TH> <b>UserID </b>&nbsp;</TH><TH><b>UserName </b>&nbsp;</TH><TH><b>Access Level </b>&nbsp;</TH>
      <TH><b>Category </b>&nbsp;</TH><TH><b>e-mail </b>&nbsp;</TH></TR>";

    $query="SELECT login.user_id,login.username,login.access_lvl,cms_access_levels.access_name,login.email FROM login inner join cms_access_levels on login.access_lvl=cms_access_levels.access_lvl order by login.access_lvl desc LIMIT $limitvalue, $limit";
    $result=mysql_query($query);

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

    while(list($user_id,$username,$access_lvl,$access_name,$email)=mysql_fetch_row($result))
    {
     echo "<TR><TH>$user_id &nbsp;</TH><TH><a href ='useraccount.php?UID=" . $user_id . "'> $username </a> &nbsp;</TH><TH>$access_lvl &nbsp;</TH>
      <TH align='Left'> <p style='margin-left: 10'>$access_name &nbsp;</TH><TH align='Left'> <p style='margin-left: 10'>$email &nbsp;</TH></TR>";
    }
echo"</TABLE><table align='right'>";
    echo "<TR align='right'><TD>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?page=$pageprev\"> PREV<< </a>  ");
    }
    else 
       echo("PREV<<  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?page=$i\">$i</a>  ");  
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
            echo("<a href=\"$PHP_SELF?page=$i\">$i</a>  "); 
       } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"$PHP_SELF?page=$pagenext\">NEXT>></a>");  
            
    }          
    else
    { 
        echo("NEXT>>");  
    } 
    echo "</TD></TR>";
 ?>

						<p>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
				</table>
			</div>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
	</table>
</div>

<?php
 require_once 'footr.php';
 require_once 'footer.php';
?>