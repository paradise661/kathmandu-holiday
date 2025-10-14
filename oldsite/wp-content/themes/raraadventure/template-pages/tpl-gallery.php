<?php
/* Template Name: Gallery */
get_header();
while (have_posts()) {
    the_post();
    $gallery = get_field('gallery');
    if (!empty($gallery)) { ?>
        <div class="gallery-section">
            <div class="container">
                <div class="gallery-outer-wrap">
                    <div class="gallery-inner-wrap gallery-container grid">
                        <?php foreach ($gallery as $galls) { ?>
                            <div class="single-gallery grid-item">
                                <figure class="gallery-img">
                                    <img src="<?= esc_url($galls['url']); ?>" alt="<?= esc_html($galls['alt']); ?>">
                                    <div class="gallery-title">
                                        <h3>
                                            <a href="<?= esc_url($galls['url']) ?>" data-lightbox="lightbox-set">
                                                <?= esc_html($galls['alt']) ?: get_the_title(); ?>
                                            </a>
                                        </h3>
                                    </div>
                                </figure>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
<?php }
}
get_footer();
