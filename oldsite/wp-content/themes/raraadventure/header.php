<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package raraadventure
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- google fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="full-page">
		<header id="masthead" class="site-header header-primary">
			<!-- header html start -->
			<div class="top-header">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 d-none d-lg-block">
							<div class="header-contact-info">
								<ul>
									<li>
										<a href="#"><i class="fas fa-phone-alt"></i> <?= get_field('phone','option'); ?></a>
									</li>
									<li>
										<a href="mailto:<?= get_field('email','option'); ?>"><i class="fas fa-envelope"></i><?= get_field('email','option'); ?></a>
									</li>
									<li>
										<i class="fas fa-map-marker-alt"></i> <?= get_field('location','option'); ?>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-4 d-flex justify-content-lg-end justify-content-center">
							<div class="header-social social-links">
								<ul>
									<li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="bottom-header">
				<div class="container d-flex justify-content-between align-items-center">
					<div class="site-identity">
						<p class="site-title">
							<a href="/">
								<img class="white-logo" src="<?= get_field('white_site_icon','option')['url']; ?>" alt="logo">
							   <img class="black-logo" src="<?= get_field('site_icon','option')['url']; ?>" alt="logo">
							</a>
						</p>
					</div>
					<div class="main-navigation d-none d-lg-block">
						<nav id="navigation" class="navigation">
							<?php wp_nav_menu(array(
								'theme_location'  => 'nav-pri',
								'depth'	          => 3, // 1 = no dropdowns, 2 = with dropdowns.
								'container'       => 'ul',
								'container_class' => '',
								'container_id'    => 'responsive-menu',
								'menu_class'      => '',
								'menu_id'         => 'responsive-menu',
								'walker'         => new WP_Bootstrap_NavWalker(),
								'fallback_cb'    => 'Bootstrap_NavWalker::fallback',
							));
							?>
						</nav>
					</div>
					<div class="header-btn">
						<a href="/kailash-fixed-departure/" class="button-primary">Kailash Departures</a>
					</div>
				</div>
			</div>
			<div class="mobile-menu-container"></div>
		</header>
		<main id="content" class="site-main">
			<?php if (is_front_page()) {
				$front_banner = get_field('banner');
				if ($front_banner) { ?>
					<section class="home-slider-section mb-5">
						<div class="home-slider">
							<?php foreach ($front_banner as $banns) { ?>
								<div class="home-banner-items">
									<div class="banner-inner-wrap" style="background-image: url(<?= esc_url($banns['image']['url']); ?>);"></div>
									<div class="banner-content-wrap">
										<div class="container">
											<?php if(!empty($banns['info'])){ ?>
												<div class="banner-content text-center">
													<?= apply_filters('the_content', $banns['info']); ?>
												</div>
											<?php } if(!empty($banns['button'])){ ?>
												<div class="text-center">
													<a href="<?= get_permalink($banns['button']); ?>" class="button-primary">VIEW PACKAGE</a>
												</div>
											<?php } ?>
										</div>
									</div>
									<div class="overlay"></div>
								</div>
							<?php } ?>
						</div>
					</section>
				<?php }
			} else {
				if (!is_404()) {
					$get_banner_obj = new GetBannerDetails;
					$banner = $get_banner_obj->get_banner_title_and_image(home_url('/media/home-page-banner-min.jpeg')); ?>
					<section class="inner-banner-wrap">
						<div class="inner-baner-container" style="background-image: url('<?= esc_url($banner['ban_image_url']); ?>');">
							<div class="container">
								<div class="inner-banner-content">
									<h1 class="inner-title"><?= $banner['banner_title']; ?></h1>
								</div>
							</div>
						</div>
						<div class="inner-shape"></div>
					</section>
			<?php }
			}
