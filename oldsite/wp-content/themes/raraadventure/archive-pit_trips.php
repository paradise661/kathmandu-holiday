<?php

/**
 * The template for displaying Trips archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package raraadventure
 */

get_header();
?>
<div class="package-section">
    <div class="container">
        <div class="package-inner">
            <div class="row">
                <?php if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/content', 'trips');
                    endwhile;
                else :
                    get_template_part('template-parts/content', 'none');
                endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
