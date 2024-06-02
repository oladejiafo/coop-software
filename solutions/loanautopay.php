<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5) & ($_SESSION['access_lvl'] != 6))
{
 $redirect = $_SERVER['PHP_SELF'];
 header("Refresh: 1; URL=index.php?redirect=$redirect");
}

 $loanidd = $_REQUEST["loanidd"];
 $acct = $_REQUEST["acct"];

 require_once 'conn.php';
 
      if (Trim($acct) != "" and Trim($loanidd) != "")
      { 
        $qry="Select `PBalance`,`Payment todate`,`Balance`,`Interest toDate`,`PPayment todate`,`Monthly Interest`,`Periodic Repayment`, `Loan Status` from `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acct' and `ID`='$loanidd' and `Loan Status`='Active'";
        $resl = mysqli_query($conn,$qry);
        $rowe=mysqli_fetch_array($resl);
        $ptd=$rowe['Payment todate'];
        $bl=$rowe['Balance'];
        $itd=$rowe['Interest toDate'];
        $prtd=$rowe['PPayment todate'];
        $mi=$rowe['Monthly Interest'];
        $repay=$rowe['Periodic Repayment'];
        $pbal=$rowe['PBalance'];
        $lstatus=$rowe['Loan Status'];

        $paytd=$repay+$ptd;
        $balf=$bl-$repay;
        $prtdf=$prtd+($repay-$mi);
        $itdf=$itd+($mi);
        $pbl=$pbal-$ptd;

if($lstatus=='Active')
{
        
        $query_insert = "Insert into `loan payment` (`Account Number`,`Loan ID`,`Date`,`Amount`,`Company`) 
                                             VALUES ('$acct','$loanidd','" . date('Y-m-d') . "','$repay','" .$_SESSION['company']. "')";
        $result_insert = mysqli_query($conn,$query_insert);

        $qry_insert = "update `loan` set `PBalance`='$pbl',`Payment todate`='$paytd',`Balance`='$balf',`Interest toDate`='$itdf',`PPayment todate`='$prtdf' WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acct' and `ID`='$loanidd'";
        $res_insert = mysqli_query($conn,$qry_insert);

        $query_ins = "Insert into cash (`Type`,Classification, Particulars,Amount,`Date`,`Source`,`Account`,`Recipient`,`Bank`,`Paid`,`Company`) 
               VALUES ('Income','Loan Collection Expenses','Loan Repayment by Customer $acct','$repay','" . date('Y-m-d') . "','','$acct','','','Paid','" .$_SESSION['company']. "')";
        $result_ins = mysqli_query($conn,$query_ins);

        $sqlb="SELECT * FROM `transactions` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acct' order by `ID` desc";
        $resultb = mysqli_query($conn,$sqlb) or die('Could not look up user data; ' . mysqli_error());
        $rowb = mysqli_fetch_array($resultb); 

        $balance= $rowb['Balance']; 
        $bal=$balance-$repay;
        $query_trans = "Insert into `transactions` (`Account Number`,`Withdrawal`,`Transactor`,`Transactor Contact`,`Officer`,`Date`,`Transaction Type`,`Remark`,`Balance`,`Company`) 
               VALUES ('$acct','$repay','Loan Auto Deduction','Auto','Auto','" . date('Y-m-d') . "','Withdrawal','Monthly Loan Deduction','$bal','" .$_SESSION['company']. "')";
        $result_trans = mysqli_query($conn,$query_trans);

    if($balf==0)
    {
        $qry_insertx = "update `loan` set `Loan Status`='Completed' WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctnum' and `ID`='$loanid'";
        $res_insertx = mysqli_query($conn,$qry_insertx);
    }

        $tval="Your Payment Made and Customer Account Debitted.";
} else {
        $tval="Loan is not active.";
}
        header("location:loans.php?acctno=$acct&view=1&tval=$tval&redirect=$redirect#repay");
      }
      else
      {
        $tval="Oppss! Something is wrong, no update done, please do manually!.";
        header("location:loans.php?acctno=$acct&view=1&tval=$tval&redirect=$redirect#repay");
      }
?>