<?php

  echo "<TR bgcolor='#009900'><TH colspan='2'> &nbsp;</TH><TH colspan='18'><b>FIELD OF STUDY </b>&nbsp;</TH><TH colspan='3'>&nbsp;</TH></TR>";
  echo "<TR bgcolor='#999999'><TH><b>S/No </b> &nbsp;</TH><TH><b>State of Origin </b>&nbsp;</TH><TH colspan='2'><b>Arts/ Social Sciences </b>&nbsp;</TH>
      <TH colspan='2'><b>Physical/ Biological Sciences </b>&nbsp;</TH><TH colspan='2'><b>Medical/ Health Sciences </b>&nbsp;</TH><TH colspan='2'><b>Law </b>&nbsp;</TH><TH colspan='2'><b>Engineering/ Tech Sciences </b>&nbsp;</TH><TH colspan='2'><b>Environmental Sciences </b>&nbsp;</TH><TH colspan='2'><b>Education </b>&nbsp;</TH><TH colspan='2'><b>Business/ Mgt Sciences </b>&nbsp;</TH><TH colspan='2'><b>Agricultural Sciences </b>&nbsp;</TH><TH colspan='2'><b>TOTAL </b>&nbsp;</TH><TH><b>Grand Total </b>&nbsp;</TH></TR>";
  echo "<TR bgcolor='#cccccc'><TH colspan='2'> &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH>&nbsp;</TH></TR>";

if ($cmbFilter=="")
{
  $cmbFilter="Profession";
}
else if ($cmbFilter=="Field")
{
  $cmbFilter="Profession";
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
#####################Ph.D
      $qry = "SELECT count(`Staff Number`) as cnt FROM `staff` WHERE `State` = '$state' and `Qualification` like '%Ph%' and `Sex` like 'M%' and `First Appt` between '$datefro' and '$dateto'"; 
      $rest = mysql_query($qry);  
      $row = mysql_fetch_array($rest);
      $cntPm=$row['cnt'];

      $qryf = "SELECT count(`Staff Number`) as cntf FROM `staff` WHERE `State` = '$state' and `Qualification` like '%Ph%' and `Sex` like 'F%' and `First Appt` between '$datefro' and '$dateto'"; 
      $restf = mysql_query($qryf);  
      $rowf = mysql_fetch_array($restf);
      $cntPf=$rowf['cntf'];
#####################M.Sc
      $qry1 = "SELECT count(`Staff Number`) as cnt1 FROM `staff` WHERE `State` = '$state' and `Qualification` like '%M.S%' and `Sex` like 'M%' and `First Appt` between '$datefro' and '$dateto'";
      $rest1 = mysql_query($qry1);  
      $row1 = mysql_fetch_array($rest1);
      $cntMm=$row1['cnt1'];

      $qryf1 = "SELECT count(`Staff Number`) as cntf1 FROM `staff` WHERE `State` = '$state' and `Qualification` like '%M.S%' and `Sex` like 'F%' and `First Appt` between '$datefro' and '$dateto'"; 
      $restf1 = mysql_query($qryf1);  
      $rowf1 = mysql_fetch_array($restf1);
      $cntMf=$rowf1['cntf1'];
#####################PGD
      $qry2 = "SELECT count(`Staff Number`) as cnt2 FROM `staff` WHERE `State` = '$state' and `Qualification` like '%PGD%' and `Sex` like 'M%' and `First Appt` between '$datefro' and '$dateto'";
      $rest2 = mysql_query($qry2);  
      $row2 = mysql_fetch_array($rest2);
      $cntGm=$row2['cnt2'];

      $qryf2 = "SELECT count(`Staff Number`) as cntf2 FROM `staff` WHERE `State` = '$state' and `Qualification` like '%PGD%' and `Sex` like 'F%' and `First Appt` between '$datefro' and '$dateto'"; 
      $restf2 = mysql_query($qryf2);  
      $rowf2 = mysql_fetch_array($restf2);
      $cntGf=$rowf2['cntf2'];
#####################First Degree
      $qry3 = "SELECT count(`Staff Number`) as cnt3 FROM `staff` WHERE `State` = '$state' and `Qualification` like '%B%' and `Sex` like 'M%' and `First Appt` between '$datefro' and '$dateto'";
      $rest3 = mysql_query($qry3);  
      $row3 = mysql_fetch_array($rest3);
      $cntBm=$row3['cnt3'];

      $qryf3 = "SELECT count(`Staff Number`) as cntf3 FROM `staff` WHERE `State` = '$state' and `Qualification` like '%B%' and `Sex` like 'F%' and `First Appt` between '$datefro' and '$dateto'"; 
      $restf3 = mysql_query($qryf3);  
      $rowf3 = mysql_fetch_array($restf3);
      $cntBf=$rowf3['cntf3'];
#####################HND
      $qry4 = "SELECT count(`Staff Number`) as cnt4 FROM `staff` WHERE `State` = '$state' and `Qualification` like '%HND%' and `Sex` like 'M%' and `First Appt` between '$datefro' and '$dateto'";
      $rest4 = mysql_query($qry4);  
      $row4 = mysql_fetch_array($rest4);
      $cntHm=$row4['cnt4'];

      $qryf4 = "SELECT count(`Staff Number`) as cntf4 FROM `staff` WHERE `State` = '$state' and `Qualification` like '%HND%' and `Sex` like 'F%' and `First Appt` between '$datefro' and '$dateto'"; 
      $restf4 = mysql_query($qryf4);  
      $rowf4 = mysql_fetch_array($restf4);
      $cntHf=$rowf4['cntf4'];
#####################NCE/Others
      $qry5 = "SELECT count(`Staff Number`) as cnt5 FROM `staff` WHERE `State` = '$state' and `Qualification` not in ('Ph.D','PhD','M.Sc','M.A','B.Sc','B.A','B.Tech','L.B','PGD','HND') and `Sex` like 'M%' and `First Appt` between '$datefro' and '$dateto'";
      $rest5 = mysql_query($qry5);  
      $row5 = mysql_fetch_array($rest5);
      $cntOm=$row5['cnt5'];

      $qryf5 = "SELECT count(`Staff Number`) as cntf5 FROM `staff` WHERE `State` = '$state' and `Qualification` not in ('Ph.D','PhD','M.Sc','M.A','B.Sc','B.A','B.Tech','L.B','PGD','HND') and `Sex` like 'F%' and `First Appt` between '$datefro' and '$dateto'"; 
      $restf5 = mysql_query($qryf5);  
      $rowf5 = mysql_fetch_array($restf5);
      $cntOf=$rowf5['cntf5'];
#####################Total
      $qry6 = "SELECT count(`Staff Number`) as cnt6 FROM `staff` WHERE `State` = '$state' and `Sex` like 'M%' and `First Appt` between '$datefro' and '$dateto'";
      $rest6 = mysql_query($qry6);  
      $row6 = mysql_fetch_array($rest6);
      $cntTm=$row6['cnt6'];

      $qryf6 = "SELECT count(`Staff Number`) as cntf6 FROM `staff` WHERE `State` = '$state' and `Sex` like 'F%' and `First Appt` between '$datefro' and '$dateto'"; 
      $restf6 = mysql_query($qryf6);  
      $rowf6 = mysql_fetch_array($restf6);
      $cntTf=$rowf6['cntf6'];
#####################Grand Total
      $qry7 = "SELECT count(`Staff Number`) as cnt7 FROM `staff` WHERE `State` = '$state' and `First Appt` between '$datefro' and '$dateto'";
      $rest7 = mysql_query($qry7);  
      $row7 = mysql_fetch_array($rest7);
      $cntGT=$row7['cnt7'];

      $qry71 = "SELECT count(`Staff Number`) as cnt71 FROM `staff` where `First Appt` between '$datefro' and '$dateto'";
      $rest71 = mysql_query($qry71);  
      $row71 = mysql_fetch_array($rest71);
      $cntGT1=$row71['cnt71'];

     echo "<TR><TH>$sn &nbsp;</TH><TH>$state &nbsp;</TH><TH>$cntPm &nbsp;</TH><TH>$cntPf &nbsp;</TH><TH>$cntMm &nbsp;</TH><TH>$cntMf &nbsp;</TH><TH>$cntGm &nbsp;</TH><TH>$cntGf &nbsp;</TH><TH>$cntBm &nbsp;</TH><TH>$cntBf &nbsp;</TH>
               <TH>$cntHm &nbsp;</TH><TH>$cntHf &nbsp;</TH><TH>$cntOm &nbsp;</TH><TH>$cntOf &nbsp;</TH><TH>$cntTm &nbsp;</TH><TH>$cntTf &nbsp;</TH><TH>$cntGT &nbsp;</TH></TR>";
    }
     echo "<TR bgcolor='#cccc66'><TH colspan='2'> TOTAL</TH><TH> &nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH><TH>&nbsp;</TH><TH>&nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH>
               <TH>&nbsp;</TH><TH> &nbsp;</TH><TH>&nbsp;</TH><TH>&nbsp;</TH><TH>&nbsp;</TH><TH>&nbsp;</TH><TH>&nbsp;</TH><TH>&nbsp;</TH><TH>&nbsp;</TH><TH> &nbsp;</TH><TH>&nbsp;</TH><TH>&nbsp;</TH><TH>$cntGT1 &nbsp;</TH></TR>";
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