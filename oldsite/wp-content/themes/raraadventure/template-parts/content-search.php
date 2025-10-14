<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package raraadventure
 */

?>
<div class="grid-item col-md-4">
	<article class="post">
		<figure class="feature-image">
			<a href="<?= get_the_permalink(); ?>">
				<?= get_thumbnail_url_and_alt_text(get_the_ID(), '', 'blog-thumb'); ?>
			</a>
		</figure>
		<div class="entry-content">
			<h3>
				<a href="<?= get_the_permalink(); ?>"><?= get_the_title(); ?></a>
			</h3>
			<div class="entry-meta">
				<span class="posted-on">
					<a href="<?= get_the_permalink(); ?>"><?= get_the_date('F d, Y'); ?></a>
				</span>
			</div>
			<?= custom_length_excerpt(155, get_the_content()); ?>
			<a href="<?= get_the_permalink(); ?>" class="button-text">CONTINUE READING..</a>
		</div>
	</article>
</div>