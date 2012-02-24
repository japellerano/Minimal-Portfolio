<?php 

function register_navigation() {
   register_nav_menus(
      array('menu-1' => __('Default Menu'))
   );
}
add_action('init', 'register_navigation');

?>