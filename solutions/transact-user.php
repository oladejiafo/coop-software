<?php
  require_once 'conn.php';
  require_once 'http.php';
  if (isset($_REQUEST['action'])) 
  {
    switch ($_REQUEST['action']) 
    {
      case 'Login':
        if (isset($_POST['imail']) and isset($_POST['passwd']))
        {
          $cnt=0;
          $sqlXL = "SELECT `user_id`,`access_lvl`,`username`,`Company`, `Last_Page` " .
                 "FROM `login` " .
                 "WHERE `email`='" . $_POST['imail'] . "' " .
                 "AND `password`='" . md5($_POST['passwd']) . "' AND `Company` like '%" . $_POST['uname'] . "%'";
          $resultXL = mysqli_query($conn,$sqlXL) or die('Could not look up member information; ' . mysqli_error());
          if ($rowXL = mysqli_fetch_array($resultXL)) 
          {
            $querr = "SELECT `Email`,`regdate`,`duedate`,`Paid`,`Company Name` FROM `company info` WHERE `Company Name`='" . $rowXL['Company'] . "' and `duedate` <='" . date('Y-m-d') . "'";
            $resq = mysqli_query($conn, $querr) or die('Could not look up password; ' . mysqli_error());
            $rowqq = mysqli_fetch_array($resq);
            if (mysqli_num_rows($resq)) 
            {
              #### CHECK SUBSCRIPTION STATUS
              $sqlt = "update `company info` set `Paid`=0 where `Company Name`='" . $rowXL['Company'] . "'";
              mysqli_query($conn, $sqlt);
              $tval="Your Subscription Has Expired!";
              redirect('index.php?tval=' . $tval);
              break;
            } else {  
              $querr = "SELECT `Email`,`regdate`,`duedate`,`Paid`,`Company Name` FROM `company info` WHERE `Company Name`='" . $rowXL['Company'] . "'";
              $resq = mysqli_query($conn, $querr) or die('Could not look up password; ' . mysqli_error());
              $rowq = mysqli_fetch_array($resq);

             session_start();
             $_SESSION['user_id'] = $rowXL['user_id'];
             $_SESSION['access_lvl'] = $rowXL['access_lvl'];
             $_SESSION['name'] = $rowXL['username'];
             $_SESSION['uname'] = $rowXL['username'];
             $_SESSION['lastpage'] = $rowXL['Last_Page'];

             $_SESSION['email'] = $rowXL['email'];
             $_SESSION['company'] = $rowXL['Company'];
             $_SESSION['cpaid'] = $rowq['Paid'];
            }

 $tday=date('d'); 
 $tyear=date('Y'); 
 $tnow=date('m') . " " . date('Y');
 $toda=date('Y-m-d');
/* 
$queryp = "SELECT  distinct `Account Number`,`ID` FROM `transactions` WHERE `Remark`='Contribution Charge' AND `Company`='" . $_SESSION['company'] . "' and (day(`Date`)=" . $tday . ") order by `ID` desc";
$resultp=mysqli_query($conn,$queryp);
   
while(list($vacctno,$txid)=mysqli_fetch_row($resultp))
{ 
  $querypp = "SELECT `ID`,`Date`,`Account Number`,`Withdrawal`,`Transaction Type` FROM `transactions` WHERE `Remark`='Contribution Charge' AND `Company`='" . $_SESSION['company'] . "' and (day(`Date`)=" . $tday . ") and `Account Number`='$vacctno' order by `ID` desc limit 0,1"; 
  $resultpp=mysqli_query($conn,$querypp);
 while(list($vid,$vdate,$vacctnod,$vamtt,$vtrans)=mysqli_fetch_row($resultpp))
 { 
        $sqlCT="SELECT * FROM `customer` WHERE `Account Number`='$vacctno' AND `Company`='" . $_SESSION['company'] . "' order by `ID` desc";
        $resultCT = mysqli_query($conn,$sqlCT) or die('Could not look up user data; ' . mysqli_error());
        $rowCT = mysqli_fetch_array($resultCT); 
        $vamt= $rowCT['Contribution Charge']; 

 if ($vamt>0 and $toda > $vdate)
 {
        $query_insertC = "Insert into `sundry` (`Amount`,`Note`,`Date`,`Source`,`Account Number`,`Officer`,`Type`, `Company`) 
                                       VALUES ('$vamt','Contribution Charge for $tnow','$toda','','$vacctno','Monthly Auto','Income', '" .$_SESSION['company']. "')";
        $result_insertC = mysqli_query($conn,$query_insertC);

        $sqlC="SELECT * FROM `transactions` WHERE `Account Number`='$vacctno' AND `Company`='" . $_SESSION['company'] . "' order by `ID` desc";
        $resultC = mysqli_query($conn,$sqlC) or die('Could not look up user data; ' . mysqli_error());
        $rowC = mysqli_fetch_array($resultC); 

        $balc= $rowC['Balance']; 
        $balC=$balc-$vamt;
        $query_insertC1 = "Insert into `transactions` (`Account Number`,`Withdrawal`,`Transactor`,`Transactor Contact`,`Officer`,`Date`,`Transaction Type`,`Remark`,`Balance`, `Company`) 
               VALUES ('$vacctno','$vamt','Auto Transaction','','Monthly Auto','$toda','Withdrawal','Contribution Charge','$balC', '" .$_SESSION['company']. "')";
        $result_insertC1 = mysqli_query($conn,$query_insertC1);
 }
}
}

if (date('d')==01)
{
             require_once 'monthlycharges.php';         
}
*/
            #######
            require_once 'time.php';

            $sql_log = "SELECT * FROM `cms_access_levels` Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result_log = mysqli_query($conn,$sql_log) or die('Could not fetch data; ' . mysqli_error());
            $row_log = mysqli_fetch_array($result_log);
            
            $query_insert_Log = "Insert into `monitor` (`ip`,`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`, `Company`) 
            VALUES ('" . gethostbyaddr($_SERVER['REMOTE_ADDR']) . "/" . gethostbyname($_SERVER['REMOTE_ADDR']) . "','" . $row_log['access_name'] . "','" . ucfirst($_SESSION['uname']) . "', '" . date('Y/m/d') . "', '" . $gmdatex . "','LoginX','Logged In As: " . $_POST['uname'] . "', '" .$_SESSION['company']. "')";
            
            $result_insert_Log = mysqli_query($conn,$query_insert_Log) or die(mysqli_error());

#            ######
if (strlen($_SESSION['lastpage'])>3)
{
  redirect($_SESSION['lastpage']);
} else {
  redirect('index.php');
} 
 //           redirect('index.php');
          }
          else
          {

            $tval="Wrong Cooperative Name, Email or Password!";
            redirect('index.php?tval=' . $tval);

          }
        }
break;

case 'Logout':
session_start();
#######
require_once 'time.php';

$sql_log = "SELECT * FROM `cms_access_levels` Where `access_lvl`='" . $_SESSION['access_lvl'] ."'";
$result_log = mysqli_query($conn,$sql_log) or die('Could not fetch data; ' . mysqli_error());
$row_log = mysqli_fetch_array($result_log);

$query_insert_Log = "Insert into `monitor` (`ip`,`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`, `Company`) 
VALUES ('" . gethostbyaddr($_SERVER['REMOTE_ADDR']) . "/" . gethostbyname($_SERVER['REMOTE_ADDR']) . "','" . $row_log['access_name'] . "','" . ucfirst($_SESSION['uname']) . "', '" . date('Y/m/d') . "', '" . $gmdatex . "','Logout','Logged Out As: " . ucfirst($_SESSION['name']) . "', '" .$_SESSION['company']. "')";

$result_insert_Log = mysqli_query($conn,$query_insert_Log) or die(mysqli_error());
###### 
$query_SESS ="update `login` set `Last_Page`='' WHERE `user_id`='" .$_SESSION['user_id']. "' AND `username`='" .$_SESSION['uname']. "' AND `Company`='" . $_SESSION['company'] . "'";
$result_SESS = mysqli_query($conn, $query_SESS);  

session_unset();
session_destroy();
redirect('index.php');
break;

case 'Timedout':
  session_start();
  #######
  require_once 'time.php';
  
  $sql_log = "SELECT * FROM `cms_access_levels` Where `access_lvl`='" . $_SESSION['access_lvl'] ."'";
  $result_log = mysqli_query($conn,$sql_log) or die('Could not fetch data; ' . mysqli_error());
  $row_log = mysqli_fetch_array($result_log);
  
  $query_insert_Log = "Insert into `monitor` (`ip`,`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`, `Company`) 
  VALUES ('" . gethostbyaddr($_SERVER['REMOTE_ADDR']) . "/" . gethostbyname($_SERVER['REMOTE_ADDR']) . "','" . $row_log['access_name'] . "','" . ucfirst($_SESSION['uname']) . "', '" . date('Y/m/d') . "', '" . $gmdatex . "','Auto-Timedout','Auto-TimedOut As: " . ucfirst($_SESSION['name']) . "', '" .$_SESSION['company']. "')";
  
  $result_insert_Log = mysqli_query($conn,$query_insert_Log) or die(mysqli_error());
  ###### 
  //$query_SESS ="update `login` set `Last_Page`='" . $_SESSION['lpage'] . "' WHERE `user_id`='" .$_SESSION['user_id']. "' AND `username`='" .$_SESSION['uname']. "'";
  $query_SESS ="update `login` set `Last_Page`='" . $_SESSION['lpage'] . "' WHERE `user_id`='" .$_SESSION['user_id']. "' AND `username`='" .$_SESSION['uname']. "' AND `Company`='" . $_SESSION['company'] . "'";
  $result_SESS = mysqli_query($conn, $query_SESS);  
  
  session_unset();
  session_destroy();
  
  redirect('index.php');
  break;

case 'Create Account':
if ($_POST['name'] !="" 
and $_POST['e-mail'] !="" 
and $_POST['passwd'] !="" 
and $_POST['passwd2'] !="" 
and $_POST['passwd'] == $_POST['passwd2'])
{
$sql = "INSERT INTO `login` (`email`,`username`,`password`,`access_lvl`, `Company`) " .
"VALUES ('" . $_POST['e-mail'] . "','" .
$_POST['name'] . "','" . md5($_POST['passwd']) . "','" . $_POST['accesslvl'] . "', '" .$_SESSION['company']. "')";
mysqli_query($conn,$sql);
 $tval="New User Account Created!";
 header("location:index.php?tval=$tval&redirect=$redirect");
}
else
{
 $tval="Please fill in all parameters!";
 header("location:useraccount.php?tval=$tval&redirect=$redirect");
}
break;
case 'Modify Account':
if ($_POST['name'] !="" 
and $_POST['e-mail'] !=""
and $_POST['accesslvl'] !=""
and $_POST['passwd'] !="" 
and $_POST['passwd2'] !="" 
and $_POST['passwd'] == $_POST['passwd2']
and $_POST['user_id'] !="")
{
$sql = "UPDATE `login` " .
"SET `email`='" . $_POST['e-mail'] .
"', `username`='" . $_POST['name'] . 
"', `password`='" . md5($_POST['passwd']) .
"', `access_lvl`=" . $_POST['accesslvl'] . " " .
" WHERE `user_id`=" . $_POST['user_id'] . " and `username` not like 'control%' AND `Company`='" . $_SESSION['company'] . "'";
mysqli_query($conn,$sql);
 $tval="User Account Modified!";
 header("location:listing.php?tval=$tval&redirect=$redirect");
}
else
{
 $tval="Please fill in all parameters!";
 header("location:useraccount.php?UID=" . $_POST['user_id'] . "&tval=$tval&redirect=$redirect");
}
break;

case 'Delete Account':
if ($_POST['name'] !="")
{
$sql = "DELETE from `login` WHERE `user_id`=" . $_POST['user_id'] . " and `username` not like 'control%' AND `Company`='" . $_SESSION['company'] . "'";
mysqli_query($conn,$sql);
 $tval="User Account Deleted!";
 header("location:listing.php?tval=$tval&redirect=$redirect");
}
else
{
 $tval="Please fill in all parameters!";
 header("location:useraccount.php?UID=" . $_POST['user_id'] . "&tval=$tval&redirect=$redirect");
}
break;

###### OBSOLATE
case 'Register Me':
$query_count ="SELECT * FROM `company info` WHERE `Company Name` = '" . $_POST['company'] . "' or `Email`='" . $_POST['e-mail'] . "' or `Phone`='" . $_POST['phone'] . "'";
$result_count   = mysqli_query($conn,$query_count);     
$tot  = mysqli_num_rows($result_count);

if ($tot>0)
{
 $tval="DUPLICATE: A Similar Company info has been registered!";
 header("location:registerr.php?tval=$tval&redirect=$redirect");
} else {

if ($_POST['uname'] !="" 
and $_POST['e-mail'] !="" 
and $_POST['company'] !=""
and $_POST['passwd'] !="" 
and $_POST['passwd2'] !="" 
and $_POST['passwd'] == $_POST['passwd2'])
{
$sql = "INSERT INTO login (email,username,password,access_lvl) " .
"VALUES ('" . $_POST['e-mail'] . "','" .
$_POST['uname'] . "','" . md5($_POST['passwd']) . "',5)";
mysqli_query($conn,$sql);

###############################################
$sqlt = "INSERT INTO `company info` (`Email`, `Company Name`, `Address`, `Phone`, `City`, `Country`) 
VALUES ('" . $_POST['e-mail'] . "','" .$_POST['company'] . "','" . $_POST['address'] . "','" . $_POST['phone'] . "','" . $_POST['city'] . "','" . $_POST['country'] . "')";
mysqli_query($conn,$sqlt);

#######
if (!file_exists('images/'))
{
 mkdir('images/',0777,true);
}

if (!empty($_FILES['image_filename']['name']))
{
 if (file_exists("images/logo.jpg")==1)
 {
   $ImageNam = "images/logo.jpg";
   $newfilenam = "images/" . date("Y-m-d") . "_logo.jpg";
   rename($ImageNam, $newfilenam);
 }
   //make variables available
   $image_userid = "logo";
   $image_tempname = $_FILES['image_filename']['name'];
   $today = date("Y-m-d");

   //upload image and check for image type

   $ImageDir ="images/";
   $ImageName = $ImageDir . $image_tempname;
   if (move_uploaded_file($_FILES['image_filename']['tmp_name'],$ImageName)) 
   {
    //get info about the image being uploaded
    list($width, $height, $type, $attr) = getimagesize($ImageName);
 
    $ext = ".jpg";

    $newfilename = $ImageDir . "logo" . $ext;
    rename($ImageName, $newfilename);
   }
}
 $tval="Your User Account Has Been Created!";
 header("location:index.php?tval=$tval&redirect=$redirect");
}
else
{
 $tval="Please fill in all parameters!";
 header("location:registerr.php?tval=$tval&redirect=$redirect");
}

}
break;

case 'Get Password':
  if (isset($_POST['femail'])) 
  {
    $sql = "SELECT `user_id`,`username`,`email`,`password`,`Company` FROM `login` WHERE `email`='" . $_POST['femail'] . "'";
    $result = mysqli_query($conn, $sql) or die('Could not look up password; ' . mysqli_error());
    $row = mysqli_fetch_array($result);

    if (mysqli_num_rows($result)) 
    {

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
     $lnk="http://waltergates.com/coop_online/resetpwdd.php?id=" . md5($row['user_id']) ."&epz=" . $row['email'] ."&usr=" .$row['username'];
  
     $subject = 'Re: Waltergates VCP: Reset Password';
     $from ="From: support@waltergates.com\r\n";
     $body = "Your username is: " . $row['username'] . "\n Please click the following link to reset your password on Finasol: \n\n" . $lnk . "\n\n";
     $to =$_POST['femail']; 
     //mail($to,$subject,$body,$from);

##################TO USER####################
$urlx = "http://www.waltergates.com/callmail.php?cmd=sendquickmsg&toZ=" . UrlEncode($to) . "&fromZ=" . UrlEncode($from) . "&bodyZ=" . UrlEncode($body) . "&subjectZ=" . UrlEncode($subject). 
"&toZr=" . UrlEncode($toZr) . "&fromZr=" . UrlEncode($fromZr) . "&bodyZr=" . UrlEncode($bodyZr) . "&subjectZr=" . UrlEncode($subjectZr);

//$time_start = microtime(true);
if ($f = @fopen($urlx, "r"))
{
 $answer = fgets($f, 255);
}
else
{
 echo "Error: Email could not be sent.";
}
  
  ####
  $subj = 'VCP Password Retrieval';
  $frm ="From: support@waltergates.com\r\n";
  $bodd = "A user has requested for password on Cooperatives Portal. Cooperative Name: " . $row['Company'] .
  "\n\n Email: " . $_POST['femail'];
  $mymail='info@waltergates.com';
  mail($mymail,$subj,$bodd,$frm);
  #########################################################
  } else {   
    session_start();
    $_SESSION['yyuser']=$row['username'];
    //redirect("resetpwdd.php?id=" . md5($row['user_id']) ."&epz=" . $row['email']. "&tval=" . $tval);
   // redirect("index.php?tval=Please check your internet and try again");
  }
  $sespage= "Forgot Password";
  $sesdet="Password Request by: " . $_POST['femail'];
  include 'monita.php';
  
    $tval="Check your e-mail to continue now please";
    } else {
     $tval="The email you provided was not the one you registered with.";
    }
  }
  
  redirect('index.php?tval=' . $tval);
  break;
  

case 'Send my reminder!':
if (isset($_POST['e-mail'])) {
$sql = "SELECT password FROM tblMembers " .
"WHERE email='" . $_POST['e-mail'] . "'";
$result = mysqli_query($conn,$sql)
or die('Could not look up password; ' . mysqli_error());
if (mysqli_num_rows($result)) {
$row = mysqli_fetch_array($result);
$subject = 'Password reminder';
$body = "Just a reminder, your password for the " .
" site is: " . $row['password'] .
"\n\nYou can use this to log in at http://" .
$_SERVER['HTTP_HOST'] .
dirname($_SERVER['PHP_SELF']) . '/';
mail($_POST['e-mail'],$subject,$body)
or die('Could not send reminder e-mail.');
}
}
redirect('login.php');
break;
case 'Change my info':
session_start();
if ($_POST['name'] !="" 
and $_POST['e-mail'] !="" 
and isset($_SESSION['user_id']))
{
$sql = "UPDATE login " .
"SET email='" . $_POST['e-mail'] .
"', username='" . $_POST['name'] . "' " .
"WHERE userid=" . $_SESSION['user_id'];
mysqli_query($conn,$sql);
redirect('cpanel.php');
}
else
{
 $tval="Please fill in all parameters!";
 header("location:cpanel.php?UID=" . $_SESSION['user_id'] . "&tval=$tval&redirect=$redirect");
}
break;
}
}
?>