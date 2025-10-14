<?php $glb = get_field('global', get_the_ID()); ?>
<div class="col-lg-4 col-md-6">
	<div class="package-wrap">
		<figure class="feature-image">
			<a href="<?= get_the_permalink(get_the_ID()); ?>">
				<?= get_thumbnail_url_and_alt_text(get_the_ID(), '', 'trip-thumb'); ?>
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
					<a href="<?= get_the_permalink(get_the_ID()); ?>"><?= get_the_title(get_the_ID()); ?></a>
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
					<a href="<?= get_the_permalink(get_the_ID()); ?>" class="button-text width-6">Learn More<i class="fas fa-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>