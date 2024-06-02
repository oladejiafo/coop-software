<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 1))
{
 if ($_SESSION['access_lvl'] != 5){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don’t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn’t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
}
}
 $year = $_POST["year"];
 $cmbMonth = $_POST["cmbMonth"];

 require_once 'conn.php';
 require_once 'http.php';

 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Generate':
      if (Trim($cmbMonth) == "- Select Month-")
      {
        echo "Please Select a month.";     
        echo " <a href='payroll.php'>Click here to go back</a>. "; 
        redirect('payroll.php');  
        break;
      }
      elseif (Trim($year) == "")
      {
        echo "Please Enter a year.";        
        echo " <a href='payroll.php'>Click here to go back</a>. "; 
        redirect('payroll.php');  
        break;
      }
      elseif (Trim($cmbMonth)!="" && Trim($year)!="") 
      { 
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


        ##### PAYROLL
        $query_delete_pay ="delete from `pay`";
        $result_delete_pay = mysql_query($query_delete_pay) or die(mysql_error());

        $query_delete_payr ="delete from `payr`";
        $result_delete_payr = mysql_query($query_delete_payr) or die(mysql_error());
 

        #### Spooling Active Staff Records into temporary table
        $query_insert_pay ="insert into `Pay` (`Staff Number`,`Staff Name`, `Location`, `Department`, `Rank`,`Bank`,`Grade level`,`Acct No`,`In Govt Qtrs`,`Position`,`Branch`,`Office`) 
                         select `Staff Number`,(`Surname`" . ", " . "`FirstName`) as Name, `Present Location`, `Dept`,`Present Rank`, `Bank`,`Level`,`Acct No`,`In Govt Qtrs`,`Position`,`Bank Branch`,`Office` from `Staff` where `Employment Status` = 'Active'";
        $result_insert_pay = mysql_query($query_insert_pay) or die(mysql_error());

   
        ####  Update selected period into temporary table
        $query_update_pmonth ="update `pay` set `month`='" . $_POST['cmbMonth'] . ", " . $_POST['year'] . "'";
        $result_update_pmonth = mysql_query($query_update_pmonth) or die(mysql_error());
     
        ####  Update Sort fields into temporary table
        $query_update_prank ="update `pay`,`Rank` set `RankSortOrder`=`Rank Sort Order` where `Pay`.`Rank`=`rank`.`rank`";
        $result_update_prank = mysql_query($query_update_prank) or die(mysql_error());

        $query_update_ppos ="Update `Pay`,`Position` set `PosSortOrder`=`Position SortOrder` where `Pay`.`position`=`Position`.`Position`";
        $result_update_ppos = mysql_query($query_update_ppos) or die(mysql_error());

        $query_update_pbank ="Update `Pay`,`Bank` set `pay`.`bankid`=`bank`.`bankid` where `Pay`.`bank`=`bank`.`Name` and `pay`.`branch`=`bank`.`branch`";
        $result_update_pbank = mysql_query($query_update_pbank) or die(mysql_error());

     
        ####  Update Basic Salary into temporary tables
        $query_update_pbasic ="update `Pay`,`Allowances` set `pay`.`basic`=`Allowances`.`Amount` where `Allowances`.`Type`='B' and `pay`.`Grade Level`=`Allowances`.`Grade Level` and `pay`.`Class`=`Allowances`.`Typ`";
        $result_update_pbasic = mysql_query($query_update_pbasic) or die(mysql_error());


        ####  From Allowances
        $query_insert_prallow ="insert into `payr` (`Staff Number`,`Description`,`Amount`,`Type`,`AllowID`,`SortOrder`,`Typ`) 
                select `Pay`.`Staff Number`,`Allowances`.`Description`,`Allowances`.`Amount`,`Allowances`.`Type`,`AllowanceID`,`SortOrder`,`Typ` from `pay` left join `Allowances` on `pay`.`Grade level`=`allowances`.`Grade Level`";
        $result_insert_prallow = mysql_query($query_insert_prallow) or die(mysql_error());

        #"insert into [payr] ([staff no],[Description],[Amount],[Type],[AllowID],[SortOrder],[Typ],[Class]) select [Pay].[staff no],[PAllow].[Description],(([PAllow].[Percent]*[Pay].[basic])/100) as Allowances,[PAllow].[Type],[AllowID],[SortOrder],[Typ],[pallow].[Class] from [pay],[pallow] where [pay].[levels]=[pallow].[level] and [pay].[step]=[pallow].[step] and ([Pallow].[Type]<>'AR' and [Pallow].[Type]<>'AI')"

        #'''''''''''From Pallow
        #"insert into [payr] ([staff no],[Description],[Amount],[Type],[AllowID],[SortOrder],[Typ],[Class]) select [Pay].[staff no],[PAllow].[Description],[PAllow].[Amount],[PAllow].[Type],[PAllow].[AllowID],[PAllow].[SortOrder],[PAllow].[Typ],[pallow].[Class] from [pay],[pallow] where [pay].[levels]=[pallow].[level] and [pay].[step]=[pallow].[step] and ([Pallow].[Type]<>'AI')"

        $query_insert_prallow2 ="insert into `payr` (`Staff Number`,`Description`,`Amount`,`Type`,`AllowID`,`SortOrder`,`Typ`) 
                select `Pay`.`Staff Number`,`PAllowances`.`Description`,`PAllowances`.`Amount`,`PAllowances`.`Type`,`AllowanceID`,`SortOrder`,`Typ` from `pay` left join `pAllowances` on `pay`.`Grade level`=`Pallowances`.`Grade Level`";
        $result_insert_prallow2 = mysql_query($query_insert_prallow2) or die(mysql_error());

        #''''''''From PosAllow
        #"insert into [payr] ([staff no],[Description],[Amount],[Type],[AllowID],[SortOrder],[Typ],[Class]) select [Pay].[staff no],[PosAllow].[Description],[PosAllow].[Amount],[PosAllow].[Type],[PosAllow].[AllowID],[PosAllow].[SortOrder],[PosAllow].[Typ],[PosAllow].[Class] from [pay],[PosAllow] where [pay].[levels]=[PosAllow].[level] and [pay].[step]=[PosAllow].[step] and ([Pay].[Location]=[PosAllow].[Position])"

        #''''''''From QAllow
        #"insert into [payr] ([staff no],[Description],[Amount],[Type],[AllowID],[SortOrder],[Typ],[Class]) select [Pay].[staff no],[QAllow].[Description],[QAllow].[Amount],[QAllow].[Type],[QAllow].[AllowID],[QAllow].[SortOrder],[QAllow].[Typ],[QAllow].[Class] from [pay],[QAllow] where [pay].[levels]=[qallow].[level] and [pay].[step]=[qallow].[step] and ([Pay].[Certified]=true)"
     

        ####  Rent Subsidy
        $query_insert_prrent ="insert into `payr` (`Staff Number`,`Description`,`Amount`,`Type`,`AllowID`,`SortOrder`,`Typ`) select `Pay`.`Staff Number`,`Allowances`.`Description`, `Allowances`.`amount`,`Allowances`.`Type`,`AllowanceID`,`SortOrder`,`Typ` from `pay` left join `allowances` on `pay`.`Grade Level`=`allowances`.`Grade Level` where `pay`.`In Govt Qtrs`=1 and `allowances`.`Type`='AR'";
        $result_insert_prrent = mysql_query($query_insert_prrent) or die(mysql_error());
        #'    "insert into [payr] ([staff no],[Description],[Amount],[Type],[AllowID],[SortOrder],[Typ],[Class]) select [Pay].[staff no],[Allowances].[Description], IIf([pay].[In Govt Qtrs]=1,0,[Allowances].[amount]),[Allowances].[Type],[AllowID],[SortOrder],[Typ],[allowances].[class] from [pay],[allowances] where [pay].[levels]=[allowances].[level] and [pay].[step]=[allowances].[step] and [allowances].[Type]='AR'"
        #'    "insert into [payr] ([staff no],[Description],[Amount],[Type],[AllowID],[SortOrder],[Typ],[Class]) select [Pay].[staff no],[PAllow].[Description], IIf([pay].[In Govt Qtrs]=false,0,[PAllow].[Amount]),[PAllow].[Type],[AllowID],[SortOrder],[Typ],[Pallow].[class] from [pay],[pallow] where [pay].[levels]=[pallow].[level] and [pay].[step]=[pallow].[step] and [pallow].[Type]='AR'"
     

        ####  loan transfer
        $query_insert_prloan ="Insert into `Payr` (`Staff Number`,`Description`,`Amount`,`Type`,`AllowID`,`SortOrder`,`Typ`) select `Loan`.`Staff Number`,`loan type`,sum(`monthly refund`) as Amt,('D') as Ty,('Loan') as code,('zzz') as Ordr,('R') as Typ from `Loan` Left Join `Pay` ON `Loan`.`Staff Number`=`Pay`.`Staff Number` where `LoanStop`=0 and `MonthLoanStop`=0 Group By `Loan`.`Staff Number`,`loan type`";
        $result_insert_prloan = mysql_query($query_insert_prloan) or die(mysql_error());

     
        ####  Variations
        $query_insert_prvar ="Insert into `Payr` (`Staff Number`,`Description`,`Amount`,`Type`,`AllowID`,`SortOrder`,`Typ`) select `Variation`.`Staff Number`,`Description`,`Variation`, `Type`, `AllowID`, ('ppp') as ordr,Typ from `Variation` where `For Month`='" . $cmbMonth . "' and `Year`=" & val($year);
        $result_insert_prvar = mysql_query($query_insert_prvar) or die(mysql_error());

     
        ####  Allowance Heading
        $query_update_prEhdr ="update `payr` set `Class`='Gross Pay' where `Typ`='E'";
        $result_update_prEhdr = mysql_query($query_update_prEhdr) or die(mysql_error());

        $query_update_prRhdr ="update `payr` set `Class`='Total Deduction' where `Typ`='R'";
        $result_update_prRhdr = mysql_query($query_update_prRhdr) or die(mysql_error());

     
        ####  make Deductions negative
        $query_update_prDneg ="update `payr` set `Amount`=(-1)* `Amount` where `Type`='D'";
        $result_update_prDneg = mysql_query($query_update_prDneg) or die(mysql_error());


        #### temps
        $query_update_prBtemps ="update `pay`,`payr` set `pay`.`basic`=`payr`.`amount` where `payr`.`allowid`='100' and pay.`staff number`=`payr`.`staff number`";
        $result_update_prBtemps = mysql_query($query_update_prBtemps) or die(mysql_error());

        $query_update_prHtemps ="update `pay`,`payr` set `pay`.`Hamount`=`payr`.`amount` where `payr`.`allowid`='250' and pay.`staff number`=`payr`.`staff number`";
        $result_update_prHtemps = mysql_query($query_update_prHtemps) or die(mysql_error());

        $query_update_prTtemps ="update `pay`,`payr` set `pay`.`TotPay`=`payr`.`amount` where `payr`.`allowid`='101' and `pay`.`staff number`=`payr`.`staff number`";
        $result_update_prTtemps = mysql_query($query_update_prTtemps) or die(mysql_error());

        $query_update_prLtemps ="update `pay`,`payr` set `pay`.`LeaveG`=`payr`.`amount` where `payr`.`description` like 'Leave G*' and `pay`.`staff number`=`payr`.`staff number`";
        $result_update_prLtemps = mysql_query($query_update_prLtemps) or die(mysql_error());

        $query_update_prXtemps ="update `pay`,`payr` set `pay`.`Tax`=(-1)*`payr`.`amount` where `payr`.`description`='Tax' and `pay`.`staff number`=`payr`.`staff number`";
        $result_update_prXtemps = mysql_query($query_update_prXtemps) or die(mysql_error());

     
        ####  Temp Calcs
          ##  Total Deduction
        $query_update_zzTempsD ="delete from `zz`";
        $result_update_zzTempsD = mysql_query($query_update_zzTempsD) or die(mysql_error());

        $query_update_zzTempsID ="insert into `zz` (`sn`,`zz`) select `payr`.`staff number`,sum(`payr`.`amount`) as z from `payr` left join `pay` On `pay`.`staff number`=`payr`.`staff number` where `payr`.`type`='D' group by `payr`.`staff number`";
        $result_update_zzTempsID = mysql_query($query_update_zzTempsID) or die(mysql_error());

        $query_update_zzTempsUD ="update `pay`,`zz` set `pay`.`TDeduction`=(-1)*`zz`.`zz` where `pay`.`staff number`=`zz`.`sn`";
        $result_update_zzTempsUD = mysql_query($query_update_zzTempsUD) or die(mysql_error());

          ##  Other Allowances
        $query_update_zzTempsA ="delete from `zz`";
        $result_update_zzTempsA = mysql_query($query_update_zzTempsA) or die(mysql_error());

        $query_update_zzTempsIA ="insert into `ZZ` (`zz`,`sn`) select sum(`payr`.`amount`),`payr`.`Staff number` from `payr` left join `pay` on `payr`.`staff number`=`pay`.`staff number` where (`payr`.`allowid`<>'250' and `payr`.`allowid`<>'101' and `payr`.`description`<>'Leave Grant' and `payr`.`allowid`<>'100' and `payr`.`type`<>'D') group by `payr`.`staff number`";
        $result_update_zzTempsIA = mysql_query($query_update_zzTempsIA) or die(mysql_error());

        $query_update_zzTempsUA ="update `pay`,`ZZ` set `pay`.`OthAllow_Tot`=`zz` where `pay`.`staff number`=`zz`.`sn`";
        $result_update_zzTempsUA = mysql_query($query_update_zzTempsUA) or die(mysql_error());

          ##  Other Deductions
        $query_update_zzTempsO ="delete from `zz`";
        $result_update_zzTempsO = mysql_query($query_update_zzTempsO) or die(mysql_error());

        $query_update_zzTempsIO ="insert into `ZZ` (`zz`,`sn`) select sum(`payr`.`amount`),`payr`.`Staff number` from `payr` left join `pay` on `payr`.`staff number`=`pay`.`staff number` where (`payr`.`allowid`<>'103' and `payr`.`type`='D') group by `payr`.`staff number`";
        $result_update_zzTempsIO = mysql_query($query_update_zzTempsIO) or die(mysql_error());

        $query_update_zzTempsUO ="update `pay`,`ZZ` set `pay`.`OthDed_Tot`=(-1)*`zz` where `pay`.`staff number`=`zz`.`sn`";
        $result_update_zzTempsUO = mysql_query($query_update_zzTempsUO) or die(mysql_error());
    
     
        ####  make null value zero to make calculatns smooth''
        $query_update_prZeroAmt ="update `pay` set `Amount`=0 where isnull(`Amount`)";
        $result_update_prZeroAmt = mysql_query($query_update_prZeroAmt) or die(mysql_error());

        $query_update_prZeroArr ="update `pay` set `Arrears`=0 where isnull(`Arrears`)";
        $result_update_prZeroArr = mysql_query($query_update_prZeroArr) or die(mysql_error());

        $query_update_prZeroH ="update `pay` set `HAmount`=0 where isnull(`HAmount`)";
        $result_update_prZeroH = mysql_query($query_update_prZeroH) or die(mysql_error());

        $query_update_prZeroTP ="update `pay` set `ToyPay`=0 where isnull(`TotPay`)";
        $result_update_prZeroTP = mysql_query($query_update_prZeroTP) or die(mysql_error());

        $query_update_prZeroLG ="update `pay` set `LeaveG`=0 where isnull(`LeaveG`)";
        $result_update_prZeroLG = mysql_query($query_update_prZeroLG) or die(mysql_error());

        $query_update_prZeroTD ="update `pay` set `TDeduction`=0 where isnull(`TDeduction`)";
        $result_update_prZeroTD = mysql_query($query_update_prZeroTD) or die(mysql_error());

        $query_update_prZeroOA ="update `pay` set `OthAllow_Tot`=0 where isnull(`OthAllow_Tot`)";
        $result_update_prZeroOA = mysql_query($query_update_prZeroOA) or die(mysql_error());

        $query_update_prZeroOD ="update `pay` set `Othded_Tot`=0 where isnull(`Othded_Tot`)";
        $result_update_prZeroOD = mysql_query($query_update_prZeroOD) or die(mysql_error());

        $query_update_prZeroD ="delete from `payr` where `payr`.`Amount`=0";
        $result_update_prZeroD = mysql_query($query_update_prZeroD) or die(mysql_error());

        
        #### Update Pay History  
        $valT = "`Month`='" . $cmbMonth . ", " . $year . "'";

        $sql ="Select * from `PayHistory` where `Month`='" . $cmbMonth . ", " . $year . "'";
        $result = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_array($result);

        if ($row['Month'] != $valT)
        {
          #$query_insert_PH ="insert into `PayHistory`  Select `Pay`.`Staff Number`,`Pay`.`HAmount`,`Pay`.`LeaveG`,`Pay`.`Department`,`Pay`.`Staff Name`,`Pay`.`Location`,`Pay`.`Rank`,`Pay`.`Bank`,`Pay`.`Acct No`,`Pay`.`Month`,`Pay`.`Basic`,`Payr`.`Description`,`Pay`.`In Govt Qtrs`,`Pay`.`Grade Level`,`Pay`.`Step`,`Pay`.`GPAmount`,`Pay`.`TDeduction`,`Pay`.`NetPay`,`Pay`.`Position`,`Pay`.`Arrears`,`Pay`.`Branch`,`Pay`.`TotPay`,`Pay`.`OthAllow_Tot`,`Pay`.`OthDed_Tot`,`Pay`.`Tax`,`Pay`.`RankSortOrder`,`Pay`.`PosSortOrder`,`Pay`.`LocSortOrder`,`Pay`.`BankID`,`Pay`.`Office`,`Pay`.`Union`,`Pay`.`Co-operative`, `Pay`.`Class`,`Payr`.`Type`,`Payr`.`SortOrder`,`Payr`.`AllowID`,`Payr`.`Typ`,`Payr`.`Amount` From `Pay` left join `Payr` On `Pay`.`Staff Number`=`Payr`.`Staff Number`";
          $query_insert_PH ="insert into `PayHistory`  Select * From `Pay` left join `Payr` On `Pay`.`Staff Number`=`Payr`.`Staff Number`";
          $result_insert_PH = mysql_query($query_insert_PH) or die(mysql_error());
        }

        echo "Payroll has been successfully generated. You are now being re-directed";
        echo " <a href='payroll.php'>Click here to go back</a>. "; 
        redirect('payroll.php'); 
        break;           
      }
echo "hi";
   }
 }
?>