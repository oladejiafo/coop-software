<?php
require_once 'headrr.php';
$_REQUEST['tval'];
?>

	<body id="page-top">
		<div id="st-container" class="st-container">
    		<div class="st-pusher">
    			
					<section class="contact-info-section" style="background-color:#eee">
						<div class="container">
							<div class="text-center">
								<h1>&nbsp;</h1>
								<h1 class="section-title"><?php echo $tval; ?></h1>
							</div>

							<div class="row content-row" align="center">

								<div class="col-md-10">
									<div class="contact-map">
										
										<form id="mainContact" action="sendemail.php" method="POST">
											<div class="form-group">
											    
											    <input name="name" type="text" class="form-control"  required="" placeholder="Name">
											</div>
										  	<div class="form-group">
										    	
										    	<input name="email" type="email" class="form-control" required="" placeholder="Email">
										  	</div>

											<div class="row">
												<div class="col-md-6">
												  <div class="form-group">
												   
												    <input name="req" type="text" class="form-control" required="" placeholder="Subject" value="<?php echo $req; ?>">
												  </div>
												</div>
												<div class="col-md-6">
												  <div class="form-group">
												   
												    <input name="phone" type="text" class="form-control" placeholder="Phone">
												  </div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
												  <div class="form-group">
												   
												    <input name="city" type="text" class="form-control" placeholder="City" value="<?php echo $ccity; ?>">
												  </div>
												</div>
												<div class="col-md-6">
												  <div class="form-group">
												   
												    <input name="company" type="text" class="form-control" placeholder="Company">
												  </div>
												</div>
											</div>
											<div class="form-group text-area">
												
												<textarea name="message" class="form-control" rows="6" required="" placeholder="Your message/Enquiry Here..."></textarea>
											</div>

											<button style="height:50px" type="submit" class="btn btn-primary">Send Message</button>
										</form>
									</div>
								</div>

							</div>
						</div>
					</section><br>

			        <!-- cta start -->
			        <section class="cta-section">
			        	<div class="container text-center">
						<?php
						  require_once 'footer.php';
						?>
			        	</div><!-- /.container -->
			        </section><!-- /.cta-section -->
			        <!-- cta end -->
