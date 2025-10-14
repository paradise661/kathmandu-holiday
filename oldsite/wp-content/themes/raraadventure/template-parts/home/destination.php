<?php $args = array(
    'taxonomy' => 'pit_destination',
    'orderby' => 'name',
    'order' => 'ASC',
    'parent' => 0
);
$categories = get_categories($args);
if ($categories) { ?>
    <section class="package-section">
        <div class="container">
            <div class="section-heading">
                    <div class="row align-items-end">
                        <div class="col-lg-7">
                            <h5 class="dash-style">POPULAR DESTINATION</h5>
                            <h2>EXPLORE THE EXCITING DESTINATIONS</h2>
                        </div>
                        <div class="col-lg-5">
                            <div class="section-disc">
                                Kathmandu Holidays provides the wide range of tour packages to the different destinations. Get the most exciting tour packages. We are always here to assist you!!
                            </div>
                        </div>
                    </div>
                </div>
            <div class="package-inner">
                <div class="row package-slider">
					<?php foreach ($categories as $trips) {
						$feature_one = get_field('featured_image', $trips->taxonomy . '_' . $trips->term_id);
						$title_one = get_field('major_attraction', $trips->taxonomy . '_' . $trips->term_id); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="package-wrap">
                                <figure class="feature-image">
                                    <a href="<?= get_category_link($trips->ID); ?>">
										<?php echo get_acf_image($feature_one,'', 'trip-thumb'); ?>
                                    </a>
                                </figure>
                                <div class="package-content-wrap mt-3">
                                    <div class="package-content">
                                        <h3>
											<a href="<?= get_category_link($trips->term_id); ?>"><?= $trips->name; ?></a>
                                        </h3>
                                        <?= custom_length_excerpt(116, $trips->description); ?>
                                        <div class="btn-wrap text-center justify-content-center">
                                            <a href="<?= get_category_link($trips->ID); ?>" class="button-text width-6">Read More<i class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="btn-wrap text-center">
                    <a href="/destination/" class="button-primary">MORE DESTINATION</a>
                </div>
            </div>
        </div>
    </section>
<?php }

