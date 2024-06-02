<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5) & ($_SESSION['access_lvl'] != 3) & ($_SESSION['access_lvl'] != 6))
{
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");
}
require_once 'conn.php';
 
 $id = $_POST["id"];
 $acctnum = $_POST["acctnum"];
 $sname = $_POST["sname"];
 $fname = $_POST["fname"];
 $date = $_POST["date"];
 $tenor = $_POST["tenor"];
 $initamt = $_POST["initamt"];
 $amount = $_POST["amount"];

 
//$intrate = $_POST["intrate"];
// $intamount = $_POST["intamount"];
// $mdate = $_POST["mdate"];
// $wht = $_POST["wht"];
 $balance = $_POST["balance"];
 
 $ocharges = $_POST["ocharges"];

 $status = $_POST["status"];
 $pliq = $_POST["pliq"];
 $liqdate = $_POST["liqdate"];
 $liqcharges = $_POST["liqcharges"];
 $intpayout = $_POST["intpayout"];
 $fid = $_POST["fid"];

 list($day, $month, $year) = explode('-', $date);
 $date = $year . '-' . $month . '-' . $day;

 if($tenor=="1 Month")
 {
    $mdate=date('Y-m-d', strtotime('+1 month',strtotime($date)));
 } else if($tenor=="3 Months") {
    $mdate=date('Y-m-d', strtotime('+3 month',strtotime($date)));
 } else if($tenor=="6 Months") {
    $mdate=date('Y-m-d', strtotime('+6 month',strtotime($date)));   
 } else if($tenor=="12 Months") {
    $mdate=date('Y-m-d', strtotime('+12 month',strtotime($date)));
 } 

 $qry_rate="Select `Interest Rate` from `account type` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Type`='Fixed Deposit' AND `Margin Type`='$tenor'";
 $result_rate = mysqli_query($conn,$qry_rate);
 $row_rate=mysqli_fetch_array($result_rate);

 $intrate=$row_rate['Interest Rate'];
 $intamount=($intrate * $amount)/100;
 $wht=$intamount *0.01;

 $name= $fname . " " . $sname;

 if($balance=="" OR empty($balance))
 {
     $balance=$amount;
 }

 if($balance==0)
 {
     $status="Completed";
 } else {
     $status="Active";
 }
 
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

 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Modify':
      if (Trim($acctnum) != "" and Trim($amount) != "")
      {
        $query_update = "UPDATE `fixed deposit` SET `Account Number`='$acctnum',`Amount` = '$amount',`FID` = '$fid',`Tenor` = '$tenor',`Date` = '$date',`Interest Rate` = '$intrate',`Maturity Date` = '$mdate'
                         ,`Interest Amount` = '$intamount',`Principal Liquidation` = '$pliq',`Interest Payout` = '$intpayout',`Status` = '$status',`Liquidation Date` = '$liqdate',`Liquidation Charges` = '$liqcharge',`WHT` = '$wht',`Other Charges` = '$ocharges'
                         ,`Balance`='$balance',`Name` = '$name' WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$id'";
        $result_update = mysqli_query($conn,$query_update);

        $tval="Your record has been updated.";
        header("location:fixeddeposit.php?acctno=$acctnum&idd=$id&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Basic details before updating.";
        header("location:fixeddeposit.php?acctno=$acctnum&idd=$id&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Submit':
      if (Trim($acctnum) != "" and Trim($amount) != "")
      { 
        //$tbal=$amount+$totintr;

        $query_insert = "Insert into `fixed deposit` (`Account Number`,`Amount`, `FID`,`Tenor`,`Date`,`Interest Rate`,`Maturity Date`, `Interest Amount`,`Principal Liquidation`,`Interest Payout`,`Status`
               ,`Liquidation Date`, `Liquidation Charges`,`WHT`,`Other Charges`,`Balance`,`Name`, `Company`) 
           VALUES ('$acctnum','$amount', '$fid', '$tenor', '$date', '$intrate', '$mdate', '$intamount', '$pliq', '$intpayout','$status'
               ,'$liqdate','$liqcharge','$wht', '$ocharges', '$balance', '$name', '" .$_SESSION['company']. "')";
        $result_insert = mysqli_query($conn,$query_insert);

        $sqlb="SELECT `ID` FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctnum' AND `Date`='$date' AND `Amount`='$amount' order by `ID` desc";
        $resultb = mysqli_query($conn,$sqlb) or die('Could not look up user data; ' . mysql_error());
        $rowb = mysqli_fetch_array($resultb); 
        $id= $rowb['ID']; 
/*
         $query_ins = "Insert into cash (`Type`,Classification, Particulars,Amount,`Date`,`Source`,`Account`,`Recipient`,`Bank`,`Paid`, `Company`) 
               VALUES ('Expense','Other Short-term Clients Loans','$loantype to Customer $acctnum','$amount','$date','','$acctnum','','','Paid', '" .$_SESSION['company']. "')";
         $result_ins = mysqli_query($conn,$query_ins); 

        $sqlb="SELECT * FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctnum' order by `ID` desc";
        $resultb = mysqli_query($conn,$sqlb) or die('Could not look up user data; ' . mysql_error());
        $rowb = mysqli_fetch_array($resultb); 

        $balance= $rowb['Balance']; 
         $bal=$balance-$amount;
         $query_insert = "Insert into `transactions` (`Account Number`,`Deposit`,`Transactor`,`Transactor Contact`,`Officer`,`Date`,`Transaction Type`,`Remark`,`Balance`, `Company`) 
               VALUES ('$acctnum','$amount','Loan Auto Transaction','','$officer','$date','Withdrawal','Loan Disbursement','$bal', '" .$_SESSION['company']. "')";
         $result_insert = mysqli_query($conn,$query_insert);
*/
#######


###
if (!$sock=@fsockopen('www.google.com',80,$num,$error,5))
{ 
 $ttval="No Internet Connection";
} else {
######email alert#######

if ($emailalert==1)
{
 if (Trim($email) != "")
 { 


  $ndate=date('Y-m-d');
$to      = $email; //'dejigegs@gmail.com';
$subject = 'Fixed Deposit Notification';
$message = $COYname. " ALERT: " . $name . ", a fixed deposit of N" . $amount . " has been carried out on your account. Date: " . $ndate;
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

$msalt =$COYname. " ALERT: " . $name . ", a fixed deposit of N" . $amount . " has been carried out on your account. Date: " . $ndate . "\n";
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
}
}
###########################################################################################


        $tval="Your record has been Saved.";
        header("location:fixeddeposit.php?acctno=$acctnum&idd=$id&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Basic details before saving.";
        header("location:fixeddeposit.php?tval=$tval&redirect=$redirect");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `fixed deposit` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$id'";
       $result_delete = mysqli_query($conn,$query_delete);          

        $tval="Your record has been deleted.";
        header("location:fixeddeposit.php?tval=$tval&redirect=$redirect");
      }
      break;   
      case 'Close':
        {
          header("location:fixeddeposit.php?tval=$tval&redirect=$redirect");
        }
        break;   
   }
 }
?>