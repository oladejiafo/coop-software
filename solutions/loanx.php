<?php
require_once 'conn.php'; 
$acctno=$acctno;
//$page = $_SERVER['PHP_SELF'];

if($edit==1)
{
 $sql="SELECT * FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno' AND `Company` ='" .$_SESSION['company']. "' order by `ID` desc limit 0,1";
 $result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
 $row = mysqli_fetch_array($result);
} else {
 $sql="SELECT * FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Account Number`='$acctno' and `Loan Status` in ('Active','Pending') order by `ID` desc limit 0,1";
 $result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
 $row = mysqli_fetch_array($result);
 $acctn=$row['Account Number'];
}
 $lstat=$row['Approval'];

$sql2="SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Membership Number`='$acctno' and `Status`='Active'";
$result2 = mysqli_query($conn,$sql2) or die('Could not look up user data; ' . mysql_error());
$row2 = mysqli_fetch_array($result2); 

@$new=$_REQUEST["new"];
@$edit=$_REQUEST["edit"];
list($cp, $fld) = explode(' ', $_SESSION['company']);
$cpfolder=$cp . $fld;
?>

<style type="text/css">
.oval{
  -moz-border-radius: 90px 90px 90px 90px;
    -webkit-border-radius: 90px 90px 90px 90px;
    border-radius: 45px;
    height: 120px;
}

</style>

<style type="text/css">
.divv-table {
    width: 100%;
    float: left;
    background-color: #fff;
    padding:0;
}

.tab-roww {
	float: left;
  width: 100%;
  background-color: #fff;
}

.celll {
    float: left;

    max-height: auto;
    font-size:12px;
    background-color: #fff;
}

@media (max-width: 480px){
.tab-roww {
	float: left;
	width: 100%;
}

.celll {
    float: left;
    font-size:9px;
}
}
</style>
<div class="divv-table row" align="left" style="margin-left:10px">
<div class="tab-roww">
<div  class="celll" style='width:33.3%';>

<span class="input input--chisato" style="vertical-align:top">
<div style="vertical-align:top">
<span>
 <?php
  if(file_exists("images/pics/" .$cpfolder. "/" . $row2['ID'] . ".jpg")==1)
  { 
?>
    <img class="oval" border="1" src="images/pics/<?php echo $cpfolder;?>/<?php echo $row2['ID']; ?>.jpg" width="120" height="170">
<?php
  } else { 
?>
    <img class="oval" border="1" src="images/pics/pix.jpg" width="120" height="170">	 
<?php
  } 
?>
</span>
</div>
</span>

</div>
<div  class="celll" style='width:33.3%';>

<span class="input input--chisato">
  <?php
  if($row2['First Name'] OR $row2['Surname'])
  {
   echo "<font style='font-size:24px'><b>" .@$row2['First Name'] . ' ' .@$row2['Surname'] . "</b></font>"; 
  } else {
    echo "<font style='font-size:24px'><b>Name here</b></font>";
  } 
  ?>
<br>
       <?php echo @$row2['Contact Number']; ?>
      <br>
       <?php echo @$row2['email']; ?>
      </span>
</div>
<div  class="celll" style='width:33.3% font-size:16px';>
      <span class="input input--chisato">
       Membership #: <?php echo @$row2['Membership Number']; ?>
      <br>
       Membership Type: <?php echo @$row2['Membership Type']; ?>
      <br>
       Savings Balance: <?php echo @$row['Balance']; ?>
      </span>
</div>
</div>
<div class="tab-roww">
<?php
if($edit >0 or $new==1)
{

} else {
 if(strlen($acctno)>0)
 {
  if($row['Account Number'])
  {
  ?> 
<div class="celll" style='width:33.3%;padding-left:15px;'>
<?php /*  <h5 align="center" style="color:#fff;background-color:#ff0000; width:170px; height:35px;padding:7px"><a href="#" style="color:#fff;padding:5px">VIEW ALL LOANS</a></h5> */ ?>
</div>
<div class="celll" style='width:33.3%;padding-left:15px;'>
<?php /*  <h5 align="center" style="color:#fff;background-color:green; width:170px; height:35px;padding:7px"><a href="#" style="color:#fff;padding:5px">VIEW ALL SAVINGS</a></h5> */ ?>
</div>
<div class="celll pull-right" style='width:33.3%;padding-left:15px;'>
  <h5 align="center" style="color:#fff;background-color:blue; width:170px; height:35px;padding:7px"><a href="loans.php?edit=1&acctno=<?php echo $acctno; ?>" style="color:#fff;padding:5px">EDIT</a></h5>
</div>
<?php 
 } else {
?>
<div class="celll" style='width:33.3%;padding-left:15px;'>
&nbsp;
</div>
<div class="celll" style='width:33.3%;padding-left:15px;'>
&nbsp;
</div>
<div class="celll" style='width:33.3%;padding-left:15px;'>
  <h5 align="center" style="color:#fff;background-color:green; width:170px; height:35px;padding:7px"><a href="loans.php?new=1&acctno=<?php echo $acctno; ?>" style="color:#fff;padding:5px">ADD A NEW LOAN</a></h5>
</div>
<?php
  }
 }
}
?>
</div>
</div>

<?php
if($edit==1 or $new==1)
{
 require_once 'loanss.php';
} else if($edit==2) {
  require_once 'loanpay.php';
} else if($edit==3) {
  require_once 'guarant.php';
} else if($edit==4) {
  require_once 'collateral.php';    
} else {

 if($row['Account Number'])
 {
  $name=@$row2['First Name'] . ' ' .@$row2['Surname'];
  $due=@$row['Loan Amount'] + $row['Total Interest'];
 }
?>

<div class="row">
<div class="tab-row" style="font-weight:bold;width:100%;height:3px;background-color:#ff0000">
    <div  class="cell" style='width:100%;background-color:#FFD700'></div>
</div>    
<div class="tab-row" style="font-weight:bold">
    <div  class="cell" style='width:13%;background-color:#FFFAF0'>Name</div>
    <div  class="cell" style='width:10%;background-color:#FFFAF0'>Loan Date</div>
    <div  class="cell" style='width:10%;background-color:#FFFAF0'>Maturity</div>
    <div  class="cell" style='width:10%;background-color:#FFFAF0'>Frequency</div>
    <div  class="cell" style='width:10%;background-color:#FFFAF0'>Principal</div>
    <div  class="cell" style='width:10%;background-color:#FFFAF0'>Interest</div>
    <div  class="cell" style='width:10%;background-color:#FFFAF0'>Total Due</div>
    <div  class="cell" style='width:10%;background-color:#FFFAF0'>Amt Paid</div>
    <div  class="cell" style='width:10%;background-color:#FFFAF0'>Balance</div>
    <div  class="cell" style='width:7%;background-color:#FFFAF0'>Status</div>
</div>
<div class="tab-row">
     <div class="cell" style="width:13%;background-color:#"><?php echo $name; ?></div>
     <div class="cell" style="width:10%"><?php echo $row['Loan Date']; ?></div>
     <div class="cell" style="width:10%"><?php echo $row['Due Date']; ?></div>
     <div class="cell" style="width:10%"><?php echo $row['Payment Frequency']; ?></div>
     <div class="cell" style="width:10%"><?php echo number_format($row['Loan Amount'],2); ?></div>
     <div class="cell" style="width:10%"><?php echo number_format($row['Total Interest'],2); ?></div>
     <div class="cell" style="width:10%"><?php echo number_format($due,2); ?></div>
     <div class="cell" style="width:10%"><?php echo number_format($row['Payment todate'],2); ?></div>
     <div class="cell" style="width:10%"><?php echo number_format($row['Balance'],2); ?></div>
     <div class="cell" style="width:7%"><?php echo $row['Loan Status']; ?></div>
</div>     
</div>
<?php
}
?>
<br>
<?php
 if(strlen($acctno)>0)
 {
  if($row['Account Number'])
  {
 ?>   
<div class="admintab-area" style="background-color:#cbd9d9;" style="width:100%" align="left">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-61">
                            <div class="admintab-wrap mg-b-40s">
                                <ul class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1">
                                    <li class="active"><a data-toggle="tab" href="#term"><span class="adminpro-icon adminpro-analytics tab-custon-ic"></span><font color="#1B4F72" style="font-size:16px"><i class="fa fa-legal"></i></font> Loan Terms</a>
                                    </li>
                                    <li><a data-toggle="tab" href="#repay"><span class="adminpro-icon adminpro-analytics-arrow tab-custon-ic"></span><font color="#3498DB" style="font-size:16px"><i class="fa fa-retweet"></i></font> Repayments</a>
                                    </li>
                                    <li><a data-toggle="tab" href="#pplan"><span class="adminpro-icon adminpro-analytics-bridge tab-custon-ic"></span><font color="#B7950B" style="font-size:16px"><i class="fa fa-reorder"></i></font> Payment Plan</a>
                                    </li>
                                    <li><a data-toggle="tab" href="#guarantor"><span class="adminpro-icon adminpro-analytics-bridge tab-custon-ic"></span><font color="#FFFF00" style="font-size:16px"><i class="fa fa-shield"></i></font> Guarantor</a>
                                    </li>
                                    <li><a data-toggle="tab" href="#collat"><span class="adminpro-icon adminpro-analytics-bridge tab-custon-ic"></span><font color="#BC8F8F" style="font-size:16px"><i class="fa fa-ticket"></i></font> Collateral</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="term" class="tab-pane in active animated flipInX custon-tab-style1">
                                      <div class="row">
                                          <?php require_once 'terms.php'; ?>
                                      </div>
                                    </div>
                                    <div id="repay" class="tab-pane animated flipInX custon-tab-style1">
                                        <?php require_once 'repays.php'; ?>
                                    </div>
                                    <div id="pplan" class="tab-pane animated flipInX custon-tab-style1">
                                        <?php require_once 'pplans.php'; ?>
                                    </div>
                                    <div id="guarantor" class="tab-pane animated flipInX custon-tab-style1">
                                        <?php require_once 'guarantor.php'; ?>
                                    </div>
                                    <div id="collat" class="tab-pane animated flipInX custon-tab-style1">
                                        <?php require_once 'collat.php'; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>
<?php
  }
}
?>