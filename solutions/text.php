<?php
$date=date('Y-m-d');
$Zdate="2018-07-07";
echo $Zdue=date('Y-m-d', strtotime('-31 day',strtotime($date)));

if($Zdate <= $Zdue)
{
  echo "Do It";
}
/*
 require_once 'conn.php';
   $query = "SELECT `ID`,`Contact Number`,`Mobile Number` FROM `customer`";
   $resultp=mysql_query($query);
   
    while(list($id,$cnum,$mnum)=mysql_fetch_row($resultp))
    {
        if(strlen($cnum)==10)
        {
            $cnumm="234" . $cnum;
         } else if(strlen($cnum)==11) {
            $cnumb=substr($cnum,1,11);
            $cnumm="234" . $cnumb;
         } else if(strlen($cnum)==14) {

         }
        $queryY = "Update `customer` set `Contact Number`='$cnumm',`Mobile Number`='$cnumm'";
        $resultY=mysql_query($queryY);
    }
*/
?>