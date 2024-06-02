<?php
  echo "<TR bgcolor='#009900'><TH colspan='1'> &nbsp;</TH><TH colspan='2'><b>TRANSFERED </b>&nbsp;</TH><TH colspan='7'>&nbsp;</TH></TR>";
  echo "<TR bgcolor='#999999'><TH><b>S/No </b>&nbsp;</TH><TH><b>From </b> &nbsp;</TH><TH><b>To </b>&nbsp;</TH>
      <TH><b>Post </b>&nbsp;</TH><TH><b>State of Origin </b>&nbsp;</TH><TH><b>LGA </b>&nbsp;</TH><TH><b>SGL </b>&nbsp;</TH><TH><b>Male </b>&nbsp;</TH><TH><b>Female </b>&nbsp;</TH><TH> Total </b>&nbsp;</TH></TR>";

if ($cmbFilter=="")
{
  $cmbFilter="Staff Number";
}

   $query_count    = "SELECT distinct `Present Location` FROM `staff` WHERE `" . $cmbFilter . "` like '" . $filter . "%' and `Pres Location Date` between '$datefro' and '$dateto'"; 
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $query="SELECT `Present Location`,`Prev Location`,`Present Rank`,`State`,`LGA`,`Level`,`Sex` FROM staff WHERE `" . $cmbFilter . "` like '" . $filter . "%' and `Pres Location Date` between '$datefro' and '$dateto' LIMIT $limitvalue, $limit";
   $result=mysql_query($query);

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!<br>"); 
   } 
$sn=0;
    while(list($ploc,$vloc,$rank,$state,$lga,$gl,$sex)=mysql_fetch_row($result))
    {
      $sn=$sn+1;
     if ($sex=='Male' or $sex=='M')
      {
        $xm=1;
        $xf='-';
      }
     if ($sex=='Female' or $sex=='F')
      {
        $xf=1;
        $xm='-';
      }
     $xt=$xf+$xm;
     echo "<TR><TH> $sn &nbsp;</TH><TH>$vloc &nbsp;</TH><TH>$ploc &nbsp;</TH><TH>$rank &nbsp;</TH><TH>$state &nbsp;</TH><TH>$lga &nbsp;</TH><TH>$gl &nbsp;</TH><TH>$xm &nbsp;</TH><TH>$xf &nbsp;</TH><TH>$xt &nbsp;</TH></TR>";
    }
#####################Grand Total
      $qry72 = "SELECT count(`Staff Number`) as cnt72 FROM `staff` WHERE `State` = '$state' and `Pres Location Date` between '$datefro' and '$dateto'";
      $rest72 = mysql_query($qry72);  
      $row72 = mysql_fetch_array($rest72);
      $cntGT2=$row72['cnt72'];

      $qry71 = "SELECT count(`Staff Number`) as cnt71 FROM `staff` where `Pres Location Date` between '$datefro' and '$dateto'";
      $rest71 = mysql_query($qry71);  
      $row71 = mysql_fetch_array($rest71);
      $cntGT1=$row71['cnt71'];

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