<?php
@session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
 if ($_SESSION['access_lvl'] != 1  & $_SESSION['access_lvl'] != 6 & $_SESSION['access_lvl'] !=11 & $_SESSION['access_lvl'] !=111 & $_SESSION['access_lvl'] !=1111 & $_SESSION['access_lvl'] !=11111 & $_SESSION['access_lvl'] 
!= 2 & $_SESSION['access_lvl'] != 22 & $_SESSION['access_lvl'] != 44 & $_SESSION['access_lvl'] != 4){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");

$cmbFilter="None";
$filter="";
}
}

 require_once 'conn.php';


 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];
 $code=$_REQUEST["code"];
 $mon=$_REQUEST["mon"];
 $yea=$_REQUEST["yea"];

$sqr="SELECT * FROM `company info` WHERE `Company Name` ='" .$_SESSION['company']. "'";
$reslt = mysql_query($sqr,$conn) or die('Could not look up user data; ' . mysql_error());
$rw = mysql_fetch_array($reslt);
$coy=$rw['Company Name'];
$ady=$rw['Address'];
$phn=$rw['Phone'];
$city=$rw['City'];
$web=$rw['Website'];
$cnt=$rw['Country'];
$em=$rw['Email'];

 $ddate=date('F, Y');

require('fpdf.php');
 
class PDF extends FPDF
{
//Page header
function Header()
{
    //Logo
    $this->Image('images/logo.png',10,8,22);
    //Arial bold 15
    $this->SetFont('Arial','B',20);
    //Move to the right
    $this->Cell(80);
    //Title
    $this->Cell(30,15,'REGENIX HEALTHCARE SERVICES LTD',0,0,'C');
    //Line break
    $this->Ln(10);
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Sub Title
    $this->Cell(180,15,'PROVIDER ENROLLEE REPORT',0,0,'C');
    //Line break
    $this->Ln(15);
    //Sub Title1
    $this->Cell(180,10,'ENROLLEE COVERAGE FOR THE MONTH OF '. date('F, Y'),0,0,'C');
    //Line break
    $this->Ln(20);
}
 
//Page footer
function Footer()
{
    //Position at 1.5 cm from bottom
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

}

   $queryi="SELECT `Code`,`Name`,`Email` FROM `hregister` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Name` like '" . trim($filter) . "%' order by `Code`,`Name`";
   $resulti=mysql_query($queryi);
   while(list($codi,$provi,$imail)=mysql_fetch_row($resulti))
   {

//Instanciation of inherited class
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);

$pdf->Cell(50,8,$provi,0,1,C); // First header column 

$width_cell=array(10,30,20,30,30,20,20,30);
$pdf->SetFillColor(193,229,252); // Background color of header 
// Header starts /// 
$pdf->Cell($width_cell[0],10,'S/No',1,0,C,true); // First header column 
$pdf->Cell($width_cell[1],10,'Organization',1,0,C,true); // Second header column
$pdf->Cell($width_cell[2],10,'Enrollee ID',1,0,C,true); // Third header column 
$pdf->Cell($width_cell[3],10,'Surname',1,0,C,true); // Fourth header column
$pdf->Cell($width_cell[4],10,'Othernames',1,0,C,true); // Fifth header column
$pdf->Cell($width_cell[5],10,'Sex',1,0,C,true); // Sixth header column
$pdf->Cell($width_cell[6],10,'M. Status',1,0,C,true); // Seventh header column
$pdf->Cell($width_cell[7],10,'Plan Type',1,1,C,true); // Eightth header column
//// header is over ///////

$pdf->SetFont('Times','',12);

   $query="SELECT `Code`,`Name`,`Family Name`,`Company`,`HCP Name`,`Sex`,`Plan`,`Marital Status` FROM `eregister` WHERE `Company` ='" .$_SESSION['company']. "' AND  `HCP Name` like '%" . trim($provi) . "%' and Status='Active' order by `Code`,`Name`";
   $result=mysql_query($query);
$provi=$provi;
$sn=0;
    while(list($code,$name,$sname,$org,$hcprov,$sex,$plan,$mstat)=mysql_fetch_row($result))
    {
$sn=$sn+1;
$pdf->SetFont('Arial','',10);
// First row of data 
$pdf->Cell($width_cell[0],10,$sn,1,0,C,false); // First column of row 1 
$pdf->Cell($width_cell[1],10,$org,1,0,C,false); // Second column of row 1 
$pdf->Cell($width_cell[2],10,$code,1,0,C,false); // Third column of row 1 
$pdf->Cell($width_cell[3],10,$sname,1,0,C,false); // Fourth column of row 1 
$pdf->Cell($width_cell[4],10,wordwrap($name),1,0,C,false); // Fifth header column
$pdf->Cell($width_cell[5],10,$sex,1,0,C,false); // Sixth header column
$pdf->Cell($width_cell[6],10,$mstat,1,0,C,false); // Seventh header column
$pdf->Cell($width_cell[7],10,$plan,1,1,C,false); // Eightth header column
    }
$provi=$provi;
}
$queryii="SELECT `Code`,`Name`,`Email` FROM `hregister` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Name` like '" . trim($filter) . "%' order by `Code`,`Name`";
$resultii=mysql_query($queryii);
$rowii = mysql_fetch_array($resultii);
$phcp=$rowii['Name'];
$iimail=$rowii['Email'];
//$pdf->Output();

$myfile="enrolleepdf_".$phcp.date('Ym').".pdf";
$filename="temp/enrolleepdf_".$phcp.date('Ym').".pdf";
$pdf->Output($filename, 'F');
#########################################################
function mail_attachment($myfile, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message) {
    $file = $filename;
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $header = "From: ".$from_name." <".$from_mail.">\r\n";
    $header .= "Reply-To: ".$replyto."\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header .= $message."\r\n\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-Type: application/octet-stream; name=\"".$myfile."\"\r\n"; // use different content types here
    $header .= "Content-Transfer-Encoding: base64\r\n";
    $header .= "Content-Disposition: attachment; filename=\"".$myfile."\"\r\n\r\n";
    $header .= $content."\r\n\r\n";
    $header .= "--".$uid."--";
    if (mail($mailto, $subject, "", $header)) {
        echo "mail send ... OK"; // or use booleans here
    } else {
        echo "mail send ... ERROR!";
    }
}

//start editing and inputting attachment details here
$my_file = "enrolleepdf_".$provi.date('Ym').".pdf";
$my_path = "temp/";
$my_name = "Regenix Healthcare Services";

$my_mail = "admin@regenixhealthcare.com";

$my_replyto = "admin@regenixhealthcare.com";

$my_subject = 'RE: Enrollee List for ' . date('F, Y');

$my_message = "Hello,\r\nFind Attached Your Enrollee List for the month.\r\n\r\nRegenix HMO";

mail_attachment($my_file, $my_path, $iimail, $my_mail, $my_name, $my_replyto, $my_subject, $my_message);
?>
</div>
