<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 2) & ($_SESSION['access_lvl'] != 1) & ($_SESSION['access_lvl'] != 3) & ($_SESSION['access_lvl'] != 4) & ($_SESSION['access_lvl'] != 6) & ($_SESSION['access_lvl'] != 7))
{
 if ($_SESSION['access_lvl'] != 5){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=index.php?redirect=$redirect");
}
}

 require_once 'conn.php';
 require_once 'header.php';
?>


<title>Welfares | Cooperative Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Welfares</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="welfares.php">
										<i class="fa fa-list"></i>
									</a>
								</li>
								<li><span>Records</span></li>
							</ol>
					
							&nbsp;
						</div>
					</header>

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />


<section class="panel">
	<header class="panel-heading">
		<h2 class="panel-title">Welfare Management</h2>
	</header>
       <div class="panel-body">

<div>
   <form  action="welfares.php" method="post">
     <div class="col-md-5"> Select Criteria to Search with:
     <select size="1" name="cmbFilter" style="height:35;width:190px; background-color:#E9FCFE; font-size: 12px">
      <option selected></option>
      <option value="Date">Date</option>
      <option value="Type">Type</option>
      <option value="Classification">Classification</option>
      <option value="Source">Source</option>
     </select></div>
     &nbsp; <div class="col-md-4">
     <input type="text" name="filter" style="height:35;width:150px; background-color:#E9FCFE; font-size: 12px">
     &nbsp; 
     <input type="submit" value="Search" name="submit" style="height:35;width:120px;">
</div>
   </form>
</div>

 <?php
 @$tval=$_GET['tval'];
 $limit      = 25;
 @$page=$_GET['page'];

 @$cmbFilter=$_REQUEST["cmbFilter"];
 @$filter=$_REQUEST["filter"];

 echo "<div><font color='#FF0000' style='font-size: 9pt'>" . $tval . "</font></div>";
?>
	<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
		<thead>
			<tr>
				<th>S/NO</th>
				<th>Date</th>
				<th>Type</th>
				<th>Classification</th>
                    <th>Amount Needed</th>
                    <th>Amount Raised</th>
				<th>Details</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
<?php

  if (!$cmbFilter=="")
  {  
   $query_count    = "SELECT * FROM `welfare` WHERE `Company` ='" .$_SESSION['company']. "' AND `Type`='Welfare' and `" . $cmbFilter . "` like '" . $filter . "%'";
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $query="SELECT `ID`,`Date`,`Type`,`Classification`,`Amount`,`Amount Raised`,`Particulars` FROM `welfare` WHERE `Company` ='" .$_SESSION['company']. "' AND `Type`='Welfare' and `" . $cmbFilter . "` like '" . $filter . "%' order by `Date` desc LIMIT $limitvalue, $limit";
   $result=mysqli_query($conn,$query);

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 

$i=0;
    while(list($id,$date,$type,$classification,$amount,$ramount,$particulars)=mysqli_fetch_row($result))
    {
     $i=$i+1;
?>
		<tbody>
			<tr class="gradeA">
				<td><?php echo $i; ?></td>
				<td><?php echo $date; ?></td>
				<td><?php echo $type; ?></td>
				<td><?php echo $classification; ?></td>
                    <td><?php echo $amount; ?></td>
                    <td><?php echo $ramount; ?></td>
				<td><?php echo $particulars; ?></td>
                    <td><a href = "welfare.php?ID=<?php echo $id;?>"><i class="fa fa-edit btn-lg"></i></a></td>
			</tr>
                </tbody>
<?php
    }
echo "</table>";
  }
  else
  {
   $query_count    = "SELECT * FROM `welfare` WHERE `Company` ='" .$_SESSION['company']. "' AND `Type`='Welfare'";
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $query="SELECT `ID`,`Date`,`Type`,`Classification`,`Amount`,`Amount Raised`,`Particulars` FROM welfare WHERE `Company` ='" .$_SESSION['company']. "' AND `Type`='Welfare' order by `Date` desc LIMIT $limitvalue, $limit";
   $result=mysqli_query($conn,$query);

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 

$i=0;
    while(list($id,$date,$type,$classification,$amount,$ramount,$particulars)=mysqli_fetch_row($result))
    {
     $i=$i+1;
?>
		<tbody>
			<tr class="gradeA">
				<td><?php echo $i; ?></td>
				<td><?php echo $date; ?></td>
				<td><?php echo $type; ?></td>
				<td><?php echo $classification; ?></td>
                    <td><?php echo $amount; ?></td>
                    <td><?php echo $ramount; ?></td>
				<td><?php echo $particulars; ?></td>
                    <td><a href = "welfare.php?ID=<?php echo $id;?>"><i class="fa fa-edit btn-lg"></i></a></td>
			</tr>
                </tbody>
<?php
    }
echo "</table>";
  }
 ?>
<div align="center">
  <?php
     echo "<a href ='welfare.php'> Add New Record </a>&nbsp;"; 
  ?>
</div>
 </div>
</section>


<?php
require_once 'footer.php';
?>

		<!-- Specific Page Vendor -->
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		

		<!-- Examples -->
		<script src="assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="assets/javascripts/tables/examples.datatables.tabletools.js"></script>