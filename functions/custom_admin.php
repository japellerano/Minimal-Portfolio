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
	register_setting('theme-settings-group', 'laterstars_url');
   register_setting('theme-settings-group', 'twitter_username');
   register_setting('theme-settings-group', 'first_class');
   register_setting('theme-settings-group', 'second_class');
   register_setting('theme-settings-group', 'third_class');
   register_setting('theme-settings-group', 'github_logo');
   register_setting('theme-settings-group', 'github_link');
}

function theme_settings_page() {
   ?>
   <div class="wrap">
      <h2>Custom Theme Options</h2>
      
      <form method="post" action="options.php">
         <?php settings_fields('theme-settings-group'); ?>
         <table class="form-table">
            <tr>
               <th scope="row">Google Analytics Tracking Code</th>
               <td>
                  <input name="ga_tracking_code" type="text" value="<?php echo get_option('ga_tracking_code'); ?>" />
               </td>
            </tr>
            <tr>
            	<th scope="row">First Class Skill Rating</th>
            	<td>
            		<input name="first_class" type="text" value="<?php echo get_option('first_class'); ?>" />
            	</td>
            </tr>
            <tr>
            	<th scope="row">Second Class Skill Rating</th>
            	<td>
            		<input name="second_class" type="text" value="<?php echo get_option('second_class'); ?>" />
            	</td>
            </tr>
            <tr>
            	<th scope="row">Third Class Skill Rating</th>
            	<td>
            		<input name="third_class" type="text" value="<?php echo get_option('third_class'); ?>" />
            	</td>
            </tr>
            <tr>
               <th scope="row">Twitter Username</th>
               <td>
                  <input name="twitter_username" type="text" value="<?php echo get_option('twitter_username'); ?>" />
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
            <tr>
            	<th scope="row">LaterStars URL</th>
            	<td>
            		<input name="laterstars_url" type="text" value="<?php echo get_option('laterstars_url'); ?>" />
            	</td>
            </tr>
            <tr>
            	<th scope="row">Git Hub Logo Link</th>
            	<td>
            		<input name="github_logo" type="text" value="<?php echo get_option('github_logo'); ?>" />
            	</td>
            </tr>
            <tr>
            	<th scope="row">Git Hub User Link</th>
            	<td>
            		<input name="github_link" type="text" value="<?php echo get_option('github_link'); ?>" />
            	</td>
            </tr>
            <th scope="row">Artist Statement</th>
            <td>
               <textarea name="artist_statement" cols="80" rows="10"><?php echo get_option('artist_statement'); ?></textarea>
            </td>
         </table>
         <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes'); ?>" />
         </p>
      </form>
   </div>
   <?php
}


/* 
 * Usage
 * <?php echo get_option('ga_tracking_code'); ?>
*/
?>