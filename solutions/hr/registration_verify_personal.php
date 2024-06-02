<?php 
session_start();
//includes database configuration files
include ("includes/dbconfig.inc.php");
include ("includes/myfunctions.inc.php");

if (array_key_exists('save', $_POST)) 
{
	## Form was submitted,the user is registering!
	//add's slahes, strips html tags & removes whte space from user input	
	//converts password to md5		
	$_SESSION['reg_surname'] =	$surname = addslashes(strip_tags(trim($_POST['surname'])));
	$_SESSION['reg_othernames'] = $othernames = addslashes(strip_tags(trim($_POST['othernames'])));
	$_SESSION['reg_dob'] = $dob = addslashes(strip_tags(trim($_POST['dob'])));
	$_SESSION['reg_sex'] = $sex = addslashes(strip_tags(trim($_POST['sex'])));
	$_SESSION['reg_address'] = $address = addslashes(strip_tags(trim($_POST['address'])));
	$_SESSION['reg_nationality'] = $nationality = addslashes(strip_tags(trim($_POST['nationality'])));
	$_SESSION['reg_reg_no'] = $reg_no = addslashes(strip_tags(trim($_POST['reg_no'])));
	$_SESSION['reg_cert_no'] = $cert_no = addslashes(strip_tags(trim($_POST['cert_no'])));
	$_SESSION['reg_place_of_birth'] = $place_of_birth = addslashes(strip_tags(trim($_POST['place_of_birth'])));
	$_SESSION['reg_state_of_origin'] = $state_of_origin = addslashes(strip_tags(trim($_POST['state_of_origin'])));
	$_SESSION['reg_lga'] = $lga = addslashes(strip_tags(trim($_POST['lga'])));
	$_SESSION['reg_marital_status'] = $marital_status = addslashes(strip_tags(trim($_POST['marital_status'])));
	
	$_SESSION['reg_father_name'] = $father_name = addslashes(strip_tags(trim($_POST['father_name'])));
	
	$_SESSION['reg_father_state'] = $father_state = addslashes(strip_tags(trim($_POST['father_state'])));
	$_SESSION['reg_father_lga'] = $father_lga = addslashes(strip_tags(trim($_POST['father_lga'])));
	$_SESSION['reg_mother_name'] = $mother_name = addslashes(strip_tags(trim($_POST['mother_name'])));
	$_SESSION['reg_mother_state'] = $mother_state = addslashes(strip_tags(trim($_POST['mother_state'])));
	$_SESSION['reg_mother_lga'] = $mother_lga = addslashes(strip_tags(trim($_POST['mother_lga'])));
	$_SESSION['reg_spouse_name'] = $spouse_name = addslashes(strip_tags(trim($_POST['spouse_name'])));
	$_SESSION['reg_spouse_state'] = $spouse_state = addslashes(strip_tags(trim($_POST['spouse_state'])));
	$_SESSION['reg_spouse_lga'] = $spouse_lga = addslashes(strip_tags(trim($_POST['spouse_lga'])));
	$_SESSION['reg_ever_convicted'] = $ever_convicted = addslashes(strip_tags(trim($_POST['ever_convicted'])));
	$_SESSION['reg_other_employer'] = $other_employer = addslashes(strip_tags(trim($_POST['other_employer'])));	
	$_SESSION['reg_ever_appointed'] = $ever_appointed = addslashes(strip_tags(trim($_POST['ever_appointed'])));
	$_SESSION['reg_appointed_when_why'] = $appointment_when_why = addslashes(strip_tags(trim($_POST['appointed_when_why'])));


/*---------------------------------------------------------------------- ERROR-CHECKING --------------------------------------------------------------------------*/								
	//checks if name, password and username fields are entered, error otherwise
	if ($surname ==""|| $othernames=="" || $sex == "" || $address=="")
	{$_SESSION['error'] = 'Registration details incomplete.';}
	
	if( $_SESSION['security_code'] == !$_POST['security_code'] && !empty($_SESSION['security_code'] ) ) 
	{
	 $_SESSION['error'] = 'security code entered is invalid.';
	}

	unset($_SESSION['error']);
	//if no error so far, biuld query
	if (!isset($_SESSION['error']))
	{
	
	$application_code = rand(10000000, 10000000000);
	
	$query = "INSERT INTO application_details(surname, other_names, dob, sex, address, nationality, reg_no, cert_no, place_of_birth, state_of_origin, lga, marital_status, father_name, father_state, father_lga, mother_name, mother_state, mother_lga, spouse_name, spouse_state, spouse_lga, ever_convicted, other_employer, ever_appointed, appointed_when_why, application_code) 
	values('".$surname."','" .$other_names."','" .$dob."','" .$sex ."','" .$address."','" .$nationality."','" .$reg_no ."','" .$cert_no ."','" .$place_of_birth ."','" .$state_of_origin ."','" .$lga ."','" .$marital_status ."','" .$father_name ."','" .$father_state ."','" .$father_lga ."','" .$mother_name ."','" .$mother_state ."','" .$mother_lga ."','" .$spouse_name ."','" .$spouse_state ."','" .$spouse_lga ."','" .$ever_convicted ."','" .$other_employer ."','" .$ever_appointed ."','" .$appointed_when_why."','" .$application_code."')";
	
		//if account is created 
		if(mysql_query($query))
		{	
		
		$_SESSION['application_id'] = mysql_insert_id();
		$_SESSION['password'] = $password;
		$_SESSION['fullname'] = $name;	
		$application_code = $application_code .'_'.mysql_insert_id();
		

		
		$query = "UPDATE application_details SET application_code  = '" .$application_code. "' WHERE account_id = '".mysql_insert_id()."'";

		 
		 if (mysql_query($query))
		{
		$_SESSION['application_code'] = $application_code;
		$_SESSION['application_saved'] = true;
		}
		

##Send activation Email
$to      = $_POST['email'];
$subject = "Federal Civil Service Commission Registration";
$message = "Good Day, You have completed application form for Federal Civil Service Employment, Your Application has been recieved as is beign duly processed. We will keep you informed on the progress of your application. ";

$headers = 'From: noreply@fcsc-ng.org' . "\r\n" .
    'Reply-To: noreply@fcsc-ng.org' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
	/* mail($to, $subject, $message, $headers); */
	}
							
						if(isset($_SESSION['application_saved']))
						{
					/*--------------------------------------------------  adding picture start  ----------------------------------------------------*/
	$goodtogo = true;
	$application_code = $_SESSION['application_code'];
	//Check for a blank submission.
	if ($_FILES ['image']['size'] === 0)
	{
	$goodtogo = false;
	//set error 
	$_SESSION['error'] = 'No image has been selected';
	}
	//Check for the file size.
	if ($_FILES ['image']['size'] > 5000000)
	{
	$goodtogo = false;
	//set error
	$_SESSION['error'] = 'Sorry, the file uploaded is larger than 500KB, the maximum size for uploads, it is approx: '.intval($_FILES ['image']['size'] ).' Bytes <br /> Please try again.';
	}
	//Ensure that you have a valid mime type.
	$allowedmimes =array ("image/jpeg", "image/pjpeg", "image/gif", "image/x-png", "image/png");
	//checks if image is of file type allowed
	if (!in_array($_FILES ['image']['type'],$allowedmimes))
	{
	$goodtogo =false;
	$_SESSION['error'] = "Sorry, the file uploaded must be of type; JPEG, PNG or GIF.  Yours is: ".$_FILES ['image']['type'] ." <br /> Please try again.";
	}
	
	if (in_array($_FILES ['image']['type'],$allowedmimes))
	{
			//gets the file extension for the uploaded file
			if($_FILES ['image']['type'] == "image/jpeg" || $_FILES ['image']['type'] == "image/pjpeg")
			{$file_ext = ".jpg";}
			if($_FILES ['image']['type'] == "image/gif")
			{$file_ext = ".gif";}
			if($_FILES ['image']['type'] == "image/png" || $_FILES ['image']['type'] == "image/x-png")
			{$file_ext = ".png";}
	}
	
	
	//If you have a valid submission,move it,then show it, store details in database and move on
	if ($goodtogo)
	{
	//get date
	$date = date(Y);
	//insert image details into the database
	$query = "INSERT INTO application_pics(image_type, user_id, date_added, application_code) 
	values('".$file_ext."','" .$_SESSION['id']."','" .$date."','".$_SESSION['application_code']."')";
	
			//if cert is inserted
			if(mysql_query($query))
			{
			//collect image name from datatbase
			$_SESSION['img_name'] = mysql_insert_id();
			}
			else
			{
			echo 'problem!!';
			$_SESSION['error'] = 'Sorry we are unable to upload your document(s) at this time. Please try again';
			}
	
			if (!move_uploaded_file ($_FILES ['image']['tmp_name'],"application_pics/".$_SESSION['img_name'].$file_ext))
			{
				$goodtogo =false;
				$_SESSION['error'] = "There was an error storing the uploaded file. <br /> Please try again.";
			}
		
	}
		//checks if theres an error and returns to file upload page with errors displayed
		if (isset($_SESSION['error']))
		{
		header('location: personal_information.php');
		}
	
		if ($goodtogo)
		{
	$_SESSION['msg'] = "You have completed the first part of your application. You may continue with the rest of the form below Or Finish filling the form at a later time using your application reference code: <b>". $_SESSION['application_code']."</b>. ";
		header('location: registration_edu.php');
		}						
								
					/*--------------------------------------------------  adding picture end  ----------------------------------------------------*/
	}
		
		else
		{
		$_SESSION['error'] = 'Sorry we are unable to process your registration at this time please try again';
		}
		
	}
	
	if (isset($_SESSION['error']))
	{
	header('location: registration_personal.php');
	}
}

?>