<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
 if ($_SESSION['access_lvl'] != 1){
   if ($_SESSION['access_lvl'] != 2){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don’t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn’t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
}
}
}

 $ID = $_POST["ID"];
 $category = $_POST["category"];
 $date = $_POST["date"];
 $ctitle = $_POST["ctitle"];
 $cname = $_POST["cname"];
 $amount = $_POST["amount"];
 $amountpaid = $_POST["amountpaid"];
 $contact = $_POST["contact"];
 $status = $_POST["status"];
 $bank= $_POST["bank"];
 $account  = $_POST["account"];
 $paid= $_POST["paid"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($ID) != "" && Trim($date) != "")
      {
        $query_update = "UPDATE `contract` SET `Contract Category` = '$category',`Contract Date`='$date', `Contract Title`='$ctitle',`Contractor`='$cname',`Paid`='$paid',
                        `Account`='$account',`Bank`='$bank',`Amount`='$amount',`Amount Paid`='$amountpaid',`Contract Status`='$status',`Contact`='$contact' WHERE `ID` = '$ID'";
        $result_update = mysql_query($query_update);

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn);
            $rows = mysql_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Contracts','Modified Contracts record for : " . $cname . ", Title: " . $ctitle . "')";
            $result_update_Log = mysql_query($query_update_Log);
            ###### 

        $tval="Your record has been updated.";
        header("location:contract.php?ID=$ID&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter the Contract Date before updating.";
        header("location:contractor.php?ID=$ID&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Save':
      if (Trim($date) != "")
      { 
        $query_insert = "Insert into `contract` (`Contract Category`,`Contract Date`, `Contract Title`,`Contractor`,`Amount`,`Amount Paid`,`Contract Status`,`Contact``Account`,`Bank`,`Paid`) 
               VALUES ('$category','$date','$ctitle','$cname','$amount','$amountpaid','$status','$contact','$account','$bank','$paid')";
        $result_insert = mysql_query($query_insert);

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn);
            $rows = mysql_fetch_array($result);

            $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Contracts','Added Contracts record for : " . $cname . ", Title: " . $ctitle . "')";
            $result_insert_Log = mysql_query($query_insert_Log);
            ###### 

        $tval="Your record has been saved.";
        header("location:contract.php?ID=$ID&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter the Contract Date before saving.";
        header("location:contractor.php?ID=$ID&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM `contract` WHERE `ID` = '$ID'";
       $result_delete = mysql_query($query_delete);          

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn);
            $rows = mysql_fetch_array($result);

            $query_delete_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`,`company`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Contracts','Deleted Contracts record for : " . $cname . ", Title: " . $ctitle . "')";
            $result_delete_Log = mysql_query($query_delete_Log);
            ###### 

        $tval="Your record has been deleted.";
        header("location:contract.php?ID=$ID&tval=$tval&redirect=$redirect");
      }
      break;     
   }
 }
?>