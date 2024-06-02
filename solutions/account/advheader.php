<?php 
# session_start(); 
           
  if (isset($_SESSION['user_id']) && ($_SESSION['access_lvl'] == 5 or $_SESSION['access_lvl'] == 1 or $_SESSION['access_lvl'] == 4)) 
  {
     echo " <font style='font-size:14px;'><a href='advances.php'>Advances</a>";
     echo " | <a href='advretire.php'>Retirement</a>";
  }
?>
