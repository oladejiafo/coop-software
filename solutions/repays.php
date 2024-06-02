<?php
if (strlen($acctno)>0 OR strlen($acctn)>0) 
{
?>
<fieldset>
<legend><b><font color='#669933' style='font-size: 12pt'>RE-PAYMENTS</font></b></legend>

<?php

 $tval=$_GET['tval'];

   $query_count = "SELECT * FROM `loan payment` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='" . $acctno . "' and `Loan ID` = '" . $row['ID'] . "'";
   $result_count   = mysqli_query($conn,$query_count);
   $totalrows  = mysqli_num_rows($result_count);

?>
<div class="tab-row" style="font-weight:bold;width:100%;height:3px;background-color:#ff0000">
    <div  class="cell" style='width:100%;;background-color:#66CC99'></div>
</div>    
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell" style='width:33.3%;background-color:#99cccc'>S/No</div>
    <div  class="cell" style='width:33.3%;background-color:#99cccc'>Date</div>
    <div  class="cell" style='width:33.3%;background-color:#99cccc'>Amount </div>
  </div>

<?php

   $query = "SELECT `ID`,`Date`,`Amount`,`Account Number`,`Loan ID` FROM `loan payment` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='" . $acctno . "' and `Loan ID` = '" . $row['ID'] . "' order by `ID` desc";
   $resultp=mysqli_query($conn,$query);


$i=0;

    while(list($id,$date,$amount,$acct,$loanid)=mysqli_fetch_row($resultp))

    {

     $amt=number_format($amount,2);

     $i=$i+1;

     echo '

        <div class="tab-row">
 
        <div  class="cell" style="width:33.3%">' .$i. '</div>

        <div  class="cell" style="width:33.3%"><a href = "loans.php?id=' . $id . '&acctno=' .$acct. '&loanidd=' .$row[ID]. '&edit=2">' .$date. '</a></div>

        <div  class="cell" style="width:33.3%">' .$amount. '</div>

      </div>';

       $totalamt += $amount;

    }

    $totalamt=number_format($totalamt,2);

     
echo '	
        
<div class="tab-row">

        <div  class="cell" style="width:66.6%;background-color:#cbd9d9"><b>TOTAL</b></div>

        <div  class="cell" style="width:33.3%;background-color:#cbd9d9">' .$totalamt. '</div>

      </div>';

if($edit != 4 and $edit != 3 and $edit != 2 and $edit != 1) { 
     echo '
        <div class="tab-row" style="height:63px">
        <div align="center" class="cell" style="width:50%;height:60px">
         <h5 align="center" style="color:#fff;background-color:#009999; width:170px; height:35px;padding-top:10px"><a title="This will allow you to manually make repayment" href = "loans.php?acctno=' .$acctno. '&loanidd=' . $row[ID] . '&edit=2"><font color="#fff" style="font-size: 12px">Add Payment</font></a></h5>
        </div>
         <div align="center" class="cell" style="width:50%;height:60px">
         <h5 align="center" style="color:#fff;background-color:#003333; width:170px; height:35px;padding-top:10px"><a title="This will automatically make repayment of loan and debit customer account" href = "loanautopay.php?acct=' .$acctno. '&loanidd=' . $row['ID'] . '"><font color="#fff" style="font-size: 12px">Auto-Payment</font></a></h5>
         </div>
      </div>';
}
?>

</fieldset>


<?php

 }
 ?>