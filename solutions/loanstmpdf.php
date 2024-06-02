<?php
@session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 2) & ($_SESSION['access_lvl'] != 6) & ($_SESSION['access_lvl'] != 4) & ($_SESSION['access_lvl'] != 3))
{
 if ($_SESSION['access_lvl'] != 5){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");

}

 require_once 'conn.php';

 @$idd=$_REQUEST["idd"];
 @$acctno=$_REQUEST["acctno"];
 @$datex=$_REQUEST["datex"];
 @$trans=$_REQUEST["trans"];
 $Filter=$_REQUEST["Filter"];
 @$Filter2=$_REQUEST["Filter2"];
if($Filter=="" OR empty($Filter))
{
  $Filter="2017-01-01";
}
if($Filter2=="" OR empty($Filter2))
{
  $Filter2=date('Y-m-d');
}

$sqr="SELECT * FROM `company info` WHERE `Company Name` ='" .$_SESSION['company']. "'";
$reslt = mysqli_query($conn,$sqr) or die('Could not look up user data; ' . mysqli_error());
$rw = mysqli_fetch_array($reslt);
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
    $this->Image('images/logo2.jpg',10,10,35);
    //Arial bold 15
    $this->SetFont('Arial','B',20);
    //Move to the right
    $this->Cell(80);
    //Title
    $this->Cell(30,15,'LOAN STATEMENT',0,0,'C');
    //Line break
    $this->Ln(25);
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

$sql="SELECT * FROM `loan payment` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID`='$idd'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);

$sql2="SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Membership Number`='$acctno'";
$result2 = mysqli_query($conn,$sql2) or die('Could not look up user data; ' . mysqli_error());
$row2 = mysqli_fetch_array($result2); 

$sql3="SELECT * FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno'";
$result3 = mysqli_query($conn,$sql3) or die('Could not look up user data; ' . mysqli_error());
$row3 = mysqli_fetch_array($result3);



$fname=$row2['First Name'];
$sname=$row2['Surname'];
$acctnum=$row2['Account Number'];
$ltype=$row3['Loan Type'];
$lstatus=$row3['Loan Status'];

$lamount=number_format($row3['Loan Amount'],2);
$lbal=number_format($row3['Balance'],2);
$ldur=number_format($row3['Loan Duration'],2);

$nami=strtoupper($fname . " " . $sname);
$durr="LOAN STATEMENT FROM: " . date('d F, Y',strtotime($Filter)). " TO: " .date('d F, Y',strtotime($Filter2));

//Instanciation of inherited class
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->SetFont('Times','B',11);
$pdf->Cell(150,15,$durr,0,1,C,false); // First header column 

$pdf->SetFont('Times','',11);
$width_cell=array(35,35,20,35,30);
$pdf->Cell($width_cell[0],5,'Firstname:',0,0,L,false); // First header column 
$pdf->Cell($width_cell[1],5,$fname,0,0,R,false); // Second header column
$pdf->Cell($width_cell[2],5,'',0,0,C,false); // Second header column
$pdf->Cell($width_cell[3],5,'Surname:',0,0,L,false); // First header column 
$pdf->Cell($width_cell[4],5,$sname,0,1,R,false); // Second header column

$pdf->Cell($width_cell[0],5,'Account Number:',0,0,L,false); // First header column 
$pdf->Cell($width_cell[1],5,$acctnum,0,0,R,false); // Second header column
$pdf->Cell($width_cell[2],5,'',0,0,C,false); // Second header column
$pdf->Cell($width_cell[3],5,'Loan Type:',0,0,L,false); // First header column 
$pdf->Cell($width_cell[4],5,$ltype,0,1,R,false); // Second header column

$pdf->Cell($width_cell[0],5,'Loan Status:',0,0,L,false); // First header column 
$pdf->Cell($width_cell[1],5,$lstatus,0,0,R,false); // Second header column
$pdf->Cell($width_cell[2],5,'',0,0,C,false); // Second header column
$pdf->Cell($width_cell[3],5,'Total Loan:',0,0,L,false); // First header column 
$pdf->Cell($width_cell[4],5,$lamount,0,1,R,false); // Second header column

$pdf->Cell($width_cell[0],5,'Balance Left:',0,0,L,false); // First header column 
$pdf->Cell($width_cell[1],5,$lbal,0,0,R,false); // Second header column
$pdf->Cell($width_cell[2],5,'',0,0,C,false); // Second header column
$pdf->Cell($width_cell[3],5,'Loan Duration:',0,0,L,false); // First header column 
$pdf->Cell($width_cell[4],5,$ldur,0,1,R,false); // Second header column

$pdf->SetFont('Times','B',11);
$width_cell=array(30,45,45,45);
$pdf->SetFillColor(193,229,252); // Background color of header 
// Header starts /// 

$pdf->Cell(90,20,'LOAN PAYMENTS',0,0,L); // First header column 
$pdf->Ln(1);

$pdf->Cell($width_cell[0],10,'S/No',1,0,C,true); // First header column 
$pdf->Cell($width_cell[1],10,'Payment Date',1,0,C,true); // Second header column
$pdf->Cell($width_cell[2],10,'Payment Amount',1,0,R,true); // Third header column 
$pdf->Cell($width_cell[3],10,'Payment-To-Date',1,1,R,true); // Fourth header column
//// header is over ///////

$pdf->SetFont('Times','',12);
   $queryxp = "SELECT `ID`,`Date`,`Account Number`,`Amount` FROM `loan payment` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='" . $acctno . "' and (`Date` between '" . $Filter . "' and '" . $Filter2 . "') order by `ID` desc";

   $resultxp=mysqli_query($conn,$queryxp);


$i=0;
$ptd=0;
$samt=0;
    while(list($idd,$date,$acctn,$amt)=mysqli_fetch_row($resultxp))
    {
     $ptd=$ptd+$amt;
     $samt=$samt+$amt;
     $amt=number_format($amt,2);
     $ptd=number_format($ptd,2);
     $i=$i+1;

$pdf->SetFont('Arial','',10);
// First row of data 
$pdf->Cell($width_cell[0],10,$i,1,0,C,false); // First column of row 1 
$pdf->Cell($width_cell[1],10,$date,1,0,C,false); // Second column of row 1 
$pdf->Cell($width_cell[2],10,$amt,1,0,R,false); // Third column of row 1 
$pdf->Cell($width_cell[3],10,$ptd,1,1,R,false); // Fourth column of row 1 
}
$samt=number_format($samt,2);
$pdf->Cell($width_cell[0],10,'',1,0,C,false); // First column of row 1 
$pdf->Cell($width_cell[1],10,'',1,0,C,false); // Second column of row 1 
$pdf->Cell($width_cell[2],10,$samt,1,0,R,false); // Third column of row 1 
$pdf->Cell($width_cell[3],10,'',1,1,R,false); // Fourth column of row 1 

}
$pdf->Output();

?>
</div>
