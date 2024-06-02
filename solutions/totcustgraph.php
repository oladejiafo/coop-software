<?php
 require_once 'conn.php';
?>

<script type="text/javascript" src="js/jquery-1.5.2.js"></script>

<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style2 {font-size: 11px}
.style3 {color: #CCCCCC}
.chart {
  width: 100%; 
  min-height: 150px;
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
  height: 50%;
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

   $queryY="SELECT `Gender`, count( `ID` ) FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND `Status` ='Active' group by `Gender`";
   $resultY=mysqli_query($conn,$queryY);
$RR=0;
$dd=0;
    while(list($name,$code)=mysqli_fetch_row($resultY))
    {
      $RR=$RR+1;
      if ($RR==1 or $RR==9 or $RR==17 or $RR==25 or $RR==33 or $RR==41 or $RR==49) {$rr="Yellow";};
      if ($RR==2 or $RR==10 or $RR==18 or $RR==26 or $RR==34 or $RR==42 or $RR==50) {$rr="Red";};
      if ($RR==3 or $RR==11 or $RR==19 or $RR==27 or $RR==35 or $RR==43 or $RR==51) {$rr="Blue";};
      if ($RR==4 or $RR==12 or $RR==20 or $RR==28 or $RR==36 or $RR==44 or $RR==52) {$rr="Green";};
      if ($RR==5 or $RR==13 or $RR==21 or $RR==29 or $RR==37 or $RR==45 or $RR==53) {$rr="Cyan";};
      if ($RR==6 or $RR==14 or $RR==22 or $RR==30 or $RR==38 or $RR==46 or $RR==54) {$rr="Violet";};
      if ($RR==7 or $RR==15 or $RR==23 or $RR==31 or $RR==39 or $RR==47 or $RR==55) {$rr="Orange";};
      if ($RR==8 or $RR==16 or $RR==24 or $RR==32 or $RR==40 or $RR==48 or $RR==56) {$rr="Indigo";};

$dd=$dd+$code;
if($name=="")
{
   $name="Others";
}
?>
        ["<?php echo $name; ?>", <?php echo $code; ?>, "stroke-color: #C5A5CF; stroke-width: 2; fill-color: <?php echo $rr; ?>","<?php echo $code; ?>"],
<?php
} 
?>

      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 3,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Total Members by Gender... Total: <?php echo $dd; ?>",
	subtitle: "<?php echo $dd; ?>",
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
	chart: { subtitle: "" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);

  }
  </script>

<div class="chart" id="columnchart_values" style=" background-color:#EFEFEF; width: 95%; height: 56%;">

</div>
