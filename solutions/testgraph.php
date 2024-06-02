<?php
# require_once 'header.php';
 require_once 'conn.php';
 #require_once 'style.php';

?>

<link rel="stylesheet" type="text/css" href="main.css" />
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style2 {font-size: 11px}
.style3 {color: #CCCCCC}
.chart3{
  width: 99%; 
  height: 99%;
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
-->
</style>

<?php
/*
     $duedate=date('Y-m-d', strtotime('+1 month',strtotime(date('Y-m-d'))));
     $sql_cl="SELECT count(distinct `Code`) as cntCL FROM `client` WHERE `Company` ='" .$_SESSION['company']. "' AND `Date Exited` > '" . $duedate . "' and `Name` not like 'Individual%'";
     $result_cl = mysql_query($sql_cl) or die('Could not look up user data; ' . mysql_error());
     $rowcl = mysql_fetch_array($result_cl);
     $cl=$rowcl['cntCL'];
     if(mysql_num_rows($result_cl) == 0)
     { 
      $cl=0;
     }
*/
$cl=$loanB;
/*
     $sql_cls="SELECT count(distinct `Code`) as cntCLs FROM `client` WHERE `Company` ='" .$_SESSION['company']. "' AND `Date Exited` <= '" . $duedate . "' and `Name` not like 'Individual%'";
     $result_cls = mysql_query($sql_cls,$conn) or die('Could not look up user data; ' . mysql_error());
     $rowcls = mysql_fetch_array($result_cls);
     $cls=$rowcls['cntCLs'];
     if(mysql_num_rows($result_cls) == 0)
     { 
      $cls=0;
     }
*/
 $cls=$loanTot;
$clients=$cl+$cls;
?>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart3);

    function drawChart3() {
      var data3 = google.visualization.arrayToDataTable([
        ["Clients", "Value"],

        ["Total Outstanding Loans", <?php echo $cl; ?>],
        ["Total Expired Loans", <?php echo $cls; ?>]
      ]);

      var options3 = {
        title: "",
	is3D: true,
        legend: { position: "yes" },
        chart: { subtitle: "" },
           };
      var chart3 = new google.visualization.PieChart(document.getElementById("piechart"));
      chart3.draw(data3, options3);

  }
  </script>

<div align="right" class="chart3" id="piechart" style="width: 98%; height: 98%;"></div>


</div>
