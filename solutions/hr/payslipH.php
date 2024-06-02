<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 44))
{
 if ($_SESSION['access_lvl'] != 5){
 if ($_SESSION['access_lvl'] != 2 & $_SESSION['access_lvl'] != 22 & $_SESSION['access_lvl'] != 4){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don�t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn�t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
}
}
}
 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';
?>
   <div align="center">
	<table border="0" width="800" id="table1" bgcolor="#FFFFFF">
		<tr>
			<td>
			<div align="center">
				<table border="0" width="800" id="table2">
					<tr>
						<td>

   <form  action="payslipH.php" method="post">
    <body bgcolor="#D2DD8F">
    <table> <tr><td> 
      <font style='font-size: 8pt'>Select Printing Option: </td><td><select size="1" name="cmbFilter">
      <option Selected>Individual</option>
     </select></font></td>
     &nbsp; <td>
      <font style='font-size: 8pt'>Enter Staff Grade Level: </td><td>
      <input type="text" name="filter" size="15"></font>
      &nbsp;</td></tr>
     <tr><td>Select Month to Print: </td><td> 
     <select size="1" name="cmbmonth">         
          <?php  
           echo '<option selected></option>';
           $sql = "SELECT distinct `Month` FROM `payhistory`";
           $result_month = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_month)) 
           {
             echo '<option>' . $rows['Month'] . '</option>';
           }
          ?> 
         </select>
      </td><td>&nbsp;</td><td>
      <input type="submit" value="Go" name="submit">
     </td></tr></table>

    </body>
   </form>

<TABLE width='795' border='1' cellpadding='1' cellspacing='1' align='center' id="table3">
<?php

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];
 $filt=$_REQUEST["filt"];
 $cmbmonth=$_REQUEST['cmbmonth'];

      echo"<h2><center>Pay Slip</center></h2> ";

  if (trim(empty($cmbFilter)))
  { 
   $result = mysqli_query($conn,"SELECT `payhistory`.`Staff Number`, `payhistory`.`Staff Name` , `payhistory`.`Office`, `payhistory`.`Department`,`payhistory`.`Month`,`payhistory`.`Grade Level`,`payhistory`.`Bank`,`payhistory`.`Acct No`,`payhistory`.`Branch`,`payrhistory`.`Allowid`,`payrhistory`.`Description`, `payrhistory`.`Amount`, `payrhistory`.`Class`,`payrhistory`.`SortOrder` From `payhistory` left join `payrhistory` on `payhistory`.`Staff Number`=`payrhistory`.`Staff Number` Group By `payhistory`.`Staff Number` Order by `payhistory`.`Staff Number`,`payhistory`.`Month`, `payrhistory`.`Typ`,`payrhistory`.`SortOrder`"); 
  }
  else if (trim($cmbFilter)=="All Staff")
  {
   $limit      = 1;
   $page=$_GET['page'];

   $query_count    = "SELECT `payhistory`.`Staff Number`, `payhistory`.`Staff Name` From `payhistory` Group By `payhistory`.`Staff Number` Order by `payhistory`.`Staff Number`";
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
        $page = 1;
   }

   $limitvalue = $page * $limit - ($limit);  
   $limitval = $page * 1 - (1);  

   $result = mysqli_query($conn,"SELECT `payhistory`.`Staff Number`, `payhistory`.`Staff Name` , `payhistory`.`Office`, `payhistory`.`Department`,`payhistory`.`Month`,`payhistory`.`Grade Level`,`payhistory`.`Bank`,`payhistory`.`Acct No`,`payhistory`.`Branch`,`payrhistory`.`AllowID`,`payrhistory`.`Description`, `payrhistory`.`Amount`, `payrhistory`.`Class`,`payrhistory`.`SortOrder` From `payhistory` left join `payrhistory` on `payhistory`.`Staff Number`=`payrhistory`.`Staff Number` Group By `payhistory`.`Staff Number` Order by `payhistory`.`Staff Number`,`payrhistory`.`Typ`,`payrhistory`.`SortOrder` LIMIT $limitval, 1"); 

  }
  else if (trim($cmbFilter)=="Individual")
  {  
   $result = mysqli_query($conn,"SELECT `payhistory`.`Staff Number`, `payhistory`.`Staff Name` , `payhistory`.`Office`, `payhistory`.`Department`,`payhistory`.`Month`,`payhistory`.`Grade Level`,`payhistory`.`Bank`,`payhistory`.`Acct No`,`payhistory`.`Branch`,`payrhistory`.`AllowID`,`payrhistory`.`Description`, `payrhistory`.`Amount`, `payrhistory`.`Class`,`payrhistory`.`SortOrder` From `payhistory` left join `payrhistory` on `payhistory`.`Staff Number`=`payrhistory`.`Staff Number` Where `payhistory`.`Grade Level`='$filter' and `payhistory`.`Month`='$cmbmonth' Order by `payhistory`.`Staff Number`,`payrhistory`.`Typ`,`payrhistory`.`SortOrder`"); 
  }
  $row = mysqli_fetch_array($result);
  $filt=$row['Staff Number'];
  ?>
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="90%" id="AutoNumber1">
  <tr>

    <td width="82%">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="85%" id="AutoNumber3">
  <tr>
    <td width="14%" height="19"><font style='font-size: 8pt'><b>Staff Number:</b></font></td>
    <td width="19%" height="19"><font style='font-size: 8pt'><?php echo $row['Staff Number']; ?></font></td>
    <td width="14%" height="19"><font style='font-size: 8pt'><b>Name:</b></font></td>
    <td width="19%" height="19"><font style='font-size: 8pt'><?php echo strtoupper($row['Staff Name']); ?></font></td>
  </tr>
  <tr>
    <td width="14%" height="19"><font style='font-size: 8pt'><b>Office:</b></font></td>
    <td width="19%" height="19"><font style='font-size: 8pt'><?php echo $row['Office']; ?></font></td>
    <td width="14%" height="19"><font style='font-size: 8pt'><b>Account Number:</b></font></td>
    <td width="19%" height="19"><font style='font-size: 8pt'><?php echo $row['Acct No']; ?></font></td>
  </tr>
  <tr>
    <td width="14%" height="19"><font style='font-size: 8pt'><b>Department:</b></font></td>
    <td width="19%" height="19"><font style='font-size: 8pt'><?php echo $row['Department']; ?></font></td>
    <td width="14%" height="19"><font style='font-size: 8pt'><b>Bank:</b></font></td>
    <td width="19%" height="19"><font style='font-size: 8pt'><?php echo $row['Bank']; ?></font></td>
  </tr>
  <tr>
    <td width="14%" height="19"><font style='font-size: 8pt'><b>Month:</b></font></td>
    <td width="19%" height="19"><font style='font-size: 8pt'><?php echo strtoupper($row['Month']); ?></font></td>
    <td width="14%" height="19"><font style='font-size: 8pt'><b></b></font></td>
    <td width="19%" height="19"><font style='font-size: 8pt'></font></td>
  </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td width="100%" colspan="2">&nbsp;</td>
  </tr>
</table>



<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="67%" id="AutoNumber2">

  <tr border="1">
    <td width="33%" align="right" bgcolor="#C0C0C0"><font style='font-size: 9pt'><b>Description</b></font></td>
    <td width="33%" align="right" bgcolor="#C0C0C0"><font style='font-size: 9pt'><b>Amount &nbsp;&nbsp;
    </b></font></td>
   <td width="34%" align="right" bgcolor="#C0C0C0"><font style='font-size: 9pt'><b>Year to Date &nbsp;&nbsp;
    </b></font></td>
  </tr>
  
<?php
  if (trim($cmbFilter)=="All Staff")
   {
   $result = mysqli_query($conn,"SELECT `payrhistory`.`Staff Number`, `payhistory`.`Staff Name` , `payhistory`.`Office`, `payhistory`.`Department`,`payhistory`.`Month`,`payhistory`.`Grade Level`,`payhistory`.`Bank`,`payhistory`.`Acct No`,`payhistory`.`Branch`,`payrhistory`.`AllowID`,`payrhistory`.`Description`, `payrhistory`.`Amount`, `payrhistory`.`Class`,`payrhistory`.`SortOrder`,`payhistory`.`GPAmount`,`payhistory`.`TDeduction`,`payhistory`.`TotPay`,`payhistory`.`NetPay` From `payrhistory` left join `payhistory` on `payrhistory`.`Staff Number`=`payhistory`.`Staff Number` Where `payhistory`.`Staff Number`='$filt' and `payrhistory`.`class`='Gross Pay' Group By `payrhistory`.`Staff Number`,`payrhistory`.`SortOrder`"); 
   $result2 = mysqli_query($conn,"SELECT `payhistory`.`Staff Number`, `payhistory`.`Staff Name` , `payhistory`.`Office`, `payhistory`.`Department`,`payhistory`.`Month`,`payhistory`.`Grade Level`,`payhistory`.`Bank`,`payhistory`.`Acct No`,`payhistory`.`Branch`,`payrhistory`.`AllowID`,`payrhistory`.`Description`, `payrhistory`.`Amount`, `payrhistory`.`Class`,`payrhistory`.`SortOrder`,`payhistory`.`GPAmount`,`payhistory`.`TDeduction`,`payhistory`.`TotPay`,`payhistory`.`NetPay` From `payhistory` left join `payrhistory` on `payhistory`.`Staff Number`=`payrhistory`.`Staff Number` Where `payhistory`.`Staff Number`='$filt' and `payrhistory`.`class`='Total Deduction' Group By `payrhistory`.`Staff Number` Order by `payhistory`.`Staff Number`,`payrhistory`.`Typ`,`payrhistory`.`SortOrder`"); 

   $reslt3 = mysqli_query($conn,"SELECT right(`Month`,4) as mnth From `payhistory` where `Month`='$cmbmonth'"); 
   $row3 = mysqli_fetch_array($reslt3);
   $mnth=$row3['mnth'];

   $result3 = mysqli_query($conn,"SELECT `payhistory`.`Staff Number`, sum(`payhistory`.`GPAmount`) as ygp,sum(`payhistory`.`TDeduction`) as ytd, sum(`payhistory`.`TotPay`) as ytp, (sum(`payhistory`.`GPAmount`)-sum(`payhistory`.`TDeduction`)) as ynp From `payhistory`  Where `payhistory`.`Staff Number`='$filt' and `payhistory`.`month` like '$mnth'  group by `payhistory`.`Staff Number`"); 
   $ro = mysqli_fetch_array($result3);
   $yd=number_format($ro['ygp'],2);
   $ytd=number_format($ro['ytd'],2);
   $ynp=number_format($ro['ynp'],2);

  while(list($staffno, $name,$office, $dept, $month, $grade, $bank, $acctno, $branch, $code, $description, $amount, $class,$sortorder,$gp,$td,$tp,$np)=mysqli_fetch_row($result)) 
   {
      $cls=$class;
      $grosspay=$gp;
      $grossp=number_format($gp,2);
      $amount=number_format($amount,2);
      $yamount=number_format($amount,2);
      echo "<TR><TH width='33%' align='right'> <font style='font-size: 8pt'>$description </font>&nbsp;</TH><TH width='33%' align='right'><font style='font-size: 8pt'>$amount</font>&nbsp;</TH><TH width='34%' align='right'><font style='font-size: 8pt'>$yamount</font>&nbsp;</TH></TR>";
   }
   echo "<TR><TH colspan='3'>&nbsp;</TH></TR>"; 
   echo "<TR><TH width='33%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$cls</b></font></TH><TH width='33%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$grossp</b></font></TH><TH width='34%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$grossp</b></font></TH></TR><p>";
   echo "<TR><TH colspan='3'>&nbsp;</TH></TR>"; 
 
  while(list($staffno1, $name1,$office1, $dept1, $month1, $grade1, $bank1, $acctno1, $branch1, $code1, $description1, $amount1, $class1,$sortorder1,$gp1,$td1,$tp1,$np1)=mysqli_fetch_row($result2)) 
   {
      $cls1=$class1;
      $totdeduct=$td1;
      $amt1=number_format((-1)*$amount1,2);
      echo "<TR><TH width='33%' align='right'> <font style='font-size: 8pt'>$description1 </font>&nbsp;</TH><TH width='33%' align='right'><font style='font-size: 8pt'>$amt1 </font></TH><TH width='34%' align='right'><font style='font-size: 8pt'>$amt1 </font></TH></TR>";
   }
   echo "<TR><TH colspan='3'>&nbsp;</TH></TR>";   
      $totded=number_format($totdeduct,2);
   echo "<TR><TH width='33%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$cls1</b></font></TH><TH width='33%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$totded</b></font></TH><TH width='34%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$totded</b></font></TH></TR>";
   echo "<TR><TH colspan='3'>&nbsp;</TH></TR>"; 
      $net=$grosspay-$totdeduct;
      $net=number_format($net,2);
   echo "<TR><TH width='33%' bgcolor='#C0C0C0' align='right'><font style='font-size: 9pt'><b>Net Pay </b></font></TH><TH width='33%' bgcolor='#C0C0C0' align='right'><font style='font-size: 9pt'><b> $net</b></font></TH><TH width='34%' bgcolor='#C0C0C0' align='right'><font style='font-size: 9pt'><b> $net</b></font></TH></TR>";

    echo"</TABLE>";
    echo "<TR align='left'><TD>";

    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&page=$pageprev\">PREV PAGE</a>  ");
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
            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&page=$i\">$i</a>  ");  
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
            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&page=$i\">$i</a>  "); 
       } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&page=$pagenext\">NEXT PAGE</a>");  
            
    }          
    else
    { 
        echo("NEXT PAGE");  
    } 
    echo "</TD></TR>";
  }
  else if (trim($cmbFilter)=="Individual")
  {  
   $result = mysqli_query($conn,"SELECT `payhistory`.`Staff Number`, `payhistory`.`Staff Name` , `payhistory`.`Office`, `payhistory`.`Department`,`payhistory`.`Month`,`payhistory`.`Grade Level`,`payhistory`.`Bank`,`payhistory`.`Acct No`,`payhistory`.`Branch`,`payrhistory`.`AllowID`,`payrhistory`.`Description`, `payrhistory`.`Amount`, `payrhistory`.`Class`,`payrhistory`.`SortOrder`,`payhistory`.`GPAmount`,`payhistory`.`TDeduction`,`payhistory`.`TotPay`,`payhistory`.`NetPay` From `payhistory` left join `payrhistory` on `payhistory`.`Staff Number`=`payrhistory`.`Staff Number` Where `payhistory`.`Grade Level`='$filter' and `payhistory`.`Month`='$cmbmonth' and `payrhistory`.`class`='Gross Pay' Order by `payhistory`.`Staff Number`,`payrhistory`.`Typ`,`payrhistory`.`SortOrder`"); 
   $result2 = mysqli_query($conn,"SELECT `payhistory`.`Staff Number`, `payhistory`.`Staff Name` , `payhistory`.`Office`, `payhistory`.`Department`,`payhistory`.`Month`,`payhistory`.`Grade Level`,`payhistory`.`Bank`,`payhistory`.`Acct No`,`payhistory`.`Branch`,`payrhistory`.`AllowID`,`payrhistory`.`Description`, `payrhistory`.`Amount`, `payrhistory`.`Class`,`payrhistory`.`SortOrder`,`payhistory`.`GPAmount`,`payhistory`.`TDeduction`,`payhistory`.`TotPay`,`payhistory`.`NetPay` From `payhistory` left join `payrhistory` on `payhistory`.`Staff Number`=`payrhistory`.`Staff Number` Where `payhistory`.`Grade Level`='$filter' and `payhistory`.`Month`='$cmbmonth' and `payrhistory`.`class`='Total Deduction' Order by `payhistory`.`Staff Number`,`payrhistory`.`Typ`,`payrhistory`.`SortOrder`"); 

   $reslt3 = mysqli_query($conn,"SELECT right(`Month`,4) as mnth From `payhistory` where `Month`='$cmbmonth'"); 
   $row3 = mysqli_fetch_array($reslt3);
   $mnth=$row3['mnth'];
    

   $result3 = mysqli_query($conn,"SELECT `payhistory`.`Staff Number`, sum(`payhistory`.`GPAmount`) as ygp,sum(`payhistory`.`TDeduction`) as ytd, sum(`payhistory`.`TotPay`) as ytp, (sum(`payhistory`.`GPAmount`)-sum(`payhistory`.`TDeduction`)) as ynp From `payhistory`  Where `payhistory`.`Grade Level`='$filter' and `payhistory`.`month` like '%$mnth'  group by `payhistory`.`Staff Number`"); 
   $ro = mysqli_fetch_array($result3);
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
      echo "<TR><TH width='33%' align='right'> <font style='font-size: 8pt'>$description </font>&nbsp;</TH><TH width='33%' align='right'><font style='font-size: 8pt'>$amount</font>&nbsp;</TH><TH width='34%' align='right'><font style='font-size: 8pt'></font>&nbsp;</TH></TR>";
   }
   echo "<TR><TH colspan='3'>&nbsp;</TH></TR>"; 
   echo "<TR><TH width='33%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$cls</b></font></TH><TH width='33%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$grossp</b></font></TH><TH width='34%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$yd</b></font></TH></TR><p>";
   echo "<TR><TH colspan='3'>&nbsp;</TH></TR>"; 
 
  while(list($staffno1, $name1,$office1, $dept1, $month1, $grade1, $bank1, $acctno1, $branch1, $code1, $description1, $amount1, $class1,$sortorder1,$gp1,$td1,$tp1,$np1)=mysqli_fetch_row($result2)) 
   {
      $cls1=$class1;
      $totdeduct=$td1;
     # $ytd=number_format($ytd,2);
      $amt1=number_format((-1)*$amount1,2);
      echo "<TR><TH width='33%' align='right'> <font style='font-size: 8pt'>$description1 </font>&nbsp;</TH><TH width='33%' align='right'><font style='font-size: 8pt'>$amt1 </font></TH><TH width='34%' align='right'><font style='font-size: 8pt'> </font></TH></TR>";
   }
   echo "<TR><TH colspan='3'>&nbsp;</TH></TR>";   
      $totded=number_format($totdeduct,2);
   echo "<TR><TH width='33%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$cls1</b></font></TH><TH width='33%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$totded</b></font></TH><TH width='34%' bgcolor='#EAEAEA' align='right'><font style='font-size: 8pt'><b>$ytd</b></font></TH></TR>";
   echo "<TR><TH colspan='3'>&nbsp;</TH></TR>"; 
      $net=$grosspay-$totdeduct;
      $net=number_format($net,2);
#      $ynp=$yd-$ytd;
   #   $ynp=number_format($ynp,2);
   echo "<TR><TH width='33%' bgcolor='#C0C0C0' align='right'><font style='font-size: 9pt'><b>Net Pay </b></font></TH><TH width='33%' bgcolor='#C0C0C0' align='right'><font style='font-size: 9pt'><b> $net</b></font></TH><TH width='34%' bgcolor='#C0C0C0' align='right'><font style='font-size: 9pt'><b> $ynp</b></font></TH></TR>";
  }
?>
</table>
<br>
<Table width="62%">
<tr>
<td align='center'>

<?php
 echo "<a target='blank' href='rptpayslipH.php?cmbFilter=$cmbFilter&filter=$filter&cmbmonth=$cmbmonth'> Print This Pay Slip</a> &nbsp; ";
?>
</td>
</tr>
</Table

</TABLE>


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