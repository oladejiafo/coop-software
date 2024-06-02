<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['usaid']) & ($_SESSION['ac_lvl'] != 2) & ($_SESSION['ac_lvl'] != 3))
{
 if ($_SESSION['ac_lvl'] != 5){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 1; URL=index.php?redirect=$redirect");
die();
}
}

 $id = $_POST["id"];
 $stype=$_POST["stype"];
 $city = $_POST["city"];
 $country = $_POST["country"];
 $address = $_POST["address"];
 $phone = $_POST["phone"];
 $email = $_POST["email"];
 $website = $_POST["website"];

 $schname=$_SESSION['company'];
 list($cp, $fld) = explode(' ', $schname);
 $cpfolder=$cp . $fld;

###########################################################################################

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Save Profile':
      if (Trim($email) != "" && Trim($stype) != "")
      {
        $query_update = "UPDATE `company info` SET `Type`='$stype', `City`='$city',`Country`='$country',
          `Address`='$address', `Phone`='$phone', `Email`='$email', `Website`='$website' WHERE `ID` = '$id' and `Company Name`='" . $_SESSION['company'] ."'";
        $result_update = mysqli_query($conn, $query_update);

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`,`Company`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['email']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','School Profile','Modified Profile for: " . $schoolname . "', '" . $_SESSION['company'] . "')";
            $result_update_Log = mysqli_query($conn, $query_update_Log);
            ###### 

        $tval="Profile has been updated. PLEASE LOGIN";
        header("location:index.php?tval=$tval&id=$id&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Basic Information before you update.";
        header("location:myprofile.php?id=$id&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Save Pix':
{
if (!empty($_FILES['image_filename']['name']))
{
 if (file_exists("images/pics/" . $cpfolder . "/logo.jpg")==1)
 {
   $ImageNam = "images/pics/" . $cpfolder . "/logo.jpg";
   $newfilenam = "images/pics/" . $cpfolder . "/" . date("Y-m-d") . "_logo.jpg";
   rename($ImageNam, $newfilenam);
 }
   //make variables available
   $image_userid = "logo";
   $image_tempname = $_FILES['image_filename']['name'];
   $today = date("Y-m-d");

   //upload image and check for image type

   $ImageDir ="images/pics/" . $cpfolder . "/";
   $ImageName = $ImageDir . $image_tempname;
   if (move_uploaded_file($_FILES['image_filename']['tmp_name'],$ImageName)) 
   {
    //get info about the image being uploaded
    list($width, $height, $type, $attr) = getimagesize($ImageName);
 
    $ext = ".jpg";

    $newfilename = $ImageDir . "logo" . $ext;
    rename($ImageName, $newfilename);
   }
}

if (!empty($_FILES['profile_filename']['name']))
{
 if (file_exists("images/pics/" . $cpfolder . "/profile.jpg")==1)
 {
   $profileNam = "images/pics/" . $cpfolder . "/profile.jpg";
   $newfileprofile = "images/pics/" . $cpfolder . "/" . date("Y-m-d") . "_profile.jpg";
   rename($profileNam, $newfileprofile);
 }
   //make variables available
   $profile_userid = "logo";
   $profile_tempname = $_FILES['profile_filename']['name'];
   $today = date("Y-m-d");

   //upload image and check for image type

   $profileDir ="images/pics/" . $cpfolder . "/";
   $profileName = $profileDir . $profile_tempname;
   if (move_uploaded_file($_FILES['profile_filename']['tmp_name'],$profileName)) 
   {
    //get info about the image being uploaded
    list($width, $height, $type, $attr) = getimagesize($profileName);
 
    $ext = ".jpg";

    $newfileprofile = $profileDir . "profile" . $ext;
    rename($profileName, $newfileprofile);
   }
}
###### 

        header("location:myprofile.php?id=$id&redirect=$redirect");
}
      break;

     case 'Remove Pix':
      {
        $profilepix = "images/pics/" . $cpfolder . "/profile.jpg";
        unlink($profilepix);
        header("location:myprofile.php?id=$id&redirect=$redirect");
      }
      break;     
   }
 }
?>