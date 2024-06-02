<?php
 require_once 'conc.php';

$sql_cl="SELECT `Class`,`Class Alias` FROM `staff` WHERE `email`='$email' and `Company`='" . $_SESSION['company'] . "'";
$result_cl = mysql_query($sql_cl,$conc) or die('Could not look up user data; ' . mysql_error());
$row_cl = mysql_fetch_array($result_cl);

@$clas=$row_cl['Class'];
@$clasa=$row_cl['Class Alias'];

if(!$clas)
{
 $clas="%";
}
if(!$clasa)
{
 $clasa="%";
}
?>
<div align="center">
	<table border="0" width="100%" bgcolor="#F1F5F5" id="table1">
		<tr align='center'>
 <td bgcolor="#e0e0e0"><b>
<font face="Verdana" color="#FFFFFF" style="font-size: 12pt">Attendance Report</font></b>
 </td>
</tr>
		<tr>
			<td colspan="2">

   <form  action="teachersbay.php" method="post">
    <body bgcolor="#D2DD8F">
      <select size="1" name="cmbFiltera">
      <option selected>Class</option>
      <option value="Student Number">Student Number</option>
     </select>
     &nbsp; 
     <input size="8" type="text" name="filtera">
     &nbsp;
     <input type="submit" value="Go" name="submit">
     <input type="hidden" value="Attendance" name="cmbReport">
     <br>
    </body>
   </form>

<font size="2px" face="Arial">
<TABLE width='98%' border='0' cellpadding='1' cellspacing='1' align='center' bordercolor="#008000" id="table2">
 <?php
 @$tval=$_GET['tval'];
 @$limit      = 15;
 @$page=$_GET['page'];

 @$cmbFiltera=$_REQUEST["cmbFiltera"];
 @$filtera=$_REQUEST["filtera"];
 @$terma=$_REQUEST["terma"];

if ($cmbFiltera=="" or empty($cmbFiltera))
{
  $cmbFiltera="Class";
}
if ($terma=='')
{
 $terma='%';
}

 echo "<p><font style='font-size: 9pt'>";

   $query_counta    = "SELECT * FROM `attendance` WHERE `Class`='$clas' and `" . $cmbFiltera . "` like '" . $filtera . "%' and `Company`='" . $_SESSION['company'] . "'"; 
   $result_counta   = mysql_query($query_counta);     
   $totalrowsa  = mysql_num_rows($result_counta);

   if(empty($page))
   {
         $page = 1;
   }
   @$limitvalue = $page * $limit - ($limit);  

if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"teachersbay.php?cmbFiltera=$cmbFiltera&filtera=$filtera&terma=$terma&page=$pageprev\">PREV PAGE</a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
    }
    else 

    @$numofpages = $totalrowsa / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"teachersbay.php?cmbFiltera=$cmbFiltera&filtera=$filtera&terma=$terma&page=$pagenext\">NEXT PAGE</a>");  
            
    }           
 echo "</font></TH></TR>";

   echo "<TR bgcolor='#c0c0c0'><TH valign='top'><b> Student Name </b>&nbsp;</TH><TH><b> Total Days <br>School Opened </b>&nbsp;</TH><TH><b> Total <br>Attendance </b>&nbsp;</TH><TH><b> Total <br>Absentism </b>&nbsp;</TH><TH><b> Average <br>Attendance </b>&nbsp;</TH></TR>";

   $querya="SELECT `ID`,`Student No`, `Attendance`,`Class` From `attendance` where `" . $cmbFiltera . "` like '$filtera%' and `Class` like '$clas' and `Company`='" . $_SESSION['company'] . "' LIMIT $limitvalue, $limit";
   $resulta=mysql_query($querya);


   if(mysql_num_rows($resulta) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

$sn=0;
$t=0;
$at=0;
$ab=0;
$av=0;
    while(list($id,$sno,$att,$class)=mysql_fetch_row($resulta)) 
    {	
       $sql="SELECT `Surname`,`Firstname` FROM student WHERE `Student Number`='$sno' and `Company`='" . $_SESSION['company'] . "'";
       $result = mysql_query($sql,$conc) or die('Could not look up user data; ' . mysql_error());
       $row = mysql_fetch_array($result);
       @$sname=$row['Surname'];
       @$fname=$row['Firstname'];
       @$name=$row['Firstname'] . " " . $row['Surname'];

       $sqlAT="SELECT count(`Student No`) as stn FROM `attendance` WHERE `Student No`='$sno' and `Class`='$class' and `Company`='" . $_SESSION['company'] . "'";
       $resultAT = mysql_query($sqlAT,$conc) or die('Could not look up user data; ' . mysql_error());
       $rowAT = mysql_fetch_array($resultAT);
       @$tot=$rowAT['stn'];

       $sqlATt="SELECT count(`Student No`) as att FROM `attendance` WHERE `Student No`='$sno' and `Class`='$class' and `Attendance`='Present' and `Company`='" . $_SESSION['company'] . "'";
       $resultATt = mysql_query($sqlATt,$conc) or die('Could not look up user data; ' . mysql_error());
       $rowATt = mysql_fetch_array($resultATt);
       @$totatt=$rowATt['att'];

       $sqlATb="SELECT count(`Student No`) as abb FROM `attendance` WHERE `Student No`='$sno' and `Class`='$class' and `Attendance`='Absent' and `Company`='" . $_SESSION['company'] . "'";
       $resultATb = mysql_query($sqlATb,$conc) or die('Could not look up user data; ' . mysql_error());
       $rowATb = mysql_fetch_array($resultATb);
       @$totab=$rowATb['abb'];

       @$avatt=$totatt/$tot;
       $sn=$sn+1;
       $t=$t+$tot;
       $at=$at+$totatt;
       $ab=$ab+$totab;
       $av=$av+$avatt;
      echo "<TR><TH>$name </TH><TH>$tot</TH><TH>$totatt</TH><TH>$totab</TH><TH>$avatt</TH></TR>";
    }
      $avv=$av/$sn;
      echo "<TR bgcolor='#e0e0e0'><TH>Class Summary </TH><TH>$t</TH><TH>$at</TH><TH>$ab</TH><TH>$avv</TH></TR>";
?>
</TABLE>

</font>



			</td>
		</tr>
	</table>
</div>
