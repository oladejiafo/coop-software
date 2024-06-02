<?php 
session_start(); 

?>
  <html>
  
  <body bgcolor="#FFFFDF">
  <?php
           
            if (isset($_SESSION['user_id']) && ($_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] ==5)) 
             {
               echo " <a href='secret.php?SNO=" . $SNO . "'> Warnings</a>";
               echo " | <a href='qsecret.php?SNO=" . $SNO . "'>Queries</a>";
               echo " | <a href='appraisal.php?SNO=" . $SNO . "'>Appraisals</a>";
               echo " | <a href='promotion.php?SNO=" . $SNO . "'>Promotions</a>"; 
            }
 ?>
