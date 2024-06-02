<?php
if (strlen($acctno)>0 OR strlen($acctn)>0) 
{

 $queryxpx = "SELECT `ID`,`Payment Frequency` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='" . $acctno . "' order by `ID` desc limit 0,1";

 $resultxpx=mysqli_query($conn,$queryxpx);
 $rowxpx = mysqli_fetch_array($resultxpx);
 $mn=$rowxpx['Payment Frequency'];
if ($acctno && $mn=="Monthly")
{

 $xin=$row['No of Payment'];
 $cmail=$row2['email'];
 $cname=$row2['First Name'] . " " . $row2['Surname'];
?>

<fieldset>

<legend><b><font color='#FF0000' style='font-size: 12pt'>PAYMENT PLAN</font></b></legend>
<div class="tab-row" style="font-weight:bold;width:100%;height:3px;background-color:#ff0000">
    <div  class="cell" style='width:100%;;background-color:maroon'></div>
</div>    
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell" style='width:5%;background-color:#cbd9d9'>No</div>
    <div  class="cell" style='width:20%;background-color:#cbd9d9'>Date</div>
    <div  class="cell" style='width:20%;background-color:#cbd9d9'>Principal</div>
    <div  class="cell" style='width:20%;background-color:#cbd9d9'>Interest</div>
    <div  class="cell" style='width:20%;background-color:#cbd9d9'>Payment</div>
    <div  class="cell" style='width:15%;background-color:#cbd9d9'>
<?php
echo "<a target='blank' href='planpdf.php?acctno=$acctno'><font style='color:#ff0000'><b> Export to PDF </b></font></a> &nbsp;";
/*
if($cmail !="")
{
 echo "<a target='blank' href='planpdftomail.php?acctno=$acctno'><font style='color:#ff0000'><b> Email to Customer</b></font></a>";
}
*/ 
?>
    </div>
  </div>
<?php


   $queryxp = "SELECT `ID`,`Loan Date`,`Loan Amount`,`Loan Duration`,`Monthly Interest`,`Monthly Principal` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='" . $acctno . "' order by `ID` desc limit 0,1";
   $resultxp=mysqli_query($conn,$queryxp);

    while(list($xid,$xdate,$xamount,$xnpay,$xmintr,$xmprinc)=mysqli_fetch_row($resultxp))
    {

        echo '
        <div class="tab-row">
          <div class="cell" style="width:100%">
           <h5> <b>Loan Date:</b> ' .date('d F, Y', strtotime($xdate)). '; <b>Loan Given:</b> ' .number_format($xamount,2). '; <b>Total Repayment:</b> ' .number_format($xamount + ($xmintr * $xnpay),2). '</h5>
          </div>
        </div>';

      for($xx=1; $xx <= $xnpay; $xx++)
      {
        $xdate=date('Y-m-d', strtotime('+1 month',strtotime($xdate)));
        $xtot=$xmintr + $xmprinc;
        #$amt=number_format($amount,2);

        echo '
        <div class="tab-row">
         <div class="cell" style="width:5%">' .$xx. '</div>
         <div class="cell" style="width:20%">' .date('d F, Y', strtotime($xdate)). '</div>
         <div class="cell" style="width:20%">' .number_format($xmprinc,2). '</div>
         <div class="cell" style="width:20%">' .number_format($xmintr,2). '</div>
         <div class="cell" style="width:20%">' .number_format($xtot,2). '</div>
         <div class="cell" style="width:15%">&nbsp;</div>';
        echo '</div>'; 
      }

    }
}
?>
</fieldset>
<?php
 }
 ?>