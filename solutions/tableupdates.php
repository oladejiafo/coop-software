<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
 if ($_SESSION['access_lvl'] != 3 & $_SESSION['access_lvl'] != 4) 
 {
   $redirect = $_SERVER['PHP_SELF'];
   header("Refresh: 0; URL=index.php?redirect=$redirect");
 }
}

 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';
?>
<style type="text/css">
.div-table {
    width: 100%;
    //border: 1px solid;
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

<title>Updates | Cooperatives Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Settings & Updates</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="tableupdates.php">
										<i class="fa fa-tasks"></i>
									</a>
								</li>
								<li><span></span></li>
							</ol>
					
							&nbsp;
						</div>
					</header>


<div class="services">
	<div class="container"  style="width:100%">

<div align="center">
   <form  action="tableupdates.php" method="GET">
    <body bgcolor="#D2DD8F">
      Select Table and click open: <select size="1" name="cmbTable" style="width:250px;height:40px;font-size:11px">
      <option selected>- Select Table Here-</option>
      <option>Membership Types</option>
      <option>Investment Types</option>
      <option>Shares Setup</option>
      <option>Welfare Types</option>
      <option disabled>--------------------------------</option>
      <option>Loan Type Setup</option>
      <option>Savings Account Type</option>
      <option>Branch</option>
      <option>Company Info</option>
      <option>Loan Officers</option>
      <option>Location</option>
      <option>State</option>
      <option disabled>--------------------------------</option>
      <option>Account Heads</option>
      <option>Account Heads Category</option>
      <option>Agents</option>
      <option hidden>Asset Category</option>
      <option>Bank</option>
      <option hidden>Nationality</option>
      <option disabled>--------------------------------</option>
      <option hidden>Lease Applications</option>
      <option hidden>Loan Applications</option>
     </select>
     &nbsp; 
     <input class="btn btn-primary btn-md" type="submit" value="Open" name="submit">
     <br>
    </body>
   </form>
</div>

<?php
echo '<div class="div-table">';
  @$cmbTable=$_GET['cmbTable']; 
  if (trim($cmbTable)=="- Select Table Here-")
  {
        echo "<b>Please Select a table from the drop-down box and click 'Open'.<b>";        
  }
  else if (trim($cmbTable)=="Company Info")
  { 
    include 'coy.php'; 
  }  
  else if (trim($cmbTable)=="Loan Applications")
  { 
    include 'loanapplicants.php'; 
  }  
  else if (trim($cmbTable)=="Lease Applications")
  { 
    include 'leaseapplicants.php'; 
  }  
  else if (trim($cmbTable)=="Branch")
  {  
$id=$_REQUEST['id'];
$adtx=$_REQUEST['adtx'];

$sql="SELECT `ID`,`Branch`,`Branch Code` FROM `branch` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID`='$id'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);

 @$limit      = 25; 
 @$page=$_GET['page'];
 $query_count    = "SELECT * FROM `branch` WHERE `Company` ='" .$_SESSION['company']. "'";     
 $result_count   = mysqli_query($conn,$query_count);     
 $totalrows  = mysqli_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  
    $val='Branch';

if($adtx==1)
{
?>

<form  action="submitbranch.php" method="post">
<div align="left" class="agileinfo_mail_grids">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Branch:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="branch" value="<?php echo $row['Branch']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Branch Code:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="bcode" value="<?php echo $row['Branch Code']; ?>">
	<input  type="hidden" name="id" value="<?php echo $row['ID']; ?>">
      </span>
      <span class="input input--chisato">
<?php
if(!$id)
{
echo '<input type="submit" value="Add" name="submit" style="width:100px">';
} else {
echo '<input type="submit" value="Modify" name="submit" style="width:100px">';
echo '<input type="submit" value="Delete" name="submit" onclick="return confirm(\'Are you sure you want to Delete?\')" style="width:100px">';
}
?>
      </span>

</div>
</form>
<?php
}
#echo '<div class="div-table">';
echo " <h4><b>[Branch Update]</b></h4>";
  ?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:33.3%;background-color:#D2DD8F'>Branch</div>
    <div  class="cell" style='width:33.3%;background-color:#D2DD8F'>Branch Code</div>
    <div  class="cell" style='width:33.3%;background-color:#D2DD8F'>&nbsp;</div>
  </div>
<?php
    $result = mysqli_query ($conn,"SELECT `ID`, `Branch`,`Branch Code` From `branch` order by `ID` LIMIT $limitvalue, $limit"); 

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 
    $val='Branch';

    while(list($id, $branch,$bcode)=mysqli_fetch_row($result)) 
    {
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:33.3%"><a title="Click to Modify or Delete this Branch" href = "tableupdates.php?cmbTable=' . $val . '&id=' . $id . '&adtx=1">' .$branch. '</a></div>
        <div  class="cell" style="width:33.3%">' .$bcode. '</div>
        <div  class="cell" style="width:33.3%">&nbsp;</div>
      </div>';
    }
echo "<p>";
    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysqli_free_result($result);
 ?>
</div>

<p align="center">
  <?php
     echo "<a href ='tableupdates.php?cmbTable=$val&adtx=1'> Add New Branch </a>&nbsp;"; 
  ?>
</p>
<?php
  }
  else if (trim($cmbTable)=="Savings Account Type")
  {
$id=$_REQUEST['id'];
$adtx=$_REQUEST['adtx'];

$sql="SELECT * FROM `account type` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID`='$id'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);

 @$limit      = 20; 
 @$page=$_GET['page'];
 $query_count    = "SELECT * FROM `account type` WHERE `Company` ='" .$_SESSION['company']. "'";     
 $result_count   = mysqli_query($conn,$query_count);     
 $totalrows  = mysqli_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  
    $val='Savings Account Type';

if($adtx==1)
{
?>

<form  action="submitaccttype.php" method="post">
<div align="left" class="agileinfo_mail_grids">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Savings Account Type:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="type" value="<?php echo $row['Type']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Interest Rate:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="intrate" value="<?php echo $row['Interest Rate']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Rate Mode:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="rmode" value="<?php echo $row['Rate Mode']; ?>">
	<input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
	<input type="hidden" name="page" value="<?php echo $page; ?>">
	<input type="hidden" name="val" value="<?php echo $val; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Effect of Interest:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="effect" value="<?php echo $row['Effect']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Margin Type:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="margintype" value="<?php echo $row['Margin Type']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Margin Rate:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="margin" value="<?php echo $row['Margin']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Min Deposit:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="mindep" value="<?php echo $row['Minimum Deposit']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Remark:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="remark" value="<?php echo $row['Remark']; ?>">
      </span>
      <span class="input input--chisato">
<?php
if(!$id)
{
echo '<input type="submit" value="Add" name="submit" style="width:100px">';
} else {
echo '<input type="submit" value="Modify" name="submit" style="width:100px">';
echo '<input type="submit" value="Delete" name="submit" onclick="return confirm(\'Are you sure you want to Delete?\')" style="width:100px">';
}
?>
      </span>

</div>
</form>
<?php
}
?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:12.5%;background-color:#D2DD8F'>Account Type</div>
    <div  class="cell" style='width:12.5%;background-color:#D2DD8F'>Interest Rate</div>
    <div  class="cell" style='width:12.5%;background-color:#D2DD8F'>Rate Mode</div>
    <div  class="cell"  style='width:12.5%;background-color:#D2DD8F'>Effect of Interest</div>
    <div  class="cell" style='width:12.5%;background-color:#D2DD8F'>Margin Type</div>
    <div  class="cell" style='width:12.5%;background-color:#D2DD8F'>Margin Rate</div>
    <div  class="cell" style='width:12.5%;background-color:#D2DD8F'>Min Deposit</div>
    <div  class="cell" style='width:12.5%;background-color:#D2DD8F'>Remarks</div>
  </div>
<?php
    $result = mysqli_query ($conn,"SELECT `ID`, `Type`,`Interest Rate`,`Rate Mode`,`Margin Type`,`Margin`,`Effect`,`Minimum Deposit`,`Remark` From `account type` order by `ID` LIMIT $limitvalue, $limit"); 

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 
    $val='Savings Account Type';

    while(list($id, $type,$intr,$rmode,$mtype,$margin,$effect,$mindep,$remk)=mysqli_fetch_row($result)) 
    {	
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:12.5%"><a href = "tableupdates.php?cmbTable=' . $val . '&id=' . $id . '&adtx=1">' .$type. '</a></div>
        <div  class="cell" style="width:12.5%">' .$intr. '</div>
        <div  class="cell" style="width:12.5%">' .$rmode. '</div>
        <div  class="cell" style="width:12.5%">' .$effect. '</div>
        <div  class="cell" style="width:12.5%">' .$mtype. '</div>
        <div  class="cell" style="width:12.5%">' .$margin. '</div>
        <div  class="cell" style="width:12.5%">' .$mindep. '</div>
        <div  class="cell" style="width:12.5%">' .$remk. '</div>
      </div>';
    }
echo "<p>";

    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysqli_free_result($result);
 ?>
</p>
</div>

<p align="center">
  <?php
     echo "<a href ='tableupdates.php?cmbTable=$val&adtx=1'> Add New Account Type </a>"; 
  ?>
</p>
<?php
  }
  else if (trim($cmbTable)=="Welfare Types")
  {
$id=$_REQUEST['id'];
$adtx=$_REQUEST['adtx'];

$sql="SELECT * FROM `welfare type` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID`='$id'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);

 @$limit      = 20; 
 @$page=$_GET['page'];
 $query_count    = "SELECT * FROM `welfare type` WHERE `Company` ='" .$_SESSION['company']. "'";     
 $result_count   = mysqli_query($conn,$query_count);     
 $totalrows  = mysqli_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  
    $val='Welfare Types';

if($adtx==1)
{
?>

<form  action="submitwelftype.php" method="post">
<div align="left" class="agileinfo_mail_grids">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Welfare Type:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="type" value="<?php echo $row['Type']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Pegged Amount:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="amount" value="<?php echo $row['Amount']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Description:</span>
	</label>
	<textarea class="input__field input__field--chisato" placeholder=" " style="width:120px" rows="2" name="remark"><?php echo $row['Remark']; ?></textarea>
	<input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
	<input type="hidden" name="page" value="<?php echo $page; ?>">
	<input type="hidden" name="val" value="<?php echo $val; ?>">
      </span>

      <span class="input input--chisato">
<?php
if(!$id)
{
echo '<input type="submit" value="Add" name="submit" style="width:100px">';
} else {
echo '<input type="submit" value="Modify" name="submit" style="width:100px">';
echo '<input type="submit" value="Delete" name="submit" onclick="return confirm(\'Are you sure you want to Delete?\')" style="width:100px">';
}
?>
      </span>

</div>
</form>
<?php
}
?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:33.3%;background-color:#e0e0e0'>Welfare Type</div>
    <div  class="cell" style='width:33.3%;background-color:#e0e0e0'>Amount</div>
    <div  class="cell" style='width:33.3%;background-color:#e0e0e0'>Description</div>
  </div>
<?php
    $result = mysqli_query ($conn,"SELECT `ID`, `Type`,`Amount`,`Remark` From `welfare type` WHERE `Company`='".$_SESSION['company']."' order by `ID` LIMIT $limitvalue, $limit"); 

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 
    $val='Welfare Types';

    while(list($id, $type,$amt,$remk)=mysqli_fetch_row($result)) 
    {	
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:33.3%"><a href = "tableupdates.php?cmbTable=' . $val . '&id=' . $id . '&adtx=1">' .$type. '</a></div>
        <div  class="cell" style="width:33.3%">' .number_format($amt,2). '</div>
        <div  class="cell" style="width:33.3%">' .$remk. '</div>
      </div>';
    }
echo "<p>";

    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysqli_free_result($result);
 ?>
</p>
</div>

<p align="center">
  <?php
     echo "<a href ='tableupdates.php?cmbTable=$val&adtx=1'> Add New Welfare Type </a>"; 
  ?>
</p>
<?php
  }
  else if (trim($cmbTable)=="Membership Types")
{
$id=$_REQUEST['id'];
$adtx=$_REQUEST['adtx'];

$sql="SELECT * FROM `membership type` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID`='$id'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);

 @$limit      = 20; 
 @$page=$_GET['page'];
 $query_count    = "SELECT * FROM `membership type` WHERE `Company` ='" .$_SESSION['company']. "'";     
 $result_count   = mysqli_query($conn,$query_count);     
 $totalrows  = mysqli_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  
    $val='Membership Types';

if($adtx==1)
{
?>

<form  action="submitmembertype.php" method="post">
<div align="left" class="agileinfo_mail_grids">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Membership Type:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="type" value="<?php echo $row['Type']; ?>">
      </span>
	<input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
	<input type="hidden" name="page" value="<?php echo $page; ?>">
	<input type="hidden" name="val" value="<?php echo $val; ?>">

      <span class="input input--chisato">
<?php
if(!$id)
{
echo '<input type="submit" value="Add" name="submit" style="width:100px">';
} else {
echo '<input type="submit" value="Modify" name="submit" style="width:100px">';
echo '<input type="submit" value="Delete" name="submit" onclick="return confirm(\'Are you sure you want to Delete?\')" style="width:100px">';
}
?>
      </span>

</div>
</form>
<?php
}
?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:60%;background-color:#e0e0e0'>Membership Type</div>
    <div  class="cell" style='width:40%;background-color:#e0e0e0'>&nbsp;</div>
  </div>
<?php
    $result = mysqli_query ($conn,"SELECT `ID`, `Type` From `membership type` WHERE `Company`='".$_SESSION['company']."' order by `ID` LIMIT $limitvalue, $limit"); 

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 
    $val='Membership Types';

    while(list($id, $type)=mysqli_fetch_row($result)) 
    {	
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:60%"><a href = "tableupdates.php?cmbTable=' . $val . '&id=' . $id . '&adtx=1">' .$type. '</a></div>
        <div  class="cell" style="width:40%">&nbsp;</div>
      </div>';
    }
echo "<p>";

    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysqli_free_result($result);
 ?>
</p>
</div>

<p align="center">
  <?php
     echo "<a href ='tableupdates.php?cmbTable=$val&adtx=1'> Add New Membership Type </a>"; 
  ?>
</p>
<?php
  }
  else if (trim($cmbTable)=="Shares Setup")
{
$id=$_REQUEST['id'];
$adtx=$_REQUEST['adtx'];

$sql="SELECT * FROM `shares` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID`='$id'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);

 @$limit      = 20; 
 @$page=$_GET['page'];
 $query_count    = "SELECT * FROM `shares` WHERE `Company` ='" .$_SESSION['company']. "'";     
 $result_count   = mysqli_query($conn,$query_count);     
 $totalrows  = mysqli_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  
 $val='Shares Setup';

if($adtx==1)
{
?>
<script language="JavaScript">
	function isNumeric(sText, decimalAllowed) {
		if (sText.length == 0) return false;
		var validChars = "";
		if (decimalAllowed) {
			validChars = "0123456789.";
		} else {
			validChars = "0123456789";
		}
		var isNumber = true;
		var charA;
		var decimalCount = 0;
		for (i = 0; i < sText.length && isNumber == true && decimalCount < 2; i++) {
			charA = sText.charAt(i); 
			if (charA == ".") { 
				decimalCount += 1;
			}
			if (validChars.indexOf(charA) == -1) {
			isNumber = false;
			}
		}
		return isNumber;
	}
    function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    console.log(charCode)
    if (charCode == 45 || charCode == 46 || charCode == 37 || charCode == 39) {
        return true;
    } else if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
<form  action="submitshares.php" method="post">
<div align="left" class="row">
 <div class="col-md-4">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Total Shares Available:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="total" value="<?php echo $row['Total Available']; ?>" onkeypress="return isNumber(event)" required>
 </div>
	<input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
	<input type="hidden" name="page" value="<?php echo $page; ?>">
	<input type="hidden" name="val" value="<?php echo $val; ?>">
  <div class="col-md-4">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Maximum Shares To A Member (%):</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="max" value="<?php echo $row['Max Share']; ?>" onkeypress="return isNumber(event)" required>
  </div>
  <div class="col-md-4">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Minimum Shares To A Member (%):</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="min" value="<?php echo $row['Min Share']; ?>" onkeypress="return isNumber(event)" required>
  </div>
  <div class="col-md-4">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Cost per Share (N):</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="cost" value="<?php echo $row['Unit Cost']; ?>" onkeypress="return isNumber(event)" required>
  </div>
  <div class="col-md-4">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Shares Premium:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="premium" value="<?php echo $row['Shares Premium']; ?>" onkeypress="return isNumber(event)">
  </div>
  <div class="col-md-4">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Total Shares Un-Alloted:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="totleft" value="<?php echo $row['Total Left']; ?>" readonly="readonly">
 </div>  
 <div class="col-md-12 pull-right">
  <?php
  if(!$id)
  {
    echo '<input class="btn btn-primary btn-md" type="submit" value="Add" name="submit" style="width:100px">';
  } else {
    echo '<input class="btn btn-primary btn-md" type="submit" value="Modify" name="submit" style="width:100px">&nbsp;';
    echo '<input class="btn btn-primary btn-md" type="submit" value="Delete" name="submit" onclick="return confirm(\'Are you sure you want to Delete?\')" style="width:100px">';
  }
  ?>
 </div>

</div>
</form>
<?php
}
?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:16.66%;background-color:#e0e0e0'>Total Available Shares</div>
    <div  class="cell"  style='width:16.66%;background-color:#e0e0e0'>Max Shares to a Member (%)</div>
    <div  class="cell"  style='width:16.66%;background-color:#e0e0e0'>Min Shares to a Member (%)</div>
    <div  class="cell"  style='width:16.66%;background-color:#e0e0e0'>Cost per Share</div>
    <div  class="cell"  style='width:16.66%;background-color:#e0e0e0'>Shares Premium</div>   
    <div  class="cell"  style='width:16.66%;background-color:#e0e0e0'>Total Shares Un-Allotted (%)</div>         
  </div>
<?php
    $result = mysqli_query ($conn,"SELECT `ID`, `Total Available`,`Max Share`,`Min Share`, `Unit Cost`, `Shares Premium`,`Total Left` From `shares` WHERE `Company`='".$_SESSION['company']."' order by `ID` LIMIT $limitvalue, $limit"); 

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 
    $val='Shares Setup';

    while(list($id, $totshare, $maxshare, $minshare, $unitcost,$shareprem,$shareleft)=mysqli_fetch_row($result)) 
    {	
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:16.66%"><a href = "tableupdates.php?cmbTable=' . $val . '&id=' . $id . '&adtx=1">' .number_format($totshare,2). '</a></div>
        <div  class="cell" style="width:16.66%">' .number_format($maxshare,2). '</div>        
        <div  class="cell" style="width:16.66%">' .number_format($minshare,2). '</div>
        <div  class="cell" style="width:16.66%">' .number_format($unitcost,2). '</div>
        <div  class="cell" style="width:16.66%">' .number_format($shareprem,2). '</div>
        <div  class="cell" style="width:16.66%">' .number_format($shareleft,2). '</div>        
      </div>';
    }
echo "<p>";

    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysqli_free_result($result);
 ?>
</p>
</div>

<p align="center">
  <?php
     echo "<a href ='tableupdates.php?cmbTable=$val&adtx=1'> Create Shares Setup </a>"; 
  ?>
</p>
<?php
  }
  else if (trim($cmbTable)=="Investment Types")
  {
  $id=$_REQUEST['id'];
  $adtx=$_REQUEST['adtx'];
  
  $sql="SELECT * FROM `investment type` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID`='$id'";
  $result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
  $row = mysqli_fetch_array($result);
  
   @$limit      = 20; 
   @$page=$_GET['page'];
   $query_count    = "SELECT * FROM `investment type` WHERE `Company` ='" .$_SESSION['company']. "'";     
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);
   if(empty($page))
   {
          $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  
      $val='Welfare Types';
  
  if($adtx==1)
  {
  ?>
  
  <form  action="submitinvtype.php" method="post">
  <div align="left" class="agileinfo_mail_grids">
        <span class="input input--chisato">
    <label class="input__label input__label--chisato">
      <span class="input__label-content input__label-content--chisato">Investment Type:</span>
    </label>
    <input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="type" value="<?php echo $row['Type']; ?>">
        </span>
    <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
    <input type="hidden" name="page" value="<?php echo $page; ?>">
    <input type="hidden" name="val" value="<?php echo $val; ?>">
  
        <span class="input input--chisato">
  <?php
  if(!$id)
  {
  echo '<input type="submit" value="Add" name="submit" style="width:100px">';
  } else {
  echo '<input type="submit" value="Modify" name="submit" style="width:100px">';
  echo '<input type="submit" value="Delete" name="submit" onclick="return confirm(\'Are you sure you want to Delete?\')" style="width:100px">';
  }
  ?>
        </span>
  
  </div>
  </form>
  <?php
  }
  ?>
    <div class="tab-row" style="font-weight:bold">
      <div  class="cell"  style='width:60%;background-color:#e0e0e0'>Investment Type</div>
      <div  class="cell" style='width:40%;background-color:#e0e0e0'>&nbsp;</div>
    </div>
  <?php
      $result = mysqli_query ($conn,"SELECT `ID`, `Type` From `investment type` WHERE `Company`='".$_SESSION['company']."' order by `ID` LIMIT $limitvalue, $limit"); 
  
     if(mysqli_num_rows($result) == 0)
     { 
          echo("<p>Nothing to Display!</p>"); 
     } 
      $val='Investment Types';
  
      while(list($id, $type)=mysqli_fetch_row($result)) 
      {	
       echo '	
          <div class="tab-row"> 
          <div  class="cell" style="width:60%"><a href = "tableupdates.php?cmbTable=' . $val . '&id=' . $id . '&adtx=1">' .$type. '</a></div>
          <div  class="cell" style="width:40%">&nbsp;</div>
        </div>';
      }
  echo "<p>";
  
      if($page != 1)
      {  
         $pageprev = $page-1;       
         echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
      }
      else 
         echo("PREV PAGE  ");  
  
      $numofpages = $totalrows / $limit;  
      for($i = 1; $i <= $numofpages; $i++)
      { 
          if($i == $page)
          { 
              echo($i."  "); 
          }else{ 
              echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
          }
      } 
      if(($totalrows % $limit) != 0)
      { 
          if($i == $page)
          { 
              echo($i."  "); 
          }
          else
          { 
              echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
          } 
      }
      if(($totalrows - ($limit * $page)) > 0)
      { 
          $pagenext = $page+1; 
            
          echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
      }
      else
      { 
          echo("NEXT PAGE");  
      } 
    
      mysqli_free_result($result);
   ?>
  </p>
  </div>
  
  <p align="center">
    <?php
       echo "<a href ='tableupdates.php?cmbTable=$val&adtx=1'> Add New Investment Type </a>"; 
    ?>
  </p>
  <?php
  }

  else if (trim($cmbTable)=="Agents")
  {  
$id=$_REQUEST['id'];
$adtx=$_REQUEST['adtx'];

$sql="SELECT * FROM `agents` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID`='$id'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);


 @$limit      = 20; 
 @$page=$_GET['page'];
 $query_count    = "SELECT * FROM `agents` WHERE `Company` ='" .$_SESSION['company']. "'";     
 $result_count   = mysqli_query($conn,$query_count);     
 $totalrows  = mysqli_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  
    $val='Agents';
if($adtx==1)
{
?>
<form  action="submitagent.php" method="post">
<div align="left" class="agileinfo_mail_grids">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Agent:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="agent" value="<?php echo $row['Agent']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Phone:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="phone" value="<?php echo $row['Phone']; ?>">
	<input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
	<input type="hidden" name="page" value="<?php echo $page; ?>">
	<input type="hidden" name="val" value="<?php echo $val; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Email:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="email" value="<?php echo $row['email']; ?>">
      </span>
      <span class="input input--chisato">
<?php
if(!$id)
{
echo '<input type="submit" value="Add" name="submit" style="width:100px">';
} else {
echo '<input type="submit" value="Modify" name="submit" style="width:100px">';
echo '<input type="submit" value="Delete" name="submit" onclick="return confirm(\'Are you sure you want to Delete?\')" style="width:100px">';
}
?>
      </span>

</div>
</form>
<?php
}

    echo " <h4><b>[Agents Update]</b></h4>";
  ?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:33.3%;background-color:#D2DD8F'>Agents</div>
    <div  class="cell" style='width:33.3%;background-color:#D2DD8F'>Phone</div>
    <div  class="cell" style='width:33.3%;background-color:#D2DD8F'>Email</div>
  </div>
<?php
    $result = mysqli_query ($conn,"SELECT `ID`, `Agent`,`Phone`,`email` From `agents` order by `ID` LIMIT $limitvalue, $limit"); 

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 
    $val='Agents';

    while(list($id, $agent,$phone,$email)=mysqli_fetch_row($result)) 
    {
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:33.3%"><a href = "tableupdates.php?cmbTable=' . $val . '&id=' . $id . '&adtx=1">' .$agent. '</a></div>
        <div  class="cell" style="width:33.3%">' .$phone. '</div>
        <div  class="cell" style="width:33.3%">' .$email. '</div>
      </div>';
    }
echo "<p>";
    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysqli_free_result($result);
 ?>
</p>
</div>

<p align="center">
  <?php
     echo "<a href ='tableupdates.php?cmbTable=$val&adtx=1'> Add New Agent </a>"; 
  ?>
</p>
<?php
  }
  else if (trim($cmbTable)=="Loan Officers")
  {  
$id=$_REQUEST['id'];
$adtx=$_REQUEST['adtx'];

$sql="SELECT * FROM `loan officers` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID`='$id'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);


 @$limit      = 30; 
 @$page=$_GET['page'];
 $query_count    = "SELECT * FROM `loan officers` WHERE `Company` ='" .$_SESSION['company']. "'";     
 $result_count   = mysqli_query($conn,$query_count);     
 $totalrows  = mysqli_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  
    $val='Loan Officers';
if($adtx==1)
{
?>
<form  action="submitloanofficers.php" method="post">
<div align="left" class="agileinfo_mail_grids">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Loan Officer Name:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="name" value="<?php echo $row['Name']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Phone:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="phone" value="<?php echo $row['Phone']; ?>">
	<input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
	<input type="hidden" name="page" value="<?php echo $page; ?>">
	<input type="hidden" name="val" value="<?php echo $val; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Email:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="email" value="<?php echo $row['email']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Branch:</span>
	</label>
	<select class="input__field input__field--chisato" placeholder=" " style="width:120px" name="branch" value="<?php echo $row['Branch']; ?>">
          <option selected><?php echo $row['Branch']; ?></option>
          <?php  
         	$sqlt = "SELECT `Branch` FROM `branch` ORDER BY branch;";
        	$resultt = mysqli_query($conn,$sqlt) or die('Invalid query: ' . mysqli_error());
        	while ($rows = mysqli_fetch_array($resultt))
		{
		  echo " <option>" . $rows['Branch'] . "</option>\n";
		}
          ?> 
        </select>
      </span>
      <span class="input input--chisato">
<?php
if(!$id)
{
echo '<input type="submit" value="Add" name="submit" style="width:100px">';
} else {
echo '<input type="submit" value="Modify" name="submit" style="width:100px">';
echo '<input type="submit" value="Delete" name="submit" onclick="return confirm(\'Are you sure you want to Delete?\')" style="width:100px">';
}
?>
      </span>

</div>
</form>
<?php
}

    echo " <h4><b>[Loan Officers]</b></h4>";
  ?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:25%;background-color:#D2DD8F'>Loan Officer Name</div>
    <div  class="cell" style='width:25%;background-color:#D2DD8F'>Phone</div>
    <div  class="cell" style='width:25%;background-color:#D2DD8F'>Email</div>
    <div  class="cell" style='width:25%;background-color:#D2DD8F'>Branch</div>
  </div>
<?php
    $result = mysqli_query ($conn,"SELECT `ID`, `Name`,`Phone`,`email`,`Branch` From `loan officers` order by `ID` LIMIT $limitvalue, $limit"); 

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 
    $val='Loan Officers';

    while(list($id, $name,$phone,$email,$branch)=mysqli_fetch_row($result)) 
    {
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:25%"><a href = "tableupdates.php?cmbTable=' . $val . '&id=' . $id . '&adtx=1">' .$name. '</a></div>
        <div  class="cell" style="width:25%">' .$phone. '</div>
        <div  class="cell" style="width:25%">' .$email. '</div>
        <div  class="cell" style="width:25%">' .$branch. '</div>
      </div>';
    }
echo "<p>";
    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysqli_free_result($result);
 ?>
</p>
</div>

<p align="center">
  <?php
     echo "<a href ='tableupdates.php?cmbTable=$val&adtx=1'> Add New Loan Officer </a>"; 
  ?>
</p>
<?php
  }
  else if (trim($cmbTable)=="Loan Type Setup")
  {  
$id=$_REQUEST['id'];
$adtx=$_REQUEST['adtx'];

$sql="SELECT * FROM `loan type` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID`='$id'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);

 @$limit      = 20; 
 @$page=$_GET['page'];
 $query_count    = "SELECT * FROM `loan type` WHERE `Company` ='" .$_SESSION['company']. "'";     
 $result_count   = mysqli_query($conn,$query_count);     
 $totalrows  = mysqli_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  
    $val='Loan Type Setup';
if($adtx==1)
{
?>
<form  action="submitloantype.php" method="post">
<div align="left" class="row"> 
 <div class="col-md-4">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Loan Type:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:200px" type="text" name="type" value="<?php echo $row['Type']; ?>">
 </div>
 <div class="col-md-4">
   	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Loan Interest Rate(%):</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:200px" type="text" name="rate" value="<?php echo $row['Rate']; ?>">
 </div>
 <div class="col-md-4">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Late Payment Rate (%):</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:200px" type="text" name="laterate" value="<?php echo $row['Late Rate']; ?>">
	<input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
	<input type="hidden" name="page" value="<?php echo $page; ?>">
	<input type="hidden" name="val" value="<?php echo $val; ?>">
 </div>
</div> 
<div class="row">
 <div class="col-md-4">
   	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">How Many Guarantors Required?:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:200px" type="number" name="guarantors" value="<?php if($row['How Many Guarantor']){echo $row['How Many Guarantor'];} else {echo "2";} ?>">
 </div>
 <div class="col-md-4">
   	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Required Guarantor Details:</span>
	</label>
	<textarea class="input__field input__field--chisato" placeholder=" " style="width:200px" rows=1 name="gReq"><?php echo $row['Guarantor Requirement']; ?></textarea>
 </div>
 <div class="col-md-4">
   	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Required Collateral Details:</span>
	</label>
	<textarea class="input__field input__field--chisato" placeholder=" " style="width:200px" rows="1" name="cReq"><?php echo $row['Collateral Requirement']; ?></textarea>
 </div>  
</div>
<div class="row"> 
 <div class="col-md-4">
  <label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Other Requirements:</span>
	</label>
	<textarea class="input__field input__field--chisato" placeholder=" " style="width:200px" rows="1" name="qReq"><?php echo $row['Qualifying Requirement']; ?></textarea>
 </div>  
 <div class="col-md-8">
 <?php
 if(!$id)
 {
  echo '<input type="submit" value="Add" name="submit" class="btn btn-info btn-md" style="width:100px">';
 } else {
  echo '<br><input type="submit" value="Modify" name="submit" class="btn btn-info btn-md" style="width:100px">&nbsp;';
  echo '<input type="submit" value="Delete" name="submit" class="btn btn-danger btn-md" onclick="return confirm(\'Are you sure you want to Delete?\')" style="width:100px">';
 }
 ?>
 </div>

</div>
</form>
<?php
}
    echo " <h4><b>[Loan Type Update]</b></h4>";
  ?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:14.2%;background-color:#e0e0e0'>Loan Type</div>
    <div  class="cell" style='width:14.2%;background-color:#e0e0e0'>Loan Interest Rate</div>
    <div  class="cell" style='width:14.2%;background-color:#e0e0e0'>Late Payment Rate</div>
    <div  class="cell" style='width:14.2%;background-color:#e0e0e0'>How Many Guarantors?</div>
    <div  class="cell" style='width:14.2%;background-color:#e0e0e0'>Guarantor Requirements</div>
    <div  class="cell" style='width:14.2%;background-color:#e0e0e0'>Collateral Requirements</div>
    <div  class="cell" style='width:14.2%;background-color:#e0e0e0'>Other Requirements</div>
  </div>
<?php

    $result = mysqli_query ($conn,"SELECT `ID`, `Type`,`Rate`,`Late Rate`,`How Many Guarantor`,`Guarantor Requirement`,`Collateral Requirement`,`Qualifying Requirement` From `loan type` order by `ID` LIMIT $limitvalue, $limit"); 

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 
    $val='Loan Type Setup';

    while(list($id, $type,$rate,$lrate,$guarants,$greq,$creq,$qreq)=mysqli_fetch_row($result)) 
    {	
     echo '	
        <div class="tab-row" style="height:75px"> 
        <div  class="cell" style="width:14.2%;height:70px"><a href = "tableupdates.php?cmbTable=' . $val . '&id=' . $id . '&adtx=1">' .$type. '</a></div>
        <div  class="cell" style="width:14.2%;height:70px">' .$rate. '</div>
        <div  class="cell" style="width:14.2%;height:70px">' .$lrate. '</div>
        <div  class="cell" style="width:14.2%;height:70px">' .$guarants. '</div>
        <div  class="cell" style="width:14.2%;height:70px">' .$greq. '</div>
        <div  class="cell" style="width:14.2%;height:70px">' .$creq. '</div>
        <div  class="cell" style="width:14.2%;height:70px">' .$qreq. '</div>
      </div>';
    }
echo "<p>";
    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysqli_free_result($result);
 ?>
</p>
</div>

<p align="center">
  <?php
     echo "<a href ='tableupdates.php?cmbTable=$val&adtx=1'> Add New Loan Type </a>"; 
  ?>
</p>
<?php
  }
  else if (trim($cmbTable)=="Asset Category")
  {  
 @$limit      = 15; 
 @$page=$_GET['page'];
 $query_count    = "SELECT * FROM `asset category` WHERE `Company` ='" .$_SESSION['company']. "'";     
 $result_count   = mysqli_query($conn,$query_count);     
 $totalrows  = mysqli_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 @$limitvalue = $page * $limit - ($limit);  

    echo " <tr><b>[Asset Category Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH><b> Category ID </b>&nbsp;</TH><TH><b> Category </b>&nbsp;</TH></TR>";
    $result = mysqli_query ($conn,"SELECT `ID`, `Category` From `asset category` order by `ID` LIMIT $limitvalue, $limit"); 

   if(mysqli_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 
    $val='Asset Category';

    while(list($catid, $category)=mysqli_fetch_row($result)) 
    {	
      echo "<TR><TH><a href='category.php?ID=" . $catid . "'> $catid </a>&nbsp;</TH><TH> $category &nbsp;</TH></TR>";
    }

    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysqli_free_result($result);
 ?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#006699">
<br>
  <?php
     echo "<TR>
               <TH><a href ='category.php'> Add New Asset Category </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }
  elseif (trim($cmbTable)=="Account Heads")
  {
$id=$_REQUEST['id'];
$adtx=$_REQUEST['adtx'];

$sql="SELECT `ID`,`Code`,`Description`,`Remarks`,`Category` FROM `heads` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID`='$id'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);

$val='Account Heads';

if($adtx==1)
{
?>
<form action="submitheads.php" method="post">
<div align="left" class="agileinfo_mail_grids">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Code:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="code" value="<?php echo $row['Code']; ?>">
        <input type="hidden" name="id" size="31" value="<?php echo $row['ID']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Description:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="description" size="31" value="<?php echo $row['Description']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Category:</span>
	</label>
        <select  name="category"  class="input__field input__field--chisato" placeholder=" " style="width:120px" value="<?php echo $row['Category']; ?>">  
          <?php  
           echo '<option selected>' . $row['Category'] . '</option>';
           $sql = "SELECT `Category` FROM `heads category` WHERE `Company` ='" .$_SESSION['company']. "'";
           $result_c = mysqli_query($conn,$sql) or die('Could not list value; ' . mysqli_error());
             while ($rows = mysqli_fetch_array($result_c)) 
             {
               echo '<option>' . $rows['Category'] . '</option>';
             }
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Remarks:</span>
	</label>
	<input type="text" name="remarks" class="input__field input__field--chisato" placeholder=" " style="width:120px" value="<?php echo $row['Remarks']; ?>">
      </span>
      <span class="input input--chisato">
<?php
if (!$id){
?>
  <input type="submit" value="Save" name="submit" style="width:100px"> &nbsp;
<?php } 
 else { ?>
  <input type="submit" value="Update" name="submit" style="width:100px"> &nbsp; 
  <input type="submit" value="Delete" name="submit" style="width:100px" onclick="return confirm('Are you sure you want to Delete?');"> &nbsp; 
<br>
<?php
}
?> 
</span>
</div>
</form>

<?php
}

 $limit      = 35; 
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `heads` WHERE `Company` ='" .$_SESSION['company']. "'";     
 $result_count   = mysqli_query($conn,$query_count);     
 $totalrows  = mysqli_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  

echo "<h4 align='center' valign='top'> <td bgcolor='#cbd9d9' colspan='3' valign='top'>
<b><font face='Verdana' color='#000' style='font-size: 16pt'>Heads of Accounts Update</font></b>
</h4>";
 ?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:25%;background-color:#D2DD8F'>Account Code</div>
    <div  class="cell" style='width:25%;background-color:#D2DD8F'>Description</div>
    <div  class="cell" style='width:25%;background-color:#D2DD8F'>Category</div>
    <div  class="cell" style='width:25%;background-color:#D2DD8F'>Remarks</div>
  </div>
<?php
    $result = mysqli_query ($conn,"SELECT `ID`,`Code`, `Description` , `Remarks`,`Category` From `heads` order by `Code` LIMIT $limitvalue, $limit"); 

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 
    $val='Account Heads';

    while(list($id,$code, $description,$remarks,$cat)=mysqli_fetch_row($result)) 
    {
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:25%">' .$code. '</div>
        <div  class="cell" style="width:25%"><a href = "tableupdates.php?cmbTable=' . $val . '&id=' . $id . '&adtx=1">' .$description. '</a></div>
        <div  class="cell" style="width:25%">' .$cat. '</div>
        <div  class="cell" style="width:25%">' .$remarks. '</div>
      </div>';
    } 
echo "<p>";
    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysqli_free_result($result);
 ?>
</p>
</div>
<p align="center">

  <?php
     echo "<a href ='tableupdates.php?cmbTable=$val&adtx=1'> Add New Accounts Heads </a>"; 
  ?>
</p>

<?php
  }
  elseif (trim($cmbTable)=="Account Heads Category")
  {
$id=$_REQUEST['id'];
$adtx=$_REQUEST['adtx'];

$sql="SELECT `ID`,`Category` FROM `heads category` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID`='$id'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);

$val='Account Heads Category';

if($adtx==1)
{
?>
<form action="submitheadscat.php" method="post">
<div align="left" class="agileinfo_mail_grids">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Category:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="category" value="<?php echo $row['Category']; ?>">
	<input type="hidden" name="id" size="31" value="<?php echo $row['ID']; ?>">
      </span>
      <span class="input input--chisato">
<?php
if (!$id){
?>
  <input type="submit" value="Save" name="submit" style="width:100px"> &nbsp;
<?php } 
 else { ?>
  <input type="submit" value="Update" name="submit" style="width:100px"> &nbsp; 
  <input type="submit" value="Delete" name="submit" style="width:100px" onclick="return confirm('Are you sure you want to Delete?');"> &nbsp; 
<?php
}
?> 
</form>
</div>
<?php
}

 $limit      = 35; 
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `heads category` WHERE `Company` ='" .$_SESSION['company']. "'";     
 $result_count   = mysqli_query($conn,$query_count);     
 $totalrows  = mysqli_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  

echo "<h4 align='center' valign='top'>
<b><font face='Verdana' color='#000' style='font-size: 16pt'>Heads of Accounts Category Update</font></b>
</h4>";
 ?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:33.3%;background-color:#D2DD8F'>&nbsp;</div>
    <div  class="cell" style='width:33.3%;background-color:#D2DD8F'>Category</div>
    <div  class="cell" style='width:33.3%;background-color:#D2DD8F'>&nbsp;</div>
  </div>
<?php
    $result = mysqli_query ($conn,"SELECT `ID`,`Category` From `heads category` order by `Category` LIMIT $limitvalue, $limit"); 

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 
    $val='Account Heads Category';

    while(list($id,$cat)=mysqli_fetch_row($result)) 
    {	
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:33.3%">&nbsp;</div>
        <div  class="cell" style="width:33.3%"><a href = "tableupdates.php?cmbTable=' . $val . '&id=' . $id . '&adtx=1">' .$cat. '</a></div>
        <div  class="cell" style="width:33.3%">&nbsp;</div>
      </div>';
    } 
echo "<p>";
    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysqli_free_result($result);
 ?>
</p>

<p align="center">
  <?php
     echo "<a href ='tableupdates.php?cmbTable=$val&adtx=1'> Add New Accounts Heads Category </a>"; 
  ?>
</p>

<?php
  }
  else if (trim($cmbTable)=="Bank")
  {  
$id=$_REQUEST['id'];
$adtx=$_REQUEST['adtx'];

$sql="SELECT * FROM `bank` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID`='$id'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);

 @$limit      = 20; 
 @$page=$_GET['page'];
 $query_count    = "SELECT * FROM `bank` WHERE `Company` ='" .$_SESSION['company']. "'";     
 $result_count   = mysqli_query($conn,$query_count);     
 $totalrows  = mysqli_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  
    $val='Bank';
if($adtx==1)
{
?>

<form  action="submitbank.php" method="post">
<div align="left" class="agileinfo_mail_grids">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Bank Name:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="bank" value="<?php echo $row['Bank']; ?>">
	<input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
	<input type="hidden" name="page" value="<?php echo $page; ?>">
	<input type="hidden" name="val" value="<?php echo $val; ?>">
      </span>
      <span class="input input--chisato">
<?php
if(!$id)
{
  echo '<input type="submit" value="Add" name="submit" style="width:100px">';
} else {
  echo '<input type="submit" value="Modify" name="submit" style="width:100px">';
  echo '<input type="submit" value="Delete" name="submit" onclick="return confirm(\'Are you sure you want to Delete?\')" style="width:100px">';
}
?>
      </span>

</div>
</form>
<?php
}

    echo " <h4><b>[Bank Update]</b></h4>";
  ?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:33.3%;background-color:#D2DD8F'>&nbsp;</div>
    <div  class="cell" style='width:33.3%;background-color:#D2DD8F'>Bank Name</div>
    <div  class="cell" style='width:33.3%;background-color:#D2DD8F'>&nbsp;</div>
  </div>
<?php
    $result = mysqli_query ($conn,"SELECT `ID`, `Bank` From `bank` order by `ID` LIMIT $limitvalue, $limit"); 

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 
    $val='Bank';

    while(list($id, $bank)=mysqli_fetch_row($result)) 
    {
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:33.3%">&nbsp;</div>
        <div  class="cell" style="width:33.3%"><a href = "tableupdates.php?cmbTable=' . $val . '&id=' . $id . '&adtx=1">' .$bank. '</a></div>
        <div  class="cell" style="width:33.3%">&nbsp;</div>
      </div>';
    } 
echo "<p>";

    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysqli_free_result($result);
 ?>
</div>

<p align="center">
  <?php
     echo "<a href ='tableupdates.php?cmbTable=$val&adtx=1'>  Add New Bank </a>"; 
  ?>
</p>
<?php
  }

  else  if (trim($cmbTable)=="Nationality")
  {  
 $limit      = 35; 
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `Nationality`";     
 $result_count   = mysqli_query($conn,$query_count);     
 $totalrows  = mysqli_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  

    echo " <tr><b>[Nationality Update]</b><br></tr>";
    echo "<TR bgcolor='#D2DD8F'><TH width='40%'><b> Country</b>&nbsp;</TH></TR>";
 
    $result = mysqli_query ($conn,"SELECT `Nat_ID`,`Nationality` From `Nationality` LIMIT $limitvalue, $limit"); 

   if(mysqli_num_rows($result) == 0)
   { 
        echo("Nothing to Display!"); 
   } 
    $val='Nationality';

    while(list($id,$nation)=mysqli_fetch_row($result)) 
    {	
      echo "<TR><TH><a href='nationupdate.php?ID=" . $id . "'> $nation </a>&nbsp;</TH></TR>";
    } 
    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysqli_free_result($result);      
?>
<TABLE width='30%' border='1' cellpadding='1' cellspacing='0' align='center' bordercolor="#005B00">
<br>
  <?php
     echo "<TR>
               <TH><a href ='nationupdate.php'> Add New Nationality </a>&nbsp;</TH>
           </TR>"; 
  ?>
</TABLE>
<?php
  }
  else if (trim($cmbTable)=="Location")
  {  
$id=$_REQUEST['id'];
$adtx=$_REQUEST['adtx'];

$sql="SELECT * FROM `location` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Location_id`='$id'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);

 $limit      = 15; 
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `location` WHERE `Company` ='" .$_SESSION['company']. "'";     
 $result_count   = mysqli_query($conn,$query_count);     
 $totalrows  = mysqli_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  
    $val='Location';
if($adtx==1)
{
?>

<form  action="submitlocation.php" method="post">
<div align="left" class="agileinfo_mail_grids">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Location Name:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="location" value="<?php echo $row['Location']; ?>">
	<input type="hidden" name="locationid" value="<?php echo $row['Location_id']; ?>">
	<input type="hidden" name="page" value="<?php echo $page; ?>">
	<input type="hidden" name="val" value="<?php echo $val; ?>">
      </span>
      <span class="input input--chisato">
<?php
if(!$id)
{
echo '<input type="submit" value="Add" name="submit" style="width:100px">';
} else {
echo '<input type="submit" value="Modify" name="submit" style="width:100px">';
echo '<input type="submit" value="Delete" name="submit" onclick="return confirm(\'Are you sure you want to Delete?\')" style="width:100px">';
}
?>
      </span>
</div>
</form>
<?php
}

    echo " <h4><b>[Locations Update]</b></h4>";
    echo "<TR bgcolor='#D2DD8F'><TH><b> Location ID </b>&nbsp;</TH><TH><b> Location </b>&nbsp;</TH></TR>";
  ?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:33.3%;background-color:#D2DD8F'>&nbsp;</div>
    <div  class="cell" style='width:33.3%;background-color:#D2DD8F'>Location</div>
    <div  class="cell" style='width:33.3%;background-color:#D2DD8F'>&nbsp;</div>
  </div>
<?php
    $result = mysqli_query ($conn,"SELECT `Location_id`, `Location` From `Location` order by `Location_id` LIMIT $limitvalue, $limit"); 

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 
    $val='Location';

    while(list($id, $location)=mysqli_fetch_row($result)) 
    {
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:33.3%">&nbsp;</div>
        <div  class="cell" style="width:33.3%"><a href = "tableupdates.php?cmbTable=' . $val . '&id=' . $id . '&adtx=1">' .$location. '</a></div>
        <div  class="cell" style="width:33.3%">&nbsp;</div>
      </div>';
    } 
echo "<p>";

    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysqli_free_result($result);
 ?>
</div>

<p align="center">
  <?php
     echo "<a href ='tableupdates.php?cmbTable=$val&adtx=1'> Add New Location </a>"; 
  ?>
</p>
<?php
  }
  else if (trim($cmbTable)=="State")
  { 

$id=$_REQUEST['id'];
$adtx=$_REQUEST['adtx'];

$sql="SELECT * FROM `state` WHERE `State`='$id'";
$result = mysqli_query($conn,$sql) or die('Could not look up user data; ' . mysqli_error());
$row = mysqli_fetch_array($result);


 $limit      = 25; 
 $page=$_GET['page'];
 $query_count    = "SELECT * FROM `State`";     
 $result_count   = mysqli_query($conn,$query_count);     
 $totalrows  = mysqli_num_rows($result_count);
 if(empty($page))
 {
        $page = 1;
 }
 $limitvalue = $page * $limit - ($limit);  
    $val='State';
if($adtx==1)
{
?>
<form  action="submitstate.php" method="post">
<div align="left" class="agileinfo_mail_grids">
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">State:</span>
	</label>
	<input class="input__field input__field--chisato" placeholder=" " style="width:120px" type="text" name="state" value="<?php echo $row['State']; ?>">
	<input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
	<input type="hidden" name="page" value="<?php echo $page; ?>">
	<input type="hidden" name="val" value="<?php echo $val; ?>">
      </span>
      </span>
      <span class="input input--chisato">
<?php
if(!$id)
{
echo '<input type="submit" value="Add" name="submit" style="width:100px">';
} else {
echo '<input type="submit" value="Modify" name="submit" style="width:100px">';
echo '<input type="submit" value="Delete" name="submit" onclick="return confirm(\'Are you sure you want to Delete?\')" style="width:100px">';
}
?>
      </span>

</div>
</form>
<?php
}

    echo " <h4><b>[States Update]</b></h4>";
  ?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:33.3%;background-color:#D2DD8F'>&nbsp;</div>
    <div  class="cell" style='width:33.3%;background-color:#D2DD8F'>State</div>
    <div  class="cell" style='width:33.3%;background-color:#D2DD8F'>&nbsp;</div>
  </div>
<?php
    $result = mysqli_query ($conn,"SELECT `State` From `State` order by `State` LIMIT $limitvalue, $limit"); 

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 
    $val='State';

    while(list($state)=mysqli_fetch_row($result)) 
    {	
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:33.3%">&nbsp;</div>
        <div  class="cell" style="width:33.3%"><a href = "tableupdates.php?cmbTable=' . $val . '&id=' . $state . '&adtx=1">' .$state. '</a></div>
        <div  class="cell" style="width:33.3%">&nbsp;</div>
      </div>';
    } 
echo "<p>";
    if($page != 1)
    {  
       $pageprev = $page-1;       
       echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$i\">$i</a>  "); 
        } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1; 
          
        echo("<a href=\"$PHP_SELF?cmbTable=$val&page=$pagenext\">NEXT PAGE</a>");  
    }
    else
    { 
        echo("NEXT PAGE");  
    } 
  
    mysqli_free_result($result);      
?>
</div>

<p align="center">
  <?php
     echo "<a href ='tableupdates.php?cmbTable=$val&adtx=1'>Add New State </a>"; 
  ?>
</p>
<?php
  }
?>

<p>
<?php
 echo "<a href='admin.php'> Go back to Control Panel</a> &nbsp; ";
?>
</p>

</div>
</div>
<?php
require_once 'footer.php';
?>
</div>