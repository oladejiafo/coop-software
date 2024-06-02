<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don’t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn’t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
}
$cmbtype=$_GET['cmbtype'];
$amount=$_GET['amount'];
$ID=$_GET['gl'];
$cmbAllow=$_GET['cmbAllow'];

require_once 'conn.php';
   if ($cmbtype == "Amount")
   {  
    if (Trim($cmbAllow) != "")
     {  
      $query = "SELECT `AllowanceID`,`Description`,`Type`,`SortOrder`,`Group` FROM `allowance types` where `Description`='$cmbAllow'";
      $result_a = mysql_query($query,$conn);
      $rows = mysql_fetch_array($result_a);
      $query_i="Insert into `allowances` (`AllowanceID`,`Description`,`Amount`,`Type`,`Grade Level`,`SortOrder`,`Typ`)
                    Values ('" . $rows['AllowanceID'] . "','$cmbAllow','$amount','" . $rows['Type'] . "','$ID','" . $rows['SortOrder'] . "','" . $rows['Group'] . "')";
      $result = mysql_query($query_i);

      $tval="Your record has been updated.";
      header("location:pitems.php?cmbType=$cmbtype&cmbGL=$ID&redirect=$redirect");
      }
   }
   else if ($cmbtype == "Percent")
   {  
   if (Trim($cmbAllow) != "")
    {  
      $query = "SELECT `AllowanceID`,`Description`,`Type`,`SortOrder`,`Group` FROM `allowance types` where `Description`='$cmbAllow'";
      $result_p = mysql_query($query,$conn);
      $rows = mysql_fetch_array($result_p);
      $query="Insert into `pallowances` (`AllowanceID`,`Description`,`Amount`,`Percent`,`Type`,`Grade Level`,`SortOrder`,`Typ`)
                    Values ('" . $rows['AllowanceID'] . "','$cmbAllow','$amt','$amount','" . $rows['Type'] . "','$ID','" . $rows['SortOrder'] . "','" . $rows['Group'] . "')";
      $result = mysql_query($query);
      $tval="Your record has been updated.";
      header("location:pitems.php?cmbType=$cmbtype&cmbGL=$ID&redirect=$redirect");
     }
   }