<?php
session_start();
require_once 'conn.php';
 @$code=$_REQUEST['code'];

 list($cp, $fld) = explode(' ', $_SESSION['company']);
 $cpfolder=$cp . $fld;
if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Upload':
      if (Trim($code) != "")
      {
if (!empty($_FILES['iname']['name']))
{
 if (file_exists("images/scan/" .$cpfolder. "/" . $code . ".jpg")==1)
 {
   $signNam = "images/scan/" .$cpfolder. "/" . $code . ".jpg";
   $newsignnam = "images/scan/" .$cpfolder. "/" . date("Y-m-d") . "_" . $code . ".jpg";
   rename($signNam, $newsignnam);
 }  
 //make variables available
 @$image_tempname = $_FILES['iname']['name'];

 //upload image and check for image type
 $ImageDir ="images/scan/" .$cpfolder. "/";
 @$ImageName = $ImageDir . $image_tempname;
 if (move_uploaded_file($_FILES['iname']['tmp_name'],$ImageName)) 
 {
   //get info about the image being uploaded
   list($width, $height, $type, $attr) = getimagesize($ImageName);
   $ext = ".jpg";

   #$conc= $code . ".jpg";
   $newfilename = $ImageDir . $code . $ext;
   rename($ImageName, $newfilename);
 } 
}
        header("location:register.php?acctno=$code&ashp=0&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Not Uploaded.";
        header("location:register.php?acctno=$code&ashp=0&tval=$tval&redirect=$redirect");
      }
      break;

     case 'UploadID':
      if (Trim($code) != "")
      {
#######
if (!empty($_FILES['scan_filename']['name']))
{
 if (file_exists("images/scan/" .$cpfolder. "/id_" . $code . ".jpg")==1)
 {
   $scanNam = "images/scan/" .$cpfolder. "/id_" . $code . ".jpg";
   $newscannam = "images/scan/" .$cpfolder. "/id_" . date("Y-m-d") . "_" . $code . ".jpg";
   rename($scanNam, $newscannam);
 }
   //make variables available
   $scan_userid = $id;
   $scan_tempname = $_FILES['scan_filename']['name'];
   $today = date("Y-m-d");

   //upload image and check for image type

   $scanDir ="images/scan/" .$cpfolder. "/id_";
   $scanName = $scanDir . $scan_tempname;
   if (move_uploaded_file($_FILES['scan_filename']['tmp_name'],$scanName)) 
   {
    //get info about the image being uploaded
    list($width, $height, $type, $attr) = getimagesize($scanName);
 
    $ext = ".jpg";

    $newscanname = $scanDir . $code . $ext;
    rename($scanName, $newscanname);
   }
}
###### 
        header("location:register.php?acctno=$code&ashp=0&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Not Uploaded.";
        header("location:register.php?acctno=$code&ashp=0&tval=$tval&redirect=$redirect");
      }
      break;

     case 'Remove_ID':
      {
        if (file_exists("images/scan/" .$cpfolder. "/id_" . $code . ".jpg")==1)
        {
          unlink("images/scan/" .$cpfolder. "/id_" . $code . ".jpg");
        }
        header("location:register.php?acctno=$code&ashp=0&tval=$tval&redirect=$redirect");
      }
      break;

     case 'Remove_Doc':
      {
        if (file_exists("images/scan/" .$cpfolder. "/" . $code . ".jpg")==1)
        {
          unlink("images/scan/" .$cpfolder. "/" . $code . ".jpg");
        }
        header("location:register.php?acctno=$code&ashp=0&tval=$tval&redirect=$redirect");
      }
      break;
   }
 }

?>

