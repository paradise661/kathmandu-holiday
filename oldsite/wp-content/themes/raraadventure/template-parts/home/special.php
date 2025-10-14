<?php $get_trips = kk_get_custom_post_type(3, 'pit_trips', 'DESC', 'date', '', '', 'kailash-tours', 'pit_trips');
if ($get_trips) { ?>
    <section class="special-section">
        <div class="container">
            <div class="section-heading text-center">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h5 class="dash-style">TRAVEL OFFER & DISCOUNT</h5>
                        <h2>SPECIAL TRAVEL OFFER</h2>
                        <p>Mollit voluptatem perspiciatis convallis elementum corporis quo veritatis aliquid blandit, blandit torquent, odit placeat. Adipiscing repudiandae eius cursus? Nostrum magnis maxime curae placeat.</p>
                    </div>
                </div>
            </div>
            <div class="special-inner">
                <div class="row">
                    <?php foreach ($get_trips as $trip) {
                        $term = get_the_terms($trip->ID, 'pit_destination'); ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="special-item">
                                <figure class="special-img">
                                    <?= get_thumbnail_url_and_alt_text($trip->ID, '', 'special-thumb'); ?>
                                </figure>
                                <div class="special-content">
                                    <?php if ($term) { ?>
                                        <div class="meta-cat">
                                            <?php foreach ($term as $terms) { ?>
                                                <a href="<?= get_term_link($terms->term_id); ?>"><?= $terms->name; ?></a>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                    <h3>
                                        <a href="<?= get_permalink($trip->ID); ?>"><?= $trip->post_title; ?></a>
                                    </h3>
                                    <div class="package-price">
                                        <a href="<?= get_permalink($trip->ID); ?>">Read More</a>
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
