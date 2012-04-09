<?php

add_action('init', 'register_project_post');

function register_project_post() {
   // Custom Post Type
   $labels = array(
      'label'              => __('Projects', 'post type general name'),
      'singular_label'     => __('Project', 'post type singular name'),
      'add_new'            => __('Add New', 'project'),
      'add_new_item'       => __('Add New Project'),
      'edit_item'          => __('Edit Project'),
      'new_item'           => __('New Project'),
      'view_item'          => __('View Project'),
      'search_items'       => __('Search Projects'),
      'not_found'          => __('Np projects found'),
      'not_found_in_trash' => __('No projects found in Trash'),
      'parent_item_colon'  => '',
      'menu_name'          => 'Portfolio'
   );
   
   $args = array(
      'labels'             => $labels,
      'public'             => true,
      'public_queryable'   => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => true,
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => null,
      'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt')
   );
   
   register_post_type('project', $args);
   
   // Custom Taxonomy
   $labels = array(
      'name'               => _x('Categories', 'taxonomy general name'),
      'singular_name'      => _x('Category', 'taxonomy singular name'),
      'search_items'       => __('Search Categories'),
      'all_items'          => __('All Categories'),
      'parent_item'        => __('Parent Category'),
      'parent_item_colon'  => __('Parent Category: '),
      'edit_item'          => __('Edit Category'),
      'update_item'        => __('Update Category'),
      'add_new_item'       => __('Add New Category'),
      'new_item_name'      => __('New Category Name')
   );
   
   register_taxonomy(
      'categoryportfolio', 
      array('project'), 
      array(
         'hierarchical'    => true,
         'labels'          => $labels,
         'show_ui'         => true,
         'query_var'       => true,
         'rewrite'         => array('slug' => 'portfolio')
      )
   );
}

// URL Meta Box
add_action('add_meta_boxes', 'portfolio_meta_box_add');
function portfolio_meta_box_add()
{
	add_meta_box('portfolio-meta-box-id', 'Project Options', 'portfolio_meta_box_cb', 'project', 'normal', 'low');
}

function portfolio_meta_box_cb($post)
{
	echo '<b>Project Website</b><br />';
	
	$values = get_post_custom($post->ID);
	$text_url = isset($values['portfolio_meta_box_url']) ? esc_attr($values['portfolio_meta_box_url'][0]) : '';
	$text_image1 = isset($values['portfolio_meta_box_image1']) ? esc_attr($values['portfolio_meta_box_image1'][0]) : '';
	$text_image1_desc = isset($values['portfolio_meta_box_image1_desc']) ? esc_attr($values['portfolio_meta_box_image1_desc'][0]) : '';
	
	$text_image2 = isset($values['portfolio_meta_box_image2']) ? esc_attr($values['portfolio_meta_box_image2'][0]) : '';
	$text_image2_desc = isset($values['portfolio_meta_box_image2_desc']) ? esc_attr($values['portfolio_meta_box_image2_desc'][0]) : '';
	
	$text_image3 = isset($values['portfolio_meta_box_image3']) ? esc_attr($values['portfolio_meta_box_image3'][0]) : '';
	$text_image3_desc = isset($values['portfolio_meta_box_image3_desc']) ? esc_attr($values['portfolio_meta_box_image3_desc'][0]) : '';
	
	$text_image4 = isset($values['portfolio_meta_box_image4']) ? esc_attr($values['portfolio_meta_box_image4'][0]) : '';
	$text_image4_desc = isset($values['portfolio_meta_box_image4_desc']) ? esc_attr($values['portfolio_meta_box_image4_desc'][0]) : '';
	wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');
?>
	<p>
		<label for="portfolio_meta_box_url">Website Url: </label>
		<input type="text" name="portfolio_meta_box_url" id="portfolio_meta_box_url" value="<?php echo $text_url; ?>" />
	</p>
<?php	
	echo '<b>Images for Slideshow</b><br />';
?>	
	<p>
		<label for="portfolio_meta_box_image1">Image One: </label>
		<input type="text" name="portfolio_meta_box_image1" id="portfolio_meta_box_image1" value="<?php echo $text_image1; ?>" /><br />
		<label for="portfolio_meta_box_image1_desc">Image Two Description: </label>
		<textarea class="image_desc" id="portfolio_meta_box_image1_desc" name="portfolio_meta_box_image1_desc"><?php echo $text_image1_desc; ?></textarea>
	</p>
	<p>
		<label for="portfolio_meta_box_image2">Image Two: </label>
		<input type="text" name="portfolio_meta_box_image2" id="portfolio_meta_box_image2" value="<?php echo $text_image2; ?>" /><br />
		<label for="portfolio_meta_box_image2_desc">Image Two Description: </label>
		<textarea class="image_desc" id="portfolio_meta_box_image2_desc" name="portfolio_meta_box_image2_desc"><?php echo $text_image2_desc; ?></textarea>
	</p>
	<p>
		<label for="portfolio_meta_box_image3">Image Three: </label>
		<input type="text" name="portfolio_meta_box_image3" id="portfolio_meta_box_image3" value="<?php echo $text_image3; ?>" /><br />
		<label for="portfolio_meta_box_image3_desc">Image Two Description: </label>
		<textarea class="image_desc" id="portfolio_meta_box_image3_desc" name="portfolio_meta_box_image3_desc"><?php echo $text_image3_desc; ?></textarea>
	</p>
	<p>
		<label for="portfolio_meta_box_image4">Image Four: </label>
		<input type="text" name="portfolio_meta_box_image4" id="portfolio_meta_box_image4" value="<?php echo $text_image4; ?>" /><br />
		<label for="portfolio_meta_box_image4_desc">Image Two Description: </label>
		<textarea class="image_desc" id="portfolio_meta_box_image4_desc" name="portfolio_meta_box_image4_desc"><?php echo $text_image4_desc; ?></textarea>
	</p>
<?php
}

add_action('save_post', 'portfolio_meta_box_save');
function portfolio_meta_box_save($post_id)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	
	if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) return;
	
	if (!current_user_can('edit_post')) return;
	
	if (isset($_POST['portfolio_meta_box_url']))
		update_post_meta($post_id, 'portfolio_meta_box_url', esc_attr($_POST['portfolio_meta_box_url']));
		
	if (isset($_POST['portfolio_meta_box_image1']))
		update_post_meta($post_id, 'portfolio_meta_box_image1', esc_attr($_POST['portfolio_meta_box_image1']));
		
	if (isset($_POST['portfolio_meta_box_image1_desc']))
		update_post_meta($post_id, 'portfolio_meta_box_image1_desc', esc_attr($_POST['portfolio_meta_box_image1_desc']));
		
	if (isset($_POST['portfolio_meta_box_image2']))
		update_post_meta($post_id, 'portfolio_meta_box_image2', esc_attr($_POST['portfolio_meta_box_image2']));

	if (isset($_POST['portfolio_meta_box_image2_desc']))
		update_post_meta($post_id, 'portfolio_meta_box_image2_desc', esc_attr($_POST['portfolio_meta_box_image2_desc']));

	if (isset($_POST['portfolio_meta_box_image3']))
		update_post_meta($post_id, 'portfolio_meta_box_image3', esc_attr($_POST['portfolio_meta_box_image3']));

	if (isset($_POST['portfolio_meta_box_image3_desc']))
		update_post_meta($post_id, 'portfolio_meta_box_image3_desc', esc_attr($_POST['portfolio_meta_box_image3_desc']));

	if (isset($_POST['portfolio_meta_box_image4']))
		update_post_meta($post_id, 'portfolio_meta_box_image4', esc_attr($_POST['portfolio_meta_box_image4']));
		
	if (isset($_POST['portfolio_meta_box_image4_desc']))
		update_post_meta($post_id, 'portfolio_meta_box_image4_desc', esc_attr($_POST['portfolio_meta_box_image4_desc']));
}

?>