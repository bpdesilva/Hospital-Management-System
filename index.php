<!DOCTYPE HTML>
<?php
$con= mysqli_connect ("localhost","root","","hms");//connect to database
//If connection fails throw error
if (mysqli_connect_error()){
echo '<script>alert("Databse has failded to connect!");</script>';//DB connection error
}
//Validate on email submit
if (isset($_POST['Send_Message'])){
    $email = test_input($_POST['emails']);//get email from form
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";//error message
echo '<script language="javascript">';
echo 'alert("'.$emailErr.'")';//show error message
echo '</script>';
}
//If no error send data to db    
if(!isset($emailErr)){
$name=$_POST['names'];
$message= $_POST['messages'];
//MYSQL Query
$sql="INSERT INTO contact_us(name,email,message)VALUES('$name','$email','$message')";
$result = mysqli_query($con,$sql);
    
if(!$result){
echo '<script>alert("Databse has failded to connect!");</script>';
    }
  }
}

function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


?>

<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Health Care Hosptial</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Health Care Hospital">
    <meta name="author" content="bpdesilva">
    <meta name="keyword" content="Health, Care, Hospital, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/h.ico">
        
  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400, 900" rel="stylesheet"> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Flexslider -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/styleh.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">
	<nav class="gtco-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-sm-2 col-xs-12">
					<div id="gtco-logo"><a href="index.html">Health<em>Care</em>Hosptial</a></div>
				</div>
				<div class="col-xs-10 text-right menu-1 main-nav">
					<ul>
						<li class="active"><a href="#" data-nav-section="home" target="external">Home</a></li>
						<li><a href="#" data-nav-section="about" target="external">About</a></li>
						<li><a href="#" data-nav-section="practice-areas" target="external">Practice Areas</a></li>
						<li><a href="#" data-nav-section="our-team" target="external">Our Team</a></li>
                        <li><a href="Login.php" onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;">Log In</a></li>
						<li class="btn-cta"><a href="#" data-nav-section="contact" target="external"><span>Contact</span></a></li>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

	<section id="gtco-hero" class="gtco-cover" style="background-image: url(img/img_bg_4.jpg);"  data-section="home"  data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="display-t">
						<div class="display-tc">
							<h1 class="animate-box" data-animate-effect="fadeIn">The Greatest Hospital You Can Trust</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section id="gtco-about" data-section="about">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 col-md-offset-2 heading animate-box" data-animate-effect="fadeIn">
					<h1>Welcome To Our Hosptial</h1>
					<p class="sub">Dedicated to serve you at the best we can</p>
					<p class="subtle-text animate-box" data-animate-effect="fadeIn">Welcome</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
					<div class="img-shadow">
						<img src="img/img_1.jpg" class="img-responsive" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
					</div>
				</div>
				<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
					<h2 class="heading-colored">Excellence &amp; Honesty</h2>
					<p>Health Care Hospital has been a renown brand in Sri Lankan healthcare for more than six decades. Since our founding in 1955, we have built a reputation for regional leadership in medical excellence and innovation.
                    <br>
                    Health Care Hospital offers 160+ beds – across a range of spacious and modern wards. We offer the best specialists and employees, all of whom are dedicated to providing exceptional outcomes and utmost customer satisfaction.</p>
				</div>
			</div>
		</div>
	</section>

	<section id="gtco-practice-areas" data-section="practice-areas">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 col-md-offset-2 heading animate-box" data-animate-effect="fadeIn">
					<h1>Practice Areas</h1>
					<p class="subtle-text animate-box" data-animate-effect="fadeIn">Practice <span>Areas</span></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="gtco-practice-area-item animate-box">
						<div class="gtco-icon">
							<img src="img/scale.png" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
						</div>
						<div class="gtco-copy">
							<h3>Heart Care</h3>
							<p>Cardiology is a wide field incorporating preventive care, screening, progressed analytic tests, intrusive and non-obtrusive methods, post-operative administration, cardiovascular restoration, and a full scope of surgical projects.</p>
						</div>
					</div>

					<div class="gtco-practice-area-item animate-box">
						<div class="gtco-icon">
							<img src="img/scale.png" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
						</div>
						<div class="gtco-copy">
							<h3>Eye Care</h3>
							<p>The endowment of visual perception is one we expect to reestablish and enhance both in grown-ups and children looking for the skill of our experts. Offering a scope of eye welfare benefits, our group utilizes world-class bespoke services and surgical gear, fitting treatment to your individual needs.</p>
				 		</div>
					</div>

				</div>
				<div class="col-md-6">
					
					<div class="gtco-practice-area-item animate-box">
						<div class="gtco-icon">
							<img src="img/scale.png" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
						</div>
						<div class="gtco-copy">
							<h3>Child Care</h3>
							<p>Devoted to the sustaining and nurturing of children, we give brilliance in therapeutic, surgical and rehabilitative care, with pediatricians who are sensitive to children's' needs and receptive to parental concerns.</p>
						</div>
					</div>

					<div class="gtco-practice-area-item animate-box">
						<div class="gtco-icon">
							<img src="img/scale.png" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
						</div>
						<div class="gtco-copy">
							<h3>Surgical Care</h3>
							<p>Our accomplished surgical groups unite a utmost abilities and treatment designs over a scope of specialties . These specialists approach a portion of the district's most progressive offices, including a completely equipped laparoscopic theater with front line video system and superior quality display. </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="gtco-our-team" data-section="our-team">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 col-md-offset-2 heading animate-box" data-animate-effect="fadeIn">
					<h1>Our Team</h1>
					<p class="subtle-text animate-box" data-animate-effect="fadeIn">Our Team</p>
				</div>
			</div>
			<div class="row team-item gtco-team-reverse">
				<div class="col-md-6 col-md-push-7 animate-box" data-animate-effect="fadeInRight">
					<div class="img-shadow">
						<img src="img/img_team_1.jpg" class="img-responsive" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
					</div>
				</div>
				<div class="col-md-6  col-md-pull-6 animate-box" data-animate-effect="fadeInRight">
					<h2>Clay Bolton</h2>
					<p>Dr.Clay Bolton is a skilled and experienced internist and pediatrician serving the community of New York, NY. Dr. Bolton attended the University of Connecticut, where he received his medical degree, and completed his residency in internal medicine and an additional residency in pediatrics from Boston University, Boston City Hospital.</p>
					<p>Dr. Bolton is a part of Mount Sinai Beth Israel Medical Group. He is board certified by the American Board of Internal Medicine and the American Board of Pediatrics. Dr. Bolton is a member of the American Academy of Pediatrics and the American College of Physicians. He is affiliated with Mount Sinai Beth Israel Hospital, NY. </p>
				</div>
			</div>

			<div class="row team-item gtco-team">
				<div class="col-md-6 col-md-pull-1 animate-box"  data-animate-effect="fadeInLeft">
					<div class="img-shadow">
						<img src="img/img_team_2.jpg" class="img-responsive" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
					</div>
				</div>
				<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
					<h2>Stanley Hale</h2>
					<p>Dr.Stanley Hale, MD is a Doctor primarily located in Birmingham, AL. He has 30 years of experience. His specialties include Anesthesiology, Critical Care Medicine and Pediatric Critical Care Medicine. Dr. Buckmaster is affiliated with Callahan Eye Hospital, Birmingham VA Medical Center and Children's of Alabama. He speaks English.</p>
				</div>
			</div>

		</div>
	</section>

	<section id="gtco-contact" data-section="contact">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 col-md-offset-2 heading animate-box" data-animate-effect="fadeIn">
					<h1>Contact Us</h1>
					<p class="sub">Drop in a message</p>
					<p class="subtle-text animate-box" data-animate-effect="fadeIn">Contact</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-md-push-6 animate-box">
					<form name="form1" action="index.php" method="POST">
						<div class="form-group">
							<label for="name" class="sr-only">Name</label>
							<input type="text" class="form-control" placeholder="Name" name="names">
						</div>
						<div class="form-group">
							<label for="email" class="sr-only">Email</label>
							<input type="text" class="form-control" placeholder="Email" name="emails" >
						</div>
						<div class="form-group">
							<label for="message" class="sr-only">Message</label>
							<textarea name="messages" id="message" class="form-control" cols="30" rows="7" placeholder="Messages"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" name="Send_Message" class="btn btn-primary" >
						</div>
					</form>
				</div>
				<div class="col-md-4 col-md-pull-6 animate-box">
					<div class="gtco-contact-info">
						<ul>
							<li class="address">77 Galle Rd, Colombo,Sri Lanka 00300</li>
							<li class="phone"><a href="tel://1235235598">+ 1235 2355 98</a></li>
							<li class="email"><a href="mailto:info@yoursite.com">info@healthcarehosptials.com</a></li>
							<li class="url"><a href="#">http://healthcarehosptials.com</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<footer id="gtco-footer" role="contentinfo">
		<div class="container">
			
			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; 2017 Health Care Hosptial. All Rights Reserved.</small>
					</p>
					<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>
    

	</body>
</html>

