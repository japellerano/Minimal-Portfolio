<?php /* Template Name: About Template */ ?>
<?php get_header(); ?>

	<div class="content">
		<div class="page-wrapper">

			<div class="left-text">		
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<h2 id="page" class="heading"><?php the_title(); ?></h2>
					<?php the_content(); ?>
				<?php endwhile; endif; ?>
				<?php wp_reset_query(); ?>
			</div>

			<div id="right-text">
				<h2 class="heading" id="page">Skills</h2>
				<?php $args = array('post_type' => 'skills'); ?>
				<?php $query = new WP_Query($args); ?>
				<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
					<article class="skill">
						<h3 class="skill-title"><?php the_title(); ?></h3>
					</article>
				<?php endwhile; endif; ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>

<?php get_footer(); ?>