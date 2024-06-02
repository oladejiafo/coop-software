<?php 
session_start(); 

?>
  <html>
  
  <body bgcolor="#008000">
  <?php
           
            if (isset($_SESSION['user_id']) && ($_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] == 4 or $_SESSION['access_lvl'] ==5)) 
             {
               echo " <a href='stafflist.php'> Staff Records</a>";
               echo " | <a href='staffsecret.php'>Staff Confidential</a>";
               echo " | <a href='nominalroll.php'>Nominal Roll</a>";
               echo " | <a href='retirement.php'>Retirement</a>";
             }
 ?>
