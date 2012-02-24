<?php /* Template Name: Home Page */ ?>
<?php get_header(); ?>

   <div id="content">
      <h2 id="recent">Recent Work</h2>
      
      <?php $args = array('post_type' => 'project', 'posts_per_page' => 3); ?>
      <?php $loop = new WP_Query($args); ?>
      
      <?php while ($loop->have_posts()) : $loop->the_post(); ?>
         <article class="project">
            <a href="<?php the_permalink(); ?>">
               <?php the_post_thumbnail(); ?>
               <h3 class="project-title"><?php the_title(); ?></h3>
            </a>
         </article>
      <?php endwhile; ?>
      <div class="clear"></div>
   </div>

<?php get_footer(); ?>