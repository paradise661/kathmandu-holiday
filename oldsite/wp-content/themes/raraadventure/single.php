<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package raraadventure
 */

get_header();
?>
<div class="single-post-section">
	<div class="single-post-inner">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 primary right-sidebar">
					<?php while (have_posts()) :
						the_post();
						get_template_part('template-parts/content', get_post_type());
					endwhile;
					the_post_navigation();
					$get_tags = kk_get_taxonomy('post_tag');
					if ($get_tags) { ?>
						<div class="meta-wrap">
							<div class="tag-links">
								<?php foreach ($get_tags as $tags) {
									echo '<a href="' . get_category_link($tags->term_id) . '">' . $tags->name . '</a>';
								} ?>
							</div>
						</div>
					<?php } ?>
					<div class="post-socail-wrap">
						<div class="social-icon-wrap">
							<div class="social-icon social-facebook">
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?= get_the_title(); ?>">
									<i class="fab fa-facebook-f"></i>
									<span>Facebook</span>
								</a>
							</div>
							<div class="social-icon social-google">
								<a href="mailto:http://raraadventure.loc/trips/sdhbdsb/?">
									<i class="fab fa-google-plus-g"></i>
									<span>Google</span>
								</a>
							</div>
							<div class="social-icon social-pinterest">
								<a href="https://pinterest.com/pin/create/button/?url=&media=<?= get_the_title(); ?>&description=">
									<i class="fab fa-pinterest"></i>
									<span>Pinterest</span>
								</a>
							</div>
							<div class="social-icon social-linkedin">
								<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= get_the_title(); ?>&title=&summary=&source=">
									<i class="fab fa-linkedin"></i>
									<span>Linkedin</span>
								</a>
							</div>
							<div class="social-icon social-twitter">
								<a href="https://twitter.com/intent/tweet?text=<?= get_the_title(); ?>">
									<i class="fab fa-twitter"></i>
									<span>Twitter</span>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 secondary">
					<div class="sidebar">
						<?php $get_blogs = kk_get_custom_post_type(5, 'post', 'DESC', 'date');
						if ($get_blogs) { ?>
							<aside class="widget widget_latest_post widget-post-thumb">
								<h3 class="widget-title">Recent Post</h3>
								<ul>
									<?php foreach ($get_blogs as $blogs) { ?>
										<li>
											<figure class="post-thumb">
												<a href="<?= get_permalink($blogs->ID); ?>">
													<?= get_thumbnail_url_and_alt_text($blogs->ID, '', 'single-thumb'); ?>
												</a>
											</figure>
											<div class="post-content">
												<h5>
													<a href="<?= get_permalink($blogs->ID); ?>"><?= $blogs->post_title; ?></a>
												</h5>
												<div class="entry-meta">
													<span class="posted-on">
														<a href="<?= get_permalink($blogs->ID); ?>"><?= get_the_date('F d, Y', $blogs->ID); ?></a>
													</span>
												</div>
											</div>
										</li>
									<?php } ?>
								</ul>
							</aside>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
