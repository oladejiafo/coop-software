		</section>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		

		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


<style>

* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-buttonr {
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
.form-popupr {
  display: none;
  position: fixed;
  bottom: 0;
  max-width: 500px;
  max-height: 450px;
  left:30%;
  top:10%;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-containerr {
  max-width: 500px;
  max-height: 450px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-containerr input[type=text], .form-containerr input[type=password] {
  width: 95%;
  height: 30px;
  float:center;
  padding: 5px;
  margin: 5px 0 12px 0;
  border: none;
  background: #f1f1f1;
}
.form-containerr input[type=Submit]{
  width: 95%;
  height: 50px;
  float:center;
  padding: 5px;
  margin: 5px 0 12px 0;
  border: none;
  background: #f1f1f1;
}
.form-containerr select{
  width: 95%;
  height: 35px;
  float:center;
  padding: 5px;
  margin: 5px 0 12px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-containerr input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-containerr .btn {
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
.form-containerr .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-containerr .btn:hover, .open-button:hover {
  opacity: 1;
}
/*    <button type="button" class="btn cancel" onclick="closeRForm()">Close</button>*/
@media (max-width: 480px){
/* The popup form - hidden by default */
.form-popupr {
  display: none;
  position: fixed;
  bottom: 0;
  max-width: 300px;
  max-height: 500px;
  left:8%;
  top:3%;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-containerr {
  max-width: 300px;
  max-height: 400px;
  padding: 5px;
  background-color: white;
}
.open-buttonr {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 1;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}
/* Set a style for the submit/login button */
.form-containerr .btn {
  background-color: #4CAF50;
  color: white;
  padding: 5px 1px 5px 1px;
  border: none;
  cursor: pointer;
  width: 100%;
  float:centre;
  margin-bottom:10px;
  opacity: 1;
}

} 
</style>
<?php
function checkConnection()
{
 $cond=@fsockopen("www.google.com",80,$errno,$errstr,30);
 if($cond)
 {
  $status="Ok";
  fclose($cond);
 } else {
  $status = "No <br/>\n";
  $status .= "$errstr ($errno)";
 }
 return $status;
}
$kk= checkConnection();

if($kk =="Ok")
{ 
  $geoplugin = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $_SERVER['REMOTE_ADDR']) );
  $ccity=$geoplugin['geoplugin_city'];
}  
?>
<div class="form-popupr" id="myRForm">
<div class="modal-close-area modal-close-df">
      <a class="close" style="color:#2e344e" data-dismiss="modal" href="#" onclick="closeRForm()"><i class="fa fa-close"></i></a>
 </div>
<form action="reguser.php" method="POST" class="form-containerr">
<h3 style="background-color:#3c6cc7;color:white;height:40px;width:95%;margin-top:10px" align="center">Register Your Cooperative Here</h3>
      <input type="text" placeholder="Enter Cooperative Name" name="company" required>
  <input type="text" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" placeholder="Enter A Valid Email Address" name="email" required>
  <input type="password" placeholder="Enter A Password" name="passwd" value="" required>
  <input type="password" placeholder="Confirm Password" name="passwd2" required> 
  <input type="text" placeholder="Enter A Phone #" name="phone" value="" id="phone" required>
  <input type="text" placeholder="Enter Your City" name="city" value="<?php echo $ccity; ?>">
	<select name="stype"">
	  <option selected disabled>Select Usage Type</option>
   	  <option>30 Days Free Trial</option>
      <option>Enterprise Plan</option>
      <option>Basic Plan</option>
	</select>

  <input style="height:50px; background-color:#3c6cc7" type="Submit" name="action" class="btn btn-primary" value="Submit">
  </form>
</div>

<script>
function openRForm() {
  document.getElementById("myRForm").style.display = "block";
}

function closeRForm() {
  document.getElementById("myRForm").style.display = "none";
}
</script>

</body>

<div style="background-color:#3a4264; width:100%; height: 60px; padding-top: 15px;padding-right:5px"> 
      <span class="pull-right">
      <a target="_blank" href="http://www.waltergates.com"><font size="2" face="Arial" color="#fff">(c) 2020-<?php echo date('Y'); ?> WALTERGATES - info@waltergates.com</font></a>&nbsp;
      </span>
</div>

</html>

