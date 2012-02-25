<?php 
// WP 3.0 Menu
function register_navigation() {
   register_nav_menus(
      array('menu-1' => __('Default Menu'))
   );
}
add_action('init', 'register_navigation');

// Post Thumbnail Support
add_theme_support('post-thumbnails');

// Custom Post Type and Taxonomy for Projects
require_once(TEMPLATEPATH . '/functions/project.php');

// Custom Admin Options
require_once(TEMPLATEPATH . '/functions/custom_admin.php');
?>