<?php
 require_once 'conn.php';
 $tday=date('Y-m-d');
 $yday= date('Y-m-d', strtotime('-1 day', strtotime($tday)));
 $xday= date('Y-m-d', strtotime('-2 day', strtotime($tday)));
 $wday= date('Y-m-d', strtotime('-3 day', strtotime($tday)));
 $vday= date('Y-m-d', strtotime('-30 day', strtotime($tday)));
?>

<script type="text/javascript" src="js/jquery-1.5.2.js"></script>

<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style2 {font-size: 11px}
.style3 {color: #CCCCCC}
.chart {
  width: 100%; 
  min-height: 130px;
    -moz-border-radius: 30px 30px 30px 30px;
    -webkit-border-radius: 30px 30px 30px 30px;
    border-radius: 15px;
}
 .rounded-corners {
    -moz-border-radius: 30px 30px 30px 30px;
    -webkit-border-radius: 30px 30px 30px 30px;
    border-radius: 15px;
}	
 @media only screen and (max-width: 460px) {
.chart {
  width: 100%; 
  height: 60%;
}
}
-->
</style>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var xdata = google.visualization.arrayToDataTable([
        ["Date", "Value", { role: "style" }, { role: "annotation" } ],
<?php

   $queryDP="SELECT `Loan Date`,sum(`Loan Amount`) as dep FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Loan Date` >= '" .$vday. "'  
             GROUP BY MONTH(`Loan Date`)";
   $resultDP=mysqli_query($conn,$queryDP);
$RD=0;
$dp=0;
    while(list($day,$depp)=mysqli_fetch_row($resultDP))
    {
      $RD=$RD+1;
      if ($RD==1 or $RD==9  or $RD==17 or $RD==25 or $RD==33 or $RD==41 or $RD==49) {$rd="Grey";};
      if ($RD==2 or $RD==10 or $RD==18 or $RD==26 or $RD==34 or $RD==42 or $RD==50) {$rd="Green";};
      if ($RD==3 or $RD==11 or $RD==19 or $RD==27 or $RD==35 or $RD==43 or $RD==51) {$rd="Maroon";};
      if ($RD==4 or $RD==12 or $RD==20 or $RD==28 or $RD==36 or $RD==44 or $RD==52) {$rd="Brown";};
      if ($RD==5 or $RD==13 or $RD==21 or $RD==29 or $RD==37 or $RD==45 or $RD==53) {$rd="Red";};
      if ($RD==6 or $RD==14 or $RD==22 or $RD==30 or $RD==38 or $RD==46 or $RD==54) {$rd="Green";};
      if ($RD==7 or $RD==15 or $RD==23 or $RD==31 or $RD==39 or $RD==47 or $RD==55) {$rd="Blue";};
      if ($RD==8 or $RD==16 or $RD==24 or $RD==32 or $RD==40 or $RD==48 or $RD==56) {$rd="Yellow";};

$dp=$dp+$depp;

?>
        ["<?php echo $day; ?>", <?php echo $depp; ?>, "stroke-color: #C5A5CF; stroke-width: 2; fill-color: <?php echo $rd; ?>","<?php echo $depp; ?>"],
<?php
} 
if(mysqli_num_rows($resultDP) == 0)
{
?>
        ["<?php echo date('Y-m-d'); ?>", 1, "stroke-color: #C5A5CF; stroke-width: 2; fill-color: Green","None Yet"],
<?php
}
?>

      ]);

      var viewDx = new google.visualization.DataView(xdata);
      viewDx.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 3,
                         type: "string",
                         role: "annotation" },
                       2]);

      var optionx = {
        title: "",
	subtitle: "<?php echo $dp; ?>",
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
	chart: { subtitle: "" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("dpchart_values"));
      chart.draw(viewDx, optionx);
  }
  </script>

<div class="chart" id="dpchart_values" style="background-color:#EFEFEF; width: 99%; height: 80%;">

</div>
