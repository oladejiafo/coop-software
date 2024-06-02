<?php 
session_start();

//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & $_SESSION['access_lvl'] != 5) 
{
 if ($_SESSION['access_lvl'] != 1 & $_SESSION['access_lvl'] != 4) 
 {
   $redirect = $_SERVER['PHP_SELF'];
   header("Refresh: 0; URL=../index.php?redirect=$redirect");
 }
}

require_once 'conn.php';
require_once 'header.php'; 
require_once 'style.php';

?>

<title>Payroll | Cooperative Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Payroll Generation</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="payroll.php">
										<i class="fa fa-list"></i>
									</a>
								</li>
								<li><span>Payroll</span></li>
							</ol>
					
							&nbsp;
						</div>
					</header>
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="../assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="../assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />


<section class="panel">
	<header class="panel-heading">
		<h2 class="panel-title">Payroll</h2>
	</header>
       <div class="panel-body">

<div class="services">
	<div class="container"  style="width:100%">

<div class="fieldset" style="padding: 2" align="right">
<legend><b><i><font size="2" face="Tahoma" color="#000000"> <?php require_once 'payheader.php'; ?>
</font></i></b></legend>

<form method="post" action="payroll.php">
 <div class='container' style="width:100%">
<div align="left" class="agileinfo_mail_grids">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Select Month to Generate For">Select Month to Generate For</span>
	</label>
      <select class="input__field input__field--chisato" placeholder=" " style="width:200px" name="cmbMonth">
      <option selected><?php echo date('F'); ?></option>
      <option>January</option>
      <option>February</option>
      <option>March</option>
      <option>April</option>
      <option>May</option>
      <option>June</option>
      <option>July</option>
      <option>August</option>
      <option>September</option>
      <option>October</option>
      <option>November</option>
      <option>December</option>
      </select>
     </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Enter Year to Generate For">Enter Year to Generate For</span>
	</label>
                  <input class="input__field input__field--chisato" placeholder=" " type="text" name="year" style="width:200px; font-size:12px" value="<?php echo date('Y'); ?>">
     </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Total Working Days">Total Working Days</span>
	</label>
                  <input class="input__field input__field--chisato" placeholder=" " type="text" style="width:200px; font-size:12px" name="totwork" value="22">
    </span>
      <p><b><input type="submit" value="Generate" name="submit"></b></p>
</div>
</div>
</form>

<?php
 @$year = $_POST["year"];
 @$cmbMonth = $_POST["cmbMonth"];
 @$totwork = $_POST["totwork"];

 require_once '../http.php';

      if (Trim($cmbMonth) == "- Select Month-")
      {
        echo "<p>Please Select a month.";     
        echo " <a href='payroll.php'>Click here to go back</a>.</p>"; 
        redirect('payroll.php');  
        break;
      }
      elseif (Trim($year) == "")
      {
        /*echo "Please Enter a year.";        
        echo " <a href='payroll.php'>Click here to go back</a>. "; 
        redirect('payroll.php');  
        break;*/
      }
      elseif (Trim($cmbMonth)!="" && Trim($year)!="") 
      {  
        ####UPDATE LOANS
        $query_update_loan1 = "update `loan` set `Payment todate`=0 where isnull(`Payment todate`);";
        $query_update_loan2 = "update `loan` set `Balance`=`Loan Amount` where `Payment todate`=0 and (isnull(`Balance`) or `Balance`=0);";
        $query_update_loan3 = "update `loan` set `LoanStop`= 1, `MonthLoanStop`= 1 where `Balance`<=0 or `Payment todate`>=`Loan Amount`;";
        $query_update_loan4 = "update `loan` set `Balance`=(`Balance`-`Periodic Repayment`),`Payment todate`=(`Payment todate`+`Periodic Repayment`) where (`MonthLoanStop`=0 or `LoanStop`=0) or `LatestMonth` <>'" . $_POST['cmbMonth'] . ", " . $_POST['year'] . "';";
        $query_update_loan5 = "update `loan` set `LatestMonth`='" . $_POST['cmbMonth'] . ", " . $_POST['year'] . "'";
        $query_update_loan6 = "update `loan` set `loan`.`LoanStop`=1, `loan`.`MonthLoanStop`=1 where `Balance`<=0;";

        $result_update_loan1 = mysqli_query($conn,$query_update_loan1) or die(mysqli_error());
        $result_update_loan2 = mysqli_query($conn,$query_update_loan2) or die(mysqli_error());
        $result_update_loan3 = mysqli_query($conn,$query_update_loan3) or die(mysqli_error());
        $result_update_loan4 = mysqli_query($conn,$query_update_loan4) or die(mysqli_error());
        $result_update_loan5 = mysqli_query($conn,$query_update_loan5) or die(mysqli_error());
        $result_update_loan6 = mysqli_query($conn,$query_update_loan6) or die(mysqli_error());


        ##### PAYROLL
        $query_delete_pay ="delete from `pay`";
        $result_delete_pay = mysqli_query($conn,$query_delete_pay) or die(mysqli_error());

        $query_delete_payr ="delete from `payr`";
        $result_delete_payr = mysqli_query($conn,$query_delete_payr) or die(mysqli_error());
 

        #### Spooling Active Staff Records into temporary table
        $query_insert_pay ="insert into `pay` (`Staff Number`,`Staff Name`, `Location`, `Department`, `Rank`,`Bank`,`Grade level`,`Acct No`,`In Govt Qtrs`,`Position`,`Office`,`Union`,`days`) 
                         select `Staff Number`,CONCAT(`Surname`,', ',`Firstname`)  as Name, `Present Location`, `Dept`,`Present Rank`, `Bank`,`Level`,`Acct No`,`In Govt Qtrs`,`Position`,`Office`,`Bank Branch`,`Days Worked` from `staff` where `Employment Status` = 'Active'";
        $result_insert_pay = mysqli_query($conn,$query_insert_pay) or die(mysqli_error());

#        $query_update_pay ="update `Pay`,`Staff` set `Pay`.`Staff Name`=`Staff`.`Firstname` where `Employment Status` = 'Active'";
 #       $result_update_pay = mysqli_query($conn,$query_update_pay) or die(mysqli_error());   

        ####  Update selected period into temporary table
        $query_update_pmonth ="update `pay` set `month`='" . $_POST['cmbMonth'] . ", " . $_POST['year'] . "'";
        $result_update_pmonth = mysqli_query($conn,$query_update_pmonth) or die(mysqli_error());

        ####  Update timesheet into temporary table
$sqlx="SELECT `days` FROM `pay`";
$resx = mysqli_query($conn,$sqlx) or die('Could not look up user data; ' . mysqli_error());
$rox = mysqli_fetch_array($resx);
$daz=$rox['days'];

        if(!$daz)
        {
         $query_update_pattend ="update `pay`,`timesheet` set `days`=(Select count(`Attendance`) from `timesheet` where `Attendance`='Present' and Year(`Date`)=" . date('Y') . " and Month(`Date`)=" . date('m') . " and `Staff No`=`Staff Number`) where `Staff Number`=`Staff No`";
         $result_update_pattend = mysqli_query($conn,$query_update_pattend) or die(mysqli_error());
        }
        ####  Update Sort fields into temporary table
        $query_update_prank ="update `pay`,`rank` set `RankSortOrder`=`Rank Sort Order` where `pay`.`Rank`=`rank`.`rank`";
        $result_update_prank = mysqli_query($conn,$query_update_prank) or die(mysqli_error());

        ####  Update Sort fields into temporary table
        $query_update_prank ="update `pay`,`rank` set `RankSortOrder`=`Rank Sort Order` where `pay`.`Rank`=`rank`.`rank`";
        $result_update_prank = mysqli_query($conn,$query_update_prank) or die(mysqli_error());

        $query_update_ppos ="Update `pay`,`position` set `PosSortOrder`=`Position SortOrder` where `pay`.`position`=`position`.`Position`";
        $result_update_ppos = mysqli_query($conn,$query_update_ppos) or die(mysqli_error());

        $query_update_pbank ="Update `pay`,`bank` set `pay`.`bankid`=`bank`.`ID` where `pay`.`bank`=`bank`.`Bank`";
        $result_update_pbank = mysqli_query($conn,$query_update_pbank) or die(mysqli_error());
     
        ####  Update Basic Salary into temporary tables
        $query_update_pbasic ="update `pay`,`allowances` set `pay`.`basic`=(`pay`.`days`/" .$totwork. ") * `allowances`.`Amount` where `allowances`.`Type`='Basic' and `pay`.`Grade Level`=`allowances`.`Grade Level` and `pay`.`Class`=`allowances`.`Typ`";
        $result_update_pbasic = mysqli_query($conn,$query_update_pbasic) or die(mysqli_error());

        ####  From Allowances
/*        $query_insert_prallow ="insert into `payr` (`Staff Number`,`Description`,`Amount`,`Type`,`AllowID`,`SortOrder`,`Typ`) 
                select `pay`.`Staff Number`,`allowances`.`Description`,`allowances`.`Amount`,`allowances`.`Type`,`allowanceID`,`SortOrder`,`Typ` from `pay` left join `allowances` on `pay`.`Grade level`=`allowances`.`Grade Level`";
*/
        $query_insert_prallow ="insert into `payr` (`Staff Number`,`Description`,`Amount`,`Type`,`AllowID`,`SortOrder`,`Typ`) 
                select `pay`.`Staff Number`,`allowances`.`Description`,`allowances`.`Amount`,`allowances`.`Type`,`allowanceID`,`SortOrder`,`Typ` from `pay` left join `allowances` on `pay`.`Staff Number`=`allowances`.`Grade Level` where `allowances`.`Show`='Show'";
        $result_insert_prallow = mysqli_query($conn,$query_insert_prallow) or die(mysqli_error());


        #'''''''''''From Pallow

/*
 $qpallow ="insert into `payr` (`Staff Number`,`Description`,`Amount`,`Type`,`AllowID`,`SortOrder`,`Typ`)
            SELECT `pay`.`Staff Number`,`pallowances`.`Description`, ((`pallowances`.`Percent` *  `pay`.`Basic`)/100),  `pallowances`.`Type` ,  `AllowanceID` ,  `SortOrder` ,  `Typ` FROM  `pay` LEFT JOIN  `pallowances` ON  `pay`.`Grade level` =  `pallowances`.`Grade Level`";
 $result_qpallow = mysqli_query($conn,$qpallow) or die(mysqli_error());
*/
        #''''''''From PosAllow
        #"insert into [payr] ([staff no],[Description],[Amount],[Type],[AllowID],[SortOrder],[Typ],[Class]) select [Pay].[staff no],[PosAllow].[Description],[PosAllow].[Amount],[PosAllow].[Type],[PosAllow].[AllowID],[PosAllow].[SortOrder],[PosAllow].[Typ],[PosAllow].[Class] from [pay],[PosAllow] where [pay].[levels]=[PosAllow].[level] and [pay].[step]=[PosAllow].[step] and ([Pay].[Location]=[PosAllow].[Position])"

        #''''''''From QAllow
        #"insert into [payr] ([staff no],[Description],[Amount],[Type],[AllowID],[SortOrder],[Typ],[Class]) select [Pay].[staff no],[QAllow].[Description],[QAllow].[Amount],[QAllow].[Type],[QAllow].[AllowID],[QAllow].[SortOrder],[QAllow].[Typ],[QAllow].[Class] from [pay],[QAllow] where [pay].[levels]=[qallow].[level] and [pay].[step]=[qallow].[step] and ([Pay].[Certified]=true)"

        ####  Rent Subsidy
/*        $query_insert_prrent ="insert into `payr` (`Staff Number`,`Description`,`Amount`,`Type`,`AllowID`,`SortOrder`,`Typ`) select `pay`.`Staff Number`,`allowances`.`Description`, `allowances`.`amount`,`allowances`.`Type`,`allowanceID`,`SortOrder`,`Typ` from `pay` left join `allowances` on `pay`.`Grade Level`=`allowances`.`Grade Level` where `pay`.`In Govt Qtrs`=1 and `allowances`.`Type`='AR'"; */
        $query_insert_prrent ="insert into `payr` (`Staff Number`,`Description`,`Amount`,`Type`,`AllowID`,`SortOrder`,`Typ`) select `pay`.`Staff Number`,`allowances`.`Description`, `allowances`.`amount`,`allowances`.`Type`,`allowanceID`,`SortOrder`,`Typ` from `pay` left join `allowances` on `pay`.`Staff Number`=`allowances`.`Grade Level` where `pay`.`In Govt Qtrs`=1 and `allowances`.`Type`='AR'";
        $result_insert_prrent = mysqli_query($conn,$query_insert_prrent) or die(mysqli_error());
        #'    "insert into [payr] ([staff no],[Description],[Amount],[Type],[AllowID],[SortOrder],[Typ],[Class]) select [Pay].[staff no],[Allowances].[Description], IIf([pay].[In Govt Qtrs]=1,0,[Allowances].[amount]),[Allowances].[Type],[AllowID],[SortOrder],[Typ],[allowances].[class] from [pay],[allowances] where [pay].[levels]=[allowances].[level] and [pay].[step]=[allowances].[step] and [allowances].[Type]='AR'"
        #'    "insert into [payr] ([staff no],[Description],[Amount],[Type],[AllowID],[SortOrder],[Typ],[Class]) select [Pay].[staff no],[PAllow].[Description], IIf([pay].[In Govt Qtrs]=false,0,[PAllow].[Amount]),[PAllow].[Type],[AllowID],[SortOrder],[Typ],[Pallow].[class] from [pay],[pallow] where [pay].[levels]=[pallow].[level] and [pay].[step]=[pallow].[step] and [pallow].[Type]='AR'"

        ####  loan transfer
        $query_insert_prloan ="Insert into `payr` (`Staff Number`,`Description`,`Amount`,`Type`,`AllowID`,`SortOrder`,`Typ`) select `loan`.`Account Number`,`Loan Type`,sum(`Periodic Repayment`) as Amt,('D') as Ty,('Loan') as code,('zzz') as Ordr,('R') as Typ from `loan` Left Join `pay` ON `loan`.`Account Number`=`pay`.`Staff Number` where `LoanStop`=0 and `MonthLoanStop`=0 Group By `loan`.`Account Number`,`Loan Type`";
        $result_insert_prloan = mysqli_query($conn,$query_insert_prloan) or die(mysqli_error());
     
        #### Update Pay History  
        $valTt = $cmbMonth . ", " . $year;

        ####  Variations
            ###### Cooperative #####
        $query_insert_prvar ="Insert into `payr` (`Staff Number`,`Description`,`Amount`,`Type`,`AllowID`,`SortOrder`,`Typ`) select `variation`.`Staff Number`,'Cooperative',`Variation`, `Typ2`, `AllowID`, ('ppp') as ordr,Typ from `variation` where `Type` like '%operative%'";
        $result_insert_prvar = mysqli_query($conn,$query_insert_prvar) or die(mysqli_error());

        $query_update_pvar ="update `pay`,`variation` set `pay`.`Co-operative`=`variation`.`Type` where `pay`.`Staff Number`=`variation`.`Staff Number` and `variation`.`Type` like '%operative%'";
        $result_update_pvar = mysqli_query($conn,$query_update_pvar) or die(mysqli_error());
            ###### Fixed Allowance #####
        $query_insert_prvar2 ="Insert into `payr` (`Staff Number`,`Description`,`Amount`,`Type`,`AllowID`,`SortOrder`,`Typ`) select `variation`.`Staff Number`,`Type`,`Variation`, `Typ2`, `AllowID`, ('ppp') as ordr,Typ from `variation` where `Type` like 'Fixed Allow%'";
        $result_insert_prvar2 = mysqli_query($conn,$query_insert_prvar2) or die(mysqli_error());
            ###### Quaters #####
        $query_insert_prvar2 ="Insert into `payr` (`Staff Number`,`Description`,`Amount`,`Type`,`AllowID`,`SortOrder`,`Typ`) select `variation`.`Staff Number`,`Type`,`Variation`, `Typ2`, `AllowID`, ('ppp') as ordr,Typ from `variation` where `Type` like 'Quarter%'";
        $result_insert_prvar2 = mysqli_query($conn,$query_insert_prvar2) or die(mysqli_error());

            ###### Others #####
        $query_insert_prvar2 ="Insert into `payr` (`Staff Number`,`Description`,`Amount`,`Type`,`AllowID`,`SortOrder`,`Typ`) select `variation`.`Staff Number`,`Type`,`Variation`, `Typ2`, `AllowID`, ('ppp') as ordr,Typ from `variation` where `For Month`='" . $valTt . "' and `Type` not like '%operative%' and `Type` not like 'Fixed Allow%' and `Type` not like 'Quart%'";
        $result_insert_prvar2 = mysqli_query($conn,$query_insert_prvar2) or die(mysqli_error());
#require_once 'allcom.php';

        ####  Allowance Heading
        $query_update_prEhdr ="update `payr` set `Class`='Gross Pay' where (`Typ`='Earning' or `Typ`='V') and (`Type` in ('Basic', 'Allowance'))";
        $result_update_prEhdr = mysqli_query($conn,$query_update_prEhdr) or die(mysqli_error());

        $query_update_prRhdr ="update `payr` set `Class`='Total Deduction' where `Typ`='Deduction' and `Description` not in ('Tax')";
        $result_update_prRhdr = mysqli_query($conn,$query_update_prRhdr) or die(mysqli_error());

        $query_update_prChdr ="update `payr` set `Class`='Consolidated Pay' where (`Typ`='Earning') and (`Type` in ('Allowance (Other)'))";
        $result_update_prChdr = mysqli_query($conn,$query_update_prChdr) or die(mysqli_error());
     

        ####  make Deductions negative
        $query_update_prDneg ="update `payr` set `Amount`=(-1)* `Amount` where `Type`='Deduction'";
        $result_update_prDneg = mysqli_query($conn,$query_update_prDneg) or die(mysqli_error());

        #### temps
        $query_update_prBtemps ="update `pay`,`payr` set `pay`.`basic`=(`pay`.`days`/$totwork)*`payr`.`amount` where `payr`.`Description`='Basic' and pay.`staff number`=`payr`.`staff number`";
        $result_update_prBtemps = mysqli_query($conn,$query_update_prBtemps) or die(mysqli_error());

        $query_update_prBtempsB ="update `pay`,`payr` set `payr`.`amount`=(`pay`.`days`/$totwork)*`payr`.`amount` where `payr`.`Description`='Basic' and pay.`staff number`=`payr`.`staff number`";
        $result_update_prBtempsB = mysqli_query($conn,$query_update_prBtempsB) or die(mysqli_error());

        $query_update_prHtemps ="update `pay`,`payr` set `pay`.`Hamount`=`payr`.`amount` where `payr`.`Description` like 'Accomodation%' and pay.`staff number`=`payr`.`staff number`";
        $result_update_prHtemps = mysqli_query($conn,$query_update_prHtemps) or die(mysqli_error());

#####?????
/*        $query_update_prTtemps ="update `pay`,`payr` set `pay`.`TotPay`=`payr`.`amount` where `payr`.`allowid`='101' and `pay`.`staff number`=`payr`.`staff number`";
          $result_update_prTtemps = mysqli_query($conn,$query_update_prTtemps) or die(mysqli_error());
*/
        $query_update_prLtemps ="update `pay`,`payr` set `pay`.`LeaveG`=`payr`.`amount` where `payr`.`Description` like 'Leave G*' and `pay`.`staff number`=`payr`.`staff number`";
        $result_update_prLtemps = mysqli_query($conn,$query_update_prLtemps) or die(mysqli_error());

        $query_update_prXtemps ="update `pay`,`payr` set `pay`.`Tax`=(-1)*`payr`.`amount` where `payr`.`Description`='Tax' and `pay`.`staff number`=`payr`.`staff number`";
        $result_update_prXtemps = mysqli_query($conn,$query_update_prXtemps) or die(mysqli_error());

        ####  Temp Calcs
require_once 'allcom.php';

          ##  Total Deduction
        $query_update_zzTempsD ="delete from `zz`";
        $result_update_zzTempsD = mysqli_query($conn,$query_update_zzTempsD) or die(mysqli_error());

        $query_update_zzTempsID ="insert into `zz` (`sn`,`zz`) select `payr`.`staff number`,sum(`payr`.`amount`) as z from `payr` left join `pay` On `pay`.`staff number`=`payr`.`staff number` where `payr`.`Type`='Deduction' and `payr`.`Description` not in ('Tax') group by `payr`.`staff number`";
        $result_update_zzTempsID = mysqli_query($conn,$query_update_zzTempsID) or die(mysqli_error());

        $query_update_zzTempsUD ="update `pay`,`zz` set `pay`.`TDeduction`=(-1)*`zz`.`zz` where `pay`.`staff number`=`zz`.`sn`";
        $result_update_zzTempsUD = mysqli_query($conn,$query_update_zzTempsUD) or die(mysqli_error());

          ##  Arrears Deductions
        $query_update_zzTempsAR ="delete from `zz`";
        $result_update_zzTempsAR = mysqli_query($conn,$query_update_zzTempsAR) or die(mysqli_error());

        $query_update_zzTempsIAR ="insert into `zz` (`sn`,`zz`) select `payr`.`staff number`,sum(`payr`.`amount`) as z from `payr` left join `pay` On `pay`.`staff number`=`payr`.`staff number` where `payr`.`Type`='Deduction' and `payr`.`Description` in ('Tax Arrears','NHF Arrears','Union Arrears','Pension Arrears','Cooperative Arrears') group by `payr`.`staff number`";
        $result_update_zzTempsIAR = mysqli_query($conn,$query_update_zzTempsIAR) or die(mysqli_error());

        $query_update_zzTempsUAR ="update `pay`,`zz` set `pay`.`Arrears`=(-1)*`zz`.`zz` where `pay`.`staff number`=`zz`.`sn`";
        $result_update_zzTempsUAR = mysqli_query($conn,$query_update_zzTempsUAR) or die(mysqli_error());

         ## Summaries

        $query_insert_prall1 ="insert into `payr` (`Staff Number`,`Description`,`Amount`,`Type`,`AllowID`,`SortOrder`,`Typ`) 
                select `pay`.`Staff Number`,'Total Deduction',`pay`.`TDeduction`,'R','999','999','T' from `pay`";
        $result_insert_prall1 = mysqli_query($conn,$query_insert_prall1) or die(mysqli_error());

        $query_insert_prall1x ="insert into `payr` (`Staff Number`,`Description`,`Amount`,`Type`,`AllowID`,`SortOrder`,`Typ`) 
                select `pay`.`Staff Number`,'Deduction Arrears',`pay`.`Arrears`,'S','999','999','S' from `pay`";
        $result_insert_prall1x = mysqli_query($conn,$query_insert_prall1x) or die(mysqli_error());

        $query_update_praZ ="update `payr` set `payr`.`Typ`='X' where `payr`.`Description`='Housing'";
        $result_update_praZ = mysqli_query($conn,$query_update_praZ) or die(mysqli_error());

          ##  Other Allowances
        $query_update_zzTempsA ="delete from `zz`";
        $result_update_zzTempsA = mysqli_query($conn,$query_update_zzTempsA) or die(mysqli_error());

        $query_update_zzTempsIA ="insert into `zz` (`zz`,`sn`) select sum(`payr`.`amount`),`payr`.`Staff number` from `payr` left join `pay` on `payr`.`staff number`=`pay`.`staff number` where (`payr`.`Type`='Allowance (Non-Taxable)') group by `payr`.`staff number`";
        $result_update_zzTempsIA = mysqli_query($conn,$query_update_zzTempsIA) or die(mysqli_error());

        $query_update_zzTempsUA ="update `pay`,`zz` set `pay`.`OthAllow_Tot`=`zz` where `pay`.`staff number`=`zz`.`sn`";
        $result_update_zzTempsUA = mysqli_query($conn,$query_update_zzTempsUA) or die(mysqli_error());

          ##  GrossPay
        $query_update_zzTempsNP ="delete from `zz`";
        $result_update_zzTempsNP = mysqli_query($conn,$query_update_zzTempsNP) or die(mysqli_error());

        $query_update_zzTempsINP ="insert into `zz` (`zz`,`sn`) select sum(`payr`.`amount`),`payr`.`Staff number` from `payr` left join `pay` on `payr`.`staff number`=`pay`.`staff number` where (`payr`.`typ`='Earning' and `payr`.`Type` in ('Basic','Allowance')) group by `payr`.`staff number`";
        $result_update_zzTempsINP = mysqli_query($conn,$query_update_zzTempsINP) or die(mysqli_error());

        $query_update_zzTempsUNP ="update `pay`,`zz` set `pay`.`GPAmount`=`zz` where `pay`.`staff number`=`zz`.`sn`";
        $result_update_zzTempsUNP = mysqli_query($conn,$query_update_zzTempsUNP) or die(mysqli_error());

          ##  ConsolidatedPay
        $query_update_zzTempsNP ="delete from `zz`";
        $result_update_zzTempsNP = mysqli_query($conn,$query_update_zzTempsNP) or die(mysqli_error());

        $query_update_zzTempsINP ="insert into `zz` (`zz`,`sn`) select sum(`payr`.`amount`),`payr`.`Staff number` from `payr` left join `pay` on `payr`.`staff number`=`pay`.`staff number` where (`payr`.`typ`='Earning' and `payr`.`Type` in ('Basic', 'Allowance', 'Allowance (Other)')) group by `payr`.`staff number`";
        $result_update_zzTempsINP = mysqli_query($conn,$query_update_zzTempsINP) or die(mysqli_error());

        $query_update_zzTempsUNP ="update `pay`,`zz` set `pay`.`TotPay`=`zz` where `pay`.`staff number`=`zz`.`sn`";
        $result_update_zzTempsUNP = mysqli_query($conn,$query_update_zzTempsUNP) or die(mysqli_error());

          ##  Other Deductions
        $query_update_zzTempsO ="delete from `zz`";
        $result_update_zzTempsO = mysqli_query($conn,$query_update_zzTempsO) or die(mysqli_error());

        $query_update_zzTempsIO ="insert into `zz` (`zz`,`sn`) select sum(`payr`.`amount`),`payr`.`Staff number` from `payr` left join `pay` on `payr`.`staff number`=`pay`.`staff number` where (`payr`.`Description`<>'Tax' and `payr`.`type`='Deduction') group by `payr`.`staff number`";
        $result_update_zzTempsIO = mysqli_query($conn,$query_update_zzTempsIO) or die(mysqli_error());

        $query_update_zzTempsUO ="update `pay`,`zz` set `pay`.`OthDed_Tot`=(-1)*`zz` where `pay`.`staff number`=`zz`.`sn`";
        $result_update_zzTempsUO = mysqli_query($conn,$query_update_zzTempsUO) or die(mysqli_error());
     
        ####  make null value zero to make calculatns smooth''
        $query_update_locZeroval ="update `pay` set `Location`='' where isnull(`Location`)";
        $result_update_locZeroval = mysqli_query($conn,$query_update_locZeroval) or die(mysqli_error());

        $query_update_unZeroval ="update `pay` set `Union`='' where isnull(`Union`)";
        $result_update_unZeroval = mysqli_query($conn,$query_update_unZeroval) or die(mysqli_error());

        $query_update_copZeroval ="update `pay` set `Co-operative`='' where isnull(`Co-operative`)";
        $result_update_copZeroval = mysqli_query($conn,$query_update_copZeroval) or die(mysqli_error());

        $query_update_prZeroAmt ="update `payr` set `Amount`=0 where isnull(`Amount`)";
        $result_update_prZeroAmt = mysqli_query($conn,$query_update_prZeroAmt) or die(mysqli_error());

        $query_update_prZeroArr ="update `pay` set `Arrears`=0 where isnull(`Arrears`)";
        $result_update_prZeroArr = mysqli_query($conn,$query_update_prZeroArr) or die(mysqli_error());

        $query_update_prZeroH ="update `pay` set `HAmount`=0 where isnull(`HAmount`)";
        $result_update_prZeroH = mysqli_query($conn,$query_update_prZeroH) or die(mysqli_error());

        $query_update_prZeroTP ="update `pay` set `TotPay`=0 where isnull(`TotPay`)";
        $result_update_prZeroTP = mysqli_query($conn,$query_update_prZeroTP) or die(mysqli_error());

        $query_update_prZeroLG ="update `pay` set `LeaveG`=0 where isnull(`LeaveG`)";
        $result_update_prZeroLG = mysqli_query($conn,$query_update_prZeroLG) or die(mysqli_error());

        $query_update_prZeroTD ="update `pay` set `TDeduction`=0 where isnull(`TDeduction`)";
        $result_update_prZeroTD = mysqli_query($conn,$query_update_prZeroTD) or die(mysqli_error());

        $query_update_prZeroOA ="update `pay` set `OthAllow_Tot`=0 where isnull(`OthAllow_Tot`)";
        $result_update_prZeroOA = mysqli_query($conn,$query_update_prZeroOA) or die(mysqli_error());

        $query_update_prZeroOD ="update `pay` set `Othded_Tot`=0 where isnull(`Othded_Tot`)";
        $result_update_prZeroOD = mysqli_query($conn,$query_update_prZeroOD) or die(mysqli_error());

        $query_update_prZeroD ="delete from `payr` where `payr`.`Amount`=0";
        $result_update_prZeroD = mysqli_query($conn,$query_update_prZeroD) or die(mysqli_error());
#################        
        $query_update_prZerobank ="update `pay` set `Bank`='' where isnull(`Bank`)";
        $result_update_prZerobank = mysqli_query($conn,$query_update_prZerobank) or die(mysqli_error());

require_once 'tryy.php';

        #### Update Pay History  
        $valT = "`Month`='" . $cmbMonth . ", " . $year . "'";

        $sql ="Select * from `payhistory` where `Month`='" . $cmbMonth . ", " . $year . "'";
        $result = mysqli_query($conn,$sql) or die(mysqli_error());
        $row = mysqli_fetch_array($result);

        if ($row['Month'] != $valT)
        {
          #$query_insert_PH ="insert into `PayHistory`  Select `Pay`.`Staff Number`,`Pay`.`HAmount`,`Pay`.`LeaveG`,`Pay`.`Department`,`Pay`.`Staff Name`,`Pay`.`Location`,`Pay`.`Rank`,`Pay`.`Bank`,`Pay`.`Acct No`,`Pay`.`Month`,`Pay`.`Basic`,`Payr`.`Description`,`Pay`.`In Govt Qtrs`,`Pay`.`Grade Level`,`Pay`.`Step`,`Pay`.`GPAmount`,`Pay`.`TDeduction`,`Pay`.`NetPay`,`Pay`.`Position`,`Pay`.`Arrears`,`Pay`.`Branch`,`Pay`.`TotPay`,`Pay`.`OthAllow_Tot`,`Pay`.`OthDed_Tot`,`Pay`.`Tax`,`Pay`.`RankSortOrder`,`Pay`.`PosSortOrder`,`Pay`.`LocSortOrder`,`Pay`.`BankID`,`Pay`.`Office`,`Pay`.`Union`,`Pay`.`Co-operative`, `Pay`.`Class`,`Payr`.`Type`,`Payr`.`SortOrder`,`Payr`.`AllowID`,`Payr`.`Typ`,`Payr`.`Amount` From `Pay` left join `Payr` On `Pay`.`Staff Number`=`Payr`.`Staff Number`";
          $query_insert_PH ="insert into `payhistory`  Select * From `pay`";
          $result_insert_PH = mysqli_query($conn,$query_insert_PH) or die(mysqli_error());
          $query_insert_PrH ="insert into `payrhistory`  Select * From `payr`";
          $result_insert_PrH = mysqli_query($conn,$query_insert_PrH) or die(mysqli_error());
        }

#######
require_once 'time.php';
$valTT=$cmbMonth . ", " . $year;
$sql_log = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
$result_log = mysqli_query($conn,$sql_log) or die('Could not fetch data; ' . mysqli_error());
$row_log = mysqli_fetch_array($result_log);

$query_insert_Log = "Insert into `monitor` (`ip`,`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
VALUES ('" . gethostbyaddr($_SERVER['REMOTE_ADDR']) . "/" . gethostbyname($_SERVER['REMOTE_ADDR']) . "','" . $row_log['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . $gmdatex . "','Payroll Generation','Generated Payroll for: " . $valTT . "')";
$result_insert_Log = mysqli_query($conn,$query_insert_Log) or die(mysqli_error());
###### 
        echo "<div align='center'><font style='font-size:16px; color:red'>Payroll has been successfully generated!</font></div>";
      }
?>
</div>

<?php
require_once 'footerr.php';
?>
</div>

		<!-- Specific Page Vendor -->
		<script src="../assets/vendor/select2/select2.js"></script>
		<script src="../assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="../assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="../assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
   
		<!-- Examples -->
		<script src="../assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.tabletools.js"></script>