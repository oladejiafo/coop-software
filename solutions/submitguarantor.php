<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5) & ($_SESSION['access_lvl'] != 3) & ($_SESSION['access_lvl'] != 6))
{
  $redirect = $_SERVER['PHP_SELF'];
  header("Refresh: 0; URL=index.php?redirect=$redirect");
}

 $lid = $_POST["lid"];
 $id = $_POST["id"];
 $guarantor = $_POST["guarantor"];
 $acctno = $_POST["acctno"];
 $contact = $_POST["contact"];
 $occupation = $_POST["occupation"];
 $baddress = $_POST["baddress"];
 $idtype = $_POST["idtype"];
 $idnumber = $_POST["idnumber"];
 $idexpire = $_POST["idexpire"];

 list($cp, $fld) = explode(' ', $_SESSION['company']);
 $cpfolder=$cp . $fld;
 
        $ridexp = $_POST['idexpire'];
        list($dayxp, $monthxp, $yearxp) = explode('-', $ridexp);
        $idexpire = $yearxp . '-' . $monthxp . '-' . $dayxp;

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($lid) != "" and Trim($guarantor) != "")
      {
        $query_update = "UPDATE `loan guarantor` SET `Guarantor`='$guarantor',`Loan_ID` = '$lid',`Contact` = '$contact',`Occupation` = '$occupation',`Business Address` = '$baddress',`Identification Type` = '$idtype',`Identification Number` = '$idnumber',`ID Expiration` = '$idexpire' WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$id'";
        $result_update = mysqli_query($conn,$query_update);

#######
if (!empty($_FILES['sign_filename']['name'])){
if (file_exists("images/sign/" .$cpfolder. "/gr_" . $id . ".jpg")==1)
{
   $signNam = "images/sign/" .$cpfolder. "/gr_" . $id . ".jpg";
   $newsignnam = "images/sign/" .$cpfolder. "/gr_" . date("Y-m-d") . "_" . $id . ".jpg";
   rename($signNam, $newsignnam);
}
   //make variables available
   $sign_userid = $id;
   $sign_tempname = $_FILES['sign_filename']['name'];
   $today = date("Y-m-d");

   //upload image and check for image type

   $signDir ="images/sign/" .$cpfolder. "/";
   $signName = $signDir . $sign_tempname;
   if (move_uploaded_file($_FILES['sign_filename']['tmp_name'],$signName)) 
   {
    //get info about the image being uploaded
    list($width, $height, $type, $attr) = getimagesize($signName);
 
    $ext = ".jpg";

    $newsignname = $signDir . "gr_" . $id . $ext;
    rename($signName, $newsignname);

}}

if (!empty($_FILES['scan_filename']['name'])){
if (file_exists("images/scan/grid_" . $id . ".jpg")==1)
{
   $scanNam = "images/scan/grid_" . $id . ".jpg";
   $newscannam = "images/scan/grid_" . date("Y-m-d") . "_" . $id . ".jpg";
   rename($scanNam, $newscannam);
}
   //make variables available
   $scan_userid = $id;
   $scan_tempname = $_FILES['scan_filename']['name'];
   $today = date("Y-m-d");

   //upload image and check for image type

   $scanDir ="images/scan/";
   $scanName = $scanDir . $scan_tempname;
   if (move_uploaded_file($_FILES['scan_filename']['tmp_name'],$scanName)) 
   {
    //get info about the image being uploaded
    list($width, $height, $type, $attr) = getimagesize($scanName);
 
    $ext = ".jpg";

    $newscanname = $scanDir . "grid_" . $id . $ext;
    rename($scanName, $newscanname);

}}
###### 

        $tval="Your record has been updated.";
        header("location:loans.php?acctno=$acctno&edit=0&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Basic details before updating.";
        header("location:loans.php?acctno=$acctno&edit=3&trans=1&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Save':
      if (Trim($lid) != "" and Trim($guarantor) != "")
      { 
        $query_insert = "Insert into `loan guarantor` (`Guarantor`,`Loan_ID`,`Contact`,`Occupation`,`Business Address`,`Identification Type`,`Identification Number`,`ID Expiration`,`Company`) 
                                               VALUES ('$guarantor','$lid','$contact','$occupation','$baddress','$idtype','$idnumber','$idexpire','" .$_SESSION['company']. "')";
        $result_insert = mysqli_query($conn,$query_insert);

$sqlx = "SELECT `ID` FROM `loan guarantor` WHERE `Company` ='" .$_SESSION['company']. "' AND  `Loan_ID`='$lid' order by ID desc";
$resultx = mysqli_query($conn,$sqlx);
$rowx = mysqli_fetch_array($resultx);
$idZ=$rowx['ID'];
#######
if (!empty($_FILES['sign_filename']['name'])){
if (file_exists("images/sign/" .$cpfolder. "/gr_" . $idZ . ".jpg")==1)
{
   $signNam = "images/sign/" .$cpfolder. "/gr_" . $idZ . ".jpg";
   $newsignnam = "images/sign/" .$cpfolder. "/gr_" . date("Y-m-d") . "_" . $idZ . ".jpg";
   rename($signNam, $newsignnam);
}
   //make variables available
   $sign_userid = $idZ;
   $sign_tempname = $_FILES['sign_filename']['name'];
   $today = date("Y-m-d");

   //upload image and check for image type

   $signDir ="images/sign/" .$cpfolder. "/";
   $signName = $signDir . $sign_tempname;
   if (move_uploaded_file($_FILES['sign_filename']['tmp_name'],$signName)) 
   {
    //get info about the image being uploaded
    list($width, $height, $type, $attr) = getimagesize($signName);
 
    $ext = ".jpg";

    $newsignname = $signDir . "gr_" . $idZ . $ext;
    rename($signName, $newsignname);

}}

if (!empty($_FILES['scan_filename']['name'])){
if (file_exists("images/scan/grid_" . $idZ . ".jpg")==1)
{
   $scanNam = "images/scan/grid_" . $idZ . ".jpg";
   $newscannam = "images/scan/grid_" . date("Y-m-d") . "_" . $idZ . ".jpg";
   rename($scanNam, $newscannam);
}
   //make variables available
   $scan_userid = $id;
   $scan_tempname = $_FILES['scan_filename']['name'];
   $today = date("Y-m-d");

   //upload image and check for image type

   $scanDir ="images/scan/";
   $scanName = $scanDir . $scan_tempname;
   if (move_uploaded_file($_FILES['scan_filename']['tmp_name'],$scanName)) 
   {
    //get info about the image being uploaded
    list($width, $height, $type, $attr) = getimagesize($scanName);
 
    $ext = ".jpg";

    $newscanname = $scanDir . "grid_" . $idZ . $ext;
    rename($scanName, $newscanname);

}}
###### 

        $tval="Your record has been updated.";
        header("location:loans.php?acctno=$acctno&edit=0&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Basic details before saving.";
        header("location:loans.php?acctno=$acctno&edit=3&trans=1&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `loan guarantor` WHERE `Company` ='" .$_SESSION['company']. "' AND  `ID` = '$id'";
       $result_delete = mysqli_query($conn,$query_delete);          

        $tval="Your record has been deleted.";
        header("location:loans.php?acctno=$acctno&edit=0&tval=$tval&redirect=$redirect");
      }
      break;   
      case 'Close':
         { 
           header("location:loans.php?acctno=$acctno&edit=0&tval=$tval&redirect=$redirect#repay");
         }
         break;   
   }
 }
?>