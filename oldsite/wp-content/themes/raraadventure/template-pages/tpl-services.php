<?php
/* Template Name: Services */
get_header();
while (have_posts()) {
    the_post();
    $services = get_field('services');
    if ($services) {
        $count = 1; ?>
        <div class="service-page-section">
            <div class="container">
                <div class="row">
                    <?php foreach ($services as $srvs) {
                        $cnt = $count <= 9 ? '0' . $count : $count;
                        $grp = $srvs['group']; ?>
                        <div class="col-md-6">
                            <div class="service-content-wrap">
                                <div class="service-content">
                                    <div class="service-header">
                                        <span class="service-count">
                                            <?= $cnt; ?>.
                                        </span>
                                        <h3><?= $grp['title']; ?></h3>
                                    </div>
                                    <?= apply_filters('the_content',$grp['info']); ?>
                                </div>
                                <figure class="service-img">
                                    <?= get_acf_image($grp['image']); ?>
                                </figure>
                            </div>
                        </div>
                    <?php $count++;
                    } ?>
                </div>
            </div>
        </div>
<?php }
}
get_footer();
