<?php
require_once 'conn.php';

//check to see if user has logged in with a valid password

@$Tit=$_SESSION['Tit'];
@$acctno=$_REQUEST['acctno'];
@$id=$_REQUEST['id'];
@$tval=$_REQUEST['tval'];
?>

<div class="div-table row">
<div class="tab-row" style="font-weight:bold;width:100%;height:3px;background-color:#ff0000">
    <div  class="cell" style='width:100%;background-color:#FF9999'></div>
</div>    
<div class="tab-row" style="font-weight:bold">
    <div  class="cell" style='width:16.66%;background-color:#FFEBEE'>Loan ID</div>
    <div  class="cell" style='width:16.66%;background-color:#FFEBEE'>Interest Rate / Type</div>
    <div  class="cell" style='width:16.66%;background-color:#FFEBEE'>Late Charges</div>
    <div  class="cell" style='width:16.66%;background-color:#FFEBEE'>Duration</div>
    <div  class="cell" style='width:16.66%;background-color:#FFEBEE'># of Payments</div>
    <div  class="cell" style='width:16.66%;background-color:#FFEBEE'>Per. Repayment</div>
</div>
<div class="tab-row">
     <div class="cell" style="width:16.66%;background-color:#"><?php echo $row['Loan No']; ?></div>
     <div class="cell" style="width:16.66%"><?php echo $row['Interest Rate'] . " / ". $row['Payment Type']; ?></div>
     <div class="cell" style="width:16.66%"><?php echo $row['Late Rate']; ?></div>
     <div class="cell" style="width:16.66%"><?php echo $row['Loan Duration']; ?></div>
     <div class="cell" style="width:16.66%"><?php echo number_format($row['No of Payment']); ?></div>
     <div class="cell" style="width:16.66%"><?php echo number_format($row['Periodic Repayment'],2); ?></div>
</div>     

<?php
if($row['Payment Frequency']=="Daily")
{
  $perr="Daily"
?>
<div class="tab-row" style="font-weight:bold">
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'><?php echo $perr;?> Interest</div>
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'><?php echo $perr;?> Principal</div>
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'><?php echo $perr;?> Total Repay</div>
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'>Total Interest</div>
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'>Interest To-Date</div>
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'>Principal To-Date</div>
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'>Total To-Date</div>
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'>Balance Left</div>
</div>
<div class="tab-row">
     <div class="cell" style="width:12.5%;"><?php echo number_format($row['Daily Interest'],2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format($row['Daily Principal'],2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format($row['Daily Repay'],2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format($row['Total Interest'],2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format($row['Interest toDate'],2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format($row['PPayment todate'],2); ?></div>

     <div class="cell" style="width:12.5%"><?php echo number_format($row['Payment todate'],2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format($row['Balance'],2); ?></div>
</div>     
<?php
}
if($row['Payment Frequency']=="Monthly")
{
   $perr="Monthly"
?>
<div class="tab-row" style="font-weight:bold">
    <div  class="cell" style='width:12.5%;background-color:#FFEBE5'><?php echo $perr;?> Interest</div>
    <div  class="cell" style='width:12.5%;background-color:#FFEBE5'><?php echo $perr;?> Principal</div>
    <div  class="cell" style='width:12.5%;background-color:#FFEBE5'><?php echo $perr;?> Total Repay</div>
    <div  class="cell" style='width:12.5%;background-color:#FFEBE5'>Total Interest</div>
    <div  class="cell" style='width:12.5%;background-color:#FFEBE5'>Interest To-Date</div>
    <div  class="cell" style='width:12.5%;background-color:#FFEBE5'>Principal To-Date</div>
    <div  class="cell" style='width:12.5%;background-color:#FFEBE5'>Total To-Date</div>
    <div  class="cell" style='width:12.5%;background-color:#FFEBE5'>Balance Left</div>
</div>
<div class="tab-row">
     <div class="cell" style="width:12.5%;"><?php echo number_format($row['Monthly Interest'],2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format($row['Monthly Principal'],2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format($row['Periodic Repayment'],2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format($row['Total Interest'],2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format($row['Interest toDate'],2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format($row['PPayment todate'],2); ?></div>

     <div class="cell" style="width:12.5%"><?php echo number_format($row['Payment todate'],2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format($row['Balance'],2); ?></div>
</div>     
<?php
}
if($row['Payment Frequency']=="Weekly")
{
   $perr="Weekly"
?>
<div class="tab-row" style="font-weight:bold">
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'><?php echo $perr;?> Interest</div>
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'><?php echo $perr;?> Principal</div>
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'><?php echo $perr;?> Total Repay</div>
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'>Total Interest</div>
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'>Interest To-Date</div>
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'>Principal To-Date</div>
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'>Total To-Date</div>
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'>Balance Left</div>
</div>
<div class="tab-row">
     <div class="cell" style="width:12.5%;"><?php echo number_format($row['Monthly Interest']/4,2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format($row['Monthly Principal'],2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format(($row['Monthly Principal']+$row['Monthly Interest']/4),2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format($row['Total Interest'],2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format($row['Interest toDate'],2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format($row['PPayment todate'],2); ?></div>

     <div class="cell" style="width:12.5%"><?php echo number_format($row['Payment todate'],2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format($row['Balance'],2); ?></div>
</div>     
<?php
}
if($row['Payment Frequency']=="Quarterly")
{
   $perr="Quarterly"
?>
<div class="tab-row" style="font-weight:bold">
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'><?php echo $perr;?> Interest</div>
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'><?php echo $perr;?> Principal</div>
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'><?php echo $perr;?> Total Repay</div>
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'>Total Interest</div>
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'>Interest To-Date</div>
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'>Principal To-Date</div>
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'>Total To-Date</div>
    <div  class="cell" style='width:12.5%;background-color:#F3E5F5'>Balance Left</div>
</div>
<div class="tab-row"> 
     <div class="cell" style="width:12.5%;"><?php echo number_format($row['Monthly Interest']*3,2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format($row['Monthly Principal'],2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format(($row['Monthly Principal']+$row['Monthly Interest']*3),2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format($row['Total Interest'],2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format($row['Interest toDate'],2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format($row['PPayment todate'],2); ?></div>

     <div class="cell" style="width:12.5%"><?php echo number_format($row['Payment todate'],2); ?></div>
     <div class="cell" style="width:12.5%"><?php echo number_format($row['Balance'],2); ?></div>
</div>     
<?php
}
?>
</div>