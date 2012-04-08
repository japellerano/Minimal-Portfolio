<?php

add_action('init', 'register_skills');

function register_skills() {
   // Custom Post Type
   $labels = array(
      'label'              => __('Skills', 'post type general name'),
      'singular_label'     => __('Skill', 'post type singular name'),
      'add_new'            => __('Add New', 'skill'),
      'add_new_item'       => __('Add New Skill'),
      'edit_item'          => __('Edit Skill'),
      'new_item'           => __('New Skill'),
      'view_item'          => __('View Skill'),
      'search_items'       => __('Search Skill'),
      'not_found'          => __('No projects found'),
      'not_found_in_trash' => __('No projects found in Trash'),
      'parent_item_colon'  => '',
      'menu_name'          => 'Skills'
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
      'supports'           => array('title', 'author', 'thumbnail', 'excerpt')
   );
   
   register_post_type('skills', $args);
   
   // Custom Taxonomy
   $labels = array(
      'name'               => _x('Types', 'taxonomy general name'),
      'singular_name'      => _x('Type', 'taxonomy singular name'),
      'search_items'       => __('Search Types'),
      'all_items'          => __('All Types'),
      'parent_item'        => __('Parent Type'),
      'parent_item_colon'  => __('Parent Type: '),
      'edit_item'          => __('Edit Type'),
      'update_item'        => __('Update Type'),
      'add_new_item'       => __('Add New Type'),
      'new_item_name'      => __('New Type Name')
   );
   
   register_taxonomy(
      'skilltype', 
      array('skills'), 
      array(
         'hierarchical'    => true,
         'labels'          => $labels,
         'show_ui'         => true,
         'query_var'       => true,
         'rewrite'         => array('slug' => 'skill')
      )
   );
}

// Skill Rating

// Add Meta Box
add_action('add_meta_boxes', 'skill_meta_box_add');
function skill_meta_box_add()
{
	add_meta_box('skill-meta-box-id', 'Skill Rating', 'skill_meta_box_cb', 'skills', 'side', 'high');
}

// Render Meta Box
function skill_meta_box_cb($post)
{
	echo '<b>Rate your skill level.</b><br />';
	
	$values = get_post_custom($post->ID);
	$selected = isset($values['skill_meta_box_select']) ? esc_attr($values['skill_meta_box_select'][0]) : '';
	wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');
	?>
		<label for="skill_meta_box_select">Skill Level: </label>
		<select name="skill_meta_box_select" id="skill_meta_box_select">
			<option value="first" <?php selected($selected, 'first'); ?>>First Class</option>
			<option value="second" <?php selected($selected, 'second'); ?>>Second Class</option>
			<option value="third" <?php selected($selected, 'third'); ?>>Third Class</option>
		</select>
	<?php
}

add_action('save_post', 'skill_meta_box_save');
function skill_meta_box_save($post_id)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	
	if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) return;
	
	if (!current_user_can('edit_post')) return;
	
	if (isset($_POST['skill_meta_box_select']))
		update_post_meta($post_id, 'skill_meta_box_select', esc_attr($_POST['skill_meta_box_select']));
}

?>