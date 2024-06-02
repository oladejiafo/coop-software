<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 2) & ($_SESSION['access_lvl'] != 1) & ($_SESSION['access_lvl'] != 3) & ($_SESSION['access_lvl'] != 4) & ($_SESSION['access_lvl'] != 6) & ($_SESSION['access_lvl'] != 7))
{
 if ($_SESSION['access_lvl'] != 5){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");
}
}

 $id = $_POST["id"];
 $fname = $_POST["fname"];
 $sname = $_POST["sname"];
 $acctno = $_POST["acctnum"];
 $trans = $_POST["trans"];
 $type = $_POST["type"];
 $gender = $_POST["gender"];
 $status = $_POST["status"];
 $acctofficer = $_POST["acctofficer"];
 $officer = $_POST["officer"];
 $date = $_POST["date"];
 $transtype = $_POST["transtype"];
 $amount = $_POST["amount"];
 $remark = $_POST["remark"];
 $transactor = $_POST["transactor"];
 $tcontact = $_POST["tcontact"];
 $balance = $_POST["balance"];
 $bbalance = $_POST["bbalance"];
 $transmode = $_POST["transmode"];
 $teller = $_POST["teller"];

 $initamt = $_POST["initamt"];

if ($_POST['date'] !='0000-00-00' and $_POST['date'] !='')
{
  $rsdate = $_POST['date'];
  list($dayy, $monthh, $yearr) = explode('-', $rsdate);
  $date = $yearr . '-' . $monthh . '-' . $dayy;
}


##########################################
function strleft($leftstring, $length) {
  return(substr($leftstring, 0, $length));
}
 
function strright($rightstring, $length) {
  return(substr($rightstring, -$length));
}
$myacct = $acctno;
 
$lacct= strleft($myacct,3);  //result "John M" 
 
$racct= strright($myacct,4); //result "Miller"

$dacct=$lacct . "***" . $racct;
##########################################
 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Modify':

      if (Trim($acctno) != "" && Trim($amount) != "" && Trim($transtype) != "")
      {
        if ($transtype=='Deposit')
        {
         $bal=$balance-$initamt+$amount;
         $bbal=$bbalance-$initamt+$amount;

         $query_update = "UPDATE `transactions` SET `Account Number` = '$acctno',`Deposit`='$amount',`Transactor`='$transactor',`Transactor Contact`='$tcontact',
          `Officer`='$officer',`Date`='$date',`Transaction Type`='$transtype',`Remark`='$remark',`Balance`='$bal',`Book Balance`='$bbal',`Mode`='$transmode',`Teller No`='$teller' WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$id'";
        $result_update = mysqli_query($conn,$query_update);
        } else {
         $bal=$balance+$initamt-$amount;
         $bbal=$bbalance+$initamt-$amount;

         $query_ch = "SELECT `Margin`,`Margin Type`,`Effect` FROM `account type` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Type`='" . $type ."'";
         $result_ch = mysqli_query($conn,$query_ch);
         $rowch = mysqli_fetch_array($result_ch);
         $margin=$rowch['Margin'];
         $margintype=$rowch['Margin Type'];
         $effect=$rowch['Effect'];
   
         if(!empty($margin) and $margin !=0)
         {
            $query_delins = "delete from `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno' and `Date`='$date' and `Transaction Type`='$margintype'"; 
            $result_delins = mysqli_query($conn,$query_delins);

            $query_delchs = "delete from `cash` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Type`='Income' and `Classification`='Charges' and `Date`='$date' and `Particulars`='$margintype' and `Remark`='$acctno'"; 
            $result_delchs = mysqli_query($conn,$query_delchs);            
##################################################
            $amt=($amount *$margin)/100;

            $balt=$bal-$amt;
            $bbalt=$bbal-$amt;
            $query_ins = "Insert into `transactions` (`Account Number`,`Withdrawal`,`Transactor`,`Transactor Contact`,`Officer`,`Date`,`Transaction Type`,`Remark`,`Balance`,`Book Balance`, `Company`) 
                  VALUES ('$acctno','$amt','','','','$date','$margintype','','$balt','$bbalt', '" .$_SESSION['company']. "')";
            $result_ins = mysqli_query($conn,$query_ins);

            $query_chs = "Insert into `cash` (`Type`,`Classification`,`Date`,`Particulars`,`Amount`,`Remark`, `Company`) 
                  VALUES ('Income','Charges','$date','$margintype','$amt','$acctno', '" .$_SESSION['company']. "')";
            $result_chs = mysqli_query($conn,$query_chs);
         }

         $query_update = "UPDATE `transactions` SET `Account Number` = '$acctno',`Withdrawal`='$amount',`Transactor`='$transactor',`Transactor Contact`='$tcontact',
          `Officer`='$officer',`Date`='$date',`Transaction Type`='$transtype',`Remark`='$remark',`Balance`='$bal',`Book Balance`='$bbal' WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$id'";
        $result_update = mysqli_query($conn,$query_update);
        }


            #######
            $sql = "SELECT * FROM cms_access_levels WHERE `Company` ='" .$_SESSION['company']. "' AND  access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`, `Company`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Transactions Record','Modified Transactions Record for Customer: " . $acctno . ", " . $amount . ", " . $transtype . "', '" .$_SESSION['company']. "')";
            $result_update_Log = mysqli_query($conn,$query_update_Log);
            ###### 

        $tval="Your record has been updated.";
        header("location:transactions.php?id=$id&acctno=$acctno&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter all details before updating.";
        header("location:transactions.php?id=$id&acctno=$acctno&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Save':
      if (Trim($acctno) != "" && Trim($amount) != "" && Trim($transtype) != "")
      { 
         $query_con = "SELECT `Account Number` FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Transaction Type`='" . $transtype ."' and `Account Number`='" . $acctno ."' and `Date`='" . $date ."' and (`Deposit`=" . $amount ." OR `Withdrawal`=" . $amount .")";
         $result_con = mysqli_query($conn,$query_con);
         $totalcon  = mysqli_num_rows($result_con);
        if($totalcon>0)
       {
         $tval="This Transaction Looks Like A Repeat, Confirm Please.";
         header("location:transactions.php?id=$id&acctno=$acctno&tval=$tval&redirect=$redirect");
        } else {
        if ($transtype=='Deposit')
        {  
         $bal=$balance+$amount;
         $bbal=$bbalance+$amount;
         $query_insert = "Insert into `transactions` (`Account Number`,`Deposit`,`Transactor`,`Transactor Contact`,`Officer`,`Date`,`Transaction Type`,`Remark`,`Balance`,`Book Balance`,`Mode`,`Teller No`, `Company`) 
               VALUES ('$acctno','$amount','$transactor','$tcontact','$officer','$date','$transtype','$remark','$bal','$bbal','$transmode','$teller', '" .$_SESSION['company']. "')";
         $result_insert = mysqli_query($conn,$query_insert);

         $query_ins = "Insert into cash (`Type`,Classification, Particulars,Amount,`Date`,`Source`,`Account`,`Recipient`,`Bank`,`Paid`, `Company`) 
               VALUES ('Income','Customers Deposit','Customers Deposit for $acctno','$amount','$date','$transtype','$acctno','','','', '" .$_SESSION['company']. "')";
         $result_ins = mysqli_query($conn,$query_ins);
##########################################################
        $qry="Select `PBalance`,`Payment todate`,`Balance`,`Book Balance`,`Interest toDate`,`PPayment todate`,`Monthly Interest`,`Periodic Repayment`, `Loan Status`, `ID`,`Payment Frequency`,`Loan Date` from `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno' and `Loan Status`='Active'";
        $resl = mysqli_query($conn,$qry);
        $rowe=mysqli_fetch_array($resl);
        $ptd=$rowe['Payment todate'];
        $bl=$rowe['Balance'];
        $bbl=$rowe['Book Balance'];
        $itd=$rowe['Interest toDate'];
        $prtd=$rowe['PPayment todate'];
        $mi=$rowe['Monthly Interest'];
        $repay=$rowe['Periodic Repayment'];
        $pbal=$rowe['PBalance'];
        $lstatus=$rowe['Loan Status'];
        $freq=$rowe['Payment Frequency'];
        $ldate=$rowe['Loan Date'];

        $paytd=$repay+$ptd;
        $balf=$bl-$repay;
        $bbalf=$bbl-$repay;
        $prtdf=$prtd+($repay-$mi);
        #$itdf=$itd+($repay-$prtd);
        $itdf=$itd+($mi);
        $pbl=$pbal-$ptd;
        $loanid=$rowe['ID'];

if($freq=="Monthly")
{
 $Zdue=date('Y-m-d', strtotime('-30 day',strtotime($date)));
} else {
 $Zdue=date('Y-m-d', strtotime('-1 day',strtotime($date)));
}

if($lstatus=="Active" && $bl>0)
{
        $qryZ="Select `Date`,`Amount` from `loan payment` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno' and `Loan ID`='$loanid' order by `ID` desc limit 0,1";
        $resZ = mysqli_query($conn,$qryZ);
        $rowZ=mysqli_fetch_array($resZ);
        $Zdate=$rowZ['Date'];
        $Zamt=$rowZ['Amount'];
   if(empty($Zdate))
   {
      $Zdate=$ldate;
   }

    if($Zdate <= $Zdue)
    {
        $query_insert = "Insert into `loan payment` (`Account Number`,`Loan ID`,`Date`,`Amount`, `Company`) 
                                             VALUES ('$acctno','$loanid','$date','$repay', '" .$_SESSION['company']. "')";
        $result_insert = mysqli_query($conn,$query_insert);

        $qry_insert = "update `loan` set `Payment todate`='$paytd',`Balance`='$balf',`Book Balance`='$bbalf',`Interest toDate`='$itdf',`PPayment todate`='$prtdf' WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno' and `ID`='$loanid'";
        $res_insert = mysqli_query($conn,$qry_insert);

         $query_ins = "Insert into cash (`Type`,Classification, Particulars,Amount,`Date`,`Source`,`Account`,`Recipient`,`Bank`,`Paid`, `Company`) 
               VALUES ('Income','Loan Collection Expenses','Periodic payback on loan for $acctno','$repay','$date','','$acctno','','','', '" .$_SESSION['company']. "')";
         $result_ins = mysqli_query($conn,$query_ins);

        $sqlb="SELECT * FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno' order by `ID` desc";
        $resultb = mysqli_query($conn,$sqlb) or die('Could not look up user data; ' . mysql_error());
        $rowb = mysqli_fetch_array($resultb); 

        $balance= $rowb['Balance']; 
        $bbalance= $rowb['Book Balance']; 
        $bal=$balance-$repay;
        $bbal=$bbalance-$repay;
        $query_trans = "Insert into `transactions` (`Account Number`,`Withdrawal`,`Transactor`,`Transactor Contact`,`Officer`,`Date`,`Transaction Type`,`Remark`,`Balance`,`Book Balance`, `Company`) 
               VALUES ('$acctno','$repay','Loan Auto Deduction','Auto','Auto','" . date('Y-m-d') . "','Withdrawal','Monthly Loan Deduction','$bal','$bbal', '" .$_SESSION['company']. "')";
        $result_trans = mysqli_query($conn,$query_trans);

    if($balf==0)
    {
        $qry_insertx = "update `loan` set `Loan Status`='Completed' WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno' and `ID`='$loanid'";
        $res_insertx = mysqli_query($conn,$qry_insertx);
    }
   }
}
##########################################################
        } else {
         if($amount>$balance)
         {
          $tval="You cannot withdraw more than the amount you have as balance!";
          header("location:transactions.php?id=$id&acctno=$acctno&transtype=$transtype&tval=$tval&redirect=$redirect");
          break;
         } else {
         $bal=$balance-$amount;
         $bbal=$bbalance-$amount;
         $query_insert = "Insert into `transactions` (`Account Number`,`Withdrawal`,`Transactor`,`Transactor Contact`,`Officer`,`Date`,`Transaction Type`,`Remark`,`Balance`,`Book Balance`, `Company`) 
               VALUES ('$acctno','$amount','$transactor','$tcontact','$officer','$date','$transtype','$remark','$bal','$bbal', '" .$_SESSION['company']. "')";
         $result_insert = mysqli_query($conn,$query_insert);

         $query_ins = "Insert into cash (`Type`,Classification, Particulars,Amount,`Date`,`Source`,`Account`,`Recipient`,`Bank`,`Paid`, `Company`) 
               VALUES ('Expense','Accounts Payable','Customers cash withdrawal for $acctno','$amount','$date','$transtype','$acctno','','','', '" .$_SESSION['company']. "')";
         $result_ins = mysqli_query($conn,$query_ins);

         $query_ch = "SELECT `Margin`,`Margin Type`,`Effect` FROM `account type` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Type`='" . $type ."'";
         $result_ch = mysqli_query($conn,$query_ch);
         $rowch = mysqli_fetch_array($result_ch);
         $margin=$rowch['Margin'];
         $margintype=$rowch['Margin Type'];
         $effect=$rowch['Effect'];
   
         if(!empty($margin) and $margin !=0)
         {
            $amt=($amount *$margin)/100;
            $balt=$bal-$amt;
            $bbalt=$bbal-$amt;
            $query_ins = "Insert into `transactions` (`Account Number`,`Withdrawal`,`Transactor`,`Transactor Contact`,`Officer`,`Date`,`Transaction Type`,`Remark`,`Balance`,`Book Balance`, `Company`) 
                  VALUES ('$acctno','$amt','','','','$date','$margintype','','$balt','$bbalt', '" .$_SESSION['company']. "')";
            $result_ins = mysqli_query($conn,$query_ins);

            $query_chs = "Insert into `cash` (`Type`,`Classification`,`Date`,`Particulars`,`Amount`,`Remark`, `Company`) 
                  VALUES ('Income','Other Charges','$date','$margintype','$amt','$acctno', '" .$_SESSION['company']. "')";
            $result_chs = mysqli_query($conn,$query_chs);
         }

         if($transtype =='Normal Susu')
         {
            $dtt=(1 * $amount/30);
            $batt=$bal-$dtt;
            $bbatt=$bbal-$dtt;
            $query_ins = "Insert into `transactions` (`Account Number`,`Withdrawal`,`Transactor`,`Transactor Contact`,`Officer`,`Date`,`Transaction Type`,`Remark`,`Balance`,`Book Balance`, `Company`) 
                  VALUES ('$acctno','$dtt','','','','$date','Charges','','$batt','$bbatt', '" .$_SESSION['company']. "')";
            $result_ins = mysqli_query($conn,$query_ins);

            $query_chs = "Insert into `cash` (`Type`,`Classification`,`Date`,`Particulars`,`Amount`,`Remark`, `Company`) 
                  VALUES ('Income','Other Charges','$date','Charges on Normal Susu','$dtt','$acctno', '" .$_SESSION['company']. "')";
            $result_chs = mysqli_query($conn,$query_chs);
         }
         }
        }

        if ($transtype=='Withdrawal')
        {   
         if($amount>$balance)
         {

         } else {

            $sqlz = "SELECT `ID` FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno' and `Date`='$date'";
            $rezult = mysqli_query($conn,$sqlz);
            $rowz = mysqli_fetch_array($rezult);
            $idz=$rowz['ID'];

            $query_upd = "UPDATE `currency detail` SET `TransID`='$idz' WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account No` = '$acctno' and `Date`='$date'";
            $result_upd = mysqli_query($conn,$query_upd);
         }
        } else if ($transtype=='Deposit') {
            $sqlz = "SELECT `ID` FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno' and `Date`='$date'";
            $rezult = mysqli_query($conn,$sqlz);
            $rowz = mysqli_fetch_array($rezult);
            $idz=$rowz['ID'];

            $query_upd = "UPDATE `currency detail` SET `TransID`='$idz' WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account No` = '$acctno' and `Date`='$date'";
            $result_upd = mysqli_query($conn,$query_upd);
        }
            #######
            $sql = "SELECT * FROM cms_access_levels WHERE `Company` ='" .$_SESSION['company']. "' AND  access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($result);

            $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`, `Company`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Transactions Record','Added Transactions Record for Customer: " . $acctno . ", " . $amount . ", " . $transtype . "', '" .$_SESSION['company']. "')";
            $result_insert_Log = mysqli_query($conn,$query_insert_Log);
            ###### 

###########################################################################################
$querys="SELECT `ID`, `Coy_Name`, `Coy_Alias`,`Coy_email`,`PORTAL_url`, `SMS_email`, `SMS_Sub_Acct`, `SMS_Sub_Psw`, `SMS_Sender` FROM `_config` WHERE `Company` ='" .$_SESSION['company']. "'";
$results=mysqli_query($conn,$querys);
$rows = mysqli_fetch_array($results);
$COYname=$rows['Coy_Name'];
$COYalias=$rows['Coy_Alias'];
$COYemail=$rows['Coy_email'];
$portal_url=$rows['PORTAL_url'];
$SMSemail=$rows['SMS_email'];
$SMSsubacct=$rows['SMS_Sub_Acct'];
$SMSsubpsw=$rows['SMS_Sub_Psw'];
$SMSsender=$rows['SMS_Sender'];

$sqlc="SELECT `Company Name`,`Email` FROM `company info` WHERE `Company Name` ='" .$_SESSION['company']. "'";
$resultc = mysqli_query($conn,$sqlc) or die('Could not look up user data; ' . mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$coy=$rowc['Company Name'];
$imal=$rowc['Email'];
#$coys ="iBBDs Co-Thrift";

$sql="SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Membership Number`='$acctno'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);
$sms=$row['SMS'];
$emailalert=$row['email alert'];
$email=$row['email'];
$phon=$row['Contact Number'];
$fname=$row['First Name'];
$sname=$row['Surname'];

$name= $fname . " " . $sname;

if($transactor)
{
  $byy=$transactor;
}  
else if($agent)
{
  $byy=$agent;
}

###
if (!$sock=@fsockopen('www.google.com',80,$num,$error,5))
{ 
 $ttval="No Internet Connection";
} else {
######email alert#######

//if ($emailalert==1)
{
 if (Trim($email) != "" and Trim($imal) != "")
 { 
  if ($transtype=='Deposit')
  {
   $trax="credited"; 
  } else {
   $trax="debited"; 
  }
  if($remark=="" or empty($remark))
  {
   $remark="***";
  }

$to      = $email; //'dejigegs@gmail.com';
$subject = $coy. ' Notification';
$message = "ALERT: " . $name . ", Your account " . $dacct . " has been " . $trax . " with N" . $amount . ". Descr: By " . $byy . ", for " . $remark . ". Your account balance is N" . $bal . ". Date: " . $date;
$headers = 'From:' .$imal . "\r\n" .
           'Reply-To: ' .$imal. "\r\n" .
           'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers)) 
{
  #  echo 'Email sent successfully!';
}   

 }
}
#####end email alert######

### sms alert ###
if ($sms==1)
{

if ($transtype=='Deposit')
{
 $trax="credited"; 
} else {
 $trax="debited"; 
}
if($remark=="" or empty($remark))
{
 $remark="***";
}
/*
###########INFOBID###########

$request = new HttpRequest();
$request->setUrl('https://api.infobip.com/sms/1/text/single');
$request->setMethod(HTTP_METH_POST);

$request->setHeaders(array(
  'accept' => 'application/json',
  'content-type' => 'application/json',
  'authorization' => 'Basic V2FsdGVyZ2F0ZXM6b2xhZ2Vncw=='
));

$request->setBody('{
   "from":"' . $coy . '",
   "to":"' . $phon . '",
   "text":"ALERT: ' . $name . ', Your account ' . $dacct . ' has been ' . $trax . ' with N' . $amount . '. Descr: By ' . $byy . ', for ' . $remark . '. Your account balance is N' . $bal . '. Date: ' . $date . '"
}');

try {
  $response = $request->send();
  
  #echo $response->getBody();
} catch (HttpException $ex) {
  #echo $ex;
}
*/
$msalt=$COYname. " ALERT: " . $name . ", Your account " . $dacct . " has been " . $trax . " with N" . $amount . ". Descr: By " . $byy . ", for " . $remark . ". Your account balance is N" . $bal . ". Date: " . $date;
########SMSLIVE247#######
/* Variables with the values to be sent. */

$owneremail=$SMSemail; //"scoker@swifthmo.com";
$subacct=$SMSsubacct; //"SWIFTHMO";
$subacctpwd=$SMSsubpsw; //"ict@123";
$sender=$SMSsender; //"SWIFTHMO";  
$sendto=$phon; /* destination number */
$message=$msalt;
/* message to be sent */

$url = "http://www.smslive247.com/http/index.aspx?"
. "cmd=sendquickmsg"
. "&owneremail=" . UrlEncode($owneremail)
. "&subacct=" . UrlEncode($subacct)
. "&subacctpwd=" . UrlEncode($subacctpwd)
. "&sendto=" . UrlEncode($sendto)
. "&message=" . UrlEncode($message)
. "&sender=" . UrlEncode($sender);
/* call the URL */
$time_start = microtime(true);
if ($f = @fopen($url, "r"))
{
$answer = fgets($f, 255);
#echo "[$answer]";
}
else
{
echo "Error: URL could not be opened.";
}
#   echo "<br>"  ;
$time_end = microtime(true);
$time = $time_end - $time_start;

#echo "Finished in $time seconds\n";
##########################

##########################
$sqlX="SELECT `SMS Rate` FROM `sms tarrif` WHERE `Company` ='" .$_SESSION['company']. "'";
$resultX = mysqli_query($conn,$sqlX) or die('Could not look up user data; ' . mysqli_error());
$rowX = mysqli_fetch_array($resultX);
$smsamt=$rowX['SMS Rate'];

if ($transtype=='Deposit')
{   
 $balX=($balance+$amount)-$smsamt;
} else if ($transtype=='Withdrawal') {   
 $balX=($balance-$amount)-$smsamt;
}
/*
 $query_insx = "Insert into `transactions` (`Account Number`,`Withdrawal`,`Transactor`,`Transactor Contact`,`Officer`,`Date`,`Transaction Type`,`Remark`,`Balance`, `Company`) 
                  VALUES ('$acctno','$smsamt','Auto Billing','','','$date','SMS Charges','SMS Charges','$balX', '" .$_SESSION['company']. "')";
 $result_insx = mysqli_query($conn,$query_insx);

 $query_chas = "Insert into `cash` (`Type`,`Classification`,`Date`,`Particulars`,`Amount`,`Remark`, `Company`) 
                  VALUES ('Income','Other Charges','$date','SMS Alert Charges','$smsamt','$acctno', '" .$_SESSION['company']. "')";
 $result_chas = mysqli_query($conn,$query_chas);
*/
#############################

}
### end Sms alert ###
}
###
###########################################################################################

        $tval="Your record has been saved.";
        header("location:transactions.php?id=$id&acctno=$acctno&tval=$tval&redirect=$redirect");
      }
     }
      else
      {
        $tval="Please enter all details before saving.";
        header("location:transactions.php?id=$id&acctno=$acctno&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Delete':
      {

        if ($transtype=='Deposit')
        {
         $bal=$balance-$initamt;
         $query_update = "UPDATE `transactions` SET `Account Number` = '$acctno',`Deposit`='$amount',`Transactor`='$transactor',`Transactor Contact`='$tcontact',
          `Officer`='$officer',`Date`='$date',`Transaction Type`='$transtype',`Remark`='$remark',`Balance`='$bal' WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$id'";
        $result_update = mysqli_query($conn,$query_update);
        } else {
         $bal=$balance+$initamt;
         $query_update = "UPDATE `transactions` SET `Account Number` = '$acctno',`Deposit`='$amount',`Transactor`='$transactor',`Transactor Contact`='$tcontact',
          `Officer`='$officer',`Date`='$date',`Transaction Type`='$transtype',`Remark`='$remark',`Balance`='$bal' WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$id'";
        $result_update = mysqli_query($conn,$query_update);
        }

       $query_delete = "DELETE FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$id';";
       $result_delete = mysqli_query($conn,$query_delete);          

            #######
            $sql = "SELECT * FROM cms_access_levels WHERE `Company` ='" .$_SESSION['company']. "' AND  access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($result);

            $query_delete_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`, `Company`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Transactions Record','Deleted Transactions Record for Customer: " . $acctno . ", " . $amount . ", " . $transtype . "', '" .$_SESSION['company']. "')";
            $result_delete_Log = mysqli_query($conn,$query_delete_Log);
            ###### 

        $tval="Your record has been deleted.";
        header("location:transactions.php?id=$id&acctno=$acctno&tval=$tval&redirect=$redirect");
      }
      break;     
     case 'Cancel':
      {
        header("location:transactions.php?id=$id&acctno=$acctno&tval=$tval&redirect=$redirect");
      }
      break;     
   }
 }
?>