<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['user_id']) & ($_SESSION['access_lvl'] != 5) & ($_SESSION['access_lvl'] != 4) & ($_SESSION['access_lvl'] != 6) & ($_SESSION['access_lvl'] != 7) & ($_SESSION['access_lvl'] != 1) & ($_SESSION['access_lvl'] != 3))
{
 if ($_SESSION['access_lvl'] != 2){
#$tval="Sorry, but you don�t have permission to view this page! Login pls";
header("location:index.php?tval=$tval&redirect=$redirect");
}
}
 require_once 'header.php';
 require_once 'conn.php';

@$clas=$_REQUEST['clas'];

if(!$clas)
{
 $clas="%";
}
?>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
<!-- 	
<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.css" />
-->
<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>

<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"inputField",
			dateFormat:"%Y-%m-%d"
		});
	};
</script>

<style type="text/css">
.div-table {
    width: 100%;
//    border: 1px solid;
    float: left;
    width: 100%;
	padding:30px;
}

.tab-row {
	background-color: #EEEEEE;
	float: left;
	width: 100%;
	height:140px;
}

.cell {
    padding: 5px;
    border: 1px solid #e9e9e9;
   // text-align:center;
    float: left;
    padding: 5px; 
    background-color: #f5f5f5;
    width: 10%;
    height:130px;
    max-height: auto;
    font-size:12px;
    word-wrap: break-word;
}

@media (max-width: 480px){
.tab-row {
	background-color: #EEEEEE;
	float: left;
	width: 100%;
	height:140px;
}

.cell {
  //  padding: 1px;
    border: 1px solid #e9e9e9;
    float: left;
    //padding: 5px; 
    background-color: #f5f5f5;
    //width: 10%;
    height:130px;
    font-size:9px;
    word-wrap: wrap;
}
}
</style>
</head>

<title>Attendance | Thrift & Loans Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Membership Attendance</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="attendance.php">
										<i class="fa fa-list"></i>
									</a>
								</li>
								<li><span>Register</span></li>
							</ol>
					
							&nbsp;
						</div>
					</header>


		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />


<div class="services">
	<div class="container" style="width:100%">
<section class="panel">
	<header class="panel-heading">
		<h2 class="panel-title"></h2>
	</header>
       <div class="panel-body">

<div align="left">
   <form  action="attendance.php" method="post">
     <input style="height:30; width:150;" placeholder="Enter Date" id="inputField" type="text" name="dt">
     &nbsp; 
      <select  style="height:40; width:150;" placeholder="Select Criteria #1" name="cmbFilter1">
      <option selected></option>
      <option value="Surname">Surname</option>
      <option value="First Name">Firstname</option>
      <option value="Membership Number">Membership Number</option>
     </select>
     &nbsp; 
     <input  style="height:30; width:150;" placeholder="Enter Value" type="text" name="filter1">
     <input type="submit" value="Search" name="submit"  style="height:30; width:150;">
   </form>
</div>

<div align="left" class="div-table">

 <?php
 @$tval=$_GET['tval'];
 @$limit      = 25;
 @$page=$_GET['page'];

 @$cmbFilter1=$_REQUEST["cmbFilter1"];
 @$filter1=$_REQUEST["filter1"];
 @$cmbFilter2=$_REQUEST["cmbFilter2"];
 @$filter2=$_REQUEST["filter2"];
 @$dt=$_REQUEST["dt"];
 @$dtt=date('d F, Y',strtotime($_REQUEST["dt"]));


if ($dt=="" or empty($dt))
{
  $dt=date('Y-m-d');
  $dtt=date('d F, Y');
}
if ($cmbFilter1=="" or empty($cmbFilter2))
{
  $cmbFilter1="Surname";
}

 echo "<p><font color='#FF0000' style='font-size: 10pt; font-weight:bold; text-align: center;'>" . $tval . "</font></p>";

   $query_count    = "SELECT * FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `" . $cmbFilter1 . "` like '$filter1%' and `Status` ='Active'"; 
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

  echo "<div valign='top' style='height:40px;border-bottom: 1px dotted #808080'><span align='left' style='width:50%; float:left;'><font color='#FF0000' style='font-size: 12pt; text-align: left;'><b>$dtt </b></font></span><span align='right' style='width:50%; float:right;'><font color='#FF0000' style='font-size: 12pt; text-align: right;'>";    

if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"attendance.php?cmbFilter1=$cmbFilter1&filter1=$filter1&cmbFilter2=$cmbFilter2&filter2=$filter2&dt=$dt&page=$pageprev\">PREV PAGE</a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
    }
    else 

    @$numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"attendance.php?cmbFilter1=$cmbFilter1&filter1=$filter1&cmbFilter2=$cmbFilter2&filter2=$filter2&dt=$dt&page=$pagenext\">NEXT PAGE</a>");  
            
    }           
 echo "</font></span></div>";

   $query="SELECT `ID`,`membership`.`Membership Number`,`membership`.Surname, `membership`.`First Name`, `membership`.`Membership Type` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND  `" . $cmbFilter1 . "` like '$filter1%' and `Status` ='Active' LIMIT $limitvalue, $limit";
   $result=mysqli_query($conn,$query);

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 

    while(list($xid,$SNO,$Surname,$Firstname,$Type)=mysqli_fetch_row($result))
    {
     $queryi="SELECT `Membership No`,`Attendance`, `Note`, `Date` FROM `attendance` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Membership No`='$SNO' and `Date`='$dt'";
     $resulti=mysqli_query($conn,$queryi);
     $rowi  = mysqli_fetch_array($resulti);
     $trowi = mysqli_num_rows($resulti);

     echo '	
        <div class="tab-row"> 
        <div align="center" class="cell" style="width:14%;border-top: 1px dotted #808080">';

    if (file_exists("images/pics/" . $xid . ".jpg")==1)
    {
         ?>
         <img border="1" src="images/pics/<?php echo $xid; ?>.jpg" width="100" height="100">
         <?php
     } else {
         ?>
         <img border="1" src="images/pics/pix.jpg" width="100" height="100">	 
          <?php   
     }	

     @$oruko= $Firstname . ' ' . $Surname;
    echo '</div>
        <div  class="cell" style="width:16.6%;border-top: 1px dotted #808080" align="left"><font face="Verdana" color="#000" style="font-size: 12pt">' . $oruko . '</font></div>
        <div  class="cell" style="width:18.7%;border-top: 1px dotted #808080" align="left"><font face="Verdana" color="#ff8080" style="font-size: 12pt">';

     if ($rowi['Attendance']=='')
     {
       echo "<a href='addattend.php?sno=$SNO&class=$Class&dt=$dt&att=Present&cmbFilter1=$cmbFilter1&filter1=$filter1&cmbFilter2=$cmbFilter2&filter2=$filter2' title='Mark as present'><img border='0' src='images/thumb_up.png' width='16' height='16'><font color='#6699CC' style='font-size: 12pt'> Present</font></a></font> <br>~~<br> <a href='addattend.php?sno=$SNO&class=$Class&dt=$dt&att=Absent&cmbFilter1=$cmbFilter1&filter1=$filter1&cmbFilter2=$cmbFilter2&filter2=$filter2'  title='Mark as absent'><font face='Verdana' color='#ff8080' style='font-size: 12pt'><img border='0' src='images/thumb_down.png' width='16' height='16'> Absent</font></a>";
     } else {
       echo "<img border='0' src='images/thumb_up.png' width='16' height='16'><font color='#6699CC'> Present</font> <br>~~<br> <font face='Verdana' color='#ff8080' style='font-size: 12pt'><img border='0' src='images/thumb_down.png' width='16' height='16'> Absent</font>";
     }
    echo '</div>
        <div  class="cell" style="width:16.6%;border-top: 1px dotted #808080" align="left"><font face="Verdana" color="#000" style="font-size: 12pt">' . $Type . ' Member</font></div>
        <div  class="cell" style="width:16.6%;border-top: 1px dotted #808080" align="left"><font face="Verdana" color="#ff8080" style="font-size: 12pt">';
      if ($trowi == 0)
      {
       echo '-----'; 
      } else {
       if ($rowi['Attendance']=='Present')
       {
         echo $rowi['Attendance'] . " <img border='0' src='images/check.jpg' width='22' height='22'> &nbsp; <a href='addattend.php?sno=$SNO&class=$Class&dt=$dt&adt=Delete&cmbFilter1=$cmbFilter1&filter1=$filter1&cmbFilter2=$cmbFilter2&filter2=$filter2' title='Undo'><font face='Verdana' color='red' style='font-size: 7pt'>(u)</font></a>";
       } else {
         echo $rowi['Attendance'] . " <img border='0' src='images/cancel.jpg' width='27' height='27'> &nbsp; <a href='addattend.php?sno=$SNO&class=$Class&dt=$dt&adt=Delete&cmbFilter1=$cmbFilter1&filter1=$filter1&cmbFilter2=$cmbFilter2&filter2=$filter2' title='Undo'><font face='Verdana' color='red' style='font-size: 7pt'>(u)</font></a>";
       }
      }
    echo '</div>
        <div  class="cell" style="width:16.6%;border-top: 1px dotted #808080" align="left"><font face="Verdana" color="#000" style="font-size: 12pt">';
?>

<form method="post" action="addattend.php">

Note:<input type='text' name="note" size='10' value="<?php echo $rowi['Note']; ?>"> 
<input type='hidden' name='class' size='10' value="<?php echo $Type; ?>">
<input type='hidden' name='sno' size='10' value="<?php echo $SNO; ?>">
<input type='hidden' name='dt' size='10' value="<?php echo $_REQUEST['dt']; ?>">

<input type='hidden' name='cmbFilter1' size='10' value="<?php echo $cmbFilter1; ?>">
<input type='hidden' name='cmbFilter2' size='10' value="<?php echo $cmbFilter2; ?>">
<input type='hidden' name='filter1' size='10' value="<?php echo $filter1; ?>">
<input type='hidden' name='filter2' size='10' value="<?php echo $filter2; ?>">

<input name="submit" type="submit"  style="background-image:url(images/check.jpg); width:70; height:30; background-repeat:no repeat; color:#990000" value="Save Note" align="top">
</form>
<?php
    echo '</div>
      </div>';
    } 

 ?>
</div>
</font>

</div>
  </div>
<?php
require_once 'footer.php';
?>