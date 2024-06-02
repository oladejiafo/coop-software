<?php
require_once 'conn.php';
$SNO = $_REQUEST["SNO"];

if($SNO != "")
{
 #$SNO=$_REQUEST['SNO'];

   //make variables available
   $image_userid = $SNO;
   $image_tempname = $_FILES['image_filename']['name'];
   $today = date("Y-m-d");

   //upload image and check for image type

   $ImageDir ="images/pics/";
   $ImageName = $ImageDir . $image_tempname;
   if (move_uploaded_file($_FILES['image_filename']['tmp_name'],$ImageName)) 
   {
    //get info about the image being uploaded
    list($width, $height, $type, $attr) = getimagesize($ImageName);
    switch ($type) 
    {
      case 1:
        $ext = ".gif";
        break;
      case 2:
        $ext = ".jpg";
        break;
      case 3:
        $ext = ".png";
        break;
      default:
      $tval= "Sorry, but the file you uploaded was not a GIF, JPG, or " .
        "PNG file.<br> Please hit your browser's 'back' button and try again.";      
    }

    $sql = "Select `Staff Number` From staff where `Staff Number`='$SNO'";
    $results = mysql_query($sql);
    $row = mysql_fetch_array($results);

    $newfilename = $ImageDir . $row['Staff Number']. $ext;
    rename($ImageName, $newfilename);

  $tval="Picture uploaded";
  header("location:staff.php?SNO=$SNO&tval=$tval&redirect=$redirect");
}}
?>
