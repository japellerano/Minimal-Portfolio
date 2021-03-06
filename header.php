<!doctype html>
<html>
	<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
	<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
	<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
	<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
   <head>
   
      <title>
         <?php if (is_home()) { echo bloginfo('name');  echo ' | '; echo bloginfo('description'); } else { echo wp_title(' | ', false, right); echo bloginfo('name'); } ?>
      </title>
      
      <meta charset="<?php bloginfo('charset'); ?>" />
      
      <?php /* Keywords & Description */ ?>
      <meta name="keywords" content="<?php echo get_option('seo_keywords'); ?>" />
      <meta name="description" content="<?php echo get_option('seo_description'); ?>" />
      
      <?php /* Responsive Design */ ?>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
      <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
      
      <?php /* Internet Explorer Stylesheets */ ?>
      <!--[if IE 7]>
      	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/ie7.css" />
      <![endif]-->
      <!--[if IE 8]>
      	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/ie8.css" />
      <![endif]-->
      <!--[if IE 9]>
      	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/ie9.css" />
      <![endif]-->
      
      <?php /* Javascript */ ?>
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
      <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/coin-slider.min.js"></script>
      <script src="<?php bloginfo('template_directory'); ?>/scripts/modernizr-2.5.3.min.js"></script>
	   
	   <?php /* Coin Slider */ ?>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#coin-slider').coinslider({width: 565, navigation: false, delay: 5000}); 
			});
		</script>
	   
	   <?php /* Google Analytics */ ?>
	   <script type="text/javascript">
	
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', '<?php echo get_option('ga_tracking_code'); ?>']);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
			 var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			 ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			 var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
		
		<?php /* For Internet Explorer 8 or older */ ?>
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<![endif]-->
		
	</head>
   <body>
   	<div class="accent"></div>
   	<header>
			<div id="identity">
				<h1 id="site-title"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
				<h3 id="job-description"><?php bloginfo('description'); ?></h3>
			</div>
			<nav>
				<?php wp_nav_menu(array('theme_location' => 'menu-1', 'container' => false)); ?>
			</nav>
		</header>
		<div class="clear"></div>
