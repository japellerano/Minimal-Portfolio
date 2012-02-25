<?php

add_action('admin_menu', 'create_options_menu');
function create_options_menu() {
   add_menu_page('Portfolio Options', 'Portfolio Options', 'administrator', __FILE__, 'theme_settings_page');
   
   add_action('admin_init', 'register_mysettings');
}

function register_mysettings() {
   register_setting('theme-settings-group', 'ga_tracking_code');
   register_setting('theme-settings-group', 'seo_keywords');
   register_setting('theme-settings-group', 'seo_description');
   register_setting('theme-settings-group', 'artist_statement');
}

function theme_settings_page() {
   ?>
   <div class="wrap">
      <h2>Custom Theme Options</h2>
      
      <form method="post" action="options.php">
         <?php settings_field('theme-settings-group'); ?>
         <table class="form-table">
            <tr>
               <th scope="row">Google Analytics Tracking Code</th>
               <td>
                  <input name="ga_tracking_code" type="text" value="<?php echo get_option('ga_tracking_code'); ?>" />
               </td>
            </tr>
            <tr valgin="top">
               <th scope="row">SEO Keywords</th>
               <td>
                  <input name="seo_keywords" type="text" value="<?php echo get_option('seo_keywords'); ?>" />
               </td>
            </tr>
            <tr>
               <th scope="row">SEO Description</th>
               <td>
                  <input name="seo_description" type="text" value="<?php echo get_option('seo_description'); ?>" />
               </td>
            </tr>
            <th scope="row">Artist Statement</th>
            <td>
               <textarea name="artist_statement" value="<?php echo get_option('artist_statement'); ?>" />
            </td>
         </table>
         <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes'); ?>" />
         </p>
      </form>
   </div>
   <?php
}


?>