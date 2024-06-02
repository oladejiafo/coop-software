<?php
$to      = 'dejigegs@gmail.com';
$subject = 'Re: Tester';
$message = 'If we can read this, it means that our fake Sendmail setup works!';
$headers = 'From: dejigegs@gmail.com' . "\r\n" .
           'Reply-To: dejigegs@gmail.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers)) {
    echo 'Email sent successfully!';
} else {
    die('Failure: Email was not sent!');
}

########SMSLIVE247#######
/* Variables with the values to be sent. */

$owneremail="daudax.bashorun@gmail.com";
$subacct="IBBDS CONSULTINGx"; /*IBBDs Consulting*/
$subacctpwd="07053737888x"; /*07039220512 */
$sendto="08023868198x"; /* destination number */
$sender="IBBDSx"; /* sender id */
$message="testingx";
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
#echo "Error: URL could not be opened.";
}
#   echo "<br>"  ;
$time_end = microtime(true);
$time = $time_end - $time_start;

#echo "Finished in $time seconds\n";
##########################
?>