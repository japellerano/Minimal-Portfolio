<?php /* Template Name: Portfolio */ ?>
<?php get_header(); ?>

<div id="content">
   <div class="container">
      <div id="project-wrapper">
			<?php $args = array('post_type' => 'project'); ?>
			<?php $loop = new WP_Query($args); ?>
			
			<?php while ($loop->have_posts()) : $loop->the_post(); ?>
				<article class="project">
					<?php the_post_thumbnail('portfolio-small'); ?>
					<h2 class="project-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h2>
					<h5 class="project-category"><?php the_terms($post->ID, 'categoryportfolio', '', ' ', ' '); ?></h5>
					
					<?php the_excerpt(); ?>
				</article>
			<?php endwhile; ?>
		</div>
   </div>
</div>

<?php get_footer(); ?>