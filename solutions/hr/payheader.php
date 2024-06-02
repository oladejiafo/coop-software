<?php 
session_start(); 

?>
  <html>
  
  <body bgcolor="#FFFFDF">
  <?php
           
if (isset($_SESSION['user_id']) && ($_SESSION['access_lvl'] == 1 or $_SESSION['access_lvl'] ==5 or $_SESSION['access_lvl'] == 4)) 
{
  echo " <a href='payroll.php'> Generate</a>";
}
if (isset($_SESSION['user_id']) && ($_SESSION['access_lvl'] == 1 or $_SESSION['access_lvl'] ==5 or $_SESSION['access_lvl'] == 4)) 
{
#  echo " | <a href='loans.php'>Loans</a>";
  echo " | <a href='variations.php'>Variations</a>";
  #echo " | <a href='payhistory.php'>Payroll History</a>";
}
if (isset($_SESSION['user_id']) && ($_SESSION['access_lvl'] == 1 or $_SESSION['access_lvl'] ==5 or $_SESSION['access_lvl'] == 4)) 
{
  echo " | <a href='payreports.php'>Payroll Reports</a>";
}
 ?>
