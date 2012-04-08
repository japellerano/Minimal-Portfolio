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
	$text_image2 = isset($values['portfolio_meta_box_image2']) ? esc_attr($values['portfolio_meta_box_image2'][0]) : '';
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
		<input type="text" name="portfolio_meta_box_image1" id="portfolio_meta_box_image1" value="<?php echo $text_image1; ?>" />
	</p>
	<p>
		<label for="portfolio_meta_box_image2">Image Two: </label>
		<input type="text" name="portfolio_meta_box_image2" id="portfolio_meta_box_image2" value="<?php echo $text_image2; ?>" />
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
		
	if (isset($_POST['portfolio_meta_box_image2']))
		update_post_meta($post_id, 'portfolio_meta_box_image2', esc_attr($_POST['portfolio_meta_box_image2']));
}

?>