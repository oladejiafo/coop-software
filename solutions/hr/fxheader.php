<?php 
session_start(); 

?>
  <html>
  
  <body bgcolor="#FFFFDF">
  <?php
           
            if (isset($_SESSION['user_id']) && ($_SESSION['access_lvl'] ==5 or $_SESSION['access_lvl'] == 6 or $_SESSION['access_lvl'] ==7)) 
             {
               echo " <a href='assets.php?ID=" . $ID . "'> Fixed Assets</a>";
               echo " | <a href='depreciation.php?ID=" . $ID . "'>Depreciation Calaculator</a>";
             }
 ?>
