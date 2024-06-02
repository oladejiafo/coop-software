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

<title>Backup & Restore | Cooperatives Management Software</title>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Backup & Restore</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="backmeup.php">
										<i class="fa fa-backup"></i>
									</a>
								</li>
								<li><span>Records</span></li>
							</ol>
					
							&nbsp;
						</div>
					</header>


<div class="services">
	<div class="container"  style="width:100%">

<div align="center">
   <form  action="backmeup.php" method="GET">
    <body bgcolor="#D2DD8F">
      Select Table and click open: <select size="1" name="cmbTable" style="width:250px;height:40px; font-size:11px">
      <option selected>- Select Option-</option>
      <option>Backup Database</option>
      <option>Restore Database</option>
     </select>
     &nbsp; 
     <input type="submit" value="Open" name="submit">
     <br>
    </body>
   </form>
</div>

<?php
echo '<div class="div-table">';
  @$cmbTable=$_GET['cmbTable']; 
  if (trim($cmbTable)=="- Select Option-" OR trim($cmbTable)=="")
  {
    include 'backup.php'; 
  }
  else if (trim($cmbTable)=="Backup Database")
  { 
    include 'backup.php'; 
  }  
  else if (trim($cmbTable)=="Restore Database")
  { 
    include 'restore.php'; 
  }  
?>


</div>
</div>
<?php 
 require_once 'footer.php'; 
?>
</div>
