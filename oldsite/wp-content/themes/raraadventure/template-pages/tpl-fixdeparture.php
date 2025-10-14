<?php
/* Template Name: Fix Departure */
get_header();
while (have_posts()) {
    the_post();
	$fixdeparture = get_field('fix_departure');
	if($fixdeparture){ 
		foreach($fixdeparture as $fix){?>
		<section class="about-section about-page-section my-5">
			<div class="about-service-wrap">
				<div class="container  border">
					<div class="contact-from-wrap pt-4 text-center">
						<div class="section-heading mb-0">
							<h3><?= $fix['top_title']; ?></h3>
							<h4><?= $fix['bottom_title']; ?></h4>
						</div>
					</div>
					<table class="download-table col-lg-12 col-md-12">
						<thead class="download-head text-center">
							<tr>
								<th>Month</th>
								<th>Dates</th>
								<th>Book Now</th>
							</tr>
						</thead>
						<tbody class="download-body text-center">
							<?php foreach($fix['departures'] as $fixed){ ?>
							<tr>
								<td><?= $fixed['month']; ?></td>
								<td><?= $fixed['dates']; ?></td>
								<td><a class="button-primary" href="/contact-us">Book Now</a></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					<div class="contact-from-wrap">
						<?= apply_filters('the_content', $fix['notice']); ?>
					</div>
				</div>
			</div>
		</section>
<?php } 
	}
}
get_footer();
