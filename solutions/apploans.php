<?php
session_start();

//check to see if user has logged in with a valid password

if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5 && $_SESSION['access_lvl'] != 6))

{

  $redirect = $_SERVER['PHP_SELF'];

  header("Refresh: 0; URL=index.php?redirect=$redirect");

}


 $loanid = $_REQUEST["loanid"];

 $acctnum = $_REQUEST["acctnum"];

 $aph=$_REQUEST["aph"];

 $appnote=$_POST["appnote"];

 require_once 'conn.php';

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

 if($acctnum !="")
 {
      if($aph==1)
      {
            $query = "SELECT `ID`,`Loan Date`,`Total Interest`,`Account Number`,`Loan Amount`,`Loan Type`,`Application Fee`,`Processing Fee`,`Insurance Fee`,`Officer`,`Approval`,`Approval Note` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` =" .$loanid. " and `Account Number`='" .$acctnum. "'";

            $resultp=mysqli_query($conn,$query);
      
            $rowp = mysqli_fetch_array($resultp);
       
           $date= $rowp['Loan Date'];
       
           $loantype= $rowp['Loan Type'];
       
           $amount= $rowp['Loan Amount'];
           $lamount= $rowp['Loan Amount'] + $rowp['Total Interest'];
       
           $date= $rowp['Loan Date'];
       
           $officer= $rowp['Officer'];
       
           $applicationfee= $rowp['Application Fee'];
       
           $processingfee= $rowp['Processing Fee'];
       
           $insurancefee= $rowp['Insurance Fee']; 
       
           $totintr= $rowp['Total Interest'];
      
      
           $query_update = "UPDATE `loan` SET `Approval`='Approved',`Loan Status`='Active' WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` =" .$loanid. " and `Account Number`='" .$acctnum. "'";
      
           $result_update = mysqli_query($conn,$query_update);
      
      
        
            $query_ins = "Insert into cash (`Type`,Classification, Particulars,Amount,`Date`,`Source`,`Account`,`Recipient`,`Bank`,`Paid`,`Company`)
               VALUES ('Expense','Other Short-term Clients Loans','$loantype to Customer $acctnum','$lamount','$date','','$acctnum','','','Paid','" .$_SESSION['company']. "')";
            $result_ins = mysqli_query($conn,$query_ins);
      
      
            $sqlb="SELECT * FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctnum' order by `ID` desc";
      
            $resultb = mysqli_query($conn,$sqlb) or die('Could not look up user data; ' . mysql_error());
      
            $rowb = mysqli_fetch_array($resultb);
       
      
            $balance= $rowb['Balance'];
       
            $bal=$balance-($amount+$totintr);
/*
            $query_insert = "Insert into `transactions` (`Account Number`,`Withdrawal`,`Transactor`,`Transactor Contact`,`Officer`,`Date`,`Transaction Type`,`Remark`,`Balance`)
                VALUES ('$acctnum','$lamount','Loan Auto Transaction','','$officer','$date','Withdrawal','Loan Disbursement','$bal')";
            $result_insert = mysqli_query($conn,$query_insert);
*/
               if($applicationfee>0)
               {
                $query_insX1 = "Insert into `sundry` (`Amount`,`Note`,`Date`,`Source`,`Account Number`,`Officer`,`Type`,`Company`) 
                VALUES ('$applicationfee','Loan Application Fee','$date','Loan Application Fee','$acctnum','$officer','Income','" .$_SESSION['company']. "')";
                $result_insX1 = mysqli_query($conn,$query_insX1);

                $sqlbX1="SELECT * FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctnum' order by `ID` desc";
                $resultbX1 = mysqli_query($conn,$sqlbX1) or die('Could not look up user data; ' . mysql_error());
                $rowbX1 = mysqli_fetch_array($resultbX1);

                $balanX1= $rowbX1['Balance'];
                $balX1=$balanX1-$applicationfee;

                $query_insertX1 = "Insert into `transactions` (`Account Number`,`Withdrawal`,`Transactor`,`Transactor Contact`,`Officer`,`Date`,`Transaction Type`,`Remark`,`Balance`,`Company`)
                    VALUES ('$acctnum','$applicationfee','Loan Application Fee Auto Transaction','','$officer','$date','Withdrawal','Loan Application Fee','$balX1','" .$_SESSION['company']. "')";
                $result_insertX1 = mysqli_query($conn,$query_insertX1);
               }

               if($processingfee>0)
               {
            
                    $query_insX2 = "Insert into `sundry` (`Amount`,`Note`,`Date`,`Source`,`Account Number`,`Officer`,`Type`,`Company`) 
                           VALUES ('$processingfee','Loan Processing Fee','$date','Loan Processing Fee','$acctnum','$officer','Income','" .$_SESSION['company']. "')";
                    $result_insX2 = mysqli_query($conn,$query_insX2);
                        
                    $sqlbX2="SELECT * FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctnum' order by `ID` desc";           
                    $resultbX2 = mysqli_query($conn,$sqlbX2) or die('Could not look up user data; ' . mysql_error());
                    $rowbX2 = mysqli_fetch_array($resultbX2);
            
                    $balanX2= $rowbX2['Balance'];
                    $balX2=$balanX2-$processingfee;           
            
                    $query_insertX2 = "Insert into `transactions` (`Account Number`,`Withdrawal`,`Transactor`,`Transactor Contact`,`Officer`,`Date`,`Transaction Type`,`Remark`,`Balance`,`Company`)
                           VALUES ('$acctnum','$processingfee','Loan Processing Fee Auto Transaction','','$officer','$date','Withdrawal','Loan Processing Fee','$balX2','" .$_SESSION['company']. "')"; 
                    $result_insertX2 = mysqli_query($conn,$query_insertX2);
               }

               if($insurancefee>0)
               {
                    $query_insX3 = "Insert into `sundry` (`Amount`,`Note`,`Date`,`Source`,`Account Number`,`Officer`,`Type`,`Company`)
                           VALUES ('$insurancefee','Loan Insurance Fee','$date','Loan Insurance Fee','$acctnum','$officer','Income','" .$_SESSION['company']. "')";            
                    $result_insX3 = mysqli_query($conn,$query_insX3);
            
                    $sqlbX3="SELECT * FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctnum' order by `ID` desc";
                    $resultbX3 = mysqli_query($conn,$sqlbX3) or die('Could not look up user data; ' . mysql_error());
                    $rowbX3 = mysqli_fetch_array($resultbX3);
             
                    $balanX3= $rowbX3['Balance'];
                    $balX3=$balanX3-$insurancefee;
            
                    $query_insertX3 = "Insert into `transactions` (`Account Number`,`Withdrawal`,`Transactor`,`Transactor Contact`,`Officer`,`Date`,`Transaction Type`,`Remark`,`Balance`,`Company`)
                      VALUES ('$acctnum','$insurancefee','Loan Insurance Fee Auto Transaction','','$officer','$date','Withdrawal','Loan Insurance Fee','$balX3','" .$_SESSION['company']. "')";
                    $result_insertX3 = mysqli_query($conn,$query_insertX3);
               }
                ###########################################################################################
                $sqlc="SELECT `Company Name`,`Email` FROM `company info` WHERE `Company Name` ='" .$_SESSION['company']. "'";
                $resultc = mysqli_query($conn,$sqlc) or die('Could not look up user data; ' . mysqli_error());
                $rowc = mysqli_fetch_array($resultc);
                $coy=$rowc['Company Name'];
                $imal=$rowc['Email'];
                
                $sql="SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Membership Number`='$acctnum'";
                $result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
                $row = mysqli_fetch_array($result);
                $sms=$row['SMS'];
                $emailalert=$row['email alert'];
                $email=$row['email'];
                $phon=$row['Contact Number'];
                $fname=$row['First Name'];
                $sname=$row['Surname'];
                $name= $fname . " " . $sname;

                ###
                if (!$sock=@fsockopen('www.google.com',80,$num,$error,5))
                { 
                  $ttval="No Internet Connection";
                } else {
                  ######email alert#######

                  //if ($emailalert==1)
                  {
                        if (Trim($email) != "")
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
                            
                              $ndate=date('Y-m-d');

                              $to      = $email; //'dejigegs@gmail.com';
                              $subject = 'Alert Notification';
                              $message = $COYname. " ALERT: " . $name . ", Your account loan of N" . $amount . " has been approved. Date: " . $ndate;
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
                        if($remark=="" or empty($remark))
                        {
                               $remark="***";
                        }
                        $msalt =$COYname. " ALERT: " . $name . ", Your account loan of N" . $amount . " has been approved. Date: " . $ndate . "\n";

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
                        } else {
                              echo "Error: URL could not be opened.";
                        }

                        #   echo "<br>"  ;
                        $time_end = microtime(true);
                        $time = $time_end - $time_start;

                        #echo "Finished in $time seconds\n";
                        ##########################
                        ###########################################################################################

                  }
            }     

      }  else if($aph=="X1X") {
            $query_update = "UPDATE `loan` SET `Approval Note`='$appnote' WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` =" .$loanid. " and `Account Number`='" .$acctnum. "'";   
            $result_update = mysqli_query($conn,$query_update);
               
      } else {
            $query_update = "UPDATE `loan` SET `Approval`='Denied',`Loan Status`='Denied' WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` =" .$loanid. " and `Account Number`='" .$acctnum. "'";
            $result_update = mysqli_query($conn,$query_update);
      }
      $tval="Your record has been updated.";
      header("location:loans.php?acctno=$acctnum&redirect=$redirect");
} else {

      $tval="Please enter Basic details before updating.";

      header("location:loans.php?redirect=$redirect");

}

?>