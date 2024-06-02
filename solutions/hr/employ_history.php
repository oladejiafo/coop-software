<?php
 require_once 'conn.php';
 $reff= $_REQUEST[mYxt];
$SNO=$_REQUEST['SNO'];
/*
$sql="SELECT `staff`.`Staff Number`,`staff`.`Surname`,`staff`.`Firstname` FROM `staff` WHERE `staff`.`staff Number`='$SNO'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);
*/
?>

<section class="panel">
									<header class="panel-heading">
										<h2 class="panel-title">Staff Employment History</h2>
									</header>
									<div class="panel-body">

<?php
  echo "<div><font color='#FF0000' style='font-size: 9pt'>" . $tval . "</font></div>";
 if($reff=="8!")
 {
	 require_once 'employment.php';
 } else {
	?>
	<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
		<thead>
			<tr>
				<th>Employer Name</th>
				<th>Position Held</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Location</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
<?php
    $query="SELECT `Staff Number`,`Employer`, `From`,`To`,`Location`,`Position` FROM `employment_history` where `Staff Number`='$SNO' order by `From` desc";
    $result=mysqli_query($conn,$query);
		if(mysqli_num_rows($result) == 0)
		{ 
				 echo("Nothing to Display!"); 
		} 
    while(list($ServiceNo,$employer,$from,$to,$location,$position)=mysqli_fetch_row($result))
    {
			?>
      <tbody>
        <tr class="gradeA">
          <td><?php echo '<a href = "staff.php?mYxt=8!&SNO=' . $ServiceNo . '#tabs1-cemployment">' .$employer. '</a>'; ?></td>
          <td><?php echo $position; ?></td>
          <td><?php echo $from; ?></td>
          <td><?php echo $to; ?></td>
          <td><?php echo $location; ?></td>          
          <td>&nbsp;</td>
        </tr>
    </tbody>
  <?php 
  }
?>
</TABLE>
<p align="center">
  <?php
     echo "<a href ='staff.php?mYxt=8!#tabs1-employment'> Add New Record </a>"; 
  ?>
<p>
<?php
 }
?>
</div>
</section>
