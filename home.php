<?php /* Template Name: Home */ ?>
<?php get_header(); ?>


   <div class="content">
		<!-- About -->
		<div id="about">
			<p><?php echo get_option('artist_statement'); ?></p>
		</div>
	
		<!-- Featured Post -->
		<?php $args = array('post_type' => 'project', 'posts_per_page' => 1); ?>
		<?php $loop = new WP_Query($args); ?>
		
		<?php while ($loop->have_posts()) : $loop->the_post(); ?>
			<article class="project featured">
				<?php the_post_thumbnail('portfolio-small'); ?>
				<h2 class="project-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<h5 class="project-category"><?php the_terms($post->ID, 'categoryportfolio', '', ', ', ' '); ?></h5>
				
				<?php the_excerpt(); ?>
				<!-- <a class="read-more" href="<?php the_permalink(); ?>">See More</a> -->
			</article>
		<?php endwhile; ?>
		<?php wp_reset_query(); ?>
		<div class="clear"></div>
	</div>
<?php get_footer(); ?>