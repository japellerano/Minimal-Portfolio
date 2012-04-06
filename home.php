<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

   <div class="clear"></div>
   <div id="content">
		<div class="container">
		
			<!-- Featured Post -->
			<div class="featured">
				<?php $args = array('post_type' => 'project', 'posts_per_page' => 1); ?>
				<?php $loop = new WP_Query($args); ?>
				
				<?php while ($loop->have_posts()) : $loop->the_post(); ?>
					<article class="project featured">
						<?php the_post_thumbnail('portfolio-small'); ?>
						<h2 class="project-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<h5 class="project-category"><?php the_terms($post->ID, 'categoryportfolio', '', ' ', ' '); ?></h5>
						
						<?php the_excerpt(); ?>
						<a class="read-more" href="<?php the_permalink(); ?>">See More</a>
					</article>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</div>
			
			<!-- Skills -->
			<div class="skills">
				<?php $skill_args = array('post_type' => 'skills', 'posts_per_page' => 3); ?>
				<?php $skill_loop = new WP_Query($skill_args); ?>
				
				<?php while ($skill_loop->have_posts()) : $skill_loop->the_post(); ?>
					<article class="skill">
						<?php echo get_post_custom($post->ID); ?> <h2 class="skill-title"><?php the_title(); ?></h2>
					</article>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</div>   	
			<div class="clear"></div>
		</div>
	</div>
<?php get_footer(); ?>