
<!DOCTYPE html>
<?php 
	$page = "products";
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

<?php include('header.php') ?>
<?php 
	$product_id = $product_name = $description = ''; $related_products = array();
	$target_dir = $obj->front_image_directory(); $description_dir = $obj->front_end_description_directory();

	if(isset($_REQUEST['product_id'])) {
		$product_id = $_REQUEST['product_id'];
	}

	$product_data = array();
	$product_data = $obj->getTableRecords($GLOBALS['product_table'],'product_id', $product_id);

	if(!empty($product_data)) {
		foreach($product_data as $data) {
			if(!empty($data['product_name']) && $data['product_name'] != $GLOBALS['null_value']) {
				$product_name = $obj->encode_decode('decrypt', $data['product_name']);
			}
			if(!empty($data['description']) && $data['description'] != $GLOBALS['null_value']) {
				$description = html_entity_decode($obj->encode_decode('decrypt', $data['description']));
			}
			if(!empty($data['images']) && $data['images'] != $GLOBALS['null_value']) {
				$images = explode(',',$data['images']);
			}
			if(!empty($data['related_products']) && $data['related_products'] != $GLOBALS['null_value']) {
				$related_products = explode(",", $data['related_products']);
			}
		}
	}
?>

<div class="breadcumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-white text-center">
				<div class="breadcumb-content">
					<div class="breadcumb-title">Our Products</div>
					<ul class="breadcumb-menu">
						<li>
							<a href="index.php" class="text-white">Home</a>
						</li>
						<li>Products</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid px-lg-5 pad">
	<div class="row">
		<div class="col-lg-8 col-md-12">
			<div class="heading5 font1 clr4 m-0 p-0">Raxunilab</div>
			<div class="heading1 font1 clr2"><?php if(!empty($product_name)) { echo $product_name; } ?></div>
			<div class="smallborder1"></div>
			<div class="font2 pb-2">
				<?php if (!empty($images)) { ?>
					<style>
						.carousel-control-prev-icon,
						.carousel-control-next-icon {
							filter: invert(1); /* Makes the white icon black */
						}

						/* Optional: Add border/rounded corners */
						#imageCarousel img {
							border-radius: 8px;
						}
					</style>
					<div class="container">
						<div class="row justify-content-center">
						<div class="col-md-6"> <!-- Reduced width -->
							<div id="imageCarousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php 
									$activeSet = false;
									foreach ($images as $key => $image) {
										if (!empty($image) && file_exists($target_dir . $image)) {
											$activeClass = !$activeSet ? 'active' : '';
											$activeSet = true;
											?>
											<div class="carousel-item <?php echo $activeClass; ?>">
												<img src="<?php echo $target_dir.$image; ?>" class="d-block w-100" alt="Slide <?php echo $key + 1; ?>">
											</div>
											<?php 
										}
									} 
								?>
							</div>

							<!-- Controls -->
							<?php if(!empty($images)) { ?>
								<a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							<?php } ?>
							</div>
						</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="font2 pb-2 description_div" style="list-style-type:inherit !important;">
				<?php
					if (!empty($description)) {
						echo $description;
					}
				?>
			</div>
			<script type="text/javascript">
				if(jQuery('.description_div').length > 0) {
					jQuery('.description_div').find('img').each(function() {
						var src_attr = jQuery(this).attr('src');
						var admin_folder_name = "admin_rax_uni_lab_30072025/";
						jQuery(this).attr('src', admin_folder_name+src_attr);
					});
				}
			</script>
		</div>
		<div class="col-lg-4 col-md-12 col-12">
			<div class="sticky-top1">
				<div class="service-head">
					<div class="heading3 service-title top-line font1 clr1 mb-2">
						Our Products
					</div>
					<?php $index = 0; ?>
					<ul class="fullpad mainmenu pb-2 pt-2">
						<?php if (!empty($category_list)) {
							foreach ($category_list as $c_list) {
								$cat_id = $obj->encode_decode('decrypt', $c_list['category_id']);
								$cat_name = $obj->encode_decode('decrypt', $c_list['category_name']);
						?>
							<li>
								<div class="accordion" id="accordionCategory_<?php echo $index; ?>">
									<div class="card">
										<!-- Category Header -->
										<div class="card-header" id="heading_<?php echo $cat_id; ?>" data-toggle="collapse" data-target="#collapse_<?php echo $cat_id; ?>" aria-expanded="false" aria-controls="collapse_<?php echo $cat_id; ?>">
											<a class="font2 pl-3 sidefnt clr3 d-block">
												<i class="bi bi-chevron-right text-light"></i>&ensp;
												<?php echo $cat_name; ?>
												&ensp;<i class="bi bi-chevron-down"></i>
											</a>
										</div>

										<!-- Category Collapse -->
										<div id="collapse_<?php echo $cat_id; ?>" class="collapse" aria-labelledby="heading_<?php echo $cat_id; ?>" data-parent="#accordionCategory_<?php echo $index; ?>">
											<div class="card-body">
												<ul class="pl-3">
													<?php
													$sub_category_list = $obj->getCategoryFilterList('child', $c_list['category_id']);
													foreach ($sub_category_list as $sub_list) {
														$sub_id = $obj->encode_decode('decrypt', $sub_list['category_id']);
														$sub_name = $obj->encode_decode('decrypt', $sub_list['category_name']);
													?>
														<li>
															<!-- Subcategory Header -->
															<div class="card-header" id="sub_heading_<?php echo $sub_id; ?>" data-toggle="collapse" data-target="#sub_collapse_<?php echo $sub_id; ?>" aria-expanded="false" aria-controls="sub_collapse_<?php echo $sub_id; ?>">
																<a class="font2 pl-3 sidefnt clr3 d-block">
																	<i class="bi bi-chevron-right text-light"></i>&ensp;
																	<?php echo $sub_name; ?>
																	&ensp;<i class="bi bi-chevron-down"></i>
																</a>
															</div>

															<!-- Subcategory Collapse (no data-parent here!) -->
															<div id="sub_collapse_<?php echo $sub_id; ?>" class="collapse" aria-labelledby="sub_heading_<?php echo $sub_id; ?>">
																<div class="card-body">
																	<ul class="pl-3">
																		<?php
																		$product_list = $obj->getProductListByCategory('', $sub_list['category_id']);
																		foreach ($product_list as $p_list) {
																			$product_name = $obj->encode_decode('decrypt', $p_list['product_name']);
																		?>
																			<li>
																				<a href="products.php?product_id=<?php echo $p_list['product_id']; ?>" class="font2 sidefnt">
																					<i class="bi bi-chevron-right fontsize clr2"></i>&ensp;
																					<?php echo $product_name; ?>
																				</a>
																			</li>
																		<?php } ?>
																	</ul>
																</div>
															</div>
														</li>
													<?php } ?>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</li>
						<?php $index++; } } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<?php if(!empty($related_products)) { ?>
	<div class="container py-5">
		<div class="row">
			<div class="col-lg-12 text-center mb-lg-5 mb-3">
				<div class="heading1 font1 clr2">Related Products</div>
			</div>
			<div id="products" class="owl-carousel">
				<?php 
					$target_dir_front = "admin_rax_uni_lab_30072025/include/images/upload/";
					for($i=0; $i < count($related_products); $i++) {
						$related_products_list = array();
						$related_products_list = $obj->getTableRecords($GLOBALS['product_table'], 'product_id', $related_products[$i]);
						if(!empty($related_products_list)) {
							foreach($related_products_list as $data) {
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
					}
				?>		
			</div>
		</div>
	</div>
<?php } ?>
<?php include('footer.php') ?>
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
					items:3
				},
				1000:{
					items:4
				}
			}
		});
	});
</script>
<script>
    new WOW().init();
</script>
</body>
</html>