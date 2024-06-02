<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
 if ($_SESSION['access_lvl'] != 1){
  if ($_SESSION['access_lvl'] != 2){
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
<font face="Verdana" color="#FFFFFF" style="font-size: 16pt">Payments Summary</font></b>
 </td>
</tr>
		<tr>
			<td colspan="2">

<fieldset style="padding: 2">
<p><legend><b><i><font size="2" face="Tahoma" color="#008000"> <?php require_once 'acctheader.php'; ?>
</p></font></i></b></legend>
   <form  action="paysumm.php" method="post">
    <body bgcolor="#D2DD8F">
      Select Criteria to Search with: <select size="1" name="cmbFilter">
      <option selected></option>
      <option value="Date">Date</option>
      <option value="Type">Type</option>
      <option value="Recipient">Recipient</option>
     </select>
     &nbsp; 
     <input type="text" name="filter">
     &nbsp; 
     <input type="submit" value="Go" name="submit">
     <br>
    </body>
   </form>

<form action="paysumm.php" method="post">

<TABLE width='98%' border='1' cellpadding='1' cellspacing='1' align='center' bordercolor="#008000" id="table2">
 <?php
 $tval=$_GET['tval'];
 $limit      = 15;
 $page=$_GET['page'];

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];

 echo "<font color='#FF0000' style='font-size: 9pt'>" . $tval . "</font>";
 echo "<p>";

    echo "<TR bgcolor='#dcdfdf'><TH><b><u>S/No </b></u>&nbsp;</TH><TH><b><u>Date </b></u>&nbsp;</TH><TH><b><u>Pay Type/Reason </b></u>&nbsp;</TH><TH><b><u>Recipient</b></u>&nbsp;</TH>
      <TH><b><u>Amount Pending </b></u>&nbsp;</TH><TH><b><u>Amount Paid so Far </b></u>&nbsp;</TH><TH><b><u>Remark </b></u>&nbsp;</TH><TH>&nbsp;</TH></TR>";

  if ($cmbFilter !="")
  {  
   $query_count    = "SELECT `ID` FROM `cash` WHERE `" . $cmbFilter . "` like '" . $filter . "%' union Select `ID` from `Contract` WHERE `" . $cmbFilter . "` like '" . $filter . "%'";
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $query="SELECT `ID`,`Contract Date`,`Contractor`,`Contract Title`,`Contract Category`,(`Amount`-`Amount Paid`) as pending,`Amount Paid`,`Paid`,`Remark` FROM `contract` WHERE `Paid`='Unpaid' and `" . $cmbFilter . "` like '" . $filter . "%' order by `Contract Date` desc LIMIT $limitvalue, $limit";
   $result=mysqli_query($conn,$query);

   $query2="SELECT `ID`,`Date`,`Type`,`Recipient`,`Amount`,`Paid`,`Remark` FROM `cash` WHERE `Paid`='Unpaid' and `" . $cmbFilter . "` like '" . $filter . "%' order by `Date` desc LIMIT $limitvalue, $limit";
   $result2=mysqli_query($conn,$query2);

   if(mysqli_num_rows($result) == 0 and mysqli_num_rows($result2) == 0)
   { 
        echo("Nothing to Display!<br>"); 
   } 

$i=0;
     echo "<TR><TH colspan='8'>CONTRACTORS</TH></TR>";
    while(list($id,$date,$recipient,$title,$category,$pending,$pamount,$paid,$remark)=mysqli_fetch_row($result))
    {
     $i=$i+1;
     if ($remark !='Approved')
     {
      $remark ='Unapproved';
     }

     $date=date('d M, Y',strtotime($date));
     $pending=number_format($pending,2);
     $pamount=number_format($pamount,2);
     $type='Contract';
     echo "<TR><TH>$i &nbsp;</TH><TH>$date  &nbsp;</TH><TH> $title &nbsp;</TH><TH>$recipient &nbsp;</TH>
      <TH>$pending &nbsp;</TH><TH>$pamount &nbsp;</TH><TH>$remark &nbsp;</TH><TH> <font color='#FF0000' style='font-size: 8pt'><a href ='paysummcalc.php?id=$id&type=$type&filter=$filter&page=$page&cmbFilter=$cmbFilter'>Approve Now</a></font></TH></TR>";
    }

     echo "<TR><TH colspan='8'>EXPENDITURES</TH></TR>";
    while(list($id,$date,$type,$recipient,$amount,$paid,$remark)=mysqli_fetch_row($result2))
    {
     $i=$i+1;
     if ($remark !='Approved')
     {
      $remark ='Unapproved';
     }
     $date=date('d M, Y',strtotime($date));
     $amount=number_format($amount,2);
     $type='Expense';
     echo "<TR><TH>$i &nbsp;</TH><TH>$date  &nbsp;</TH><TH> $type &nbsp;</TH><TH>$recipient &nbsp;</TH>
      <TH>$amount &nbsp;</TH><TH>0 &nbsp;</TH><TH>$remark &nbsp;</TH><TH> <font color='#FF0000' style='font-size: 8pt'><a href ='paysummcalc.php?id=$id&type=$type&filter=$filter&page=$page&cmbFilter=$cmbFilter'>Approve Now</a></font></TH></TR>";
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
   $query_count    = "SELECT `ID` FROM `cash` union Select `ID` from `Contract`";
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $query="SELECT `ID`,`Contract Date`,`Contractor`,`Contract Title`,`Contract Category`,(`Amount`-`Amount Paid`) as pending,`Amount Paid`,`Paid`,`Remark` FROM `contract` WHERE `Paid`='Unpaid' order by `Contract Date` desc LIMIT $limitvalue, $limit";
   $result=mysqli_query($conn,$query);

   $query2="SELECT `ID`,`Date`,`Type`,`Recipient`,`Amount`,`Paid`,`Remark` FROM `cash` WHERE `Paid`='Unpaid' order by `Date` desc LIMIT $limitvalue, $limit";
   $result2=mysqli_query($conn,$query2);

   if(mysqli_num_rows($result) == 0 and mysqli_num_rows($result2) == 0)
   { 
        echo("Nothing to Display!<br>"); 
   } 

$i=0;
     echo "<TR><TH colspan='8'>CONTRACTORS</TH></TR>";
    while(list($id,$date,$recipient,$title,$category,$pending,$pamount,$paid,$remark)=mysqli_fetch_row($result))
    {
     $i=$i+1;
     if ($remark !='Approved')
     {
      $remark ='Unapproved';
     }

     $date=date('d M, Y',strtotime($date));
     $pending=number_format($pending,2);
     $pamount=number_format($pamount,2);
     $type='Contract';
     echo "<TR><TH>$i &nbsp;</TH><TH>$date  &nbsp;</TH><TH> $title &nbsp;</TH><TH>$recipient &nbsp;</TH>
      <TH>$pending &nbsp;</TH><TH>$pamount &nbsp;</TH><TH>$remark &nbsp;</TH><TH> <font color='#FF0000' style='font-size: 8pt'><a href ='paysummcalc.php?id=$id&type=$type&filter=$filter&page=$page&cmbFilter=$cmbFilter'>Approve Now</a></font></TH></TR>";
    }

     echo "<TR><TH colspan='8'>EXPENDITURES</TH></TR>";
    while(list($id,$date,$type,$recipient,$amount,$paid,$remark)=mysqli_fetch_row($result2))
    {
     $i=$i+1;
     if ($remark !='Approved')
     {
      $remark ='Unapproved';
     }
     $date=date('d M, Y',strtotime($date));
     $amount=number_format($amount,2);
     $type='Expense';
     echo "<TR><TH>$i &nbsp;</TH><TH>$date  &nbsp;</TH><TH> $type &nbsp;</TH><TH>$recipient &nbsp;</TH>
      <TH>$amount &nbsp;</TH><TH>0 &nbsp;</TH><TH>$remark &nbsp;</TH><TH> <font color='#FF0000' style='font-size: 8pt'><a href ='paysummcalc.php?id=$id&type=$type&filter=$filter&page=$page&cmbFilter=$cmbFilter'>Approve Now</a></font></TH></TR>";
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
               <TH><a href ='exppaysumm.php?cmbFilter=$cmbFilter&filter=$filter'> Export </a>&nbsp;</TH>
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


