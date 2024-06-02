<?php
 ####UPDATE LOANS
        $query_update_loan1 = "update `loan` set `refundtodate`=0 where isnull(`refundtodate`);";
        $query_update_loan2 = "update `loan` set `Loan Balance`=`loan amt` where `refundtodate`=0 and (isnull(`Loan balance`) or `Loan balance`=0);";
        $query_update_loan3 = "update `loan` set `LoanStop`= 1, `MonthLoanStop`= 1 where `loan balance`<=0 or `refundtodate`>=`loan amt`;";
        $query_update_loan4 = "update `loan` set `Loan Balance`=(`Loan Balance`-`monthly refund`),`RefundToDate`=(`RefundToDate`+`monthly refund`) where (`MonthLoanStop`=0 or `LoanStop`=0) or `LatestMonth` <>'" . $_POST['cmbMonth'] . ", " . $_POST['year'] . "';";
        $query_update_loan5 = "update `loan` set `LatestMonth`='" . $_POST['cmbMonth'] . ", " . $_POST['year'] . "'";
        $query_update_loan6 = "update `loan` set `loan`.`LoanStop`=1, `loan`.`MonthLoanStop`=1 where `loan balance`<=0;";

        $result_update_loan1 = mysql_query($query_update_loan1) or die(mysql_error());
        $result_update_loan2 = mysql_query($query_update_loan2) or die(mysql_error());
        $result_update_loan3 = mysql_query($query_update_loan3) or die(mysql_error());
        $result_update_loan4 = mysql_query($query_update_loan4) or die(mysql_error());
        $result_update_loan5 = mysql_query($query_update_loan5) or die(mysql_error());
        $result_update_loan6 = mysql_query($query_update_loan6) or die(mysql_error());

?>