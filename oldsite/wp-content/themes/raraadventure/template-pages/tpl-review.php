<?php
/* Template Name: Review */
get_header();
while (have_posts()) {
    the_post();
    $get_review = kk_get_custom_post_type(-1, 'pit_reviews', 'DESC', 'date');
    if ($get_review) { ?>
        <div class="testimonial-page-section">
            <div class="container">
                <div class="row">
                    <?php foreach ($get_review as $reviews) {
                        $desg = get_field('designation', $reviews->ID); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="testimonial-item text-center">
                                <figure class="testimonial-img">
                                    <?= get_thumbnail_url_and_alt_text($reviews->ID, '', 'reveiw-thumb'); ?>
                                </figure>
                                <div class="testimonial-content">
                                    <?= $reviews->post_content; ?>
                                    <div class="start-wrap">
                                        <div class="rating-start" title="Rated 5 out of 5">
                                            <span style="width: 100%"></span>
                                        </div>
                                    </div>
                                    <h3><?= $reviews->post_title; ?></h3>
                                    <span><?= $desg; ?></span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
<?php }
}
get_footer();
