<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 3) & ($_SESSION['access_lvl'] != 4))
{
 if ($_SESSION['access_lvl'] != 7){
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don’t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn’t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
}
}

 $id = $_POST["id"];
 $code = $_POST["code"];
 $category = $_POST["category"];
 $restdate = $_POST["restdate"];
 $stockname = $_POST["stockname"];
 $units = $_POST["units"];
 $qntyadded = $_POST["qntyadded"];
 $balance = $_POST["balance"];
 $receivedby = $_POST["receivedby"];
 $suppliedby = $_POST["suppliedby"];
 $location = $_POST["location"];
 $weight = $_POST["weight"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update Only':
      if (Trim($code) != "")
      {
        $query_update = "UPDATE restock SET `Stock Code` = '$code',`Category`='$category',`Stock Name`='$stockname',
          `Stock Date`='$restdate',`Supplier`='$suppliedby',`Location`='$location'
          ,`Unit Cost`='$unitcost',`Received By`='$receivedby',`Qnty Added`='$qntyadded' WHERE `ID` = '$id'";

        $result_update = mysql_query($query_update);

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn);
            $rows = mysql_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Re-Stock Record','Modified Re-Stock Record for Stock: " . $code . ", " . $stockname . "')";

            $result_update_Log = mysql_query($query_update_Log);
            ###### 

        $tval="Your record has been updated.";
        header("location:restock.php?code=$code&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Stock Code before updating.";
        header("location:restockupdate.php?id=$id&code=$code&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Save Only':
      if (Trim($code) != "")
      { 
        $query_insert = "Insert into restock (`Stock Code`,`Category`,`Stock Name`, `Stock Date`,`Supplier`,`Location`
          ,`Unit Cost`,`Received By`,`Qnty Added`) 
               VALUES ('$code','$category','$stockname','$restdate','$suppliedby','$location'
          ,'$unitcost','$receivedby','$qntyadded')";

        $result_insert = mysql_query($query_insert);

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn);
            $rows = mysql_fetch_array($result);

            $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Re-Stock Record','Added Re-Stock Record for Stock: " . $code . ", " . $stockname . "')";

            $result_insert_Log = mysql_query($query_insert_Log);
            ###### 

        $tval="Your record has been saved.";
        header("location:restock.php?code=$code&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Stock Code before saving.";
        header("location:restockupdate.php?id=$id&code=$code&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Save and Reconcile':
      if (Trim($code) != "")
      { 
        $query_update = "UPDATE `stock` SET `Units in Stock` = (`Units in Stock` + " . $qntyadded . ") WHERE `Stock Code`='$code'";
#        $query_update = "UPDATE `stock` SET `lastrestock`=" . $id . ",`Units in Stock` = (`Units in Stock` + " . $qntyadded . ") WHERE `Stock Code`='$code' and `lastrestock` <> " . $id;
        $result_update = mysql_query($query_update);

        $query_insert = "Insert into restock (`Stock Code`,`Category`,`Stock Name`, `Stock Date`,`Supplier`,`Location`
          ,`Unit Cost`,`Received By`,`Qnty Added`) 
               VALUES ('$code','$category','$stockname','$restdate','$suppliedby','$location'
          ,'$unitcost','$receivedby','$qntyadded')";

        $result_insert = mysql_query($query_insert);

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn);
            $rows = mysql_fetch_array($result);

            $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Re-Stock Record','Added Re-Stock Record for Stock: " . $code . ", " . $stockname . "')";

            $result_insert_Log = mysql_query($query_insert_Log);
            ###### 

        $tval="Your record has been saved.";
        header("location:restock.php?code=$code&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Stock Code before saving.";
        header("location:restockupdate.php?id=$id&code=$code&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM restock WHERE `ID` = '$id';";

       $result_delete = mysql_query($query_delete);          

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn);
            $rows = mysql_fetch_array($result);

            $query_delete_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Re-Stock Record','Deleted Re-Stock Record for Stock: " . $code . ", " . $stockname . "')";

            $result_delete_Log = mysql_query($query_delete_Log);
            ###### 

        $tval="Your record has been deleted.";
        header("location:restock.php?code=$code&tval=$tval&redirect=$redirect");
      }
      break;     
     case 'Update and Reconcile':
      if (Trim($code) != "")
      {
        $query_update = "UPDATE `stock` SET `Units in Stock` = (`Units in Stock` + " . $qntyadded . ") WHERE `Stock Code`='$code'";

        $result_update = mysql_query($query_update);

        $query_update2 = "UPDATE restock SET `Stock Code` = '$code',`Category`='$category',`Stock Name`='$stockname',
          `Stock Date`='$restdate',`Supplier`='$suppliedby',`Location`='$location'
          ,`Unit Cost`='$unitcost',`Received By`='$receivedby',`Qnty Added`='$qntyadded' WHERE `ID` = '$id'";

        $result_update2 = mysql_query($query_update2);

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn);
            $rows = mysql_fetch_array($result);

            $query_update_Log = "Insert into `Monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Re-Stock Record','Modified Re-Stock Record for Stock: " . $code . ", " . $stockname . "')";

            $result_update_Log = mysql_query($query_update_Log);
            ###### 

        $tval="Your record has been updated.";
        header("location:restock.php?code=$code&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Stock Code before updating.";
        header("location:restockupdate.php?id=$id&code=$code&tval=$tval&redirect=$redirect");
      }
      break;
   }
 }
?>