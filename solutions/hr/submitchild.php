<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
 if ($_SESSION['access_lvl'] != 4){
   if ($_SESSION['access_lvl'] != 3){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=../index.php?redirect=$redirect");
}
}
}
 $serviceno = $_POST["serviceno"];
 $child_id = $_POST["child_id"];
 $name = $_POST["name"];
 $sex = $_POST["sex"];
 $dob = $_POST["dob"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($child_id) != "")
      {
        $query_update = "UPDATE children SET Name='$name',Sex='$sex', DoB='$dob' where `Child_ID`='$child_id';";

        $result_update = mysqli_query($conn,$query_update);

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Child Update','Modified Child Record for Staff: " . $serviceno . ", Child Name: " . $name . "')";

            $result_update_Log = mysqli_query($conn,$query_update_Log);
            ###### 

        $tval="Your record has been updated.";
        header("location:stafflist.php?tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Parent Staff Number and Child Name before updating.";
        header("location:childupdate.php?SNO=$serviceno&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Save':
      if (Trim($serviceno) != "")
      { 
        $query_insert = "Insert into children (`Staff Number`,Name, Sex,DoB) 
               VALUES ('$serviceno','$name','$sex','$dob')";

        $result_insert = mysqli_query($conn,$query_insert);

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($result);

            $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Child Update','Added Child Record for Staff: " . $serviceno . ", Child Name: " . $name . "')";

            $result_insert_Log = mysqli_query($conn,$query_insert_Log);
            ###### 

        $tval="Your record has been saved.";
        header("location:stafflist.php?tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Parent Staff Number and Child Name before saving.";
        header("location:childupdate.php?SNO=$serviceno&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM children WHERE `Child_ID` = '$child_id';";

       $result_delete = mysqli_query($conn,$query_delete);  

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($result);

            $query_delete_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Child Update','Deleted Child Record for Staff: " . $serviceno . ", Child Name: " . $name . "')";

            $result_delete_Log = mysqli_query($conn,$query_delete_Log);
            ###### 

        $tval="Your record has been deleted.";
        header("location:stafflist.php?tval=$tval&redirect=$redirect");
      }
      break;     
   }
 }
?>