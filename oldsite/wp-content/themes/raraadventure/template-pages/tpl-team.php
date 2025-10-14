<?php
/* Template Name: Teams */
get_header();
while (have_posts()) {
    the_post();
    $get_team = kk_get_custom_post_type(-1, 'pit_teams', 'DESC', 'date');
    if ($get_team) { ?>
        <div class="guide-page-section">
            <div class="container">
                <div class="row">
                    <?php foreach ($get_team as $teams) {
                        $desg = get_field('designation', $teams->ID);
                        $facebook = get_field('facebook', $teams->ID);
                        $twitter = get_field('twitter', $teams->ID);
                        $youtube = get_field('youtube', $teams->ID);
                        $instagram = get_field('instagram', $teams->ID);
                        $linkedin = get_field('linkedin', $teams->ID); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="guide-content-wrap text-center">
                                <figure class="guide-image">
                                    <?= get_thumbnail_url_and_alt_text($teams->ID, '', 'team-thumb'); ?>
                                </figure>
                                <div class="guide-content">
                                    <h3><?= $teams->post_title; ?></h3>
                                    <h5><?= $desg; ?></h5>
                                    <?= $teams->post_content; ?>
                                    <div class="guide-social social-links">
                                        <ul>
                                            <li><a href="<?= $facebook; ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                            <li><a href="<?= $twitter; ?>"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="<?= $youtube; ?>"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                                            <li><a href="<?= $instagram; ?>"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                            <li><a href="<?= $linkedin; ?>"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
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
