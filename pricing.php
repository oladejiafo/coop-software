<?php 
session_start();
$_SESSION['byid'] ="H1$yx0";
require_once 'headrr.php'
?>

    <!-- Bootstrap core CSS -->
    <link href="vendorx/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/small-business.css" rel="stylesheet">
<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/83bf2bc3f5b707d0873564d0d/c19aa7d0ca27a12d84cd56428.js");</script>
  </head>

<?php
function checkConnectionx()
{
 $condx=@fsockopen("www.google.com",80,$errno,$errstr,30);
 if($condx)
 {
  $statusx="Ok";
  fclose($condx);
 } else {
  $statusx = "No <br/>\n";
  $statusx .= "$errstr ($errno)";
 }
 return $statusx;
}
$kkx= checkConnectionx();

if($kkx =="Ok")
{
  // . $_SERVER['REMOTE_ADDR']80.87.90.120
  $geoplugin = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip='. $_SERVER['REMOTE_ADDR']) );
  $ccurr=$geoplugin['geoplugin_currencyConverter'];
  
   if($geoplugin['geoplugin_countryName'] =="")
   {
    $Pv="10";
    $Ev="15";
    $curr="$";
   }
    
   else if($geoplugin['geoplugin_countryName'] =="Ghana")
   {
    $Pv="10";
    $Ev="15";
    $Pv= $Pv*$ccurr;
    $Ev= $Ev*$ccurr;
    $curr="GH₵";
   }
   else if($geoplugin['geoplugin_countryName'] !="Nigeria")
   {
    $Pv="10";
    $Ev="15";
    $curr="$";
   } else {
    $Pv="3500";
    $Ev="5500";
    //$Pv= $Pv*$ccurr;
    //$Ev= $Ev*$ccurr;
    $curr="NGN";
   }
} else {
    $Pv="10";
    $Ev="15";
    $curr="$";

#########################################################
$subj = 'Finasol-Cloud Prospective';
$bodd = "Someone Visited to Subscribe Finasol-Cloud. Location: " . $who;
$mymail='dejigegs@gmail.com';
mail($mymail,$subj,$bodd,'Finasol-Cloud Visitor');
#########################################################
}
?>
  <body>

    <!-- Page Content -->
    <div class="container">

      <!-- Heading Row -->
      <div class="row my-4">
        <div class="col-lg-8">
          <img class="img-fluid rounded" src="img/finasol_thrift_banner.jpg" alt="Finasol: Cloud-Based Thrift & Loans">
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4" style="background:url(images/logos.png) no-repeat bottom;">
        <h1>&nbsp;</h1>
          <p>Finasol is a subscription based Thrift and Loans Management Solution in the cloud. It is easy to use, secured, affordable, and ever improving to to give you the best.</p>
        </div>
        <!-- /.col-md-4 -->
      </div>
      <!-- /.row -->

      <!-- Call to Action Well -->
      <div class="card text-white bg-secondary my-4 text-center">
        <div class="card-body"> 
          <p class="text-white m-0">PRICING</p>
        </div>
      </div>

      <!-- Content Row -->
      <div class="row">
      <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title">30 Days Trial</h2>
              <p class="card-text">You will be auto removed after 30 days, unless you subscribe to continue.</p>
			  <p class="card-text">
			  <ul>
			  <li> Customer Management </li>
        <li> Account Opening</li>
			  <li> Loans & Payments Management </li>
			  <li> Thrift/Daily Contributions</li>
			  <li> Reports Generating</li>
			  <li> Company & Users Setup </li>
			  <li> Loan Types Settings</li> 
			  <li> Commissions Settings </li>
			  <li> Email Alert </li>
			  </ul>
			  </p>
            </div>
            <div class="card-footer" align="center">
              <span align="center">FREE</span><br>
              
		<br><span align="center"><i><font style="font-size:11px">&nbsp;</font></i></span>
            </div>
          </div>
        </div>
        <!-- /.col-md-4 -->

        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title">Basic Plan <br><font style="font-size:14px">(<?php echo $curr. number_format($Pv,2);?>/Month)</font></h2>
              <p class="card-text">This is the Basic plan of the Finasol Cloud Solution.</p>
			  <p class="card-text">
			  <ul>
			  <li> Customer Management </li>
        <li> Account Opening</li>
			  <li> Loans & Payments Management </li>
			  <li> Thrift/Daily Contributions</li>
			  <li> Reports Generating</li>
			  <li> Company & Users Setup </li>
			  <li> Loan Types Settings</li> 
			  <li> Commissions Settings </li>
			  <li> Email & SMS Alert <font style="color:#FF0000">**</font> </li>
			  </ul>
			  </p>
            </div>
            <div class="card-footer" align="center">
              <span align="center"><?php echo $curr. number_format($Pv,2);?>/Month</span><br>
              <a class="btn btn-primary" target="_blank" href="https://flutterwave.com/pay/finasol_basic">Subscribe To Basic Plan</a>
		<br><span align="center"><i><font style="font-size:11px">Instant Access</font></i></span>
            </div>
          </div>
        </div>
        <!-- /.col-md-4 -->

        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title">Enterprise Plan <br><font style="font-size:14px">(<?php echo $curr. number_format($Ev,2);?>/Month)</font></h2>
              <p class="card-text">This is the Enterprise plan of the Finasol Cloud Solution. Unlimited User License.</p>
			 <p class="card-text">
			  <ul>
			  <li> Customer Management </li>
        <li> Account Opening</li>
        <li> Transactions: Deposit & Withdrawals </li>
			  <li> Loans & Payments Management </li>
			  <li> Thrift/Daily Contributions</li>
			  <li> Accounts Management </li>
			  <li> Reports Generating</li>
			  <li> Company & Users Setup </li>
			  <li> Account Types and Loan Types Settings </li> 
			  <li> Interests & Commissions Settings </li>
			  <li> Email & SMS Alert <font style="color:#FF0000">**</font></li>
			  </ul>
			 </p>
			  
            </div>
            <div class="card-footer" align="center">
              <span align="center"><?php echo $curr. number_format($Ev,2);?>/Month </span><br>
              <a class="btn btn-primary" target="_blank" href="https://flutterwave.com/pay/finasol_enterprise">Subscribe To Enterprise Plan</a>
		<br><span align="center"><i><font style="font-size:11px">Instant Access</font></i></span>
            </div>
          </div>

        </div>
        <div align="center" style="margin-left:15px;text-align:center;"><i><font style="color:#FF0000">**</font> You will need to purchase your SMS credits (Optional)</i></div>
        <!-- /.col-md-4 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Footer -->
    <?php
 require_once 'footer.php';
?>
