<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 1))
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
?>
   <div align="left">
	<table border="0" width="800" id="table1" bgcolor="#FFFFFF">
		<tr>
			<td>
			<div align="left">
				<table border="0" width="800" id="table2">
					<tr>
						<td>

     <h2><left><b><u></u></b></left></h2>
     <h3><left><u>Deduction Report</u></left></h3>
<TABLE width='795' border='1' cellpadding='1' cellspacing='1' align='left' id="table3">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="75%" id="AutoNumber2">
<?php

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];
 $valt=$_REQUEST["valt"];

if($filter=="All")
{
  $valt="%";
  $valtt="All";
} else {
  $valtt=$valt;
}

  $sql_d = "SELECT `payr`.*,`pay`.* FROM `payr` inner join `pay` on `payr`.`staff number`=`pay`.`staff number` where `type`='D'";
  $result_d = mysql_query($sql_d,$conn) or die('Could not list value; ' . mysql_error());
  $row = mysql_fetch_array($result_d);
  $mnth=$row['Month'];

  $result = mysql_query ("SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `payr`.`description`, `pay`.`Month`,`payr`.`amount` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `payr`.`Description`='$cmbFilter' and `pay`.`Location` like '$valt%' Order by `pay`.`Staff Number`"); 

  echo "<font style='font-size: 9pt'><b>Deduction Type: " . $cmbFilter . "</b></font> &nbsp; &nbsp; &nbsp;&nbsp; ******";
  echo "<font style='font-size: 8pt'><b>For the Month: " . $mnth . "</b></font>&nbsp; &nbsp &nbsp; &nbsp &nbsp;******";
  echo "<font style='font-size: 8pt'><b>Location: " . $valtt . "</b></font>";
  echo "<TR align='left'><TH bgcolor='#C0C0C0' width='33%'> <font style='font-size: 9pt'>Staff Name </font>&nbsp;</TH><TH align='right' bgcolor='#C0C0C0' width='33%'><font style='font-size: 9pt'>Amount</font>&nbsp;</TH></TR>";

  if (trim(!empty($cmbFilter)))
  {  
   if($filter=="Cooperative") 
   {
    $rest = mysql_query ("SELECT `pay`.`Co-operative` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `payr`.`Description`='$cmbFilter' and `pay`.`Co-operative` like '$valt%' Order by `pay`.`Staff Number`"); 
    while(list($loc)=mysql_fetch_row($rest)) 
    {
     $result = mysql_query ("SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `payr`.`description`, `pay`.`Month`,`payr`.`amount` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `payr`.`Description`='$cmbFilter' and `pay`.`Co-operative`='$loc' Order by `pay`.`Staff Number`"); 
     echo "<TR align='left'><TH width='33%' colspan='3'> <font style='font-size: 8pt'><b>$loc </b></font>&nbsp;</TH></TR>";
     while(list($staffno, $name,$descr, $month, $amount)=mysql_fetch_row($result)) 
     {
       $amount=number_format((-1)*$amount,2);
      echo "<TR align='left'><TH width='33%'> <font style='font-size: 8pt'>$name </font>&nbsp;</TH><TH align='right' width='33%'><font style='font-size: 8pt'>$amount</font>&nbsp;</TH></TR>";
     }
    }
   }
   else if($filter=="Union") 
   {
    #$rest = mysql_query ("SELECT `pay`.`Union` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `payr`.`Description`='$cmbFilter' and `pay`.`Union` like '$valt%' Order by `pay`.`Staff Number`"); 
    #while(list($loc)=mysql_fetch_row($rest)) 
    #{
     $result = mysql_query ("SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `payr`.`description`, `pay`.`Month`,`payr`.`amount` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `payr`.`Description`='$cmbFilter' and `pay`.`Union`='$valt' Order by `pay`.`Staff Number`"); 
     echo "<TR align='left'><TH width='33%' colspan='3'> <font style='font-size: 8pt'><b>$loc </b></font>&nbsp;</TH></TR>";
     while(list($staffno, $name,$descr, $month, $amount)=mysql_fetch_row($result)) 
     {
       $amount=number_format((-1)*$amount,2);
      echo "<TR align='left'><TH width='33%'> <font style='font-size: 8pt'>$name </font>&nbsp;</TH><TH align='right' width='33%'><font style='font-size: 8pt'>$amount</font>&nbsp;</TH></TR>";
     }
    #}
   }
   else
   {    
    if ($cmbFilter=="Tax")
    {  
      if($filter=="All") 
      {
        $restxx = mysql_query ("SELECT `pay`.`Location` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `payr`.`Description`='$cmbFilter' and `pay`.`Location` like '$valt%' group by `pay`.`Location`"); 
        while(list($loc)=mysql_fetch_row($restxx)) 
        {
          $result = mysql_query ("SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `payr`.`description`, `pay`.`Month`,`payr`.`amount` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `payr`.`Description`='$cmbFilter' and `pay`.`Location`  like '$loc%' Order by `pay`.`Staff Number`"); 
          echo "<TR align='center'><TH width='33%' colspan='3'> <font style='font-size: 10pt'><b>$loc </b></font>&nbsp;</TH></TR>";
          while(list($staffno, $name,$descr, $month, $amount)=mysql_fetch_row($result)) 
          {
            $amount=number_format((-1)*$amount,2);
            echo "<TR align='left'><TH width='33%'> <font style='font-size: 8pt'>$name </font>&nbsp;</TH><TH align='right' width='33%'><font style='font-size: 8pt'>$amount</font>&nbsp;</TH></TR>";
          }
          $sql_txx = "SELECT sum(`payr`.`amount`) as amt From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `payr`.`Description`='$cmbFilter' and `pay`.`Location` like '$loc%' group by `pay`.`Location`";
          $result_txx = mysql_query($sql_txx,$conn) or die('Could not list value; ' . mysql_error());
          $rowxx = mysql_fetch_array($result_txx);
          $amtx=$rowxx['amt'];
          $npx=number_format((-1)*$amtx,2);

          echo "<TR><TH>&nbsp;</TH></TR>"; 
          echo "<TR><TH width='20%' bgcolor='#EAEAEA' align='left'><font style='font-size: 10pt'><b>State Total</b></font></TH><TH width='20%' bgcolor='#EAEAEA' align='right'><font style='font-size: 10pt'><b>$npx</b></font></TH></TR><p>";

        }
      } else {

     $result = mysql_query ("SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `payr`.`description`, `pay`.`Month`,`payr`.`amount` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `payr`.`Description`='$cmbFilter' and `pay`.`Location`  like '$valt%' Order by `pay`.`Staff Number`"); 
     echo "<TR align='center'><TH width='33%' colspan='3'> <font style='font-size: 8pt'><b>$loc </b></font>&nbsp;</TH></TR>";
     while(list($staffno, $name,$descr, $month, $amount)=mysql_fetch_row($result)) 
     {
       $amount=number_format((-1)*$amount,2);
      echo "<TR align='left'><TH width='33%'> <font style='font-size: 8pt'>$name </font>&nbsp;</TH><TH align='right' width='33%'><font style='font-size: 8pt'>$amount</font>&nbsp;</TH></TR>";
     }
      }
    }else {

     $result = mysql_query ("SELECT `pay`.`Staff Number`, `pay`.`Staff Name` , `payr`.`description`, `pay`.`Month`,`payr`.`amount` From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `payr`.`Description`='$cmbFilter' and `pay`.`Location`  like '$valt%' Order by `pay`.`Staff Number`"); 
     echo "<TR align='center'><TH width='33%' colspan='3'> <font style='font-size: 8pt'><b>$loc </b></font>&nbsp;</TH></TR>";
     while(list($staffno, $name,$descr, $month, $amount)=mysql_fetch_row($result)) 
     {
       $amount=number_format((-1)*$amount,2);
      echo "<TR align='left'><TH width='33%'> <font style='font-size: 8pt'>$name </font>&nbsp;</TH><TH align='right' width='33%'><font style='font-size: 8pt'>$amount</font>&nbsp;</TH></TR>";
     }
    }
   }
  }

  $sql_t = "SELECT `pay`.`Staff Number`,sum(`payr`.`amount`) as amt From `pay` left join `payr` on `pay`.`Staff Number`=`payr`.`Staff Number` where `payr`.`Description`='$cmbFilter' and `pay`.`Location` like '$valt%' group by `payr`.`Description`";
  $result_t = mysql_query($sql_t,$conn) or die('Could not list value; ' . mysql_error());
  $row = mysql_fetch_array($result_t);
  $amt=$row['amt'];
  $np=number_format((-1)*$amt,2);

   echo "<TR><TH>&nbsp;</TH></TR>"; 
   echo "<TR><TH width='20%' bgcolor='#EAEAEA' align='left'><font style='font-size: 10pt'><b>Total</b></font></TH><TH width='20%' bgcolor='#EAEAEA' align='right'><font style='font-size: 10pt'><b>$np</b></font></TH></TR><p>";
?>
</table>
</table>

<br>

						<p>&nbsp;</td>
					</tr>
<TABLE width='105%' border='0' cellpadding='0' cellspacing='0' align='left'">
<tr>
						<td width=33%>Name:__________________________</td>
						<td width=33%>Name:__________________________</td>
						<td width=33%> &nbsp;</td>
					</tr>
<tr>
						<td width=33%>&nbsp;</td>
						<td width=33%>&nbsp;</td>
						<td width=33%> &nbsp;</td>
					</tr>
<tr>
						<td width=33%>Signature: _______________________</td>
						<td width=33%>Signature: _______________________</td>
						<td width=33%> &nbsp;</td>
					</tr>
<tr>
						<td width=33%><i>Head of Computer unit</i></td>
						<td width=33%><i>Pay/Recieving Cashier</i></td>
						<td width=33%> &nbsp;</td>
					</tr>
</table>					

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
 require_once 'footer.php';
?>