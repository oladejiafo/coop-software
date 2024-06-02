<?php
session_start();
require_once 'conn.php';
###### 

function xcheckConnection()
{
 $condx=@fsockopen("www.google.com",80,$errno,$errstr,30);
 if($condx)
 {
  $status="Ok";
  fclose($condx);
 } else {
  $status = "No <br/>\n";
  $status .= "$errstr ($errno)";
 }
 return $status;
}
$kkx= xcheckConnection();

if($kkx =="Ok")

{
  $geoplugin = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $_SERVER['REMOTE_ADDR']) );
  $ccountry=$geoplugin['geoplugin_countryName'];
  $ccity=$geoplugin['geoplugin_city'];
  $cstate=$geoplugin['geoplugin_region'];
  
  if($geoplugin['geoplugin_countryName'] =="")
  {
	 $ccountry="Nigeria";
  }
} else {
    $ccountry="Nigeria";
}
$sesloc=$ccity . " " .$cstate ." " .$ccountry;
$sesip =$_SERVER['REMOTE_ADDR'];
if($sesname=="")
{
 $sesname=$_SESSION['namex'];
}
if($sespage=="")
{
 $sespage= $_SESSION['lpage'];
}

require_once 'time.php';
##########

            $sqlx = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $resultx = mysqli_query($conn, $sqlx) or die('Could not fetch data; ' . mysqli_error());
            $rowsx = mysqli_fetch_array($resultx);
            $sesuxer=$rowsx['access_name'];
            //if($sesuxer =="") { echo $sesuxer="User";}

            $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`,`Company`,`IP`) 
                  VALUES ('" . $sesuxer . "','" . ucfirst($sesname) . "', '" . date('Y-m-d') . "', '" . $gmdatex . "','" .$sespage. "','" .$sesdet. "', '" . $_SESSION['company'] . "', '" . $sesip . "')";

            $result_insert_Log = mysqli_query($conn, $query_insert_Log) or die(mysqli_error());
            ###### 
?>            