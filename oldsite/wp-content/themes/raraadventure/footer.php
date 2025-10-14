<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package raraadventure
 */

?>
</main>
<footer id="colophon" class="site-footer footer-primary">
	<div class="top-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<aside class="widget widget_text">
						<h3 class="widget-title">
							About Kathmandu Holiday
						</h3>
						<div class="textwidget widget-text">
							<?= get_field('site_info', 'option') ?>
						</div>
						<div class="award-img">
							<?php the_brand_logo(); ?>
						</div>
					</aside>
				</div>
				<div class="col-lg-3 col-md-6">
					<aside class="widget widget_text">
						<h3 class="widget-title">CONTACT INFORMATION</h3>
						<div class="textwidget widget-text">
							<ul>
								<li>
									<i class="fas fa-phone-alt"></i> <?= get_field('phone', 'option'); ?>
									<?php if(!empty(get_field('phone_two', 'option'))){ ?>
										<br/>
										<i class="fas fa-phone-alt"></i> <?= get_field('phone_two', 'option'); ?>
									<?php } if(!empty(get_field('telephone', 'option'))){ ?>
										<br/>
										<i class="fas fa-phone-alt"></i> <?= get_field('telephone', 'option'); ?>
									<?php } ?>
								</li>
								<li>
									<a href="mailto:<?= get_field('email', 'option'); ?>">
										<i class="fas fa-envelope"></i><span><?= get_field('email', 'option'); ?></span>
									</a>
									
									<?php if(!empty(get_field('email_two', 'option'))){ ?>
										<a href="mailto:<?= get_field('email_two', 'option'); ?>">
											<i class="fas fa-envelope"></i><span><?= get_field('email_two', 'option'); ?></span>
										</a>
									<?php } ?>
								</li>
								<li>
									<i class="fas fa-map-marker-alt"></i> <?= get_field('location', 'option') ?>
								</li>								
								<?php if(!empty(get_field('location_india', 'option'))){ ?>
									<li>
										<i class="fas fa-map-marker-alt"></i> <?= get_field('location_india', 'option') ?>
									</li>
								<?php } if(!empty(get_field('phone_india', 'option'))){ ?>
									<li>
										<i class="fas fa-phone-alt"></i> <?= get_field('phone_india', 'option'); ?>
									</li>
								<?php } if(!empty(get_field('email_india', 'option'))){ ?>
									<li>
										<a href="mailto:<?= get_field('email_india', 'option'); ?>">
											<i class="fas fa-envelope"></i><span><?= get_field('email_india', 'option'); ?></span>
										</a>
									</li>
								<?php } ?>
								<?php if(!empty(get_field('location_india_two', 'option'))){ ?>
									<li>
										<i class="fas fa-map-marker-alt"></i> <?= get_field('location_india_two', 'option') ?>
									</li>
								<?php } if(!empty(get_field('phone_india_two', 'option'))){ ?>
									<li>
										<i class="fas fa-phone-alt"></i> <?= get_field('phone_india_two', 'option'); ?>
									</li>
								<?php } if(!empty(get_field('email_india_two', 'option'))){ ?>
									<li>
										<a href="mailto:<?= get_field('email_india_two', 'option'); ?>">
											<i class="fas fa-envelope"></i><span><?= get_field('email_india_two', 'option'); ?></span>
										</a>
									</li>
								<?php } ?>
								<li>
									<i class="fas fa-globe"></i> <?= $_SERVER['SERVER_NAME']; ?>
								</li>
							</ul>
						</div>
						<?php $social_links = array(
							array(get_field('facebook', 'option'), 'facebook-f'),
							array(get_field('twitter', 'option'), 'twitter'),
							array(get_field('instagram', 'option'), 'instagram'),
							array(get_field('linkedin', 'option'), 'linkedin'),
						) ?>
						<div class="contct-social social-links">
							<ul>
								<?php for ($i = 0; $i < count($social_links); $i++) {
									if (!empty($social_links[$i][0])) {
										echo '<li><a href="' . $social_links[$i][0] . '" target="_blank"><i class="fab fa-' . $social_links[$i][1] . '"></i></a></li>';
									}
								} ?>
							</ul>
						</div>
					</aside>
				</div>
				<?php $get_blog = kk_get_custom_post_type(2, 'post', 'DESC', 'date');
				if ($get_blog) { ?>
					<div class="col-lg-3 col-md-6">
						<aside class="widget widget_recent_post">
							<h3 class="widget-title">Latest Post</h3>
							<ul>
								<?php foreach ($get_blog as $blogs) { ?>
									<li>
										<h5>
											<a href="<?= get_permalink($blogs->ID); ?>"><?= $blogs->post_title; ?></a>
										</h5>
										<div class="entry-meta">
											<span class="post-on">
												<a href="<?= get_permalink($blogs->ID); ?>"><?= get_the_date('F d, Y', $blogs->ID); ?></a>
											</span>
										</div>
									</li>
								<?php } ?>
							</ul>
						</aside>
					</div>
				<?php } ?>
				<div class="col-lg-3 col-md-6">
					<aside class="widget widget_newslatter">
						<h3 class="widget-title">SUBSCRIBE US</h3>
						<div class="widget-text">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit.
						</div>
						<form class="newslatter-form">
							<input type="email" placeholder="Your Email..">
							<input type="submit" value="SUBSCRIBE NOW">
						</form>
					</aside>
				</div>
			</div>
		</div>
	</div>
	<div class="buttom-footer">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-4">
					<div class="footer-menu">
						<?php wp_nav_menu(array(
							'theme_location'  => 'nav-footer',
							'depth'	          => 1, // 1 = no dropdowns, 2 = with dropdowns.
							'container'       => 'ul',
							'container_class' => '',
							'container_id'    => 'nav-footer',
							'menu_class'      => '',
						));
						?>
					</div>
				</div>
				<div class="col-md-2 text-center">
					<div class="footer-logo">
						<a href="https://paradiseinfo.tech/" target="_blank"><img src="https://paradiseinfo.tech/wp-content/uploads/weblogo.png" alt="Paradise InfoTech"></a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="copy-right text-right">© <?= date('Y'); ?> Kathmandu Holiday Tours and Travels Pvt. Ltd.. All rights reserved.</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<a id="backTotop" href="#" class="to-top-icon">
	<i class="fas fa-chevron-up"></i>
</a>
</div>
<?php if(is_singular('pit_trips')){ ?>
<textarea id="printing-css" style="display:none;">html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}body{font:normal normal .8125em/1.4 Arial,Sans-Serif;background-color:white;color:#333}strong,b{font-weight:bold}cite,em,i{font-style:italic}a{text-decoration:none}a:hover{text-decoration:underline}a img{border:none}abbr,acronym{border-bottom:1px dotted;cursor:help}sup,sub{vertical-align:baseline;position:relative;top:-.4em;font-size:86%}sub{top:.4em}small{font-size:86%}kbd{font-size:80%;border:1px solid #999;padding:2px 5px;border-bottom-width:2px;border-radius:3px}mark{background-color:#ffce00;color:black}p,blockquote,pre,table,figure,hr,form,ol,ul,dl{margin:1.5em 0}hr{height:1px;border:none;background-color:#666}h1,h2,h3,h4,h5,h6{font-weight:bold;line-height:normal;margin:1.5em 0 0}h1{font-size:200%}h2{font-size:180%}h3{font-size:160%}h4{font-size:140%}h5{font-size:120%}h6{font-size:100%}ol,ul,dl{margin-left:3em}ol{list-style:decimal outside}ul{list-style:disc outside}li{margin:.5em 0}dt{font-weight:bold}dd{margin:0 0 .5em 2em}input,button,select,textarea{font:inherit;font-size:100%;line-height:normal;vertical-align:baseline}textarea{display:block;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}pre,code{font-family:"Courier New",Courier,Monospace;color:inherit}pre{white-space:pre;word-wrap:normal;overflow:auto}blockquote{margin-left:2em;margin-right:2em;border-left:4px solid #ccc;padding-left:1em;font-style:italic}table[border="1"] th,table[border="1"] td,table[border="1"] caption{border:1px solid;padding:.5em 1em;text-align:left;vertical-align:top}th{font-weight:bold}table[border="1"] caption{border:none;font-style:italic}.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">
	function printDiv(elementId) {
		var a = document.getElementById('printing-css').value;
		var b = document.getElementById(elementId).innerHTML;
		window.frames["print_frame"].document.title = document.title;
		window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
		window.frames["print_frame"].window.focus();
		window.frames["print_frame"].window.print();
	}
</script>

<?php } wp_footer(); ?>

</body>

</html>