<?php
 require_once 'headrr.php';
?>

  <!-- ================ Start Video Area ================= -->
  <section class="video-area section-gap-bottom">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5">
          <div class="section-title text-white">
            <h2 class="text-white">
              OPERATE YOUR THRIFT & LOANS FROM THE CLOUD!
            </h2>
            <p>
              You will be saving a lot of resources by adopting this evolutionary cloud-based solution. Mitigate the risk of data loss. Save time and cost on support and backup.
              TRY IT FOR 4 WEEKS FREE! <a href="#" id="download-button" onclick="openRForm()"><font style="color:floralwhite">Sign Up Now</font></a>
            </p>
          </div>
        </div>
        <div class="offset-lg-1 col-md-6 video-left">
          <div class="owl-carousel video-carousel">
            <div class="single-video">
              <div class="video-part">
                <img class="img-fluid" src="img/video-img.jpg" alt="">
                <div class="overlay"></div>
                <a class="popup-youtube play-btn" href="https://youtu.be/jraWztU9PnA">
                  <img class="play-icon" src="img/play-btn.png" alt="">
                </a>
              </div>
              <h4 class="text-white mb-20 mt-30">FINASOL: Your Thrift & Loan In The Cloud!</h4>
              <p class="text-white mb-20">
                There are lots of solution everywhere, but the question is how efficiently is yours working for you? How secured are your records? How easily can you share your records with your other branches? How much support service are you getting from your software vendor? How easy and dynamic is your solution to use? These are a few of the unique services that stands us out in providing your software needs! 
              </p>
            </div>

            <div class="single-video">
              <div class="video-part">
                <img class="img-fluid" src="img/video-img.jpg" alt="">
                <div class="overlay"></div>
                <a class="popup-youtube play-btn" href="https://www.youtube.com/watch?v=VufDd-QL1c0">
                  <img class="play-icon" src="img/play-btn.png" alt="">
                </a>
              </div>
              <h4 class="text-white mb-20 mt-30">Benefits of Cloud-Based Finasol</h4>
              <p class="text-white mb-20">
                 **Reduce your overhead cost..**<br>
                 **Access automatic updates rather than your solution getting obsolate..** <br>
                 **Access your business from anywhere 24/7..**<br>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ End Video Area ================= -->

  <!-- ================ Start Feature Area ================= -->
  <section class="other-feature-area" style="margin-top: -100px;">
    <div class="container">
      <div class="feature-inner row">
        <div class="col-lg-12">
          <div class="section-title text-left">
            <h2>
              Features Of This Solution
            </h2>
            <p>
              If you are looking at blank cassettes on the web, you may be
              very confused at the difference in price. You may see some for
              as low as $.17 each.
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="other-feature-item">
            <i class="ti-key"></i>
            <h4>Lifetime Access</h4>
            <div>
              <p>
                Lorem ipsum dolor sit amet consec tetur adipisicing elit, sed
                do eiusmod tempor incididunt labore. Lorem ipsum dolor sit
                amet consec tetur adipisicing elit, sed do eiusmod tempor
                incididunt labore.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mt--160">
          <div class="other-feature-item">
            <i class="ti-files"></i>
            <h4>Source File Included</h4>
            <div>
              <p>
                Lorem ipsum dolor sit amet consec tetur adipisicing elit, sed
                do eiusmod tempor incididunt labore. Lorem ipsum dolor sit
                amet consec tetur adipisicing elit, sed do eiusmod tempor
                incididunt labore.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mt--260">
          <div class="other-feature-item">
            <i class="ti-medall-alt"></i>
            <h4>Student Membership</h4>
            <div>
              <p>
                Lorem ipsum dolor sit amet consec tetur adipisicing elit, sed
                do eiusmod tempor incididunt labore. Lorem ipsum dolor sit
                amet consec tetur adipisicing elit, sed do eiusmod tempor
                incididunt labore.
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- ================ End Feature Area ================= -->

  <script src="jjs/vendor/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
    crossorigin="anonymous"></script>
  <script src="jjs/vendor/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  <script src="jjs/jquery.ajaxchimp.min.js"></script>
  <script src="jjs/jquery.magnific-popup.min.js"></script>
  <script src="jjs/parallax.min.js"></script>
  <script src="jjs/owl.carousel.min.js"></script>
  <script src="jjs/jquery.sticky.js"></script>
  <script src="jjs/hexagons.min.js"></script>
  <script src="jjs/jquery.counterup.min.js"></script>
  <script src="jjs/waypoints.min.js"></script>
  <script src="jjs/jquery.nice-select.min.js"></script>
  <script src="jjs/main.js"></script>



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
    max-height: 550px;
    left:30%;
    top:10%;
    border: 3px solid #f1f1f1;
    z-index: 9;
  }
  
  /* Add styles to the form container */
  .form-containerr {
    max-width: 500px;
    max-height: 550px;
    padding: 10px;
    background-color: white;
  }
  
  /* Full-width input fields */
  .form-containerr input[type=text], .form-container input[type=password] {
    width: 95%;
    height: 30px;
    float:center;
    padding: 5px;
    margin: 5px 0 12px 0;
    border: none;
    background: #f1f1f1;
  }
  .form-containerr select{
    width: 98%;
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
    max-height: 500px;
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
    $geoplugin = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $_SERVER['REMOTE_ADDR']) );
    $ccity=$geoplugin['geoplugin_city'];
  ?>
  <div class="form-popupr" id="myRForm">
  <div class="modal-close-area modal-close-df">
    <a class="close" style="color:#FF0000" data-dismiss="modal" href="#" onclick="closeRForm()"><i class="fa fa-close"></i></a>
  </div>
  <form action="reguser.php" method="POST" class="form-containerr">
   <h3 style="background-color:#CD5C5C;height:40px;margin-top:10px" align="center">Register Your School Here</h3>
      <input type="text" placeholder="Enter School Name" name="company" required>
    <input type="text" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" placeholder="Enter A Valid Email Address" name="email" required>
    <input type="text" placeholder="Enter A Phone #" name="phone" value="" id="phone" required>
    <input type="text" placeholder="Enter Your City" name="city" value="<?php echo $ccity; ?>">
    <input type="password" placeholder="Enter A Password" name="passwd" value="" required>
    <input type="password" placeholder="Confirm Password" name="passwd2" required>
  
      <input type="Submit" name="action" class="btn" value="Submit">
  
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
  
<?php
 require_once 'footer.php';
?>
  
</body>

</html>