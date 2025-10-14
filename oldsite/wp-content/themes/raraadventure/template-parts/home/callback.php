<?php $counter_img = get_field('counter_image', 'option');
$counter_video = get_field('counter_video', 'option');
$counter_info = get_field('counter_info', 'option');
$counters = get_field('counters', 'option'); ?>
<section class="callback-section">
    <div class="container">
        <div class="row no-gutters align-items-center">
            <div class="col-lg-5">
                <div class="callback-img" style="background-image: url(<?= esc_url($counter_img['url']); ?>);">
                    <?php if (!empty($counter_video)) { ?>
                        <div class="video-button">
                            <a id="video-container" data-video-id="<?= $counter_video; ?>">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="callback-inner">
                    <?php if (!empty($counter_info)) { ?>
                        <div class="section-heading section-heading-white">
                            <?= apply_filters('the_content', $counter_info); ?>
                        </div>
                    <?php }
                    if ($counters) { ?>
                        <div class="callback-counter-wrap">
                            <?php foreach ($counters as $count) { ?>
                                <div class="counter-item">
                                    <div class="counter-icon">
                                        <?= get_acf_image($count['icon']); ?>
                                    </div>
                                    <div class="counter-content">
                                        <span class="counter-no">
                                            <span class="counter"><?= preg_replace('/\D/', '', $count['count']); ?></span><?= preg_replace('/[0-9]+/', '', $count['count']); ?>
                                        </span>
                                        <span class="counter-text">
                                            <?= $count['designation']; ?>
                                        </span>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <div class="support-area">
                        <div class="support-icon">
                            <img src="<?= home_url(); ?>/media/icon5.png" alt="">
                        </div>
                        <div class="support-content">
                            <h4>Our 24/7 Emergency Phone Services</h4>
                            <h3>
                                <a href="tel:1234567890">Call: +977 985 103 6440</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>