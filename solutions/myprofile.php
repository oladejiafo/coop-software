<?php
session_start();
?>
<?php
  require_once 'header.php';
  require_once 'conn.php';
?>
 <title>Your Profile || Finasol Portal</title>

<form action="uprofile.php" name="regForm" method="post"  enctype="multipart/form-data"> 
<?php
 $idx=$_REQUEST['id'];
if(empty($idx) OR $idx=="")
{
  $idx=1;
}

if(isset($_SESSION['company']))
{
  $queryx="SELECT * FROM `company info` where `Company Name`='" . $_SESSION['company'] . "'" ;
  $geg=33100;
}

   $resultx=mysqli_query($conn, $queryx);
   $rowx = mysqli_fetch_array($resultx);
   $snamex=$rowx['Company Name'];
   list($cp, $fld) = explode(' ', $snamex);
   $cpfolder=$cp . $fld;

   $school=$snamex;
   $loc=$rowx['City'] . " " . $rowx['Country'];

    if (file_exists("images/pics/" . $cpfolder . "/profile.jpg")==1)
    { 
      $ttry= 'images/pics/' . $cpfolder . '/profile.jpg';
    } else if (file_exists("images/pics/" . $cpfolder . "/logo.jpg")==1) { 
      $ttry= 'images/pics/' . $cpfolder . '/logo.jpg';
    } else {
      $ttry= 'images/pics/school.jpg';
    }

?>
<link rel="stylesheet" href="css/style.css">

                <section class="team-intro">
						<div class="container">
                        <h1><?php echo $snamex; ?> Profile</h1>
							<div class="row">
								<div class="col-sm-5">
									<div class="team-thumb">
                                    <form id="mainContact" action="uprofile.php" method="POST">
                                    <?php    
            if (file_exists("images/pics/" . $cpfolder . "/logo.jpg")==1)
            { 
              echo '<input type="submit" value="Remove Logo" name="submit" class="btn btn-primary btn-md text-white" style="height:20; width:110; color:#fff; font-size: 10px"  onclick="return confirm(\'Are you sure you want to remove this logo?\');"><br>';
            } else if (file_exists("images/pics/" . $cpfolder . "/logo.jpg")==1) { 
              //echo '<font style="color:red">It would be nice if you upload your company profile picture here instead</font>';
            } else {
              echo '<font style="color:red">It would be nice if you upload your company profile picture here instead</font>';
            }
            ?>
              <p><img src="<?php echo $ttry; ?>" alt="MQS" width="400px" heigth="150px" class="img-fluid mb-4"></p>
             <?php
                         if (file_exists("images/pics/" . $cpfolder . "/logo.jpg") !=1)
                         { 
                            // echo '<div><font style="color:#990000; font-size:13px"><b>Upload Profile Picture <input name="profile_filename" type="file" id="profile_filename"><br></div>';
                             echo '<div style="margin-top:15px;">Upload LOGO <input name="image_filename" type="file" id="image_filename"></div>';
                             echo '<div style="margin-top:15px; margin-left:15px" align="left"><input type="submit" value="Save Pix" name="submit"  onClick="checkFile(this.form)" style="height:30px;width:100px"></b></font></div>';  
                         }   
             ?>       
									</div>
								</div><!--/.col-->
								<div class="col-sm-7">
									<div class="team-intro-content">
										<h4>Contact Info</h4>
                                        <div class="form-group">

     <input type="hidden" name="id" value="<?php echo $rowx['ID']; ?>">
     <input type="hidden" name="schoolname" value="<?php echo $rowx['Company Name']; ?>">
     <input type="text" name="stype" value="<?php echo $rowx['Type']; ?>">

    <p><span><i class="fa fa-phone-square"></i>&nbsp; <input type="text" class="form-control"  name="phone" style="width:300px;margin-top:-15px;font-size:12px" value="<?php echo $rowx['Phone']; ?>" placeholder="Phone #"></span>
     <span><i class="fa fa-envelope"></i>&nbsp; <input type="text" name="email" class="form-control"  style="width:300px;margin-top:-15px;font-size:12px" value="<?php echo $rowx['Email']; ?>"  placeholder="Email Address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"></span></p>
    <p><span><i class="fa fa-globe"></i>&nbsp; <input type="text" name="website" class="form-control"  style="width:300px;margin-top:-15px;font-size:12px" value="<?php echo $rowx['Website']; ?>"  placeholder="Business Website"></span>
     <span><i class="fa fa-address-card"></i>&nbsp; <input type="text" name="address" class="form-control"  style="width:300px;margin-top:-15px;font-size:12px" value="<?php echo $rowx['Address']; ?>"  placeholder="Business Address"></span></p>
    <p><span><i class="fa fa-building"></i>&nbsp; <input type="text" name="city" class="form-control"  style="width:300px;margin-top:-15px;font-size:12px" value="<?php echo $rowx['City']; ?>"  placeholder="City"></span>
     <span><i class="fa fa-flag"></i>&nbsp; <input type="text" name="country" class="form-control"  style="width:300px;margin-top:-15px;font-size:12px" value="<?php echo $rowx['Country']; ?>"  placeholder="Country"></span></p>

      <?php
        if(isset($_SESSION['usaid']) && $_SESSION['company']==$rowx['Company Name'])
        {  ?>
        <input type="submit" value="Save Profile" name="submit" class="btn btn-primary btn-md text-white" style="height:35px">
      <?php  }
      ?>
        </form>
									</div>
								</div><!--/.col-->
							</div><!--/.row-->
						</div><!-- /.container-->
					</section>

<?php
 require_once 'footer.php';
?> 
<style>

* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  max-width: 500px;
  max-height: 450px;
  left:30%;
  top:15%;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 500px;
  max-height: 450px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 95%;
  height: 40px;
  float:center;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}
.form-container select{
  width: 100%;
  height: 45px;
  float:center;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 10px 10px 10px 10px;
  border: none;
  cursor: pointer;
  width: 100%;
  float:centre;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>

<div class="form-popup" id="myForm">
  <form action="submitrev.php" class="form-container">
    <h3 align="center">Review <?php echo $sname; ?></h3><br>
    <input type="text" placeholder="Enter A Review" name="review" required>
    <input type="hidden" name="sname" value="<?php echo $sname; ?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="text" placeholder="Enter Your Name" name="by" required>
    <label for="psw"><b>Will You Recommend this Company?</b></label>
    <select name="recom" placeholder="Will You Recommend this School?">
      <option selected></option>
      <option>YES</option>
      <option>NO</option>
    </select>
    <input type="Submit" class="btn" value="Submit">
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

<link rel="stylesheet" href="fonts/icomoon/style.css">
<script>
    (function ($) {
        $(document).ready(function () {

            $(".button-collapse").sideNav();

            $('.slider').slider({full_width: true,indicators :false});

            //window.setInterval(function(){$('.carousel.carousel-slider').carousel('next')},4000)


        })
    })(jQuery);
</script>
</body>
</html>