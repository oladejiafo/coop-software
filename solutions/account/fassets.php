<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 3))
{
  if ($_SESSION['access_lvl'] != 5){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=../indexx.php?redirect=$redirect");
}
}
 require_once 'conn.php';
 require_once 'header.php';
 require_once 'style.php';

 @$cmbFilter=$_REQUEST["cmbFilter"];
 @$filter=$_REQUEST["filter"];
?>
<!-- load jquery ui css-->
<link href="../js/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<!-- load jquery library -->
<script src="../js/jquery-1.9.1.js"></script>
<!-- load jquery ui js file -->
<script src="../js/jquery-ui.min.js"></script>

<style type="text/css">
.div-table {
    width: 100%;
//    border: 1px dashed #ff0000;
    float: left;
    padding:10px;
}

.tab-row {
	background-color: #EEEEEE;
	float: left;
	width: 100%;
	height:45px;
}

.cell {
    padding: 1px;
    border: 1px solid #e9e9e9;
    float: left;
    padding: 5px; 
    background-color: #f5f5f5;
    width: 50%;
    height:45px;
    font-size:12px;
}
</style>

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Fixed Assets Register</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="fassets.php">
										<i class="fa fa-list"></i>
									</a>
								</li>
								<li><span>Accounts</span></li>
							</ol>
					
							&nbsp;
						</div>
					</header>

<div align="center">

<div align="center">
   <form  action="fassets.php" method="post">
    <select size="1" name="cmbFilter" style="height:40px;width:120px; font-size: 12px">
      <option selected><?php echo $cmbFilter; ?></option>
      <option value="All">All</option>
      <option value="Category">Category</option>
      <option value="Location">Location</option>
      <option value="Name">Name</option>
      <option value="Status">Status</option>
      <option value="Sold Assets">Sold Assets</option>
     </select>
     &nbsp; 
     <input type="text" name="filter" style="height:35px;width:120px; font-size: 12px">
     &nbsp; 
     <input type="submit" value="Search" name="submit"  style="height:35px;width:120px; font-size: 12px">
     <br>
   </form>
</div>

<div class="div-table">
 <?php
 @$tval=$_GET['tval'];
 @$limit      = 25;
 @$page=$_GET['page'];

 @$cmbFilter=$_REQUEST["cmbFilter"];
 @$filter=$_REQUEST["filter"];

  if ($cmbFilter =="Sold Assets")
  {
    $cmbFilter =="Sold";
    $filter ==1;
  }

 echo "<p><font color='#FF0000' style='font-size: 9pt'>" . $tval . "</font></p>";

?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:14.2%;background-color:#c0c0c0'>Asset Code</div>
    <div  class="cell" style='width:14.2%;background-color:#c0c0c0'>Location</div>
    <div  class="cell" style='width:14.2%;background-color:#c0c0c0'>Category</div>
    <div  class="cell" style='width:14.2%;background-color:#c0c0c0'>Name</div>
    <div  class="cell" style='width:14.2%;background-color:#c0c0c0'>Quantity</div>
    <div  class="cell" style='width:14.2%;background-color:#c0c0c0'>Status</div>
    <div  class="cell" style='width:14.2%;background-color:#c0c0c0'>Serial No</div>
  </div>
<?php

  if ($cmbFilter !="" & $cmbFilter !="All")
  {
   $query_count    = "SELECT * FROM `assets` WHERE `Company` ='" .$_SESSION['company']. "' AND  `" . $cmbFilter . "` like '" . $filter . "%'";
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $query="SELECT `ID`,`Code`,`Location`,`Category`,`Name`,`Quantity`,`Status`,`Serial No` FROM `assets` WHERE `Company` ='" .$_SESSION['company']. "' AND  `" . $cmbFilter . "` like '" . $filter . "%' order by `Code` desc LIMIT $limitvalue, $limit";
   $result=mysqli_query($conn,$query);

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 

    while(list($id,$code,$location,$category,$name,$quantity,$status, $serialno)=mysqli_fetch_row($result))
    {
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:14.2%">' .$code. '</div>
        <div  class="cell" style="width:14.2%">' .$location. '</div>
        <div  class="cell" style="width:14.2%">' .$category. '</div>
        <div  class="cell" style="width:14.2%"><a href ="assets.php?ID=' .$id. '">' .$name. '</a></div>

        <div  class="cell" style="width:14.2%">' .$quantity. '</div>
        <div  class="cell" style="width:14.2%">' .$status.  '</div>
        <div  class="cell" style="width:14.2%">' .$serialno.  '</div>
      </div>';
    }
echo "<div>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"fassets.php?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
#       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
#            echo($i."  "); 
        }else{ 
            echo("<a href=\"fassets.php?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
  #          echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"fassets.php?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  "); 
       } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"fassets.php?cmbFilter=$cmbFilter&filter=$filter&page=$pagenext\">NEXT PAGE</a>");  
            
    }          
    else
    { 
#        echo("NEXT PAGE");  
    } 
echo "</div>";
  }
  else
  {
   $query_count    = "SELECT * FROM `assets` WHERE`Company` ='" .$_SESSION['company']. "'";
   $result_count   = mysqli_query($conn,$query_count);     
   $totalrows  = mysqli_num_rows($result_count);

   if(empty($page))
   {
         $page = 1;
   }
   $limitvalue = $page * $limit - ($limit);  

   $query="SELECT `ID`,`Code`,`Location`,`Category`,`Name`,`Quantity`,`Status`,`Serial No` FROM `assets` WHERE`Company` ='" .$_SESSION['company']. "' order by `Code` desc LIMIT $limitvalue, $limit";
   $result=mysqli_query($conn,$query);

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 

    while(list($id,$code,$location,$category,$name,$quantity,$status, $serialno)=mysqli_fetch_row($result))
    {
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:14.2%">' .$code. '</div>
        <div  class="cell" style="width:14.2%">' .$location. '</div>
        <div  class="cell" style="width:14.2%">' .$category. '</div>
        <div  class="cell" style="width:14.2%"><a href ="assets.php?ID=' .$id. '">' .$name. '</a></div>

        <div  class="cell" style="width:14.2%">' .$quantity. '</div>
        <div  class="cell" style="width:14.2%">' .$status.  '</div>
        <div  class="cell" style="width:14.2%">' .$serialno.  '</div>
      </div>';
    }
echo "<div>";

    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"fassets.php?cmbFilter=$cmbFilter&filter=$filter&page=$pageprev\">PREV PAGE</a>  ");
    }
    else 
#       echo("PREV PAGE  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
#            echo($i."  "); 
        }else{ 
            echo("<a href=\"fassets.php?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  ");  
        }
    } 
    if(($totalrows % $limit) != 0)
    { 
        if($i == $page)
        { 
  #          echo($i."  "); 
        }
        else
        { 
            echo("<a href=\"fassets.php?cmbFilter=$cmbFilter&filter=$filter&page=$i\">$i</a>  "); 
       } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"fassets.php?cmbFilter=$cmbFilter&filter=$filter&page=$pagenext\">NEXT PAGE</a>");  
            
    }          
    else
    { 
#        echo("NEXT PAGE");  
    } 
echo "</div>";
  }

 ?>
</div>

<div align="center">
  <?php
     echo "<a href ='assets.php'> Add New Record </a>&nbsp;||
	<a target=blank href ='rptfassets.php?cmbFilter=$cmbFilter&filter=$filter'> Print this Report </a>";
  ?>
</div>

<?php
require_once 'footer.php';
?>
</div>
