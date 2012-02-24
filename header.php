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
      <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
      <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/animated-menu.js"></script>
   </head>
   <body>
      <div id="wrapper">
         <header>
            <h1 id="site-title"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
            
            <h3 id="job-description"><?php bloginfo('description'); ?></h3>
            
            <nav>
               <?php wp_nav_menu(array('theme_location' => 'menu-1', 'container' => false)); ?>
            </nav>
         </header>