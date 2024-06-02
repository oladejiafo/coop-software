<?php
session_start();
if (!isset($_SESSION['user_id']))
{
  $redirect = $_SERVER['PHP_SELF'];
  header("Refresh: 0; URL=indexx.php?redirect=$redirect");
}
 require_once 'conn.php';
@$tval=$_REQUEST['tval'];
 $cmbTable = $_REQUEST["cmbTable"];
 $filter = $_REQUEST["filter"];
 $pagg=$_REQUEST['pagg'];
?>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/refreshform.css" />
<html>
<div align="left" style="width:auto;">
 <table border="0" bordercolor='#003300' width="99%" cellspacing="1" bgcolor="#EFEFEF" style='background:url(css/images/logo2.PNG) center;'>
 <?php
 if(isset($_SESSION['user_id']))
 {
 ?>
 <tr><td colspan=2 align="center">
   <form target="_parent" action="index0.php" method="POST">

      <select size="1" name="cmbTable"  style="border:outset;height:35px">
      <option disabled selected hidden>- Select Classification Here -</option>
          <?php 

         	$sqlt = "SELECT distinct `Classification` FROM `budget` WHERE `Company` ='" .$_SESSION['company']. "' ORDER BY `Classification`;";
        	$resultt = mysqli_query($conn,$sqlt) or die('Invalid query: ' . mysqli_error());
        	while ($rows = mysqli_fetch_array($resultt))
	{
    	     echo "<option>" . $rows['Classification'] . "</option>\n";
    	} 
          ?> 
     </select>
     &nbsp; 
     <input type="text" name="filter" placeholder="Enter Year"  onkeypress="return isNumber(event)" style="width:130px;height:35px">
     &nbsp; 
     <input type="submit" value="Filter" name="submit" style="height:34px;background-color:#cccccc; border:outset; width: 100px">

   </form>

 </td></tr>

<?php
}
if (empty($cmbTable) or $cmbTable=="")
{
 $cmbTable="%";
}
if (empty($filter) or $filter=="")
{
 $filter="%";
}

 $qry_count    = "SELECT distinct `Classification` FROM `budget` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Classification` like '$cmbTable%' and `Year` like '$filter%' order by `Classification`"; 
 $reslt_count   = mysqli_query($conn,$qry_count);     
 $totrw  = mysqli_num_rows($reslt_count);
 
 $limitt=1;
 if(empty($pagg))
 {
   $pagg = 1;
 }
 $limivalu = $pagg * $limitt - ($limitt);  

if (empty($cmbTable) or $cmbTable=="")
{
 $qry="SELECT `Classification`,`Year` FROM `budget` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Classification` like '$cmbTable%' and `Year` like '$filter%' order by `Classification` LIMIT $limivalu, $limitt";
} else {
 $qry="SELECT distinct `Classification`,`Year` FROM `budget` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Classification` like '$cmbTable%' and `Year` like '$filter%' order by `Classification` LIMIT $limivalu, $limitt";
}
$reslt=mysqli_query($conn,$qry);


 if($pagg==$totrw)
 {
   $pagg=0;
 } 
  $paggprev = $pagg-1;
  $paggnext = $pagg+1;

?>

<?php
  echo "<TR><TH align=left colspan=1 width='90%' style='margin-left:10px; margin-right:10px'>";    

  echo "</TH>";
  echo "<TH align=right width='10%'>"; 

  #echo '<a href="rptgraph.php?cmbTable=' . $cmbTable . '" target="_blank" title="Click to preview"> Preview This</a>&nbsp;&nbsp;&nbsp;&nbsp;';
  echo "</font></TH></TR>";

 @$limit      	= 8;
 @$page			=$_GET['page'];

 if(empty($page))
 {
        $page = 1;
 }

 $limitvalue = $page * $limit - ($limit);  
 echo "<tr><td align='center' width='90%' valign='top' style='margin-left:10px; margin-right:10px'>";

 echo "<Table width='100%'>";

 echo "<TR bgcolor='#cbd9d9'><TH height='10px' valign='top'> <b>Year </b>&nbsp;</TH><TH valign='top'> <b>Description </b>&nbsp;</TH><TH valign='top'><b>Budget</b>&nbsp;</TH><TH valign='top'><b>Revenue</b>&nbsp;</TH><TH valign='top'><b>Expenditure</b>&nbsp;</TH></TR>";
/*
while(list($faa,$dattes)=mysql_fetch_row($reslt))
{
*/
 @$query_count 	= "SELECT * FROM `budget` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Classification` like '$cmbTable%' and `Year` like '$filter%'";
 @$result_count	= mysqli_query($conn,$query_count);     
 @$totalrows  	= mysqli_num_rows($result_count);

 $query="SELECT `ID`,`Year`,`Classification`, sum(`Budget`) FROM `budget` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Classification` like '$cmbTable%' and `Year` like '$filter%' group by `Classification`,`Year` order by `Classification`,`Year` LIMIT $limitvalue, $limit";
 $result=mysqli_query($conn,$query);

 if(mysqli_num_rows($result) == 0)
 { 
    echo("Nothing to Display!"); 
 }
$ansYY=0;
$ansRR=0;
$ansEE=0;

 while(list($id,$yr,$mdaa, $kudi)=mysqli_fetch_row($result))
 { 
   $qr1="SELECT sum(`Amount`) as grR FROM `cash` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Type`='Revenue' and year(`Date`) = '$yr' and `Classification`='$mdaa'";
   $rr1=mysqli_query($conn,$qr1);
   $rwr1 = mysqli_fetch_array($rr1);
   $revGR=$rwr1['grR'];  
 
   $qr2="SELECT sum(`Amount`) as grE FROM `cash` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Type`='Expenditure' and year(`Date`) = '$yr' and `Classification`='$mdaa'";
   $rr2=mysqli_query($conn,$qr2);
   $rwr2 = mysqli_fetch_array($rr2);
   $expGR=$rwr2['grE'];  

     $kudiYY=$ansYY+$kudi;
     $kudiRR=$ansRR+$revGR;
     $kudiEE=$ansEE+$expGR;

     $KY=number_format($kudi,2);
     $expG=number_format($expGR,2);
     $revG=number_format($revGR,2);
     echo "<TR bgcolor='#e0e0e0'><TH height='35px' valign='top'><font style='font-size:12px'>$yr </font></TH><TH valign='top'><a href='graph.php?cmbTable=$mdaa&filter=$yr'><font style='font-size:12px;color:#000'>$mdaa </font></a></TH><TH align='right' valign='top'><font style='font-size:11px'> $KY </font></TH><TH align='right' valign='top'><font style='font-size:11px'> $revG </font></TH><TH align='right' valign='top'><font style='font-size:11px'> $expG </font></TH></TR>";

 }

   $qr0="SELECT sum(`Budget`) as grB FROM `budget` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Year` like '$filter'";
   $rr0=mysqli_query($conn,$qr0);
   $rwr0 = mysqli_fetch_array($rr0);
   $revGB=$rwr0['grB'];  

   $qr1="SELECT sum(`Amount`) as grR FROM `cash` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Type`='Revenue' and year(`Date`) like '$filter'";
   $rr1=mysqli_query($conn,$qr1);
   $rwr1 = mysqli_fetch_array($rr1);
   $revGR=$rwr1['grR'];  

   $qr2="SELECT sum(`Amount`) as grE FROM `cash` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Type`='Expenditure' and year(`Date`) like '$filter'";
   $rr2=mysqli_query($conn,$qr2);
   $rwr2 = mysqli_fetch_array($rr2);
   $revGE=$rwr2['grE'];  

     $KYY=number_format($revGB,2);
     $KRR=number_format($revGR,2);
     $KEE=number_format($revGE,2);

#     $KYY=number_format($kudiYY,2);
#     $KRR=number_format($kudiRR,2);
#     $KEE=number_format($kudiEE,2);

  echo "<TR bgcolor='#cbd9d9'><TH height='45px'>&nbsp;</TH><TH>&nbsp;</TH><TH align='right'><font style='font-size:11px'>$KYY</font></TH><TH align='right'><font style='font-size:11px'>$KRR</font></TH><TH align='right'><font style='font-size:11px'>$KEE</font></TH></TR>";
echo"</TABLE>";
?>
</td>
<td width="90%" style="border-left:dashed">
<?php

 @$pagex	=$_REQUEST['pagex'];
 @$queryx_count 	= "SELECT * FROM `budget` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Classification` like '$cmbTable%' and `Year` like '$filter%' group by `Classification`,`Year`";
 @$resultx_count	= mysqli_query($conn,$queryx_count);     
 @$totalrowx  	= mysqli_num_rows($resultx_count);

$limitx=1;

 if(empty($pagex))
 {
   $pagex = 1;
 }
 if(empty($pagexnext))
 {
   $pagexnext = 0;
 }

 $limitvaluex = $pagex * $limitx - ($limitx);  

 $queryX="SELECT `ID`,`Classification`,`Year`,sum(`Budget`) FROM `budget` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Classification` like '$cmbTable%' and `Year` like '$filter%' group by `Classification`,`Year` order by `Classification`,`Year` LIMIT $limitvaluex, $limitx";
 $resultX=mysqli_query($conn,$queryX);

 while(list($idx,$mdax,$yrx, $amtx)=mysqli_fetch_row($resultX))
 {
  $q1="SELECT sum(`Amount`) as ansR FROM `cash` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Type`='Revenue' and year(`Date`) = '$yrx' and `Classification`='$mdax'";
  $r1=mysqli_query($conn,$q1);
  $rw1 = mysqli_fetch_array($r1);
  $revx=$rw1['ansR'];  
  
  $q2="SELECT sum(`Amount`) as ansE FROM `cash` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Type`='Expenditure' and year(`Date`) = '$yrx' and `Classification`='$mdax'";
  $r2=mysqli_query($conn,$q2);
  $rw2 = mysqli_fetch_array($r2);
  $expx=$rw2['ansE'];    

$title=$mdax . "-" . $yrx . ", Financial Summary";
$budx=$amtx;    
#}
?>
<?php
 if($pagex==$totalrowx)
 {
   $pagex=0;
   $pagexnext = 0;
 }
?>
<?php

 $pagexnext = $pagex+1;
 $pagexprev = $pagex-1;

if(!$expx or empty($expx))
{ $expx=0; }
if(!$revx or empty($revx))
{ $revx=0; }
if(!$budx or empty($budx))
{ $budx=0; }
?>
<script>
var myVar = setInterval(function(){ myTimer() }, 30000);
function myTimer() 
{
    var d = new Date();
    var t = d.toLocaleTimeString();
	self.location='graph.php?cmbTable=<?php echo $cmbTable;?>&filter=<?php echo $filter;?>&dattx=<?php echo $dattx;?>&pagex=<?php echo $pagexnext;?>';
}
</script>

<b><font color="#FF0000" style="font-size: 9pt"><?php echo $tval ; ?></font></b>	
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
google.charts.load('current', {
  callback: function () {
    var data = google.visualization.arrayToDataTable([
      ['Year', 'Budget', 'Revenue','Expenditure'],
      ['<?php echo $yrx; ?>', <?php echo $budx; ?>, <?php echo $revx; ?>,<?php echo $expx; ?>]
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1, {
        calc: 'stringify',
        sourceColumn: 1,
        type: 'string',
        role: 'annotation'
      }, 2, {
        calc: 'stringify',
        sourceColumn: 2,
        type: 'string',
        role: 'annotation'
    }, 3, {
        calc: 'stringify',
        sourceColumn: 3,
        type: 'string',
        role: 'annotation'
    }]);

      var options = {
        title: "<?php echo $title; ?>",
        subtitle: "",
        width: 440,
        height: 230,
        bar: {groupWidth: "70%"},
        legend: { position: "bottom" },
        chart: { subtitle: "Financials" },
 colors: ['#c68e17', 'green','maroon']
      };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    chart.draw(view, options);
  },
  packages: ['corechart']
});

  </script>

<script src="https://www.gstatic.com/charts/loader.js"></script>
<div id="chart_div"></div>

			<p></td>
		</tr>
	</table>	
<?php
}
#}
?>
</div>
</html>
