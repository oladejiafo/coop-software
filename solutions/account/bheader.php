<?php 
# session_start(); 
           
  if (isset($_SESSION['user_id']) && ($_SESSION['access_lvl'] == 5 or $_SESSION['access_lvl'] == 1 or $_SESSION['access_lvl'] == 4)) 
  {
     echo " <font style='font-size:14px;'><a href='budget.php'>Budget</a>";
     echo " | <a href='breview.php'>Budget Review</a>";
    # echo " | <a href='bperf.php'>Budget Performance</a></font>";
  }
?>
