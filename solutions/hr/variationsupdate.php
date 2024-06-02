<?php
 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';
#session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & $_SESSION['access_lvl'] != 5) 
{
 if ($_SESSION['access_lvl'] != 1) 
 {
   $redirect = $_SERVER['PHP_SELF'];
   header("Refresh: 0; URL=../index.php?redirect=$redirect");
 }
}

@$SNO=$_REQUEST['SNO'];
@$id=$_REQUEST['id'];

$sql="SELECT `ID`,`Staff Number`,`Name`,`Type`,`For Month`,`Variation`,`Description`,`SortOrder`,
      `AllowID`,`Typ`,`Office`,`Year` FROM `variation` WHERE `ID`='$id'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);
?>

<title>Payroll | Cooperative Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Variations</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="variations.php">
										<i class="fa fa-list"></i>
									</a>
								</li>
								<li><span>Variations</span></li>
							</ol>
					
							&nbsp;
						</div>
					</header>
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="../assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="../assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />


<section class="panel">
	<header class="panel-heading">
		<h2 class="panel-title">Variations Updates</h2>
	</header>
       <div class="panel-body">

<div class="services">
	<div class="container"  style="width:100%">

<div align="right">
<legend><b><i><font size="2" face="Tahoma" color="#000000"> <?php require_once 'payheader.php'; ?>
</font></i></b></legend>
</div>

<form action="submitvar.php" method="post">
 <div class='container' style="width:100%">
<div align="left" class="agileinfo_mail_grids">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Staff Number">Staff Number</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="serviceno" size="31" value="<?php echo $row['Staff Number']; ?>">
        <input type="hidden" name="id" size="31" value="<?php echo $row['ID']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Staff Name">Staff Name</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="staffname" size="31" value="<?php echo $row['Name']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Description">Description</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="description" size="31" value="<?php echo $row['Description']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Variation Amount">Variation Amount</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " type="text" name="variationamount" size="31" value="<?php echo $row['Variation']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Variation Type">Variation Type</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" "  name="variationtype" width="31" value="<?php echo $row['Type']; ?>">  
          <?php  
           echo '<option selected>' . $row['Type'] . '</option>';
           $sql = "SELECT * FROM `variation type`";
           $result_vt = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_vt)) 
           {
             echo '<option>' . $rows['Variation Type'] . '</option>';
           }
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Month Applicable">Month Applicable</span>
	</label>
      <select class="input__field input__field--chisato" placeholder=" " size="1" name="cmbMonth">
       <option selected>- Select Month-</option>
       <option>January</option>
       <option>February</option>
       <option>March</option>
       <option>April</option>
       <option>May</option>
       <option>June</option>
       <option>July</option>
       <option>August</option>
       <option>September</option>
       <option>October</option>
       <option>November</option>
       <option>December</option>
      </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Year Applicable">Year Applicable</span>
	</label>
      <select class="input__field input__field--chisato" placeholder=" " size="1" name="month" value="<?php echo @$row['For Month']; ?>">
      <?php  
        echo '<option selected>' . @$row['For Month'] . '</option>';
        for($year=2035; $year>=2001; $year--)
        {
          echo '<option>' . $year . '</option>';
        }
      ?> 
      </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato" data-content="Office">Office</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" " name="office" width="31" value="<?php echo $row['Office']; ?>">  
          <?php  
           echo '<option selected>' . $row['Office'] . '</option>';
           $sql = "SELECT * FROM `location`";
           $result_office = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
           while ($rows = mysqli_fetch_array($result_office)) 
           {
             echo '<option>' . $rows['Location'] . '</option>';
           }
          ?> 
         </select>
      </span>

    <p>

<?php
if (!$SNO){
?>
  <input type="submit" value="Save" name="submit"> &nbsp;
<?php } else { 
if ($_SESSION['access_lvl'] == 2 or $_SESSION['access_lvl'] == 22 or $_SESSION['access_lvl'] == 5) 
{
?>
  <input type="submit" value="Update" name="submit"> &nbsp; 
  <input type="submit" value="Delete" name="submit" onclick="return confirm('Are you sure you want to Delete?');"> &nbsp; 
<?php
}} ?>

  </p>

</div>
<?php 
 echo "<p><a href = 'variationcalc.php?SNO=$SNO&id=$id'><font color='#6699CC'>Variation Calculator </font></a><b> &nbsp;|| &nbsp;<a href='variations.php'><font color='#6699CC'>Click here</font></a> to return to list.</p>";
?>
</div>

<?php
require_once 'footerr.php';
?>
</div>

		<!-- Specific Page Vendor -->
		<script src="../assets/vendor/select2/select2.js"></script>
		<script src="../assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="../assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="../assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
   
		<!-- Examples -->
		<script src="../assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.tabletools.js"></script>