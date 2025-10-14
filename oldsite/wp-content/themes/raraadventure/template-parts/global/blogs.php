<?php $get_blog = kk_get_custom_post_type(3, 'post', 'DESC', 'date');
if ($get_blog) { ?>
    <section class="blog-section pt-0">
        <div class="container">
            <div class="section-heading text-center">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h5 class="dash-style">FROM OUR BLOG</h5>
                        <h2>OUR RECENT POSTS</h2>
                        <p>Read our important updates and get updated with all the travel stuffs that you need for your vacation.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($get_blog as $blogs) { ?>
                    <div class="col-md-6 col-lg-4">
                        <article class="post">
                            <figure class="feature-image">
                                <a href="<?= get_permalink($blogs->ID); ?>">
                                    <?= get_thumbnail_url_and_alt_text($blogs->ID, '', 'blog-thumb'); ?>
                                </a>
                            </figure>
                            <div class="entry-content">
                                <h3>
                                    <a href="<?= get_permalink($blogs->ID); ?>"><?= custom_length_excerpt(41, $blogs->post_title); ?></a>
                                </h3>
                                <div class="entry-meta">
                                    <span class="posted-on">
                                        <a href="<?= get_permalink($blogs->ID); ?>"><?= get_the_date('F d, Y', $blogs->ID); ?></a>
                                    </span>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php }
