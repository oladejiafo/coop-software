<?php
 require_once 'conn.php';

$SNO=$_REQUEST['SNO'];

$sql="SELECT `staff`.`Staff Number`,`staff`.`Surname`,`staff`.`Firstname` FROM `staff` WHERE `staff`.`staff Number`='$SNO'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);
$reff= $_REQUEST[mYxt];
?>
								<section class="panel">
									<header class="panel-heading">
										<h2 class="panel-title">Staff Trainings</h2>
									</header>
									<div class="panel-body">


<?php
 echo "<div><font color='#FF0000' style='font-size: 9pt'>" . $tval . "</font></div>";
 if($reff=="5!")
 {
   require_once 'train_update.php';
 } else {
?>
	<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
		<thead>
			<tr>
				<th>Staff Number</th>
				<th>Description</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Location</th>
				<th>Organizer</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
<?php
    $query="SELECT `Staff Number`,`Description`, `Start Date`,`End Date`,`Location`,`Organizer`,`Category` FROM `training` where `Staff Number`='$SNO' order by `End Date` desc";
    $result=mysqli_query($conn,$query);

    while(list($serviceno,$description,$start,$end,$location,$organizer,$category)=mysqli_fetch_row($result))
    {
      ?>
      <tbody>
        <tr class="gradeA">
          <td><?php echo '<a href = "staff.php?mYxt=5!&SNO=' . $ServiceNo . '&LID=' . $start . '#tabs1-training">' .$ServiceNo. '</a>'; ?></td>
          <td><?php echo $description; ?></td>
          <td><?php echo $start; ?></td>
          <td><?php echo $end; ?></td>
          <td><?php echo $location; ?></td>
          <td><?php echo $organizer; ?></td>          
          <td>&nbsp;</td>
        </tr>
                  </tbody>
  <?php
    }
 ?>
</table>
<p align="center">
  <?php
     echo "<a href ='staff.php?mYxt=5!#tabs1-training'> Add New Record </a>&nbsp;"; 
  ?>
</p>
<?php
 }
?>
</div>
</section>