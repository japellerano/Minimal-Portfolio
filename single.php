<?php get_header(); ?>

   <div class="content">
   	<div class="single-post">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<h2 id="page" class="post-title"><?php the_title(); ?></h2>
				
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
      </div>
      <div id="single-post">
      	<p>Written by: <?php the_author(); ?>.</p>
      	<p>Posted on: <?php the_time('jS F Y'); ?>.</p>
      	<p>Posted in: <?php the_category(', '); ?>.</p>
      	<p>Tagged: <?php the_tags(); ?>.</p>
      </div>
      <div class="clear"></div>
   </div>

<?php get_footer(); ?>