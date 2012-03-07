<!doctype html>
<html>
   <head>
   
      <title>
         <?php 
            if (is_home()) { 
               bloginfo('name'); 
               echo " | ";
               bloginfo('description');
            } else {
               wp_title();
               echo " | ";
               bloginfo('name');
            }
         ?>
      </title>
      
      <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
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
	</head>
   <body>
      <div id="wrapper">
         <div class="accent-border"></div>
         <header>
            <h1 id="site-title"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
            
            <h3 id="job-description"><?php bloginfo('description'); ?></h3>
            
            <nav>
               <?php wp_nav_menu(array('theme_location' => 'menu-1', 'container' => false)); ?>
            </nav>
         </header>
