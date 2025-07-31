<!DOCTYPE html>
<?php 
	$page = "index";
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
	<meta property="og:description" name="description" content="">
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
	<link rel="stylesheet" href="css/owl.carousel.min.css">
  	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/wow.js"></script>
	<script src="js/owl.carousel.min.js"></script>
</head>
<body itemscope itemtype="http://schema.org/WebPage">
	
<?php 
	include('header.php');
	$target_dir_front = "admin_rax_uni_lab_30072025/include/images/upload/";
	$home_banner_list = array(); $home_screen_image = "";
	$home_banner_list = $obj->getTableRecords($GLOBALS['home_banner_table'], '', '');
	if(!empty($home_banner_list)) {
		foreach($home_banner_list as $data) {
			if(!empty($data['home_screen_images']) && $data['home_screen_images'] != $GLOBALS['null_value']) {
				$home_screen_image = $data['home_screen_images'];
			}
		}
	}
	$mobile_banner_list = array(); $mobile_screen_image = "";
	$mobile_banner_list = $obj->getTableRecords($GLOBALS['mobile_banner_table'], '', '');
	if(!empty($mobile_banner_list)) {
		foreach($mobile_banner_list as $data) {
			if(!empty($data['mobile_screen_images']) && $data['mobile_screen_images'] != $GLOBALS['null_value']) {
				$mobile_screen_image = $data['mobile_screen_images'];
			}
		}
	}

	if(!empty($home_screen_image) && file_exists($target_dir_front.$home_screen_image)) {
		?>
		<img src="<?php echo $target_dir_front.$home_screen_image; ?>" class="img-fluid w-100 d-lg-block d-none" alt="<?php echo $home_screen_image; ?>" title="<?php echo $home_screen_image; ?>">
		<?php
	}
	else {
		?>
		<img src="images/banner1.png" class="img-fluid w-100 d-lg-block d-none" alt="banner1" title="banner1">
		<?php
	}
	if(!empty($mobile_screen_image) && file_exists($target_dir_front.$mobile_screen_image)) {
		?>
		<img src="<?php echo $target_dir_front.$mobile_screen_image; ?>" class="img-fluid w-100 d-lg-none d-sm-block" alt="<?php echo $mobile_screen_image; ?>" title="<?php echo $mobile_screen_image; ?>">
		<?php
	}
?>

<div class="welcome-section overflow-hidden">
	<div class="container pad">
		<div class="row">
			<div class="col-lg-6 col-md-12 ord1">
				<div class="welcome-img mr-lg-5">
					<div class="imga1">
						<img src="images/welcme-side.png" class="img-fluid" alt="" title="">
					</div>
					<div class="vehicle-repair movingX">
						<img src="images/car-repair.svg" class="img-fluid" alt="" title=""> 
						<span class="heading5 font2">Equipment Service & Support</span>
					</div>
					<div class="about-counter">
						<h3 class="counter-title">
						<span class="counter-number">25</span>+</h3>
						<span class="counter-text font2">Years Working Experience</span>
						<div class="line-animation">
							<img src="images/line.svg" class="img-fluid" alt="" title="">
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12 align-self-center ord2">
				<div class="heading6 font1 clr4 pb-1">Smart Machines Reliable Results.</div>
				<h1 class="heading2 font1 font-weight-bold pb-2 clr2">RAX UNIQUE TECHNOLOGIES</h1>
				<p class="font2 text-secondary">We build machines that labs & industries trust every day. Whether it’s grinding, crushing, pressing or dividing samples our equipment is designed to make your job simple, accurate & reliable. With a strong presence across Hyderabad, Jharsuguda & Chennai, we are proud to support leading cement, mining & material testing labs across India.</p>
				<ul class="list col-12 fullpad">
					<li>
						<i class="bi bi-dot clr4"></i>
						<div class="heading6 font2">Give full support and easy service</div>
					</li>
					<li>
						<i class="bi bi-dot clr4"></i>
						<div class="heading6 font2">Supply to cement, mining & testing companies</div>
					</li>
					<li>
						<i class="bi bi-dot clr4"></i>
						<div class="heading6 font2">Build machines for grinding, crushing & pressing</div>
					</li>
				</ul>
				<div class="header-info d-flex">
					<div class="header-info_icon">
						<a href="tel:+12907555-101">
							<img src="images/comment2.svg" class="img-fluid" alt="" title="">
						</a>
					</div>
					<div class="media-body">
						<span class="header-info_label">Talk to Us</span>
						<p class="header-info_link">
							<a href="tel:+919999999999" class="clr3">+9189785 43300 </a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="shape-mockup spin">
		<img src="images/shape-2.png" class="img-fluid" alt="" title="">
	</div> -->
</div>

<div class="parallaxa1">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center pb-3 mb-3">
				<div class="heading5 font1 clr1">Our Workflow</div>
				<div class="heading1 font1 clr2">The Way We Deliver </div>
			</div>
			<div class="col-lg-12">
				<div class="process-box">
					<div class="process-box-line">
						<div class="process-box-img">
							<img class="step-1" src="images/process-boxa1.jpg" class="img-fluid" alt="" title=""> 
							<img class="step-2 active" src="images/process-boxa2.jpg" class="img-fluid" alt="" title=""> 
							<img class="step-3" src="images/process-boxa3.jpg" class="img-fluid" alt="" title=""> 
							<span class="step-name step-1">Step - 01</span> 
							<span class="step-name step-2 active">Step - 02</span> 
							<span class="step-name step-3">Step - 03</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center justify-content-lg-between">
			<div class="col-lg-4 col-md-6 process-box-wrap pstep-1">
				<div class="process-boxa1">
					<div class="process-box_icon">
						<img src="images/process_boxb1.svg" class="img-fluid" alt="" title="">
					</div>
					<div class="heading5 box-title font1 clr4">We Understand Your Need</div>
					<p class="process-box_text font2">Tell us your requirement we suggest the best-fit machine for your lab or industry.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 process-box-wrap pstep-1">
				<div class="process-boxa1">
					<div class="process-box_icon">
						<img src="images/process_boxb2.svg" class="img-fluid" alt="" title="">
					</div>
					<div class="heading5 box-title font1 clr4">We Build with Care</div>
					<p class="process-box_text font2">Our team designs, manufactures & tests the product to ensure perfect performance.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 process-box-wrap pstep-1">
				<div class="process-boxa1">
					<div class="process-box_icon">
						<img src="images/process_boxb3.svg" class="img-fluid" alt="" title="">
					</div>
					<div class="heading5 box-title font1 clr4">We Deliver & Support</div>
					<p class="process-box_text font2">On-time delivery with proper guidance, service & full after-sales support.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container py-5">
	<div class="row text-center align-self-center row-space">
		<div class="col-lg-3 col-md-6">
			<div class="counter-head mt-3">
				<div class="icon">
					<i class="bi bi-clock-history heading1 clr1"></i>
				</div>
				<ul id="counter" class="fullpad mt-3">
					<li>
						<span class="count percent counttext font1" data-count="15"></span>
						<span class="bannerhead">+</span>
					</li>
					<p class="font2 clr2 smallfnt">Product Types</p>
				</ul>
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="counter-head mt-3">
				<div class="icon">
					<i class="bi bi-person-circle heading1 clr1"></i>
				</div>
				<ul id="counter" class="fullpad mt-3">
					<li>
						<span class="count percent counttext smsfont" data-count="30"></span>
						<span class="bannerhead">+</span>
					</li>
					<p class="poppins clr2 smallfnt">Leading Clients</p>
				</ul>
				</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="counter-head mt-3">
				<div class="icon">
					<i class="bi bi-gear heading1 clr1"></i>
				</div>
				<ul id="counter" class="fullpad mt-3">
					<li>
						<span class="count percent counttext smsfont" data-count="100"></span>
						<span class="bannerhead">+</span>
					</li>
					<p class="poppins clr2 smallfnt">Machines Installed</p>
				</ul>
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="counter-head mt-3">
				<div class="icon">
					<i class="bi bi-heart-fill heading1 clr1"></i>
				</div>
				<ul id="counter" class="fullpad mt-3">
					<li>
						<span class="count percent counttext smsfont" data-count="100"></span>
						<span class="bannerhead">%</span>
					</li>
					<p class="poppins clr2 smallfnt">Satisfaction</p>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="container py-5">
	<div class="row">
		<div class="col-lg-12 text-center mb-lg-5 mb-3">
			<div class="heading1 font1 clr2">Explore Our Machines</div>
			<p class="font2">We offer a wide range of lab and industrial equipment designed for accurate testing and smooth sample preparation. </p>
		</div>
		<div id="products" class="owl-carousel">
			<?php
				$products_list = array();
				$products_list = $obj->getTableRecords($GLOBALS['product_table'], 'is_home_product', '1');
				if(!empty($products_list)) {
					foreach($products_list as $data) {
						if(!empty($data['product_id']) && $data['product_id'] != $GLOBALS['null_value']) {
							$images = array(); $first_image = ""; $product_name = "";
							if(!empty($data['images']) && $data['images'] != $GLOBALS['null_value']) {
								$images = explode(",", $data['images']);
								$first_image = $images[0];
							}
							if(!empty($data['product_name']) && $data['product_name'] != $GLOBALS['null_value']) {
								$product_name = $obj->encode_decode('decrypt', $data['product_name']);
							}
							?>
							<div class="item">
								<div class="product-head">
									<div class="product-inner overlay-anim">
										<figure class="image">
											<img src="<?php if(file_exists($target_dir_front.$first_image)) { echo $target_dir_front.$first_image; } else { echo 'images/producta1.png'; } ?>" class="img-fluid" alt="<?php echo $product_name; ?>" title="<?php echo $product_name; ?>">
										</figure>
									</div>
									<div class="product-content">
										<div class="title font1"><?php echo $product_name; ?></div>
										<a class="read-more" href="products.php?product_id=<?php echo $data['product_id']; ?>">
											<i class="bi bi-arrow-right-short"></i>
										</a>
									</div>
								</div>
							</div>
							<?php
						}
					}
				}
			?>
		</div>
	</div>
</div>
<div class="parallaxa2">
	<div class="container pad">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="heading2 font1 text-white">Reliable Equipment for Labs That Demand Accuracy and Performance</div>
				<div class="extra-nav mt-3">
					<div class="extra-cell">
						<a class="btn btn-danger btn-border white-border font1" href="contact.php">Request a Quote</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container pad">
	<div class="row">
		<div class="col-lg-6 col-md-12 align-self-center">
			<div class="heading1 font1 clr1 pb-2">Why Industry Leaders Choose Us</div>
				<p class="font1"><i>Raxunilab Advantage</i></p>
				<p class="font2">We understand that every lab is different, and so are your needs. That’s why we don’t offer one-size-fits-all solutions. Our machines are built with real-world usage in mind easy to operate, low maintenance and built to last. From consultation to delivery and service, we’re with you at every step. When you choose RAX UNIQUE, you choose peace of mind.</p>
		</div>
		<div class="col-lg-6 col-md-12">
			<div class="single-about-style-two clearfix my-3">
				<div class="image-block">
					<img src="images/wca1.png" class="img-fluid" alt="" title="">
					<div class="overlay">
						<div class="box">
							<div class="content">
								<div class="dotted"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="text-block">
					<div class="heading6 pb-2 font1 clr4">Trusted by Top Companies</div>
					<p class="font2">Many big industries use our machines every day and trust our quality.</p>
				</div>
			</div>
			<div class="single-about-style-two clearfix my-3">
				<div class="image-block">
					<img src="images/wca2.png" class="img-fluid" alt="" title="">
					<div class="overlay">
						<div class="box">
							<div class="content">
								<div class="dotted"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="text-block">
					<div class="heading6 pb-2 font1 clr4">Made for Real Lab Work</div>
					<p class="font2">Our machines work well in tough lab conditions and give accurate results.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php') ?>

<script>
	$(document).ready(function () {
  $('.process-box-wrap').on('mouseenter', function () {
    const index = $(this).index('.process-box-wrap') + 1;
    
    $('.process-box-img img').removeClass('active');
    $('.process-box-img .step-name').removeClass('active');

    $('.process-box-img .step-' + index).addClass('active');
    $('.process-box-img .step-name.step-' + index).addClass('active');
  });
});
    new WOW().init();
</script>
<script>
	var counted = 0;
	$(window).scroll(function() {
	var oTop = $('#counter').offset().top - window.innerHeight;
	if (counted == 0 && $(window).scrollTop() > oTop) {
		$('.count').each(function() {
		var $this = $(this),
		countTo = $this.attr('data-count');
		$({
		countNum: $this.text()
		}).animate({
		countNum: countTo
		},
		{
		duration: 2000,
		easing: 'swing',
		step: function() {
			$this.text(Math.floor(this.countNum));
		},
		complete: function() {
		$this.text(this.countNum);
		}
		});
	});
	counted = 1;
}
}); 
</script>
<script>
	$(document).ready(function(){
		var owl = $('#products');
		owl.owlCarousel({
			loop:true,
			margin:20,
			nav:false,
			dots:false,
			autoplay:true,
			autoplayTimeout:3000,
			autoplayHoverPause:true,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				1000:{
					items:3
				}
			}
		});
	});
</script>
</body>
</html>