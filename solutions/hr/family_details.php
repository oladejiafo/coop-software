<?php
 require_once 'conn.php';
 $reff= $_REQUEST[mYxt];

$SNO=$_REQUEST['SNO'];

$sql="SELECT `staff`.`Staff Number`,`staff`.`Surname`,`staff`.`Firstname`,`staff`.`Wife Name`,`staff`.`Marriage Date`,`staff`.`Wife DoB`,`children`.`Name`,`children`.`Sex`,`children`.`DoB` FROM staff left join `children` on `staff`.`Staff Number`=`children`.`Staff Number` WHERE `staff`.`staff Number`='$SNO'";
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
    <h2 class="panel-title">FAMILY DETAILS</h2>
  </header>
  <div class="panel-body">
  
  <?php
  if($tval)
  {
    echo "<div><font color='#FF0000' style='font-size: 9pt'>" . $tval . "</font></div>";
  }
 if($reff=="7!")
 {
  $SNO=$_REQUEST['SNO'];
  $CNO=$_REQUEST['CNO'];
  
  $sql="SELECT `children`.`Staff Number`,`children`.`Name`,`children`.`Sex`,`children`.`DoB`,`children`.`Child_ID` FROM `children` WHERE `Child_ID`='$CNO'";
  $result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
  $row = mysqli_fetch_array($result);
?>
<form action="submitchild.php" method="post">
<div align="left" class="agileinfo_mail_grids" style="width:100%">
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Name</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="name" size="31" value="<?php echo $row['Name']; ?>">
    <input type="hidden" name="child_id" size="31" value="<?php echo $row['Child_ID']; ?>">
    <input type="hidden" name="serviceno" size="31" value="<?php echo $SNO; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Gender</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="sex" size="31" value="<?php echo $row['Sex']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Date of Birth</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="dob" id="inputField" value="<?php echo $row['DoB']; ?>">
  </span>
  <span class="input input--chisato">
  <?php
if (!$CNO){
?>
  <input type="submit" value="Save" name="submit" style="width:130px; height:35px"> &nbsp;
<?php } else { ?>
  <input type="submit" value="Update" name="submit" style="width:130px; height:35px"> &nbsp; 
  <input type="submit" value="Delete" name="submit" style="width:130px; height:35px"> &nbsp; 
<?php
}
?>
  </span>
</div> 
<p align="right">
<?php 
 echo "<a href='staff.php#tabs1-family'>Click here</a> to return to list.";
?>
</p>
</form>
<?php
 } else {
?>
<form action="submitWife.php" method="post">
<div align="left" class="agileinfo_mail_grids" style="width:100%">
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Staff Number</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="serviceno" size="31" value="<?php echo $row['Staff Number']; ?>">
    <input type="hidden" name="id" size="31" value="<?php echo $row['ID']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Spouse Name</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="spousename" size="31" value="<?php echo $row['Wife Name']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Marriage Date</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="marriagedate" id="inputField" value="<?php echo $row['Marriage Date']; ?>">
  </span>
  <span class="input input--chisato">
	  <label class="input__label input__label--chisato">
		  <span class="input__label-content input__label-content--chisato" data-content="Staff ID Number">Spouse Date of Birth</span>
	  </label>
    <input class="input__field input__field--chisato" placeholder=" " type="text" name="spouseDoB" id="inputFieldB" value="<?php echo $row['Wife DoB']; ?>">
  </span>
  <p>
    <input type="submit" value="Update" name="submit" style="width:130px; height:35px"> &nbsp; 
  </p>
</div> 
</form>

<div class="div-table">

  <div class="tab-row" style="font-weight:bold">
    <div align="center" class="cell"  style='width:100%;background-color:#cbd9d9'>CHILDREN</div>
  </div>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell" style='width:33.3%;background-color:#cbd9d9'>Name</div>
    <div  class="cell" style='width:33.3%;background-color:#cbd9d9'>Gender</div>
    <div  class="cell" style='width:33.3%;background-color:#cbd9d9'>Date of Birth</div>
  </div>
<?php
    $query="SELECT `staff`.`Staff Number`,`children`.`Name`,`children`.`Sex`,`children`.`DoB`,`children`.`Child_ID` FROM staff left join `children` on `staff`.`Staff Number`=`children`.`Staff Number` WHERE `staff`.`Staff Number`='$SNO'";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result) == 0)
    { 
         echo("<p>No Child Listed!</p>"); 
    } 

    while(list($ServiceNo,$Name,$Sex,$DoB,$Child_ID)=mysqli_fetch_row($result))
    {
      echo '	
      <div class="tab-row"> 
      <div  class="cell" style="width:33.3%"><a href = "staff.php?mYxt=7!&SNO=' .$SNO . '&CNO=' .$Child_ID . '#tabs1-family">' .$Name. '</a></div>
      <div  class="cell" style="width:33.3%">' .$Sex. '</div>
      <div  class="cell" style="width:33.3%">' .$DoB. '</div>
    </div>';      
    }
 ?>
</div>

<p align="center">
  <?php
     echo "<a href ='staff.php?mYxt=7!#tabs1-family'> Add New Child </a>";
  ?>
</p>

<?php
 }
?>
</div>
</section>
