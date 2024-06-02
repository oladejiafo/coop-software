<frameset cols="50%,50%">
  <frame src="attendance.php">
  <frameset rows="150,150">
    <frame src="loans.php">
    <frame src="closure.php">
  </frameset>      
</frameset>
<?php
                        $msalt ="Tester ALERT: Tester, Your account loan of N" . $amount . " has been approved. Date: " . $ndate . "\n";

                        ########SMSLIVE247#######
                        /* Variables with the values to be sent. */
                        $owneremail="SUMMERGREEN"; //"odion.e@summergreenng.com";
                        $subacctpwd="Walter001";
                        $sender="SUMMERGREEN";  
                        $sendto="08176338506"; /* destination number */

                        $message=$msalt;
                        /* message to be sent */

echo                        $url = "https://smsclone.com/api/sms/sendsms?"
                            . "username=" .$owneremail
                            . "&password=" .$subacctpwd
                            . "&sender=@@" .$sender. "@@"
                            . "&recipient=@@" .$sendto. "@@"
                            . "&message=@@" .$message. "@@";

                        /*
                        $url = "http://www.smslive247.com/http/index.aspx?"
                         . "cmd=sendquickmsg"
                         . "&owneremail=" . UrlEncode($owneremail)
                         . "&subacct=" . UrlEncode($subacct)
                         . "&subacctpwd=" . UrlEncode($subacctpwd)
                         . "&sendto=" . UrlEncode($sendto)
                         . "&message=" . UrlEncode($message)
                         . "&sender=" . UrlEncode($sender);

                         */
                        /* call the URL */
                        /*
                        $time_start = microtime(true);
                        if ($f = @fopen($url, "r"))
                        {
                              $answer = fgets($f, 255);
                              echo "[$answer]";
                        } else {
                              echo "Error: URL could not be opened.";
                        }
                        */

?>