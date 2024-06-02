<?php
 require_once 'conn.php';
 $reff= $_REQUEST[mYxt];
$SNO=$_REQUEST['SNO'];

$sql="SELECT `staff`.`Staff Number`,`staff`.`Surname`,`staff`.`Firstname` FROM `staff` WHERE `staff`.`staff Number`='$SNO'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);
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
		new JsDatePick({
			useMode:2,
			target:"inputFieldB",
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
	height:5em;
}

.cell {
    padding: 5px;
    border: 1px solid #e9e9e9;
   // text-align:center;
    float: left;
    padding: 5px; 
    background-color: #f5f5f5;
    width: 10%;
    height:4.7em;
    max-height: auto;
    font-size:12px;
    word-wrap: break-word;
}

@media (max-width: 480px){
.tab-row {
	background-color: #EEEEEE;
	float: left;
	width: 100%;
	height:5.5em;
}

.cell {
    padding: 1px;
    border: 1px solid #e9e9e9;
    float: left;
    padding: 5px; 
    background-color: #f5f5f5;
    width: 10%;
    height:5.3em;
    font-size:9px;
   // word-wrap: break-word;
}
}
</style>
</head>
<section class="panel">
  <header class="panel-heading">
    <h2 class="panel-title">LEAVE RECORDS</h2>
  </header>
  <div class="panel-body">
  
  <?php
  if($tval)
  {
    echo "<div><font color='#FF0000' style='font-size: 9pt'>" . $tval . "</font></div>";
  }
 if($reff=="4!")
 {
  require_once 'leave.php';
 } else {
 ?>
	<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
		<thead>
			<tr>
				<th>Leave Type</th>
				<th>Leave Start Date</th>
				<th>Leave End Date</th>
				<th>No. of Days</th>
				<th>Date Resumed</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
<?php
    $query="SELECT `Staff Number`,`LeaveID`, `Type`,`From`,`To`,`Days`,`Date Resumed` FROM `leave` where `Staff Number`='$SNO' order by `LeaveID` desc";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result) == 0)
    { 
         echo("Nothing to Display!"); 
    } 

    while(list($ServiceNo,$LeaveID,$Type,$From,$To,$Days,$DateResumed)=mysqli_fetch_row($result))
    {
      ?>
      <tbody>
        <tr class="gradeA">
          <td><?php echo '<a href = "staff.php?mYxt=4!&SNO=' . $ServiceNo . '#tabs1-leave">' .$Type. '</a>'; ?></td>
          <td><?php echo $From; ?></td>
          <td><?php echo $To; ?></td>
          <td><?php echo $Days; ?></td>
          <td><?php echo $DateResumed; ?></td>
          <td>&nbsp;</td>
        </tr>
    </tbody>
  <?php 
    }
 ?>
</TABLE>

<p align="center">
  <?php
     echo "<a href ='staff.php?mYxt=4!#tabs1-leave'> Add New Record </a>&nbsp;"; 
  ?>
</p>
<?php
 }
?>
</div>
</section>
