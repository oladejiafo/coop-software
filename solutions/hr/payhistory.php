<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 22 & $_SESSION['access_lvl'] != 4))
{
 if ($_SESSION['access_lvl'] != 5){
 if ($_SESSION['access_lvl'] != 2){
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
				<table border="0" width="780" id="table2">
					<tr>
						<td>
   <form  action="payhistory.php" method="post">
    <body bgcolor="#D2DD8F">
     <h2><center>Payroll History</center></h2>
      Select Criteria to Filter with: <select size="1" name="cmbFilter">
      <option Selected></option>
      <option>Month</option>
      <option>Staff Number</option>
      <option>Bank</option>
      <option>Show All</option>
      <option>Roll Back</option>
     </select>
     &nbsp; 
     <input type="text" name="filter">
     &nbsp; 
     <input type="submit" value="Go" name="submit">
     <br>
    </body>
   </form>
<fieldset style="padding: 2">
<p><legend><b><i><font size="2" face="Tahoma" color="#87ceff"> <?php require_once 'payheader.php'; ?>
</p></font></i></b></legend>

<TABLE width='778' border='1' cellpadding='1' cellspacing='1' align='center' id="table3">
<?php
 $limit      = 15;
 $page=$_GET['page'];

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];
 
   echo "<TR bgcolor='#D2DD8F'><TH><b> Staff Number </b>&nbsp;</TH><TH><b> Staff Name </b>&nbsp;</TH><TH><b> Grade Level </b>&nbsp;&nbsp;</TH><TH><b> Department </b>&nbsp;</TH> <TH><b> Bank </b>&nbsp;</TH> <TH><b> Basic </b>&nbsp;</TH>
      <TH><b> Total Pay </b>&nbsp;&nbsp;</TH><TH><b> Month </b>&nbsp;&nbsp;</TH></TR>";

  if (trim(empty($cmbFilter)))
  {
   $query_count    = "SELECT * FROM `payhistory` order by `Month` Desc,`Staff Number`";     
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
        $page = 1;
   }

   $limitvalue = $page * $limit - ($limit);  

   $result = mysqli_query($conn,"SELECT `Staff Number`, `Staff Name` , `Grade Level`, `Department`,`Bank`,`Basic`,`TotPay`,`Month` From `payhistory` order by `Month` Desc,`Staff Number` LIMIT $limitvalue, $limit"); 
 
   if(mysqli_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

   while(list($serviceno, $name,$grade, $dept, $bank, $basic, $tot, $month)=mysqli_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $name &nbsp;</TH><TH> $grade &nbsp;</TH> <TH> $dept &nbsp;</TH> <TH> $bank &nbsp;</TH>
      <TH> $basic &nbsp;</TH><TH> $tot &nbsp;</TH><TH> $month &nbsp;</TH></TR>";
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
  else if (trim($cmbFilter)=="" or trim($cmbFilter)=="Show All")
  {
   $query_count    = "SELECT * FROM `payhistory` order by `Month` Desc,`Staff Number`";     
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
        $page = 1;
   }

   $limitvalue = $page * $limit - ($limit);  

   $result = mysqli_query($conn,"SELECT `Staff Number`, `Staff Name` , `Grade Level`, `Department`,`Bank`,`Basic`,`TotPay`,`Month` From `payhistory` order by `Month` Desc,`Staff Number` LIMIT $limitvalue, $limit"); 
 
   if(mysqli_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

   while(list($serviceno, $name,$grade, $dept, $bank, $basic, $tot, $month)=mysqli_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $name &nbsp;</TH><TH> $grade &nbsp;</TH> <TH> $dept &nbsp;</TH> <TH> $bank &nbsp;</TH>
      <TH> $basic &nbsp;</TH><TH> $tot &nbsp;</TH><TH> $month &nbsp;</TH></TR>";
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
  else if (trim($cmbFilter)=="Month")
  {  
   $query_count    = "SELECT * FROM `payhistory` WHERE Month='" . $filter . "' order by `Month` Desc,`Staff Number`";     
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
        $page = 1;
   }

   $limitvalue = $page * $limit - ($limit);  

   $result = mysqli_query($conn,"SELECT `Staff Number`, `Staff Name` , `Grade Level`, `Department`,`Bank`,`Basic`,`TotPay`,`Month` From `payhistory` WHERE Month='" . $filter . "' order by `Month` Desc,`Staff Number` LIMIT $limitvalue, $limit");    
 
   if(mysqli_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

   while(list($serviceno, $name,$grade, $dept, $bank, $basic, $tot, $month)=mysqli_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $name &nbsp;</TH><TH> $grade &nbsp;</TH> <TH> $dept &nbsp;</TH> <TH> $bank &nbsp;</TH>
      <TH> $basic &nbsp;</TH><TH> $tot &nbsp;</TH><TH> $month &nbsp;</TH></TR>";
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
  else if (trim($cmbFilter)=="Staff Number")
  {  
   $query_count    = "SELECT * FROM `payhistory` WHERE `Staff Number`='" . $filter . "' order by `Month` Desc,`Staff Number`";     
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
        $page = 1;
   }

   $limitvalue = $page * $limit - ($limit);  

   $result = mysqli_query($conn,"SELECT `Staff Number`, `Staff Name` , `Grade Level`, `Department`,`Bank`,`Basic`,`TotPay`,`Month` From `payhistory` WHERE `Staff Number`='" . $filter . "' order by `Month` Desc,`Staff Number` LIMIT $limitvalue, $limit");    
 
   if(mysqli_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

   while(list($serviceno, $name,$grade, $dept, $bank, $basic, $tot, $month)=mysqli_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $name &nbsp;</TH><TH> $grade &nbsp;</TH> <TH> $dept &nbsp;</TH> <TH> $bank &nbsp;</TH>
      <TH> $basic &nbsp;</TH><TH> $tot &nbsp;</TH><TH> $month &nbsp;</TH></TR>";
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
  else if (trim($cmbFilter)=="Bank")
  {  
   $query_count    = "SELECT * FROM `payhistory` WHERE Bank='" . $filter . "' order by `Month` Desc,`Staff Number`"; 
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
        $page = 1;
   }

   $limitvalue = $page * $limit - ($limit);  

   $result = mysqli_query($conn,"SELECT `Staff Number`, `Staff Name` , `Grade Level`, `Department`,`Bank`,`Basic`,`TotPay`,`Month` From `payhistory` WHERE Bank='" . $filter . "' order by `Month` Desc,`Staff Number` LIMIT $limitvalue, $limit");    
 
   if(mysqli_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

   while(list($serviceno, $name,$grade, $dept, $bank, $basic, $tot, $month)=mysqli_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $name &nbsp;</TH><TH> $grade &nbsp;</TH> <TH> $dept &nbsp;</TH> <TH> $bank &nbsp;</TH>
      <TH> $basic &nbsp;</TH><TH> $tot &nbsp;</TH><TH> $month &nbsp;</TH></TR>";
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
  else if (trim($cmbFilter)=="Roll Back")
  {  
   $query_d = "Delete From `payhistory` WHERE `Month`='" . $filter . "'";
   $result_d= mysqli_query($conn,$query_d);

   ###ROLL-BACK LOANS UPDATE

      $query_update_loan1 = "update `loan` set `Loan Balance`=(`Loan Balance`+`monthly refund`),`RefundToDate`=(`RefundToDate`-`monthly refund`) where `LatestMonth` ='" . $filter . "'";
      $query_update_loan2 = "update `loan` set `LatestMonth`='" . $filter . "-1'";
      $query_update_loan3 = "update `loan` set `LoanStop`= 0, `MonthLoanStop`= 0 where `loan balance`>=0";

      $result_update_loan1 = mysqli_query($conn,$query_update_loan1) or die(mysqli_error());
      $result_update_loan2 = mysqli_query($conn,$query_update_loan2) or die(mysqli_error());
      $result_update_loan3 = mysqli_query($conn,$query_update_loan3) or die(mysqli_error());

   ###
   $query_count    = "SELECT * FROM `payhistory` order by `Month` Desc,`Staff Number`"; 
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
        $page = 1;
   }

   $limitvalue = $page * $limit - ($limit);  

   $result = mysqli_query($conn,"SELECT `Staff Number`, `Staff Name` , `Grade Level`, `Department`,`Bank`,`Basic`,`TotPay`,`Month` From `payhistory` order by `Month` Desc,`Staff Number` LIMIT $limitvalue, $limit");    
 
   if(mysqli_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

   while(list($serviceno, $name,$grade, $dept, $bank, $basic, $tot, $month)=mysqli_fetch_row($result)) 
   {	
      echo "<TR><TH> $serviceno &nbsp;</TH><TH> $name &nbsp;</TH><TH> $grade &nbsp;</TH> <TH> $dept &nbsp;</TH> <TH> $bank &nbsp;</TH>
      <TH> $basic &nbsp;</TH><TH> $tot &nbsp;</TH><TH> $month &nbsp;</TH></TR>";
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
            #######
           # session_start();
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql) or die('Could not fetch data; ' . mysqli_error());
            $rows = mysqli_fetch_array($result);

            $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`,`company`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Pay History','Payroll Rolled Back for the month: $filter','" . $_SESSION['name'] . "')";

            $result_insert_Log = mysqli_query($conn,$query_insert_Log) or die(mysqli_error());
            ###### 
  }
?>

</TABLE>
</fieldset>
<br>
<form>
<Table>
<tr>
<td>

<?php
# echo "<a target='blank' href='rptnominalroll.php'> Print Nominal Roll</a> &nbsp; ";
# echo "<a href='nominalexp.php?REF=" . $cmbFilter . "'> Export Nominal Roll</a> &nbsp;";
?>
</td>
</tr>
<Table width="100%">
<tr>
<td align='center'>

<?php
 echo "<a href='payslipH.php'> Print Past Pay Slip</a> &nbsp; ";
?>
</td>
</tr>
</Table
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