<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & $_SESSION['access_lvl'] != 5) 
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

 $cmbFilter = $_REQUEST["cmbFilter"];
$filter = $_REQUEST["filter"];
if($cmbFilter=='' OR empty($cmbFilter) OR $cmbFilter=='All')
{
   $cmbFilter='user_id';
}

?>
<style type="text/css">
.div-table {
    float: left;
    width: 100%;
	padding:15px;
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

<title>Users | Cooperatives Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>MANAGE USER LOGINS</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="loans.php">
										<i class="fa fa-user"></i>
									</a>
								</li>
								<li><span></span></li>
							</ol>
					
							&nbsp;
						</div>
					</header>

<div class="services">
 <div class="container"  style="width:100%">
  <div align="center" style="width:100%">
   <form  action="listing.php" method="post">
     <select class="form-controlx custom-select-value" name="cmbFilter" style="height:40px; width:150px;">
      <option selected>All</option>
      <option value="username">User Name</option>
      <option value="access_name">User Category</option>
      <option hidden value="SNO">Staff Number</option>
     </select>
     &nbsp; 
     <input type="text" name="filter" style="height:38px; width:120;">
     &nbsp; 
     <input type="submit" value="Search" name="submit" class="btn btn-info btn-md" style="width:100;">
   </form>
  </div>
<div class="div-table">

 <?php
 @$limit      = 25;
 @$page=$_GET['page'];
 @$query_count    = "SELECT * FROM `login` WHERE `Company` ='" .$_SESSION['company']. "' AND `username` not in ('demo','control') AND `" . $cmbFilter . "` like '%" . $filter . "%'";     
 @$result_count   = mysqli_query($conn,$query_count);     
 @$totalrows  = mysqli_num_rows($result_count);

 if(empty($page))
 {
        $page = 1;
 }

 $limitvalue = $page * $limit - ($limit);  
?>
  <div class="tab-row" style="font-weight:bold">
    <div  class="cell"  style='width:25%;background-color:#cbd9d9'>UserName</div>
    <div  class="cell" style='width:25%;background-color:#cbd9d9'>Category</div>
    <div  class="cell" style='width:25%;background-color:#cbd9d9'>e-mail</div>
    <div  class="cell" style='width:25%;background-color:#cbd9d9'></div>
  </div>
<?php

    $query="SELECT login.user_id,login.username,login.access_lvl,cms_access_levels.access_name,login.email FROM login inner join cms_access_levels on login.access_lvl=cms_access_levels.access_lvl where `username` not like 'control%' AND `Company` ='" .$_SESSION['company']. "' AND `username` not in ('demo','control') AND `" . $cmbFilter . "` like '%" . $filter . "%' order by login.access_lvl desc LIMIT $limitvalue, $limit";
    $result=mysqli_query($conn,$query);

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 

    while(list($us_id,$usname,$ac_lvl,$ac_name,$email)=mysqli_fetch_row($result))
    {
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:25%">' .$usname. '</div>
        <div  class="cell" style="width:25%">' .$ac_name. '</div>
        <div  class="cell" style="width:25%">' .$email. '</div>
        <div align="center" class="cell" style="width:25%"><a href = "useraccount.php?UID=' . $us_id . '" title="Click to View, Modify or Delete this user record"><font style="font-size:16px"><i class="fa fa-pencil btn-info btn-lg"></i></font></a></div>
      </div>';
    }
    echo "<p>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"$PHP_SELF?page=$pageprev\"> PREV<< </a>  ");
    }
    else 
       echo("PREV<<  ");  

    $numofpages = $totalrows / $limit;  
    for($i = 1; $i <= $numofpages; $i++)
    { 
        if($i == $page)
        { 
            echo($i."  "); 
        }else{ 
            echo("<a href=\"$PHP_SELF?page=$i\">$i</a>  ");  
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
            echo("<a href=\"$PHP_SELF?page=$i\">$i</a>  "); 
       } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"$PHP_SELF?page=$pagenext\">NEXT>></a>");  
            
    }          
    else
    { 
        echo("NEXT>>");  
    } 
    echo "</p>";
 ?>
</div>
<?php
require_once 'footer.php';
?>
</div></div>