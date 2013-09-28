<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : WaterDrop 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20130505

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PPministries</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="<?php bloginfo('template_url') ?>/js/default.js"></script>
<script src="js/default.js"></script>
<link
	href="<?php bloginfo('template_url') ?>/lib/menucool/themes/1/js-image-slider.css"
	rel="stylesheet" type="text/css" />
<script
	src="<?php bloginfo('template_url') ?>/lib/menucool/themes/1/js-image-slider.js"
	type="text/javascript"></script>
<link
	href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700"
	rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('template_url') ?>/css/default.css"
	rel="stylesheet" type="text/css" media="all" />
<link href="<?php bloginfo('template_url') ?>/css/events.css"
	rel="stylesheet" type="text/css" media="all" />
<!--[if IE 6]>
<link href="default_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
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
		<div id="events-two-columns">
			<h2>Upcoming events</h2>
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
	</div>
</body>
</html>