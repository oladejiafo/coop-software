<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 5))
{
 if ($_SESSION['access_lvl'] != 3){
 $redirect = $_SERVER['PHP_SELF'];
header("Refresh: 5; URL=login.php?redirect=$redirect");
echo "Sorry, but you don’t have permission to view this page! You are being redirected to the login page!<br>";
echo "(If your browser doesn’t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
}
}

 $serviceno = $_POST["serviceno"];
 $fileno=$_POST['fileno'];
 $surname = $_POST["surname"];
 $firstname = $_POST["firstname"];
 $sex = $_POST["sex"];
 $dob = $_POST["dob"];
 $initialrank = $_POST["initialrank"];
 $presentrank = $_POST["presentrank"];
 $level = $_POST["level"];
 $qualification = $_POST["qualification"];
 $firstappt = $_POST["firstappt"];
 $dept = $_POST["dept"];
 $cmbstatus=$_POST["cmbstatus"];
 $profession=$_POST["profession"];
 $pensionamount=$_POST["pensionamount"];
 $arrears=$_POST["arrears"];
 $deduction=$_POST["deduction"];
 $pensionmanagers=$_POST["pensionmamagers"];
 $office=$_POST["office"];

 $othername = $_POST["othername"];
 $presentappt = $_POST["presentappt"];
 $employtype = $_POST["employtype"];
 $bank = $_POST["bank"];
 $presentlocation = $_POST["presentlocation"];
 $previouslocation = $_POST["previouslocation"];
 $acctno = $_POST["acctno"];
 $branch=$_POST["branch"]; 

 $nationality = $_POST["nationality"];
 $state = $_POST["state"];
 $lga = $_POST["lga"];
 $birthplace = $_POST["birthplace"];
 $maritalstatus = $_POST["maritalstatus"];
 $phone = $_POST["phone"];
 $homeaddress = $_POST["homeaddress"];
 $contactaddress = $_POST["contactaddress"];
 $height = $_POST["height"];
 $weight = $_POST["weight"];
 $genotype = $_POST["genotype"];
 $bloodgroup = $_POST["bloodgroup"];
 $deformity = $_POST["deformity"];
 $ingovtqrt = $_POST["ingovtqrt"];

 $NKName = $_POST["NKName"];
 $NKPhone = $_POST["NKPhone"];
 $NKAddress = $_POST["NKAddress"];
 $NKRelate = $_POST["NKRelate"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($serviceno) != "")
      {
        $query_update = "UPDATE Pension SET `Staff Number` = '$serviceno',`File Number` = '$fileno',Surname='$surname', Firstname='$firstname',Sex='$sex',
          `Qualification`='$qualification',`Profession`='$profession',`Pension Amount`='$pensionamount',`Arrears`='$arrears',`Deduction`='$deduction',
          `Pension Managers`='$pensionmanagers',`Office`='$office',
          DoB='$dob',`Position`='$initialrank', `Present Rank`='$presentrank',Level='$level', Othername='$othername', 
         `Employment Status`='$cmbstatus', `First Appt`='$firstappt', Dept='$dept', `Present Appt`='$presentappt', `Employment Type`='$employtype', `Bank`='$bank', 
         `Present Location`='$presentlocation', `Prev Location`='$previouslocation', `Acct No`='$acctno', Nationality='$nationality', 
         `State`='$state', `LGA`='$lga', `Birth Place`='$birthplace', `Marital Status`='$maritalstatus', `Phone`='$phone', `Home Address`='$homeaddress', 
         `Contact Address`='$contactaddress', `Height`='$height', `Weight`='$weight', `Genotype`='$genotype', `Blood Group`='$bloodgroup', 
         `Deformity`='$deformity', `In Govt Qtrs`='$ingovtqrt' WHERE `Staff Number` = '$serviceno';";

        $query_update2 = "UPDATE `Next_Kin` SET `Staff Number` = '$serviceno',Name='$NKName', Phone='$NKPhone',Address='$NKAddress',
         Relationship='$NKRelate' WHERE `Staff Number` = '$serviceno';";

        $result_update = mysql_query($query_update);
        $result_update2 = mysql_query($query_update2);

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn);
            $rows = mysql_fetch_array($result);

            $query_update_Log = "Insert into `Monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Pension Records','Modified Pension record for Staff: " . $serviceno . ", Surname: " . $surname . "')";

            $result_update_Log = mysql_query($query_update_Log);
            ###### 

        $tval="Your record has been updated.";
        header("location:pensions.php?SNO=$serviceno&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Pension Number before updating.";
        header("location:pensionupdate.php?SNO=$serviceno&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Save':
      if (Trim($serviceno) != "")
      { 
        $query_insert = "Insert into Pension (`Staff Number`,`File Number`,Surname, Firstname,Sex,`Qualification`,`Profession`,`Pension Amount`,`Arrears`,`Deduction`,
          `Pension Managers`,`Office`,`DoB`,`Position`, `Present Rank`,Level, Othername, `Employment Status`, `First Appt`, Dept, `Present Appt`, `Employment Type`, `Bank`, 
         `Present Location`, `Prev Location`, `Acct No`, Nationality, `State`, `LGA`, `Birth Place`, `Marital Status`, `Phone`, `Home Address`, 
         `Contact Address`, `Height`, `Weight`, `Genotype`, `Blood Group`, `Deformity`, `In Govt Qtrs`) 
               VALUES ('$serviceno','$fileno','$surname','$firstname','$sex', '$qualification','$profession','$pensionamount','$arrears','$deduction',
          '$pensionmanagers','$office', '$dob','$initialrank','$presentrank','$level', '$othername', '$cmbstatus', '$firstappt', '$dept', '$presentappt','$employtype','$bank', 
         '$presentlocation', '$previouslocation', '$acctno', '$nationality', '$state', '$lga', '$birthplace', '$maritalstatus', '$phone','$homeaddress', 
         '$contactaddress', '$height', '$weight', '$genotype', '$bloodgroup', '$deformity', '$ingovtqrt')
               ";
        $query_insert2 = "Insert into `Next_Kin` (`Staff Number`,Name, Phone,Address,Relationship) 
               VALUES ('$serviceno','$NKName','$NKPhone','$NKAddress','$NKRelate')";

        $result_insert = mysql_query($query_insert);
        $result_insert2 = mysql_query($query_insert2);

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn);
            $rows = mysql_fetch_array($result);

            $query_insert_Log = "Insert into `Monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Pension Records','Added Pension record for Staff: " . $serviceno . ", Surname: " . $surname . "')";

            $result_insert_Log = mysql_query($query_insert_Log);
            ###### 

        $tval="Your record has been saved.";
        header("location:pensions.php?SNO=$serviceno&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Pension Number before saving.";
        header("location:pensionupdate.php?SNO=$serviceno&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM Pension WHERE `Staff Number` = '$serviceno';";

       $query_delete2 = "DELETE FROM `Next_Kin` WHERE `Staff Number` = '$serviceno';";

       $result_delete = mysql_query($query_delete);          

       $result_delete2 = mysql_query($query_delete2);          

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn);
            $rows = mysql_fetch_array($result);

            $query_delete_Log = "Insert into `Monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Pension Records','Deleted Pension record for Staff: " . $serviceno . ", Surname: " . $surname . "')";

            $result_delete_Log = mysql_query($query_delete_Log);
            ###### 

        $tval="Your record has been deleted.";
        header("location:pensions.php?SNO=$serviceno&tval=$tval&redirect=$redirect");
      }
      break;
     
   }
 }
?>