<?php
@session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
 if ($_SESSION['access_lvl'] != 3  & $_SESSION['access_lvl'] != 6 & $_SESSION['access_lvl'] != 4){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");

$cmbFilter="None";
$filter="";
}
}

 require_once 'conn.php';


 $acctno=$_REQUEST["acctno"];

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
    $this->Cell(30,15,'PAYMENT PLAN',0,0,'C');
    //Line break
    $this->Ln(18);

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

   $queryi="SELECT `Surname`,`First Name`,`email`,`Contact Number`,`Bank Account Name`,`Bank Name`,`Bank Account Number` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Membership Number` = '" . trim($acctno) . "' order by `ID`";
   $resulti=mysqli_query($conn,$queryi);
   while(list($snami,$fnami,$emaili,$foni,$oacctname,$obankname,$oacctnum)=mysqli_fetch_row($resulti))
   {
   $sql = "SELECT `ID`,`Loan Date`,`Loan Amount`,`Loan Requested`,`Loan Duration`,`Monthly Interest`,`Interest Rate`,`Monthly Principal` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='" . $acctno . "' order by `ID` desc limit 0,1";


   $result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());

   $row = mysqli_fetch_array($result);

$lamount=number_format($row['Loan Amount'],2);
$lramount=number_format($row['Loan Requested'],2);
$lirate=number_format($row['Interest Rate'],2);
$ldur=number_format($row['Loan Duration'],2);
$ltotpay=number_format(($row['Monthly Interest'] + $row['Monthly Principal']) *$row['Loan Duration'],2);
$lmtotpay=number_format($row['Monthly Interest'] + $row['Monthly Principal'],2);

$nami=strtoupper($fnami . " " . $snami);

//Instanciation of inherited class
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Times','B',11);
$pdf->Cell(90,20,$nami,0,0,L); // First header column 
$pdf->Cell(50,20,'Account No: ' .$acctno,0,1,L); // Second header column 
$pdf->Ln(1);

$pdf->SetFont('Times','',11);
$width_cell=array(35,35,20,35,30);
$pdf->Cell($width_cell[0],5,'Disbursement Amt:',0,0,L,false); // First header column 
$pdf->Cell($width_cell[1],5,$lamount,0,0,R,false); // Second header column
$pdf->Cell($width_cell[2],5,'',0,0,C,false); // Second header column
$pdf->Cell($width_cell[3],5,'Total Repayment:',0,0,L,false); // First header column 
$pdf->Cell($width_cell[4],5,$ltotpay,0,1,R,false); // Second header column

$pdf->Cell($width_cell[0],5,'Loan Amt Requested:',0,0,L,false); // First header column 
$pdf->Cell($width_cell[1],5,$lramount,0,0,R,false); // Second header column
$pdf->Cell($width_cell[2],5,'',0,0,C,false); // Second header column
$pdf->Cell($width_cell[3],5,'Monthly Repayment:',0,0,L,false); // First header column 
$pdf->Cell($width_cell[4],5,$lmtotpay,0,1,R,false); // Second header column

$pdf->Cell($width_cell[0],5,'Monthly Interest Rate:',0,0,L,false); // First header column 
$pdf->Cell($width_cell[1],5,$lirate,0,0,R,false); // Second header column
$pdf->Cell($width_cell[2],5,'',0,0,C,false); // Second header column
$pdf->Cell($width_cell[3],5,'Email:',0,0,L,false); // First header column 
$pdf->Cell($width_cell[4],5,$emaili,0,1,R,false); // Second header column

$pdf->Cell($width_cell[0],5,'Pay Duration (Months):',0,0,L,false); // First header column 
$pdf->Cell($width_cell[1],5,$ldur,0,0,R,false); // Second header column
$pdf->Cell($width_cell[2],5,'',0,0,C,false); // Second header column
$pdf->Cell($width_cell[3],5,'Phone:',0,0,L,false); // First header column 
$pdf->Cell($width_cell[4],5,$foni,0,1,R,false); // Second header column

$pdf->SetFont('Times','B',11);
$width_cell=array(35,10,28,33,28,28,28);
$pdf->SetFillColor(193,229,252); // Background color of header 
// Header starts /// 
$pdf->Cell($width_cell[0],10,'DATE',1,0,C,true); // First header column 
$pdf->Cell($width_cell[1],10,'NO',1,0,C,true); // Second header column
$pdf->Cell($width_cell[2],10,'TYPE',1,0,C,true); // Third header column 
$pdf->Cell($width_cell[3],10,'INSTALLATION',1,0,C,true); // Fourth header column
$pdf->Cell($width_cell[4],10,'PRINCIPAL',1,0,C,true); // Fifth header column
$pdf->Cell($width_cell[5],10,'INTEREST',1,0,C,true); // Sixth header column
$pdf->Cell($width_cell[6],10,'BALANCE',1,1,C,true); // Seventh header column
//// header is over ///////

$pdf->SetFont('Times','',12);
   $queryxp = "SELECT `ID`,`Loan Date`,`Loan Amount`,`Loan Duration`,`Monthly Interest`,`Monthly Principal` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='" . $acctno . "' order by `ID` desc limit 0,1";

   $resultxp=mysqli_query($conn,$queryxp);




    while(list($xid,$xdati,$xamount,$xnpay,$xmintr,$xmprinc)=mysqli_fetch_row($resultxp))
    {
$xdate=$xdati;
$xxdati=date('d F, Y', strtotime($xdati));
$xxintr=number_format(($xmintr * $xnpay),2);
$xxamount=number_format($xamount,2);
$xbal=number_format($xamount + ($xmintr * $xnpay),2);
$balli=$xamount + ($xmintr * $xnpay);
$pdf->SetFont('Arial','',10);
// First row of data 
$pdf->Cell($width_cell[0],10,$xxdati,1,0,L,false); // First column of row 1 
$pdf->Cell($width_cell[1],10,'-',1,0,C,false); // Second column of row 1 
$pdf->Cell($width_cell[2],10,'Disbursement',1,0,C,false); // Third column of row 1 
$pdf->Cell($width_cell[3],10,$xxamount,1,0,R,false); // Fourth column of row 1 
$pdf->Cell($width_cell[4],10,$xxamount,1,0,R,false); // Fifth header column
$pdf->Cell($width_cell[5],10,$xxintr,1,0,R,false); // Sixth header column
$pdf->Cell($width_cell[6],10,$xbal,1,1,R,false); // Seventh header column
$balix=$balli;
      for($xx=1; $xx <= $xnpay; $xx++)
      {
        $xdate=date('Y-m-d', strtotime('+1 month',strtotime($xdate)));
        $xtot=$xmintr + $xmprinc;
        #$amt=number_format($amount,2);
$xxdate=date('d F, Y', strtotime($xdate));
$xxmprinc=number_format($xmprinc,2);
$xxmintr=number_format($xmintr,2);
$xxtot=number_format($xtot,2);
$balix=$balix-$xtot;
$xxbal=number_format($balix,2);

$pdf->SetFont('Arial','',10);
// First row of data 
$pdf->Cell($width_cell[0],10,$xxdate,1,0,L,false); // First column of row 1 
$pdf->Cell($width_cell[1],10,$xx,1,0,C,false); // Second column of row 1 
$pdf->Cell($width_cell[2],10,'Repayment',1,0,C,false); // Third column of row 1 
$pdf->Cell($width_cell[3],10,$xxtot,1,0,R,false); // Fourth column of row 1 
$pdf->Cell($width_cell[4],10,$xxmprinc,1,0,R,false); // Fifth header column
$pdf->Cell($width_cell[5],10,$xxmintr,1,0,R,false); // Sixth header column
$pdf->Cell($width_cell[6],10,$xxbal,1,1,R,false); // Seventh header column
    }

$pdf->SetFont('Times','B',11);
$pdf->Cell(60,10,'NOTE: TERMS & CONDITIONS',0,1,C,false); // First header column 

$pdf->SetFont('Times','B',10);
$note1="Any monthly default attracts additional 3% interest, (every seven days) on the oustanding balance for that month.";
$pdf->Cell(175,3,$note1,0,1,L,false); // First header column 

$pdf->SetFont('Times','',9);
$note2="Example: If you are expected to pay N30,500 (on N100,000) by the end of the month and you failed to pay, 3% interest ";
$note21="will be added for the next 7 days. Which means your new outstanding balance will be N30,500 + N915 = N31,415. Should you fail ";
$note22="again to pay within 7 days, another 3% will be added to the new outstanding balance, which will now be N3,357.45.";
$pdf->Cell(160,5,$note2,0,1,L,false); // First header column 
$pdf->Cell(172,5,$note21,0,1,L,false); // First header column 
$pdf->Cell(155,5,$note22,0,1,L,false); // First header column  
 
$pdf->SetFont('Times','B',8);
$note3="IF YOU REPLY TO THIS MAIL, IT WILL BE ASSUMED THAT YOU AGREE TO ALL TERMS AND CONDITIONS AS REGARDS THIS LOAN.";
$pdf->Cell(185,10,$note3,0,1,C,false); // First header column 

/*
$pdf->SetFont('Times','',11);
$pdf->Cell(55,10,'All repayments should be made to:',0,1,C,false); // First header column 
$pdf->SetFont('Times','B',10);
$width_cell=array(50,20,40,30);
$pdf->Cell($width_cell[0],5,'LLOYDINS ENTERPRISES',0,0,L,false); // First header column 
$pdf->Cell($width_cell[1],5,'',0,0,L,false); // Second header column
$pdf->Cell($width_cell[2],5,'Your Acct Name:',0,0,L,false); // Second header column
$pdf->Cell($width_cell[3],5,$oacctname,0,1,L,false); // Second header column

$pdf->Cell($width_cell[0],5,'GTBank',0,0,L,false); // First header column 
$pdf->Cell($width_cell[1],5,'',0,0,L,false); // Second header column
$pdf->Cell($width_cell[2],5,'Your Bank Name:',0,0,L,false); // Second header column
$pdf->Cell($width_cell[3],5,$obankname,0,1,L,false); // Second header column

$pdf->Cell($width_cell[0],5,'Acct Num: 0156520251',0,0,L,false); // First header column 
$pdf->Cell($width_cell[1],5,'',0,0,L,false); // Second header column
$pdf->Cell($width_cell[2],5,'Your Acct Num:',0,0,L,false); // Second header column
$pdf->Cell($width_cell[3],5,$oacctnum,0,1,L,false); // Second header column
*/
 }
}
$pdf->Output();

?>
</div>
