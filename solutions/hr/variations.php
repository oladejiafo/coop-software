<?php
 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';

//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & $_SESSION['access_lvl'] != 5) 
{
 if ($_SESSION['access_lvl'] != 1) 
 {
   $redirect = $_SERVER['PHP_SELF'];
   header("Refresh: 0; URL=../index.php?redirect=$redirect");
 }
}

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
		<h2 class="panel-title">Variations Records</h2>
	</header>
       <div class="panel-body">

<div class="services">
	<div class="container"  style="width:100%">


<div align="center">
   <form  action="variations.php" method="post">
      Select Criteria to Search with: <select style="height:35px;width: 150px" name="cmbFilter">
      <option selected></option>
      <option value="For Month">For Month</option>
      <option value="Name">Name</option>
      <option value="Staff Number">Staff Number</option>
     </select>
     &nbsp; 
     <input type="text" name="filter" style="height:35px;width: 150px">
     &nbsp; 
     <input type="submit" value="Search" name="submit" style="height:35px;width: 150px">
   </form>
</div>
<div align="right">
<legend><b><i><font size="2" face="Tahoma" color="#000000"> <?php require_once 'payheader.php'; ?>
</font></i></b></legend>
</div>

<div class="div-table">
 <?php
 $limit      = 15;
 @$page=$_GET['page'];
 $query_count    = "SELECT * FROM `variation`";
 $result_count   = mysqli_query($conn,$query_count);     
 @$totalrows  = mysqli_num_rows($result_count);

 if(empty($page))
 {
        $page = 1;
 }

 @$limitvalue = $page * $limit - ($limit);  

 @$cmbFilter=$_POST["cmbFilter"];
 @$filter=$_POST["filter"];

?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:25%'>Staff No</div>
    <div  class="cell" style='width:25%'>Staff Name</div>
    <div  class="cell" style='width:25%'>Variation Type</div>
    <div  class="cell" style='width:25%'>Applicable Month</div>
  </div>
<?php

  if (!$cmbFilter=="")
  {
    $query="SELECT `ID`,`Staff Number`,`Name`,`Type`,`For Month` FROM `variation` WHERE `" . $cmbFilter . "` like '" . $filter . "%' LIMIT $limitvalue, $limit";
    $result=mysqli_query($conn,$query);
  }
  else
  {
    $query="SELECT `ID`,`Staff Number`,`Name`,`Type`,`For Month` FROM `variation` LIMIT $limitvalue, $limit";
    $result=mysqli_query($conn,$query);
  }

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 

    while(list($id,$ServiceNo,$name,$type,$month)=mysqli_fetch_row($result))
    {
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:25%">' .$ServiceNo. '</div>
        <div  class="cell" style="width:25%"><a href = "variationsupdate.php?id=' . $id . '&pn=' .$ServiceNo. '">' .$name. '</a></div>
        <div  class="cell" style="width:25%">' .$type. '</div>
        <div  class="cell" style="width:25%">' .$month. '</div>
      </div>';
    }
echo "<p>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"variations.php?page=$pageprev\">PREV PAGE</a>   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;");
    }
    else 
     #  echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
#            echo($i."  "); 
        }else{ 
#            echo("<a href=\"$PHP_SELF?page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
 #           echo($i."  "); 
        }
        else
        { 
 #           echo("<a href=\"$PHP_SELF?page=$i\">$i</a>  "); 
       } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"variations.php?page=$pagenext\">NEXT PAGE</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;");             
    }          
    else
    { 
#        echo("NEXT PAGE");  
    } 
 ?>
</p>
</div>
<p align="center"><b><a href = 'variationsupdate.php'><font color='#6699CC'>Add a New Variation Record </font></a><b></p>
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