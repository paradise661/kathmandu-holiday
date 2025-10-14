<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package raraadventure
 */

get_header();
?>

<div class="no-content-section 404-page" style="background-image: url(<?= home_url(); ?>/media/404-img.jpg);">
	<div class="container">
		<div class="no-content-wrap">
			<span>404</span>
			<h1>Oops! That page can't be found</h1>
			<h4>It looks like nothing was found at this location. Maybe try one of the links below or a search?</h4>
			<div class="search-form-wrap">
				<form class="search-form">
					<input type="text" name="search" placeholder="Search...">
					<button class="search-btn"><i class="fas fa-search"></i></button>
				</form>
			</div>
		</div>
	</div>
	<div class="overlay"></div>
</div>

<?php
get_footer();
