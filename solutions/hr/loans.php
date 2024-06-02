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
<div class="services">
	<div class="container"  style="width:100%">

<div class='row' style="background-color:#394247; width:100%" align="center">
  <b><font face="Verdana" color="#FFFFFF" style="font-size: 16pt">Loans Records</font></b>
 </div>

<div align="center">
   <form  action="loans.php" method="post">
      Select Criteria to Search with: <select style="height:35px;width: 150px" name="cmbFilter">
      <option selected></option>
      <option value="Loan Date">Loan Date</option>
      <option value="Staff Name">Staff Name</option>
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
 $query_count    = "SELECT * FROM `loan`";     
 $result_count   = mysqli_query($conn,$query_count);     
 $totalrows  = mysqli_num_rows($result_count);

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
    <div  class="cell" style='width:25%'>Staff Nmae</div>
    <div  class="cell" style='width:25%'>Loan Type</div>
    <div  class="cell" style='width:25%'>Loan Date</div>
  </div>
<?php

  if (!$cmbFilter=="")
  {
    $query="SELECT `ID`,`Staff Number`,`Staff Name`,`Loan Type`,`Loan Date` FROM loan WHERE `" . $cmbFilter . "` like '" . $filter . "%' LIMIT $limitvalue, $limit";
    $result=mysqli_query($conn,$query);
  }
  else
  {
    $query="SELECT `ID`,`Staff Number`,`Staff Name`,`Loan Type`,`Loan Date` FROM loan LIMIT $limitvalue, $limit";
    $result=mysqli_query($conn,$query);
  }

   if(mysqli_num_rows($result) == 0)
   { 
        echo("<p>Nothing to Display!</p>"); 
   } 

    while(list($id,$ServiceNo,$name,$loantype,$loandate)=mysqli_fetch_row($result))
    {
     echo '	
        <div class="tab-row"> 
        <div  class="cell" style="width:25%">' .$ServiceNo. '</div>
        <div  class="cell" style="width:25%"><a href = "loansupdate.php?id=' . $id . '&SNO=' .$ServiceNo. '">' .$name. '</a></div>
        <div  class="cell" style="width:25%">' .$loantype. '</div>
        <div  class="cell" style="width:25%">' .$loantype. '</div>
      </div>';
    }

echo "<p>";
    if($page != 1)
    {  
       $pageprev = $page-1;
       echo("<a href=\"loans.php?page=$pageprev\">PREV PAGE</a>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;");
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
#            echo($i."  "); 
        }
        else
        { 
#            echo("<a href=\"$PHP_SELF?page=$i\">$i</a>  "); 
       } 
    }
    if(($totalrows - ($limit * $page)) > 0)
    { 
        $pagenext = $page+1;

        echo("<a href=\"loans.php?page=$pagenext\">NEXT PAGE</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;");  
            
    }          
    else
    { 
#        echo("NEXT PAGE");  
    } 
 ?>
</p>
</div>

<p align="center"><b><a href = 'loansupdate.php'><font color='#6699CC'>Add a New Loan Record </font></a><b></p>
</div>
<?php
require_once 'footer.php';
?>
</div>