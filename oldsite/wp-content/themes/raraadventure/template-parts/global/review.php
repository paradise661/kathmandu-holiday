<?php $get_review = kk_get_custom_post_type(5, 'pit_reviews', 'DESC', 'date');
if ($get_review) { ?>
    <div class="testimonial-section" style="background-image: url(<?= home_url(); ?>/media/img23.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="testimonial-inner testimonial-slider">
                        <?php foreach ($get_review as $reviews) {
                            $desg = get_field('designation', $reviews->ID); ?>
                            <div class="testimonial-item text-center">
                                <figure class="testimonial-img">
                                    <?= get_thumbnail_url_and_alt_text($reviews->ID, '', 'reveiw-thumb'); ?>
                                </figure>
                                <div class="testimonial-content">
                                    <?= $reviews->post_content; ?>
                                    <cite>
                                        <?= $reviews->post_title; ?>
                                        <span class="company"><?= $desg; ?></span>
                                    </cite>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }
