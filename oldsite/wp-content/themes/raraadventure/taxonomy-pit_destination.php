<?php

/**
 * The template for displaying taxonomy pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package raraadventure
 */

get_header();
$term_id = get_queried_object()->term_id;
$term_slug = get_queried_object()->slug;
$taxonomy = get_queried_object()->taxonomy;
$feature_image = get_field('featured_image', $taxonomy . '_' . $term_id); 

$post_args = array(
	'post_type' => 'pit_trips',
	'posts_per_page' => -1,
	'orderby' => 'date',
	'order' => 'DESC',
	'post_status' => 'publish',
	'tax_query' => array(
		array(
			'taxonomy' => $taxonomy,
			'field'    => 'slug',
			'terms'    => $term_slug,
		),
	),
);
$get_trips = new WP_Query($post_args);
if ($get_trips->have_posts()) { ?>
<div class="package-section mt-4">
	<div class="container">
		<div class="package-inner">
			<div class="row">
				<?php while ($get_trips->have_posts()) {
	$get_trips->the_post();
	get_template_part('template-parts/content', 'trips');
} ?>
			</div>
		</div>
	</div>
</div>
<?php }
get_footer();
