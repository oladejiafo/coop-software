<p>&nbsp;</p>
<fieldset>
<legend><b><i>Guarantor</i></b></legend>
<?php
$idxx=$_REQUEST['idx'];
$trans=$_REQUEST['trans'];

list($cp, $fld) = explode(' ', $_SESSION['company']);
$cpfolder=$cp . $fld;

if($trans==1)
{
$sqlTX="SELECT * FROM `loan guarantor` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID`='$idxx'";
$resultTX = mysqli_query($conn,$sqlTX) or die('Could not look up user data; ' . mysql_error());
$rowTX = mysqli_fetch_array($resultTX);
?>

<form action="submitguarantor.php" method="post"  enctype="multipart/form-data">

<div align="left">

      <span class="input input--chisato">

	<label class="input__label input__label--chisato">

		<span class="input__label-content input__label-content--chisato">Guarantor:</span>

	</label>

        <input type="text" name="guarantor" size="31" value="<?php echo $rowTX['Guarantor']; ?>" class="input__field input__field--chisato" placeholder=" ">

        <input type="hidden" name="id" size="31" value="<?php echo $rowTX['ID']; ?>">

        <input type="hidden" name="lid" size="31" value="<?php echo $row['ID']; ?>">

        <input type="hidden" name="acctno" size="31" value="<?php echo $acctno; ?>">

      </span>

      <span class="input input--chisato">

	<label class="input__label input__label--chisato">

		<span class="input__label-content input__label-content--chisato">Phone/Address:</span>

	</label>

        <input type="text" name="contact" size="31" value="<?php echo $rowTX['Contact']; ?>" class="input__field input__field--chisato" placeholder=" ">

      </span>

      <span class="input input--chisato">

	<label class="input__label input__label--chisato">

		<span class="input__label-content input__label-content--chisato">Occupation:</span>

	</label>

        <input type="text" name="occupation" size="31" value="<?php echo $rowTX['Occupation']; ?>" class="input__field input__field--chisato" placeholder=" ">

      </span>

      <span class="input input--chisato">

	<label class="input__label input__label--chisato">

		<span class="input__label-content input__label-content--chisato">Business Address:</span>

	</label>

        <input type="text" name="baddress" size="31" value="<?php echo $rowTX['Business Address']; ?>" class="input__field input__field--chisato" placeholder=" ">

      </span>


      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">Identification Type:</span>
	</label>
        <select class="input__field input__field--chisato" placeholder=" "  name="idtype" width="31" value="<?php echo $rowTX['Identification Type']; ?>">  
          <?php  
           echo '<option selected>' . $rowTX['Identification Type'] . '</option>';
           echo '<option>Drivers Licence</option>';
           echo '<option>International Passport</option>';
           echo '<option>National ID Card</option>';
           echo '<option>Staff ID Card</option>';
           echo '<option>Voters Card</option>';
           echo '<option>Others</option>';
          ?> 
         </select>
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">ID Card Number:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" "  type="text" name="idnumber" size="24" value="<?php echo $rowTX['Identification Number']; ?>">
      </span>
      <span class="input input--chisato">
	<label class="input__label input__label--chisato">
		<span class="input__label-content input__label-content--chisato">ID Card Expiry Date:</span>
	</label>
        <input class="input__field input__field--chisato" placeholder=" " id="inputField2"  type="text" name="idexpire" size="24" value="<?php echo $rowTX['ID Expiration']; ?>">
      </span>
<span class="input input--chisato" style="vertical-align:bottom">

<div style="vertical-align:bottom">

<span>

 <?php
  if(strlen($idxx) > 1)
  {
    $idxx=$idxx;
  } else {
    $idxx ="X5677";
  }
  if (file_exists("images/sign/" .$cpfolder. "/gr_" . $idxx . ".jpg")==1)

  {

 ?>

              <img border="1" src="images/sign/<?php echo $cpfolder;?>/gr_<?php echo $idxx; ?>.jpg" width="140" height="70">

 <?php

  } else {
 
?>

              <img border="1" src="images/sign/sign.jpg" width="140" height="70">
<?php
  }
 ?>

</span>

<span>

 Browse & Upload Image:<br>
<input name="sign_filename" type="file" id="sign_filename" size="15">
  
</span>

</div>

</span>


<span class="input input--chisato">
<div style="vertical-align:bottom">
<span>Upload Guarantor ID Card:</span><br>
<span>
<?php
  if (file_exists("images/scan/grid_" . $idxx . ".jpg")==1)
  { 
?>

              <img border="1" src="images/scan/grid_<?php echo $idxx; ?>.jpg" width="200" height="110">
<?php
  } else { 
?>
              <img border="1" src="images/scan/card.jpg" width="200" height="110">	 
<?php
  } 
?>			 
</span>
<span>
Browse and Upload Scan<br><input name="scan_filename" type="file" id="scan_filename">
</span>
</div>
</span>
      <span class="input input--chisato">

<?php

if (!$idxx)
{

?>

  <input type="submit" style="width:200" value="Save" name="submit"> &nbsp;

<?php 
} 
 else { 
?>

  <input type="submit" value="Update" name="submit"> &nbsp;
 
  <input type="submit" value="Delete" name="submit" onclick="return confirm('Are you sure you want to Delete?');"> &nbsp;
 

<?php

}

?>
 
</span>

</form>

</div>

<?php

}

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

        <div  class="cell" style="width:25%;height:70px"><a href = "loans.php?trans=1&acctno=' .$acctno. '&idx=' .$idx. '">' .$name. '</a></div>

        <div  class="cell" style="width:25%;height:70px">' .$contact. '</div>

        <div  class="cell" style="width:25%;height:70px">' .$occup. '</div>

        <div  class="cell" style="width:25%;height:70px">';
 
      if (file_exists("images/sign/" .$cpfolder. "/gr_" . $idx . ".jpg")==1)

       {

        echo '<img border="1" src="images/sign/gr_' . $idx . '.jpg" width="140" height="65">';

       } else {
 
        echo '<img border="1" src="images/sign/sign.jpg" width="140" height="65">';
 
       }

        echo '</div>

       </div>';

     }

echo "</div><br>
<div align='right' style='width:100%; padding-right:10px;padding-top:5px'>
<span align='right' style='color:#fff;background-color:blue; width:170px; height:35px;padding:7px'><a href ='loans.php?trans=1&acctno=$acctno&idx=$idx' style='color:#cbd9d9'>Add Guarantor </a></span>
</div>";
?>
