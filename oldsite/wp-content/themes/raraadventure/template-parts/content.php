<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package raraadventure
 */
if (is_single()) { ?>
	<figure class="feature-image">
		<?= get_thumbnail_url_and_alt_text(get_the_ID()); ?>
	</figure>
	<article class="single-content-wrap">
		<h3><?= get_the_title(); ?></h3>
		<?= get_the_content(); ?>
	</article>
<?php } else { ?>
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
<?php }
