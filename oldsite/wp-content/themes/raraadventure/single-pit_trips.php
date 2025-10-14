<?php

/**
 * The template for displaying all Trips single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package adventure-inc
 */

get_header();
$gbl = get_field('global');
$itinerary_heading = get_field('itinerary_heading');
$itenerary = get_field('itinerary');
$inclusion = get_field('inclusion');
$fixdeparture = get_field('fixdeparture'); ?>
<div class="single-tour-section">
    <div class="container">
        <div class="row position-relative">
            <div class="col-lg-8" id="printcontent">
                <div class="single-tour-inner">
					<img class="d-none mb-4" src="<?= get_field('site_icon','option')['url']; ?>" alt="logo">
                    <h2><?= get_the_title();  ?></h2>
                    <figure class="feature-image">
                        <?= get_thumbnail_url_and_alt_text(get_the_ID()); ?>
                        <div class="package-meta text-center">
                            <ul>
                                <?php if (!empty($gbl['vacation_day'])) { ?>
                                    <li>
                                        <i class="far fa-clock"></i>
                                        <?= $gbl['vacation_day']; ?>
                                    </li>
                                <?php }
								if (!empty($gbl['people'])) { ?>
                                    <li>
                                        <i class="fas fa-user-friends"></i>
										Min Pax: <?= $gbl['people']; ?>
                                    </li>
                                <?php }
                                if (!empty($gbl['location'])) { ?>
                                    <li>
                                        <i class="fas fa-map-marked-alt"></i>
                                        <?= $gbl['location']; ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </figure>
                    <div class="tab-container">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">DESCRIPTION</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="program-tab" data-toggle="tab" href="#program" role="tab" aria-controls="program" aria-selected="false">Itinerary</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="gallery-tab" data-toggle="tab" href="#gallery" role="tab" aria-controls="gallery" aria-selected="false">Inclusion/Exclusion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="map-tab" data-toggle="tab" href="#map" role="tab" aria-controls="map" aria-selected="false">Fix Departure</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                <div class="overview-content">
                                    <?= apply_filters('the_content', get_the_content()); ?>
                                </div>
                            </div>
                            <div class="tab-pane" id="program" role="tabpanel" aria-labelledby="program-tab">
                                <?php if (!empty($itinerary_heading)) { ?>
                                    <div class="itinerary-content">
                                        <?= apply_filters('the_content', $itinerary_heading); ?>
                                    </div>
                                <?php }
                                if ($itenerary) {
                                    $it_count = 1; ?>
                                    <div class="itinerary-timeline-wrap">
                                        <ul>
                                            <?php foreach ($itenerary as $its) { ?>
                                                <li>
                                                    <div class="timeline-content">
                                                        <div class="day-count">Day <?= $it_count; ?></div>
                                                        <h4><?= $its['title']; ?></h4>
                                                        <?= apply_filters('the_content', $its['info']); ?>
                                                    </div>
                                                </li>
                                            <?php $it_count++;
                                            } ?>
                                        </ul>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="tab-pane" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                                <div class="overview-content">
                                    <?= apply_filters('the_content', $inclusion) ?>
                                </div>
                            </div>
                            <div class="tab-pane" id="map" role="tabpanel" aria-labelledby="map-tab">
                                <?php if(!empty($fixdeparture)){ ?>
									<table class="download-table col-lg-12 col-md-12">
										<thead class="download-head text-center">
											<tr>
												<th rowspan="3">Date</th>
												<th>Number of Pax</th>
												<th>Book Now</th>
											</tr>
										</thead>
										<tbody class="download-body text-center">
											<?php foreach($fixdeparture as $fix){
											$btn = kk_get_btn_link_title_and_target($fix['book_now']); ?>
												<tr>
													<td><?= $fix['date']; ?></td>
													<td><?= $fix['number_of_pax']; ?></td>
													<td><a class="button-primary" href="/contact-us">Book Now</a></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar position-sticky-sidebar">
					<?php if(!empty($gbl['price'])){ ?>
						<div class="package-price">
							<h5 class="price">
								<span><?= $gbl['price']; ?></span> / per person
							</h5>
							<div class="start-wrap">
								<div class="rating-start" title="Rated 5 out of 5">
									<span style="width: 100%"></span>
								</div>
							</div>
						</div>
					<?php } ?>
					<div class="widget-bg booking-form-wrap">
						<a href="javascript:printDiv('printcontent');" class="print bg-title d-block" >Print Details</a>
					</div>
                    <div class="widget-bg booking-form-wrap">
                        <h4 class="bg-title">Book This Tour</h4>
                        <?= do_shortcode('[gravityform id=2 title=false description=false ajax=true tabindex=49]') ?>
                    </div>


                    <?php $trip_offer = kk_get_taxonomy('pit_offer');
                    if ($trip_offer) { ?>
                        <div class="travel-package-content text-center" style="background-image: url(<?= home_url(); ?>/media/img11.jpg);">
                            <h5>MORE PACKAGES</h5>
                            <h3>OTHER TRAVEL PACKAGES</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus.</p>
                            <ul>
                                <?php foreach ($trip_offer as $tags) {
                                    echo '<li><a href="' . get_category_link($tags->term_id) . '"><i class="far fa-arrow-alt-circle-right"></i>' . $tags->name . '</a></li>';
                                } ?>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
