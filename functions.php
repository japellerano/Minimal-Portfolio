<?php 
// WP 3.0 Menu
function register_navigation() {
   register_nav_menus(
      array('menu-1' => __('Default Menu'))
   );
}
add_action('init', 'register_navigation');

// Post Thumbnail Support custom image size
add_theme_support('post-thumbnails');
add_image_size('portfolio-small', 249, 210);

// Custom Post Type and Taxonomy for Projects
require_once(TEMPLATEPATH . '/functions/project.php');

// Register Sidebar
if (function_exists('register_sidebar'))
   register_sidebar();

// Custom Admin Options
require_once(TEMPLATEPATH . '/functions/custom_admin.php');

// WordPress Customization
require_once(TEMPLATEPATH . '/functions/custom_wordpress.php');
?>