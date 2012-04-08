<?php get_header(); ?>
   <div class="content">
		<div class="">
			<?php the_post(); ?>
			<h2><?php the_title(); ?></h2>
			
			<?php the_content(); ?>
		</div>
   </div>

<?php get_footer(); ?>