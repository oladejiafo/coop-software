<?php
session_start();
//check to see if user has logged in with a valid password
if (!isset($_SESSION['USER_ID']) & ($_SESSION['access_lvl'] != 7) & ($_SESSION['access_lvl'] != 6))
{
 if ($_SESSION['access_lvl'] != 5){
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
 $brandname = $_POST["brandname"];
 $stockname = $_POST["stockname"];
 $description = $_POST["description"];
 $manufacturer = $_POST["manufacturer"];
 $supplier = $_POST["supplier"];
 $location = $_POST["location"];
 $unitcost = $_POST["unitcost"];
 $sellingprice = $_POST["sellingprice"];
 $expirydate = $_POST["expirydate"];
 $reorderlevel = $_POST["reorderlevel"];
 $stockunit = $_POST["stockunit"];
 $weight = $_POST["weight"];
 $descr = $_POST["descr"];

 require_once 'conn.php';
 
 if (isset($_POST['submit']))
 {
   switch ($_POST['submit'])
   {
     case 'Update':
      if (Trim($code) != "")
      {
      ########################

$nwords = array(	"Zero", "One", "Two", "Three", "Four", "Five", "Six", "Seven",
	
			"Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen",
		
			"Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen",
		
			"Nineteen", "Twenty", 30 => "Thirty", 40 => "Forty",
	
			50 => "Fifty", 60 => "Sixty", 70 => "Seventy", 80 => "Eighty",
	
			90 => "Ninety" );



function int_to_words($x)

{

	global $nwords;

	if(!is_numeric($x))

	{

		$w = '#';

	}
	else if(fmod($x, 1) != 0)

	{

		$w = '#';

	}
	else
	{

		if($x < 0)
	
		{
		
			$w = 'minus ';

			$x = -$x;

		}
		else
		{
	
			$w = '';

		}

		if($x < 21)

		{
	
			$w .= $nwords[$x];

		}
		else if($x < 100)

		{
	
			$w .= $nwords[10 * floor($x/10)];

			$r = fmod($x, 10);
	
			if($r > 0)
	
			{
	
				$w .= '-'. $nwords[$r];
			}

		}
		else if($x < 1000)

		{
		
			$w .= $nwords[floor($x/100)] .' Hundred';

			$r = fmod($x, 100);

			if($r > 0)

			{

				$w .= ' and '. int_to_words($r);

			}

		}
		else if($x < 1000000)

		{

			$w .= int_to_words(floor($x/1000)) .' Thousand';

			$r = fmod($x, 1000);

			if($r > 0)
		
			{

				$w .= ' ';
				
				if($r < 100)
				
				{
				
					$w .= 'and ';
			
				}

				$w .= int_to_words($r);

			}

		} else {

			$w .= int_to_words(floor($x/1000000)) .' Million';

			$r = fmod($x, 1000000);

			if($r > 0)

			{

				$w .= ' ';
				if($r < 100)

				{

					$word .= 'and ';

				}

				$w .= int_to_words($r);

			}

		}

	}

	return $w;

}


// demonstration


if(isset($_POST['unitcost']))

{

	$descr= int_to_words($_POST['unitcost']) ;

        $descr=$descr . ' Naira Only';
}




      ########################
        $query_update = "UPDATE stock SET `Stock Code` = '$code',`Category`='$category', `Brand Name`='$brandname',`Stock Name`='$stockname',
          `Description`='$description', `Manufacturer`='$manufacturer',`Supplier`='$supplier',`Location`='$location'
          ,`Unit Cost`='$unitcost',`Expiry Date`='$expirydate',`Reorder Level`='$reorderlevel',`Units in Stock`='$stockunit'
          ,`Selling Price`='$sellingprice',`Description`='$descr' WHERE `ID` = '$id'";

        $result_update = mysql_query($query_update);

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn);
            $rows = mysql_fetch_array($result);

            $query_update_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Stock Record','Modified Stock Record for Stock: " . $code . ", " . $stockname . "')";

            $result_update_Log = mysql_query($query_update_Log);
            ###### 

        $tval="Your record has been updated.";
        header("location:stocklist.php?code=$code&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Stock Code before updating.";
        header("location:stock.php?code=$code&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Save':
      if (Trim($code) != "")
      { 
        $query_insert = "Insert into stock (`Stock Code`,`Category`, `Brand Name`,`Stock Name`,`Description`, `Manufacturer`,`Supplier`,`Location`,
                `Unit Cost`,`Expiry Date`,`Reorder Level`,`Units in Stock`,`Selling Price`) 
               VALUES ('$code','$category', '$brandname','$stockname','$description', '$manufacturer','$supplier','$location'
                 , '$unitcost','$expirydate','$reorderlevel','$stockunit','$sellingprice')";

        $result_insert = mysql_query($query_insert);

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn);
            $rows = mysql_fetch_array($result);

            $query_insert_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Stock Record','Added Stock Record for Stock: " . $code . ", " . $stockname . "')";

            $result_insert_Log = mysql_query($query_insert_Log);
            ###### 

        $tval="Your record has been saved.";
        header("location:stocklist.php?code=$code&tval=$tval&redirect=$redirect");
      }
      else
      {
        $tval="Please enter Stock Code before saving.";
        header("location:stock.php?code=$code&tval=$tval&redirect=$redirect");
      }
      break;
     case 'Delete':
      {
       $query_delete = "DELETE FROM stock WHERE `ID` = '$id';";

       $result_delete = mysql_query($query_delete);          

            #######
            $sql = "SELECT * FROM cms_access_levels Where access_lvl='" . $_SESSION['access_lvl'] ."'";
            $result = mysql_query($sql,$conn);
            $rows = mysql_fetch_array($result);

            $query_delete_Log = "Insert into `monitor` (`User Category`, `User Name`,`Date Logged on`, `Time Logged on`,`File Used`,`Details`) 
                  VALUES ('" . $rows['access_name'] . "','" . ucfirst($_SESSION['name']) . "', '" . date('Y/m/d') . "', '" . date('h:i A') . "','Stock Record','Deleted Stock Record for Stock: " . $code . ", " . $stockname . "')";

            $result_delete_Log = mysql_query($query_delete_Log);
            ###### 

        $tval="Your record has been deleted.";
        header("location:stocklist.php?code=$code&tval=$tval&redirect=$redirect");
      }
      break;     
     case 'Issue Book':
      {

        header("location:stock.php?code=$code&tval=$tval&redirect=$redirect");
      }
      break;     
   }
 }
?>