<?php $get_trips = kk_get_custom_post_type(-1, 'pit_trips', 'DESC', 'date', '', '', 'kailash-tours', 'pit_category');
if ($get_trips) { ?>
    <section class="package-section">
        <div class="container">
            <div class="section-heading text-center">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h5 class="dash-style">EXPLORE GREAT PLACES</h5>
                        <h2>Kailash-Mansarovar Tour</h2>
                        <p>Kailash Manasarovar Yatra (KMY) is known for its religious value and cultural significance. It is undertaken by hundreds of people every year.</p>
                    </div>
                </div>
            </div>
            <div class="package-inner">
                <div class="row package-slider">
                    <?php foreach ($get_trips as $trips) {
                        $glb = get_field('global', $trips->ID); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="package-wrap">
                                <figure class="feature-image">
                                    <a href="<?= get_the_permalink($trips->ID); ?>">
                                        <?= get_thumbnail_url_and_alt_text($trips->ID, '', 'trip-thumb'); ?>
                                    </a>
                                </figure>
								<?php if(!empty($glb['price'])){ ?>
									<div class="package-price">
									 <h6>										 
										<span><?= $glb['price']; ?> </span> / per person
									 </h6>
								  </div>
								<?php } ?>
                                <div class="package-content-wrap">
                                    <?php if (!empty($glb['vacation_day']) || !empty($glb['location'])|| !empty($glb['people'])) { ?>
                                        <div class="package-meta text-center">
                                            <ul>
                                                <?php if (!empty($glb['vacation_day'])) { ?>
                                                    <li>
                                                        <i class="far fa-clock"></i>
                                                        <?= $glb['vacation_day']; ?>
                                                    </li>
                                                <?php } if (!empty($glb['people'])) { ?>
													<li>
														<i class="fas fa-user-friends"></i>
														Min Pax: <?= $glb['people']; ?>
													</li>
                                                <?php } if (!empty($glb['location'])) { ?>
                                                    <li>
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        <?= $glb['location']; ?>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                    <div class="package-content">
                                        <h3>
                                            <a href="<?= get_the_permalink($trips->ID); ?>"><?= get_the_title($trips->ID); ?></a>
                                        </h3>
                                        <div class="review-area">
											<?php if(!empty($glb['review'])){ ?>
												<span class="review-text">(<?= $glb['review']; ?> reviews)</span>
											<?php } ?>
                                            <div class="rating-start" title="Rated 5 out of 5">
                                                <span style="width: 100%"></span>
                                            </div>
                                        </div>
                                        <?= custom_length_excerpt(116, $trips->post_content); ?>
                                        <div class="btn-wrap text-center justify-content-center">
                                            <a href="<?= get_the_permalink($trips->ID); ?>" class="button-text width-6">Read More<i class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="btn-wrap text-center">
                    <a href="/trips/" class="button-primary">VIEW ALL PACKAGES</a>
                </div>
            </div>
        </div>
    </section>
<?php }
