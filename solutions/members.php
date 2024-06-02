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
?>

<title>Membership Records | Cooperative Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Membership Records</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="members.php">
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

 <?php

 @$cmbFilter=$_REQUEST["cmbFilter"];
 @$filter=$_REQUEST["filter"];

if(empty($cmbFilter) OR $cmbFilter=="")
{
  $cmbFilter="ID";
  $filter="%";
}
?>
<section class="panel">
	<header class="panel-heading">
		<h2 class="panel-title">Members Register</h2>
	</header>
       <div class="panel-body">
	<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
		<thead>
			<tr>
				<th>Surname</th>
				<th>First Name</th>
				<th>Member No</th>
				<th>Type</th>
				<th>e-mail</th>
				<th>Phone</th>
				<th>Branch</th>
				<th>Status</th>
			</tr>
		</thead>
<?php

    $query="SELECT `ID`,`Surname`,`First Name`,`Membership Number`,`Membership Type`,`email`,`Mobile Number`,`Branch`,`Status` FROM `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND `" . $cmbFilter . "` like '" . $filter . "%' order by `Surname`, `ID` $limit";
    $result=mysqli_query($conn,$query);

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 

    while(list($id,$sname,$fname,$mnum,$mtype,$email,$phone,$branch,$mstatus)=mysqli_fetch_row($result))
    {
?>
		<tbody>
			<tr class="gradeA">
				<td><?php echo '<a href = "member.php?id=' . $id . '">' .$sname. '</a>'; ?></td>
				<td><?php echo $fname; ?></td>
				<td><?php echo $mnum; ?></td>
				<td><?php echo $mtype; ?></td>
				<td><?php echo $email; ?></td>
				<td><?php echo $phone; ?></td>
				<td><?php echo $branch; ?></td>
				<td><?php echo $mstatus; ?></td>
			</tr>
                </tbody>
<?php
    }
 ?>									
	</table>
</div>
<div align="center">
	<a href="member.php" class="btn btn-primary"><i class="fa fa-pencil"></i> Add A New Member</a> &nbsp;
	<a href="importmembers.php" class="btn btn-warning"><i class="fa fa-upload"></i> Import Members From Excel</a>&nbsp;
	<a href="temp/import/members.xls" class="btn btn-success"><i class="fa fa-download"></i> Download Excel Template</a>&nbsp;
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