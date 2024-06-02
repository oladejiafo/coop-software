<?php
 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';

#session_start();
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 4))
{
 if ($_SESSION['access_lvl'] != 5 & $_SESSION['access_lvl'] != 1){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=../index.php?redirect=$redirect");
}
}
?>
   <div align="center">
	<table border="0" width="100%" id="table1" bgcolor="#FFFFFF">
		<tr>
			<td>
			<div align="center">
				<table border="0" width="100%" id="table2">
					<tr>
						<td>

   <form  action="reports.php" method="post">
    <body bgcolor="#D2DD8F">
      <font style='font-size: 8pt'>Select Printing Option: <select size="1" name="cmbFilter">
      <option Selected>Individual</option>
      <option >All Staff</option>
     </select></font>
     &nbsp; 
      <font style='font-size: 8pt'>Enter Staff Number: 
      <input type="text" name="filter" size="15"></font>
      <input type="hidden" name="cmbReport" size="15" value="Payslip"></font>
      &nbsp;
      <input type="submit" value="Go" name="submit">
     <br>
    </body>
   </form>

<TABLE width='100%' border='1' cellpadding='1' cellspacing='1' align='center' id="table3">
<?php

 @$cmbFilter=$_REQUEST["cmbFilter"];
 @$filter=$_REQUEST["filter"];
 @$filt=$_REQUEST["filt"];

      echo"<h2><center>Pay Slip</center></h2> ";

  if (trim(empty($cmbFilter)))
  { 
   $result = mysqli_query($conn,"SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Location`,`pay`.`Rank`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`,`payr`.`Allowid`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Group By `pay`.`Staff Number` Order by `pay`.`Staff Number`,`payr`.`Typ`,`payr`.`SortOrder`"); 
  }
  else if (trim($cmbFilter)=="All Staff")
  {
   $limit      = 1;
   @$page=$_GET['page'];

   $query_count    = "SELECT `pay`.`Staff Number`, `pay`.`Staff Name` From `pay` Group By `pay`.`Staff Number` Order by `pay`.`Staff Number`";
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
        $page = 1;
   }

   @$limitvalue = $page * $limit - ($limit);  
   $limitval = $page * 1 - (1);  

   $result = mysqli_query($conn,"SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Location`,`pay`.`Rank`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`,`payr`.`AllowID`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Group By `pay`.`Staff Number` Order by `pay`.`Staff Number`,`payr`.`Typ`,`payr`.`SortOrder` LIMIT $limitval, 1"); 

  }
  else if (trim($cmbFilter)=="Per Location")
  {
   $limit      = 1;
   @$page=$_GET['page'];

   $query_count    = "SELECT `pay`.`Staff Number`, `pay`.`Staff Name` From `pay` where `Location`='$filter' Group By `pay`.`Staff Number` Order by `pay`.`Staff Number`";
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
        $page = 1;
   }

   @$limitvalue = $page * $limit - ($limit);  
   $limitval = $page * 1 - (1);  

   $result = mysqli_query($conn,"SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`,`payr`.`AllowID`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `pay`.`Location`='$filter' Group By `pay`.`Staff Number` Order by `pay`.`Staff Number`,`payr`.`Typ`,`payr`.`SortOrder` LIMIT $limitval, 1"); 

  }
  else if (trim($cmbFilter)=="Individual")
  {  
   $result = mysqli_query($conn,"SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Location`,`pay`.`Rank`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`,`payr`.`AllowID`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Where `pay`.`Staff Number`='$filter' Order by `pay`.`Staff Number`,`payr`.`Typ`,`payr`.`SortOrder`"); 
  }
@$row = mysqli_fetch_array($result);
@$filt=$row['Staff Number'];
?>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  <tr>

    <td width="99%">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber3">
  <tr>
    <td width="17%" height="19"><font style='font-size: 8pt'><b>Employee #:</b></font></td>
    <td width="33%" height="19"><font style='font-size: 8pt'><?php echo $row['Staff Number']; ?></font></td>
    <td width="17%" height="19"><font style='font-size: 8pt'><b>Employee Name:</b></font></td>
    <td width="33%" height="19"><font style='font-size: 8pt'><?php echo strtoupper($row['Staff Name']); ?></font></td>
  </tr>
  <tr>
    <td width="17%" height="19"><font style='font-size: 8pt'><b>Division:</b></font></td>
    <td width="33%" height="19"><font style='font-size: 8pt'><?php echo $row['Office']; ?></font></td>
    <td width="17%" height="19"><font style='font-size: 8pt'><b>S.S.F #:</b></font></td>
    <td width="33%" height="19"><font style='font-size: 8pt'><?php echo ''; ?></font></td>
  </tr>
  <tr>
    <td width="17%" height="19"><font style='font-size: 8pt'><b>Department:</b></font></td>
    <td width="33%" height="19"><font style='font-size: 8pt'><?php echo $row['Department']; ?></font></td>
    <td width="17%" height="19"><font style='font-size: 8pt'><b>Position:</b></font></td>
    <td width="33%" height="19"><font style='font-size: 8pt'><?php echo $row['Rank']; ?></font></td>
  </tr>
  <tr>
    <td width="17%" height="19"><font style='font-size: 8pt'><b>Location:</b></font></td>
    <td width="33%" height="19"><font style='font-size: 8pt'><?php echo $row['Location']; ?></font></td>
    <td width="17%" height="19"><font style='font-size: 8pt'><b>Employee Type:</b></font></td>
    <td width="33%" height="19"><font style='font-size: 8pt'><?php echo @$row['Employee Type']; ?></font></td>
  </tr>
  <tr>
    <td width="17%" height="19"><font style='font-size: 8pt'><b>Bank:</b></font></td>
    <td width="33%" height="19"><font style='font-size: 8pt'><?php echo $row['Bank']; ?></font></td>
    <td width="17%" height="19"><font style='font-size: 8pt'><b>Account Number:</b></font></td>
    <td width="33%" height="19"><font style='font-size: 8pt'><?php echo $row['Acct No']; ?></font></td>
  </tr>
  <tr>
    <td width="17%" height="19"><font style='font-size: 8pt'><b>Month:</b></font></td>
    <td width="33%" height="19"><font style='font-size: 8pt'><?php echo strtoupper($row['Month']); ?></font></td>
    <td width="17%" height="19"><font style='font-size: 8pt'><b>Salary Grade:</b></font></td>
    <td width="33%" height="19"><font style='font-size: 8pt'><?php echo $row['Grade Level']; ?></font></td>
  </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td width="100%" colspan="2">&nbsp;</td>
  </tr>
</table>

<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="85%" id="AutoNumber2">
  <tr border="1">
    <td width="50%" align="right" bgcolor="#C0C0C0"><font style='font-size: 9pt'><b>Description</b></font></td>
    <td width="40%" align="right" bgcolor="#C0C0C0"><font style='font-size: 9pt'><b>Amount </b></font></td>

  </tr>
  
<?php
  if (trim($cmbFilter)=="All Staff")
  {
   $result = mysqli_query($conn,"SELECT `payr`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`,`payr`.`AllowID`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder`,`pay`.`GPAmount`,`pay`.`TDeduction`,`pay`.`TotPay`,`pay`.`NetPay` From `payr` left join `pay` on `payr`.`Staff Number`=`pay`.`Staff Number` Where `pay`.`Staff Number`='$filt' and `payr`.`class`='Gross Pay' Group By `payr`.`Staff Number`,`payr`.`Description`,`payr`.`SortOrder` Order by `pay`.`Staff Number`,`payr`.`Typ`,`payr`.`SortOrder`,`payr`.`AllowID`"); 
   $result2 = mysqli_query($conn,"SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`,`payr`.`AllowID`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder`,`pay`.`GPAmount`,`pay`.`TDeduction`,`pay`.`TotPay`,`pay`.`NetPay` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Where `pay`.`Staff Number`='$filt' and `payr`.`class`='Total Deduction' Group By `payr`.`Staff Number`,`payr`.`Description` Order by `pay`.`Staff Number`,`payr`.`Typ`,`payr`.`SortOrder`,`payr`.`AllowID`"); 

   $result01 = mysqli_query($conn,"SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`,`payr`.`AllowID`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder`,`pay`.`GPAmount`,`pay`.`TDeduction`,`pay`.`TotPay`,`pay`.`NetPay` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Where `pay`.`Staff Number`='$filt' and `payr`.`class`='Consolidated Pay' Group By `pay`.`Staff Number`,`payr`.`Description`,`payr`.`SortOrder` Order by `pay`.`Staff Number`,`payr`.`Typ`,`payr`.`SortOrder`,`payr`.`AllowID`"); 
   $result201 = mysqli_query($conn,"SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`,`payr`.`AllowID`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder`,`pay`.`GPAmount`,`pay`.`TDeduction`,`pay`.`TotPay`,`pay`.`NetPay` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Where `pay`.`Staff Number`='$filt' and `payr`.`Description`='Tax' Group by `pay`.`Staff Number`,`payr`.`Description`,`payr`.`SortOrder` Order by `pay`.`Staff Number`,`payr`.`Typ`,`payr`.`SortOrder`,`payr`.`AllowID`"); 
   $result301 = mysqli_query($conn,"SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`,`payr`.`AllowID`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder`,`pay`.`GPAmount`,`pay`.`TDeduction`,`pay`.`TotPay`,`pay`.`NetPay` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Where `pay`.`Staff Number`='$filt' and `payr`.`Type`='Allowance (Non-Taxable)' Group by `pay`.`Staff Number`,`payr`.`Description`,`payr`.`SortOrder` Order by `pay`.`Staff Number`,`payr`.`Typ`,`payr`.`SortOrder`,`payr`.`AllowID`"); 

   $result3 = mysqli_query($conn,"SELECT `payhistory`.`Staff Number`, sum(`payhistory`.`GPAmount`) as ygp,sum(`payhistory`.`TDeduction`) as ytd, sum(`payhistory`.`TotPay`) as ytp, (sum(`payhistory`.`GPAmount`)-sum(`payhistory`.`TDeduction`)) as ynp From `payhistory`  Where `payhistory`.`Staff Number`='$filt' and `payhistory`.`month` like '%2008'  group by `payhistory`.`Staff Number`"); 
   @$ro = mysqli_fetch_array($result3);
   @$yd=number_format($ro['ygp'],2);
   @$ytd=number_format($ro['ytd'],2);
   @$ynp=number_format($ro['ynp'],2);
@$cls=0;
@$grossp=0;
@$grosspay=0;

  while(list($staffno, $name,$office, $dept, $month, $grade, $bank, $acctno, $branch, $code, $description, $amount, $class,$sortorder,$gp,$td,$tp,$np)=mysqli_fetch_row($result)) 
   {
      @$cls=$class;
      @$grosspay=$gp;
      @$grossp=number_format($gp,2);
      @$amount=number_format($amount,2);
      @$yamount=number_format($amount,2);
      echo "<TR><TH width='50%' align='right'> <font style='font-size: 8pt'>$description </font>&nbsp;</TH><TH width='40%' align='right'><font style='font-size: 8pt'>$amount</font>&nbsp;</TH></TR>";
   }
   echo "<TR><TH colspan='2'>&nbsp;</TH></TR>"; 
   echo "<TR><TH width='50%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$cls</b></font></TH><TH width='40%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$grossp</b></font></TH></TR><p>";
   echo "<TR><TH colspan='2'>&nbsp;</TH></TR>"; 

@$cls01=0;
@$consp01=0;
@$conspay01=0;
@$amt301=0;
  while(list($staffno01, $name01,$office01, $dept01, $month01, $grade01, $bank01, $acctno01, $branch01, $code01, $description01, $amount01, $class01,$sortorder01,$gp01,$td01,$tp01,$np01)=mysqli_fetch_row($result01)) 
   {
      @$cls01=$class01;
      @$conspay01=$tp01;
      @$consp01=number_format($tp01,2);
      @$amount01=number_format($amount01,2);
      #$yd=number_format($yd,2);
      echo "<TR><TH width='50%' align='right'> <font style='font-size: 8pt'>$description01 </font>&nbsp;</TH><TH width='40%' align='right'><font style='font-size: 8pt'>$amount01</font>&nbsp;</TH></TR>";
   }
   echo "<TR><TH colspan='2'>&nbsp;</TH></TR>"; 
   echo "<TR><TH width='50%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$cls01</b></font></TH><TH width='40%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$consp01</b></font></TH></TR><p>";
   echo "<TR><TH colspan='2'>&nbsp;</TH></TR>"; 
 @$cls1=0;
 @$totdeduct=0;
 @$amt201=0;
  while(list($staffno1, $name1,$office1, $dept1, $month1, $grade1, $bank1, $acctno1, $branch1, $code1, $description1, $amount1, $class1,$sortorder1,$gp1,$td1,$tp1,$np1)=mysqli_fetch_row($result2)) 
   {
      @$cls1=$class1;
      @$totdeduct=$td1;
      @$amt1=number_format((-1)*$amount1,2);
      echo "<TR><TH width='50%' align='right'> <font style='font-size: 8pt'>$description1 </font>&nbsp;</TH><TH width='40%' align='right'><font style='font-size: 8pt'>$amt1 </font></TH></TR>";
   }
   echo "<TR><TH colspan='2'>&nbsp;</TH></TR>";   
      $totded=number_format($totdeduct,2);
   echo "<TR><TH width='50%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$cls1</b></font></TH><TH width='40%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$totded</b></font></TH></TR>";
   echo "<TR><TH colspan='2'>&nbsp;</TH></TR>"; 

if(!$conspay01)
{
   $nettaxable=$grosspay-$totdeduct;
} else {
   $nettaxable=$conspay01-$totdeduct;
}
   $nettaxable=number_format($nettaxable,2);
   echo "<TR><TH width='50%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>NET TAXABLE PAY</b></font></TH><TH width='40%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$nettaxable</b></font></TH></TR>";
   echo "<TR><TH colspan='2'>&nbsp;</TH></TR>"; 

  while(list($staffno201, $name201,$office201, $dept201, $month201, $grade201, $bank201, $acctno201, $branch201, $code201, $description201, $amount201, $class201,$sortorder201,$gp201,$td201,$tp201,$np201)=mysqli_fetch_row($result201)) 
   {
      @$amt201=number_format((-1)*$amount201,2);
      echo "<TR><TH width='50%' align='right'> <font style='font-size: 8pt'>$description201 </font>&nbsp;</TH><TH width='40%' align='right'><font style='font-size: 8pt'>$amt201 </font></TH></TR>";
   }
   echo "<TR><TH colspan='2'>&nbsp;</TH></TR>";   

  while(list($staffno301, $name301,$office301, $dept301, $month301, $grade301, $bank301, $acctno301, $branch301, $code301, $description301, $amount301, $class301,$sortorder301,$gp301,$td301,$tp301,$np301)=mysqli_fetch_row($result301)) 
   {
      @$amtn301=$amount301;
      @$amt301=number_format($amount301,2);
      echo "<TR><TH width='40%' align='right'> <font style='font-size: 8pt'>$description301 </font>&nbsp;</TH><TH width='30%' align='right'><font style='font-size: 8pt'>$amt301 </font></TR>";
   }
   echo "<TR><TH colspan='2'>&nbsp;</TH></TR>";   


if(!$conspay01)
{
   @$net=$grosspay-$totdeduct-$amt201+$amtn301;
} else {
   @$net=$conspay01-$totdeduct-$amt201+$amtn301;
}


#      $net=$grosspay-$totdeduct;
      $net=number_format($net,2);
   echo "<TR><TH width='40%' bgcolor='#C0C0C0' align='right'><font style='font-size: 9pt'><b>Net Pay </b></font></TH><TH width='30%' bgcolor='#C0C0C0' align='right'><font style='font-size: 9pt'><b> $net</b></font></TH></TR>";

    echo"</TABLE>";
    echo "<TR align='left'><TD>";

    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"payslip.php?cmbFilter=$cmbFilter&page=$pageprev\">PREV PAGE</a>  ");
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
            echo("<a href=\"payslip.php?cmbFilter=$cmbFilter&page=$i\">$i</a>  ");  
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
            echo("<a href=\"payslip.php?cmbFilter=$cmbFilter&page=$i\">$i</a>  "); 
       } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"payslip.php?cmbFilter=$cmbFilter&page=$pagenext\">NEXT PAGE</a>");  
            
    }          
    else
    { 
        echo("NEXT PAGE");  
    } 
    echo "</TD></TR>";
  }
  else if (trim($cmbFilter)=="Individual")
  {  
   @$ff="";
   $result = mysqli_query($conn,"SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`,`payr`.`AllowID`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder`,`pay`.`GPAmount`,`pay`.`TDeduction`,`pay`.`TotPay`,`pay`.`NetPay` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Where `pay`.`Staff Number`='$filter' and `payr`.`class`='Gross Pay' Order by `pay`.`Staff Number`,`payr`.`Typ`,`payr`.`SortOrder`,`payr`.`AllowID`"); 
   $result01 = mysqli_query($conn,"SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`,`payr`.`AllowID`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder`,`pay`.`GPAmount`,`pay`.`TDeduction`,`pay`.`TotPay`,`pay`.`NetPay` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Where `pay`.`Staff Number`='$filter' and `payr`.`class`='Consolidated Pay' Order by `pay`.`Staff Number`,`payr`.`Typ`,`payr`.`SortOrder`,`payr`.`AllowID`"); 
   $result2 = mysqli_query($conn,"SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`,`payr`.`AllowID`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder`,`pay`.`GPAmount`,`pay`.`TDeduction`,`pay`.`TotPay`,`pay`.`NetPay` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Where `pay`.`Staff Number`='$filter' and `payr`.`class`='Total Deduction' and `payr`.`Description` not in ('Provident Fund') Order by `pay`.`Staff Number`,`payr`.`Typ`,`payr`.`SortOrder`,`payr`.`AllowID`"); 
   $result21 = mysqli_query($conn,"SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`,`payr`.`AllowID`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder`,`pay`.`GPAmount`,`pay`.`TDeduction`,`pay`.`TotPay`,`pay`.`NetPay` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Where `pay`.`Staff Number`='$filter' and `payr`.`Description` = 'Provident Fund' Order by `pay`.`Staff Number`,`payr`.`Typ`,`payr`.`SortOrder`,`payr`.`AllowID`"); 
   $result201 = mysqli_query($conn,"SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`,`payr`.`AllowID`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder`,`pay`.`GPAmount`,`pay`.`TDeduction`,`pay`.`TotPay`,`pay`.`NetPay` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Where `pay`.`Staff Number`='$filter' and `payr`.`Description`='Tax' Order by `pay`.`Staff Number`,`payr`.`Typ`,`payr`.`SortOrder`,`payr`.`AllowID`"); 
   $result301 = mysqli_query($conn,"SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `pay`.`Office`, `pay`.`Department`,`pay`.`Month`,`pay`.`Grade Level`,`pay`.`Bank`,`pay`.`Acct No`,`pay`.`Branch`,`payr`.`AllowID`,`payr`.`Description`, `payr`.`Amount`, `payr`.`Class`,`payr`.`SortOrder`,`pay`.`GPAmount`,`pay`.`TDeduction`,`pay`.`TotPay`,`pay`.`NetPay` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` Where `pay`.`Staff Number`='$filter' and `payr`.`Type`='Allowance (Non-Taxable)' Order by `pay`.`Staff Number`,`payr`.`Typ`,`payr`.`SortOrder`,`payr`.`AllowID`"); 

   $reslt3 = mysqli_query($conn,"SELECT right(`Month`,4) as mnth From `pay`"); 
   $row3 = mysqli_fetch_array($reslt3);
   $mnth=$row3['mnth'];    

   $result3 = mysqli_query($conn,"SELECT `payhistory`.`Staff Number`, sum(`payhistory`.`GPAmount`) as ygp,sum(`payhistory`.`TDeduction`) as ytd, sum(`payhistory`.`TotPay`) as ytp, (sum(`payhistory`.`GPAmount`)-sum(`payhistory`.`TDeduction`)) as ynp From `payhistory`  Where `payhistory`.`Staff Number`='$filter' and `payhistory`.`month` like '%$mnth'  group by `payhistory`.`Staff Number`"); 
   $result4 = mysqli_query($conn,"SELECT `payhistory`.`Staff Number`, `payhistory`.`Staff Name` , `payhistory`.`Office`, `payhistory`.`Department`,`payhistory`.`Month`,`payhistory`.`Grade Level`,`payhistory`.`Bank`,`payhistory`.`Acct No`,`payhistory`.`Branch`,`payrhistory`.`AllowID`,`payrhistory`.`Description`, `payrhistory`.`Amount`, `payrhistory`.`Class`,`payrhistory`.`SortOrder`,`payhistory`.`GPAmount`,`payhistory`.`TDeduction`,`payhistory`.`TotPay`,`payhistory`.`NetPay` From `payhistory` left join `payrhistory` on `payhistory`.`Staff Number`=`payrhistory`.`Staff Number` Where `payhistory`.`Staff Number`='$filter' and `payrhistory`.`class`='Total Deduction' Order by `payhistory`.`Staff Number`,`payrhistory`.`Typ`,`payrhistory`.`SortOrder`"); 

   $ro = mysqli_fetch_array($result3);
   $rw = mysqli_fetch_array($result4);

   $yd=number_format($ro['ygp'],2);
   $ytd=number_format($ro['ytd'],2);
   $ynp=number_format($ro['ynp'],2);

  while(list($staffno, $name,$office, $dept, $month, $grade, $bank, $acctno, $branch, $code, $description, $amount, $class,$sortorder,$gp,$td,$tp,$np)=mysqli_fetch_row($result)) 
   {
      $cls=$class;
      $grosspay=$gp;
      $grossp=number_format($gp,2);
      $amount=number_format($amount,2);
      #$yd=number_format($yd,2);
      echo "<TR><TH width='40%' align='right'> <font style='font-size: 8pt'>$description </font>&nbsp;</TH><TH width='30%' align='right'><font style='font-size: 8pt'>$amount</font>&nbsp;</TH></TR>";
   }
   echo "<TR><TH colspan='2'>&nbsp;</TH></TR>"; 
   echo "<TR><TH width='40%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$cls</b></font></TH><TH width='30%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$grossp</b></font></TH></TR><p>";
   echo "<TR><TH colspan='2'>&nbsp;</TH></TR>"; 

  @$cls01="";
  @$conspay01="";
  @$consp01="";
  @$amt301="";
  while(list($staffno01, $name01,$office01, $dept01, $month01, $grade01, $bank01, $acctno01, $branch01, $code01, $description01, $amount01, $class01,$sortorder01,$gp01,$td01,$tp01,$np01)=mysqli_fetch_row($result01)) 
   {
      @$cls01=$class01;
      @$conspay01=@$tp01;
      @$consp01=number_format(@$tp01,2);
      @$amount01=number_format($amount01,2);
      #$yd=number_format($yd,2);
      echo "<TR><TH width='40%' align='right'> <font style='font-size: 8pt'>$description01 </font>&nbsp;</TH><TH width='30%' align='right'><font style='font-size: 8pt'>$amount01</font>&nbsp;</TH></TR>";
   }
   echo "<TR><TH colspan='2'>&nbsp;</TH></TR>"; 
   echo "<TR><TH width='40%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>@$cls01</b></font></TH><TH width='30%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>@$consp01</b></font></TH></TR><p>";
   echo "<TR><TH colspan='2'>&nbsp;</TH></TR>"; 
 
      @$cls1="";
      @$totdeduct="";
  while(list($staffno1, $name1,$office1, $dept1, $month1, $grade1, $bank1, $acctno1, $branch1, $code1, $description1, $amount1, $class1,$sortorder1,$gp1,$td1,$tp1,$np1)=mysqli_fetch_row($result2)) 
   {
      @$cls1=$class1;
      @$totdeduct=$td1;
     # $ytd=number_format($ytd,2);
      @$amt1=number_format((-1)*$amount1,2);
      echo "<TR><TH width='40%' align='right'> <font style='font-size: 8pt'>$description1 </font>&nbsp;</TH><TH width='30%' align='right'><font style='font-size: 8pt'>$amt1 </font></TH></TR>";
   }
   echo "<TR><TH colspan='2'>&nbsp;</TH></TR>";   
      @$totded=number_format($totdeduct,2);
   echo "<TR><TH width='40%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$cls1</b></font></TH><TH width='30%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$totded</b></font></TH></TR>";
   echo "<TR><TH colspan='2'>&nbsp;</TH></TR>"; 

if(!$conspay01)
{
   $nettaxable=$grosspay-$totdeduct;
} else {
   $nettaxable=$conspay01-$totdeduct;
}
   $nettaxable=number_format($nettaxable,2);
   echo "<TR><TH width='40%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>NET TAXABLE PAY</b></font></TH><TH width='30%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$nettaxable</b></font></TH></TR>";
   echo "<TR><TH colspan='2'>&nbsp;</TH></TR>"; 

  while(list($staffno201, $name201,$office201, $dept201, $month201, $grade201, $bank201, $acctno201, $branch201, $code201, $description201, $amount201, $class201,$sortorder201,$gp201,$td201,$tp201,$np201)=mysqli_fetch_row($result201)) 
   {
      $amt201=number_format((-1)*$amount201,2);
      @$amtn201=$amount201;
      echo "<TR><TH width='40%' align='right'> <font style='font-size: 8pt'>$description201 </font>&nbsp;</TH><TH width='30%' align='right'><font style='font-size: 8pt'>$amt201 </font></TH></TR>";
   }
   echo "<TR><TH colspan='2'>&nbsp;</TH></TR>";   

      @$cls21="";
      @$totdeduct21="";
  while(list($staffno21, $name21,$office21, $dept21, $month21, $grade21, $bank21, $acctno21, $branch21, $code21, $description21, $amount21, $class21,$sortorder21,$gp21,$td21,$tp21,$np21)=mysqli_fetch_row($result21)) 
   {
      @$cls21=$class21;
      @$totdeduct21=$td21;
     # $ytd=number_format($ytd,2);
      @$amt21=number_format((-1)*$amount21,2);
      @$amtn21=$amount21;
      echo "<TR><TH width='40%' align='right'> <font style='font-size: 8pt'>$description21 </font>&nbsp;</TH><TH width='30%' align='right'><font style='font-size: 8pt'>$amt21 </font></TH></TR>";
   }
   echo "<TR><TH colspan='2'>&nbsp;</TH></TR>";   
@$amtn301="";
  while(list($staffno301, $name301,$office301, $dept301, $month301, $grade301, $bank301, $acctno301, $branch301, $code301, $description301, $amount301, $class301,$sortorder301,$gp301,$td301,$tp301,$np301)=mysqli_fetch_row($result301)) 
   { @$ff=$staffno301;
      @$amt301=number_format($amount301,2);
      @$amtn301=$amount301;
      echo "<TR><TH width='40%' align='right'> <font style='font-size: 8pt'>$description301 </font>&nbsp;</TH><TH width='30%' align='right'><font style='font-size: 8pt'>$amt301 </font></TR>";
   }
   echo "<TR><TH colspan='2'>&nbsp;</TH></TR>";   

 @$ff=$staffno301;
if(!$conspay01)
{
   $net=$grosspay-$totdeduct+$amtn21+$amtn201+$amtn301;
} else {
   $net=$conspay01-$totdeduct+$amtn21+$amtn201+$amtn301;
}
      $TotNet=$net;
      $net=number_format($net,2);

   echo "<TR><TH width='40%' bgcolor='#C0C0C0' align='right'><font style='font-size: 9pt'><b>Net Pay </b></font></TH><TH width='30%' bgcolor='#C0C0C0' align='right'><font style='font-size: 9pt'><b> $net</b></font></TH>
</TR>";
  }
##################################################################################################################
function convert_number($number)
{
    if (($number < 0) || ($number > 999999999))
    {
        return "$number";
    }

    $Gn = floor($number / 1000000);  /* Millions (giga) */
    $number -= $Gn * 1000000;
    $kn = floor($number / 1000);     /* Thousands (kilo) */
    $number -= $kn * 1000;
    $Hn = floor($number / 100);      /* Hundreds (hecto) */
    $number -= $Hn * 100;
    $Dn = floor($number / 10);       /* Tens (deca) */
    $n = $number % 10;               /* Ones */

    $res = "";

    if ($Gn)
    {
        $res .= convert_number($Gn) . " Million";
    }

    if ($kn)
    {
        $res .= (empty($res) ? "" : " ") .
            convert_number($kn) . " Thousand";
    }

    if ($Hn)
    {
        $res .= (empty($res) ? "" : " ") .
            convert_number($Hn) . " Hundred";
    }

    $ones = array("", "One", "Two", "Three", "Four", "Five", "Six",
        "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen",
        "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen",
        "Nineteen");
    $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty",
        "Seventy", "Eigthy", "Ninety");

    if ($Dn || $n)
    {
        if (!empty($res))
        {
//            $res .= " and ";
           $res .= " ";
        }

        if ($Dn < 2)
        {
            $res .= $ones[$Dn * 10 + $n];
        }
        else
        {
            $res .= $tens[$Dn];

            if ($n)
            {
                $res .= "-" . $ones[$n];
            }
        }
    }

    if (empty($res))
    {
        $res = "zero";
    }

    return $res;
}

$USDollar = number_format($TotNet, 2,'.',','); // put it in decimal format, rounded

$printTotNet = convert_number($TotNet);  //convert to words (see function above)
#$table .= '*********** ';
$x = $USDollar;
$explode = explode('.', $x);   //separate the cents
$printTotNet2 = convert_number($explode[1]);
$printDolCents = '*** ' . $printTotNet . ' Naira and ' . $printTotNet2 . ' Kobo ***';
$table = $printDolCents;  // print the line with dollars words and cents in numerals 

##################################################################################################################
   echo "<TR><TH width='100%' colspan=2 bgcolor='#C0C0C0' align='center'><font style='font-size: 9pt'><b>$printDolCents </b></font></TH></TR>";
?>
</table>
<br>
<Table width="62%">
<tr>
<td align='center'>

<?php

 echo "<a target='blank' href='rptpayslip.php?cmbFilter=$cmbFilter&filter=$filter&filt='> Print Pay Slip</a> ";
/*
 echo "&nbsp;~~ <a href='payslip.php?cmbFilter=$cmbFilter&filter=$filter'> View Pay Slip (Staff)</a> &nbsp; ";
*/
?>
</td>
</tr>
</Table

</TABLE>

</td>
					</tr>

				</table>
			</div>
