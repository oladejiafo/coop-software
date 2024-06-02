<?php 
session_start(); 

?>
  <html>
  
  <body bgcolor="#FFFFDF">
  <?php           
if (isset($_SESSION['user_id']) && ($_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] == 33 or $_SESSION['access_lvl'] == 333 or $_SESSION['access_lvl'] ==5 or $_SESSION['access_lvl'] == 4)) 
{
  echo " <a href='hr.php'><font color='#6699CC'> Staff Records</font></a>";
}
if (isset($_SESSION['user_id']) && ($_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] ==5 or $_SESSION['access_lvl'] == 4)) 
{
  echo " | <a href='staffsecret.php'><font color='#6699CC'>Staff Confidential</font></a>";
}
if (isset($_SESSION['user_id']) && ($_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] == 33 or $_SESSION['access_lvl'] == 333 or $_SESSION['access_lvl'] ==5 or $_SESSION['access_lvl'] == 4)) 
{
  echo " | <a href='schedules.php'><font color='#6699CC'>Schedules</font></a>";
}
if (isset($_SESSION['user_id']) && ($_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] == 33 or $_SESSION['access_lvl'] ==5 or $_SESSION['access_lvl'] == 4)) 
{
  echo " | <a href='hrattendance.php'><font color='#6699CC'>Staff Timesheet</font></a>";
  echo " | <a href='nominalroll.php'><font color='#6699CC'>Nominal Roll</font></a>";
  # echo " | <a href='retirement.php'><font color='#6699CC'>Retirement</font></a>";
 # echo " | <a href='hreports.php'><font color='#6699CC'>Reports</font></a>";
}
if (isset($_SESSION['user_id']) && ($_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] == 33 or $_SESSION['access_lvl'] == 333 or $_SESSION['access_lvl'] ==5 or $_SESSION['access_lvl'] == 4)) 
{
  echo ' | <a href="registry.php">Registry</a>';
}
 ?>
