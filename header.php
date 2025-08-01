<?php 
    include("admin_rax_uni_lab_30072025/include_files.php");
	$category_list = array();
	$category_list = $obj->getCategoryFilterList('parent','');
?>
<header class="nav-header header-transparent styla1 d-none d-md-none d-lg-block">
	<div class="top-bar text-white">
		<div class="container">
			<div class="topbar-inner d-flex justify-content-between align-items-center">
				<div class="topbar-left">
					<p>Quality Equipment Trusted Results.</p>
				</div>
				<div class="topbar-right">
					<ul>
						<li><i class="bi bi-telephone mr-1"></i>  Call Us - +91 89785 43300</li>
						<li><i class="bi bi-envelope mr-1"></i>  raxunilab@gmail.com</li>      
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="sticky-header main-bar-wraper navbar-expand-lg">
		<div class="main-bar clearfix">
			<div class="container clearfix">
				<div class="logo-header">
					<a href="index.php">
						<img src="images/rax-logo.png" class="img-fluid wow rotateIn" alt="RAX UNIQUE TECHNOLOGIES" title="RAX UNIQUE TECHNOLOGIES">
					</a>
				</div>
				<div class="extra-nav">
					<div class="extra-cell">
						<a class="btn btn-danger btn-border white-border font1" href="contact.php">Enquire Now</a>
					</div>
				</div>
				<div class="header-nav navbar-collapse justify-content-start collapse">
					<ul class="nav navbar-nav navbar navbar-left">
						<li class="nav-item px-2 <?php if($page == "index"){echo "active";} ?>">
							<a class="nav-link font1 f-500 clr3" href="index.php">Home</a>
						</li>
						<li class="nav-item px-2 <?php if($page == "about"){echo "active";} ?>">
							<a class="nav-link font1 f-500 clr3" href="about.php">About Us</a>
						</li>
						<li class="nav-item dropdown px-2 <?php if($page == "products"){echo "active";} ?>">
							<a class="nav-link font1 f-500 clr3 dropdown-toggle" href="products.php" id="navbarDropdownMenuLink1" data-toggle="dropdown">Products</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
								<?php if(!empty($category_list)) {
									foreach($category_list as $c_list) { ?>
										<li class="dropdown-submenu">
											<a class="dropdown-item font2 dropdown-toggle" href="#"><?php if(!empty($c_list['category_name'])) { echo $obj->encode_decode('decrypt', $c_list['category_name']); } ?> </a>
											<?php $sub_category_list = array();
											$sub_category_list = $obj->getCategoryFilterList('child',$c_list['category_id']); ?>
											<ul class="dropdown-menu">
												<?php if(!empty($sub_category_list)) { ?>
													<?php foreach($sub_category_list as $sub_list) { ?>
														<li class="dropdown-submenu">
															<a class="dropdown-item font2 dropdown-toggle" href="#"><?php if(!empty($sub_list['category_name'])) { echo $obj->encode_decode('decrypt', $sub_list['category_name']); } ?></a>
															<?php $product_list = array();
															$product_list = $obj->getProductListByCategory('',$sub_list['category_id']); 
															if(!empty($product_list)) { ?>
																<ul class="dropdown-menu">
																	<?php foreach($product_list as $p_list) { ?>
																		<li><a class="dropdown-item font2" href="products.php?product_id=<?php if(!empty($p_list['product_id'])) { echo $p_list['product_id']; } ?>"><?php if(!empty($p_list['product_name'])) { echo $obj->encode_decode('decrypt', $p_list['product_name']);  } ?></a></li>
																	<?php } ?>
																</ul>
															<?php } ?>
														</li>
													<?php } ?>
												<?php } ?>
												<?php $product_list = array();
												$product_list = $obj->getProductListByCategory($c_list['category_id'],''); 
												if(!empty($product_list)) { ?>
													<?php foreach($product_list as $p_list) { ?>
														<li><a class="dropdown-item font2" href="products.php?product_id=<?php if(!empty($p_list['product_id'])) { echo $p_list['product_id']; } ?>"><?php if(!empty($p_list['product_name'])) { echo $obj->encode_decode('decrypt', $p_list['product_name']);  } ?></a></li>
													<?php } ?>
												<?php } ?>
											</ul>
										</li>
									<?php }
								} ?>
							</ul>
						</li>
						<li class="nav-item px-2 <?php if($page == "newsletter"){echo "active";} ?>">
							<a class="nav-link font1 f-500 clr3" href="newsletter.php">Newsletter</a>
						</li>
						<li class="nav-item px-2 <?php if($page == "contact"){echo "active";} ?>">
							<a class="nav-link font1 f-500 clr3" href="contact.php">Contact Us</a>
						</li>
					</ul>
				</div>
			</div>
		</div> 
	</div>
</header>
<div class="d-block d-lg-none">
	<div class="container-fluid px-lg-5 shadow">
		<nav class="navbar navbar-expand-lg navbar-light navfont m-0 p-0">
			<div class="container-fluid px-lg-0 ">
				<a href="index.php">
					<img src="images/logo.png" class="img-fluid mobile-logo" alt="RAX UNIQUE TECHNOLOGIES" title="RAX UNIQUE TECHNOLOGIES">
				</a>
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar" id="togals">
					<span class="bi bi-list text-dark"></span>
				</button>
				<div id="myNavbar" class="collapse navbar-collapse">
					<ul class="navbar-nav ml-auto text-center clr3">
						<li class="nav-item px-2">
							<a class="nav-link font1 f-500 clr3" href="index.php">Home</a>
						</li>
						<li class="nav-item px-2">
							<a class="nav-link font1 f-500 clr3" href="about.php">About Us</a>
						</li>
						<li class="nav-item dropdown px-2">
							<a class="nav-link font1 f-500 clr3 dropdown-toggle" href="products.php" id="navbarDropdownMenuLink1" data-toggle="dropdown">Products</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
								<li class="dropdown-submenu"><a class="dropdown-item font2 dropdown-toggle" href="#">a1.Category</a>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item font2" href="#">b1.sub category</a></li>
										<li><a class="dropdown-item font2" href="#">b2.sub category</a></li>
										<li><a class="dropdown-item font2" href="#">b3.sub category</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu"><a class="dropdown-item font2 dropdown-toggle" href="#">a2.Category</a>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item font2" href="#">c1.sub category</a></li>
										<li><a class="dropdown-item font2" href="#">c2.sub category</a></li>
										<li><a class="dropdown-item font2" href="#">c3.sub category</a></li>
									</ul>
								</li>
								<li><a class="dropdown-item font2" href="#">a3.Category</a></li>
								<li><a class="dropdown-item font2" href="#">a4.Category</a></li>
							</ul>
						</li>
						<li class="nav-item px-2">
							<a class="nav-link font1 f-500 clr3" href="newsletter.php">Newsletter</a>
						</li>
						<li class="nav-item px-2">
							<a class="nav-link font1 f-500 clr3" href="contact.php">Contact Us</a>
						</li>
					</ul>
				</div> 	
			</div>	
		</nav>
	</div>
</div>
<script>
	$(function(){
		$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
			if (!$(this).next().hasClass('show')) {
			$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
			}
			var $subMenu = $(this).next(".dropdown-menu");
			$subMenu.toggleClass('show');
			$(this).parent().toggleClass('show');

			$(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
			$('.dropdown-submenu .show').removeClass('show');
			$('.dropdown-submenu.show').removeClass('show'); 	
			});
			return false;
		});
	});
</script>

 

