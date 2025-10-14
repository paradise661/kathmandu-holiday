<?php $gallery = get_field('partners', 'option');
if ($gallery) { ?>
    <div class="client-section">
        <div class="container">
            <div class="client-wrap client-slider">
                <?php foreach ($gallery as $galls) { ?>
                    <div class="client-item">
                        <figure>
                            <?= get_acf_image($galls); ?>
                        </figure>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php }
