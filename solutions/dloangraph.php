<?php
 require_once 'conn.php';
 $tday=date('Y-m-d');
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
  height: 40%;
}
}
-->
</style>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Yes or No", "Value", { role: "style" }, { role: "annotation" } ],
<?php

   $queryWK="SELECT `Date`,sum(`Amount`) as dl FROM `contributions` WHERE `Company` ='" .$_SESSION['company']. "'
             AND  (DATE( `Date` ) >= DATE_ADD( '" .$tday. "', INTERVAL -1 MONTH)) 
             GROUP BY `Date`";
   $resultWK=mysqli_query($conn,$queryWK);
$RW=0;
$dw=0;
    while(list($week,$dyloan)=mysqli_fetch_row($resultWK))
    {
      $RW=$RW+1;
      if ($RW==1 or $RW==9 or $RW==17 or $RW==25 or $RW==33 or $RW==41 or $RW==49) {$rw="Indigo";};
      if ($RW==2 or $RW==10 or $RW==18 or $RW==26 or $RW==34 or $RW==42 or $RW==50) {$rw="Cyan";};
      if ($RW==3 or $RW==11 or $RW==19 or $RW==27 or $RW==35 or $RW==43 or $RW==51) {$rw="Orange";};
      if ($RW==4 or $RW==12 or $RW==20 or $RW==28 or $RW==36 or $RW==44 or $RW==52) {$rw="Violet";};
      if ($RW==5 or $RW==13 or $RW==21 or $RW==29 or $RW==37 or $RW==45 or $RW==53) {$rw="Red";};
      if ($RW==6 or $RW==14 or $RW==22 or $RW==30 or $RW==38 or $RW==46 or $RW==54) {$rw="Green";};
      if ($RW==7 or $RW==15 or $RW==23 or $RW==31 or $RW==39 or $RW==47 or $RW==55) {$rw="Blue";};
      if ($RW==8 or $RW==16 or $RW==24 or $RW==32 or $RW==40 or $RW==48 or $RW==56) {$rw="Yellow";};

$dw=$dw+$dyloan;
?>
        ["<?php echo $week; ?>", <?php echo $dyloan; ?>, "stroke-color: #C5A5CF; stroke-width: 2; fill-color: <?php echo $rw; ?>","<?php echo $dyloan; ?>"],
<?php
}
if(mysqli_num_rows($resultWK) == 0)
{
?>
        ["<?php echo date('Y-m-d'); ?>", 1, "stroke-color: #C5A5CF; stroke-width: 2; fill-color: red","None Yet"],
<?php
}
?>

      ]);

      var viewW = new google.visualization.DataView(data);
      viewW.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 3,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Monthly Contributions... Total: <?php echo $dw; ?>",
	subtitle: "<?php echo $dw; ?>",
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
	chart: { subtitle: "" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("wkchart_values"));
      chart.draw(viewW, options);

  }
  </script>

<div class="chart" id="wkchart_values" style=" background-color:#EFEFEF; width: 95%; height: 40%;">

</div>
