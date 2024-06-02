<?php
session_start();
 require_once 'header.php';
 require_once 'style.php';
 require_once 'conn.php';
 require_once 'http.php';
?>
<div align="center">
<div style="width:100%;height:60px;background-color:#2e344e; padding:10px">
 <b><font face="Verdana" color="#FFFFFF" style="font-size: 16pt">Import New Members from Excel</font></b>
</div>

<div style="height:30%;margin-top:5%">
 <form action="importmembers.php" method="post" enctype="multipart/form-data">
  <div style="height:40px;font-size:14px"><b>Import File [ . XLS only]:</b></div>
  <div><input name="doc_filename" type="file" id="doc_filename" style="width:250px;height:35px"></div>
  <div><input type="submit" value="Submit" name="submit" style="width:250px;height:35px"> &nbsp;</div>
  <?php if (!empty($_REQUEST['tval'])) { echo $_REQUEST['tval']; } ?>
 </form>
</div>
<div>
<?php

if (!empty($_FILES['doc_filename']['name']))
{
    if (file_exists("temp/import/members/" . $_FILES['doc_filename']['name'])==1)
    {
      $ImageNam = "temp/import/members/" . $_FILES['doc_filename']['name'];
      $newfilenam = "temp/import/members/" . date("Y-m-d") . "_" . $_FILES['doc_filename']['name'];
      rename($ImageNam, $newfilenam);
    }
    //make variables available
    $image_userid = $id;
    $image_tempname = $_FILES['doc_filename']['name'];
    $today = date("Y-m-d");

   //upload image and check for image type

   $ImageDir ="temp/import/members/";
   $ImageName = $ImageDir . $image_tempname;
   if (move_uploaded_file($_FILES['doc_filename']['tmp_name'],$ImageName))
   {
    //get info about the image being uploaded
    list($width, $height, $type, $attr) = getimagesize($ImageName);

    $ext = ".xls";

    $newfilename = $ImageDir . $_FILES['doc_filename']['name'];
    rename($ImageName, $newfilename);
   }

######

set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
include 'PHPExcel/IOFactory.php';

// This is the file path to be uploaded.
$inputFileName = $ImageName;

try {
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
} catch(Exception $e) {
	die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}


$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet


for($i=2;$i<=$arrayCount;$i++){
$sname = trim($allDataInSheet[$i]["A"]);
$fname = trim($allDataInSheet[$i]["B"]);
$mcode = trim($allDataInSheet[$i]["C"]);
$type = trim($allDataInSheet[$i]["D"]);
$pos = trim($allDataInSheet[$i]["E"]);
$branch = trim($allDataInSheet[$i]["F"]);

$imail = trim($allDataInSheet[$i]["G"]);
$phone = trim($allDataInSheet[$i]["H"]);
$addr = trim($allDataInSheet[$i]["I"]);
$age = trim($allDataInSheet[$i]["J"]);
$gender = trim($allDataInSheet[$i]["K"]);
$mstatus = trim($allDataInSheet[$i]["L"]);
$occup = trim($allDataInSheet[$i]["M"]);
$city = trim($allDataInSheet[$i]["N"]);
$state = trim($allDataInSheet[$i]["O"]);
$dob = trim($allDataInSheet[$i]["P"]);
$regdate = trim($allDataInSheet[$i]["Q"]);
$appdate = trim($allDataInSheet[$i]["R"]);
$shares = trim($allDataInSheet[$i]["S"]);
$sharesv = trim($allDataInSheet[$i]["T"]);
$idtype = trim($allDataInSheet[$i]["U"]);
$idcard = trim($allDataInSheet[$i]["V"]);
$sponsor = trim($allDataInSheet[$i]["W"]);
$nkin = trim($allDataInSheet[$i]["X"]);
$nkincontact = trim($allDataInSheet[$i]["Y"]);
$nkinrel = trim($allDataInSheet[$i]["Z"]);

########### CURRENCY CHECK
$prices = str_replace(',', '.', $sharesv);
$prices =preg_replace("/[^0-9\.]/","",$prices);
$sharesv = str_replace('.','',substr($prices,0,-3)) . substr($prices,-3);

######### DATEs CHECKS #################
if($regdate !="" AND $regdate != "0000-00-00")
{
 $regdatee = date('Y-m-d', strtotime($regdate));
 if($regdatee =="1970-01-01")
 {
  $regdatee = str_replace('/', '-', $regdate);
 }
 $regdate =$regdatee;
}

if($appdate !="" AND $appdate != "0000-00-00")
{
 $appdatee = date('Y-m-d', strtotime($appdate));
 if($appdatee =="1970-01-01")
 {
  $appdatee = str_replace('/', '-', $appdate);
 }
 $appdate =$appdatee;
}

if($dob !="" AND $dob != "0000-00-00")
{
 $dobb = date('Y-m-d', strtotime($dob));
 if($dobb =="1970-01-01")
 {
  $dobb = str_replace('/', '-', $dob);
 }
 $dob =$dobb;
}

############################################################################################
if($sname !="" and $branch != "")
{
  ################ CHECK EXISTING ##########################
$queryS = "SELECT `Surname`,`Branch`,`First Name` FROM `membership` WHERE `Surname` = '".$sname."' and `First Name`='".$fname."' and `Branch`='".$branch."' and `Company`='".$_SESSION[company]."'";
$sqlS = mysqli_query($conn, $queryS);
$recResult = mysqli_fetch_array($sqlS);
$existSName = $recResult["Surname"];
$existFName = $recResult["Fiarst Name"];
$existBranch = $recResult["Branch"];

if($existSName=="" and $existFName=="" and $existBranch=="")
{
  $sname=mysqli_escape_String($conn,$sname);
  $fname=mysqli_escape_String($conn,$fname);
  $addr=mysqli_escape_String($conn,$addr);
  /*
  if(stripos($cat, "Inve") !== FALSE)
  {
    $cat ="Investigation";
  } else if(stripos($cat, "Pro") !== FALSE) {
    $cat ="Procedure";
  } else if(stripos($cat, "Dru") !== FALSE) {
    $cat ="Drugs";
  } else if(stripos($cat, "Ser") !== FALSE OR stripos($cat, "Srv") !== FALSE) {
    $cat ="Services";
  }
  */
$insertTable=  mysqli_query($conn, "INSERT INTO `membership` (`Surname`, `First Name`, `Membership Number`, `Membership Type`, `Position`,`Branch`, `email`, `Contact Number`, `Mobile Number`, `Home Address`, `Age`, `Gender`, `Marital Status`, `Occupation`, `City`, `State`, `Date of Birth`, `Date Registered`, `Application Date`, `No of Shares`, `Shares Value`, `Identification Type`, `Identification Number`, `Sponsor`, `Next of Kin`, `NKin Contact`, `Relationship`,`Company`)
                                                      VALUES ('".$sname."','".$fname."','".$mcode."','".$type."','".$pos."','".$branch."','".$imail."','".$phone."','".$phone."','".$addr."','".$age."','".$gender."','".$mstatus."','".$occup."','".$city."','".$state."','".$dob."','".$regdate."','".$appdate."','".$shares."','".$sharesv."','".$idtype."','".$idcard."','".$sponsor."','".$nkin."','".$nkincontact."','".$nkinrel."','".$_SESSION[company]."') 
                            ");
}

}

}
echo $tval="<font style='color:green; font-size:14px'><b><i class='fa fa-thumbs-up'></i> Successfully Imported Members List</b></font><br><br>";
}

echo '<div style="height:40px;font-size:14px" class="btn"><i class="fa fa-arrow-left"></i> <a href="members.php"><font color="#000000">Click Here Return to Members List</font></a></div>';
?>
</div>

<?php
require_once 'footer.php';
?>
</div>
</div>
