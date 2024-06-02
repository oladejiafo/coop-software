<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['user_id']) & ($_SESSION['access_lvl'] != 5) & ($_SESSION['access_lvl'] != 4) & ($_SESSION['access_lvl'] != 6) & ($_SESSION['access_lvl'] != 7) & ($_SESSION['access_lvl'] != 1) & ($_SESSION['access_lvl'] != 3))
{
 if ($_SESSION['access_lvl'] != 2){
  $redirect = $_SERVER['PHP_SELF'];
  header("Refresh: 0; URL=index.php?redirect=$redirect");
}
}


 $id = $_POST["id"];
 $acctno = $_POST["acctno"];

 $type = $_POST["type"];
 $sponsor = $_POST["sponsor"];
 $regdate = $_POST["regdate"];
 $idtype = $_POST["idtype"];
 $idnumber = $_POST["idnumber"];
 $idexpire = $_POST["idexpire"];

 $position = $_POST["position"];
 $status = $_POST["status"];
 $admfee = $_POST["admfee"];
 $branch = $_POST["branch"];
 $sms = $_POST["sms"];
 $emailalert = $_POST["emailalert"];
 $exitdate = $_POST["exitdate"];
 $exitreason = $_POST["exitreason"];

 $fname = $_POST["fname"];
 $sname = $_POST["sname"];
 $mstatus = $_POST["mstatus"];
 $gender = $_POST["gender"];

 $dob = $_POST["dob"];
 $age = $_POST["age"];

 $email = $_POST["email"];
 $occupation = $_POST["occupation"];
 $employer = $_POST["employer"];
 $bvn = $_POST["bvn"];
 $officeaddress = $_POST["officeaddress"];
 $contactno = $_POST["contactno"];
 $mobileno = $_POST["mobileno"];
 $homeaddress = $_POST["homeaddress"];
 $city = $_POST["city"];
 $state = $_POST["state"];
 $obank = $_POST["obank"];
 $obankno = $_POST["obankno"];
 $obankname = $_POST["obankname"];
 $nkin = $_POST["nkin"];
 $nkcontact = $_POST["nkcontact"];
 $relationship = $_POST["relationship"];
 $nkphone = $_POST["nkphone"];

/*
 $rdate = $_POST['date'];
 list($day, $month, $year) = explode('-', $rdate);
 $date = $year . '-' . $month . '-' . $day;

 $due=date('Y-m-d', strtotime('+' . $loanduration . ' month',strtotime($date)));
*/
list($cp, $fld) = explode(' ', $_SESSION['company']);
$cpfolder=$cp . $fld;

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($acctno) != "" and Trim($sname) != "")
      {
        $query_update = "UPDATE `membership` SET `Membership Number` = '$acctno',`Date Registered`='$regdate',`First Name`='$fname',`Surname`='$sname',`Membership Type`='$type', `Age`='$age',`Branch`='$branch'
          ,`Marital Status`='$mstatus',`Gender`='$gender',`Contact Number`='$contactno',`Home Address`='$homeaddress',`Next of Kin`='$nkin',`NKin Contact`='$nkcontact',`NK Phone`='$nkphone'
          ,`email alert`='$emailalert',`SMS`='$sms',`Position`='$position',`Occupation`='$occupation',`City`='$city',`Office Address`='$officeaddress',`Relationship`='$relationship',`Identification Type`='$idtype'
          ,`Identification Number`='$idnumber',`email`='$email',`State`='$state',`Sponsor`='$sponsor',`Employer`='$employer',`Status`='$status',`Mobile Number`='$mobileno',`Admission Fee`='$admfee'
          ,`Bank Account Name`='$obankname',`ID Expiration`='$idexpire',`Bank Name`='$obank',`Bank Account Number`='$obankno'
          ,`Date of Birth`='$dob',`BVN`='$bvn',`Termination Date`='$exitdate',`Termination Reason`='$exitreason' WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = '$id'";

        $result_update = mysqli_query($conn,$query_update); 

        $tval="Your record has been updated.";
        header("location:members.php?acctno=$acctno&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Basic details before updating.";
        header("location:memeber.php?acctno=$acctno&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Save':
      if (Trim($acctno) != "" and Trim($sname) != "")
      { 
        $query_insert = "Insert into `membership` (`Membership Number`,`Date Registered`,`First Name`,`Surname`,`Membership Type`, `Age`,`Marital Status`,`Gender`,`Contact Number`,`Home Address`,`Next of Kin`,`NKin Contact`,`NK Phone`
          ,`email alert`,`SMS`,`Position`,`Occupation`,`City`,`Office Address`,`Relationship`,`Identification Type`,`Identification Number`, `email`,`State`,`Sponsor`,`Employer`,`Status`,`Mobile Number`,`Admission Fee`
          ,`Bank Account Name`,`ID Expiration`,`Bank Name`,`Bank Account Number`,`Date of Birth`,`BVN`,`Termination Date`,`Termination Reason`,`Branch`, `Company`) 
               VALUES ('$acctno','$regdate','$fname','$sname','$type', '$age','$mstatus','$gender','$contactno','$homeaddress','$nkin','$nkcontact','$nkphone'
          ,'$emailalert','$sms','$position','$occupation','$city','$officeaddress','$relationship','$idtype','$idnumber','$email','$state','$sponsor','$employer','$status','$mobileno','$admfee'
          ,'$obankname','$idexpire','$obank','$obankno','$dob','$bvn','$exitdate','$exitreason','$branch', '" .$_SESSION['company']. "')";
        $result_insert = mysqli_query($conn,$query_insert);

#######
$qry_sig="Select `ID` from `membership` WHERE `Company` ='" .$_SESSION['company']. "' AND `Membership Number`='$acctno'";
$result_sig = mysqli_query($conn,$qry_sig);
$row_sig=mysqli_fetch_array($result_sig);
$cid=$row_sig['ID'];


#######
if (!empty($_FILES['image_filename']['name']))
{
 if (file_exists("images/pics/" .$cpfolder. "/" . $cid . ".jpg")==1)
 {
   $ImageNam = "images/pics/" .$cpfolder. "/" . $cid . ".jpg";
   $newfilenam = "images/pics/" .$cpfolder. "/" . date("Y-m-d") . "_" . $cid . ".jpg";
   rename($ImageNam, $newfilenam);
 }
   //make variables available
   $image_userid = $cid;
   $image_tempname = $_FILES['image_filename']['name'];
   $today = date("Y-m-d");

   //upload image and check for image type

   $ImageDir ="images/pics/" .$cpfolder. "/";
   $ImageName = $ImageDir . $image_tempname;
   if (move_uploaded_file($_FILES['image_filename']['tmp_name'],$ImageName)) 
   {
    //get info about the image being uploaded
    list($width, $height, $type, $attr) = getimagesize($ImageName);
 
    $ext = ".jpg";

    $newfilename = $ImageDir . $cid . $ext;
    rename($ImageName, $newfilename);
   }
}
###### 

#######
if (!empty($_FILES['sign_filename']['name']))
{
 if (file_exists("images/sign/" .$cpfolder. "/" . $cid . ".jpg")==1)
 {
   $signNam = "images/sign/" .$cpfolder. "/" . $cid . ".jpg";
   $newsignnam = "images/sign/" .$cpfolder. "/" . date("Y-m-d") . "_" . $cid . ".jpg";
   rename($signNam, $newsignnam);
 }
   //make variables available
   $sign_userid = $cid;
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

    $newsignname = $signDir . $cid . $ext;
    rename($signName, $newsignname);
   }
}
###### 

#######
if (!empty($_FILES['scan_filename']['name']))
{
 if (file_exists("images/scan/" .$cpfolder. "/id_" . $cid . ".jpg")==1)
 {
   $scanNam = "images/scan/" .$cpfolder. "/id_" . $cid . ".jpg";
   $newscannam = "images/scan/" .$cpfolder. "/id_" . date("Y-m-d") . "_" . $cid . ".jpg";
   rename($scanNam, $newscannam);
 }
   //make variables available
   $scan_userid = $cid;
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

    $newscanname = $scanDir . $cid . $ext;
    rename($scanName, $newscanname);
   }
}
###### 
###### 

        $tval="Your record has been Saved.";
        header("location:members.php?acctno=$acctno&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Basic details before saving.";
        header("location:member.php?tval=$tval&redirect=$redirect");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `memebership` WHERE `Company` ='" .$_SESSION['company']. "' AND `ID` = '$id'";
       $result_delete = mysqli_query($conn,$query_delete);          

        $tval="Your record has been deleted.";
        header("location:members.php?tval=$tval&redirect=$redirect");
      }
      break;   
   }
 }
?>