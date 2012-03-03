<?php /* Template Name: Portfolio */ ?>
<?php get_header(); ?>

<div id="content">
   <div id="portfolio">
      <?php $args = array('post_type' => 'project'); ?>
      <?php $loop = new WP_Query($args); ?>
      
      <?php while ($loop->have_posts()) : $loop->the_post(); ?>
         <article class="project">
            <a href="<?php the_permalink(); ?>">
               
               <?php the_post_thumbnail(); ?>
               <h3 class="project-title"><?php the_title(); ?></h3>
               <h5 class="project-category"><?php the_terms($post->ID, 'categoryportfolio', '', ' ', ' '); ?></h5>
            </a>
         </article>
      <?php endwhile; ?>
   </div>
</div>

<?php get_footer(); ?>