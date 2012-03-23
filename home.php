<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

   <div class="clear"></div>
   <div id="content">
      <div id="featured">
         <h2 class="heading">Recent Work</h2>
         
         <?php $args = array('post_type' => 'project', 'posts_per_page' => 3); ?>
         <?php $loop = new WP_Query($args); ?>
         
         <?php while ($loop->have_posts()) : $loop->the_post(); ?>
            <article class="project">
               <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('portfolio-small'); ?>
                  <h3 class="project-title"><?php the_title(); ?></h3>
                  <h5 class="project-category"><?php $terms_as_text = get_the_term_list($post->ID, 'categoryportfolio', '', ', ', ' '); if (!empty($terms_as_text)) echo '<p>', strip_tags($terms_as_text), '</p>'; ?></h5>
               </a>
            </article>
         <?php endwhile; ?>
      </div>
      <div id="about">
         <h2 class="heading">About Me</h2>
         <p id="front-page" class="medium-text"><?php echo get_option('artist_statement'); ?></p>
      </div>
      
      <div class="clear"></div>
   </div>
<?php get_footer(); ?>