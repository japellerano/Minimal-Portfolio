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

// 


// URL Meta Box
add_action('admin_init', 'portfolio_meta_init');

function portfolio_meta_init()
{
   add_meta_box('portfolio_meta', 'Project Website', 'portfolio_meta_setup', 'project', 'side', 'low');
   add_action('save_post', 'portfolio_meta_save');
}

function portfolio_meta_setup()
{
   global $post;
   ?>
      <div class="portfolio_meta_control">
         <label>URL:</label>
         <p>
            <input type="text" name="_url" value="<?php echo get_post_meta($post->ID, '_url', TRUE); ?>" style="width: 100%;" />
         </p>
      </div>
   <?php
   
   echo '<input type="hidden" name="meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}

function portfolio_meta_save($post_id)
{
   if (!isset($_POST['meta_noncename']) || !wp_verify_nonce($_POST['meta_noncename'], __FILE__))
   {
      return $post_id;
   }
   
   if ('post' == $_POST['post_type'])
   {
      if (!current_user_can('edit_post', $post_id))
      {
         return $post_id;
      }
   } 
   elseif (!current_user_can('edit_page', $post_id))
   {
      return $post_id;
   }
   
   if (isset($_POST['_url']))
   {
      update_post_meta($post_id, '_url', $_POST['_url']);
   }
   else
   {
      delete_post_meta($post_id, '_url');
   }
}


?>