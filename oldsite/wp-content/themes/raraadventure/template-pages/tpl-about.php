<?php
/* Template Name: About Us */
get_header();
while (have_posts()) {
    the_post(); ?>
    <section class="about-section about-page-section">
        <div class="about-service-wrap">
            <div class="container">
                <div class="section-heading">
                    <div class="row align-items-end">
                        <div class="col-md-12">
                            <h5 class="dash-style">ABOUT US</h5>
							<?= apply_filters('the_content', get_the_content()); ?>
                        </div>
                    </div>
                </div>
                <div class="about-service-container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="about-service">
                                <div class="about-service-icon">
                                    <img src="<?= home_url(); ?>/media/icon15.png" alt="">
                                </div>
                                <div class="about-service-content">
                                    <h4>Air Tickets</h4>
                                    <p>We offer discounted air fares and promotional fares.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="about-service">
                                <div class="about-service-icon">
                                    <img src="<?= home_url(); ?>/media/icon16.png" alt="">
                                </div>
                                <div class="about-service-content">
                                    <h4>Hotel Booking</h4>
                                    <p>We have an extensive network of hotels across the globe.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="about-service">
                                <div class="about-service-icon">
                                    <img src="<?= home_url(); ?>/media/icon17.png" alt="">
                                </div>
                                <div class="about-service-content">
                                    <h4>Holidays</h4>
                                    <p>We are well aware what a holiday means to you.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php get_template_part('template-parts/global/partners', '');
        get_template_part('template-parts/global/counter', ''); ?>
    </section>
<?php }
get_footer();
