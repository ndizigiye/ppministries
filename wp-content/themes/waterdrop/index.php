<?php get_header(); ?>
<body>
	<!-- FACEBOOK LIKE --> 
	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id))
				return;
			js = d.createElement(s);
			js.id = id;
			js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<!-- FACEBOOK LIKE -->
	<div id="wrapper">
		<div id="header">
			<div id="logo">
				<h1>
					<a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?> </a>
				</h1>
				<p></p>
			</div>
		</div>
		<!-- end #header -->
		<div id="menu">
				<?php wp_nav_menu(array('theme_location' => 'main_nav', 'container' => '')); ?>
		</div>
		<?php if( function_exists('cyclone_slider') ) cyclone_slider('main'); ?>
		 <div id="three-columns">
			<div class="content">
				<div class="home_column">
					<h2>
						<img src="<?php bloginfo('template_url') ?>/images/watch.png"
							width="30" height="30" alt="" /> Watch
					</h2>
					<img src="<?php bloginfo('template_url') ?>/images/earth_10.jpg"
						width="280" height="192" alt="" /> <a href=""><img class="play"
						src="<?php bloginfo('template_url') ?>/images/play-watch.png" /> </a>
					<div class="column-text">
						<p class="column-text-title">
							<a href="#">Videos coming soon</a>
						</p>
					</div>
				</div>
				<div class="home_column">
					<h2>
						<img src="<?php bloginfo('template_url') ?>/images/listen.png"
							width="30" height="30" alt="" /> Listen
					</h2>
					<img src="<?php bloginfo('template_url') ?>/images/listen.jpg"
						width="280" height="192" alt="" /> <a href=""><img class="play"
						src="<?php bloginfo('template_url') ?>/images/play-listen.png" />
					</a>
					<div class="column-text">
						<p class="column-text-title">
							<a href="#">Audios coming soon</a>
						</p>
					</div>
				</div>
				<div class="home_column">
					<h2>
						<img src="<?php bloginfo('template_url') ?>/images/read.png"
							width="30" height="30" alt="" /> Read
					</h2>
					<img src="<?php bloginfo('template_url') ?>/images/read.jpg"
						width="280" height="192" alt="" />
					<div class="column-text">
						<p class="column-text-title-read">
							<a href="#">Articles coming soon</a>
						</p>
					</div>
				</div>
				<div id="newsletter-box">
					<h2>Subscribe to our newsletter:</h2>
					<input type="text" class="search" value="your email address..." />
					<a href="#" class="link-style">Subscribe</a>
				</div>
				<div id="events">
					<h2>
						<img src="<?php bloginfo('template_url') ?>/images/events.png"
							width="30" height="30" alt="" />Next event
					</h2>
			<div id="event" style="background: url(<?php bloginfo('template_url') ?>/images/praise.jpg) repeat;">
				<div id="event-info">
					<p id="event-title">Annual international conference</p>
					<p id="event-date">PPC Church| Sept 7 and 8 2013</p>
					<p id="more">
						<a href="https://www.facebook.com/events/156465734558492/" class="link-style">See more >></a>
					</p>
				</div>
			</div>
				</div>
				<div class="fb-like"
					data-href="https://www.facebook.com/PPM.worship.band"
					data-send="false" data-width="380" data-show-faces="true"
					data-font="tahoma"></div>
				<br /> <a href="https://www.facebook.com/PPM.worship.band"><img
					class="social-icon"
					src="<?php bloginfo('template_url') ?>/images/facebook.png"
					width="128" height="128" alt="" /> </a> <a
					href="https://twitter.com/PPMWorshipBand"><img class="social-icon"
					src="<?php bloginfo('template_url') ?>/images/twitter.png"
					width="128" height="128" alt="" /> </a>
			</div>
		</div>
	</div>
	<div id="footer">
		<p>
			Copyright (c) 2013 ppministries.nl All rights reserved. Design by <a
				href="http://www.freecsstemplates.org/" rel="nofollow">FreeCSSTemplates.org</a>
		</p>
	</div>
</body>
<?php get_footer(); ?>