<?php
 require_once 'conn.php';
 $reff= $_REQUEST[mYxt];
?>
								<section class="panel">
									<header class="panel-heading">
										<h2 class="panel-title">Staff Confidentials</h2>
									</header>
									<div class="panel-body">

<?php
  echo "<div><font color='#FF0000' style='font-size: 9pt'>" . $tval . "</font></div>";
 if($reff=="9!")
 {
   require_once 'warning.php';
 } else {
?>
   <form  action="staffsecret.php" method="post">
    <body bgcolor="#D2DD8F">
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
     <input type="text" name="filter">
     &nbsp; 
     <input type="submit" value="Go" name="submit">
   </form>

<div>
<form action="secret.php" method="post">
 <?php
  echo "<div><font color='#FF0000' style='font-size: 9pt'>" . $tval . "</font></div>";
 @$limit      = 15;
 @$page=$_GET['page'];

 @$cmbFilter=$_REQUEST["cmbFilter"];
 @$filter=$_REQUEST["filter"];

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
  $cmbFilter="Home State";
}
else if ($cmbFilter=="Office")
{
  $cmbFilter="Office";
}

?>
	<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
		<thead>
			<tr>
				<th>Staff Number</th>
				<th>Surname</th>
				<th>First Name</th>
				<th>Department</th>
				<th>Designation</th>
				<th>Location</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
<?php

  if (!$cmbFilter=="")
  {
   $query_count    = "SELECT * FROM `staff` WHERE `" . $cmbFilter . "` like '" . $filter . "%'"; 
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

    $query="SELECT `Staff Number`,Surname,Firstname,Dept,`Present Rank`,Level,`Present Location` FROM staff WHERE `" . $cmbFilter . "` like '" . $filter . "%' LIMIT $limitvalue, $limit";
    $result=mysqli_query($conn,$query);

   if(mysqli_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

    while(list($ServiceNo,$Surname,$Firstname,$Dept,$Rank,$Level,$Step)=mysqli_fetch_row($result))
    {
      ?>
      <tbody>
        <tr class="gradeA">
          <td><?php echo '<a href = "staff.php?mYxt=9!&SNO=' . $ServiceNo . '#tabs1-confidential">' .$ServiceNo. '</a>'; ?></td>
          <td><?php echo $Surname; ?></td>
          <td><?php echo $Firstname; ?></td>
          <td><?php echo $Dept; ?></td>
          <td><?php echo $Rank; ?></td>
          <td><?php echo $Step; ?></td>          
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

    $query="SELECT `Staff Number`,Surname,Firstname,Dept,`Present Rank`,Level,`Present Location` FROM staff LIMIT $limitvalue, $limit";
    $result=mysqli_query($conn,$query);

   if(mysqli_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 

    while(list($ServiceNo,$Surname,$Firstname,$Dept,$Rank,$Level,$Step)=mysqli_fetch_row($result))
    {
      ?>
      <tbody>
        <tr class="gradeA">
          <td><?php echo '<a href = "staff.php?mYxt=9!&SNO=' . $ServiceNo . '#tabs1-confidential">' .$ServiceNo. '</a>'; ?></td>
          <td><?php echo $Surname; ?></td>
          <td><?php echo $Firstname; ?></td>
          <td><?php echo $Dept; ?></td>
          <td><?php echo $Rank; ?></td>
          <td><?php echo $Step; ?></td>          
          <td>&nbsp;</td>
        </tr>
                  </tbody>
  <?php      

    }
    echo "</table>";
  }
 ?>
 </div>

<p align="center">
  <?php
     echo "<a href ='staff.php?mYxt=9!#tabs1-confidential'> Add New Record </a>&nbsp;"; 
  ?>
</p>
<?php
 }
?>
</div>
</section>
