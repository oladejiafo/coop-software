<?php
session_start();
  require_once 'conn.php';
  require_once 'http.php';

if(isset($_POST['company']))
{
$query_count ="SELECT * FROM `company info` WHERE `Company Name` = '" . $_POST['company'] . "' or `Email`='" . $_POST['e-mail'] . "' or `Phone`='" . $_POST['phone'] . "'";
$result_count   = mysqli_query($conn, $query_count);     
$tot  = mysqli_num_rows($result_count);

if ($tot>0)
{ 
 $tval="DUPLICATE: A similar company info has been registered!";
 header("location:index.html?tval=$tval&redirect=$redirect");
} else {

if ($_POST['email'] !="" 
and $_POST['company'] !="" 
and $_POST['passwd'] !="" 
and $_POST['passwd2'] !="" 
and $_POST['passwd'] == $_POST['passwd2'])
{
##############################################
$year=date('Y');
$regdate = date('Y-m-d');
$date = date('Ymd');
$newDate = strtotime($date.' + 30 days');
$duedate= date('Ymd', $newDate);
$thecoy =strtolower($_POST['company']);
list($cp, $fld) = explode(' ', $thecoy);
$cpfolder=$cp . $fld;
###############################################
$sql = "INSERT INTO `login` (`email`,`username`,`password`,`access_lvl`,`Company`,`Reg Date`,`Account`) " .
"VALUES ('" . $_POST['email'] . "','" .$cp. "','" . md5($_POST['passwd']) . "',5,'" . $_POST['company'] . "','" . $regdate . "','30 Days Free Trial')";
mysqli_query($conn, $sql);

$sqlt = "INSERT INTO `company info` (`Email`, `Company Name`, `Phone`, `regdate`,`FirstRegDate`, `InitialDueDate`,`duedate`,`Paid`,`City`,`Type`) 
VALUES ('" . $_POST['email'] . "','" .$_POST['company'] . "','" . $_POST['phone'] . "','" . $regdate . "','" . $regdate . "','" . $duedate . "','" . $duedate . "',3,'" .$_POST['city']. "','30 Days Free Trial')";
mysqli_query($conn, $sqlt);

$sqlCN = "INSERT INTO `_config` (`Coy_Name`, `Coy_Alias`,`Coy_email`,`PORTAL_url`, `SMS_email`, `SMS_Sub_Acct`, `SMS_Sub_Psw`, `SMS_Sender`,`Company`) 
                     VALUES ('" . $_POST['company'] . "','" .$_POST['company'] . "','" . $_POST['email'] . "','','" . $_POST['email'] . "','" . $cpfolder . "','" . $_POST['passwd'] . "','" .$_POST['company']. "','" . $_POST['company'] . "')";
mysqli_query($conn, $sqlCN);

#######
if (!file_exists('images/pics/' . $cpfolder))
{
 mkdir('images/pics/' . $cpfolder,0777,true);
}
if (!file_exists('images/sign/' . $cpfolder))
{
 mkdir('images/sign/' . $cpfolder,0777,true);
}
if (!file_exists('images/scan/' . $cpfolder))
{
 mkdir('images/scan/' . $cpfolder,0777,true);
}

if (!file_exists('images/pics/' . $cpfolder . '/pix'))
{
 mkdir('images/pics/' . $cpfolder . '/pix',0777,true);
}

###### 
function checkConnection()
{
 $cond=@fsockopen("www.google.com",80,$errno,$errstr,30);
 if($cond)
 {
  $status="Ok";
  fclose($cond);
 } else {
  $status = "No <br/>\n";
  $status .= "$errstr ($errno)";
 }
 return $status;
}
$kk= checkConnection();

if($kk =="Ok")
{
#########################################################
$header = "From: info@waltergates.com\r\n";
$header .= "X-Mailer: BELLonline.co.uk PHP mailer \r\n";

$subject = 'Login Profile';
$body = "This is your login profile on Finasol Portal.\n\n Your password: " . $_POST['passwd'] .
"\n Your Username: " . $cp ." \n Your Registered Email: " . $_POST['email'];

mail($_POST['email'],$subject, $body, $header);
###mail($_POST['email'],$subject,$body) or die('Could not send profile to user e-mail.');

####
$headers = "From: " . trim($_POST['email']) . "\r\n";
$headers .= "X-Mailer: BELLonline.co.uk PHP mailer \r\n";

$subj = 'New Finasol-Cloud Registration';
$bodd = "A new company has been registered on Finasol Portal. Company Name: " . $_POST['company'] .
"\n\n Email: " . $_POST['email'];
$mymail='info@waltergates.com';
mail($mymail,$subj,$bodd,$headers);
#########################################################
}

if($_POST['stype'] =="Basic Plan" OR $_POST['stype'] =="Enterprise Plan")
{
  #########################################################
  $headerx = "From: info@waltergates.com\r\n";
  $headerx .= "X-Mailer: BELLonline.co.uk PHP mailer \r\n";

  $subjectx = 'Selected Thrift Payment Plan';
  $bodyx = "Thank you for subscribing to FINASOL Thrift Solution. You selected the " . $_POST['stype'] . ", Kindly make payment and continue to use. \n http://waltergates.com/thrift_online/pricing.php";

  mail($_POST['email'],$subjectx, $bodyx, $headerx);
   ################################
   header("location:pricing.php?redirect=$redirect");
} else {
          $sql = "SELECT user_id,access_lvl, username,email, `Company` " .
                 "FROM login " .
                 "WHERE email='" . $_POST['email'] . "' " .
                 "AND password='" . md5($_POST['passwd']) . "'";
          $result = mysqli_query($conn, $sql) or die('Could not look up member information; ' . mysqli_error());
          $row = mysqli_fetch_array($result);

            session_start();
            $_SESSION['usaid'] = $row['user_id'];
            $_SESSION['ac_lvl'] = $row['access_lvl'];
            $_SESSION['namex'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['company'] = $row['Company'];
            $_SESSION['cpaid'] = 1;
            
   $sespage= "Register";
   $sesname=$row['Company'];
   $sesdet="Registered New Company as: " . $row['company'];
   include 'solutions/monita.php';

   $tval="Your Company Profile Has Been Created!";
   header("location:solutions/myprofile.php?tval=$tval&redirect=$redirect");
} 
}
else
{
              
$sespage= "Register";
$sesname=$row['Company'];
$sesdet="Failed Attempt to Register New Company as: " . $row['company'];
include 'solutions/monita.php';

####
$headers = "From: info@waltergates.com\r\n";
$headers .= "X-Mailer: BELLonline.co.uk PHP mailer \r\n";

$subj = 'New Company Registration';
$bodd = "Failed attempt by a new company to register on Finasol Portal. Company Name: " . $_POST['company'] .
"\n\n Email: " . $_POST['email'];
$mymail='info@waltergates.com';
mail($mymail,$subj,$bodd,$headers);
#######################

 $tval="Please confirm that your password matches and fill in all parameters!";
 header("location:index.html?tval=$tval&redirect=$redirect");
}

}

}
//break;
//echo "hey";

?>