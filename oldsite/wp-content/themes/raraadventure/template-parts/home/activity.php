<?php $args = array(
    'taxonomy' => 'pit_category',
    'orderby' => 'name',
    'order' => 'ASC',
    'parent' => 0
);
$categories = get_categories($args);
if ($categories) { ?>
    <section class="activity-section">
        <div class="container">
            <div class="section-heading text-center">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h5 class="dash-style">TRAVEL BY ACTIVITY</h5>
                        <h2>ADVENTURE & ACTIVITY</h2>
                        <p>Find our latest packages and details based on the different category and activities</p>
                    </div>
                </div>
            </div>
            <div class="activity-inner row">
                <?php foreach ($categories as $cats) {
                    $feature_one = get_field('featured_image', $cats->taxonomy . '_' . $cats->term_id); ?>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="activity-item">
                            <div class="activity-icon">
                                <a href="<?= get_category_link($cats->term_id); ?>">
                                    <?php echo get_acf_image($feature_one); ?>
                                </a>
                            </div>
                            <div class="activity-content">
                                <h4>
                                    <a href="<?= get_category_link($cats->term_id); ?>"><?= $cats->name; ?></a>
                                </h4>
                                <p><?= $cats->count; ?> Destination</p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php }
