<?php
 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';

//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & $_SESSION['access_lvl'] != 5) 
{
 if ($_SESSION['access_lvl'] != 3 & $_SESSION['access_lvl'] != 33 & $_SESSION['access_lvl'] != 333 & $_SESSION['access_lvl'] != 4) 
 {
   $redirect = $_SERVER['PHP_SELF'];
   header("Refresh: 0; URL=index.php?redirect=$redirect");

 }
}
?>
<div align="center">
	<table border="0" width="100%" bgcolor="#394247" id="table1">

		<tr>
			<td align="center" width="80%" valign=top>
	<table border="0" width="100%" id="table1" bgcolor="#FFFFFF">
		<tr align='center'>
 <td bgcolor="#87B8D6" colspan=2><b>
<font face="Verdana" color="#FFFFFF" style="font-size: 16pt">Staff Time Sheet</font></b>
 </td>
</tr>
		<tr>
			<td width="80%" valign="top">


   <form  action="hrattendance.php" method="post">
    <body bgcolor="#D2DD8F">
     Enter Date:
     <input size="5" type="text" name="dt">
     &nbsp; 
      Select Criteria1: <select size="1" name="cmbFilter1">
      <option selected></option>
      <option value="Absent">Absent</option>
      <option value="Late">Late</option>
      <option value="Staff No">Staff No</option>
     </select>
     &nbsp; 
     <input size="8" type="text" name="filter1">
     &nbsp; 
      Select Criteria2: <select size="1" name="cmbFilter2">
      <option selected></option>
      <option value="Absent">Absent</option>
      <option value="Late">Late</option>
      <option value="Staff No">Staff No</option>
     </select>
     &nbsp; 
     <input size="8" type="text" name="filter2">
     <input type="submit" value="Go" name="submit">
     <br>
    </body>
   </form>

<font size="2px" face="Arial">
<TABLE width='98%' border='0' cellpadding='1' cellspacing='1' align='center' bordercolor="#008000" id="table2">
 <?php
 @$tval=$_GET['tval'];
 @$limit      = 25;
 @$page=$_GET['page'];

 @$cmbFilter1=$_REQUEST["cmbFilter1"];
 @$filter1=$_REQUEST["filter1"];
 @$cmbFilter2=$_REQUEST["cmbFilter2"];
 @$filter2=$_REQUEST["filter2"];
 @$dt=$_REQUEST["dt"];
 @$dtt=date('d F, Y',strtotime($_REQUEST["dt"]));

@$SNO=$_REQUEST["SNO"];
@$edt=$_REQUEST["edt"];
@$att=$_REQUEST["att"];
@$tin=$_REQUEST["tin"];
@$tou=$_REQUEST["tou"];
@$note=$_REQUEST["note"];
@$id=$_REQUEST["id"];

if ($dt=="" or empty($dt))
{
  $dt=date('Y-m-d');
  $dtt=date('d F, Y');
}
if ($cmbFilter1=="Late")
{
  $cmbFilter1="Sex";
}
if ($cmbFilter1=="Absent")
{
  $cmbFilter1="Sex";
}

if ($cmbFilter1=="" or empty($cmbFilter2))
{
  $cmbFilter1="Sex";
}
if ($cmbFilter2=="" or empty($cmbFilter2))
{
  $cmbFilter2="Sex";
}

 echo "<font color='#FF0000' style='font-size: 10pt; font-weight:bold; text-align: center;'>" . $tval . "</font>";
 echo "<p><font style='font-size: 9pt'>";

   $query_count    = "SELECT * FROM `staff` where `" . $cmbFilter1 . "` like '$filter1%' and `" . $cmbFilter2 . "` like '$filter2%'"; 
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

  echo "<TR><TH align=left colspan=2><font color='#FF0000' style='font-size: 12pt; text-align: left;'><b>$dtt </b><br></font></TH><TH align=right><font color='#FF0000' style='font-size: 12pt; text-align: left;'>";    
if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"hrattendance.php?cmbFilter1=$cmbFilter1&filter1=$filter1&cmbFilter2=$cmbFilter2&filter2=$filter2&dt=$dt&page=$pageprev\">PREV PAGE</a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
    }
    else 

    $numofpages = $totalrows / $limit;  
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

        echo("<a href=\"hrattendance.php?cmbFilter1=$cmbFilter1&filter1=$filter1&cmbFilter2=$cmbFilter2&filter2=$filter2&dt=$dt&page=$pagenext\">NEXT PAGE</a>");  
            
    }           
 echo "</font></TH></TR>";

   $query="SELECT `staff`.`Staff Number`,`staff`.Surname, `staff`.Firstname, `staff`.`Present Rank`, `staff`.`Sex`,`Dept` FROM `staff` where `" . $cmbFilter1 . "` like '$filter1%' and `" . $cmbFilter2 . "` like '$filter2%' order by `Dept`,`Staff Number` LIMIT $limitvalue, $limit";
   $result=mysql_query($query);

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

    while(list($SNO,$Surname,$Firstname,$Class,$Sex,$Dept)=mysql_fetch_row($result))
    {
     $queryi="SELECT `ID`,`Staff No`,`Attendance`, `Note`, `Date`,`Time In`, `Time Out` FROM `timesheet` where `Staff No`='$SNO' and `Date`='$dt'";
     $resulti=mysql_query($queryi);
     $rowi  = mysql_fetch_array($resulti);
     $trowi = mysql_num_rows($resulti);

     echo "<TR><TH rowspan=3 style='border-top: 1px dotted #808080; border-right: 1px dotted #808080'>";
     if (file_exists("images/pics/" . $SNO . ".jpg")==1)
     {
       echo "<img border='0' src='images/pics/" . $SNO . ".jpg' width='100' height='100'>";
     } else {
       echo "<img border='0' src='images/pics/pix.jpg' width='100' height='100'>";
     }
     $oruko= $Firstname . ' ' . $Surname;
     echo "</TH><TH style='border-top: 1px dotted #808080; border-right: 1px dotted #808080' align='left'><font face='Verdana' color='#ff8080' style='font-size: 12pt'>" . $oruko . "</font> &nbsp;</TH>"; 
      echo "<TH style='border-top: 1px dotted #808080' align=left colspan=1>";
?>
<form method="post" action="addhrattend.php">
<table width="100%" align="left"><tr>
<th>
Attendance:<br><select size="1" name="att">
      <option selected><?php if($att=="" or empty($att)){ echo "Present"; } else { echo $att; } ?></option>
      <option>Present</option>
      <option>Absent</option>
     </select>
</th><th>
Time In:<br>
<?php 
if(!$tin)
{
?>
<input type='text' name="ti" size='7' value="<?php echo date('H:i:s',strtotime($tin)-3600); ?>"> 
<?php 
} else {
?>
<input type='text' name="ti" size='7' value="<?php echo date('H:i:s',strtotime($tin)); ?>"> 
<?php 
}?>

</th><th>
Time Out:<br>
<?php 
if(!$tou)
{
?>
<input type='text' name="to" size='7' value="<?php echo date('H:i:s',strtotime($tou)-3600); ?>"> 
<?php 
} else {
?>
<input type='text' name="to" size='7' value="<?php echo date('H:i:s',strtotime($tou)); ?>"> 
<?php 
}?>

</th><th>
Remark:<br><select size="1" name="note">
      <option selected><?php echo $note; ?></option>
      <option>Excused</option>
      <option>Sick</option>
      <option>On Assignment</option>
      <option>On Leave</option>
      <option>On Field Work</option>
      <option>On Suspension</option>
      <option>On Training</option>
      <option>No Reason</option>
     </select>

<input type='hidden' name='class' size='10' value="<?php echo $Class; ?>">
<input type='hidden' name='sno' size='10' value="<?php echo $SNO; ?>">
<input type='hidden' name='dt' size='10' value="<?php echo $dt; ?>">
<input type='hidden' name='id' size='10' value="<?php echo $_REQUEST['id']; ?>">

<input type='hidden' name='cmbFilter1' size='10' value="<?php echo $cmbFilter1; ?>">
<input type='hidden' name='cmbFilter2' size='10' value="<?php echo $cmbFilter2; ?>">
<input type='hidden' name='filter1' size='10' value="<?php echo $filter1; ?>">
<input type='hidden' name='filter2' size='10' value="<?php echo $filter2; ?>">
</th><th>
<?php
if (!$edt)
{
?>
<input name="submit" type="submit"  style="background-image:url(images/check.jpg); width:65; height:30; background-repeat:no repeat; color:#990000" value="Save" align="top">
<?php } else { 
if ($_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] == 33 or $_SESSION['access_lvl'] == 5) 
{
?>
<input name="submit" type="submit"  style="background-image:url(images/check.jpg); width:55; height:30; background-repeat:no repeat; color:#990000" value="Modify" align="top">
&nbsp;
<input name="submit" type="submit"  style="background-image:url(images/check.jpg); width:55; height:30; background-repeat:no repeat; color:#990000" value="Ignore" align="top">

<?php
}}
?>
</th>
</tr></table>
</form>
<?php
     echo "</Th><TH  style='border-top: 1px dotted #808080' align='right'>";
      if ($trowi == 0)
      {
       echo '-----'; 
      } else {
       if ($rowi['Attendance']=='Present')
       {
         echo $rowi['Attendance'] . " <img border='0' src='images/check.jpg' width='22' height='22'> &nbsp; <a href='addhrattend.php?sno=$SNO&class=$Class&dt=$dt&adt=Delete&cmbFilter1=$cmbFilter1&filter1=$filter1&cmbFilter2=$cmbFilter2&filter2=$filter2' title='Undo'><font face='Verdana' color='red' style='font-size: 7pt'>(u)</font></a>";
       } else {
         echo $rowi['Attendance'] . " <img border='0' src='images/cancel.jpg' width='27' height='27'> &nbsp; <a href='addhrattend.php?sno=$SNO&class=$Class&dt=$dt&adt=Delete&cmbFilter1=$cmbFilter1&filter1=$filter1&cmbFilter2=$cmbFilter2&filter2=$filter2' title='Undo'><font face='Verdana' color='red' style='font-size: 7pt'>(u)</font></a>";
       }
      }

     echo "</TH></TR>";

     echo "<TR><TH style='border-right: 1px dotted #808080' align='left'>$Class &nbsp; - $Sex</TH></tr>";

     echo "<TR><TH style='border-right: 1px dotted #808080' align='left'>$Dept Dept</TH>";

     echo "<TH style='border-right: 1px dotted #808080' align='left'><Table width='100%' border=1>";

   $querQ="SELECT `ID`,`Staff No`,`Date`, `Time In`, `Time Out`, `Note` FROM `timesheet` where `Staff No`= '$SNO' and `Date` = '$dt' order by `Staff No`,`Time In`";
   $resultQ=mysql_query($querQ);

     echo "<TR><TH style='border-right: 1px solid #ff0000' align='left'>Time In</TH><TH style='border-right: 1px dotted #ff0000' align='left'>Time Out</TH><TH style='border-right: 1px dotted #ff0000' align='left'>Hours spent</TH><TH style='border-right: 1px dotted #ff0000' align='left'>Remark</TH>";
    while(list($id,$sn,$dtx,$tin,$tou,$not)=mysql_fetch_row($resultQ))
    {
     if($tin >'00:00:00' && $tou=='00:00:00') {$tou=date('H:i:s');}
    @$date = date('d-m-Y',strtotime($dtx));
    @$beggin_hour = substr($tin, 0, 5);
    @$end_hour = substr($tou, 0, 5);
    // Hours
    define("SECONDS_PER_HOUR", 60*60);
    // Calculate timestamp
    @$start = strtotime($date." ".$beggin_hour);
    @$stop = strtotime($date." ".$end_hour);
    // Diferences
    @$difference = $stop - $start;
    // Hours
    @$hours = round($difference / SECONDS_PER_HOUR,0);
    // Minutes
    @$minutes = round(($difference % SECONDS_PER_HOUR) / 60,0);
    @$tt= $hours. ":" .$minutes;

     echo "<TR><TH style='border-right: 1px dotted #ff0000' align='left'><a href='hrattendance.php?SNO=$sn&edt=1&dt=$dtx&att=Present&tin=$tin&tou=$tou&note=$not&id=$id' title='Modify'>$tin</a></TH><TH style='border-right: 1px dotted #ff0000' align='left'>$tou</TH><TH style='border-right: 1px dotted #ff0000' align='left'> $tt</TH><TH style='border-right: 1px dotted #ff0000' align='left'>$not </TH>";
    } 
     echo "</table></TH></TR>";
    } 

 ?>
</TABLE>

</font>
</TABLE>
<p align="right" style="margin-right:20px; margin-top:30px">
 <span class="style2"><font face="Arial" color="#666666">
 <img src="images/proudly.jpg" /> © 2014 <a target="_blank" href="http://www.waltergates.com">
    <font color="#666666">Waltergates</font></a></font></span></p>
</div>