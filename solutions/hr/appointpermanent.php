<?php
  echo "<TR bgcolor='#009900'><TH colspan='2'> &nbsp;</TH><TH colspan='10'><b>SALARY GRADE LEVEL</b>&nbsp;</TH><TH colspan='1'>&nbsp;</TH></TR>";
  echo "<TR bgcolor='#999999'><TH><b>S/No </b>&nbsp;</TH><TH><b>State of Origin</b>&nbsp;</TH><TH><b>07 </b>&nbsp;</TH>
      <TH><b>08 </b>&nbsp;</TH><TH><b>09 </b>&nbsp;</TH><TH><b>10 </b>&nbsp;</TH><TH><b>12 </b>&nbsp;</TH><TH><b>13 </b>&nbsp;</TH><TH><b>14 </b>&nbsp;</TH><TH><b>15 </b>&nbsp;</TH><TH><b>16 </b>&nbsp;</TH><TH><b>17 </b>&nbsp;</TH><TH><b>TOTAL </b>&nbsp;</TH></TR>";

if ($cmbFilter=="")
{
  $cmbFilter="Staff Number";
}

   $query_count    = "SELECT distinct `State` FROM `staff` WHERE `" . $cmbFilter . "` like '" . $filter . "%' and `First Appt` between '$datefro' and '$dateto'"; 
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $query="SELECT distinct `State` FROM staff WHERE `" . $cmbFilter . "` like '" . $filter . "%' and `First Appt` between '$datefro' and '$dateto' group by `State` LIMIT $limitvalue, $limit";
   $result=mysql_query($query);

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 
$sn=0;
    while(list($state)=mysql_fetch_row($result))
    {
      $sn=$sn+1;
#####################07
      $qry = "SELECT count(`Staff Number`) as cnt FROM `staff` WHERE `Employment Type` = 'Permanent' and `Level` like '07/%' and `State`='$state' and `First Appt` between '$datefro' and '$dateto'"; 
      $rest = mysql_query($qry);  
      $row = mysql_fetch_array($rest);
      $cnt07m=$row['cnt'];

#####################08
      $qry1 = "SELECT count(`Staff Number`) as cnt1 FROM `staff` WHERE `Employment Type` = 'Permanent' and `Level` like '08/%' and `State`='$state' and `First Appt` between '$datefro' and '$dateto'";
      $rest1 = mysql_query($qry1);  
      $row1 = mysql_fetch_array($rest1);
      $cnt08m=$row1['cnt1'];

#####################09
      $qry2 = "SELECT count(`Staff Number`) as cnt2 FROM `staff` WHERE `Employment Type` = 'Permanent' and `Level` like '09/%' and `State`='$state' and `First Appt` between '$datefro' and '$dateto'";
      $rest2 = mysql_query($qry2);  
      $row2 = mysql_fetch_array($rest2);
      $cnt09m=$row2['cnt2'];

#####################10
      $qry3 = "SELECT count(`Staff Number`) as cnt3 FROM `staff` WHERE `Employment Type` = 'Permanent' and `Level` like '10/%' and `State`='$state' and `First Appt` between '$datefro' and '$dateto'";
      $rest3 = mysql_query($qry3);  
      $row3 = mysql_fetch_array($rest3);
      $cnt10m=$row3['cnt3'];

#####################12
      $qry4 = "SELECT count(`Staff Number`) as cnt4 FROM `staff` WHERE `Employment Type` = 'Permanent' and `Level` like '12/%' and `State`='$state' and `First Appt` between '$datefro' and '$dateto'";
      $rest4 = mysql_query($qry4);  
      $row4 = mysql_fetch_array($rest4);
      $cnt12m=$row4['cnt4'];

#####################13
      $qry5 = "SELECT count(`Staff Number`) as cnt5 FROM `staff` WHERE `Employment Type` = 'Permanent' and `Level` like '13/%' and `State`='$state' and `First Appt` between '$datefro' and '$dateto'";
      $rest5 = mysql_query($qry5);  
      $row5 = mysql_fetch_array($rest5);
      $cnt13m=$row5['cnt5'];

#####################14
      $qry51 = "SELECT count(`Staff Number`) as cnt51 FROM `staff` WHERE `Employment Type` = 'Permanent' and `Level` like '14/%' and `State`='$state' and `First Appt` between '$datefro' and '$dateto'";
      $rest51 = mysql_query($qry51);  
      $row51 = mysql_fetch_array($rest51);
      $cnt14m=$row51['cnt51'];

#####################15
      $qry52 = "SELECT count(`Staff Number`) as cnt52 FROM `staff` WHERE `Employment Type` = 'Permanent' and `Level` like '15/%' and `State`='$state' and `First Appt` between '$datefro' and '$dateto'";
      $rest52 = mysql_query($qry52);  
      $row52 = mysql_fetch_array($rest52);
      $cnt15m=$row52['cnt52'];

#####################16
      $qry53 = "SELECT count(`Staff Number`) as cnt53 FROM `staff` WHERE `Employment Type` = 'Permanent' and `Level` like '16/%' and `State`='$state' and `First Appt` between '$datefro' and '$dateto'";
      $rest53 = mysql_query($qry53);  
      $row53 = mysql_fetch_array($rest53);
      $cnt16m=$row53['cnt53'];

#####################17
      $qry54 = "SELECT count(`Staff Number`) as cnt54 FROM `staff` WHERE `Employment Type` = 'Permanent' and `Level` like '17/%' and `State`='$state' and `First Appt` between '$datefro' and '$dateto'";
      $rest54 = mysql_query($qry54);  
      $row54 = mysql_fetch_array($rest54);
      $cnt17m=$row54['cnt54'];

#####################Total
      $qry6 = "SELECT count(`Staff Number`) as cnt6 FROM `staff` WHERE `Employment Type` = 'Permanent' and `State`='$state' and `First Appt` between '$datefro' and '$dateto'";
      $rest6 = mysql_query($qry6);  
      $row6 = mysql_fetch_array($rest6);
      $cntTm=$row6['cnt6'];

     echo "<TR><TH> $sn &nbsp;</TH><TH>$state &nbsp;</TH><TH>$cnt07m &nbsp;</TH><TH>$cnt08m &nbsp;</TH><TH>$cnt09m &nbsp;</TH><TH>$cnt10m &nbsp;</TH><TH>$cnt12m &nbsp;</TH><TH>$cnt13m &nbsp;</TH><TH>$cnt14m &nbsp;</TH><TH>$cnt15m &nbsp;</TH><TH>$cnt16m &nbsp;</TH><TH>$cnt17m &nbsp;</TH><TH>$cntTm &nbsp;</TH></TR>";
    }
#####################Grand Total

      $qry71 = "SELECT count(`Staff Number`) as cnt71 FROM `staff` WHERE `Employment Type` = 'Permanent' and `First Appt` between '$datefro' and '$dateto'";
      $rest71 = mysql_query($qry71);  
      $row71 = mysql_fetch_array($rest71);
      $cntGT1=$row71['cnt71'];


     echo "<TR bgcolor='#cccc66'><TH colspan='2'> TOTAL</TH><TH> &nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH><TH>&nbsp;</TH><TH>&nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH>
               <TH>&nbsp;</TH><TH> &nbsp;</TH><TH>$cntGT1 &nbsp;</TH></TR>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREVIOUS PAGE</a> ... ");
    }
    else 
       echo("PREVIOUS PAGE  ");  

    $numofpages = $totalrows / $limit;  
#    for($i = 1; $i <= $numofpages; $i++)
#    { 
#        if($i == $page)
#        { 
#            echo($i."  "); 
#        }else{ 
#            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  ");  
#        }
#    } 
#    if(($totalrows % $limit) != 0)
#    { 
#        if($i == $page)
#        { 
#            echo($i."  "); 
#        }
#        else
#        { 
#            echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  "); 
#       } 
#    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"$PHP_SELF?cmbFilter=$cmbFilter&filter=$filter&page=$pagenext\">NEXT PAGE</a>");  
            
    }          
    else
    { 
        echo("NEXT PAGE");  
    } 
?>