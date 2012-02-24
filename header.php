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