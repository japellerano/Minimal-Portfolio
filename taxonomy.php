<?php get_header(); ?>

<div class="content">
	
	<?php if (have_posts()) : ?>
		
		<h2 class="heading"><?php single_cat_title(); ?></h2>
		<br />
	
		<?php while (have_posts()) : the_post(); ?>
			<article class="project featured">
				<?php the_post_thumbnail('portfolio-small'); ?>
				<h2 class="project-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<h5 class="project-category"><?php the_terms($post->ID, 'categoryportfolio', '', ', ', ' '); ?></h5>
				
				<?php the_excerpt(); ?>
				<!-- <a class="read-more" href="<?php the_permalink(); ?>">See More</a> -->
			</article>
		<?php endwhile; ?>
	
	<?php endif; ?>
	
	
</div>

<?php get_footer(); ?>