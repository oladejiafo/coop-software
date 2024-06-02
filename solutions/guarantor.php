<p>&nbsp;</p>
<fieldset>
<legend><b><font color='#006699' style='font-size: 12pt'><i>Guarantor</i></b></font></legend>
<?php
$idxx=$_REQUEST['idx'];
$trans=$_REQUEST['trans'];
?>
<div class="div-table">
<div class="tab-row" style="font-weight:bold;width:100%;height:3px;background-color:#ff0000">
    <div  class="cell" style='width:100%;;background-color:#cbd9d9'></div>
</div>    

  <div class="tab-row" style="font-weight:bold">
    <div  class="cell" style='width:25%'><b>Guarantor </b></div>
    <div  class="cell" style='width:25%'><b>Phone/Address </b></div>
    <div  class="cell" style='width:25%'><b>Occupation </b></div>
    <div  class="cell" style='width:25%'><b>Signature </b></div>
  </div>
<?php
    $queryXX="SELECT `ID`,`Loan_ID`,`Guarantor`,`Contact`,`Occupation` FROM `loan guarantor` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Loan_ID`='" . $row['ID'] . "' order by ID";
    $resultXX=mysqli_query($conn,$queryXX);

   if(mysqli_num_rows($resultXX) == 0)
   {
        echo("<p>Nothing to Display!</p>");
   }

    while(list($idx,$lidx,$name,$contact,$occup)=mysqli_fetch_row($resultXX))
     {
      echo '
        <div class="tab-row">
        <div  class="cell" style="width:25%;height:70px"><a href = "loans.php?trans=1&acctno=' .$acctno. '&idx=' .$idx. '&edit=3">' .$name. '</a></div>
        <div  class="cell" style="width:25%;height:70px">' .$contact. '</div>
        <div  class="cell" style="width:25%;height:70px">' .$occup. '</div>
        <div  class="cell" style="width:25%;height:70px">';
       if (file_exists("images/sign/gr_" . $idx . ".jpg")==1)
       {
        echo '<img border="1" src="images/sign/gr_' . $idx . '.jpg" width="140" height="65">';
       } else { 
        echo '<img border="1" src="images/sign/sign.jpg" width="140" height="65">';
       }
        echo '</div>
       </div>';
     }
echo "</div>";    
if($edit != 4 and $edit != 3 and $edit != 2 and $edit != 1) 
{
 echo "<br>
  <div align='right' style='width:100%; padding-right:10px;padding-top:5px'>
    <span align='right' style='color:#fff;background-color:#006699; width:170px; height:35px;padding:7px'><a href ='loans.php?trans=1&acctno=$acctno&idx=$idx&edit=3' style='color:#cbd9d9'>Add Guarantor </a></span>
  </div>";
} 
?>
