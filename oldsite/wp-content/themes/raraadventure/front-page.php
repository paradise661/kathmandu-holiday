<?php

/**
 * Template Name: Homepage
 *
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rara Adventure
 */

get_header();
while (have_posts()) {
    the_post();
    get_template_part('template-parts/home/popular', 'package');
    get_template_part('template-parts/home/kailash', '');
    get_template_part('template-parts/home/destination', '');
    get_template_part('template-parts/home/callback', '');
    get_template_part('template-parts/home/activity', '');
    get_template_part('template-parts/home/trekking', '');
    //get_template_part('template-parts/global/partners', '');
    //get_template_part('template-parts/home/special', '');
    get_template_part('template-parts/global/blogs', '');
    get_template_part('template-parts/global/review', ''); ?>
<?php }
get_footer();
