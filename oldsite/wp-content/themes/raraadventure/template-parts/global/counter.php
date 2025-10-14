 <?php $counter_img = get_field('counter_bg_image', 'option');
    $counter_info = get_field('counter_info', 'option');
    $counters = get_field('counters', 'option'); ?>
 <div class="fullwidth-callback" style="background-image: url(<?= esc_url($counter_img['url']); ?>);">
     <div class="container">
         <?php if (!empty($counter_info)) { ?>
             <div class="section-heading section-heading-white text-center">
                 <div class="row">
                     <div class="col-lg-8 offset-lg-2">
                         <?= apply_filters('the_content', $counter_info); ?>
                     </div>
                 </div>
             </div>
         <?php }
            if ($counters) { ?>
             <div class="callback-counter-wrap">
                 <?php foreach ($counters as $count) { ?>
                     <div class="counter-item">
                         <div class="counter-item-inner">
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
                     </div>
                 <?php } ?>
             </div>
         <?php } ?>
     </div>
 </div>