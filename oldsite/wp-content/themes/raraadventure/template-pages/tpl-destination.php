<?php
/* Template Name: Destination */
get_header();
while (have_posts()) {
    the_post();
    $args = array(
        'taxonomy' => 'pit_destination',
        'orderby' => 'name',
        'order' => 'ASC',
        'parent' => 0
    );
    $categories = get_categories($args);
    if ($categories) { ?>
        <section class="destination-section destination-page">
            <div class="container">
                <div class="destination-inner destination-three-column">
                    <div class="row">
                        <?php foreach ($categories as $single_cat) {
                            $titles = get_field('major_attraction', $single_cat->taxonomy . '_' . $single_cat->term_id);
                            $feature_image = get_field('featured_image', $single_cat->taxonomy . '_' . $single_cat->term_id); ?>
                            <div class="col-md-4">
                                <div class="desti-item overlay-desti-item">
                                    <figure class="desti-image">
                                        <?php echo get_acf_image($feature_image, '', 'trip-thumb'); ?>
                                    </figure>
                                    <div class="meta-cat bg-meta-cat">
                                        <a href="<?= get_category_link($single_cat->term_id); ?>"><?= $single_cat->name; ?>
                                        </a>
                                    </div>
                                    <div class="desti-content">
                                        <h3>
                                            <a href="<?= get_category_link($single_cat->term_id); ?>"><?= $titles; ?></a>
                                        </h3>
                                        <div class="rating-start" title="Rated 5 out of 5">
                                            <span style="width: 100%"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
<?php }
}
get_footer();
