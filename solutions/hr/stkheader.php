<?php 
session_start(); 
?>
  <html>
  
  <body bgcolor="#FFFFDF">
  <?php
           
            if (isset($_SESSION['user_id']) && ($_SESSION['access_lvl'] == 5 or $_SESSION['access_lvl'] ==7)) 
             {
               echo " <a href='stock.php?code=" . $code . "'> Stock Details</a>";
               echo " | <a href='restock.php?code=" . $code . "'>Reciept</a>";
               echo " | <a href='requisition.php?code=" . $code . "'>Issue</a>";
               echo " | <a href='reports.php'>Reports</a>";
             }
 ?>
