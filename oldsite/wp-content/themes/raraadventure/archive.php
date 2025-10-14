<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package raraadventure
 */

get_header();
?>
<div class="archive-section blog-archive">
	<div class="archive-inner">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 primary right-sidebar">
					<div class="grid row">
						<?php if (have_posts()) :
							while (have_posts()) :
								the_post();
								get_template_part('template-parts/content', get_post_type());
							endwhile;
						else :
							get_template_part('template-parts/content', 'none');
						endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
