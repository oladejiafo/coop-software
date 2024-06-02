<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & $_SESSION['access_lvl'] != 5) 
{
 if ($_SESSION['access_lvl'] != 3 & $_SESSION['access_lvl'] != 33 & $_SESSION['access_lvl'] != 333 & $_SESSION['access_lvl'] != 4) 
 {
   $redirect = $_SERVER['PHP_SELF'];
   header("Refresh: 0; URL=../index.php?redirect=$redirect");
 }
}

 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';

?>

<title>HR | Cooperative Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Staff Records</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="hr.php">
										<i class="fa fa-list"></i>
									</a>
								</li>
								<li><span>HR</span></li>
							</ol>
					
							&nbsp;
						</div>
					</header>
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="../assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="../assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />


<section class="panel">
	<header class="panel-heading">
		<h2 class="panel-title"></h2>
	</header>
       <div class="panel-body">

<div class="services">
	<div class="container"  style="width:100%">
   <form  action="hr.php" method="post">
      <select size="1" name="cmbFilter" style="width:150px;height:35px">
      <option selected></option>
      <option value="Office">Office</option>
      <option value="Dept">Dept</option>
      <option value="Serving State">Serving State</option>
      <option value="Present Appt">Present Appt</option>
      <option value="Designation/Rank">Designation/Rank</option>
      <option value="Position">Position</option>
      <option value="Level">Level</option>
      <option value="State of Origin">State of Origin</option>
      <option value="LGA">LGA</option>
      <option value="Qualification">Qualification</option>
      <option value="Sex">Sex</option>
      <option value="Surname">Surname</option>
      <option value="Firstname">Firstname</option>
      <option value="Staff Number">Staff Number</option>
     </select>
     &nbsp; 
     <input type="text" name="filter" style="height:35px">
     &nbsp; 
     <input type="submit" value="Search" name="submit" style="height:35px">
   </form>

<div class="div-table">
 <?php
 $tval=$_GET['tval'];
 $limit      = 15;
 $page=$_GET['page'];

 $cmbFilter=$_REQUEST["cmbFilter"];
 $filter=$_REQUEST["filter"];

if ($cmbFilter=="Serving State")
{
  $cmbFilter="Present Location";
}
else if ($cmbFilter=="Designation/Rank")
{
  $cmbFilter="Present Rank";
}
else if ($cmbFilter=="State of Origin")
{
  $cmbFilter="State";
}
else if ($cmbFilter=="Office")
{
  $cmbFilter="Office";
}

 echo "<div><font color='#FF0000' style='font-size: 9pt'>" . $tval . "</font></div>";
?>
	<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
		<thead>
			<tr>
				<th>S/NO</th>
				<th>Staff No</th>
				<th>Surname</th>
				<th>First Name</th>
				<th>Department</th>
				<th>Designation</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
<?php

  if (!$cmbFilter=="")
  {  
   $query_count    = "SELECT * FROM `Staff` WHERE `" . $cmbFilter . "` like '" . $filter . "%'";
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $query="SELECT `ID`,`Staff Number`,Surname,Firstname,dept,`Present Rank` FROM Staff WHERE `" . $cmbFilter . "` like '" . $filter . "%' order by `level` desc LIMIT $limitvalue, $limit";
   $result=mysqli_query($conn,$query);

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 

$i=0;
    while(list($id,$ServiceNo,$Surname,$Firstname,$dept,$Rank)=mysqli_fetch_row($result))
    {
     $i=$i+1;
?>
		<tbody>
			<tr class="gradeA">
				<td><?php echo $i; ?></td>
				<td><?php echo '<a href = "staff.php?ID=' . $id . '&SNO=' .$ServiceNo. '">' .$ServiceNo. '</a>'; ?></td>
				<td><?php echo $Surname; ?></td>
				<td><?php echo $Firstname; ?></td>
				<td><?php echo $dept; ?></td>
				<td><?php echo $Rank; ?></td>
				<td>&nbsp;</td>
			</tr>
                </tbody>
<?php
    }
echo "</table>";
  }          
  else
  {
   $query_count    = "SELECT * FROM `staff`"; 
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

    $query="SELECT `ID`,`Staff Number`,Surname,Firstname,dept,`Present Rank` FROM Staff order by `level` desc LIMIT $limitvalue, $limit";
    $result=mysqli_query($conn,$query);

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 
$i=0;
    while(list($id,$ServiceNo,$Surname,$Firstname,$dept,$Rank)=mysqli_fetch_row($result))
    {
     $i=$i+1;
?>
		<tbody>
			<tr class="gradeA">
				<td><?php echo $i; ?></td>
				<td><?php echo '<a href = "staff.php?ID=' . $id . '&SNO=' .$ServiceNo. '">' .$ServiceNo. '</a>'; ?></td>
				<td><?php echo $Surname; ?></td>
				<td><?php echo $Firstname; ?></td>
				<td><?php echo $dept; ?></td>
				<td><?php echo $Rank; ?></td>
				<td>&nbsp;</td>
			</tr>
                </tbody>
<?php
    }
echo "</table>";
  }
 ?>
 </div>
</section>

<p align="center">
  <?php
     echo "<a href ='staff.php'> Add New Record </a>&nbsp;"; 
  ?>
</p>
</div>

<?php
require_once 'footerr.php';
?>

		<!-- Specific Page Vendor -->
		<script src="../assets/vendor/select2/select2.js"></script>
		<script src="../assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="../assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="../assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
   
		<!-- Examples -->
		<script src="../assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.tabletools.js"></script>