<?php
  echo "<TR bgcolor='#009900'><TH colspan='2'> &nbsp;</TH><TH colspan='20'><b>SALARY GRADE LEVEL AND GENDER </b>&nbsp;</TH><TH colspan='3'>&nbsp;</TH></TR>";
  echo "<TR bgcolor='#999999'><TH><b>State </b>&nbsp;</TH><TH><b>MDAs </b> &nbsp;</TH><TH colspan='2'><b>07 </b>&nbsp;</TH>
      <TH colspan='2'><b>08 </b>&nbsp;</TH><TH colspan='2'><b>09 </b>&nbsp;</TH><TH colspan='2'><b>10 </b>&nbsp;</TH><TH colspan='2'><b>12 </b>&nbsp;</TH><TH colspan='2'><b>13 </b>&nbsp;</TH><TH colspan='2'><b>14 </b>&nbsp;</TH><TH colspan='2'><b>15 </b>&nbsp;</TH><TH colspan='2'><b>16 </b>&nbsp;</TH><TH colspan='2'><b>17 </b>&nbsp;</TH><TH colspan='2'><b>TOTAL </b>&nbsp;</TH><TH><b>Grand Total </b>&nbsp;</TH></TR>";
  echo "<TR bgcolor='#cccccc'><TH colspan='2'> &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH><b>M </b>&nbsp;</TH><TH><b>F &nbsp;</TH><TH>&nbsp;</TH></TR>";

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
     $query2="SELECT distinct `Present Location` FROM staff WHERE `" . $cmbFilter . "` like '" . $filter . "%' and `First Appt` between '$datefro' and '$dateto' and `State`='$state' group by `Present Location`";
     $result2=mysql_query($query2);
     echo "<TR><TH>$state &nbsp;</TH><TH colspan='24'> &nbsp;</TH></TR>";
     while(list($office)=mysql_fetch_row($result2))
     {
      $sn=$sn+1;
#####################07
      $qry = "SELECT count(`Staff Number`) as cnt FROM `staff` WHERE `State` = '$state' and `Present Location` = '$office' and `Level` like '07/%' and `Sex` like 'M%' and `First Appt` between '$datefro' and '$dateto'"; 
      $rest = mysql_query($qry);  
      $row = mysql_fetch_array($rest);
      $cnt07m=$row['cnt'];

      $qryf = "SELECT count(`Staff Number`) as cntf FROM `staff` WHERE `State` = '$state' and `Present Location` = '$office' and `Level` like '07/%' and `Sex` like 'F%' and `First Appt` between '$datefro' and '$dateto'"; 
      $restf = mysql_query($qryf);  
      $rowf = mysql_fetch_array($restf);
      $cnt07f=$rowf['cntf'];
#####################08
      $qry1 = "SELECT count(`Staff Number`) as cnt1 FROM `staff` WHERE `State` = '$state' and `Present Location` = '$office' and `Level` like '08/%' and `Sex` like 'M%' and `First Appt` between '$datefro' and '$dateto'";
      $rest1 = mysql_query($qry1);  
      $row1 = mysql_fetch_array($rest1);
      $cnt08m=$row1['cnt1'];

      $qryf1 = "SELECT count(`Staff Number`) as cntf1 FROM `staff` WHERE `State` = '$state' and `Present Location` = '$office' and `Level` like '08/%' and `Sex` like 'F%' and `First Appt` between '$datefro' and '$dateto'"; 
      $restf1 = mysql_query($qryf1);  
      $rowf1 = mysql_fetch_array($restf1);
      $cnt08f=$rowf1['cntf1'];
#####################09
      $qry2 = "SELECT count(`Staff Number`) as cnt2 FROM `staff` WHERE `State` = '$state' and `Present Location` = '$office' and `Level` like '09/%' and `Sex` like 'M%' and `First Appt` between '$datefro' and '$dateto'";
      $rest2 = mysql_query($qry2);  
      $row2 = mysql_fetch_array($rest2);
      $cnt09m=$row2['cnt2'];

      $qryf2 = "SELECT count(`Staff Number`) as cntf2 FROM `staff` WHERE `State` = '$state' and `Present Location` = '$office' and `Level` like '09/%' and `Sex` like 'F%' and `First Appt` between '$datefro' and '$dateto'"; 
      $restf2 = mysql_query($qryf2);  
      $rowf2 = mysql_fetch_array($restf2);
      $cnt09f=$rowf2['cntf2'];
#####################10
      $qry3 = "SELECT count(`Staff Number`) as cnt3 FROM `staff` WHERE `State` = '$state' and `Present Location` = '$office' and `Level` like '10/%' and `Sex` like 'M%' and `First Appt` between '$datefro' and '$dateto'";
      $rest3 = mysql_query($qry3);  
      $row3 = mysql_fetch_array($rest3);
      $cnt10m=$row3['cnt3'];

      $qryf3 = "SELECT count(`Staff Number`) as cntf3 FROM `staff` WHERE `State` = '$state' and `Present Location` = '$office' and `Level` like '10/%' and `Sex` like 'F%' and `First Appt` between '$datefro' and '$dateto'"; 
      $restf3 = mysql_query($qryf3);  
      $rowf3 = mysql_fetch_array($restf3);
      $cnt10f=$rowf3['cntf3'];
#####################12
      $qry4 = "SELECT count(`Staff Number`) as cnt4 FROM `staff` WHERE `State` = '$state' and `Present Location` = '$office' and `Level` like '12/%' and `Sex` like 'M%' and `First Appt` between '$datefro' and '$dateto'";
      $rest4 = mysql_query($qry4);  
      $row4 = mysql_fetch_array($rest4);
      $cnt12m=$row4['cnt4'];

      $qryf4 = "SELECT count(`Staff Number`) as cntf4 FROM `staff` WHERE `State` = '$state' and `Present Location` = '$office' and `Level` like '12/%' and `Sex` like 'F%' and `First Appt` between '$datefro' and '$dateto'"; 
      $restf4 = mysql_query($qryf4);  
      $rowf4 = mysql_fetch_array($restf4);
      $cnt12f=$rowf4['cntf4'];
#####################13
      $qry5 = "SELECT count(`Staff Number`) as cnt5 FROM `staff` WHERE `State` = '$state' and `Present Location` = '$office' and `Level` like '13/%' and `Sex` like 'M%' and `First Appt` between '$datefro' and '$dateto'";
      $rest5 = mysql_query($qry5);  
      $row5 = mysql_fetch_array($rest5);
      $cnt13m=$row5['cnt5'];

      $qryf5 = "SELECT count(`Staff Number`) as cntf5 FROM `staff` WHERE `State` = '$state' and `Present Location` = '$office' and `Level` like '13/%' and `Sex` like 'F%' and `First Appt` between '$datefro' and '$dateto'"; 
      $restf5 = mysql_query($qryf5);  
      $rowf5 = mysql_fetch_array($restf5);
      $cnt13f=$rowf5['cntf5'];
#####################14
      $qry51 = "SELECT count(`Staff Number`) as cnt51 FROM `staff` WHERE `State` = '$state' and `Present Location` = '$office' and `Level` like '14/%' and `Sex` like 'M%' and `First Appt` between '$datefro' and '$dateto'";
      $rest51 = mysql_query($qry51);  
      $row51 = mysql_fetch_array($rest51);
      $cnt14m=$row51['cnt51'];

      $qryf51 = "SELECT count(`Staff Number`) as cntf51 FROM `staff` WHERE `State` = '$state' and `Present Location` = '$office' and `Level` like '14/%' and `Sex` like 'F%' and `First Appt` between '$datefro' and '$dateto'"; 
      $restf51 = mysql_query($qryf51);  
      $rowf51 = mysql_fetch_array($restf51);
      $cnt14f=$rowf51['cntf51'];
#####################15
      $qry52 = "SELECT count(`Staff Number`) as cnt52 FROM `staff` WHERE `State` = '$state' and `Present Location` = '$office' and `Level` like '15/%' and `Sex` like 'M%' and `First Appt` between '$datefro' and '$dateto'";
      $rest52 = mysql_query($qry52);  
      $row52 = mysql_fetch_array($rest52);
      $cnt15m=$row52['cnt52'];

      $qryf52 = "SELECT count(`Staff Number`) as cntf52 FROM `staff` WHERE `State` = '$state' and `Present Location` = '$office' and `Level` like '15/%' and `Sex` like 'F%' and `First Appt` between '$datefro' and '$dateto'"; 
      $restf52 = mysql_query($qryf52);  
      $rowf52 = mysql_fetch_array($restf52);
      $cnt15f=$rowf52['cntf52'];
#####################16
      $qry53 = "SELECT count(`Staff Number`) as cnt53 FROM `staff` WHERE `State` = '$state' and `Present Location` = '$office' and `Level` like '16/%' and `Sex` like 'M%' and `First Appt` between '$datefro' and '$dateto'";
      $rest53 = mysql_query($qry53);  
      $row53 = mysql_fetch_array($rest53);
      $cnt16m=$row53['cnt53'];

      $qryf53 = "SELECT count(`Staff Number`) as cntf53 FROM `staff` WHERE `State` = '$state' and `Present Location` = '$office' and `Level` like '16/%' and `Sex` like 'F%' and `First Appt` between '$datefro' and '$dateto'"; 
      $restf53 = mysql_query($qryf53);  
      $rowf53 = mysql_fetch_array($restf53);
      $cnt16f=$rowf53['cntf53'];
#####################17
      $qry54 = "SELECT count(`Staff Number`) as cnt54 FROM `staff` WHERE `State` = '$state' and `Present Location` = '$office' and `Level` like '17/%' and `Sex` like 'M%' and `First Appt` between '$datefro' and '$dateto'";
      $rest54 = mysql_query($qry54);  
      $row54 = mysql_fetch_array($rest54);
      $cnt17m=$row54['cnt54'];

      $qryf54 = "SELECT count(`Staff Number`) as cntf54 FROM `staff` WHERE `State` = '$state' and `Present Location` = '$office' and `Level` like '17/%' and `Sex` like 'F%' and `First Appt` between '$datefro' and '$dateto'"; 
      $restf54 = mysql_query($qryf54);  
      $rowf54 = mysql_fetch_array($restf54);
      $cnt17f=$rowf54['cntf54'];

#####################Total
      $qry6 = "SELECT count(`Staff Number`) as cnt6 FROM `staff` WHERE `State` = '$state' and `Present Location` = '$office' and `Level` not like 'CN/%' and `Level` not like '01/%' and `Level` not like '02/%' and `Level` not like '03/%' and `Level` not like '04/%' and `Level` not like '05/%' and `Level` not like '06/%' and `Sex` like 'M%' and `First Appt` between '$datefro' and '$dateto'";
      $rest6 = mysql_query($qry6);  
      $row6 = mysql_fetch_array($rest6);
      $cntTm=$row6['cnt6'];

      $qryf6 = "SELECT count(`Staff Number`) as cntf6 FROM `staff` WHERE `State` = '$state' and `Present Location` = '$office' and `Level` not like 'CN/%' and `Level` not like '01/%' and `Level` not like '02/%' and `Level` not like '03/%' and `Level` not like '04/%' and `Level` not like '05/%' and `Level` not like '06/%' and `Sex` like 'F%' and `First Appt` between '$datefro' and '$dateto'"; 
      $restf6 = mysql_query($qryf6);  
      $rowf6 = mysql_fetch_array($restf6);
      $cntTf=$rowf6['cntf6'];

      $qry7 = "SELECT count(`Staff Number`) as cnt7 FROM `staff` WHERE `State` = '$state' and `Present Location` = '$office' and `Level` not like '01/%' and `Level` not like '02/%' and `Level` not like '03/%' and `Level` not like '04/%' and `Level` not like '05/%' and `Level` not like '06/%' and `Level` not like 'CN/%' and `First Appt` between '$datefro' and '$dateto'";
      $rest7 = mysql_query($qry7);  
      $row7 = mysql_fetch_array($rest7);
      $cntGT=$row7['cnt7'];

     echo "<TR><TH> &nbsp;</TH><TH>$office &nbsp;</TH><TH>$cnt07m &nbsp;</TH><TH>$cnt07f &nbsp;</TH><TH>$cnt08m &nbsp;</TH><TH>$cnt08f &nbsp;</TH><TH>$cnt09m &nbsp;</TH><TH>$cnt09f &nbsp;</TH><TH>$cnt10m &nbsp;</TH><TH>$cnt10f &nbsp;</TH>
               <TH>$cnt12m &nbsp;</TH><TH>$cnt12f &nbsp;</TH><TH>$cnt13m &nbsp;</TH><TH>$cnt13f &nbsp;</TH><TH>$cnt14m &nbsp;</TH><TH>$cnt14f &nbsp;</TH><TH>$cnt15m &nbsp;</TH><TH>$cnt15f &nbsp;</TH><TH>$cnt16m &nbsp;</TH><TH>$cnt16f &nbsp;</TH><TH>$cnt17m &nbsp;</TH><TH>$cnt17f &nbsp;</TH><TH>$cntTm &nbsp;</TH><TH>$cntTf &nbsp;</TH><TH>$cntGT &nbsp;</TH></TR>";
    }
#####################Grand Total
      $qry72 = "SELECT count(`Staff Number`) as cnt72 FROM `staff` WHERE `State` = '$state' and `Level` not like '01/%' and `Level` not like '02/%' and `Level` not like '03/%' and `Level` not like '04/%' and `Level` not like '05/%' and `Level` not like '06/%' and `Level` not like 'CN/%' and `First Appt` between '$datefro' and '$dateto'";
      $rest72 = mysql_query($qry72);  
      $row72 = mysql_fetch_array($rest72);
      $cntGT2=$row72['cnt72'];

      $qry71 = "SELECT count(`Staff Number`) as cnt71 FROM `staff` where `First Appt` between '$datefro' and '$dateto' and `Level` not like 'CN/%' and `Level` not like '01/%' and `Level` not like '02/%' and `Level` not like '03/%' and `Level` not like '04/%' and `Level` not like '05/%' and `Level` not like '06/%' ";
      $rest71 = mysql_query($qry71);  
      $row71 = mysql_fetch_array($rest71);
      $cntGT1=$row71['cnt71'];

}
     echo "<TR bgcolor='#cccc66'><TH colspan='2'> TOTAL</TH><TH> &nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH><TH>&nbsp;</TH><TH>&nbsp;</TH><TH> &nbsp;</TH><TH> &nbsp;</TH>
               <TH>&nbsp;</TH><TH> &nbsp;</TH><TH>&nbsp;</TH><TH> &nbsp;</TH><TH>&nbsp;</TH><TH>&nbsp;</TH><TH>&nbsp;</TH><TH>&nbsp;</TH><TH>&nbsp;</TH><TH>&nbsp;</TH><TH>&nbsp;</TH><TH>&nbsp;</TH><TH>&nbsp;</TH><TH>&nbsp;</TH><TH>$cntGT1 &nbsp;</TH></TR>";
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