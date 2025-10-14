<?php
/* Template Name: Contacts */
get_header();
while (have_posts()) {
    the_post(); ?>
    <div class="contact-page-section">
        <div class="contact-form-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-from-wrap">
                            <div class="section-heading">
                                <h5 class="dash-style">GET IN TOUCH</h5>
                                <h2>CONTACT US TO GET MORE INFO</h2>
                            </div>
                            <?= do_shortcode('[gravityform id=1 title=false description=false ajax=true tabindex=49]') ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-detail-wrap">
                            <h3>Need help ?? Feel free to contact us !</h3>
							<?= get_the_content(); ?>
                            <div class="details-list">
                                <ul>
                                    <li>
                                        <span class="icon">
                                            <i class="fas fa-map-signs"></i>
                                        </span>
                                        <div class="details-content">
                                            <h4>Location Address</h4>
                                            <span><?= get_field('location', 'option'); ?></span>
											<br>
											<span><?= get_field('location_india', 'option'); ?></span>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="icon">
                                            <i class="fas fa-envelope-open-text"></i>
                                        </span>
                                        <div class="details-content">
                                            <h4>Email Address</h4>
                                            <span><a href="<?= esc_url(get_field('email', 'option')); ?>"><?= get_field('email', 'option'); ?></a></span>
											<br>
											<span><a href="<?= esc_url(get_field('email_two', 'option')); ?>"><?= get_field('email_two', 'option'); ?></a></span>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="icon">
                                            <i class="fas fa-phone-volume"></i>
                                        </span>
                                        <div class="details-content">
                                            <h4>Phone Number</h4>
                                            <span><?= get_field('phone', 'option'); ?></span>
											<br>
											<span><?= get_field('phone_two', 'option'); ?></span>
											<br>
											<span><?= get_field('telephone', 'option'); ?></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <?php $social_links = array(
                                array(get_field('facebook', 'option'), 'facebook-f'),
                                array(get_field('twitter', 'option'), 'twitter'),
                                array(get_field('instagram', 'option'), 'instagram'),
                                array(get_field('linkedin', 'option'), 'linkedin'),
                            ) ?>
                            <div class="contct-social social-links">
                                <h3>Follow us on social media..</h3>
                                <ul>
                                    <?php for ($i = 0; $i < count($social_links); $i++) {
                                        if (!empty($social_links[$i][0])) {
                                            echo '<li><a href="' . $social_links[$i][0] . '" target="_blank"><i class="fab fa-' . $social_links[$i][1] . '"></i></a></li>';
                                        }
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (get_field('google_map', 'option')) { ?>
            <div class="map-section">
                <iframe src="<?= esc_url(get_field('google_map', 'option')); ?>" height="400" allowfullscreen="" loading="lazy"></iframe>
            </div>
        <?php } ?>
    </div>
<?php }
get_footer();
