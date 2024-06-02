<?php 
session_start(); 

?>
  <html>
  
  <body bgcolor="#FFFFDF">
  <?php
           
            if (isset($_SESSION['user_id']) && ($_SESSION['access_lvl'] == 4 or $_SESSION['access_lvl'] == 3 or $_SESSION['access_lvl'] ==5)) 
             {
               echo " <a href='staff.php?SNO=" . $SNO . "'> Staff Details</a>";
               echo " | <a href='employ_history.php?SNO=" . $SNO . "'>Employment</a>";
               echo " | <a href='family_details.php?SNO=" . $SNO . "'>Family Details</a>";
               echo " | <a href='edu_history.php?SNO=" . $SNO . "'>Education</a>";
               echo " | <a href='leave_record.php?SNO=" . $SNO . "'>Leave Record</a>";
               echo " | <a href='training.php?SNO=" . $SNO . "'>Training Record</a>";
             }
 ?>
