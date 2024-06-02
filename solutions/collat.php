<p>&nbsp;</p>
<fieldset>
<legend><b><font color='#006699' style='font-size: 12pt'><i>Collateral</i></b></font></legend>
<?php
$iddxx=$_REQUEST['iddx'];
$trans=$_REQUEST['trans'];
?>
<div class="div-table">
<div class="tab-row" style="font-weight:bold;width:100%;height:3px;background-color:#ff0000">
    <div  class="cell" style='width:100%;;background-color:#000'></div>
</div>    

  <div class="tab-row" style="font-weight:bold">
    <div  class="cell" style='width:25%'><b>Item</b></div>
    <div  class="cell" style='width:25%'><b>Location </b></div>
    <div  class="cell" style='width:25%'><b>Value </b></div>
    <div  class="cell" style='width:25%'><b>Title </b></div>
  </div>
<?php
    $queryXX="SELECT `ID`,`Collateral`,`Collateral Location`,`Collateral Value`,`Collateral Title` FROM `loan` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID`='" . $row['ID'] . "' AND `Account Number`='" . $acctno . "' order by ID";
    $resultXX=mysqli_query($conn,$queryXX);

   if(mysqli_num_rows($resultXX) == 0)
   {
        echo("<p>Nothing to Display!</p>");
   }

    while(list($iddx,$collatx,$locx,$valuex,$titlex)=mysqli_fetch_row($resultXX))
     {
      echo '
        <div class="tab-row">
        <div  class="cell" style="width:25%;height:70px"><a href = "loans.php?edit=4&acctno=' .$acctno. '&iddx=' .$iddx. '">' .$collatx. '</a></div>
        <div  class="cell" style="width:25%;height:70px">' .$locx. '</div>
        <div  class="cell" style="width:25%;height:70px">' .$valuex. '</div>
        <div  class="cell" style="width:25%;height:70px">' .$titlex. '</div>
       </div>';
     }
echo "</div>";    
if($edit != 4 and $edit != 3 and $edit != 2 and $edit != 1) 
{
 echo "<br>
  <div align='right' style='width:100%; padding-right:10px;padding-top:5px'>
    <span align='right' style='color:#fff;background-color:#000; width:170px; height:35px;padding:7px'><a href ='loans.php?acctno=$acctno&iddx=$iddx&edit=4' style='color:#cbd9d9'>Add Collateral </a></span>
  </div>";
} 
?>
