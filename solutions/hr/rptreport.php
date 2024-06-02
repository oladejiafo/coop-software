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
@$cmbFilter="None";
@$filter="";
}
}
 require_once 'conn.php';

$sqr="SELECT * FROM `company info`";
$reslt = mysql_query($sqr,$conn) or die('Could not look up user data; ' . mysql_error());
$rw = mysql_fetch_array($reslt);
$coy=$rw['Company Name'];

 $cmbReport = $_REQUEST["cmbReport"];
 $cmbTable=$_REQUEST['cmbTable']; 
 $filter=$_REQUEST['filter']; 
?>
     <h1><b><center><?php echo $coy; ?> </center></b></h1>
     <h3><center><u><?php echo $cmbReport; ?> </u></center></h3>

<TABLE width='925' border='1' cellpadding='1' cellspacing='1' align='center' id="table3">
<?php


#################
if (trim($cmbReport) == "- Select Report-" or trim($cmbTable) == "- Select Criteria -")
{
  echo "<b>No Report or Criteria Selected <b>";        
}
else if (trim($cmbReport)=="Bin Card")
{  
  if (trim($cmbTable)=="Daily")
  {
   $val="`Sales Date`=date('$filter')";
  }
  else if (trim($cmbTable)=="Weekly")
  {
   $val="date(`Sales Date`)>'" . date('Y-m-d', strtotime('-1 week')) . "' and date(`Sales Date`)<'" . date('Y-m-d', strtotime('+1 day')) . "'";
  }
  else if (trim($cmbTable)=="Monthly")
  {
   $val="date(`Sales Date`)>'" . date('Y-m-d', strtotime('-1 month')) . "' and date(`Sales Date`)<'" . date('Y-m-d', strtotime('+1 day')) . "'";
  }
  else if (trim($cmbTable)=="Quarterly")
  {
   $val="date(`Sales Date`)>'" . date('Y-m-d', strtotime('-3 month')) . "' and date(`Sales Date`)<'" . date('Y-m-d', strtotime('+1 day')) . "'";
  }
  else if (trim($cmbTable)=="Yearly")
  {
   $val="date(`Sales Date`)=" . date('Y');
  }

   echo " <tr><b> [$cmbTable Sales Report]</b><br></tr>";
   echo "<TR bgcolor='#008000'><TH><b> Stock Code </b>&nbsp;</TH><TH><b> Stock Name </b>&nbsp;</TH><TH><b> Colour </b>&nbsp;</TH><TH><b> Sales Date </b>&nbsp;</TH><TH><b> Qnty Sold </b>&nbsp;</TH><TH><b> Unit Cost </b>&nbsp;</TH><TH><b> Total Cost </b>&nbsp;</TH><TH><b> Paid? </b>&nbsp;</TH></TR>";
 
   $result = mysql_query ("SELECT `Stock Code`, `Stock Name`,`Colour`,`Sales Date`, `Qnty Sold`, `Unit Cost`, `Total Cost`, `Paid` From `sales` where " . $val . " order by `Stock Code`"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!<br>"); 
   } 
    $val='Daily';

    while(list($stockcode,$stockname,$colour,$salesdate,$qntysold,$unitcost,$totalcost,$paid)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH>$stockcode </TH><TH>$stockname</TH><TH>$colour</TH><TH>$salesdate</TH><TH>$qntysold</TH><TH>$unitcost</TH><TH>$totalcost</TH><TH>$paid</TH></TR>";
    }

 }
 else if ($cmbReport == "Stock Issue Report")
 {
  if (trim($cmbTable)=="Daily")
  {
   $val="`Stock Date`=date('$filter')";
  }
  if (trim($cmbTable)=="Date Range")
  {
   $val="`Stock Date` between '" . $filter . "' and '" . $filter2 . "'";
  }
  else if (trim($cmbTable)=="Weekly")
  {
   $val="date(`Stock Date`)>'" . date('Y-m-d', strtotime('-1 week')) . "' and date(`Stock Date`)<'" . date('Y-m-d', strtotime('+1 day')) . "'";
  }
  else if (trim($cmbTable)=="Monthly")
  {
   $val="date(`Stock Date`)>'" . date('Y-m-d', strtotime('-1 month')) . "' and date(`Stock Date`)<'" . date('Y-m-d', strtotime('+1 day')) . "'";
  }
  else if (trim($cmbTable)=="Quarterly")
  {
   $val="date(`Stock Date`)>'" . date('Y-m-d', strtotime('-3 month')) . "' and date(`Stock Date`)<'" . date('Y-m-d', strtotime('+1 day')) . "'";
  }
  else if (trim($cmbTable)=="Yearly")
  {
   $val="date(`Stock Date`)=" . date('Y');
  }


   echo " <tr><b> [$cmbTable Stock Issue Report]</b><br></tr>";
   echo "<TR bgcolor='#008000'><TH><b> Stock Code </b>&nbsp;</TH><TH><b> Stock Name/Article </b>&nbsp;</TH><TH><b> Issue Date </b>&nbsp;</TH><TH><b> Qnty Issued </b>&nbsp;</TH><TH><b> Issued To </b>&nbsp;</TH><TH><b> Location </b>&nbsp;</TH></TR>";
 
   $result = mysql_query ("SELECT `Stock Code`, `Stock Name`,`Category`,`Stock Date`, `Qnty Given`, `Request By`, `Location` From `requisition` where " . $val . " order by `Stock Code`"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!<br>"); 
   } 
    $val='Daily';

    while(list($stockcode,$stockname,$weight,$reqdate,$qntygiven,$reqby,$loc)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH>$stockcode </TH><TH>$stockname</TH><TH>$reqdate</TH><TH>$qntygiven</TH><TH>$reqby</TH><TH>$loc</TH></TR>";
    }
 }
 else if ($cmbReport == "Stock Receipt Report")
 {
  if (trim($cmbTable)=="Daily")
  {
   $val="`Stock Date`=date('$filter')";
  }
  if (trim($cmbTable)=="Date Range")
  {
   $val="`Stock Date` between '" . $filter . "' and '" . $filter2 . "'";
  }
  else if (trim($cmbTable)=="Weekly")
  {
   $val="date(`Stock Date`)>'" . date('Y-m-d', strtotime('-1 week')) . "' and date(`Stock Date`)<'" . date('Y-m-d', strtotime('+1 day')) . "'";
  }
  else if (trim($cmbTable)=="Monthly")
  {
   $val="date(`Stock Date`)>'" . date('Y-m-d', strtotime('-1 month')) . "' and date(`Stock Date`)<'" . date('Y-m-d', strtotime('+1 day')) . "'";
  }
  else if (trim($cmbTable)=="Quarterly")
  {
   $val="date(`Stock Date`)>'" . date('Y-m-d', strtotime('-3 month')) . "' and date(`Stock Date`)<'" . date('Y-m-d', strtotime('+1 day')) . "'";
  }
  else if (trim($cmbTable)=="Yearly")
  {
   $val="date(`Stock Date`)=" . date('Y');
  }

   echo " <tr><b> [$cmbTable Stock Receipt Report]</b><br></tr>";
   echo "<TR bgcolor='#008000'><TH><b> Stock Code </b>&nbsp;</TH><TH><b> Stock Name/Article </b>&nbsp;</TH><TH><b> Receipt Date </b>&nbsp;</TH><TH><b> Qnty Received </b>&nbsp;</TH><TH><b> Unit Cost (N) </b>&nbsp;</TH><TH><b> Total Cost </b>&nbsp;</TH><TH><b> Location </b>&nbsp;</TH></TR>";
 
   $result = mysql_query ("SELECT `Stock Code`, `Stock Name`,`Category`,`Stock Date`, `Qnty Added`, `Unit Cost`, `Location` From `restock` where " . $val . " order by `Stock Code`"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!<br>"); 
   } 

    while(list($stockcode,$stockname,$colour,$restockdate,$qntyadded,$unitcost,$loc)=mysql_fetch_row($result)) 
    {	$totv=$unitcost*$qntyadded;
      echo "<TR><TH>$stockcode </TH><TH>$stockname</TH><TH>$restockdate</TH><TH>$qntyadded</TH><TH>$unitcost</TH><TH>$totv</TH><TH>$loc</TH></TR>";
    }
 }
 else if ($cmbReport == "Stock Report")
 {
  if ($cmbTable=="")
  {
   $cmbTable="None";
  }
  if (trim($cmbTable)=="Daily")
  {
   $val="`Stock Date`=date('$filter')";
  }
  if (trim($cmbTable)=="Date Range")
  {
   $val="`Stock Date` between '" . $filter . "' and '" . $filter2 . "'";
  }
  else if (trim($cmbTable)=="Weekly")
  {
   $val="date(`Stock Date`)>'" . date('Y-m-d', strtotime('-1 week')) . "' and date(`Stock Date`)<'" . date('Y-m-d', strtotime('+1 day')) . "'";
  }
  else if (trim($cmbTable)=="Monthly")
  {
   $val="date(`Stock Date`)>'" . date('Y-m-d', strtotime('-1 month')) . "' and date(`Stock Date`)<'" . date('Y-m-d', strtotime('+1 day')) . "'";
  }
  else if (trim($cmbTable)=="Quarterly")
  {
   $val="date(`Stock Date`)>'" . date('Y-m-d', strtotime('-3 month')) . "' and date(`Stock Date`)<'" . date('Y-m-d', strtotime('+1 day')) . "'";
  }
  else if (trim($cmbTable)=="Yearly")
  {
   $val="date(`Stock Date`)=" . date('Y');
  }

   echo " <tr><b> [$cmbTable Stock Report (/Bin Card) as at: " . date('Y-m-d') . "]</b><br></tr>";
   echo "<TR bgcolor='#CCFF00'><TH colspan='4'><b> STOCK DETAILS </b>&nbsp;</TH><TH colspan='2'><b> RECEIPT</TH><TH colspan='2'><b> ISSUE </b>&nbsp;</TH></TR>";
   echo "<TR bgcolor='#008000'><TH><b> Stock Code </b>&nbsp;</TH><TH><b> Stock Name </b>&nbsp;</TH><TH><b> Stock Balance </b>&nbsp;</TH><TH><b> Location </b>&nbsp;</TH><TH><b> Quantity Received </b>&nbsp;</TH><TH><b> Received Date </b>&nbsp;</TH><TH><b> Quantity Issued </b>&nbsp;</TH><TH><b> Issue Date </b>&nbsp;</TH></TR>";

   $result = mysql_query ("SELECT stock.`Stock Code`, `stock`.`stock Name`,`stock`.`category`,stock.`Units in Stock` , stock.`Location` , `Qnty Added` , `restock`.`Stock Date` , `Qnty Given` , `requisition`.`Stock Date` FROM `stock` 
           LEFT JOIN restock ON stock.`Stock Code` = restock.`Stock Code` 
           LEFT JOIN requisition ON stock.`Stock Code` = requisition.`Stock Code` GROUP BY stock.`Stock Code`");

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!<br>"); 
   } 
    $val='Daily';

    while(list($stockcode,$name,$colour,$unit,$loc,$added,$adddate,$given,$reqdate)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH>$stockcode </TH><TH>$name</TH><TH>$unit</TH><TH>$loc</TH><TH>$added</TH><TH>$adddate</TH><TH>$given</TH><TH>$reqdate</TH></TR>";
    }
 }
 else if ($cmbReport == "Non-Moving Stock Report")
 {
  if (trim($cmbTable)=="Daily")
  {
   $val="`Sales Date`=date('$filter')";
  }
  else if (trim($cmbTable)=="Weekly")
  {
   $val="date(`Sales Date`)=" . date('W');
  }
  else if (trim($cmbTable)=="Monthly")
  {
   $val="date(`Sales Date`)=" . date('m');
  }
  else if (trim($cmbTable)=="Yearly")
  {
   $val="date(`Sales Date`)=" . date('Y');
  }

   echo "<TR bgcolor='#008000'><TH><b> Stock Code </b>&nbsp;</TH><TH><b> Stock Name </b>&nbsp;</TH><TH><b> Sales Date </b>&nbsp;</TH><TH><b> Qnty Sold </b>&nbsp;</TH><TH><b> Unit Cost </b>&nbsp;</TH><TH><b> Total Cost </b>&nbsp;</TH><TH><b> Paid </b>&nbsp;</TH></TR>";
 
   $result = mysql_query ("SELECT `Stock Code`, `Stock Name`,`Sales Date`, `Qnty Sold`, `Unit Cost`, `Total Cost`, `Paid` From `sales` where " . $val . " order by `Stock Code`"); 

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!<br>"); 
   } 
    $val='Daily';

    while(list($stockcode,$stockname,$salesdate,$qntysold,$unitcost,$totalcost,$paid)=mysql_fetch_row($result)) 
    {	
      echo "<TR><TH>$stockcode </TH><TH>$stockname</TH><TH>$salesdate</TH><TH>$qntysold</TH><TH>$unitcost</TH><TH>$totalcost</TH><TH>$paid</TH></TR>";
    }
 }
?>