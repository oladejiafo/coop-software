<?php
 require_once 'conn2.php';
  echo "<TR bgcolor='#009900'><TH colspan='1'> State:</TH><TH colspan='2'>$cmbFilter </TH><TH colspan='4'>&nbsp;</TH><TH colspan='1'>Period:</TH><TH colspan='2'></TH></TR>";
  echo "<TR bgcolor='#999999'><TH><b>S/No </b> &nbsp;</TH><TH><b>Name </b>&nbsp;</TH><TH><b>Sex </b>&nbsp;</TH>
      <TH><b>Qualification </b>&nbsp;</TH><TH><b>Field of Study </b>&nbsp;</TH><TH><b>Graduation Year </b>&nbsp;</TH><TH><b>LGA </b>&nbsp;</TH><TH><b>State </b>&nbsp;</TH><TH><b>Submission Date </b>&nbsp;</TH><TH><b>Remarks </b>&nbsp;</TH></TR>";

if ($cmbFilter=="")
{
  $cmbFilter="state_of_origin";
}
if ($cmbFilter=="State")
{
  $cmbFilter="state_of_origin";
}

   $query_count    = "SELECT * FROM `application_details` WHERE `" . $cmbFilter . "` like '" . $filter . "%' and `Date` between '$datefro' and '$dateto'"; 
   $result_count   = mysql_query($query_count);     
   $totalrows  = mysql_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $query="SELECT CONCAT(`surname`,', ',`other_names`) as Name,`sex`,`specify_qualification`,`feild_of_study`,`uni_end_date_1`,`lga`,`state_of_origin`,`Date`,`reason` FROM `application_details` WHERE `" . $cmbFilter . "` like '" . $filter . "%' and `Date` between '$datefro' and '$dateto'"; 
   $result=mysql_query($query);

   if(mysql_num_rows($result) == 0)
   { 
        echo("Nothing to Display!<br>"); 
   } 
$sn=0;
    while(list($name,$sex,$qualif,$field,$gradyr,$lga,$state,$date,$remarks)=mysql_fetch_row($result))
    {
     $sn=$sn+1;
     echo "<TR><TH>$sn </TH><TH>$name</TH><TH>$sex</TH><TH>$qualif</TH><TH>$field</TH><TH>$gradyr</TH><TH>$lga</TH><TH>$state</TH><TH>$date</TH><TH>$remarks</TH></TR>";
    }

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