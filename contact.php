<!DOCTYPE html>
<?php 
	$page = "contact";
?>
<html lang="en">
<head itemscope itemtype="http://www.schema.org/website">
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta property="og:title" content="">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="">
	<meta property="og:url" content="https://www.">
	<meta property="og:image" content="https://www./images/android-icon-192x192.png">
	<meta name="keywords" content="">
	<meta property="og:description" name="description" content="Shop Address:  ">
	<meta name="robots" content="all">
	<meta name="revisit-after" content="10 Days">
	<meta name="copyright" content="">
	<meta name="language" content="English">
	<meta name="distribution" content="Global">
	<meta name="web_author" content="srisoftwarez.com">
	<meta name="msapplication-TileImage" content="images/ms-icon-144x144.png">
	<link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-icon-72x72.png">
	<link rel="icon" sizes="192x192"  href="images/android-icon-192x192.png">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/wow.js"></script>
</head>
<body itemscope itemtype="http://schema.org/WebPage">

<?php include('header.php') ?>

<div class="breadcumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-white text-center">
				<div class="breadcumb-content">
					<div class="breadcumb-title">Contact Us</div>
					<ul class="breadcumb-menu">
						<li>
							<a href="index.php" class="text-white">Home</a>
						</li>
						<li>Contact Us</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container pad">
	<div class="row justify-content-center pb-lg-3">
		<div class="col-lg-12 text-center pb-3">
			<div class="product_para">
				<div class="font1 clr1 heading1 pb-2">Contact Us</div>
				<p class="font2">Have a question or need a machine quote? We’re here to help with product info, support, or custom equipment needs. </p>
			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-12 pt-4 text-center">
			<span class="iconsa1"><i class="bi bi-map"></i></span>
			<div class="font1 clr4 heading4 pb-2">Address</div>
			<p class="font2 smallfnt">No: 145, First Floor, Tasiowa Nagar, Ramamoorthy 3rd Main Road, Pazhanthandalam, Thirumudivakkam, Chennai-600 044. Tamil Nadu. India.</p>
		</div>
		<div class="col-lg-4 col-md-6 col-12 pt-4 text-center">
			<span class="iconsa1"><i class="bi bi-telephone"></i></span>
			<div class="font1 clr4 heading4 pb-2">Call Us</div>
			<p class="font2 smallfnt">+91 89785 43300</p>
		</div>
		<div class="col-lg-4 col-md-6 col-12 pt-4 text-center">
			<span class="iconsa1"><i class="bi bi-envelope-check"></i></span>
			<div class="font1 clr4 heading4 pb-2">Email</div>
			<p class="font2 smallfnt">raxunilab@gmail.com</p>
		</div>
	</div>
	<div class="row pt-3">
		<div class="col-lg-6 col-md-12 col-12 pt-4 h-100">
		    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3341.4121158914113!2d80.0895223!3d12.9597776!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a52f5004ccdfd47%3A0xaea72d3b20cbf1c8!2sRAX%20UNIQUE%20TECHNOLOGIES!5e1!3m2!1sen!2sin!4v1754122544683!5m2!1sen!2sin"width="100%" height="430" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		</div>
		<div class="col-lg-6 col-md-12 col-12 pt-4 h-100">
			<div class="bg-light p-lg-5 p-3">
				<form class="brdr py-2 contact-form" action="contact.php" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" class="form-control font2" id="name" name="name" placeholder="Name *" required>
                        </div>
                        <div class="col-md-12 pt-4">
                            <input type="text" class="form-control font2" id="number" name="number"  pattern="[0-9]{10,15}" placeholder="Your Phone Number * " required>
                        </div>	
                        <div class="col-md-12 pt-4">
                            <input type="email" class="form-control font2" id="email" name="email" placeholder="Your Email *" required>
                        </div>
                        <div class="col-md-12 pt-4">
                            <textarea class="form-control formheight font2" id="message" name="message" placeholder="Your Message Here" required></textarea>
                        </div>
                        <div class="col-md-5 pt-4">
                            <input class="contactbtn w-100 font2" type="submit" value="Send Message" id="send" name="send"> 
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>
<button type="button" class="btn btn-primary d-none" id="models" data-toggle="modal" data-target="#exampleModal"></button>
<div class="container-fluid bg2">
	<div class="row">
		<div class="col-lg-12 text-center font2 py-2 text-white">
				Copyright © 2025 Raxunilab All Rights Reserved. Developed by&nbsp;<a class="text-white font1" href="http://www.srisoftwarez.com/">Srisoftwarez </a> 
		</div>	
	</div>
</div>
<div class="fixed point w0">
	<a href="https://api.whatsapp.com/send?phone=918978543300">
		<img src="images/whatsappicon.webp" class="priceicn float-left" alt="" title="">
	</a>
</div>
<div class="fixed point1 w0 d-none d-lg-block">
	<span class="time-of-year">
		<img src="images/callicon.webp" class="priceicn float-left" alt="" title="">
		<div class="tooltip text-white carter text-center"> For More Details Call <br> 
			<i class="bi bi-phone text-white"></i> +91 89785 43300  
		</div>
	</span>
</div>
<div class="fixed point1 w0 d-lg-none">
	<a href="tel:+918978543300">
		<img src="images/callicon.webp" class="priceicn float-left" alt="" title="">
	</a>
</div>
<script>
    new WOW().init();
</script>
</body>
</html>