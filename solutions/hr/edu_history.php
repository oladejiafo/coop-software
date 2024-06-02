<?php
 require_once 'conn.php';
 $reff= $_REQUEST['mYxt'];
 $SNO=$_REQUEST['SNO'];

$sql="SELECT `staff`.`Staff Number`,`staff`.`Surname`,`staff`.`Firstname` FROM `staff` WHERE `staff`.`staff Number`='$SNO'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);
?>

<section class="panel">
									<header class="panel-heading">
										<h2 class="panel-title">Education History</h2>
									</header>
									<div class="panel-body">


<?php
  echo "<div><font color='#FF0000' style='font-size: 9pt'>" . $tval . "</font></div>";
 if($reff=="6!")
 {
   require_once 'education.php';
 } else {
?>
<div>
	<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
		<thead>
			<tr>
				<th>School</th>
				<th>Qualification</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
<?php
    $query="SELECT `Staff Number`,`EduID`,`School`, `From`,`To`,`Qualification` FROM `education` where `Staff Number`='$SNO'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result) == 0)
    { 
         echo("No School Listed!"); 
    } 
    while(list($ServiceNo,$eduid,$school,$from,$to,$qualification)=mysqli_fetch_row($result))
    {
      ?>
      <tbody>
        <tr class="gradeA">
          <td><?php echo '<a href = "staff.php?mYxt=6!&SNO=' . $ServiceNo . '&EID=' . $eduid . '#tabs1-education">' .$school. '</a>'; ?></td>
          <td><?php echo $qualification; ?></td>
          <td><?php echo $from; ?></td>
          <td><?php echo $to; ?></td>
          <td>&nbsp;</td>
        </tr>
      </tbody>
  <?php     
    }
 ?>
</table>
</div>

<p align="center">
  <?php
     echo "<a href ='staff.php?mYxt=6!#tabs1-education'> Add New Record </a>&nbsp;"; 
  ?>
</p>
<?php
 }
?>

</div>
</section>
