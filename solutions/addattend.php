<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['user_id']) & ($_SESSION['access_lvl'] != 5) & ($_SESSION['access_lvl'] != 4) & ($_SESSION['access_lvl'] != 6) & ($_SESSION['access_lvl'] != 7) & ($_SESSION['access_lvl'] != 1) & ($_SESSION['access_lvl'] != 3))
{
 if ($_SESSION['access_lvl'] != 2)
 {
  $redirect = $_SERVER['PHP_SELF'];
  header("Refresh: 0; URL=index.php?redirect=$redirect");
  
 }
}
 require_once 'header.php';
 require_once 'conn.php';

 @$sno = $_REQUEST["sno"];
 @$att = $_REQUEST["att"];
 @$adt = $_REQUEST["adt"];
 @$class = $_REQUEST["class"];
 @$dt = $_REQUEST["dt"];
 @$note = $_POST["note"];

 @$cmbFilter1 = $_REQUEST["cmbFilter1"];
 @$cmbFilter2 = $_REQUEST["cmbFilter2"];
 @$filter1 = $_REQUEST["filter1"];
 @$filter2 = $_REQUEST["filter2"];


if($att)
{
$queryX="select * from `attendance` WHERE `Company` ='" .$_SESSION['company']. "' AND `Membership No` = '$sno' and `Date`='$dt'";
$resultX=mysqli_query($conn,$queryX);
$tmax  = mysqli_num_rows($resultX);

if($tmax>0)
{
 $tval="Duplicate Record";
// header("location:attendance.php?SNO=$sno&dt=$dt&class=&class&cmbFilter1=$cmbFilter1&filter1=$filter1&cmbFilter2=$cmbFilter2&filter2=$filter2&tval=$tval&redirect=$redirect");
// break;
} else {
   $query_insert = "Insert into `attendance` (`Membership No`,`Type`,`Attendance`,`Date`, `Company`) 
                      VALUES ('$sno','$class', '$att','$dt', '" .$_SESSION['company']. "')";
   $result_insert = mysqli_query($conn,$query_insert);
}
   header("location:attendance.php?SNO=$sno&dt=$dt&class=&class&cmbFilter1=$cmbFilter1&filter1=$filter1&cmbFilter2=$cmbFilter2&filter2=$filter2&tval=$tval&redirect=$redirect");
} 
else if($adt) 
{
   $query_del = "delete from `attendance` WHERE `Company` ='" .$_SESSION['company']. "' AND `Membership No`='$sno' and `Date`='$dt'";
   $result_del = mysqli_query($conn,$query_del);

//   header("location:attendance.php?SNO=$sno&dt=$dt&class=&class&cmbFilter1=$cmbFilter1&filter1=$filter1&cmbFilter2=$cmbFilter2&filter2=$filter2&tval=$tval&redirect=$redirect");
} 
else 
{

 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   { 
     case 'Save Note':
      if (Trim($note) != "")
      { 
        $query_update = "UPDATE `attendance` SET `Note` = '$note' WHERE `Company` ='" .$_SESSION['company']. "' AND `Membership No` = '$sno' and `Date`='$dt'";
        $result_update = mysqli_query($conn,$query_update);
        header("location:attendance.php?SNO=$sno&dt=$dt&class=&class&cmbFilter1=$cmbFilter1&filter1=$filter1&cmbFilter2=$cmbFilter2&filter2=$filter2&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Note before updating.";
        header("location:attendance.php?SNO=$sno&dt=$dt&class=&class&cmbFilter1=$cmbFilter1&filter1=$filter1&cmbFilter2=$cmbFilter2&filter2=$filter2&tval=$tval&redirect=$redirect");
      }
      break;

   }
 }
}

?>