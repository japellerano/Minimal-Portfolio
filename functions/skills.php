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

// Meta Box
function add_skill_box()
{
	add_meta_box(
		'custom_meta_box',
		'Skill Level',
		'show_custom_meta_box',
		'skills',
		'normal',
		'high'
	);
}
add_action('add_meta_boxes', 'add_skill_box');

$prefix = 'skills_';
$custom_meta_fields = array(
	array(
		'label'		=> 'Skill Classification',
		'desc'		=> 'Skill class',
		'id'			=> $prexfix.'',
		'type'		=> 'checkbox_group',
		'options'	=> array(
			'one' 	=> array(
				'label'	=> 'First Class',
				'value'	=> 'first'
			),
			'two'		=> array(
				'label'	=> 'Second Class',
				'value'	=> 'second'
			),
			'three'	=> array(
				'label'	=> 'Second Class',
				'value'	=> 'third'
			)
		)
	)
);

function show_custom_meta_box()
{
	global $custom_meta_fields, $post;
	
	echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
	
	echo '<table class="form-table">';
	foreach ($custom_meta_fields as $field)
	{
		$meta = get_post_meta($post->ID, $field['id'], true);
		
		echo 
			'<tr>
				<th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
				<td>';
					switch($field['type'])
					{
						case 'checkbox_group':
							foreach ($field['options'] as $option)
							{
								echo '<input type="checkbox" value="'.$option['value'].'" name="'.$field['id'].'[]" id="'.$option['value'].'"', $meta && in_array($option['value'], $meta) ? ' checked="checked"' : '', '/> <label for="'.$option['value'].'">'.$option['label'].'</label><br />';
							}
							echo '<span class="description">'.$field['desc'].'</span>';
						break;
					}
				echo '</td></tr>';
	}
	echo '</table>';
}

function save_custom_meta($post_id)
{
	global $custom_meta_fields;
	
	if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
		return $post_id;
		
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return $post_id;
	
	if ('page' == $_POST['post_type'])
	{
		if (!current_user_can('edit_page', $post_id))
			return $post_id;
	}
	elseif (!current_user_can('edit_post', $post_id))
	{
		return $post_id;
	}
	
	foreach ($custom_meta_fields as $field) 
	{
		if ($field['type'] == 'tax_select') 
			continue;
			
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		
		if ($new && $new != $old) 
		{
			update_post_meta($post_id, $field['id'], $new);
		} 
		elseif ('' == $new && $old) 
		{
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
	
	$post = get_post($post_id);
	$category = $_POST['category'];
	wp_set_object_terms( $post_id, $category, 'category' );
}
add_action('save_post', 'save_custom_meta');
?>